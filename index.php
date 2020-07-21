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

.pointer {

cursor: pointer;

}

@import url(https://fonts.googleapis.com/css?family=Lato:700);

.box {
  position: relative;
  max-width: 600px;
  width: 90%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}

/* common */
.ribbon {
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: absolute;
}
.ribbon::before,
.ribbon::after {
  position: absolute;
  z-index: -1;
  content: '';
  display: block;
  border: 5px solid #2980b9;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 225px;
  padding: 15px 0;
  background-color: #3498db;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  font: 700 18px/1 'Lato', sans-serif;
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
}



/* top right*/
.ribbon-top-right {
  top: -10px;
  right: -10px;
}
.ribbon-top-right::before,
.ribbon-top-right::after {
  border-top-color: transparent;
  border-right-color: transparent;
}
.ribbon-top-right::before {
  top: 0;
  left: 0;
}
.ribbon-top-right::after {
  bottom: 0;
  right: 0;
}
.ribbon-top-right span {
  left: -25px;
  top: 30px;
  transform: rotate(45deg);
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

        <?php

        $imageArray = ['assets/img/polyps/ssp.png', 'assets/img/backgrounds/ChromoPolypTransBack.png']

        ?>

        <!-- Header (v1) -->
        <?php if (!$live){?>
        <section class="header-1 section-rotate bg-section-dark" data-offset-top="#header-main">
            <div class="section-inner bg-gradient-dark"></div>
            <!-- SVG illustration -->
            <div class="pt-7 position-absolute middle right-0 col-lg-7 col-xl-6 d-none d-lg-block">
                <figure class="w-75" style="max-width: 1000px;">
                    <img alt="Image placeholder" src="<?php echo $imageArray[array_rand($imageArray)];?>"
                        class="svg-inject img-fluid">
                </figure>
                <p class="text-center text-muted mt-2"><br/>* early bird fee until 1/9/2020, <br/>reductions for trainees, nurses and students</p>
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
                            <a href="<?php echo $registrationURL;?>">
                            <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                    New
                                    </span>
                                <span class="alert-content">Register now</span>
                             </div></a>
                             <a class="ml-3 pointer" data-toggle="modal" data-target="#registerInterest">
                            <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                <i class="fas fa-notes-medical"></i>
                                    </span>
                                <span class="alert-content">COVID-19 statement</span>
                             </div></a>
                                <h2 class="text-white mb-4 mt-4 mt-lg-0">
                                    <span class="display-4 font-weight-light">We can do everyday endoscopy
                                        better.</span>
                                    <span class="d-block" style="color: rgb(238, 194, 120);"><strong
                                            class="font-weight-light">Digital Edition I<br />October 7 & 8
                                            2020</strong><br />streamed in full, live, right here <br />Registration is &euro;100* for 2 days.</span>
                                </h2>
                                <p class="lead text-white">A digital endoscopy symposium in high definition focussed on promoting quality in the
                                    endoscopic interventions we perform everyday.&nbsp;</p>
                                <div class="mt-5">
                                    <a href="https://www.youtube.com/watch?v=I9Y8gC6wtKg"
                                        class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me"
                                        style="background-color: rgb(238, 194, 120);" data-fancybox>
                                        <span class="btn-inner--text">Watch the concept video</span>
                                        <span class="btn-inner--icon"><i class="fas fa-play"></i></span>

                                    </a>
                                  
                                    <!-- <a href="https://www.youtube.com/watch?v=zRy1xwGsagc"
                                        class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mt-2 mr-sm-4 scroll-me"
                                        style="background-color: rgb(238, 194, 120);" data-fancybox>
                                        <span class="badge bg-dark gieqsGold badge-pill">
                                    New
                                    </span>
                                        <span class="btn-inner--text">Watch the latest teaser video</span>
                                        <span class="btn-inner--icon"><i class="fas fa-play"></i></span>

                                    </a> -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php }elseif ($live){?>

<!-- If Livestream-->
<section class="header-1 section-rotate bg-section-dark" data-offset-top="#header-main">
    
    <div class="section-inner bg-gradient-dark"></div>
    <!-- SVG illustration -->
    <div class="pt-7 position-absolute middle right-0 col-lg-7 col-xl-6 d-none d-lg-block">
        <figure class="w-75" style="max-width: 1000px;">
            <img alt="Image placeholder" src="<?php echo $imageArray[array_rand($imageArray)];?>"
                class="svg-inject img-fluid">
        </figure>
<!--         <p class="text-center text-muted mt-2"><br/>* early bird fee until 1/9/2020, <br/>reductions for trainees, nurses and students</p>
 -->    </div>
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
                    <a href="<?php echo $registrationURL;?>">
                    <div class="alert alert-modern alert-dark">
                        <span class="badge gieqsGold badge-pill">
                            New
                            </span>
                        <span class="alert-content">Not yet registered? Click here!</span>
                     </div></a>
                     <a class="ml-3 pointer" data-toggle="modal" data-target="#registerInterest">
                    <!-- <div class="alert alert-modern alert-dark">
                        <span class="badge gieqsGold badge-pill">
                        <i class="fas fa-notes-medical"></i>
                            </span>
                        <span class="alert-content">COVID-19 statement</span>
                     </div></a> -->
                        <h2 class="text-white mb-4 mt-4 mt-lg-0">
                            <span class="display-4 font-weight-light">We can do everyday endoscopy
                                better.</span>
                            <span class="d-block" style="color: rgb(238, 194, 120);"><strong
                                    class="font-weight-light">Digital Edition I<br />Streaming NOW LIVE!<br /><!-- Registration is &euro;100* for 2 days. --></span>
                        </h2>
                        <p class="lead text-white">A digital endoscopy symposium in high definition focussed on promoting quality in the
                            endoscopic interventions we perform everyday.&nbsp;</p>
                        <div class="mt-5">
                            <a href="https://www.youtube.com/watch?v=I9Y8gC6wtKg"
                                class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me"
                                style="background-color: rgb(238, 194, 120);" data-fancybox>
                                <span class="btn-inner--text">Login now to watch!</span>
                                <span class="btn-inner--icon"><i class="fas fa-play"></i></span>

                            </a>
                          
                            <!-- <a href="https://www.youtube.com/watch?v=zRy1xwGsagc"
                                class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mt-2 mr-sm-4 scroll-me"
                                style="background-color: rgb(238, 194, 120);" data-fancybox>
                                <span class="badge bg-dark gieqsGold badge-pill">
                            New
                            </span>
                                <span class="btn-inner--text">Watch the latest teaser video</span>
                                <span class="btn-inner--icon"><i class="fas fa-play"></i></span>

                            </a> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  



     <?php }?>
        <!-- <hr class="divider divider-fade" /> -->
        <section class="slice slice-lg bg-cover bg-size--cover" style="background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/roomview1.png'); background-position: center bottom;">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="card py-5 px-4 box-shadow-3">
                <div class="card-body">
                  <h6 class="h2">
                    <strong>We are adapting to the restrictions around</strong> Coronavirus.
                  </h6>
                  <p class="lead lh-180 mt-4">We will stream the entire conference, in high definition, right here on GIEQs.com.  So it will be just like being here.</p>
                  <p class="lead lh-180 mt-4">We are committed to making the experience feel like you're in the room 1:1 with the endoscopist or lecturer, and to extend live interaction to the digital experience.</p>
                  <p class="lead lh-180 mt-4">And after the congress we will leave all the content on GIEQs learning, so you can watch at your leisure, <strong>free</strong> if you register for the congress.</p>

                  <div class="btn-container mt-5">
                  <a href="https://vimeo.com/433331131" class="btn bg-gieqsGold text-dark rounded-pill btn-icon mt-4" data-fancybox>Discover more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">COVID-19 Statement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
            <div id="videoDisplay mb-3" class="embed-responsive embed-responsive-16by9">
                    <iframe  id='videoChapter' class="embed-responsive-item"
                     allow='autoplay' src='https://player.vimeo.com/video/433331131' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                

                    <p class="h6 mt-5">Things have changed drastically since we started planning GIEQs. <br /> <br/></p>
                    <p class="text-muted">COVID-19 restrictions mean we cannot plan a face-to-face event in 2020.  We have therefore decided to stream the entire congress right here on GIEQs.com. &nbsp;
                    <br/><br/>We remain committed to the face-to-face event and will reschedule this in 2021 and we very much look forward to welcoming you to Ghent!</p>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-small btn-secondary" data-dismiss="modal">Close</button>
                   
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

    function stopVideo() {
  var $frame = $('iframe#videoChapter');

  // saves the current iframe source
  var vidsrc = $frame.attr('src');

  // sets the source to nothing, stopping the video
  $frame.attr('src', '');

  // sets it back to the correct link so that it reloads immediately on the next window open
  $frame.attr('src', vidsrc);
}



    $(document).ready(function() {

        if (signup == '2456') {

            $('#registerInterest').modal('show');

        }

        $('#registerInterest').on('hidden.bs.modal', function(e) {
  stopVideo();
})

        

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