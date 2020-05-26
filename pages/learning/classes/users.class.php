<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 13-04-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDOGIEQS.class.php';

Class users {

	private $user_id; //int(10)
	private $firstname; //varchar(30)
	private $surname; //varchar(30)
	private $email; //varchar(70)
	private $password; //varchar(200)
	private $centre; //int(10)
	private $registered_date; //date
	private $last_login; //timestamp(6)
	private $previous_login; //timestamp(6)
	private $timezone; //varchar(50)
	private $access_level; //int(3)
	private $contactPhone; //varchar(40)
	private $key; //varchar(200)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_users($firstname,$surname,$email,$password,$centre,$registered_date,$last_login,$previous_login,$timezone,$access_level,$contactPhone,$key){
		$this->firstname = $firstname;
		$this->surname = $surname;
		$this->email = $email;
		$this->password = $password;
		$this->centre = $centre;
		$this->registered_date = $registered_date;
		$this->last_login = $last_login;
		$this->previous_login = $previous_login;
		$this->timezone = $timezone;
		$this->access_level = $access_level;
		$this->contactPhone = $contactPhone;
		$this->key = $key;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from users where user_id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->user_id = $row["user_id"];
			$this->firstname = $row["firstname"];
			$this->surname = $row["surname"];
			$this->email = $row["email"];
			$this->password = $row["password"];
			$this->centre = $row["centre"];
			$this->registered_date = $row["registered_date"];
			$this->last_login = $row["last_login"];
			$this->previous_login = $row["previous_login"];
			$this->timezone = $row["timezone"];
			$this->access_level = $row["access_level"];
			$this->contactPhone = $row["contactPhone"];
			$this->key = $row["key"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `users` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["firstname"] = $row["firstname"];
			$rowReturn[$x]["surname"] = $row["surname"];
			$rowReturn[$x]["email"] = $row["email"];
			$rowReturn[$x]["password"] = $row["password"];
			$rowReturn[$x]["centre"] = $row["centre"];
			$rowReturn[$x]["registered_date"] = $row["registered_date"];
			$rowReturn[$x]["last_login"] = $row["last_login"];
			$rowReturn[$x]["previous_login"] = $row["previous_login"];
			$rowReturn[$x]["timezone"] = $row["timezone"];
			$rowReturn[$x]["access_level"] = $row["access_level"];
			$rowReturn[$x]["contactPhone"] = $row["contactPhone"];
			$rowReturn[$x]["key"] = $row["key"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Return_row($key){
$q = "Select * from `users` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["firstname"] = $row["firstname"];
			$rowReturn[$x]["surname"] = $row["surname"];
			$rowReturn[$x]["email"] = $row["email"];
			$rowReturn[$x]["password"] = $row["password"];
			$rowReturn[$x]["centre"] = $row["centre"];
			$rowReturn[$x]["registered_date"] = $row["registered_date"];
			$rowReturn[$x]["last_login"] = $row["last_login"];
			$rowReturn[$x]["previous_login"] = $row["previous_login"];
			$rowReturn[$x]["timezone"] = $row["timezone"];
			$rowReturn[$x]["access_level"] = $row["access_level"];
			$rowReturn[$x]["contactPhone"] = $row["contactPhone"];
			$rowReturn[$x]["key"] = $row["key"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `users` LIMIT $x, $y";
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['data'][] = array_map('utf8_encode', $row);
                }
            
                return json_encode($rowReturn);

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return json_encode($rowReturn);
            }

        }

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from `users` where `user_id` = '$key_row' ");
		$nRows = $result->rowCount();
			if ($nRows == 1){
				return TRUE;
			}else{
				return FALSE;
			}
	}

    /**
		* Return the number of rows
		*/
	public function numberOfRows(){
		return $this->connection->TotalOfRows('users');
	}

    /**
		* Insert statement using PDO
		*/
 public function prepareStatementPDO (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['user_id'] != ''){
			unset($ov['user_id']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "INSERT INTO `users` ($keys) VALUES ($keys2)";
		
 $stmt = $this->connection->prepare($q); 
$stmt->execute($ovMod3); 
return $this->connection->conn->lastInsertId(); 
	}

    /**
		* Update statement using PDO
		*/
 public function prepareStatementPDOUpdate (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['user_id'] != ''){
			unset($ov['user_id']);
		} 
if ($ov['updated'] != ''){
			unset($ov['updated']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$key=$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "UPDATE `users` SET $implodeArray WHERE `user_id` = '$this->user_id'";

		
 $stmt = $this->connection->RunQuery($q); 
 return $stmt->rowCount(); 
	}


    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM `users` WHERE `user_id` = $key_row");
		return $result->rowCount();
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT user_id from users order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["user_id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return user_id - int(10)
	 */
	public function getuser_id(){
		return $this->user_id;
	}

	/**
	 * @return firstname - varchar(30)
	 */
	public function getfirstname(){
		return $this->firstname;
	}

	/**
	 * @return surname - varchar(30)
	 */
	public function getsurname(){
		return $this->surname;
	}

	/**
	 * @return email - varchar(70)
	 */
	public function getemail(){
		return $this->email;
	}

	/**
	 * @return password - varchar(200)
	 */
	public function getpassword(){
		return $this->password;
	}

	/**
	 * @return centre - int(10)
	 */
	public function getcentre(){
		return $this->centre;
	}

	/**
	 * @return registered_date - date
	 */
	public function getregistered_date(){
		return $this->registered_date;
	}

	/**
	 * @return last_login - timestamp(6)
	 */
	public function getlast_login(){
		return $this->last_login;
	}

	/**
	 * @return previous_login - timestamp(6)
	 */
	public function getprevious_login(){
		return $this->previous_login;
	}

	/**
	 * @return timezone - varchar(50)
	 */
	public function gettimezone(){
		return $this->timezone;
	}

	/**
	 * @return access_level - int(3)
	 */
	public function getaccess_level(){
		return $this->access_level;
	}

	/**
	 * @return contactPhone - varchar(40)
	 */
	public function getcontactPhone(){
		return $this->contactPhone;
	}

	/**
	 * @return key - varchar(200)
	 */
	public function getkey(){
		return $this->key;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setuser_id($user_id){
		$this->user_id = $user_id;
	}

	/**
	 * @param Type: varchar(30)
	 */
	public function setfirstname($firstname){
		$this->firstname = $firstname;
	}

	/**
	 * @param Type: varchar(30)
	 */
	public function setsurname($surname){
		$this->surname = $surname;
	}

	/**
	 * @param Type: varchar(70)
	 */
	public function setemail($email){
		$this->email = $email;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setpassword($password){
		$this->password = $password;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setcentre($centre){
		$this->centre = $centre;
	}

	/**
	 * @param Type: date
	 */
	public function setregistered_date($registered_date){
		$this->registered_date = $registered_date;
	}

	/**
	 * @param Type: timestamp(6)
	 */
	public function setlast_login($last_login){
		$this->last_login = $last_login;
	}

	/**
	 * @param Type: timestamp(6)
	 */
	public function setprevious_login($previous_login){
		$this->previous_login = $previous_login;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function settimezone($timezone){
		$this->timezone = $timezone;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setaccess_level($access_level){
		$this->access_level = $access_level;
	}

	/**
	 * @param Type: varchar(40)
	 */
	public function setcontactPhone($contactPhone){
		$this->contactPhone = $contactPhone;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setkey($key){
		$this->key = $key;
    }
    
    public function isAdmin ($userid){
		
		$this->Load_from_key($userid);
		
		if ($this->getaccess_level() == '2' || $this->getaccess_level() == '1'){
			
			return TRUE;
			
			
		} else {
			
			return FALSE;
			
		}
		
		
		
	}
	
	public function isSuperuser ($userid){
		
		$this->Load_from_key($userid);
		
		if ($this->getaccess_level() == '1'){
			
			return TRUE;
			
			
		} else {
			
			return FALSE;
			
		}
		
		
		
	}
	
	public function getUserAccessLevel ($userid) {
		
		$q = "SELECT `access_level` FROM `users` WHERE `user_id` = $userid";

		//echo $q;

		$result = $this->connection->RunQuery($q);

        $nRows = $result->rowCount();
            if ($nRows > 0) {
			
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$accesslevel = $row['access_level'];
				
				
	
			}
			
			return $accesslevel;
			
		}else{
			
			return FALSE;	
		
		}
		
		
		
	}
	
	
	public function getUsers (){
		
		$q = "SELECT `user_id`, `firstname`, `surname` FROM `users`";

		//echo $q;

        $result = $this->connection->RunQuery($q);

        $nRows = $result->rowCount();
            if ($nRows > 0) {

                $users = array();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $id = $row['user_id'];
				$firstname = $row['firstname'];
				$surname = $row['surname'];
				
				$users[$id] = $firstname . ' ' . $surname;
                }
            
                return $users;
            }
        


		
	}
	
	public function getUserName ($id){
		
		$q = "SELECT `firstname`, `surname` FROM `users` WHERE `user_id` = $id";


		$result = $this->connection->RunQuery($q);

        $nRows = $result->rowCount();
            if ($nRows > 0) {

			
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				
				$firstname = $row['firstname'];
				$surname = $row['surname'];
				
				$user = $firstname . ' ' . $surname;
				
				
			}
		
			return $user;
		}else{
			
			return null;
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

    /**
     * Close mysql connection
     */
	public function endusers(){
		$this->connection->CloseMysql();
	}

}