<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 1-06-2020
 *
 * DJT 2022
 *
 * License: LGPL
 *
 */



if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}

//error_reporting(E_ALL);

//require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');


Class institutional_manager {

	
    private $connection;
    private $sessionView;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
        $this->connection = new DataBaseMysqlPDOLearning();

       


            require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
            $this->sessionView = new sessionView();
            require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');
            $this->programmeView = new programmeView;
           


       

	}

    /**
     * get a select2 box
     *
     */

    

    public function Load_records_limit_json_datatables($y, $x = 0, $tokenid, $institution_id)
            {
            $q = "SELECT `id` FROM `subscriptions` WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=" . $tokenid . "%' AND `gateway_transactionId` LIKE '%INSTITUTIONAL_ID=" . $institution_id . "%')";
            //echo $q;
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['data'][] = array_map('utf8_encode', $row);
                }
            
                return $rowReturn;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return $rowReturn;
            }

        }


    public function getUsersToken($tokenid, $debug=false){

        $q = "SELECT * FROM `subscriptions` WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=$tokenid%') GROUP BY `user_id` ORDER BY `start_date` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[] = $row['user_id'];
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn['data'] = [];
            
            return $rowReturn;
        }


    }






    
    

  

    

        





	
    /**
     * Close mysql connection
     */
	public function endinstitutional_manager (){
		$this->connection->CloseMysql();
	}

}