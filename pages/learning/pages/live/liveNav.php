<?php

//require '../../includes/config.inc.php';		
         


?>


<nav class="mt-10 navbar navbar-horizontal navbar-expand-lg navbar-dark gieqsGold">
    <div class="container">
        <a class="navbar-brand" style="z-index: -1 !important;"><?php echo $livepage;?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">


        <?php if ($liveTest){?>
            <li class="nav-item">
            <span class="nav-link-inner--text "><?php echo 'test ' . date_format($currentTime,"d/m/Y H:i");?></span>
        </li>
            <?php
            }
            ?>

           
                <li class="nav-item">

                    <?php  if ($currentTime > $desiredTimeWednesdayFrom && $currentTime < $desiredTimeWednesdayTo){
                        ?>

                    <a class="nav-link nav-link-icon"
                        href="<?php echo BASE_URL;?>/pages/learning/pages/live/plenary.php">

                        <?php
                    }elseif($currentTime > $desiredTimeThursdayFrom && $currentTime < $desiredTimeThursdayTo){

                        ?>

                        <a class="nav-link nav-link-icon"
                            href="<?php echo BASE_URL;?>/pages/learning/pages/live/plenary-thursday.php">

                            <?php   
                    }else{
                    
                    ?>
                    <a class="nav-link nav-link-icon disabled"
                            href="#">


                    <?php
                    }

?>


                            <span class="nav-link-inner--text ">Plenary</span>
                        </a>
                </li>
                <li class="nav-item">
                    <?php  if ($currentTime > $desiredTimeWednesdayFrom && $currentTime < $desiredTimeWednesdayTo){
                        ?>
                    <a class="nav-link nav-link-icon"
                        href="<?php echo BASE_URL;?>/pages/learning/pages/live/complex.php">
                        <?php
                    }elseif($currentTime > $desiredTimeThursdayFrom && $currentTime < $desiredTimeThursdayTo){

                        ?>

                        <a class="nav-link nav-link-icon"
                            href="<?php echo BASE_URL;?>/pages/learning/pages/live/complex-thursday.php">

                            <?php   
                    }else{
                    
                    ?>
                    <a class="nav-link nav-link-icon disabled"
                            href="#">


                    <?php
                    }

?>


                            <span class="nav-link-inner--text ">Complex</span>
                        </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon"
                        href="<?php echo BASE_URL;?>/pages/learning/pages/live/nursing.php">

                        <span class="nav-link-inner--text ">Nursing</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank"
                        href="<?php echo BASE_URL;?>/pages/learning/pages/live/programLive.php">

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
                </li>

            </ul>

        </div>
    </div>
</nav>