<?php
error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';


$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

error_reporting(E_ALL);
require_once 'config.php';
//check the user is logged in
//check the correct user
//check the subscription exists

print_r($_POST);

$subscription_id = $_POST['subscription_id'];


if ($subscription->Return_row($subscription_id)){

    $subscription->Load_from_key($subscription_id);

    //if subscription exists

    $subscription_to_return = array();

    $subscription_to_return['asset_name'] = $assetManager->getAssetName($subscription_id);
    $subscription_to_return['asset_type'] = $assetManager->getAssetTypeText($assetManager->getAssetType($subscription_id));
    $subscription_to_return['asset_id'] = $assetManager->getAssetid($subscription_id);

    $assets_paid->Load_from_key($subscription_to_return['asset_id']);

    $subscription_to_return['cost'] = $assets_paid->getcost();
    $subscription_to_return['description'] = $assets_paid->getdescription();
    $subscription_to_return['renew_frequency'] = $assets_paid->getrenew_frequency();



    
    $subscription_to_return['user_id'] = $subscription->getuser_id();
    $subscription_to_return['expiry_date'] = $subscription->getexpiry_date();


    //echo json_encode($subscription_to_return);
    //echo $subscription->getexpiry_date();


    //json encode the result

    //need the description
    //need the cost from subtable
    //need to check that it is ending soon
    //need to set renewal date for new subscription the number of days remaining +

    if (isset($_POST)) {

     
        try {
            $response = $gateway->purchase(array(
                'amount' => $subscription_to_return['cost'],
                'currency' => PAYPAL_CURRENCY,
                'returnUrl' => PAYPAL_RETURN_URL,
                'cancelUrl' => PAYPAL_CANCEL_URL,
                /* {
                    "intent": "sale",
                    "payer": {
                        "payment_method": "paypal"
                    },
                    "redirect_urls": {
                        "return_url": "http://<return url>",
                        "cancel_url": "http://<cancle url>"
                    },
                    "transactions": [
                        {
                            "amount": {
                                "total": "8.00",
                                "currency": "USD",
                                "details": {
                                    "subtotal": "6.00",
                                    "tax": "1.00",
                                    "shipping": "1.00"
                                }
                            },
                            "description": "This is payment description.",
                            "item_list": { 
                                "items":[
                                    {
                                        "quantity":"3", 
                                        "name":"Hat", 
                                        "price":"2.00",  
                                        "sku":"product12345", 
                                        "currency":"USD"
                                    }
                                ]
                            }
                        }
                    ]
                } */
                
            ))->send();
     
            if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                echo $response->getMessage();
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }



}else{

    echo 'Subscription does not exist';
}

 
