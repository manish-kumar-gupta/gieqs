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

$debug = false;

if (isset($_GET['signup'])) {

    $signup = $_GET['signup'];

}

echo '<div id="signup" style="display:none;">' . $signup . '</div>';

//date stuff

                                    $now = $currentTime;


                                    $sessionTimeFrom = new DateTime('2020-10-08 19:30:00', $serverTimeZone);
                                    $startdate = $sessionTimeFrom;

                                    

                                    if ($debug){

                                        echo 'comparing start date ';
                                        print_r($startdate);
            
                                        echo 'with current time';
                                        print_r($currentTime);
                                    }

                                    $current = false;
                                    $past = false;

                                

                                    if($startdate <= $now) {
                                        $past = true;
                                        
                                    }else{
                                        $past = false;
                                    }

                                    if ($debug){

                                        echo 'SESSION is ';
                                        if ($past == true){

                                            echo 'past';
                                        }

                                        if ($past == false){

                                            echo 'not past';
                                        }

                                        if ($current == false){

                                            echo 'not current';
                                        }

                                        if ($current == true){

                                            echo 'current';
                                        }

                                        echo PHP_EOL;
                                    }

                                    

?>


    </header>

    
    <div class="main-content">

    <section class="header-1 section-rotate bg-section-dark mt-5" data-offset-top="#header-main">
            <div class="section-inner bg-gradient-dark"></div>
            <!-- SVG illustration -->
            <div class="pt-7 position-absolute middle right-0 col-lg-7 col-xl-6 d-none d-lg-block">
                <figure class="w-75" style="max-width: 1000px;">
                    <img alt="Image placeholder" src="https://www.gieqs.com/assets/img/backgrounds/gieqs2ii.png"
                        class="svg-inject img-fluid">
                        <!-- <figcaption class="small figure-caption text-right">Non-granular transverse colon large non-pedunculated colorectal polyp.  <br/>Suspicious for submucosal invasive cancer. </figcaption> -->
                </figure>
            </div>
            <!-- SVG background -->
            <!--<div class="bg-absolute-cover bg-size--contain d-flex align-items-center">
        <figure class="w-100 d-none d-lg-block">
          <img alt="Image placeholder" src="assets/img/svg/backgrounds/bg-4.svg" class="svg-inject" style="height: 1000px;">
        </figure>
      </div>-->
            <!-- Hero container -->
            <div class="container  d-flex align-items-center position-relative zindex-100">
               
                <div class="col">
                <div class="row">
                        <div class="col-lg-10 col-xl-10 text-center text-lg-left">
                        <a href="https://www.gieqs.com/pages/program/gieqs_ii.php">
                            <div class="alert alert-modern alert-dark">
                            <span class="badge gieqsGold badge-pill">
                                New
                                    </span>
                                <span class="alert-content">GIEQs II Registration Open</span>
                             </div></a>
                        <a href="https://www.gieqs.com/pages/program/program_imaging.php">
                            <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                    New
                                    </span>
                                <span class="alert-content">Live / Virtual Hybrid Courses</span>
                             </div></a>
                        
                             <a class="ml-3 pointer" data-toggle="modal" data-target="#accreditation">
                            <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                <i class="fas fa-notes-medical"></i>
                                    </span>
                               
                                <span class="alert-content">CME accreditation</span>
                             </div></a>
                            
<!--                              <div class="countdown" data-countdown-date="10/07/2020" data-countdown-label="hide"></div>
 --><!--                              <div class="countdown countdown-blocks" data-countdown-date="10/07/2020"></div>
 -->                        </div>
        </div>
                    <div class="row">
                        <div class="col-lg-5 col-xl-6 text-center text-lg-left">
                            <div class="d-none d-lg-block mb-4">

                            </div>
                            
                                <h2 class="text-white mb-4 mt-4 mt-lg-0">
                                    <span class="display-4 font-weight-light">GIEQs II.  Registration Now Open!</span>
                                     
                                    <span class="d-block" style="color: rgb(238, 194, 120);"><strong
                                            class="font-weight-light">Endoscopy in HD. Virtual Edition.<br/> Join us for step 2 of the Everyday Endoscopy Revolution.</span>
                                </h2>
                                <p class="lead text-white">The highly anticipated Second Edition of the Ghent International Endoscopy Quality Symposium will be held 30 September / 1 October 2021.</p>
                                <div class="mt-5">

                                        
                                    <a href="https://www.gieqs.com/pages/program/gieqs_ii.php"
                                        class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me"
                                        style="background-color: rgb(238, 194, 120);">
                                        <span class="btn-inner--text">Find Out More + Register for GIEQs II<sup></sup></span>
                                        <span class="btn-inner--icon"><i class="fas fa-arrow-right"></i></span>

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

        <?php

        $imageArray = ['assets/img/polyps/ssp.png', 'assets/img/backgrounds/ChromoPolypTransBack.png', 'assets/img/covers/bleeding/heaterNonLive.png']

        ?>

        <?php if (!$past){?>

        <!-- Header (v1) -->
        <?php if (!$live){
            
            
            
            ?>
        <section class="section-rotate bg-section-dark" data-offset-top="#header-main">
            <div class="section-inner bg-gradient-dark"></div>
            <!-- SVG illustration -->
            <div class="pt-7 position-absolute middle right-0 col-lg-7 col-xl-6 d-none d-lg-block">
                <figure class="w-75" style="max-width: 1000px;">
                    <img alt="Image placeholder" src="<?php echo $imageArray[array_rand($imageArray)];?>"
                        class="svg-inject img-fluid">
                </figure>
                <p class="text-center text-muted mt-2"><br/>* early bird fee EXTENDED until 24/9/2020, <br/>reductions for trainees, nurses and students</p>
            </div>
            <!-- SVG background -->
            <!--<div class="bg-absolute-cover bg-size--contain d-flex align-items-center">
        <figure class="w-100 d-none d-lg-block">
          <img alt="Image placeholder" src="assets/img/svg/backgrounds/bg-4.svg" class="svg-inject" style="height: 1000px;">
        </figure>
      </div>-->
            <!-- Hero container -->
            <div class="container  d-flex align-items-center position-relative zindex-100">
               
                <div class="col">
                <div class="row">
                        <div class="col-lg-10 col-xl-10 text-center text-lg-left">
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
                             <a class="ml-3 pointer" data-toggle="modal" data-target="#accreditation">
                            <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                <i class="fas fa-certificate"></i>
                                    </span>
                                <span class="alert-content">CME accreditation</span>
                             </div></a>
                            
<!--                              <div class="countdown" data-countdown-date="10/07/2020" data-countdown-label="hide"></div>
 --><!--                              <div class="countdown countdown-blocks" data-countdown-date="10/07/2020"></div>
 -->                        </div>
        </div>
                    <div class="row">
                        <div class="col-lg-5 col-xl-6 text-center text-lg-left">
                            <div class="d-none d-lg-block mb-4">

                            </div>
                            
                                <h2 class="text-white mb-4 mt-4 mt-lg-0">
                                    <span class="display-4 font-weight-light">We can do everyday endoscopy
                                        better.</span>
                                     
                                    <span class="d-block" style="color: rgb(238, 194, 120);"><strong
                                            class="font-weight-light">Digital Edition I<br />October 7 & 8 2020 <br/>0730 - 1830 CEST
                                            </strong><br />streamed in full, live, right here, available for 1 month on-demand<br />Registration is &euro;100* for 2 days.</span>
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
                                <div class="countdown countdown-hero mt-2" data-countdown-date="10/07/2020"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php 
    
                        

    }elseif ($live){?>

<!-- If Livestream-->
<section class="header-1 section-rotate bg-section-dark" data-offset-top="#header-main">
    
    <div class="section-inner bg-gradient-dark"></div>
    <!-- SVG illustration -->
    <div class="pt-7 position-absolute middle right-0 col-lg-7 col-xl-6 d-none d-lg-block">
        <figure class="w-75" style="max-width: 1000px;">
            <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/covers/bleeding/heaterLivev2.png"
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
    <div class="container  d-flex align-items-center position-relative zindex-100">
        <div class="col">
            <div class="row">
                <div class="col-lg-5 col-xl-6 text-center text-lg-left">
                    <div class="d-none d-lg-block mb-4">

                    </div>
                    <a href="<?php echo $registrationURL;?>">
                    <div class="alert alert-modern alert-dark">
                        <span class="badge gieqsGold badge-pill">
                            LIVE
                            </span>
                        <span class="alert-content">Not yet registered? You <strong>still can!</strong>  Click here!</span>
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

                            <!-- if not logged in -->
                        <div class="mt-5">

                            <?php if (!$userid){?>
                            <a href="<?php echo BASE_URL;?>/pages/authentication/login.php"
                                class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me"
                                style="background-color: rgb(238, 194, 120);">
                                <span class="btn-inner--text">Login now to participate!</span>
                                <span class="btn-inner--icon"><i class="fas fa-play"></i></span>

                            </a>
                            <?php }elseif ($userid){ //what if no access, tag set above has access to live?>
                                <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/plenary-thursday.php"
                                    class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me"
                                    style="background-color: rgb(238, 194, 120);">
                                    <span class="btn-inner--text">Jump right into Plenary!</span>
                                    <span class="btn-inner--icon"><i class="fas fa-play"></i></span>
    
                                </a>
                                <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/complex-thursday.php"
                                    class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mt-2 mr-sm-4 scroll-me"
                                    style="background-color: rgb(238, 194, 120);">
                                    <span class="btn-inner--text">Jump right into Complex!</span>
                                    <span class="btn-inner--icon"><i class="fas fa-play"></i></span>
    
                                </a>

                            <?php }?>
                          
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



     <?php }
     
    }else{

         //text for past and not live
?>
       
        <section class="header-1 section-rotate bg-section-dark" data-offset-top="#header-main">
            <div class="section-inner bg-gradient-dark"></div>
            <!-- SVG illustration -->
            <div class="pt-7 position-absolute middle right-0 col-lg-7 col-xl-6 d-none d-lg-block">
                <figure class="w-75" style="max-width: 1000px;">
                    <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/covers/learning/bedysplasia_transparent.png"
                        class="svg-inject img-fluid">
                        <figcaption class="figure-caption text-right">Dysplasia within Barrett's Oesophagus. <br/>Acetic Acid Stain + Virtual Chromoendoscopy.</figcaption>
                </figure>
            </div>
            <!-- SVG background -->
            <!--<div class="bg-absolute-cover bg-size--contain d-flex align-items-center">
        <figure class="w-100 d-none d-lg-block">
          <img alt="Image placeholder" src="assets/img/svg/backgrounds/bg-4.svg" class="svg-inject" style="height: 1000px;">
        </figure>
      </div>-->
            <!-- Hero container -->
            <div class="container  d-flex align-items-center position-relative zindex-100">
               
                <div class="col">
                <!-- <div class="row">
                        <div class="col-lg-10 col-xl-10 text-center text-lg-left">
                        <a href="<?php //echo BASE_URL;?>/pages/program/program_imaging.php">
                            <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                    New
                                    </span>
                                <span class="alert-content">Live / Virtual Hybrid Courses</span>
                             </div></a>
                        <a href="<?php //echo $registrationURL;?>">
                            <div class="alert alert-modern alert-dark">
                            <span class="badge gieqsGold badge-pill">
                                <i class="fas fa-notes-medical"></i>
                                    </span>
                                <span class="alert-content">Register for GIEQs Digital on Demand</span>
                             </div></a>
                             <a class="ml-3 pointer" data-toggle="modal" data-target="#accreditation">
                            <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                <i class="fas fa-notes-medical"></i>
                                    </span>
                               
                                <span class="alert-content">CME accreditation</span>
                             </div></a>
                            
                    </div>
        </div> -->
                    <div class="row">
                        <div class="col-lg-5 col-xl-6 text-center text-lg-left">
                            <div class="d-none d-lg-block mb-4">

                            </div>
                            
                                <h2 class="text-white mb-4 mt-4 mt-lg-0">
                                    <span class="display-4 font-weight-light">NOW we will do everyday endoscopy
                                        better!</span>
                                     
                                    <span class="d-block" style="color: rgb(238, 194, 120);"><strong
                                            class="font-weight-light">GIEQs Digital is over for 2020<br />It is still available, on demand.
                                            </strong><br />NEW Virtual / Live Hybrid Courses</span>
                                </h2>
                                <p class="lead text-white">Catch us again, Fall 2021, live and face to face.  If you can't wait until then new Live / Virtual Hybrid Courses start November 2020</p>
                                <div class="mt-5">

                                        <?php
                                        
                                        if ($userid){

                                            $catchupLink = BASE_URL . "/pages/program/program-printable-catchup-public.php";
                                        }else{

                                            $catchupLink = BASE_URL . "/pages/authentication/login.php?destination=catchup";

                                        }

                                        ?>

                                    <a href="<?php echo $catchupLink;?>"
                                        class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me"
                                        style="background-color: rgb(238, 194, 120);">
                                        <span class="btn-inner--text">GIEQs Digital On Demand <sup>*</sup></span>
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

<?php
    }?>
        <section class="slice slice-lg">
            <div class="container mt-6">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <div class="swiper-js-container">
                    <div class="swiper-container swiper-container-horizontal" data-swiper-items="1" data-swiper-space-between="0" style="cursor: grab;">
                      <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1650px, 0px, 0px);">
                        <div class="swiper-slide" style="width: 825px;">
                          <div class="text-center">
                            <p class="h2 lh-160 text-gray font-italic font-weight-300" style="font-family: 'Playfair Display', serif;">"Perfect and worth every minute of my time.  Hoping to join next year!"</p>
                            <div class="text-center mt-4">
                              <h3 class="h5">GIEQs Edition I Participant</h3>
                              <span class="lead text-muted">Gastroenterologist</span>
                            </div>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-slide-prev" style="width: 825px;">
                          <div class="text-center">
                            <p class="h2 lh-160 text-gray font-italic font-weight-300" style="font-family: 'Playfair Display', serif;">"I've worked for 27 years as a gastroenterologist.  This was the congress that I have waited 27 years for.  Thank you and much success in the future!"</p>
                            <div class="text-center mt-4">
                             <h3 class="h5">GIEQs Edition I Participant</h3>
                              <span class="lead text-muted">Gastroenterologist</span>
                            </div>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" style="width: 825px;">
                          <div class="text-center">
                            <p class="h2 lh-160 text-gray font-italic font-weight-300" style="font-family: 'Playfair Display', serif;">"This was a great symposium and the mix of live endoscopy, with its challenges and pre-recorded lectures / videos worked well.  Thank you to the organising committee and faculty.  Great job!"</p>
                            <div class="text-center mt-4">
                              <h3 class="h5">GIEQs Edition I Participant</h3>
                              <span class="lead text-muted">Gastroenterologist</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination w-100 pt-5 d-flex align-items-center justify-content-center swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
                   

        <section class="slice slice-lg mt-8 pb-0"><!-- 
            <div class="container">
              <div class="row row-grid align-items-center justify-content-around">
                <div class="col-lg-5 order-lg-2">
                  <div class="pr-md-4">
                    <h5 class="h3">Change the way you think about learning in Endoscopy. Forever.</h5>
                    <p class="text-muted lead my-4">GIEQs uses our ground-breaking tagged based approach throughout to connect you with cases relevant to what you want to discover, fast.</p>
                    <p class="text-muted lead my-4">In the run up to GIEQs we will share a case every week so you can better understand the approach.</p>

                    <a href="<?php echo BASE_URL;?>/artificial-intelligence" target="_blank" class="btn bg-gieqsGold text-dark rounded-pill btn-icon mt-4">
                      <span class="btn-inner--icon"><i class="fas fa-binoculars"></i></span>
                      <span class="btn-inner--text">FREE case - Artifical Intelligence</span>
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                  <div class="position-relative" style="z-index: 10;">
                    <a href="<?php echo BASE_URL;?>/artificial-intelligence" target="_blank"><img alt="Image placeholder" src="https://i.vimeocdn.com/video/951736614_1280x720.jpg?r=pad" class="img-center img-fluid"></a>
                  </div>
                </div>
              </div>
            </div>
          </section>
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
                  <p class="lead lh-180 mt-4">And after the congress we will leave all the content on GIEQs online, so you can watch at your leisure, <strong>free</strong> if you register for the congress.</p>

                  <div class="btn-container mt-5">
                  <a href="https://vimeo.com/433331131" class="btn bg-gieqsGold text-dark rounded-pill btn-icon mt-4" data-fancybox>Discover more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <hr />
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

        <!-- <section class="bg-section-dark slice slice-lg mt-1" id="sct-what-we-do">
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
        </section> -->

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

    <!-- Modal Accreditation-->
    <div class="modal fade" id="accreditation" tabindex="-1" role="dialog" aria-labelledby="accreditationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accreditationLabel" style="color: rgb(238, 194, 120);">GIEQs Accreditation Statement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
            <div id="videoDisplay mb-3" class="">
                    
            <div class="row">
                <p class="h5 mt-5">At GIEQs we are serious about accrediting our educational events. <br /> <br/></p>
                    <p class="text-white">We have applied for and received EACCME accreditation (number of CME points pending) and have received RIZIV [Belgium] accreditation for 8 hours (Wednesday) and 7.5 hours (Thursday) CME points. &nbsp;
                    <br/><br/>We have received ESGE (European Society of Gastrointestinal Endoscopy), BSGIE (Belgian Society of Gastrointestinal Endoscopy), ASGE (American Society of GI Endoscopy) and BSG (British Society of Gastroenterology) accreditation!</p>
                    
                        <div class="col-lg-10 col-xl-10 text-center">
                            <div class="icon-xl icon-shape bg-white mr-3 p-2">
                            <a href="https://eaccme.uems.eu/" target="_blank" data-toggle="tooltip" data-placement="bottom" title="European Accreditation Council
for Continuing Medical Education (EACCME)">
                            <img src="<?php echo BASE_URL;?>/assets/img/icons/eaccme.png" alt="EACCME">
                            </a>
                            </div>
                            <div class="icon-xl icon-shape bg-white mr-3 p-2">
                            <a href="https://www.esge.com" target="_blank" data-toggle="tooltip" data-placement="bottom" title="European Society for Gastrointestinal Endoscopy">
                            <img src="<?php echo BASE_URL;?>/assets/img/icons/esge.png" alt="ESGE">
                            </a>
                            </div>
                            <div class="icon-xl icon-shape bg-white mr-3 p-2">
                                <a href="https://www.asge.com" target="_blank" data-toggle="tooltip" data-placement="bottom" title="American Society for Gastrointestinal Endoscopy">
                                <img src="<?php echo BASE_URL;?>/assets/img/icons/asge.png" alt="ASGE">
                                </a>
                                </div>
                            <div class="icon-xl icon-shape bg-white mr-3 p-2">
                            <a href="https://www.riziv.fgov.be/" target="_blank">
                            <img src="<?php echo BASE_URL;?>/assets/img/icons/riziv.png" alt="RIZIV" data-toggle="tooltip" data-placement="bottom" title="Rijksinstituut voor ziekte- en invaliditeitsverzekering">
                            </a>
                            </div>
                            <div class="icon-xl icon-shape bg-white p-2">
                                <a href="https://www.riziv.fgov.be/" target="_blank">
                                <img src="<?php echo BASE_URL;?>/assets/img/brand/bsgie.png" alt="BSGIE" data-toggle="tooltip" data-placement="bottom" title="Belgian Society for Gastrointestinal Endoscopy">
                                </a>
                                </div>
                                <div class="icon-xl icon-shape bg-white p-2 m-2">
                                    <a href="https://www.bsg.org.uk/" target="_blank">
                                    <img src="<?php echo BASE_URL;?>/assets/img/brand/bsg.png" alt="BSG" data-toggle="tooltip" data-placement="bottom" title="British Society for Gastrointestinal Endoscopy">
                                    </a>
                                    </div>
                            
                            </div>
                            </div>

                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-small btn-secondary" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>
</div>

    

    <?php require(BASE_URI . '/footer.php');?>

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