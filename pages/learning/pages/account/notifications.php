<!DOCTYPE html>
<html lang="en">

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 4;


      require BASE_URI . '/head.php';

      $general = new general;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">

    

    <style>
        .gieqsGold {

            color: rgb(238, 195, 120);


        }

        .tagButton {

            cursor: pointer;

        }

        .tagCard {

background-color: #1b385d75; 



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

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

<div class="main-content">
    <!-- Header (account) -->
    <section class="page-header bg-dark-dark d-flex align-items-end pt-8 mt-10" style="background-image: url('<?php echo BASE_URL;?>/assets/img/covers/resection/ssp.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;" data-offset-top="#header-main">

   
      <!-- Header container -->
      <div class="container pt-0 pt-lg-0" >
        <div class="row" >
          <div class=" col-lg-12">
            <!-- Salute + Small stats -->
            <div class="row align-items-center mb-4">
              <div class="col-auto mb-4 mb-md-0">
                <span class="h2 mb-0 text-white text-bold d-block">My Account <?php //echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></span>
                <span class="text-white">Setup your GIEQs account.</span>
              </div>
              <!-- video -->
              <div class="col-auto flex-fill d-none d-xl-block">
              <!-- <div id="videoDisplay" class="embed-responsive embed-responsive-16by9">
                <iframe  id='videoChapter' class="embed-responsive-item"
                    src='https://player.vimeo.com/video/398791515' allow='autoplay'
                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div> -->
            </div>
            </div>
            <!-- Account navigation -->
           
            
          </div>
        </div>
      </div>
    </section>
    <section class="slice">
      <div class="container">
        <div class="row row-grid">
          <div class="col-lg-9 order-lg-2">
            <!-- Notification -->
            <div class="actions-toolbar py-2 mb-4">
              <h5 class="mb-1">Shop notifications</h5>
              <p class="text-sm text-muted mb-0">Be notified only about the things that matter to you.</p>
            </div>
            <div class="card">
              <div class="list-group list-group-flush">
                <div class="list-group-item d-flex w-100 justify-content-between">
                  <div>
                    <h6 class="mb-1">A product from wishlist is on sale</h6>
                    <span class="text-sm text-muted">You will receive an alert when one of your favorite products has a discount price.</span>
                  </div>
                  <div>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="shop-notification-1">
                      <label class="custom-control-label" for="shop-notification-1"></label>
                    </div>
                  </div>
                </div>
                <div class="list-group-item d-flex w-100 justify-content-between">
                  <div>
                    <h6 class="mb-1">A new product is released</h6>
                    <span class="text-sm text-muted">You will receive an alert when one of your favorite products has a discount price.</span>
                  </div>
                  <div>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="shop-notification-2">
                      <label class="custom-control-label" for="shop-notification-2"></label>
                    </div>
                  </div>
                </div>
                <div class="list-group-item d-flex w-100 justify-content-between">
                  <div>
                    <h6 class="mb-1">New promotions are available</h6>
                    <span class="text-sm text-muted">You will receive an alert when one of your favorite products has a discount price.</span>
                  </div>
                  <div>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="shop-notification-3">
                      <label class="custom-control-label" for="shop-notification-3"></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-5">
              <!-- Notification -->
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">Card notifications</h5>
                <p class="text-sm text-muted mb-0">Be notified only about the things that matter to you.</p>
              </div>
              <div class="card">
                <div class="list-group list-group-flush">
                  <div class="list-group-item d-flex w-100 justify-content-between">
                    <div>
                      <h6 class="mb-1">Insufficient funds on credit card</h6>
                      <span class="text-sm text-muted">You will receive an alert when one of your favorite products has a discount price.</span>
                    </div>
                    <div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="card-notification-1">
                        <label class="custom-control-label" for="card-notification-1"></label>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item d-flex w-100 justify-content-between">
                    <div>
                      <h6 class="mb-1">Send monthly invoices via email</h6>
                      <span class="text-sm text-muted">You will receive an alert when one of your favorite products has a discount price.</span>
                    </div>
                    <div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="card-notification-2">
                        <label class="custom-control-label" for="card-notification-2"></label>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item d-flex w-100 justify-content-between">
                    <div>
                      <h6 class="mb-1">You balance is almost 0</h6>
                      <span class="text-sm text-muted">You will receive an alert when one of your favorite products has a discount price.</span>
                    </div>
                    <div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="card-notification-3">
                        <label class="custom-control-label" for="card-notification-3"></label>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item d-flex w-100 justify-content-between">
                    <div>
                      <h6 class="mb-1">Expired cred card</h6>
                      <span class="text-sm text-muted">You will receive an alert when one of your favorite products has a discount price.</span>
                    </div>
                    <div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="card-notification-4">
                        <label class="custom-control-label" for="card-notification-4"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php require BASE_URI . '/pages/learning/pages/account/sidenav.php';?>

        </div>
      </div>
    </section>
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
    <script src="../../assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>
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

        $(document).ready(function () {

            


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