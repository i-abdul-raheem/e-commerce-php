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
                <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="form" id="new-form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
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
                        <input type="file" accept="image/jpg, image/png, image/jpeg" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('bannerMenu').className = "active";

    const form = document.getElementById('new-form')
    form.addEventListener("submit", async function (event) {
        event.preventDefault();
        const heading = event.target[0].value;
        const sub_heading = event.target[1].value;
        const details = event.target[2].value;
        const image = event.target[3].files[0];
        const formData = new FormData();
        formData.append("action", "new");
        formData.append("heading", heading);
        formData.append("sub_heading", sub_heading);
        formData.append("details", details);
        formData.append("image", image);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/banner.php", options).then(res => res.json());
        populateContent();
        document.getElementById('closeModal').click();
    });

    async function populateContent() {
        const target = document.getElementById("myContent");
        target.innerHTML = "";
        const res = await fetch("../api/banner.php").then(res => res.json());
        for (let i of res.data) {
            target.innerHTML += `
            <tr>
                <td>${i.banner_id}</td>
                <th>${i.heading}</th>
                <th>${i.sub_heading}</th>
                <td><img style="width: 100px;" src=".${i.image}" alt="Banner 1" /></td>
                <td><button onClick="deleteItem('${i.banner_id}')" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
            </tr>
            `
        }
    }

    async function deleteItem(id) {
        const formData = new FormData();
        formData.append("action", "delete");
        formData.append("id", id);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/banner.php", options).then(res => res.json());
        populateContent();
    }

    populateContent();

</script>