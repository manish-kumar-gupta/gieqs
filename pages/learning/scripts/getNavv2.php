<?php

            $openaccess = 1;

			//$requiredUserLevel = 4;
			
            require ('../includes/config.inc.php');		
            
			
			//require (BASE_URI.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
        
            function array_not_unique( $a = array() )
            {
            return array_diff_key( $a , array_unique( $a ) );
            }
			
			$general = new general;
			
            $navigator = new navigator;

            require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;
            
            $data = json_decode(file_get_contents('php://input'), true);

            $tagsToMatch = $data['tags'];

            $active = $data['active'];

            $debug = false;


            if ($debug){
            print_r($tagsToMatch);
            }

            $numberOfTagsToMatch = count($tagsToMatch);

            if ($numberOfTagsToMatch < 1){

                $tagsToMatch = null;

            }

            if ($debug){
                print_r('number of tags to match' . $numberOfTagsToMatch);
                }

            //$key = $data['key'];

    

//error_reporting(E_ALL);


      //define user access level

      
      ?>


        <?php

        $requiredTagCategories = $data['requiredTagCategories'];


        //$requiredTagCategories = ['39', '40', '41', '42'];

        

        ?>
       
        <?php

        $tags = [];
        $x=0;

        //gets all videos in the required tag categories that match the selected tags

        $data2 = $navigator->generateNavigationSingleDisabledQuery($requiredTagCategories, $tagsToMatch, $debug, $active);

        //use this to obtain the tags which match the video[s] still displayed so the user cannot unfilter all videos

        if ($debug){

            print_r($data2);
    
           }

        //work data 2 to remove those without a subscription

        //unless is superuser

        if ($isSuperuser == '0'){

        foreach ($data2 as $key=>$value){


            //does it require subscription?

            $array_key = $key;

            $access = $assetManager->video_requires_subscription($value, false);

            if ($access){


                $access2 = $assetManager->video_owned_by_user($value, $userid, false);
  
                if ($access2 === false){

                    //remove this video from the array
                    unset($data2[$key]);
                    if ($debug){

                        echo 'user id ' . $userid . ' has no access to video id ' . $value;

                   }


                }else{

                    if ($debug){

                        echo 'user id ' . $userid . ' has access to video id ' . $value;

                   }

                    
                    //user has access to this video
                }

            }else{

                if ($debug){

                    echo 'video id ' . $value . ' does not require a subscription';

                }

            }

            //test user access



            

        }

        }else{

            if ($debug){

                echo 'all videos available as superuser';
            }
        }

        $data3 = $navigator->getVideoTagsBasedOnVideosShown($data2, $debug);
      

       if ($debug){

        print_r($data3);

       }

        echo json_encode($data3);

            ?>
                   

                <?php

            

            

        
       

        ?>
            