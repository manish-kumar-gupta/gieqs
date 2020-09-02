<?php

            $openaccess = 1;

			//$requiredUserLevel = 4;
			
            require ('../includes/config.inc.php');		
            
            $debug = true;
			
			//require (BASE_URI.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
        
            function array_not_unique( $a = array() )
            {
            return array_diff_key( $a , array_unique( $a ) );
            }
			
			$general = new general;
			
            $navigator = new navigator;
            
            $data = json_decode(file_get_contents('php://input'), true);

            $tagsToMatch = $data['tags'];

            $active = $data['active'];

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

        $data3 = $navigator->getVideoTagsBasedOnVideosShown($data2, $debug);
      

       if ($debug){

        print_r($data3);

       }

        echo json_encode($data3);

            ?>
                   

                <?php

            

            

        
       

        ?>
            