<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 17-10-2021
 *
 * DJT 2021
 *
 * License: LGPL
 *
 */

if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
    session_start(); //do this
}

if ($_SESSION) {

    if ($_SESSION['debug'] == true) {

        error_reporting(E_ALL);

    } else {

        error_reporting(0);

    }
}

error_reporting(E_ALL);

class gpat_glue extends gpat_score
{

    private $id; //int(11)

    private $connection;

    public function __construct()
    {
        require_once 'DatabaseMyssqlPDOLearning.class.php';

        $this->connection = new DataBaseMysqlPDOLearning();
    }


    //individual score SMSA weighting (probably should be saved and done when saving or will be extensive processing here)

    /*

    */




    //per domain scoring

    //data split last 3 versus current 3

    //overall score

    //overall score weighted


    
    //are there 30 records for the user (credentialling allowed)

    /**
     * Close mysql connection
     */
    public function endgpat_glue()
    {
        $this->connection->CloseMysql();
    }

}
