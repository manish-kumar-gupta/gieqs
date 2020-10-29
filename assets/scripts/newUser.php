<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
//echo 'hello4';




function ne($v) {
    return $v != '';
}



$debug = false;
$explicit = true;
//echo 'hello';



$data = json_decode(file_get_contents('php://input'), true);

if ($debug){

print_r($data);

}

//check count of get variables

if (count($data) > 0){

    //check the user does not exist

    $desiredUserName = $data['email'];
    
    $userExists = $userFunctions->userExists($desiredUserName);
	
    if (!($userExists)){

        $ip = $_SERVER['REMOTE_ADDR'];
$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
$ipInfo = json_decode($ipInfo);
$timezone = $ipInfo->timezone;

if ($debug){

    echo $timezone;

}
/* date_default_timezone_set($timezone);
echo date_default_timezone_get();
echo date('Y/m/d H:i:s'); */

            $users->setemail($data['email']);
            $users->setfirstname($data['firstname']);
            $users->setsurname($data['surname']);
            $users->setgender($data['gender']);
            $users->setaccess_level(7); // user level 7 requires an email confirm
            $users->settimezone($timezone);
            $key = $userFunctions->generateRandomString('10');
            $users->setkey($key);
            $desiredPassword = $general->hash_password($data['password'], 'westmead');
            $users->setpassword($desiredPassword);
            if ($users->prepareStatementPDO() > 0){

            $emailWorked = null;
            $reason = null;

            echo 'Your User Account was created.  Check your email for a link to login';

            //generate an initial login link
            $emailVaryarray['firstname'] = $data['firstname'];
            $emailVaryarray['surname'] = $data['surname'];
            $emailVaryarray['email'] = $data['email'];
            //$email = array(0 => $data['email']); //old
            $email = $data['email'];
            $emailVaryarray['key'] = $key;

            $filename = '/assets/email/emailNewAccount.php';;

            $subject = 'Welcome to your new GIEQs Online Account';

            require(BASE_URI . '/assets/scripts/individualMailerGmailAPI.php');  //TEST MAIL

            if ($debug){

                if ($emailWorked){

                    echo 'Email sent';
                }else{

                    echo 'Email failed ' . $reason;
                }

            }
            

                

            //modify for forgot password link

        }else{

            echo 'There was a problem creating your account.  Please try again';
        }


    }else{

        if ($explicit){

            echo 'That email address is already registered.  Please login below.';

        }

    }

	
    
}else{
	if ($debug){
		echo 'data array empty';
		}
	
}