<?php

require_once 'DataBaseMysql.class.php';



//spl_autoload_unregister ('class_loader');
		
		//require('/Applications/XAMPP/xamppfiles/htdocs/dashboard/learning/scripts/autoload.php');
		//use Vimeo\Vimeo;

class navigator {


	public $connection;

	public function __construct (){
		$this->connection = new DataBaseMysql();
	}

	//!Sanitise form input and other important functions

	//array version
	public function generateNavigation($categories){

		//echo 'hello';

		//get the tags from the required categories
		$query_where = "";
		$howManyCategories = count($categories);

		$x=1;

		foreach ($categories as $key=>$value){

			$query_where .= "e.`id` = '$value'";
			
			if ($x < $howManyCategories){
			$query_where .= " OR ";
			}

			$x++;

		}

		//echo $query_where;


		$q = "SELECT a.`id`, a.`split`, b.`id` as `chapterid`, b.`timeFrom`, b.`timeTo`, b.`number`, b.`name` AS `chaptername`, b.`description`, d.`id` as `tagid`, d.`tagName` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` WHERE $query_where GROUP BY d.`tagName` ORDER BY d.`tagName` ASC ";

		$result = $this->connection->RunQuery($q);

		//echo $q;

		$tags = [];

		if ($result){


			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				//echo '<a href="' . $roothttp . '/scripts/display/colontutor/video.php?id=' . $row['tagid'] . '">' . $row['tagName'] . '</a>';

				$tags[] = ['id' => $row['tagid'], 'name' => $row['tagName']];


			}

			


		}

		//print_r($tags);

	}

	//single number tag version

	public function generateNavigationSingle($categories){

		

		//get the tags from the required categories
		


		$q = "SELECT a.`id`, a.`split`, b.`id` as `chapterid`, b.`timeFrom`, b.`timeTo`, b.`number`, b.`name` AS `chaptername`, b.`description`, d.`id` as `tagid`, d.`tagName` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` WHERE e.`id` = '$categories' AND a.`id` IS NOT NULL GROUP BY d.`tagName` ORDER BY d.`tagName` ASC ";

		$result = $this->connection->RunQuery($q);

		//echo $q;

		$tags = [];

		if ($result){


			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				//echo '<a href="' . $roothttp . '/scripts/display/colontutor/video.php?id=' . $row['tagid'] . '">' . $row['tagName'] . '</a>';

				$tags[] = ['id' => $row['tagid'], 'name' => $row['tagName']];


			}

			


		}

		return $tags;

	}

	public function generateNavigationSingleDisabledQuery($categories, $tagsRequired, $debug){

		

		//get the tags from the required categories
		if ($tagsRequired){
			
			$howManyCategories = count($tagsRequired);
	
			$x=1;

			$query_where .= 'WHERE ';
	
			foreach ($tagsRequired as $key=>$value){
	
				$query_where .= "(e.`id` = '$categories' AND d.`id` = '$value')";
				
				if ($x < $howManyCategories){
				$query_where .= " OR ";
				}
	
				$x++;
	
			}

			//$query_where .= ')';
	
			//echo query_where;;
		}else{

			$query_where = null;

		}

		$q = "SELECT a.`id` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` $query_where";

		$result = $this->connection->RunQuery($q);
	
		if ($debug){
			echo $q;
		}

		$tags = [];

		if ($result){


			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				//echo '<a href="' . $roothttp . '/scripts/display/colontutor/video.php?id=' . $row['tagid'] . '">' . $row['tagName'] . '</a>';

				$tags[] = ['id' => $row['id']];


			}

			


		}

		

		return $tags; //this gives videos matching the requested tags 
		//but we want other tags in the remaining videos

	}

	public function getVideoTagsBasedOnVideosShown($videos1, $debug){

		/* $videos1 = [];

		$x=0;

		foreach ($videos as $key=>$value){

			$videos1[$x] = $value['id'];
			$x++;

			//get all tags associated with this video


		} */

		//print_r($videos1);

		$query_where = "";
			$howManyCategories = count($videos1);
	
			$x=1;
	
			foreach ($videos1 as $key=>$value){
	
				$query_where .= "a.`id` = '$value'";
				
				if ($x < $howManyCategories){
				$query_where .= " OR ";
				}
	
				$x++;
	
			}
	
			//echo $query_where;

		$q = "SELECT d.`id` as `tagid`, d.`tagName` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` WHERE ($query_where) GROUP BY d.`id` ORDER BY d.`tagName` ASC ";

		$result = $this->connection->RunQuery($q);
			if ($debug){
				echo $q;
			}

		$tags = [];

		if ($result){


			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				//echo '<a href="' . $roothttp . '/scripts/display/colontutor/video.php?id=' . $row['tagid'] . '">' . $row['tagName'] . '</a>';

				$tags[] = ['id' => $row['tagid'], 'name' => $row['tagName']];


			}

			


		}

		return $tags;


		

	}

	public function getVideoData($categories, $tagsRequired, $debug){

		

		//get the tags from the required categories
		if ($tagsRequired){
			
			$howManyCategories = count($tagsRequired);
	
			$x=1;

			$query_where .= 'WHERE ';
	
			foreach ($tagsRequired as $key=>$value){
	
				$query_where .= "(e.`id` = '$categories' AND d.`id` = '$value')";
				
				if ($x < $howManyCategories){
				$query_where .= " OR ";
				}
	
				$x++;
	
			}

			//$query_where .= ')';
	
			//echo query_where;;
		}else{

			$query_where = null;

		}

		$q = "SELECT DISTINCT a.* FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` $query_where";

		$result = $this->connection->RunQuery($q);
	
		if ($debug){
			echo $q;
		}

		$tags = [];

		if ($result){


			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				//echo '<a href="' . $roothttp . '/scripts/display/colontutor/video.php?id=' . $row['tagid'] . '">' . $row['tagName'] . '</a>';

				$tags[] = $row;


			}

			


		}

		

		return $tags; //this gives videos matching the requested tags 
		//but we want other tags in the remaining videos

	}

	
	
	public function endNavigator (){

		$this->connection->CloseMysql();


	}
	

}



?>