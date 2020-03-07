<!DOCTYPE html>
<html lang="en">

<?php require 'assets/includes/config.inc.php';?>

<head>

      <?php

      //define user access level

      $openaccess = 1;

      require BASE_URI . '/head.php';

      ?>

    <!--Page title-->
    <title>Ghent International Endoscopy Quality Symposium</title>

    <style>

.gieqsGold {

color: rgb(238, 194, 120);

}

    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require 'topbar.php';?>

        <!-- Main navbar -->

        <?php require 'nav.php';?>

        <?php
//set the variable to launch the registration pop-up

//print_r($_GET);

if (isset($_GET['signup'])) {

    $signup = $_GET['signup'];

}

echo '<div id="signup" style="display:none;">' . $signup . '</div>';

?>


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
                            <div><a href="<?php echo $registrationURL;?>" target="_blank">
                            <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                    New
                                    </span>
                                <span class="alert-content">Registration now open!</span>
                             </div></a>
                                <h2 class="text-white mb-4 mt-8 mt-lg-0">
                                    <span class="display-4 font-weight-light">We can do everyday endoscopy
                                        better.</span>
                                    <span class="d-block" style="color: rgb(238, 194, 120);"><strong
                                            class="font-weight-light">Edition I<br />October 7 & 8
                                            2020</strong><br />Ghent, Belgium </span>
                                </h2>
                                <p class="lead text-white">An endoscopy symposium focussed on promoting quality in the
                                    endoscopic interventions we perform everyday</p>
                                <div class="mt-5">
                                    <a href="https://www.youtube.com/watch?v=I9Y8gC6wtKg"
                                        class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me"
                                        style="background-color: rgb(238, 194, 120);" data-fancybox>
                                        <span class="btn-inner--text">Watch the concept video</span>
                                        <span class="btn-inner--icon"><i class="fas fa-play"></i></span>

                                    </a>
                                    <a href="https://www.youtube.com/watch?v=zRy1xwGsagc"
                                        class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mt-2 mr-sm-4 scroll-me"
                                        style="background-color: rgb(238, 194, 120);" data-fancybox>
                                        <span class="badge bg-dark gieqsGold badge-pill">
                                    New
                                    </span>
                                        <span class="btn-inner--text">Watch the latest teaser video</span>
                                        <span class="btn-inner--icon"><i class="fas fa-play"></i></span>

                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <hr class="divider divider-fade" /> -->

        <section class="slice slice-lg mt-1">
            <div class="container">
                <div class="row no-gutters align-items-md-center text-center text-md-left">
                    <div class="card hover-shadow-lg order-2 col-lg-7 ml--100">
                        <div class="card-body p-5">
                            <h4 class="">At GIEQs we believe in quality in endoscopy.</h4>
                            <p class="h6 text-muted text-justify lh-150">
                                Pronounced 'geeks' <sup>1</sup>, GIEQs is dedicated to applying technical competence and
                                published evidence to everything from a diagnostic gastroscopy to a circumferential ESD
                            </p>
                            <p><small class="text-muted"><sup>1</sup> someone who is very interested in a particular
                                    subject and knows a lot about it</small></p>
                            <a href="pages/program/mission.php"
                                class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 mt-2 scroll-me"
                                style="background-color: rgb(238, 194, 120);">
                                <span class="btn-inner--text">Read our mission statement</span>
                                <span class="btn-inner--icon"><i class="fas fa-arrow-right"></i></span>

                            </a>
                        </div>
                    </div>
                    <div class="order-1 col-lg-6 mb-1 mb-lg-0">
                        
                        <img alt="Image placeholder" src="assets/img/backgrounds/hyperplasticTransBack.png"
                            class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </section>
        <!-- <hr class="divider divider-fade" /> -->

        <section class="bg-section-dark slice slice-lg mt-1" id="sct-what-we-do">
            <div class="container">
                <div class="row row-grid">
                    <div class="col-lg-4">
                        <div class="">
                            <div class="pb-5">
                                <div class="icon text-white rounded-circle icon-xl hover-rotate icon-shape shadow"
                                    style="background:rgb(238, 194, 120);">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <h5 class="font-weight-bold">Focussed on the everyday</h5>
                            <p class="mt-2 mb-0">A symposium dedicated to promoting quality in techniques we perform
                                everyday. <br />
                                <ul>Colonoscopy</ul>
                                <ul>Small polypectomy </ul>
                                <ul>Lesion detection at gastroscopy</ul>
                                <ul>Gastrointestinal bleeding</ul>
                                <ul>ERCP</ul>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="">
                            <div class="pb-5">
                                <div class="icon text-white rounded-circle icon-xl hover-rotate icon-shape shadow"
                                    style="background:rgb(238, 194, 120);">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            </div>
                            <h5 class="font-weight-bold">Unique stream for trainees</h5>
                            <p class="mt-2 mb-0">Trainees are future endoscopists. Endoscopy is an apprenticeship. The
                                better we train, the higher the quality of future everyday examinations.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="">
                            <div class="pb-5">
                                <div class="icon text-white rounded-circle icon-xl hover-rotate icon-shape shadow"
                                    style="background:rgb(238, 194, 120);">
                                    <i class="fas fa-user-nurse"></i>
                                </div>
                            </div>
                            <h5 class="font-weight-bold">Separate nursing symposium</h5>
                            <p class="mt-2 mb-0">Endoscopy is performed in a team. Here's to the other half of that
                                team. Your own half-day symposium</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo BASE_URL; ?>/pages/program/program.php"
                    class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me mt-3"
                    style="background-color: rgb(238, 194, 120);">
                    <span class="btn-inner--text">Explore the draft programme</span>
                    <span class="btn-inner--icon"><i class="fas fa-arrow-right"></i></span>

                </a>
            </div>
        </section>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="registerInterest" tabindex="-1" role="dialog" aria-labelledby="registerInterestLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">Thank-you for
                        your interest in GIEQs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="h6">Registration will open in late January 2020. <br /> </span><span>Prior to this you
                        can register your interest below and we will keep you updated on everything GIEQs.</span>
                    <hr>
                    <form id='pre-register'>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="please enter your name">
                            </div>
                            <label for="email">Email address:</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="please enter your email address">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <span>Your email address will only be used to update you on GIEQs</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-small btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitPreRegister" type="button" class="btn-small text-black"
                        style="background-color: rgb(238, 194, 120);">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
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
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>


    <script>
    var signup = $('#signup').text();

    function submitPreRegisterForm() {

        var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null, "0"); //insert new object

        esdLesionObject.done(function(data) {

            console.log(data);

            var dataTrim = data.trim();

            console.log(dataTrim);

            if (dataTrim) {

                try {

                    dataTrim = parseInt(dataTrim);

                    if (dataTrim > 0) {

                        alert("Thank you for your details.  We will keep you updated on everything GIEQs.");
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });

                    }

                } catch (error) {

                    //data not entered
                    console.log('error parsing integer');
                    $("[data-dismiss=modal]").trigger({
                        type: "click"
                    });


                }

                //$('#success').text("New esdLesion no "+data+" created");
                //$('#successWrapper').show();
                /* $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
                  $("#successWrapper").slideUp(500);
                });
                edit = 1;
                $("#id").text(data);
                esdLesionPassed = data;
                fillForm(data); */




            } else {

                alert("No data inserted, try again");

            }


        });
    }

    $(document).ready(function() {

        if (signup == '2456') {

            $('#registerInterest').modal('show');

        }

        $(document).on('click', '#submitPreRegister', function() {

            event.preventDefault();
            $('#pre-register').submit();

        })

        $("#pre-register").validate({

            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                console.log("there were " + errors + " errors");
                if (errors) {
                    var message = errors == 1 ?
                        "1 field contains errors. It has been highlighted" :
                        +errors + " fields contain errors. They have been highlighted";


                    $('#error').text(message);
                    //$('div.error span').addClass('form-text text-danger');
                    //$('#errorWrapper').show();

                    $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
                        $("#errorWrapper").slideUp(500);
                    });
                } else {
                    $('#errorWrapper').hide();
                }
            },
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },

            },
            submitHandler: function(form) {

                submitPreRegisterForm();

                //console.log("submitted form");



            }




        });


    })
    </script>
</body>

</html>