<li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Get Pro Content</a>


                    
                    <div class="dropdown-menu  dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">Upcoming Courses (Register Now)</span>
                    <?php foreach($coursesAdvertised as $key=>$value){ 
                      
                      
                      $programme_array = $assetManager->returnProgrammesAsset($asset_id_pagewrite);

                      $programme_defined = $programme_array[0];

                        $access = [0=>['id'=>$programme_defined],];

                        $access1 = null;
                            
                        $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

                        $access2 = null;

                        $access2 = $sessionView->getStartEndProgrammes($access1, $debug);

                        $programme->Load_from_key($programme_defined);
                        $serverTimeZone = new DateTimeZone('Europe/Brussels');
                        $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

                        $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");

                        $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);

                        if ($startTime > new DateTime('now')){

                          ?>

                          <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=<?php echo $value['id'] ?>"><i class="fas fa-columns"></i><?php echo $value['name']; ?></a>

                          <?php 
                        }
                      
                      
                      
                      ?>


                    <?php } ?>

                    
                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">Past Virtual-Live Courses (Available Immediately)</span>
                    <?php foreach($coursesAdvertised as $key=>$value){ 
                      
                      
                      $programme_array = $assetManager->returnProgrammesAsset($asset_id_pagewrite);

                      $programme_defined = $programme_array[0];

                        $access = [0=>['id'=>$programme_defined],];

                        $access1 = null;
                            
                        $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

                        $access2 = null;

                        $access2 = $sessionView->getStartEndProgrammes($access1, $debug);

                        $programme->Load_from_key($programme_defined);
                        $serverTimeZone = new DateTimeZone('Europe/Brussels');
                        $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

                        $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");

                        $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);

                        if ($startTime < new DateTime('now')){

                          ?>

                          <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=<?php echo $value['id'] ?>"><i class="fas fa-columns"></i><?php echo $value['name']; ?></a>

                          <?php 
                        }?>


                    <?php } ?>
                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">Premium Content Packs (Available Immediately)</span>
                    <?php foreach($learningPacksAdvertised as $key=>$value){?>
                      <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=<?php echo $value['id'] ?>"><i class="fas fa-columns"></i><?php echo $value['name']; ?></a>


                    <?php } ?>

                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">Past Symposia (Available Immediately)</span>
                    <?php
                    
                    foreach($symposiaAdvertised as $key=>$value){ ?>
                      <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=<?php echo $value['id'] ?>"><i class="fas fa-columns"></i><?php echo $value['name']; ?></a>


                    <?php } ?>




<!--                     <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=7" disabled><i class="fas fa-columns"></i>Basic Colonoscopy Skills</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=8"><i class="fas fa-columns"></i>Train the Colonoscopy Trainers</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=11"><i class="fas fa-columns"></i>Polypectomy Upskilling Course</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_imaging.php"><i class="fas fa-columns"></i>Colorectal Polyp Imaging<span class="badge gieqsGold">
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_small_polypectomy.php"><i class="fas fa-columns"></i>Small and Intermediate Polypectomy Course</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=3"><i class="fas fa-columns"></i>GIEQs Edition I - Catch Up<span class="badge gieqsGold">

 -->
                                    <!-- New
                                    </span></a>      -->                
                    <!-- <div class="dropdown-divider"></div>
                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">GIEQs Faculty</span>
                    <a class="dropdown-item" href="<?php //echo BASE_URL;?>/pages/program/faculty_stable.php"><i class="fas fa-user"></i>Faculty</a>
                     -->
                    
                  </div>
                </li>