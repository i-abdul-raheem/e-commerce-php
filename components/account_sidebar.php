<!-- ACCOUNT -->
<?php
$logged = false;
?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="account" aria-labelledby="accountLabel">
    <div class="offcanvas-header">
        <h5 id="accountLabel">Account</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        if (!isset($_COOKIE["zarsaw_login"])) {
            ?>
            <div class="d-flex justify-content-center">
                <div>
                    <h2 style="text-transform: uppercase;">Login to continue</h2>
                    <form action="" class="form mb-3" id="login-form">
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Email</label>
                            <input type="email" id="username" class="form-control" placeholder="Enter Email Address"
                                required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Enter Password" required />
                        </div>
                        <div class="form-group mb-3">
                            <label id="error" class="form-label text-danger"></label>
                        </div>
                        <button type="submit" class="btn btn-secondary">Login</button>
                    </form>
                    <a class="text-secondary" href="signup.php">Dont have an account?</a>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div>
                <section class="d-flex justify-content-start p-3" id="account_info">
                    <div class="display-image">
                        <img style="width: 75px; height: 75px; border-radius: 50%;" src="assets/img/user.jpg"
                            alt="user image">
                    </div>
                    <div class="account-info px-4 py-2">
                        <span style="display: block; font-weight: bold;" class="name">Abdul Raheem</span>
                        <span class="logout"><a href="<?php echo $_SERVER['PHP_SELF']; ?>"
                                onclick="deleteCookie('zarsaw_login')" class="text-danger">Logout</a></span>
                    </div>
                </section>
                <hr />
                <ul class="navbar-nav">
                    <li class="nav-item py-3">
                        <a class="nav-link" href="orders.php"><i class="fa fa-receipt"></i> Orders</a>
                    </li>
                    <li class="nav-item py-3">
                        <a class="nav-link" href="track-order.php"><i class="fa fa-truck"></i> Track Order</a>
                    </li>
                    <li class="nav-item py-3">
                        <a class="nav-link" href="payment-settings.php"><i class="fa fa-credit-card"></i> Payment
                            Settings</a>
                    </li>
                    <li class="nav-item py-3">
                        <a class="nav-link" href="payment-settings.php"><i class="fa fa-cogs"></i> Account
                            Settings</a>
                    </li>
                </ul>
                <hr />
                <ul class="navbar-nav">
                    <li class="nav-item p-3">
                        <a class="nav-link" href="#">Privacy Policy</a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link" href="#">Terms & Conditions</a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link" href="#">FAQs</a>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="offcanvas-footer d-flex justify-content-center p-2">
        <a href="#" class="text-secondary">Powered By: Abdul Raheem</a>
    </div>
</div>
</div>
<!-- Close Account -->

<script>
    const loginForm = document.getElementById('login-form');
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
    if (loginForm) {
        loginForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData();
            formData.append("email", document.getElementById('username').value);
            formData.append("password", document.getElementById('password').value);
            formData.append("action", "login");
            const options = {
                method: "POST",
                body: formData
            }
            const res = await fetch("./api/users.php", options).then(res => res.json());
            if (res.status !== 200) {
                document.getElementById("error").innerHTML = "Username/Password not correct!";
            } else {
                setCookie("zarsaw_login", JSON.stringify(res.data));
                console.log(getCookie("zarsaw_login"))
                location.reload();
            }
        });
    }
</script>