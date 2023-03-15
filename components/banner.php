<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators" id="_id-carousel-indicators">
        <!-- Single dash -->
        <!-- End Single dash -->
    </ol>
    <div class="carousel-inner" id="_id-carousel-inner">
        <!-- Single Item -->
        <!-- End Single Item -->
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->

<script>
    const get_banners = async () => {
        const res = await fetch('./api/banner.php').then(res => res.json());
        let carouselIndicators = "";
        let carouselInner = "";
        res?.data.map((i, index) => {
            carouselIndicators += `
            <li key="carousel-indicator-${index}" data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" 
            class="${index === 0 ? "active" : ''}"></li>`;
            carouselInner += `
            <div key="carousel-inner-${index}" class="carousel-item ${index === 0 ? "active" : ''}">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="${i.image}" alt="" />
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b style="text-transform: uppercase;">${i.heading}</b></h1>
                                <h3 class="h2">${i.sub_heading}</h3>
                                <p>${i.details}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
        })
        document.getElementById('_id-carousel-indicators').innerHTML = carouselIndicators;
        document.getElementById('_id-carousel-inner').innerHTML = carouselInner;
    }
    get_banners();
</script>