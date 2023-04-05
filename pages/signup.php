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
            <form action="" class="form" id="signup-form">
                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="first_name"
                                placeholder="First Name" required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="last_name"
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
                            <input type="tel" class="form-control" name="phone" id="mobile" placeholder="Mobile Number"
                                required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="password0" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password1" id="password1"
                                placeholder="Password" required />
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="password1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password2" id="password2"
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
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 mt-3">
                        <span class="text-danger" id="error"></span>
                        <span class="text-success" id="success"></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('signup-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append("first_name", document.getElementById('first_name').value);
        formData.append("last_name", document.getElementById('last_name').value);
        formData.append("email", document.getElementById('email').value);
        formData.append("mobile", document.getElementById('mobile').value);
        formData.append("password1", document.getElementById('password1').value);
        formData.append("password2", document.getElementById('password2').value);
        formData.append("address", document.getElementById('address').value);
        formData.append("city", document.getElementById('city').value);
        formData.append("state", document.getElementById('state').value);
        formData.append("zipcode", document.getElementById('zipcode').value);
        formData.append("country", document.getElementById('country').value);

        formData.append("validation", "email");
        const options = {
            method: "POST",
            body: formData,
        }
        let valid = true;

        const validate_email = await fetch("./api/user-validate.php", options).then(res => res.json());
        if (validate_email.status !== 200) {
            valid = false;
            document.getElementById('success').innerHTML = "";
            document.getElementById('error').innerHTML = validate_email.message;
            return;
        }

        formData.set("validation", "mobile");
        options.body = formData;
        const validate_mobile = await fetch("./api/user-validate.php", options).then(res => res.json());
        if (validate_mobile.status !== 200) {
            valid = false;
            document.getElementById('success').innerHTML = "";
            document.getElementById('error').innerHTML = validate_mobile.message;
            return;
        }

        formData.set("validation", "password");
        options.body = formData;
        const validate_password = await fetch("./api/user-validate.php", options).then(res => res.json());
        if (validate_password.status !== 200) {
            valid = false;
            document.getElementById('success').innerHTML = "";
            document.getElementById('error').innerHTML = validate_password.message;
            return;
        }

        if (valid) {
            document.getElementById('error').innerHTML = "";
            formData.append("password", document.getElementById('password1').value);
            formData.delete("validation");
            formData.append("action", "new");
            options.body = formData;
            const res = await fetch("./api/users.php", options).then(res => res.json());
            if(res.status === 200){
                document.getElementById('error').innerHTML = "";
                document.getElementById('success').innerHTML = res.message;
            } else {
                document.getElementById('error').innerHTML = res.message;
                document.getElementById('success').innerHTML = "";
            }
        }

    });

    const countries_url = "https://restcountries.com/v3.1/all";
    const setCountries = async () => {
        const res = await fetch(countries_url).then(res => res.json());
        for (let country of res) {
            document.getElementById('country').innerHTML += `<option value="${country.name.common}">${country.name.common}</option>`
        }
    }
    setCountries();
</script>

<?php
require('./components/footer.php');
require('./components/end.php');
?>