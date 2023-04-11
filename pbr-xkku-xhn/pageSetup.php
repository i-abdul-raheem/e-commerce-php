<?php
require("./components/header.php");
require("../api/config.php");
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$res = mysqli_query($conn, "SELECT * FROM page_setup");
$row = mysqli_fetch_assoc($res);
?>
<div class="container">
    <div class="card">
        <div class="card-header myCardHeader">
            <h1>Page Setup</h1>
        </div>
        <form action="" class="form" id="page-setup">
            <div class="card-body">
                <div class="row">
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Title</label>
                            <input type="text" class="form-control" id="site_title"
                                value="<?php echo $row['site_title']; ?>" />
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Email</label>
                            <input type="text" class="form-control" id="company_email"
                                value="<?php echo $row['company_email']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Phone</label>
                            <input type="text" class="form-control" id="company_phone"
                                value="<?php echo $row['company_phone']; ?>" />
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook Page</label>
                            <input type="text" class="form-control" id="facebook_page"
                                value="<?php echo $row['facebook_page']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram Page</label>
                            <input type="text" class="form-control" id="instagram_page"
                                value="<?php echo $row['instagram_page']; ?>" />
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter Page</label>
                            <input type="text" class="form-control" id="twitter_page"
                                value="<?php echo $row['twitter_page']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">LinkedIn</label>
                            <input type="text" class="form-control" id="linkedin"
                                value="<?php echo $row['linkedin']; ?>" />
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Address</label>
                            <input type="text" class="form-control" id="company_address"
                                value="<?php echo $row['company_address']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">About Us</label>
                    <textarea cols="30" rows="10" id="about_us"
                        class="form-control"><?php echo $row['about_us']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" id="message"></label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('pageSetupMenu').className = "active";

    document.getElementById("page-setup").addEventListener("submit", async (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('site_title', document.getElementById('site_title').value);
        formData.append('company_email', document.getElementById('company_email').value);
        formData.append('company_phone', document.getElementById('company_phone').value);
        formData.append('facebook_page', document.getElementById('facebook_page').value);
        formData.append('instagram_page', document.getElementById('instagram_page').value);
        formData.append('twitter_page', document.getElementById('twitter_page').value);
        formData.append('linkedin', document.getElementById('linkedin').value);
        formData.append('company_address', document.getElementById('company_address').value);
        formData.append('about_us', document.getElementById('about_us').value);
        const options = {
            method: "POST",
            body: formData
        }
        const res = await fetch('../api/page_setup.php', options).then(res => res.json());
        document.getElementById('message').innerHTML = res.message;
    })

</script>