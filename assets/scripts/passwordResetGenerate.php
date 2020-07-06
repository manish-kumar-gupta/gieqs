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
$explicit = false;
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
	
    if (($userExists)){

        //prepare a new key for the user

        
        $key = $userFunctions->generateRandomString('10');

        //load the user

        $userid = $userFunctions->getUserFromEmail($desiredUserName);

        if ($users->matchRecord($userid) === TRUE){

            //if user exists in the user database

            $users->Load_from_key($userid);

            //set a new key

            $users->setkey($key);

            if ($users->prepareStatementPDOUpdate() > 0){

            //send an email to the user

            $emailWorked = null;
            $reason = null;

            echo 'An email was sent with password reset instructions to your registered email address.';

            //generate an initial login link
            $emailVaryarray['firstname'] = $users->getfirstname();
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            $email = array(0 => $users->getemail());
            $emailVaryarray['key'] = $users->getkey();

            $filename = '/assets/email/emailPasswordReset.php';

            $subject = 'Password reset for your GIEQs online account';

            require(BASE_URI . '/assets/scripts/individualMailerGmail.php');  //TEST MAIL

            if ($debug){

                if ($emailWorked){

                    echo 'Email sent';
                }else{

                    echo 'Email failed ' . $reason;
                }

            }

            }

        }

    }else{

        if ($explicit){

            echo 'We do not recognise that email address.  You can create an account below.';
        }
    }
        
    
}else{
	if ($debug){
		echo 'data array empty';
		}
	
}