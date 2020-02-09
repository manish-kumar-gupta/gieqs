<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/head.php';

?>
    <title>Ghent International Endoscopy Symposium - Login </title>
  
    <style>
        .text-gieqsGold {

color: rgb(238, 194, 120);

               }
               .bg-gieqsGold {

background-color: rgb(238, 194, 120);

}
      .modal-backdrop
      {
          opacity:0.75 !important;
      }
      @media screen and (max-width: 400px) {
        
        
        .scroll{

          font-size: 1em;

          }

          .h5{

          font-size: 1em;
          }

          .tiny {
          font-size: 0.75em;

          }

          .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
          }
      }
    

    </style>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>

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

       
  <div class="main-content">
    <section class="slice slice-lg min-vh-100 d-flex align-items-center bg-gradient-dark">
      <!-- SVG background -->
      <div class="bg-absolute-cover bg-size--contain d-none d-lg-block">
        <figure class="w-100">
          <img alt="Image placeholder" src="../../assets/img/svg/backgrounds/bg-3.svg" class="svg-inject">
        </figure>
      </div>
      <div class="container py-5 px-md-0 d-flex align-items-center">
        <div class="w-100">
          <div class="row row-grid justify-content-center justify-content-lg-between align-items-center">
            <div class="col-sm-8 col-lg-6 col-xl-5 order-lg-2">
              <div class="card shadow zindex-100 mb-0">
                <div class="card-body px-md-5 py-5">
                  <div class="mb-5">
                    <h6 class="h3">Login</h6>
                    <p class="text-muted mb-0">Sign in to your account to continue.</p>
                  </div>
                  <span class="clearfix"></span>
                  <form role="form">
                    <div class="form-group">
                      <label class="form-control-label">Email address</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" class="form-control" id="input-email" placeholder="name@example.com">
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <div class="d-flex align-items-center justify-content-between">
                        <div>
                          <label class="form-control-label">Password</label>
                        </div>
                        <div class="mb-2">
                          <a href="#!" class="small text-muted text-underline--dashed border-primary">Lost password?</a>
                        </div>
                      </div>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="input-password" placeholder="Password">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="fas fa-eye"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4"><button type="button" class="btn btn-sm btn-primary btn-icon rounded-pill">
                        <span class="btn-inner--text">Sign in</span>
                        <span class="btn-inner--icon"><i class="fas fa-long-arrow-alt-right"></i></span>
                      </button></div>
                  </form>
                </div>
                <div class="card-footer px-md-5"><small>Registration is currently by invitation only</small>
                  <!-- <a href="#" class="small font-weight-bold">Create account</a> --></div>
              </div>
            </div>
            <div class="col-lg-5 order-lg-1 d-none d-lg-block">
              <blockquote>
                <h3 class="h2 mb-4">We can do everyday endoscopy better.</h3>
                <footer>— <cite class="text-lg">GIEQs 2020</cite></footer>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php require BASE_URI . '/footer.php';?>

<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<!-- <script src="../../assets/js/purpose.core.js"></script>
 --><!-- Page JS -->
<script src="../../assets/libs/swiper/dist/js/swiper.min.js"></script>
<script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="../../assets/libs/typed.js/lib/typed.min.js"></script>
<script src="../../assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="../../assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
<!-- Google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
<!-- Purpose JS -->
<script src="../../assets/js/purpose.js"></script>
<!-- Demo JS - remove it when starting your project -->
<script src="../../assets/js/demo.js"></script>

<script>

</script>
</body>

</html>