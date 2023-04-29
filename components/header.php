<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow sticky-top bg-light">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
            <?php echo SITE_TITLE; ?>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto" id="header-nav">

                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ..." />
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                    data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" data-bs-toggle="offcanvas"
                    data-bs-target="#cart" aria-controls="cart">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span
                        class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"
                        id="totalItems"></span>
                </a>
                <a class="nav-icon position-relative text-decoration-none" data-bs-toggle="offcanvas"
                    data-bs-target="#account" aria-controls="account">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill text-dark"><i
                            class="fa fa-dot-circle <?php if (!isset($_COOKIE["zarsaw_login"])) {
                                echo "text-secondary";
                            } else {
                                echo "text-success";
                            } ?>"></i></span>
                </a>
            </div>
        </div>
    </div>
</nav>

<a data-bs-toggle="offcanvas" class="mobileIcon bg-dark" data-bs-target="#cart" aria-controls="cart">
    <i style="color: #fff;" class="fa fa-fw fa-cart-arrow-down mr-1"></i>
    <span style="color: #fff;" class="position-absolute top-1 left-100 translate-middle badge rounded-pill bg-dark"
        id="totalItemsMobile"></span>
</a>
<!-- Close Header -->

<script>
    const getHeaderNavs = async () => {
        const res = await fetch("./assets/json/header-nav.json").then(res => res.json());
        let headerNav = "";
        res?.map((i, index) => {
            headerNav += `
            <li key="header-nav-${index}" class="nav-item">
                <a class="nav-link" href="${i.path}">${i.title}</a>
            </li>
            `;
        });
        document.getElementById('header-nav').innerHTML = headerNav;
    }
    getHeaderNavs();
    document.getElementById('totalItems').innerHTML = JSON.parse(getCookie('cart')).length;
    document.getElementById('totalItemsMobile').innerHTML = JSON.parse(getCookie('cart')).length;
</script>

<?php
require("./components/account_sidebar.php");