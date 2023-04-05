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
            echo '<a href="#checkout" class="btn btn-success">Chechout</a>';
        } else {
            echo '<a class="nav-icon position-relative text-decoration-none btn btn-success" data-bs-toggle="offcanvas" data-bs-target="#account" aria-controls="account">Login</a>';
        } ?>
        <h4 class="total">
            Total: $<span id="myTotalPrice"></span>
        </h4>
    </div>
</div>
<!-- Close Cart -->