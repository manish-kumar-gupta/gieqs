<?php 

$openaccess = 0;

$requiredUserLevel = 2;

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = false;

function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');




/* spl_autoload_unregister ('class_loader');

//$users = new users; //must be users from GIEQs
require(BASE_URI .'/assets/scripts/classes/users.class.php'); */
$users = new users;

/* spl_autoload_register ('class_loader'); */

$general = new general;
//$usersCommentsVideo = new usersCommentsVideo;
//$usersSocial = new usersSocial;
$usersTagging = new usersTagging;


$data = json_decode(file_get_contents('php://input'), true);

$videoid = $data['videoid'];
$taggerid = $data['taggerid'];


if ($debug){
print_r($videoid);
print_r($taggerid);
echo '$userid is ' . $userid;
}



if ($videoid && $taggerid && userid){

    //insert an invitation row
    //use UTC for insertion
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime('now', $gmtTimezone);
    $timestamp = $myDateTime->format('Y-m-d H:i:s');
    //$timestamp = date("Y-m-d H:i:s");
    $usersTagging->New_usersTagging($taggerid, $videoid, $userid, $timestamp, null, null, null, null);
    $result = $usersTagging->prepareStatementPDO();

    if ($result){

        echo 'Worked';
    }

    // send a mail to the invited user

 
}else{
    if ($debug){
        echo 'Missing data';
       }
    
    exit();
}

$users->endusers();
