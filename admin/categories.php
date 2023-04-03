<?php
require("./components/header.php");
?>
<div class="container">
    <div class="card">
        <div class="card-header myCardHeader">
            <h1>Categories</h1>
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
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="myContent">
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
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="form" id="new-form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Image</label>
                        <input type="file" accept="image/jpg, image/png, image/jpeg"  class="form-control" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" is="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.getElementById('categoryMenu').className = "active";

    const form = document.getElementById('new-form')
    form.addEventListener("submit", async function (event) {
        event.preventDefault();
        const title = event.target[0].value;
        const image = event.target[1].files[0];
        const formData = new FormData();
        formData.append("action", "new");
        formData.append("title", title);
        formData.append("image", image);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/categories.php", options).then(res => res.json());
        populateContent();
    });

    async function populateContent() {
        const target = document.getElementById("myContent");
        target.innerHTML = "";
        const res = await fetch("../api/categories.php").then(res => res.json());
        for (let i of res.data) {
            target.innerHTML += `
                    <tr>
                        <td>${i.category_id}</td>
                        <th>${i.title}</th>
                        <td><img style="width: 100px;" src=".${i.image}" alt="Categories 1" /></td>
                        <td><button onClick="deleteItem(${i.category_id})" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                    </tr>
            `
        }
    }

    async function deleteItem(id) {
        const formData = new FormData();
        formData.append("action", "delete");
        formData.append("id", id);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/categories.php", options).then(res => res.json());
        populateContent();
    }

    populateContent();

</script>