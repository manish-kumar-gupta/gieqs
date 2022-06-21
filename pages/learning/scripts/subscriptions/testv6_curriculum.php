<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';





$debug = false;
$_SESSION['debug'] == false;

$general = new general;
$users = new users;

$users->Load_from_key($userid);

error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
$courseManager = new courseManager;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/subscriptions.class.php';
$subscription = new subscriptions;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;
//error_reporting(E_ALL);

require_once BASE_URI . '/pages/learning/classes/navigator.class.php';
$navigator = new navigator;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once BASE_URI . '/assets/scripts/classes/programmeView.class.php';
$programmeView = new programmeView;


require_once BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php';
$usersMetricsManager = new usersMetricsManager;

error_reporting(E_ALL);

echo 'hello';

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

?>

<?php

//get the required curriculum

//echo the title
//change <<title>> tag

//description

/* 

get sections

for each section
    echo each block dependent on whether text or
    table is a table

    depending on what 'type' is

    <option value="1" selected="">text</option>
<option value="2">table</option>
<option value="3">figure</option>
<option value="4">video</option>
<option value="5">gieqs online asset</option>

    video is vimeo link like blog link_to_content

    photo is photo like blog [this is ok, now there is link_to_content]  image_url

    [add image upload field]

    gieqs ref is id number link_to_content

*/






//var_dump($assets3);


//do they occur in the past? that is type 2 and 3 only

//then create a new subscription for the user for them with the tag PRO_ASSET

//GET AN ARRAY OF PRO USERS



//WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=PRO_SUBSCRIPTION%



echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
