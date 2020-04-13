<?php
	
//error_reporting(E_ALL);


require(BASE_URI . '/includes/login_functions.php');



//place to redirect the user if not allowed access
if (!isset($location)){
    $location = BASE_URL . '/index.php';
}



if (!($dbc)){
    require(DB);
    }



require(BASE_URI . '/scripts/interpretUserAccess.php');


?>

<noscript>
    <style type="text/css">
        .content {display:none;}
        #content {display:none;}
    </style>
    <div class="noscriptmsg">
    You don't have javascript enabled. It is required to view this site.
    </div>
</noscript>

 <script src="<?php echo BASE_URL . '/includes/jquery.min.js'; ?>" type="text/javascript"></script>
   
	    <script src="<?php echo BASE_URL . '/includes/generaljs.js'; ?>" type="text/javascript">
</script>

	






<?php echo '<script src="' . BASE_URL . '/includes/jquery.validate.js"></script>';

    echo '<link rel="stylesheet" type="text/css" href="'. BASE_URL . '/styles%20image.css">';
    
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';



    ?>

<div id="loading">
	
    </div>