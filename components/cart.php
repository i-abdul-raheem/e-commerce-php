<!-- CART -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cart" aria-labelledby="cartLabel">
    <div class="offcanvas-header">
        <h5 id="cartLabel">Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Single Item -->
        <div class="card mb-3">
            <div class="card-body p-2 d-flex justify-content-start">
                <img class="me-4" style="width: 75px; height: 75px; border-radius: 10px;"
                    src="./assets/img/feature_prod_01.jpg" alt="test">
                <div class="info p-1">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <h4 class="card-title mb-2">Gym Weight</h4>
                    </a>
                    <span class="text-secondary">Price: 30.00$</span>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <button class="btn"><i class="fa fa-chevron-down"></i></button>
                        <input style="width: 40px; border: none; background-color: transparent; text-align: center;"
                            type="text" value="0" name="qty" id="qty" readonly />
                        <button class="btn"><i class="fa fa-chevron-up"></i></button>
                    </div>
                    <div class="col text-end"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
                </div>
            </div>
        </div>
        <!-- End Single Item -->
    </div>
    <div class="offcanvas-footer p-3 bg-light d-flex justify-content-between">
        <button class="btn btn-success">Chechout</button>
        <h4 class="total">
            Total: 30.00$
        </h4>
    </div>
</div>
<!-- Close Cart -->