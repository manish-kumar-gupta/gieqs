<!DOCTYPE html>
<html lang="en">

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $openaccess = 0;
      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      ?>

    <!--Page title-->
    <title>Boston Scientific - proudly sponsors GIEQs</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/swiper/dist/css/swiper.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/swiper/dist/js/swiper.min.js"></script>


    

    <style>
        #navbar-main{

            z-index: 9999;
        }
        
        .gieqsGold {

            color: rgb(238, 195, 120);


        }

        .tagButton {

            cursor: pointer;

        }

        .tagCard {

background-color: #1b385d75; 



}

#live-chat-app {
    background-color: #1b385d75 !important; 

}

.tagCardHeader{

    background-color: #162e4d;

}

        

.cursor-pointer {

    cursor: pointer;

}

@media (min-width: 992px) {
    .tagCard {

            
left: -50vw;
top: -20vh;


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

        <body>

            <?php $livepage = 'Boston Scientific.  Proud PLATINUM sponsor of GIEQs';?>

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>


<div class="mt-10"></div>
<?php         


$videoset = 2;
require(BASE_URI . '/pages/learning/pages/general/live_nav.php'); ?>
<div class="main-content">
    <!-- Navbar warning -->
    
  
<div class="main-content">
    <!-- Navbar warning -->
  
  <div class="main-content">
    <!-- Header (v13) -->
    <section class="slice slice-xl bg-cover bg-size--cover mb-5" data-offset-top="#header-main" style="background-image: url('../../assets/img/backgrounds/img-12.jpg');">
      <span class="mask bg-dark opacity-8"></span>
      <div class="container pt-7">

      <div class="row mb-3">
          <div class="col-lg-12 text-center justify-content-center mb-3">

              <div class="text-center d-flex justify-content-center">
                <a href="https://www.bostonscientific.com/en-EU/medical-specialties/gastroenterology.html" target="_blank">
                  <img alt="Boston Scientific" src="https://www.gieqs.com/assets/img/sponsors-pages/boston/Boston.png"
                      style="max-width:100%;max-height:20vh">
                </a>
              </div>

          </div>
      </div>
        <div class="row mt-4">
          <div class="col-lg-12 text-center">
          
            <div class="text-center">
              <h2 class="display-4 text-white mb-2"></h2>
              

              <div class="row justify-content-center">
                <div class="col">
                  <p class="lead text-white lh-180">Proud Platinum Sponsor of GIEQs.</p>
                  <div class="embed-responsive embed-responsive-16by9 rounded">
                    <iframe src="https://player.vimeo.com/video/612432353?h=281e96f882" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features (v35) -->
    <section class="slice slice-lg pt-lg-0">
      <div class="container pt-5">
        <div class="card-group flex-column flex-lg-row">
          <div class="card bg-gradient-dark border-0 p-5 mt--150">
            <div class="card-body">
              <h5 class="h4 text-white">Boston Scientific</h5>
              <p class="mt-4 mb-0 text-white">
                Boston Scientific is dedicated to transforming lives through innovative medical solutions that improve the health of patients around the world.<br><br>
                To deliver high-quality patient care, you need a partner that provides innovative technologies, robust clinical and economic evidence, education, reimbursement support, and a portfolio of services.<br><br>
                We are committed to working with you to pursue meaningful innovation, develop technologies, and provide support that offers greater value and makes a difference in the lives of your patients.
              </p>
              <ul class="nav mt-4">
                <!--
                <li class="nav-item">
                  <a class="nav-link pl-0" href="#"><i class="fab fa-instagram" target="_blank"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fab fa-facebook" target="_blank"></i></a>
                </li>
                -->
                <li class="nav-item">
                  <a class="nav-link pl-0" href="https://www.linkedin.com/company/acertys" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog (v3) -->
    <section class="slice slice-lg">
      <div class="container">
        <div class="row row-grid">
          <div class="col-lg-3">
            <div class="p-3">
              <a href="https://www.bostonscientific.com/en-EU/products/direct-visualization-systems/spyglass-ds-direct-visualization-system.html" target="_blank">
                <img alt="Image" src="https://www.gieqs.com/assets/img/sponsors-pages/boston/Boston 1.jpg" class="img-fluid rounded shadow-lg hover-scale-110">
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="p-3">
              <a href="https://www.bostonscientific.com/en-EU/products/stents-gastrointestinal/axios-stent-and-electrocautery-enhanced-delivery-system.html" target="_blank">
                <img alt="Image" src="https://www.gieqs.com/assets/img/sponsors-pages/boston/Boston 2.jpg" class="img-fluid rounded shadow-lg hover-scale-110">
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="p-3">
              <a href="https://www.bostonscientific.com/en-EU/products/single-use-scopes/exalt-model-d.html" target="_blank">
                <img alt="Image" src="https://www.gieqs.com/assets/img/sponsors-pages/boston/Boston 3.jpg" class="img-fluid rounded shadow-lg hover-scale-110">
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="p-3">
              <a href="https://www.bostonscientific.com/en-EU/products/infection-prevention/orca.html" target="_blank">
                <img alt="Image" src="https://www.gieqs.com/assets/img/sponsors-pages/boston/Boston 4.jpg" class="img-fluid rounded shadow-lg hover-scale-110">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
</div>


      

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>
    <script>
    var videoPassed = $("#id").text();
                    </script>

    <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {


//userid is lesionUnderEdit

//console.log('updatePassword chunk');
//go to php script with an object from the form

var data = getFormDatav2($('#NewUserForm'), 'users', 'user_id', null, 1);

//TODO add identifier and identifierKey

console.log(data);

data = JSON.stringify(data);

console.log(data);

disableFormInputs('NewUserForm');

var passwordChange = $.ajax({
url: siteRoot + "/assets/scripts/passwordResetGenerate.php",
type: "POST",
contentType: "application/json",
data: data,
});

passwordChange.done(function(data){


Swal.fire({
type: 'info',
title: 'Reset Password',
text: data,
background: '#162e4d',
confirmButtonText: 'ok',
confirmButtonColor: 'rgb(238, 194, 120)',

}).then((result) => {

  resetFormElements('NewUserForm');
  enableFormInputs('NewUserForm');
  //$('#registerInterest').modal('hide');

})



})

}

        $(document).ready(function () {

            $(document).find('#chat').css('background-color', '#162e4d');


          if (signup == '2456') {

$('#registerInterest').modal('show');

}

$(document).on('click', '#submitPreRegister', function() {

event.preventDefault();
$('#NewUserForm').submit();

})

$(document).on('click', '#login', function() {

event.preventDefault();
window.location.href = siteRoot + '/pages/authentication/login.php';


})

$("#NewUserForm").validate({

invalidHandler: function(event, validator) {
    var errors = validator.numberOfInvalids();
    console.log("there were " + errors + " errors");
    if (errors) {
        var message = errors == 1 ?
            "1 field contains errors. It has been highlighted" :
            +errors + " fields contain errors. They have been highlighted";


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
  


          email: {
            required: true,
            email: true,

          },

          



},messages: {



email: {
required: 'Please enter the email address you used to register for GIEQs Online',



},

},
submitHandler: function(form) {

    submitPreRegisterForm();

    //console.log("submitted form");



}




});
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


        })
    </script>
</body>

</html>