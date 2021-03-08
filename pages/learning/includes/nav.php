<!--Main Navbar-->
<?php

$debug = false;
$_SESSION['debug'] = false;
//error_reporting(E_ALL);

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/menu.class.php';
$menu = new menu;

require_once BASE_URI . '/assets/scripts/classes/navigation.class.php';
$navigation = new navigation;

require_once BASE_URI . '/assets/scripts/classes/headings.class.php';
$headings = new headings;

require_once BASE_URI . '/assets/scripts/classes/pages.class.php';
$pages = new pages;

require_once BASE_URI . '/assets/scripts/classes/navigationManager.class.php';
$navigationManager = new navigationManager;

//new class navigationManager

//query to get menus [if active]

$menus = $navigationManager->getActiveMenus();

if ($menus) {

    if ($debug) {

        print_r($menus);

    }

    ?>

<nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-dark bg-dark" id="navbar-main">
    <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="<?php echo BASE_URL; ?>/pages/learning/index.php">
            <img alt="Image placeholder" src="<?php echo BASE_URL; ?>/assets/img/brand/gieqs-online-logo.png"
                id="navbar-logo" style="height: 50px;">
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse"
            aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">

            <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo BASE_URL; ?>/pages/learning/index.php">Dashboard</a>
                </li>


                <?php

    foreach ($menus as $key => $value) {

        //load the class
        if ($menu->Return_row($value)) {

            $menu->Load_from_key($value);

            //show the first menu text

            ?>

                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?php echo $menu->gettitle(); ?></a>


                        <div class="dropdown-menu dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                        <span style="color: rgb(238, 194, 120);" class="h4 dropdown-header">Choose an <?php echo $menu->gettitle(); ?> Category</span>


          <?php

            //get navigation

            $navigations = $navigationManager->getActiveNavigations($value, false);


            foreach ($navigations as $key1 => $value1){


              

              if ($navigation->Return_row($value1)) {

              $navigation->Load_from_key($value1);

              ?>


                        
                        <!-- <span style="color: rgb(238, 194, 120);" class="dropdown-header"><?php //echo $navigation->gettitle(); ?></span> -->
                        <a class="dropdown-item dropdown-toggle cursor-pointer py-3 px-2" role="button" data-toggle="dropdown"
                            data-target="#dropdown<?php echo $navigation->getid();?>"><i class="fas fa-file-alt"></i><?php echo $navigation->gettitle(); ?></a>

                            <div id="dropdown<?php echo $navigation->getid();?>"
                            class="dropdown-menu dropdown-menu-xl delimiter-top p-4 bg-dark-light">
                            


                              <?php

                                //get th number of headers
                                //split in two
                                //divide between first and second column

   
                                $headers = $navigationManager->getHeadersNavigation($value1, false);

                                if ($debug){

                                  echo 'headers =';
                                  print_r($headers);

                                }

                                $headerCounter = 1;

                                foreach ($headers as $key2=>$value2){

                                    //count headers

                                    $count = count($headers);

                                    

                                    $halfCount = $count / 2;
                                    $halfCount = round($halfCount, 0, PHP_ROUND_HALF_UP) + 1;

                                    if ($headerCounter == 1){

                                        echo '<h4 mb-2>' . $navigation->gettitle() . '</h4>';
                                        echo '<div class="row">';
                                        
                                        echo '<div class="col-sm-6">';
                                        //first time
                                    }

                                    if ($headerCounter == $halfCount){

                                        //left side, do only once
                                        echo '</div>';
                                        echo '<div class="col-sm-6">';

                                    }

                                    if ($debug){

                                        echo 'total header count is ' . $count;
                                        echo '<br/>halfCount is ' . $halfCount;
                                        echo '<br/>header counter is at' . $headerCounter;
                                    }

                                    

                                  $headings->Load_from_key($value2);
                                  
?>



                                  <a href="#" style="color: rgb(238, 194, 120);"><?php echo $headings->getname(); ?></a>
<?php
                                  $pagesDisplay = $navigationManager->getPagesHeadings($value2, false);

                                  foreach ($pagesDisplay as $key3=>$value3){

                                      $pages->Load_from_key($value3);

?>
                                    <a class="dropdown-item"
                                        href="<?php echo BASE_URL; ?>/pages/learning/pages/general/show_subscription.php?page_id=<?php echo $pages->getid(); ?>"><?php echo $pages->gettitle(); ?></a>
                            



                                    <?php

                                    

                                }
?>


                                <a href="#" class="dropdown-item" style="color: rgb(238, 194, 120);"></a>

                                
<?php

                                    if ($headerCounter == $count){

                                        echo '</div>';
                                        echo '</div>';
                                    }

                                    $headerCounter++;

                                }

                                
                            
                             ?>


                                    






                               
                        </div>

                        <div class="dropdown-divider my-0"></div>


              


              <?php
              }else{

                if ($debug){

                  echo 'Navigation load failure';

                }

              }




            }
?>

</div>






                </li>

                <?php

        } else { //if menu class not loaded from value

            if ($debug) {

                echo 'error loading the menu from class';

            }

        }

    }
    ?>


           

   <!-- Subscriptions Menu -->
   <?php if ($assetManager->doesUserHaveSubscriptionMenu($userid, false)) { //if user has a subscription to assets type 2 3 or 4?>
                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Subscriptions</a>

                    <!-- pages which have a pattern depending on programme or video collection -->

                    <!-- get the subscriptions with headers to match

                        headers from type
                         -->

                    <div class="dropdown-menu  dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                        <?php

    $headers = $assetManager->getHeadersNavSubscriptions($userid, false);

    foreach ($headers as $key => $value) {
        ?>

                        <!-- print the header -->

                        <span style="color: rgb(238, 194, 120);"
                            class="dropdown-header"><?php echo $value['asset_type']; ?></span>


                        <?php

        $courses = $assetManager->getMenuItems($userid, $value['id'], false);

        foreach ($courses as $key2 => $value2) {

            ?>
                        <!-- print the contained courses -->
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/pages/general/show_subscription.php?assetid=<?php echo $value2['id']; ?>"><i
                                class="fas fa-tasks"></i><?php echo $value2['name']; ?></a>

                        <?php }?>



                        <?php }?>



                    </div>
                </li>
                <?php }?>

                <?php
if (isset($_SESSION['user_id']) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk') && ($_SESSION['access_level'] == '1' || $_SESSION['access_level'] == '2')) {
    ?>
                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Creator</a>



                    <div class="dropdown-menu  dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                        <?php if ($isSuperuser) {?>

                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">Moderation</span>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/learning/pages/management.php"><i
                                class="fas fa-columns"></i>Send Out New Invites</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/learning/pages/outstanding.php"><i
                                class="fas fa-columns"></i>Manage Tagging in Progress</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/learning/pages/moderation.php"><i
                                class="fas fa-columns"></i>Moderate Completed Tagging</a>

                        <div class="dropdown-divider"></div>

                        <?php }?>



                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">My Tagging</span>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/learning/pages/myTagging.php"><i
                                class="fas fa-columns"></i>View my Tagging Tasks</a>

                        <?php if ($isSuperuser) {?>
                        <div class="dropdown-divider"></div>
                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">Video</span>
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/scripts/videoUploadForm.php"><i
                                class="fas fa-columns"></i>New Video</a>
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/videoTable.php"><i
                                class="fas fa-columns"></i>Video Table</a>

                        <div class="dropdown-divider"></div>
                        <?php }?>

                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">Tags</span>
                        <?php if ($isSuperuser) {?>
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/tagsForm.php"><i
                                class="fas fa-columns"></i>New Tag</a>
                        <?php }?>
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/tagsTable.php"><i
                                class="fas fa-columns"></i>Tag / Reference Table</a>


                        <div class="dropdown-divider"></div>

                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">Tag Categories</span>
                        <?php if ($isSuperuser) {?>
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/tagCategoriesForm.php"><i
                                class="fas fa-columns"></i>New Tag Category</a>
                        <?php }?>
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/tagCategoriesTable.php"><i
                                class="fas fa-columns"></i>Tag Category Table</a>

                        <div class="dropdown-divider"></div>
                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">References</span>
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/referencesForm.php"><i
                                class="fas fa-columns"></i>New Reference</a>
                        <?php if ($isSuperuser) {?>
                        <div class="dropdown-divider"></div>
                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">Maintenance</span>

                        <a class="dropdown-item"
                            href="<?php echo BASE_URL; ?>/pages/learning/scripts/getThumbnailsVideo.php"><i
                                class="fas fa-user"></i>Update / generate Thumbnails</a>
                        <?php }?>


                    </div>
                </li>

                <?php
}?>



                <!-- Backend menu for learning-->

                <?php

if (isset($_SESSION['user_id']) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk') && ($_SESSION['access_level'] == '1' || $_SESSION['access_level'] == '2') || $_SESSION['access_level'] == '3') {
    ?>

                <li class="nav-item">
                    <a class="nav-link text-muted"
                        href="<?php echo BASE_URL; ?>/pages/backend/backend.php">Administration</a>
                </li>

                <?php
}

?>

</ul>
        </div>
    </div>
</nav>


<?php

} else {
    if ($debug) {

        echo 'no active menus';

    }
}

//query to get navigation per menu in order [if active]

//query to get headings per navigation in order [if active]

//query to get pages per heading in order [if active]

//function to highlight path to current page

//active tag

?>


