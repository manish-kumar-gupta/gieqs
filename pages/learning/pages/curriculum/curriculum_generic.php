<!DOCTYPE html>
<html lang="en">

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 0;
      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      $users = new users;


      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();
      

      require_once BASE_URI . '/assets/scripts/classes/curriculae.class.php';
      $curriculae = new curriculae;

      require_once BASE_URI . '/pages/learning/classes/general.class.php';
      $general = new general;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_items.class.php';
      $curriculum_items = new curriculum_items;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_references.class.php';
      $curriculum_references = new curriculum_references;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_sections.class.php';
      $curriculum_sections = new curriculum_sections;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_tags.class.php';
      $curriculum_tags = new curriculum_tags;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_manager.class.php';
      $curriculum_manager = new curriculum_manager;
      
   
      ?>

    <!--Page title-->

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <script src="<?php echo BASE_URL;?>/pages/learning/includes/generaljs.js"></script>


    <style>
    .divider-icon::before {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .divider-icon::after {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .gieqsGold {

        color: rgb(238, 194, 120);


    }

  

    .text-container {

font-family: 'nunito', sans-serif;
font-size: 1.3rem !important;
font-weight: 300;
line-height: 1.7 !important;
text-align: left !important;
color: #95aac9;
}

.text-container strong{

font-weight: 500;
color: #e3ebf6;
}

   /*  .text-container p {

        font-size: 1.2rem !important;
        padding-left: 1.1rem;
    } */

    .text-container h2 {

        margin-top: 4rem;
        color: rgb(238, 194, 120);

    }

    .text-container h3 {

        display: list-item;
        /* This has to be "list-item"                                               */
        list-style-type: disc;
        /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-type     */
        list-style-position: inside;
        /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-position */

        margin-top: 2rem;

        padding-left: 1rem;
    }

    /* .text-container p strong {

        color: rgb(238, 194, 120);
    } */

    .text-container ul {

        font-size: 1.3rem !important;
        padding-left: 5rem;

    }

    .card-placeholder {

        width: 344px;

    }

    .break {
        flex-basis: 100%;
        height: 0;
    }

    .flex-even {
        flex: 1;
    }

    .flex-nav {
        flex: 0 0 18%;
    }



    .gieqsGoldBackground {

        background-color: rgb(238, 194, 120);


    }

    .tagButton {

        cursor: pointer;

    }





    .cursor-pointer {

        cursor: pointer;

    }

    @media (max-width: 768px) {

        .flex-even {
            flex-basis: 100%;
        }
    }

    @media (max-width: 768px) {

        .card-header {
            height: 250px;
        }

        .card-placeholder {

            width: 204px;

        }


        /* #sticky {
position: absolute !important;
top: 0px;
}  */



    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

        }




    }
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

        if (isset($id)){
        $curriculae->Load_from_key($id);

        }else{

            echo 'No id passed to display curriculum';
            die();
        }
				    
                        
                        
		
        ?>

    <!-- load all video data -->

    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <!--- specifiy the tag Categories required for display  CHANGEME-->



    <!--CONSTRUCT TAG DISPLAY-->

    <!--GET TAG CATEGORY NAME 
                    
                    <?php

                    //define the page for referral info

                    //$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                    $url =  "{$_SERVER['REQUEST_URI']}";

                    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

                    ?>
-->

    <div id="escaped_url" style="display:none;"><?php echo $escaped_url;?></div>

    <!--
                    
                TODO see other videos with similar tags, see videos with this tag, tag jump the video,
                list of chapters with associated tags [toggle view by category, chapter]
                
                -->


    <!-- Omnisearch -->

    <?php 
    //error_reporting(E_ALL);
    //include(BASE_URI . '/pages/learning/assets/gpatNav.php');

    
    $debug = false;
    $_SESSION['debug'] = false;

    ?>



    <div class="main-content container bg-dark mt-10">

        <!--Header CHANGEME-->

        <div class="container pt-4">

        <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb breadcrumb-links p-0 m-0">
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL . '/pages/learning/index.php'?>">GIEQs
                                Online</a></li>
                        <li class="breadcrumb-item"><a
                                href=""">Curriculae</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $curriculae->getlong_name();?></li>
                    </ol>
                    <div class="alert alert-dark d-none sticky-top" role="alert" style="position:absolute !important;">
                    </div>
                </nav>

            <p class="h1 mt-2"><?php echo $curriculae->getlong_name();?></p>

           

            <title><?php echo $curriculae->getlong_name();?> - GIEQs Curriculum</title>


        </div>
        <div class="container-fluid text-container">
            <p class="pl-4 mt-2"><?php echo $curriculae->getdescription(); ?></p>

        </div>









        <div class="container-fluid mt-3">



            <script>
            function round(value, precision) {
                var multiplier = Math.pow(10, precision || 0);
                return Math.round(value * multiplier) / multiplier;
            }








            $(document).ready(function() {



                $(window).scroll(function() {
                    var scrollDistance = $(window).scrollTop();


                    // Assign active class to nav links while scolling
                    $('h2').each(function(i) {
                        if ($(this).position().top <= scrollDistance) {
                            $('.section-nav a.text-gieqsGold').removeClass('text-gieqsGold').addClass(
                                'text-muted');
                            $('.section-nav a').eq(i).addClass('text-gieqsGold').removeClass(
                                'text-muted');
                        }
                    });
                }).scroll();




            })
            </script>


            </head>

            <body>



                <div class='content'>
                    <div class="row">



                        <div id="right" class="col-lg-3 col-xl-3 border-right">
                            <!--         	<div class="h-100 p-4"> -->
                            <div id="sticky" data-toggle="sticky" class="is_stuck pr-3 mr-3 pl-2 pt-2">
                                <div id="messageBox" class='text-left text-white pb-2 pl-2 pt-2'></div>
                                <div class="d-flex flex-nowrap text-small text-muted text-right px-3 mt-1 mb-3 ">







                                </div>


                                <div id="errorWrapper"
                                    class="error alert alert-warning alert-flush alert-dismissible collapse bg-gieqsGold"
                                    role="alert">
                                    <strong>Check the form!</strong> <span id="error"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="successWrapper"
                                    class="success alert alert-success alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Success!</strong> <span id="success"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div id="warningWrapper"
                                    class="warning alert alert-warning alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Warning!</strong> <span id="warning"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <h6 class="mt-3 mb-3 pl-2 h5">Jump to Section</h6>

                                <ul class="section-nav">



                                </ul>










                            </div>

                        </div>

                        <div class="col-lg-9 text-container">


                            <?php
          
          //$id = 1;

//get the required curriculum

//$curriculae->Load_from_key($id);

//echo the title

//echo '<h1>' . $curriculae->getlong_name() . '</h1>';
//change <<title>> tag

//description
//echo $curriculae->getdescription();

//get all tag categories

$y = 1;
        $z = 2;

$allCategories = $general->getAllTagCategories();

if ($debug){

    print_r($allCategories);

}


$sections = $curriculum_manager->getsectionscurriculum($id);

if ($debug){

var_dump($sections);

}

$x=1;

$section_heading = true;


foreach ($sections as $section_key=>$section_value){


    $curriculum_sections->Load_from_key($section_value);


    //foreach section echo the blocks

    $items = $curriculum_manager->getitemssection($section_value);


    if (!is_array($items)){

        if ($section_heading === false){
        echo '</div>';
        $section_heading = true;

        }

        echo '<div class="curriculum-section">'; //section heading do this

        echo '<h1 class="mt-3 toc-marker super-section" tocid="' . $curriculum_sections->getid() . '" data="' . $curriculum_sections->getname() . '">' . $curriculum_sections->getlong_name() . '</h1>';  //section


    }else{

        $section_heading = false;

           /*  echo '<div class="curriculum-section">'; //section heading do this
            $section_heading = true;
 */

        

        echo '<h2 class="ml-3 toc-marker minor-section" tocid="' . $curriculum_sections->getid() . '" data="' . $curriculum_sections->getname() . '">' . $curriculum_sections->getlong_name() . '</h2>';  //section


    }




    if ($debug){

        var_dump($items);
        echo '<br/><br/>This item has ' . count($items) . ' sections';
        echo '<br/>$items is array ' . var_dump(is_array($items));
        
        }

        

    foreach ($items as $items_key=>$items_value){

        echo '<div class="card bg-dark">';
        echo '<div class="actions" style="position:absolute; right:20px; top:20px;">';
        echo '<i  class="cursor-pointer fas fa-tag mx-3" data-toggle="collapse"
        href="#multiCollapseExample' . $y. '"></i><i class="fas fa-graduation-cap mx-3 cursor-pointer" data-toggle="collapse"
        href="#multiCollapseExample' . $z. '"></i>';
        echo '</div>';
        echo '<div class="card-body mb-0 pb-0 mt-5">';


        $curriculum_items->Load_from_key($items_value);

        if ($curriculum_items->gettype() == '1'){

        echo $curriculum_items->getstatement();

        }elseif ($curriculum_items->gettype() == '3'){

            echo '<figure class="img-responsive text-center my-3">';
            echo '<img class="w-75" src="' . BASE_URL . '/assets/img/uploads/' . $curriculum_items->getimage_url() . '">';
            echo '<figcaption>' . $curriculum_items->getstatement() . '</figcaption>';
            echo '</figure>';
    
        }elseif ($curriculum_items->gettype() == '4'){?>

                            //code for embedded video with popup
                            <div class="embed-responsive embed-16by9">
                                <div style="padding:64.67% 0 0 0;position:relative;"><iframe
                                        src="<?php echo $curriculum_items->getlink_to_content();?>"
                                        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
                            </div>
                            <?php
        }elseif ($curriculum_items->gettype() == '3'){

            //code for link to GIEQS ONLINE VID
    
        }


        ?>

                            <!-- <div id="accordion-<?php ///echo $x;?>" class="accordion accordion-stacked my-3">
            
            <div class="card">
                <div class="card-header py-4" id="heading-1-1" data-toggle="collapse" role="button" data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                    <h6 class="mb-0"><i class="fas fa-file-pdf mr-3"></i>Tags</h6>
                </div>
                <div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-<?php echo $x;?>">
                    <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header py-4" id="heading-1-2" data-toggle="collapse" role="button" data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                    <h6 class="mb-0"><i class="fas fa-lock mr-3"></i>References</h6>
                </div>
                <div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2" data-parent="#accordion-<?php echo $x;?>">
                    <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                    </div>
                </div>
            </div>
            
            
            
        </div> -->

                            <?php
        //get references item

        $x++;

        echo '<div class="references" data-id="' . $items_value . '">';

        $references = $curriculum_manager->getreferences($curriculum_manager->getreferencescurriculumitem($items_value));
        
        if ($debug){

            var_dump($references);
            
            }
        


        echo '</div>';

        echo '<div class="tags" data-id="' . $items_value . '">';

        
        $tags = $curriculum_manager->gettagscurriculumitem($items_value);

        if ($debug){

            echo '<br/><br/>Tags Are</br>';

            var_dump($tags);
            
            }

            
            $a = 0;
            $tagBox = null;


        foreach ($allCategories as $key=>$value){
            //check category (we have the id as value)

            //get all the matching tags 

            $tags_this_category = null;

            $tags_this_category = [];
            $x = 0;
           
            foreach ($tags as $key2=>$value2){

                //echo '<br/><br/>' . $general->getCategoryforTagNumeric($value2) . '</br></br>';

                if ($general->getCategoryforTagNumeric($value2) == $value['id']){

                    $tags_this_category[$x] = $value2;

                             


                    $x++;
                    $a++;

                }

            }

            //if the array is empty skip this loop


            if (count($tags_this_category) > 0){

         
                //now have all the tags which match this category

                //echo category name

                $tagBox .= '<div class="row align-items-left">';
                                        
                $tagBox .= '<span class="h6 mt-1"> ' . $value['tagCategoryName'] . '</span>';
    
                $tagBox .=  '</div>';

                $tagBox .= '<div class="row align-items-left">';

                foreach ($tags_this_category as $key3=>$value3){

                    $tagBox .= '<span class="badge bg-dark mx-2 mb-1 tagButton tagTagsboxButton" data-tag-id="' . $value3 . '" id="tag' . $value3 . '">' . $general->getTagName($value3) . '</span>'; 

                    $tagBox .=  '</div>';


                }

            }else{

                //echo 'Never makes the tag cat > 0';
            }

            //echo the category name and tags underneath


            

        }

        if ($a == 0){

            $tagBox = '<p style="font-size:1.0rem;">No Tags Yet</p>';


        } 
       
       
        
?>



                           <!--  <div class="d-flex">

                                <a class="dropdown-item" style="font-size:1rem !important;" data-toggle="collapse"
                                    href="#multiCollapseExample<?php echo $y;?>" role="button" aria-expanded="false"
                                    aria-controls="multiCollapseExample<?php echo $y;?>"><i
                                        class="fas fa-chevron-circle-up"></i>&nbsp;Show Tags</a>
                                <a class="dropdown-item" style="font-size:1rem !important;" data-toggle="collapse" href="javascript;"
                                    data-target="#multiCollapseExample<?php echo $z;?>" aria-expanded="false"
                                    aria-controls="multiCollapseExample<?php echo $z;?>"><i
                                        class="fas fa-chevron-circle-up"></i>&nbsp;Show References</a>
                            </div> -->
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $y;?>">


                                        <div class="card card-body bg-dark">
                                           <!--  <span class="h5 mb-4">Tags</span> -->

                                            <div class="py-2 px-2 flex-row flex-wrap">
                                                <?php         echo $tagBox;
                        ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $z;?>">
                                        <div class="card card-body bg-dark">
                                         <!--    <span class="h5 mb-4">References</span> -->
                                         <div class="flex-row flex-wrap">
                                                <?php         echo $curriculum_manager->getFullReferenceListCurriculumItem($curriculum_items->getid());
                        ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <?php

        $z++;
        $z++;
        $y++;
        $y++;
        echo '</div>';


        echo '</div>';

        echo '</div>';


        //get tags item


    }




}

/* 

get sections
$curriculum_manager->getsectionscurriculum($id);

for each section
    echo each block dependent on whether text or
    table is a table

    depending on what 'type' is

    <option value="1" selected="">text</option>
<option value="2">table</option>
<option value="3">figure</option>
<option value="4">video</option>
<option value="5">gieqs online asset</option>

    video is vimeo link like blog link_to_content

    photo is photo like blog [this is ok, now there is link_to_content]  image_url

    [add image upload field]

    gieqs ref is id number link_to_content

*/






//var_dump($assets3);


//do they occur in the past? that is type 2 and 3 only

//then create a new subscription for the user for them with the tag PRO_ASSET

//GET AN ARRAY OF PRO USERS



//WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=PRO_SUBSCRIPTION%

            
            ?>










                        </div>
                        <!--end col-9-->


                    </div>
                    <!--end row-->

                </div>
                <!--end content-->


        </div>
        <!--end content-->








    </div>
    <!--end overall-->




    <!-- Modal -->


    <?php require BASE_URI . '/footer.php';?>



    <!-- Purpose JS -->
    <script src=<?php echo BASE_URL . "/assets/js/purpose.js"?>></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script> -->
    <script>
    var videoPassed = $("#id").text();
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/canvasjs.min.js"></script>





    <script>
    //the number that are actually loaded

    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }


    function generateTOC() {

        var statement = '';

        //get all h1s
        //get all h2s before the next h1 -> second line
        //get all h3s before the next h2 -> 3rd line

        var x = 15;
        var y = 1;



        $('.super-section').each(function() {

            var id = null;

            
            id = $(this).attr('tocid');
            $(this).attr('id', id);
            console.log(id);
            text = $(this).attr('data');
            statement +=
                '<li tocid="' + id + '" class="toc-entry toc-h4" style="font-size:0.7rem;"><a class="text-muted" href="#' + id +
                '">' + text + '</a></li>';
            
            
            statement += '<ol>';  
            //console.log($(this).parent().find('.minor-section'));  
            $(this).parent().find('.minor-section').each(function(){
                x++;


                var id = null;
                var text = null;
                //$(this).attr('id', x);
                  id = $(this).attr('tocid');
                  $(this).attr('id', id);

                  text = $(this).attr('data');
                 statement +=
                '<li tocid="' + id + '" class="toc-entry toc-h4" style="font-size:0.7rem;"><a class="text-muted" href="#' + id +
                '">' + text + '</a></li>';




            })
            statement += '</ol>';    

            
            
            
            x++;

        })

        $('.section-nav').html(statement);



    }

    function generateTOCold() {

        var statement = '';

        $('.toc-item').each(function() {

            var id = null;
            id = $(this).attr('id');
            text = $(this).attr('data-toc');
            statement +=
                '<li class="toc-entry toc-h4" style="font-size:1.1rem;"><a class="text-muted" href="#' + id +
                '">' + text + '</a></li>';

        })


        $('.section-nav').html(statement);



    }



    function copyToClipboard(text) {
        if (window.clipboardData && window.clipboardData.setData) {
            // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
            return window.clipboardData.setData("Text", text);

        } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
            document.body.appendChild(textarea);
            textarea.select();
            try {
                return document.execCommand("copy"); // Security exception may be thrown by some browsers.
            } catch (ex) {
                console.warn("Copy to clipboard failed.", ex);
                return false;
            } finally {
                document.body.removeChild(textarea);
            }
        }
    }



    $(document).ready(function() {


        generateTOC();
        //refreshNavAndTags();

        waitForFinalEvent(function() {
            generateTOC();


        }, 1000, "Resize header");

     

        $('.referencelist').on('click', function() {


//get the tag name

var searchTerm = $(this).attr('data');

//console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);

PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm,
    'PubMed Search (endoWiki)', 800, 700);





})

$('.referencelist').on('mouseenter', function() {

$(this).css('color', 'rgb(238, 194, 120)');
//$(this).css('cursor', 'pointer');

})

$('.referencelist').on('mouseleave', function() {

$(this).css('color', '#95aac9');
//$(this).css('cursor', 'default');

})

        $('#refreshNavigation').click(function() {


            firstTime = 1;
            //the number that are actually loaded
            loaded = 1;

            //the number the user wants
            loadedRequired = 1;

            $('.tag').each(function() {

                if ($(this).is(":checked")) {

                    $(this).prop('checked', false);
                }


            })

            refreshNavAndTags();

        })

        //on load check if any are checked, if so load the videos

        //if none are checked load 10 most recent videos for these categories



        $(window).scroll(function() {
            var scrollDistance = $(window).scrollTop();
            scrollDistance = scrollDistance - 500;
            // Assign active class to nav links while scolling
            $('.toc-marker').each(function(i) {

                //define which one triggered

                console.log('i is ' + i);
                

                var idElement = $(this).attr('tocid');
                console.log('element id is ' + idElement);
                console.log('scroll distance is ' + scrollDistance);

                if ($(this).position().top <= scrollDistance) {
                    $('.section-nav li.text-gieqsGold').removeClass('text-gieqsGold').addClass(
                        'text-muted');
                    $('.section-nav li [tocid=' + idElement + ']').addClass('text-gieqsGold').removeClass(
                        'text-muted');
                }
            });
        }).scroll();












    })
    </script>
</body>

</html>