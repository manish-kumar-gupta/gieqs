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



$debug = false;
//echo 'hello';

*/

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

	if ($debug){
	print_r($GLOBALS);
	print_r($data);
    }
    
}