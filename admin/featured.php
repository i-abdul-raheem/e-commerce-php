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
                        <th>Category</th>
                        <th>Featured</th>
                    </tr>
                </thead>
                <tbody id="myContent">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('featuredMenu').className = "active";

    async function populateContent() {
        const target = document.getElementById("myContent");
        target.innerHTML = "";
        const res = await fetch("../api/products.php").then(res => res.json());
        for (let i of res.data) {
            target.innerHTML += `
                    <tr>
                        <td>${i.product_id}</td>
                        <th>${i.title}</th>
                        <td><img style="width: 100px;" src="../assets/img/${i.image}" alt="Banner 1" /></td>
                        <td id="cat-${i.product_id}"></td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input onclick="toggleCheck(${i.product_id})" type="checkbox" class="custom-control-input" id="check-${i.product_id}" ${i.featured == 1 && 'checked'} />
                            </div>
                        </td>
                    </tr>
        `;
            getCategoryName(i.category, i.product_id);
        }
    }

    async function activateFeature(id) {
        const formData = new FormData();
        formData.append("action", "update-featured");
        formData.append("id", id);
        formData.append("featured", 1);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/products.php", options).then(res => res.json());
    }

    async function deactivateFeature(id) {
        const formData = new FormData();
        formData.append("action", "update-featured");
        formData.append("id", id);
        formData.append("featured", 0);
        const options = { method: "POST", body: formData }
        const res = await fetch("../api/products.php", options).then(res => res.json());
    }

    function toggleCheck(id) {
        if(document.getElementById(`check-${id}`).checked) {
            activateFeature(id);
        } else {
            deactivateFeature(id);
        }
    }

    async function getCategoryName(id, ref) {
        const res = await fetch(`../api/categories.php?id=${id}`).then(res => res.json());
        document.getElementById(`cat-${ref}`).innerHTML = res?.data?.title || '-';
    }
    populateContent();
</script>