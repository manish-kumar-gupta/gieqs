<?php


            /* File to generate a table JSON at top of page Delegate */

                //TODO set access level here

                require ('../../../assets/includes/config.inc.php');		


                $Delegate = new Delegate;

                
                $response =  $Delegate->Load_records_limit_json_datatables(200);

                echo $response;


                $Delegate->endDelegate();

            