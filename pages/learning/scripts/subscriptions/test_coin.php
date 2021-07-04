<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';
require BASE_URI . '/assets/scripts/interpretUserAccess.php';


$location = BASE_URL . '/index.php';


spl_autoload_unregister ('class_loader');
require BASE_URI . '/assets/scripts/pdocrud/script/pdocrud.php';
$pdocrud = new PDOCrud();
spl_autoload_register ('class_loader');

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';


$debug = true;

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


require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;


require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;


require_once BASE_URI . '/assets/scripts/classes/coin_spend.class.php';
$coin_spend = new coin_spend;

error_reporting(E_ALL);

echo 'hello';

//GIVE COINS TO USER

//get mysql date UTC
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//check logged in done already in interpret user access
//with secure session id

$amount_grant = 11;
$coin_grant->New_coin_grant($sqltimestamp, $amount_grant, $userid);
$coin_grant->prepareStatementPDO();



//get mysql date UTC
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//SPEND COINS

$amount_spend = 32;
$asset_id = 6;

//check balance first
//if balance < amount_spend do not execute

$balance = $coin->current_balance($userid);

if ($balance >= $amount_spend){


$coin_spend->New_coin_spend($sqltimestamp, $amount_spend, $userid, $asset_id);
$coin_spend->prepareStatementPDO();

}else{

    echo 'Insufficient coins to make this transaction';
    echo '<br/>';
    echo "Requested amount was $amount_spend but userid $userid has only $balance remaining";

}


echo '<br/><br/><br/>';
echo '<br/><br/><br/>';


//check user number of coins

echo 'user with id ' . $userid . ' has ';
echo $coin->current_balance($userid);
echo ' coins';
//user  has coins
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';

$balance = $coin->user_has_coins($userid);
if ($balance){

    $text = ' some ';
}else{

    $text = ' no ';
}

echo 'user has ' . $text . ' coins';



//find the active programme
echo '<br/><br/><br/>';




echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
