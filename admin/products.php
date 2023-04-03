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
                        <th>Cateegory</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Specifications</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="form" id="new-form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" id="category-options">
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <select class="form-control" id="brand-options">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.getElementById('productMenu').className = "active";

    const form = document.getElementById('new-form')
    form.addEventListener("submit", async function (event) {
        event.preventDefault();
        const title = event.target[0].value;
        const price = event.target[1].value;
        const category = event.target[2].value;
        const brand = event.target[3].value;
        const description = event.target[4].value;
        const specification = event.target[5].value;
        const image = event.target[6].files[0];
        const formData = new FormData();
        formData.append("action", "new");
        formData.append("title", title);
        formData.append("price", price);
        formData.append("category", category);
        formData.append("brand", brand);
        formData.append("description", description);
        formData.append("specification", specification);
        formData.append("image", image);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/products.php", options).then(res => res.json());
        console.log(res);
        populateContent();
    });

    async function getCategoryName(id, ref) {
        const res = await fetch(`../api/categories.php?id=${id}`).then(res => res.json());
        document.getElementById(`cat-${ref}`).innerHTML = res?.data?.title || '-';
    }

    async function getBrandName(id, ref) {
        const res = await fetch(`../api/brands.php?id=${id}`).then(res => res.json());
        document.getElementById(`brand-${ref}`).innerHTML = res?.data?.title || '-';
    }

    async function setCategories() {
        const res = await fetch("../api/categories.php").then(res => res.json());
        const data = res?.data || [];
        data.map((i) => {
            document.getElementById("category-options").innerHTML += `<option value="${i.category_id}">${i.title}</option>`
        })
    }

    async function setBrands() {
        const res = await fetch("../api/brands.php").then(res => res.json());
        const data = res?.data || [];
        data.map((i) => {
            document.getElementById("brand-options").innerHTML += `<option value="${i.brand_id}">${i.title}</option>`
        })
    }

    async function populateContent() {
        const target = document.getElementById("myContent");
        target.innerHTML = "";
        const res = await fetch("../api/products.php").then(res => res.json());
        for (let i of res.data) {
            target.innerHTML += `
                    <tr>
                        <td>${i.product_id}</td>
                        <td style="text-transform: capitalize;" >${i.title}</td>
                        <td style="text-transform: capitalize;" id="cat-${i.product_id}"></td>
                        <td><img style="width: 100px;" src="../assets/img/${i.image}" alt="${i.title}" /></td>
                        <td>$${i.price}</td>
                        <td style="text-transform: capitalize;" id="brand-${i.product_id}"></td>
                        <td>${i.description}</td>
                        <td>${i.specification}</td>
                        <td><button onclick="deleteItem(${i.product_id})" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></button></td>
                    </tr>
            `;
            getCategoryName(i.category, i.product_id);
            getBrandName(i.brand, i.product_id);
        }
    }

    async function deleteItem(id) {
        const formData = new FormData();
        formData.append("action", "delete");
        formData.append("id", id);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/products.php", options).then(res => res.json());
        populateContent();
    }

    populateContent();
    setCategories();
    setBrands();
</script>