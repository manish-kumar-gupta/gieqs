
<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';
//$general = new general;
$general = new general;
$videosAccess = new videosAccess;
//echo 'hello4';


//MARKER USE FOR SCRIPT BASIS

function ne($v) {
    return $v != '';
}

echo 'Working Classes' . PHP_EOL;

exit();

$sessionItemArray = $general->copyRecords_SessionItem_video();

//var_dump($sessionItemArray);

//using this array do 2 things

//insert into videos the array



foreach ($sessionItemArray as $key=>$value){

    

    $name = null;
    $description = null;
    $sessionItemid = null;
    $faculty = null;


    $name = addslashes($value['sessionItemTitle']);
    //echo $name . PHP_EOL;
    $description = addslashes($value['sessionItemDescription']);
    //echo $description . PHP_EOL;
    $sessionItemid = $value['sessionItemid'];
    //echo $sessionItemid . PHP_EOL;
    $live = $value['live'];
    //echo $live . PHP_EOL;
    $faculty = $value['faculty'];
    //echo $faculty . PHP_EOL;

    
    $facultyName = $general->convert_facultyid_to_userid($faculty);

    $user_id = $general->getUserIdFromName($facultyName);

    $user_id = intval($user_id);

    if (is_int($user_id)){


    }else{

        $user_id = 0;
    }

    //echo '<br/><br/>';

    




$videoid = $videosAccess->insert_copied_records_with_video_id($name, $description, $user_id);

//each time insert use the video_id to link back into the sessionItem

$general->updateSessionItemVideoId($videoid, $sessionItemid);

//create a chapter in this video with tags gieqsDigital and the 

$chapterid = $videosAccess->createChapter($videoid);



if (isset($live)){

    if ($live == 1){

        $tagid = '257';
    }else{

        $tagid = '258';
    }
}else{

    $tagid = '258';

}

echo $tagid;



$videosAccess->linkTags($chapterid, '569');

$videosAccess->linkTags($chapterid, $tagid);




}





$videosAccess->endvideosAccess();

      