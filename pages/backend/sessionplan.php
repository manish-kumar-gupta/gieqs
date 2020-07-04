<?php require '../../assets/includes/config.inc.php';?>

<?php

//php general variables

//form name

//$formName = 'programme-form';

//database name

$databaseName = 'Delegate';

//identifier

$identifier = 'id';



//javascript general variables
//to be passed via divs on page


?>


<!DOCTYPE html>
<html lang="en">



<head>

<?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 2;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;

?>

    <title>Ghent International Endoscopy Symposium - Backend</title>

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">
    <!-- Purpose CSS -->
    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL; ?>/assets/css/purpose.css" id="stylesheet"> -->

    <style>
    .modal-backdrop {
        opacity: 0.75 !important;
    }

    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

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







    <div class="container">



        <section class="header-account-page bg-dark d-flex align-items-end" data-offset-top="#header-main"
            style="padding-top: 147.4px;">
            <!-- Header container -->
            <div class="container pt-4 pt-lg-0">
                <div class="row">
                    <div class=" col-lg-12">
                        <!-- Salute + Small stats -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-5 mb-4 mb-md-0">
                                <span class="h2 mb-0 text-white d-block">GIEQs administration server</span>

                                <!-- <span class="text-white">Have a nice day!</span> -->
                            </div>
                            <!-- <div class="col-auto flex-fill d-none d-xl-block">
                <ul class="list-inline row justify-content-lg-end mb-0">
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-success"></i>Sales
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      20.5%
                      <small class="fas fa-angle-up text-success"></small>
                    </a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-warning"></i>Tasks
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      5.7%
                      <small class="fas fa-angle-up text-warning"></small>
                    </a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-danger"></i>Sales
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      -3.24%
                      <small class="fas fa-angle-down text-danger"></small>
                    </a>
                  </li>
                </ul>
              </div> -->
                        </div>

                        <!-- Account navigation -->
                        <?php require 'backendNav.php';?>


                    </div>
                </div>
            </div>
        </section>

        <section class="slice bg-section-secondary">
            <div class="container">

                <!-- id check-->
                <?php

$formv1 = new formGenerator;

$general = new general;

error_reporting(E_ALL);

${$databaseName} = new $databaseName;

//eval("\$" . $databaseName . " = new " . $databaseName . ";");

//$programme = new programme;

if (isset($_GET[$identifier]) && is_numeric($_GET[$identifier])) {
    $identifierValue = $_GET[$identifier];

} else {

    $identifierValue = null;

}

if ($identifierValue) {

    if (${$databaseName}->matchRecord($identifierValue) === false) {
        echo "No programme with that id exists";
        exit();

    }
}

?>

                  <div id="data" style="display:none;">
                  <?php

//get an array of the known programmes [first 50]

//echo ${$databaseName}->Load_records_limit_json(50);
?>
                  </div>
                  <?php

//create a standard form based on the database to be included in modals

?>

                   <!--alerts-->

    <div id="topTableAlert" class="alert alert-success alert-flush collapse" role="alert">
    <span id="topTableSuccess"></span>
</div>

                <!-- Section title -->
                <div class="actions-toolbar py-2 mb-4">

                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="mb-1"><?php echo 'Edit session'?></h5>
                            <p class="text-sm text-muted mb-0 d-none d-md-block"></p>
                        </div>
                        <div class="col text-right">
                            <div class="actions"><!-- <a href="#" class="action-item mr-2 active" data-action="search-open"
                                    data-target="#actions-search"><i class="fas fa-search"></i></a> -->
                                    <a href="#" id="add<?php echo $databaseName;?>" class="action-item mr-2 active"><i class="fas fa-plus"></i></a>
                                <!-- <div class="dropdown mr-2">
                                    <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-filter"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(21px, 35px, 0px);">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-sort-amount-down"></i>Newest
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-sort-alpha-down"></i>From A-Z
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-sort-alpha-up"></i>From Z-A
                                        </a>
                                    </div>
                                </div> --><!-- <a href="#" class="action-item mr-2"><i class="fas fa-sync"></i></a> -->
                                <!-- <div class="dropdown" data-toggle="dropdown">
                                    <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Refresh</a>
                                        <a href="#" class="dropdown-item">Manage Widgets</a>
                                        <a href="#" class="dropdown-item">Settings</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Orders table -->
                
                                    <form>
                                        <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                                            <div class="modal-header">
                                                <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                                    <div>
                                                        <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                                        <!-- <i class="fa fa-calendar" aria-hidden="true" ></i> -->
                                                        <img src="../../assets/img/icons/gieqsicon.png">
                                                        </div>
                                                    </div>
                                                    <div class="text-left">
                                                        <h5 class="mb-0">session.title</h5>
                                                        <p class="mb-0">programme.day session.first.timeFrom - session.last.timeTo</p>
                                                        <p class="mb-0">session.subtitle</p>
                                                        <p class="mb-0">session.description</p>
                                                    </div>
                                                    
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span="text-white" aria-hidden="true">&times;</span>
                                                </button>
                                                
                                            </div>
                                            <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                                             <div class="row">
                                                   <div class="col-sm-12 text-left">
                                                        <div>
                                                            <h6 class="mb-0">Moderators</h6>
                                                            <span class="faculty mb-0 mr-1">sessionModerator.facultyid [translated by faculty id join] to faculty.firstname, faculty.surname</span>
                                                      
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>  
                                            <div class="modal-body">
                                               
                                                <!-- <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Old username</label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">New username</label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="programme-body">
                                                  <div class="sessionItem row d-flex align-items-left text-left align-middle">
                                                    <div class="pl-2 pr-1 pb-0 pt-1 time">
                                                      <span class="timeFrom">sessionItem.timeFrom</span> - <span class="timeTo">sessionItem.timeTo</span> : </span>
                                                    </div>
                                                    <div class="pr-2 pb-0 pt-1">
                                                      <span class="h6 sessionTitle">sessionItem.title</span>

                                                      <!--if live stream-->
                                                      <!--if sessionItem.live == 1-->
                                                      <span class="badge text-white ml-3" style="background-color:rgb(238, 194, 120) !important;">Live Stream</span>
                                                      
                                                    </div>

                                                  </div>
                                                  <div class="row d-flex align-items-left text-left align-middle">
                                                    <div class="pl-3 pr-1 pb-0 pt-0 time">
                                                    <span class="sessionDescription">sessionItem.description</span>
                                                   
                                                    <p class="pt-2 h6 faculty">sessionItem.faculty</p>
                                                    </div>
                              

                                                  </div>
                                                  
                                                </div>
                                                
                                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                                    <p class="text-muted text-sm">Programme subject to change without notice.</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary">Back to programme &nbsp; &nbsp;<i class="fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                
                <!-- Load more -->
                <!-- <div class="mt-4 text-center">
                    <a href="#" class="btn btn-sm btn-neutral rounded-pill shadow hover-translate-y-n3">Load more
                        ...</a>
                </div> -->
            </div>
        </section>


    </div>

   <!-- Modal -->
   <div class="modal fade" id="modal-row-1" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                        <div class="modal-header">
                            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                <div>
                                    <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                        <img src="../../assets/img/icons/gieqsicon.png">
                                    </div>
                                </div>
                                <div class="text-left">
                                    <h5 class="mb-0">Edit <?php echo $databaseName;?></h5>
                                    <span class="mb-0"></span>
                                </div>

                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <div>
                                        <h6 class="mb-0"></h6>
                                        <span id = "modalMessageArea" class="mb-0"></span>

                                    </div>
                                    <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
    <span id="topModalSuccess"></span>
</div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="<?php echo $databaseName;?>-body">
                                <form id="<?php echo $databaseName;?>-form">
                                    <div class="form-group">
                                    <!-- EDIT -->
                                    
                                    <label for="firstname">firstname</label>
                                        <div class="input-group mb-3">
                                            <input id="firstname" type="text" class="form-control" name="firstname">
                                        </div>

                                    <label for="surname">surname</label>
                                    <div class="input-group mb-3">
                                        <input id="surname" type="text" class="form-control" name="surname">
                                    </div>

                                    <label for="user_id">user_id</label>
                                        <div class="input-group mb-3">
                                            <select id="user_id" type="text" data-toggle="select" class="form-control" name="user_id">
                                            <!--TODO get the users from AJAX-->
                                            </select>
                                        </div>

                                    <label for="email">email</label>
                                    <div class="input-group mb-3">
                                        <input id="email" type="text" class="form-control" name="email">
                                    </div>

                                    <label for="centre">centre</label>
                                        <div class="input-group mb-3">
                                            <select id="centre" type="text" data-toggle="select" class="form-control" name="centre">
                                            <!--TODO get centres from AJAX-->
                                            </select>
                                        </div>

                                        <label for="centreName">centreName</label>
                                        <div class="input-group mb-3">
                                            <input id="centreName" type="text" class="form-control" name="centreName">
                                        </div>

                                        <label for="registered_date">registered_date</label>
                                        <div class="input-group mb-3">
                                            <input id="registered_date" data-toggle = "date" type="text" class="form-control" name="registered_date">
                                        </div>

                                        <label for="timezone">timezone</label>
                                        <div class="input-group mb-3">
                                            <select id="timezone" type="text" data-toggle="select" class="form-control" name="timezone">
                                            <!--TODO get timezone list from AJAX-->
                                            </select>
                                        </div>

                                        <label for="access_level">access_level</label>
                                        <div class="input-group mb-3">
                                            <select id="access_level" type="text" data-toggle="select" class="form-control" name="access_level">
                                            <option value="" selected disabled hidden>select</option>
                                            <option value="1">1 - Superuser</option>
                                            <option value="2">2 - Content Creator</option>
                                            <option value="3"></option>
                                            <option value="4">4 - Regular User</option>
                                            <option value="5">5 - View only</option>
                                            </select>
                                        </div>

                                        <label for="contactPhone">contactPhone</label>
                                        <div class="input-group mb-3">
                                            <input id="contactPhone" type="text" class="form-control" name="contactPhone">
                                        </div>

                                        <label for="centreCity">centreCity</label>
                                        <div class="input-group mb-3">
                                            <input id="centreCity" type="text" class="form-control" name="centreCity">
                                        </div>

                                        <label for="centreCountry">centreCountry</label>
                                        <div class="input-group mb-3">
                                            <input id="centreCountry" type="text" class="form-control" name="centreCountry">
                                        </div>

                                        <label for="trainee">trainee</label>
                                        <div class="input-group mb-3">
                                            <select id="trainee" type="text" data-toggle="select" class="form-control" name="trainee">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                
                                            </select>
                                        </div>

                                        <label for="emailPreferences">emailPreferences</label>
                                        <div class="input-group mb-3">
                                            <select id="emailPreferences" type="text" data-toggle="select" class="form-control" name="emailPreferences">
                                            <option value="" selected disabled hidden>select</option>
                                            <option value="1">All email ok</option>
                                            <option value="2">Only regarding activities on the site</option>
                                            <option value="3">No email contact</option>
                                            </select>
                                        </div>



                                    </div>
                                </form>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="submit-<?php echo $databaseName;?>-form btn btn-sm btn-success">Save</button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
            </div>

        </div>










<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<!-- <script src="../../assets/js/purpose.core.js"></script> -->

<script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>

<!-- Datatables -->
<script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.js"></script>

<script>

//var data = $('#data').text();
//var dataSet = $.parseJSON($('#data').text());
var datatable;
var edit = 0;
var lesionUnderEdit = null;

function tableRefresh (){

    //update the div at the top with AJAX

    // refresh the table


}

function fillForm (idPassed){

        disableFormInputs("<?php echo $databaseName;?>-form");

        esdLesionRequired = new Object;

        esdLesionRequired = getNamesFormElements("<?php echo $databaseName;?>-form");

        esdLesionString = '`id`=\''+idPassed+'\'';

        var selectorObject = getDataQuery ("<?php echo $databaseName;?>", esdLesionString, getNamesFormElements("<?php echo $databaseName;?>-form"), 1);

        //console.log(selectorObject);

        selectorObject.done(function (data){

            console.log(data);

            var formData = $.parseJSON(data);


            $(formData).each(function(i,val){
                $.each(val,function(k,v){
                    $(document).find("#"+k).val(v);

                    //if a select2, trigger change also required to display the change
                    if ($(document).find("#"+k).hasClass('select2-hidden-accessible') === true){
                        
                        $(document).find("#"+k).trigger('change');

                    }

                });

            });

            //$("#messageBox").text("Editing ESD lesion ID "+idPassed);

            enableFormInputs("<?php echo $databaseName;?>-form");

        });




    }

    function submit<?php echo $databaseName;?>Form (){

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        console.log('got to the submit function');

        if (edit == 0){

            var esdLesionObject = pushFormDataJSON($("#<?php echo $databaseName;?>-form"), "<?php echo $databaseName;?>", "id", null, "0"); //insert new object

            esdLesionObject.done(function (data){

                console.log(data);

                if (data){

                    //alert ("New esdLesion no "+data+" created");
                    $('#topTableSuccess').text("New <?php echo $databaseName;?> no "+data+" created");

                    $('#modal-row-1').animate({ scrollTop: 0 }, 'slow');
                    

                     $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });

                    //edit = 1;

                    //refresh table
                    datatable.ajax.reload();

                    //close modal
                    $('#modal-row-1').modal('hide');





                }else {

                    alert("No data inserted, try again");

                }


            });

        } else if (edit == 1){


            if (lesionUnderEdit){

                var esdLesionObject = pushFormDataJSON($("#<?php echo $databaseName;?>-form"), "<?php echo $databaseName;?>", "id", lesionUnderEdit, "1"); //insert new object

                    esdLesionObject.done(function (data){

                        console.log(data);

                        if (data){

                            if (data == 1){

                                $('#topModalSuccess').text("Data for <?php echo $databaseName;?> " + lesionUnderEdit + " saved");

                                $('#modal-row-1').animate({ scrollTop: 0 }, 'slow');

                                $("#topModalAlert").fadeTo(4000, 500).slideUp(500, function() {
                                    $("#topTableAlert").slideUp(500);
                                });

                                

                                //refresh table
                                 datatable.ajax.reload();
                                //edit = 1;


                                //edit = 1;

                            } else if (data == 0) {

                            alert("No change in data detected");

                            } else if (data == 2) {

                            alert("Error, try again");

                            }



                        }


                    });

                }


        }


    }

    //delete behaviour

		function deleteRow (id){

        //esdLesionPassed is the current record, some security to check its also that in the id field

        /* if (esdLesionPassed != $("#id").text()){

            return;

        } */


        if (confirm("Do you wish to delete this <?php echo $databaseName;?>?")) {

            disableFormInputs("<?php echo $databaseName;?>-form");

            var esdLesionObject = pushFormDataJSON($("#<?php echo $databaseName;?>-form"), "<?php echo $databaseName;?>", "id", id, "2"); //delete esdLesion

            esdLesionObject.done(function (data){

                console.log(data);

                if (data){

                    if (data == 1){

                        $('#topTableSuccess').text("<?php echo $databaseName;?> deleted");

                        $("#topTableAlert").removeClass("alert-success").addClass("alert-danger").fadeTo(4000, 500).slideUp(500, function() {
                            $("#topTableAlert").slideUp(500);
                        });
                        //TODO refresh the table from AJAX
                        //esdLesionPassed = null;
                        //window.location.href = siteRoot + "scripts/forms/esdLesionTable.php";
                        //location.reload();
                        datatable.ajax.reload();


                        enableFormInputs("<?php echo $databaseName;?>-form");

                        //go to esdLesion list

                    }else {

                    alert("Error, could not delete.  Please try again");

                    enableFormInputs("<?php echo $databaseName;?>-form");

                    }



                }


            });

        }


    }

$(document).ready(function(){

    //add those which require date pickr
    
    var options = {
			enableTime: false,
			allowInput: true
		};
    
    $('[data-toggle="date"]').flatpickr(options);

    // add those which require select2 box

    $('[data-toggle="select"]').select2({

        dropdownParent: $(".modal-content"),
        //theme: "bootstrap",

    });

    $('#title').select2({

        dropdownParent: $(".modal-content"),

        ajax: {
        //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
        url: siteRoot + 'assets/scripts/select2query.php',
        data: function (params) {
            var query = {
                search: params.term,
                query: '`id`, `firstname` FROM `Delegate`',
                fieldRequired: 'firstname',
            }

            // Query parameters will be 
            console.log(query);
            return query;
        },
        dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
       
        

    });



    datatable = $('#dataTable').DataTable( {

        language: { infoEmpty: "There are currently no active <?php echo $databaseName;?>s.",
                emptyTable: "There are currently no active <?php echo $databaseName;?>s.",
                zeroRecords: "There are currently no active <?php echo $databaseName;?>s.",
        },
        autowidth : true,


       ajax: siteRoot + 'assets/scripts/tableInteractors/refresh<?php echo $databaseName;?>Table.php',
        //TODO all classes need this function


        //EDIT
       columns: [
        {data: 'id' },
       {data: 'firstname' },
       {data: 'surname' },
       {data: 'user_id' },
       {data: 'email' },
           {
           data: null,
           render: function ( data, type, row ) {
               return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="see enclosed items"> <i class="fas fa-level-down-alt"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a class="delete-row dropdown-item"> Delete </a> </div> </div> </div> </div>';
           }
           }
       ],




       } );



    /* datatable = $('#dataTable').DataTable( {

    data: dataSet,
    columns: [
        { data: 'id' },
        { data: 'date' },
        { data: 'title' },
        { data: 'subtitle' },
        { data: 'description' },
        {
        data: null,
        render: function ( data, type, row ) {
            return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="see enclosed items"> <i class="fas fa-level-down-alt"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a class="delete-row dropdown-item"> Delete </a> </div> </div> </div> </div>';
        }
        }
    ],




    } ); */

    $(document).on('click', '#add<?php echo $databaseName;?>', function() {


        $('#modalMessageArea').text('New <?php echo $databaseName;?>');
        $('#modal-row-1').modal('show');
        $(document).find('#<?php echo $databaseName;?>-form').find(':input').val('');
        $(document).find('#<?php echo $databaseName;?>-form').find(':checkbox, :radio').prop('checked', false);
        edit = 0;

    })

    $(document).on('click', '.fill-modal', function() {

    var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
    //console.log(targettd);
    lesionUnderEdit = targettd;
    $('#modalMessageArea').text('Editing <?php echo $databaseName;?> ' + lesionUnderEdit);
    $('#modal-row-1').modal('show');
    fillForm(targettd);
    edit = 1;

    })

    $(document).on('click', '.delete-row', function() {

    var targettd = $(this).parent().parent().parent().parent().parent().parent().find('td').first().text();
    console.log(targettd);
    //$('#modal-row-1').modal('show');
    deleteRow(targettd);

    })

    $(document).on('click', '.submit-<?php echo $databaseName;?>-form', function() {

    event.preventDefault();
    console.log('clicked');
    console.log($('#<?php echo $databaseName;?>-form').closest());
    $('#<?php echo $databaseName;?>-form').submit();

    })

$("#<?php echo $databaseName;?>-form").validate({

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
ignore: [],
rules: {

    //EDIT

    
              
   

    
              
           firstname:{
                        required : true,

            },

            
              
           surname:{
                        required : true,

            },

            
            

            
              
           email:{
                        required : true,
                        email : true,

            },

            
           

            
              
           centreName:{
                        required : true,

            },

            
              
           registered_date:{
                        required : true,
                        date : true,

            },

            
              
            
              
    

            
              
           access_level:{
                        required : true,

            },

            
              
           contactPhone:{
                        required : true,
                        regex : '[0-9\-\(\)\s]+',

            },

            
              

            
              
           centreCity:{
                        required : true,

            },

            
              
           centreCountry:{
                        required : true,

            },

            
              
           trainee:{
                        required : true,

            },

            
              
           yearsIndependent:{
                        required : true,

            },

            
              
           

            
              
           emailPreferences:{
                        required : true,

            },

},
submitHandler: function(form) {

    //submitPreRegisterForm();

    submit<?php echo $databaseName;?>Form();

    //TODO submit changes
    //TODO reimport the array at the top
    //TODO redraw the table



}




});


})



</script>
</body>

<?php require BASE_URI . '/footer.php';?>




</html>