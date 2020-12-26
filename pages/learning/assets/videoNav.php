<?php

//require '../../includes/config.inc.php';	

$url =  "{$_SERVER['REQUEST_URI']}";
                    $highlightComplex = preg_match (  '/complex/' ,  $url);
                    $highlightProgram = preg_match (  '/program/' ,  $url);
                    $highlightPlenary = preg_match (  '/plenary/' ,  $url);
                    $highlightNursing = preg_match (  '/nursing/' ,  $url);
                  
         


?>


<nav class="mt-2 navbar navbar-expand-lg navbar-dark bg-dark-dark sticky-top" style="z-index: 1 !important;">
    <div class="container">
        <a class="navbar-brand cursor-pointer" id="start_tour"><?php echo 'Video Navigation';?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
            <ul class="navbar-nav align-items-lg-left ml-lg-auto">

            <li class="nav-item">

                    <a  class="nav-link nav-link-icon gieqsGold" >

                        <span class="nav-link-inner--text ">tagName -- current Filtered Tag</span>
                    </a>
                </li>
</ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">

            <li class="nav-item">
                    <a  class="nav-link nav-link-icon" >

                        <span class="nav-link-inner--text "><-- Previous Video</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a  class="nav-link nav-link-icon" >

                        <span class="nav-link-inner--text ">x / y</span>
                    </a>
                </li>
            <li class="nav-item">
                    <a  class="nav-link nav-link-icon" >

                        <span class="nav-link-inner--text ">Next Video --></span>
                    </a>
                </li>

                <li class="nav-item dropdown-animate dropdown-submenu bg-dark-dark" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Navigation
                    </a>
                    <div class="dropdown-menu bg-dark-dark" aria-labelledby="navbarDropdown">
                        <a id="chapterNavTour" class="dropdown-item" data-toggle="collapse" href="#selectDropdown">

                            Toggle <span class="gieqsGold">Chapter</span> View
                        </a>
                        <a id="jumpTimeLine" class="dropdown-item cursor-pointer">Timeline
                        </a>

                        <div class="dropdown-divider"></div>
                        <a id="tourTagNav" class="dropdown-item cursor-pointer" data-toggle="collapse"
                            href="#collapseExample">

                            Toggle <span class="gieqsGold">Tag</span> Window View
                        </a>
                        <div class="dropdown-divider"></div>
                        <a id="jumpComments" class="dropdown-item cursor-pointer">


                            <span class="nav-link-inner--text ">Comments</span>
                        </a>
                        <a id="jumpReferences" class="dropdown-item cursor-pointer" data-toggle="collapse"
                            href="#collapseExample2">

                            <span class="nav-link-inner--text">References</span>
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown-animate dropdown-submenu bg-dark-dark" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Show Me Around!
                    </a>
                    <div class="dropdown-menu bg-dark-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item cursor-pointer showMeAround">

                            Overview Tour
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="showMeAroundLong dropdown-item cursor-pointer">Detailed Feature Tour
                        </a>



                    </div>
                </li>


                <!-- <li class="nav-item">
                    <a id="chapterNavTour" class="nav-link nav-link-icon" data-toggle="collapse" href="#selectDropdown">

                        <span class="nav-link-inner--text ">Show Chapters</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="tourTagNav" class="nav-link nav-link-icon" data-toggle="collapse" href="#collapseExample">

                        <span class="nav-link-inner--text ">Show Tags</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpTimeLine" class="nav-link nav-link-icon cursor-pointer">

                        <span class="nav-link-inner--text ">Timeline</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpComments" class="nav-link nav-link-icon cursor-pointer">


                        <span class="nav-link-inner--text ">Comments</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpReferences" class="nav-link nav-link-icon" data-toggle="collapse"
                        href="#collapseExample2">

                        <span class="nav-link-inner--text">References</span>
                    </a>
                </li> -->


                <!-- <li class="nav-item">
                   
                   <a class="nav-link nav-link-icon"
                       >
                       <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">LEVEL 4</span>
                       <span class="nav-link-inner--text ">GIEQs Pro Member</span></a>
                     
                   
                   
                   


                          


                                <span class="nav-link-inner--text ">Complex</span>
                           
               </li> -->
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