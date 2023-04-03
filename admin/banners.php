<?php
require("./components/header.php");
?>
<div class="container">
    <div class="card">
        <div class="card-header myCardHeader">
            <h1>Banners</h1>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"><i
                    class="fa fa-plus"></i></button>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Heading</th>
                        <th>Sub Heading</th>
                        <th>Banner</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <th>Heading 1</th>
                        <th>My sub heading</th>
                        <td><img style="width: 100px;" src="../assets/img/banner_img_01.jpg" alt="Banner 1" /></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Heading</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Heading</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Banner Image</label>
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
  document.getElementById('bannerMenu').className = "active";
</script>