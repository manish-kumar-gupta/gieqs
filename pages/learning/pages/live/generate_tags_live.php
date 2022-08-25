<!DOCTYPE html>
<html lang="en">

<?php require '../../../../assets/includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      
$openaccess = 0;
$requiredUserLevel = 3;


      require BASE_URI . '/head.php';

      //$general = new general;
      $userFunctions = new userFunctions;

      spl_autoload_unregister ('class_loader');

      error_reporting(E_ALL);
      require_once(BASE_URI.'/pages/learning/classes/general.class.php');


      $general = new general;

      spl_autoload_register ('class_loader');
      //open to the classes outside this include

      ?>

    <!--Page title-->
    <title>Tag Generation - GIEQs Live</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
    
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">






    <style>
    #navbar-main {

        z-index: 9999;
    }

    

    .tagButton {

        cursor: pointer;

    }

    .tagCard {

background-color: #1b385d75;
/* background-color: black;
 */.tagCardHeader {

background-color: #162e4d;

/* background-color: black;
 */
}

    #live-chat-app {
        background-color: #1b385d75 !important;

    }

   /*  .tagCardHeader {

        background-color: #162e4d;

    } */

    .even-larger-badge{
    font-size: 1.2em;
}



    .cursor-pointer {

        cursor: pointer;

    }



    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

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


        $debug = true;

		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
				        
                        
                        
		
        ?>

    <!-- load all video data -->

    <body>

        <?php $livepage = 'Tag Generation';?>

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
        <?php require (BASE_URI . '/pages/learning/pages/live/liveNav.php');?>
        <div class="main-content">
            <!-- Navbar warning -->
            <?php 
     

        
     
     ?>
             <div class="container-fluid d-flex flex-wrap align-items-lg-stretch p-2 p-lg-5" style="max-height:60vh;">
                <div class="col-lg-5 ml-4" style="cursor:none;">
                   <!--  <h2 class="mb-5">LIVE area</h2> -->
                                        <div class="card mb-0 p-2 mx-6 tagCard" style="height:30vh; overflow:hidden; cursor:none; margin-top: -1.25rem !important;">
                        <div class="card-header tagCardHeader mb-0">

                            <span class="h6">Tags <br /></span><span class="text-sm"></span><span
                                class="text-sm text-right"></span>
                        </div>
                        <div id="cardBodyMirror" class="card-body mt-0 p-2">

                            <div id="tagsDisplayMirror" class="p-2 d-flex flex-wrap tagsDisplay">


                               
                            </div>


                        </div>
                    </div>


                </div>
              
                <div class="col-lg-5 ml-6">
                <h2 class="mb-0">EDIT area</h2>
                <p class="text-muted text-sm">Use this area to edit.  Dropdown and search for tags / materials.  Delete tags by clicking them in the box below.
                Edits here are mirrored in the box to the left.  The left box only is used for the live feed. AVOID vertical scrolling the page, reloading or resizing the browser window.</p>

                <div>
<!--                 <a id="showStructureButton" class="action-item"><i class="fas fa-table" title="show tag structure"></i> Show Tags Structure</a>
 -->     </div>
                    <label for="tags" class="mb-3 mt-1">Tags (search)</label>
                    <div class="input-group ">
                        <select id="tags" type="text" data-toggle="select" class="form-control" name="tags">
                            <?php

                                            


                                        echo $general->generateTagStructure();


                                            


?>
                        </select>
                    </div>
                    <div class="card mt-5 mb-0 p-2 mx-6 tagCard" style="height:30vh; overflow:hidden;">
                        <div class="card-header tagCardHeader mb-0">

                            <span class="h6">Tags <br /></span><span class="text-sm"></span><span
                                class="text-sm text-right"></span>
                        </div>
                        <div id="cardBody" class="card-body mt-0 p-2">

                            <div id="tagsDisplay" class="p-2 d-flex flex-wrap tagsDisplay">


                               
                            </div>


                        </div>
                    </div>
                <!--     <div id="table" class="mt-4" style="height: 40vh; width: 30vw; overflow-x:scroll;overflow-y:scroll;"></div> -->


                </div>
                

                <?php  

    



 

?>

            </div>




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

            var x = 0;
            var y = 0;

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

                passwordChange.done(function(data) {


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

            $(document).ready(function() {

                
                /* $(document).click(function(event) { 
                    $target = $(event.target);
                    
                    if(!$target.closest('#collapseExample').length && 
                        $('#collapseExample').is(":visible")) {
                            $('#collapseExample').collapse('hide');
                        }        
                }); */

                $('[data-toggle="select"]').select2({

                    //dropdownParent: $(".modal-content"),
                    //theme: "bootstrap",

                });

                
                
                $(document).on('change', '#tags', function () {

                    //get selected id
                    //get selected data 
                    //append

                    //alert('change detected');

                    //var id=2;
                    //var selectElement = $(this)
                    var tagName = $("option:selected", this).text();

                    //var el = $(this);

//for the editable box

(function () {
                        setTimeout(function () {
                            $('#tagsDisplayMirror').find('span').filter('#tag' + x).remove();
                            const element = $('#tagsDisplayMirror').find('span').filter('#tag' + x);
                            console.log(element);

                        }, 5000);
                    }($('#tagsDisplayMirror').prepend('<span class="animated rubberBand badge even-larger-badge bg-gieqsGold text-dark mx-2 my-2" data="tag' + x + '" id="tag' + x + '" style="max-width:100%; text-align:justify; white-space:normal;">' + tagName + '</span>')));



                    $('#tagsDisplayMirror').find('span').not('#tag' + x).removeClass('bg-gieqsGold').removeClass('text-dark').removeClass('even-larger-badge').addClass('bg-secondary-dark').addClass('text-white');
                    $('#tagsDisplayMirror').find('span').not('#tag' + x).each(function(){

                        $(this).removeClass('bg-gieqsGold').removeClass('text-dark').removeClass('even-larger-badge').addClass('bg-secondary-dark').addClass('text-white');
                        var hider= $("#cardBodyMirror"); 
                        var height= $(hider).height(); //the height of the box
                        var offset = $("#cardBodyMirror").offset(); // the offset of the top of the box
                        var offset2 = $(this).offset(); //the offset of the top of the tag

                        var bottomPosition = height + offset.top; //the position of the bottom of the box

                        console.log( height );
                        console.log( offset2.top );
                        console.log( bottomPosition);

                        
                        //alert($(this).attr('class'));
                        if( offset2.top > bottomPosition){

                            $(this).hide();

                        }
                            

                    })
                    


                    x++;

                    //for the mirror (display box)

                    (function () {
                        setTimeout(function () {
                            $('#tagsDisplay').find('span').filter('#tag' + y).remove();
                            const element = $('#tagsDisplay').find('span').filter('#tag' + y);
                            console.log(element);

                        }, 5000);
                    }($('#tagsDisplay').prepend('<span class="animated rubberBand badge even-larger-badge bg-gieqsGold text-dark mx-2 my-2" data="tag' + y + '" id="tag' + y + '" style="max-width:100%; text-align:justify; white-space:normal;">' + tagName + '</span>')));



                    $('#tagsDisplay').find('span').not('#tag' + y).removeClass('bg-gieqsGold').removeClass('text-dark').removeClass('even-larger-badge').addClass('bg-secondary-dark').addClass('text-white');
                    $('#tagsDisplay').find('span').not('#tag' + y).each(function(){

                        $(this).removeClass('bg-gieqsGold').removeClass('text-dark').removeClass('even-larger-badge').addClass('bg-secondary-dark').addClass('text-white');
                        var hider= $("#cardBody"); 
                        var height= $(hider).height(); //the height of the box
                        var offset = $("#cardBody").offset(); // the offset of the top of the box
                        var offset2 = $(this).offset(); //the offset of the top of the tag

                        var bottomPosition = height + offset.top; //the position of the bottom of the box

                        console.log( height );
                        console.log( offset2.top );
                        console.log( bottomPosition);

                        
                        //alert($(this).attr('class'));
                        if( offset2.top > bottomPosition){

                            $(this).hide();

                        }
                            

                    })
                    


                    y++;

                })

                $(document).on('click', '.badge', function () {

                    //alert('detect');

                   //get the id

                   var id = $(this).attr('data');

//alert(id);

//remove both this and the mirror

/*                     $(this).remove();
*/                    $(this).addClass('bounceOutLeft').remove();


//remove mirror
/* $("#tagsDisplayMirror").find("[data='" + id + "']").remove();  */
$("#tagsDisplayMirror").find("[data='" + id + "']").addClass('bounceOutLeft').remove(); 
//$('#tagsDisplay').find('span').not('#tag' + y);




                })

                $('.referencelist').on('click', function () {


                    //get the tag name

                    var searchTerm = $(this).attr('data');

                    //console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);

                    PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm,
                        'PubMed Search (endoWiki)', 800, 700);





                })

                $('.referencelist').on('mouseenter', function () {

                    $(this).css('color', 'rgb(238, 194, 120)');
                    $(this).css('cursor', 'pointer');

                })

                $('.referencelist').on('mouseleave', function () {

                    $(this).css('color', 'white');
                    $(this).css('cursor', 'default');

                })

                $(document).on('click', '#showStructureButton', function () {


var dataToSend = {

    requiredTagCategories: null

}

const jsonString = JSON.stringify(dataToSend);



var request2 = $.ajax({
    beforeSend: function () {

        //$('#videoCards').html("<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>");

    },
    url: siteRoot + "pages/learning/scripts/getTagStructurev2.php",
    type: "POST",
    contentType: "application/json",
    data: jsonString,
});



request2.done(function (data) {
    // alert( "success" );
    if (data) {
        //var toKeep = $.parseJSON(data.trim());
        //alert(data.trim());
        //console.dir(toKeep);


        //console.log(data);

       

        //$('.modal').show();
        /* $('.modal').css('max-height', 800);
        $('.modal').css('max-width', 800);
        $('.modal').css('overflow', 'scroll'); */



        $(document).find('#table').html('<h3>Data Structure</h3>');

        $(document).find('#table').append('<div class="modalMessageBox"></div>');

        $(document).find('#table').append('<p>' + data + '</p>');

        //$(document).find('#table').append('<button id="newReference">Add new reference</button>');

        $(document).find('#table').find('#dataTable2').DataTable();

        //makeSearchBoxModal();

        return;


    }
    //$(document).find('.Thursday').hide();
})







})


            })
            </script>
    </body>

</html>