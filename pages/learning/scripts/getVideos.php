<?php

$openaccess = 1;
//$requiredUserLevel = 4;

require '../includes/config.inc.php';

$debug = false;

//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');

function array_not_unique($a = array())
{
    return array_diff_key($a, array_unique($a));
}

$general = new general;

$navigator = new navigator;

$tagsToMatch = json_decode(file_get_contents('php://input'), true);
if ($debug) {
    
    print_r($tagsToMatch);
}

$numberOfTagsToMatch = count($tagsToMatch);

if ($numberOfTagsToMatch < 1) {

    $tagsToMatch = null;

}

if ($debug) {
    print_r('number of tags to match' . $numberOfTagsToMatch);
}


?>


        <?php

        //CHANGE ME FOR NEW PAGES

$requiredTagCategories = ['39', '40', '41', '42'];

?>

        <?php

$videos = [];
$x = 0;

foreach ($requiredTagCategories as $key => $value) {

    //echo $value;

    $tagCategory = $value;
    if ($debug) {

        echo 'checking category ' . $tagCategory;
        echo PHP_EOL;

    }

    

    $data2 = $navigator->getVideoData($value, $tagsToMatch, $debug);

    if ($debug) {

        echo 'full video data for ' . print_r($tagsToMatch) . 'and tagCategory ' . $value;
        echo PHP_EOL . print_r($data2);
    }


    //add data2 to tags array in this loop


    $videos1 = [];
    $y=0;

    

    if ($data2){

    foreach ($data2 as $key=>$value){
        $videos[$x] = $value;
        $x++;
    }

    }
   
    //print_r($data1);

    // print_r($data2);

    //print_r($data3); //gives the tags that can be enabled rest disabled

    ?>








            <?php
}

//REALLY HELPFUL CODE
foreach($videos as $key=>$value)
{

    if(empty( $value ))
        unset($videos[$key]);
    
    /* 
    foreach ($value as $key1=>$value1){
    if(empty( $value1 ))
        unset($myarray[$key][$key1]);
    } */
}

if ($debug) {
    echo PHP_EOL . 'html build array contains:::' . PHP_EOL;
    print_r($videos);

    echo json_encode($videos);
}


?>


                <?php

                //new script

                //using data2

                $a = 1;

                $b = count($videos);

                foreach ($videos as $key=>$value){

                    

                    //make the html for the cards (in groups of +10)

                    if ($a == 1){

                        ?>

                        <div class="d-flex flex-row align-content-center mt-1 pt-0 px-0 text-white">
                    <?php }
                    if ($a < 10){

                    
                    
?>          
                
                <div class="card mr-md-4">
                <div class="card-header" style="height:150px;">
                    <div class="row align-items-right my-0">
                        <div class="col-12 my-0 pr-0">
                            <div class="actions text-right">
                                <a href="#" class="action-item action-favorite" data-toggle="tooltip" data-original-title="Mark as favorite">
                                    <i class="fas fa-star gieqsGold"></i>
                                </a>
                               
                            
                                <a href="#" class="action-item action-like active" data-toggle="tooltip" data-original-title="Like">
                                    <i class="fas fa-thumbs-up text-muted"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center text-break">
                        <div class="col-12 text-break">
                            <h5 class="card-title mb-0"><?php echo $value['name']; ?></h5>
                            <p class="text-muted mb-0"><?php echo $value['author']; ?></p>

                        </div>
                    </div>
                    
                </div>
                <a href="<?php echo BASE_URL . '/pages/learning/index.php?id=' . $value['id']; ?>">
                <img alt="Image placeholder" src="<?php echo $value['thumbnail']; ?>" class="img-fluid mt-2">
            </a>

                <div class="card-body">
                    <p class="card-text"><?php echo $value['description']; ?></p>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a href="<?php echo BASE_URL . '/pages/learning/index.php?id=' . $value['id']; ?>" class="btn btn-sm text-white gieqsGoldBackground">View</a>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-muted text-sm">time uploaded</span>
                        </div>
                    </div>
                </div>
                </div>
                   






<?php
                    }

                    if ($a % 3 == 0){
                        ?>
                        </div>
                        <div class="d-flex flex-row align-content-center mt-1 pt-0 px-0 text-white">

                        <?php
                    }

                    $a++;

                }

                if ($b > 9){

                    ?>

                </div>
                <div class="d-flex flex-row align-items-end mt-1 pb-6 pt-0 px-0 text-white">

                            <a href="<?php echo BASE_URL . '/pages/learning/index.php?id=' . $value['id']; ?>" class="align-self-end btn btn-sm text-white gieqsGoldBackground">Load more videos..</a>


                    <?php

                }

?>
