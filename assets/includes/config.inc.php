<?php 

//error_reporting(E_ALL);


// server should keep session data for AT LEAST 12 hours
ini_set('session.gc_maxlifetime', 43200);

// each client should remember their session id for EXACTLY 12 hours
session_set_cookie_params(43200);


session_start();

/* 

 *  
 *  Configuration file does the following things:
 *  - Has site settings in one location.
 *  - Stores URLs and URIs as constants.
 *  - Sets how errors will be handled.
 * 
 */

# ******************** #
# ***** SETTINGS ***** #

// Errors are emailed here:
$contact_email = 'djtate@gmail.com'; 

//turn off whole site

$active = 0;

if ($active == 0){
	
	echo 'Site closed for maintenance, please check back later';
	exit();	
}

//active superuser only, executed in interpretuseraccess

$onlySuperuser = 1;



// Determine whether we're working on a local server
// or on the real server:
$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
} else {
    $local = FALSE;
}

// Determine location of files and the URL of the site:
// Allow for development on different servers.
if ($local) {

    // Always debug when running locally:
   // $debug = TRUE;
    
    // Define the constants:
    define('BASE_URI', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/gieqs');
    define('BASE_URL', 'http://localhost:90/dashboard/gieqs');
    define('DB', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/mysqli_connect_gieqs.inc.php');
    define('BASE_URI1', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/gieqs/edm');

    define('BASE_URL1', 'http://localhost:90/dashboard/gieqs/edm');

    define('DB1', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/mysqli_connect_POEM.inc.php');

    
    function class_loader($class) {
		
			require_once($_SERVER['DOCUMENT_ROOT'].'/dashboard/gieqs/assets/scripts/classes/'.$class.'.class.php');
		 	
	}
	
	
	spl_autoload_register ('class_loader');
	
    
} else {

    define('BASE_URI', $_SERVER['DOCUMENT_ROOT']);
    //echo BASE_URI;
    define('BASE_URL', 'https://www.gieqs.com');
    //echo BASE_URL;
    define('DB', '/home/u8l2e829uoi9/mysqli_connect_gieqs.inc.php');
    //echo DB;
    define('BASE_URI1', $_SERVER['DOCUMENT_ROOT'].'/edm'); 

    define('BASE_URL1', 'https://www.gieqs.com/edm');

    define('DB1', '/home/u8l2e829uoi9/mysqli_connect_edm.inc.php');

    
    function class_loader($class) {
		
        require_once($_SERVER['DOCUMENT_ROOT'].'/assets/scripts/classes/'.$class.'.class.php');
		 	
		 	
	}
	
	
	spl_autoload_register ('class_loader');
    
}

$root = BASE_URI . '/';
$roothttp = BASE_URL . '/';

//define('redirect_location', BASE_URL . '/index.php');
//echo redirect_location;

# ******************** #
# ***** PURCHASING ***** #

$stripe_status_live = true;  //true is live keys, false is testing


# ******************** #
# ***** LIVE EVENT ***** #

//make GIEQs conference live

$liveTestingUsers = array(1, 2, 3 , 4, 5, 6, 7, 8, 9, 10, 11, 12, 14, 15, 16, 84, 23, 25, 628, 629, 469);

$live = 1;

 //MORE LIVE TIME SETTINGS

 $serverTimeZone = new DateTimeZone('Europe/Brussels');
        
 $currentTime = new DateTime('now', $serverTimeZone);
 
 $desiredTimeWednesdayFrom = new DateTime('2020-10-07 07:00:00', $serverTimeZone);

 $desiredTimeWednesdayTo = new DateTime('2020-10-07 19:30:00', $serverTimeZone);

 $desiredTimeThursdayFrom = new DateTime('2020-10-08 07:00:00', $serverTimeZone);

 $desiredTimeThursdayTo = new DateTime('2020-10-08 19:30:00', $serverTimeZone);




    

/* 
 *  Most important setting!
 *  The $debug variable is used to set error management.
 *  To debug a specific page, add this to the index.php page:

if ($p == 'thismodule') $debug = TRUE;
require('./includes/config.inc.php');

 *  To debug the entire site, do

$debug = TRUE;

 *  before this next conditional.
 */

//$debug = true;
//$_SESSION['debug'] = true;

// Assume debugging is off. 
if (!isset($debug)) {
    $debug = FALSE;
}

# ***** SETTINGS ***** #
# ******************** #

//error_reporting(E_ALL);

# **************************** #
# ***** ERROR MANAGEMENT ***** #


// Create the error handler:
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

    global $debug, $contact_email;
    
    // Build the error message:
    $message = "An error occurred in script '$e_file' on line $e_line: $e_message";
    
    // Append $e_vars to the $message:
    $message .= print_r($e_vars, 1);
    
    if ($debug) { // Show the error.
    
        echo '<div class="error">' . $message . '</div>';
        debug_print_backtrace();
        
    } else { 

        // Log the error:
       // error_log ($message, 1, $contact_email); // Send email.

        // Only print an error message if the error isn't a notice or strict.
        //if ( ($e_number != E_NOTICE) && ($e_number < 2048)) {
        //    echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
       // }

    } // End of $debug IF.

} // End of my_error_handler() definition.

// Use my error handler:
//set_error_handler('my_error_handler');

# ***** ERROR MANAGEMENT ***** #
# **************************** #

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
if ($debug){
    

    $_SESSION['debug'] = true;
    error_reporting(E_ALL);

}else{

    $_SESSION['debug'] = false;
    error_reporting(0);
}