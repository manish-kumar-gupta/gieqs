<?php
	
    //error_reporting;
 
    //print_r($_SESSION);

     require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

     $registrationURL = 'https://www.gieqs.com/pages/program/registration.php';
     //$registrationURL = 'https://eu.eventscloud.com/200200203';
 ?>

 <!--META DATA-->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="The Ghent International Endoscopy Symposium is an endoscopy symposium focussed on promoting quality in the endoscopic interventions we perform everyday">
    <meta name="author" content="David Tate">
    <meta name="keywords" content="colonoscopy, gastroscopy, ERCP, quality, polyp, colon cancer, colorectal cancer, endoscopy, gieqs, GIEQS">
 
 <!-- Favicon -->
 <link rel="icon" href="<?php echo BASE_URL;?>/assets/img/brand/favicongieqs.png" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css"><!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <!--Extra CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/select2/dist/css/select2.min.css">
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/select2/dist/css/select2bootstrap.min.css">
     -->
    <!-- Purpose CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">
   
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/gieqs.css">

<!-- Global JS -->

<script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>
<script src="<?php echo BASE_URL;?>/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
<script src="<?php echo BASE_URL;?>/pages/learning/includes/generaljs.js"></script>
<script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>