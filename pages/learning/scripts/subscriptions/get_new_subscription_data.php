<?php

$openaccess = 0;

$requiredUserLevel = 6;

require '../../includes/config.inc.php';

require BASE_URI . '/assets/scripts/login_functions.php';

//place to redirect the user if not allowed access
$location = BASE_URL . '/index.php';

if (!($dbc)) {
    require DB;
}

require BASE_URI . '/assets/scripts/interpretUserAccess.php';

$debug = false;
$verbose = true;

if ($debug == true) {
    error_reporting(E_ALL);
} else {

    error_reporting(0);
}

$general = new general;
$users = new users;
$users->Load_from_key($userid);

require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/subscriptions.class.php';
$subscription = new subscriptions;

$data = json_decode(file_get_contents('php://input'), true);

$asset_id = $data['asset_id'];
//$review = $data['review'];

if ($debug) {
    print_r($asset_id);
//print_r($review);
    echo '$userid is ' . $userid;
}

//does the asset exist?

if ($assets_paid->Return_row($asset_id)) {

    $assets_paid->Load_from_key($asset_id);
    $asset_type = $assets_paid->getasset_type();

} else {

    if ($verbose) {

        //print_r($review);
        echo 'ERROR: Asset does not exist.  Please contact the system administrator';
    }

    if ($debug) {

        //print_r($review);
        echo 'ERROR: asset does not exist.  Please contact the system administrator';
    }

    die();

}

//if the type is 1 check there is no such subscription already, if so don't allow

if ($asset_type == '1') { //can only have one site-wide subscription

    if ($assetManager->doesUserHaveSameAssetClassAssetType($asset_type, $userid, $debug)) {

        //don't allow further editing

        if ($verbose) {

            //print_r($review);
            echo 'You have already purchased a site-wide subscription!  If you believe we are mistaken please contact us.';
        }

        if ($debug) {

            //print_r($review);
            echo '$userid ' . $userid . ' already has a subscription of type ' . $asset_type;
        }

        die();

    }

}

//for any type check that the asset is not already purchased

if ($assetManager->doesUserHaveSameAssetAlready($asset_id, $userid, $debug)) {

    //don't allow further editing

    if ($verbose) {

        //print_r($review);
        //echo 'You have already purchased this! If you believe there is a mistake or you have an access issue please contact us!';


        //go to that asset

        $location = BASE_URL . '/pages/learning/pages/general/show_subscription.php?assetid=' . $asset_id;

        header("Location: $location");



    }

    if ($debug) {

        //print_r($review);
        echo '$userid ' . $userid . ' already owns this asset and it is active #' . $asset_id;
    }

    die();

} else {

    if ($debug) {

        echo '$userid ' . $userid . ' does not own this asset or it is not active #' . $asset_id;

    }

}

//if subscription exists

$subscription_to_return = array();

$subscription_to_return['asset_name'] = $assets_paid->getname();
$subscription_to_return['asset_type'] = $assetManager->getAssetTypeText($assets_paid->getasset_type());
$subscription_to_return['asset_id'] = $assets_paid->getid();

$subscription_to_return['cost'] = $assets_paid->getcost();
$subscription_to_return['description'] = $assets_paid->getdescription();
$subscription_to_return['renew_frequency'] = $assets_paid->getrenew_frequency();

$subscription_to_return['user_id'] = $userid;

echo json_encode($subscription_to_return);
//echo $subscription->getexpiry_date();

//json encode the result

//need the description
//need the cost from subtable
//need to check that it is ending soon
//need to set renewal date for new subscription the number of days remaining +
