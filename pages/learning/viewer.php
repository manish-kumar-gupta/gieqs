<!DOCTYPE html>
<html lang="en">

<?php require 'includes/config.inc.php';?>


<head>

    <?php

error_reporting(E_NONE);


      //define user access level

      $openaccess = 0;

      $requiredUserLevel = 6;

      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;

      $users = new users;

      $usersViewsVideo = new usersViewsVideo;

      $usersSocial = new usersSocial;

      $usersLikeVideo = new usersLikeVideo;
        
        $usersFavouriteVideo = new usersFavouriteVideo;

        $userFunctions = new userFunctions;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>


    

    <style>
        .gieqsGold {

            color: rgb(238, 194, 120) !important;


        }

        .close > span:not(.sr-only) {
        color: white !important;
        }

        .collapsing {
    -webkit-transition: none;
    transition: none;
    display: none;
}

        .tagButton {

            cursor: pointer;

        }

        .tagCard {

background-color: #1b385dde;



}

.tagCardHeader{

    background-color: #162e4d;

}

        
.video {

    
box-sizing: border-box;
    /* height: 25.25vw; */
    /* min-height: 100%;
    min-width: 100%; */
    transform: translate(-50%, -50%);
    position: absolute;

}   
.cursor-pointer {

    cursor: pointer;

}

.card-body ::-webkit-scrollbar{

    display: none;

}

.card-body {

    -ms-overflow-style : none;
}

@media (min-width: 992px) {
    .tagCard {

            
left: -50vw;
top: -20vh;
min-width:30vw;


}
.video {
  box-sizing: border-box;
    height: 25.25vw;
    /* min-height: 100%;
    min-width: 100%; */
    transform: translate(-50%, -50%);
    position: absolute;
    left: 50%;
    top: 50%;
    width: 100.77777778vh;
    
}
#col-container{

    padding-left: 0px !important;
    padding-right: 0px !important;

}
}

@media (max-width: 576px) {
        #videoDisplay{

        width: 100vw;
        position: relative;
        margin-left: -50vw;
        left: 50%;
        height: auto;

        }
        }

@media (min-width: 1200px) {
        #chapterSelectorDiv{

            
                
                top:-3vh;
            

        }
        #playerContainer{

                margin-top:-20px;

        }
        #collapseExample {

            position: absolute; 
            max-width: 50vh; 
            z-index: 25;
        }

        #selectDropdown {

            
            z-index: 25;
            width: 200%;
            position: absolute;
            }

            

}
@media (min-width: 577px) {
@keyframes fade-in-up {
  0% { opacity: 0; }
  100% { transform: translateY(0); opacity: 1; }
}

@keyframes fade-in-up {
  0% {
    opacity: 0;
  }
  100% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    opacity: 1;
  }
}
.video-wrap {
  text-align: center;
}

.video iframe {
  max-width: 100%;
  max-height: 100%;
}
.video.stuck {
  z-index: 25;
  position: fixed;
  bottom: 20px;
  right: 20px;
  -webkit-transform: translateY(100%);
          transform: translateY(100%);
  width: 400px !important;
  
  -webkit-animation: fade-in-up .25s ease forwards;
          animation: fade-in-up .25s ease forwards;
}
}
/* swal-text {
  background-color: #162e4d;
  padding: 17px;
  border: 1px solid #F0E1A1;
  display: block;
  margin: 22px;
  text-align: center;
  color: #162e4d;
} */
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>

        


    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
				        if ($id){
		
							$q = "SELECT  `id`  FROM  `video`  WHERE  `id`  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
                                echo '<div class="container mt-10 mb-10">';
                                echo "Passed id does not exist in the database";
								echo '</div>';
								include(BASE_URI . "/footer.php");
								exit();
		
							}
						}else {
							echo '<div class="container mt-10 mb-10">';
							echo "This page requires the id of a video existing in the database to be passed";
							echo '</div>';
							include(BASE_URI . "/footer.php");
							exit();
							
                        }

        
                        if (isset($_GET["referid"])){
                            $referid = $_GET["referid"];
                        
                        }else{
                        
                            $referid = null;
                        
                        }
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>



        <div id="vimeoid" style="display:none;"><?php echo $general->getVimeoID($id);?></div>

					<div id="videoChapterData" style="display:none;"><?php echo $general->getVideoAndChapterDatav1($id);?>
					</div>

					<div id="videoChapterTagData" style="display:none;"><?php echo $general->getVideoAndChapterData($id);?>
					</div>

                    <div id="videoData" style="display:none;"><?php $videoDataMod = $general->getVideoDataMod($id);
                        
                        //print_r($videoDataMod);
                        
                        $author = $videoDataMod[0]['author'];
                        $tagger = $videoDataMod[0]['tagger'];
                        $recorder = $videoDataMod[0]['recorder'];
                        $editor = $videoDataMod[0]['editor'];


                        //echo $author;

                        $authorText = $users->getUserName($author);
                        $taggerText = $users->getUserName($videoDataMod[0]['tagger']);
                        $recorderText = $users->getUserName($videoDataMod[0]['recorder']);
                        $editorText = $users->getUserName($videoDataMod[0]['editor']);

                        $users->Load_from_key($author);

                        $videoDataMod[0]['author'] = $authorText;
                        $videoDataMod[0]['tagger'] = $taggerText;
                        $videoDataMod[0]['recorder'] = $recorderText;
                        $videoDataMod[0]['editor'] = $editorText;
                        $videoDataMod[0]['authorid'] = $author;
                        $videoDataMod[0]['taggerid'] = $tagger;
                        $videoDataMod[0]['recorderid'] = $recorder;
                        $videoDataMod[0]['editorid'] = $editor;
                        $videoDataMod[0]['centreName'] = $users->getcentreName($author);
                        $videoDataMod[0]['centreCity'] = $users->getcentreCity($author);
                        $country = $users->getcentreCountry($author);
                        $videoDataMod[0]['centreCountry'] = $general->getCountryName($country);

                        $users->endusers();
                        

                        echo json_encode($videoDataMod);

                        
                        ?></div>
                    
                    <div id="tagsData" style="display:none;"><?php echo $general->getTagsVideo($id);?></div>

                    <div id="tagCategories" style="display:none;"><?php $allCategories = $general->getAllTagCategories(); print_r($allCategories);?></div>


                    <!--RECORD THE USER DETAILS AND VIEW-->
<?php

//echo $userid; echo $id; echo 'hello';
                        if ($usersViewsVideo->matchRecord2way($userid, $id) === false){  
                            
                            //if not recorded already

                            echo $userid; echo $id;
                $usersViewsVideo->setuser_id($userid);
                $usersViewsVideo->setvideo_id($id);
                $usersViewsVideo->prepareStatementPDO();
            }

?>

                    <!--GET TAG CATEGORY NAME 
                    
                    <?php

                        $tagBox = null;

                        foreach ($allCategories as $key=>$value){

                            //display the header only if a match

                            //database query, is there a tag in this category associated with this video

                            if ($general->isThisTagCategoryRepresentedInVideo($id, $value['id'])){
                                
                                $tagBox .= '<div class="row align-items-left">';
                                    
                                    $tagBox .= '<span class="h6 mt-1"> ' . $value['tagCategoryName'] . '</span>';

                                    $tagsRequired = $general->getTagsVideoWithCategoryNonJSON($id);

                                    //print_r($tagsRequired);

                                    $tagBox .=  '</div>';
                                    
                                    $tagBox .= '<div class="row align-items-left">';

                                    foreach ($tagsRequired as $key1=>$value1){

                                        if ($value1['tagCategories_id'] == $value['id']){

                                            //remove clickability if user is above 4

                                            if ($currentUserLevel > 4){

                                                $tagBox .= '<span class="badge bg-gray-800 mx-2 mb-1" id="tag' . $value1['id'] . '">' . $value1['tagName'] . '</span>'; 

                                            }else{

                                           $tagBox .= '<span class="badge bg-gray-800 mx-2 mb-1 tagButton" id="tag' . $value1['id'] . '">' . $value1['tagName'] . '</span>'; 
                                            }
                                        }

                                    }

                                    

                                $tagBox .=  '</div>';

                                //$('#tagsDisplay').append('<span class="badge badge-info mx-2 my-2 tagButton" id="tag' + id + '">' + tagName + '</span>');

                                //echo $tagBox;

                            }else{

                                continue;
                            }
                            //if so display the card section

                            //if not continue
                            //look in the tagsVideo array
                            //check if any match 

                            


                        }


?>
                    
                TODO see other videos with similar tags, see videos with this tag, tag jump the video,
                list of chapters with associated tags [toggle view by category, chapter]
                
                -->


    <!-- Omnisearch -->
    <div id="omnisearch" class="omnisearch">
        <div class="container">
            <!-- Search form -->
            <form class="omnisearch-form">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </form>
            <div class="omnisearch-suggestions">
                <h6 class="heading">Search Suggestions</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>iphone 8</span> in Smartphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>beats pro solo 3</span> in Headphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>smasung galaxy 10</span> in Phones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content bg-gradient-dark">

    

        <div class="d-flex align-items-end">
            <div class="container mt-10 mt-lg-10 pt-4 pt-lg-4">
            <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb breadcrumb-links p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?php echo BASE_URL . '/pages/learning/index.php'?>">GIEQs online</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}" . $referid?>">Video Search</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Video Viewer</li>
                            </ol>
                        </nav>
                        <div class="row" style="margin-right:15px; margin-left:15px;">
                        <span class="h3 mb-0 text-white d-block w-lg-75 w-xl-75"><?php echo $general->getVideoTitle($id)?></span>
                        </div>
                        <div class="row" style="margin-right:15px; margin-left:15px;">
                        <span class="col-xl-8 text-muted text-md d-block my-2" id="videoDescription">Video subtitle</span>
                    </div>

                <div class="row">
                    <div class="col-lg-7 mb-0 mb-lg-0 pl-lg-5">
                        
                       
                        <div class="col text-left mt-0 align-items-center">
                                                    <div class="actions">
                                                        <a class="action-item action-favorite p-0 m-0 pr-4 likes" data="<?php echo $id;?>">
                                                            <i class="fas fa-heart mr-1 pr-1 <?php if ($usersFavouriteVideo->matchRecord2way($userid, $id) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>" data-toggle="tooltip" data-placement="bottom" title="favourite"></i> <span
                                                                id="likesNumber"><?php echo $usersSocial->countFavourites($id);?></span></a>
                                                            
                                                        <a class="action-item action-like p-0 m-0 pr-4 views" data="<?php echo $id;?>">
                                                            <i class="fas fa-thumbs-up mr-1 <?php if ($usersLikeVideo->matchRecord2way($userid, $id) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>" data-toggle="tooltip"
                                                            data-placement="bottom" title="like"></i> <span
                                                                id="viewsNumber"><?php echo $usersSocial->countLikes($id);?></span></a>

                                                        <a class="action-item p-0 m-0 pr-4 views"><i
                                                                class="fas fa-eye mr-1" data-toggle="tooltip"
                                                                data-placement="bottom" title="views"></i> <span
                                                                id="viewsNumber"><?php echo $usersSocial->countViews($id);?></span></a>
                                                        <a class="action-item p-0 m-0 pr-1 text-wrap"><i
                                                                class="fas fa-user mr-1"></i>
                                                            <span id="videoAuthor" class="flex-grow"></span>
                                                        </a>

                                                    </div>
                                                </div>
</div>
                            <div class="col-lg-2 mb-0 mb-lg-0 align-self-center">
                                <div class="text-right ">
                                
                                                        
                                <?php if ($currentUserLevel < 6){ // message to upgrade if basic?>
                                    <a class="dropdown-item" data-toggle="collapse" href="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-chevron-circle-up"></i> show tags
                                    </a>
                                    

                                <?php }else{?>
                                    <a class="dropdown-item" onclick="alert('Upgrade to view tags');"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-chevron-circle-up"></i> show tags
                                    </a>
                                    

                                <?php }?>
                                    <a class="dropdown-item" data-toggle="collapse" href="#selectDropdown"
                                        aria-expanded="false" aria-controls="selectDropdown">
                                        <i class="fas fa-chevron-circle-up"></i> show chapters
                                    </a>
                                    

</div>
                                <div class="collapse mb-0" id="collapseExample">
                                    <div class="card mb-0 tagCard">
                                    <div class="card-header tagCardHeader mb-0">
                                    <i style="float:right;" class="fas fa-times tagsClose cursor-pointer"></i>
                        <span class="h6">Tags <br/></span><span class="text-sm">(click to filter)</span><span class="text-sm text-right"> <a style="float:right;" class="cursor-pointer" onclick="undoFilterByTag();"><i class="fas fa-undo"></i>  Undo Filter</a></span>
                    </div>
                                        <div class="card-body mt-0 pt-0">
                                            
                                                <div id="tagsDisplay" class="flex-wrap">
                                                <?php echo $tagBox;?>
                                                </div>
                                                
                                            
                                        </div>
                                    </div>


                                </div>
                                <div class="collapse card mb-0 p-2 flex-row"  id="selectDropdown">
                            <div class="container">
                                <div class="row">
                                <span class="mb-0 pl-2 pt-2 flex-grow-1">Choose chapter</span>
                                <button type="button" class="close text-right text-white" data-toggle="collapse" href="#selectDropdown" aria-label="Close">
                              <span>&times;</span>
                            </button>
                    </div>
                    <div class="row">
                                <?php
                                if ($currentUserLevel == 1){}?>
                                <?php echo $general->getChapterSelector($id);?>
                    </div>
                    </div>
                            </div>
                    </div>
                    <div id='chapterSelectorDiv' class="col-lg-3 mb-0 mb-lg-0 mt-2 py-0 text-center vertical-align-top">

                        <div class="card mb-0">
                            <div class="card-header" style="    padding-right: 0.5em;
    padding-left: 1.5em;
    padding-bottom: 0.5em;
    padding-top: 0.5em;">
                                <div class="d-flex justify-content-between align-items-center p-0">
                                    <div>
                                        <h6 class="mb-0">Chapter Navigation</h6>
                                    </div>
                                    <div class="text-right">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="fas fa-sync" data-toggle="tooltip" data-placement="bottom" title="restart video"></i></a>

                                           <!-- <a class="action-item" data-toggle="collapse" href="#selectDropdown"><i
                                                    class="fas fa-ellipsis-h" data-toggle="tooltip" data-placement="bottom" title="show chapters"></i></a> -->

                                            <?php if ($isSuperuser == 1){?>
                                            
                                            <a href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/videoChapterForm.php?id=<?php echo $id;?>" class="action-item"><i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="edit video"></i></a>

                                            <?php }?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="list-group">


                                <a class="list-group-item p-0">

                                    <div class="d-flex align-items-center justify-content-between">

                                        <div class="flex-fill p-2 text-limit">
                                            <h6 id="chapterHeadingControl" class="progress-text mb-1 text-sm d-block text-limit text-left">Video Credits
                                            </h6>
                                            <div id="myProgress" class="progress progress-xs mb-0">
                                                <div id="myBar" class="progress-bar bg-gieqsGold" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div
                                                class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                                                
                                                <div>
                                                    <i id='video-back' class="fas fa-step-backward cursor-pointer"></i>
                                                </div>
                                                <div>
                                                    <i id='video-start-pause' class="fas fa-play cursor-pointer"></i>
                                                </div>
                                                <div>
                                                    <i id='video-stop' class="fas fa-stop cursor-pointer"></i>
                                              </div>
                                                <div>
                                                <i id='video-forward' class="fas fa-step-forward cursor-pointer"></i>
                                                </div>
                                                <div>
                                                    <span id='currentChapterTime'></span>

                                                </div>
                                            
                                                
                                               <!--  <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1"></label>
                                                </div> -->
                                                
                                                <div class="font-weight-bold gieqsGold">
                                                    <span id="currentChapter">x</span> / <span id="totalChapters">y</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    




    <div id="playerContainer" class="d-flex align-items-end" style="padding-left:15px; padding-right:15px;">
        <div class="container mt-2 mb-2 py-0">
            <div class="row">
                <div id="col-container" class="col-lg-9 mb-0 mb-lg-0 pr-lg-3">


               
            <div class="container">
            <div id="videoDisplay" class="embed-responsive embed-responsive-16by9 video-wrap">
                    
                        </div>
                </div>
</div>
                <div class="card p-0 col-lg-3 bg-dark mt-2 mt-lg-0 mb-0 mb-lg-0 text-center vertical-align-center">
                <div class="card-header" style="padding-right: 0.5em;
    padding-left: 0.5em;
    padding-bottom: 0.5em;
    padding-top: 0.5em;">
                    <span id="chapterHeading" class="h6 mb-0 text-white d-block">Video Credits</span>
</div>
<div class="card-body" style="padding-right: 0.2em;
    padding-left: 0.2em;
    padding-bottom: 0.2em;
  
    padding-top: 0.5em; max-height: 40vh; overflow-y: scroll;">
                    <span id="chapterDescription" class="mt-2 p-2 d-block text-left">
                        <table class="w-100 text-sm">
                        <tr>                        
                        <td>Performed by : </td><td><span class="text-white"><a class="text-white" href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $videoDataMod[0]['authorid']?>"><?php echo $videoDataMod[0]['author'];?></a></span></td>
                                            </tr>
                        <tr>
                       <?php if ($videoDataMod[0]['recorder']){?>
                        <td>Filmed by : </td><td><span class="text-white"><a class="text-white" href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $videoDataMod[0]['recorderid']?>"><?php echo $videoDataMod[0]['recorder'];?></a></span></td>
                       <?php }?>
                       </tr>
                       <tr>
                       <?php if ($videoDataMod[0]['editor']){?>
                        <td>Cut by : </td><td><span class="text-white"><a class="text-white" href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $videoDataMod[0]['editorid']?>"><?php echo $videoDataMod[0]['editor'];?></a></span></td>
                       <?php }?>
                       </tr>
                       <tr>
                       <?php if ($videoDataMod[0]['recorder']){?>
                        <td>Tagged by : </td><td><span class="text-white"><a class="text-white" href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $videoDataMod[0]['taggerid']?>"><?php echo $videoDataMod[0]['tagger'];?></a></span></td>
                       <?php }?>
                       </tr>
                       </table>
                       
                        </span>
</div>
<div class="card-footer tagFilterDisplayArea">
</div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-end bg-gradient-dark">
        <div class="container mt-4 pt-0 pt-lg-0">
            <div class="row">
                <div class="col-lg-9 mb-0 mb-lg-0">
                    <p class="text-left d-flex align-items-left">
                    <!-- <a class="dropdown-item" data-toggle="collapse" href="#collapseExamplenotyet" aria-expanded="false"
                            aria-controls="collapseExample2">
                            <i class="fas fa-chevron-circle-up"></i> show histopathology result
                        </a> -->
                        <?php if ($currentUserLevel< 5){ // message to upgrade if standard?>

                        <a class="dropdown-item" data-toggle="collapse" href="#collapseExample2" aria-expanded="false"
                            aria-controls="collapseExample3">
                            <i class="fas fa-chevron-circle-up"></i> show references
                        </a>
                        <?php }else{?>
                            <a class="dropdown-item" onclick="alert('Upgrade to view references for tags');" aria-expanded="false"
                            aria-controls="collapseExample3">
                            <i class="fas fa-chevron-circle-up"></i> show references
                        </a>
                            <?php } ?>


                        <?php if ($currentUserLevel <6){ ?>
                        <a class="dropdown-item" data-toggle="collapse" href="#collapseExample3" aria-expanded="false"
                            aria-controls="collapseExample3">
                            <i class="fas fa-chevron-circle-up"></i> show comments
                        </a>
                        <?php }else{// message to upgrade if basic?>
                            
                            <a class="dropdown-item" onclick="alert('Upgrade to comment on cases');" aria-expanded="false"
                            aria-controls="collapseExample3">
                            <i class="fas fa-chevron-circle-up"></i> show comments
                        </a>


                        <?php } ?>
                    </p>
                    
                    <div class="collapse" id="collapseExample2">
                        <div class="card">
                            <div class="card-footer">
                            <span class="h5 mb-4">References</span>
                                <div class="flex-row flex-wrap mt-2">
                                
                                    <div>
                                        <?php echo $general->getFullReferenceListVideo($id);?>
                                        <!-- 
                                        <span class="badge badge-primary mx-2">
                                            ref 1
                                        </span>
                                        <span class="badge badge-primary mx-2">
                                            ref 2
                                        </span>
                                    
                                    
                                    -->
                                    </div>
                                    <div class="text-right text-right">
                                        
                                        <div class="actions">

                                            <a class="action-item"><i class="fas fa-info mr-1" data-toggle="tooltip" title="click on the references to go to PubMed"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample3">
                        <div class="card">
                        <div class="card-header pt-4 pb-2">
                <div class="d-flex align-items-center">
                <a class="avatar bg-gieqsGold text-dark avatar-md rounded-circle mr-3 p-1">
                        <?php echo $userFunctions->getUserInitials($userid);?>
                      </a>
                  <div class="avatar-content">
                    <h6 class="mb-0">Comments</h6>
                    <div class="d-flex">
<!--                     <small class="d-block text-muted mr-2"><i class="fas fa-clock mr-2"></i>Profile updated : 3 hrs ago</small>
 -->                    <small class="d-block text-muted mr-2"><i class="fas fa-pen mr-2"></i>Commenting Publicly as <?php echo $userFunctions->getUserName($userid);?></small>
</div>

                  </div>
                </div>
              </div>
              <div class="card-body">
                  <!-- Comments-->
                <div class="mb-3">
                    <div id="commentsArea">
                  
                  <!-- <div class="media media-comment">
                    <img alt="Image placeholder" class="rounded-circle shadow mr-4" src="../../assets/img/theme/light/team-3-800x800.jpg" style="width: 64px;">
                    <div class="media-body">
                      <div class="media-comment-bubble left-top">
                        <h6 class="mt-0">Tom Cruise</h6>
                        <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                        <div class="icon-actions">
                          <a href="#" class="love active">
                            <i class="fas fa-heart"></i>
                            <span class="text-muted">20 likes</span>
                          </a>
                          <a href="#">
                            <i class="fas fa-comment"></i>
                            <span class="text-muted">3 replies</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div> -->
                                            </div>
                  <div class="media mt-3 media-comment align-items-center">
                  <a class="avatar bg-gieqsGold text-dark avatar-md rounded-circle mr-3 p-1"><?php echo $userFunctions->getUserInitials($userid);?></a>
                    <div class="media-body">
                      <form id="commentForm" validate>
                        <div class="form-group mb-0">
                          <div class="input-group input-group-merge">
                            <textarea class="form-control" id="comment" name="comment" data-toggle="autosize" placeholder="Write your comment" rows="1"></textarea>
                            <div class="input-group-append">
                              <button id="submitComment" class="btn btn-primary" type="button">
                                <span class="far fa-paper-plane"></span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                                            </div>
                            <div class="card-footer">
                                <div class="row align-items-left p-2">
                                    <span class="small text-muted">Comments are moderated for inapropriate content.  Offending users will have their commenting priveledges blocked and may be removed from the site.  Maximum 5 comments per video.</span>
                                    <!-- <div class="col">
                                        <span class="badge badge-primary mx-2">
                                            comment 1
                                        </span>
                                        <span class="badge badge-primary mx-2">
                                            comment 2
                                        </span>
                                    </div> -->
                                    <div class="col text-right text-right">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="fas fa-info mr-1"></i></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
    </div>



    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="registerInterest" tabindex="-1" role="dialog" aria-labelledby="registerInterestLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">Thank-you for
                        your interest in GIEQs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="h6">Registration will open in late January 2020. <br /> </span><span>Prior to this you
                        can register your interest below and we will keep you updated on everything GIEQs.</span>
                    <hr>
                    <form id='pre-register'>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="please enter your name">
                            </div>
                            <label for="email">Email address:</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="please enter your email address">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <span>Your email address will only be used to update you on GIEQs</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-small btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitPreRegister" type="button" class="btn-small text-black"
                        style="background-color: rgb(238, 194, 120);">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
  
    <!-- Google maps -->
    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script>
    var videoPassed = $("#id").text();
                    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/endowiki-player.js"?>></script>
    <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {

            var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null,
            "0"); //insert new object

            esdLesionObject.done(function (data) {

                console.log(data);

                var dataTrim = data.trim();

                console.log(dataTrim);

                if (dataTrim) {

                    try {

                        dataTrim = parseInt(dataTrim);

                        if (dataTrim > 0) {

                            alert("Thank you for your details.  We will keep you updated on everything GIEQs.");
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });

                        }

                    } catch (error) {

                        //data not entered
                        console.log('error parsing integer');
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });


                    }

                    //$('#success').text("New esdLesion no "+data+" created");
                    //$('#successWrapper').show();
                    /* $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
                      $("#successWrapper").slideUp(500);
                    });
                    edit = 1;
                    $("#id").text(data);
                    esdLesionPassed = data;
                    fillForm(data); */




                } else {

                    alert("No data inserted, try again");

                }


            });
        }

        function getComments(){

            var videoid = videoPassed;
            
                //alert(videoid);
                //$(this).children('.fa-thumbs-up').addClass('gieqsGold');
                //$(this).children('.fa-thumbs-up').removeClass('text-muted');
                
                //AJAX to add the like

                

                //change state

//ajax to a script to update

                

                


                var dataToSend = {

                    videoid: videoid,
                    
                    

                }

                    //const jsonString2 = JSON.stringify(dataToSend);

                    const jsonString = JSON.stringify(dataToSend);
                    //console.log(jsonString);
                    //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

                    var request2 = $.ajax({
                    beforeSend: function () {


                    },
                    url: siteRoot + "scripts/queries/getCommentsVideo.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                    });



                    request2.done(function (data) {
                    // alert( "success" );
                    if (data){
                        //show green tick
                        console.log(data);

                        $('#commentsArea').html(data);
                        
                        
                        //$('#notification-services').delay('1000').addClass('is-valid');
                        
                            
                            

                    }
                    //$(document).find('.Thursday').hide();
                    //$(icon).prop("disabled", false);
                    })

                
                //$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
                //remove the check from the tag removed


        }
        
        function submitCommentForm(){


            //console.log('reached submit');

            //alert('hello');

            var videoid = videoPassed;
            var type = 1;
            var comment = $('#comment').val();
                //alert(videoid);
                //$(this).children('.fa-thumbs-up').addClass('gieqsGold');
                //$(this).children('.fa-thumbs-up').removeClass('text-muted');
                
                //AJAX to add the like

                var icon = $('#submitComment');
                $(icon).prop("disabled", true);

                //change state

//ajax to a script to update

                

                


                var dataToSend = {

                    videoid: videoid,
                    type: type,
                    comment: comment,
                    

                }

                    //const jsonString2 = JSON.stringify(dataToSend);

                    const jsonString = JSON.stringify(dataToSend);
                    //console.log(jsonString);
                    //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

                    var request2 = $.ajax({
                    beforeSend: function () {


                    },
                    url: siteRoot + "scripts/useractions/addUserComment.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                    });



                    request2.done(function (data) {
                    // alert( "success" );
                    if (data == 1){
                        //show green tick

                        $('#comment').val('')
                        getComments();
                        //$('#notification-services').delay('1000').addClass('is-valid');
                        
                            
                        

                    }else if (data == 0){

                        Swal.fire({
                            type: 'error',
                            title: 'Further comments not allowed',
                            text: 'You cannot comment more than 5 times on the same video.',
                            background: '#162e4d',
                            confirmButtonText: 'ok', 
                            confirmButtonColor: 'rgb(238, 194, 120)', 

                        }).then((result) => {
                            $('#comment').val('')
                            getComments();

                        })

                    }
                    //$(document).find('.Thursday').hide();
                    $(icon).prop("disabled", false);
                    })

                
                //$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
                //remove the check from the tag removed

               
        }

        $(document).ready(function () {

            
            getComments();

            /* $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            }); */

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#selectDropdown').length && 
                    $('#selectDropdown').is(":visible")) {
                        $('#selectDropdown').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            });
            
            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample2').length && 
                    $('#collapseExample2').is(":visible")) {
                        $('#collapseExample2').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample3').length && 
                    $('#collapseExample3').is(":visible")) {
                        $('#collapseExample3').collapse('hide');
                    }        
            });

            $(document).on('click', '.tagsClose', function(){

                $('#collapseExample').collapse('hide');

            })

            $('.referencelist').on('click', function (){
		
		
		//get the tag name
		
		var searchTerm = $(this).attr('data');
		
		//console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);
		
		PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm, 'PubMed Search (endoWiki)', 800, 700);

		
		
		
		
	})

	$('.referencelist').on('mouseenter', function (){

		$(this).css('color', 'rgb(238, 194, 120)');
		$(this).css('cursor', 'pointer');

	})

	$('.referencelist').on('mouseleave', function (){

		$(this).css('color', 'white');
		$(this).css('cursor', 'default');

    })
    
    $(document).on('click', '.action-like', function(){

//alert('hello');

var videoid = $(this).attr('data');
//alert(videoid);
//$(this).children('.fa-thumbs-up').addClass('gieqsGold');
//$(this).children('.fa-thumbs-up').removeClass('text-muted');

//AJAX to add the like

var icon = $(this).children('.fa-thumbs-up');
$(icon).prop("disabled", true);

//change state

//ajax to a script to update

if($(icon).hasClass('gieqsGold')){
    var liked = 1;  // already liked
    /* $(icon).addClass('text-muted');
    $(icon).removeClass('gieqsGold'); */

}else{
    var liked = 0;  // not liked yet
    /* $(icon).removeClass('text-muted');
    $(icon).addClass('gieqsGold'); */
}

$(icon).prop("disabled", false);

if (liked == 0){

    var type = 1;

}else if (liked == 1){

    var type = 2;

}

var dataToSend = {

    videoid: videoid,
    type: type,
    

}

    //const jsonString2 = JSON.stringify(dataToSend);

    const jsonString = JSON.stringify(dataToSend);
    //console.log(jsonString);
    //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

    var request2 = $.ajax({
    beforeSend: function () {


    },
    url: siteRoot + "scripts/useractions/updateUserLike.php",
    type: "POST",
    contentType: "application/json",
    data: jsonString,
    });



    request2.done(function (data) {
    // alert( "success" );
    if (data == 1){
        //show green tick

        if (liked == 1){

            $(icon).addClass('text-muted');
            $(icon).removeClass('gieqsGold');
            $(icon).removeClass('animated');
            $(icon).removeClass('heartBeat');

        }else if (liked == 0){

            $(icon).removeClass('text-muted');
            $(icon).addClass('gieqsGold');
            $(icon).addClass('animated');
            $(icon).addClass('heartBeat');
            

        }
        
        //$('#notification-services').delay('1000').addClass('is-valid');
        
            
            

    }
    //$(document).find('.Thursday').hide();
    $(icon).prop("disabled", false);
    })


//$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
//remove the check from the tag removed


})

$(document).on('click', '.action-favorite', function(){

//alert('hello');

var videoid = $(this).attr('data');
//alert(videoid);
//$(this).children('.fa-thumbs-up').addClass('gieqsGold');
//$(this).children('.fa-thumbs-up').removeClass('text-muted');

//AJAX to add the like

var icon = $(this).children('.fa-heart');
$(icon).prop("disabled", true);

//change state

//ajax to a script to update

if($(icon).hasClass('gieqsGold')){
    var liked = 1;  // already liked
    /* $(icon).addClass('text-muted');
    $(icon).removeClass('gieqsGold'); */

}else{
    var liked = 0;  // not liked yet
    /* $(icon).removeClass('text-muted');
    $(icon).addClass('gieqsGold'); */
}

$(icon).prop("disabled", false);

if (liked == 0){

    var type = 1;

}else if (liked == 1){

    var type = 2;

}

var dataToSend = {

    videoid: videoid,
    type: type,
    

}

    //const jsonString2 = JSON.stringify(dataToSend);

    const jsonString = JSON.stringify(dataToSend);
    //console.log(jsonString);
    //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

    var request2 = $.ajax({
    beforeSend: function () {


    },
    url: siteRoot + "scripts/useractions/updateUserFavourite.php",
    type: "POST",
    contentType: "application/json",
    data: jsonString,
    });



    request2.done(function (data) {
    // alert( "success" );
    if (data == 1){
        //show green tick

        if (liked == 1){

            $(icon).addClass('text-muted');
            $(icon).removeClass('gieqsGold');
            $(icon).removeClass('animated');
            $(icon).removeClass('heartBeat');

        }else if (liked == 0){

            $(icon).removeClass('text-muted');
            $(icon).addClass('gieqsGold');
            $(icon).addClass('animated');
            $(icon).addClass('heartBeat');
            

        }

        //TODO update views and likes number here
        
        //$('#notification-services').delay('1000').addClass('is-valid');
        
            
            

    }
    //$(document).find('.Thursday').hide();
    $(icon).prop("disabled", false);
    })


//$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
//remove the check from the tag removed


})

$(document).on('click', '#submitComment', function () {

event.preventDefault();

$('#commentForm').submit();

})

$("#commentForm").validate({

invalidHandler: function (event, validator) {
  var errors = validator.numberOfInvalids();
  console.log("there were " + errors + " errors");
  if (errors) {
    var message = errors == 1 ?
      "1 field contains errors. It has been highlighted" :
      +errors + " fields contain errors. They have been highlighted";


    $('#error').text(message);
    //$('div.error span').addClass('form-text text-danger');
    //$('#errorWrapper').show();

    $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function () {
      $("#errorWrapper").slideUp(500);
    });
  } else {
    $('#errorWrapper').hide();
  }
},
ignore: [],
rules: {

  //EDIT







  comment: {
    required: true,
    maxlength: 600,
    minlength: 25,

  },





















},
submitHandler: function (form) {

  //submitPreRegisterForm();

  submitCommentForm();

  //TODO submit changes
  //TODO reimport the array at the top
  //TODO redraw the table



}




});


        })
    </script>
</body>

</html>