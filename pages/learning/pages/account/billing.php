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
            <!-- Change avatar -->
            <div class="card bg-gradient-dark hover-shadow-lg">
              <div class="card-body py-3">
                <div class="row row-grid align-items-center">
                  <div class="col-lg-8">
                    <div class="media align-items-center">
                      <a href="#" class="avatar bg-gieqsGold text-dark avatar-lg rounded-circle mr-3">
                        HW
                      </a>
                      <div class="media-body">
                        <h5 class="text-white mb-0">{{username}}</h5>
                        <div>
                          <!-- <form>
                            <input type="file" name="file-1[]" id="file-1" class="custom-input-file custom-input-file-link" data-multiple-caption="{count} files selected" multiple="">
                            <label for="file-1">
                              <span class="text-white">Change avatar</span>
                            </label>
                          </form> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto flex-fill mt-4 mt-sm-0 text-sm-right d-none d-lg-block">
                    <a href="#" class="btn btn-sm btn-white rounded-pill btn-icon shadow bg-gieqsGold text-dark">
                      <span class="btn-inner--icon"><i class="fas fa-fire"></i></span>
                      <span class="btn-inner--text">Upgrade to GIEQs Pro</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Section title -->
            <div class="actions-toolbar py-2 mb-4">
              <h5 class="mb-1">Attach a new card</h5>
              <p class="text-sm text-muted mb-0">Add you credit card for faster checkout process.</p>
            </div>
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-5 col-lg-8">
                    <span class="h6">Credit Card</span>
                  </div>
                  <div class="col-7 col-lg-4 text-right">
                    <img alt="Image placeholder" src="../../assets/img/icons/cards/mastercard.png" width="40" class="mr-2">
                    <img alt="Image placeholder" src="../../assets/img/icons/cards/visa.png" width="40" class="mr-2">
                    <img alt="Image placeholder" src="../../assets/img/icons/cards/skrill.png" width="40">
                  </div>
                </div>
              </div>
              <div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-sm-4"><small class="h6 text-sm mb-3 mb-sm-0">Plan</small></div>
                      <div class="col-sm-5">
                        <strong>Free</strong> plan, unlimited public repositories.
                      </div>
                      <div class="col-sm-3 text-sm-right">
                        <a href="#" class="btn btn-sm btn-primary rounded-pill mt-3 mt-sm-0">Upgrade</a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-4"><small class="h6 text-sm mb-3 mb-sm-0">Credit or debit cards</small></div>
                      <div class="col-sm-8">
                        <!-- First card -->
                        <div class="row mb-3">
                          <div class="col-9">
                            <img alt="Image placeholder" src="../../assets/img/icons/cards/visa.png" class="mr-1" width="30">
                            x-1023 (Expires on 11/2018)
                          </div>
                          <div class="col-3 actions text-right">
                            <a href="#" class="action-item" data-toggle="tooltip" data-original-title="Remove card">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </div>
                        <!-- Second card -->
                        <div class="row">
                          <div class="col-9">
                            <img alt="Image placeholder" src="../../assets/img/icons/cards/skrill.png" class="mr-1" width="30">
                            x-3165 (Expires on 09/2017)
                          </div>
                          <div class="col-3 actions text-right">
                            <a href="#" class="action-item" data-toggle="tooltip" data-original-title="Remove card">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-4"><small class="h6 text-sm mb-3 mb-sm-0">Other information</small></div>
                      <div class="col-sm-8">
                        <strong>$27.00 <small>U.S Dollar</small></strong>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-4"><small class="h6 text-sm mb-3 mb-sm-0">Your balance</small></div>
                      <div class="col-sm-8">
                        <p class="mb-0">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Payment history -->
            <div class="mt-5">
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">Payment history</h5>
                <p class="text-sm text-muted mb-0">Add you credit card for faster checkout process.</p>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-cards align-items-center">
                  <tbody>
                    <tr>
                      <th scope="row">
                        <span class="badge badge-lg badge-dot">
                          <i class="bg-success"></i>
                        </span>
                      </th>
                      <td>
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span class="h6 text-sm">May 20, 2018</span>
                      </td>
                      <td>#10015</td>
                      <td><i class="fas fa-credit-card mr-2"></i>Visa ending in 2035</td>
                      <td>$49.00 USD</td>
                      <td class="text-right">
                        <div class="actions">
                          <div class="dropdown">
                            <a class="action-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i>Download invoice</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-file-archive"></i>See details</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i>Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="table-divider"></tr>
                    <tr>
                      <th scope="row">
                        <span class="badge badge-lg badge-dot">
                          <i class="bg-danger"></i>
                        </span>
                      </th>
                      <td>
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span class="h6 text-sm">Apr 15, 2018</span>
                      </td>
                      <td>#10015</td>
                      <td><i class="fas fa-credit-card mr-2"></i>Visa ending in 2035</td>
                      <td><span class="text-danger">$39.00 USD</span></td>
                      <td class="text-right">
                        <div class="actions">
                          <div class="dropdown">
                            <a class="action-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i>Download invoice</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-file-archive"></i>See details</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i>Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="table-divider"></tr>
                    <tr>
                      <th scope="row">
                        <span class="badge badge-lg badge-dot">
                          <i class="bg-success"></i>
                        </span>
                      </th>
                      <td>
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span class="h6 text-sm">May 20, 2018</span>
                      </td>
                      <td>#10015</td>
                      <td><i class="fas fa-credit-card mr-2"></i>Visa ending in 2035</td>
                      <td>$49.00 USD</td>
                      <td class="text-right">
                        <div class="actions">
                          <div class="dropdown">
                            <a class="action-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i>Download invoice</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-file-archive"></i>See details</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i>Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="table-divider"></tr>
                    <tr>
                      <th scope="row">
                        <span class="badge badge-lg badge-dot">
                          <i class="bg-danger"></i>
                        </span>
                      </th>
                      <td>
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span class="h6 text-sm">Apr 15, 2018</span>
                      </td>
                      <td>#10015</td>
                      <td><i class="fas fa-credit-card mr-2"></i>Visa ending in 2035</td>
                      <td><span class="text-danger">$39.00 USD</span></td>
                      <td class="text-right">
                        <div class="actions">
                          <div class="dropdown">
                            <a class="action-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i>Download invoice</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-file-archive"></i>See details</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i>Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="table-divider"></tr>
                    <tr>
                      <th scope="row">
                        <span class="badge badge-lg badge-dot">
                          <i class="bg-danger"></i>
                        </span>
                      </th>
                      <td>
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span class="h6 text-sm">Apr 15, 2018</span>
                      </td>
                      <td>#10015</td>
                      <td><i class="fas fa-credit-card mr-2"></i>Visa ending in 2035</td>
                      <td><span class="text-danger">$39.00 USD</span></td>
                      <td class="text-right">
                        <div class="actions">
                          <div class="dropdown">
                            <a class="action-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i>Download invoice</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-file-archive"></i>See details</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i>Delete</a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Attach a new card -->
            <div class="mt-5">
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">Attach a new card</h5>
                <p class="text-sm text-muted mb-0">Add you credit card for faster checkout process.</p>
              </div>
              <form>
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-5 col-lg-8">
                        <span class="h6">Credit Card</span>
                        <p class="text-muted text-sm mt-2 mb-0 d-none d-lg-block">Safe money transfer using your bank account. We support Mastercard, Visa, Maestro and Skrill.</p>
                      </div>
                      <div class="col-7 col-lg-4 text-right">
                        <img alt="Image placeholder" src="../../assets/img/icons/cards/mastercard.png" width="40" class="mr-2">
                        <img alt="Image placeholder" src="../../assets/img/icons/cards/visa.png" width="40" class="mr-2">
                        <img alt="Image placeholder" src="../../assets/img/icons/cards/skrill.png" width="40">
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row mt-3">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label">Card number</label>
                          <div class="input-group input-group-merge">
                            <input type="text" class="form-control" data-mask="0000 0000 0000 0000" placeholder="4789 5697 0541 7546">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Name on card</label>
                          <input type="text" class="form-control" placeholder="John Doe">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="form-control-label">Expiry date</label>
                          <input type="text" class="form-control" data-mask="00/00" placeholder="MM/YY">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="form-control-label">CVV code</label>
                          <div class="input-group input-group-merge">
                            <input type="text" class="form-control" data-mask="000" placeholder="746">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-question-circle"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text-right">
                      <button type="button" class="btn btn-sm btn-primary">Save card</button>
                    </div>
                  </div>
                </div>
                <!-- Add money using PayPal -->
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-6">
                        <span class="h6">PayPal</span>
                        <p class="text-sm text-muted mt-2 mb-0 d-none d-lg-block">Pay your order using the most known and secure platform for online money transfers. You will be redirected to PayPal to finish complete your purchase.</p>
                      </div>
                      <div class="col-6 text-right">
                        <img alt="Image placeholder" src="../../assets/img/icons/cards/paypal-256x160.png" width="70">
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                      <label class="btn btn-sm btn-secondary flex-fill">
                        <input type="radio" name="options" id="checkboxButton3"> $10
                      </label>
                      <label class="btn btn-sm btn-secondary flex-fill">
                        <input type="radio" name="options" id="checkboxButton4"> $25
                      </label>
                      <label class="btn btn-sm btn-secondary flex-fill">
                        <input type="radio" name="options" id="checkboxButton5"> $50
                      </label>
                      <label class="btn btn-sm btn-secondary flex-fill">
                        <input type="radio" name="options" id="checkboxButton6"> $100
                      </label>
                    </div>
                    <div class="text-right mt-3">
                      <a href="#" class="btn btn-sm btn-primary">Pay with PayPal</a>
                    </div>
                  </div>
                </div>
              </form>
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