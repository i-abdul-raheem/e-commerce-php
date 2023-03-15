<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categories</h1>
            <p>Most Popular Categories</p>
        </div>
    </div>
    <div class="row" id="top-categories">

    </div>
</section>

<script>
    const updateCategories = async () => {
        const res = await fetch('./api/categories.php').then(res => res.json());
        let topCategories = "";
        res?.data.map((i, index) => {
            topCategories += `
            <div key="top-category-${index}" class="col-12 col-md-4 p-5 mt-3">
                <a href="shop.php?category=${i.category_id}"><img src="${i.image}" class="rounded-circle img-fluid border" /></a>
                <h5 style="text-transform: capitalize;" class="text-center mt-3 mb-3">${i.title}</h5>
                <p class="text-center"><a href="shop.php?category=${i.category_id}" class="btn btn-success">Go Shop</a></p>
            </div>
            `;
        });
        document.getElementById('top-categories').innerHTML = topCategories;
    }
    updateCategories();
</script>

<!-- End Categories of The Month -->