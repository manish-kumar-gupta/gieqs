<?php
require ('../../assets/includes/config.inc.php');		
require(BASE_URI . '/pages/backend/institution_header.php');
?>


            <div class="d-flex mt-3">

                <div class="p-4 border border-1">

                    <div class="d-flex">

                        <h4>Access Management</h4>

                     </div>

                    <div class="ps-2 d-flex justify-content-between align-items-center">
                        <div class="">
                    <?php
                    
                    $tokens = $institutional_manager->getTokensInstitution($id);

                    //var_dump($tokens);
                    
                    foreach ($tokens as $key=>$value){

                        $token->Load_from_key($value);
                        $date_created = null;
                        $date_created = new DateTime($token->getcreated());
                        $assets_paid->Load_from_key($token->getasset_id());


                        ?>
                        
                        <h6>Token #<?php echo $token->getid();?></h6>
                        <p class='m-2'><?php echo $assets_paid->getname() . $token->getcreated() . '&euro;' . $token->getcost(); ?>, Purchased, Value</p>
                    </div>
                    <div>
                        <button class="btn btn-sm bg-secondary text-white manage-token" data-tokenid="<?php echo $value;?>">Manage</button>

                        <?php
                    }
                    ?>


                </div>
                     </div>

                    


                </div>

                <div class="p-4 border border-1 ms-3">
                <div class="d-flex">

<h4>Institution Management</h4>

</div>
<div class="d-flex justify-content-between align-items-center">


                <button class="btn btn-sm bg-secondary text-white manage-token">Manage</button>
                </div>

                </div>

                

<?php
            //exit();

            //$token->Load_from_key($id);

            


            


            echo '</div>';



            ?>
            <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>

<script src="<?php echo BASE_URL;?>/assets/js/generaljs.js"></script>
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>

<script>

$(document).ready(function() {


    $(document).on('click', '.manage-token', function(){

        var tokenid = $(this).attr('data-tokenid');
        //var userid = $(this).attr('user-id');

        window.open(siteRoot + 'pages/backend/token_who.php?id=' + tokenid);

        




    })


})


</script>


<?php


                

$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>