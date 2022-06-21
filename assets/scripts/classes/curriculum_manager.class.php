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

//echo $q . '<br><br>';



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
	

     


    /**
     * Close mysql connection
     */
	public function endcurriculum_manager(){
		$this->connection->CloseMysql();
	}

}