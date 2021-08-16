<!DOCTYPE html>
<html lang="en">

<?php require 'includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;

      //blank previous browsing

      setcookie('browsing', null, time() + (365 * 24 * 60 * 60), '/');

      setcookie('browsing_id', null, time() + (365 * 24 * 60 * 60), '/');

      setcookie('browsing_array', null, time() + (365 * 24 * 60 * 60), '/');



      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;

      //require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
      $users = new users;
      $userActivity = new userActivity;
      $userFunctions = new userFunctions;


      $navigator = new navigator;

      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime('now', new DateTimeZone('UTC'));     
        $ago = new DateTime($datetime, new DateTimeZone('UTC'));
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }


      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">



    <style>
    .gieqsGold {

        color: rgb(238, 195, 120);


    }

    .tagButton {

        cursor: pointer;

    }

    .tagCard {

        background-color: #1b385d75;



    }

    .tagCardHeader {

        background-color: #162e4d;

    }



    .cursor-pointer {

        cursor: pointer;

    }

    @supports ((position: -webkit-sticky) or (position: sticky)) {

        .sticky-top {
            position: -webkit-sticky !important;
            position: sticky !important;
            z-index: 1020;
            top: 0;
        }
    }


    @media (min-width: 992px) {
        .tagCard {


            left: -50vw;
            top: -20vh;


        }
    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

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

    /*
 * Variables
 */
    :root {
        --card-padding: 24px;
        --card-height: 480px;
        --card-skeleton: linear-gradient(#193659 var(--card-height), transparent 0);
        --avatar-size: 32px;
        --avatar-position: var(--card-padding) var(--card-padding);
        --avatar-skeleton: radial-gradient(circle 16px at center, #162e4d 99%, transparent 0);
        --title-height: 32px;
        --title-width: 200px;
        --title-position: var(--card-padding) 180px;
        --title-skeleton: linear-gradient(#162e4d var(--title-height), transparent 0);
        --desc-line-height: 16px;
        --desc-line-skeleton: linear-gradient(#162e4d var(--desc-line-height), transparent 0);
        --desc-line-1-width: 230px;
        --desc-line-1-position: var(--card-padding) 242px;
        --desc-line-2-width: 180px;
        --desc-line-2-position: var(--card-padding) 265px;
        --footer-height: 40px;
        --footer-position: 0 calc(var(--card-height) - var(--footer-height));
        --footer-skeleton: linear-gradient(#162e4d var(--footer-height), transparent 0);
        --blur-width: 200px;
        --blur-size: var(--blur-width) calc(var(--card-height) - var(--footer-height));
    }

    /*
 * Card Skeleton for Loading
 */
    .card-skeleton {
        width: 280px;
        height: var(--card-height);
    }

    .card-skeleton:empty::after {
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        border-radius: 6px;
        box-shadow: 0 10px 45px rgba(0, 0, 0, 0.1);
        background-image: linear-gradient(90deg, rgba(238, 195, 120, 0) 0, rgba(238, 195, 120, 0.8) 50%, rgba(238, 195, 120, 0) 100%), var(--title-skeleton), var(--desc-line-skeleton), var(--desc-line-skeleton), var(--avatar-skeleton), var(--footer-skeleton), var(--card-skeleton);
        background-size: var(--blur-size), var(--title-width) var(--title-height), var(--desc-line-1-width) var(--desc-line-height), var(--desc-line-2-width) var(--desc-line-height), var(--avatar-size) var(--avatar-size), 100% var(--footer-height), 100% 100%;
        background-position: -150% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
        background-repeat: no-repeat;
        -webkit-animation: loading 1.5s infinite;
        animation: loading 1.5s infinite;
    }

    /*  background-image: linear-gradient(90deg, rgba(211, 211, 211, 0) 0, rgba(211, 211, 211, 0.8) 50%, rgba(211, 211, 211, 0) 100%), var(--title-skeleton), var(--desc-line-skeleton), var(--desc-line-skeleton), var(--avatar-skeleton), var(--footer-skeleton), var(--card-skeleton);
*/

    @-webkit-keyframes loading {
        to {
            background-position: 350% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
        }
    }

    @keyframes loading {
        to {
            background-position: 350% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
        }
    }

    .demo {
        margin: auto;
        width: 300px;
        height: 700px;
        /* change height to see repeat-y behavior */

        background-image:
            radial-gradient(circle 16px, white 99%, transparent 0),
            /* layer 1: title */
            /* white rectangle with 40px height */
            linear-gradient(white 40px, transparent 0),
            /* layer 0: card bg */
            /* gray rectangle that covers whole element */
            linear-gradient(gray 100%, transparent 0);

        background-repeat: no-repeat;

        background-size:
            32px 32px,
            /* avatar */
            200px 40px,
            /* title */
            100% 100%;
        /* card bg */

        background-position:
            24px 24px,
            /* avatar */
            24px 200px,
            /* title */
            0 0;
        /* card bg */

        animation: shine 1s infinite;
    }

    @keyframes shine {
        to {
            background-position:
                350% 0,
                200px
                /*var(--title-position)*/
                ,
                var(--desc-line-1-position),
                var(--desc-line-2-position),
                var(--avatar-position),
                var(--footer-position),
                0 0
        }
    }
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>

        <?php
        $usersMetricsManager = new usersMetricsManager;
        $usersViewsVideo = new usersViewsVideo;
        $usersSocial = new usersSocial;

        require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
        $assetManager = new assetManager;

        require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;

        $video_PDO = new video_PDO;


        $debug = false;
    ?>






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

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

        <div class="main-content">
            <!-- Header (account) -->
            <section class="page-header bg-dark-dark d-flex align-items-end pt-8 mt-10"
                style="background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/1v2.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;"
                data-offset-top="#header-main">


                <!-- Header container -->
                <div class="container pt-0 pt-lg-0">
                    <div class="row">
                        <div class=" col-lg-12">
                            <!-- Salute + Small stats -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto mb-4 mb-md-0">
                                    <span class="h2 mb-0 text-white text-bold d-block">Welcome to your GIEQs Online Dashboard.
                                        <?php //echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></span>
                                    <span class="text-white">Your home for evidence-based endoscopy education.</span>
                                </div>
                                <!-- video -->
                                <div class="col-auto flex-fill d-none d-xl-block">
                                    <!-- <div id="videoDisplay" class="embed-responsive embed-responsive-16by9">
                <iframe  id='videoChapter' class="embed-responsive-item"
                    src='https://player.vimeo.com/video/398791515' allow='autoplay'
                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div> -->
                                </div>
                            </div>
                            <!-- Account navigation -->


                        </div>
                    </div>
                </div>
            </section>
            <?php require BASE_URI . '/pages/learning/assets/upgradeNav.php';?>

            <?php require BASE_URI . '/pages/learning/assets/materialNav.php';?>


            <!-- New material -->
            <section class="slice delimiter-bottom m-0 p-2" id="statistics">
                <div class="container pt-0 pt-lg-0">

                    <div class="actions-toolbar py-2">
                       <!--  <h5 class="mb-1">Your GIEQs Stats</h5>
                        <p class="text-sm text-muted mb-0">How GIEQy are you <?php //echo $_SESSION['firstname'];?>?</p> -->
                    </div>

                    <div class="mb-5">
                        <div class="row">
                            <!-- <div class="col-lg-4">
                                <div
                                    class="card card-stats bg-gradient-dark border-0 hover-shadow-lg hover-translate-y-n3 mb-0 ml-lg-0">
                                    <div class="actions actions-dark">
                                        <a href="#" class="action-item">
                                         
                                        </a>

                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <div class="icon text-white icon-sm">
                                                    <i class="fas fa-video"></i>
                                                </div>
                                            </div>
                                            <div class="pl-4">
                                                <?php //$completionArray = $usersMetricsManager->userCompletionVideos($userid, false);?>
                                                <span
                                                    class="d-block h5 text-white mr-2 mb-1"><?php //echo $completionArray['numerator'];?>
                                                    / <?php //echo $completionArray['denominator'];?>
                                                    (<?php //echo round($completionArray['completion'], 2);?>%)</span>
                                                <span class="text-white">Videos Completed</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div> -->
                            <div class="col-lg-6">
                                <div
                                    class="card card-stats bg-gradient-dark border-0 hover-shadow-lg hover-translate-y-n3 mb-0 ml-lg-0">
                                    <div class="actions actions-dark">
                                        <a href="#" class="action-item">
                                            <!-- <i class="fas fa-sync-alt"></i> -->
                                        </a>

                                    </div>
                                    <?php $completionArray = $usersMetricsManager->userCompletionVideos($userid, false);?>

<?php error_reporting(E_ALL); $completionArrayAsset = $usersMetricsManager->userCompletionAsset($userid, 7, false);?>

                                    <?php

                                    //eventually break out

//define status levels

$status = [

    0 => ['color' => 'bronze', 'threshold' => 25,],
    1 => ['color' => 'silver', 'threshold' => 50,],

    2 => ['color' => 'gold', 'threshold' => 75,],

    3 => ['color' => 'platinum', 'threshold' => 100,],





];

$userCurrentCompletion = round($completionArray['completion'], 1);

//test
//$userCurrentCompletion = 73.7;


$x = null;
$y = 0;
foreach ($status as $key=>$value)
{

    if ($debug){
    echo $y . ' /$y is';
    echo '/$userCurrentCompletion is ' . $userCurrentCompletion;
    echo '/$threshold is '. $value['threshold'];
    echo '/$status[$y-1][threshold] is '. $status[$y-1]['threshold'];
    }
    

if ($y == 0){

    if ($userCurrentCompletion < $value['threshold'] ){

        $currentUserStatus = $value['color'];
        $currentUserStatusArrayKey = $y;

        $userPercentToNextThreshold = $value['threshold'] - $userCurrentCompletion;



    }

    //echo 'enter y == 0 loop';


}else{

    if ($userCurrentCompletion < $value['threshold'] && $userCurrentCompletion > $status[$y-1]['threshold'] ){

        $currentUserStatus = $value['color'];
        $currentUserStatusArrayKey = $y;

        $userPercentToNextThreshold = $value['threshold'] - $userCurrentCompletion;





    }

}

$y++;


if ($debug){
echo '<br/>';
}

}

$number_of_experiences_to_next_threshold = (($userPercentToNextThreshold / 100) * $completionArray['denominator']);
$number_of_experiences_to_next_threshold = round($number_of_experiences_to_next_threshold, 0);

//getcurrent UTC time
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//construct status statement
$statusStatement = 'STATUS[' . $currentUserStatusArrayKey . ']';


//if  current status

$debug = false;

if ($userFunctions->currentStatus($userid, $statusStatement) != FALSE){

    //update

    $id_userActivity = $userFunctions->currentStatus($userid, $statusStatement);

    $userActivity->Load_from_key($id_userActivity);

    //get the current status

    $currentStatusDB = preg_replace('/[^0-9]/', '', $userActivity->getsession_id());

    if ($debug){

        echo 'currentStatus ' . 'is ' . $currentStatusDB;
        echo 'currentStatusArray key  ' . 'is ' . $currentUserStatusArrayKey;

        echo '$id_userActivity key  ' . 'is ' . $id_userActivity;
        ECHO '$userActivity->getsession_id() is' . $userActivity->getsession_id();

    }

    if ($currentStatusDB == $currentUserStatusArrayKey){

        if ($debug){

            echo 'no update status unchanged';
        }

        //no update if status the same
    }else if (intval($currentStatusDB) > intval($currentUserStatusArrayKey)){

        //do not update status if the status in db higher than the currently detected status
        if ($debug){

            echo 'no update status calculated lower than current db status -> user keeps status';
        }

    }
    else if (intval($currentStatusDB) < intval($currentUserStatusArrayKey)){

        //update status if the status in db lower than the currently detected status
        if ($debug){

            echo 'update status calculated higher than current db status -> user gains new status';
        }
    $userActivity->setsession_id($statusStatement);
    $userActivity->setactivity_time($sqltimestamp);
    $userActivity->prepareStatementPDOUpdate();

    }


}else{

    $userActivity->New_userActivity($userid, $statusStatement, $sqltimestamp, null);
    $userActivity->prepareStatementPDO();

}

//add a STATUS event to the database

//$userActivity->New_userActivity($data['user_id'], null, $sqltimestamp, null);
//$userActivity->prepareStatementPDO();



//now based on db status

?>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <div class="icon text-white icon-lg">
                                                <i class="fas fa-medal <?php echo $status[$userFunctions->returnCurrentStatusUser($userid, false)]['color'];?>"></i>
                                              
                                                </div>
                                            </div>
                                            <div class="pl-4">
                                                
                                            <span
                                                    class="d-block h5 text-white mr-2 mb-1">GIEQs Online Status</span>
                                                    <span
                                                    class="d-block h6 text-white mr-2 mb-1 mt-2"><?php echo ucfirst($status[$userFunctions->returnCurrentStatusUser($userid, false)]['color']);?> Status</span>


                                                    
                                                   
                                           






                                                    <span
                                                    class="d-block h6 text-white mr-2 mb-1 mt-4">Overall Completion 
                                                    <?php echo round($completionArray['completion'], 1);?>%</span>


                                                    <p>                                                    <?php echo $assetManager->countCoursesUser($userid, false);?>
 / <?php echo $assetManager->countCourses();?> Courses<br/>
 <?php echo $assetManager->countPremiumPacksUser($userid, false);?> / <?php echo $assetManager->countPremiumPacks();?> Premium Content Packs<br/>
                                                     <?php echo $completionArray['numerator'];?> / <?php echo $completionArray['denominator'];?> Total Learning Experiences</p>
                                               
                                               <?php //fix for platinum
                                               
                                               if ($userFunctions->returnCurrentStatusUser($userid, false) < 3){
                                               ?>

                                                    <p>Complete <?php echo $number_of_experiences_to_next_threshold;?> more individual Learning Experiences to reach GIEQs <?php echo ucfirst($status[$userFunctions->returnCurrentStatusUser($userid, false)+1]['color']);?> Status</p>


                                                <?php }else{ ?>

                                                    <p>Congratulations on achieving the Premier Tier of GIEQs Online Status</p>


                                               <?php } ?>

                                               <a
                                            class="btn-sm bg-<?php echo $status[$userFunctions->returnCurrentStatusUser($userid, false)]['color'];?> p-1 mt-5 cursor-pointer"
                                            onclick="window.location.href = siteRoot + 'gieqs-status.php';">

                                            <span class="btn-inner--text text-dark text-sm">Find Out More</span>
                                        </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-1">
    </div>
                            <div class="col-lg-5 mt-2">
                                <div
                                    class="card card-stats bg-gradient-dark border-0 hover-shadow-lg hover-translate-y-n3 mb-0 ml-lg-0">
                                    <div class="actions actions-dark">
                                        <a href="#" class="action-item">
                                           <!--  <i class="fas fa-sync-alt"></i> -->
                                        </a>

                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <div class="icon text-white icon-lg">
                                                <img
    src="<?php echo BASE_URL . "/assets/img/icons/coin.svg"?>"
    alt="GIEQs Coin"
    />
                                                </div>
                                            </div>
                                            <div class="pl-4">
                                            <span
                                                    class="d-block h5 text-white mr-2 mb-1">GIEQs Coin</span>
                                                    <span
                                                    class="d-block h6 text-white mr-2 mb-1">Spend on your next GIEQs Experience</span>
                                                    <p>Current balance : <?php echo $coin->current_balance($userid);
 ?> <img
    src="<?php echo BASE_URL . "/assets/img/icons/coin.svg"?>"
    alt="GIEQs Coin" height="24" width="24"
    /></p>
    <p>                                            <a
                                            class="btn-sm bg-gieqsGold p-1 mt-5 cursor-pointer"
                                            onclick="window.location.href = siteRoot + 'gieqs-coins.php';">

                                            <span class="btn-inner--text text-dark text-sm">Find Out More</span>
                                        </a>
</p>
                                                    
                                           
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <section class="slice delimiter-bottom m-0 p-2" id="whats-new">

                <div class="container pt-0 pt-lg-0">
                    <div class="actions-toolbar py-2 mb-4 ">


                        <h4 class="mb-1  mt-2">What's New</h4>
                        <p class="text-sm text-muted mb-0">Jump right into a new learning experience.</p>
                    </div>
                    <div class="placeholder">
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                    </div>

                </div>

            </section>

           

            <!-- Finish watching videos -->




            <section id="catchup" class="slice slice-lg bg-section-secondary delimiter-top m-0 p-2">
                <div class="container pt-0 pt-lg-0">
                    <div class="actions-toolbar py-2 mb-4 ">
                        <h4 class="mb-1  mt-2">Pick up where you left off</h4>
                        <p class="text-sm text-muted mb-0">Videos you started watching, jump back in.</p>
                    </div>
                    <div class="placeholder">
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                    </div>


                </div> <!-- end container div-->

            </section>

            <!-- Suggested videos -->


            <section id="suggested" class="slice slice-lg delimiter-top m-0 p-2">
                <div class="container pt-0 pt-lg-0">
                    <div class="actions-toolbar py-2 mb-4 ">
                        <h4 class="mb-1 mt-2">Suggested Next Steps</h4>
                        <p class="text-sm text-muted mb-0">Based on what you watched previously.</p>
                    </div>
                    <div class="placeholder">
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                    </div>



                </div> <!-- end container div-->

            </section>

            <!-- Popular videos -->


            <section id="popular" class="slice slice-lg bg-section-secondary delimiter-top m-0 p-2">
                <div class="container pt-0 pt-lg-0">
                    <div class="actions-toolbar py-2 mb-4 ">


                        <h4 class="mb-1  mt-2">Popular Videos</h4>
                        <p class="text-sm text-muted mb-0">What others are watching right ow.</p>
                    </div>
                    <div class="placeholder">
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                    </div>

                    

                </div> <!-- end new material div-->
        </div> <!-- end container div-->

        </section>


        </div>

        <?php require BASE_URI . '/footer.php';?>

        <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
        <!-- <script src="assets/js/purpose.core.js"></script> -->
        <!-- Page JS -->



        <!-- Google maps -->

        <!-- Purpose JS -->
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
        <script>
        var videoPassed = $("#id").text();
        </script>

        <script>
        var signup = $('#signup').text();

        function getNew() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getNewVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                $('#whats-new').find('.placeholder').html(data);
                //$(document).find('.Thursday').hide();
            })


        }

        function getRecentViewed() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getRecentViewedVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                $('#catchup').find('.placeholder').html(data);
                //$(document).find('.Thursday').hide();
            })


        }

        function getNextSteps() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getNextStepsVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                $('#suggested').find('.placeholder').html(data);
                //$(document).find('.Thursday').hide();
            })


        }

        function getPopular() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getPopularVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                $('#popular').find('.placeholder').html(data);
                //$(document).find('.Thursday').hide();
            })


        }

        function submitPreRegisterForm() {

            var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null,
                "0"); //insert new object

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

        $(document).ready(function() {


            getNew();
            getRecentViewed();
            getNextSteps();
            getPopular();

            /* $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            }); */

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#selectDropdown').length &&
                    $('#selectDropdown').is(":visible")) {
                    $('#selectDropdown').collapse('hide');
                }
            });

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#collapseExample2').length &&
                    $('#collapseExample2').is(":visible")) {
                    $('#collapseExample2').collapse('hide');
                }
            });

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#collapseExample3').length &&
                    $('#collapseExample3').is(":visible")) {
                    $('#collapseExample3').collapse('hide');
                }
            });

            $(document).on('click', '.tagsClose', function() {

                $('#collapseExample').collapse('hide');

            })

            $('.referencelist').on('click', function() {


                //get the tag name

                var searchTerm = $(this).attr('data');

                //console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);

                PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm,
                    'PubMed Search (endoWiki)', 800, 700);





            })

            $('.referencelist').on('mouseenter', function() {

                $(this).css('color', 'rgb(238, 194, 120)');
                $(this).css('cursor', 'pointer');

            })

            $('.referencelist').on('mouseleave', function() {

                $(this).css('color', 'white');
                $(this).css('cursor', 'default');

            })


        })
        </script>
    </body>

</html>