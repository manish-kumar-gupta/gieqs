<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//require (BASE_URI.'/assets/scripts/login_functions.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
//echo 'hello4';




function ne($v) {
    return $v != '';
}



$debug = true;
$explicit = true;
//echo 'hello';

if (count($_GET) > 0){

	if ($debug){

        print_r($_GET);
    }

	
	$data = $general->sanitiseGET($_GET);
	
	foreach ($data as $key=>$value){
		
		$GLOBALS[$key] = $value;
		
    }

    if ($debug){

        print_r($data);
        
        }


    //look up the user

    

    

    if ($userFunctions->getUserFromKey($data['key'])){

    $userid = $userFunctions->getUserFromKey($data['key']);
    echo $userid;

    //switch the userLevel to 6

    $users->Load_from_key($userid);
    $users->setaccess_level(6);
    
        //get a new key

       

        //commit changes to DB

        if ($users->prepareStatementPDOUpdate() > 0){

            //login

            //get from the users class

            $_SESSION['user_id'] = $users->getuser_id();
            $_SESSION['firstname'] = $users->getfirstname();
            $_SESSION['surname'] = $users->getsurname();
            $_SESSION['access_level'] = $users->getaccess_level();
            $_SESSION['siteKey'] = 'TxsvAb6KDYpmdNk';

            //redirect gieqs.com

           
                if ($access_token){

                    redirect_login(BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect . '&access_token=' . $access_token);


                }else{

                
                redirect_login(BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect);

                }

            



        }else{

            //failed to update user account
            //show error

        }


    }else{
        
        if ($debug){
            echo 'Invalid Key.  Please go to login and request a new account reset or contact us';
            }


    }


    //log the user in


    
}else{

    if ($debug){
		echo 'data array empty';
		}
}

