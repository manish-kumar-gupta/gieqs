<?php
/*
 * Author: David Tate
 * 
 * Create Date: 22-07-2018
 * 
 * Version of MYSQL_to_PHP: 1.1
 * 
 * License: Restricted 
 * 
 */
require_once 'DataBaseMysql.class.php';

Class audioTag {

	private $id; //int(10)
	private $audioid; //int(10)
	private $tagid; //int(10)
	private $connection;

	public function audioTag(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don¥t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_audioTag($audioid,$tagid){
		$this->audioid = $audioid;
		$this->tagid = $tagid;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from audioTag where id = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->id = $row["id"];
			$this->audioid = $row["audioid"];
			$this->tagid = $row["tagid"];
		}return $result; 
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM audioTag WHERE id = $key_row");
return $result; 	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){


		
				$ov = get_object_vars($this);
		
				if ($ov['connection'] != ''){
				unset($ov['connection']);
				}
				if ($ov['id'] != ''){
				unset($ov['id']);
				}
				
				
				//print_r($ov);
				$ovMod = array();
				foreach ($ov as $key=>$value){

					if ($value != ''){

						$ovMod[$key] = $value;
					}

				}

				foreach ($ovMod as $key => $value) {

					$value = "'$value'";
					$updates[] = "$key = $value";      

				}

				 $implodeArray = implode(', ', $updates);
				
		
			$q = "UPDATE audioTag SET $implodeArray WHERE id = \"$this->id\"";
	$result = $this->connection->RunQuery($q); 
	return $result; 
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_RowNulls(){
		$result = $this->connection->RunQuery("UPDATE audioTag set audioid = \"$this->audioid\", tagid = \"$this->tagid\" where id = \"$this->id\"");
	return $result; 
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		
		
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

						$ovMod[$key] = $value;
					}

				}
		
		
	 foreach ($ovMod as $key => $value) {
        
        $updates[$key] = $value;      
    }
        
        //var_dump($updates);
        $implodeArray = implode('\', \'', $updates);
        //var_dump($implodeArray);
        $keys = array_keys($updates);
        $keys_string = implode(', ', $keys);
        $q = "INSERT INTO audioTag ($keys_string) VALUES ('$implodeArray')";
		
		$result = $this->connection->RunQuery($q);
		$last_id = $this->connection->insertID();
		
		if ($result == 1){
			
			return $last_id;
		}else {
			
			return $result;
			
		}
		
	
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New_OLD(){
	$result = $this->connection->RunQuery("Insert into audioTag (audioid, tagid) values (\"$this->audioid\", \"$this->tagid\")");
return $result; 	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from audioTag order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return id - int(10)
	 */
	public function getid(){
		return $this->id;
	}

	/**
	 * @return audioid - int(10)
	 */
	public function getaudioid(){
		return $this->audioid;
	}

	/**
	 * @return tagid - int(10)
	 */
	public function gettagid(){
		return $this->tagid;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setaudioid($audioid){
		$this->audioid = $audioid;
	}

	/**
	 * @param Type: int(10)
	 */
	public function settagid($tagid){
		$this->tagid = $tagid;
	}

    /**
     * Setter for multiple variables
     */
	public function setMultiple($entryArray){
		unset($entryArray['connection']);
		foreach ($entryArray as $key=>$value){
		//$this->$key = NULL;
		if ($value != ''){
		$this->$key = $value;
		}else {
		$this->$key = NULL;
	}
	}
	}

    /**
     * Setter for multiple variables from GET
     */
	public function setFromGet($getArray){
		
		//unset($entryArray['connection']);
		foreach ($getArray as $key=>$value){
			
			
			if ($value != ''){
			
			$this->$key = $value;
			//echo 'set this->'.$key.' to'. $value . '<br>';
			//need some way of not setting all to 0 here
				
			}
		}
		
	}

    /**
     * Create function to return all variables as javascript
     */
	public function JS_var(){
							$result = get_object_vars($this);
							return json_encode($result);
						}

    /**
		!Use this for all returns to Javascript requiring knowledge of whether row updated or not*/

				public function returnYesNoDBQuery ($q){
					
					
					//print_r($q);
					
					
					$result = $this->connection->RunQuery($q);
			
					//print_r($result);
					
						//IF THERE is a database error return 2
						
						//IF THERE are no rows affected but no errors return 0
						
						//IF THERE is one row affected return 1
						
						if ($result){
						
						
							//print_r($this->connection->conn->affected_rows);
					
							//print_r($this->connection->conn, there is plenty else in this object including error_list as an array and connect_error);
					
							if ($this->connection->conn->affected_rows == 1){
								
								return 1;
					
							} else {
					
								return 0;
					
							}
						
						} else {
							
							return 2;
							
						}
			
				}

    /**
     * Create function to return all variables 
     */
	public function all_var(){
							$result = get_object_vars($this);
							return ($result);
						}

    /**
     * Close mysql connection
     */
	public function endaudioTag(){
		$this->connection->CloseMysql();
	}

}