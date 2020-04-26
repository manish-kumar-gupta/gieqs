<?php

$openaccess = 1;
//$requiredUserLevel = 4;

require '../includes/config.inc.php';

$debug = true;

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

//$key = $data['key'];

//error_reporting(E_ALL);

//define user access level

?>


        <?php

$requiredTagCategories = ['39', '40', '41', '42'];

?>

        <?php

$tags = [];
$x = 0;

foreach ($requiredTagCategories as $key => $value) {

    //echo $value;

    $tagCategory = $value;
    if ($debug) {

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

    $data2 = $navigator->getVideoData($value, $tagsToMatch, $debug);

    if ($debug) {

        echo 'full video data for ' . print_r($tagsToMatch) . 'and tagCategory ' . $value;
        echo PHP_EOL . print_r($data2);
    }

    //WORK AROUND DUE TO NO JOIN IN TAGS VERSUS TAG CATEGORIES

    $videos1 = [];
    $y = 0;
    foreach ($data2 as $key => $value) {

        $videos1[$y] = $value['id'];
        $y++;

        //get all tags associated with this video

    }

    //only if count of array higher than 1

    

    foreach ($data2 as $key => $value) {

        $tags[$x] = $value['id'];
        $x++;

    }

    //print_r($data1);

    // print_r($data2);

    //print_r($data3); //gives the tags that can be enabled rest disabled

    ?>








            <?php
}

if ($debug) {

    print_r($tags);
}
echo json_encode($tags);

?>


                <?php

                //new script

                //using data2

                $a = 0;

                foreach ($data2 as $key=>$value){



                    //make the html for the cards (in groups of +10)
                    if ($a < 10){

?>
                <div class="card mr-md-4">
                <div class="card-header">
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
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="card-title mb-0">Resection of a sigmoid LSL with evidence of submucosal invasive cancer</h5>
                            <p class="text-muted mb-0">Author Name</p>

                        </div>
                    </div>
                    
                </div>
                <img alt="Image placeholder" src="https://i.vimeocdn.com/video/815721948_1280x720.jpg?r=pad" class="img-fluid mt-2">

                <div class="card-body">
                    <p class="card-text">Hybrid ESD / EMR technique using water immersion for the resection of a sigmoid LSL with evidence of underlying submucosal invasive cancer using endoscopic imaging.</p>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a href="#" class="btn btn-sm text-white gieqsGoldBackground">View</a>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-muted text-sm">time uploaded</span>
                        </div>
                    </div>
                </div>
            </div>







<?php
                    }



                    $a++;

                }

?>
