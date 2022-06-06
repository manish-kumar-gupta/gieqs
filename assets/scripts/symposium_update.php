<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require '../../assets/includes/config.inc.php';
//echo 'hello2';
require BASE_URI . '/assets/scripts/headerScript.php';

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
$symposium = new symposium;
$assetManager = new assetManager;

//echo 'hello4';

function ne($v)
{
    return $v != '';
}

$debug = false;
//$_SESSION['debug'] = true;
$explicit = true;
//echo 'hello';

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer;

function get_include_contents($filename, $variablesToMakeLocal)
{
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

$data = json_decode(file_get_contents('php://input'), true);

if ($debug) {

    print_r($data);

}

//check count of get variables

if (count($data) > 0) {

    if ($users->matchRecord($userid)){   //check the user exists


        $users->Load_from_key($userid);

        //users updates

        $users->setcentreCity($data['centreCity']);
        $users->setcentreCountry($data['centreCountry1']);
        $users->setcentreName($data['centreName']);
        $users->setcontactPhone($data['contactPhone']);
        $users->setendoscopistType($data['endoscopistType']);
        $users->setfirstname($data['firstname']);
        $users->setsurname($data['surname']);
        $users->settrainee($data['trainee1']);

        $userUpdate = $users->prepareStatementPDOUpdate();
        

//get asset id in here
//need to add others to the push anyway

        $subscription_id_sitewide = $assetManager->getSiteWideSubscription($userid, false);
        $subscription_length = $assetManager->getLengthSubscription($subscription_id_sitewide, false);

        if ($debug){

            echo ' subscription_id_sitewide update was ' . $subscription_id_sitewide;
            echo '<br/>';
            echo 'subscription_length update was ' . $subscription_length;

        }

        if ($subscription_length > 3){

            $longTermProMemberDiscount = 1;

        }else{

            $longTermProMemberDiscount = 0;

        }

        //var_dump($symposium);

        //check there is a symposium record for this user, if so get id
        //if not create new

        $symposium_id = $userFunctions->getSymposiumidUserid($userid, false);

        if ($debug){

            echo '<br/>';
            echo '<br/>';
            echo ' symposium_id  was ' . $symposium_id;
            

        }

        if (!($symposium_id)){//no id exists, ie no existing record

            $symposium->New_symposium($userid, $data['assetid'],'1',$data['costUpdate']['earlyBird'],$data['costUpdate']['group'],$data['costUpdate']['registrationType'],$data['costUpdate']['includeGIEQsPro'],$longTermProMemberDiscount,null,$data['title'],$data['interestReason'],$data['professionalMemberDiscount'],$data['professionalMemberNumber'],$data['informedHow'],null);
            $symposiumUpdate = $symposium->prepareStatementPDO();


        }else{

            //$_SESSION['debug'] = true;
            //echo 'symposium id exists';
            $symposium->Load_from_key($symposium_id);
            if ($debug){


                print_r($symposium);

            }
            $symposium->setasset_id($data['assetid']);
            $symposium->setpartial_registration($data['partial_registration']);
            $symposium->setearly_bird($data['costUpdate']['earlyBird']);
            $symposium->setgroup_registration($data['costUpdate']['group']);
            $symposium->setregistrationType($data['costUpdate']['registrationType']);
            $symposium->setincludeGIEQsPro($data['costUpdate']['includeGIEQsPro']);
            $symposium->setlongTermProMemberDiscount($longTermProMemberDiscount); 

           

            $symposium->setfull_registration_date(null);
            $symposium->settitle($data['title']);
            $symposium->setinterestReason($data['interestReason']);
            $symposium->setprofessionalMemberDiscount($data['professionalMemberDiscount']);
            $symposium->setprofessionalMemberNumber($data['professionalMemberNumber']);
            $symposium->setinformedHow($data['informedHow']);
            //$symposium->setnotes($data['notes']);
            //$symposium->setearly_bird($data['early_bird']);
            $symposiumUpdate = $symposium->prepareStatementPDOUpdate();



        }

       /*  $symposium->New_symposium($userid, $data['assetid'],'1',$data['costUpdate']['earlyBird'],$data['costUpdate']['group'],$data['costUpdate']['registrationType'],$data['costUpdate']['includeGIEQsPro'],$longTermProMemberDiscount,null,$data['title'],$data['interestReason'],$data['professionalMemberDiscount'],$data['professionalMemberNumber'],$data['informedHow'],null);

        //var_dump($symposium);

        $symposiumUpdate = $symposium->prepareStatementPDO(); */

        if ($debug){

            echo ' Users update was ' . $userUpdate;
            echo '<br/>';
            echo 'Symposium update was ' . $symposiumUpdate;
        }

        

            $returnArray = [

                'users' => $userUpdate,
                'symposium' => $symposiumUpdate,

            ];
        
        
            echo json_encode($returnArray);
        



    }else{

        if ($debug){

            echo 'Error: not logged in or user not recognised';
        }

    }


//update the user account

//update the symposium data

//forward to the normal confirmation screen, stripe [should currently not be final so no date in finalised, add this later]
//make a custom mail in the usual way
//ensure that the free persists to here


    

} else { //no data received
    if ($debug) {
        echo 'data array empty';
    }

}
