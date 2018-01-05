<?php
require('inc/init.inc.php');

// on récupère la classe Contact
include('inc/Contact.class.php');


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
//     header('location: admin/connexion.php');
// }

// récupération des informations des bdd pour affichage
$sql = $pdo->query(" SELECT * FROM t_titre_cv WHERE utilisateur_id ='1' ORDER BY id_titre_cv DESC LIMIT 1"); ////ORDER BY id_titre_cv DESC LIMIT 1
$ligne_titre_cv = $sql->fetch();

$sql = $pdo->query(" SELECT * FROM t_competences WHERE utilisateur_id ='1'");
$ligne_competences = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_competences WHERE utilisateur_id ='1' AND c_categorie = 'back' ORDER BY c_niveau DESC");
$ligne_competences_back = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_competences WHERE utilisateur_id ='1' AND c_categorie = 'front' ORDER BY c_niveau DESC");
$ligne_competences_front = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_realisations WHERE utilisateur_id ='1' ORDER BY r_dates ASC");
$ligne_realisations = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_experiences WHERE utilisateur_id ='1'");
$ligne_experiences = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_formations WHERE utilisateur_id ='1'");
$ligne_formations = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_reseaux WHERE utilisateur_id ='1'");
$ligne_reseaux = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_partenaires WHERE utilisateur_id ='1'");
$ligne_partenaires = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_loisirs WHERE utilisateur_id ='1'");
$ligne_loisirs = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->query(" SELECT * FROM t_textes WHERE utilisateur_id ='1' ORDER BY id_texte DESC LIMIT 1");
$ligne_texte = $sql->fetch();

//créé un formulaire
//Formulaire/index.php

// on vérifie que le formulaire a été posté
if (!empty($_POST))
{
    // on éclate le $_POST en tableau qui permet d'accéder directement aux champs par des variables
    extract($_POST);

    // on effectue une validation des données du formulaire et on vérifie la validité de l'email
    $valid = (empty($co_nom) || empty($co_email) || !filter_var($co_email, FILTER_VALIDATE_EMAIL) || empty($co_sujet) || empty($co_message)) ? false : true; // écriture ternaire pour if / else
    $erreurnom = (empty($co_nom)) ? 'Indiquez votre nom' : null;
    $erreuremail = (empty($co_email) || !filter_var($co_email, FILTER_VALIDATE_EMAIL)) ? 'Entrez un email valide' : null;
    $erreursujet = (empty($co_sujet)) ? 'Indiquez un sujet' : null;
    $erreurmessage = (empty($co_message)) ? 'Parlez donc !!' : null;

    // si tous les champs sont correctement renseignés
    if($valid)
    {
        // on crée un nouvel objet (ou une instance) de la class Contact.class.php
        $contact = new Contact($pdo);
        // on utilise la méthode insertContact pour insérer en BDD
        $contact->insertContact($co_nom, $co_email, $co_sujet, $co_message);
    }
}

// on utilise la méthode sendMail de la classe Contact.class.php
// $contact->sendEmail($sujet, $email, $message);

// on efface les valeurs du formulaires
// unset($nom);
// unset($sujet);
// unset($message);
// unset($email);
// unset($contact);

// on créé une variable de succès
$success = 'Message envoyé !';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Google analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111096839-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-111096839-1');
    </script>
    <!-- fin google analytics -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Miatti Sébastien - devéloppeur intégrateur web actuellement 'En recherche de stage' ">
    <meta name="author" lang="fr" content="Miatti Sébastien">
    <meta name="keywords" lang="fr" content="Miatti, Sebastien, developpeur, integrateur, web, technologies, html, css, php, MySql, javascript, jQuery, Ajax, Silex, Laravel, Symfony, PhpOO, MVC, wordpress, bootstrap, site, dynamique, Responsive, Adaptive, Paris, ile-de-france, Haut-de-seine, France">
    <!--<meta http-equiv="x-ua-compatible" content="ie=edge">-->
    <!-- Global site tag (gtag.js) - Google Analytics -->



    <title>Site cv- <?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?>  </title>

    <!-- Font Awesome -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,600,300,300italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="icon" href="img/SebLogo.png">
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
    <link href="css/style_admin.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="index.php"><img src="img/<?= $ligne_titre_cv['logo']; ?>" alt="logo" height="80px"/></a>
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
                        <a class="nav-link" href="#partenaire">Partenaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="#contact"><i class="fa fa-search fa-lg"></i></a>
                    </li>
                </ul>

            </div>


            <!-- Content for mobile devices-->
            <div class="navbar-mobile">

                <ul class="side-nav" id="mobile-menu">
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
                        <a class="nav-link" href="#partenaire">Partenaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><i class="fa fa-search fa-lg"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->


    <div id="home" class="slider">
        <ul class="slides">
            <li>
                <img src="img/homebener.jpg" alt="image-fond">
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
                        <h2 class="flow">Expériences professionnelles</h2>
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
                                                <p><?= $ligne_experience['e_dates'];?></p>
                                                <p><em><?= $ligne_experience['e_description'];?></em></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
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
                        <h2 class="flow">Diplômes et formations</h2>
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
                                        <p><?= $ligne_formation['f_description'];?></p>
                                    </div>

                                    <div class="service_btn center">
                                        <div class="btn btn-danger waves-effect waves-red"><?= $ligne_formation['f_dates']; ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr />
</section> <!-- End of service section -->


<section id="reseau" class="works">
    <div class="container">
        <div class="row">
            <div class="main_works_area center m-y-4">
                <div class="head_title center wow fadeInUp">
                    <h2 class="flow">Réseaux sociaux</h2>
                </div>
                <hr>
                <div class="main_works_content p-y-4">
                    <?php foreach($ligne_reseaux as $ligne_reseau) : ?>
                        <div class="col-md-2">
                            <div class="single_works wow zoomIn">
                                <?php $logo = (substr($ligne_reseau['logo'], 0, 3) == "fa-")? "<i class= 'fa " . $ligne_reseau['logo'] . "' aria-hidden='true'></i>" : "<img width='20' src='img/" . $ligne_reseau['logo'] . "' alt=''>"; ?>
                                <a href="<?= $ligne_reseau['url'];?>" target="_blank"><?= $logo ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
    <hr />
</section><!-- End of works Section -->

<section id="joinus" class="joinus">
    <div class="main_joinus_area m-y-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main_joinus_content center white-text wow fadeInUp">
                        <i class="fa fa-envelope m-b-1"></i>
                        <h2 class="text-uppercase m-b-3"><?= $ligne_texte['t_head']; ?></h2>
                        <p>“ <?= $ligne_texte['t_body']; ?>”</p>
                        <a target="_blank" href="img/cv_seb_web.pdf" class="btn btn-danger waves-effect waves-red">Telecharger mon CV</a>
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
                        <h2 class="flickr flow">Compétences : <br>Back-end</h2>
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
                        <h2 class="flickr flow">Compétences : <br> Front-end</h2>
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


<section id="realisations" class="team">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main_team_area m-y-3">
                    <div class="head_title center wow fadeInUp">
                        <h2 class="flow">Réalisations</h2>
                        <p>Voivi l'apercu de quelques de mes réalisation, inspirations et projet en cours</p>
                    </div>
                    <hr>
                    <div class="main_team_content center">
                        <div class="row">
                            <?php foreach($ligne_realisations as $ligne_realisation) : ?> <!-- boucle de récupération des images de réalisation ainsi que soit lien url ou lien photo -->
                                <?php $l_rea = (substr($ligne_realisation['r_img'], 0, 4) == "site")? "<a href= 'img/" . $ligne_realisation['r_img'] . "' target='_blank'>" : "<a href='Old_site/" . substr($ligne_realisation['r_img'], 0, strlen($ligne_realisation['r_img']) - 4) . "' target='_blank'>"; ?>
                                    <?= $l_rea ?>
                                <!-- <a target='_blank' href="" alt=''> -->
                                <!--<a target="_blank" href="Old_site/<?= $ligne_realisation['r_img'];?>"> -->
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="single_team white-text m-t-2 wow zoomIn">
                                            <img src="img/<?= $ligne_realisation['r_img']; ?>" height="250" alt="team" />
                                            <div class="single_team_overlay">
                                                <h5><?= $ligne_realisation['r_titre']; ?></h5>
                                                <p><?= $ligne_realisation['r_soustitre']; ?></p>
                                                <p><?= $ligne_realisation['r_description']; ?></p>
                                                <p><?= $ligne_realisation['r_dates']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
</section><!-- End of Team section -->

<section id="loisirs" class="counter">
    <div class="head_title center wow fadeInUp">
        <h2 class="flow">Loisirs</h2>
    </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
</section><!-- End of counter Section -->


<section id="partenaire" class="offer">
    <div class="container">
        <div class="row">
            <div class="main_works_area center m-y-4">
                <div class="head_title center wow fadeInUp">
                    <h2 class="flow">Partenaires</h2>
                </div>
                <hr>
                <div class="main_works_content p-y-4">
                    <?php foreach($ligne_partenaires as $ligne_partenaire): ?>
                        <div class="col-md-2">
                            <div class="single_works wow zoomIn">
                                <a href="<?= $ligne_partenaire['p_url'];?>" target="_blank"><h6><?= $ligne_partenaire['p_reseau']; ?></h6></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <hr />
</section> <!-- End of works Section -->


<section id="contact" class="footer">
    <div class="container">
        <div class="row">
            <div class="main_footer_area white-text p-b-3">
                <div class="single_f_widget m-t-3 wow fadeInUp">
                    <div class="single_f_widget_text f_reatures">
                        <div class="col-lg-offset-2 col-xs-12 col-lg-5 col-md-12">
                            <div class="jumbotron">
                                <div class="row text-center">
                                    <div class="text-center col-xs-8 col-sm-12 col-md-12 col-lg-12"> </div>
                                    <div class="text-center col-lg-12">
                                        <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                                        <form action="#" id="feedbackForm" class="text-center" method="POST">
                                            <div class="form-group">
                                                <div class="head_title center wow fadeInUp">
                                                    <h2 class="flow">Contactez-moi</h2>
                                                </div>
                                                <label for="co_nom">Nom</label>
                                                <input type="text" class="form-control" id="co_nom" name="co_nom" placeholder="Nom">
                                                <span class="help-block" style="display: none;">Merci d'inserer votre nom</span></div>
                                                <div class="form-group">
                                                    <label for="co_email">E-Mail</label>
                                                    <input type="email" class="form-control" id="co_email" name="co_email" placeholder="Email">
                                                    <span class="help-block" style="display: none;">Merci de rentrer une adresse email valide</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="co_sujet">Sujet</label>
                                                    <input type="text" class="form-control" id="co_sujet" name="co_sujet" placeholder="Sujet">
                                                    <span class="help-block" style="display: none;">Merci de rentrer un sujet correct:</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="co_message">Message</label>
                                                    <textarea rows="10" cols="100" class="form-control" id="co_message" name="co_message" placeholder="Message"></textarea>
                                                    <span class="help-block" style="display: none;">Merci de rentrer un message</span>
                                                </div>
                                                <button type="submit" id="feedbackSubmit" class="btn btn-alert btn-lg" style=" margin-top: 10px;">Envoyer</button>
                                                <?= $success ?>
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
                            <img src="img/<?= $ligne_utilisateur['avatar'];?>" alt="" />
                            <div class="single_f_widget_text">
                                <p><?= $ligne_texte['t_foot']; ?></p>
                                <div class="socail_f_widget">
                                    <a target="_blank" href="https://www.linkedin.com/in/s%C3%A9bastien-miatti-7b6586145/"><i class="fa fa-linkedin"></i></a>
                                    <a target="_blank" href="https://www.facebook.com/Miattisebastien/"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" href="https://codepen.io/tchikito/" ><i class="fa fa-codepen"></i></a>
                                    <a target="_blank" href="https://github.com/sebastienmiatti" ><i class="fa fa-github"></i></a>
                                    <a target="_blank" href="https://twitter.com/SebMiatti" ><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="main_coppyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="copyright_text m-t-2 text-xs-center">
                        <p class="wow zoomIn" data-wow-duration="1s"> Copyright &copy; <a target="_blank" href="admin/index.php">&middot;</a> tous droits réservés &middot; Créé par <i class="fa fa-code"></i> <?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?> <i class="fa fa-code"></i>
                            <?php
                            $date = date("d-m-Y");
                            $heure = date("H:i");
                            Print("le $date &middot; $heure");
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="socail_coppyright text-sm-right m-t-2 text-xs-center wow zoomIn">
                        <a target="_blank" href="https://www.linkedin.com/in/s%C3%A9bastien-miatti-7b6586145/"><i class="fa fa-linkedin"></i></a>
                        <a target="_blank" href="https://www.facebook.com/Miattisebastien/"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="https://codepen.io/tchikito/" ><i class="fa fa-codepen"></i></a>
                        <a target="_blank" href="https://github.com/sebastienmiatti" ><i class="fa fa-github"></i></a>
                        <a target="_blank" href="https://twitter.com/SebMiatti" ><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- /Start your project here-->

<!-- SCRIPTS -->

<!-- JQuery -->
<script src="js/jquery-2.2.3.min.js"></script>

<!-- Bootstrap tooltips -->
<script src="js/tether.min.js"></script>


<!-- Bootstrap core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script src="js/mdb.min.js"></script>

<!-- Wow js -->
<script src="js/wow.min.js"></script>

<!-- Mixitup js -->
<script src="js/jquery.mixitup.min.js"></script>

<!-- Magnific-popup js -->
<script src="js/jquery.magnific-popup.js"></script>

<!-- accordion js -->
<script src="js/accordion.js"></script>

<!-- MDB core JavaScript -->
<script src="js/materialize.js"></script>

<script>
$(".button-collapse").sideNav();
</script>

<!-- wow js active -->
<script>
new WOW().init();
</script>

<script src="js/plugins.js"></script>
<script src="js/waypoints/lib/noframework.waypoints.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>
