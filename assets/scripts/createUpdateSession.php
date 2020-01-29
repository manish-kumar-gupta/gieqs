<?php

$openaccess =1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $general = new general;
            $programme = new programme;
            $programmeOrder = new programmeOrder;
            $session = new session;
            $queries = new queries;
            $sessionView = new sessionView;

             //$print_r()

             $table = 'session';

             eval('$esdLesion = new ' . $table . ';');

             $data = json_decode(file_get_contents('php://input'), true);

             //print_r($data);
 
             $sessionid = $data['sessionid'];
             $programmeid = $data['programmeid'];

             

            function rempty ($var)
            {
                return !($var == "" || $var == null);
            }

            if ($update == 0){

                //new form

                unset($data['update']);
                unset($data['programmeid']);

                $data = array_filter($data, 'rempty');

                $values = implode('\', \'', $data);
                $keys = array_keys($data);

                $log = array();

                foreach ($data as $key=>$value){

                    $targetStatement = '$esdLesion->set' . $key . '("' . $value . '");';
                    //echo $targetStatement;
                    
                    try {
                    
                        eval($targetStatement);
                    
                    }
                    catch(Exception $e){

                        $log[] = $e . 'could not be evaluated';

                    }
                    

                }

                echo $esdLesion->prepareStatementPDO();

                //also insert the programme id

                $programmeOrder->setsessionid($sessionid);
                $programmeOrder->setprogrammeid($programmeid);
                echo $programmeOrder->prepareStatementPDO();



                

            }else{

                //update
                unset($data['update']);
                unset($data['sessionid']);


                



            }
          


           


            

            //check this combination does not already exist

            if (($sessionView->checkCombination($sessionid, $moderatorid)) === true){

                //if above true
                //get the id of sessionModerator

                $sessionModid = $sessionView->checkSessionModeratorid($sessionid, $moderatorid);

                if ($sessionModid){

                    $sessionModerator->Load_from_key($sessionModid);
                    echo $sessionModerator->Delete_row_from_key($sessionModid);

                }else{

                    echo '0';
                }

           

            }else{

                echo '4';
            }

            
             
$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>