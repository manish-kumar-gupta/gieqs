<?php

    
//require ('config.inc.php');
//$openaccess = 1;		

//require (BASE_URI . '/scripts/headerScript.php');
    
    require(DB);    

    function redirect_user ($page='/pages/authentication/login.php', $location=null) {
        
        if ($location != null){

            header ("Location: $page?destination=$location");


        }else{

            header ("Location: $page");


        }
        
        //eg  header("Location: dashboard.php?name_=$FullName&subject_=$Subject&phone_=$Phone&email_=$Email&message_=$Message"); 
        exit ();
    }
    
     
	
	 function redirect_login ($location, $url=null) {
         //if url not null add ?destination= to front
        if ($url != null){

            $url = '?destination' . $url;

        }
        header ("Location: $location$url");
        exit ();
    }
	

	function hash_password($password, $salt) {
    $salted_password = substr($password, 0, 4) . $salt . substr($password, 4);
    return hash('sha512', $salted_password);
}
        
    function check_login($dbc, $email, $pass) {
        
    
            $errors = array();
        
            //email address is present;
            if (empty($email)) {
                $errors[]='Please enter a valid email address';
            } else {
                $e = mysqli_real_escape_string($dbc, trim($email));
                //echo $e;
            }
        
            //password;
            if (empty($pass)) {
                $errors[]='Please enter a valid password';
            } else {
				$salt = 'westmead';
                $password = mysqli_real_escape_string($dbc, trim($pass));
                $p = hash_password($password, $salt);
                //echo $p;
            }
        
        if (empty ($errors)) {
            
            $q = "SELECT `user_id`, `firstname`, `surname`, `centre`, `access_level` FROM users WHERE email='$e' AND password='$p'";
            //echo $q;

            $r = @mysqli_query ($dbc, $q);
            
                if ((mysqli_num_rows($r))==1) {
                    //match detected;
                    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
                    return array(true, $row);
                    
                } else {
                    //no user found;    
                    $errors[ ] = 'The email address and/or password supplied are not registered in the system';
                    //echo "$e is assigned to the e variable";
                    //echo "$p is assigned to the p variable";

                    // echo '<p>' . mysqli_error($dbc) . '<br /> Query: ' . $q . ' </p>';
                } 
            }
        
                return array(false, $errors);
       
        }
    
            ?>


