<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 6;
$users = new users;

require BASE_URI . '/head.php';

?>
    <title>Ghent International Endoscopy Symposium - Welcome </title>
  
    <style>

      /* Change the white to any color ;) */
input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active  {
    -webkit-box-shadow: 0 0 0 30px blue inset !important;
}

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
        
        input {

          padding-left: 10px !important;

        }
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
        <div class="container mt-4 min-vh-100 d-flex align-items-center">
          <div class="col py-5">
            <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6">
                <div>
                  <div class="mb-5 text-center">
                    <h6 class="h3">Welcome <?php $users->Load_from_key($userid); echo $users->getfirstname() . ' ' . $users->getsurname();?></h6>
                    <p class="text-muted mb-0">To a new world of Endoscopy Learning.</p>
                  </div>
                  <div class="mb-5 text-center">
                   
                    <p class="text-white mb-0">Thanks for verifying your email address.  You have been logged in.</p>
                  </div>
                  
                    <div class="mt-4">
                      <a href="<?php echo BASE_URL . '/pages/learning/index.php'?>"><button type="button" class="btn btn-block text-dark bg-gieqsGold">Continue to GIEQs online</button></a>
                    </div>
                  
              </div>
            </div>
          </div>
        </div>
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