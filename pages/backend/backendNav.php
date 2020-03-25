<!-- Account navigation -->
<div class="d-flex">
              <a href="#" class="btn btn-icon btn-group-nav shadow btn-neutral">
                <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
                <span class="btn-inner--text d-none d-md-inline-block"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['surname'];?></span>
              </a>
              <div class="btn-group btn-group-nav shadow ml-auto" role="group" aria-label="Basic example">
                
              <div class="btn-group" role="group">
                  <button id="btn-group-listing" type="button" class="btn btn-neutral btn-icon rounded-right" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-list-ul"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Programme</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <h6 class="dropdown-header">Overview</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/programv2.php" target="_blank">Programme Overview</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/programv2editor.php" target="_blank">Programme Overview [editable]</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Session Planning</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/programFaculty.php">Faculty per program</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Individual Items</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/programmeEdit.php">Programmes</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/session.php">Sessions</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/faculty.php">Faculty</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/delegate.php">Delegates</a>
                    
                  </div>
                </div>
              
                <div class="btn-group" role="group">
                  <button id="btn-group-boards" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-chart-line"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Communication</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-boards">
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/backend.php">Overview</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/socialGenerator.php">Social contact</a>
                    <a class="dropdown-item" href="board-tasks.html">Tasks</a>
                    <a class="dropdown-item" href="board-connections.html">Connections</a>
                  </div>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-group-settings" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-sliders-h"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Account</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <span class="dropdown-header">My Profile</span>
                    <a class="dropdown-item" href="account-profile-public.html">Public profile</a>
                    <span class="dropdown-header">My profile</span>
                    <a class="dropdown-item" href="account-profile.html">Profile</a>
                    <a class="dropdown-item" href="account-settings.html">Settings</a>
                    <a class="dropdown-item" href="account-billing.html">Delegate</a>
                    <a class="dropdown-item" href="account-notifications.html">Faculty</a>
                  </div>
                </div>
                
              </div>
            </div>