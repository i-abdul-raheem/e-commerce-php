<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">
                    ZarSaw Traders
                </h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        <?php echo COMPANY_ADDRESS; ?>
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:<?php echo COMPANY_PHONE; ?>"><?php echo COMPANY_PHONE; ?></a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">
                    Navigate to
                </h2>
                <ul class="list-unstyled text-light footer-link-list" id="footer-nav">

                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">
                    Supporting Documents
                </h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Privacy Policy</a></li>
                    <li><a class="text-decoration-none" href="#">Terms & Conditions</a></li>
                    <li><a class="text-decoration-none" href="#">FAQs</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="<?php echo FACEBOOK; ?>"><i
                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="<?php echo INSTAGRAM; ?>"><i
                                class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="<?php echo TWITTER; ?>"><i
                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="<?php echo LINKEDIN; ?>"><i
                                class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                        placeholder="Email address" />
                    <div class="input-group-text btn-success text-light">
                        Subscribe
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2023 <?php echo SITE_TITLE; ?> | Powered by
                        <a rel="sponsored" href="https://github.com/i-abdul-raheem/" target="_blank">ConsoleDot</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    const getFooterNavs = async () => {
        const res = await fetch("./assets/json/header-nav.json").then(res => res.json());
        let headerNav = "";
        res?.map((i, index) => {
            headerNav += `
            <li key="footer-nav-${index}"><a class="text-decoration-none" href="${i.path}">${i.title}</a></li>
            `;
        });
        document.getElementById('footer-nav').innerHTML = headerNav;
    }
    getFooterNavs();
</script>