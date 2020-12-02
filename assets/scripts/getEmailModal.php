<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $emailLink = new emailLink;
            
            //error_reporting(E_ALL);
            $debug = FALSE;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $emailid = $data['emailid'];
            $databaseName = $data['databaseName'];
            

            ?>


<div class="modal fade" id="modal-row-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
            <div class="modal-header">
                <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                    <div>
                        <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                            <img src="../../assets/img/icons/gieqsicon.png">
                        </div>
                    </div>
                    <div class="text-left">
                        <h5 class="mb-0">Edit <?php echo $databaseName;?></h5>
                        <span class="mb-0"></span>
                    </div>

                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <div>
                            <h6 class="mb-0"></h6>
                            <span id="modalMessageArea" class="mb-0"></span>

                        </div>
                        <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
                            <span id="topModalSuccess"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">

                <div class="<?php echo $databaseName;?>-body">
                    <form id="<?php echo $databaseName;?>-form">
                        <div class="form-group">
                            <!-- EDIT -->

                            <label for="email_id">email_id</label>
                            <div class="input-group mb-3">
                                <input id="email_id" type="text" class="form-control" name="email_id">
                            </div>

                            <label for="name">name</label>
                            <div class="input-group mb-3">
                                <input id="name" type="text" class="form-control" name="name">
                            </div>

                            <label for="subject">subject</label>
                            <div class="input-group mb-3">
                                <input id="subject" type="text" class="form-control" name="subject">
                            </div>

                            <label for="preheader">preheader</label>
                            <div class="input-group mb-3">
                                <textarea id="preheader" type="text" data-toggle="autosize" class="form-control"
                                    name="preheader"></textarea>
                            </div>
                        </div>
                    </form>
                    <form id="emailContent-form">
                        <div class="emailBody">
                            <!-- get from ajax all associated emailCreators -->



                            <hr>
                            <hr>
                            <!-- get all connections for this email id -->
                            <?php 
                                
                                $emailContents = $emailLink->getEmailContents($emailid, false);

                                //var_dump($emailContents);

                                $x=0;

                                foreach ($emailContents as $key=>$value){

                                    if ($value['video'] != NULL){
                                        //is a video
?>

                            <div draggable="true" style="cursor: move;"
                                class="input-group input-group-merge mb-3 can-drag p-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Video</span>
                                </div>

                                <input data-id="<?php echo $value['id'];?>" data-sort-order="<?php echo $x;?>"
                                    data-type="video" class="form-control emailContent" value="<?php echo $value['video'];?>">
                                <div class="input-group-append">

                                    <span class="input-group-text delete-email-content"
                                        data-id="<?php echo $value['id'];?>"
                                        style="cursor: pointer !important;">x</span>

                                </div>
                            </div>


                            <?php
                                    }else if($value['img'] != NULL){
                                        //is an image?>


                            <div draggable="true" class="input-group input-group-merge mb-3 can-drag">
                                <div class="input-group-prepend">

                                    <span class="input-group-text">Image</span>

                                </div>

                                <input data-id="<?php echo $value['id'];?>" data-sort-order="<?php echo $x;?>"
                                    data-type="img" type="text" class="p-2 form-control emailContent" name="img"
                                    value="<?php echo $value['img'];?>">

                                <div class="input-group-append">

                                    <span class="input-group-text delete-email-content"
                                        data-id="<?php echo $value['id'];?>"
                                        style="cursor: pointer !important;">x</span>

                                </div>

                            </div>
                            <?php
                                    }else{

                                        //is text
                                        ?>


                            <div draggable="true" class="input-group input-group-merge mb-3 can-drag"
                                style="cursor: move;">
                                <div class="input-group-prepend">

                                    <span class="input-group-text">Text</span>
                                </div>

                                <textarea data-id="<?php echo $value['id'];?>" data-type="text"
                                    data-sort-order="<?php echo $x;?>" type="text" data-toggle="autosize"
                                    class="form-control p-2 emailContent"
                                    name="id"><?php echo $value['text'];?></textarea>
                                <div class="input-group-append">

                                    <span class="input-group-text delete-email-content"
                                        data-id="<?php echo $value['id'];?>"
                                        style="cursor: pointer !important;">x</span>

                                </div>

                            </div>



                            <?
                                        

                                    }

                                   
                                

                                    $x++;
                                }


                                
                                
                                ?>




                        </div>

                        <button class="addText btn btn-sm m-2 px-2 py-0 bg-gieqsGold text-dark form-control">+
                            text</button>
                        <button class="addImg btn btn-sm m-2 px-2 py-0 bg-gieqsGold text-dark form-control">+
                            img</button>
                        <button class="addVideo btn btn-sm m-2 px-2 py-0 bg-gieqsGold text-dark form-control">+
                            video</button>




                </div>
                </form>

                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="submit-<?php echo $databaseName;?>-form btn btn-sm btn-success">Save</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

</div>




<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>