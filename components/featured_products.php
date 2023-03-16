<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Featured Product</h1>
                <p>Top selling products</p>
            </div>
        </div>
        <div class="row" id="my-featured-products"></div>
    </div>
</section>

<script>
    const truncateText = (text, n) => {
        const temp = text.split(' ');
        if (temp.length < n) return temp.join(' ');
        return temp.slice(0, n + 1).join(' ') + "...";
    }
    const getFeaturedProduct = async () => {
        const res = await fetch('./api/products.php').then(res => res.json());
        const data = res.data;
        data.filter((i) => i.featured !== "1");
        let myData = "";
        data?.map(i => {
            myData += `
       <div class="col-12 col-md-4 mb-4">
               <div class="card h-100">
                   <a href="shop-single.php?product_id=${i.product_id}">
                       <img src="./assets/img/${i.image}" class="card-img-top" alt="..." />
                   </a>
                   <div class="card-body">
                       <ul class="list-unstyled d-flex justify-content-between">
                           <li>
                               <i class="text-warning fa fa-star"></i>
                               <i class="text-warning fa fa-star"></i>
                               <i class="text-warning fa fa-star"></i>
                               <i class="text-muted fa fa-star"></i>
                               <i class="text-muted fa fa-star"></i>
                           </li>
                           <li class="text-muted text-right">$${i.price}</li>
                       </ul>
                       <a href="shop-single.php?product_id=${i.product_id}" class="h2 text-decoration-none text-dark d-block text-capitalize mb-3">${i.title}</a>
                       <p class="card-text">${truncateText(i.description, 16)}</p>
                   </div>
               </div>
           </div>
       `});
        document.getElementById('my-featured-products').innerHTML = myData;
    }
    getFeaturedProduct();
</script>