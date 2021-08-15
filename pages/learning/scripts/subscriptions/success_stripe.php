

<?php 

$openaccess = 1;

//$requiredUserLevel = 6;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

error_reporting(E_ALL);

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');


$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
$sessionView = new sessionView;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

require_once(BASE_URI . '/assets/scripts/classes/userActivity.class.php');
$userActivity = new userActivity;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;


require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;


require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;


require_once BASE_URI . '/assets/scripts/classes/coin_spend.class.php';
$coin_spend = new coin_spend;


if ($debug){

    error_reporting(E_ALL);
}

function get_include_contents($filename, $variablesToMakeLocal) {
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}


require_once BASE_URI . "/vendor/autoload.php";
error_reporting(E_ALL);

spl_autoload_unregister ('class_loader');
error_reporting(E_ALL);

use Stripe\Stripe;

//CHANGE_TEST_TO_LIVE_STRIPE

require(BASE_URI . '/../scripts/stripe_api.php');


/* \Stripe\Stripe::setApiKey('sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU');
$stripe = new \Stripe\StripeClient(
    'sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU'
  ); */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;

error_reporting(E_ALL);

print_r($_GET);

$session_id = $_GET['session_id'];

$session = \Stripe\Checkout\Session::retrieve($session_id);
$customer = \Stripe\Customer::retrieve($session->customer);


print "<pre>";
print_r($session);
print "</pre>";
print "<pre>";
print_r($customer);
print "</pre>";

//check if this is a subscription or a fixed price

if ($session['mode'] == 'payment'){
    $payment_intent = $session['payment_intent']; //check is set
    //print $payment_intent;
    $subscription_id = $session['metadata']['subscription_id'];  //check is set
    $amount = $session['amount_total'];
    $amount = intval($amount) / 100;
    $currency = strtoupper($session['currency']);


}elseif ($session['mode'] == 'subscription'){

    //$debug = true;

    if ($debug){

        print_r($session['metadata']);
        print_r($session);
        

    }

    //die();

    if ($session['metadata']['alreadyHasSiteWide'] == 'true'){

        //handle old subscription

                //get the subscription object of the sitewide subscription

                $sitewidesubscriptonid = $session['metadata']['oldSubscriptionid'];

                if ($subscription->Return_row($sitewidesubscriptonid)){
            
                    $subscription->Load_from_key($sitewidesubscriptonid);
                    $stripe_subscription_id = $subscription->getgateway_transactionId();
        
        
                    $old_subscription = \Stripe\Subscription::retrieve($stripe_subscription_id);
        
                    $old_subscription_status = $stripe->subscriptions->cancel(
                        $stripe_subscription_id,
                        ['prorate' => true,]
                      );
                    
            
                      if ($debug){
                      print_r($old_subscription_status);
                      //die();
                    }
            
                    
            
                        if ($old_subscription_status->status == 'cancelled'){
            
                            //$old_subscription->cancel();
            
                        
                            $subscription->setauto_renew('0');
            
                            $subscription->setactive('0');
            
                            echo $subscription->prepareStatementPDOUpdate();

                            if ($debug){
                            echo 'Old subscription cancelled';

                            }


                        }

                    }
        


    }

    $current_date = new DateTime('now', new DateTimeZone('UTC'));

    $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s'); 


    $payment_intent = $session['subscription']; //check is set
    $subscription_id = $session['metadata']['subscription_id'];  //check is set
    $currency = strtoupper($session['currency']);








    if ($session['metadata']['free_trial'] == true){

        if ($session['metadata']['subscription_type'] == 1){

            $userActivity->New_userActivity($userid, 'FREE_TRIAL_PRO', null, $current_date_sqltimestamp);
            echo $userActivity->prepareStatementPDO();
            $amount = 'FREE TRIAL';

            if ($debug){

            echo 'free trial recorded';
        
            }

        }elseif ($session['metadata']['subscription_type'] == 2){

            $userActivity->New_userActivity($userid, 'FREE_TRIAL_PREMIUM', null, $current_date_sqltimestamp);
            echo $userActivity->prepareStatementPDO();
            $amount = 'FREE TRIAL';
    
            if ($debug){
    
               echo 'free trial recorded';
        
            }

        }



    }else{

        //not a free trial
        //record some coins here
        //also in webhooks on the first renewal

        //get mysql date UTC
        if ($session['metadata']['subscription_type'] == 1){        //only if a subscription type 1, type 2 has full acccess


        $date = new DateTime('now', new DateTimeZone('UTC'));
        $sqltimestamp = date_format($date, 'Y-m-d H:i:s');

        $amount_grant = 50;
        $coin_grant->New_coin_grant($sqltimestamp, $amount_grant, $userid);
        $coin_grant->prepareStatementPDO();

        }




        $amount = $session['amount_total'];
        $amount = intval($amount) / 100;

        if ($debug){

            echo 'else recorded';
     
        }



    
    }

    if ($debug){

    die();

    }


}





if ($subscription->Return_row($subscription_id)){ //if the subscription already exists

    //we created a new subscription for the renewal
    //with the required term
    //store the paypal ref only, no personal details stored

    $subscription->Load_from_key($subscription_id);

    //now we just need to activate it

    //then reload the previous page with a popup that it was successful

    $subscription->setactive('1');
    $subscription->setgateway_transactionId($payment_intent);
    
    
    if ($subscription->prepareStatementPDOUpdate() == 1){

        echo 'Subscription activated';


    }else{

        //updating the subscription went wrong
        echo 'error in subscription updating';

    }
    

}



/* $isPaymentExist = $db->query("SELECT * FROM payments WHERE payment_id = '".$payment_id."'");

if($isPaymentExist->num_rows == 0) { 
    $insert = $db->query("INSERT INTO payments(payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
} */

echo "Payment is successful. Your transaction id is: ". $payment_id;

$asset_id = $assetManager->getAssetid($subscription_id);

$assets_paid->Load_from_key($asset_id);



//figure out

//what this payment was for

$asset_type = $assetManager->getAssetType($subscription_id);

//was it a renewal

$isRenewal = $assetManager->isRenewal($asset_id, $userid, $debug);

//check if 2xasset_id on 2 subscriptions = renewal

//clean up other unsuccessful purchases for this type

//based on asset_type set some parameters

/* 

        $filename = ''; // link to email that needs to be sent
        $subject = ''; // subject of mail
        $preheader = ''; //preheader text of mail
        $page = '';  //where to locate to after success


*/

//set some basics

$filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
$preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


if ($isRenewal){

    if ($asset_type == '1'){ //site wide

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
        $subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
        $preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;



    }else if ($asset_type == '2'){ //GIEQs Congress Subscription

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
        $subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
        $preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


    }else if ($asset_type == '3'){ //GIEQs Virtual / Live Course

        //need to add text for course renewal

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
$preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

    }else if ($asset_type == '4'){ //video set / area of site

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
        $subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
        $preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


    }

}else if ($isRenewal === false){

    if ($asset_type == '1'){ //site wide

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';  //to change
        $subject = 'Thank-you for Your Subscription on GIEQS Online';
        $preheader = 'Your new subscription awaits!  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


    }else if ($asset_type == '2'){ //GIEQs Congress Subscription
        
        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
        $subject = 'Thank-you for Your Subscription on GIEQS Online';
        $preheader = 'Your new subscription awaits!  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;




    }else if ($asset_type == '3'){ //GIEQs Virtual / Live Course

        //$filename = '/assets/email/subscriptions/newSubscriptionCourse.php'; REINSTATE IF VIRTUAL, TODO DETERMINE THIS
        $filename = '/assets/email/subscriptions/onboarding_course_Zoom.php';
        $subject = 'Thank-you for Your GIEQs Online Course Purchase';
        $preheader = 'Your course awaits! Check out this mail for information on joining and catch-up. Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;
        $programme_array = $assetManager->returnProgrammesAsset($asset_id);
        $programmeid = $programme_array[0];
        //$programmeid = $programmes[0]['programmeid'];
        $programmes3 = $sessionView->getProgrammeTimes([0=>['id'=>$programmeid,]], false);  
        $programmes4 = $sessionView->convertProgrammeTimes($programmes3, false);
        $start_time = $programmes4[0];
        
        $emailVaryarray['programme_start_time'] = $start_time;




    }else if ($asset_type == '4'){ //video set / area of site



    }

}






if ($users->gettimezone()){

    $timezone = $users->gettimezone();
}else{

    $timezone = 'UTC';
}

$end_date = new DateTime($subscription->getexpiry_date(), new DateTimeZone($timezone));

$end_date_user_readable = date_format($end_date, 'd/m/Y');



$users->Load_from_key($userid);
$emailVaryarray['firstname'] = $users->getfirstname();
$emailVaryarray['surname'] = $users->getsurname();
$emailVaryarray['email'] = $users->getemail();
$email = $users->getemail();
$emailVaryarray['assetid'] = $asset_id;
$emailVaryarray['subscription_id'] = $subscription_id;
$emailVaryarray['asset_name'] = $assetManager->getAssetName($subscription_id);
$emailVaryarray['asset_type'] = $assetManager->getAssetTypeText($assetManager->getAssetType($subscription_id));
$emailVaryarray['renew_frequency'] = $assets_paid->getrenew_frequency();
$emailVaryarray['expiry_date'] = $end_date_user_readable;
$emailVaryarray['cost'] = $amount . ' ' . $currency;
$emailVaryarray['key'] = $users->getkey();
$emailVaryarray['gateway_transactionId'] = $payment_intent;
$emailVaryarray['preheader'] = $preheader;



if ($debug){

    echo PHP_EOL;
    print_r($emailVaryarray);

}

//PRIOR TO MAIL SEND UPDATE THE COIN STATUS IF PRESENT
//MAKE DEFINITIVE

if ($session['metadata']['coin_used'] == true){

    $transaction_id_check = $userFunctions->returnRecentCoinTransactionUserSingle($userid, false);

    echo 'check for recent transactions finds <br/>';
    var_dump($transaction_id_check);
    echo '<br/><br/>';
   

    //to MAKE DEFINITIVE
            if ($transaction_id_check){

                //use id
                //then delete the required useractivity

                if ($debug){
                echo 'we detected a recent transaction with id ' . $transaction_id_check['transaction_id'];
                }
                $userActivity->Load_from_key($transaction_id_check['id']);
                $userActivity->setsession_id('DEFINITIVE_COIN_FROM_TEMP ' . $transaction_id_check['transaction_id']);
                $userActivity->prepareStatementPDOUpdate();
                
                if ($debug){
                echo ' this record in useractivity was renamed';

                }

            }else{

                if ($debug){

                echo 'no recent transaction to make definitive.  This is a problem!';

                }
            }



}

//$filename = '/assets/email/subscriptions/renewSubscriptionMail.php';

//$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';


$mail->CharSet = "UTF-8";
$mail->Encoding = "base64";
$mail->Subject = $subject;
$mail->setFrom('admin@gieqs.com', 'GIEQs Online');
$mail->addAddress($emailVaryarray['email']);
$mail->msgHTML(get_include_contents(BASE_URI . $filename, $emailVaryarray));
$mail->AltBody = strip_tags((get_include_contents(BASE_URI . $filename, $emailVaryarray)));
$mail->preSend();
$mime = $mail->getSentMIMEMessage();
$mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');


require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');



if ($debug){

    die();
}
//redirect to page with positive outcome

//$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


header("Location: $page");
die();



?>

