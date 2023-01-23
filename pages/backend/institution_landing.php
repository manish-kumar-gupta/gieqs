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
			require ('../../assets/includes/config.inc.php');		
			
            //require BASE_URI . '/pages/learning/includes/head.php';

			require (BASE_URI.'/assets/scripts/headerScript.php');

            ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
            ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                    //if ($debug){
                        
                        print_r($institutional);

                   // }

                }else{

                    echo 'Institution not found';

                }  




            }else{

                echo 'Need to set id in url for institution';

                exit();

            }

            echo '<div class="container mt-5">';

            echo '<h2>GIEQs Institutional/Group Access</h2>';
            echo '<p>Institution/Group : ' . $institutional->getlong_name() . '</p>';

            echo '<div class="d-flex m-4">';
            $users->Load_from_key($userid);
            echo '<p>User : ' . $users->getfirstname() . ' ' .  $users->getsurname() . ' </p>';



            ?>

<button class="btn btn-sm bg-secondary text-white manage-token ms-3">Feedback</button>
        </div>


            <div class="row">

                <div class="col-3">

                <h4>Token Management</h4>
                </div>

                <div class="col-3">

                <h4>User Completion Records</h4>
                </div>

                <div class="col-3">

                <h4>User Live Participation
                </h4>
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-3">

                    <div class="d-flex">
                    <?php
                    
                    $tokens = $institutional_manager->getTokensInstitution($id);

                    //var_dump($tokens);
                    
                    foreach ($tokens as $key=>$value){

                        ?>
                        
                        <p class='m-2'>Token Name, Purchased, Value</p>
                        <button class="btn btn-sm bg-secondary text-white manage-token" data-tokenid="<?php echo $value;?>">Manage</button>

                        <?php
                    }
                    ?>



        </div>

                    


                </div>

                <div class="col-3">

                <button class="btn btn-sm bg-secondary text-white manage-token">View / Certificates</button>

                </div>

                <div class="col-3">

                <button class="btn btn-sm bg-secondary text-white manage-token">View</button>

                </div>


            </div>

<?php
            //exit();

            //$token->Load_from_key($id);

            


            


            echo '</div>';



            ?>
            <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>

<script src="<?php echo BASE_URL;?>/assets/js/generaljs.js"></script>
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>

<script>

$(document).ready(function() {


    $(document).on('click', '.manage-token', function(){

        var tokenid = $(this).attr('data-tokenid');
        //var userid = $(this).attr('user-id');

        window.open(siteRoot + 'pages/backend/token_who.php?id=' + tokenid);

        




    })


})


</script>


<?php


                

$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>