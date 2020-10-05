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
    <title>Olympus - proudly sponsors GIEQs</title>

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

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>

        


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

            <?php $livepage = 'Olympus.  Proud Silver sponsor of GIEQs';?>

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
<?php require (BASE_URI . '/pages/learning/pages/live/liveNav.php');?>
</nav>


<div class="main-content">
    <!-- Navbar warning -->
    <?php if ($liveAccess){

        $requiredArray = ['23', '29', '25', '30', '31'];

        //print_r($requiredArray);

        //print_r($liveAccess);

        
        $bFound = (count(array_intersect($liveAccess, $requiredArray))) ? true : false;

        //if (in_array($liveAccess, 25)){
        if ($bFound){


        
     
     
     ?>
     
   
     <div class="main-content">
        <!-- Navbar warning -->
          <div class="main-content">
        <!-- Header (v13) -->
        <section class="slice slice-xl bg-cover bg-size--cover pb-300" data-offset-top="#header-main" style="background-image: url(&quot;../../assets/img/backgrounds/img-12.jpg&quot;); padding-top: 147.188px;">
          <span class="mask bg-dark opacity-8"></span>
          <div class="container pt-7">
    
          <div class="row mb-3">
              <div class="col-lg-12 text-center justify-content-center mb-3">
    
                  <div class="text-center d-flex justify-content-center">
                      <img alt="Olympus" src="./assets/olympus.jpg" style="max-width:100%;max-height:20vh">
                  </div>
    
              </div>
          </div>
            <div class="row mt-4">
              <div class="col-lg-12 text-center">
              
                <div class="text-center">
                  <h2 class="display-4 text-white mb-2"></h2>
                  
    
                  <div class="row justify-content-center">
                    <div class="col-lg-6">
                      <p class="lead text-white lh-180">Proud Silver Sponsor of GIEQs.</p>
                      <a href="https://youtu.be/yOs94OEL7CA" class="btn btn-lg btn-white btn-icon-only rounded-circle hover-scale-110 mt-4" data-fancybox="">
                        <span class="btn-inner--icon"><i class="fas fa-play"></i></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Features (v35) -->
        <section class="slice slice-lg pt-lg-0">
          <div class="container">
            <div class="card-group flex-column flex-lg-row">
              <div class="card bg-gradient-primary border-0 px-4 py-5 mt--150">
                <div class="card-body">
                  <h5 class="h4 text-white">TXI - The New White Light</h5>
                  <p class="mt-4 mb-0 text-white">
                    Explore Texture and Color Enhancement Imaging.
                  </p>
                </div>
              </div>
              <div class="card bg-gradient-dark border-0 px-4 py-5 mt--150">
                <div class="card-body">
                  <h5 class="h4 text-white">RDI - The Safeguard for Endoscopic Therapy</h5>
                  <p class="mt-4 mb-0 text-white">
                  Experience Red Dichromatic Imaging
                  </p>
                </div>
              </div>
              <div class="card bg-gradient-primary border-0 px-4 py-5 mt--150">
                <div class="card-body">
                  <h5 class="h4 text-white">EDOF - The Phenomenon of Full Focus</h5>
                  <p class="mt-4 mb-0 text-white">
                  Discover Extended Depth of Field.</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Milestone (v1) -->
        <section class="slice slice-lg">
          <div class="container">
            <div class="mb-5 text-center">
            <div class="alert alert-modern alert-dark">
                                    <span class="badge gieqsGold badge-pill">
                                        New
                                        </span>
                                    <span class="alert-content">EVIS X1</span>
                                 </div>
              <h3 class=" mt-4">Our most Advanced Endoscopy System</h3>
              <div class="fluid-paragraph mt-3">
                <p class="lead lh-180">EVIS X1 represents a range of new, easy-to-use technologies that aim to revolutionize the way gastrointestinal disorders can be detected, characterized and treated.</p>
              </div>
            </div>
            <!-- Milestones -->
            
          </div>
        </section>
        <!-- Blog (v3) -->
        <section class="slice slice-lg">
          <div class="container">
            <div class="row row-grid">
              <div class="col-lg-3">
                <h4 class="mt-3">EVIS X1 — Our Most Advanced Endoscopy System</h4>
                <p class="lead mt-4"> We want to support every endoscopist. In every procedure. Every day.</p>
                <a href="https://www.olympus-europa.com/medical/en/Products-and-Solutions/Products/Product/EVIS-X1.html" class="btn btn-primary btn-icon rounded-pill hover-scale-110 mt-4">
                  <span class="btn-inner--icon">
                    <i class="fas fa-angle-right"></i>
                  </span>
                  <span class="btn-inner--text">Read more</span>
                </a>
              </div>
              <div class="col-lg-6">
                <div class="px-4">
                  <img alt="Image placeholder" src="./assets/Olympus_evis_X1.png" class="img-fluid rounded shadow-lg hover-scale-110">
                </div>
              </div>
              <div class="col-lg-3 d-lg-flex flex-lg-column">
                <div class="mt-lg-auto">
                  <p class="lead">EVIS X1 represents a range of new, easy-to-use technologies that aim to revolutionize the way gastrointestinal disorders can be detected, characterized and treated.</p>
                </div>
                <div class="mt-lg-auto">
                  <p class="lead mb-0"></p>
                  <div class="row align-items-center mt-5">
                    <div class="col-xl-4">
                      <small class="d-block text-uppercase text-muted ls-1 font-weight-600"></small>
                    </div>
                    <div class="col-xl-8">
                      <ul class="nav ml-lg-auto mb-0">
                        <li class="nav-item">
                          <a class="nav-link pl-0 disabled" href=""><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" href=""><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" href=""><i class="fab fa-twitter"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Features (v25) -->
        <section class="slice slice-lg">
          <div class="container no-padding">
            <div class="mb-5 text-center">
              <h3 class=" mt-4">The main features of the sponsor</h3>
              <div class="fluid-paragraph mt-3">
                <p class="lead lh-180">Advancing science for life.</p>
              </div>
            </div>
            <div class="card-deck">
              <div class="card hover-shadow-lg">
                <div class="card-body">
                  <div class="delimiter-bottom pb-3 mb-4">
                    <img alt="Image placeholder" src="./assets/Olympus_TXI.jpg" class="svg-inject" style="height: 60px; width: auto">
                    <h5 class="mt-4">TXI: The New White Light</h5>
                  </div>
                  <p class="">TXI (Texture and Color Enhancement Imaging) aims to enhance the visibility of suspicious tissue by improving the color, structure and brightness of the endoscopic image.</p>
                </div>
                <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                  <a href="https://www.olympus-europa.com/medical/en/Products-and-Solutions/Products/Product/EVIS-X1.html" class="btn btn-block btn-primary rounded-0">Learn more</a>
                </div>
              </div>
              <div class="card hover-shadow-lg">
                <div class="card-body">
                  <div class="delimiter-bottom pb-3 mb-4">
                    <img alt="Image placeholder" src="./assets/Olympus_RDI.jpg" class="svg-inject" style="height: 60px; width: auto">
                    <h5 class="mt-4">RDI: The Safeguard for Endoscopic Therapy</h5>
                  </div>
                  <p class="">RDI (Red Dichromatic Imaging) is designed to enhance the visibility of deep blood vessels and bleeding sources.</p>
                </div>
                <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                  <a href="https://www.olympus-europa.com/medical/en/Products-and-Solutions/Products/Product/EVIS-X1.html" class="btn btn-block btn-primary rounded-0">Learn more</a>
                </div>
              </div>
              <div class="card hover-shadow-lg">
                <div class="card-body">
                  <div class="delimiter-bottom pb-3 mb-4">
                    <img alt="Image placeholder" src="./assets/Olympus_EDOF.jpg" class="svg-inject" style="height: 60px; width: auto">
                    <h5 class="mt-4">EDOF: The Phenomenon of Full Focus</h5>
                  </div>
                  <p class="">EDOF (Extended Depth of Field) allows precise endoscopic observations through continuous broad focus and seamless magnification. The established Dual Focus function provides high magnification.
    </p>
                </div>
                <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                  <a href="https://www.olympus-europa.com/medical/en/Products-and-Solutions/Products/Product/EVIS-X1.html" class="btn btn-block btn-primary rounded-0">Learn more</a>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <!-- Subscribe (v3) -->
        <section class="slice slice-lg">
          <div class="container">
            <div class="mb-5 text-center">
              <h3 class=" mt-4">Find out more</h3>
              <div class="fluid-paragraph mt-3">
                <p class="lead lh-180">Come and <a href="https://www.olympus.be/index_nl.html">visit our homepage</a> for more about sponsor name.</p>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-7">
                <form class="mt-4">
                  <div class="form-group mb-0">
                    <div class="input-group input-group-lg input-group-merge rounded-pill bg-dark">
                      
                  
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>


<?php  

    }else{

        echo "<div class=\"container d-flex flex-wrap align-items-lg-stretch p-2 p-lg-5\">";
        echo '<p class="h6">You do not have access to the current plenary stream.  Please contact us if you believe this is a mistake</p>';
        echo '</div>';
    }


}else{

    echo "<div class=\"container d-flex flex-wrap align-items-lg-stretch p-2 p-lg-5\">";
        echo '<p class="h6">You currently do not have access to the live streams.  Please contact us if you believe this is a mistake.  You can get access <a href="' . BASE_URL . '/pages/program/registration.php">here.</a></p>';
        echo '</div>';
}

?>
      

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