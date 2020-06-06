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
//echo 'hello4';




function ne($v) {
    return $v != '';
}



$debug = true;
//echo 'hello';



$data = json_decode(file_get_contents('php://input'), true);

if ($debug){

print_r($data);

}

//check count of get variables

if (count($data) > 0){

	//$data = $general->sanitiseGET($data);

	/*foreach ($data as $key=>$value){

		$GLOBALS[$key] = $value;

	}*/

	//check the user matching the passed user_id is making the request [happens in interpretuseraccess]

	//check the old password against the db user_id

	//check the old password and the new are not the same

	//check the new password is > 6 characters

	//write the new password to the db

	//come back with reply

	if ($debug){
	print_r($GLOBALS);
	print_r($data);
    }
    
}