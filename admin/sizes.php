<?php
require("./components/header.php");
?>
<div class="container">
    <div class="card">
        <div class="card-header myCardHeader">
            <h1>Product Sizes</h1>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"><i
                    class="fa fa-plus"></i></button>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <th>Shoes</th>
                        <td>White</td>
                        <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Product Size</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product</label>
                        <select class="form-control">
                            <option value="">Select Product*</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Size</label>
                        <input type="text" class="form-control" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>


<script>
  document.getElementById('sizeMenu').className = "active";
</script>