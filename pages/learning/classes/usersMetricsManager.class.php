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
if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}


require_once 'DataBaseMysqlPDO.class.php';

Class usersMetricsManager {

	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOLearning();
    }


    //views
    
    public function getLastViewedVideo ($userid, $debug=false){

      
            

			$q = "SELECT `video_id` FROM `usersViewsVideo` 
            WHERE `user_id` = '$userid'
            ORDER BY `id` DESC 
            LIMIT 1";

            if ($debug){

            echo $q . '<br><br>';


            }



			//$rowReturn = [];

            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['video_id'];


                }
                
                return $rowReturn;


            } else {
                

                return false;
            }

		



    }

    public function getLastViewedVideoAsset ($userid, $asset_array, $debug=false){

        //uses assetManager returnVideosAsset to provide the array

        if ($debug){

            echo PHP_EOL;
            echo 'asset array was';
            print_r($asset_array);
        }

        $detected = false;

        foreach ($asset_array as $key=>$value){

            $video = null;
            $video = $this->getLastViewedVideo($userid);

            if ($value == $video){

                $detected = $video;

            }

        }

        return $detected;

    }

    public function getLastViewedVideoPage ($userid, $page_id){


        
    }

    

    /**
     * Close mysql connection
     */
	public function endusersMetricsManager(){
		$this->connection->CloseMysql();
	}

}