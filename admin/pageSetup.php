<?php
require("./components/header.php");
?>
<div class="container">
    <div class="card">
        <div class="card-header myCardHeader">
            <h1>Page Setup</h1>
        </div>
        <div class="card-body">
            <form action="" class="form">
                <div class="row">
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Title</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Email</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Phone</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook Page</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram Page</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter Page</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">LinkedIn</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Address</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">About Us</label>
                    <textarea cols="30" rows="10" class="form-control"></textarea>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Save</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('pageSetupMenu').className = "active";
</script>