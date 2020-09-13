<?php 

$openaccess = 0;

$requiredUserLevel = 2;

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = false;

function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');




/* spl_autoload_unregister ('class_loader');

//$users = new users; //must be users from GIEQs
require(BASE_URI .'/assets/scripts/classes/users.class.php'); */
$users = new users;

/* spl_autoload_register ('class_loader'); */

$general = new general;
//$usersCommentsVideo = new usersCommentsVideo;
//$usersSocial = new usersSocial;
$usersTagging = new usersTagging;


$data = json_decode(file_get_contents('php://input'), true);

$videoid = $data['videoid'];
$taggerid = $data['taggerid'];


if ($debug){
print_r($videoid);
print_r($taggerid);
echo '$userid is ' . $userid;
}



if ($data){
    ?>

    <div class="modal-content mc1 bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                        <div class="modal-header">
                            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                <div>
                                    <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                        <img src="<?php echo BASE_URL?>/assets/img/icons/gieqsicon.png">
                                    </div>
                                </div>
                                <div class="text-left">
                                    <h5 class="mb-0">Moderation Tools</h5>
                                    <span class="mb-0"></span>
                                </div>

                            </div>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <div>
                                        <h6 class="mb-0"></h6>
                                        <span id = "modalMessageArea" class="mb-0"></span>

                                    </div>
                                    <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
    <span id="topModalSuccess"></span>
</div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="faculty-body">
                                
                                <table id="#actions-table" class="mb-3">

                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Inviting User</th>
                                            <th>Action</th>
                                            <th>Expires</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1/7/2019</td>
                                            <td>David Tate</td>
                                            <td>David Tate</td>
                                            <td>Invitation</td>
                                            <td>16/7/2020</td>
                                            
                                        </tr>
                                    </tbody>

                                </table>
                                <hr>
                                <p>Video currently tag-locked to user: </p>
                                <hr>
                                <p class="h6">Current Allocation</p>
                                <p>Video tagging due on </p>
                                <span>Remind User</span><button class="btn btn-sm bg-gieqsGold text-dark p-2 m-2 ml-4 send-reminder-mail">Send Reminder Mail</button>
                               
                                <form id="review-form" class="mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Generate Review Mail</label>
                                        <textarea name="review-message" class="form-control" placeholder="Message to user"
                                          rows="3"></textarea>
                                        <small class="form-text text-muted mt-2"></small>

                                        <button class="btn btn-sm bg-gieqsGold text-dark p-2 m-2 ml-0 send-review-mail">Send Review Mail</button>

                                        </div>
                                        </form>
                                
                                        <hr>

                                        <p class="h6">Approval</p>

                                        <button class="btn btn-sm bg-success text-dark p-2 m-2 ml-0 approve-video">Approve Video</button>
                                        <button class="btn btn-sm bg-danger text-dark p-2 m-2 ml-0 deny-video">Remove Video from View</button>


                                        <hr>

                                <p class="h6">Start / Change Allocation</p>

                                
                                <form id="faculty-form">
                                    <div class="form-group">
                                    <!-- EDIT -->

                                    
                                    <label for="user_id">Select User</label>
                                        <div class="input-group mb-3">
                                            <select id="user_id" type="text" data-toggle="select" class="form-control" name="user_id">
                                                <option value="" selected disabled hidden>please select a user</option>

                                                <?php echo $userFunctions->generateUserNames();?>
                                            </select>
                                        </div>


                                        

                                        

                                        

                                        <button class="btn btn-sm bg-success text-dark p-2 m-2 ml-0 invite-new-tagger">Invite New Tagger</button>


                                    </div>
                                </form>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Unauthorised Access Prohibited</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>

                    </div>
            </div>


 <?php
}else{
    if ($debug){
        echo 'Missing data';
       }
    
    exit();
}

$users->endusers();
