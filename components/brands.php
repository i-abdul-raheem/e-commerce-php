<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Brands</h1>
                <p>We deal with the most trusted brands worldwide</p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example"
                            data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row" id="brand-div">
                                    </div>
                                </div>
                                <!--End First slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Brands-->

<script>
    const updateBrands = async () => {
        const res = await fetch('./api/brands.php').then(res => res.json());
        let topBrands = "";
        res?.data.map((i, index) => {
            if ((index + 1) % 4 === 0 && index !== res.data.length - 1) {
                topBrands += `
                            <div key="brand-${index}" class="col-3 p-md-5">
                                <img class="img-fluid brand-img" src="${i.image}"
                                    alt="${i.title}">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row" id="brand-div">
                `;
            }
            else if ((index + 1) % 4 === 0 && index === res.data.length - 1) {
                topBrands += `
                            <div key="brand-${index}" class="col-3 p-md-5">
                                <img class="img-fluid brand-img" src="${i.image}"
                                    alt="${i.title}">
                            </div>
                        </div>
                    </div>
                `;
            } else {
                topBrands += `
                <div key="brand-${index}" class="col-3 p-md-5">
                    <img class="img-fluid brand-img" src="${i.image}"
                        alt="${i.title}">
                </div>
                `;
            }
        });
        document.getElementById('brand-div').innerHTML = topBrands;
    }
    updateBrands();
</script>