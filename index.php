<?php
require('admin_maison/inc/init.inc.php');

// gestion des contenus de la BDD expérirences
// $result = $pdo -> prepare("SELECT * FROM t_experiences WHERE utilisateur_id='1'");
// $result->execute();
// $ligne_experience = $result -> fetch();

// vérification des informations de session pour en connaitre l'état connexion/déconnexion
// if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
//     $id_utilisateur = $_SESSION['id_utilisateur'];
//     $prenom = $_SESSION['prenom'];
//     $nom = $_SESSION['nom'];
//
// }else{
//     header('location: admin_maison/connexion.php');
// }

// récupération des informations des bdd pour affichage
$sql = $pdo->query(" SELECT * FROM t_titre_cv WHERE utilisateur_id ='1'"); ////ORDER BY id_titre_cv DESC LIMIT 1
$ligne_titre_cv = $sql->fetch();

$sql = $pdo->query(" SELECT * FROM t_competences WHERE utilisateur_id ='1'");
$ligne_competences = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_competences WHERE utilisateur_id ='1' AND c_categorie = 'back' ");
$ligne_competences_back = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_competences WHERE utilisateur_id ='1' AND c_categorie = 'front' ");
$ligne_competences_front = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_realisations WHERE utilisateur_id ='1'");
$ligne_realisations = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_experiences WHERE utilisateur_id ='1'");
$ligne_experiences = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_formations WHERE utilisateur_id ='1'");
$ligne_formations = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_reseaux WHERE utilisateur_id ='1'");
$ligne_reseaux = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_loisirs WHERE utilisateur_id ='1'");
$ligne_loisirs = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_textes WHERE utilisateur_id ='1'");
$ligne_texte = $sql->fetch();

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<meta http-equiv="x-ua-compatible" content="ie=edge">-->

    <title>Site cv- <?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?>  </title>

    <!-- Font Awesome -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,600,300,300italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Material Design Bootstrap -->
    <link href="css/materialize.css" rel="stylesheet">

    <!-- Magnific-popup css -->
    <link href="css/magnific-popup.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <!--<link href="css/progressbar.css" rel="stylesheet">-->

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".navbar-desktop">
    <!-- Start your project here-->
    <!--Navbar-->

    <div class='preloader'><div class='loaded'>&nbsp;</div></div>

    <nav class="navbar navbar-fixed-top navbar-light bg-faded">
        <!--Collapse button-->
        <div class="container">
            <a href="#" data-activates="mobile-menu" class="button-collapse right"><i class="fa fa-bars black-text"></i></a>

            <!--Content for large and medium screens-->
            <div class="navbar-desktop">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="index.php"><img src="img/.'<?= $ligne_titre_cv['logo'] ?>'" alt="logo" /></a>
                <!--Links-->
                <ul class="nav navbar-nav pull-right hidden-md-down text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link" href="#experiences">Expériences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#formations">Formations</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#competences">Compétences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#realisations">Réalisations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#loisirs">Loisirs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reseau">Réseau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="#!"><i class="fa fa-search fa-lg"></i></a>
                    </li>
                </ul>

            </div>


            <!-- Content for mobile devices-->
            <div class="navbar-mobile">

                <ul class="side-nav" id="mobile-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experiences">Expériences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#formations">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#competences">Compétences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#realisations">Réalisations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#loisirs">Loisirs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reseau">Réseau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#!"><i class="fa fa-search fa-lg"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->


    <div id="home" class="slider">
        <ul class="slides">
            <li>
                <img src="img/homebenner.jpg"> <!-- random image -->
                <div class="caption center-align">
                    <div class="single_home">

                        <h1><em><?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?></em></h1>
                        <h2><b><?= $ligne_titre_cv['titre_cv'] ;?></b></h2>
                        <p><?= $ligne_titre_cv['accroche']; ?></p>

                    </div>
                </div>
            </li>
            <li>
                <img src="img/homebenner.jpg"> <!-- random image -->
                <div class="caption center-align">
                    <div class="single_home">
                        <h1><em><?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?></em></h1>
                        <h2><b><?= $ligne_titre_cv['titre_cv'] ;?></b></h2>
                        <p><?= $ligne_titre_cv['accroche']; ?></p>

                    </div>
                </div>
            </li>
            <li>
                <img src="img/homebenner.jpg"> <!-- random image -->
                <div class="caption center-align">
                    <div class="single_home">
                        <h1><em><?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?></em></h1>
                        <h2><b><?= $ligne_titre_cv['titre_cv'] ;?></b></h2>
                        <p><?= $ligne_titre_cv['accroche']; ?></p>

                    </div>
                </div>
            </li>
            <li>
                <img src="img/homebenner.jpg"> <!-- random image -->
                <div class="caption center-align">
                    <div class="single_home">
                        <h1><em><?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?></em></h1>
                        <h2><b><?= $ligne_titre_cv['titre_cv'] ;?></b></h2>
                        <p><?= $ligne_titre_cv['accroche']; ?></p>

                    </div>
                </div>
            </li>
        </ul>
    </div>



    <section id="experiences" class="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main_about_area">
                        <div class="head_title center m-y-3 wow fadeInUp">
                            <h2>Expériences professionnelles</h2>
                            <hr>
                        </div>

                        <div class="main_about_content">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                    <?php foreach($ligne_experiences as $ligne_experience) : ?> <!--boucle pour afficher les expériences-->
                                        <div class="main_accordion wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                                            <div class="single_accordion">
                                                <button class="accordion"><?= $ligne_experience['e_titre'];?></button>
                                                <div class="panel">
                                                    <h3><?= $ligne_experience['e_soustitre']; ?></h3>
                                                    <p><?= $ligne_experience['e_description'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <!-- <div class="single_accordion">
                                    <button class="accordion active"><?= $ligne_experience['e_titre'];?></button>
                                    <div class="panel show">
                                    <h3><?= $ligne_experience['e_soustitre']; ?></h3>
                                    <p><em><?= $ligne_experience['e_description'];?></em></p>
                                </div>
                            </div>

                            <div class="single_accordion">
                            <button class="accordion">Lorem ipsum dolor sit amet</button>
                            <div class="panel">
                            <p>Consectetur adipiscing elit. Aliquam sagittis nulla non elit dignissim suscipit. Duis lorem nulla,
                            eleifend Ut urna dui, interdum non blandit sed, hendrerit ultricies mi.
                            Aliquam at scelerisque ligula. Curabitur id laoreet velit.</p>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>
<hr />
<br />
<br />
<br />
<hr />
</section><!-- End of About Section-->



<section id="formations" class="service">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main_service_area">
                    <div class="head_title center m-y-3 wow fadeInUp">
                        <h2>Diplômes et formations</h2>
                        <hr>
                    </div>
                    <div class="row">
                        <?php foreach($ligne_formations as $ligne_formation) : ?> <!--boucle pour afficher les expériences-->
                            <div class="col-md-4">
                                <div class="jumbotron single_service  wow fadeInLeft">
                                    <?php $f_logo = (substr($ligne_formation['f_logo'], 0, 3) == "fa-")? "<i class= 'fa " . $ligne_formation['f_logo'] . "' aria-hidden='true'></i>" : "<img width='20' src='img/" . $ligne_formation['f_logo'] . "' alt=''>"; ?>
                                    <div class="service_icon center">
                                        <p><?= $f_logo ?></p>
                                    </div>

                                    <div class="s_service_text text-sm-center text-xs-center">
                                        <h4><?= $ligne_formation['f_titre']; ?></h4>
                                        <p><?= $ligne_formation['f_description']; ?></p>
                                    </div>

                                    <div class="service_btn center">
                                        <a href="#!" class="btn btn-danger waves-effect waves-red"><?= $ligne_formation['f_dates']; ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <!-- <div class="col-md-4">
                    <div class="jumbotron single_service wow fadeInUp">
                    <div class="service_icon center">
                    <i class="fa fa-pied-piper m-b-3"></i>
                </div>
                <div class="s_service_text text-sm-center text-xs-center">
                <h4>Fully customizable</h4>
                <p>Lorem ipsum dolor sit amet, conse tetuer adipiscing elit, sed diam nonu my nibh euismod
                tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>

            <div class="service_btn center">
            <a href="#!" class="btn btn-danger waves-effect waves-red">See  More</a>
        </div>
    </div>
</div>
<div class="col-md-4">
<div class="jumbotron single_service wow fadeInRight">
<div class="service_icon center">
<i class="fa fa-plug m-b-3"></i>
</div>
<div class="s_service_text text-sm-center  text-xs-center">
<h4>12 themE websites</h4>
<p>Lorem ipsum dolor sit amet, conse tetuer adipiscing elit, sed diam nonu my nibh euismod
tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
</div>

<div class="service_btn center">
<a href="#!" class="btn btn-danger waves-effect waves-red">See  More</a>
</div>
</div>
</div> -->
</div>
</div>
</div>
</div>
</div>
<hr />
</section> <!-- End of service section -->



<section id="joinus" class="joinus">
    <div class="main_joinus_area m-y-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main_joinus_content center white-text wow fadeInUp">
                        <i class="fa fa-user-plus m-b-1"></i>
                        <h2 class="text-uppercase m-b-3"><?= $ligne_texte['t_head']; ?></h2>
                        <p>“ <?= $ligne_texte['t_body']; ?>”</p>

                            <a href="#!" class="btn btn-danger waves-effect waves-red">Join with us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </section> <!-- End of JoinUs section -->



    <section id="competences" class="offer">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="single_about about_progress">
                        <div class="head_title center m-y-3 wow fadeInUp">
                            <h2>Compétences : <br>Back-end</h2>
                            <hr>
                        </div>

                        <div class="skill wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">

                            <?php foreach($ligne_competences_back as $ligne_competence) : ?>
                                <div class="progress">
                                    <div class="lead"><?= $ligne_competence['competence'] .' '. $ligne_competence['c_niveau']; ?> %</div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="<?= $ligne_competence['c_niveau']; ?>%" style="width: <?= $ligne_competence['c_niveau']; ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-md-offset-1">
                    <div class="single_about about_progress">
                        <div class="head_title center m-y-3 wow fadeInUp">
                            <h2>Compétences : <br> Front-end</h2>
                            <hr>
                        </div>
                        <div class="skill wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">

                            <?php foreach($ligne_competences_front as $ligne_competence) : ?>
                                <div class="progress">
                                    <div class="lead"><?= $ligne_competence['competence'] .' '. $ligne_competence['c_niveau']; ?> %</div>
                                    <div class="progress-bar wow fadeInLeft" data-progress="<?= $ligne_competence['c_niveau']; ?>%" style="width: <?= $ligne_competence['c_niveau']; ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr />

    </section>
    <!-- progress end
    progress start -->
    <!-- <div class="progress">
    <div class="lead">App Development 90%</div>
    <div class="progress-bar wow fadeInLeft" data-progress="90%" style="width: 90%;" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
</div> -->
<!-- progress end -->
<!-- progress start -->
<!-- <div class="progress">
<div class="lead">Software Development 85%</div>
<div class="progress-bar wow fadeInLeft" data-progress="<?= $ligne_competence['c_niveau'];?>%" style="width: <?= $ligne_competence['c_niveau'];?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
</div> -->
<!-- progress end -->
<!-- progress start -->
<!-- <div class="progress">
<div class="lead">Graphics Design 80%</div>
<div class="progress-bar wow fadeInLeft" data-progress="80%" style="width: 80%;" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
</div> -->
<!-- progress end -->
<!-- progress start -->
<!-- <div class="progress">
<div class="lead">Marketing 70%</div>
<div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%;" data-wow-duration="1.5s" data-wow-delay="1.2s"></div>
</div> -->
<!-- PROGRESS END -->


<!-- <div class="col-md-6">
<div class="single_offer m-t-3">
<div class="row">
<div class="col-sm-3">
<div class="single_offer_icon">
<i class="fa fa-line-chart"></i>
</div>
</div>
<div class="col-sm-9">
<div class="single_offer_text">
<h3>technical analysis</h3>
<p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single_offer m-t-3">
<div class="row">
<div class="col-sm-3">
<div class="single_offer_icon">
<i class="fa fa-shopping-basket"></i>
</div>
</div>
<div class="col-sm-9">
<div class="single_offer_text">
<h3>technical analysis</h3>
<p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry.</p>
</div>
</div>
</div>
</div>
</div>
End of Offer Section

<!-- <section id="client" class="client">
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="main_client_area">
<div class="head_title center m-y-3 wow fadeInUp">
<h2>CUSTOMER REVIEWS</h2>
</div>
<div class="main_client_content m-b-3">

<div class="carousel carousel-slider">
<div class="carousel-item" >
<div class="single_client_area">
<div class="single_client">
<div class="row">
<div class="col-md-4">
<div class="single_c_img center">
<img class="img-circle" src="img/client1.jpg" alt="" />
</div>
</div>
<div class="col-md-8">
<div class="single_c_text text-md-left text-xs-center">
<h3>Ejazul islam</h3>
<span class="text-uppercase m-b-1">Ejazul islam</span>
<p>“ Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”.......</p>
</div>
</div>
</div>
</div>
<div class="single_client">
<div class="row">
<div class="col-md-4">
<div class="single_c_img center">
<img class="img-circle" src="img/client2.jpg" alt="" />
</div>
</div>
<div class="col-md-8">
<div class="single_c_text text-md-left text-xs-center">
<h3>Iqball Hossain</h3>
<span class="text-uppercase m-b-1">Psd at koitor bidda</span>
<p>“ Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”.......</p>
</div>
</div>
</div>
</div>
</div>
</div><!-- End of carouser item
<div class="carousel-item">
<div class="single_client_area">
<div class="single_client">
<div class="row">
<div class="col-md-4">
<div class="single_c_img center">
<img class="img-circle" src="img/client1.jpg" alt="" />
</div>
</div>
<div class="col-md-8">
<div class="single_c_text text-md-left text-xs-center">
<h3>Ejazul islam</h3>
<span class="text-uppercase m-b-1">Ejazul islam</span>
<p>“ Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”.......</p>
</div>
</div>
</div>
</div>
<div class="single_client">
<div class="row">
<div class="col-md-4">
<div class="single_c_img center">
<img class="img-circle" src="img/client2.jpg" alt="" />
</div>
</div>
<div class="col-md-8">
<div class="single_c_text text-md-left text-xs-center">
<h3>Iqball Hossain</h3>
<span class="text-uppercase m-b-1">Psd at koitor bidda</span>
<p>“ Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”.......</p>
</div>
</div>
</div>
</div>
</div>
</div><!-- End of carouser item
<div class="carousel-item">
<div class="single_client_area">
<div class="single_client">
<div class="row">
<div class="col-md-4">
<div class="single_c_img center">
<img class="img-circle" src="img/client1.jpg" alt="" />
</div>
</div>
<div class="col-md-8">
<div class="single_c_text text-md-left text-xs-center">
<h3>Ejazul islam</h3>
<span class="text-uppercase m-b-1">Ejazul islam</span>
<p>“ Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”.......</p>
</div>
</div>
</div>
</div>
<div class="single_client">
<div class="row">
<div class="col-md-4">
<div class="single_c_img center">
<img class="img-circle" src="img/client2.jpg" alt="" />
</div>
</div>
<div class="col-md-8">
<div class="single_c_text text-md-left text-xs-center">
<h3>Iqball Hossain</h3>
<span class="text-uppercase m-b-1">Psd at koitor bidda</span>
<p>“ Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”.......</p>
</div>
</div>
</div>
</div>
</div>
</div><!-- End of carouser item
<div class="carousel-item">
<div class="single_client_area">
<div class="single_client">
<div class="row">
<div class="col-md-4">
<div class="single_c_img center">
<img class="img-circle" src="img/client1.jpg" alt="" />
</div>
</div>
<div class="col-md-8">
<div class="single_c_text text-md-left text-xs-center">
<h3>Ejazul islam</h3>
<span class="text-uppercase m-b-1">Ejazul islam</span>
<p>“ Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”.......</p>
</div>
</div>
</div>
</div>
<div class="single_client">
<div class="row">
<div class="col-md-4">
<div class="single_c_img center">
<img class="img-circle" src="img/client2.jpg" alt="" />
</div>
</div>
<div class="col-md-8">
<div class="single_c_text text-md-left text-xs-center">
<h3>Iqball Hossain</h3>
<span class="text-uppercase m-b-1">Psd at koitor bidda</span>
<p>“ Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”.......</p>
</div>
</div>
</div>
</div>
</div>
</div><!-- End of carouser item
</div><!-- End of carouser slider
</div>
</div>
</div>
</div>
</div>
<hr />
</section><!-- End of client Section  -->






<section id="realisations" class="team">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main_team_area m-y-3">
                    <div class="head_title center  wow fadeInUp">
                        <h2>Réalisations</h2>
                        <p>Voivi l'apercu de quelques de mes réalisation, inspirations et projet en cours</p>
                    </div>
                    <hr>
                    <div class="main_team_content center">
                        <div class="row">

                            <?php foreach($ligne_realisations as $ligne_realisation) : ?>
                                <div class="col-md-3">
                                    <div class="single_team white-text m-t-2 wow zoomIn">
                                        <img src="img/<?= $ligne_realisation['r_img']; ?>" height="100" alt="team" />
                                        <div class="single_team_overlay">
                                            <h4><?= $ligne_realisation['r_titre']; ?></h4>
                                            <p><?= $ligne_realisation['r_soustitre']; ?></p>
                                            <p><?= $ligne_realisation['r_description']; ?></p>
                                            <p><?= $ligne_realisation['r_dates']; ?></p>
                                            <div class="team_socail">
                                                <a href="#!"><i class="fa fa-facebook"></i></a>
                                                <a href="#!"><i class="fa fa-twitter"></i></a>
                                                <a href="#!"><i class="fa fa-github"></i></a>
                                                <a href="#!"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>

                            <!-- <div class="col-md-3">
                            <div class="single_team white-text m-t-2 wow zoomIn">
                            <img src="img/team2.jpg" alt="team" />
                            <div class="single_team_overlay">
                            <h4>Mahabubul Islam</h4>
                            <p>Html-Coder</p>
                            <div class="team_socail">
                            <a href="#!"><i class="fa fa-facebook"></i></a>
                            <a href="#!"><i class="fa fa-twitter"></i></a>
                            <a href="#!"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#!"><i class="fa fa-dribbble"></i></a>
                            <a href="#!"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="single_team white-text m-t-2 wow zoomIn">
            <img src="img/team3.jpg" alt="team" />
            <div class="single_team_overlay">
            <h4>Mahabubul Islam</h4>
            <p>Html-Coder</p>
            <div class="team_socail">
            <a href="#!"><i class="fa fa-facebook"></i></a>
            <a href="#!"><i class="fa fa-twitter"></i></a>
            <a href="#!"><i class="fa fa-pinterest-p"></i></a>
            <a href="#!"><i class="fa fa-dribbble"></i></a>
            <a href="#!"><i class="fa fa-behance"></i></a>
        </div>
    </div>
</div>
</div>
<div class="col-md-3">
<div class="single_team white-text m-t-2 wow zoomIn">
<img src="img/team4.jpg" alt="team" />
<div class="single_team_overlay">
<h4>Mahabubul Islam</h4>
<p>Html-Coder</p>
<div class="team_socail">
<a href="#!"><i class="fa fa-facebook"></i></a>
<a href="#!"><i class="fa fa-twitter"></i></a>
<a href="#!"><i class="fa fa-pinterest-p"></i></a>
<a href="#!"><i class="fa fa-dribbble"></i></a>
<a href="#!"><i class="fa fa-behance"></i></a>
</div>
</div>
</div>
</div><!-- End of col-sm-3 -->
</div>
</div>
</div>
</div>
</div>
</div>
<hr />
</section><!-- End of Team section -->

<section id="loisirs" class="counter">

    <div class="main_counter_area m-y-3">
        <div class="overlay p-y-3">
            <div class="container">
                <div class="row">

                    <?php foreach($ligne_loisirs as $ligne_loisir) : ?>
                        <div class="main_counter_content center white-text wow fadeInUp">
                            <div class="col-md-3">
                                <div class="single_counter p-y-2 m-t-1">
                                    <?php $l_logo = (substr($ligne_loisir['l_logo'], 0, 3) == "fa-")? "<i class= 'fa " . $ligne_loisir['l_logo'] . "' aria-hidden='true'></i>" : "<img width='20' src='img/" . $ligne_loisir['l_logo'] . "' alt=''>"; ?>
                                    <!-- <h2 class="statistic-counter"><?= $ligne_loisir['l_niveau']; ?></h2> -->
                                    <p><?= $l_logo ?></p>
                                    <p><?= $ligne_loisir['loisir']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- <div class="col-md-3">
                        <div class="single_counter p-y-2 m-t-1">
                        <i class="fa fa-check m-b-1"></i>
                        <h2 class="statistic-counter">400</h2>
                        <p>Check Our</p>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="single_counter p-y-2 m-t-1">
                <i class="fa fa-refresh m-b-1"></i>
                <h2 class="statistic-counter">312</h2>
                <p>repeat client</p>
            </div>
        </div>
        <div class="col-md-3">
        <div class="single_counter p-y-2 m-t-1">
        <i class="fa fa-beer m-b-1"></i>
        <h2 class="statistic-counter">480</h2>
        <p>Pizzas Ordered</p>
    </div>
</div> -->
</div>
</div>
</div>
</div>
</div>
<hr />
</section><!-- End of counter Section -->


<!-- <section id="portfolio" class="portfolio">
<div class="container">
<div class="row">
<div class="main_portfolio_area m-y-3">
<div class="head_title center wow fadeInUp">
<h2>Our Awesome Works</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse
cursus malesuada facilisis.Lorem ipsum dolor sit amet, consectetur facilisis.</p>
</div>

<div class="main_portfolio_content center wow fadeInUp">
<div class="main_mix_menu m-y-2">
<ul class="text-uppercase">
<li class="filter" data-filter="all">Tout</li>
<li class="filter" data-filter=".cat1">Photographie</li>
<li class="filter" data-filter=".cat2">Graphique</li>
<li class="filter" data-filter=".cat3">impression</li>
<li class="filter" data-filter=".cat4">Web</li>
</ul>
</div>

<div id="mixcontent" class="mixcontent  wow zoomIn">
<div class="col-md-4 mix cat4 cat2 cat1 cat3">
<div class="single_mixi_portfolio center">

<?php foreach($ligne_realisations as $ligne_realisation) : ?>
<div class="single_portfolio_img">
<img src="img/pf1.jpg" alt="image de realisation" />
<div class="mixi_portfolio_overlay">
<a href="#!"><i class="fa fa-search"></i></a>
<a href="img/pf1.jpg" class="gallery-img"><i class="fa fa-link"></i></a>
</div>
</div>

<div class="single_portfolio_text">
<h3><?= $ligne_realisation['r_titre']; ?></h3>
<h5><?= $ligne_realisation['r_soustitre']; ?></h5>
<p><?= $ligne_realisation['r_description']; ?></p>
<p><?= $ligne_realisation['r_dates']; ?></p>
</div>
<?php endforeach; ?>
</div>
</div>
</div>
</div>
<div class="col-md-4 mix cat4 cat1">
<div class="single_mixi_portfolio center">
<div class="single_portfolio_img">
<img src="img/pf2.jpg" alt="" />
<div class="mixi_portfolio_overlay">
<a href="#!"><i class="fa fa-search"></i></a>
<a href="img/pf2.jpg" class="gallery-img"><i class="fa fa-link"></i></a>
</div>
</div>
<div class="single_portfolio_text">
<h3>Our Work Image 06</h3>
<p>Lorem ipsum dolor sit amet, consectetur</p>
</div>
</div>
</div>
<div class="col-md-4 mix cat2 cat4">
<div class="single_mixi_portfolio center">
<div class="single_portfolio_img">
<img src="img/pf3.jpg" alt="" />
<div class="mixi_portfolio_overlay">
<a href="#!"><i class="fa fa-search"></i></a>
<a href="img/pf3.jpg" class="gallery-img"><i class="fa fa-link"></i></a>
</div>
</div>
<div class="single_portfolio_text">
<h3>Our Work Image 06</h3>
<p>Lorem ipsum dolor sit amet, consectetur</p>
</div>
</div>
</div>
<div class="col-md-4 mix cat2 cat3">
<div class="single_mixi_portfolio center">
<div class="single_portfolio_img">
<img src="img/pf4.jpg" alt="" />
<div class="mixi_portfolio_overlay">
<a href="#!"><i class="fa fa-search"></i></a>
<a href="img/pf4.jpg" class="gallery-img"><i class="fa fa-link"></i></a>
</div>
</div>
<div class="single_portfolio_text">
<h3>Our Work Image 06</h3>
<p>Lorem ipsum dolor sit amet, consectetur</p>
</div>
</div>
</div>
<div class="col-md-4 mix cat3 cat4">
<div class="single_mixi_portfolio center">
<div class="single_portfolio_img">
<img src="img/pf5.jpg" alt="" />
<div class="mixi_portfolio_overlay">
<a href="#!"><i class="fa fa-search"></i></a>
<a href="img/pf5.jpg" class="gallery-img"><i class="fa fa-link"></i></a>
</div>
</div>
<div class="single_portfolio_text">
<h3>Our Work Image 06</h3>
<p>Lorem ipsum dolor sit amet, consectetur</p>
</div>
</div>
</div>
<div class="col-md-4 mix cat1 cat3">
<div class="single_mixi_portfolio center">
<div class="single_portfolio_img">
<img src="img/pf6.jpg" alt="" />
<div class="mixi_portfolio_overlay">
<a href="#!"><i class="fa fa-search"></i></a>
<a href="img/pf6.jpg" class="gallery-img"><i class="fa fa-link"></i></a>
</div>
</div>
<div class="single_portfolio_text">
<h3>Our Work Image 06</h3>
<p>Lorem ipsum dolor sit amet, consectetur</p>
</div>
</div>
</div><!-- End of col-md-4

</div>
</div>
</div>
</div>
</div>
<hr />
</section><!-- End of Portfolio Section -->

<section id="reseau" class="works">
    <div class="container">
        <div class="row">
            <div class="main_works_area center m-y-4">
                <div class="head_title center wow fadeInUp">
                    <h2>Réseaux sociaux</h2>
                </div>
                <hr>
                <div class="main_works_content p-y-4">
                    <?php foreach($ligne_reseaux as $ligne_reseau) : ?>
                        <div class="col-md-2">
                            <div class="single_works wow zoomIn">
                                <?php $logo = (substr($ligne_reseau['logo'], 0, 3) == "fa-")? "<i class= 'fa " . $ligne_reseau['logo'] . "'-officiel aria-hidden='true'></i>" : "<img width='20' src='img/" . $ligne_reseau['logo'] . "' alt=''>"; ?>
                                <a href="<?= $ligne_reseau['url'];?>" target="_blank"><?= $logo ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- <?= $ligne_reseau['titre']; ?> a rajouté dans limage
                    <div class="col-md-3">
                    <div class="single_works wow zoomIn">
                    <img src="img/works2.png" alt="" />
                </div>
            </div>
            <div class="col-md-3">
            <div class="single_works wow zoomIn">
            <img src="img/works3.png" alt="" />
        </div>
    </div>
    <div class="col-md-3">
    <div class="single_works wow zoomIn">
    <img src="img/works4.png" alt="" />
</div>
</div> -->
</div>

</div>
</div>
</div>
<hr />
</section><!-- End of works Section -->



<!-- <section id="newsletter" class="newsletter">
<div class="container">
<div class="row">
<div class="main_newsletter white-text p-y-2 m-t-3">
<div class="col-md-6 col-sm-12 col-xs-12">
<div class="single_newsletter left m-t-1 text-md-left text-sm-center text-xs-center wow zoomIn">
<p>Subscribe to our newsletter to get every Notify</p>
</div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
<div class="single_newsletter text-md-right text-sm-center wow zoomIn">
<div class="md-form input-group">
<input type="text" class="form-control" placeholder="Search for...">
<span class="input-group-btn">
<button class="btn waves-effect waves-red" type="button"><i class="fa fa-send"></i></button>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section><!-- End of Newsletter section -->



<section id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="main_footer_area white-text p-b-3">
                <div class="single_f_widget m-t-3 wow fadeInUp">
                    <div class="single_f_widget_text f_reatures">
                        <div class="col-lg-offset-2 col-xs-10 col-lg-5 col-md-3">
                            <div class="jumbotron">
                                <div class="row text-center">
                                    <div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12"> </div>
                                    <div class="text-center col-lg-12">
                                        <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                                        <form role="form" id="feedbackForm" class="text-center">
                                            <div class="form-group">
                                                <label for="name">Nom</label>
                                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                                                <span class="help-block" style="display: none;">Merci d'inserer votre nom</span></div>
                                                <div class="form-group">
                                                    <label for="email">E-Mail</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Addresse email">
                                                    <span class="help-block" style="display: none;">Merci de rentrer une adresse email valide</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Message"></textarea>
                                                    <span class="help-block" style="display: none;">Merci de rentrer un message</span>
                                                </div>
                                                <span class="help-block" style="display: none;">Please enter a the security code</span>
                                                <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-lg" style=" margin-top: 10px;">Envoyer</button>
                                        </form>
                                                    <!-- END CONTACT FORM -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="single_f_widget p-t-3 wow fadeInUp">
                        <img src="img/<?= $ligne_utilisateur['logo'];?>" alt="" />
                        <div class="single_f_widget_text">
                            <p><?= $ligne_texte['t_foot']; ?></p>
                                <div class="socail_f_widget">
                                    <a href="https://www.linkedin.com/in/s%C3%A9bastien-miatti-7b6586145/"><i class="fa fa-linkedin"></i></a>
                                    <a href="https://www.facebook.com/Miattisebastien/"><i class="fa fa-facebook"></i></a>
                                    <a href="https://codepen.io/tchikito/" ><i class="fa fa-codepen"></i></a>
                                    <a href="https://twitter.com/SebMiatti" ><i class="fa fa-twitter"></i></a>
                                    <a href="https://github.com/sebastienmiatti" ><i class="fa fa-github"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>



                                <!-- <div class="single_f_widget m-t-3 wow fadeInUp">
                                <h4 class="text-lowercase">Some features</h4>
                                <div class="single_f_widget_text f_reatures">
                                <ul>
                                <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet</li>
                                <li><i class="fa fa-check"></i>Aliquam tincidunt cons ectetuer</li>
                                <li><i class="fa fa-check"></i>Vestibulum auctor dapibus con</li>
                                <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet auctor dapibus</li>
                            </ul>
                        </div>
                    </div> -->

                    <!-- <div class="col-md-3">
                    <div class="single_f_widget m-t-3 wow fadeInUp">
                    <h4 class="text-lowercase">Tags</h4>
                    <div class="single_f_widget_text f_tags">
                    <a href="#!">corporate</a>
                    <a href="#!">agency</a>
                    <a href="#!">portfolio</a>
                    <a href="#!">blog</a>
                    <a href="#!">elegant</a>
                    <a href="#!">professional</a>
                    <a href="#!">business</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        <div class="single_f_widget m-t-3 wow fadeInUp">
        <h4 class="text-lowercase">Flicker Posts</h4>
        <div class="single_f_widget_text f_flicker">
        <img src="img/flipcker1.jpg" alt="" />
        <img src="img/flipcker2.jpg" alt="" />
        <img src="img/flipcker3.jpg" alt="" />
        <img src="img/flipcker4.jpg" alt="" />
        <img src="img/flipcker3.jpg" alt="" />
        <img src="img/flipcker2.jpg" alt="" />
        <img src="img/flipcker4.jpg" alt="" />
        <img src="img/flipcker1.jpg" alt="" />
    </div>
</div>
</div> -->
        </div>
    </div>
</div>
<div class="main_coppyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="copyright_text m-t-2 text-xs-center">
                    <p class="wow zoomIn" data-wow-duration="1s"> Copyright &copy; <a target="_black" href="admin_maison/index.php">&middot;</a> tous droits réservés &middot; Créé par <i class="fa fa-heart"></i> Sébastien miatti<i class="fa fa-heart"></i>
                        <?php
                        $date = date("d-m-Y");
                        $heure = date("H:i");
                        Print("le $date &middot; $heure");
                        ?>
                    </p></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="socail_coppyright text-sm-right m-t-2 text-xs-center wow zoomIn">
                    <a href="https://www.linkedin.com/in/s%C3%A9bastien-miatti-7b6586145/"><i class="fa fa-linkedin"></i></a>
                    <a href="https://www.facebook.com/Miattisebastien/"><i class="fa fa-facebook"></i></a>
                    <a href="https://codepen.io/tchikito/" ><i class="fa fa-codepen"></i></a>
                    <a href="https://twitter.com/SebMiatti" ><i class="fa fa-twitter"></i></a>
                    <a href="https://github.com/sebastienmiatti" ><i class="fa fa-github"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>



<!-- /Start your project here-->


<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/tether.min.js"></script>


<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<!-- Wow js -->
<script type="text/javascript" src="js/wow.min.js"></script>

<!-- Mixitup js -->
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>

<!-- Magnific-popup js -->
<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>

<!-- accordion js -->
<script type="text/javascript" src="js/accordion.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/materialize.js"></script>

<script>
$(".button-collapse").sideNav();
</script>

<!-- wow js active -->
<script type="text/javascript">
new WOW().init();
</script>

<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/main.js"></script>


</body>

</html>
