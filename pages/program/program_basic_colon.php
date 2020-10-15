<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>
    <title>GIEQs - Basic Colonoscopy Skills (1 day)</title>
  
    <style>
        .text-gieqsGold {

color: rgb(238, 194, 120);

               }
               .bg-gieqsGold {

background-color: rgb(238, 194, 120);

}
      .modal-backdrop
      {
          opacity:0.75 !important;
      }
      @media screen and (max-width: 400px) {
        
        
        .scroll{

          font-size: 1em;

          }

          .h5{

          font-size: 1em;
          }

          .tiny {
          font-size: 0.75em;

          }

          .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
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
  
   
    <div class="main-content">

        <!-- Header (v1) -->
        <section class="header-1 bg-gradient-dark" data-offset-top="#header-main">


        </section>

        <!-- PROGRAM TABLE -->

        <section class="slice bg-gradient-dark slice-lg">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-5">
                        <span class="h1" style="color: rgb(238, 194, 120);">GIEQs - Basic Colonoscopy Skills <br/>(1 day)<br/>
                            Scientific Programme</span>
                    </div>

                </div>
                <div class="row text-center">

                    <div class="col-12 p-3 pb-4">
                        <!-- <a href="#" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me"> -->
                            <!-- <span class="btn-inner--text">Overview</span> -->
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        <!-- </a> -->
                        <a href="#targetScrollProgramme" id="wednesday"
                            class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Mon 16 Nov</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>
                        <!-- <a href="#targetScrollProgramme" id="thursday" class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Tues 17 Nov</span>
                        </a> -->
                    </div>

                </div>

                <hr id="targetScrollProgramme" class="divider divider-fade" />


                <div id="ajaxWed">

                </div>

                

            </div>
            </section>
            </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="../../assets/js/purpose.core.js"></script> 
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>   
    <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script>


    <script>


    function refreshProgrammeView() {



    const dataToSend = {

        programmeid: 32 ,

    }

    const jsonString = JSON.stringify(dataToSend);
    console.log(jsonString);

    var request2 = $.ajax({
        url: siteRoot + "assets/scripts/classes/generateProgramme_course_single.php",
        type: "POST",
        contentType: "application/json",
        data: jsonString,
    });



    request2.done(function (data) {
        // alert( "success" );
        $('#ajaxWed').html(data);
        $(document).find('.Thursday').hide();
    })
    }

    $(document).ready(function() {

        refreshProgrammeView();

        

        $(document).on('click', '#wednesday', function() {

            $(document).find('.Wednesday').show();
            $(document).find('.Thursday').hide();

        })

        $(document).on('click', '#thursday', function() {

            $(document).find('.Thursday').show();
            $(document).find('.Wednesday').hide();

        })

    })
    </script>
</body>

</html>