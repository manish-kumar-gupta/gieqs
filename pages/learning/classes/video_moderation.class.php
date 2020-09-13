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
	$q = "Select * from `video` WHERE `active` = '2'";
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

	public function videoHasOpenTaggerInvite($videoid, $debug){

		$q = "SELECT `user_id` from `usersTagging` WHERE (`video_id` = '$videoid') AND (`invite_tag` IS NOT NULL) AND (`decline_tag` IS NULL AND `done_tag` IS NULL) ORDER BY `invite_tag` DESC";

		if ($debug){

			echo $q;
		}
		$result = $this->connection->RunQuery($q);

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['user_id'];


				}

				return $rowReturn; //single value expected
			

			} else {
				
				//echo 'false';
				return false;
			}

	}

	public function videoHasOpenTaggerInviteReturnKey($videoid, $debug){

		$q = "SELECT `id` from `usersTagging` WHERE (`video_id` = '$videoid') AND (`invite_tag` IS NOT NULL) AND (`decline_tag` IS NULL AND `done_tag` IS NULL) ORDER BY `invite_tag` DESC";

		if ($debug){

			echo $q;
		}
		$result = $this->connection->RunQuery($q);

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['id'];


				}

				return $rowReturn; //single value expected
			

			} else {
				
				//echo 'false';
				return false;
			}

	}

	public function getTagLockedUser($videoid, $debug){

		$q = "SELECT `user_id` from `usersTagging` WHERE (`video_id` = '$videoid') AND (`invite_tag` IS NOT NULL) AND (`decline_tag` IS NULL AND `done_tag` IS NULL) ORDER BY `invite_tag` DESC LIMIT 1";

		if ($debug){

			echo $q;
		}
		$result = $this->connection->RunQuery($q);

		$rowReturn = [];

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row['user_id'];


				}

			
				return $rowReturn;

			} else {
				
				//echo 'false';
				return false;
			}


	}

	public function getActionsLast5($videoid, $debug){

		$q = "SELECT `user_id`, `inviting_user`, `invite_tag`, `accept_tag`, `review_tag`, `done_tag`, `decline_tag` from `usersTagging` WHERE (`video_id` = '$videoid') ORDER BY `invite_tag` DESC LIMIT 5";

		if ($debug){

			echo $q;
		}
		$result = $this->connection->RunQuery($q);

		$rowReturn = [];

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					

					//$dateArray = [$row['invite_tag'], $row['accept_tag'], $row['review_tag'], $row['done_tag'], $row['decline_tag']];
					//purge null

					//else use Europe/Brussels
					
					//date of action

					//=latest of 4 dates

					//action

					//column head of the 
					$action = null;
					$date = null;
					$expires = null;

					if ($row['decline_tag'] != null){

						$action = 'Tagging declined';
						$date = $row['decline_tag'];
						$expires = null;

					}else if ($row['done_tag'] != null){

						$action = 'Tagging done';
						$date = $row['done_tag'];
						$expires = null;

					}else if ($row['review_tag'] != null){

						$action = 'Tagging sent for Review';
						$date = $row['review_tag'];
						$expires = true;
					
					}else if ($row['accept_tag'] != null){

						$action = 'Accepted Tagging';
						$date = $row['accept_tag'];
						$expires = null;

					}elseif ($row['invite_tag'] != null){

						$action = 'Invitation';
						$date = $row['invite_tag'];

						//get user timezone
						
						$expires = true;


					

					}


					$rowReturn[] = [
						
						'date' => $date,
						'user' => $row['user_id'],
						'inviting_user' => $row['inviting_user'],
						'action' => $action,
						'expires' => $expires,
						'review' => $row['review_tag'],
						
						
						
					];


				}

			
				return $rowReturn;

			} else {
				
				//echo 'false';
				return false;
			}


	}

	public function checkModerationKeyExists($key){

        $q = "SELECT `id` FROM `usersTagging` WHERE `id` = '$key'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                return TRUE;
			}else{
				return FALSE;
			}


	}

	public function getMailImage($videoid){

        $q = "SELECT `thumbnail` FROM `video` WHERE `id` = '$videoid'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['thumbnail'];


				}

				return $rowReturn;

			
				
			}else{
				return FALSE;
			}


	}
/**
    
     * Close mysql connection
     */
	public function endvideo_moderation(){
		$this->connection->CloseMysql();
	}

}