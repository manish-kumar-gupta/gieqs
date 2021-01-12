<?php

//require '../../includes/config.inc.php';	

$url =  "{$_SERVER['REQUEST_URI']}";
                    $highlightComplex = preg_match (  '/complex/' ,  $url);
                    $highlightProgram = preg_match (  '/program/' ,  $url);
                    $highlightPlenary = preg_match (  '/plenary/' ,  $url);
                    $highlightNursing = preg_match (  '/nursing/' ,  $url);
                  

//define if any video cookies set

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/pages.class.php');
$pages = new pages;


$debug = false;

if(isset($_COOKIE['browsing'])) {

    $browsing = $_COOKIE['browsing'];

    if ($debug){

        var_dump($browsing);
    }

}else{

    $browsing = null;
}


if(isset($_COOKIE['browsing_id'])) {

    $browsing_id = $_COOKIE['browsing_id'];

    if ($debug){

        var_dump($browsing_id);
    }

}else{

    $browsing_id = null;
}    

if(isset($_COOKIE['browsing_array'])) {

    $browsing_array = json_decode($_COOKIE['browsing_array'], true);

    if ($debug){

        var_dump($browsing_array);
    }

}else{

    $browsing_array = null;
} 

//currently shows all live videos and non tagged videos (TODO)

if (isset($browsing) && isset($browsing_id) && is_array($browsing_array)){


    //is an asset

    

    if ($browsing == '2' || $browsing == '3' || $browsing == '4'){

        //load asset
        if ($assets_paid->Return_row($browsing_id)){

            $assets_paid->Load_from_key($browsing_id);

        }else{

            if ($debug){
                echo 'cannot load asset';
            }
        }



    //if all set, get array of videos associated with these parameters to which the user has access

    if ($debug){

        echo 'All required parameter cookies set';

    }

    if(isset($id)) {

        $currentVideo = $id;
    
        if ($debug){
    
            var_dump($id);
        }

        //id detected

        $position = array_search($id, $browsing_array);


        if ($position > -1){

            //is id in the array browsingArray?

            if ($debug){
    
                echo 'id detected in the browsing array at position ' . $position;
            }

            
            //get previous video and next video

            $nextVideo = $browsing_array[(intval($position) + 1)];

            if (!isset($nextVideo)){

                $lastVideo = true;
            }else{

                $lastVideo = false;
            }
            

            $previousVideo = $browsing_array[(intval($position) - 1)];

            if (!isset($previousVideo)){

                $firstVideo = true;
            }else{

                $firstVideo = false;
            }

            if ($debug){
    
                echo "NEXT video is $nextVideo and PREVIOUS video is $previousVideo";
                
                if ($firstVideo == true){
                
                    echo "this is the FIRST video ";
                    
                    }
                
                if ($lastVideo == true){
                
                echo "this is the LAST video ";

                }


            }

            $numberOfVideos = count($browsing_array);
          
            if ($debug){
    
                echo "This video is number $position of $numberOfVideos";
            }

        }else{


            if ($debug){
    
                echo 'id not deteced in the browsing array'; 
            }


        }        







    
    }else{
    

        //no id detected from viewer.php

        if ($debug){

            echo 'no id detected from viewer.php';
    
        }


    }
    
}elseif ($browsing == '5'){

    //browsing not a course or asset


    if(isset($id)) {

        $currentVideo = $id;
    
        if ($debug){
    
            var_dump($id);
        }

        //id detected

        $position = array_search($id, $browsing_array);


        if ($position > -1){

            //is id in the array browsingArray?

            if ($debug){
    
                echo 'id detected in the browsing array at position ' . $position;
            }

            
            //get previous video and next video

            $nextVideo = $browsing_array[(intval($position) + 1)];

            if (!isset($nextVideo)){

                $lastVideo = true;
            }else{

                $lastVideo = false;
            }
            

            $previousVideo = $browsing_array[(intval($position) - 1)];

            if (!isset($previousVideo)){

                $firstVideo = true;
            }else{

                $firstVideo = false;
            }

            if ($debug){
    
                echo "NEXT video is $nextVideo and PREVIOUS video is $previousVideo";
                
                if ($firstVideo == true){
                
                    echo "this is the FIRST video ";
                    
                    }
                
                if ($lastVideo == true){
                
                echo "this is the LAST video ";

                }


            }

            $numberOfVideos = count($browsing_array);
          
            if ($debug){
    
                echo "This video is number $position of $numberOfVideos";
            }

        }else{


            if ($debug){
    
                echo 'id not deteced in the browsing array'; 
            }


        }        







    
    }else{
    

        //no id detected from viewer.php

        if ($debug){

            echo 'no id detected from viewer.php';
    
        }


    }






}else{



}

    
//echo 'All set';


}else{

    if ($debug){

        echo 'one of required parameters $browsing and / or $browsing_id not set in cookies';

    }

    //delete the others?
}





//get an array of the videos associated with these parameters

//if tag filtering filter by tag


?>


<nav class="mt-4 navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="videoBar" style="margin-top: 20px; z-index: 2 !important;">
    <div class="container">
        <a class="navbar-brand cursor-pointer" id="start_tour"><?php echo 'Video Navigation';?>
            <!-- <small class="m-0 p-0"><br/><?php //echo 'Asset Name'?> --></small>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

<!--

Useful for PHP to JS transfer

-->
<div id='browsing_id' data-browsing-id="<?php echo $browsing_id;?>" class="d-none"></div>
<div id='browsing' data-browsing="<?php echo $browsing;?>" class="d-none"></div>
<div id='browsing_array' class="d-none"><?php echo json_encode($browsing_array);?></div>



        <div class="collapse navbar-collapse" id="navbar-warning">
            <!-- <ul class="navbar-nav align-items-lg-left ml-lg-auto">

                
            </ul> -->
            <ul class="navbar-nav justify-content-sm-center ml-sm-auto">

            <li class="nav-item">

<?php
            if ($browsing == '5'){

                ?>

<a href="<?php echo BASE_URL . '/pages/learning/pages/general/show_subscription.php?page_id=' . $browsing_id;?>" class="nav-link nav-link-icon gieqsGold">


                    <?php
            }else {

                ?>

<a href="<?php echo BASE_URL . '/pages/learning/pages/general/show_subscription.php?assetid=' . $browsing_id;?>" class="nav-link nav-link-icon gieqsGold">


                    <?php 

        }
                    
                    if ($browsing == '5'){
                        $pages->Load_from_key($browsing_id);
                        $first_part = $pages->gettitle();

                    }else{
                    $pieces = explode(" ", $assets_paid->getname());
$first_part = implode(" ", array_splice($pieces, 0, 4));
                    }
                    
                    ?>

                        <span class="nav-link-inner--text "><?php echo $first_part;?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL . '/pages/learning/viewer.php?id=' . $previousVideo;?>"
                        class="nav-link nav-link-icon <?php if ($firstVideo === true){echo 'disabled';}?>">

                        <span class="nav-link-inner--text ">
                        <i class="fas fa-arrow-left mr-2"></i> Previous</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon">

                        <span
                            class="nav-link-inner--text "><?php echo intval($position) + 1 . ' / ' .  $numberOfVideos;?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL . '/pages/learning/viewer.php?id=' . $nextVideo;?>"
                        class="nav-link nav-link-icon <?php if ($lastVideo === true){echo 'disabled';}?>">

                        <span class="nav-link-inner--text ">Next <i class="fas fa-arrow-right ml-2"></i></span>
                    </a>
                </li>

                <li class="nav-item dropdown-animate dropdown-submenu bg-dark" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Navigation
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a id="chapterNavTour" class="dropdown-item" data-toggle="collapse" href="#selectDropdown">

                            Toggle <span class="gieqsGold">Chapter</span> View
                        </a>
                        <a id="jumpTimeLine" class="dropdown-item cursor-pointer">Timeline
                        </a>

                        <div class="dropdown-divider"></div>
                        <a id="tourTagNav" class="dropdown-item cursor-pointer" data-toggle="collapse"
                            href="#collapseExample">

                            Toggle <span class="gieqsGold">Tag</span> Window View
                        </a>
                        <div class="dropdown-divider"></div>
                        <a id="jumpComments" class="dropdown-item cursor-pointer">


                            <span class="nav-link-inner--text ">Comments</span>
                        </a>
                        <a id="jumpReferences" class="dropdown-item cursor-pointer" data-toggle="collapse"
                            href="#collapseExample2">

                            <span class="nav-link-inner--text">References</span>
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown-animate dropdown-submenu bg-dark" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Show Me Around!
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item cursor-pointer showMeAround">

                            Overview Tour
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="showMeAroundLong dropdown-item cursor-pointer">Detailed Feature Tour
                        </a>



                    </div>
                </li>


                <!-- <li class="nav-item">
                    <a id="chapterNavTour" class="nav-link nav-link-icon" data-toggle="collapse" href="#selectDropdown">

                        <span class="nav-link-inner--text ">Show Chapters</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="tourTagNav" class="nav-link nav-link-icon" data-toggle="collapse" href="#collapseExample">

                        <span class="nav-link-inner--text ">Show Tags</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpTimeLine" class="nav-link nav-link-icon cursor-pointer">

                        <span class="nav-link-inner--text ">Timeline</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpComments" class="nav-link nav-link-icon cursor-pointer">


                        <span class="nav-link-inner--text ">Comments</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpReferences" class="nav-link nav-link-icon" data-toggle="collapse"
                        href="#collapseExample2">

                        <span class="nav-link-inner--text">References</span>
                    </a>
                </li> -->


                <!-- <li class="nav-item">
                   
                   <a class="nav-link nav-link-icon"
                       >
                       <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">LEVEL 4</span>
                       <span class="nav-link-inner--text ">GIEQs Pro Member</span></a>
                     
                   
                   
                   


                          


                                <span class="nav-link-inner--text ">Complex</span>
                           
               </li> -->
                <?php
                    
                ?>
                <!-- <li class="nav-item">
                    <a class="nav-link nav-link-icon"
                        href="<?php //echo BASE_URL;?>/pages/learning/pages/live/nursing.php">

                        <span class="nav-link-inner--text ">Nursing</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank"
                        href="<?php //echo BASE_URL;?>/pages/learning/pages/live/programLive.php">

                        <span class="nav-link-inner--text ">Live Programme</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://facebook.com/gieqs">
                        <i class="fab fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Share</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://twitter.com/gieqs_symposium">
                        <i class="fab fa-twitter"></i>
                        <span class="nav-link-inner--text d-lg-none">Tweet</span>
                    </a>
                </li> -->

            </ul>

        </div>
    </div>
</nav>