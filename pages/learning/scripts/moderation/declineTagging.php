<?php 

$openaccess = 1;

//$requiredUserLevel = 2;

//$tokenaccess = 1;

require ('../../includes/config.inc.php');	

require BASE_URI . '/head.php';



$debug = false;


$users = new users;


$general = new general;
$usersTagging = new usersTagging;
$video_moderation = new video_moderation;
$video = new video;


if ($debug){
}

//GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

}

if (isset($_GET['key'])) {

    $key = $_GET['key'];

}
?>
<div class="main-content">
  <div class="container h-100vh d-flex align-items-center">
    <div class="col">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
          <div>
            <div class="mb-5 text-center">
              <h6 class="h3">Tagging Administration</h6>
            </div>
            <p class="text-center">
           
         
  <?php    

//load user from token

if ($userFunctions->getUserFromKey($key)){

    if ($debug){

        echo 'user checks out';
    }

    $loggedInUser = $userFunctions->getUserFromKey($key);

    if ($video_moderation->checkModerationKeyExists($id)){

        if ($debug){

            echo 'moderation key checks out';
        }

        $usersTagging->Load_from_key($id);
        $gmtTimezone = new DateTimeZone('GMT');
         $myDateTime = new DateTime('now', $gmtTimezone);
         $timestamp = $myDateTime->format('Y-m-d H:i:s');
         $usersTagging->setdecline_tag($timestamp);
         $result = $usersTagging->prepareStatementPDOUpdate();

         if ($result){


            echo 'Thank you for your response.  We hope we can interest you in tagging at another time.';
            $userFunctions->generateNewKey($loggedInUser);

         }



    }


}else{
    
    echo 'Invalid link.  Links can only be used once.';
    exit();
}

//$users->Load_from_key($currentLockedUser);

//if user exists, update the tagging status

//display message

//look for 



$users->endusers();?>
</p> 
</div>
        </div>
      </div>
    </div>
  </div>
</div>
    <?php require BASE_URI . '/footer.php';?>

