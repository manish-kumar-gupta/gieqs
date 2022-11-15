<?php

 
//RESTART WHEN LIVE

//define('BASE_URI', '/home/u8l2e829uoi9/public_html');

//define('BASE_URL', 'https://www.gieqs.com');

//TESTING KEYS


define('BASE_URI', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/gieqs');

define('BASE_URL', 'localhost:90/dashboard/gieqs');


$location = BASE_URL . '/index.php';

//require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$_SESSION['debug'] = TRUE;

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
$general = new general;


require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
$users = new users;
require_once(BASE_URI . '/assets/scripts/classes/programme.class.php');
$programme = new programme;
require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
$sessionView = new sessionView;
require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;




//$users->Load_from_key($userid);
require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
$userFunctions = new userFunctions;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;



require_once(BASE_URI . '/assets/scripts/classes/user_email.class.php');
$user_email = new user_email;

require_once(BASE_URI . '/assets/scripts/classes/userActivity.class.php');
$userActivity = new userActivity;

require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;
 */

spl_autoload_unregister ('class_loader');
//require_once BASE_URI .'/../scripts/config.php'; // KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";





$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

// Send an asynchronous request.
$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
$promise = $client->sendAsync($request)->then(function ($response) {
    echo 'I completed! ' . $response->getBody();
});

$promise->wait();

http_response_code(200);


$data = implode(" - ", $dataToLog);

//Add a newline onto the end.
$data .= PHP_EOL;

if ($debugPrint){

    var_dump($dataToLog);
}

//The name of your log file.
//Modify this and add a full path if you want to log it in 
//a specific directory.
$pathToFile = 'mylogname.log';

//Log the data to your file using file_put_contents.
file_put_contents(BASE_URI . '/pages/learning/scripts/subscriptions/log.log', $data, FILE_APPEND);

