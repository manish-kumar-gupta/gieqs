<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 18-07-2021
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
            session_start(); //do this
          }
          
          if ($_SESSION){
          
          if ($_SESSION['debug'] == true){
          
          error_reporting(E_ALL);
          
          }else{
          
          error_reporting(0);
          
          }
          }


Class assets_paid {

	private $id; //int(11)
	private $name; //varchar(200)
	private $description; //varchar(800)
	private $asset_type; //varchar(20)
	private $superCategory; //varchar(11)
	private $linked_blog; //varchar(11)
	private $cost; //varchar(20)
	private $renew_frequency; //varchar(11)
	private $partner; //int(11)
	private $sponsor; //int(11)
	private $advertise_for_purchase; //varchar(11)
	private $connection;

	public function __construct(){
            require_once 'DatabaseMyssqlPDOLearning.class.php';

		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_assets_paid($name,$description,$asset_type,$superCategory,$linked_blog,$cost,$renew_frequency,$partner,$sponsor,$advertise_for_purchase){
		$this->name = $name;
		$this->description = $description;
		$this->asset_type = $asset_type;
		$this->superCategory = $superCategory;
		$this->linked_blog = $linked_blog;
		$this->cost = $cost;
		$this->renew_frequency = $renew_frequency;
		$this->partner = $partner;
		$this->sponsor = $sponsor;
		$this->advertise_for_purchase = $advertise_for_purchase;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from assets_paid where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->name = $row["name"];
			$this->description = $row["description"];
			$this->asset_type = $row["asset_type"];
			$this->superCategory = $row["superCategory"];
			$this->linked_blog = $row["linked_blog"];
			$this->cost = $row["cost"];
			$this->renew_frequency = $row["renew_frequency"];
			$this->partner = $row["partner"];
			$this->sponsor = $row["sponsor"];
			$this->advertise_for_purchase = $row["advertise_for_purchase"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `assets_paid` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["name"] = $row["name"];
			$rowReturn[$x]["description"] = $row["description"];
			$rowReturn[$x]["asset_type"] = $row["asset_type"];
			$rowReturn[$x]["superCategory"] = $row["superCategory"];
			$rowReturn[$x]["linked_blog"] = $row["linked_blog"];
			$rowReturn[$x]["cost"] = $row["cost"];
			$rowReturn[$x]["renew_frequency"] = $row["renew_frequency"];
			$rowReturn[$x]["partner"] = $row["partner"];
			$rowReturn[$x]["sponsor"] = $row["sponsor"];
			$rowReturn[$x]["advertise_for_purchase"] = $row["advertise_for_purchase"];
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
$q = "Select * from `assets_paid` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["name"] = $row["name"];
			$rowReturn[$x]["description"] = $row["description"];
			$rowReturn[$x]["asset_type"] = $row["asset_type"];
			$rowReturn[$x]["superCategory"] = $row["superCategory"];
			$rowReturn[$x]["linked_blog"] = $row["linked_blog"];
			$rowReturn[$x]["cost"] = $row["cost"];
			$rowReturn[$x]["renew_frequency"] = $row["renew_frequency"];
			$rowReturn[$x]["partner"] = $row["partner"];
			$rowReturn[$x]["sponsor"] = $row["sponsor"];
			$rowReturn[$x]["advertise_for_purchase"] = $row["advertise_for_purchase"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `assets_paid` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `assets_paid` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('assets_paid');
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
if ($ov['id'] != ''){
			unset($ov['id']);
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
$q = "INSERT INTO `assets_paid` ($keys) VALUES ($keys2)";
		
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
if ($ov['id'] != ''){
			unset($ov['id']);
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
$q = "UPDATE `assets_paid` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `assets_paid` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from assets_paid order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return id - int(11)
	 */
	public function getid(){
		return $this->id;
	}

	/**
	 * @return name - varchar(200)
	 */
	public function getname(){
		return $this->name;
	}

	/**
	 * @return description - varchar(800)
	 */
	public function getdescription(){
		return $this->description;
	}

	/**
	 * @return asset_type - varchar(20)
	 */
	public function getasset_type(){
		return $this->asset_type;
	}

	/**
	 * @return superCategory - varchar(11)
	 */
	public function getsuperCategory(){
		return $this->superCategory;
	}

	/**
	 * @return linked_blog - varchar(11)
	 */
	public function getlinked_blog(){
		return $this->linked_blog;
	}

	/**
	 * @return cost - varchar(20)
	 */
	public function getcost(){
		return $this->cost;
	}

	/**
	 * @return renew_frequency - varchar(11)
	 */
	public function getrenew_frequency(){
		return $this->renew_frequency;
	}

	/**
	 * @return partner - int(11)
	 */
	public function getpartner(){
		return $this->partner;
	}

	/**
	 * @return sponsor - int(11)
	 */
	public function getsponsor(){
		return $this->sponsor;
	}

	/**
	 * @return advertise_for_purchase - varchar(11)
	 */
	public function getadvertise_for_purchase(){
		return $this->advertise_for_purchase;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setname($name){
		$this->name = $name;
	}

	/**
	 * @param Type: varchar(800)
	 */
	public function setdescription($description){
		$this->description = $description;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setasset_type($asset_type){
		$this->asset_type = $asset_type;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setsuperCategory($superCategory){
		$this->superCategory = $superCategory;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setlinked_blog($linked_blog){
		$this->linked_blog = $linked_blog;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setcost($cost){
		$this->cost = $cost;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setrenew_frequency($renew_frequency){
		$this->renew_frequency = $renew_frequency;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setpartner($partner){
		$this->partner = $partner;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setsponsor($sponsor){
		$this->sponsor = $sponsor;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setadvertise_for_purchase($advertise_for_purchase){
		$this->advertise_for_purchase = $advertise_for_purchase;
	}

    /**
     * Close mysql connection
     */
	public function endassets_paid(){
		$this->connection->CloseMysql();
	}

}