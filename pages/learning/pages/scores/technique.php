<!DOCTYPE html>
<html lang="en">

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 1;
      /* $requiredUserLevel = 5; */


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer - Scores - SMIC calculator</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
       
        .gieqsGold {

            color: rgb(238, 194, 120);


        }

        .card-placeholder{

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

        

        

        iframe {
  box-sizing: border-box;
    height: 25.25vw;
    left: 50%;
    min-height: 100%;
    min-width: 100%;
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    width: 100.77777778vh;
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
    height:250px;
}

.card-placeholder{

    width: 204px;

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
   
    <div class="main-content bg-gradient-dark">

        <!--Header CHANGEME-->

    <div class="d-flex align-items-end container">
        <p class="h1 mt-10">Polypectomy Technique Scorer</p>

    </div>
    <div class="d-flex align-items-end container">
        <p class="text-muted pl-4 mt-2"></p>

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

	function determineCOVERT (location, morphology, paris) {
			
			if ((location === null) || (morphology === null) || (paris ===null)){
		
				COVERT = '-';
				return COVERT;

			}else{
				
				
				var locationInt = +location;
				var morphologyInt = +morphology;
				var parisInt = +paris;
				
				
				if (isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt)){

				COVERT = '-';
				return COVERT;

				}else{
				
				
				var locationCategory;
				var morphologyCategory;
				var parisCategory;

				//need colon site
				//need morphology
				//need paris

				//convert to the required format

				//location proximal 9-13 others distal //category 1 distal 2 proximal

				
				if (locationInt < 9){
					locationCategory = 1;
				}else{
					locationCategory = 2;
				}
					
				if (morphologyInt == 1){
					
					morphologyCategory = 1; //granular
				}else if (morphologyInt == 2){
					
					morphologyCategory = 2; // non-granular
					
				}else if (morphologyInt > 2){  //can't calculate the score as serrated and mixed not supported
					
					COVERT = '-';
					return COVERT;
					
				}
					
					
				if (parisInt == 2){
					
					parisCategory = 1; // 0-IIa
					
				}else if (parisInt == 6){
					
					parisCategory = 2; // 0-IIa/Is
					
				}else if (parisInt == 1){
					
					parisCategory = 3; //0-Is
					
				}else{ // unsupported Paris class
					
					COVERT = '-';
					return COVERT;
				}	
			
			
				//now have categorical variables available only if they are correct type for this score	
					
				if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 1){
					
					COVERT = '0.7%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 1){
					
					COVERT = '1.2%';
				}else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 2){
					
					COVERT = '4.2%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 2){
					
					COVERT = '10.1%';
				}else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 3){
					
					COVERT = '2.3%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 3){
					
					COVERT = '5.7%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 1){
					
					COVERT = '3.8%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 1){
					
					COVERT = '6.4%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 2){
					
					COVERT = '12.7%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 2){
					
					COVERT = '15.9%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 3){
					
					COVERT = '12.3%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 3){
					
					COVERT = '21.4%';
				}				
					
				return COVERT;	
					
				}
			
			}
			
			//surely there should be a version involving size...

            
		}

    //hie below if demarcated area = yes

    function noDemarcatedArea(){

       /*  var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).show();
        $(arrayToHide).show();
        $('#demarcation_imaging').hide(); */


    }

    function demarcatedArea(){

        /* var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).hide();
        $(arrayToHide).hide();
        $('#demarcation_imaging').show(); */

        /* $('#size, #location, #morphology, #paris').parent().hide(); */

    }



	function determineSMIC (demarcation, size, location, morphology, paris, debug=true) {
			
			if ((demarcation == null)){

				return 'Was there a demarcated area?';



            }else if ((demarcation == 1)){

                return {

                "risk_text" : 'Very High Risk',
                "risk": 17.6,
                "odds": 16,


                }
                
             
                
            }else if ((size == null) || (location == null) || (morphology == null) || (paris == null)){
		
				return 'Missing Variables - please enter all 4 further characteristics';


			}else{
				
				//var demarcation = +demarcation;
				var sizeInt = +size;
				var locationInt = +location;
				var morphologyInt = +morphology;
				var parisInt = +paris;
				
				
				if (isNaN(sizeInt) || isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt) ){

					return 'Issue with variables supplied, please check they are numbers';

				}else{
				
					var SMICriskOR = 0;
					var SMICriskactual = 1.1;


					if (sizeInt == 2){
						//>=30mm
						SMICriskOR = SMICriskOR + 1.12;

					}else if (sizeInt == 3){
						//>=40mm
						SMICriskOR = SMICriskOR + 2*(1.12);

					}else if (sizeInt == 4){
						//>=-50mm
						SMICriskOR = SMICriskOR + 3*(1.12);

					}else if (sizeInt == 5){
						//>=60mm
						SMICriskOR = SMICriskOR + 4*(1.12);

					}else if (sizeInt == 6){
						//>=70mm
						SMICriskOR = SMICriskOR + 5*(1.12);

					}else if (sizeInt == 7){
						//>=80mm
						SMICriskOR = SMICriskOR + 6*(1.12);

					}else if (sizeInt == 8){
						//>=90mm
						SMICriskOR = SMICriskOR + 7*(1.12);

					}else if (sizeInt == 9){
						//>=100mm
						SMICriskOR = SMICriskOR + 8*(1.12);

					}
					
					if (locationInt == 1){

						SMICriskOR = SMICriskOR + 1.91;

					}

					
					
					if (paris == 2){

					SMICriskOR = SMICriskOR + 2.73;

					}else if (paris == 3){

					SMICriskOR = SMICriskOR + 2.49;

					}

					if (morphology == 2){

						SMICriskOR = SMICriskOR + 2.8;

						}else if (morphology == 3){

						SMICriskOR = SMICriskOR + 0.72;

						}
						
					//round(SMICriskOR, 1);

					if (SMICriskOR == 0){

						SMICriskOR = 1;

					}

					if (SMICriskOR == -0.28){

						SMICriskOR = 0.72;

					}

					var SMICnumeric = SMICriskOR * SMICriskactual;

					SMICriskOR = round(SMICriskOR, 1);

					SMICnumeric = round(SMICnumeric, 1);

                    if (SMICnumeric < 10){

                        var text = 'Low Risk';

                    }else if (SMICnumeric >= 10){


                        var text = 'High Risk';

                    }

                    //return an object

                    return {

                        "risk_text" : text,
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

                if (SMSA_total < 6){

                    SMSA_group = 1;

                }else if (SMSA_total < 9){

                    SMSA_group = 2;

                }else if (SMSA_total < 13){

                    SMSA_group = 3;

                }else if (SMSA_total > 12 ){

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
            var PANL = $('#PANL').val();
            
            var location_difficult = $('#location_difficult').val();
            var demarcation = $('#demarcation').val();
            //var paris = $('#paris').val();

            if ((non_lifting == null) || (PANL == null) || (location_difficult == null) || (demarcation == null)) {

                return 'Missing Variables - please enter all 4 further characteristics';


            }

            var non_liftingInt = +non_lifting;
            var PANLInt = +PANL;
            var location_difficultInt = +location_difficult;
            var demarcationInt = +demarcation;

            if (isNaN(non_liftingInt) || isNaN(PANLInt) || isNaN(location_difficultInt) || isNaN(demarcationInt)) {

                return 'Issue with variables supplied, please check they are numbers';

            } else {

                var SMSA_plus_total = non_liftingInt + PANLInt + location_difficultInt + demarcationInt;

                

                return {

                    "non_lifting": non_liftingInt,
                    "PANL": PANLInt,
                    "location_difficult": location_difficultInt,
                    "demarcation": demarcationInt,
                    "SMSA_plus_total": SMSA_plus_total,
                    


                }
            }


        }


	
		$(document).ready(function() {

            //difficulty score

            //standard score

            demarcatedArea();

			$('.content').on('click', '#calculate', function(){

				var demarcation = $('#demarcation').val();
				var size = $('#size').val();
				var location = $('#location').val();
				var morphology = $('#morphology').val();
				var paris = $('#paris').val();

				var COVERT = determineSMIC(demarcation, size, location, morphology, paris);

                if (typeof COVERT === 'object' && COVERT !== null){

                    $('#result').html('<h3 class="gieqsGold"> ' + COVERT.risk_text + '</h3>');
                $('#result').append('<h4>' + COVERT.risk + '% </h4>');
                $('#result').append('<p>The data was copied to your clipboard to paste back into the survey</p>');

                $('#result').append('(or ' + COVERT.odds + 'x the risk of a granular 0-IIa 20-29mm LSL in the colon proximal to the sigmoid without a demarcated area or depression, risk 1.1%)<br>');
                $('#result').addClass('gieqsGold');

                generateScore();


                }else{

                    $('#result').html('<h3 class="gieqsGold"> ' + COVERT + '</h3>').addClass('gieqsGold');
                   

                }


                
                
                $('html, body').animate({
                    scrollTop: eval($('#result').offset().top - 200)
                }, 150);
			})

            $('.content').on('change', '.formInputs', function(){


                $('#result').html('');


            })

            $('.content').on('change', '#demarcation', function(){

                var demarcation = $('#demarcation').val();

                if (demarcation == 0){


                    noDemarcatedArea();


                }else if (demarcation == 1){

                    demarcatedArea();

                    $('#demarcation_imaging').parent().show();



                }

                })

		})
	
	</script>
	

</head>

<body>

	
	
    <div class='content'>
        <div class="row">
            <div class="col-9">
        

<?php

//$requiredValues = array("Location","Morphology","Paris");

//$values = array();
//$values = $lesion->GetValuesSpecific($requiredValues);

//print_r($values);

?>

       
                <!-- <p><h3><b>Risk for Submucosal Invasion within a given LSL </h3>[algorithm ala Burgess 2018 Gastroenterology]</b></p>
 -->
                <p>Pre-requisites:</p>
                <p><ul>Colon Polyp  &ge; 10mm in size</ul><ul>Cold or Hot Snare</ul></p>
                <p>This tool asks for your subjective opinion on multiple domains of deconstructed polypectomy where 1 is poor and 5 very good</p>
		<br>
		<div id='result' class='yellow'></div>
		<br>
		
		<form action="adminGenerateUserEmail.php" method="post">
            <fieldset>
				<?php

                ?><h2 id="global" class="mt-4">Global Competencies</h2>

                <?php
				$formv1->generateSelectCustom ('Tip control:', 'tip-control', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), 'How good is the tip control demonstrated throughout the video?');
				echo '<br/>';

                $formv1->generateSelectCustom ('Positioning with respect to the polyp:', 'positioning', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), 'How good is the position achieved by the endoscopist with respect to accessing the polyp?');
				echo '<br/>';

                ?><h2 id="injection" class="mt-4">Injection Technique</h2>

                <?php

                $formv1->generateSelectCustom ('Injection is performed in the correct plane:', 'injection_plane', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), 'Does the endoscopist quickly find the correct plane when injectiing or is there repeated injection too superficial or deep?');
                echo '<br/>';

                $formv1->generateSelectCustom ('Injection is performed dynamically:', 'injection_dynamic', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), 'Once the correct plane hass been found does the endoscopist move the needle while injecting to adequately raise the lesion?');
                echo '<br/>';


                $formv1->generateSelectCustom ('Injection is used to improve lesion access:', 'injection_access', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), 'Injection is used to improve lesion access');
                echo '<br/>';



                ?><h2 id="snare" class="mt-4">Snare Placement Technique</h2>

                <?php

                $formv1->generateSelectCustom ('Stable positon with lesion at 6 \'o clock OR transformed to 6 \'o clock:', 'snare_position', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
                echo '<br/>';

                $formv1->generateSelectCustom ('Snare precisely visualised during placement and closure (V of the snare):', 'snare_visualised', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
                echo '<br/>';

                $formv1->generateSelectCustom ('Residual tissue islands avoided if piecemeal resection OR Macroscopically complete if en-bloc resection attempted:', 'residual', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
                echo '<br/>';

    



                ?><h2 id="safety" class="mt-4">Safety Checks Prior to Resection (with or without diathermy)</h2>

                <?php


$formv1->generateSelectCustom ('Takes the snare and closes to 1cm, uses tactile feedback OR assistant closes snare to mark:', 'snare_closed', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
echo '<br/>';

$formv1->generateSelectCustom ('Moves the closed snare to confirm independent movement from deeper structures:', 'independent_movement', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
echo '<br/>';


?><h2 id="defect" class="mt-4">Defect Assessment After Resection</h2>

                <?php

$formv1->generateSelectCustom ('MUCOSA - Looks for, detects and removes residual at margin and within defect:', 'mucosa', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), 'Including residual muscularis mucosae');
echo '<br/>';

$formv1->generateSelectCustom ('SUBMUCOSA - Looks for, detects and treats any bleeding vessels within the defect::', 'submucosa', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), 'Does not treat non-bleeding herniating vessels. Does not treat other appearances of the submucosa detailed in Desomer et al. 2018 GIE');
echo '<br/>';

$formv1->generateSelectCustom ('MUSCULARIS - Looks for, detects and treats Deep Mural Injury &ge; 2 (Sydney Classification) :', 'muscularis', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
echo '<br/>';




?><h2 id="accessory" class="mt-4">Accessory Techniques in Polypectomy</h2>

                <?php

$formv1->generateSelectCustom ('Placement of Through the Scope CLIPS:', 'clip_placement', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
echo '<br/>';


$formv1->generateSelectCustom ('Placement of Polyp Retrieval Device:', 'retrieval_device', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
echo '<br/>';

$formv1->generateSelectCustom ('Thermal ablation of the POST EMR Margin:', 'thermal_ablation', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
echo '<br/>';

$formv1->generateSelectCustom ('Use of Coagulation grasper', 'coag_grasper', 'factor', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good'), '');
echo '<br/>';


?><h2 id="difficulty" class="mt-4">Difficulty Score (SMSA - EMR, SMSA +)
</h2>

                <?php


$formv1->generateSelectCustom ('Size:', 'size', 'SMSA', array('1' => '< 1cm', '3' => '1 - 1.9cm', '5' => '2 - 2.9cm', '7' => '3 - 3.9cm', '9' => '> 4cm'), '');
echo '<br/>';

$formv1->generateSelectCustom ('Morphology:', 'morphology', 'SMSA', array('1' => 'Pedunculated', '2' => 'Sessile', '3' => 'Flat',), '');
echo '<br/>';

$formv1->generateSelectCustom ('Site:', 'site', 'SMSA', array('1' => 'Left', '2' => 'Rght',), '');
echo '<br/>';
			

$formv1->generateSelectCustom ('Access:', 'access', 'SMSA', array('1' => 'Easy', '3' => 'Difficult',), '');
echo '<br/>';

$formv1->generateSelectCustom ('Non-lifting:', 'non_lifting', 'SMSAplus', array('0' => 'No', '1' => 'Yes', ), '');
echo '<br/>';
               
$formv1->generateSelectCustom ('Previous attempt:', 'PANL', 'SMSAplus', array('0' => 'No', '1' => 'Yes', ), '');
echo '<br/>';

               
$formv1->generateSelectCustom ('Direct ileocaecal valve, diverticular or appendiceal involvement:', 'location_difficult', 'SMSAplus', array('0' => 'No', '1' => 'Yes', ), '');
echo '<br/>';


$formv1->generateSelectCustom ('Lesions with a regular-irregular demarcation zone:', 'demarcation', 'SMSAplus', array('0' => 'No', '1' => 'Yes', ), '');
echo '<br/>';




				?>

                
				
			
									   
				

                <p><button id='calculate' type="button" name="calculate">Calculate and Copy Result to Clipboard</button></p>

                <!--conversion to newlines $(this).val().replace(/\r\n|\r|\n/g,"<br />")-->

                <p></p>
            </fieldset>
        </form>

		<p class="mt-6">Definitions:</p>
        <ul>
        <li>Demarcation Area - Area within a colorectal polyp where a regular pit/vascular pattern becomes disordered. e.g. NICE II to NICE III, Kudo III/IV to Kudo V, JNET 2A to JNET 2B/3</li>
        <li>Granularity - </li>
        


        </ul>
        
        <P>Reference:</P>
		<P>1.	Burgess NG, Hourigan LF, Zanati SA, Brown GJ, Singh R, Williams SJ, et al. Risk Stratification for Covert Invasive Cancer Among Patients Referred for Colonic Endoscopic Mucosal Resection: A Large Multicenter Cohort. Gastroenterology. 2017 Sep;153(3):732–742.e1. </P>
        <P>Score Adapted for GIEQs.com by David Tate:</P>
        <P>With thanks to Nick Burgess for supplying the original study data</P>
		<P>Unauthorised distribution of the code prohibited.  Copyright 2020.  All rights reserved </P>
    
    
    </div> <!--end col-9-->


    <div id="right" class="col-lg-3 col-xl-3 border-left">
        	<div class="h-100 p-4">
        		<div id="sticky" data-toggle="sticky" data-sticky-offset="100" class="is_stuck pr-3 mr-3 pl-2 pt-2"
        			style="position: fixed; top: 200px;">
        			<div id="messageBox" class='text-left text-white pb-2 pl-2 pt-2'></div>
						<div
                                                class="d-flex flex-nowrap text-small text-muted text-right px-3 mt-1 mb-3 ">
                                                
                                                
                                               <!--  <div>
                                                    <i class="fas fa-scroll cursor-pointer mr-4" data-toggle="modal" data-target="#modal-POEM-ENG" id="showPOEMReport"></i>
                                                </div>
                                                <div>
                                                    <i id="hideNotRequired" onclick="hideNotRequired();" class="mr-4 fas fa-search-minus cursor-pointer"></i>
											  </div>
											  <div>
												<i id="saveesdLesion" class="fas fa-save cursor-pointer mr-4" onclick="saveesdLesionForm();"></i>
											</div>
                                                <div>
                                                <i id='video-forward' class="fas fa-trash cursor-pointer mr-4"></i>
                                                </div> -->
                                                
                                            
                                                
                                                
                                                
                                            </div>


        			<div id="errorWrapper"
        				class="error alert alert-warning alert-flush alert-dismissible collapse bg-gieqsGold"
        				role="alert">
        				<strong>Check the form!</strong> <span id="error"></span><button type="button" class="close"
        					data-hide="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			<div id="successWrapper" class="success alert alert-success alert-flush alert-dismissible collapse"
        				role="alert">
        				<strong>Success!</strong> <span id="success"></span><button type="button" class="close"
        					data-hide="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
					</div>
					
					<div id="warningWrapper" class="warning alert alert-warning alert-flush alert-dismissible collapse"
        				role="alert">
        				<strong>Warning!</strong> <span id="warning"></span><button type="button" class="close"
        					data-hide="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
                        <!-- <div class="error text-warning  text-left pb-2">
                
                </div> -->
              <h6 class="mt-3 mb-3 pl-2">Navigation</h6>
              
              <ul class="section-nav">
              
                <!-- <li class="toc-entry toc-h2"><a href="#examples">Sections</a> -->
                  <!-- <ul> -->
                  <?php

                   
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#global">Global</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#injection">Injection Technique</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#snare">Snare Placement Technique</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#safety">Safety Checks prior to Reseection</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#accessory">Accessory Techniques</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#difficulty">Difficulty</a></li>';
                        

                        //echo "<button type=\"button\" class=\"btn ".$sectionTitle[$x]. "\">".$sectionTitle[$x]."</button>";

                    

                            ?>
                             <!-- </ul> -->
                <!-- </li> -->
                </ul>
             
                <ul class="section-nav">

                <div class="d-none d-sm-inline-block align-items-center mt-4">
				<h4 style="text-align:center;" class="strong">Overall Score<br/><span id="numeratorSum"></span>&nbsp;/&nbsp;<span id="denominatorSum"></span></h4>

				<h4 style="text-align:center; mt-3" class="strong">SMSA<br/><span id="SMSA_total"></span></h4>

                <h4 style="text-align:center;" class="strong">SMSA Group<br/><span id="SMSA_group"></span></h4>

                <h4 style="text-align:center;" class="strong">SMSA+<br/><span id="numeratorSMSAplus"></span>&nbsp;/&nbsp;<span id="denominatorSMSAplus"></span></h4>

                
                <!-- <p>Polypectomy Score </p>
                <p>Complexity Score </p>
                <p>Overall Score </p> -->

                </div>
                </ul>
            
            </div> <!--close sticky nav-->  
                                
            
        </div> <!--close right h-100 div-->
        </div> <!--close right column div-->


    </div> <!--end row-->
    
    </div><!--end content-->

            
    </div> <!--end content-->



   
   
    

       
    </div> <!--end overall-->



    
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

    <script>
        
        //the number that are actually loaded
        var loaded = 1;

        //the number the user wants
        var loadedRequired = 1;

        var firstTime = 1; var activeStatus = 1;

        var requiredTagCategoriesText = $("#requiredTagCategories").text();

        var requiredTagCategories = JSON.parse(requiredTagCategoriesText);

        function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return window.clipboardData.setData("Text", text);

    }
    else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        }
        catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        }
        finally {
            document.body.removeChild(textarea);
        }
    }
}

        function generateScore(){

            var demarcation = $('#demarcation').val();
				var size = $('#size').val();
				var location = $('#location').val();
				var morphology = $('#morphology').val();
				var paris = $('#paris').val();

                var COVERT = determineSMIC(demarcation, size, location, morphology, paris);




                            var score =  {
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
        

        function refreshNavAndTags(){

            var screenTop = $(document).scrollTop();

            //console.log(top);

            var tags = [];

                $('.tag').each(function(){

                    if ($(this).is(":checked")){
                        tags.push($(this).attr('data'));
                    }


                })

                

                //push how many loaded, use loaded variable

                console.dir(tags);

                /*var key = $(this).attr('data');

				const dataToSend = {

					key: key,

				}*/var dataToSend = {

                    tags: tags,
                    requiredTagCategories: requiredTagCategories,
                    active: activeStatus,

                    }

                    //const jsonString2 = JSON.stringify(dataToSend);

				const jsonString = JSON.stringify(dataToSend);
				////console.log(jsonString);
				//console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

				var request2 = $.ajax({
					beforeSend: function () {

                        $('#videoCards').html("<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>");
                        //for each tags array push the badges to the tags shown area
                        var html = '';
                        $.each(tags, function(k,v){

                            //HERE WE HAVE THE TAGID
                            
                            var tagid = v;

                            //get the name and category

                            var tagName = $('body').find('#navigationZone').find('#tag'+v).siblings().text();

                            var tagCategory = $('body').find('#navigationZone').find('#tag'+v).parent().parent().parent().parent().find('span').text();

                            html += '<span class="badge bg-gieqsGold text-dark mx-2 my-2 tagButton" data="'+v+'">'+tagCategory+ ' / ' +tagName+' <i style="float:right;" class="fas fa-times removeTag cursor-pointer ml-1" data="'+v+'"></i></span>';

                        });
                        $('body').find('#navigationZone').find('#shown-tags').html(html);

					},
					url: siteRoot + "/pages/learning/scripts/getNavv2.php",
					type: "POST",
					contentType: "application/json",
					data: jsonString,
				});



				request2.done(function (data) {
                    // alert( "success" );
                    if (data != '[]'){
                        var toKeep = $.parseJSON(data.trim());
                        //alert(data.trim());
                        console.dir(toKeep);
                        
                             
                            $('.tag').each(function(){

                                var tagid = $(this).attr('data');

                                if (toKeep.indexOf(tagid) > -1){

                                    $(this).attr('disabled', false);

                                }else{

                                    $(this).attr('disabled', true);
                                }

                            })    

                      
                    }
					//$(document).find('.Thursday').hide();
                })
                
                request2.then(function (data) {
                    var tags = [];

                    $('.tag').each(function(){

                        if ($(this).is(":checked")){
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
                        referringUrl: $('#escaped_url').text(), active: activeStatus,


                    }

                    const jsonString2 = JSON.stringify(dataToSend);

                  

                    
                    const jsonString = JSON.stringify(tags);

                    console.dir(jsonString2);


                    var request3 = $.ajax({
					beforeSend: function () {


					},
					url: siteRoot + "/pages/learning/scripts/getVideos.php",
					type: "POST",
					contentType: "application/json",
					data: jsonString2,
                    });
                    request3.done(function (data) {
                    // alert( "success" );
                    if (data){
                        //var toKeep = $.parseJSON(data.trim());
                        //alert(data.trim());
                        //console.dir(toKeep);

                        $('#videoCards').html(data);
                        $('body').find('#itemCount').each(function(){

                            var count = $('body').find('.individualVideo').length;
                            $(this).text(count);


                        })


                        if (firstTime == 1){
                        $('body').on('click', '#loadMore', function () {

                        loadedRequired = loadedRequired + 1;

            
                        refreshNavAndTags();

                        })
                        }

                        

                        if (firstTime > 1 && loadedRequired > 1){

                                var loadedRequiredMultiple = ((loadedRequired-1) * 10)-3;

                                //console.log(loadedRequiredMultiple);

                                //scroll to current level

                            
                                $("body,html").animate(
                                {
                                    scrollTop: $('body').find('.individualVideo:eq('+loadedRequiredMultiple +')').offset().top
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

        $(document).ready(function () {

           

            //refreshNavAndTags();

            $('#refreshNavigation').click(function(){


                firstTime = 1;
                 //the number that are actually loaded
                loaded = 1;

                //the number the user wants
                loadedRequired = 1;
                
                $('.tag').each(function(){

                    if ($(this).is(":checked")){
                        
                        $(this).prop('checked', false);
                    }


                })

                refreshNavAndTags();

            })

            //on load check if any are checked, if so load the videos

            //if none are checked load 10 most recent videos for these categories

            $('.tag').click(function(){

                refreshNavAndTags();

            })

            $('body').on('click', '.removeTag', function(){

                var tagToRemove = $(this).attr('data');
                //remove the check from the tag removed

                $('.tag').each(function(){

                if ($(this).attr("data") == tagToRemove){
                    
                    $(this).prop('checked', false);

                }


                })


                refreshNavAndTags();

            })
            //active behaviour

            $('body').on('change', '#active', function(){

                var active = $(this).children("option:selected").val();
                //remove the check from the tag removed

                activeStatus = active;

                refreshNavAndTags();

            })

            $('body').on('change', '.SMSA', function(){

            var SMSA = calculateDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSA.SMSA_total) === false){

                $('#SMSA_total').text(SMSA.SMSA_total);
                $('#SMSA_group').text(SMSA.SMSA_group);

            };

            

            })

            $('body').on('change', '.SMSAplus', function(){

                

                //alert('hello');
            var SMSAplus = calculatePlusDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSAplus.SMSA_plus_total) === false){

                $('#numeratorSMSAplus').text(SMSAplus.SMSA_plus_total);
                $('#denominatorSMSAplus').text(4);

            };



            })

            


           
           

         


        })
    </script>
</body>

</html>