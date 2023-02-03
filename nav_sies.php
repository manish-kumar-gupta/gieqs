<!--Main Navbar-->
<style>

  /* .navbar-nav {

    overflow-y:scroll;

  } */

</style>

<?php 



require_once BASE_URI . '/assets/scripts/classes/users.class.php';
$users = new users;
require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;
//$sessionView = new sessionView;
require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;
//error_reporting(E_ALL);


require_once BASE_URI . "/vendor/autoload.php";
spl_autoload_unregister ('class_loader');

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
$options = new QROptions([
	'version'    => 7,
	'outputType' => QRCode::OUTPUT_MARKUP_SVG,
  'eccLevel'   => QRCode::ECC_L,
  'cssClass' => 'gieqsGold',
  'svgOpacity' => 50,
  'scale' => 3,
]);
$qrcode = new QRCode($options);
spl_autoload_register ('class_loader');

//TESTING

//access planning for GIEQs III

require_once BASE_URI . '/pages/learning/includes/gieqs_iii_settings.php';



?>

<nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar" id="navbar-main">
    <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="<?php echo BASE_URL;?>/index.php">
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
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/learning/blog_wp.php">Virtual-Registration</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/learning/blog_wp.php">Live</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/learning/blog_wp.php">Watch</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/learning/blog_wp.php">Catch-up</a>
                </li>
                <!-- Home - Overview  -->
                <!--<li class="nav-item active">
              <a class="nav-link" href="<?php echo BASE_URL;?>/index.php">Overview</a>
            </li>-->
          
               
            </ul>
        </div>
    </div>
</nav>