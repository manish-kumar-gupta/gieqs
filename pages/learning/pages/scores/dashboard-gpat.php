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

      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();
      

      $dataPoints = array( 
        array("label"=>"Industrial", "y"=>51.7),
        array("label"=>"Transportation", "y"=>26.6),
        array("label"=>"Residential", "y"=>13.9),
        array("label"=>"Commercial", "y"=>7.8)
    );
      ?>

    <!--Page title-->
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .gieqsGold {

        color: rgb(238, 194, 120);


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
				    
                        
                        
		
        ?>

    <!-- load all video data -->

    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <!--- specifiy the tag Categories required for display  CHANGEME-->

    <?php
        $requiredTagCategories = ['66', '105'];

        ?>

    <div id="requiredTagCategories" style="display:none;"><?php echo json_encode($requiredTagCategories);?></div>



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
    include(BASE_URI . '/pages/learning/assets/gpatNav.php');

    ?>

    <div class="main-content bg-gradient-dark">

        <!--Header CHANGEME-->

        <div class="d-flex align-items-end container">
            <p class="h1 mt-5">Dashboard</p>


        </div>
        <div class="d-flex align-items-end container">
            <p class="text-muted pl-4 mt-2">Chart Your Progress with GPAT</p>

        </div>






        <!--Video Display-->


        <div class="container mt-3">



            <script>
            function round(value, precision) {
                var multiplier = Math.pow(10, precision || 0);
                return Math.round(value * multiplier) / multiplier;
            }

            


        



            $(document).ready(function() {

               

                var options = {
                    animationEnabled: true,
                    backgroundColor: null,
                    title: {
                        text: "GPAT",
                        fontColor: "#eec378",
                        fontFamily: "arial",


                    },
                    axisY: {
                        title: "GPAT",
                        suffix: "",
                        gridColor: "gray",
                        fontColor: "white",
                        tickColor: "white",
                        lineThickness: 1,
                        lineColor: "white",
                        titleFontColor: "white",
                        labelFontColor: "white",




                    },
                    axisX: {
                        title: "Scores",
                        gridColor: "gray",
                        fontColor: "white",
                        tickColor: "white",
                        lineThickness: 1,
                        lineColor: "white",
                        titleFontColor: "white",
                        labelFontColor: "white",





                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0.0#" % "",
                        dataPoints: [{
                                label: "Proficiency",
                                y: 10.09
                            },
                            {
                                label: "Difficulty",
                                y: 9.40
                            },
                            {
                                label: "Fraction",
                                y: 8.50
                            },


                        ]
                    }]
                };
                $("#chartContainer").CanvasJSChart(options);

                

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
                              
                                <h6 class="mt-3 mb-3 pl-2 h5">Navigation</h6>

                                <ul class="section-nav">

                                 
                                    <?php

echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#summary">Summary</a></li>';

echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#difficulty">Procedures Stratified by Difficulty</a></li>';

                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#domains">Domains</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#certification">Certification</a></li>';
                       
                        

                       

                            ?>
                                   
                                </ul>


                           



                            

                             

                            </div>
                        
                        </div>
                  
                        <div class="col-lg-9">


                            <?php
          
            
            ?>


                          

                            <?php $statement=$gpat_glue->howDoICertify($userid);?>

                            <span id="summary"
                                class="d-block h1 text-white mr-2 mb-1"><?php echo $userFunctions->getUserName($userid);?></span>
                            <span id="statusText" class="d-block gieqsGold mr-2 mb-1"
                                style="font-size:1.5rem;"><?php echo $statement['currentcertificationstatus'];?></span>

                            <div class="d-flex justify-content-between">





                                <div class="card-body">
                                    <div class="d-flex">

                                        <div class="pl-4">

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-2"></span>

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-4">Procedures :
                                                <?php echo $gpat_glue->determineNumberofCompleteReportCards($userid);?></span>

                                            <span class="d-block text-muted mr-2 mb-1 mt-0"
                                                style="font-size:1.5rem;">Incomplete GPATs :
                                                <?php echo $gpat_glue->determineNumberofIncompleteReportCards($userid);?></span>


                                            <!-- <p> 1 / 6 Courses<br />
                                                1 / 4 Premium Content Packs<br />
                                                27 / 171 Total Learning Experiences</p>


                                            <p>Complete 16 more individual Learning Experiences to reach GIEQs Silver
                                                Status</p> -->



                                            <!--  <a class="btn-sm bg-bronze p-1 mt-5 cursor-pointer"
                                                onclick="window.location.href = siteRoot + 'gieqs-status.php';">

                                                <span class="btn-inner--text text-dark text-sm">Find Out More</span>
                                            </a> -->
                                        </div>
                                    </div>
                                </div>



                                <div class="card-body ml-5">
                                    <div class="d-flex">
                                        <!--  <div>
                                            <div class="icon text-white icon-lg">
                                                <i class="fas fa-medal silver"></i>

                                            </div>
                                        </div> -->
                                        <div class="pl-4">
                                            <table>
                                                <tr>
                                                    <td> <span
                                                            class="d-block h1 text-white mr-2 mb-1">GPAT<sub>unweighted</sub></span>
                                                    </td>
                                                    <td><span id="gpat_unweighted"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1"><?php echo $gpat_glue->averageArray($gpat_glue->getUserFractionNonWeighted($userid, 3, false), false);?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <span
                                                            class="d-block h1 text-white mr-2 mb-1 mt-2">GPAT<sub>weighted</sub></span>
                                                    </td>
                                                    <td><span id="gpat_weighted"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $gpat_glue->averageArray($gpat_glue->getUserFractionWeighted($userid, 3, false), false);?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="d-block h1 text-white mr-2 mb-1 mt-2">delta
                                                            GPAT<sub>1-month</sub></span></td>
                                                    <td><span id="gpat_delta"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $gpat_glue->getDeltaWeightedFraction($userid, 2, false);?></span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--  <span class="d-block h6 text-white mr-2 mb-1 mt-4">Overall Completion
                                                15.8%</span>


                                            <p> 1 / 6 Courses<br />
                                                1 / 4 Premium Content Packs<br />
                                                27 / 171 Total Learning Experiences</p>


                                            <p>Complete 16 more individual Learning Experiences to reach GIEQs Silver
                                                Status</p>



                                            <a class="btn-sm bg-bronze p-1 mt-5 cursor-pointer"
                                                onclick="window.location.href = siteRoot + 'gieqs-status.php';">

                                                <span class="btn-inner--text text-dark text-sm">Find Out More</span>
                                            </a> -->
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="d-block h1 text-dark mr-2 mt-3 mb-0 p-3 bg-gieqsGold">

                                <p class="text-center mb-0"><?php echo $gpat_glue->statusText($userid); ?></p>
                            </div>





                            <hr class="divider divider-icon my-8" />
                            <p id="difficulty" class="section d-block h1 gieqsGold mr-2 mb-1 mt-0">Procedures Stratified
                                by Difficulty
                            </p>

                            <?php
                            $dataPoints = $gpat_glue->getSMSAUserReportCards($userid, 3, 2, false);

?>

                            <div class="d-flex justify-content-end">

                                <p><?php $SMSAscores = $gpat_glue->getSMSAUserReportCards($userid, 3, 1); //print_r($SMSAscores);?>
                                </p>
                                <table>
                                    <tr>
                                        <td> <span class="d-block h2 text-white mr-2 mb-1">SMSA<sub>2</sub>
                                                GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_unweighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1"><?php echo $SMSAscores['SMSA2weightedgpat'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="d-block h2 text-white mr-2 mb-1 mt-2">SMSA<sub>3</sub>
                                                GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_weighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $SMSAscores['SMSA3weightedgpat'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="d-block h2 text-white mr-2 mb-1 mt-2">SMSA<sub>4</sub>
                                                GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_weighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $SMSAscores['SMSA4weightedgpat']?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="d-block h2 text-white mr-2 mb-1 mt-2">SMSA<sub>+</sub>
                                                GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_weighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $SMSAscores['SMSAplusweightedgpat'];?></span>
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <div id="chartContainer2" class="mb-4 mt-5" style="min-height: 370px; width: 100%;"></div>

                            <?php

                            //get the last 3 month data ONLY IF the data for 3 months previous is available

                            //so check is there any data for 3 months ago?

                            $check3months = $gpat_glue->getDomainSpecificsReportCards($userid, 2, false);

                            if ($check3months){

                                //unless false

                                $dataPoints3 = $gpat_glue->getDomainSpecificsReportCards($userid, 1, false); //array specifics last 3
                                $dataPoints4 = $gpat_glue->getDomainSpecificsReportCards($userid, 2, false); //array specifics before last 3
                                //chart to compare
                                //set the chart type here, probably a switch
    
                            }else{

                                //if false
                                $dataPoints3 = $gpat_glue->getDomainSpecificsReportCards($userid, 3, false); //array specifics all time

                            }

                            //$dataPoints4 = $gpat_glue->getDomainSpecificsReportCards($userid, 1, false); //array specifics last 3


?>
                            <hr class="divider divider-icon my-8" />

                            <p id="domains" class="section d-block h1 text-white mr-2 mb-1">Domain Specific Progress</p>


                            <div id="chartContainer3" class="mb-4 mt-5" style="min-height: 370px; width: 100%;"></div>


                            <!--
split into pre and post last 3 as long as last 3 has data
add delta GPAT last 3
add min max GPAT


                                    -->

                            <hr class="divider divider-icon my-8" />

                            <p id="certification" class="section d-block h1 text-white mr-2 mb-1">Certification</p>

                            <div class="d-flex justify-content-between">





                                <div class="card-body">
                                    <div class="d-flex">

                                        <div class="pl-4">


                                            <span class="d-block h3 text-white mr-2 mb-1 mt-2"></span>

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-4">Current Status
                                            </span>

                                            <span class="d-block gieqsGold mr-2 mb-1 mt-0" style="font-size:1.5rem;">
                                                <?php echo $statement['currentcertificationstatus'];?></span>

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-4">How do I become eligible
                                                for the next step in certification?
                                            </span>

                                            <span class="d-block gieqsGold mr-2 mb-1 mt-0" style="font-size:1.5rem;">
                                                <?php  echo $statement['howdoi'];?></span>


                                            <!-- <p> 1 / 6 Courses<br />
                1 / 4 Premium Content Packs<br />
                27 / 171 Total Learning Experiences</p>


            <p>Complete 16 more individual Learning Experiences to reach GIEQs Silver
                Status</p> -->



                                            <!--  <a class="btn-sm bg-bronze p-1 mt-5 cursor-pointer"
                onclick="window.location.href = siteRoot + 'gieqs-status.php';">

                <span class="btn-inner--text text-dark text-sm">Find Out More</span>
            </a> -->
                                        </div>
                                    </div>
                                </div>



                                <div class="card-body ml-5">
                                    <div class="d-flex">
                                        <!--  <div>
            <div class="icon text-white icon-lg">
                <i class="fas fa-medal silver"></i>

            </div>
        </div> -->
                                        <div class="pl-4">
                                            <table>
                                                <tr>
                                                    <td> <span
                                                            class="d-block h1 text-white mr-2 mb-1 mt-2">GPAT<sub>weighted</sub></span>
                                                    </td>
                                                    <td><span id="gpat_weighted"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $gpat_glue->averageArray($gpat_glue->getUserFractionWeighted($userid, 3, false), false);?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="d-block h1 text-white mr-2 mb-1 mt-2">required
                                                            delta
                                                            GPAT</sub></span></td>
                                                    <td><span id="gpat_delta"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $statement['deltagpat'];?></span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--  <span class="d-block h6 text-white mr-2 mb-1 mt-4">Overall Completion
                15.8%</span>


            <p> 1 / 6 Courses<br />
                1 / 4 Premium Content Packs<br />
                27 / 171 Total Learning Experiences</p>


            <p>Complete 16 more individual Learning Experiences to reach GIEQs Silver
                Status</p>



            <a class="btn-sm bg-bronze p-1 mt-5 cursor-pointer"
                onclick="window.location.href = siteRoot + 'gieqs-status.php';">

                <span class="btn-inner--text text-dark text-sm">Find Out More</span>
            </a> -->
                                        </div>
                                    </div>
                                </div>

                            </div>







                            <div id="testing" class="d-none">
                                <p id="progress" class="section display-3">Progress</p>
                                <p><?php
                            
                            echo 'Testing';
                            echo '<br/><br/>';
                            var_dump($gpat_glue->getUserFractionNonWeighted($userid, 3, false));
                            echo '<br/><br/>';
                            var_dump($gpat_glue->getUserFractionWeighted($userid, 3, false));
                            echo '<br/><br/>';

                            $array = [0=>'0.25', 1=>'0.3'];

                            echo $gpat_glue->averageArray($gpat_glue->getUserFractionNonWeighted($userid, 3, false), true);
                            echo '<br/><br/>';
                            echo $gpat_glue->averageArray($gpat_glue->getUserFractionWeighted($userid, 3, false), true);

                            echo '<br/><br/>';
                            echo '<br/><br/>';

                            echo $gpat_glue->getDeltaWeightedFraction($userid, 2, true);

                            
                            ?></p>




                                <div id="chartContainer" class="mb-4" style="height: 370px; width: 100%;"></div>

                            </div>

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

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <!-- Google maps -->

    <!-- Purpose JS -->
    <script src=<?php echo BASE_URL . "/assets/js/purpose.js"?>></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script> -->
    <script>
    var videoPassed = $("#id").text();
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/canvasjs.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/jquery.canvasjs.min.js"></script>





    <script>
    //the number that are actually loaded

    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }

    /*  CanvasJS.addColorSet("gieqsGold",
                 [//colorSet Array

                 "#2F4F4F",
                 "#008080",
                 "#2E8B57",
                 "#3CB371",
                 "#90EE90"                
                 ]); */

    CanvasJS.addColorSet("gieqsGold",
        [ //colorSet Array

            "#893101",
            "#CC5801",
            "#ED820E",
            "#DD571C",

        ]);

    //chart of SMSA

    var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        colorSet: "gieqsGold",
        backgroundColor: null,
        dataPointWidth: 40,



        title: {
            text: "SMSA of Complete Report Cards",
            fontColor: "#eec378",
            fontFamily: "arial",


        },
        axisY: {
            title: "Complete Report Cards (n)",
            suffix: "",
            gridColor: "gray",
            fontColor: "white",
            tickColor: "white",
            lineThickness: 1,
            lineColor: "white",
            titleFontColor: "white",
            labelFontColor: "white",





        },
        axisX: {
            title: "SMSA",
            gridColor: "gray",
            fontColor: "white",
            tickColor: "white",
            lineThickness: 1,
            lineColor: "white",
            titleFontColor: "white",
            labelFontColor: "white",






        },
        data: [{
            type: "column",

            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart2.render();


    //chart for domains

    var chart3 = new CanvasJS.Chart("chartContainer3", {
        animationEnabled: true,
        colorSet: "gieqsGold",
        backgroundColor: null,
        dataPointWidth: 40,


        title: {
            text: "Domain Specific GPAT Scores",
            fontColor: "#eec378",
            fontFamily: "arial",


        },
        axisY: {
            title: "Domain Specific GPAT",
            suffix: "",
            gridColor: "gray",
            fontColor: "white",
            tickColor: "white",
            lineThickness: 1,
            lineColor: "white",
            titleFontColor: "white",
            labelFontColor: "white",





        },
        axisX: {
            title: "Domains",
            gridColor: "gray",
            fontColor: "white",
            tickColor: "white",
            lineThickness: 1,
            lineColor: "white",
            titleFontColor: "white",
            labelFontColor: "white",






        },
        data: [{
            type: "column",

            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        }]
    });




    chart3.render();

    var loaded = 1;

    //the number the user wants
    var loadedRequired = 1;

    var firstTime = 1;
    var activeStatus = 1;

    var requiredTagCategoriesText = $("#requiredTagCategories").text();

    var requiredTagCategories = JSON.parse(requiredTagCategoriesText);

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

    function generateScore() {

        var demarcation = $('#demarcation').val();
        var size = $('#size').val();
        var location = $('#location').val();
        var morphology = $('#morphology').val();
        var paris = $('#paris').val();

        var COVERT = determineSMIC(demarcation, size, location, morphology, paris);




        var score = {
            "demarcation": demarcation,
            "size": size,
            "location": location,
            "morphology": morphology,
            "paris": paris,
            "risk": COVERT.risk,
            "odds": COVERT.odds,
            "text": COVERT.risk_text,
        };

        console.log(score);
        console.log(JSON.stringify(score));

        //copy to  clipboard

        copyToClipboard(JSON.stringify(score));

    }


    function refreshNavAndTags() {

        var screenTop = $(document).scrollTop();

        //console.log(top);

        var tags = [];

        $('.tag').each(function() {

            if ($(this).is(":checked")) {
                tags.push($(this).attr('data'));
            }


        })



        //push how many loaded, use loaded variable

        console.dir(tags);

        /*var key = $(this).attr('data');

				const dataToSend = {

					key: key,

				}*/
        var dataToSend = {

            tags: tags,
            requiredTagCategories: requiredTagCategories,
            active: activeStatus,

        }

        //const jsonString2 = JSON.stringify(dataToSend);

        const jsonString = JSON.stringify(dataToSend);
        ////console.log(jsonString);
        //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

        var request2 = $.ajax({
            beforeSend: function() {

                $('#videoCards').html(
                    "<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>"
                );
                //for each tags array push the badges to the tags shown area
                var html = '';
                $.each(tags, function(k, v) {

                    //HERE WE HAVE THE TAGID

                    var tagid = v;

                    //get the name and category

                    var tagName = $('body').find('#navigationZone').find('#tag' + v).siblings()
                        .text();

                    var tagCategory = $('body').find('#navigationZone').find('#tag' + v).parent()
                        .parent().parent().parent().find('span').text();

                    html +=
                        '<span class="badge bg-gieqsGold text-dark mx-2 my-2 tagButton" data="' +
                        v + '">' + tagCategory + ' / ' + tagName +
                        ' <i style="float:right;" class="fas fa-times removeTag cursor-pointer ml-1" data="' +
                        v + '"></i></span>';

                });
                $('body').find('#navigationZone').find('#shown-tags').html(html);

            },
            url: siteRoot + "/pages/learning/scripts/getNavv2.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            if (data != '[]') {
                var toKeep = $.parseJSON(data.trim());
                //alert(data.trim());
                console.dir(toKeep);


                $('.tag').each(function() {

                    var tagid = $(this).attr('data');

                    if (toKeep.indexOf(tagid) > -1) {

                        $(this).attr('disabled', false);

                    } else {

                        $(this).attr('disabled', true);
                    }

                })


            }
            //$(document).find('.Thursday').hide();
        })

        request2.then(function(data) {
            var tags = [];

            $('.tag').each(function() {

                if ($(this).is(":checked")) {
                    tags.push($(this).attr('data'));
                }


            })

            //TODO ADD ABILITY TO PASS A PARAMETER HERE INDICATING NUMBER LOADED
            //THEN MODIFY LAYOUT AND NUMBER LOADED

            console.dir(tags);

            var dataToSend = {

                tags: tags,
                loaded: loaded,
                loadedRequired: loadedRequired,
                requiredTagCategories: requiredTagCategories,
                referringUrl: $('#escaped_url').text(),
                active: activeStatus,


            }

            const jsonString2 = JSON.stringify(dataToSend);




            const jsonString = JSON.stringify(tags);

            console.dir(jsonString2);


            var request3 = $.ajax({
                beforeSend: function() {


                },
                url: siteRoot + "/pages/learning/scripts/getVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString2,
            });
            request3.done(function(data) {
                // alert( "success" );
                if (data) {
                    //var toKeep = $.parseJSON(data.trim());
                    //alert(data.trim());
                    //console.dir(toKeep);

                    $('#videoCards').html(data);
                    $('body').find('#itemCount').each(function() {

                        var count = $('body').find('.individualVideo').length;
                        $(this).text(count);


                    })


                    if (firstTime == 1) {
                        $('body').on('click', '#loadMore', function() {

                            loadedRequired = loadedRequired + 1;


                            refreshNavAndTags();

                        })
                    }



                    if (firstTime > 1 && loadedRequired > 1) {

                        var loadedRequiredMultiple = ((loadedRequired - 1) * 10) - 3;

                        //console.log(loadedRequiredMultiple);

                        //scroll to current level


                        $("body,html").animate({
                                scrollTop: $('body').find('.individualVideo:eq(' +
                                    loadedRequiredMultiple + ')').offset().top
                            },
                            2 //speed
                        );
                    }


                    firstTime = firstTime + 1;
                    //$('body').find('.individualVideo:eq('+loadedRequiredMultiple +')').scrollTop(300);





                }
                //$(document).find('.Thursday').hide();
            })


        })


    }

    $(document).ready(function() {



        //refreshNavAndTags();

        if (edit == 1) {

            fillForm(esdLesionPassed);
        }

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

        $('.tag').click(function() {

            refreshNavAndTags();

        })

        $('body').on('click', '.removeTag', function() {

            var tagToRemove = $(this).attr('data');
            //remove the check from the tag removed

            $('.tag').each(function() {

                if ($(this).attr("data") == tagToRemove) {

                    $(this).prop('checked', false);

                }


            })


            refreshNavAndTags();

        })
        //active behaviour

        $('body').on('change', '#active', function() {

            var active = $(this).children("option:selected").val();
            //remove the check from the tag removed

            activeStatus = active;

            refreshNavAndTags();

        })

        $('body').on('change', '.SMSA', function() {

            var SMSA = calculateDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSA.SMSA_total) === false) {

                $('#SMSA_total').text(SMSA.SMSA_total);
                $('#SMSA_group').text(SMSA.SMSA_group);

            };



        })

        $('body').on('change', '.SMSAplus', function() {



            //alert('hello');
            var SMSAplus = calculatePlusDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSAplus.SMSA_plus_total) === false) {

                $('#numeratorSMSAplus').text(SMSAplus.SMSA_plus_total);
                $('#denominatorSMSAplus').text(4);

            };



        })

        $('body').on('change', '.score', function() {



            //alert('hello');
            var score = calculateScore();
            //remove the check from the tag removed

            if (isNaN(score.score_total) === false) {

                $('#numeratorSum').text(score.score_total);
                $('#denominatorSum').text(score.score_denominator);
                $('#fraction').text(+score.fraction.toFixed(2));

                //numb = +numb.toFixed(2);

            };



        })

        $('body').on('change', '#type_polypectomy', function() {


            //hide the cold snare
            //alert('change');

            if ($(this).val() == 1) {

                showHotSnareFields();

            } else if ($(this).val() == 2) {

                hideHotSnareFields();

            }

            fullScoreUpdate();



        })


        $('body').on('click', '#reset-form', function() {


            //hide the cold snare
            //alert('change');

            location.reload();



        })

        $('body').on('click', '.cancel', function(event) {


            //hide the cold snare
            //alert('change');

            event.preventDefault();

            $(this).parent().find('select').val('please select');
            fullScoreUpdate();


        })

        $('body').on('click', '#show-info', function(event) {


            //hide the cold snare
            //alert('change');

            event.preventDefault();

            $('#collapseExample').collapse('toggle');
            //fullScoreUpdate();


        })

        $('body').on('click', '#updateDatabase', function(event) {


            //hide the cold snare
            //alert('change');

            event.preventDefault();
            var fields = getFieldsToSavePlusSMSA();
            updateDatabase(fields);



        })

        $('body').on('click', '#saveScore', function(event) {


            //hide the cold snare
            //alert('change');

            event.preventDefault();
            var fields = getFieldsToSavePlusSMSA();
            saveScoreUser(fields);




        })

        $(document).on('click', '#calculate', function(event) {

            event.preventDefault();
            $('#polypectomy-form').submit();

        })

        $("#polypectomy-form").validate({

            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                console.log("there were " + errors + " errors");
                if (errors) {
                    var message = errors == 1 ?
                        "1 field has been missed. It has been highlighted.\n Score not saved." :
                        +errors +
                        " fields have been missed. They have been highlighted.  Score not saved.";


                    $('#error').text(message);
                    //$('div.error span').addClass('form-text text-danger');
                    //$('#errorWrapper').show();

                    $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
                        $("#errorWrapper").slideUp(500);
                    });
                } else {
                    $('#errorWrapper').hide();
                }
            },
            rules: {
                type_polypectomy: {
                    required: true,

                },



                tip_control: {
                    required: true,

                },

                extent: {
                    required: true,

                },

                positioning: {
                    required: true,

                },

                appropriate_technique: {
                    required: true,

                },


                injection_plane: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }

                },

                injection_dynamic: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }

                },

                injection_access: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }

                },


                snare_size: {

                    required: true,

                },

                snare_position: {

                    required: true,

                },
                snare_visualised: {

                    required: true
                },

                snare_capture: {

                    required: true,

                },

                residual: {

                    required: true,

                },
                independent_movement: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },

                lift_movement: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },

                /* snare_closed: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                }, */
                mucosa: {

                    required: true
                },
                thermal_ablation: {

                    /* currently not required as not done all the time*/
                },
                submucosa: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                muscularis: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                size: {

                    required: true
                },
                morphology: {

                    required: true
                },
                site: {

                    required: true
                },
                access: {

                    required: true
                },

                non_lifting: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                PANL: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                size_40_smsaplus: {

                    required: true,
                },
                nongranular_smsaplus: {
                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },




            },
            messages: {

                type_polypectomy: {

                    required: 'You must enter whether the polypectomy was performed hot or cold.  This will alter the available fields below.',

                },


            },
            submitHandler: function(form) {


                //copyFormClipboard();
                var fields = getFieldsToSavePlusSMSA();
                saveScoreUser(fields);

                //console.log("submitted form");



            }

        });


        $(window).scroll(function() {
            var scrollDistance = $(window).scrollTop();


            // Assign active class to nav links while scolling
            $('fieldset').each(function(i) {
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
</body>

</html>