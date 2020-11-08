<?php
$openaccess = 1;

//$requiredUserLevel = 6;



error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';


$location = BASE_URL . '/index.php';

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = false;



$general = new general;
$users = new users;
$users->Load_from_key($userid);


error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
$sessionView = new sessionView;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;



require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;



require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

error_reporting(E_ALL);

echo 'hello';

$assetArray = $assetManager->which_assets_contain_programme('32');

var_dump($assetArray);

var_dump ($userid);


//for a given programme id does the user have access [active subscription]
echo '<br/><br/><br/>';
echo '<h2>Does a given userid have access to a given programmeid via a subscription?</h2>';


$access = $assetManager->programme_owned_by_user('32', $userid, true);

var_dump($access);

//for a given asset id does the user have access [active subscription]

echo '<br/><br/><br/>';
echo '<h2>Does a given userid have access to a given assetid via a subscription?</h2>';


$access = null;

$access = $assetManager->is_assetid_covered_by_user_subscription('9', $userid, true);

var_dump($access);


//for a given video id does the user have access [active subscription] or is the video free....

$videoid = '78';
echo '<br/><br/><br/>';
echo '<h2>Does a given userid have access to a given videoid via a subscription?</h2>';


echo 'Does user id ' . $userid . ' have accesss to video id ' . $videoid . ' via a subscription? <br/>';


$access = null;

$access = $assetManager->video_owned_by_user($videoid, $userid, true);

var_dump($access);

//does this video require a subscription
echo '<br/><br/><br/>';

$videoid = '77';
echo '<h2>Does a given video require a subscription?</h2>';

echo 'Does video ' . $videoid . ' require a subscription? <br/>';

$access = null;

$access = $assetManager->video_requires_subscription($videoid, true);

var_dump($access);

//does this video require a subscription
echo '<br/><br/><br/>';


$videos = array('77', '78');
///$videoid = '77';
echo '<h2>Return tag categories for given video array</h2>';

echo 'The tag categories for ' . print_r($videos);

$access = null;

$access = $assetManager->getVideoTagCategories($videos, true);

var_dump($access);

//find the active programme
echo '<br/><br/><br/>';

$serverTimeZone = new DateTimeZone('Europe/Brussels');
$currentTime = new DateTime('now', $serverTimeZone);


            //test

            $currentTime = new DateTime('2020-10-07', $serverTimeZone);

///$videoid = '77';
echo '<h2>Return programmes with start and end times for ' . $currentTimeCET . '</h2>';

//echo 'The tag categories for ' . print_r($videos);

$debug = true;

$access = null;

//$programmes = $assetManager->returnLiveProgrammesArray($currentTime, true);
           



if ($access = $sessionView->programmesActiveToday($currentTime, $debug) == true){


    $access = $sessionView->programmesActiveToday($currentTime, $debug);

var_dump($access);

echo '<br/><br/>now get the start and end times<br/><br/>';

$access1 = null;

$access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

var_dump($access1);

echo '<br/><br/>now get the start and end times in a single array<br/><br/>';

$access2 = null;

$access2 = $sessionView->getStartEndProgrammes($access1, $debug);


var_dump($access2);

echo '<br/><br/>does user have access to the programme<br/><br/>';

$access3 = null;

//first one

$access3 = $assetManager->programme_owned_by_user($access2[0]['programmeid'], $userid, $debug);

//do other things with second one if required

var_dump($access3);

}else{

    if ($debug){
    echo '<br/><br/>No programmes active<br/><br/>';
    }

    return false;


}



echo '<br/><br/>United Form in 2 classes<br/>';

$debug = false;

$programmes = null;

$programmes = $sessionView->returnLiveProgrammesArray($currentTime, $debug);

$access3 = null;

$access3 = $assetManager->programme_owned_by_user($programmes[0]['programmeid'], $userid, $debug);

var_dump($access3);


echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';




