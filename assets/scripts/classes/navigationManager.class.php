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

if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
    session_start(); //do this
}

if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}

//require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');


Class navigationManager {

	
    private $connection;
    private $sessionView;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
        $this->connection = new DataBaseMysqlPDOLearning();

       


            /* require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
            $this->sessionView = new sessionView();
            require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');
            $this->programmeView = new programmeView;
 */

       

	}

    /**
     * get a select2 box
     *
     */

    
    public function getActiveMenus($debug=false){

        $q = "Select 
        a.`id`
        FROM `menu` as a
        WHERE `active` = '1'
        ORDER BY `order` ASC";
    
    //echo $q . '<br><br>';
    
    
    
    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    
    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['id'];
            $x++;
    
    
        }
    
        if ($debug){
    
            print_r($rowReturn);
        }
    
        return $rowReturn;
    
    } else {
        
    
        if ($debug){
    
            echo 'no menus available';
        }
    
        return false;
    
        
    }
    
    }

    public function getActiveNavigations($menu_id, $debug=false){

        $q = "Select 
        a.`id`
        FROM `navigation` as a
        WHERE `menu_id` = '$menu_id' AND `active` = '1'
        ORDER BY `order` ASC";
    
        if ($debug){

            echo $q . '<br><br>';


        }
    
    
    
    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    
    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['id'];
            $x++;
    
    
        }
    
        if ($debug){
    
            print_r($rowReturn);
        }
    
        return $rowReturn;
    
    } else {
        
    
        if ($debug){
    
            echo 'no navigations available';
        }
    
        return false;
    
        
    }
    
    }


    public function getHeadersNavigation($navigation_id, $debug=false){

        $q = "Select 
        a.`id`
        FROM `headings` as a
        WHERE `navigation_id` = '$navigation_id' AND `active` = '1'
        ORDER BY `order` ASC";
    
        if ($debug){

            echo $q . '<br><br>';


        }
    
    
    
    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    
    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['id'];
            $x++;
    
    
        }
    
        if ($debug){
    
            print_r($rowReturn);
        }
    
        return $rowReturn;
    
    } else {
        
    
        if ($debug){
    
            echo 'no headings available';
        }
    
        return false;
    
        
    }
    
    }

    public function getPagesHeadings($headings_id, $debug=false){

        $q = "Select 
        a.`id`
        FROM `pages` as a
        WHERE `headings_id` = '$headings_id' AND `active` = '1'
        ORDER BY `order` ASC";
    
        if ($debug){

            echo $q . '<br><br>';


        }
    
    
    
    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    
    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['id'];
            $x++;
    
    
        }
    
        if ($debug){
    
            print_r($rowReturn);
        }
    
        return $rowReturn;
    
    } else {
        
    
        if ($debug){
    
            echo 'no pages available';
        }
    
        return false;
    
        
    }
    
    }
    

	
    /**
     * Close mysql connection
     */
	public function endnavigationManager (){
		$this->connection->CloseMysql();
	}

}