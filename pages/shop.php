<?php
require('./components/start.php');
require('./components/top_nav.php');
require('./components/cart.php');
require('./components/header.php');
require('./components/search_modal.php');
?>
<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <ul class="list-unstyled templatemo-accordion">

                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Categories
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3" id="my-categories">

                    </ul>
                </li>

            </ul>
        </div>

        <div class="col-lg-9">

            <div class="row" id="my-products"></div>

        </div>

    </div>
</div>
<!-- End Content -->

<script>
    const getCategories = async () => {
        const res = await fetch("./api/categories.php").then(res => res.json());
        const data = res?.data;
        let myData = "";
        data?.map(i => {
            myData += `
            <li><a class="text-decoration-none text-capitalize" href="?category=${i.category_id}">${i.title}</a></li>
            `
        });
        document.getElementById('my-categories').innerHTML = myData;
    }
    const getProducts = async () => {
        let res;
        if (!window.location.search)
            res = await fetch("./api/products.php").then(res => res.json());
        else {
            res = await fetch("./api/products.php" + window.location.search).then(res => res.json());
        }
        const data = res?.data;
        let myData = "";
        const truncateText = (text, n) => {
            const temp = text.split(' ');
            if (temp.length < n) return temp.join(' ');
            return temp.slice(0, n + 1).join(' ') + "...";
        }
        if (data.length > 0)
            data?.map(i => {
                myData += `
                <div class="col-md-4 mb-4">
                    <div class="card h-100 product-wap rounded-0">
                        <div class="card border-0 rounded-0">
                        <a href="shop-single.php?product_id=${i.product_id}">
                            <img class="card-img rounded-0 img-fluid" src="assets/img/${i.image}">
                        </a>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="shop-single.php?product_id=${i.product_id}" class="text-decoration-none text-capitalize" style="font-weight: 'bold'"><strong>${i.title}</strong></a>
                                <p class="mb-0">$${i.price}</p>
                            </div>
                            <hr />
                            <div>
                                <p>${truncateText(i.description, 16)}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `
            });
        else myData = "No product found"
        document.getElementById('my-products').innerHTML = myData;
    }
    getCategories();
    getProducts();
</script>

<?php
require('./components/brands.php');
require('./components/footer.php');
require('./components/end.php');

?>