<?php


$host = substr($_SERVER['HTTP_HOST'], 0, 5);
		if (in_array($host, array('local', '127.0', '192.1'))) {
		    $local = TRUE;
		} else {
		    $local = FALSE;
        }
        
        var_dump($local);

        try{
            $conn = new PDO('mysql:host=localhost;port=3308;dbname=learningToolv1;charset=utf8','root','nevira1pine',array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ));
            
            var_dump($conn);
            //echo "Connected successfully";
        }catch(PDOException $pe){
            echo $pe->getMessage();
        }


?>