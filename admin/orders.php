<?php
require("./components/header.php");
?>
<div class="container">
    <div class="card">
        <div class="card-header myCardHeader">
            <h1>Orders</h1>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>View</th>
                        <th>Delivered</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <th>Abdul Raheem</th>
                        <td>$234.42</td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                    class="fa fa-eye"></i></button></td>
                        <td><input type="checkbox" class="form-control" disabled /></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order# </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-responsive table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Quantiy</th>
                            <th>Size</th>
                            <th>Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><img style="width: 100px;" src="../assets/img/s1.jpg" alt="P1"></th>
                            <th>Shoe 1</th>
                            <th>2</th>
                            <th>XL</th>
                            <th>Brown</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Mark as deliverd</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('orderMenu').className = "active";
</script>