<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 21-06-2022
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
            session_start(); //do this
          }
          
          if ($_SESSION){
          
          if ($_SESSION['debug'] == true){
          
          error_reporting(E_ALL);
          
          }else{
          
          error_reporting(0);
          
          }
          }


Class curriculum_manager {

	
	private $connection;

	public function __construct(){
            require_once 'DatabaseMyssqlPDOLearning.class.php';

		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */

     public function getsectionscurriculum($id, $debug=false){



            $q = "SELECT `id`, CAST(`section_order` AS UNSIGNED), `long_name` FROM `curriculum_sections` WHERE `curriculum_id` ='$id' ORDER BY `section_order` ASC";
        
        //echo $q . '<br><br>';
        
        
        
        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();
        $rowReturn = [];

        if ($nRows > 0) {
        
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $rowReturn[$x] = $row['id'];
                $x++;
        
        
            }
        
        
            return $rowReturn;
        
        } else {
            
        
            if ($debug){
        
                echo 'no programmes contained within this asset';
            }
        
            return false;
        
            
        }
        
        
        
        
        



     }
     
     
     public function getitemssection($id, $debug=false){



            $q = "SELECT `id`, `section_id`, CAST(`item_order` AS UNSIGNED), `type`, `link_to_content`, `image_url`, `statement`, `evidence_level` FROM `curriculum_items` WHERE `section_id` = '$id'  ORDER BY `item_order` ASC";
        
        //echo $q . '<br><br>';
        
        
        
        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();
        $rowReturn = [];

        if ($nRows > 0) {
        
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $rowReturn[$x] = $row['id'];
                $x++;
        
        
            }
        
        
            return $rowReturn;
        
        } else {
            
        
            if ($debug){
        
                echo 'no programmes contained within this asset';
            }
        
            return false;
        
            
        }
        
        
        
        
        



     }

     public function getreferencescurriculumitem($id, $debug=false){



        $q = "SELECT `reference_id` FROM `curriculum_references` WHERE `curriculum_item_id` = '$id'";
    
    //echo $q . '<br><br>';
    
    
    
    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['reference_id'];
            $x++;
    
    
        }
    
    
        return $rowReturn;
    
    } 
    
    
    
    
    



 }

 public function getreferences($reference_id_array, $debug=false){


    $final_array = [];
    $x = 0;


    foreach ($reference_id_array as $key=>$value){

        $q = "SELECT `id`, `PMID`, `DOI`, `formatted`, `authors`, `journal` FROM `references` WHERE `id` = '$value'";


        $result = $this->connection->RunQuery($q);

        $nRows = $result->rowCount();
        $rowReturn = [];

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $final_array[$x] = $row['id'];
                $x++;


            }



        } 

    }

    return $final_array;
















}


public function gettagscurriculumitem($id, $debug=false){



    $q = "SELECT `tag_id` FROM `curriculum_tags` WHERE `curriculum_item_id` = '$id'";

    if ($debug){
echo $q . '<br><br>';

    }



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();
$rowReturn = [];

if ($nRows > 0) {

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        $rowReturn[$x] = $row['tag_id'];
        $x++;


    }


    return $rowReturn;

} 








}


public function counttagscurriculumitem($id, $debug=false){



    $q = "SELECT `tag_id` FROM `curriculum_tags` WHERE `curriculum_item_id` = '$id'";

    if ($debug){
echo $q . '<br><br>';

    }



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();

return $nRows;








}

public function countBestPracticeVideos($id, $debug=false){


    $q = "SELECT `video_id` FROM `curriculum_demonstrations` WHERE `curriculum_item_id` = '$id'";

    if ($debug){
echo $q . '<br><br>';

    }



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();

return $nRows;

}

public function getVideoCurriculum($curriculum_item_id, $debug=false) {


    $q = "SELECT `video_id` FROM `curriculum_demonstrations` WHERE `curriculum_item_id` = '$curriculum_item_id'";


    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $video_id = $row['video_id'];


        }


        return $video_id;

    }else{

        return false;
    }

    


}

public function getChapterCurriculum($curriculum_item_id, $debug=false) {


    $q = "SELECT `chapter_id` FROM `curriculum_demonstrations` WHERE `curriculum_item_id` = '$curriculum_item_id'";


    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $chapter_id = $row['chapter_id'];


        }


        return $chapter_id;

    }else{

        return false;
    }

    


}

public function getChapterNumberCurriculum($chapterid, $debug=false) {


    $q = "SELECT `number` FROM `chapter` WHERE `id` = '$chapterid'";


    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $chapter_number = $row['number'];


        }


        return $chapter_number;

    }else{

        return false;
    }

    


}

public function gettags($tag_id_array, $debug=false){


$final_array = [];
$x = 0;


foreach ($tag_id_array as $key=>$value){

    $q = "SELECT `id`, `curriculum_item_id`, `tag_id`, `created`, `updated` FROM `curriculum_tags` WHERE `id` = '$value'";


    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $final_array[$x] = $row['id'];
            $x++;


        }



    } 

}

return $final_array;
















}

public function getFullReferenceListCurriculumItem ($curriculum_item_id){

    //this for imageset then another for video, merge same and return

    $q = "SELECT a.`id` as curriculumitemid, c.`authors`, c.`formatted`, c.`DOI`, c.`journal`, c.`PMID` 
    from `curriculum_items` as a 
    INNER JOIN `curriculum_references` as b on a.`id` = b.`curriculum_item_id` 
    INNER JOIN `references` as c on c.`id` = b.`reference_id`
    
    WHERE a.`id` = $curriculum_item_id
    
    ORDER BY c.`formatted` ASC";

    //echo $q;

    $references = '';
    $x = 1;
    $result = $this->connection->RunQuery($q);
    $nRows = $result->rowCount();


    if ($nRows > 0){

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $PMID = $row['PMID'];
            
            $references .= '<p class="referencelist cursor-pointer" style="font-size:1.0rem !important;" data="' . $PMID . '" style="text-align:left;" >' . $x . ' - ';
            
            $authors = explode( ',', $row['authors'] );
            $n = count($authors);
            $references .= $authors[0] . ', ' . $authors[1] . ', ' . $authors[$n-1];
            $references .= '. ';
            $references .= '<strong>' . $row['formatted'] . '</strong>';
            $references .= ' ';
            $references .= $row['journal'];
            $references .= ' ';
            if ($row['DOI'] <> ''){

                $references .= $row['DOI'];
                $references .= '.';
            }
            $references .= '</p>';
            
            
            $x++;
        }

        echo $references;
    }else{

        echo '<p style="text-align:left; font-size:1.0 !important;">No references yet</p>';
    }

    




}

public function countReferences ($curriculum_item_id){

    //this for imageset then another for video, merge same and return

    $q = "SELECT a.`id` as curriculumitemid, c.`authors`, c.`formatted`, c.`DOI`, c.`journal`, c.`PMID` 
    from `curriculum_items` as a 
    INNER JOIN `curriculum_references` as b on a.`id` = b.`curriculum_item_id` 
    INNER JOIN `references` as c on c.`id` = b.`reference_id`
    
    WHERE a.`id` = $curriculum_item_id
    
    ORDER BY c.`formatted` ASC";

    //echo $q;

    $references = '';
    $x = 1;
    $result = $this->connection->RunQuery($q);
    $nRows = $result->rowCount();

    return $nRows;


    

    




}

public function section_viewed_last_day ($curriculum_section_id, $user_id, $debug=false){


    //define current datetime

    $utcTimezone = new DateTimeZone('UTC');
    $currentDate = new DateTime('now', $utcTimezone);
    $currentDate->modify("-1 day");
    $sqlDate = $currentDate->format('Y-m-d H:i:s');

    //sql format

    $q = "SELECT `id`, `recentView` FROM `usersViewsCurriculumStatement` WHERE `curriculum_section_id` = '$curriculum_section_id' AND `user_id` = '$user_id' AND `recentView` > '$sqlDate'";
    if ($debug){
        echo $q;
    }

    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        return TRUE; // was a view within last day

    }else{

        return false;  // no view within last day
    }


}

public function recordRecentCurriculumView ($section_array, $user_id, $debug=false) {

    $utcTimezone = new DateTimeZone('UTC');
    $currentDate = new DateTime('now', $utcTimezone);
    $sqlDate = $currentDate->format('Y-m-d H:i:s');

    //var_dump($section_array);

    foreach ($section_array as $key => $value){

        //echo 'in loop';

        if (!($this->section_viewed_last_day($value, $user_id, $debug))){ //no view within last day

            
            $q = "INSERT INTO `usersViewsCurriculumStatement`(`user_id`, `curriculum_section_id`, `recentView`) VALUES ('$user_id','$value','$sqlDate')";
            echo $q;

            $result2 = $this->connection->RunQuery($q);


        }else{

            //echo 'wrong';
            //no view to record
        }



    }



}

     


    /**
     * Close mysql connection
     */
	public function endcurriculum_manager(){
		$this->connection->CloseMysql();
	}

}