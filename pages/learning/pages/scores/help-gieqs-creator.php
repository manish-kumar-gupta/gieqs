<!DOCTYPE html>
<html lang="en">

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 0;
      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      $users = new users;


      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();
      

   
      ?>

    <!--Page title-->
    <title>GPAT Help</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .divider-icon::before {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .divider-icon::after {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    .text-container p {

        font-size: 1.3rem !important;
        padding-left: 1.5rem;
    }

    .text-container h2 {

        margin-top: 4rem;
        color: rgb(238, 194, 120);
       
    }

    .text-container h3 {

        display: list-item;          /* This has to be "list-item"                                               */
    list-style-type: disc;       /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-type     */
    list-style-position: inside; /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-position */

margin-top: 2rem;

padding-left: 1rem;
}

    .text-container p strong {

        color: rgb(238, 194, 120);
    }

    .card-placeholder {

        width: 344px;

    }

    .break {
        flex-basis: 100%;
        height: 0;
    }

    .flex-even {
        flex: 1;
    }

    .flex-nav {
        flex: 0 0 18%;
    }



    .gieqsGoldBackground {

        background-color: rgb(238, 194, 120);


    }

    .tagButton {

        cursor: pointer;

    }





    .cursor-pointer {

        cursor: pointer;

    }

    @media (max-width: 768px) {

        .flex-even {
            flex-basis: 100%;
        }
    }

    @media (max-width: 768px) {

        .card-header {
            height: 250px;
        }

        .card-placeholder {

            width: 204px;

        }


        /* #sticky {
position: absolute !important;
top: 0px;
}  */



    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

        }




    }
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>




    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}

        if (isset($userid)){
        $users->Load_from_key($userid);

        }else{

            die();
        }
				    
                        
                        
		
        ?>

    <!-- load all video data -->

    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <!--- specifiy the tag Categories required for display  CHANGEME-->



    <!--CONSTRUCT TAG DISPLAY-->

    <!--GET TAG CATEGORY NAME 
                    
                    <?php

                    //define the page for referral info

                    //$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                    $url =  "{$_SERVER['REQUEST_URI']}";

                    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

                    ?>
-->

    <div id="escaped_url" style="display:none;"><?php echo $escaped_url;?></div>

    <!--
                    
                TODO see other videos with similar tags, see videos with this tag, tag jump the video,
                list of chapters with associated tags [toggle view by category, chapter]
                
                -->


    <!-- Omnisearch -->

    <?php 
    //error_reporting(E_ALL);
    //include(BASE_URI . '/pages/learning/assets/gpatNav.php');

    
    $debug = false;
    $_SESSION['debug'] = false;

    ?>



    <div class="main-content bg-gradient-dark mt-10">

        <!--Header CHANGEME-->

        <div class="d-flex align-items-end container">
            <p class="h1 mt-5">GIEQs Online User Guide</p>


        </div>
        <div class="d-flex align-items-end container">
            <p class="text-muted pl-4 mt-2">User Reference for GIEQs Online</p>

        </div>









        <div class="container mt-3">



            <script>
            function round(value, precision) {
                var multiplier = Math.pow(10, precision || 0);
                return Math.round(value * multiplier) / multiplier;
            }








            $(document).ready(function() {







            })
            </script>


            </head>

            <body>



                <div class='content'>
                    <div class="row">



                        <div id="right" class="col-lg-3 col-xl-3 border-right">
                            <!--         	<div class="h-100 p-4"> -->
                            <div id="sticky" data-toggle="sticky" class="is_stuck pr-3 mr-3 pl-2 pt-2">
                                <div id="messageBox" class='text-left text-white pb-2 pl-2 pt-2'></div>
                                <div class="d-flex flex-nowrap text-small text-muted text-right px-3 mt-1 mb-3 ">







                                </div>


                                <div id="errorWrapper"
                                    class="error alert alert-warning alert-flush alert-dismissible collapse bg-gieqsGold"
                                    role="alert">
                                    <strong>Check the form!</strong> <span id="error"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="successWrapper"
                                    class="success alert alert-success alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Success!</strong> <span id="success"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div id="warningWrapper"
                                    class="warning alert alert-warning alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Warning!</strong> <span id="warning"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <h6 class="mt-3 mb-3 pl-2 h5">Navigation</h6>

                                <ul class="section-nav">


                                   
                                </ul>










                            </div>

                        </div>

                        <div class="col-lg-9 text-container">


                            <?php
          
            
            ?>




                           


                            
                                <h1>Using the GIEQS online administration system</h1>
<h2>Users</h2>
<h3>Where to find?</h3>
<p>Go to Programme and there you&rsquo;ll find Users (access).</p>
<h3>Content</h3>
<p>You can edit the users accounts for people who have signed up to the site (edit the users demographics and the access level).</p>
<p>You can create a new user and send him a password.</p>
<p>All of the other functions of the usermenu are legacy of GIEQS I, including the assets which they can sign up (for example all the programmes).</p>
<h3>Access list</h3>
<table>
<tbody>
<tr>
<td width="41">
<p>1</p>
</td>
<td width="510">
<p>Superuser: This should only be reserved for people managing the website.</p>
</td>
</tr>
<tr>
<td width="41">
<p>2</p>
</td>
<td width="510">
<p>Creator: They can create menus in the GIEQS online. They can bring in new videos, edit videos and edit options to show videos on the website.</p>
</td>
</tr>
<tr>
<td width="41">
<p>3</p>
</td>
<td width="510">
<p>Staff member: they can access the administration menu and can access full content</p>
</td>
</tr>
<tr>
<td width="41">
<p>4</p>
</td>
<td width="510">
<p>previous pro level</p>
</td>
</tr>
<tr>
<td width="41">
<p>5</p>
</td>
<td width="510">
<p>previous standard level</p>
</td>
</tr>
<tr>
<td width="41">
<p>6</p>
</td>
<td width="510">
<p>previous basic level</p>
</td>
</tr>
<tr>
<td width="41">
<p>7</p>
</td>
<td width="510">
<p>Basic user: the user cannot login</p>
</td>
</tr>
</tbody>
</table>
<p>Four, five and six are historical ways to access the website and can now be used indiscriminately.</p>
<p>All the users receive a six when they sign up and this is replaced by a subscription, which will cover later and give access to the site globally.</p>
<h3>Subscriptions</h3>
<h3>Where to find?</h3>
<p>You can find it all the way on the right. You have subscriptions and subscribable items</p>
<h3>Subscriptions menu</h3>
<p>With this menu, you can edit users access tot he site. You can change whether people have global access. In GIEQS online we have now pro, standard and free. Free is automatically granted&nbsp; when they sign up. They need to do nothing for that to get it. For standard or pro access payment is required. The payment is by the Stripe payment platform which is automatically linked to the generation of payments. Three subsciptions can be generated and managing this is covered later in this document. You should not create subscriptions from this menu, because they will not be tracked and they will not be able to be linked to the user account easily.</p>
<p>This menu should really be reserved for modifying user subscriptions. So for example, you may receive mails from users which say my subscription is not working, I cannot access the site. So it depends on what they&rsquo;re saying that they cannot access. If it&rsquo;s a course, you need to have the ID number of the course, which can be found in the paid assets menu (=in the same menu that you find subscriptions on). Then you can search for the title and find the ID number. After that, you need to search for the user ID, in combination with the ID number of the asset or the users name in combination with the asset. So you can find which subscription is relevant.</p>
<p>Subscriptions are either active or inactive. That means that there&rsquo;s a one or a zero in the active column. If there&rsquo;s a zero in the active column, this will not be working for the user. If there&rsquo;s is a date beyond today&rsquo;s date and there&rsquo;s a one in the active column, then the subscription end date beyond today&rsquo;s date and a one in the active column, then the subscription should be active and should be able to access.</p>
<h3>Possible problems with subscriptions</h3>
<p>If there is a problem with their ability to use the site, then this is very likely they&rsquo;re not using Google Chrome/Safari/Microsoft Edge (but Internet Explorer).</p>
<p>If the end date is before the date today, then they will not have access to that product and there&rsquo;s some problem with their payment. This needs manually reviewing by looking at Stripe and seeing how their payment system is.</p>
<p>The set up, whether they have paid or not have paid and however this will work, that will go into further later.</p>
<p>The next issue of their subsciption is not being active. That will also need sorting out by checking Stripe to see whether they do have an active subscription. So these are true for pro or standard subscription. This is not true of single one of payments because those two things that are described above are recurring payments, handled by Stripe. All of the other assets (including all of the courses, GIEQS I, GIEQS II, ..) is one of payments. And the one of payments is handled by Stripe, but it&rsquo;s for a determined period of time. That can be tree months or six months. It depends which is advertised on the website. So the likely thing is if the user is saying that they can&rsquo;t access it and they have gone beyond the time of the subscription. They need to buy it again and that needs to be communicated back to the user who is asking the question.</p>
<p>The end and start dates of the subscriptions can be edited, the active states (yes or no) can be edited.</p>
<p>Auto renew refers to whether the subscription be build at the end of the billing circle. This actually doesn&rsquo;t change anything in GIEQS online, is only changed in Stripe (and it&rsquo;s only applicable to those things which are subscriptions (not those things which are handled by single one of payments)</p>
<h3>Paid assets (subscribable items)</h3>
<p>This is used to add features to the site, including packs or videos, courses, other subscriptionables. This should only be modified by the superusers and should only be used as reference by other users when not creating new material for the site. We are also creating in this section hidden assets to make our textbooks of endoscopy, which can then be later accessed as reference or presentation or for courses.</p>
<h2>Course enrolments</h2>
<h3>Where to find?</h3>
<p>Go to subscriptions, Course enrolments</p>
<h3>Course enrolments</h3>
<p>This menu will list everybody who is enrolled in the particular courses that we are running and you can use this for making lists to submit to quality assurance agencies (like RIZIV, EACCME).</p>
<h2>Edit token</h2>
<h3>Where to find?</h3>
<p>Go to Site Settings, drop down the menu and select Edit token</p>
<h3>Edit token</h3>
<p>Tokens are part of the site which allow users to access content for free. You can also use it for access for institutions. If you&rsquo;re asked to add an institutional access, this is the place to go.</p>
<p>You can press plus to add a new token. You need to select the asset for which is relevant. This cannot be used to give access to subscriptions. This can only be used to give access to standard courses, video sets etc.</p>
<h2>Sponsors and partners</h2>
<h3>Where to find?</h3>
<p>Go to Site Settings, drop down the menu and select &lsquo;Edit Sponsors/Edit Partners.</p>
<h3>Sponsors and partners</h3>
<p>A partner is an academic organisation, a sponsor is a company. You can add here names and upload images for the partner or sponsor as well.</p>
<p>This is something which will increase in future when all our courses are sponsored and partnered with other organizations (like ESGE).</p>
<p>We can add a number of registrations for institutions. Some rules apply to the section. You can add a number per organisation, but each token represents an agreement with an external organisation to provide a certain number of licenses to the site. If that token is shared by members of that organisation, it will still work and therefor they need to know that and keep the distribution of that link (which is essentially a password to get free access to the course that we have created for them) safe. Don&rsquo;t&nbsp; allow the members to distribute their password.</p>
<p>There will be a certain number agreed with the organisation for a certain price. The pricing and the invoicing here can be performed on Stripe or done in accordance or discussion with Seauton.</p>
<p>The institutional licence is indefinite untill the number has been used up or we desable it.</p>
<p>You can add a number in the edit token screen and that number is then decreased every time somebody signs up, using one of those tokens . When the tokens run out, the link will stop working and the partner organisation, in the future, will receive a mail saying that the tokens are exhausted and that they need to contact us. So they can get more or do nothing if they think that&rsquo;s fine in the context of their agreement with us. Someone from Seauton and someone from the GIEQs foundation should receive an alert at this point.</p>
<p>&nbsp;</p>
<h1>Using the GIEQS online creation system</h1>
<h2>Tagging</h2>
<h3>Where to find?</h3>
<p>Go to Gieqs Online, Creator, pop up the menu and click on &lsquo;View my tagging Tasks&rsquo;.</p>
<h3>Content</h3>
<p>This is for people who are running the site, could invite you to look to videos and add tags to them. If you scroll to the list, then you can accept the tagging, do the climate tagging. With a click on the cross, you can add a tag.</p>
<p>You can also go directly tot he video edit page.</p>
<h3>New tag</h3>
<p>This you can find when you pop out the creator menu. Here you can add a new tag, if you have access to this.</p>
<h3>New category</h3>
<p>You can also find this in the creator menu. You can make a new tagcategory.</p>
<p>If you want to make new tags or new categories, please discuss this with the Superusers of the website.</p>
<h3>Edit chapters</h3>
<h3>Where to find?</h3>
<p>Go to Gieqs Online, Creator, pop up the menu, Video Table. Select a video and click on &lsquo;Edit chapters&rsquo;.</p>
<h3>Content</h3>
<p>When you go to the editing page, you can see the video displayed. Down below you will see either a blank screen, if the video has no chapters. But increasingly we&rsquo;re trying to add this for you. All that you need to do, is add tags to the videos. Tags describe ideas that run the structure of the website and can be searched for.</p>
<p>For example: users can search for videos that contain Kudo V, endoscopic imaging of a colorectal polyp, a demarcated area in an upper GI lesion, ... They can also search for combinations, so they can very quickly find what they want.</p>
<p>To add a new chapter: go to the bottom of the screen and press &lsquo;new chapter&rsquo;.</p>
<p>This will add a new chapter with a number after the chapter that is already there. If you want to add more then 1 chapter, you have to press and wait untill every chapter is there. Then you have a couple of options. If it&rsquo;s the first chapter, you can fill in 0 in the box &lsquo;time from&rsquo;. Then select from te video where you want the chapter to end and press &lsquo;+video time&rsquo; (underneath the &lsquo;time to&rsquo; box). Give your chapter a name and a description. If you&rsquo;ll finding it difficult to see the name box, you can refresh te page. The next chapter that you add, could have a time directly after the chapter before. To achieve that: once you add another chapter, press &lsquo;+ previous chapter end time&rsquo;. This will insert a time which is just after the chapter time in the &lsquo;time to&rsquo; of the previous chapter. So you can go on untill the last chapter. In the last chapter all you have to do, is press the same thing as the previous chapter end time. In the last box, you just drag the video to the very end, press pause and press &lsquo;+video time&rsquo;. Sometimes you have to press &lsquo;+video time&rsquo; button a few times to get the correct time, but once it becames correct, it will not change anymore.</p>
<p>Now you see the video displayed, you can add headings and tags.</p>
<p>To add a tag, there are a couple of ways.</p>
<ul>
<li>Structured way: Press &lsquo;add tag&rsquo;. Then you have all the tags that are available on the website. You can click on the blue buttons (on the top). You can click trough them, dive into the categories (by clicking on the category) and then assigne them.</li>
<li>Faster way: Press &lsquo;add tag (Search)&rsquo;. Here you can simply typ into the box to find your tag. Press enter on the keybord and it&rsquo;s automatically added. You can just keep doing it.</li>
</ul>
<p>After that, you have links to the tag manager. This is where you can see the structure of the site, with all the tags and the linked references, which you can also update. This is an important concept with tags, that they are also linked to academical references (PubMed).</p>
                            
                                <p>GPAT provides multiple outputs to give insight into proficiency at polypectomy, whilst
                                respecting the fact that competency and training are very dependent upon the difficulty
                                of the polyp being attempted.</p>

                            <p>To this end all GPAT outp
                                ts are stratified by validated instruments to determine the
                                difficulty of polypetomy (namely the SMSA score <sup>(1,2)</sup> and the SMSA + score
                                <sup>(3,4)</sup>).
                            </p>

                            <p>Unlike other scoring systems the GPAT is specifically designed to be applicable to all
                                types of colorectal polyp. Whilst we develop GPAT outputs for cold snare (diminutive)
                                are limited as are those for pedunculated polypectomy. Development of these will occur
                                over time.</p>

                            <!--Gold Block -->
                            <div class="d-block h1 text-dark mr-2 my-5 p-3 bg-gieqsGold">
                                <p class="text-center mb-0">GPAT outputs a weighted and unweighted fraction score
                                    (GPAT<sub>w</sub> and GPAT<sub>unw</sub>)</p>
                            </div>


                            <span id="main_outputs" data-toc="What do the Outputs Mean?" class="d-block h1 text-white mr-2 mb-3 toc-item">What do the main outputs
                                of GPAT mean?</span>

                            <p style="font-size:1.3rem;">The unweighted GPAT (GPAT<sub>unw</sub>) recognises proficiency
                                in the <strong>same way across all difficulties
                                    of polypectomy</strong>. It is useful to track progress over time within domains and
                                within different categories of difficulty.</p>

                                <p>The weighted GPAT (GPAT<sub>w</sub>) recognises proficiency <strong>in the context of difficulty</strong>.  One of the
                            major problems in comparing proficiency across a broad range of polyp resections is accounting for difficulty.  
                        The weighted GPAT makes this possible by decreasing the proficiency score over a range of easier SMSA scores.  For example
                    scores for SMSA 2 are multiplied by 0.25, SMSA 3 by 0.5 etc.</p>

                    <p>Of course your GPAT will not be reliable after 1 procedure.  This is why we have set a threshold of 30 procedures to determine
                        the GPAT for certification purposes.  All of these endpoints are subject to ongoing research and by using this platform
                        you <strong>explicitly consent to the use of your anonymised data for research</strong> to make the score and platform better
                    </p>

                            <hr class="divider divider-icon my-6 text-muted" />

                            <span id="references" data-toc="References" class="d-block h1 text-white mr-2 mb-3 toc-item">References</span>

                            <P><sup>1</sup> SMSA Score -- Gupta S, Miskovic D, Bhandari P, Dolwani S, McKaig B, Pullan
                                R,
                                Rembacken B, Riley S, Rutter MD, Suzuki N, Tsiamoulos Z, Valori R, Vance ME, Faiz OD,
                                Saunders BP, Thomas-Gibson S. A novel method for determining the difficulty of
                                colonoscopic polypectomy. Frontline Gastroenterol. 2013 Oct;4(4):244-248. doi:
                                10.1136/flgastro-2013-100331. Epub 2013 Jun 1. PMID: 28839733; PMCID: PMC5369843. </P>

                            <P><sup>2</sup> SMSA in Larger &ge; 20mm LNPCPs -- Sidhu M, Tate DJ, Desomer L, Brown G,
                                Hourigan LF, Lee
                                EYT, Moss A, Raftopoulos S, Singh R, Williams SJ, Zanati S, Burgess N, Bourke MJ. The
                                size, morphology, site, and access score predicts critical outcomes of endoscopic
                                mucosal resection in the colon. Endoscopy. 2018 Jul;50(7):684-692. doi:
                                10.1055/s-0043-124081. Epub 2018 Jan 25. Erratum in: Endoscopy. 2018 Jul;50(7):C7. PMID:
                                29370584. </P>
                            <P><sup>3</sup> SMSA+ score (expert opinion) -- Anderson J, Lockett M. Training in
                                therapeutic endoscopy: meeting present
                                and future challenges. Frontline Gastroenterol. 2019;10(2):135-140.
                                doi:10.1136/flgastro-2018-101086</P>


                            <P><sup>4</sup>SMSA-EMR score (data driven, abstract only) -- <a
                                    href="https://www.giejournal.org/article/S0016-5107(18)32295-8/pdf">SMSA-EMR SCORE
                                    IS A NOVEL ENDOSCOPIC RISK ASSESSMENT TOOL FOR PREDICTING CRITICAL
                                    ENDOSCOPIC MUCOSAL RESECTION OUTCOMES</a> - Volume 87, No. 6S : 2018
                                GASTROINTESTINAL ENDOSCOPY AB467 </P>

                            <!--  <p>Deep Mural Injury Score -- <a href="https://pubmed.ncbi.nlm.nih.gov/27464708/">Burgess
                                    NG, Bassan MS, McLeod D, Williams SJ, Byth K, Bourke MJ. Deep mural injury and
                                    perforation after colonic endoscopic mucosal resection: a new classification and
                                    analysis of risk factors. Gut. 2017 Oct;66(10):1779-1789. doi:
                                    10.1136/gutjnl-2015-309848. Epub 2016 Jul 27. PMID: 27464708.</a></p>
 -->

                        </div>
                        <!--end col-9-->


                    </div>
                    <!--end row-->

                </div>
                <!--end content-->


        </div>
        <!--end content-->








    </div>
    <!--end overall-->




    <!-- Modal -->


    <?php require BASE_URI . '/footer.php';?>



    <!-- Purpose JS -->
    <script src=<?php echo BASE_URL . "/assets/js/purpose.js"?>></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script> -->
    <script>
    var videoPassed = $("#id").text();
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/canvasjs.min.js"></script>





    <script>
    //the number that are actually loaded

    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }


    function generateTOC() {

        var statement = '';

        //get all h1s
        //get all h2s before the next h1 -> second line
        //get all h3s before the next h2 -> 3rd line

        var x=15;
        $('h2').each(function() {

            var id = null;
            
            $(this).attr('id', x);
            id = $(this).attr('id');
            text = $(this).text();
            statement +=
                '<li class="toc-entry toc-h4" style="font-size:1.1rem;"><a class="text-muted" href="#' + id +
                '">' + text + '</a></li>';
            x++;

        })

        $('.section-nav').html(statement);



    }

    function generateTOCold() {

var statement = '';

$('.toc-item').each(function() {

    var id = null;
    id = $(this).attr('id');
    text = $(this).attr('data-toc');
    statement +=
        '<li class="toc-entry toc-h4" style="font-size:1.1rem;"><a class="text-muted" href="#' + id +
        '">' + text + '</a></li>';

})

$('.section-nav').html(statement);



}



    function copyToClipboard(text) {
        if (window.clipboardData && window.clipboardData.setData) {
            // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
            return window.clipboardData.setData("Text", text);

        } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
            document.body.appendChild(textarea);
            textarea.select();
            try {
                return document.execCommand("copy"); // Security exception may be thrown by some browsers.
            } catch (ex) {
                console.warn("Copy to clipboard failed.", ex);
                return false;
            } finally {
                document.body.removeChild(textarea);
            }
        }
    }



    $(document).ready(function() {


       generateTOC();
        //refreshNavAndTags();

        waitForFinalEvent(function(){
            generateTOC();

			
	    }, 1000, "Resize header");

        if (edit == 1) {

            fillForm(esdLesionPassed);
        }

        $('#refreshNavigation').click(function() {


            firstTime = 1;
            //the number that are actually loaded
            loaded = 1;

            //the number the user wants
            loadedRequired = 1;

            $('.tag').each(function() {

                if ($(this).is(":checked")) {

                    $(this).prop('checked', false);
                }


            })

            refreshNavAndTags();

        })

        //on load check if any are checked, if so load the videos

        //if none are checked load 10 most recent videos for these categories



        $(window).scroll(function() {
            var scrollDistance = $(window).scrollTop();


            // Assign active class to nav links while scolling
            $('fieldset').each(function(i) {
                if ($(this).position().top <= scrollDistance) {
                    $('.section-nav a.text-gieqsGold').removeClass('text-gieqsGold').addClass(
                        'text-muted');
                    $('.section-nav a').eq(i).addClass('text-gieqsGold').removeClass(
                        'text-muted');
                }
            });
        }).scroll();












    })
    </script>
</body>

</html>