<?php
$openaccess = 0;

$requiredUserLevel = 6;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');


$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;


require_once BASE_URI .'/../scripts/config.php'; //KEY CODE TO REPLICATE




$debug = true;

if ($debug){

    error_reporting(E_ALL);
}

// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();

        
        if ($debug){
        print("<pre>".print_r($arr_body, true)."</pre>");
        }
        //print_r($arr_body);
 
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
        $description = $arr_body['transactions'][0]['description'];
        $subscription_id = $arr_body['transactions'][0]['invoice_number'];

       // print_r($subscription_id);

 
        // Insert transaction data into the database

        if ($subscription->Return_row($subscription_id)){ //if the subscription already exist

            //we created a new subscription for the renewal
            //with the required term
            //store the paypal ref only, no personal details stored

            $subscription->Load_from_key($subscription_id);

            //now we just need to activate it

            //then reload the previous page with a popup that it was successful
    
            $subscription->setactive('1');
            $subscription->setgateway_transactionId($payment_id);
            
            if ($subscription->prepareStatementPDOUpdate() == 1){


            }else{

                //updating the subscription went wrong
                echo 'error in subscription updating';

            }
            

        }

        if ($debug){

            die();
        }

        /* $isPaymentExist = $db->query("SELECT * FROM payments WHERE payment_id = '".$payment_id."'");
 
        if($isPaymentExist->num_rows == 0) { 
            $insert = $db->query("INSERT INTO payments(payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
        } */
 
        echo "Payment is successful. Your transaction id is: ". $payment_id;

        //redirect to page with positive outcome

        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult='+$subscription_id;
        header("Location: $page");
        die();




    } else {
        echo $response->getMessage();
    }
} else {
    echo 'Transaction is declined';
}