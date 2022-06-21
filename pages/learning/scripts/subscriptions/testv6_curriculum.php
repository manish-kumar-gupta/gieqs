<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';





$debug = false;
$_SESSION['debug'] == false;

$general = new general;
$users = new users;

$users->Load_from_key($userid);

error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
$courseManager = new courseManager;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/subscriptions.class.php';
$subscription = new subscriptions;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;
//error_reporting(E_ALL);

require_once BASE_URI . '/pages/learning/classes/navigator.class.php';
$navigator = new navigator;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once BASE_URI . '/assets/scripts/classes/programmeView.class.php';
$programmeView = new programmeView;


require_once BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php';
$usersMetricsManager = new usersMetricsManager;


require_once BASE_URI . '/assets/scripts/classes/curriculae.class.php';
$curriculae = new curriculae;

require_once BASE_URI . '/assets/scripts/classes/curriculum_items.class.php';
$curriculum_items = new curriculum_items;

require_once BASE_URI . '/assets/scripts/classes/curriculum_references.class.php';
$curriculum_references = new curriculum_references;

require_once BASE_URI . '/assets/scripts/classes/curriculum_sections.class.php';
$curriculum_sections = new curriculum_sections;

require_once BASE_URI . '/assets/scripts/classes/curriculum_tags.class.php';
$curriculum_tags = new curriculum_tags;

require_once BASE_URI . '/assets/scripts/classes/curriculum_manager.class.php';
$curriculum_manager = new curriculum_manager;

error_reporting(E_ALL);

echo 'hello';

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

?>

<?php

$id = 1;

//get the required curriculum

$curriculae->Load_from_key($id);

//echo the title

echo '<h1>' . $curriculae->getlong_name() . '</h1>';
//change <<title>> tag

//description
echo $curriculae->getdescription();


$sections = $curriculum_manager->getsectionscurriculum($id);

var_dump($sections);

foreach ($sections as $section_key=>$section_value){

    $curriculum_sections->Load_from_key($section_value);

    echo '<h2>' . $curriculum_sections->getlong_name() . '</h2>';  //section

    //foreach section echo the blocks

    $items = $curriculum_manager->getitemssection($section_value);

    var_dump($items);

    foreach ($items as $items_key=>$items_value){


        $curriculum_items->Load_from_key($items_value);

        if ($curriculum_items->gettype() == '1'){

        echo $curriculum_items->getstatement();

        }elseif ($curriculum_items->gettype() == '3'){

            echo '<img src="' . BASE_URL . '/assets/img/uploads/' . $curriculum_items->getimage_url() . '">';
    
        }elseif ($curriculum_items->gettype() == '4'){

            //code for embedded video with popup
    
        }elseif ($curriculum_items->gettype() == '3'){

            //code for link to GIEQS ONLINE VID
    
        }

        //get references item

        echo '<div class="references" data-id="' . $items_value . '">';

        $references = $curriculum_manager->getreferences($curriculum_manager->getreferencescurriculumitem($items_value));
        
        var_dump($references);


        echo '</div>';

        echo '<div class="tags" data-id="' . $items_value . '">';

        
        $tags = $curriculum_manager->gettags($curriculum_manager->gettagscurriculumitem($items_value));

        var_dump($tags);

        echo '</div>';


        //get tags item


    }


}

/* 

get sections
$curriculum_manager->getsectionscurriculum($id);

for each section
    echo each block dependent on whether text or
    table is a table

    depending on what 'type' is

    <option value="1" selected="">text</option>
<option value="2">table</option>
<option value="3">figure</option>
<option value="4">video</option>
<option value="5">gieqs online asset</option>

    video is vimeo link like blog link_to_content

    photo is photo like blog [this is ok, now there is link_to_content]  image_url

    [add image upload field]

    gieqs ref is id number link_to_content

*/






//var_dump($assets3);


//do they occur in the past? that is type 2 and 3 only

//then create a new subscription for the user for them with the tag PRO_ASSET

//GET AN ARRAY OF PRO USERS



//WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=PRO_SUBSCRIPTION%



echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
