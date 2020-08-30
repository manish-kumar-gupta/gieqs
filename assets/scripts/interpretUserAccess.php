<?php

//user access variables

//$openaccess = 1 allows the page to be viewed without login and skips the rest of the script
//$requiredUserLevel corresponds to database users access level; if not set the page simply requires login
//$paid allows setting of pages which require subscription and login

//define token from url

$debugUserAccess = false;
$info = [];

$info[] = 'the redirect location is set as ' . $location;

if (count($_GET) > 0){

    if (isset($_GET['token'])){

        $token = $_GET['token'];

        if ($token){

            $info[] = 'token detected';
            
        }

    }else{

        $info[] = 'no token detected';

    }

}else{


    $info[] = 'no GET parameters detected';

}


if ($debugUserAccess){
echo 'in interpretuserAccess';
echo '<br>DB data is <br>';
echo 'DB : ' . print_r(DB);
echo '<br>DB_HOST : ' . print_r(DB_HOST);
echo '<br>DB_USER : ' . print_r(DB_USER);
echo '<br>DB_HOST : ' . print_r(DB_HOST);
echo '<br>DB_NAME : ' . print_r(DB_NAME);


}


//script for detection of page related variables in header
if ($openaccess == 1){

    $info[] = 'page is open access';

        goto b;

}else{

    //if a token is present allowing access to the page then allow
    //else reject
    if ($tokenaccess == 1){
        if (isset($token)){

            //echo 'token set is' . $token;

            //why does this require login

            $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
           // print_r($dbc);
            $sql = "SELECT `user_id`, `access_level`, `firstname`, `surname` FROM `users` WHERE `key` = '$token'";
            //echo $sql;
            $result = mysqli_query ($dbc, $sql);
            //print_r($result);
            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_array($result)) {
                    $userid = $row['user_id'];
                    //do login?
                    /* $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['surname'] = $row['surname'];
                    $_SESSION['access_level'] = $row['access_level'];
                    $_SESSION['siteKey'] = 'TxsvAb6KDYpmdNk'; */


                    $info[] = 'token access allowed for user id ' . $row['user_id'];
                    
                }

                //echo $userid;
                goto c;
    
            }else{
                    echo 'token did not match any userid';
                    unset($token);
                    $info[] = 'token access checked and denied';
                    goto a;
                    
    
            }

             

            

            mysqli_free_result($result);
            mysqli_close($dbc);

            //allow access if token valid from database

            //if so goto c:

            
            //get user id from token
            //reset token once used

        }
    }
}

    a:{
//echo 'made it to a';



if (!isset($_SESSION['user_id']) || !isset($_SESSION['access_level'])) {
    $info[] = 'ONE OF user_id and access_level are NOT set in the session.  ACCESS DENIED';
    
    if (!$debugUserAccess){
                        redirect_login($location);
                    }
}else{

    $info[] = 'user_id and access_level are both set in the session';
}

$userid = $_SESSION['user_id'];

if ($userid){
$info[] = 'user_id set as ' . $userid;
}


//IF USER LEVEL REQUIRED NOT SET ASSUME 2

if (!isset($requiredUserLevel)){

    $requiredUserLevel = 2;
    $info[] = 'requiredUserLevel was not set so was set at default of 2 since the user is logged in';

}else{

    $info[] = 'requiredUserLevel was set on the page as ' . $requiredUserLevel;

}

if (isset($requiredUserLevel)){

    //if the requiredUserLevel variable is present on the referring page
    
    $currentUserLevel = $_SESSION['access_level'];
    //echo $currentUserLevel;

    //check the access level in the session matches the userid in the database

    //require(DB);
    $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $sql = "SELECT `user_id`, `access_level` 
            FROM `users` WHERE `user_id` = $userid";
            $result = mysqli_query ($dbc, $sql);
            
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)) {
                    $databaseUserAccessLevel = $row['access_level'];
                    
                }

                if ($databaseUserAccessLevel != $currentUserLevel){

                    if (!$debugUserAccess){
                        redirect_login($location);
                    }

                }else{

                    $info[] = 'access level for this user as set in the session (' . $currentUserLevel . ') was checked against the database ('. $databaseUserAccessLevel .') and is the same)';
                }
            }

            mysqli_free_result($result);
            mysqli_close($dbc);

    //reject an inactive user with level 9


    
    if ($currentUserLevel == 9){

       
        if (!$debugUserAccess){
                        redirect_login($location);
                    }

    }
    
            //reject any user that does not have access higher or equal to that specified

    $info[] = 'current user has following rights (current user level is ' . $currentUserLevel . ') versus (required user level is '. $requiredUserLevel .')';
    
    if ($currentUserLevel > $requiredUserLevel){

       
        if (!$debugUserAccess){
                        redirect_login($location);
                    }

    }

    //CHECK THE SUPERUSER STATUS, variable $isSuperuser

    if ($databaseUserAccessLevel == '1'){

        $isSuperuser = 1;

        $info[] = 'user is a superuser';


    }else{

        $isSuperuser = 0;

        $info[] = 'user is not a superuser';
    }

    //determine subscription to all videos and/or images, variables $subscriptionVideo, $subscriptionImage
    //not relevant to these databases

    

    



    /*
    $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $sql = "SELECT `subscriptionVideo`, `subscriptionImage`
            FROM `subscriptionUser` WHERE `user_id` = $userid";
            //echo $sql;
            $result = mysqli_query ($dbc, $sql);
            
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)) {
                    if ($row['subscriptionVideo'] == '1'){

                        $subscriptionVideo = 1;

                    }else{

                        $subscriptionVideo = 0;
                    }

                    if ($row['subscriptionImage'] == '1'){

                        $subscriptionImage = 1;

                    }else{

                        $subscriptionImage = 0;
                    }
                }

             }else{

                $subscriptionVideo = 0;
                $subscriptionImage = 0;
            }

            mysqli_free_result($result);
            mysqli_close($dbc);





*/
}
//identify with the variables in the top of the original file
//$userLevel
//$paid, not yet implemented

}



b:{

    //unset($userid);

    if ($openaccess == 1){

        //set user id

        if (isset($_SESSION['user_id'])) {

            $userid = $_SESSION['user_id'];

            $info[] = 'page was open access but a user id was found in the session so was assigned (' . $userid . ')';
        }

        //set user access level

        if (isset($_SESSION['access_level'])) {

                $currentUserLevel = $_SESSION['access_level'];

                //require(DB);
                $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                $sql = "SELECT `user_id`, `access_level` 
                FROM `users` WHERE `user_id` = $userid";
                $result = mysqli_query ($dbc, $sql);
                
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) {
                        $databaseUserAccessLevel = $row['access_level'];
                    }

                    if ($databaseUserAccessLevel != $currentUserLevel){

                        if (!$debugUserAccess){
                        redirect_login($location);
                    }

                    }
                }else{

                    $databaseUserAccessLevel = NULL;
    
                 }

                mysqli_free_result($result);
                mysqli_close($dbc);

        }
        //set superuser status
    
        if ($databaseUserAccessLevel == '1'){

            $isSuperuser = 1;
    
        }else{
    
            $isSuperuser = 0;
        }
    
    
    if ($onlySuperuser){

        $info[] = 'only super user can access the site set in config.inc.php';

        if ($isSuperuser != 1){

            if (!$debugUserAccess){
                        redirect_login($location);
                    }

        }

    }
    

    
    
    }

   
    

    


//do things where open access allowed
}
c:{
//echo 'made it to c';
//do things for token access

}

if ($userid){

//live

$info[] = '\$livetestingusers contains (' . $liveTestingUsers . ')';

if (in_array($userid, $liveTestingUsers)) {
    $live = 1;
    $liveTest = 1;
    $info[] = 'Live testing activated for (' . $userid . ')';

}

if (liveTest){
    $currentTime = new DateTime('2020-10-08 09:30:20', $serverTimeZone);
    }

//further info re live

//generates array of the live sessions that a user has access to

spl_autoload_unregister ('class_loader');

require(BASE_URI .'/assets/scripts/classes/userFunctions.class.php');

$userFunctions = new userFunctions;

spl_autoload_register ('class_loader');

//$userFunctions = new userFunctions;

$liveAccess = $userFunctions->enrolmentPatternLive($userid);

$info[] = 'page determines live access to the following live events for (' . $userid . ')';
$info[] = $liveAccess;
//print_r($liveAccess);

 # ******************** #
    # ***** USER TRACKING ***** #

    //ensure users activity logged

    spl_autoload_unregister ('class_loader');

    require(BASE_URI .'/assets/scripts/classes/userActivity.class.php');

    $userActivity = new userActivity;

    spl_autoload_register ('class_loader');

    if ($userid){

        //getcurrent UTC time
		$date = new DateTime('now', new DateTimeZone('UTC'));
		$sqltimestamp = date_format($date, 'Y-m-d H:i:s');
		
		//add a user activity event to the database

        $userActivity->New_userActivity($userid, null, null, $sqltimestamp);
        
		$userActivity->prepareStatementPDO();

        
    }  

}


if ($debugUserAccess){
print_r($info);

}