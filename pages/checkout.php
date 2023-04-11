<?php
require('./components/start.php');
require('./components/top_nav.php');
require('./components/cart.php');
require('./components/header.php');
require('./components/search_modal.php');
?>
<div class="container">
    <div class="card mt-3 mb-3">
        <div class="card-body">
            <h3 class="card-title p-3">Checkout</h3>
            <hr>
            <table class="table table-responsive table-hover table-striped mb-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="checkout-table"></tbody>
                <tfoot>
                    <tr>
                        <th style="text-align: center;" colspan="3">Total</th>
                        <th id="total-price"></th>
                    </tr>
                </tfoot>
            </table>
            <h3>Account Information</h3>
            <table class="table table-responsive table-hover table-striped mb-5">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td id="user_name"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="user_address"></td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td id="user_mobile"></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group mb-4">
                <label for="" class="form-label" style="display: block;"><b>Shiping Address</b></label>
                <input type="checkbox" name="sameAddress" onchange="toggleNewAddress()" id="sameAddress" checked />
                <label for="sameAddress" class="form-label">Same as above address.</label>
            </div>
            <form style="display: none;" id="new-address-form" action="" class="form mb-5">
                <div class="form-group">
                    <label for="newAddress" class="form-label">New Address</label>
                    <textarea name="newAddress" id="newAddress" class="form-control" rows="3"
                        placeholder="New Addess"></textarea>
                </div>
            </form>
            <form action="" class="form" id="checkout-form">
                <h3 class="mb-3">Card Information</h3>
                <div class="row">
                    <div class="col col-12 mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">Card Number</label>
                            <input class="form-control" type="number" placeholder="Card Number" minlength="16"
                                maxlength="16" required>
                        </div>
                    </div>
                    <div class="col col-6 mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">Card Expiry Date</label>
                            <input class="form-control" type="date" placeholder="Card Expiry Date" required>
                        </div>
                    </div>
                    <div class="col col-6 mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">CVV</label>
                            <input class="form-control" type="number" placeholder="CVV" minlength="3" maxlength="3"
                                required>
                        </div>
                    </div>
                    <div class="col col-12 mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">Card Holder Name</label>
                            <input class="form-control" type="text" placeholder="Card Holder Name" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" id="user_id">
                <input type="hidden" name="items" id="items">
                <input type="hidden" name="date_created" id="date_created">
                <input class="btn btn-success" type="submit" value="Place Order" />
            </form>
        </div>
    </div>
</div>

<script>
    const items = JSON.parse(getCookie("cart"));
    const user_cookie = JSON.parse(JSON.parse(getCookie("zarsaw_login")));
    const checkoutTable = document.getElementById("checkout-table");

    let tP = 0;
    items && items.map((item, index) => {
        const sArr = item.price.split("");
        sArr.shift();
        const p = sArr.join("");
        tP += parseFloat(p);
        checkoutTable.innerHTML += `
        <tr>
            <td>${index + 1}</td>
            <td><img width="75px" src="${item.image}" alt="${index}" /></td>
            <td>${item.quantity}</td>
            <td>${item.price}</td>
        </tr>
        `;
    });
    document.getElementById("user_id").value = user_cookie.user_id;
    document.getElementById("user_name").innerHTML = user_cookie.fname + " " + user_cookie.lname;
    document.getElementById("user_address").innerHTML = user_cookie.address;
    document.getElementById("user_mobile").innerHTML = user_cookie.mobile;
    document.getElementById("items").value = JSON.stringify(items);
    const date = new Date();
    document.getElementById("date_created").value = date;
    document.getElementById("total-price").innerHTML = "$" + tP.toFixed(2);

    const toggleNewAddress = () => {
        const checked = document.getElementById("sameAddress").checked;
        if (checked) {
            document.getElementById("new-address-form").style.display = "none";
        } else { document.getElementById("new-address-form").style.display = "block"; }
    }

</script>

<?php
require('./components/footer.php');
require('./components/end.php');
?>