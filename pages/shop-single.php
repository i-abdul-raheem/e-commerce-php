<?php
require('./components/start.php');
require('./components/top_nav.php');
require('./components/cart.php');
require('./components/header.php');
require('./components/search_modal.php');
?>

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img id="product-image" class="card-img img-fluid" src="assets/img/" alt="Card image cap"
                        id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                        data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">

                                    <!-- Image 1 fo 3 -->
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_10.jpg"
                                                alt="Product Image 1">
                                        </a>
                                    </div>
                                    <!-- End Image 1 fo 3 -->
                                </div>
                            </div>
                            <!-- First slide-->

                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2 text-capitalize" id="product-title"></h1>
                        <p class="h3 py-2" id="product-price"></p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted text-capitalize"><strong id="product-brand"></strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p id="product-description"></p>
                        <ul class="list-inline" id="colors-div">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <select name="color" id="product-color" class="form-select">
                                    <option value="">Select color...</option>
                                </select>
                            </li>
                        </ul>

                        <h6>Specification:</h6>
                        <ul class="list-unstyled pb-3" id="product-specification">
                        </ul>

                        <form action="" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto" id="sizes-div">
                                    <ul class="list-inline pb-3" id="product-size">
                                        <li class="list-inline-item">Size :
                                            <input type="hidden" name="product-size" id="product-size-val" value="">
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success"
                                                id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary"
                                                id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success"
                                                id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit"
                                        value="buy">Buy</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit"
                                        value="addtocard">Add To Cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Related Products</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div class="row" id="carousel-related-product"></div>


    </div>
</section>
<!-- End Article -->

<script>
    const getProductDetails = async () => {
        const res = await fetch(`./api/products.php${window.location.search}`).then(res => res.json());
        const data = res?.data;
        const setValueById = (id, value) => {
            document.getElementById(id).innerHTML = value;
        }
        const setBrandTitle = async (id) => {
            const res = await fetch(`./api/brands.php?id=${id}`).then(res => res.json());
            setValueById("product-brand", res?.data?.title);
        }
        const getRelatedProducts = async (id) => {
            const res = await fetch(`./api/products.php?category=${id}`).then(res => res.json());
            const data = res?.data;
            const truncateText = (text, n) => {
                const temp = text.split(' ');
                if (temp.length < n) return temp.join(' ');
                return temp.slice(0, n + 1).join(' ') + "...";
            }
            if (data && data.length > 0) {
                let myData = "";
                data.map(i => {
                    myData += `
                    <div class="p-2 col-md-4 mb-3" style="height: 550px">
                        <div class="card h-100 product-wap rounded-0">
                            <div class="card border-0 rounded-0">
                                <a href="shop-single.php?product_id=${i.product_id}">    
                                    <img class="card-img rounded-0 img-fluid" src="assets/img/${i.image}" />
                                </a>
                            </div>
                            <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="shop-single.php?product_id=${i.product_id}" class="h3 text-decoration-none text-capitalize">${i.title}</a>
                                <p class="text-center mb-0">$${i.price}</p>
                                </div>
                            <hr />
                            <div>
                                <p>${truncateText(i.description, 16)}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                document.getElementById('carousel-related-product').innerHTML = myData;
                $('#carousel-related-product').slick({
                    infinite: true,
                    arrows: false,
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    dots: true,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 3
                        }
                    }
                    ]
                });
            } else {
                document.getElementById('carousel-related-product').innerHTML = "No related products found";
            }
        }
        const setProductColors = async (product) => {
            const res = await fetch(`./api/product_colors.php?product=${product}`).then(res => res.json());
            const data = res.data;
            if (data && data.length > 0)
                data.map(i => {
                    document.getElementById('product-color').innerHTML += `<option value="${i.color_id}">${i.title}</option>`
                })
            else document.getElementById('colors-div').style.display = 'none';
        }
        const setProductSizes = async (product) => {
            const res = await fetch(`./api/product_sizes.php?product=${product}`).then(res => res.json());
            const data = res.data;
            if (data && data.length > 0) {
                data.map(i => {
                    document.getElementById('product-size').innerHTML +=
                        `
                        <li class="list-inline-item">
                            <span
                                id="product-size-id-${i.size_id}"
                                class="mySizeBtn btn border-secondary btn-size"
                                onclick="setAciveColor(${i.size_id}, this)"
                            >
                                ${i.title}
                            </span>
                        </li>
                        `
                });

                const mySizeBtns = document.querySelectorAll('.mySizeBtn');
                mySizeBtns.forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const inActiveBtns = document.getElementsByClassName('mySizeBtn');
                        for (let i = 0; i < inActiveBtns.length; i++) {
                            inActiveBtns[i].classList.remove("btn-success");
                            inActiveBtns[i].classList.add("border-secondary");
                        }
                        e.target.classList.add('btn-success');
                        e.target.classList.remove('border-secondary');
                    })
                });
            }
            else document.getElementById('sizes-div').style.display = 'none';
        }
        document.getElementById("product-image").src += data.image;
        setValueById("product-title", data.title);
        setValueById("product-price", `$${data.price}`);
        setProductColors(data.product_id);
        setProductSizes(data.product_id);
        setValueById("product-description", data.description);
        setValueById("product-specification", data.specification);
        setBrandTitle(data.brand);
        getRelatedProducts(data.category);
    }
    const setAciveColor = (id) => {
        document.getElementById('product-size-val').value = id;
    }
    getProductDetails();

</script>

<?php

require('./components/brands.php');
require('./components/footer.php');
require('./components/end.php');

?>