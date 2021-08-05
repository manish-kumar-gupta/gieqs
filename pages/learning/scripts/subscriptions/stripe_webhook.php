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
/* define('BASE_URI', '/home/u8l2e829uoi9/public_html');

define('BASE_URL', 'https://www.gieqs.com'); */

define('BASE_URI', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/gieqs');

define('BASE_URL', 'http://localhost:90/dashboard/gieqs');


$location = BASE_URL . '/index.php';

//require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$_SESSION['debug'] = FALSE;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

\Stripe\Stripe::setApiKey('sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU');

$dataToLog = array();

$payload = @file_get_contents('php://input');
$event = null;

try {
    $event = \Stripe\Event::constructFrom(
        json_decode($payload, true)
    );
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

        break;
    case 'invoice.paid':
        $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
        // Then define and call a method to handle the successful attachment of a PaymentMethod.
        // handlePaymentMethodAttached($paymentMethod);
        $dataToLog[] = 'invoice paid method attached detected';

        //check the subscription is active using the id

        $subscription_id = $paymentMethod['metadata']['subscription_id'];


        if ($subscriptions->Return_row($subscription_id)){

        
        $subscriptions->Load_from_key($subscription_id);

        if ($subscription->getactive() == '1'){

            //subscription already active
            //give subcription make sure autorenew is 1
            $subscriptions->setauto_renew('1');
            $subscriptions->prepareStatementPDOUpdate();

            //TODO SOON TODO
            //length (months) of subscription
            //if first or 6 months grant coins if it is a STANDARD
            //pro gives everything

            //could send mail thanks for updating payment information



        }else{

            //subscription is inactive but should be active
            //should autorenew since this is a subscription

            $subscriptions->setactive('1');
            $subscriptions->setauto_renew('1');
            $subscriptions->prepareStatementPDOUpdate();



        }
        

        //send a mail to the user saying that subscription will not renew unless purchased again.

        


        }else{

            if ($debug){

                echo 'could not load subscription data';
            }
        }



        break;

    case 'invoice.payment_failed';
        $paymentMethod = $event->data->object;
        // ... handle other event types
        $dataToLog[] = 'invoice failed detected';
        $dataToLog[] = $paymentMethod;
        $subscription_id = $paymentMethod['metadata']['subscription_id'];


        if ($subscriptions->Return_row($subscription_id)){

        
        $subscriptions->Load_from_key($subscription_id);
        $subscriptions->setactive('0');
        $subscriptions->prepareStatementPDOUpdate();

        //send a mail to the user saying that subscription will not renew unless purchased again.




        }else{

            if ($debug){

                echo 'could not load subscription data';
            }
        }

    default:
        echo 'Received unknown event type ' . $event->type;

}

http_response_code(200);


$data = implode(" - ", $dataToLog);

//Add a newline onto the end.
$data .= PHP_EOL;

//The name of your log file.
//Modify this and add a full path if you want to log it in 
//a specific directory.
$pathToFile = 'mylogname.log';

//Log the data to your file using file_put_contents.
file_put_contents(BASE_URI . '/pages/learning/scripts/subscriptions/log.log', $data, FILE_APPEND);

