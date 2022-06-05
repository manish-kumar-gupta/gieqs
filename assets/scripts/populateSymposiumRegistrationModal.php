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
//echo 'hello4';

function ne($v)
{
    return $v != '';
}

//$debug = true;
//$_SESSION['debug'] = true;
$explicit = true;
//echo 'hello';



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


//if logged in 

//echo 'hello';

//echo $userid;

//todo write started symposium registration

/**Symposium
 * 
 * id
 * user_id
 * asset_id
 * partial_registration
 * early_bird
 * group_registration
 * registrationType
 * includeGIEQsPro
 * longTermProMemberDiscount
 * full_registration_date
 * title
 * interestReason
 * professionalMemberDiscount
 * professionalMemberNumber
 * informedHow
 * 
 * 
 * 
 * 
 * 
 * professional discount is 20%
 * cannot be combined with other discount
 * 
 * get 20% discount if professional, or if pro member, not on the cost of gieqs online
 * 
 * **/


if ($userid){

    $array = [];


    //load user from database

    $users->Load_from_key($userid);

    echo $users->Return_row($userid);


}