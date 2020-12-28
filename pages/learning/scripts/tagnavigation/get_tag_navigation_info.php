<?php

$openaccess = 0;

$requiredUserLevel = 6;

require_once ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = true;

if ($debug == true){
error_reporting(E_ALL);
}else{

error_reporting(0);
}

$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

$data = json_decode(file_get_contents('php://input'), true);


$videoid = $data['videoid'];
$browsing_id = $data['browsing_id'];
$browsing = $data['browsing'];


if ($debug){
//print_r($subscription_id);
print("<pre class=\"text-white\">".print_r($data,true)."</pre>");
//echo '$userid is ' . $userid;
}


if (isset($browsing) && isset($browsing_id) && isset($videoid)){


    

    

    if ($browsing == '2' || $browsing == '3' || $browsing == '4'){

        //is an asset

        //load asset
        if ($assets_paid->Return_row($browsing_id)){

            $assets_paid->Load_from_key($browsing_id);

        }else{

            if ($debug){
                echo 'cannot load asset';
            }

            die();
        }

        //get all videos with this tag

        



    //if all set, get array of videos associated with these parameters to which the user has access

    if ($debug){

        echo 'All required parameter cookies set';

    }

    if(isset($id)) {

        $currentVideo = $id;
    
        if ($debug){
    
            var_dump($id);
        }

        //id detected

        $position = array_search($id, $browsing_array);


        if ($position > -1){

            //is id in the array browsingArray?

            if ($debug){
    
                echo 'id detected in the browsing array at position ' . $position;
            }

            
            //get previous video and next video

            $nextVideo = $browsing_array[(intval($position) + 1)];

            if (!isset($nextVideo)){

                $lastVideo = true;
            }else{

                $lastVideo = false;
            }
            

            $previousVideo = $browsing_array[(intval($position) - 1)];

            if (!isset($previousVideo)){

                $firstVideo = true;
            }else{

                $firstVideo = false;
            }

            if ($debug){
    
                echo "NEXT video is $nextVideo and PREVIOUS video is $previousVideo";
                
                if ($firstVideo == true){
                
                    echo "this is the FIRST video ";
                    
                    }
                
                if ($lastVideo == true){
                
                echo "this is the LAST video ";

                }


            }

            $numberOfVideos = count($browsing_array);
          
            if ($debug){
    
                echo "This video is number $position of $numberOfVideos";
            }

        }else{


            if ($debug){
    
                echo 'id not deteced in the browsing array'; 
            }


        }        







    
    }else{
    

        //no id detected from viewer.php

        if ($debug){

            echo 'no id detected from viewer.php';
    
        }


    }
    
}else{

    //browsing not a course or asset
}

    
//echo 'All set';


}else{

    if ($debug){

        echo 'one of required parameters $browsing and / or $browsing_id not set in cookies';

    }

    //delete the others?
}











?>