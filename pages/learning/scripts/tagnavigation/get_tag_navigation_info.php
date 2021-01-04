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

$debug = false;

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
$selectedTag = $data['selectedTag'];
$browsing_array = $data['browsing_array'];
$selectedTag = $data['tag'];


$browsing_array = json_decode($browsing_array);



if ($debug){
//print_r($subscription_id);
print("<pre class=\"text-white\">".print_r($data,true)."</pre>");
print_r($browsing_array);
//echo '$userid is ' . $userid;
}


if (isset($browsing) && isset($browsing_id) && isset($videoid)){

    if ($debug){

        echo 'All required parameter cookies set';

    }
    

    

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

            //determine the context videos

             //in context of asset this is already set as $browsing_array

        //isSuperuser = 1 or 0

        //determine which of the context videos can be accessed (also add to cookie?, then do it once)

        //determine the asset access ? assume since on page // no check for now

        $access = $assetManager->is_assetid_covered_by_user_subscription($browsing_id, $userid);

        if ($access){


            //check which videos are tagged the same as this videos selected tag within this asset

            //filter the browsing array

            //to write $videosTag = $getVideosTag->($browsing_array); (needs to be a learning class which i guess asset manager is);

            //get all videos associated with this tag in thi

            $taggedVideoArray = $assetManager->getVideosTag($selectedTag);

            if ($debug){

                print_r($taggedVideoArray);

            }

            //then use array intersect to remove videos which are not tagged like this

            //return the tagged videos as json array with


            $videosToReturnv2 = array_intersect($browsing_array, $taggedVideoArray);

            if ($debug){

                print_r($videosToReturnv2);

            }

            $videosToReturn = array();
            $x = 1;
            foreach ($videosToReturnv2 as $key=>$value){

                $videosToReturn[$x] = $value;
                $x++;



            }

            $position = array_search($videoid, $videosToReturn);

            if ($debug){

                print_r($position);

            }
                //count of videos

                if ($position > -1){

                    //is id in the array browsingArray?
        
                    if ($debug){
            
                        echo 'id detected in the browsing array at position ' . $position;
                    }
        
                    
                    //get previous video and next video
        
                    $nextVideo = $videosToReturn[(intval($position) + 1)];
        
                    if (!isset($nextVideo)){
        
                        $lastVideo = true;
                    }else{
        
                        $lastVideo = false;
                    }
                    
        
                    $previousVideo = $videosToReturn[(intval($position) - 1)];
        
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
        
                    $numberOfVideos = count($videosToReturn);
                  
                    if ($debug){
            
                        echo "This video is number $position of $numberOfVideos";
                    }
        
                }else{
        
        
                    if ($debug){
            
                        echo 'id not deteced in the browsing array'; 
                    }
        
        
                }  
                //position of this video
                //next video
                //previous video


            //copied from above to modify

            $returnArray = [

                'postion' => $position,
                'numberOfVideos' => $numberOfVideos,
                'nextVideo' => $nextVideo,
                'previousVideo' => $previousVideo,
                'firstVideo' => $firstVideo,
                'lastVideo' => $lastVideo,


            ];

            echo json_encode($returnArray);

        





        }else{


            if ($debug){

                echo 'no user access to this asset';

            }
        }


        //filter these by tag

        //check what they are ordered by!





    //if all set, get array of videos associated with these parameters to which the user has access

    

    
    
}elseif ($browsing == '5'){

    //browsing the site separately

    if ($debug){

        echo 'browsing 5';
    }

    //check video access

   //get all videos from current supercategory

   //get supercategory from video

   $superCategory = $assetManager->getVideoSuperCategory($videoid, true);

   if ($debug){

        echo 'supercategory is ' . $superCategory;

            
   }

   if (!$superCategory){

    //no supercategory specified for video
    //get all videos
    //best guess the supercategory

    $superCategory = 2;


   }

   //set supercategory

   $videosSuperCategory = $assetManager->getVideosSelectedTagSuperCategory($selectedTag, $superCategory, false);

   if ($debug){

   print_r($videosSuperCategory);

   error_reporting(E_ALL);

   }

    $accessibleVideos = $assetManager->determineVideoAccessNonAsset($videosSuperCategory, $isSuperuser, $userid, $debug=false);

    //consider part of a supercategory

    if ($debug){

    print_r($accessibleVideos);

    }

    $position = array_search($videoid, $accessibleVideos);

            if ($debug){

                print_r($position);

            }
                //count of videos

                if ($position > -1){

                    //is id in the array browsingArray?
        
                    if ($debug){
            
                        echo 'id detected in the browsing array at position ' . $position;
                    }
        
                    
                    //get previous video and next video
        
                    $nextVideo = $accessibleVideos[(intval($position) + 1)];
        
                    if (!isset($nextVideo)){
        
                        $lastVideo = true;
                    }else{
        
                        $lastVideo = false;
                    }
                    
        
                    $previousVideo = $accessibleVideos[(intval($position) - 1)];
        
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
        
                    $numberOfVideos = count($accessibleVideos);
                  
                    if ($debug){
            
                        echo "This video is number $position of $numberOfVideos";
                    }
        
                }else{
        
        
                    if ($debug){
            
                        echo 'id not detected in the browsing array'; 
                    }
        
        
                }  
                //position of this video
                //next video
                //previous video


            //copied from above to modify

            $returnArray = [

                'postion' => $position+1,
                'numberOfVideos' => $numberOfVideos,
                'nextVideo' => $nextVideo,
                'previousVideo' => $previousVideo,
                'firstVideo' => $firstVideo,
                'lastVideo' => $lastVideo,


            ];

            echo json_encode($returnArray);


}elseif ($browsing == '99'){

    //user opens up to all available videos


    if ($debug){

        echo 'browsing all videos (99)';
    }

    

   //get all videos tagged this way

   $videosTaggedAll = $assetManager->getVideosTag($selectedTag);

   if ($debug){

   print_r($videosTaggedAll);

   error_reporting(E_ALL);

   }

    $accessibleVideos = $assetManager->determineVideoAccessNonAsset($videosTaggedAll, $isSuperuser, $userid, $debug=false);

    //consider part of a supercategory

    if ($debug){

    print_r($accessibleVideos);

    }

    $position = array_search($videoid, $accessibleVideos);

            if ($debug){

                print_r($position);

            }
                //count of videos

                if ($position > -1){

                    //is id in the array browsingArray?
        
                    if ($debug){
            
                        echo 'id detected in the browsing array at position ' . $position;
                    }
        
                    
                    //get previous video and next video
        
                    $nextVideo = $accessibleVideos[(intval($position) + 1)];
        
                    if (!isset($nextVideo)){
        
                        $lastVideo = true;
                    }else{
        
                        $lastVideo = false;
                    }
                    
        
                    $previousVideo = $accessibleVideos[(intval($position) - 1)];
        
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
        
                    $numberOfVideos = count($accessibleVideos);
                  
                    if ($debug){
            
                        echo "This video is number $position of $numberOfVideos";
                    }
        
                }else{
        
        
                    if ($debug){
            
                        echo 'id not detected in the browsing array'; 
                    }
        
        
                }  
                //position of this video
                //next video
                //previous video


            //copied from above to modify

            $returnArray = [

                'postion' => $position+1,
                'numberOfVideos' => $numberOfVideos,
                'nextVideo' => $nextVideo,
                'previousVideo' => $previousVideo,
                'firstVideo' => $firstVideo,
                'lastVideo' => $lastVideo,


            ];

            echo json_encode($returnArray);

    

}

    
//echo 'All set';


}else{

    if ($debug){

        echo 'one of required parameters $browsing and / or $browsing_id not set in cookies';

    }

    //delete the others?
}











?>