<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 1-06-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class userFunctions {

	
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDO();
	}

    
    public function userExists($email){

        $q = "SELECT `email` FROM `users` WHERE `email` = '$email'";

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){
				return TRUE;
			}else{
				return FALSE;
			}


    }

    public function getUserFromKey($key){

        $q = "SELECT `user_id` FROM `users` WHERE `key` = '$key'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $userid = $row['user_id'];
                }

				return $userid;
			}else{
				return FALSE;
			}


    }

    public function getUserFromEmail($email){

        $q = "SELECT `user_id` FROM `users` WHERE `email` = '$email'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $userid = $row['user_id'];
                }

				return $userid;
			}else{
				return FALSE;
			}


    }

    public function generateRandomString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function getEmailListKey ($email){

		$q = "SELECT `id` FROM `emailList` WHERE `email` = '$email'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $userid = $row['id'];
                }

				return $userid;
			}else{
				return FALSE;
			}


	}

	public function getAllEmailsFaculty(){
		$q = "Select `id`, `firstname`, `surname`, `email`, `title` from `faculty`";
				$result = $this->connection->RunQuery($q);
									$rowReturn = array();
								$x = 0;
								$nRows = $result->rowCount();
								if ($nRows > 0){
		
							while($row = $result->fetch(PDO::FETCH_ASSOC)){
					
					$rowReturn[$x]['id'] = $row["id"];
					$rowReturn[$x]['title'] = $row["title"];

					$rowReturn[$x]['firstname'] = $row["firstname"];
					$rowReturn[$x]['surname'] = $row["surname"];
					$rowReturn[$x]['email'] = $row["email"];

				$x++;		}return $rowReturn;}
		
					else{return FALSE;
					}
					
			}

			

	public function recentUserLogin($userid){

		//if the user has had activity within 15 minutes deny second attempt
		//unless logged out (logout in sessionid)

		$date = new DateTime('now', new DateTimeZone('UTC'));

		//15 mins ago

		$date->sub(new DateInterval('PT15M'));


		$sqltimestamp = date_format($date, 'Y-m-d H:i:s');
		//15 mins ago


		//$q = "SELECT count(`id`) as `count` FROM `userActivity` WHERE `user_id` = '$userid' AND `activity_time` > '$sqltimestamp' AND `session_id` <> '99'";
		$q = "SELECT count(`id`) as `count` FROM `userActivity` WHERE `user_id` = '$userid' AND `activity_time` > '$sqltimestamp'";

		//echo $q;

		$result = $this->connection->RunQuery($q);

						
			$nRows = $result->rowCount();

			while($row = $result->fetch(PDO::FETCH_ASSOC)){

				$count = $row['count'];


			}

			//echo $count;
			
			if ($count > 0){

				//$q2 = "SELECT count(`id`) as `count` FROM `userActivity` WHERE `user_id` = '$userid' AND `activity_time` > '$sqltimestamp' AND `session_id` = '99'";
				$q2 = "SELECT `session_id` FROM `userActivity` WHERE `user_id` = '$userid' AND `activity_time` > '$sqltimestamp' ORDER BY `activity_time` DESC, `id` DESC LIMIT 1";
				//echo $q2;

				$result2 = $this->connection->RunQuery($q2);

				$nRows2 = $result2->rowCount();
			
				if ($nRows2 > 0){

					while($row = $result2->fetch(PDO::FETCH_ASSOC)){

						$sessionid = $row['session_id'];


					}
					
					if ($sessionid == 99){

						return true; //allow login due to last action logout

					}else{

						return false; //deny login
					}

				}else{

					return false; // deny login


				}

			}else{

				return true; // allow login
			}


	}

	//update user registrations functions

	public function checkCombinationUserProgramme($userid, $programmeid)
            {
            

            $q = "Select a.`id`
            FROM `userRegistrations` as a
            WHERE `user_id` = '$userid' AND `programme_id` = '$programmeid'
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                return true;

            } else {
                

                return false;
            }

		}
		
		public function returnCombinationUserProgramme($userid)
            {
            

            $q = "Select a.`id`, a.`programme_id`
            FROM `userRegistrations` as a
            WHERE a.`user_id` = '$userid'
            ";

            echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row;


				}

				return $rowReturn;

            } else {
                

                return false;
            }

		}
		
		public function returnCombinationIDUserProgram($userid, $programmeid)
            {
            

            $q = "Select a.`id`
            FROM `userRegistrations` as a
			WHERE a.`user_id` = '$userid' AND `programme_id` = '$programmeid'
			LIMIT 1
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['id'];


				}

				return $rowReturn;

            } else {
                

                return false;
            }

		}

		public function returnProgrammesUser($userid)
            {
            

            $q = "Select a.`programme_id`
            FROM `userRegistrations` as a
			WHERE a.`user_id` = '$userid'
            ";

            //echo $q . '<br><br>';

			$rowReturn = [];

            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row['programme_id'];


				}

				return $rowReturn;

            } else {
                

                return false;
            }

		}

		public function generateUserRegistrationOptions()
            {
            

            $q = "Select a.`id`, a.`title`, a.`date`
            FROM `programme` as a
            ";

            //echo $q . '<br><br>';

			$rowReturn = [];

            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row;


				}

				foreach ($rowReturn as $key=>$value){

					echo "<option value='{$value['id']}'>{$value['date']} {$value['title']}</value>";

				}

            } else {
                

                return false;
            }

		}
		
		public function returnProgrammeDenominatorSelect2()
            {
            

				$q = "Select `id` FROM `programme`";
  
			

            //echo $q . '<br><br>';

			$rowReturn = [];

            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row['id'];


				}

				return $rowReturn;

            } else {
                

                return false;
            }

		}
		
		public function enrolmentPatternLive($userid){

			
            

				$q = "Select a.`programme_id`
				FROM `userRegistrations` as a
				WHERE a.`user_id` = '$userid'
				";
	
				//echo $q . '<br><br>';
	
				$rowReturn = [];
	
				$result = $this->connection->RunQuery($q);
				
				$x = 0;
				$nRows = $result->rowCount();
	
				if ($nRows > 0) {
	
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
	
						$rowReturn[] = $row['programme_id'];
	
	
					}
	
					return $rowReturn;
	
				} else {
					
	
					return false;
				}

		}
	

    /**
     * Close mysql connection
     */
	public function enduserFunctions(){
		$this->connection->CloseMysql();
	}

}