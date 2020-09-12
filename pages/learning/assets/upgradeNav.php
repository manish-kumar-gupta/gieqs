<?php

//require '../../includes/config.inc.php';	

$url =  "{$_SERVER['REQUEST_URI']}";
                    $highlightComplex = preg_match (  '/complex/' ,  $url);
                    $highlightProgram = preg_match (  '/program/' ,  $url);
                    $highlightPlenary = preg_match (  '/plenary/' ,  $url);
                    $highlightNursing = preg_match (  '/nursing/' ,  $url);
                  
         


?>


<nav class="mt-2 navbar navbar-horizontal navbar-expand-lg navbar-dark gieqsGold"  style="z-index: 1 !important;">
    <div class="container">
        <a class="navbar-brand"><?php echo 'GIEQs Online';?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">



            <?php  if ($currentUserLevel == '6'){
                        ?>
                
                <li class="nav-item">
                   
                    <a class="nav-link nav-link-icon">
                       
                        <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2">LEVEL 6</span>
                        <span class="nav-link-inner--text ">GIEQs Basic Member</span></a>
                      
                    
                    
                    


                           


                                <!-- <span class="nav-link-inner--text ">Complex</span> -->
                            
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo BASE_URL;?>/pages/learning/upgrade.php">

                        <span class="nav-link-inner--text ">You are missing out on key features.   <span class="gieqsGold">Upgrade now!</span></span>
                    </a>
                </li>
                <?php
            }else if ($currentUserLevel == 5){
                ?>
                                           <li class="nav-item">
                   
                   <a class="nav-link nav-link-icon" 
                       >
                       <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">LEVEL 5</span>
                       <span class="nav-link-inner--text ">GIEQs Standard Member</span></a>
                     
                   
                   
                   


                          


                               <!-- <span class="nav-link-inner--text ">Complex</span> -->
                           
               </li>

               <li class="nav-item">
                   <a class="nav-link nav-link-icon" href="<?php echo BASE_URL;?>/pages/learning/upgrade.php" class="nav-link-inner--text"
                       >

                       <span class="nav-link-inner--text">You are missing out on key features.  <span class="gieqsGold">Upgrade now!</span></span>
                   </a>
               </li>
                <?php
                    }else {
                ?>
                                           <li class="nav-item">
                   
                   <a class="nav-link nav-link-icon"
                       >
                       <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">LEVEL 4</span>
                       <span class="nav-link-inner--text ">GIEQs Pro Member</span></a>
                     
                   
                   
                   


                          


                               <!-- <span class="nav-link-inner--text ">Complex</span> -->
                           
               </li>

               <li class="nav-item">
                   <a class="nav-link nav-link-icon"
                       >

                       <span class="nav-link-inner--text ">Thanks for your support!</span>
                   </a>
               </li>
                <?php
                    }
                ?>
                <!-- <li class="nav-item">
                    <a class="nav-link nav-link-icon"
                        href="<?php //echo BASE_URL;?>/pages/learning/pages/live/nursing.php">

                        <span class="nav-link-inner--text ">Nursing</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank"
                        href="<?php //echo BASE_URL;?>/pages/learning/pages/live/programLive.php">

                        <span class="nav-link-inner--text ">Live Programme</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://facebook.com/gieqs">
                        <i class="fab fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Share</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://twitter.com/gieqs_symposium">
                        <i class="fab fa-twitter"></i>
                        <span class="nav-link-inner--text d-lg-none">Tweet</span>
                    </a>
                </li> -->

            </ul>

        </div>
    </div>
</nav>