<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 1-12-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */

if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
  session_start(); //do this
}

if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);

}



//require_once 'DataBaseMysqlPDO.class.php';

Class emailLink {


	private $connection;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
            $this->connection = new DataBaseMysqlPDOLearning();
    
           
    
            //$this->connection = new DataBaseMysqlPDO();
        }

    public function getEmailContents($email_id, $debug=false){

       
            

            $q = "Select b.`id`, b.`text`, b.`img`, b.`video`
            FROM `emails` as a
            INNER JOIN `emailContent` as b ON a.`id` = b.`email_id`
            WHERE a.`id` = '$email_id'
            ORDER BY CAST(b.`display_order` AS SIGNED) ASC
            ";

            if ($debug){

            
            echo $q . '<br><br>';


            }


            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row;


				}

				return $rowReturn;

            } else {
                

                return false;
            }

        


    }

    public function getNextDisplayOrder($email_id, $debug=false){

       
            

        $q = "Select b.`display_order`
        FROM `emails` as a
        INNER JOIN `emailContent` as b ON a.`id` = b.`email_id`
        WHERE a.`id` = '$email_id'
        ORDER BY CAST(b.`display_order` AS SIGNED) DESC
        LIMIT 1
        ";

        if ($debug){

        
        echo $q . '<br><br>';


        }


        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows == 1) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $latest = $row['display_order'];


            }

            return intval($latest) + 1;

        } else {
            

            return false;
        }

    


}

    
    /**
     * Close mysql connection
     */
	public function endemailLink(){
		$this->connection->CloseMysql();
	}

}