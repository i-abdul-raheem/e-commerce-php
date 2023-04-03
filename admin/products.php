<?php
require("./components/header.php");
?>
<div class="container">
    <div class="card">
        <div class="card-header myCardHeader">
            <h1>Products</h1>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"><i
                    class="fa fa-plus"></i></button>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Specifications</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <th>Shoes</th>
                        <td><img style="width: 100px;" src="../assets/img/banner_img_01.jpg" alt="Banner 1" /></td>
                        <td>$250</td>
                        <td>Nike</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem nisi repellat perspiciatis,
                            quos natus unde perferendis explicabo recusandae quae itaque voluptates vero nemo
                            reprehenderit inventore sit atque. Voluptatibus, distinctio dolorem!</td>
                        <td>Long Lasting, Durable, Reliable</td>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <select class="form-control">
                            <option value="">Select Brand</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Specifications</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Image</label>
                        <input type="file" class="form-control" />
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
    document.getElementById('productMenu').className = "active";
</script>