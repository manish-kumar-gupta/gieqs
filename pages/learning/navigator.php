<!DOCTYPE html>
<html lang="en">

<?php require 'includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 1;

      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    

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



       

                    <!--CONSTRUCT TAG DISPLAY-->

                    <!--GET TAG CATEGORY NAME 
                    
                    <?php



?>
                    
                TODO see other videos with similar tags, see videos with this tag, tag jump the video,
                list of chapters with associated tags [toggle view by category, chapter]
                
                -->


    <!-- Omnisearch -->
   
    <div class="main-content bg-gradient-dark">

        <!--Header-->

    <div class="d-flex align-items-end container">
        <p class="h1 mt-10">yyy video</p>

    </div>


        <!--Navigation-->

    <div id="navigationZone">
    <?php require(BASE_URI . '/pages/learning/includes/navigation.php'); ?>
    </div>
    


        <!--Video Display-->


    <div class="container mt-6">
        <div id="videoCards" class="flex-wrap">
            

            <div class="d-flex align-items-center">
                <strong>Loading...</strong>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
              </div>
            <!-- <div class="card mr-md-4">
                <div class="card-header">
                    <div class="row align-items-right my-0">
                        <div class="col-12 my-0 pr-0">
                            <div class="actions text-right">
                                <a href="#" class="action-item action-favorite" data-toggle="tooltip" data-original-title="Mark as favorite">
                                    <i class="fas fa-star gieqsGold"></i>
                                </a>
                               
                            
                                <a href="#" class="action-item action-like active" data-toggle="tooltip" data-original-title="Like">
                                    <i class="fas fa-thumbs-up text-muted"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="card-title mb-0">Resection of a sigmoid LSL with evidence of submucosal invasive cancer</h5>
                            <p class="text-muted mb-0">Author Name</p>

                        </div>
                    </div>
                    
                </div>
                <img alt="Image placeholder" src="https://i.vimeocdn.com/video/815721948_1280x720.jpg?r=pad" class="img-fluid mt-2">

                <div class="card-body">
                    <p class="card-text">Hybrid ESD / EMR technique using water immersion for the resection of a sigmoid LSL with evidence of underlying submucosal invasive cancer using endoscopic imaging.</p>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a href="#" class="btn btn-sm text-white gieqsGoldBackground">View</a>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-muted text-sm">time uploaded</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ml-0 mr-md-4">
                <div class="card-header">
                    <div class="row align-items-right my-0">
                        <div class="col-12 my-0 pr-0">
                            <div class="actions text-right">
                                <a href="#" class="action-item action-favorite" data-toggle="tooltip" data-original-title="Mark as favorite">
                                    <i class="fas fa-star gieqsGold"></i>
                                </a>
                               
                            
                                <a href="#" class="action-item action-like active" data-toggle="tooltip" data-original-title="Like">
                                    <i class="fas fa-thumbs-up text-muted"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="card-title mb-0">Resection of a sigmoid LSL with evidence of submucosal invasive cancer</h5>
                            <p class="text-muted mb-0">Author Name</p>

                        </div>
                    </div>
                    
                </div>
                <img alt="Image placeholder" src="https://i.vimeocdn.com/video/815721948_1280x720.jpg?r=pad" class="img-fluid mt-2">

                <div class="card-body">
                    <p class="card-text">Hybrid ESD / EMR technique using water immersion for the resection of a sigmoid LSL with evidence of underlying submucosal invasive cancer using endoscopic imaging.</p>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a href="#" class="btn btn-sm text-white gieqsGoldBackground">View</a>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-muted text-sm">time uploaded</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ml-0 mr-md-3">
                <div class="card-header">
                    <div class="row align-items-right my-0">
                        <div class="col-12 my-0 pr-0">
                            <div class="actions text-right">
                                <a href="#" class="action-item action-favorite" data-toggle="tooltip" data-original-title="Mark as favorite">
                                    <i class="fas fa-star gieqsGold"></i>
                                </a>
                               
                            
                                <a href="#" class="action-item action-like active" data-toggle="tooltip" data-original-title="Like">
                                    <i class="fas fa-thumbs-up text-muted"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="card-title mb-0">Resection of a sigmoid LSL with evidence of submucosal invasive cancer</h5>
                            <p class="text-muted mb-0">Author Name</p>

                        </div>
                    </div>
                    
                </div>
                <img alt="Image placeholder" src="https://i.vimeocdn.com/video/815721948_1280x720.jpg?r=pad" class="img-fluid mt-2">

                <div class="card-body">
                    <p class="card-text">Hybrid ESD / EMR technique using water immersion for the resection of a sigmoid LSL with evidence of underlying submucosal invasive cancer using endoscopic imaging.</p>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a href="#" class="btn btn-sm text-white gieqsGoldBackground">View</a>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-muted text-sm">time uploaded</span>
                        </div>
                    </div>
                </div>
            </div> -->

  


        </div>

    </div>



   
   
    

       
    </div>



    
    <!-- Modal -->
    

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
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
        
        var loaded = 1;
        

        function refreshNavAndTags(){

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

				}*/

				const jsonString = JSON.stringify(tags);
				console.log(jsonString);
				console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

				var request2 = $.ajax({
					beforeSend: function () {

                        $('#videoCards').html("<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>");

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
                        //console.dir(toKeep);
                        
                             
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
                    
                    const jsonString = JSON.stringify(tags);


                    var request3 = $.ajax({
					beforeSend: function () {


					},
					url: siteRoot + "/pages/learning/scripts/getVideos.php",
					type: "POST",
					contentType: "application/json",
					data: jsonString,
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
                        
                             
                               

                      
                    }
					//$(document).find('.Thursday').hide();
                })


				})


        }

        $(document).ready(function () {

            $('.dropdown-menu a').click(function(e) {
            e.stopPropagation();
                    });

            refreshNavAndTags();

            $('#refreshNavigation').click(function(){

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

            

            if (signup == '2456') {

                $('#registerInterest').modal('show');

            }

            $(document).on('click', '#submitPreRegister', function () {

                event.preventDefault();
                $('#pre-register').submit();

            })

            $("#pre-register").validate({

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
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },

                },
                submitHandler: function (form) {

                    submitPreRegisterForm();

                    //console.log("submitted form");



                }




            });


        })
    </script>
</body>

</html>