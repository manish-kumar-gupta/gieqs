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

if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
    session_start(); //do this
}

if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}

Class assetManager {

	
	private $connection;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * get a select2 box
     *
     */

    public function select2_video_match($search)
    {
    
    $q = "Select 
    `id`, `name`
    FROM `video`
    WHERE `id` = '$search'";

    $result = $this->connection->RunQuery($q);
    $rowReturn = array();
    $x = 0;
    $nRows = $result->rowCount();
    if ($nRows > 0) {

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

          
              //note here returning an option only
            $rowReturn = array('id' => $row['id'], 'text' => $row['name']);
            //print_r($row);
        }
    
        return json_encode($rowReturn);

    } else {
        

        //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
        $rowReturn['result'] = [];
        
        return json_encode($rowReturn);
    }

}

public function select2_all_assets($search)
      {
      
      $q = "Select 
      `id`, CONCAT(`id`, ' - ', `name`, ' - ', `description`, ' - ', _ucs2 0x20AC, `cost`) as `video`
      FROM `assets_paid`
      WHERE lower(CONCAT(`id`, ' ', `name`, ' ', `description`)) LIKE lower('%{$search}%')";

      //echo $q;

      $result = $this->connection->RunQuery($q);
      $rowReturn['results'] = array();
      $x = 0;
      $nRows = $result->rowCount();
      if ($nRows > 0) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $rowReturn['results'][] = array('id' => $row['id'], 'text' => $row['video']);
              //print_r($row);
          }
      
          return json_encode($rowReturn);

      } else {
          

          //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
          $rowReturn['results'] = [];
          
          return json_encode($rowReturn);
      }

  }

public function sanitiseGET ($data) {

    $dataSanitised = array();

    foreach ($data as $key=>$value){

        $sanitisedValue = trim($value);
        //$sanitisedValue = addslashes($sanitisedValue);
        //$sanitisedValue = htmlspecialchars($sanitisedValue);
        //consider htmlentitydecode here, this converts back so &amp to &, special chars & to &amp 
        $dataSanitised[$key] = $sanitisedValue;

    }


    return $dataSanitised;


}

public function select2_asset_match($search)
    {
    
    $q = "Select 
    `id`, CONCAT(`name`, ' - ', `description`) as `name`
    FROM `assets_paid`
    WHERE `id` = '$search'";

    $result = $this->connection->RunQuery($q);
    $rowReturn = array();
    $x = 0;
    $nRows = $result->rowCount();
    if ($nRows > 0) {

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

          
              //note here returning an option only
            $rowReturn = array('id' => $row['id'], 'text' => $row['name']);
            //print_r($row);
        }
    
        return json_encode($rowReturn);

    } else {
        

        //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
        $rowReturn['result'] = [];
        
        return json_encode($rowReturn);
    }

}

public function returnProgrammesAsset($assetid)
            {
            

            $q = "Select a.`programme_id`
            FROM `sub_asset_paid` as a
			WHERE a.`asset_id` = '$assetid'
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

        public function returnVideosAsset($assetid)
            {
            

            $q = "Select a.`video_id`
            FROM `sub_asset_paid` as a
			WHERE a.`asset_id` = '$assetid'
            ";

            //echo $q . '<br><br>';

			$rowReturn = [];

            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row['video_id'];


				}

				return $rowReturn;

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

    public function returnCombinationAssetProgramme($assetid)
            {
            

            $q = "Select a.`id`, a.`programme_id`
            FROM `sub_asset_paid` as a
            WHERE a.`asset_id` = '$assetid'
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
        
        public function checkCombinationAssetProgramme($assetid, $programmeid)
            {
            

            $q = "Select a.`id`
            FROM `sub_asset_paid` as a
            WHERE `asset_id` = '$assetid' AND `programme_id` = '$programmeid'
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
        
        public function returnCombinationIDAssetProgram($assetid, $programmeid)
            {
            

            $q = "Select a.`id`
            FROM `sub_asset_paid` as a
			WHERE a.`asset_id` = '$assetid' AND `programme_id` = '$programmeid'
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
        
        public function returnCombinationUserSubscription($userid)
            {
            

            $q = "Select a.*
            FROM `subscriptions` as a
            WHERE a.`user_id` = '$userid'
            ORDER BY a.`start_date` DESC
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            
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

        public function returnCombinationUserSubscriptionList($userid)
            {
            

            $q = "Select a.*, b.`asset_type`, b.`renew_frequency`
            FROM `subscriptions` as a
            INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
            WHERE a.`user_id` = '$userid' AND b.`asset_type` > 1 AND a.`active` = '1'
            ORDER BY a.`start_date` DESC, b.`asset_type` 
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            
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
        
        public function getAssetName($subscription_id)
            {
            

                $q = "Select 
                b.`name`
                FROM `subscriptions` as a
                INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
                WHERE a.`id` = '$subscription_id'";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows == 1) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['name'];


				}

				return $rowReturn;

            } else {
                

                return false;
            }

        }

        public function getAssetType($subscription_id)
            {
            

                $q = "Select 
                b.`asset_type`
                FROM `subscriptions` as a
                INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
                WHERE a.`id` = '$subscription_id'";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows == 1) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['asset_type'];


				}

				return $rowReturn;

            } else {
                

                return false;
            }

        }

        public function getAssetid($subscription_id)
            {
            

                $q = "Select 
                b.`id`
                FROM `subscriptions` as a
                INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
                WHERE a.`id` = '$subscription_id'";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows == 1) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['id'];


				}

				return $rowReturn;

            } else {
                

                return false;
            }

        }

        public function isAssetFree($subscription_id)
        {
        

            $q = "Select 
            b.`cost`
            FROM `subscriptions` as a
            INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
            WHERE a.`id` = '$subscription_id'";

        //echo $q . '<br><br>';



        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows == 1) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $cost = $row['cost'];


            }

            //if the cost is 0 return true

            if ($cost == '0.00'){

                return true;

            }else{

                return false;
            }

            //otherwise return false

        } else {
            

            //return false;  don't return false here
        }

    }

        public function getAssetTypeText($asset_type)
            {
            

                $q = " 
                SELECT `asset_type`, `asset_type_t` from `values` WHERE `asset_type` = '$asset_type'";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows == 1) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['asset_type_t'];


				}

				return $rowReturn;

            } else {
                

                return false;
            }

        }
        
        public function getSiteWideSubscription($user_id, $debug)
            {
            

                $q = "Select 
                a.`id`
                FROM `subscriptions` as a
                INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
                WHERE b.`asset_type` = '1' 
                AND a.`user_id` = '$user_id'
                AND a.`active` = '1'
                AND a.`expiry_date` > NOW()
                ORDER BY a.`start_date` DESC
                LIMIT 1
                ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows == 1) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['id'];


				}

				return $rowReturn;

            } else {
                

                if ($debug){

                    echo 'no or more than one rows matched';
                }

                return false;

                
            }

		}



        public function getCost($subscription_id)
        {
        
        $q = "Select 
        b.`cost`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE a.`id` = '$subscription_id'";
    
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows == 1) {
    
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    
              
                  //note here returning an option only
                $rowReturn = $row['cost'];
                //print_r($row);
            }
        
            return $rowReturn;
    
        } else {
            
    
            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            //$rowReturn['result'] = [];
            
            return false;
        }
    
    }

    public function isSubscriptionActive($subscription_id, $datetime_utc, $debug){

        $q = "Select 
        a.`active`, a.`start_date`, a.`expiry_date`
        FROM `subscriptions` as a
        WHERE a.`id` = '$subscription_id'";
    
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            if ($nRows == 1){
    
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        
                
                    //note here returning an option only
                    $active = $row['active'];
                    $start_date = $row['start_date'];
                    $expiry_date = new DateTime($row['expiry_date'], new DateTimeZone('UTC'));
                    //print_r($row);
                }
            
                //if not active, not active

                if ($active == '1'){

                    //is active, ? younger than end date

                    if ($expiry_date > $datetime_utc){

                        return true;

                    }else{

                        if ($debug){

                            echo 'inactive since end date passed';
                        }

                        return false;
                    }


                }else{

                    if ($debug){

                        echo 'inactive since active tag inactive';
                    }

                    return false; //inactive since active tag inactive
                    

                }

            }else{


                //more than one such id

                if ($debug){

                    echo 'more than one such id';
                }
                return false;
            }
    
        } else {
            
    
            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            //$rowReturn['result'] = [];
            
            return false; //no subscription id matching
        }

    }

    public function subscription_expires_soon($subscription_id, $debug){

        $q = "Select 
        a.`active`, a.`start_date`, a.`expiry_date`
        FROM `subscriptions` as a
        WHERE a.`id` = '$subscription_id'";
    
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            if ($nRows == 1){
    
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        
                
                    //note here returning an option only
                    
                    $expiry_date = new DateTime($row['expiry_date'], new DateTimeZone('UTC'));
                    //print_r($row);
                }

                $current_date = new DateTime('now', new DateTimeZone('UTC'));

                if ($current_date < $expiry_date){

                    



                    $current_date->modify('+2 week');
                
                    

                    if ($current_date > $expiry_date){

                        //will expire soon

                        if ($debug){

                            echo '<br/>';
                            echo 'will expire soon';
                            print_r($current_date);
                            print_r($expiry_date);
                            echo '<br/>';
                        }

                        return true;

                        


                    }else{

                        if ($debug){

                            echo '<br/>';
                            echo 'will not expire soon';
                            print_r($current_date);
                            print_r($expiry_date);
                            echo '<br/>';
                        }

                        return false; //inactive since active tag inactive
                        

                    }

                }else{

                    //if already passed date return false

                    if ($debug){

                        echo 'date of expiry already passed';
                    }

                    return false;


                }

            }else{


                //more than one such id

                if ($debug){

                    echo 'more than one such id';
                }
                return false;
            }
    
        } else {
            
    
            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            //$rowReturn['result'] = [];
            
            return false; //no subscription id matching
        }


    }

    public function getRenewal ($subscription_id, $debug)
        {
        
        $q = "Select 
        a.`auto_renew`, b.`renew_frequency`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE a.`id` = '$subscription_id'";

        if ($debug){
            
            echo $q;
        }
    
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows == 1) {
    
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    
              
                  //note here returning an option only
                $auto = $row['auto_renew'];
                $renew = $row['renew_frequency'];

                if ($debug){
            
                    print_r($row);
                }
                
            }

            if ($auto == 0 || $auto == null){

                if ($debug){

                    echo 'Will Not Renew, Auto Renew not 1';

                } 
                return false;

            }elseif ($auto == 1){

                if (isset($renew)){

                    //check that the subscription is active

                    $current_date = new DateTime('now', new DateTimeZone('UTC'));

                    $active = $this->isSubscriptionActive($subscription_id, $current_date, $debug);

                    if ($active){
                

                        if ($debug){

                            echo 'Will Renew, frequency ' . $renew . ' months';

                        } 

                        return true;

                    }else{

                        if ($debug){

                            echo 'Will Not Renew, already expired';

                        } 


                        return false;

                    }

                }else{

                    if ($debug){

                        echo 'Will not Renew, no frequency set';

                    } 

                    return false;

                }

            }        
            return $rowReturn;
    
        } else {
            
    
            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            //$rowReturn['result'] = [];
            
            return false;
        }
    
    }


    public function subscription_state($subscription_id, $debug){
        
        
        $current_date = new DateTime('now', new DateTimeZone('UTC'));
        $active = $this->isSubscriptionActive($subscription_id, $current_date, $debug) ? 1 : 0;
        $expires_soon = $this->subscription_expires_soon($subscription_id, $debug) ? 1 : 0;
        $renews = $this->getRenewal($subscription_id, $debug) ? 1 : 0;

        $subscription_state = array('id' => $subscription_id, 'active' => $active, 'expires_soon' => $expires_soon, 'renews' => $renews);

        if ($debug){

            print_r($subscription_state);
        }
       
        return $subscription_state;


    }


public function showButtonSubscription ($subscription_id, $debug){


    $subscription_state = $this->subscription_state($subscription_id, $debug);

    $active = $subscription_state['active'];
    $expires_soon = $subscription_state['expires_soon'];
    $renews = $subscription_state['renews'];

    if ($active == 1){

        if ($renews == 1){

           if ($expires_soon == 1){

            //active, renews and expires soon
            //no extra button

           }

             //show cancel renewal button anyway

            $button = '<button class="btn btn-sm btn-danger rounded-pill p-2 mt-3 ml-3 mt-sm-0 cancel-auto-renew" data-subscriptionid = "'. $subscription_id .' ">Cancel Auto-Renew</button>';

            return $button;

        }else if ($renews == 0){

            // active and won't renew
            //show only renew button if expires soon

            //if a trial don't allow renew

            if ($this->isAssetFree($subscription_id) === false){

                if ($expires_soon == 1){

                    //show renew button
                    $button = '<button class="btn btn-sm btn-primary rounded-pill p-2 mt-3 mt-sm-0 renew" data-subscriptionid = "'. $subscription_id .' ">Renew</button>';
                    return $button;


                }elseif ($expires_soon == 0){

                    //no button, will not renew, not expiring

                    $button = '<button class="btn btn-sm btn-success rounded-pill p-2 mt-3 mt-sm-0 activate-auto-renew" data-subscriptionid = "'. $subscription_id .' ">Activate Auto Renew</button>';
                    return $button;

                }

            }else{ //is free

                



            }



        }



    }elseif ($active == 0){

        //buy again

        $button = '<button class="btn btn-sm btn-warning rounded-pill p-2 mt-3 mt-sm-0 buy-again" data-subscriptionid = "'. $subscription_id .' ">Buy Again</button>';
        return $button;

    }

   

}

//scripts for user modifications to settings

//check user has no same subscription

public function doesUserHaveSameAssetClassSubscription ($subscription_id, $user_id, $debug){

    {
            

        $assetType = $this->getAssetType($subscription_id);
        

        $q = "Select 
        a.`id`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE b.`asset_type` = '$assetType' 
        AND a.`user_id` = '$user_id'
        AND a.`active` = '1'
        AND a.`expiry_date` > NOW()
        ";

    //echo $q . '<br><br>';



    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        /* while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn = $row['id'];


        } */

        if ($debug){

            echo 'user has a subscription of this type already';
        }

        return true;

    } else {
        

        if ($debug){

            echo 'user has no subscription of this type';
        }

        return false;

        
    }

}

}

public function doesUserHaveSameAssetClassAssetType ($asset_type, $user_id, $debug){

    {
        
        $q = "Select 
        a.`id`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE b.`asset_type` = '$asset_type' 
        AND a.`user_id` = '$user_id'
        AND a.`active` = '1'
        AND a.`expiry_date` > NOW()
        ";

    //echo $q . '<br><br>';



    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        /* while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn = $row['id'];


        } */

        if ($debug){

            echo 'user has a subscription of this type already';
        }

        return true;

    } else {
        

        if ($debug){

            echo 'user has no subscription of this type';
        }

        return false;

        
    }

}


}

public function doesUserHaveSameAssetAlready ($asset_id, $user_id, $debug){

    {
        
        $q = "Select 
        a.`id`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE b.`id` = '$asset_id' 
        AND a.`user_id` = '$user_id'
        AND a.`active` = '1'
        AND a.`expiry_date` > NOW()
        ";

    //echo $q . '<br><br>';



    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        /* while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn = $row['id'];


        } */

        if ($debug){

            echo 'user has this exact asset in a subscription already';
        }

        return true;

    } else {
        

        if ($debug){

            echo 'user has no such asset in a subscription';
        }

        return false;

        
    }

}


}

public function isRenewal ($asset_id, $user_id, $debug){

    {
        
        $q = "Select 
        a.`id`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE b.`id` = '$asset_id' 
        AND a.`user_id` = '$user_id'
        AND a.`active` = '1'
        AND a.`expiry_date` > NOW()
        ";

    //echo $q . '<br><br>';



    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 1) {

        /* while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn = $row['id'];


        } */

        if ($debug){

            echo 'user has more than 1 subscription with this asset_id, therefore renewal';
        }

        return true;

    } else {
        

        if ($debug){

            echo 'user has one or less subscription with this asset_id, therefore new purchase';
        }

        return false;

        
    }

}


}








public function insert_copied_records_with_video_id($name, $description, $user_id){

    //q insert the row in video

    $q = "insert into `video` (`name`, `url`, `description`, `active`, `split`, `author`) VALUES ('$name', '123', '$description', '2', '1', '$user_id')";

      echo $q;

      $result = $this->connection->RunQuery($q);
      

      if ($result) {

        return $this->connection->conn->lastInsertId(); 

      } else {
          

          
          return null;
      }

}

public function createChapter($videoid){

    //q insert the row in video

    $q = "INSERT INTO `chapter`(`number`, `name`, `timeFrom`, `timeTo`, `video_id`, `description`) 
    VALUES ('1','Introduction','0','20',$videoid, '')";

      echo $q;

      $result = $this->connection->RunQuery($q);
      

      if ($result) {

        return $this->connection->conn->lastInsertId(); 

      } else {
          

          
          return null;
      }

}

public function linkTags($chapterid, $tagGIEQsDigital){

    //q insert the row in video

    $q = "INSERT INTO `chapterTag`(`tags_id`, `chapter_id`) 
    VALUES ('$tagGIEQsDigital','$chapterid');";

      echo $q;

      $result = $this->connection->RunQuery($q);
      

      if ($result) {

       

        return $this->connection->conn->lastInsertId(); 

        

      } else {
          

          
          return null;
      }

}

public function checkVimeoidPresent($videoid, $past=null, $current=null){

    //q insert the row in video

    $q = "SELECT `url` FROM `video` WHERE `id` = '$videoid'";

      //echo $q;

      $result = $this->connection->RunQuery($q);
      

      $nRows = $result->rowCount();
      
      if ($nRows == 1) {

       

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $url_video = $row['url'];
              //print_r($row);
          }

        if ($url_video == '123'){

            return false;
        }else{

            return true;
        }


      } else {
          

          
          return false;
      }

}

public function checkVimeoidPresentPublic($videoid, $past=null, $current=null, $debug=false){

    //q insert the row in video

    $q = "SELECT `url` FROM `video` WHERE `id` = '$videoid'";

      //echo $q;

      $result = $this->connection->RunQuery($q);
      

      $nRows = $result->rowCount();
      
      if ($nRows == 1) {

       

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            //would show the url
            //now dependent on time

            

            

                $url_video = $row['url']; 


          
            
            
              //print_r($row);
          }

        if ($url_video == '123'){

            return false;

            if ($debug){

                echo 'video is default, not displaying';
            }
        }else{
            
            if ($current){

                $highlight = 1;

                if ($debug){

                    echo 'setting highlight to 1';
                }

            }elseif ($past){

                $highlight = 0;

                if ($debug){

                    echo 'setting highlight to 0';
                }
                
            }else{

                $highlight = 2;

                if ($debug){

                    echo 'setting highlight to 2';
                }

            }

            if ($highlight == 0){

                if ($debug){

                    echo 'highlight is 0, this should be sjowing a video';
                }

            return true;

             }
        }


      } else {
          

          
          return false;
      }

}
	
    /**
     * Close mysql connection
     */
	public function endassetManager (){
		$this->connection->CloseMysql();
	}

}