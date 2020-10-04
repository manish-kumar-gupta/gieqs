<!DOCTYPE html>
<html lang="en">

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $openaccess = 0;
      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      ?>

    <!--Page title-->
    <title>Boston Scientific - proudly sponsors GIEQs</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/swiper/dist/css/swiper.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/swiper/dist/js/swiper.min.js"></script>


    

    <style>
        #navbar-main{

            z-index: 9999;
        }
        
        .gieqsGold {

            color: rgb(238, 195, 120);


        }

        .tagButton {

            cursor: pointer;

        }

        .tagCard {

background-color: #1b385d75; 



}

#live-chat-app {
    background-color: #1b385d75 !important; 

}

.tagCardHeader{

    background-color: #162e4d;

}

        

.cursor-pointer {

    cursor: pointer;

}

@media (min-width: 992px) {
    .tagCard {

            
left: -50vw;
top: -20vh;


}
}

@media (min-width: 1200px) {
        #chapterSelectorDiv{

            
                
                top:-3vh;
            

        }
        #playerContainer{

                margin-top:-20px;

        }
        #collapseExample {

            position: absolute; 
            max-width: 50vh; 
            z-index: 25;
        }

        #selectDropdown {

            
            z-index: 25;
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

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
				        
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <body>

            <?php $livepage = 'Boston Scientific.  Proud sponsor of GIEQs';?>

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
<?php require (BASE_URI . '/pages/learning/pages/live/liveNav.php');?>
<div class="main-content">
    <!-- Navbar warning -->
    <?php if ($liveAccess){

        $requiredArray = ['23', '29', '25', '30', '31'];

        //print_r($requiredArray);

        //print_r($liveAccess);

        
        $bFound = (count(array_intersect($liveAccess, $requiredArray))) ? true : false;

        //if (in_array($liveAccess, 25)){
        if ($bFound){


        
     
     
     ?>
  <div class="main-content">
    <!-- Navbar warning -->
      <div class="main-content">
    <!-- Header (v13) -->
    <section class="slice slice-xl bg-cover bg-size--cover pb-300" data-offset-top="#header-main" style="background-image: url(&quot;../../assets/img/backgrounds/img-12.jpg&quot;); padding-top: 147.188px;">
      <span class="mask bg-dark opacity-8"></span>
      <div class="container pt-7">

      <div class="row mb-3">
          <div class="col-lg-12 text-center justify-content-center mb-3">

              <div class="text-center d-flex justify-content-center">
                  <img alt="Boston Scientific" src="<?php echo BASE_URL;?>/pages/learning/pages/live/assets/bostonlogo.png" style="max-width:100%;max-height:20vh">
              </div>

          </div>
      </div>
        <div class="row mt-4">
          <div class="col-lg-12 text-center">
          
            <div class="text-center">
              <h2 class="display-4 text-white mb-2"></h2>
              

              <div class="row justify-content-center">
                <div class="col-lg-6">
                  <p class="lead text-white lh-180">Advancing Science for Life.</p>
                  <p class="lead text-white lh-180">Proud Platinum Sponsor of GIEQs.</p>
                  <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/assets/boston_video.mp4" class="btn btn-lg btn-white btn-icon-only rounded-circle hover-scale-110 mt-4" data-fancybox="">
                    <span class="btn-inner--icon"><i class="fas fa-play"></i></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features (v35) -->
    <section class="slice slice-lg pt-lg-0">
      <div class="container">
        <div class="card-group flex-column flex-lg-row">
          <div class="card bg-gradient-primary border-0 px-4 py-5 mt--150">
            <div class="card-body">
              <h5 class="h4 text-white">Boston SpyGlass DS II TV</h5>
              <p class="mt-4 mb-0 text-white">
                The SpyGlass DS System allows a single operator to perform procedures as well as guide devices to examine, diagnose and treat pancreaticobiliary conditiona.
              </p>
            </div>
          </div>
          <div class="card bg-gradient-dark border-0 px-4 py-5 mt--150">
            <div class="card-body">
              <h5 class="h4 text-white">Boston guidewire family jag revolution</h5>
              <p class="mt-4 mb-0 text-white">
              The Jagwire Revolution High Performance Guidewire is a versatile .025” guidewire engineered to have the stiffness and pushability that you would expect in our Jagwire .035’’ guidewire combined with both access and exchange characteristics to help improve cannulation success in challenging anatomy.</p>
            </div>
          </div>
          <div class="card bg-gradient-primary border-0 px-4 py-5 mt--150">
            <div class="card-body">
              <h5 class="h4 text-white">Captivator Cold</h5>
              <p class="mt-4 mb-0 text-white">
              The Captivator™ COLD Single-use Snare is optimized for cold snare polypectomy and designed for the effective resection of flat lesions and diminutive polyps.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Milestone (v1) -->
    <section class="slice slice-lg">
      <div class="container">
        <div class="mb-5 text-center">
        <div class="alert alert-modern alert-dark">
                                <span class="badge gieqsGold badge-pill">
                                    New
                                    </span>
                                <span class="alert-content">Spyglass DS II TV</span>
                             </div>
          <h3 class=" mt-4">IT TAKES SPIRIT TO MAKE SCIENCE MORE COLLABORATIVE</h3>
          <div class="fluid-paragraph mt-3">
            <p class="lead lh-180">Boston Scientific is dedicated to transforming lives through innovative medical solutions that improve the health of patients around the world.</p>
          </div>
        </div>
        <!-- Milestones -->
        <div class="position-relative">
          <div class="row">
            <div class="col-lg-3 col-6 mb-5 mb-lg-0">
              <div class="text-center">
                <div class="mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="149px" height="127px" viewBox="0 0 149 127" version="1.1" class="injected-svg svg-inject" style="height: 60px; width: auto;">
    <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
    <title>Group_2</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Group_2" transform="translate(1.000000, 2.000000)">
            <g id="Group" transform="translate(26.000000, 34.000000)" class="stroke-primary-300" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                <path d="M20.2,15.6 L19.8,15.3" id="Shape"></path>
                <path d="M14.2,10.9 L4.1,2.9" id="Shape" stroke-dasharray="1.0307,7.2147"></path>
                <path d="M1.2,0.6 L0.8,0.3" id="Shape"></path>
            </g>
            <g id="Group" transform="translate(91.000000, 82.000000)" class="stroke-primary-300" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                <path d="M0,0.5 L0.4,0.7" id="Shape"></path>
                <path d="M6.8,4.8 L32.9,21.1" id="Shape" stroke-dasharray="1.079,7.5529"></path>
                <path d="M36.1,23.1 L36.5,23.4" id="Shape"></path>
            </g>
            <g id="Group" transform="translate(88.000000, 30.000000)" class="stroke-primary-300" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                <path d="M0.5,19.9 L0.8,19.5" id="Shape"></path>
                <path d="M5.2,15.3 L17.9,3.1" id="Shape" stroke-dasharray="0.8619,6.0332"></path>
                <path d="M20.1,1 L20.5,0.7" id="Shape"></path>
            </g>
            <circle id="Oval" class="fill-neutral" fill-rule="nonzero" cx="67.7" cy="66.7" r="31.4"></circle>
            <circle id="Oval" class="fill-neutral" fill-rule="nonzero" cx="120" cy="19.1" r="19.1"></circle>
            <circle id="Oval" class="fill-neutral" fill-rule="nonzero" cx="129.9" cy="107.2" r="16"></circle>
            <circle id="Oval" class="fill-neutral" fill-rule="nonzero" cx="16.2" cy="26.2" r="15.7"></circle>
            <circle id="Oval" class="stroke-primary-300 fill-primary-300" fill-rule="nonzero" cx="69.6" cy="68.5" r="29.5"></circle>
            <circle id="Oval" fill="#CEE4FE" fill-rule="nonzero" cx="122.2" cy="21.3" r="17"></circle>
            <circle id="Oval" fill="#CEE4FE" fill-rule="nonzero" cx="131.8" cy="109.1" r="14.1"></circle>
            <circle id="Oval" fill="#CEE4FE" fill-rule="nonzero" cx="17.9" cy="28" r="13.9"></circle>
            <path d="M57.8,36.9 C58,36.8 58.3,36.7 58.5,36.7" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M67.7,98 C50.4,98 36.3,84 36.3,66.6 C36.3,54.2 43.4,43.6 53.8,38.4" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M68.6,35.3 C85.5,35.8 99.1,49.6 99.1,66.7 C99.1,80.8 89.9,92.6 77.1,96.6" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M125.4,37.4 C123.7,37.9 121.8,38.2 120,38.2 C109.4,38.2 100.9,29.6 100.9,19.1 C100.9,14.3 102.7,9.8 105.7,6.5" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M113.5,1.1 C115.5,0.4 117.7,0 120,0 C130.6,0 139.1,8.6 139.1,19.1 C139.1,23.9 137.3,28.3 134.4,31.6" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M136.8,121.7 C134.7,122.7 132.4,123.2 129.9,123.2 C121.1,123.2 113.9,116 113.9,107.2 C113.9,100.9 117.5,95.5 122.7,92.9" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M131.4,91.3 C139.6,92 146,98.9 146,107.2 C146,110 145.3,112.6 144,114.9" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M10.5,11.6 C10.7,11.5 10.8,11.5 11,11.4" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M16.2,10.5 C24.8,10.5 31.9,17.5 31.9,26.2 C31.9,34.8 24.9,41.9 16.2,41.9 C7.5,41.9 0.5,34.9 0.5,26.2 C0.5,22.7 1.6,19.5 3.6,16.9" id="Shape" class="stroke-primary" stroke-width="2.8071" stroke-linecap="round" stroke-linejoin="round"></path>
            <g id="Group" transform="translate(53.000000, 50.000000)">
                <path d="M6.8,12.7 C8.2,15.4 11.1,17.3 14.4,17.3 C19.2,17.3 23,13.4 23,8.7 C23,4 19.1,0.1 14.4,0.1 C9.6,0.1 5.8,4 5.8,8.7 C5.8,10.1 6.1,11.5 6.8,12.7" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M24,18.6 C28,21.6 30.9,25.6 30.9,30.2 C30.9,31.6 29.5,31.6 29.5,31.6 L18.8,31.6 L12.3,31.6 L1.6,31.6 C1.6,31.6 0.2,31.6 0.2,30.2 C0.2,24.2 4.9,19.4 10.6,16.3" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M10.4,16.3 C11.6,16.9 13,17.3 14.4,17.3 C19.2,17.3 23,13.4 23,8.7 C23,4 19.1,0.1 14.4,0.1 C9.6,0.1 5.8,4 5.8,8.7 C5.8,9.7 6,10.6 6.3,11.5" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M24,18.6 C28,21.6 30.9,25.6 30.9,30.2 C30.9,31.6 29.5,31.6 29.5,31.6 L18.8,31.6 L12.3,31.6 L1.6,31.6 C1.6,31.6 0.2,31.6 0.2,30.2 C0.2,24.2 4.9,19.4 10.6,16.3" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
            <g id="Group" transform="translate(8.000000, 17.000000)">
                <path d="M4.2,6.9 C5,8.3 6.4,9.3 8.2,9.3 C10.7,9.3 12.7,7.3 12.7,4.8 C12.7,2.3 10.7,0.3 8.2,0.3 C5.7,0.3 3.7,2.3 3.7,4.8 C3.7,5.5 3.9,6.2 4.2,6.9" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M13.2,9.9 C15.3,11.5 16.8,13.5 16.8,15.9 C16.8,16.6 16.1,16.6 16.1,16.6 L10.5,16.6 L7.1,16.6 L1.5,16.6 C1.5,16.6 0.8,16.6 0.8,15.9 C0.8,12.8 3.3,10.3 6.2,8.7" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M6.1,8.7 C6.7,9 7.4,9.2 8.2,9.2 C10.7,9.2 12.7,7.2 12.7,4.7 C12.7,2.2 10.7,0.2 8.2,0.2 C5.7,0.2 3.7,2.2 3.7,4.7" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M15.1,11.7 C16.1,12.9 16.7,14.3 16.7,15.9 C16.7,16.6 16,16.6 16,16.6 L10.4,16.6 L7,16.6 L1.4,16.6 C1.4,16.6 0.7,16.6 0.7,15.9 C0.7,12.8 3.2,10.3 6.1,8.7" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
            <g id="Group" transform="translate(122.000000, 99.000000)">
                <path d="M3.9,6.7 C4.7,8.1 6.1,9.1 7.9,9.1 C10.4,9.1 12.4,7.1 12.4,4.6 C12.4,2.1 10.4,0.1 7.9,0.1 C5.4,0.1 3.4,2.1 3.4,4.6 C3.4,5.4 3.5,6.1 3.9,6.7" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M12.8,9.8 C14.9,11.4 16.4,13.4 16.4,15.8 C16.4,16.5 15.7,16.5 15.7,16.5 L10.1,16.5 L6.7,16.5 L1.1,16.5 C1.1,16.5 0.4,16.5 0.4,15.8 C0.4,12.7 2.9,10.2 5.8,8.6" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M5.8,8.6 C6.4,8.9 7.1,9.1 7.9,9.1 C10.4,9.1 12.4,7.1 12.4,4.6 C12.4,2.1 10.4,0.1 7.9,0.1 C5.4,0.1 3.4,2.1 3.4,4.6" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M14.7,11.6 C15.7,12.8 16.3,14.2 16.3,15.8 C16.3,16.5 15.6,16.5 15.6,16.5 L10,16.5 L6.6,16.5 L1,16.5 C1,16.5 0.3,16.5 0.3,15.8 C0.3,12.7 2.8,10.2 5.7,8.6" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
            <g id="Group" transform="translate(110.000000, 8.000000)">
                <path d="M5,8.3 C5.9,10 7.6,11.1 9.6,11.1 C12.5,11.1 14.9,8.7 14.9,5.8 C14.9,2.9 12.5,0.5 9.6,0.5 C6.7,0.5 4.3,2.9 4.3,5.8 C4.4,6.8 4.6,7.6 5,8.3" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M15.5,11.9 C17.9,13.7 19.7,16.1 19.7,19 C19.7,19.9 18.8,19.9 18.8,19.9 L12.3,19.9 L8.3,19.9 L1.8,19.9 C1.8,19.9 0.9,19.9 0.9,19 C0.9,15.4 3.8,12.4 7.2,10.5" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M7.2,10.5 C7.9,10.9 8.8,11.1 9.6,11.1 C12.5,11.1 14.9,8.7 14.9,5.8 C14.9,2.9 12.5,0.5 9.6,0.5 C7,0.5 4.9,2.4 4.4,4.8" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M17.2,13.4 C18.7,15 19.7,16.9 19.7,19 C19.7,19.9 18.8,19.9 18.8,19.9 L12.3,19.9 L8.3,19.9 L1.8,19.9 C1.8,19.9 0.9,19.9 0.9,19 C0.9,15.4 3.8,12.4 7.2,10.5" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </g>
    </g>
</svg>
                </div>
                <div class="h1 text-primary">
                  <span class="counter counting-finished" data-from="0" data-to="97" data-speed="3000" data-refresh-interval="100">30</span>
                  <span class="counter-extra">million</span>
                </div>
                <h3 class="h6 text-capitalize">patients treated each year</h3>
              </div>
            </div>
            <div class="col-lg-3 col-6 mb-5 mb-lg-0">
              <div class="text-center">
                <div class="mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="150px" height="147px" viewBox="0 0 150 147" version="1.1" class="injected-svg svg-inject" style="height: 60px; width: auto;">
    <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
    <title>Help_1_</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Help_1_" transform="translate(1.000000, 1.000000)">
            <path d="M97.7,16.6 C97.7,20.9 99.5,24.9 102.3,27.7 C104.8,30.2 108.1,31.8 111.8,32.2 L111.8,143.9 L17.5,143.9 C8.3,143.9 0.9,136.5 0.9,127.3 L0.9,17.4 C0.9,17.3 0.9,17.1 0.9,17 C1.1,8.1 8.5,0.9 17.5,0.9 L109.3,0.9 L109.3,1 C101.3,1.7 97.7,8.4 97.7,16.6 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M97.7,16.6 C97.7,20.9 99.5,24.9 102.3,27.7 C104.8,30.2 108.1,31.8 111.8,32.2 L111.8,143.9 L17.5,143.9 C8.3,143.9 0.9,136.5 0.9,127.3 L0.9,17.4 C0.9,17.3 0.9,17.1 0.9,17 C1.1,8.1 8.5,0.9 17.5,0.9 L109.3,0.9 L109.3,1 C101.3,1.7 97.7,8.4 97.7,16.6 Z" id="Shape" class="fill-primary-300" fill-rule="nonzero"></path>
            <path d="M111.7,32.2 L111.7,143.8 L17.5,143.8 C10.3,143.8 4.2,139.2 1.9,132.8 C1.3,131.2 1,129.5 0.9,127.7 C0.9,127.5 0.9,127.3 0.9,127.2 L0.9,17 C1,21.2 2.7,24.9 5.5,27.7 C8.4,30.5 12.3,32.3 16.6,32.3 L110.9,32.3 C111.1,32.3 111.5,32.2 111.7,32.2 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M111.7,41.5 L111.7,143.8 L17.5,143.8 C10.3,143.8 4.2,139.2 1.9,132.8 C1.9,132.6 1.9,132.4 1.9,132.3 L1.9,27 C2,31 3.7,34.6 6.5,37.2 C9.4,39.9 13.3,41.6 17.6,41.6 L111.7,41.6 L111.7,41.5 Z" id="Shape" class="fill-primary-100" fill-rule="nonzero"></path>
            <path d="M112.7,56.6 L112.7,131.4 C93.5,129.7 78.5,113.6 78.5,94 C78.4,74.4 93.5,58.3 112.7,56.6 Z" id="Shape" class="fill-primary-200" fill-rule="nonzero"></path>
            <path d="M111.7,32.2 C111.9,32.2 111.8,32.2 111.7,32.2 Z" id="Shape" class="stroke-primary" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"></path>
            <polyline id="Shape" stroke-width="3.2" class="stroke-primary fill-neutral" fill-rule="nonzero" stroke-linecap="round" stroke-linejoin="round" points="19.4 32.3 19.4 68.8 32.8 58.7 46.2 68.8 46.2 32.3"></polyline>
            <path d="M97.7,16.6 C97.7,20.9 99.5,24.9 102.3,27.7 C104.8,30.2 108.1,31.8 111.8,32.2 L111.8,143.9 L17.5,143.9 C8.3,143.9 0.9,136.5 0.9,127.3 L0.9,17.4 C0.9,17.3 0.9,17.1 0.9,17 C1.1,8.1 8.5,0.9 17.5,0.9 L109.3,0.9 L109.3,1 C101.3,1.7 97.7,8.4 97.7,16.6 Z" id="Shape" class="stroke-primary" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M111.7,32.2 C112.2,32.3 110.3,32.3 110.9,32.3 L16.6,32.3 C12.3,32.3 8.3,30.5 5.5,27.7 C2.8,25 1,21.2 0.9,17 C0.9,16.9 0.9,16.7 0.9,16.6 C0.9,7.9 7.9,0.9 16.6,0.9 L110.9,0.9 C110.3,0.9 109.8,0.9 109.3,1 C101.4,1.8 97.7,8.5 97.7,16.6 C97.7,20.9 99.5,24.9 102.3,27.7 C104.7,30.1 108,31.8 111.7,32.2 Z" id="Shape" class="stroke-primary" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"></path>
            <g id="Group" transform="translate(81.000000, 54.000000)">
                <path d="M60.5,15.5 C63.9,20.7 65.9,26.9 65.9,33.5 C65.9,51.7 51.2,66.4 33,66.4 C14.8,66.4 0.1,51.7 0.1,33.5 C0.1,15.3 14.8,0.6 33,0.6 C44.5,0.7 54.6,6.6 60.5,15.5" id="Shape" class="fill-primary-500" fill-rule="nonzero"></path>
                <path d="M64.3,23.2 C64.4,23.5 64.5,23.8 64.5,24.1 C65.4,27.1 65.9,30.3 65.9,33.6 C65.9,40.9 63.5,47.7 59.5,53.2" id="Shape" class="stroke-primary" stroke-width="3.5041" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M37.9,66.1 C36.3,66.3 34.7,66.5 33,66.5 C14.8,66.5 0.1,51.8 0.1,33.6 C0.1,15.4 14.8,0.7 33,0.7 C43.2,0.7 52.3,5.3 58.3,12.6" id="Shape" class="stroke-primary" stroke-width="3.5041" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M51.8,60.6 C51.3,61 50.7,61.3 50.1,61.7" id="Shape" class="stroke-primary" stroke-width="3.5041" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M38,25.8 C38,23.6 36,21.6 33,21.6 C27.7,21.6 26.3,26.1 26.3,26.1 L19.3,23 C19.3,23 22.1,13.5 33.3,13.5 C41.4,13.5 46.7,18.8 46.7,24.7 C46.7,35 36.6,35 36.6,42.3 L29.1,42.3 C29.1,42.3 28.5,40.9 28.5,39.8 C28.5,31.6 38,31.6 38,25.8 Z M32.5,45.6 C35,45.6 37,47.6 37,49.8 C37,52 35,54 32.5,54 C30,54 28,52 28,49.8 C28,47.5 29.9,45.6 32.5,45.6 Z" id="Shape" stroke-width="3.2" class="stroke-primary fill-neutral" fill-rule="nonzero" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </g>
    </g>
</svg>
                </div>
                <div class="h1 text-primary">
                  <span class="counter counting-finished" data-from="0" data-to="365" data-speed="3000" data-refresh-interval="100">13+</span>
                  <span class="counter-extra">K</span>
                </div>
                <h3 class="h6 text-capitalize">Products That Change Lives</h3>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="text-center">
                <div class="mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="147px" height="109px" viewBox="0 0 147 109" version="1.1" class="injected-svg svg-inject" style="height: 60px; width: auto;">
    <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
    <title>Code_2</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Code_2" transform="translate(1.000000, 1.000000)">
            <path d="M144.1,8.5 L144.1,98.1 C144.1,102.2 140.8,105.6 136.6,105.6 L8.1,105.6 C4,105.6 0.6,102.3 0.6,98.1 L0.6,0.6 L136.1,0.6 C140.6,0.6 144.1,4.2 144.1,8.5 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M133.7,0.6 C139.4,0.6 144.1,5.3 144.1,11 L144.1,98.1 C144.1,102.2 140.9,105.6 137,105.6 L14.3,105.6 C10.4,105.6 7.2,102.3 7.2,98.1 L7.2,0.6 L133.7,0.6 Z" id="Shape" class="fill-primary-300" fill-rule="nonzero"></path>
            <path d="M95.9,19.5 L0.7,19.5 L0.7,8.1 C0.7,4 4,0.6 8.2,0.6 L136.7,0.6 C140.8,0.6 144.2,3.9 144.2,8.1 L144.2,19.5 L119.2,19.5" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M134.9,19.2 L143,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M124.4,19.2 L125.4,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M1.3,19.2 L87.5,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle id="Oval" class="fill-primary-300" fill-rule="nonzero" cx="13.5" cy="10.2" r="3.2"></circle>
            <circle id="Oval" class="fill-primary-200" fill-rule="nonzero" cx="24.1" cy="10.2" r="3.2"></circle>
            <circle id="Oval" class="fill-primary-200" fill-rule="nonzero" cx="34.7" cy="10.2" r="3.2"></circle>
            <path d="M0.7,62.6 L0.7,61.4" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M0.7,55.2 L0.7,8 C0.7,3.9 4,0.5 8.2,0.5 L136.7,0.5 C140.8,0.5 144.2,3.8 144.2,8 L144.2,98.1 C144.2,102.2 140.9,105.6 136.7,105.6 L8.2,105.6 C4.1,105.6 0.7,102.3 0.7,98.1 L0.7,77" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <g id="Group" transform="translate(18.000000, 31.000000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                <path d="M22.1,20.1 L48.5,20.2" id="Shape" class="stroke-neutral"></path>
                <path d="M80.9,20.1 L111.3,20.3" id="Shape" class="stroke-neutral"></path>
                <path d="M60.5,58.3 L91,58.5" id="Shape" class="stroke-primary"></path>
                <path d="M57.5,20.1 L72.3,20.2" id="Shape" class="stroke-primary"></path>
                <path d="M0.6,19.9 L11.4,20" id="Shape" class="stroke-neutral"></path>
                <path d="M37.8,32.8 L53.7,33" id="Shape" class="stroke-primary"></path>
                <path d="M62.5,32.8 L103,33.3" id="Shape" class="stroke-neutral"></path>
                <path d="M0.6,32.7 L27.2,32.8" id="Shape" class="stroke-neutral"></path>
                <path d="M37.8,45.5 L74.7,45.7" id="Shape" class="stroke-primary"></path>
                <path d="M0.6,45.4 L27.2,45.5" id="Shape" class="stroke-neutral"></path>
                <path d="M29.9,58.3 L50.3,58.4" id="Shape" class="stroke-neutral"></path>
                <path d="M0.6,58.1 L17,58.2" id="Shape" class="stroke-primary"></path>
                <path d="M0.5,0.4 L75.3,0.7" id="Shape" class="stroke-neutral"></path>
            </g>
        </g>
    </g>
</svg>
                </div>
                <div class="h1 text-primary">
                  <span class="counter counting-finished" data-from="0" data-to="200" data-speed="3000" data-refresh-interval="100">$1</span>
                  <span class="counter-extra">Billion</span>
                </div>
                <h3 class="h6 text-capitalize">Invested in R&amp;D</h3>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="text-center">
                <div class="mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="145px" height="113px" viewBox="0 0 145 113" version="1.1" class="injected-svg svg-inject" style="height: 60px; width: auto;">
    <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
    <title>Apps</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Apps" transform="translate(2.000000, 1.000000)">
            <path d="M31,0.5 L13,0.5 C6,0.5 0.4,6.2 0.4,13.1 L0.4,31.1 C0.4,38.1 6.1,43.7 13,43.7 L31,43.7 C38,43.7 43.6,38 43.6,31.1 L43.6,13.1 C43.6,6.1 37.9,0.5 31,0.5 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M31,5.1 L17.6,5.1 C10.6,5.1 5,10.8 5,17.7 L5,31.1 C5,38.1 10.7,43.7 17.6,43.7 L31,43.7 C38,43.7 43.6,38 43.6,31.1 L43.6,17.7 C43.6,10.8 37.9,5.1 31,5.1 Z" id="Shape" class="fill-primary-300" fill-rule="nonzero"></path>
            <path d="M31,0.5 L13,0.5 C6,0.5 0.4,6.2 0.4,13.1 L0.4,31.1 C0.4,38.1 6.1,43.7 13,43.7 L31,43.7 C38,43.7 43.6,38 43.6,31.1 L43.6,13.1 C43.6,6.1 37.9,0.5 31,0.5 Z" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M31,56.2 L13,56.2 C6,56.2 0.4,61.9 0.4,68.8 L0.4,86.8 C0.4,93.8 6.1,99.4 13,99.4 L31,99.4 C38,99.4 43.6,93.7 43.6,86.8 L43.6,68.8 C43.6,61.8 37.9,56.2 31,56.2 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M31,60.8 L17.6,60.8 C10.6,60.8 5,66.5 5,73.4 L5,86.8 C5,93.8 10.7,99.4 17.6,99.4 L31,99.4 C38,99.4 43.6,93.7 43.6,86.8 L43.6,73.4 C43.6,66.5 37.9,60.8 31,60.8 Z" id="Shape" class="fill-primary-300" fill-rule="nonzero"></path>
            <path d="M31,56.2 L13,56.2 C6,56.2 0.4,61.9 0.4,68.8 L0.4,86.8 C0.4,93.8 6.1,99.4 13,99.4 L31,99.4 C38,99.4 43.6,93.7 43.6,86.8 L43.6,68.8 C43.6,61.8 37.9,56.2 31,56.2 Z" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M86.7,0.5 L68.7,0.5 C61.7,0.5 56.1,6.2 56.1,13.1 L56.1,31.1 C56.1,38.1 61.8,43.7 68.7,43.7 L86.7,43.7 C93.7,43.7 99.3,38 99.3,31.1 L99.3,13.1 C99.3,6.1 93.6,0.5 86.7,0.5 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M86.7,0.5 L68.7,0.5 C61.7,0.5 56.1,6.2 56.1,13.1 L56.1,31.1 C56.1,38.1 61.8,43.7 68.7,43.7 L86.7,43.7 C93.7,43.7 99.3,38 99.3,31.1 L99.3,13.1 C99.3,6.1 93.6,0.5 86.7,0.5 Z" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M86.7,56.2 L68.7,56.2 C61.7,56.2 56.1,61.9 56.1,68.8 L56.1,86.8 C56.1,93.8 61.8,99.4 68.7,99.4 L86.7,99.4 C93.7,99.4 99.3,93.7 99.3,86.8 L99.3,68.8 C99.3,61.8 93.6,56.2 86.7,56.2 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M86.7,60.8 L73.3,60.8 C66.3,60.8 60.7,66.5 60.7,73.4 L60.7,86.8 C60.7,93.8 66.4,99.4 73.3,99.4 L86.7,99.4 C93.7,99.4 99.3,93.7 99.3,86.8 L99.3,73.4 C99.3,66.5 93.6,60.8 86.7,60.8 Z" id="Shape" class="fill-primary-300" fill-rule="nonzero"></path>
            <path d="M86.7,56.2 L68.7,56.2 C61.7,56.2 56.1,61.9 56.1,68.8 L56.1,86.8 C56.1,93.8 61.8,99.4 68.7,99.4 L86.7,99.4 C93.7,99.4 99.3,93.7 99.3,86.8 L99.3,68.8 C99.3,61.8 93.6,56.2 86.7,56.2 Z" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <g id="Group" transform="translate(68.000000, 18.000000)">
                <path d="M73,36.8 C73,33.5 70.3,30.8 67,30.8 C64,30.8 61.6,33 61.1,35.8 L58.4,35.8 L58.4,31.2 C58.4,27.9 55.7,25.2 52.4,25.2 C49.1,25.2 46.4,27.9 46.4,31.2 L46.4,35.7 L43.9,35.7 L43.9,26.4 C43.9,22.8 41,19.9 37.4,19.9 C33.8,19.9 30.9,22.8 30.9,26.4 L30.9,35.6 L28.7,35.6 L28.7,8.2 C28.7,4.6 25.8,1.7 22.2,1.7 C18.6,1.7 15.7,4.6 15.7,8.2 L15.7,47.7 L15.7,50.9 L15.7,64.5 L13.4,64.5 L13.4,54.9 C13.4,47.8 7.6,42 0.5,42 L0.5,65.7 C0.5,67.1 0.9,68.3 1.7,69.4 C1.7,69.4 1.7,69.5 1.7,69.5 C4.1,73.3 17.5,84.7 23.6,89.9 C25.6,91.6 28.2,92.5 30.8,92.5 L57.1,92.5 C65.8,92.5 72.9,85.4 72.9,76.7 L72.9,36.8 L73,36.8 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M73,36 L73,75.8 C73,84.5 65.9,91.6 57.2,91.6 L31,91.6 C28.4,91.6 25.8,90.7 23.8,89 C17.6,83.8 4.3,72.3 1.9,68.6 C1.9,68.6 1.9,68.5 1.9,68.5 C1.2,67.4 0.7,66.2 0.7,64.8 L0.7,41 C7.8,41 13.6,46.8 13.6,53.9 L13.6,63.5 L15.9,63.5 L15.9,7.2 C15.9,3.6 18.8,0.7 22.4,0.7 C26,0.7 28.9,3.6 28.9,7.2 L28.9,34.6 L31.1,34.6 L31.1,25.4 C31.1,21.8 34,18.9 37.6,18.9 C41.2,18.9 44.1,21.8 44.1,25.4 L44.1,34.7 L46.6,34.7 L46.6,30.2 C46.6,26.9 49.3,24.2 52.6,24.2 C55.9,24.2 58.6,26.9 58.6,30.2 L58.6,34.8 L61.3,34.8 C61.8,32 64.2,29.8 67.2,29.8 C70.3,30 73,32.7 73,36 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
                <path d="M73,40.6 L73,75.7 C73,84.4 65.9,91.5 57.2,91.5 L31,91.5 C28.4,91.5 25.8,90.6 23.8,88.9 C17.6,83.7 4.3,72.2 1.9,68.5 C1.9,68.5 1.9,68.4 1.9,68.4 C1.2,67.3 0.7,66.1 0.7,64.7 L0.7,45.6 C7.8,45.6 13.6,51.4 13.6,58.5 L13.6,68.1 L15.9,68.1 L15.9,11.8 C15.9,8.2 18.8,5.3 22.4,5.3 C26,5.3 28.9,8.2 28.9,11.8 L28.9,39.2 L31.1,39.2 L31.1,30 C31.1,26.4 34,23.5 37.6,23.5 C41.2,23.5 44.1,26.4 44.1,30 L44.1,39.3 L46.6,39.3 L46.6,34.7 C46.7,31.4 49.3,28.8 52.6,28.8 C55.9,28.8 58.6,31.5 58.6,34.8 C58.6,34.8 58.6,34.8 58.6,34.8 L58.6,39.4 L61.3,39.4 C61.8,36.6 64.2,34.4 67.2,34.4 C70.3,34.6 73,37.3 73,40.6 Z" id="Shape" class="fill-primary-100" fill-rule="nonzero"></path>
                <path d="M73,36.8 C73,33.5 70.3,30.8 67,30.8 C64,30.8 61.6,33 61.1,35.8 L58.4,35.8 L58.4,31.2 C58.4,27.9 55.7,25.2 52.4,25.2 C49.1,25.2 46.4,27.9 46.4,31.2 L46.4,35.7 L43.9,35.7 L43.9,26.4 C43.9,22.8 41,19.9 37.4,19.9 C33.8,19.9 30.9,22.8 30.9,26.4 L30.9,35.6 L28.7,35.6 L28.7,8.2 C28.7,4.6 25.8,1.7 22.2,1.7 C18.6,1.7 15.7,4.6 15.7,8.2 L15.7,47.7 L15.7,50.9 L15.7,64.5 L13.4,64.5 L13.4,54.9 C13.4,47.8 7.6,42 0.5,42 L0.5,65.7 C0.5,67.1 0.9,68.3 1.7,69.4 C1.7,69.4 1.7,69.5 1.7,69.5 C4.1,73.3 17.5,84.7 23.6,89.9 C25.6,91.6 28.2,92.5 30.8,92.5 L57.1,92.5 C65.8,92.5 72.9,85.4 72.9,76.7 L72.9,36.8 L73,36.8 Z" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </g>
    </g>
</svg>
                </div>
                <div class="h1 text-primary">
                  <span class="counter counting-finished" data-from="0" data-to="970" data-speed="3000" data-refresh-interval="100">120</span>
                  <span class="counter-extra">Countries</span>
                </div>
                <h3 class="h6 text-capitalize">With Commercial Representation</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog (v3) -->
    <section class="slice slice-lg">
      <div class="container">
        <div class="row row-grid">
          <div class="col-lg-3">
            <h4 class="mt-3">Direct Visualization System</h4>
            <p class="lead mt-4">The SpyGlass™ DS System enables direct visualization of the pancreatic and bile ducts, is used to evaluate suspected benign and malignant conditions, and is used for the treatment of difficult stones and strictures.</p>
            <a href="https://www.bostonscientific.com/en-US/products/direct-visualization-systems/spyglass-ds-direct-visualization-system.html" class="btn btn-primary btn-icon rounded-pill hover-scale-110 mt-4">
              <span class="btn-inner--icon">
                <i class="fas fa-angle-right"></i>
              </span>
              <span class="btn-inner--text">Read more</span>
            </a>
          </div>
          <div class="col-lg-6">
            <div class="px-4">
              <img alt="Image placeholder" src="./assets/Boston_SpyGlass_DS_II_TV.jpg" class="img-fluid rounded shadow-lg hover-scale-110">
            </div>
          </div>
          <div class="col-lg-3 d-lg-flex flex-lg-column">
            <div class="mt-lg-auto">
              <p class="lead">The SpyGlass DS System enables high resolution imaging and therapy during an ERCP procedure to target biopsies, fragment stones through lithotripsy, and remove residual stones, stone fragments, and foreign bodies such as migrated stents.
Using the SpyGlass DS System compared to traditional ERCP may result in more efficient evaluation, help reduce the need for additional testing and repeat procedures and enable patients to receive treatment sooner.
Since its launch in 2015, the SpyGlass DS System has impacted more than 110,000 patient lives in more than 65 countries.</p>
            </div>
            <div class="mt-lg-auto">
              <p class="lead mb-0"></p>
              <div class="row align-items-center mt-5">
                <div class="col-xl-4">
                  <small class="d-block text-uppercase text-muted ls-1 font-weight-600"></small>
                </div>
                <div class="col-xl-8">
                  <ul class="nav ml-lg-auto mb-0">
                    <li class="nav-item">
                      <a class="nav-link pl-0" href="https://www.linkedin.com/company/boston-scientific"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="https://www.facebook.com/BostonScientific"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="https://twitter.com/bostonsci"><i class="fab fa-twitter"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features (v25) -->
    <section class="slice slice-lg">
      <div class="container no-padding">
        <div class="mb-5 text-center">
          <h3 class=" mt-4">The main features of the sponsor</h3>
          <div class="fluid-paragraph mt-3">
            <p class="lead lh-180">Advancing science for life.</p>
          </div>
        </div>
        <div class="card-deck">
          <div class="card hover-shadow-lg">
            <div class="card-body">
              <div class="delimiter-bottom pb-3 mb-4">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/pages/learning/pages/live/assets/Boston_SpyGlass_DS_II_TV.jpg" class="svg-inject" style="height: 60px; width: auto">
                <h5 class="mt-4">Boston SpyGlass DS II TV</h5>
              </div>
              <p class="">The SpyGlass DS System allows a single operator to perform procedures as well as guide devices to examine, diagnose and treat pancreaticobiliary conditiona.</p>
            </div>
            <div class="card-footer px-0 py-0 border-0 overflow-hidden">
              <a href="https://www.bostonscientific.com/en-US/products/direct-visualization-systems/spyglass-ds-direct-visualization-system.html" class="btn btn-block btn-primary rounded-0">Learn more</a>
            </div>
          </div>
          <div class="card hover-shadow-lg">
            <div class="card-body">
              <div class="delimiter-bottom pb-3 mb-4">
                <img alt="Image placeholder" src="./assets/Boston_guidewire_family_jag_revolution.jpg" class="svg-inject" style="height: 60px; width: auto">
                <h5 class="mt-4">Boston guidewire family jag revolution</h5>
              </div>
              <p class="">The Jagwire Revolution High Performance Guidewire is indicated for use in selective cannulation of the biliary ducts including the common bile duct, pancreatic duct, cystic duct, and right and left hepatic ducts. The endoscopic guidewire is designed to be used during endoscopic pancreaticobiliary procedures for catheter introduction, exchanges of
catheters, cannulas, and sphincterotomes, and to aid in the placement of diagnostic and therapeutic devices.</p>
            </div>
            <div class="card-footer px-0 py-0 border-0 overflow-hidden">
              <a href="https://www.bostonscientific.com/en-US/products/guidewires/jagwire-revolution.html" class="btn btn-block btn-primary rounded-0">Learn more</a>
            </div>
          </div>
          <div class="card hover-shadow-lg">
            <div class="card-body">
              <div class="delimiter-bottom pb-3 mb-4">
                <img alt="Image placeholder" src="./assets/Boston_Captivator_Cold.jpg" class="svg-inject" style="height: 60px; width: auto">
                <h5 class="mt-4">Captivator Cold</h5>
              </div>
              <p class="">Captivator COLD builds on the strong clinical track record of Captivator II Snares while offering a design optimized for cold snaring of diminutive polyps.</p>
            </div>
            <div class="card-footer px-0 py-0 border-0 overflow-hidden">
              <a href="https://www.bostonscientific.com/en-US/products/snares/captivator-cold-single-use-snare.html" class="btn btn-block btn-primary rounded-0">Learn more</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Subscribe (v3) -->
    <section class="slice slice-lg">
      <div class="container">
        <div class="mb-5 text-center">
          <h3 class=" mt-4">Find out more</h3>
          <div class="fluid-paragraph mt-3">
            <p class="lead lh-180">Come and <a href="https://www.bostonscientific.com">visit our homepage</a> for more about sponsor name.</p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-7">
            <form class="mt-4">
              <div class="form-group mb-0">
                <div class="input-group input-group-lg input-group-merge rounded-pill bg-dark">
                  
              
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
<?php  

    }else{

        echo "<div class=\"container d-flex flex-wrap align-items-lg-stretch p-2 p-lg-5\">";
        echo '<p class="h6">You do not have access to the current plenary stream.  Please contact us if you believe this is a mistake</p>';
        echo '</div>';
    }


}else{

    echo "<div class=\"container d-flex flex-wrap align-items-lg-stretch p-2 p-lg-5\">";
        echo '<p class="h6">You currently do not have access to the live streams.  Please contact us if you believe this is a mistake.  You can get access <a href="' . BASE_URL . '/pages/program/registration.php">here.</a></p>';
        echo '</div>';
}

?>
      

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>
    <script>
    var videoPassed = $("#id").text();
                    </script>

    <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {


//userid is lesionUnderEdit

//console.log('updatePassword chunk');
//go to php script with an object from the form

var data = getFormDatav2($('#NewUserForm'), 'users', 'user_id', null, 1);

//TODO add identifier and identifierKey

console.log(data);

data = JSON.stringify(data);

console.log(data);

disableFormInputs('NewUserForm');

var passwordChange = $.ajax({
url: siteRoot + "/assets/scripts/passwordResetGenerate.php",
type: "POST",
contentType: "application/json",
data: data,
});

passwordChange.done(function(data){


Swal.fire({
type: 'info',
title: 'Reset Password',
text: data,
background: '#162e4d',
confirmButtonText: 'ok',
confirmButtonColor: 'rgb(238, 194, 120)',

}).then((result) => {

  resetFormElements('NewUserForm');
  enableFormInputs('NewUserForm');
  //$('#registerInterest').modal('hide');

})



})

}

        $(document).ready(function () {

            $(document).find('#chat').css('background-color', '#162e4d');


          if (signup == '2456') {

$('#registerInterest').modal('show');

}

$(document).on('click', '#submitPreRegister', function() {

event.preventDefault();
$('#NewUserForm').submit();

})

$(document).on('click', '#login', function() {

event.preventDefault();
window.location.href = siteRoot + '/pages/authentication/login.php';


})

$("#NewUserForm").validate({

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
  


          email: {
            required: true,
            email: true,

          },

          



},messages: {



email: {
required: 'Please enter the email address you used to register for GIEQs Online',



},

},
submitHandler: function(form) {

    submitPreRegisterForm();

    //console.log("submitted form");



}




});
            /* $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            }); */

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#selectDropdown').length && 
                    $('#selectDropdown').is(":visible")) {
                        $('#selectDropdown').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample2').length && 
                    $('#collapseExample2').is(":visible")) {
                        $('#collapseExample2').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample3').length && 
                    $('#collapseExample3').is(":visible")) {
                        $('#collapseExample3').collapse('hide');
                    }        
            });

            $(document).on('click', '.tagsClose', function(){

                $('#collapseExample').collapse('hide');

            })

            $('.referencelist').on('click', function (){
		
		
		//get the tag name
		
		var searchTerm = $(this).attr('data');
		
		//console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);
		
		PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm, 'PubMed Search (endoWiki)', 800, 700);

		
		
		
		
	})

	$('.referencelist').on('mouseenter', function (){

		$(this).css('color', 'rgb(238, 194, 120)');
		$(this).css('cursor', 'pointer');

	})

	$('.referencelist').on('mouseleave', function (){

		$(this).css('color', 'white');
		$(this).css('cursor', 'default');

	})


        })
    </script>
</body>

</html>