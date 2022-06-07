<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>

    <title>GIEQs mission statement</title>
    
    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">

    <style>
    .logo {

        width: 100%;


    }

    .gieqsGold {

        color: rgb(238, 194, 120);

    }

    .video-thumbnail {
  position: relative;
  display: inline-block;
  cursor: pointer;
  margin: 30px;
    }

    .video-thumbnail::before {
    position:absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    content: "&#9658;";
    font-family: FontAwesome;
    font-size: 100px;
    color: #fff;
    opacity: .8;
    text-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5);
  }
  .video-thumbnail:hover::before {
    color: ;
  }


    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

            font-size: 1em;
        }

        .tiny {
            font-size: 0.75em;

        }

        .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
        }


    }
    </style>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->
  
        <?php require BASE_URI . '/nav.php';?>

        <?php 
        
        $symposium_nav_active = [

            0 => '', //news
            1 => '', //individual reg
            2 => 'gieqsGold', //group reg
            3 => '', //program
            4 => '', //faculty
            5 => '', //register now
            
            
            
            ];
        
        
        require BASE_URI . '/pages/learning/includes/nav_symposium.php';?>

    </header>
  
    <div class="main-content">

        


        <!-- Header text 1 -->
        <section class="slice slice-lg pb-2" data-offset-top="#header-main">
      <div class="container pt-6">
        <div class="row justify-content-center">
          <div class="col-md-9">
<article class="mt-8 mb-6">
<h1 class="lh-150 mb-3">Group discounts</h1>
<p class="lead">Put together a group of colleagues and achieve up to 50% discount on your symposium registration.</p>
<figure class="figure">
                <!-- <a href="https://vimeo.com/370720520" data-fancybox>      -->
                <img alt="Hub and Spoke Image" src="../../assets/img/icons/hubandspoke.png" class="img-fluid rounded" >
                <!-- </a> -->
                <figcaption class="mt-3 text-muted">Examples of Fictional Group Registrations.  Examples depict scenarios where groups may organise local events to avoid huge wasted travel to Ghent thereby driving up local standards and saving carbon budget simultaneously.</figcaption>
              </figure>
<h2 class="lh-150 mt-5 mb-3">Pricing</h2>
<table class="table-cards" style="width:100%;">
<tbody>
<tr class="table-divider">
<td colspan="4">
<p class="text-white">Non-Industry Sponsored</p>
</td>
</tr>
<tr class="table-divider">
<td>
<p>Number of participants in group</p>
</td>
<td>
<p>5+</p>
</td>
<td>
<p>10+</p>
</td>
<td>
<p>20+</p>
</td>
</tr>
<tr class="table-divider">
<td>
<p>Discount</p>
</td>
<td>
<p>20%</p>
</td>
<td>
<p>30%</p>
</td>
<td>
<p>50%</p>
</td>
</tr>
<tr class="table-divider">
<td colspan="4" width="601">
<p class="text-white">Industry Sponsored</p>
</td>
</tr>
<tr class="table-divider">
<td>
<p>Number of participants in group</p>
</td>
<td>
<p>5+</p>
</td>
<td>
<p>10+</p>
</td>
<td>
<p>20+</p>
</td>
</tr>
<tr class="table-divider">
<td>
<p>Discount</p>
</td>
<td>
<p>10%</p>
</td>
<td>
<p>20%</p>
</td>
<td>
<p>30%</p>
</td>
</tr>
</tbody>
</table>
<small>Conditions : Discounts are on symposium registration cost only, discount does not apply to GIEQs Online PRO Registration.  GIEQs Online PRO Registration included in all group registrations. A group can be created by any physician or industry representative.  A condition of group registration is providing a single contact person and a list of all participants including names, professional registration number, contact email and work address.</small>
<h2 class="lh-150 mt-5 mb-3">Hospital/department/unit discounts</h2>
<p class="lead">We believe endoscopy teams benefit from learning together, with protected time away from the pressures of work. GIEQs III symposium offers endoscopy teams a heavily discounted, structured, green virtual learning experience where the whole team can come together without the hassle and expense of travel and accommodation.</p>
<p class="lead">Our vision is of endoscopists meeting in either a hospital or local setting, with enough space to accommodate the team comfortably. We envisage endoscopists participating in the learning experience together, discussing the key take home messages and formulating plans for quality improvement in their local unit based on what they learn from GIEQs III. A single symposium cannot possibly cover all there is to know about everyday endoscopy, so to fill in the gaps the registration fee includes, for each registered individual, access to GIEQs online for one year.</p>
<p class="lead">Organising a local GIEQs III learning event demonstrates the endoscopy unit&rsquo;s commitment to the professional development of its staff and the quality improvement its service.</p>
<h2 class="lh-150 mt-5 mb-3">Industry sponsorship of GIEQS III local learning hubs</h2>
<p class="lead">Everyday endoscopy units are always busy and often have limited organisational and financial resources to arrange local learning events, even when they recognise how useful they are. Sponsoring a GIEQs III symposium local learning hub will give endoscopy professionals an opportunity to congregate and learn together and at the same time provide your company representatives with excellent access to those professionals.</p>
<p class="lead">The level of sponsorship is for local negotiation, but we anticipate industry would cover the costs of venue, meals and the GIEQs III symposium subscriptions. We offer discounted subscription for groups of &gt;10. Each one of a group subscription will always include one-year access to GIEQs online.</p>
<p class="lead">We can offer a limited number of &lsquo;Hub&rsquo; events to have live interaction with the faculty of the symposium.</p>
<h2 class="lh-150 mt-5 mb-3">Why a local event?</h2>
<p class="lead">In an ideal world an everyday endoscopy department should allow time for professional development. Some individuals prefer to learn on their own, but most health professionals are team players and value coming together to learn as a group. Endoscopy conferences are popular but very expensive and more time-consuming because of travel; more time is lost from work.</p>
<p class="lead">There are advantages to endoscopy professionals learning as a group. Group learning helps align the unit culture, it improves team working, it helps individuals understand and appreciate each other&rsquo;s roles, it provides a platform for challenging entrenched views and fosters a collective approach to quality improvement.</p>
<p class="lead">Organising a local event requires a lot of effort and it may require knowledge, perspectives and range of opinion that are not available locally. GIEQs III symposium offers a structured programme of current issues facing everyday endoscopists, with practical solutions to everyday problems explained by experts in the field. GIEQs online fills in the gaps and provides a year-round learning resource</p>

<h2 class="lh-150 mt-5 mb-3">How would it work?</h2>
<p class="lead">The format will be similar for events whether they are sponsored by the unit or by industry. We suggest that all or part of your team gather in a venue away from the unit with high quality TV screen(s) and audio, either in or outside the local hospital. Ideally, there should be plenty of refreshments. There will be three live feeds, so up to three rooms might be needed depending on who is present and what their interests are. All GIEQs III sessions will be available for catch up within a few days of the symposium, so if there is only one room the other sessions can be viewed after the event. Alternatively, the group can switch between sessions to best meet the learning needs.</p>
<p class="lead">We recommend a member(s) of the local team (or perhaps an invited expert) act as a chair for each session: pointing out key learning points; responding to questions; challenging participants; and capturing suggestions for quality improvement projects. It will be possible for a limited number of these &lsquo;chairs&rsquo; to communicate directly with the faculty of the symposium.</p>
<h2 class="lh-150 mt-5 mb-3">In Summary</h2>
<ul>
<li class="lead">there is a lot to be gained by groups learning together, particularly if they are from the same institution</li>
<li class="lead">to make the most of the experience, we recommend participants agree what they are going to be doing differently as a result of participating in GIEQs III symposium</li>
<li class="lead">because the symposium cannot cover the whole curriculum for endoscopy, the new offer is for registrants to have one-year access to GIEQs online to fill in the gaps</li>
<li class="lead">it is possible to register for just the GIEQs III symposium, and all the sessions will be available for three months for catch up</li>
<li class="lead">however, for the same price as the conference last year, delegates will get access to the conference and the GIEQs online for a year.</li>
</ul>


            
            </article>
           
    </section>

    </div>

    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="../../assets/js/purpose.core.js"></script> <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>    <!-- Page JS -->
   <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->
    <!-- Demo JS - remove it when starting your project -->


    <script>
    $(document).ready(function() {



    })
    </script>
</body>

</html>