<?php
$openaccess = 1;

error_reporting(E_ALL);

echo 'hello';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/config.inc.php';
echo 'hello2';

    define('BASE_URI', '/home/u8l2e829uoi9/public_html');

    define('BASE_URL', 'https://www.gieqs.com');


$location = BASE_URL . '/index.php';

//require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$_SESSION['debug'] = false;

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




//$users->Load_from_key($userid);
require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
$userFunctions = new userFunctions;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

require_once(BASE_URI . '/assets/scripts/classes/user_email.class.php');
$user_email = new user_email;


//require_once BASE_URI .'/../scripts/config.php'; // KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;



$debug = FALSE;

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


//SPIDER

$serverTimeZoneNav = new DateTimeZone('Europe/Brussels'); //because this is where course is held
$currentNavTime = new DateTime('now', $serverTimeZoneNav);

 //if an asset specify and load the asset
 $assetid = '7';
 $assets_paid->Load_from_key($assetid);

 $courseDate = ''; //get course date from Programme
 //- 3 days

 //is this the day to send the mail?
 //so do the days match

//set date today - 3 days
$interval = 'P3D'; //length of time valid

$courseDateMinus3 = $date_sub($courseDate, new DateInterval($interval));

//is there a course on this day?
$programmes = $sessionView->returnLiveProgrammesArray($currentNavTime, $debug); //today


//if so continue

//send the mail at 0700 Brussels time on the correct date

$date = $courseDateMinus3->format('Y-m-d');

//create a new datetime at the current time in Brussels on the date of the course
$timeToSendMail = DateTime::createFromFormat('Y-m-d', $date) ?: new DateTime;
$timeToSendMail->setTimezone($serverTimeZoneNav);

//$timeToSendMail = new DateTime('now', $serverTimeZoneNav);



//CHECK COURSE WITHIN 3 DAYS




//GET PARTICIPANTS
//SEND MAILS

//ADD SEND MAIL TO OTHER FILE IF < 3 DAYS



// Once the transaction has been approved, we need to complete it.




       


        //set some basics FOR THE EMAIL
        $filename = '/assets/email/subscriptions/onboarding_course.php';
        $email_id = 'onboarding_course_' . $assetid; //unique id
        $subject = $assets_paid->getname() . ' joining instructions';
        $preheader = 'Joining instructions for your GIEQs Online Course - ' . $assets_paid->getname();
        //$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

        
        

        
        
        
        //define the population


        $populationDenom = $assetManager->getOwnersAsset($assetid);



        $removePopulation = $userFunctions->getMailListAlreadyMailed($email_id);

        if (is_array($removePopulation)){

        $population_overall = array_diff($populationDenom, $removePopulation);

        $population = array_slice($population_overall, 0, 25);  

        }else{

            $population = array_slice($populationDenom, 0, 25);
        }

        //$population = ['1', '5', '10', '11', '23']; //TEST USER IDs

        //$population = ['1']; //blank while the script is on the server

        if ($debug){
        
        print_r($population);

        }

        foreach ($population as $key=>$value){


            //standard variables
            $users->Load_from_key($value);
            $emailVaryarray['firstname'] = $users->getfirstname();
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            $email = $users->getemail();
            $emailVaryarray['key'] = $users->getkey();
            $emailVaryarray['preheader'] = $preheader;
        
            //other variables specific for this script
            $currency = 'Euro';
            $emailVaryarray['asset_name'] = $assets_paid->getname();
            $emailVaryarray['programme_date'] = NULL; //from programme array
            $emailVaryarray['subscription_id'] = NULL; //from sub_asset_paid using assetid and userid
            $emailVaryarray['programme_start_time'] = NULL; //from programme array above
            $emailVaryarray['asset_type'] = $assetManager->getAssetTypeText($assets_paid->getasset_type());
            $emailVaryarray['renew_frequency'] = $assets_paid->getrenew_frequency();;
            $emailVaryarray['cost'] = $assets_paid->getcost() . ' ' . $currency;
            $emailVaryarray['expiry_date'] = NULL; //from subscription see success.php




            
            if ($debug){

                echo PHP_EOL;
                print_r($emailVaryarray);

            }

            //$filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
    
            //$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';

            $mail->ClearAllRecipients();
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


           

            

            
            if ($debug){

                echo('email would now be sent');

                //print_r($mime);
                
            }else{


                require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');
                echo 'email to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . ' was sent. <br/><br/>'; 
                //track which user_id has received
                //emails received id, email_id, user_id
                $user_email->New_user_email($value, $email_id);
                $user_email->prepareStatementPDO();

            }

        } 

    

        
    

        
    




   
