<!DOCTYPE html>
<html lang="en">

<?php require 'assets/includes/config.inc.php';?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Purpose is a unique and beautiful collection of UI elements that are all flexible and modular. A complete and customizable solution to building the website of your dreams.">
    <meta name="author" content="Webpixels">
    <title>Ghent International Endoscopy Symposium</title>
    <?php require 'head.php';?>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        
        <!-- Topbar -->

        <?php require 'topbar.php';?>

        <!-- Main navbar -->

        <?php require 'nav.php';?>

    </header>
    
    <!-- Omnisearch -->
    <div id="omnisearch" class="omnisearch">
        <div class="container">
            <!-- Search form -->
            <form class="omnisearch-form">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </form>
            <div class="omnisearch-suggestions">
                <h6 class="heading">Search Suggestions</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>iphone 8</span> in Smartphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>beats pro solo 3</span> in Headphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>smasung galaxy 10</span> in Phones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <!-- Header (v1) -->
        <section class="header-1 section-rotate bg-section-dark" data-offset-top="#header-main">
            <div class="section-inner bg-gradient-dark"></div>
            <!-- SVG illustration -->
            <div class="pt-7 position-absolute middle right-0 col-lg-7 col-xl-6 d-none d-lg-block">
                <figure class="w-75" style="max-width: 1000px;">
                    <img alt="Image placeholder" src="assets/img/backgrounds/ChromoPolypTransBack.png"
                        class="svg-inject img-fluid">
                </figure>
            </div>
            <!-- SVG background -->
            <!--<div class="bg-absolute-cover bg-size--contain d-flex align-items-center">
        <figure class="w-100 d-none d-lg-block">
          <img alt="Image placeholder" src="assets/img/svg/backgrounds/bg-4.svg" class="svg-inject" style="height: 1000px;">
        </figure>
      </div>-->
            <!-- Hero container -->
            <div class="container py-5 pt-lg-6 d-flex align-items-center position-relative zindex-100">
                <div class="col">
                    <div class="row">
                        <div class="col-lg-5 col-xl-6 text-center text-lg-left">
                            <div class="d-none d-lg-block mb-4">

                            </div>
                            <div>
                                <h2 class="text-white mb-4">
                                    <span class="display-4 font-weight-light">We can do everyday endoscopy
                                        better.</span>
                                    <span class="d-block" style="color: rgb(238, 194, 120);"><strong
                                            class="font-weight-light">Edition I<br/>October 7 & 8 2020</strong><br/>Ghent, Belgium </span>
                                </h2>
                                <p class="lead text-white">An endoscopy symposium focussed on promoting quality in the
                                    endoscopic interventions we perform everyday</p>
                                <div class="mt-5">
                                    <a href="https://www.youtube.com/watch?v=I9Y8gC6wtKg"
                                        class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me"
                                        style="background-color: rgb(238, 194, 120);" data-fancybox>
                                        <span class="btn-inner--text">Watch the teaser video</span>
                                        <span class="btn-inner--icon"><i class="fas fa-play"></i></span>

                                    </a>
                                    <!--<a href="#sct-features" class="btn btn-outline-white rounded-pill hover-translate-y-n3 btn-icon d-none d-xl-inline-block scroll-me">
                    <span class="btn-inner--icon"><i class="fas fa-file-alt"></i></span>
                    <span class="btn-inner--text">More Features</span>
                  </a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </section>
    </div>

    <?php require 'footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="assets/js/purpose.core.js"></script>
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
    <!-- Purpose JS -->
    <script src="assets/js/purpose.js"></script>
    <!-- Demo JS - remove it when starting your project -->
    <script src="assets/js/demo.js"></script>
</body>

</html>