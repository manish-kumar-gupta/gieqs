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

require_once BASE_URI . '/assets/scripts/classes/userActivity.class.php';
$userActivity = new userActivity;

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

//enter fake userid here 

$userid = 595;

$amount_grant = 22;
$coin_grant->New_coin_grant($sqltimestamp, $amount_grant, $userid);
$coin_grant->prepareStatementPDO();



//get mysql date UTC
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//SPEND COINS

$amount_spend = 22;
$asset_id = 6;

//check balance first
//if balance < amount_spend do not execute

$balance = $coin->current_balance($userid);

if ($balance >= $amount_spend){


$coin_spend->New_coin_spend($sqltimestamp, $amount_spend, $userid, $asset_id);
$transaction_id = $coin_spend->prepareStatementPDO(); // store and pass the id

echo 'We just spent ' . $amount_spend . ' coins for user ' . $userid . ' and the transaction id was '. $transaction_id;

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








//STRUCTURE FOR TEMPORARY TRANSACTIONS THAT CAN BE RECALLED









//clicks use gieqs coin
//WITH TEMPORARY ARCHITECTURE


//record a coin use but somehow make it temporary
//that is record and store the id in useractitiv


$userid = 1;

//$amount_grant = 22;
/* $coin_grant->New_coin_grant($sqltimestamp, $amount_grant, $userid);
$coin_grant->prepareStatementPDO(); */



//get mysql date UTC
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//SPEND COINS

$amount_spend = 22;
$asset_id = 6;

$balance = $coin->current_balance($userid);

if (($userFunctions->returnRecentCoinTransactionUser($userid, false)) === false){  ;//check if user already has an outstandng temp spend


echo 'User '. $userid . ' currently has ' . $balance . ' coins remaining';
echo '<br/><br/>';

if ($balance >= $amount_spend){


    $coin_spend->New_coin_spend($sqltimestamp, $amount_spend, $userid, $asset_id);
    $transaction_id = $coin_spend->prepareStatementPDO(); // store and pass the id



    echo 'We just recorded spend of ' . $amount_spend . ' coins for user ' . $userid . ' and the transaction id was '. $transaction_id;

}else{

    echo 'User does not have enough ( ' . $amount_spend . ' ) coins for this transaction';
    
}

    //so write the useractivity for thiis

    //first check no other temporary spend recorded


    $userActivity->New_userActivity($userid, 'TEMP_COIN ' . $transaction_id , '', $sqltimestamp);
    $userActivity->prepareStatementPDO();

    //get back that there has been a temporary transaction

    

    $transaction_id_check = $userFunctions->returnRecentCoinTransactionUser($userid, false);


 /*    //to MAKE DEFINITIVE
            if ($transaction_id_check){

                //use id
                //then delete the required useractivity

                echo 'we detected a recent transaction with id ' . $transaction_id_check['transaction_id'];
                $userActivity->Load_from_key($transaction_id_check['id']);
                $userActivity->setsession_id('DEFINITIVE_COIN_FROM_TEMP ' . $transaction_id_check['transaction_id']);
                echo $userActivity->prepareStatementPDOUpdate();
                echo ' this record in useractivity was renamed';


            }else{

                echo 'no recent transaction';
            }
 */

//TO CANCEL

            if ($transaction_id_check){

                //use id
                //then delete the required useractivity

                echo 'we detected a recent transaction with id ' . $transaction_id_check['transaction_id'];
                $userActivity->Load_from_key($transaction_id_check['id']);
                $userActivity->setsession_id('CANCELLED_COIN_FROM_TEMP ' . $transaction_id_check['transaction_id']);
                echo $userActivity->prepareStatementPDOUpdate();
                echo ' this record in useractivity was renamed';
                echo 'the coin transaction was reversed and credits applied to the user account';

                //get the transaction
                $coin_spend->Load_from_key($transaction_id_check['transaction_id']);
                
                
                //get the amount
                $transaction_amount = $coin_spend->getamount();

                //make a new transaction crediting this amount
                $coin_grant->New_coin_grant($sqltimestamp, $transaction_amount, $userid);
                $new_grant_id = $coin_grant->prepareStatementPDO();
                $userActivity->New_userActivity($userid, 'REFUND_COIN ' . $new_grant_id , '', $sqltimestamp);
                $userActivity->prepareStatementPDO();


            }else{

                echo 'no recent transaction';
            }





    }else{
    
        echo 'Recent temporary transaction detected that has not been finalised.  How will we clear this up?';

    }



echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
