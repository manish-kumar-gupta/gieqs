<?php
	
//error_reporting(E_ALL);


require(BASE_URI1 . '/includes/login_functions.php');



//place to redirect the user if not allowed access
if (!isset($location)){
    $location = BASE_URL . '/index.php';
}



if (!($dbc)){
    require(DB);
    }



require(BASE_URI1 . '/scripts/interpretUserAccess.php');


?>

<noscript>
    <style type="text/css">
        .content {display:none;}
        #content {display:none;}
    </style>
    <div class="noscriptmsg">
    You don't have javascript enabled. It is required to view this site.
    </div>
</noscript>
<?php //define('BASE_URL1', 'http://localhost:90/dashboard/gieqs');?>

 
<script src="<?php echo BASE_URL1 . '/assets/js/purpose.core.js';?>"></script>
<script src="<?php echo BASE_URL1; ?>/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
	    <script src="<?php echo BASE_URL . '/includes/generaljs.js'; ?>" type="text/javascript">
</script>


	



 <!-- Favicon -->
 <link rel="icon" href="<?php echo BASE_URL1;?>/assets/img/brand/favicongieqs.png" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?php echo BASE_URL1;?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css"><!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL1;?>/assets/libs/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL1;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <!-- Purpose CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL1;?>/assets/css/purpose.css" id="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL1; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
   

<?php echo '<script src="' . BASE_URL . '/includes/jquery.validate.js"></script>';


    
    
        //echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';



    ?>

<div id="loading">
	
    </div>