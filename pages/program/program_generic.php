<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
    <?php

//define user access level



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

        <div id="action" style="display:none;"><?php if ($action){echo $action;}?></div>
        <div id="access_token" style="display:none;"><?php if ($access_token){echo $access_token;}?></div>
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

    <?php 
                            if (isset($access_token) && ($access_token == '8874101655')){

                               $access_validated = true;

                            }else{
                            
                                $access_validated = false;
                            

                             }?>


    <!-- Register Modal -->

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
                        <input type="hidden" name="access_token" value="true">

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

    programmeid: <?php echo $programme_defined;?>,

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