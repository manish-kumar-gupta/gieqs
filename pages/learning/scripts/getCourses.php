<?php




$openaccess = 1;
//$requiredUserLevel = 4;

require '../includes/config.inc.php';



require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');
/* 
     define('WP_USE_THEMES', false);
     spl_autoload_unregister ('class_loader');
     
     require(BASE_URI . '/assets/wp/wp-blog-header.php');
     
     spl_autoload_register ('class_loader'); */
     
//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');

function array_not_unique($a = array())
{
    return array_diff_key($a, array_unique($a));
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

$general = new general;

$navigator = new navigator;

$user = new users;

$usersLikeVideo = new usersLikeVideo;
$usersFavouriteVideo = new usersFavouriteVideo;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
$courseManager = new courseManager;


require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');

$programmeView = new programmeView;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');

$assets_paid = new assets_paid;



$data = json_decode(file_get_contents('php://input'), true);

$tagsToMatch = $data['tags'];

$loaded = $data['loaded'];

$loadedRequired = $data['loadedRequired'];

$active = $data['active'];

$videoset = $data['videoset'];

$assetid = $data['assetid'];


$gieqsDigitalv1 = $data['gieqsDigital'];

$thumbnails = $data['thumbnails'][0];

//then to get a particular thumbnail from wordpress is
// $thumbnails[wp_id]


$debug = false;


$loadedRequiredProduct = 10 * $loadedRequired;

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

$requiredTagCategories = $data['requiredTagCategories'];

//$requiredTagCategories = ['39', '40', '41', '42'];

?>

<?php

$videos = [];
$x = 0;


//more data processing

$data2 = $courseManager->returnAllCourses('2', false); //congress
$data2['description'] = 'Past GIEQs Symposia.  The flagship yearly event hosted by the GIEQs Foundation';
//ok

//take courses

$data3 = $courseManager->returnAllCourses('3', false); //congress

$data31 = []; //colonoscopy courses
$data32 = []; // polypectomy courses
$data33 = []; // other courses


foreach($data3 as $key=>$value){ 

    //var_dump($value);
                      
    //get the asset category

    $assets_paid->Load_from_key($value['id']);
    //var_dump($assets_paid);
    $supercategory = null;
    $supercategory = $assets_paid->getsupercategory();

    if ($supercategory == '1'){  //colonoscopy

        $data31[] = $value;


    }elseif ($supercategory == '2'){ // polypectomy

        $data32[] = $value;

    }else{

        $data33[] = $value;
    }
}



$data4 = $courseManager->returnAllCourses('4', $debug); //content pack
$data4['description'] = 'Premium Content Packages, focussed on a specific aspect of Everyday Endoscopy';


$data = [

'Past GIEQs Symposia' => $data2,
'Pro Content Packs' => $data4,
'Colonoscopy Virtual/Live Courses' => $data31,
'Polypectomy Virtual/Live Courses' => $data32,
'Other Virtual/Live Courses' => $data33,

];

if ($debug){
print_r($data);
}


$videos = $data;

if ($debug) {
    echo PHP_EOL . 'html build array contains:::' . PHP_EOL;
    print_r($videos);

    echo json_encode($videos);
}




?>


<?php

foreach ($data as $datakey=>$datavalue){

                //new script

                //using data2

                $a = 1;

                $b = count($datavalue);

                if ($b == 0){

                    ?>



<div class="d-flex flex-row flex-wrap justify-content-center mt-1 pt-0 px-0 text-white">
    <span class=" mt-3 mb-6 h6"><?php echo $emptyText;?></span>

</div>

<?php
                }

                

                foreach ($datavalue as $key=>$value){

                    

                    //make the html for the cards (in groups of +10)

                    if ($a == 1){

                        ?>
<p class="display-4 my-3 toc-item"><?php echo $datakey;?></p>
<p class="pl-4 mb-5"><?php echo $datavalue['description'];?></p>
<div class="d-flex flex-row flex-wrap justify-content-center mt-1 pt-0 px-0 text-white video-card">
    <?php }
                    if ($a < $loadedRequiredProduct){

                    
                    
?>

    <div class="card mr-md-4 individualVideo flex-even">
        <div class="card-header" style="height:175px;">
            <div class="row align-items-right my-0">
                <div class="col-12 my-0 pr-0">
                    <div class="actions text-right">
                        <a class="action-item action-favorite" data-toggle="tooltip"
                            data-original-title="Mark as favorite" data="<?php echo $value['id'];?>">
                            <i
                                class="fas fa-heart <?php if ($usersFavouriteVideo->matchRecord2way($userid, $value['id']) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"></i>
                        </a>


                        <a class="action-item action-like active" data-toggle="tooltip" data-original-title="Like"
                            data="<?php echo $value['id'];?>">
                            <i
                                class="fas fa-thumbs-up <?php if ($usersLikeVideo->matchRecord2way($userid, $value['id']) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center text-break">
                <div class="col-12 text-break">
                    <h5 class="card-title title mb-0 w-100"><?php echo $value['name']; ?></h5>
                    <!-- <p class="text-muted text-sm mt-1 mb-0 align-self-baseline">Author : <a class="author text-muted"
                            data-author="<?php echo $value['author'];?>" target="_blank"
                            href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php //echo $value['author'];?>"><?php //echo $user->getUserName($value['author']); ?></a>
                    </p> -->
                    <!-- <div class="d-flex flex-row-reverse">
                        <span class="badge text-dark p-1 type"
                            data-type="<?php //echo $navigator->getVideoTypeid($value['id']);?>"
                            style="color:rgb(238, 194, 120) !important;"><?php //echo $navigator->getVideoTypeidv2($value['id']);?></span>
                    </div> -->

                </div>
            </div>

        </div>
        <a
            href="<?php echo BASE_URL . '/pages/program/program_generic.php?id=' . $value['id']; ?>">
            <img alt="video image" src="<?php echo $thumbnails[$value['linked_blog']];?>" class="img-fluid mt-2 cursor-pointer">
        </a>

        <div class="card-body">
            <p class="card-text"><?php echo $value['description']; ?></p>
        </div>
        <div class="card-footer">
            <div class="row align-items-center">

                <?php 
                        
                        $videoIsGIEQsDigital = false;
                        $videoIsGIEQsDigital = ($navigator->videoIsGIEQsDigitalv1($value['id']) ? true : false);

                        
                        
                        if (!$videoIsGIEQsDigital){?>
                <div class="col-6">
                    <a href="<?php echo BASE_URL . '/pages/program/program_generic.php?id=' . $value['id']; ?>"
                        class="btn btn-sm text-dark gieqsGoldBackground">Discover</a>
                </div>
                <div class="col-6 text-right">
                    <!-- <span class="text-muted created text-sm"
                        data-created="<?php //echo $value['created'];?>"><?php //echo time_elapsed_string($value['created']);?></span> -->
                </div>
                <?php }else if ($videoIsGIEQsDigital) {?>
                <div class="col-4">
                    <a href="<?php echo BASE_URL . '/pages/learning/viewer.php?id=' . $value['id'] . '&referid=' . $data['referringUrl']; ?>"
                        class="btn btn-sm text-dark gieqsGoldBackground">View</a>
                </div>
                <div class="col-3">
                    <img class="img-responsive" width="140%"
                        src="<?php echo BASE_URL . '/assets/img/brand/gieqs_digital.png';?>">
                </div>
                <div class="col-5 text-right">
                    <span class="text-muted created text-sm"
                        data-created="<?php echo $value['created'];?>"><?php echo time_elapsed_string($value['created']);?></span>
                </div>


                <?php }else {?>


                <?php }?>

            </div>
        </div>
    </div>







    <?php
                    }

                    if ($a % 2 == 0){
                        ?>
</div>
<div class="d-flex flex-row flex-wrap justify-content-center mt-1 pt-0 px-0 text-white">

    <?php
                    }

                    $a++;

                }

                if ($b > $loadedRequiredProduct - 1){

                    ?>

</div>
<div class="d-flex flex-row-reverse flex-wrap mt-1 pb-6 pt-0 px-0 text-white">

    <button class="align-self-end btn btn-sm text-dark gieqsGoldBackground" id="loadMore">Load more videos..</button>


    <?php

                }

                if ($b == 1){

                    ?>
    <div class="d-flex flex-row flex-wrap card-placeholder justify-content-center mt-1 pt-0 px-0 text-white">
    </div>
    <div class="d-flex flex-row flex-wrap card-placeholder justify-content-center mt-1 pt-0 px-0 text-white">
    </div>
    <?php

                }

                if ($b == 2){

                    ?>
    <div class="d-flex flex-row flex-wrap card-placeholder justify-content-center mt-1 pt-0 px-0 text-white">
    </div>
    <?php

                }


echo '</div>';

            }




?>