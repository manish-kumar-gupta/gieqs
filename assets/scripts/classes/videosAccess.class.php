<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 1-06-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */

//error_reporting(E_ALL);

Class videosAccess {

	
	private $connection;

	public function __construct(){
        require_once 'DataBaseMyssqlPDOLearning.class.php';
		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * get a select2 box
     *
     */

    public function select2_video_match($search)
    {
    
    $q = "Select 
    `id`, `name`
    FROM `video`
    WHERE `id` = '$search'";

    $result = $this->connection->RunQuery($q);
    $rowReturn = array();
    $x = 0;
    $nRows = $result->rowCount();
    if ($nRows > 0) {

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

          
              //note here returning an option only
            $rowReturn = array('id' => $row['id'], 'text' => $row['name']);
            //print_r($row);
        }
    
        return json_encode($rowReturn);

    } else {
        

        //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
        $rowReturn['result'] = [];
        
        return json_encode($rowReturn);
    }

}

public function select2_video_programme($search)
      {
      
      $q = "Select 
      CONCAT(`id`, ' ', `name`) as `video`
      FROM `video`
      WHERE lower(CONCAT(`id`, ' ', `name`)) LIKE lower('%{$search}%')";

      //echo $q;

      $result = $this->connection->RunQuery($q);
      $rowReturn = array();
      $x = 0;
      $nRows = $result->rowCount();
      if ($nRows > 0) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $rowReturn[] = array('id' => $row['id'], 'text' => $row['video']);
              //print_r($row);
          }
      
          return json_encode($rowReturn);

      } else {
          

          //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
          $rowReturn['result'] = [];
          
          return json_encode($rowReturn);
      }

  }

public function sanitiseGET ($data) {

    $dataSanitised = array();

    foreach ($data as $key=>$value){

        $sanitisedValue = trim($value);
        //$sanitisedValue = addslashes($sanitisedValue);
        //$sanitisedValue = htmlspecialchars($sanitisedValue);
        //consider htmlentitydecode here, this converts back so &amp to &, special chars & to &amp 
        $dataSanitised[$key] = $sanitisedValue;

    }


    return $dataSanitised;


}
	
    /**
     * Close mysql connection
     */
	public function endvideosAccess(){
		$this->connection->CloseMysql();
	}

}