<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
          
            $userFunctions = new userFunctions();
            $users = new users;
            $assetManager = new assetManager();
            $gpat_score = new gpat_score();

            error_reporting(-1);
           
            $debug = false;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            $id = $data['id'];

            

            if ($gpat_score->matchRecord($id) === TRUE){

                echo $gpat_score->Return_row($id);


            }else{

                echo 'Record could not be found, aborting';
                die();
            }

            
            //check the logged in user

            //use the class

            //use the class

            //if this is false, create the column

            //$q = 'SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=[Database Name] AND TABLE_NAME=[Table Name];';

            //if exists do nothing

            //if does not exist add

            





            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
