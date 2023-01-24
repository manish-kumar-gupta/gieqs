<?php


/**
                 * Script which accepts a token id as ?id=[sessionid] in the url
                 * 
                 * function to generate a list of users that have registered with that token
                 * 
                 * called from a list of tokens or the tokens table
                 * 
                 * */

$openaccess = 0;
			$requiredUserLevel = 6;

            //then do required institution access





			
            //require BASE_URI . '/pages/learning/includes/head.php';

			require (BASE_URI.'/assets/scripts/headerScript.php');

            ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
            ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style>

p {

margin-bottom: 0 !important;

}

    </style>

<?php

            $general = new general;
            $programme = new programme;
            $session = new session;
            //$faculty = new faculty;
            $sessionItem = new sessionItem;
            $queries = new queries;
            $sessionView = new sessionView;
            $programmeReports = new programmeReports;
            $institutional_manager = new institutional_manager;
            $users = new users;
            $token = new token;
            $subscription = new subscriptions;
            require_once(BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php');
            $usersMetricsManager = new usersMetricsManager;
            $assets_paid = new assets_paid;
            $institutional = new institutional;



            $debug = false;
            if ( ! function_exists( 'array_key_last' ) ) {
                /**
                 * Polyfill for array_key_last() function added in PHP 7.3.
                 *
                 * Get the last key of the given array without affecting
                 * the internal array pointer.
                 *
                 * @param array $array An array
                 *
                 * @return mixed The last key of array if the array is not empty; NULL otherwise.
                 */
                function array_key_last( $array ) {
                    $key = NULL;
            
                    if ( is_array( $array ) ) {
            
                        end( $array );
                        $key = key( $array );
                    }
            
                    return $key;
                }
            }

            function multi_array_key_exists($key, array $array): bool
{
    if (array_key_exists($key, $array)) {
        return true;
    } else {
        foreach ($array as $nested) {
            if (is_array($nested) && multi_array_key_exists($key, $nested))
                return true;
        }
    }
    return false;
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])){
	$id = $_GET["id"];
    $id_set = true;

}else{

	$id = null;
    $id_set = false;
    echo '<div class="container">';
    echo '<p>Please set the institution id in the url, e.g. ?id=[institution]</p>';
    echo '</div>';
    exit();

}


//also check the user is linked to the institution
//add a database user_institution
//add types, superuser, viewer
//don't modify user table




            //error_reporting(E_ALL);
            //$print_r()

            //$data = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            //get all faculty

            $debug = false;

            if ($id_set){


               /*  $response = $sessionView->generateView($id);
                if ($debug){
                print_r($response);
                } */

                if ($institutional->Return_row($id)){


                    $institutional->Load_from_key($id);
                    if ($debug){
                        
                        print_r($institutional);

                    }

                }else{

                    echo 'Institution not found';

                }  




            }else{

                echo 'Need to set id in url for institution';

                exit();

            }

            echo '<div class="container mt-5">';

            echo '<div class="d-flex justify-content-between align-items-center">';
            echo '<h2>GIEQs Institutional/Group Access</h2>';
            $users->Load_from_key($userid);
            echo '<p>User : ' . $users->getfirstname() . ' ' .  $users->getsurname() . ' </p>';
            echo '<button class="btn btn-sm bg-secondary text-white manage-token ms-3">Feedback</button>';

            echo '</div>';

           
            echo '<p>Institution/Group : ' . $institutional->getlong_name() . '</p>';
            echo '<p>Active Users: , Average User % completion</p>';

           
