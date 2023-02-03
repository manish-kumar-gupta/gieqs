<!--Main Navbar-->
<style>

  /* .navbar-nav {

    overflow-y:scroll;

  } */

</style>

<?php 

/* 
require_once BASE_URI . '/assets/scripts/classes/users.class.php';
$users = new users;
require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;
//$sessionView = new sessionView;
require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;
//error_reporting(E_ALL); */



//TESTING

//access planning for GIEQs III

//require_once BASE_URI . '/pages/learning/includes/gieqs_iii_settings.php';



?>

<nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar" id="navbar-main">
    <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="<?php echo BASE_URL;?>/pages/program/sies.php?id=171">
            <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/brand/sies.png" id="navbar-logo"
                style="height: 50px;">
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse"
            aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
            
                
                <li class="nav-item active">
                    <a class="nav-link" href="https://assocprof.eventsair.com/sies-2023/program">Program</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/program/sies.php?id=171">Virtual Registration</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="https://www.sies.org.au/14-annual-event-2023/">In-Person Registration</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/learning/pages/general/show_subscription_sies.php?assetid=171">SIES Symposium Catch-up</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/learning/pages/general/show_subscription_sies.php?assetid=172">SIES Series II</a>
                </li>

               <!--  <li class="nav-item active">
                    <a class="nav-link" href="#">Catch-up</a>
                </li> -->

                <!-- link  -->
                <!-- Home - Overview  -->
                <!--<li class="nav-item active">
              <a class="nav-link" href="<?php echo BASE_URL;?>/index.php">Overview</a>
            </li>-->
          
               
            </ul>
        </div>
    </div>
</nav>

