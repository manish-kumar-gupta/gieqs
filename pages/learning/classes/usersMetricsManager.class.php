<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 5-07-2020
 *
 * DJT 2021 birth of DENTY
 *
 * License: LGPL
 *
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['debug'] == true) {

    error_reporting(E_ALL);

} else {

    error_reporting(0);

}

require_once 'DataBaseMysqlPDO.class.php';

class usersMetricsManager
{

    private $connection;

    public function __construct()
    {
        $this->connection = new DataBaseMysqlPDOLearning();
    }

    //views

    public function getLastViewedVideo($userid, $debug = false)
    {

        $q = "SELECT `video_id` FROM `usersViewsVideo`
            WHERE `user_id` = '$userid'
            ORDER BY `id` DESC
            LIMIT 1";

        if ($debug) {

            echo $q . '<br><br>';

        }

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn = $row['video_id'];

            }

            return $rowReturn;

        } else {

            return false;
        }

    }

    public function getLastViewedVideoAsset($userid, $asset_array, $debug = false)
    {

        //uses assetManager returnVideosAsset to provide the array

        if ($debug) {

            echo PHP_EOL;
            echo 'asset array was';
            print_r($asset_array);
        }

        $detected = false;

        foreach ($asset_array as $key => $value) {

            $video = null;
            $video = $this->getLastViewedVideo($userid);

            if ($value == $video) {

                $detected = $video;

            }

        }

        return $detected;

    }

    public function getLastVideoViewedInAsset($userid, $asset_array, $debug = false)
    {

        //uses assetManager returnVideosAsset to provide the array

        if ($debug) {

            echo PHP_EOL;
            echo 'asset array was';
            print_r($asset_array);
        }

        $detected = false;

        $videosArray = $this->getAllVideosWatchedUser($userid);

        if ($debug) {

            echo PHP_EOL;
            echo 'user has watched array ';
            print_r($videosArray);
        }

        foreach ($videosArray as $key => $value) {

            //if in asset array then return the first video id.

            
            if (in_array($value, $asset_array) === true) {

                $detected = $value;
                break;

            }

        }

        if ($debug){

            echo 'user last watched video id ' . $detected . 'from this asset group';
        }
        return $detected;

    }

    

    public function getLastViewedVideoPage($userid, $page_id)
    {

    }

    public function checkChapterUser($userid, $chapter_id)
    {

        //has user viewed this chapter before

        $q = "SELECT `id` FROM `usersVideoChapterProgress`
            WHERE `user_id` = '$userid' AND chapter_id = '$chapter_id'";

        /* if ($debug) {

            echo $q . '<br><br>';

        } */

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            return true;

        } else {

            return false;
        }

    }

    public function getVideoForChapter($chapter_id)
    {

        $q = "SELECT a.`id`
        FROM `video` as a
        INNER JOIN `chapter` as b ON a.`id` = b.`video_id`
        WHERE b.`id` = '$chapter_id'";

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows == 1) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $videoid = $row['id'];

            }

            return $videoid;

        } else {


            if ($debug){

                echo 'one exact video not matched';

            }

            return false;

            
        }

    }

    public function userCompletionVideos($userid, $debug = false)
    {

        //get all chapters for selected video

        $q = "SELECT a.`id`
        FROM `video` as a
        WHERE a.`active` = '1' OR a.`active` = '3'";

        if ($debug) {

            echo $q . '<br><br>';

        }

        $x = 0; // completed video counter
        $y = 0; // video total counter

        //thus completion = x / y x 100%

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                if ($debug) {

                    echo $this->userCompletionVideo($userid, $row['id']) . 'is completion for video ' . $row['id'] . '<br><br>';
        
                }

                if ($this->userCompletionVideo($userid, $row['id']) == 100) {

                    $x++;

                }

                $y++;

            }

            $completion = (intval($x) / intval($y)) * 100;

            return ['numerator' => $x, 'denominator' => $y, 'completion' => $completion];

        } else {

            return false;

            if ($debug) {

                echo 'no videos';
            }
        }

    }

    public function userCompletionVideo($userid, $videoid, $debug = false)
    {

        //get all chapters for selected video

        $q = "SELECT b.`id`
        FROM `video` as a
        INNER JOIN `chapter` as b ON a.`id` = b.`video_id`
        WHERE a.`id` = $videoid ORDER BY b.`number` ASC";

        if ($debug) {

            echo $q . '<br><br>';

        }

        $x = 0; // completed counter
        $y = 0; // chapter total counter

        //thus completion = x / y x 100%

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                if ($this->checkChapterUser($userid, $row['id']) === true) {

                    $x++;

                }

                $y++;

            }

            $completion = (intval($x) / intval($y)) * 100;

            return $completion;

        } else {

            return false;

            if ($debug) {

                echo 'Video has no chapters';
            }
        }

    }

    public function getAllAssets(){


        $q = "SELECT `id` FROM `assets_paid` ORDER BY `id` DESC";

$x=0;
$returnArray = [];
$result = $this->connection->RunQuery($q);

$nRows = $result->rowCount();


if ($nRows > 0) {

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $returnArray[$x] = $row['id'];
        $x++;

    }

    return $returnArray;

}else{

    return FALSE;
}




    }


    public function userCompletionAsset($userid, $assetid, $debug = false)
    {

        //get all chapters for selected video

        $q = "SELECT b.`id`
        FROM `video` as a
        INNER JOIN `chapter` as b ON a.`id` = b.`video_id`
        WHERE a.`id` IN (Select a.`video_id`
            FROM `sub_asset_paid` as a
            WHERE (a.`asset_id` = '$assetid') 
            AND (a.`video_id` IS NOT NULL))
        ORDER BY b.`number` ASC";

        if ($debug) {

            echo $q . '<br><br>';

        }

        $x = 0; // completed counter
        $y = 0; // chapter total counter

        //thus completion = x / y x 100%

        //$rowReturn = [];

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                if ($this->checkChapterUser($userid, $row['id']) === true) {

                    $x++;

                }

                $y++;

            }

            $completion = (intval($x) / intval($y)) * 100;

            return $completion;

        } else {

            return false;

            if ($debug) {

                echo 'Video has no chapters';
            }
        }

    }

    public function setSQLTimezoneUTC(){

        $q = "SET @@session.time_zone='+00:00'";

        $result = $this->connection->RunQuery($q);

    }

    public function getLastViewedVideosCompletion($userid, $debug=false)
    {

        $q = "SELECT `video_id` FROM `usersViewsVideo`
            WHERE `user_id` = '$userid'
            ORDER BY `recentView` DESC";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['video_id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            $uncompletedLastThree = array();

            foreach ($rowReturn as $key=>$value){

                //check if this video was completed

                

                if ($debug){

                    echo $this->userCompletionVideo($userid, $value, false);
        
                }

                if ($this->userCompletionVideo($userid, $value, false) > 0 && $this->userCompletionVideo($userid, $value, false) < 100){

                
                    $uncompletedLastThree[$y] = $value;
                    $y++;


                }

                if ($y > 2){
                    
                    return $uncompletedLastThree;


                }


            }

            return $uncompletedLastThree;




        } else {


            if ($debug){

                echo 'no videos matched';

            }

            return false;

            
        }

    }

    public function getTopAssets($debug=false)
    {

        $q = "SELECT `asset_id` FROM `topAssets`
            WHERE `active` = 1
            ORDER BY CAST(`order` AS unsigned) ASC
            LIMIT 20";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['asset_id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            //now rowReturn is an array of 10 newest videos



            //check access

            //make 3

            //return

            

            return $rowReturn;


        } else {


            if ($debug){

                echo 'no assets matched';

            }

            return false;

            
        }

    }

    public function getTopVideos($debug=false)
    {

        $q = "SELECT `video_id` FROM `topVideos`
            WHERE `active` = 1
            ORDER BY CAST(`order` AS unsigned) ASC
            LIMIT 20";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['video_id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            //now rowReturn is an array of 10 newest videos



            //check access

            //make 3

            //return

            

            return $rowReturn;


        } else {


            if ($debug){

                echo 'no videos matched';

            }

            return false;

            
        }

    }

    public function getNewVideos($debug=false)
    {

        $q = "SELECT `id` FROM `video`
            WHERE `active` = 1 OR `active` = 3
            ORDER BY `created` DESC
            LIMIT 20";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            //now rowReturn is an array of 10 newest videos



            //check access

            //make 3

            //return

            

            return $rowReturn;


        } else {


            if ($debug){

                echo 'no videos matched';

            }

            return false;

            
        }

    }

    public function getAllVideosWatchedUser ($userid, $debug=false){


        $q = "SELECT `video_id` FROM `usersViewsVideo`
            WHERE `user_id` = '$userid'
            ORDER BY `recentView` DESC";

    if ($debug){

        echo $q;

    }

    $result = $this->connection->RunQuery($q);

    $x = 0;
    $y=0;
    $rowReturn = array();
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $rowReturn[$x] = $row['video_id'];
            $x++;

        }

        if ($debug){

            print_r($rowReturn);

        }

        //now rowReturn is an array of 10 newest videos



        //check access

        //make 3

        //return

        

        return $rowReturn;


    } else {


        if ($debug){

            echo 'no videos matched';

        }

        return false;

        
    }



    }

    public function getSuggestedVideos($debug=false)
    {

        $q = "SELECT `id` FROM `video`
            WHERE `active` = 1 OR `active` = 3
            ORDER BY `created` DESC
            LIMIT 20";

        if ($debug){

            echo $q;

        }

        $result = $this->connection->RunQuery($q);

        $x = 0;
        $y=0;
        $rowReturn = array();
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['id'];
                $x++;

            }

            if ($debug){

                print_r($rowReturn);
    
            }

            //now rowReturn is an array of 10 newest videos



            //check access

            //make 3

            //return

            

            return $rowReturn;


        } else {


            if ($debug){

                echo 'no videos matched';

            }

            return false;

            
        }

    }

    public function getKeyUserViewsVideoMatch($userid, $video_id){
        
        $q="Select `id` from `usersViewsVideo` where `user_id` = '$userid' and `video_id` = '$video_id'";
        //echo $q;


        $result = $this->connection->RunQuery($q);
        
		$nRows = $result->rowCount();
			if ($nRows == 1){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = $row['id'];
                    //$x++;
    
                }

                return $rowReturn;
			}else{
				return FALSE;
			}
    }

    public function getKeyUserViewsChapterVideoMatch($userid, $chapter_id){
        
        $q="Select `id` from `usersVideoChapterProgress` where `user_id` = '$userid' and `chapter_id` = '$chapter_id'";
        //echo $q;


        $result = $this->connection->RunQuery($q);
        
		$nRows = $result->rowCount();
			if ($nRows == 1){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = $row['id'];
                    //$x++;
    
                }

                return $rowReturn;
			}else{
				return FALSE;
			}
    }

    public function getMostRecentPosition ($video_id, $userid, $debug=false){

        //returns most recent chapter use for video

        $q="Select `chapter_id` from `usersVideoChapterProgress` AS a
        INNER JOIN `chapter` as b on a.`chapter_id` = b.`id`
        where a.`user_id` = '$userid' and b.`video_id` = '$video_id'
        ORDER BY `recentView` DESC
        LIMIT 1";
        
        if ($debug){

            echo $q;


        }


        $result = $this->connection->RunQuery($q);
        
		$nRows = $result->rowCount();
			if ($nRows == 1){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn = $row['chapter_id'];
                    //$x++;
    
                }

                return $rowReturn;
			}else{
				return FALSE;
			}
    }

    function getPopularVideos ($debug = false){


            $q = "SELECT `video_id`, count(*)
            FROM `usersViewsVideo` 
            GROUP BY `video_id`
            ORDER BY count(*) DESC 
            LIMIT 10";
    
            $result = $this->connection->RunQuery($q);

            $count = array();
            $x = 0;
    
            if ($result){
           
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
               
                    $count[$x] = $row['video_id'];
                    $x++;
            
                }
           
                return $count;
            
        }else{
    
                return false;
            }
    
    
    
    



    }


    

    /**
     * Close mysql connection
     */
    public function endusersMetricsManager()
    {
        $this->connection->CloseMysql();
    }

}
