<?php

/* File to generate a table JSON at top of page programmeEdit */

//$openaccess = 1;

require ('../../includes/config.inc.php');		

//require (BASE_URI.'/assets/scripts/headerScript.php');


$video_PDO = new video_PDO;

//echo 'could load video class';

$response =  $video_PDO->Load_records_limit_json_datatables(50);

echo $response;

//echo ltrim($response);

$video_PDO->endvideo();