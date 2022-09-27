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

$current_date = new DateTime('now', new DateTimeZone('UTC'));
$current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');




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

    $log=[];

    
    $log[] = "New user script run with key" . $data['key'];


    if ($userFunctions->getUserFromKey($data['key'])){

    $userid = $userFunctions->getUserFromKey($data['key']);
    echo $userid;

    $log[] = "User id $userid with key" . $data['key'] .  "attempting to register as new user";


    //switch the userLevel to 6

    $users->Load_from_key($userid);
    $users->setaccess_level(6);
    
        //get a new key

        $key = $userFunctions->generateRandomString('10');
        $users->setkey($key);

        //commit changes to DB

        if ($users->prepareStatementPDOUpdate() > 0){

            //login

            //get from the users class

            $log[] = "User id $userid key updated to $key";


            $_SESSION['user_id'] = $users->getuser_id();
            $_SESSION['firstname'] = $users->getfirstname();
            $_SESSION['surname'] = $users->getsurname();
            $_SESSION['access_level'] = $users->getaccess_level();
            $_SESSION['siteKey'] = 'TxsvAb6KDYpmdNk';

            //redirect gieqs.com

           
                if ($access_token){

                    $log[] = "Redirect to " . BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect . '&access_token=' . $access_token;

                    $dataLogFile = implode(" - ", $log);

//Add a newline onto the end.
$dataLogFile .= PHP_EOL;

if ($debugPrint){

    var_dump($dataLogFile);
}



//Log the data to your file using file_put_contents.
$myfile = fopen(BASE_URI . '/assets/scripts/newuser_log.log', "a");
fwrite($myfile, "\n New Log, at " . $current_date_sqltimestamp . "\n");
fwrite($myfile, $dataLogFile);
fclose($myfile);



                    redirect_login(BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect . '&access_token=' . $access_token);


                }else{

                
                    $log[] = "Redirect to " . BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect;

                    $dataLogFile = implode(" - ", $log);

//Add a newline onto the end.
$dataLogFile .= PHP_EOL;

if ($debugPrint){

    var_dump($dataLogFile);
}



//Log the data to your file using file_put_contents.
$myfile = fopen(BASE_URI . '/assets/scripts/newuser_log.log', "a");
fwrite($myfile, "\n New Log, at " . $current_date_sqltimestamp . "\n");
fwrite($myfile, $dataLogFile);
fclose($myfile);


                redirect_login(BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect);

                

                }





        }else{

            //failed to update user account
            //show error
            $log[] = "Can't update user account for $userid using key $key";


        }


    }else{
        
        if ($explicit){
            echo 'Invalid Key.  This may be because of multiple clicks on the link.<br/><br/> No problem, we will get you logged in.<br/> 
            Please go to <a href="' . BASE_URL . '/login">login</a> and click forgot password.  Enter your email address for a password reset link.<br/><br/>If you were in the middle of activating a free link <b>you must click the link again from your email</b> once you have reset your password to receive the free course.  <br/><br/>You can always contact us if you are still having trouble (admin@gieqs.com).  <br/><br/>Remember Internet Explorer is not supported on our site.';
            $log[] = "Invalid Key.  Please go to login and request a new account reset or contact us.  Can't open user account for $userid using key $key";

            }


    }


    //log the user in


    
}else{

    if ($debug){
		echo 'data array empty';
        $log[] = 'data array empty';

		}
}

$dataLogFile = implode(" - ", $log);

//Add a newline onto the end.
$dataLogFile .= PHP_EOL;

if ($debugPrint){

    var_dump($dataLogFile);
}



//Log the data to your file using file_put_contents.
$myfile = fopen(BASE_URI . '/assets/scripts/newuser_log.log', "a");
fwrite($myfile, "\n New Log, at " . $current_date_sqltimestamp . "\n");
fwrite($myfile, $dataLogFile);
fclose($myfile);

