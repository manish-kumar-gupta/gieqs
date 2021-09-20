<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>


<head>

<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>

<!--Page title-->

    <title>GIEQs faculty</title>
  
    <style>

        .header, .navbar, .navbar-top {
            transition: none !important;
        }

        .bg-dark{
            background-color: #162e4d !important; 
        }

        .logo {
            width: 100%;
        }

        .gieqsGold {
            color: rgb(238, 194, 120);
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

    </header>
    <!-- Omnisearch -->
    <div id="omnisearch" class="omnisearch">
        <div class="container">
            <form class="omnisearch-form">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </form>
            <div class="omnisearch-suggestions">
                <h6 class="heading">Search Suggestions</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>iphone 8</span> in Smartphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>beats pro solo 3</span> in Headphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>smasung galaxy 10</span> in Phones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">

        <!-- Header (v1) -->
        <section class="header-1 bg-section-dark" data-offset-top="#header-main">
        </section>




        <!-- Sponsors -->

        <!-- Team 1 -->
        <div id="team-team-1" title="the GIEQs faculty">
            <section class="slice bg-gradient-dark slice-lg">
                <div class="container">
                    <div class="mb-5 text-center">
                        <h2 class="mt-4" style="color: rgb(238, 194, 120);">The GIEQs faculty</h2>
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180">With a stellar international faculty the second edition of GIEQs
                                promises to be a launch-pad for innovative thinking in everyday endoscopic practice.</p>
                        </div>
                    </div>
                    <div class="mb-5 text-left">
                        <h3 class=" mt-4" style="color: rgb(238, 194, 120);">International Faculty</h3>

                    </div>
                    <div class="row row-grid">
                        
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Steven Heitman" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/SH.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">A/Prof. Steven J Heitman</h5>
                                    <p class="text-muted mb-0">Herschfield Professor of Medicine</p>
                                    <p class="text-muted mb-0">University of Calgary, Canada</p>
                                    <p class="text mb-0">Focus: quality, polypectomy</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Roland Valori" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/RMV.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Roland Valori</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Gloucestershire Royal Hospital, UK</p>
                                    <p class="text mb-0">Focus: quality, colonoscopy training</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="John Anderson" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/JA.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr John Anderson</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Cheltenham General Hospital, UK</p>
                                    <p class="text mb-0">Focus: polypectomy, colonoscopy training</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Michael Bourke" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/MB.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Michael J Bourke</h5>
                                    <p class="text-muted mb-0">Clinical Professor of Medicine</p>
                                    <p class="text-muted mb-0">University of Sydney, Australia</p>
                                    <p class="text mb-0">Focus: polypectomy, ERCP</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Michael Bourke" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Cameron John Bell.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Cameron John Bell</h5>
                                    <p class="text-muted mb-0">Director of Endoscopy</p>
                                    <p class="text-muted mb-0">Royal North Shore Hospital, Sydney</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Michael Bourke" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Donald MacIntosh.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Donald Macintosh</h5>
                                    <p class="text-muted mb-0">Professor of Medecine</p>
                                    <p class="text-muted mb-0">Dalhousie University in Halifax, Canada</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Amir Klein" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Amir Klein.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Amir Klein</h5>
                                    <p class="text-muted mb-0">Acting Director</p>
                                    <p class="text-muted mb-0">Gastroenterology department, Rambam Health care campus, Tel Aviv, Israel</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Ralph Lee" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Ralph Lee.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Ralph Lee</h5>
                                    <p class="text-muted mb-0">Gastroenterologist and assistant professor, University of Ottawa, Ontario, Canada</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Mayenaaz Sidhu" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Mayenaaz Sidhu.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Mayenaaz Sidhu</h5>
                                    <p class="text-muted mb-0">Gastroenterologist and Hepatologist, Westmead Hospital (Sydney), University of Sydney, Concord Hospital (Sydney)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Miguel Bispo" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Miguel Bispo.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Miguel Bispo</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, Champalimaud Foundation, Lisbon, Portugal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Amrita Sethi" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Amrita Sethi.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Amrita Sethi</h5>
                                    <p class="text-muted mb-0">Associate Professor of Medicine (Columbia University Irving Medical Center in New York) and Director of Interventional Endoscopy and the Advanced Endoscopy Fellowship Program Director </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Jan-Werner Poley" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Jan-Werner Poley.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Jan-Werner Poley</h5>
                                    <p class="text-muted mb-0">Head of Endoscopy, University Medical Center Rotterdam, the Netherlands</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Jean-Baptiste Chevaux" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Jean-Baptiste Chevaux.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Jean-Baptiste Chevaux</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, University Hospital Nancy, France</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Siwan Thomas-Gibson " class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Siwan Thomas-Gibson.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Siwan Thomas-Gibson</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist & Endoscopist (St Mark’s National Bowel Hospital & Academic Institute) UK  
                                        <br>Professor of Practice (Gastrointestinal Endoscopy), Imperial College London, UK</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- <div class="row row-grid"> -->

                        <div class="mb-4 text-left">
                            <h3 class="mt-6" style="color: rgb(238, 194, 120);">National faculty</h3>
                        </div>

                    <!-- </div> -->
                    <div class="row row-grid">
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Raf Bisschops.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Raf Bisschops</h5>
                                    <p class="text-muted mb-0">Professor of Medicine</p>
                                    <p class="text-muted mb-0">University Hospital Leuven</p>
                                    <p class="text mb-0">Focus: Endoscopic imaging, Barrett's oesophagus</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Arnaud Lemmers.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Arnaud Lemmers </h5>
                                    <p class="text-muted mb-0">Head of Clinic, Endoscopy Unit </p>
                                    <p class="text-muted mb-0">Erasme Hospital, Belgium </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Evelien Christiaens.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr. Evelien Christiaens </h5>
                                    <p class="text-muted mb-0">Gastroenterologist </p>
                                    <p class="text-muted mb-0">OLV hospital Aalst, Belgium </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Christophe Snauwaert.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr. Christophe Snauwaert </h5>
                                    <p class="text-muted mb-0">Therapeutic Endoscopist </p>
                                    <p class="text-muted mb-0">AZ Sint-Jan Brugge-Oostende, Belgium </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Peter Bossuyt.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr. Peter Bossuyt </h5>
                                    <p class="text-muted mb-0">Gastroenterologist, IBD clinic </p>
                                    <p class="text-muted mb-0">Imelda General Hospital, Bonheiden, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Tim Vanuytsel.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Dr. Tim Vanuytsel</h5>
                                    <p class="text-muted mb-0">Consultant gastroenterologist</p>
                                    <p class="text-muted mb-0">Leuven University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Frederik de Clerck.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr. Frederik de Clerk</h5>
                                    <p class="text-muted mb-0">Gastroenterologist </p>
                                    <p class="text-muted mb-0">AZ Sint Lucas Gent, Belgium </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Guido Deboever" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/gdeboever.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Guido Deboever</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, AZ Damiaan, Ostend, Belgium </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Maridi Aerts" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Maridi Aerts.jpeg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Maridi Aerts</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, UZ-Brussel, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Géraldine Dahlqvist" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Geraldine Dahlqvist.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Géraldine Dahlqvist</h5>
                                    <p class="text-muted mb-0">Hepatologist and a liver transplant specialist, Cliniques universitaires Saint-Luc, Belgium </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Anja Geerts" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/AnjaGeerts.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Anja Geerts</h5>
                                    <p class="text-muted mb-0">Gastroenterologist and Hepatologist, Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Ivan Borbath" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Ivan Borbath.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Ivan Borbath </h5>
                                    <p class="text-muted mb-0">Department of Hepato-Gastroenterology, Cliniques universitaires Saint-Luc, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Marianna Arvanitaki" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Marianna Arvanitaki.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Marianna Arvanitaki</h5>
                                    <p class="text-muted mb-0">Head of the Clinic of Pancreatology and Clinical Nutrition and Professor, Erasme University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Diederik Dooremont" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Diederik Dooremont.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Diederik Dooremont</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, Sint Elisabeth Zottege, Belgium </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Gudrun Cornelis" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Gudrun Cornelis.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Gudrun Cornelis</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, ASZ Aalst, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Thomas Billiet" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Thomas Billiet.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Thomas Billiet</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, AZ Groeninge, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Jo Vandervoort" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Jo Vandervoort.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Jo Vandervoort</h5>
                                    <p class="text-muted mb-0">Chief of the departement of Gastroenterology - Endoscopy & GI-oncology, Onze-Lieve-Vrouw Hospital, Aalst, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Dr Harald Peeters" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Harald Peeters.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Dr Harald Peeters</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, St Lucas Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Wim Verlinden" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Wim Verlinden.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Wim Verlinden</h5>
                                    <p class="text-muted mb-0">Gastroenterologist and Hepatologist, AZ Nikolaas Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Mathieu Struyve" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/mathieu_struyve.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Mathieu Struyve</h5>
                                    <p class="text-muted mb-0">Hepatologist and Interventional Endoscopist, Ziekenhuis Oost-Limburg (ZOL) Genk, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Dominiek De Wulf" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Dominiek De Wulf.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Dominiek De Wulf</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, AZ Delta Roeselare, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Ercan Cesmeli" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Ercan Cesmeli.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Ercan Cesmeli</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, AZ St Lucas, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Gertjan Rasschaert" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Gertjan Rasschaert.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Gertjan Rasschaert</h5>
                                    <p class="text-muted mb-0">Gastroenterology senior resident, Vrije Universiteit Brussel, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Michiel Bronswijk" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Michiel Bronswijk.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Michiel Bronswijk</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">Imelda General Hospital Bonheiden & University Hospitals Leuven, Belgium</p>
                                    <p class="text mb-0">Focus: Therapeutic EUS </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Steven Van Outryvve" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Steven Van Outryvve.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Steven Van Outryvve</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, GZA Hospitals, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Filip Baert" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Filip Baert.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Filip Baert</h5>
                                    <p class="text-muted mb-0">AZ Delta Roeselare, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="">
                                        <img alt="Pierre Deprez" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/PD.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Professor Pierre Deprez</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">Cliniques universitaires Saint-Luc (UCLouvain)</p>
                                    <p class="text mb-0">Focus: quality in upper GI tract early neoplasia, ERCP and endoscopic ultrasound</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="">
                                        <img alt="Ratislav Kunda" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/RK.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Professor Ratislav Kunda</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist and Surgeon</p>
                                    <p class="text-muted mb-0">University Hospital of Brussels</p>
                                    <p class="text mb-0">Focus: quality in_array ERCP and endoscopic ultrasound</p>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="">
                                        <img alt="Schalk Van der Merwe" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/SM.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Professor Schalk Van der Merwe</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">University Hospital of Leuven</p>
                                    <p class="text mb-0">Focus: quality in ERCP and endoscopic ultrasound</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Steven Heitman" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/SH.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">A/Prof. Steven J Heitman</h5>
                                    <p class="text-muted mb-0">Herschfield Professor of Medicine</p>
                                    <p class="text-muted mb-0">University of Calgary, Canada</p>
                                    <p class="text mb-0">Focus: quality, polypectomy</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Roland Valori" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/RMV.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Roland Valori</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Gloucestershire Royal Hospital, UK</p>
                                    <p class="text mb-0">Focus: quality, colonoscopy training</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="John Anderson" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/JA.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr John Anderson</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Cheltenham General Hospital, UK</p>
                                    <p class="text mb-0">Focus: polypectomy, colonoscopy training</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="row row-grid"> -->

                        <div class="mb-4 text-left">
                            <h3 class="mt-6" style="color: rgb(238, 194, 120);">Local faculty</h3>
                        </div>

                        <div class="row row-grid">
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="David Tate" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/DT.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr David Tate</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: endoscopy quality, tissue resection, training</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Pieter Hindryckx" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/PH.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Dr. Pieter Hindryckx</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: ERCP, interventional EUS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Hans Van Vlierberghe" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Hans Van Vlierberghe.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Hans Van Vlierberghe</h5>
                                    <p class="text-muted mb-0">Hepatologist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: hepatology and endoscopy</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Danny Delooze" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/DDL.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Danny De Looze</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: Barrett's, proctology, general gastroenterology</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Lobke Desomer" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/LD.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Lobke Desomer</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">AZ Delta Hospital, Roeselare</p>
                                    <p class="text mb-0">Focus: endoscopy quality, polypectomy, training</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Helena Degroote" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/HD.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Helena Degroote</h5>
                                    <p class="text-muted mb-0">Hepatologist and Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">UZ Gent</p>
                                    <p class="text mb-0">Focus: quality in ERCP and EUS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Suzane Ribeiro" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/SR.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Suzane Moura Ribeiro</h5>
                                    <p class="text-muted mb-0">Oncologist and Echo-Endoscopist</p>
                                    <p class="text-muted mb-0">UZ Gent</p>
                                    <p class="text mb-0">Focus: quality in EUS and digestive oncology</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Helena Degroote" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/TL.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Dr Triana Lobaton</h5>
                                    <p class="text-muted mb-0">Gastroenterologist</p>
                                    <p class="text-muted mb-0">UZ Gent</p>
                                    <p class="text mb-0">Focus: quality in IBD and endoscopy</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="John Anderson" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/JA.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr John Anderson</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Cheltenham General Hospital, UK</p>
                                    <p class="text mb-0">Focus: polypectomy, colonoscopy training</p>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Dr Xavier Verhelst" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Xavier Verhelst.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Dr Xavier Verhelst</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">Gastroenterologist, Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Jeroen Geldof" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Jeroen Geldof.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Jeroen Geldof</h5>
                                    <p class="text-muted mb-0">Gastroenterologist & Hepatologist, UZ Ghent, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Anne Hoorens" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Anne Hoorens.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Anne Hoorens</h5>
                                    <p class="text-muted mb-0">Head of Clinic, Department of Pathology, UZ Ghent 
                                        <br>Professor of Pathology, Gent University, Belgium </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Prof Dr Karen Geboes" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Karen Geboes.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Dr Karen Geboes</h5>
                                    <p class="text-muted mb-0">Head of Clinic of Gastrointestinal and Intestinal Diseases, UZ Ghent 
                                        <br>Professor of Medicine, Ghent University, Belgium</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- </div> -->
                </div>
                <!--<div class="row row-grid">
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a href="#">
                        <img alt="Image placeholder" class="img-fluid rounded shadow" src="assets/img/theme/light/team-5-800x800.jpg">
                      </a>
                    </div>
                    <div class="mt-3">
                      <h5 class="card-title mb-0">Danielle Levin</h5>
                      <p class="text-muted mb-0">CTO</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a href="#">
                        <img alt="Image placeholder" class="img-fluid rounded shadow" src="assets/img/theme/light/team-6-800x800.jpg">
                      </a>
                    </div>
                    <div class="mt-3">
                      <h5 class="card-title mb-0">Martin Gray</h5>
                      <p class="text-muted mb-0">CTO</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a href="#">
                        <img alt="Image placeholder" class="img-fluid rounded shadow" src="assets/img/theme/light/team-7-800x800.jpg">
                      </a>
                    </div>
                    <div class="mt-3">
                      <h5 class="card-title mb-0">George Squier</h5>
                      <p class="text-muted mb-0">CTO</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a href="#">
                        <img alt="Image placeholder" class="img-fluid rounded shadow" src="assets/img/theme/light/team-8-800x800.jpg">
                      </a>
                    </div>
                    <div class="mt-3">
                      <h5 class="card-title mb-0">Jesse Stevens</h5>
                      <p class="text-muted mb-0">CTO</p>
                    </div>
                  </div>
                </div>
              </div>-->
        </div>
        </section>
    </div>

    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="../../assets/js/purpose.core.js"></script> 
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>    <!-- Page JS -->
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
