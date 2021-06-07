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

  

Class coin_link {

	
	private $connection;

    public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
            $this->connection = new DataBaseMysqlPDOLearning();
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
	public function endcoin_link(){
		$this->connection->CloseMysql();
	}

}