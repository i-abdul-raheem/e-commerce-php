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
                <h5 class="modal-title" id="exampleModalLabel">Add Product Size</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="form" id="new-form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product</label>
                        <select class="form-control" id="product-options">
                            <option value="">Select Product*</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Size</label>
                        <input type="text" class="form-control" />
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
    document.getElementById('sizeMenu').className = "active";

    const form = document.getElementById('new-form')
    form.addEventListener("submit", async function (event) {
        event.preventDefault();
        const product = event.target[0].value;
        const title = event.target[1].value;
        const formData = new FormData();
        formData.append("action", "new");
        formData.append("product", product);
        formData.append("title", title);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/product_sizes.php", options).then(res => res.json());
        populateContent();
    });

    async function setProducts() {
        const res = await fetch("../api/products.php").then(res => res.json());
        const data = res?.data || [];
        data.map((i) => {
            document.getElementById("product-options").innerHTML += `<option value="${i.product_id}">${i.title}</option>`
        })
    }

    async function populateContent() {
        const target = document.getElementById("myContent");
        target.innerHTML = "";
        const res = await fetch("../api/product_sizes.php").then(res => res.json());
        for (let i of res.data) {
            target.innerHTML += `
                <tr>
                    <td>${i.size_id}</td>
                    <td id="product-${i.size_id}"></td>
                    <td>${i.title}</td>
                    <td><button onClick="deleteItem(${i.size_id})" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                </tr>
        `;
            getProductName(i.product, i.size_id);
        }
    }


    async function getProductName(id, ref) {
        const res = await fetch(`../api/products.php?product_id=${id}`).then(res => res.json());
        document.getElementById(`product-${ref}`).innerHTML = res?.data?.title || '-';
    }

    async function deleteItem(id) {
        const formData = new FormData();
        formData.append("action", "delete");
        formData.append("id", id);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/product_sizes.php", options).then(res => res.json());
        populateContent();
    }

    populateContent();
    setProducts();
</script>