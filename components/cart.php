<!-- CART -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cart" aria-labelledby="cartLabel">
    <div class="offcanvas-header">
        <h5 id="cartLabel">Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="my-cart"></div>
    <div class="offcanvas-footer p-3 bg-light d-flex justify-content-between">
        <?php
        if (isset($_COOKIE["zarsaw_login"])) {
            echo '<a href="checkout.php" class="btn btn-success">Chechout</a>';
        } else {
            echo '<a class="nav-icon position-relative text-decoration-none btn btn-success" data-bs-toggle="offcanvas" data-bs-target="#account" aria-controls="account">Login</a>';
        } ?>
        <h4 class="total">
            Total: $<span id="myTotalPrice"></span>
        </h4>
    </div>
</div>

<script>


    if (!getCookie('cart')) {
        setCookie('cart', JSON.stringify([]));
    }
    function addtocart() {
        const temp = JSON.parse(getCookie('cart'));
        const item = {
            id: document.getElementById('myId').value,
            title: document.getElementById('product-title').innerHTML,
            price: document.getElementById('product-price').innerHTML,
            image: document.getElementById('product-detail').src,
            quantity: document.getElementById('product-quanity').value,
            color: document.getElementById('product-color').value,
            size: document.getElementById('product-size-val').value
        }
        let found = false;
        let index = -1;
        for (let i in temp) {
            if (temp[i].title === item.title && temp[i].color === item.color && temp[i].size === item.size) {
                found = true;
                index = i;
            }
        }
        if (!found) temp.push(item);
        else {
            temp[index].quantity = parseInt(temp[index].quantity) + parseInt(item.quantity);
        }
        setCookie('cart', JSON.stringify(temp));
        updateCart();
    }

    const updateCart = () => {
        document.getElementById("my-cart").innerHTML = "";
        const myItems = JSON.parse(getCookie('cart'));
        if (myItems.length > 0) {
            myItems.map((i, index) => {
                document.getElementById("my-cart").innerHTML += `
                <div class="card mb-3">
                    <div class="card-body p-2 d-flex justify-content-start">
                        <img class="me-4" style="width: 100px; border-radius: 10px;"
                            src="${i.image}" alt="test">
                        <div class="info p-1">
                            <a style="text-decoration: none; color: #000;" href="#">
                                <h4 class="card-title mb-2 text-capitalize">${i.title}</h4>
                            </a>
                            <span style="display: ${i.price !== '' ? 'block' : 'none'}" class="text-secondary">Price: ${i.price}</span>
                            <span style="display: ${i.color !== '' ? 'block' : 'none'}" class="text-secondary">Color: ${i.color}</span>
                            <span style="display: ${i.quantity !== '' ? 'block' : 'none'}" class="text-secondary">Quantity: ${i.quantity}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <button class="btn" onclick="decrementProduct(${index})"><i class="fa fa-chevron-down"></i></button>
                                <input style="width: 40px; border: none; background-color: transparent; text-align: center;"
                                    type="text" value="${i.quantity}" name="qty" id="qty" readonly />
                                <button class="btn" onclick="incrementProduct(${index})"><i class="fa fa-chevron-up"></i></button>
                            </div>
                            <div class="col text-end"><button onclick="removeItem(${index})" class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
                        </div>
                    </div>
                </div>
                `;
            });
            document.getElementById('totalItems').innerHTML = JSON.parse(getCookie('cart')).length;
            document.getElementById('myTotalPrice').innerHTML = getTotalPrice().toFixed(2);
        } else {
            document.getElementById("my-cart").innerHTML = "Cart is empty";
            document.getElementById('totalItems').innerHTML = JSON.parse(getCookie('cart')).length;
            document.getElementById('myTotalPrice').innerHTML = getTotalPrice().toFixed(2);
        }
    }

    function getTotalPrice() {
        let total = 0;
        for (let i of JSON.parse(getCookie('cart'))) {
            total += parseFloat(i.price.split('$')[1]) * parseFloat(i.quantity);
        }
        return total;
    }

    const removeItem = (index) => {
        const cart = JSON.parse(getCookie('cart'));
        cart.splice(index, 1);
        setCookie('cart', JSON.stringify(cart));
        updateCart();
    }

    const incrementProduct = (index) => {
        const cart = JSON.parse(getCookie('cart'));
        cart[index].quantity = parseInt(cart[index].quantity) + 1;
        setCookie('cart', JSON.stringify(cart));
        updateCart();
    }
    const decrementProduct = (index) => {
        const cart = JSON.parse(getCookie('cart'));
        cart[index].quantity = parseInt(cart[index].quantity) - 1;
        setCookie('cart', JSON.stringify(cart));
        updateCart();
    }

    function setCookie(name, value) {
        let expires = "";
        const date = new Date();
        date.setTime(date.getTime() + 1 * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
        document.cookie = name + "=" + value + expires + "; path=/";
    }
    function getCookie(name) {
        const cookieArr = document.cookie.split(";");
        for (let i = 0; i < cookieArr.length; i++) {
            const cookiePair = cookieArr[i].split("=");
            if (name === cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
            }
        }
        return null;
    }
    function deleteCookie(name) {
        document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
    document.getElementById("my-cart").innerHTML = "Cart is empty";
    document.getElementById('myTotalPrice').innerHTML = getTotalPrice().toFixed(2);

    updateCart();
</script>
<!-- Close Cart -->