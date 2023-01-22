<?php


/**
                 * Script which accepts a token id as ?id=[sessionid] in the url
                 * 
                 * function to generate a list of users that have registered with that token
                 * 
                 * called from a list of tokens or the tokens table
                 * 
                 * */

$openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
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
    echo '<p>Please set the user id in the url, e.g. ?id=[userid]</p>';
    echo '</div>';
    exit();

}




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

                $users->Load_from_key($id);

                if ($debug){
                    
                    print_r($users);

                }




            }else{

                exit();

            }

            echo '<div class="container mt-5">';

            echo '<h2>Activity for User id ' . $id . '</h2>';
            echo '<p>User name : ' . $users->getfirstname() . ' ' .  $users->getsurname() . ' </p>';

            //$token->Load_from_key($id);

            

            if ($assetManager->getSiteWideSubscription($id, $debug)){
    
                //there is a site wide subscription
                if ($debug){
                  echo 'there is a site wide subscription';
                  }
                
                
                //check if active 
              
                $datetime_utc = new DateTime('now', new DateTimeZone('UTC'));
              
                if ($assetManager->isSubscriptionActive($assetManager->getSiteWideSubscription($id, $debug), $datetime_utc, $debug)){
              
                  //is active
                  if ($debug){
                    echo 'it is active';
                    }
              
                    $siteWideSubscriptionid = $assetManager->getSiteWideSubscription($id, $debug);

                    $subscription->Load_from_key($siteWideSubscriptionid);
              
                    if ($debug){
                      echo 'SUBSCRIPTION ID IS ' . $siteWideSubscriptionid;
                      }
              
                    //find out which asset

                    $subscription_name = $assetManager->getAssetName($siteWideSubscriptionid);
                            
                    if ($debug){
                      echo 'ASSET ID IS ' . $assetid_subscription;
                      }

                      $date=date_create($subscription->getexpiry_date()); 

                      echo '<p>Active Sitewide Subscription : ' . $subscription_name . '</p>';
                      echo '<p>Sitewide Subscription Expires : ' . date_format($date,"d/m/Y H:i:s") . '</p>';


               }else{

                echo '<p>Active Sitewide Subscription : None</p>';

               }

            }else{

                echo '<p>Active Sitewide Subscription : None</p>';

                if ($debug){


                }

           }

           echo 'Total Site Completion : ' . round($usersMetricsManager->userCompletionVideos($id, $debug)['completion'], 1) . '%';
           
           $allAssets = $usersMetricsManager->getAllAssets();

           $asset_completion_array = [];

           $asset_completion_counter = 0;

           foreach ($allAssets as $key=>$value){

                //return completion for each asset

                $asset_completion_array[$value] = $usersMetricsManager->userCompletionAsset($id, $value, $debug);
                $asset_completion_counter++;

           }

           /* echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<th>Email</th>';
                        echo '<th>Subscription id</th>';

            echo '<th>Registered date</th>';
            echo '<th>Subscription Expiry Date</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
 */



           if ($debug){
            
            var_dump($asset_completion_array);

           }

           /* foreach ($asset_completion_array as $key=>$value){

             if ($value != false){

                echo '<p>Asset ' . 'asset name' . ' is ' . round($value, 1) . '% completed</p>';

             }else{

                echo '<p>Asset ' . 'asset name' . ' is not yet accessed by user</p>';


             }

           } */

           uasort($asset_completion_array, function($a, $b) { return $b > $a ;});


           //get all videos
           //return % completion

           //return courses completion per asset (that has been started)

           //return 'userscompletion'

           //approximate hours spent
           // exit();


            //echo '<p>Remaining : ' . $token->getinstitutional_id() . ' </p>';


            echo '<br/><br/>';

            ?>



<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Course Completion Status
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
       <?php

      echo '<h4>Course Completion Status</h4>';
            
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>id</th>';

            echo '<th>Course</th>';
            echo '<th>Completion</th>';
            echo '<th>Certificate</th>';

            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';



            

         

            foreach ($asset_completion_array as $key=>$value){

                $assets_paid->Load_from_key($key);

                $completion = null;

                $completion = round($value, 1);

                $statement = null;

                if($completion == 100){

                    $statement = "<button class='btn btn-sm bg-secondary text-white'>Generate</button>";

                }



                echo '<tr>';

                echo '<td>' . $key . '</td>';

                echo '<td>'  . $assets_paid->getname() . '</td>';

                echo '<td>'  . $completion . '%</td>';

                echo '<td>'  . $statement . '</td>';


              

                echo '</tr>';


                //echo '<p>' . $users->getfirstname() . ' ' . $users->getsurname() . ' ' .  $users->getemail() . '</p>';

                //echo '<p></p>';

            }

            echo '</tbody>';
            echo '</table>';
            ?>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>


<?php
            


            echo '</div>';

            exit();

            //get the users who registered with a token

            //print_r($facultyMembers);

            $serverTimeZone = new DateTimeZone('Europe/Brussels');


            $currentTime = new DateTime('now', $serverTimeZone);


            if ($debug){
                echo '<br/><br/>response Array contains </br></br>';
                print_r($response);

            }

            $moderators = $sessionView->getModerators($response[0]['sessionid']);

            if ($debug){
                echo '<br/><br/>moderators Array contains </br></br>';
                print_r($moderators);

            }

            $programmeDate = new DateTime($response[0]['date']);

            if ($debug){

                print_r($programmeDate); 
                
            }

            $sessionTimeFrom = new DateTime($response[0]['date'] . ' ' . $response[0]['timeFrom'] , $serverTimeZone);

            $sessionTimeTo = new DateTime($response[0]['date'] . ' ' . $response[0]['timeTo'], $serverTimeZone);

echo '<div class="container mt-5">';


            echo '
                            <div class=" " id="-' . $programmeDate->format('l') . '-' . $response[0]['programmeid'] . '-' . $sessionTimeFrom->format('Hi') . '" tabindex="-1" role="dialog" aria-labelledby="-change-username" aria-hidden="true">
                                <div class="-dialog -lg -dialog-centered" role="document">
                                    <form>';
                                    ?>

<div class="content border" style="border-color:rgb(22, 42, 76) !important;">
    <div class="p-2">

        <div class="p-2 d-flex align-items-left" id="-title-change-username">
            <div>
                <div class="icon icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                    <img src="<?php echo BASE_URL;?>/assets/img/icons/gieqsicon.png">
                </div>
            </div>
            <div class="ml-3 text-left">
                <span class="h5 mb-0"><?php echo $response[0]['sessionTitle']?></span>
                <?php
                                                                                //$edit=1;
                                                                                    if ($edit == TRUE){
                                                                                        echo '<span class="ml-3 editSession" data="' . $response[0]['sessionid'] . '"><i class="fas fa-edit"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                                ?>
                <p class="mb-0"><?php echo $programmeDate->format('D d M Y');?>

                    <?php 
                                                            
                                                            $sessionItemTimeFrom = new DateTime($response[0]['timeFrom'], $serverTimeZone);
                                                            $sessionItemTimeTo = new DateTime($response[array_key_last($response)]['timeTo'], $serverTimeZone);
                                                            
                                                            
                                                            ?>

                    <?php echo ' ' . $sessionItemTimeFrom->format('H:i')?> -
                    <?php echo $sessionItemTimeTo->format('H:i')?></p>
                <p class="mb-0 h6"><?php echo $response[0]['sessionSubtitle']?></p>
                <p class="mb-0 ml-1"></i><?php echo $response[0]['sessionDescription']?></p>
            </div>

        </div>


    </div>
    <div class="-subheader px-3 mt-2 mb-2 border-bottom">
        <div class="row">
            <div class="col-sm-12 text-left">
                <div>
                    <span class="h6 mb-0">Moderators</span>
                    <?php
                                                                                    if ($edit == TRUE){
                                                                                        
                                                                                        echo '<span class="ml-1 addModerators"><i class="fas fa-plus"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                                    
                                                                                ?>
                    <br />

                    <?php
                                                                
                                                                                    foreach ($moderators as $key=>$value){
                                                                                        echo '<span class="faculty mb-0 mr-1" data="' . $value['facultyid'] . '">';
                                                                                        echo $value['title'] . ' ' . $value['firstname'] . ' ' . $value['surname'];
                                                                                        echo '</span><br/>';
                                                                                        
                                                                                    if ($edit == TRUE){
                                                                                        
                                                                                        echo '<span class="ml-1 mr-3 removeModerators"><i class="fas fa-minus"></i></span>';
                                                                
                                                                                    }
                                                                                
                                                                            
                                                                
                                                                                    }
                                                                                    
                                                                                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="p-2">

        <div class="programme-body">
            <?php foreach ($response as $key=>$value){
                                                                                        ?>


            <div class="sessionItem row d-flex align-items-left text-left align-middle">
                <span class="sessionItemid" style="display:none;"><?php echo $value['sessionItemid'];?></span>
                <div class="pl-2 pr-1 pb-0 pt-1 time">
                    <?php 
                                                            
                                                            $sessionItemTimeFrom = new DateTime($value['sessionItemTimeFrom'], $serverTimeZone);
                                                            $sessionItemTimeTo = new DateTime($value['sessionItemTimeTo'], $serverTimeZone);
                                                            
                                                            
                                                            ?>



                    <span class="timeFrom"><?php echo $sessionItemTimeFrom->format('H:i');?></span> - <span
                        class="timeTo"><?php echo $sessionItemTimeTo->format('H:i');?></span>
                    : </span>


                    <span class="h6 sessionTitle"><?php echo $value['sessionItemTitle'];?></span>

                    <!--if live stream-->
                    <!--if sessionItem.live == 1-->
                    <?php if ($value['live'] == 1){?>
                    <span class="badge text-white ml-3" style="background-color:rgb(238, 194, 120) !important;">Live
                    </span>

                    <?php }
                                                                
                                                                                    if ($edit == TRUE){
                                                                                        echo '<span class="ml-3 editSessionItem"><i class="fas fa-edit"></i></span>';
                                                                                        echo '<span class="ml-3 addSessionItem"><i class="fas fa-plus"></i></span>';
                                                                                        echo '<span class="ml-3 deleteSessionItem"><i class="fas fa-times"></i></span>';
                                                                
                                                                                    }
                                                                                    ?>

                </div>

            </div>
            <div class="row d-flex align-items-left text-left align-middle">
                <div class="pl-3 pr-1 pb-0 pt-0 time">
                    <span class="sessionDescription"><?php echo $value['sessionItemDescription'];?></span>

                    <p class="pt-2 h6 faculty"><?php 
                                                                                    
                                                                                    $faculty = $sessionView->getFacultyName($value['faculty']);
                                                                
                                                                                    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];
                                                                                    
                                                                                    
                                                                                    ?></p>
                </div>
            </div>
            <hr class="m-2">

            <?php }?>

        </div>

        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
            <p class="text-muted text-sm"></p>
        </div>
    </div>
    <div class="-footer">
        <!-- <button type="button" class="btn btn-sm btn-secondary" data-dismiss="">Back to programme &nbsp;
            &nbsp;<i class="fas fa-arrow-right"></i></button> -->
    </div>
</div>

</form>
</div>
</div>


<?php exit();?>


<?php 

                

$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>