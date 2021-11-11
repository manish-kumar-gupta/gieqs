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


        <!--Navigation-->

        <!-- <div id="navigationZone">
    <?php //require(BASE_URI . '/pages/learning/includes/navigation.php'); ?>
    </div> -->



        <!--Video Display-->


        <div class="container mt-3">



            <script>
            function round(value, precision) {
                var multiplier = Math.pow(10, precision || 0);
                return Math.round(value * multiplier) / multiplier;
            }

            function determineCOVERT(location, morphology, paris) {

                if ((location === null) || (morphology === null) || (paris === null)) {

                    COVERT = '-';
                    return COVERT;

                } else {


                    var locationInt = +location;
                    var morphologyInt = +morphology;
                    var parisInt = +paris;


                    if (isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt)) {

                        COVERT = '-';
                        return COVERT;

                    } else {


                        var locationCategory;
                        var morphologyCategory;
                        var parisCategory;

                        //need colon site
                        //need morphology
                        //need paris

                        //convert to the required format

                        //location proximal 9-13 others distal //category 1 distal 2 proximal


                        if (locationInt < 9) {
                            locationCategory = 1;
                        } else {
                            locationCategory = 2;
                        }

                        if (morphologyInt == 1) {

                            morphologyCategory = 1; //granular
                        } else if (morphologyInt == 2) {

                            morphologyCategory = 2; // non-granular

                        } else if (morphologyInt > 2) { //can't calculate the score as serrated and mixed not supported

                            COVERT = '-';
                            return COVERT;

                        }


                        if (parisInt == 2) {

                            parisCategory = 1; // 0-IIa

                        } else if (parisInt == 6) {

                            parisCategory = 2; // 0-IIa/Is

                        } else if (parisInt == 1) {

                            parisCategory = 3; //0-Is

                        } else { // unsupported Paris class

                            COVERT = '-';
                            return COVERT;
                        }


                        //now have categorical variables available only if they are correct type for this score	

                        if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 1) {

                            COVERT = '0.7%';
                        } else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 1) {

                            COVERT = '1.2%';
                        } else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 2) {

                            COVERT = '4.2%';
                        } else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 2) {

                            COVERT = '10.1%';
                        } else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 3) {

                            COVERT = '2.3%';
                        } else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 3) {

                            COVERT = '5.7%';
                        } else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 1) {

                            COVERT = '3.8%';
                        } else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 1) {

                            COVERT = '6.4%';
                        } else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 2) {

                            COVERT = '12.7%';
                        } else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 2) {

                            COVERT = '15.9%';
                        } else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 3) {

                            COVERT = '12.3%';
                        } else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 3) {

                            COVERT = '21.4%';
                        }

                        return COVERT;

                    }

                }

                //surely there should be a version involving size...


            }

            //hie below if demarcated area = yes

            function noDemarcatedArea() {

                /*  var labels = $('#size, #location, #morphology, #paris').parent().prev();
                 var arrayToHide = $('#size, #location, #morphology, #paris').parent();

                 $(labels).show();
                 $(arrayToHide).show();
                 $('#demarcation_imaging').hide(); */


            }

            function demarcatedArea() {

                /* var labels = $('#size, #location, #morphology, #paris').parent().prev();
                var arrayToHide = $('#size, #location, #morphology, #paris').parent();

                $(labels).hide();
                $(arrayToHide).hide();
                $('#demarcation_imaging').show(); */

                /* $('#size, #location, #morphology, #paris').parent().hide(); */

            }



            function determineSMIC(demarcation, size, location, morphology, paris, debug = true) {

                if ((demarcation == null)) {

                    return 'Was there a demarcated area?';



                } else if ((demarcation == 1)) {

                    return {

                        "risk_text": 'Very High Risk',
                        "risk": 17.6,
                        "odds": 16,


                    }



                } else if ((size == null) || (location == null) || (morphology == null) || (paris == null)) {

                    return 'Missing Variables - please enter all 4 further characteristics';


                } else {

                    //var demarcation = +demarcation;
                    var sizeInt = +size;
                    var locationInt = +location;
                    var morphologyInt = +morphology;
                    var parisInt = +paris;


                    if (isNaN(sizeInt) || isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt)) {

                        return 'Issue with variables supplied, please check they are numbers';

                    } else {

                        var SMICriskOR = 0;
                        var SMICriskactual = 1.1;


                        if (sizeInt == 2) {
                            //>=30mm
                            SMICriskOR = SMICriskOR + 1.12;

                        } else if (sizeInt == 3) {
                            //>=40mm
                            SMICriskOR = SMICriskOR + 2 * (1.12);

                        } else if (sizeInt == 4) {
                            //>=-50mm
                            SMICriskOR = SMICriskOR + 3 * (1.12);

                        } else if (sizeInt == 5) {
                            //>=60mm
                            SMICriskOR = SMICriskOR + 4 * (1.12);

                        } else if (sizeInt == 6) {
                            //>=70mm
                            SMICriskOR = SMICriskOR + 5 * (1.12);

                        } else if (sizeInt == 7) {
                            //>=80mm
                            SMICriskOR = SMICriskOR + 6 * (1.12);

                        } else if (sizeInt == 8) {
                            //>=90mm
                            SMICriskOR = SMICriskOR + 7 * (1.12);

                        } else if (sizeInt == 9) {
                            //>=100mm
                            SMICriskOR = SMICriskOR + 8 * (1.12);

                        }

                        if (locationInt == 1) {

                            SMICriskOR = SMICriskOR + 1.91;

                        }



                        if (paris == 2) {

                            SMICriskOR = SMICriskOR + 2.73;

                        } else if (paris == 3) {

                            SMICriskOR = SMICriskOR + 2.49;

                        }

                        if (morphology == 2) {

                            SMICriskOR = SMICriskOR + 2.8;

                        } else if (morphology == 3) {

                            SMICriskOR = SMICriskOR + 0.72;

                        }

                        //round(SMICriskOR, 1);

                        if (SMICriskOR == 0) {

                            SMICriskOR = 1;

                        }

                        if (SMICriskOR == -0.28) {

                            SMICriskOR = 0.72;

                        }

                        var SMICnumeric = SMICriskOR * SMICriskactual;

                        SMICriskOR = round(SMICriskOR, 1);

                        SMICnumeric = round(SMICnumeric, 1);

                        if (SMICnumeric < 10) {

                            var text = 'Low Risk';

                        } else if (SMICnumeric >= 10) {


                            var text = 'High Risk';

                        }

                        //return an object

                        return {

                            "risk_text": text,
                            "risk": SMICnumeric,
                            "odds": SMICriskOR,


                        }

                        //return  '<h3> ' + text + '</h3><h4>' + SMICnumeric + '% </h4> <br><br>(or ' + SMICriskOR + 'x the risk of a granular 0-IIa 20-29mm LSL in the colon proximal to the sigmoid without a demarcated area or depression, risk 1.1%)<br>';


                    }

                }


            }


            function calculateDifficultyScore() {

                var site = $('#site').val();
                var size = $('#size').val();

                var morphology = $('#morphology').val();
                var access = $('#access').val();
                //var paris = $('#paris').val();

                if ((size == null) || (access == null) || (morphology == null) || (site == null)) {

                    return 'Missing Variables - please enter all 4 further characteristics';


                }

                var sizeInt = +size;
                var accessInt = +access;
                var morphologyInt = +morphology;
                var siteInt = +site;

                if (isNaN(sizeInt) || isNaN(accessInt) || isNaN(morphologyInt) || isNaN(siteInt)) {

                    return 'Issue with variables supplied, please check they are numbers';

                } else {

                    var SMSA_total = sizeInt + accessInt + morphologyInt + siteInt;

                    if (SMSA_total < 6) {

                        SMSA_group = 1;

                    } else if (SMSA_total < 9) {

                        SMSA_group = 2;

                    } else if (SMSA_total < 13) {

                        SMSA_group = 3;

                    } else if (SMSA_total > 12) {

                        SMSA_group = 4;

                    }

                    return {

                        "size": sizeInt,
                        "access": accessInt,
                        "morphology": morphologyInt,
                        "site": siteInt,
                        "SMSA_total": SMSA_total,
                        "SMSA_group": SMSA_group,


                    }
                }



            }

            function calculatePlusDifficultyScore() {

                var non_lifting = $('#non_lifting').val();
                //var PANL = $('#PANL').val();

                var location_difficult = $('#location_difficult').val();
                //var demarcation = $('#demarcation').val();
                //var paris = $('#paris').val();

                var size_40_smsaplus = $('#size_40_smsaplus').val();
                var nongranular_smsaplus = $('#nongranular_smsaplus').val();

                if ((non_lifting == null) || (location_difficult == null) || (size_40_smsaplus == null) || (
                        nongranular_smsaplus == null)) {

                    return 'Missing Variables - please enter all 4 further characteristics';


                }

                var non_liftingInt = +non_lifting;
                var size_40_smsaplusInt = +size_40_smsaplus;
                var location_difficultInt = +location_difficult;
                var nongranular_smsaplusInt = +nongranular_smsaplus;

                if (isNaN(non_liftingInt) || isNaN(size_40_smsaplusInt) || isNaN(location_difficultInt) || isNaN(
                        nongranular_smsaplusInt)) {

                    return 'Issue with variables supplied, please check they are numbers';

                } else {

                    var SMSA_plus_total = non_liftingInt + size_40_smsaplusInt + location_difficultInt +
                        nongranular_smsaplusInt;



                    return {

                        "non_lifting": non_liftingInt,
                        "size_40": size_40_smsaplusInt,
                        "location_difficult": location_difficultInt,
                        "nongranular": nongranular_smsaplusInt,
                        "SMSA_plus_total": SMSA_plus_total,



                    }
                }


            }

            function calculateScore() {


                var scores = new Object;

                $(".score:not(:disabled)").each(function() {

                    var name = $(this).attr('id');

                    scores[name] = $(this).val();


                })

                console.dir(scores);


                /* $(scores).each(function(k,v){

                    if (k == null){

                        return;
                    }


                }) */

                var score_total = 0;

                var iterator = 0;

                var numberFilled = 0;

                $.each(scores, function(k, v) {

                    console.log(k + 'is k');
                    console.log(v + 'is v');

                    if (v == null) {

                        iterator = iterator + 1;
                        return true;

                    }

                    var vInt = null;
                    var vInt = +v;

                    score_total = score_total + vInt;
                    iterator = iterator + 1;


                    numberFilled = numberFilled + 1;


                })

                return {


                    "score_total": score_total,
                    "score_denominator": numberFilled * 5,
                    "fraction": (score_total) / (numberFilled * 5),
                    "elements": scores,


                }





            }

            function hideHotSnareFields() {

                $('.hot').each(function() {

                    var label = null;
                    var label = $(this).parent().prev();
                    $(this).attr('disabled', true);
                    $(this).parent().hide();
                    $(label).hide().attr('disabled', true);

                    //if section length = 0 hide heading


                })

                headingsHider();

                /* var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).hide();
        $(arrayToHide).hide();
        $('#demarcation_imaging').show(); */

                /* $('#size, #location, #morphology, #paris').parent().hide(); */

            }

            function fullScoreUpdate() {

                var SMSA = calculateDifficultyScore();
                //remove the check from the tag removed

                if (isNaN(SMSA.SMSA_total) === false) {

                    $('#SMSA_total').text(SMSA.SMSA_total);
                    $('#SMSA_group').text(SMSA.SMSA_group);

                };

                var SMSAplus = calculatePlusDifficultyScore();
                //remove the check from the tag removed

                if (isNaN(SMSAplus.SMSA_plus_total) === false) {

                    $('#numeratorSMSAplus').text(SMSAplus.SMSA_plus_total);
                    $('#denominatorSMSAplus').text(4);

                };

                var score = calculateScore();
                //remove the check from the tag removed

                if (isNaN(score.score_total) === false) {

                    $('#numeratorSum').text(score.score_total);
                    $('#denominatorSum').text(score.score_denominator);
                    $('#fraction').text(score.fraction.toFixed(2));


                };




            }

            function showHotSnareFields() {


                $('.hot').each(function() {

                    var label = null;
                    var label = $(this).parent().prev();
                    $(this).attr('disabled', false);
                    $(this).parent().show();
                    $(label).show().attr('disabled', false);

                    //if section length = 0 hide heading


                })

                headingsHider();

            }

            function headingsHider() {


                $('.divider').each(function() {

                    if ($(this).find('select:not(:disabled)').length == 0) {

                        $(this).hide();
                    } else {

                        $(this).show();
                    }


                })


            }

            function copyFormClipboard() {

                var score = calculateScore();
                var difficulty = calculateDifficultyScore();
                var difficulty_plus = calculatePlusDifficultyScore();
                var type_polypectomy = $('#type_polypectomy').val();


                var overall_score = {

                    "type_polypectomy": type_polypectomy,
                    "score": score,

                    "difficulty": difficulty,
                    "difficulty_plus": difficulty_plus,


                }

                copyToClipboard(JSON.stringify(overall_score));

                //alert('Data copied to clipboard');

                $('#success').text('Data Copied to Clipboard.');
                //$('div.error span').addClass('form-text text-danger');
                //$('#errorWrapper').show();

                $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
                    $("#successWrapper").slideUp(500);
                });

                return overall_score;

            }

            function getFieldsToSaveScoreOnly() {

                var names = {};

                $('.score').each(function() {

                    var name = null;

                    var value = null;

                    name = $(this).attr("name");

                    value = $(this).val();


                    names[name] = value;



                });

                return names;

            }

            function getFieldsToSavePlusSMSA() {


                var names = {};

                $('.score, .SMSA, .SMSAplus').each(function() {

                    var name = null;

                    var value = null;

                    name = $(this).attr("name");

                    value = $(this).val();


                    names[name] = value;



                });

                $('.result').each(function() {

                    var name = null;

                    var value = null;

                    name = $(this).attr("id");

                    value = $(this).text();


                    names[name] = value;



                });

                names['edit'] = edit;

                if (edit == 1) {

                    names['id'] = esdLesionPassed;


                }


                return names;


            }

            //function to push the user into the array or do on the server side, do on the server side.

            //push this to a script php

            function updateDatabase(fields) {


                const jsonString = JSON.stringify(fields);
                console.log(jsonString);

                /*         const jsonString = JSON.stringify(dataToSend);
                        console.log(jsonString); */

                var request = $.ajax({
                    beforeSend: function() {

                    },
                    url: siteRoot + "assets/scripts/scores/updatePolypectomyTable.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,

                });



                request.done(function(data) {



                    console.log(data);

                    if (data) {

                        alert('Updated');


                    }







                })

                return request;

            }

            function saveScoreUser(fields) {

                /*  const dataToSend = {



                 fields
                 //options: myOpts,

                 } */

                const jsonString = JSON.stringify(fields);
                console.log(jsonString);



                var request = $.ajax({
                    beforeSend: function() {

                    },
                    url: siteRoot + "assets/scripts/scores/saveScoreUser.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,

                });



                request.done(function(data) {



                    console.log(data);

                    if (data) {


                        var parsedData = $.parseJSON(data);
                        console.dir(parsedData);

                        if (parsedData.updated == 1) {

                            alert('Data Updated');

                        } else if (parsedData.updated == 1) {

                            alert('Data Updated');

                        } else if (parsedData.newid) {

                            alert('New Report Card Created');
                            edit = 1;
                            esdLesionPassed = parsedData.newid;

                        }


                    }







                })

                return request;




            }

            function fillForm(id) {

                const dataToSend = {




                    id: id,

                }

                const jsonString = JSON.stringify(dataToSend);
                console.log(jsonString);



                var request = $.ajax({
                    beforeSend: function() {

                    },
                    url: siteRoot + "assets/scripts/scores/getScoreDataSpecific.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,

                });



                request.done(function(data) {



                    console.log(data);

                    if (data) {


                        var parsedData = $.parseJSON(data);
                        console.dir(parsedData);

                        $(parsedData).each(function(i, val) {
                            $.each(val, function(k, v) {

                                if ($("#" + k).is(':checkbox')) {

                                    if (v == 1) {

                                        $("#" + k).prop("checked", true);
                                        checkedInputs.push("#" + k);

                                    } else {

                                        $("#" + k).prop("checked", false);

                                    }


                                } else if ($("#" + k).attr('id') == 'validated') {

                                    $("#" + k).val(v);

                                    console.log('found a validate and v is ' + v);

                                    //disable the save button if validated

                                    if (v == '1') {

                                        $("#saveesdLesion").hide();

                                    }


                                } else {


                                    $("#" + k).val(v);

                                }
                                //console.log(k+' : '+ v);
                            });

                        });

                        var score = calculateScore();
                        //remove the check from the tag removed

                        if (isNaN(score.score_total) === false) {

                            $('#numeratorSum').text(score.score_total);
                            $('#denominatorSum').text(score.score_denominator);
                            $('#fraction').text(+score.fraction.toFixed(2));

                            //numb = +numb.toFixed(2);

                        };

                        var SMSA = calculateDifficultyScore();
                        //remove the check from the tag removed

                        if (isNaN(SMSA.SMSA_total) === false) {

                            $('#SMSA_total').text(SMSA.SMSA_total);
                            $('#SMSA_group').text(SMSA.SMSA_group);

                        };
                        var SMSAplus = calculatePlusDifficultyScore();
                        //remove the check from the tag removed

                        if (isNaN(SMSAplus.SMSA_plus_total) === false) {

                            $('#numeratorSMSAplus').text(SMSAplus.SMSA_plus_total);
                            $('#denominatorSMSAplus').text(4);

                        };

                        esdLesionPassed = id;

                        edit = 1;

                        //put the data in the right place

                        //if it matches the name of an element do things for input
                        //if it matches id do things for id  

                        /* if (parsedData.updated == 1) {

                            alert('Data Updated');

                        } else if (parsedData.updated == 1) {

                            alert('Data Updated');

                        } else if (parsedData.newid) {

                            alert('New Report Card Created');
                            edit = 1;
                            esdLesionPassed = parsedData.newid;

                        } */


                    }







                })

                return request;




            }



            //more required methods

            //generate score per section

            //chartupdate

            //dashboard page separate



            $(document).ready(function() {

                //difficulty score

                //standard score

                // demarcatedArea();

                /* $('.content').on('click', '#calculate', function(){

				var score = calculateScore();
				var difficulty = calculateDifficultyScore();
				var difficulty_plus = calculatePlusDifficultyScore();
				

                var overall_score = {

            
                "score": score,
                "difficulty": difficulty,
                "difficulty_plus": difficulty_plus,


                }

                copyToClipboard(JSON.stringify(overall_score));

                alert('Data copied to clipboard');

                return overall_score;
				

		}) */

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

                /*  var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "World Energy Consumption by Sector - 2012"
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php //echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
  */


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


                                    <!--  <div>
                                                    <i class="fas fa-scroll cursor-pointer mr-4" data-toggle="modal" data-target="#modal-POEM-ENG" id="showPOEMReport"></i>
                                                </div>
                                                <div>
                                                    <i id="hideNotRequired" onclick="hideNotRequired();" class="mr-4 fas fa-search-minus cursor-pointer"></i>
											  </div>
											  <div>
												<i id="saveesdLesion" class="fas fa-save cursor-pointer mr-4" onclick="saveesdLesionForm();"></i>
											</div>-->
                                    <!--   <div>
                                        <i id='reset-form' class="fas fa-undo cursor-pointer mr-4" title='Reset Form'
                                            data-toggle='tooltip' data-placement='right'>&nbsp;Reset Form</i>
                                    </div> -->





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
                                <!-- <div class="error text-warning  text-left pb-2">
                
                </div> -->
                                <h6 class="mt-3 mb-3 pl-2 h5">Navigation</h6>

                                <ul class="section-nav">

                                    <!-- <li class="toc-entry toc-h2"><a href="#examples">Sections</a> -->
                                    <!-- <ul> -->
                                    <?php

echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#summary">Summary</a></li>';

echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#difficulty">Procedure Difficulty</a></li>';

                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#domains">Domains</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#certification">Certification</a></li>';
                       
                        

                        //echo "<button type=\"button\" class=\"btn ".$sectionTitle[$x]. "\">".$sectionTitle[$x]."</button>";

                    

                            ?>
                                    <!-- </ul> -->
                                    <!-- </li> -->
                                </ul>


                                <!-- <div class="d-none d-sm-inline-block align-items-center mt-4">
                                    <div class="card p-3 py-3 pr-6">

                                        <p class="h5">Scores</p>
                                        <P style="text-align:left;" class="strong h6">Overall: <span id="numeratorSum"
                                                class="result"></span>&nbsp;/&nbsp;<span id="denominatorSum"
                                                class="result"></span>
                                        </P>
                                        <P style="text-align:left;" class="strong h6">Fraction: <span id="fraction"
                                                class="result"></span></P>

                                        <p style="text-align:left; mt-3" class="strong h6">SMSA: <span id="SMSA_total"
                                                class="result"></span></p>

                                        <p style="text-align:left;" class="strong h6">SMSA Group : <span id="SMSA_group"
                                                class="result"></span></p>

                                        <p style="text-align:left;" class="strong h6">SMSA+: <span
                                                id="numeratorSMSAplus" class="result"></span>&nbsp;/&nbsp;<span
                                                id="denominatorSMSAplus" class="result"></span></p>


                                    </div>

                                    <?php if ($isSuperuser == 1){?>
                                    <p><button id='saveScore' type="button"
                                            class="btn btn-sm text-white btn-dark">Save</button></p>
                                            <?php } ?>

                                    <p><button id='calculate' type="button" class="btn btn-sm text-white btn-dark"
                                            name="calculate">Validate and Save</button></p>

                                    <?php if ($isSuperuser == 1){?>

                                    <p><button id='updateDatabase' type="button"
                                            class="btn btn-sm text-white btn-dark">Update Database Fields</button></p>


                                    <?php } ?> -->



                                <!-- <p>Polypectomy Score </p>
                <p>Complexity Score </p>
                <p>Overall Score </p> -->

                                <!--  </div> -->

                            </div>
                            <!--close sticky nav-->


                            <!-- </div> -->
                            <!--close right h-100 div-->
                        </div>
                        <!--close right column div-->

                        <div class="col-lg-9">


                            <?php
            
            //$requiredValues = array("Location","Morphology","Paris");
            
            //$values = array();
            //$values = $lesion->GetValuesSpecific($requiredValues);
            
            //print_r($values);
            
            ?>


                            <!-- <p><h3><b>Risk for Submucosal Invasion within a given LSL </h3>[algorithm ala Burgess 2018 Gastroenterology]</b></p>
             -->


                            <!-- <p><button id="show-info" class="btn btn-dark" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Show info
                                </button></p> -->
                            <!-- <div class="collapse" id="collapseExample">

                                <div class="card card-body">

                                    <p class="h5">Pre-requisites:</p>
                                    <p>
                                    <ul>Colon Polyp &ge; 10mm in size</ul>
                                    <ul>Cold or Hot Snare</ul>
                                    </p>

                                    <p>This tool asks for your subjective assessment of multiple domains of
                                        deconstructed polypectomy where 1 is poor and 5 very good</p>
                                    <p>Fill hot or cold first since different questions are asked for each. <br />The
                                        difficulty score consists of SMSA questions (4). <br />The difficulty+ score
                                        consists of SMSA+ questions (4) and applies only to hot snare.</p>
                                    <p>Once completed press copy and a machine readable version will be copied to the
                                        clipboard.</p>

                                    <p><a href="https://vimeo.com/562536661" data-fancybox="" data-toggle="tooltip"
                                            data-placement="bottom" title="" class=""
                                            data-original-title="Watch Explainer Video">

                                            Watch Introductory Video&nbsp;<i class="fas fa-play gieqsGold"></i>

                                        </a></p>


                                    <p>Hover over questions for more information</p>

                                    <p><i class="fas fa-play gieqsGold "></i> indicates availability of a video
                                        demonstration for that statement. click to view.</p>


                                </div>
                            </div> -->
                            <span id="summary"
                                class="d-block h1 text-white mr-2 mb-1"><?php echo $userFunctions->getUserName($userid);?></span>

                            <div class="d-flex justify-content-between">





                                <div class="card-body">
                                    <div class="d-flex">

                                        <div class="pl-4">

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-2"></span>

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-4">Procedures :
                                                <?php echo $gpat_glue->determineNumberofCompleteReportCards($userid);?></span>

                                            <span class="d-block h6 text-muted mr-2 mb-1 mt-0">Incomplete Reports :
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
                            <p id="difficulty" class="section d-block h1 gieqsGold mr-2 mb-1 mt-0">Procedure Difficulty
                            </p>

                            <?php
                            $dataPoints = $gpat_glue->getSMSAUserReportCards($userid, 3, false);

?>

                            <div class="d-flex justify-content-end">

                                <table>
                                    <tr>
                                        <td> <span
                                                class="d-block h2 text-white mr-2 mb-1">GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_unweighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1"><?php echo $gpat_glue->averageArray($gpat_glue->getUserFractionNonWeighted($userid, 3, false), false);?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span
                                                class="d-block h2 text-white mr-2 mb-1 mt-2">GPAT<sub>weighted</sub></span>
                                        </td>
                                        <td><span id="gpat_weighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $gpat_glue->averageArray($gpat_glue->getUserFractionWeighted($userid, 3, false), false);?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="d-block h3 text-white mr-2 mb-1 mt-2">delta
                                                GPAT<sub>1-month</sub></span></td>
                                        <td><span id="gpat_delta"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $gpat_glue->getDeltaWeightedFraction($userid, 2, false);?></span>
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