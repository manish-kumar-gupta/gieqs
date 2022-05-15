<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';





$debug = false;

$general = new general;
$users = new users;

$users->Load_from_key($userid);

error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
$courseManager = new courseManager;


require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/subscriptions.class.php';
$subscription = new subscriptions;
error_reporting(E_ALL);

require_once BASE_URI . '/pages/learning/classes/navigator.class.php';
$navigator = new navigator;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once BASE_URI . '/assets/scripts/classes/programmeView.class.php';
$programmeView = new programmeView;

error_reporting(E_ALL);

echo 'hello';

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

?>

<?php

$assets = $assetManager->returnProPurchasedAssetsUser(1, false); 
var_dump($assets);

echo $assetManager->extendProAssetsUser(1, true);

$assets = $assetManager->returnProPurchasedAssetsUser(1, false); 
var_dump($assets);

echo '<br><br>';

echo 'Assets that are owned by token id xx related to institution ';

$assets = null;
$assets = $assetManager->provideInstitutionalData(16, true);
var_dump($assets);

//load the subscription

$subscription->Load_from_key($assets[0]);
echo $subscription->getstart_date();
echo $subscription->getexpiry_date();
$dateToday = new DateTime('now', new DateTimeZone('UTC'));
$dateExpiry = new DateTime($subscription->getexpiry_date(), new DateTimeZone('UTC'));

//get the difference between today and the subscription date
echo $dateToday->diff($dateExpiry)->format("%d");





echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
