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
            <h3 class="card-title p-3">Registration Form</h3>
            <hr>
            <form action="" class="form">
                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname"
                                placeholder="First Name" required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname"
                                placeholder="Last Name" required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address"
                                required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Mobile Number"
                                required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="password0" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password0" id="password0"
                                placeholder="Password" required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="password1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password1" id="password1"
                                placeholder="Confirm Password" required />
                        </div>
                    </div>
                    <div class="col col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" rows="4" name="address" id="address" placeholder="Address"
                                required></textarea>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" name="state" id="state" placeholder="State"
                                required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="zipcode" class="form-label">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zipcode"
                                required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country" id="country" placeholder="Country" required>
                                <option value="">Select Country...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 mt-3">
                        <button type="submit" class="btn btn-success">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require('./components/footer.php');
require('./components/end.php');
?>