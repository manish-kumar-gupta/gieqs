<?php 

if ($userid){
if ($isSuperuser == 1){

  $fullAccess = true;
  $proMember = false;

}elseif ($sitewide_status == 2){ //PRO subscription

  $fullAccess = true;
  $proMember = true;

}else{

  $fullAccess = false;
  $proMember = false;
}
}else{

  $fullAccess = false;
  $proMember = false;
}

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
        $assets_paid = new assets_paid;

?>


<li class="nav-item dropdown mega-dropdown dropdown-animate" data-toggle="hover"
    style="position:static; font-size:1.0rem;">
    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">Courses & Pro Content</a>





    <div class="dropdown-menu mega-menu v-2 z-depth-1 pink darken-4 py-4 px-3 show" style="font-size:1.0rem;"
        aria-labelledby="navbarDropdownMenuLink2">

        <div class="row">
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Upcoming Courses <br />(Register Now)
                </h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($coursesAdvertised as $key=>$value){ 
                      
                      
                      $programme_array = $assetManager->returnProgrammesAsset($value['id']);

                      $programme_defined = $programme_array[0];
                      //echo $programme_defined;

                      $access = [0=>['id'=>$programme_defined],];

                      

                      $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

                      $access2 = $sessionView->getStartEndProgrammes($access1, $debug);


                  
                        $programme->Load_from_key($programme_defined);
                        $serverTimeZone = new DateTimeZone('Europe/Brussels');
                        $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

                        $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");

                        //echo $humanReadableProgrammeDate;

                        $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);

                        $humanReadableStartTime = date_format($startTime, "H:i"); 

                        //var_dump($startTime);


                        if ($startTime > new DateTime('now')){

                          ?>

                    <li>

                        <a class="menu-item mt-2"
                            href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=<?php echo $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name']; ?></a><br /><span
                            class="text-muted small"><?php echo $humanReadableProgrammeDate . ' ' . $humanReadableStartTime . ' CET'; ?></span>

                    </li>

                    <?php 
                        }
                      
                      
                      
                      ?>


                    <?php } ?>

                </ul>
            </div>
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Colonoscopy Courses <br />(Immediate Access)
                </h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($coursesAdvertised as $key=>$value){ 
                      
                      //get the asset category

                      $assets_paid->Load_from_key($value['id']);
                      //var_dump($assets_paid);
                      $supercategory = null;
                      $supercategory = $assets_paid->getsupercategory();

                      if ($supercategory == '1'){
                      
                      $programme_array = $assetManager->returnProgrammesAsset($value['id']);

                      $programme_defined = $programme_array[0];
                      //echo $programme_defined;

                      $access = [0=>['id'=>$programme_defined],];

                      

                      $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

                      $access2 = $sessionView->getStartEndProgrammes($access1, $debug);


                  
                        $programme->Load_from_key($programme_defined);
                        $serverTimeZone = new DateTimeZone('Europe/Brussels');
                        $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

                        $humanReadableProgrammeDate = date_format($programmeDate, "jS F Y");

                        //echo $humanReadableProgrammeDate;

                        $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);

                        $humanReadableStartTime = date_format($startTime, "H:i"); 

                        //var_dump($startTime);


                        if ($startTime < new DateTime('now')){

                          ?>

                    <li class="mt-2">

                        <a class="menu-item"
                            href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=<?php echo $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name']; ?></a><br /><span
                            class="text-muted small"><?php echo $humanReadableProgrammeDate; ?></span>

                    </li>

                    <?php 
                        }
                      
                      }
                      
                      ?>


                    <?php } ?>

                </ul>
            </div>
            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Pro Content Packs <br />(Immediate
                    Access)</h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($learningPacksAdvertised as $key=>$value){   ?>

                    <li class="mt-2">

                        <a class="menu-item"
                            href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=<?php echo $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name']; ?></a>

                    </li>

                    <?php } ?>

                </ul>
            </div>

            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Past Symposia <br />(Immediate Access)
                </h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($symposiaAdvertised as $key=>$value){   ?>

                    <li class="mt-2">

                        <a class="menu-item"
                            href="<?php echo BASE_URL;?>/pages/program/program_generic.php?id=<?php echo $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name']; ?></a>

                    </li>

                    <?php } ?>

                </ul>
            </div>
        </div>
        <div class="row my-3">


            <div class="col-md-6 col-xl-3 sub-menu mb-md-0 mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Design</h6>
                <ul class="list-unstyled">
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Excepteur sint occaecat
                        </a>
                    </li>
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Sunt in culpa qui officia
                        </a>
                    </li>
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Sed ut perspiciatis unde omnis iste natus error
                        </a>
                    </li>
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Mollit anim id est laborum
                        </a>
                    </li>
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Accusantium doloremque laudantium
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-xl-3 sub-menu mb-0">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Symposia</h6>
                <ul class="list-unstyled">
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Totam rem aperiam eaque
                        </a>
                    </li>
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Beatae vitae dicta sun
                        </a>
                    </li>
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Quae ab illo inventore veritatis et quasi
                            architecto
                        </a>
                    </li>
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Nemo enim ipsam voluptatem
                        </a>
                    </li>
                    <li>
                        <a class="menu-item pl-0 waves-effect waves-light" href="#!">
                            <i class="fas fa-caret-right pl-1 pr-3"></i>Neque porro quisquam est
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row text-right py-2">
            <?php   if ($userid) {

$upgradeURL = BASE_URL . '/pages/learning/upgrade.php';

}else{

$upgradeURL = BASE_URL . '/login?destination=subscriptionoptions';


}



if (($proMember === false) && ($fullAccess === false)){?>

            <span style="background-color:rgb(238, 194, 120);" class="dropdown-header text-dark">You could gain access
                to ALL of these courses with a GIEQs Pro subscription. <a href="<?php echo $upgradeURL;?>">Find out
                    more.</a></span>


            <?php                   } ?>
        </div>
    </div>

</li>