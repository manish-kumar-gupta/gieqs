<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 7-06-2021
 *
 * DJT 2019
 *
 * License: LGPL
 *
 * 
 */


if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
    session_start(); //do this
  }
  
  if ($_SESSION){
  
  if ($_SESSION['debug'] == true){
  
  error_reporting(E_ALL);
  
  }else{
  
  error_reporting(0);
  
  }
  }

  

Class coin {

	
	private $connection;

    public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
            $this->connection = new DataBaseMysqlPDOLearning();
    }  
    
    
    public function allocate_coin($amount, $userid, $debug=false){




    }

    public function spend_coin($amount, $userid, $debug=false){



    }

    public function current_balance($userid, $debug=false){

          $q = "Select a.`amount`
            FROM `coin_grant` as a
            WHERE a.`user_id` = '$userid'
            ";

            if ($debug){

            echo $q . '<br><br>';

            }



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					      $x = $x + intval($row['amount']);


			    	    }

				        return $x;

            } else {
                

                return 0;
            }

    }

    public function calculate_member_length($amount, $userid, $debug=false){



    }

    



    /**
     * 
     * 
     * 
     * needs to includee user functions
     */
    
     /**Function spend(0

Function refund(-

Function allocate (number, user_id)

Spider
Allocate_coins_loyalty
6 months member

Function ca;culateMemberLength 
Get all with pro
Calculate length since started
Calculate across all pro subscriptions
Write user activity allocateCoins6months

Get average of cost for assets
 */
    
    
    /**
     * Close mysql connection
     */
	public function endcoin(){
		$this->connection->CloseMysql();
	}

}