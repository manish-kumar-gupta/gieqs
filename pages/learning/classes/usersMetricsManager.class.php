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

session_start();
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

    public function getLastViewedVideoPage($userid, $page_id)
    {

    }

    public function checkChapterUser($userid, $chapter_id)
    {

        //has user viewed this chapter before

        $q = "SELECT `id` FROM `usersVideoChapterProgress`
            WHERE `user_id` = '$userid' AND chapter_id = '$chapter_id'";

        if ($debug) {

            echo $q . '<br><br>';

        }

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

                    $y++;

                }

                $x++;

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

    public function getLastViewedVideosCompletion($userid)
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

    /**
     * Close mysql connection
     */
    public function endusersMetricsManager()
    {
        $this->connection->CloseMysql();
    }

}
