<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 12-09-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class video_moderation {

	

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOLearning();
	}

	public function getModerationTable()
	{
	$q = "Select * from `video`";
	$result = $this->connection->RunQuery($q);
	$rowReturn = array();
	$x = 0;
	$nRows = $result->rowCount();
	if ($nRows > 0) {

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

			//print_r(array_map('utf8_encode', $row));
			//$rowReturn['data'][] = array_map('utf8_encode', $row);

			$rowReturn['data'][] = [

				'id' => $row['id'],
				'name' => $row['name'],
				'supercategory' => $this->getVideoSuperCategory($row['id']),
				'active' => $row['active'],
				'author' => $row['author'],
				'editor' => $row['editor'],
				'tagger' => $row['tagger'],
				'recorder' => $row['recorder'],


			];

			

			$x++;
		}
	
		return json_encode($rowReturn);

	} else {
		

		//RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
		$rowReturn['data'] = [];
		
		return json_encode($rowReturn);
	}

}

    
     

	public function getVideoSuperCategory($videoid){

		$q = "SELECT e.`superCategory`, d.`tagName` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` WHERE a.`id` = '$videoid' GROUP BY e.`id` ORDER BY d.`tagName` ASC";


			$rowReturn = [];

			$result = $this->connection->RunQuery($q);
			
			$x = 0;
			$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row['superCategory'];


				}

				$values = array_count_values($rowReturn);
				arsort($values);
				$popular = array_slice(array_keys($values), 0, 1, true);
				return $popular[0];

			} else {
				

				return false;
			}



	}

	public function videoHasOpenTaggerInvite($videoid){

		$q = "SELECT * from `usersTagging` WHERE (`video_id` = '$videoid') AND (`invite_tag` IS NOT NULL) AND (`decline_tag` IS NOT NULL) AND (`done_tag` IS NOT NULL)";

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				return true;


			

			} else {
				

				return false;
			}

	}
/**
    
     * Close mysql connection
     */
	public function endvideo_moderation(){
		$this->connection->CloseMysql();
	}

}