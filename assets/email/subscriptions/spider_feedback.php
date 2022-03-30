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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;



$debug = false;

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


//test time

    //$currentNavTime = new DateTime('2020-11-14 07:30:00', $serverTimeZoneNav);


if ($debug){
    
    //$currentNavTime = new DateTime('2020-11-14 07:30:00', $serverTimeZoneNav);
    
}



 $courseDate = new DateTime($programme->getdate(), $serverTimeZoneNav); //get course date from Programme
 //- 3 days

 //is this the day to send the mail?
 //so do the days match

//set date today - 3 days
//$interval = 'P3D'; //length of time valid


if ($debug){

    echo '$currentNavTime ' . $currentNavTime->format('d/m/Y H:i');
        echo '<br/><br/>';


}



$courseDateMinus3 = $courseDate; //send on date of course

if ($debug){

    echo '$courseDateMinus3 ' . $courseDateMinus3->format('d/m/Y H:i');
        echo '<br/><br/>';


}


$todayDatePlus3 = date_add($currentNavTime, new DateInterval($interval));

if ($debug){

    echo '$todayDatePlus3 ' . $todayDatePlus3->format('d/m/Y H:i');
        echo '<br/><br/>';


}

//is there a course 3 days in the future?
$programmes = $sessionView->returnLiveProgrammesArray($todayDatePlus3, $debug); //today

if ($debug){

    echo '$programmes array contains ';
    print_r($programmes);
}

if ($programmes){ //there is a course 3 days in the future
    
    

//if so continue

 
 //load programme
 
  $programmeid = $programmes[0]['programmeid'];
    $programme->Load_from_key($programmeid);

//get programme times

$programmes3 = $sessionView->getProgrammeTimes([0=>['id'=>$programmeid,]], false);

$programmes4 = $sessionView->convertProgrammeTimes($programmes3, false);

$start_time = $programmes4[0];

if ($debug){

    echo 'start time is ' . $start_time;
}

//get the asset from the programme

$assets = $assetManager->which_assets_contain_programme($programmeid, true);

if ($debug){

    echo 'assets are ';
    print_r($assets);
    echo '<br/><br/>';
}


 $assetid = $assets[0];
 $assets_paid->Load_from_key($assetid);





//construct full date object

$courseDateFull = new DateTime($programme->getdate() . ' ' . $programmes4[0] , $serverTimeZoneNav); //get course date from Programme
$courseDateFull_user_readable = date_format($courseDateFull, 'H:i');

if ($debug){

    echo 'full course date is ' . $courseDateFull->format('d/m/Y H:i');
    echo 'user readable time is ' . $courseDateFull_user_readable;
}


//is the time around 0700 Brussels?
//CONVERT to a function
//send the mail at 0700 Brussels time on the correct date (3 days before the course)

$date = $currentNavTime->format('Y-m-d');

//create a new datetime at the current time in Brussels on the date of the course
$currentTimeBrusselsOnCourseDate = DateTime::createFromFormat('Y-m-d', $date) ?: new DateTime; //time now on course date
$currentTimeBrusselsOnCourseDate->setTimezone($serverTimeZoneNav);

//add one day
//then do

//$desiredMailSendTime = new DateTime('2020-10-15 07:00:00', $serverTimeZoneNav);
$desiredMailSendTimeOnCourseDate = new DateTime($date . ' 18:00:00', $serverTimeZoneNav);
//$desiredMailSendTimeOnCourseDate = DateTime::createFromFormat('H:i:s', $desiredMailSendTime) ?: new DateTime; //time now on course date
//$desiredMailSendTimeOnCourseDate->setTimezone($serverTimeZoneNav);

if ($debug){

    echo '$desiredMailSendTimeOnCourseDate ' . $desiredMailSendTimeOnCourseDate->format('d/m/Y H:i');
        echo '<br/><br/>';


}

//-1 hour
//$interval2 = 'PT1H'; //length of time valid
 $interval2 = new DateInterval('PT1H');

$desiredMailSendTimeOnCourseDateMinus1 = new DateTime($desiredMailSendTimeOnCourseDate->format('Y-m-d H:i'), $serverTimeZoneNav);

$desiredMailSendTimeOnCourseDateMinus1->sub($interval2);

if ($debug){
print_r($desiredMailSendTimeOnCourseDate);
print_r($desiredMailSendTimeOnCourseDateMinus1);
    echo '$desiredMailSendTimeOnCourseDateMinus1 ' . $desiredMailSendTimeOnCourseDateMinus1->format('d/m/Y H:i');
        echo '<br/><br/>';


}


//+ 1 hour

$desiredMailSendTimeOnCourseDatePlus1 = new DateTime($desiredMailSendTimeOnCourseDate->format('Y-m-d H:i'), $serverTimeZoneNav);

$desiredMailSendTimeOnCourseDatePlus1->add($interval2);

if ($debug){
print_r($desiredMailSendTimeOnCourseDate);
print_r($desiredMailSendTimeOnCourseDateMinus1);
print_r($desiredMailSendTimeOnCourseDatePlus1);

    echo '$desiredMailSendTimeOnCourseDatePlus1 ' . $desiredMailSendTimeOnCourseDatePlus1->format('d/m/Y H:i');
    echo '<br/><br/>';

}



//$timeToSendMail = new DateTime('now', $serverTimeZoneNav);

if (($currentNavTime > $desiredMailSendTimeOnCourseDateMinus1) && ($currentNavTime < $desiredMailSendTimeOnCourseDatePlus1)){
   //if current time is +/- 1 hour from 0700 on 3 days before course, execute the mail



//ADD SEND MAIL TO OTHER FILE IF < 3 DAYS !!!







       


        //set some basics FOR THE EMAIL
        $filename = '/assets/email/subscriptions/feedback_course.php';
        $email_id = 'feedback_course_' . $assetid; //unique id
        $subject = 'Please give us feedback for ' . $assets_paid->getname();
        $preheader = 'We rely on your feedback to improve our courses for next time.  Please take less than 5 minutes to let us know how we did.';
        //$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

        
        

        
        
        
        //define the population


        $populationDenom = $assetManager->getOwnersAssetPlainArray($assetid);

        //$populationDenom = ['1']; //TEST REMOVE FOR LIVE

        $removePopulation = $userFunctions->getMailListAlreadyMailed($email_id);

        if (is_array($removePopulation)){

        $population_overall = array_diff($populationDenom, $removePopulation);

        $population = array_slice($population_overall, 0, 25);  

        }else{

            $population = array_slice($populationDenom, 0, 25);
        }

        //$population = ['1', '5', '10', '11', '23']; //TEST USER IDs

        

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
            if ($users->gettimezone()){

                $timezone = $users->gettimezone();
            }else{
    
                $timezone = 'UTC';
            }
            $subscription->Load_from_key($assetManager->get_subscription_id_asset($assetid, $value));
            $end_date = new DateTime($subscription->getexpiry_date(), new DateTimeZone($timezone));
            $end_date_user_readable = date_format($end_date, 'd/m/Y');

            //todo get from database later and customise

            $emailVaryarray['assetid'] = $assets_paid->getid();
            $emailVaryarray['feedback_link'] = 'https://www.surveymonkey.com/r/FZ7BK27?user_id=' . $value . '&asset_id=' . $assetid;
 
            $emailVaryarray['asset_name'] = $assets_paid->getname();
            $emailVaryarray['programme_date'] = date_format($courseDateFull, 'd/m/Y'); //from programme array
            $emailVaryarray['subscription_id'] = $assetManager->get_subscription_id_asset($assetid, $value); //from sub_asset_paid using assetid and userid
            $emailVaryarray['programme_start_time'] = $courseDateFull_user_readable; //from programme array above
            $emailVaryarray['asset_type'] = $assetManager->getAssetTypeText($assets_paid->getasset_type());
            $emailVaryarray['renew_frequency'] = $assets_paid->getrenew_frequency();;
            $emailVaryarray['cost'] = $assets_paid->getcost() . ' ' . $currency;
            $emailVaryarray['expiry_date'] = $end_date_user_readable; //from subscription see success.php




            
            if ($debug){

                echo PHP_EOL;
                print_r($emailVaryarray);

            }

         

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
                
                print_r($mail);

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

    }else{//end if date is correct

        

            echo 'there is a course 3 days in the future (' . $courseDateFull->format('d/m/Y') . ') but it is not correct time to send mail (Current time is : ' . $currentNavTime->format('d/m/Y H:i') . ' CET), parameters were (start send : ' . $desiredMailSendTimeOnCourseDateMinus1->format('d/m/Y H:i') . ' CET to end send : ' . $desiredMailSendTimeOnCourseDatePlus1->format('d/m/Y H:i') . ' CET)';

        
    } 

    
    }else{

        //print_r($courseDate);

        echo 'No course data at 3 days before specified course date (' . $courseDate->format('d/m/Y') . ')';
        
        
        //check all course participants have received mails
        echo ' Aborting';

        die();
    }
        
    

        
    




   
