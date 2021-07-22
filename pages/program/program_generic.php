<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
    <?php

//define user access level

//$debug = true;

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

$blogLink = new blogLink;
$blogs = new blogs;
$blogContent = new blogContent;


if (isset($_GET["action"])){
  $action = $_GET["action"];

}else{

  $action = false;

}

if (isset($_GET["access_token"])){
    $access_token = $_GET["access_token"];
  
  }else{
  
    $access_token = null;
  
  }


$general = new general;


if (isset($_GET["id"]) && is_numeric($_GET["id"])){
    $asset_id_url = $_GET["id"];

}else{

    $asset_id_url = null;

}

//definitions

//assetid

//$assetid = 13;
$asset_id_pagewrite = $asset_id_url;

$programme_array = $assetManager->returnProgrammesAsset($asset_id_pagewrite);
$programme_defined = $programme_array[0];

if ($debug){

print_r($programme_array);
echo $programme_defined;

}



$assets_paid->Load_from_key($asset_id_pagewrite);

$blog_to_use_as_basis = $assets_paid->getlinked_blog();
$blogs->Load_from_key($blog_to_use_as_basis);
$blogid = $blog_to_use_as_basis;



$access = [0=>['id'=>$programme_defined],];

$access1 = null;

    
$access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

    //var_dump($access1);

    //echo '<br/><br/>now get the start and end times in a single array<br/><br/>';

    $access2 = null;

    $access2 = $sessionView->getStartEndProgrammes($access1, $debug);

    //var_dump($access2);

$programme->Load_from_key($programme_defined);
$serverTimeZone = new DateTimeZone('Europe/Brussels');
$programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

$humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");

$startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);
$endTime = new DateTime($programme->getdate() . ' ' . $access2[0]['endTime'], $serverTimeZone);
$humanStartTime = date_format($startTime, "H:i");
$humanEndTime = date_format($endTime, "H:i T");

if ($debug){
var_dump($currentTime);
}

//rest should come from this




?>
    <title>GIEQs Course - <?php echo $assets_paid->getname(); ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>

    <style>
    .text-gieqsGold {

        color: rgb(238, 194, 120);

    }

    .bg-gieqsGold {

        background-color: rgb(238, 194, 120);

    }

    .modal-backdrop {
        opacity: 0.75 !important;
    }

    form.is-submitting::before {
  position: absolute;
  content: '';
  top: -0.5em;
  right: -0.5em;
  left: -0.5em;
  bottom: -0.5em;
  background: rgba(0,0,0,0.2) url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHdpZHRoPSI0MHB4IiBoZWlnaHQ9IjQwcHgiIHZpZXdCb3g9IjAgMCA0MCA0MCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS1taXRlcmxpbWl0OjEuNDE0MjE7IiB4PSIwcHgiIHk9IjBweCI+CiAgICA8ZGVmcz4KICAgICAgICA8c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWwogICAgICAgICAgICBALXdlYmtpdC1rZXlmcmFtZXMgc3BpbiB7CiAgICAgICAgICAgICAgZnJvbSB7CiAgICAgICAgICAgICAgICAtd2Via2l0LXRyYW5zZm9ybTogcm90YXRlKDBkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICAgIHRvIHsKICAgICAgICAgICAgICAgIC13ZWJraXQtdHJhbnNmb3JtOiByb3RhdGUoLTM1OWRlZykKICAgICAgICAgICAgICB9CiAgICAgICAgICAgIH0KICAgICAgICAgICAgQGtleWZyYW1lcyBzcGluIHsKICAgICAgICAgICAgICBmcm9tIHsKICAgICAgICAgICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDBkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICAgIHRvIHsKICAgICAgICAgICAgICAgIHRyYW5zZm9ybTogcm90YXRlKC0zNTlkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICB9CiAgICAgICAgICAgIHN2ZyB7CiAgICAgICAgICAgICAgICAtd2Via2l0LXRyYW5zZm9ybS1vcmlnaW46IDUwJSA1MCU7CiAgICAgICAgICAgICAgICAtd2Via2l0LWFuaW1hdGlvbjogc3BpbiAxLjVzIGxpbmVhciBpbmZpbml0ZTsKICAgICAgICAgICAgICAgIC13ZWJraXQtYmFja2ZhY2UtdmlzaWJpbGl0eTogaGlkZGVuOwogICAgICAgICAgICAgICAgYW5pbWF0aW9uOiBzcGluIDEuNXMgbGluZWFyIGluZmluaXRlOwogICAgICAgICAgICB9CiAgICAgICAgXV0+PC9zdHlsZT4KICAgIDwvZGVmcz4KICAgIDxnIGlkPSJvdXRlciI+CiAgICAgICAgPGc+CiAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMCwwQzIyLjIwNTgsMCAyMy45OTM5LDEuNzg4MTMgMjMuOTkzOSwzLjk5MzlDMjMuOTkzOSw2LjE5OTY4IDIyLjIwNTgsNy45ODc4MSAyMCw3Ljk4NzgxQzE3Ljc5NDIsNy45ODc4MSAxNi4wMDYxLDYuMTk5NjggMTYuMDA2MSwzLjk5MzlDMTYuMDA2MSwxLjc4ODEzIDE3Ljc5NDIsMCAyMCwwWiIgc3R5bGU9ImZpbGw6YmxhY2s7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNNS44NTc4Niw1Ljg1Nzg2QzcuNDE3NTgsNC4yOTgxNSA5Ljk0NjM4LDQuMjk4MTUgMTEuNTA2MSw1Ljg1Nzg2QzEzLjA2NTgsNy40MTc1OCAxMy4wNjU4LDkuOTQ2MzggMTEuNTA2MSwxMS41MDYxQzkuOTQ2MzgsMTMuMDY1OCA3LjQxNzU4LDEzLjA2NTggNS44NTc4NiwxMS41MDYxQzQuMjk4MTUsOS45NDYzOCA0LjI5ODE1LDcuNDE3NTggNS44NTc4Niw1Ljg1Nzg2WiIgc3R5bGU9ImZpbGw6cmdiKDIxMCwyMTAsMjEwKTsiLz4KICAgICAgICA8L2c+CiAgICAgICAgPGc+CiAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMCwzMi4wMTIyQzIyLjIwNTgsMzIuMDEyMiAyMy45OTM5LDMzLjgwMDMgMjMuOTkzOSwzNi4wMDYxQzIzLjk5MzksMzguMjExOSAyMi4yMDU4LDQwIDIwLDQwQzE3Ljc5NDIsNDAgMTYuMDA2MSwzOC4yMTE5IDE2LjAwNjEsMzYuMDA2MUMxNi4wMDYxLDMzLjgwMDMgMTcuNzk0MiwzMi4wMTIyIDIwLDMyLjAxMjJaIiBzdHlsZT0iZmlsbDpyZ2IoMTMwLDEzMCwxMzApOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTI4LjQ5MzksMjguNDkzOUMzMC4wNTM2LDI2LjkzNDIgMzIuNTgyNCwyNi45MzQyIDM0LjE0MjEsMjguNDkzOUMzNS43MDE5LDMwLjA1MzYgMzUuNzAxOSwzMi41ODI0IDM0LjE0MjEsMzQuMTQyMUMzMi41ODI0LDM1LjcwMTkgMzAuMDUzNiwzNS43MDE5IDI4LjQ5MzksMzQuMTQyMUMyNi45MzQyLDMyLjU4MjQgMjYuOTM0MiwzMC4wNTM2IDI4LjQ5MzksMjguNDkzOVoiIHN0eWxlPSJmaWxsOnJnYigxMDEsMTAxLDEwMSk7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNMy45OTM5LDE2LjAwNjFDNi4xOTk2OCwxNi4wMDYxIDcuOTg3ODEsMTcuNzk0MiA3Ljk4NzgxLDIwQzcuOTg3ODEsMjIuMjA1OCA2LjE5OTY4LDIzLjk5MzkgMy45OTM5LDIzLjk5MzlDMS43ODgxMywyMy45OTM5IDAsMjIuMjA1OCAwLDIwQzAsMTcuNzk0MiAxLjc4ODEzLDE2LjAwNjEgMy45OTM5LDE2LjAwNjFaIiBzdHlsZT0iZmlsbDpyZ2IoMTg3LDE4NywxODcpOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTUuODU3ODYsMjguNDkzOUM3LjQxNzU4LDI2LjkzNDIgOS45NDYzOCwyNi45MzQyIDExLjUwNjEsMjguNDkzOUMxMy4wNjU4LDMwLjA1MzYgMTMuMDY1OCwzMi41ODI0IDExLjUwNjEsMzQuMTQyMUM5Ljk0NjM4LDM1LjcwMTkgNy40MTc1OCwzNS43MDE5IDUuODU3ODYsMzQuMTQyMUM0LjI5ODE1LDMyLjU4MjQgNC4yOTgxNSwzMC4wNTM2IDUuODU3ODYsMjguNDkzOVoiIHN0eWxlPSJmaWxsOnJnYigxNjQsMTY0LDE2NCk7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNMzYuMDA2MSwxNi4wMDYxQzM4LjIxMTksMTYuMDA2MSA0MCwxNy43OTQyIDQwLDIwQzQwLDIyLjIwNTggMzguMjExOSwyMy45OTM5IDM2LjAwNjEsMjMuOTkzOUMzMy44MDAzLDIzLjk5MzkgMzIuMDEyMiwyMi4yMDU4IDMyLjAxMjIsMjBDMzIuMDEyMiwxNy43OTQyIDMzLjgwMDMsMTYuMDA2MSAzNi4wMDYxLDE2LjAwNjFaIiBzdHlsZT0iZmlsbDpyZ2IoNzQsNzQsNzQpOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTI4LjQ5MzksNS44NTc4NkMzMC4wNTM2LDQuMjk4MTUgMzIuNTgyNCw0LjI5ODE1IDM0LjE0MjEsNS44NTc4NkMzNS43MDE5LDcuNDE3NTggMzUuNzAxOSw5Ljk0NjM4IDM0LjE0MjEsMTEuNTA2MUMzMi41ODI0LDEzLjA2NTggMzAuMDUzNiwxMy4wNjU4IDI4LjQ5MzksMTEuNTA2MUMyNi45MzQyLDkuOTQ2MzggMjYuOTM0Miw3LjQxNzU4IDI4LjQ5MzksNS44NTc4NloiIHN0eWxlPSJmaWxsOnJnYig1MCw1MCw1MCk7Ii8+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4K') no-repeat 50% 50% / 1em 1em;
}


article p {

    font-size: 1.125rem !important; 
font-weight: 300 !important;

}


    .modal {
        overflow: auto !important;
    }

    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

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

        <?php 
                            if (isset($access_token) && ($assetManager->checkAssetToken($asset_id_pagewrite, $access_token, false) === true)){  //is set and is valid for this course and there are tokens remaining

                                //we know the asset_id

                                //function check_token (asset_id_desired, token, debug=false)

                               $access_validated = true;

                            }else{
                            
                                $access_validated = false;
                            

                             }?>

        <div id="action" style="display:none;"><?php if ($action){echo $action;}?></div>
        <div id="access_token" style="display:none;"><?php if ($access_validated){echo $access_token;}?></div>
        <div id="asset_id" style="display:none;"><?php if ($asset_id_url){echo $asset_id_url;}?></div>

    </header>


<?php


		
				        if ($asset_id_url){
		
                            $access = $assets_paid->Return_row($asset_id_pagewrite);
							if ($access === false){
                                echo '<div class="container mt-10 mb-10">';
                                echo "Passed id does not exist in the database";
								echo '</div>';
								include(BASE_URI . "/footer.php");
								exit();
		
							}
						}else {
							echo '<div class="container mt-10 mb-10">';
							echo "This page requires the id of an asset existing in the database to be passed";
							echo '</div>';
							include(BASE_URI . "/footer.php");
							exit();
							
                        }

        
                        
                  
                        

?>

    <div class="main-content">

    <?php 
    
    //if an asset

    //$debug = true;


    
    $partnerAsset = $assets_paid->getpartner();

    if ($debug){


        echo '<br/><br/><br/><br/>';
        var_dump($assets_paid);

        echo $partnerAsset . ' is partnerAsset';
    }

    $sponsorAsset = $assets_paid->getsponsor();

    if ($partnerAsset != ''){

        require_once(BASE_URI . '/assets/scripts/classes/partner.class.php');
        $partner = new partner;
        //get the logo from partner

        $partner->Load_from_key($partnerAsset);

        $partner_logo_check = $partner->getlogo_src();

        if ($partner_logo_check != ''){

            $partner_src = $partner_logo_check;
        }else{

            $partner_src = FALSE;
            
        }

        if ($debug){


            echo '<br/><br/><br/><br/>';
            var_dump($partner);
    
            echo $partner_logo_check . ' is partner_logo_check';
            echo $partner_src . ' is partner_src';
        }

        //store the src

        //echo below

    }

    if ($sponsorAsset != ''){

        require_once(BASE_URI . '/assets/scripts/classes/sponsor.class.php');
        $sponsor = new sponsor;
        //get the logo from partner

        $sponsor->Load_from_key($sponsorAsset);


        $sponsor_logo_check = $sponsor->getlogo_src();

        if ($sponsor_logo_check != ''){

            $sponsor_src = $sponsor_logo_check;
        }else{

            $sponsor_src = FALSE;
            
        }

        //store the src

        //echo below

    }
    
   // $debug = false;
    
    
    ?>

        <!-- Header (v1) -->
        <section class="header-1 bg-gradient-dark" data-offset-top="#header-main">


        </section>

        <!-- PROGRAM TABLE -->

        <section class="sliice bg-gradient-dark pt-6 mb-0 pb-5">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-1">
                        <span class="h1" style="color: rgb(238, 194, 120);"><?php echo $assets_paid->getName(); ?><br /></span>
                        <span class="h3 mt-4" style="color: rgb(238, 194, 120);"><?php echo 'Live :  ' . $humanReadableProgrammeDate;?></span>
                        <span class="h3" style="color: rgb(238, 194, 120);"><?php echo ', ' . $humanStartTime . ' - ' . $humanEndTime;?> <br/>on Demand
                            thereafter<br /></span>

                            <div class="d-flex justify-content-center container pt-2">
            <div class="d-flex flex-column m-2">

            <?php if ($partner_src){?>
            <div class="h4 p-3">In partnership with</div><img height="75px" src='<?php echo $partner_src;?>'>
            <?php }?>
            </div>
            <div class="d-flex flex-column m-2">

            <?php if ($sponsor_src){?>
            <div class="h4 p-3">Proudly supported by</div><img height="75px" src='<?php echo $sponsor_src;?>'>
            <?php }?>
            </div>
            </div>
                        <a href="#targetScrollProgramme" id="wednesdayTop"
                            class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 scroll-me">
                            <span class="btn-inner--text text-dark">View Programme</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <?php 
                        

                        if ($userid){

                            

                            if ($assetManager->doesUserHaveSameAssetAlready($asset_id_pagewrite, $userid, false)){
                                //user owns This
                                ?>

                                <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                    class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                    <span class="btn-inner--text text-dark">View My Course!</span>
                                    <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                                </a>


                             
                        
                        
                   

                        

                        <?php }else{ ?>

                            <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>

                        <?php
                      
                        }//close if owns this

                    }else{//close if user id
                        
                        ?>

<a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>



<?php }?>
                    </div>

                </div>
            </div>

        </section>

        <section class="">
        <?php         include(BASE_URI . '/pages/learning/blog_article_generate.php');?>
        </section>
        <section class="">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-4">
                        <!-- <a href="#" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me"> -->
                        <!-- <span class="btn-inner--text">Overview</span> -->
                        <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        <!-- </a> -->


                        <!-- <p class=""><span class="text-white">Programme description:</span> Acquisition of the skills necessary to perform basic colonoscopy is still difficult. To become a skilled colonoscopist takes a long time. This course will explore and deconstruct the key problem areas encountered when performing colonoscopy with commentary and analysis .  </p>

                        <p class=""><span class="text-white">What to expect:</span> We will demonstrate the essentials of how to control the instrument effectively, and how to diagnose and overcome failure to progress.  The goal will be to provide participants with a clear understanding of the essential components of high quality colonoscopy and practical advice of how to improve when they get back into the endoscopy room.</span></p>
                        <p class=""><span class="text-white">Format of the course:</span> The course is suitable for anyone who wants to improve their colonoscopy skills and ideal for trainees learning colonoscopy. The format of the course will be a mixture of short presentations, discussion groups and in depth analysis of colonoscopy technique. Delegates will be invited to participate at various junctures of the course and everyone will be able to pose questions at any time.</p> -->
                        <?php 
                        

                        if ($userid){

                            

                            if ($assetManager->doesUserHaveSameAssetAlready($asset_id_pagewrite, $userid, false)){
                                //user owns This
                                ?>

                                <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                    class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                    <span class="btn-inner--text text-dark">View My Course!</span>
                                    <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                                </a>


                             
                        
                        
                   

                        

                        <?php }else{ ?>

                            <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>

                        <?php
                      
                        }//close if owns this

                    }else{//close if user id
                        
                        ?>

<a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>



<?php }?>
                        <!-- <a href="#targetScrollProgramme" id="thursday" class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Tues 17 Nov</span>
                        </a> -->
                    </div>

                </div>

                <hr id="targetScrollProgramme" class="divider divider-fade" />


                <div id="ajaxWed">

                </div>



            </div>
        </section>
    </div>

   


    <!-- Register Modal $access_token == '8874101655')-->

    <div class="modal fade" id="registerInterest" tabindex="-1" role="dialog" aria-labelledby="registerInterestLabel"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">Sign-up for
                        GIEQs Online!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <span class="h6">This will only take 2 seconds.</span><span><br />We need your email address and a
                        password to keep track of your learning aims and objectives. Thereafter you can choose what
                        further information you share with us</span>
                    <form id="NewUserForm" class="mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">First name</label>
                                    <input name="firstname" class="form-control" type="text"
                                        placeholder="Enter your first name" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last name</label>
                                    <input name="surname" class="form-control" type="text"
                                        placeholder="Also your last name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">Gender</label>
                                    <select name="gender" class="form-control" aria-hidden="true">
                                        <option hidden>select gender
                                        </option>
                                        <option value="1">Female</option>
                                        <option value="2"> Male</option>
                                        <option value="3">Rather not say</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email (will be your user id)</label>
                                    <input name="email" class="form-control" type="email" placeholder="name@example.com"
                                        value="">
                                    <!--                     <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. <a href="account-notifications.html">Manage your notifications</a> in order to control what we send.</small>
         -->
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">I am a...</label>
                                    <select name="endoscopistType" class="form-control" aria-hidden="true">
                                        <option hidden selected disabled>Select the option which best describes you
                                        </option>
                                        <option value="1">Medical Endoscopist</option>
                                        <option value="2">Surgical Endoscopist</option>
                                        <option value="3">Nurse Endoscopist</option>
                                        <option value="4">Endoscopy Nurse (assistant)</option>
                                        <option value="5">Medical Student</option>
                                        <option value="6">Nursing Student</option>
                                        <option value="7">Not a healthcare professional</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Institution country</label>
                                    <select id="centreCountry" name="centreCountry" class="form-control" tabindex="-1"
                                        aria-hidden="true">
                                        <option hidden disabled selected>select a country...</option>
                                        <?php $countries = $general->getCountries();
                        
                        foreach ($countries as $key=>$value){
                        
                        ?>

                                        <option value="<?php echo $key;?>"><?php echo $value;?></option>




                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input id="password" name="password" class="form-control" type="password"
                                        placeholder="Enter your password" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password again</label>
                                    <input name="passwordAgain" class="form-control" type="password"
                                        placeholder="password again" value="">
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" name="checkterms" class="custom-control-input" id="checkterms">
                                <label class="custom-control-label" for="checkterms">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_terms_and_conditions.php"
                                        target="_blank">terms and conditions</a></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="checkprivacy" class="custom-control-input"
                                    id="checkprivacy">
                                <label class="custom-control-label" for="checkprivacy">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_privacy_policy.php"
                                        target="_blank">privacy policy</a></label>
                            </div>
                        </div>

                        <input type="hidden" id="signup_redirect" name="signup_redirect" value="<?php echo $asset_id_pagewrite;?>">

                        <?php if ($access_validated){

                            ?>
                        <input type="hidden" name="access_token" value="<?php echo $access_token;?>">

                        <?php
                        }
                       

                        ?>

                    </form>
                </div>
                <div class="modal-footer">
                    <button id="submitPreRegister" type="button" class="btn btn-small text-dark bg-gieqsGold">Sign
                        up</button>
                    <button id="login" type="button" class="btn btn-small btn-secondary">I already have a login</button>



                </div>
            </div>
        </div>
    </div>

 
    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->

    <script src="../../assets/js/purpose.core.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>
    <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>


    <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script>

    <?php require BASE_URI . '/assets/scripts/purchase.php';?>

    
    <script>

function submitPreRegisterForm() {


//userid is lesionUnderEdit

//console.log('updatePassword chunk');
//go to php script with an object from the form

$('#submitPreRegister').append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');


var data = getFormDatav2($('#NewUserForm'), 'users', 'user_id', null, 1);

//TODO add identifier and identifierKey

console.log(data);

data = JSON.stringify(data);

console.log(data);

disableFormInputs('NewUserForm');

var passwordChange = $.ajax({
    url: siteRoot + "/assets/scripts/newUser.php",
    type: "POST",
    contentType: "application/json",
    data: data,
});

passwordChange.done(function(data) {


    Swal.fire({
        type: 'info',
        title: 'Create Account',
        text: data,
        background: '#162e4d',
        confirmButtonText: 'ok',
        confirmButtonColor: 'rgb(238, 194, 120)',

    }).then((result) => {

        resetFormElements('NewUserForm');
        $(document).find('#signup_redirect').val(asset_id);
        enableFormInputs('NewUserForm');
        $('#registerInterest').modal('hide');
        $('#submitPreRegister').find('i').remove();


    })



})

}


function refreshProgrammeView() {



const dataToSend = {

    programmeid: <?php if(isset($programme_defined)){echo $programme_defined;} else{echo 'null';};?>,

}

const jsonString = JSON.stringify(dataToSend);
console.log(jsonString);

var request2 = $.ajax({
    url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
    type: "POST",
    contentType: "application/json",
    data: jsonString,
});



request2.done(function(data) {
    // alert( "success" );
    $('#ajaxWed').html(data);
    //$(document).find('.Thursday').hide();
})
}

$(document).ready(function() {




refreshProgrammeView();

});


                        </script>




</body>

</html>