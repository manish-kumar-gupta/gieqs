<?php 

require '../assets/includes/config.inc.php';
/* Short and sweet */
define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');



require(BASE_URI . '/assets/wp/wp-blog-header.php');

spl_autoload_register ('class_loader');
//get_header(); 

?>




<head>

    <?php

     //define user access level

     $openaccess = 1;

     require BASE_URI . '/head.php';


if (isset($_GET['id'])) {

    $id = $_GET['id'];

}else{

    $id = 93;   //should be generic post which tells that a post id is required
 }

echo '<div id="id" style="display:none;">' . $id . '</div>';


$title = get_post_field('post_title', $id);
$author = get_post_field('post_author', $id);


$content = apply_filters('the_content', get_post_field('post_content', $id));

$post_tags = get_the_tags($id);




     


      ?>


    <!--META DATA-->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title;?></title>
    <meta name="description"
        content="The Gastrointestinal Quality and Safety (GIEQs) Foundation is a not-for profit organisation dedicated to improving quality and safety in everyday endoscopic practice.">
    <meta name="author" content="<?php echo $author;?>">
    <meta name="keywords"
        content="<?php if ( $post_tags ) {
	foreach( $post_tags as $tag ) {
    echo $tag->name . ', '; 
	}
}?>">

    


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>



        


    </header>



    <?php 


?>


    <div class="blog-container container mt-5 pt-10">
    
    <?php


echo '<span class="display-4 font-weight-light">' . $title . '</span>';
echo $content;



?>







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
