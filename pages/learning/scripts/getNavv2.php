<?php

            $openaccess = 1;

			//$requiredUserLevel = 4;
			
            require ('../includes/config.inc.php');		
            
            $debug = FALSE;
			
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

        foreach ($requiredTagCategories as $key=>$value){

           //echo $value;

           $tagCategory = $value;
           if ($debug){

            echo 'checking category ' . $tagCategory;
            echo PHP_EOL;
          
             }

            /* $data = $navigator->generateNavigationSingle($value);

            if ($debug){

                print_r($data);
            }
 */

            //get all tags where the navigation should be enabled
            //these are tags which remain in videos that match the tag(s) clicked


            $data2 = $navigator->generateNavigationSingleDisabledQuery($value, $tagsToMatch, $debug);

            if ($debug){

                echo 'matching videos with tags ' . print_r($tagsToMatch) . 'and tagCategory ' . $value;
                echo PHP_EOL . print_r($data2);
            }

            
            //WORK AROUND DUE TO NO JOIN IN TAGS VERSUS TAG CATEGORIES

            $videos1 = [];
            $y=0;
            foreach ($data2 as $key=>$value){

                $videos1[$y] = $value['id'];
                $y++;
    
                //get all tags associated with this video
    
    
            }

            //only if count of array higher than 1

            if ($numberOfTagsToMatch > 1){

            
            $countedArray = array_count_values($videos1);

            $videos2 = [];
            $z=0;
            foreach ($countedArray as $key=>$value){

                if ($value > 1){
                    $videos2[$z] = $key;
                     $z++;
                }
                
    
                //get all tags associated with this video
    
    
            }

            $data3 = $navigator->getVideoTagsBasedOnVideosShown($videos2, $debug);
        }else{
            $data3 = $navigator->getVideoTagsBasedOnVideosShown($videos1, $debug);
        }

            if ($debug){
                echo PHP_EOL . 'using $data2 above to get other tags in the identified videos';
                echo PHP_EOL . 'matching tags are:';
                print_r($data3);
            }

           

            

            foreach ($data3 as $key=>$value){

                $tags[$x] = $value['id'];
                $x++;

            }

            

          

            //print_r($data1);
           
           // print_r($data2);

            //print_r($data3); //gives the tags that can be enabled rest disabled
            
            ?>

            
               

                   
               


            <?php 
                    }

                    if ($debug){

                        print_r($tags);
                    }
                    echo json_encode($tags);

            ?>
                   

                <?php

            

            

        
       

        ?>
            