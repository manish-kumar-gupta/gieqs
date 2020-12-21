<?php

//require '../../includes/config.inc.php';	

$url =  "{$_SERVER['REQUEST_URI']}";
                    $highlightComplex = preg_match (  '/complex/' ,  $url);
                    $highlightProgram = preg_match (  '/program/' ,  $url);
                    $highlightPlenary = preg_match (  '/plenary/' ,  $url);
                    $highlightNursing = preg_match (  '/nursing/' ,  $url);
                  
         


?>


<nav class="mt-2 navbar navbar-horizontal navbar-expand-lg bg-gieqsGold d-none"  style="z-index: 1 !important;">
    <div class="container text-dark">
        <a class="navbar-brand"><?php echo 'Tag Navigation';?>
        </a>
        <button class="navbar-toggler text-dark" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">



            
                <?php
                    
                ?>
                <li class="nav-item">
                   <a class="nav-link nav-link-icon exitTagNav"
                       >

                       <span class="nav-link-inner--text ">Polypectomy Tutor</span>
                   </a>
               </li>
                                           <li class="nav-item">
                   
                   <a class="nav-link nav-link-icon"
                       >
<!--                        <span class="badge badge-pill text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">LEVEL 4</span>
 -->                       <span class="nav-link-inner--text text-bold">Tag Name</span></a>
                     
                   
                   
                   


                          


                               <!-- <span class="nav-link-inner--text ">Complex</span> -->
                           
               </li>

               <li class="nav-item">
                   <a class="nav-link nav-link-icon exitTagNav"
                       >

                       <span class="nav-link-inner--text "><i class="fas fa-arrow-left mr-2"></i> Previous</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link nav-link-icon exitTagNav"
                       >

                       <span class="nav-link-inner--text ">Next<i class="fas fa-arrow-right ml-2"></i></span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link nav-link-icon exitTagNav"
                       >

                       <span class="nav-link-inner--text "><i class="fas fa-times cursor-pointer"></i></span>
                   </a>
               </li>
                <?php
                    
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