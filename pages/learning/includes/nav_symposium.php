<?php



?>

<style>

@supports ((position: -webkit-sticky) or (position: sticky)) {

.sticky-top {
    position: -webkit-sticky !important;
    position: sticky !important;
    z-index: 1020;
    top: 0;
}
}

</style>

<nav class="mt-2 navbar navbar-horizontal navbar-expand-lg navbar-dark gieqsGold sticky-top" style="z-index: 1 !important;">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>/pages/learning/index.php"><?php echo 'Symposium.  Edition III';?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">


                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/concept.php" class="nav-link nav-link-icon">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[0];?> ">Concept</span>
                    </a>
                </li>


                
                <li class="nav-item">
                    <a <a href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=95" class="nav-link nav-link-icon cursor-pointer">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[1];?> ">Individual Registration</span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/symposium-group-registration.php" class="nav-link nav-link-icon cursor-pointer">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[2];?> ">Group Registration</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/program.php" class="nav-link nav-link-icon cursor-pointer">
                    <span class="nav-link-inner--text <?php echo $symposium_nav_active[3];?>">Programme</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/faculty.php" class="nav-link nav-link-icon cursor-pointer">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[4];?> ">Faculty</span>
                    </a>
                </li>
                <li class="nav-item">
                <a href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=95&action=register" class="btn btn-fill-gieqsGold btn-sm mx-2" role="button">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[5];?> ">Register Now!</span>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>