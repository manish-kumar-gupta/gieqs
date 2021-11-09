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

    use the SMSA to weight the fraction score 

    

    */

    public function weight_fraction_score($fraction, $SMSA){

        //options SMSA 2, 3, 4, 5 (plus)

        if ($SMSA == 1){

            return false;
        }else if ($SMSA == 2){

            $weightedFraction = $fraction / 4;

        }else if ($SMSA == 3){

            $weightedFraction = $fraction / 3;

        }else if ($SMSA == 4){

            $weightedFraction = $fraction / 2;

        }else if ($SMSA == 5){

            $weightedFraction = $fraction;

        }else{

            return false;
        }

        return $weightedFraction;


    }



    //calculate all time fraction

    //get scores for this user

    public function getUserFractionNonWeighted($userid, $last3, $debug){

        // $last3  1 = last 3 moths, 2 = before last 3 , 3 = all data

        //define today
        $date_today = new DateTime();
        $interval = new DateInterval('P3M');
        $date_today->sub($interval);
        $sql_date = $date_today->format('Y-m-d');



        //-3m
        //convert to mysql string

        if ($last3 == 1){

            $last3text = 'AND `date_procedure` >= \'' . $sql_date . '\'';

        }elseif ($last3 == 2){

            $last3text = 'AND `date_procedure` < \'' . $sql_date . '\'';

        }elseif ($last3 == 3) {

            $last3text = '';
        } else {

            $last3text = '';
        }

        $q = "SELECT `fraction` FROM `gpat_score` WHERE `user_id` = '$userid' $last3text";

        echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[] = $row['fraction'];


            }

            return $rowReturn;

        } else {
            

            return false;
        }

    






    }

    public function getUserFractionWeighted($userid, $last3, $debug){

        // $last3  1 = last 3 moths, 2 = before last 3 , 3 = all data

        //define today
        $date_today = new DateTime();
        $interval = new DateInterval('P3M');
        $date_today->sub($interval);
        $sql_date = $date_today->format('Y-m-d');



        //-3m
        //convert to mysql string

        if ($last3 == 1){

            $last3text = 'AND `date_procedure` >= \'' . $sql_date . '\'';

        }elseif ($last3 == 2){

            $last3text = 'AND `date_procedure` < \'' . $sql_date . '\'';

        }elseif ($last3 == 3) {

            $last3text = '';
        } else {

            $last3text = '';
        }

        $q = "SELECT `weighted_fraction` FROM `gpat_score` WHERE `user_id` = '$userid' $last3text";

        echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[] = $row['weighted_fraction'];


            }

            return $rowReturn;

        } else {
            

            return false;
        }

    






    }

    public function averageArray($array, $debug=false){

        error_reporting(E_ALL);

        $x=0;

        $sum = 0;

        //echo 'hello';


        foreach ($array as $key=>$value){

            if (is_numeric($value)){
            $sum = $sum + floatval($value);

            $x++;
            }

        }

        if ($debug){

            echo '$x is ' . $x;
            echo '<br/>';
            echo '$sum is ' . $sum;
            echo '<br/>';
            echo '<br/>';
        }


        return $sum / $x;

    }


    //per domain scoring

    /*

    //define domains
        global, injection, snare placement, safety checks, defect assessment, accessory techniques





    */

    public function returnDomainSpecificScore($gpatid, $domain){

        //global = 1, injection = 2, snare placement = 3, safety checks = 4, defect assessment = 5, accessory techniques = 6

        //write into java and save




    }

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
