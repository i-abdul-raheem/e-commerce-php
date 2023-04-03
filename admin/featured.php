<?php
require("./components/header.php");
?>
<div class="container">
    <div class="card">
        <div class="card-header myCardHeader">
            <h1>Featured Products</h1>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Toggle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <th>Shoes</th>
                        <td><img style="width: 100px;" src="../assets/img/banner_img_01.jpg" alt="Banner 1" /></td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitches">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('featuredMenu').className = "active";
</script>