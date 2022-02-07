<?php
/* 
$openaccess = 0;

$requiredUserLevel = 6;

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = false;

if ($debug == true){
error_reporting(E_ALL);
}else{

error_reporting(0);
}

$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

$data = json_decode(file_get_contents('php://input'), true);

$subscription_id = $data['subscription_id']; */
//$review = $data['review'];
 define('BASE_URI', '/home/u8l2e829uoi9/public_html');

define('BASE_URL', 'https://www.gieqs.com');

//define('BASE_URI', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/gieqs');

//define('BASE_URL', 'http://localhost:90/dashboard/gieqs');


$location = BASE_URL . '/index.php';

//require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$_SESSION['debug'] = FALSE;

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_NONE);

require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
$general = new general;
require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
$users = new users;
require_once(BASE_URI . '/assets/scripts/classes/programme.class.php');
$programme = new programme;
require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
$sessionView = new sessionView;
require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;




//$users->Load_from_key($userid);
require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
$userFunctions = new userFunctions;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

/* require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions; */

require_once(BASE_URI . '/assets/scripts/classes/user_email.class.php');
$user_email = new user_email;


//require_once BASE_URI .'/../scripts/config.php'; // KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');


spl_autoload_unregister ('class_loader');
error_reporting(E_ALL);

use Stripe\Stripe;

require(BASE_URI . '/../scripts/stripe_api.php');

$dataToLog = array();

$payload = @file_get_contents('php://input');
$event = null;

try {
    $event = \Stripe\Event::constructFrom(
        json_decode($payload, true)
    );

    //other ideas

    /*
    
    $session = \Stripe\Checkout\Session::retrieve($session_id);
$customer = \Stripe\Customer::retrieve($session->customer);

    */



} catch(\UnexpectedValueException $e) {
    // Invalid payload
    if ($debug){
        echo 'invalid payload';
    }
    http_response_code(400);
    exit();
}

//print_r($event);
//$dataToLog[] = $event;

//Turn array into a delimited string using
//the implode function


//log the events
$debug = true;
$debugPrint = true;



// Handle the event
switch ($event->type) {
    case 'payment_intent.succeeded':
        $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
        // Then define and call a method to handle the successful payment intent.
        // handlePaymentIntentSucceeded($paymentIntent);

        //echo '<pre>';
        //$dataToLog[] = $paymentIntent;
        //echo '</pre>';

        $dataToLog[] = 'payment intent detected';

        $subscription_id = $paymentIntent['metadata']['subscription_id'];



        

        break;
    case 'invoice.paid':
        $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
        // Then define and call a method to handle the successful attachment of a PaymentMethod.
        // handlePaymentMethodAttached($paymentMethod);
        $dataToLog[] = 'invoice paid method attached detected';

        //check the subscription is active using the id

     

        //$subscription_data = $event->data->object->lines->data->metadata; OLD

        $subscription_data = $event->data->object->lines->data[0];



        //$subscription_id = $paymentIntent['lines']['data']['metadata']['subscription_id'];

        //$subscription_id = $subscription_data['metadata']['subscription_id'];

        $subscription_id = $subscription_data['subscription_id'];

        
        if ($debug){


            //$paymentMethodContents = var_dump($paymentMethod);
            $subscription_data_contents = var_dump($subscription_data);

            $dataToLog[] = 'paymentMethod contains ' . $paymentMethodContents;
            $dataToLog[] = 'Looking for subscription ' . $subscription_data_contents;




        }


        //$subscription_id = $paymentMethod['metadata']['subscription_id']; OLD

        if ($debug) {

            $dataToLog[] = 'Looking for subscription ' . $subscription_id;
            //echo '<br/';
        
        }
        
        
        
        //error_reporting(E_ALL);
        
        //echo $subscription->matchRecord($subscription_id);
        
        //echo 'hello';
        
        //var_dump($subscription);
        
        
        if ($subscription->matchRecord($subscription_id)) {
        
           
        
            if ($debug) {
        
                $dataToLog[] =  'Found subscription ' . $subscription_id;
                //echo '<br/';
        
            }
        
            $subscription->Load_from_key($subscription_id);
        
            //var_dump($subscription);
        
        
            if ($subscription->getactive() == '1') {
        
                if ($debug) {
        
                    $dataToLog[] =  'subscription ' . $subscription_id . ' is active';
                    //echo '<br/';
        
                }
        
                //subscription already active
                //check end date

                    //get date today

                    $currentTime = new DateTime();


                    //check versus end date

                    //sync end date with stripe

                    //$timestamp = $paymentIntent['lines']['data']['period']['end'];

                    $period = $event->data->object->lines->data->period;

                    $timestamp = $period['end'];


                    $currentTime = DateTime::createFromFormat( 'U', $timestamp );

                    $formattedString = $currentTime->format( 'Y-m-d H:i:s' ); //as mysql date_format($date, 'Y-m-d H:i:s')

                    if ($debug) {
        
                        $dataToLog[] =  'end date of the subscription with id' . $subscription_id . ' is set to ' . $formattedString;
                        //echo '<br/';
            
                    }

                    //set end date TO = stripe

                    $subscription->setexpiry_date($formattedString);
        


                //give subcription make sure autorenew is 1
                $subscription->setauto_renew('1');
                echo $subscription->prepareStatementPDOUpdate();
        
                //get the user id
        
                $user_id_subscription = $subscription->getuser_id();
        
                if ($debug) {
        
                    $dataToLog[] =  'user id is  ' . $user_id_subscription . '';
                    //echo '<br/';
        
                }
        
                //TODO SOON TODO
                //length (months) of subscription
                //error_reporting(E_ALL);
        
               // var_dump($assetManager);
        
                $subscription_length = $assetManager->getLengthSubscription($subscription_id, false);
        
                if ($debug) {
        
                    $dataToLog[] = 'length of subscriptionn s  ' . $subscription_length . ' months';
                    //echo '<br/';
        
                } 
        
            
        
                //echo 'hello';
        
                $coin_grant_amount = 30; //the amount credited every 6 months  //to all subscription types
        
              if ($debug) {
        
                    $dataToLog[] =  'amount of coin to grant  is  ' . $coin_grant_amount . '';
                    //echo '<br/';
        
                }
        
                //var_dump(lengthSubscription);
        
                if ($subscription_length > 5) {
        
        
                    
                    if ($debug){
        
                        $dataToLog[] =  'in the length subscription loop';
                        //check how many already given
                           
                    }
        
                    $count = $userFunctions->returnRecentCoinGrantStandardSubscription($user_id_subscription, false);
        
                    //var_dump($count);
        
                    if (is_array($count)){
        
                        $numberOfTimes = $count[0]['count'];
        
        
                    }else if ($count === false) {
        
                        $numberOfTimes = 0;
        
                    }
        
        
                    if ($debug) {
        
                        $dataToLog[] =  'already given ($numberOfTimes) is' . $numberOfTimes . '';
                        //echo '<br/';
        
                    }
        
                    //var_dump(lengthSubscription);
        
        
                    //if multiples work out
        
                    //number should be
        
                    $numberShouldBe = $subscription_length / 6;
        
                    if ($debug) {
        
                        $dataToLog[] =  'number should be  ($numberShouldBe) is' . $numberShouldBe . '';
                        //echo '<br/';
        
                    }
        
                    var_dump(lengthSubscription);
        
        
                    if (($numberOfTimes == 0) || (($numberOfTimes > 0) && ($numberOfTimes < $numberShouldBe))) {
        
                        if ($debug) {
        
                            $dataToLog[] =  'Time to record another subscription and give coins';
        
                        }
        
                        $date = new DateTime('now', new DateTimeZone('UTC'));
                        $sqltimestamp = date_format($date, 'Y-m-d H:i:s');
        
                        $userActivity->New_userActivity($user_id_subscription, 'COIN_GRANT_STANDARD_SUBSCRIPTION_' . $subscription_length . 'MONTHS ' . $coin_grant_amount, '', $sqltimestamp);
                        $userActivity->prepareStatementPDO();
        
                        $coin_grant->New_coin_grant($sqltimestamp, $coin_grant_amount, $userid);
                        $new_grant_id = $coin_grant->prepareStatementPDO();
        
                        if ($debug) {
        
                            $dataToLog[] =  'coins granted';
                            //echo '<br/>';
            
                        }
        
                    } else {
        
                        if ($debug) {
        
                            $dataToLog[] =  'NOT TIME to record another subscription or give coins OR ALREADY DONE';
            
                        }
        
        
        
                    }
        
                } else {
        
                    if ($debug) {
        
                        $dataToLog[] =  'NOT TIME to record another subscription and give coins OR ALREADY DONE';
        
                    }
        
                }
        
            } else {
        
                //subscription is inactive but should be active
                //should autorenew since this is a subscription
        
                $subscription->setactive('1');
                $subscription->setauto_renew('1');
                $currentTime = new DateTime();


                    //check versus end date

                    //sync end date with stripe

                    $period = $event->data->object->lines->data->period;

                    $timestamp = $period['end'];

                    $currentTime = DateTime::createFromFormat( 'U', $timestamp );

                    $formattedString = $currentTime->format( 'Y-m-d H:i:s' ); //as mysql date_format($date, 'Y-m-d H:i:s')

                    if ($debug) {
        
                        $dataToLog[] =  'end date of the subscription with id' . $subscription_id . ' is set to ' . $formattedString;
                        //echo '<br/';
            
                    }

                    //set end date TO = stripe

                $subscription->setexpiry_date($formattedString);
                $subscription->prepareStatementPDOUpdate();

                if ($debug) {
        
                    $dataToLog[] =  'subscription is inactive but should be active so set as active';
    
                }
    
        
            }
        
            //detect the previous useractivity if >6, 2 if over 12 etc
            //if first or 6 months grant coins if it is a STANDARD
            //pro gives everything
        
            //could send mail thanks for updating payment information
        
        } else {
        
            //cannot find subscription or is not active
        
            $dataToLog[] = 'Cannot find subscription';
        
        }



        break;

    case 'invoice.payment_failed';
        $paymentMethod = $event->data->object;
        // ... handle other event types
        $dataToLog[] = 'invoice failed detected';
        $dataToLog[] = $paymentMethod;
        $subscription_id = $paymentMethod['metadata']['subscription_id'];


        if ($subscription->Return_row($subscription_id)){

        
        $subscription->Load_from_key($subscription_id);
        $subscription->setactive('0');
        $subscription->prepareStatementPDOUpdate();

        //send a mail to the user saying that subscription will not renew unless purchased again.

        $dataToLog[] = 'invoice failed for number ' . $subscription_id . ' therefore set as inactive';




        }else{

            if ($debug){

                $dataToLog[] = 'could not load subscription data';
            }
        }

    default:
    $dataToLog = 'Received unknown event type ' . $event->type;
    $event = $event->data->object; // contains a \Stripe\PaymentMethod
    if ($debug){

        $dataToLog[] = $event;
    }


}

http_response_code(200);


$data = implode(" - ", $dataToLog);

//Add a newline onto the end.
$data .= PHP_EOL;

if ($debugPrint){

    var_dump($dataToLog);
}

//The name of your log file.
//Modify this and add a full path if you want to log it in 
//a specific directory.
$pathToFile = 'mylogname.log';

//Log the data to your file using file_put_contents.
file_put_contents(BASE_URI . '/pages/learning/scripts/subscriptions/log.log', $data, FILE_APPEND);

