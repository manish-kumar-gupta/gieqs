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

//require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');


Class assetManager {

	
    private $connection;
    private $sessionView;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
        $this->connection = new DataBaseMysqlPDOLearning();

       


            require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
            $this->sessionView = new sessionView();
            require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');
            $this->programmeView = new programmeView;
           


       

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

public function returnAssetProgrammes($programmeid)
            {
            

            $q = "Select a.`asset_id`
            FROM `sub_asset_paid` as a
			WHERE a.`programme_id` = '$programmeid'
            ";

            //echo $q . '<br><br>';

			$rowReturn = [];

            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    $rowReturn[] = $row['asset_id'];


				}

				return $rowReturn;

            } else {
                

                return false;
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

            //echo $q . '<br><br>';



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
        
        public function returnCombinationUserSubscription($userid, $debug=false)
            {
            

            $q = "Select a.*
            FROM `subscriptions` as a
            WHERE a.`user_id` = '$userid'
            ORDER BY a.`start_date` DESC
            ";

            if ($debug){

                echo 'Query was ' . $q; 

            }
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

        public function returnCombinationUserSubscriptionList($userid, $debug=false)
            {
            

            $q = "Select a.*, b.`asset_type`, b.`renew_frequency`
            FROM `subscriptions` as a
            INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
            WHERE a.`user_id` = '$userid' AND b.`asset_type` > 1 AND a.`active` = '1'
            ORDER BY a.`start_date` DESC, b.`asset_type` 
            ";

            if ($debug){

                echo 'Query was '. $q;

            }
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

        public function getAssetTypeAsset($asset_id)
            {
            

                $q = "Select 
                `asset_type`
                FROM `assets_paid`
                WHERE `id` = '$asset_id'";

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

            if ($nRows == 1) {  //should have only one sitewide at a time

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

                    //AUTO-RENEW RE-ADD HERE

                   /*  $button = '<button class="btn btn-sm btn-success rounded-pill p-2 mt-3 mt-sm-0 activate-auto-renew" data-subscriptionid = "'. $subscription_id .' ">Activate Auto Renew</button>';
                    return $button; */

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

public function video_requires_subscription($videoid, $debug=false){


    // if a video is defined as a subasset it requires a subscription

    $asset_array = $this->which_assets_contain_video($videoid);

    if ($asset_array === false){


        if ($debug){

            echo 'video ' . $videoid . ' does not require a subscription';
        }

        return false;

        

    }else{

        if ($debug){

            echo 'video ' . $videoid . ' does require a subscription';
        }

        return true;
    }


    //determine if there are associated videos with the asset tied to the subscription

    //get asset id for subscription


    //check whether the video id is within those covered



}

public function programme_owned_by_user ($programmeid, $userid, $debug){

    //check which assets contain this programme

    $asset_array = $this->which_assets_contain_programme($programmeid);

    if ($asset_array != false){



        //check if user has a subscription containing any of these assetids and that it is active

        $countAssets = 0;

        foreach ($asset_array as $key=>$value){

            if ($this->is_assetid_covered_by_user_subscription($value, $userid, $debug)){  //user has the asset

                $countAssets++;

            }

        }

        if ($countAssets > 0){


            if ($debug){

                echo 'User has access to  ' . $programmeid . ' via a subscription';
    
            }

            return true;

        }else{

            if ($debug){

                echo 'User has NO access to  ' . $programmeid . ' via a subscription';
    
            }

            return false;
        }



        



    }else{

        if ($debug){

            echo 'No asset ids in array for ' . $programmeid;

        }
    }

    //check if user has a subscription containing any of these assetids and that it is active


}

public function getProgrammeidAsset ($assetid, $debug=false){

    $q = "Select 
    c.`programme_id`
    FROM `assets_paid` as b
    INNER JOIN `sub_asset_paid` as c ON b.`id` = c.`asset_id`
    WHERE c.`asset_id` = '$assetid'";

//echo $q . '<br><br>';



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();

if ($nRows > 0) {

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        $rowReturn[$x] = $row['programme_id'];
        $x++;


    }


    return $rowReturn;

} else {
    

    if ($debug){

        echo 'no programmes contained within this asset';
    }

    return false;

    
}




}

public function which_assets_contain_programme ($programmeid, $debug=false){

            $q = "Select 
            b.`id`
            FROM `assets_paid` as b
            INNER JOIN `sub_asset_paid` as c ON b.`id` = c.`asset_id`
            WHERE c.`programme_id` = '$programmeid'";

        //echo $q . '<br><br>';



        $result = $this->connection->RunQuery($q);

        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[$x] = $row['id'];


            }


            return $rowReturn;

        } else {
            

            if ($debug){

                echo 'no assets contain this programmeid';
            }

            return false;

            
        }




}

public function is_assetid_covered_by_user_subscription($asset_id, $userid, $debug=false){


        
            
            $q = "Select 
            a.`id`
            FROM `subscriptions` as a
            INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
            WHERE b.`id` = '$asset_id' 
            AND a.`user_id` = '$userid'
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
    
                echo 'user has a subscription with this asset_id - ' . $asset_id;
            }
    
            return true;
    
        } else {
            
    
            if ($debug){
    
                echo 'user has no subscription with this asset_id or this asset_id does not exist - ' . $asset_id;
            }
    
            return false;
    
            
        }
    
    }

    public function get_subscription_id_asset($asset_id, $userid, $debug=false){


        
            
        $q = "Select 
        a.`id`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE b.`id` = '$asset_id' 
        AND a.`user_id` = '$userid'
        AND a.`active` = '1'
        AND a.`expiry_date` > NOW()
        ";

    //echo $q . '<br><br>';



    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

         while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $rowReturn = $row['id'];


        } 

        if ($debug){

            echo 'user has a subscription id ' . $rowReturn . 'with this asset_id - ' . $asset_id;
        }

        return $rowReturn;

    } else {
        

        if ($debug){

            echo 'user has no subscription with this asset_id or this asset_id does not exist - ' . $asset_id;
        }

        return false;

        
    }

}
    
    
    
    
public function video_owned_by_user ($videoid, $userid, $debug){

    //check which assets contain this programme

    $asset_array = $this->which_assets_contain_video($videoid);

    if ($debug){

        echo 'The following assets contain this video with id ' . $videoid;
        echo '<br/>';
        var_dump($asset_array);
    }

    if ($asset_array != false){



        //check if user has a subscription containing any of these assetids and that it is active

        $countAssets = 0;

        foreach ($asset_array as $key=>$value){

            if ($this->is_assetid_covered_by_user_subscription($value, $userid, $debug)){  //user has the asset

                $countAssets++;

            }

        }

        if ($countAssets > 0){


            if ($debug){

                echo 'User has access to  ' . $videoid . ' via a subscription';
    
            }

            return true;

        }else{

            if ($debug){

                echo 'User has NO access to  ' . $videoid . ' via a subscription';
    
            }

            return false;
        }



        



    }else{

        if ($debug){

            echo 'This video ' . $videoid . ' is not covered by any assets';

        }

        return null;
    }

    //check if user has a subscription containing any of these assetids and that it is active


}

public function which_assets_contain_video ($videoid, $debug=false){

    $q = "Select 
    b.`id`
    FROM `assets_paid` as b
    INNER JOIN `sub_asset_paid` as c ON b.`id` = c.`asset_id`
    WHERE c.`video_id` = '$videoid'";

    if ($debug){
        echo $q . '<br><br>';
    }

    //echo $q . '<br><br>';



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();

if ($nRows > 0) {

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        $rowReturn[$x] = $row['id'];
        $x++;


    }


    return $rowReturn;

} else {
    

    if ($debug){

        echo 'no assets contain this videoid';
    }

    return false;

    
}




}

//is there a programme which contains this video?

//is programme subscribable?

public function isProgrammeSubscribable($programmeid, $debug=false){

    $q = "Select 
    b.`id`
    FROM `assets_paid` as b
    INNER JOIN `sub_asset_paid` as c ON b.`id` = c.`asset_id`
    WHERE c.`programme_id` = '$programmeid'";

//echo $q . '<br><br>';



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();

if ($nRows > 0) {

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        $rowReturn[$x] = $row['id'];


    }


    return $rowReturn;

} else {
    

    if ($debug){

        echo 'no assets contain this programmeid';
    }

    return false;

    
}

}

//return a list of id's of subscribable programmes

//is programme subscribable?

public function returnSubscribableProgrammes($debug=false){

    $q = "Select 
    c.`programme_id`
    FROM `assets_paid` as b
    INNER JOIN `sub_asset_paid` as c ON b.`id` = c.`asset_id`
    WHERE `programme_id` IS NOT NULL";

//echo $q . '<br><br>';



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();

if ($nRows > 0) {

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        $rowReturn[$x] = $row['programme_id'];
        $x++;


    }

    if ($debug){

        print_r($rowReturn);
    }

    return $rowReturn;

} else {
    

    if ($debug){

        echo 'no programmes are subscribable';
    }

    return false;

    
}

}


public function getVideosProgramme($programmeid, $debug=false){

    //$programmesSubscribable = $this->returnSubscribableProgrammes();

    $programmesSubscribable = $this->isProgrammeSubscribable($programmeid, $debug);

    //print_r($programmesSubscribable);

    $videos = array();

    if ($programmesSubscribable){


       

            $sessions = $this->programmeView->getSessionsShort($value);

            foreach ($sessions as $key2=>$value2){

                if (isset($value2['sessionid'])){

                    $videos[] = $this->programmeView->getVideoURL($value2['sessionid']);
                    //$matches[]['programme_id'] = $value;

                }

            }


           

        

    }else{

        return false;

        if ($debug){

            echo 'no subscribable programmes';
        }
    }

}

//if so is the video contained within any programme?

public function getSubscribableProgrammesArray_unified ($programmesSubscribable, $debug=false){



        $unifiedarray = array();
        $x = 0;
        $y = 0;
        foreach ($programmesSubscribable as $key=>$value){

            //$value is programmeid

            $programmeid = $value;
            $unifiedarray[$x]['programmeid'] = $programmeid;

            //get sessions
           

            $sessions = $this->programmeView->getSessionsShort($value);

            if ($debug){
                echo 'sessions for programmeid ' . $programmeid .  'are';

                
        
                print_r($sessions);
                echo '<br/><br/>';
            }

            $y=0;

            foreach ($sessions as $key2=>$value2){

                if (isset($value2['sessionid'])){


                    $videosArray = null;
                    $videosArray = $this->programmeView->getVideoURLArray($value2['sessionid']);

                    foreach ($videosArray as $key3=>$value3){

                        $unifiedarray[$x]['videos'][] = $value3;

                    }

                    

                    
                    $y++;





                }

            }

            $x++;


           

        }

        
        if ($debug){

            echo 'Outcome unified array is ';
            //print_r($videos);
            
        
            print_r($unifiedarray);
            echo '<br/><br/>';
        }

        return $unifiedarray;


    


}

public function getSubscribableProgrammesArray_videos ($programmesSubscribable, $debug=false){


    $videos = array();



        $unifiedarray = array();
        $x = 0;
        $y = 0;
        foreach ($programmesSubscribable as $key=>$value){

            //$value is programmeid

            $programmeid = $value;
            $unifiedarray[$x]['programmeid'] = $programmeid;

            //get sessions
           

            $sessions = $this->programmeView->getSessionsShort($value);

            if ($debug){
                echo 'sessions for programmeid ' . $programmeid .  'are';

                
        
                print_r($sessions);
                echo '<br/><br/>';
            }

            $y=0;

            foreach ($sessions as $key2=>$value2){

                if (isset($value2['sessionid'])){

                    $videosArray = null;
                    $videosArray = $this->programmeView->getVideoURLArray($value2['sessionid']);

                    if ($debug){

                        echo 'Outcome videos array for session  ' . $value2['sessionid'];
                        //print_r($videos);
                        
                    
                        print_r($videosArray);
                        echo '<br/><br/>';
                    }

                    foreach ($videosArray as $key3=>$value3){

                        $videos[] = $value3;

                    }

                    //$matches[]['programme_id'] = $value;
                    $y++;
                }

            }

            $x++;


           

        }

        
        
        if ($debug){
            echo '<br/><br/>';
            echo 'Outcome videos array is ';
            print_r($videos);
            echo '<br/><br/>';
        }

        return $videos;


    


}

public function isVideoContainedWithinAnySubscribableProgramme($videoid, $debug=false){

    $programmesSubscribable = $this->returnSubscribableProgrammes();

    if ($debug){

        echo 'Subscribable programmes are';
        print_r($programmesSubscribable);
        echo '<br/>';

    }
    //print_r($programmesSubscribable);

    $videos = array();

    if (isset($programmesSubscribable)){

        $unifiedarray = $this->getSubscribableProgrammesArray_unified($programmesSubscribable);
        $videos = $this->getSubscribableProgrammesArray_videos($programmesSubscribable);
        $videos = array_filter($videos);


    
        if ($debug){
            echo 'Outcome videos array is ';
            print_r($videos);
            echo '<br/><br/>';
        }

        if ($debug){

            echo 'Outcome unified array is ';
            //print_r($videos);
            
        
            print_r($unifiedarray);
            echo '<br/><br/>';
        }

         //do they contain this video


         if (in_array($videoid, $videos)){

            
            if ($debug){

                echo 'The video is contained within a subscribable program(S)';
            }

            return $unifiedarray;


        }else{

            if ($debug){

                echo 'The video is not contained within a subscribable program';
            }

            return false;
        }

    }else{

        if ($debug){

            echo 'No subscribable programmes';
        }

        return false;

    }



}

public function isVideoContainedWithinAnySubscribableProgramme_old($videoid, $debug=false){

    $programmesSubscribable = $this->returnSubscribableProgrammes();

    if ($debug){

        echo 'Subscribable programmes are';
        print_r($programmesSubscribable);
        echo '<br/>';

    }
    //print_r($programmesSubscribable);

    $videos = array();

    if (isset($programmesSubscribable)){


        $unifiedarray = $this->getSubscribableProgrammesArray_unified($programmesSubscribable);
        $videos = $this->getSubscribableProgrammesArray_videos($programmesSubscribable);
       $videos = array_filter($videos);


        if ($debug){

            echo 'Outcome unified array is ';
            //print_r($videos);
            
        
            print_r($unifiedarray);
            echo '<br/><br/>';
        }


        if ($debug){
            echo 'Outcome videos array is ';
            print_r($videos);
            echo '<br/><br/>';
        }

       

         //do they contain this video


         if (in_array($videoid, $videos)){

            
            if ($debug){

                echo 'The video is contained within a subscribable program(S)';
            }

            return $unifiedarray;


        }else{

            if ($debug){

                echo 'The video is not contained within a subscribable program';
            }

            return false;
        }

    }else{

        if ($debug){

            echo 'No subscribable programmes';
        }

        return false;

    }



}

public function getProgrammeidVideo ($unifiedarray, $videoid, $debug=false){
    //searches array from isVideoContainedWithinAnySubscribableProgramme for the programme id

    $matched_programmes = array();
    $x = 0;

    foreach ($unifiedarray as $key=>$value){


        //check the $value['programmeid'] is programme id

        $programmeid = null;
        $programmeid = $value['programmeid'];

        if ($debug){
            print_r($value['videos']);
        }
       

        foreach ($value['videos'] as $key2=>$value2){

            if ($value2 == $videoid){

                $matched_programmes[$x]['videoid'] = $videoid;
                $matched_programmes[$x]['programmeid'] = $programmeid;
                //maybe more than one asset per programme
                $matched_programmes[$x]['assetid'] = $this->returnAssetIDProgramme($programmeid);

                $x++;

            }

        }



    }

    if ($debug){
        print_r($matched_programmes);
    }

    return $matched_programmes;

}

public function userAssetsAccessArray($matched_programmes, $userid, $debug){

    foreach ($matched_programmes as $key=>$value){

        foreach ($value['assetid'] as $key2=>$value2){
    
            //check $value2;
            $access4 = null;
            $access4 = $this->is_assetid_covered_by_user_subscription($value2, $userid, false);
    
            if ($access4){
    
                return true;
    
            }
    
    
        }
        
    }

}

public function checkVideoProgrammeAspect($videoid, $userid, $debug){

    //$debug=true;

    if ($this->isVideoContainedWithinAnySubscribableProgramme($videoid, $debug)){

        //$access = $this->isVideoContainedWithinAnySubscribableProgramme($videoid, $debug);
        $access = $this->isVideoContainedWithinAnySubscribableProgramme($videoid, false);

        if ($debug){

            echo '<br/></br>access is ';
            print_r($access);
            echo '<br/></br>';

        

        }

    
        //$access2 = $this->getProgrammeidVideo($access, $videoid, $debug);
        $access2 = $this->getProgrammeidVideo($access, $videoid, false);

        if ($debug){

            echo '<br/></br>access2 is ';
            print_r($access2);
            echo '<br/></br>';

        

        }

    
        if (is_array($access2)){
    
    
            $access3 = $this->userAssetsAccessArray($access2, $userid, $debug);
    
            if ($access3 === true){
    
                return true;
            }else{
    
                return false;
            }
    
    
        }else{
    
            if ($debug){
             echo 'no array returned';
            }
            //no array returned
    
        }
    
    
    
    }else{
    
        if ($debug){
            echo 'video is not in a subscribable';

        }
    //video is not in a subscribable
    return null; //because this is not in a subscribable programme
    
    }
}

public function doesUserHaveSubscriptionMenu($user_id, $debug)
            {
            

                $q = "Select 
                a.`id`
                FROM `subscriptions` as a
                INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
                WHERE (b.`asset_type` = '2' OR b.`asset_type` = '3' OR b.`asset_type` = '4') 
                AND (a.`user_id` = '$user_id')
                AND (a.`active` = '1')
                AND (a.`expiry_date` > NOW())
                ORDER BY a.`start_date` DESC
                ";

            
            if ($debug){

                echo $q . '<br><br>';

            }


            $result = $this->connection->RunQuery($q);
            
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                if ($debug){

                    echo 'user has one or more course subscription';
                }

                return true;

            } else {
                

                if ($debug){

                    echo 'user has no subscriptions to courses';
                }

                return false;

                
            }

        }
        
public function getHeadersNavSubscriptions($user_id, $debug){

    {
            

        $q = "Select 
        b.`asset_type`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE (b.`asset_type` = '2' OR b.`asset_type` = '3' OR b.`asset_type` = '4') 
        AND (a.`user_id` = '$user_id')
        AND (a.`active` = '1')
        AND (a.`expiry_date` > NOW())
        GROUP BY b.`asset_type`
        ORDER BY b.`asset_type` ASC
        ";

    
    if ($debug){

        echo $q . '<br><br>';

    }


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $id = null;

            $id = $row['asset_type'];

            $rowReturn[$x]['id'] = $row['asset_type'];
            $rowReturn[$x]['asset_type'] = $this->getAssetTypeText($row['asset_type']);
            $x++;


        }


        if ($debug){

            var_dump($rowReturn);
        }

        return $rowReturn;

    } else {
        

        if ($debug){

            echo 'user has no subscriptions to this courses';
        }

        return false;

        
    }

}


}


public function getMenuItems($user_id, $asset_type, $debug){

    {
            

        $q = "Select 
        b.`id`, b.`name`
        FROM `subscriptions` as a
        INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
        WHERE (b.`asset_type` = '$asset_type') 
        AND (a.`user_id` = '$user_id')
        AND (a.`active` = '1')
        AND (a.`expiry_date` > NOW())
        ORDER BY b.`name` ASC
        ";

    
    if ($debug){

        echo $q . '<br><br>';

    }


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $id = null;

            $id = $row['id'];

            $rowReturn[$x]['id'] = $row['id'];
            $rowReturn[$x]['name'] = $row['name'];
            $x++;


        }

        if ($debug){

           var_dump($rowReturn);
        }

        return $rowReturn;

    } else {
        

        if ($debug){

            echo 'no items for this asset_type ' . $asset_type;
        }

        return false;

        
    }

}


}



public function getVideoTagCategories($videos, $debug){

    {

        // $videos is an array of videos

        //generic code to pass arrays to mysql query!

        $query_where = null;
        $y=0;
        $z = count($videos);

        if ($z == 0){

            if ($debug){

                echo 'no videos passed';
            }

            return false;

        }

        if ($z == 1){

            $query_where = "WHERE a.`id` = '$videos[0]'";

        }else{

            foreach ($videos as $key=>$value){
                
                if ($y == 0){

                    $query_where .= 'WHERE (';

                }

                

                $array_position = null;
                $array_position = $z - $y;

                if ($debug){

                    
                    echo $array_position . ' is array position';
                }
                 
                if ($array_position == 1){

                    $query_where .= "a.`id` = '$value')";
                    continue;

                    
                }

                $query_where .= "a.`id` = '$value' OR ";

                $y++;

            }
    }

        if ($debug){

            echo $query_where;
        }
            
        $q = "SELECT e.`id` 
        FROM `video` as a 
        INNER JOIN `chapter` as b ON a.`id` = b.`video_id`
        INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
        INNER JOIN `tags` as d ON d.`id` = c.`tags_id` 
        INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` 
        $query_where 
        GROUP BY e.`id` 
        ORDER BY e.`tagCategoryName` ASC ";

    
    if ($debug){

        echo $q . '<br><br>';

    }


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    if ($nRows > 0) {

        
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $id = null;

            $id = $row['id'];

            $rowReturn[] = $row['id'];
            //$rowReturn[$x]['tagCategoryName'] = $row['tagCategoryName'];
            $x++;


        }

        if ($debug){

           var_dump($rowReturn);
        }

        return $rowReturn;

    } else {
        

        if ($debug){

            echo 'the linked videos have no tagCategories';
            print_r($videos);
        }

        return false;

        
    }

}


}

public function returnVideoDenominatorSelect2()
            {
            

				$q = "Select `id` FROM `video`";
  
			

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
        
        public function returnCombinationVideoAsset($assetid)
            {
            

            $q = "Select a.`id`, a.`video_id`
            FROM `sub_asset_paid` as a
            WHERE (a.`asset_id` = '$assetid') 
            AND (a.`video_id` IS NOT NULL)
            ";

            //echo $q . '<br><br>';



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

        public function returnAssetidforVideoidStraight($videoid)
            {
            

            $q = "Select a.`asset_id`
            FROM `sub_asset_paid` as a
            WHERE (a.`video_id` = '$videoid') 
            AND (a.`video_id` IS NOT NULL)
            ";

            //echo $q . '<br><br>';



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

        


        public function checkCombinationVideoProgramme($assetid, $videoid)
            {
            

            $q = "Select a.`id`
            FROM `sub_asset_paid` as a
            WHERE `asset_id` = '$assetid' AND `video_id` = '$videoid'
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

        public function returnCombinationIDAssetVideo($assetid, $videoid)
        {
        

        $q = "Select a.`id`
        FROM `sub_asset_paid` as a
        WHERE a.`asset_id` = '$assetid' AND `video_id` = '$videoid'
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

    public function returnAssetIDProgramme($programmeid)
            {
            

            $q = "Select b.`id`
            FROM `sub_asset_paid` as a
            INNER JOIN `assets_paid` as b on a.`asset_id` = b.`id`
            WHERE a.`programme_id` = '$programmeid'
            AND a.`programme_id` IS NOT NULL
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
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

        public function returnAssetIDProgrammev2($programmeid)
            {
            

            $q = "Select b.`id`
            FROM `sub_asset_paid` as a
            INNER JOIN `assets_paid` as b on a.`asset_id` = b.`id`
            WHERE a.`programme_id` = '$programmeid'
            AND a.`programme_id` IS NOT NULL
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['id'];
                    $x++;
        
        
                }
                return $rowReturn;

            } else {
               

                return false;
            }

        }


        public function getOwnersAsset($assetid)
            {
            //via subscriptions

            $q = "Select c.`id`, c.`user_id`
            FROM `subscriptions` as c
            WHERE c.`asset_id` = '$assetid'
            AND c.`active` = '1'
            AND c.`expiry_date` > NOW()
            GROUP BY c.`user_id`
            
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x]['user_id'] = $row['user_id'];
                    $rowReturn[$x]['id'] = $row['id'];
 

                    $x++;
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

        }

        public function getOwnersAssetPlainArray($assetid)
            {
            //via subscriptions

            $q = "Select c.`id`, c.`user_id`
            FROM `subscriptions` as c
            WHERE c.`asset_id` = '$assetid'
            AND c.`active` = '1'
            AND c.`expiry_date` > NOW()
            GROUP BY c.`user_id`
            
            ";

            //echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['user_id'];
                    
 

                    $x++;
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

        }

        public function getOwnersAssetPlainArrayEmails($assetid)
            {
            //via subscriptions

            $q = "Select c.`id`, c.`user_id`
            FROM `subscriptions` as c
            WHERE c.`asset_id` = '$assetid'
            AND c.`active` = '1'
            AND c.`expiry_date` > NOW()
            GROUP BY c.`user_id`
            
            ";

            echo $q . '<br><br>';



            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
                    
                    $rowReturn[$x] = $row['user_id'];
                    
 

                    $x++;
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

        }

        


        public function getSuperCategories(){

			
			$q = "SELECT `superCategory`, `superCategory_t` from `values` WHERE `superCategory` > 0 ORDER BY CAST(`superCategory` AS unsigned) ASC";
				//$q = "SELECT `superCategory` FROM `tagCategories` WHERE `id` = $id";
		
                //echo $q;
                
                $x = 0;
                $tagCategoryName = array();
		
                $result = $this->connection->RunQuery($q);

                $nRows = $result->rowCount();

                
                if ($nRows > 0){
		
					
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
						
						$tagCategoryName[$x]['superCategory'] = $row['superCategory'];
                        $tagCategoryName[$x]['superCategory_t'] = $row['superCategory_t'];
                        $x++;
						
						
						
						
					}
				
					return $tagCategoryName;
				}else{
					
					return null;
				}
			



        }

        public function getBlogs(){

			
			$q = "SELECT `id`, `name` from `blogs` ORDER BY `id` ASC";
				//$q = "SELECT `superCategory` FROM `tagCategories` WHERE `id` = $id";
		
                //echo $q;
                
                $x = 0;
                $tagCategoryName = array();
		
                $result = $this->connection->RunQuery($q);

                $nRows = $result->rowCount();

                
                if ($nRows > 0){
		
					
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
						
						$tagCategoryName[$x]['id'] = $row['id'];
                        $tagCategoryName[$x]['name'] = $row['name'];
                        $x++;
						
						
						
						
					}
				
					return $tagCategoryName;
				}else{
					
					return null;
				}
			



        }

        public function getPartners(){

			
			$q = "SELECT `id`, `name` from `partner` ORDER BY `id` ASC";
				//$q = "SELECT `superCategory` FROM `tagCategories` WHERE `id` = $id";
		
                //echo $q;
                
                $x = 0;
                $tagCategoryName = array();
		
                $result = $this->connection->RunQuery($q);

                $nRows = $result->rowCount();

                
                if ($nRows > 0){
		
					
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
						
						$tagCategoryName[$x]['id'] = $row['id'];
                        $tagCategoryName[$x]['name'] = $row['name'];
                        $x++;
						
						
						
						
					}
				
					return $tagCategoryName;
				}else{
					
					return null;
				}
			



        }

        public function getSponsors(){

			
			$q = "SELECT `id`, `name` from `sponsor` ORDER BY `id` ASC";
				//$q = "SELECT `superCategory` FROM `tagCategories` WHERE `id` = $id";
		
                //echo $q;
                
                $x = 0;
                $tagCategoryName = array();
		
                $result = $this->connection->RunQuery($q);

                $nRows = $result->rowCount();

                
                if ($nRows > 0){
		
					
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
						
						$tagCategoryName[$x]['id'] = $row['id'];
                        $tagCategoryName[$x]['name'] = $row['name'];
                        $x++;
						
						
						
						
					}
				
					return $tagCategoryName;
				}else{
					
					return null;
				}
			



        }

        public function getSuperCategoryName($supercategory){

			
			$q = "SELECT `superCategory_t` from `values` WHERE `superCategory` = '$supercategory'";
				//$q = "SELECT `superCategory` FROM `tagCategories` WHERE `id` = $id";
		
                //echo $q;
                
                $x = 0;
                $tagCategoryName = array();
		
                $result = $this->connection->RunQuery($q);

                $nRows = $result->rowCount();

                
                if ($nRows > 0){
		
					
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
						
						$name = $row['superCategory_t'];
						
						
						
						
					}
				
					return $name;
				}else{
					
					return null;
				}
			



        }

        public function countCourses($debug=false){


            $q = "Select 
            COUNT(b.`id`) as `count`
            FROM `assets_paid` as b
            WHERE (b.`asset_type` = '3')";

            $result = $this->connection->RunQuery($q);


            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $count = $row['count'];

        
        
            }

            return $count;


        }

        public function countCoursesUser($userid, $debug=false){


            $q = "Select 
            COUNT(b.`id`) as `count`
            FROM `assets_paid` as b
            WHERE (b.`asset_type` = '3') AND b.`id` IN (SELECT b.`id`
            FROM `subscriptions` as a
            INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
            WHERE b.`asset_type` = '3' 
            AND a.`user_id` = '$userid'
            AND a.`active` = '1'
            AND a.`expiry_date` > NOW() ) ";

            if ($debug){

                echo $q;
            }

            $result = $this->connection->RunQuery($q);


            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $count = $row['count'];

        
        
            }

            return $count;


        }

        public function countPremiumPacksUser($userid, $debug=false){


            $q = "Select 
            COUNT(b.`id`) as `count`
            FROM `assets_paid` as b
            WHERE (b.`asset_type` = '4') AND b.`id` IN (SELECT b.`id`
            FROM `subscriptions` as a
            INNER JOIN `assets_paid` as b ON a.`asset_id` = b.`id`
            WHERE b.`asset_type` = '4' 
            AND a.`user_id` = '$userid'
            AND a.`active` = '1'
            AND a.`expiry_date` > NOW() ) ";

            if ($debug){

                echo $q;
            }

            $result = $this->connection->RunQuery($q);


            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $count = $row['count'];

        
        
            }

            return $count;


        }

        public function countPremiumPacks($debug=false){


            $q = "Select 
            COUNT(b.`id`) as `count`
            FROM `assets_paid` as b
            WHERE (b.`asset_type` = '4')";

            $result = $this->connection->RunQuery($q);


            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $count = $row['count'];

        
        
            }

            return $count;


        }
        
        public function getCourses($debug=false){

            $q = "Select 
            b.`id`
            FROM `assets_paid` as b
            WHERE (b.`asset_type` = '3')";
        
        //echo $q . '<br><br>';
        
        
        
        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();
        
        if ($nRows > 0) {
        
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $rowReturn[$x] = $row['id'];
                $x++;
        
        
            }
        
            if ($debug){
        
                print_r($rowReturn);
            }
        
            return $rowReturn;
        
        } else {
            
        
            if ($debug){
        
                echo 'no assets are courses';
            }
        
            return false;
        
            
        }
        
        }


            /*

            VideoSet

            1 - videoset
            2 - course, show by session one only
            3 - course, show by session all items


            Browsing

            1 - sitewide subscription
            2 - congress
            3 - course
            4 - video collection
            5 - page
            6 - single video

            */
        /* Takes an array of videos and variables describing the context to return an array of allowed videos */
        public function determineVideoAccessNonAsset ($videoArray, $superuser, $userid, $debug=false){

            //determine the context

            //returns array of videos


 //REMOVE ONCE WORKING

 $superuser = 1;

                //use all approach to browsing the site

                if ($superuser == '0'){

                    //GO THROUGH THE VIDEOS AND REMOVE ANY THAT THE USER HAS NO ACCESS TO
                    
                    foreach ($videoArray as $key=>$value){
                    
                    
                        //does it require subscription?
                    
                        $array_key = $key;
                    
                        //check there is no access via a programme
                    
                        $access3 = $this->checkVideoProgrammeAspect($value['id'], $userid, true);
                    
                        if ($access3 === false){ //contained within a programme and no access to this programme
                    
                    
                            if ($debug){
                    
                                echo 'user id ' . $userid . ' has no access to video id ' . $value['id'] . ' via a programme';
                                echo 'now checking access via videoset';
                    
                           }
                    
                           $access = $this->video_requires_subscription($value['id'], false);
                    
                            if ($access){ //requires subscription via videoset (is in a videoset)
                    
                    
                                $access2 = $this->video_owned_by_user($value['id'], $userid, false);
                    
                                if ($access2 === false){ //in videoset, not owned by user
                    
                                    //remove this video from the array
                                    unset($videoArray[$key]);
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has no access to video id ' . $value['id'];
                    
                                    }
                    
                    
                                }else{
                    
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
                    
                                    }
                    
                                    
                                    //user has access to this video via videoset.  despite no access via programme grant
                                }
                    
                            }else{ //is not in a videoset (but is contained within a programme)
                    
                                if ($debug){
                    
                                    echo 'video id ' . $value['id'] . ' requires a programme subscription and is not covered by a videoset';
                                    echo 'video id ' . $value['id'] . ' removed from array';
                    
                                }
                    
                                unset($videos[$key]);
                    
                    
                            }
                    
                    
                    
                        }elseif ($access3 === true) {
                    
                            if ($debug){
                    
                                echo 'user id ' . $userid . ' has access to video id ' . $value['id'] . ' via a programme';
                                echo 'access granted';
                    
                           }
                    
                           
                    
                        }else{
                    
                            //not contained within a programme
                            //check if contained within a videoset
                            $access = $this->video_requires_subscription($value['id'], false);
                    
                            if ($access){ //requires subscription via videoset (is in a videoset)
                    
                    
                                $access2 = $this->video_owned_by_user($value['id'], $userid, false);
                    
                                if ($access2 === false){ //in videoset, not owned by user
                    
                                    //remove this video from the array
                                    unset($videoArray[$key]);
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has no access to video id ' . $value['id'];
                    
                                    }
                    
                    
                                }else{
                    
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
                    
                                    }
                    
                                    
                                    //user has access to this video via videoset.  despite no access via programme grant
                                }
                    
                            }else{
                    
                                //not in programme or videoset
                                
                    
                                if ($debug){
                    
                                    echo 'video ' . $value['id'] . ' is freely available';
                    
                                    echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
                    
                                }
                    
                            }
                    
                        }
                    
                    
                        
                    
                        //test user access
                    
                    
                    
                        
                    
                    }
                    }else{
                    
                        if ($debug){
                    
                            echo 'all videos available as superuser';
                        }



                    }

                    return $videoArray;

            
            //determine what is in the two array inputs from getVideos and getNavv2, if same fields ok if not make same

            //if $browsing is an asset

            //then easy to check access to the whole asset

            // then re

            



        }

        public function determineVideoAccess ($videoArray, $superuser, $userid, $debug=false){

            //determine the context

            //returns array of videos


                //REMOVE ONCE WORKING

                $superuser = 1;

                //use all approach to browsing the site

                if ($superuser == '0'){

                    //GO THROUGH THE VIDEOS AND REMOVE ANY THAT THE USER HAS NO ACCESS TO

                    if ($debug){
                    
                        echo 'user id ' . $userid . ' is  not a superuser';
                        echo '<br/>checking videoArray';
                        print_r($videoArray);
                        echo '<br/><br/>';
                      

            
                   }
                    
                    foreach ($videoArray as $key=>$value){
                    
                    
                        //does it require subscription?
                    
                        $array_key = $key;

                        //is it an asset and contained withiin

                        $access4 = $this->video_owned_by_user($value, $userid, $debug); //if true access granted //if false check further

                        if ($access4 === true){

                            //grant access

                            if ($debug){
                    
                                echo 'is an asset and user has access, so access granted';
                                echo '<br/><br/>';
                              
        
                    
                           }
                           continue;

                        }elseif ($access4 === false){

                            //deny access since this is an asset with no access

                            if ($debug){
                    
                                echo 'is an asset and user has NO access, therefore access denied';
                                echo '<br/><br/>';
                            
        
                    
                           }
                           unset($videoArray[$key]);
                           continue;

                        }elseif ($access4 === null){

                            if ($debug){
                    
                                echo 'is NOT an asset';
                                echo '<br/><br/>';
                              
        
                    
                           }
                    
                        //check there is no access via a programme
                    
                        $access3 = $this->checkVideoProgrammeAspect($value, $userid, $debug);
                    
                        if ($access3 === false){ //contained within a programme and no access to this programme
                    
                    
                            if ($debug){
                    
                                echo 'user id ' . $userid . ' has no access to video id ' . $value . ' via a programme';
                                echo 'now checking access via videoset';
                    
                           }
                    
                           $access = $this->video_requires_subscription($value, $debug);
                    
                            if ($access){ //requires subscription via videoset (is in a videoset)
                    
                    
                                $access2 = $this->video_owned_by_user($value, $userid, $debug);
                    
                                if ($access2 === false){ //in videoset, not owned by user
                    
                                    //remove this video from the array
                                    unset($videoArray[$key]);
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has no access to video id ' . $value;
                    
                                    }
                    
                    
                                }else{
                    
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has access to video id ' . $value;
                    
                                    }
                    
                                    
                                    //user has access to this video via videoset.  despite no access via programme grant
                                }
                    
                            }else{ //is not in a videoset (but is contained within a programme)
                    
                                if ($debug){
                    
                                    echo 'video id ' . $value . ' requires a programme subscription and is not covered by a videoset';
                                    echo 'video id ' . $value . ' removed from array';
                    
                                }
                    
                                unset($videoArray[$key]);
                    
                    
                            }
                    
                    
                    
                        }elseif ($access3 === true) {
                    
                            if ($debug){
                    
                                echo 'user id ' . $userid . ' has access to video id ' . $value . ' via a programme';
                                echo 'access granted';
                    
                           }
                    
                           
                    
                        }else{
                    
                            //not contained within a programme
                            //check if contained within a videoset
                            $access = $this->video_requires_subscription($value, $debug);
                    
                            if ($access){ //requires subscription via videoset (is in a videoset)
                    
                    
                                $access2 = $this->video_owned_by_user($value, $userid, $debug);
                    
                                if ($access2 === false){ //in videoset, not owned by user
                    
                                    //remove this video from the array
                                    unset($videoArray[$key]);
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has no access to video id ' . $value;
                    
                                    }
                    
                    
                                }else{
                    
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has access to video id ' . $value;
                    
                                    }
                    
                                    
                                    //user has access to this video via videoset.  despite no access via programme grant
                                }
                    
                            }else{
                    
                                //not in programme or videoset
                                
                    
                                if ($debug){
                    
                                    echo 'video ' . $value . ' is freely available';
                    
                                    echo 'user id ' . $userid . ' has access to video id ' . $value;
                    
                                }
                    
                            }
                    
                        }

                    
                    
                        
                    
                        //test user access
                    
                    
                    
                     } //end if null

                     if ($debug){


                        echo '<br/><br/><br/>';
                     }
                    
                    }
                    }else{
                    
                        if ($debug){
                    
                            echo 'all videos available as superuser';
                        }



                    }

                    if ($debug){
                    
                        echo '<br/><br/><br/>';

                        echo 'final array was';
                        print_r($videoArray);
                        echo '<br/><br/><br/>';
                    }

                    return $videoArray;

            
            //determine what is in the two array inputs from getVideos and getNavv2, if same fields ok if not make same

            //if $ is an asset

            //then easy to check access to the whole asset

            // then re

            



        }

        public function determineVideoAccessSingleVideo ($id, $superuser, $userid, $debug=false){

            //determine the context

            //returns array of videos


                //REMOVE ONCE WORKING

                //$superuser = 1;

                //use all approach to browsing the site

                if ($superuser == '0'){

                    //GO THROUGH THE VIDEOS AND REMOVE ANY THAT THE USER HAS NO ACCESS TO

                    if ($debug){
                    
                        echo 'user id ' . $userid . ' is  not a superuser';
                        echo '<br/>checking videoArray';
                        print_r($videoArray);
                        echo '<br/><br/>';
                      

            
                   }
                    
                    
                    
                        //does it require subscription?
                    
                        $array_key = $key;

                        //is it an asset and contained withiin

                        $access4 = $this->video_owned_by_user($id, $userid, $debug); //if true access granted //if false check further

                        if ($access4 === true){

                            //grant access

                            if ($debug){
                    
                                echo 'is contained within an asset and user has access, so access granted';
                                echo '<br/><br/>';
                              
        
                    
                           }
                           return true;

                        }elseif ($access4 === false){

                            //deny access since this is an asset with no access

                            if ($debug){
                    
                                echo 'is contained within an asset and user has NO access to those assets, therefore access denied on asset basis';
                                echo '<br/><br/>';
                            
                            //WHAT ABOUT IF THE USER ALSO OWNS A PROGRAMME WHICH GIVES ACCESS BUT DOES NOT OWN THIS ASSET
                    
                           }

                           $access3check = $this->checkVideoProgrammeAspect($id, $userid, $debug);

                           if ($access3check === false){  //make sure that the user gets access via programme if available

                           return false;

                           }

                        }elseif ($access4 === null){

                            if ($debug){
                    
                                echo 'is NOT an asset';
                                echo '<br/><br/>';
                              
        
                    
                           }
                    
                        //check there is no access via a programme
                    
                        $access3 = $this->checkVideoProgrammeAspect($id, $userid, $debug);
                    
                        if ($access3 === false){ //contained within a programme and no access to this programme
                    
                    
                            if ($debug){
                                echo 'video id ' . $id . ' is contained within a programme <br/>';
                                echo 'user id ' . $userid . ' has no access to video id ' . $id . ' via a programme';
                                echo 'now checking access via videoset';
                    
                           }
                    
                           $access = $this->video_requires_subscription($id, $debug);
                    
                            if ($access){ //requires subscription via videoset (is in a videoset)
                    
                    
                                $access2 = $this->video_owned_by_user($id, $userid, $debug);
                    
                                if ($access2 === false){ //in videoset, not owned by user
                    
                                    //remove this video from the array
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has no access to video id ' . $id;
                    
                                    }

                                    return false;
                    
                    
                                }else{
                    
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has access to video id ' . $id . 'due to a videoset priveledge';
                    
                                    }

                                    return true;
                    
                                    
                                    //user has access to this video via videoset.  despite no access via programme grant
                                }
                    
                            }else{ //is not in a videoset (but is contained within a programme)
                    
                                if ($debug){
                    
                                    echo 'video id ' . $id . ' requires a programme subscription and is not covered by a videoset';
                                    echo 'video id ' . $id . ' access denied';
                    
                                }
                    
                                //unset($videoArray[$key]);
                                return false;
                    
                    
                            }
                    
                    
                    
                        }elseif ($access3 === true) {
                    
                            if ($debug){
                    
                                echo 'user id ' . $userid . ' has access to video id ' . $id . ' via a programme';
                                echo 'access granted';
                    
                           }

                           return true;
                    
                           
                    
                        }else{
                    
                            //not contained within a programme
                            //check if contained within a videoset
                            $access = $this->video_requires_subscription($id, $debug);
                    
                            if ($access){ //requires subscription via videoset (is in a videoset)
                    
                    
                                $access2 = $this->video_owned_by_user($id, $userid, $debug);
                    
                                if ($access2 === false){ //in videoset, not owned by user
                    
                                    //remove this video from the array
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has no access to video id ' . $id;
                    
                                    }

                                    return false;
                    
                    
                                }else{
                    
                                    if ($debug){
                    
                                        echo 'user id ' . $userid . ' has access to video id ' . $id;
                    
                                    }

                                    return true;
                    
                                    
                                    //user has access to this video via videoset.  despite no access via programme grant
                                }
                    
                            }else{
                    
                                //not in programme or videoset
                                
                    
                                if ($debug){
                    
                                    echo 'video ' . $id . ' is freely available';
                    
                                    echo 'user id ' . $userid . ' has access to video id ' . $id;
                    
                                }

                                return true;
                    
                            }
                    
                        }

                    
                    
                        
                    
                        //test user access
                    
                    
                    
                     } //end if null

                     if ($debug){


                        echo '<br/><br/><br/>';
                     }
                    
                    
                    }else{
                    
                        if ($debug){
                    
                            echo 'all videos available as superuser';
                        }

                        return true;



                    }

                  
            
            //determine what is in the two array inputs from getVideos and getNavv2, if same fields ok if not make same

            //if $browsing is an asset

            //then easy to check access to the whole asset

            // then re

            



        }

        function nestedToSingle(array $array)
{
    $singleDimArray = [];

    foreach ($array as $item) {

        if (is_array($item)) {
            $singleDimArray = array_merge($singleDimArray, nestedToSingle($item));

        } else {
            $singleDimArray[] = $item;
        }
    }

    return $singleDimArray;
}

        public function getAccessVideo ($id, $debug=false){


            //check prior that user does not have access and that acess is required to access this video

            $asset_array = $this->which_assets_contain_video($id);

            $programmesArray = $this->programmeView->getProgrammeVideo($id);

            $assetArray = array();

            $x = 0;



            if ($programmesArray != false){

                //must be a programme


                if ($debug){
        
                    echo 'video ' . $id . ' is not contained within an asset';
                    echo 'it is contained within a programme';
                }

                $programmesArray = $this->programmeView->getProgrammeVideo($id);


                foreach ($programmesArray as $key=>$value){

                    $assetArray[$x] = $this->returnAssetIDProgrammev2($value);

                    $x++;


                }

                //$assetArray2 = $this->nestedToSingle($assetArray);



                if ($debug){
                print_r($programmesArray);
                print_r($assetArray);

                }

               //return $assetArray;
        
                //return false;
        
                
        
            }
            
                if ($asset_array != false){

        
                if ($debug){
        
                    echo 'video ' . $id . ' is within assets <br>';
                    print_r($asset_array);
                }

                //$higherArray = array();

                foreach ($asset_array as $key2=>$value2){

                    $assetArray[$x] = [$x => $value2];

                    $x++;


                }

        
                //return true;
            }

            //before returning check that these are advertised
            return $assetArray;





        }

        public function getVideosTag($tagid){

            $q = "SELECT a.`id`
            FROM `video` as a 
            INNER JOIN `chapter` as b ON a.`id` = b.`video_id` 
            INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
            INNER JOIN `tags` as d ON d.`id` = c.`tags_id` 
            WHERE d.`id` = $tagid
            GROUP BY a.`id` ORDER BY a.`name` ASC";
                

            //echo $q;
                //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['id'];
                    $x++;
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

    
    
        }

        public function getVideosTagCategory($tagCategory_id){

            $q = "SELECT a.`id`
            FROM `video` as a 
            INNER JOIN `chapter` as b ON a.`id` = b.`video_id` 
            INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
            INNER JOIN `tags` as d ON d.`id` = c.`tags_id`
            INNER JOIN `tagCategories` as e on d.`tagCategories_id` = e.`id`
            WHERE e.`id` = '$tagCategory_id'
            GROUP BY a.`id` ORDER BY a.`name` ASC";
                

            //echo $q;
                //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['id'];
                    $x++;
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

    
    
        }


        public function getActiveVideosTagCategory($tagCategory_id){

            $q = "SELECT a.`id`
            FROM `video` as a 
            INNER JOIN `chapter` as b ON a.`id` = b.`video_id` 
            INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
            INNER JOIN `tags` as d ON d.`id` = c.`tags_id`
            INNER JOIN `tagCategories` as e on d.`tagCategories_id` = e.`id`
            WHERE (e.`id` = '$tagCategory_id') AND (a.`active` = '1' OR a.`active` = '3')
            GROUP BY a.`id` ORDER BY a.`name` ASC";
                

            //echo $q;
                //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['id'];
                    $x++;
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

    
    
        }

        public function getVideosSuperCategory($superCategory){

            $q = "SELECT a.`id`
            FROM `video` as a 
            WHERE a.`superCategory` = $superCategory
            ORDER BY a.`name` ASC";
                

            //echo $q;
                //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['id'];
                    $x++;
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

    
    
        }

        public function getVideosSelectedTagSuperCategory($tagid, $superCategory, $debug){

            $q = "SELECT a.`id`
            FROM `video` as a 
            INNER JOIN `chapter` as b ON a.`id` = b.`video_id` 
            INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` 
            INNER JOIN `tags` as d ON d.`id` = c.`tags_id` 
            WHERE d.`id` = $tagid AND a.`superCategory` = $superCategory
            GROUP BY a.`id` ORDER BY a.`name` ASC";
                
if ($debug){
            echo $q;

}
                //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['id'];
                    $x++;
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

    
    
        }

        public function getVideoSuperCategory($videoid, $debug=false){

            $q = "SELECT a.`superCategory`
            FROM `video` as a 
            WHERE a.`id` = $videoid";
                
             //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = false;
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows == 1) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn = $row['superCategory'];
                    
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

        }


        public function getTagsPage($pageid, $debug=false){

            $q = "SELECT a.`tagCategories_id`
            FROM `pagesTagCategory` as a 
            WHERE a.`pages_id` = $pageid
            ORDER BY a.`tagCategories_id` ASC";
                
if ($debug){
            echo $q;

}
                //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['tagCategories_id'];
                    $x++;
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

    
    
        }

        public function getVideosPage($pageid, $debug=false){

            $q = "SELECT a.`video_id`
            FROM `pagesVideo` as a 
            WHERE a.`pages_id` = $pageid
            ORDER BY CAST(a.`page_order` AS SIGNED) ASC";
                
if ($debug){
            echo $q;

}
                //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn[$x] = $row['video_id'];
                    $x++;
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

    
    
        }


        public function getPageType($pageid, $debug=false){

            $q = "SELECT a.`simple`
            FROM `pages` as a 
            WHERE a.`id` = $pageid
            LIMIT 1";
                
            if ($debug){
                
                echo $q;

            }
        
            //$q = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;
                
                
              

                $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();

            if ($nRows > 0) {

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
        
                    $rowReturn = $row['id'];
                    //$x++;
 

                    
        
        
                }
                return $rowReturn;

            } else {
                

                return false;
            }

    
    
        }


    public function getErroneousSubscriptionUsers(){


        $q = "SELECT `user_id`, `start_date` FROM `subscriptions` WHERE `asset_id`='14' AND `active` = '1' AND `start_date` > '2021-03-25'";

        //echo $q . '<br><br>';



        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[$x] = $row['user_id'];
                $x++;

            }

            return $rowReturn;

        } else {
            

            return false;
        }

    

    }

    public function getMembershipStatusAssetid($assetid){


        if ($assetid == '4' || $assetid == '5' || $assetid == '6'){

            return 1;
        }elseif ($assetid == '18' || $assetid == '19' || $assetid == '20'){

            return 2;
        }else{

            return 99;
        }


    }
    public function checkAssetToken($asset_id, $token, $debug=false){


        //does the token exist and match this asset

        $q = "SELECT `id` FROM `token` WHERE `asset_id` LIKE '$asset_id' AND `cipher` LIKE '$token' AND CAST(`remaining` AS UNSIGNED) > 0";

        
        if ($debug){

            echo 'query for checkAssetToken was <br/>';
            echo $q . '<br><br>';

        }



        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[$x] = $row['id'];
                $x++;

            }

            //return $rowReturn;
            return true;

        } else {
            

            return false;
        }



    }

    public function checkTokensRemainingAsset($asset_id, $debug=false){


        //does the token exist and match this asset

        $q = "SELECT `id` FROM `token` WHERE `asset_id` LIKE '$asset_id' AND CAST(`remaining` AS UNSIGNED) > 0";

        
        if ($debug){

            echo 'query for checkTokensRemainingAsset was <br/>';
            echo $q . '<br><br>';

        }



        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[$x] = $row['id'];
                $x++;

            }

            //return $rowReturn;
            return true;

        } else {
            

            return false;
        }


    }

    public function getTokenid($asset_id, $debug=false){


        //does the token exist and match this asset

        $q = "SELECT `id` FROM `token` WHERE `asset_id` LIKE '$asset_id'";

        
        if ($debug){

            echo 'query for getTokenid was <br/>';
            echo $q . '<br><br>';

        }



        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows == 1) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn = $row['id'];
                //$x++;

            }

            //return $rowReturn;
            return $rowReturn;

        } else {
            

            return false;
        }



    }

    


    public function returnAdvertisedAssets($asset_type, $debug=false){


        $q = "Select `id`, `name` FROM `assets_paid` WHERE (`asset_type` = '$asset_type') AND (`advertise_for_purchase` IS NULL OR `advertise_for_purchase` = '1')";

        
    
    
    if ($debug){
        echo $q . '<br><br>';
    
    }
    
    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    
    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = ['id'=>$row['id'], 'name'=>$row['name']];
            $x++;
    
    
        }
    
        if ($debug){
    
            print_r($rowReturn);
        }
    
        return $rowReturn;
    
    } else {
        
    
        if ($debug){
    
            echo 'no advertised courses in this ('. $asset_type.  ') category are subscribable';
        }
    
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