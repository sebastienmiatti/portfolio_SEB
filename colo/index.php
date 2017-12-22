<?php
//on récupère la connexion a la bdd depuis le fichier init
require_once('assets/inc/init.inc.php');

// on récupère la classe Contact
include('assets/inc/Contact.class.php');

// récupération des informations des bdd pour affichage
$resultat = $pdo->query(" SELECT * FROM t_titre_cv WHERE utilisateur_id ='1' ORDER BY id_titre_cv DESC LIMIT 1"); ////ORDER BY id_titre_cv DESC LIMIT 1
$ligne_titre_cv = $resultat->fetch();

$resultat = $pdo->query(" SELECT * FROM t_competences WHERE utilisateur_id ='1'");
$ligne_competences = $resultat->fetchAll(PDO::FETCH_ASSOC);

$resultat = $pdo->query(" SELECT * FROM t_realisations WHERE utilisateur_id ='1' ORDER BY r_dates ASC");
$ligne_realisations = $resultat->fetchAll(PDO::FETCH_ASSOC);

$resultat = $pdo->query(" SELECT * FROM t_experiences WHERE utilisateur_id ='1'");
$ligne_experiences = $resultat->fetchAll(PDO::FETCH_ASSOC);

$resultat = $pdo->query(" SELECT * FROM t_formations WHERE utilisateur_id ='1'");
$ligne_formations = $resultat->fetchAll(PDO::FETCH_ASSOC);

$resultat = $pdo->query(" SELECT * FROM t_reseaux WHERE utilisateur_id ='1'");
$ligne_reseaux = $resultat->fetchAll(PDO::FETCH_ASSOC);

$resultat = $pdo->query(" SELECT * FROM t_loisirs WHERE utilisateur_id ='1'");
$ligne_loisirs = $resultat->fetchAll(PDO::FETCH_ASSOC);

$resultat = $pdo->query(" SELECT * FROM t_textes WHERE utilisateur_id ='1' ORDER BY id_texte DESC LIMIT 1");
$ligne_texte = $resultat->fetch();

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
<html lang="fr" class="no-js" >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Kevin Henry - Miatti Sébastien-developpeur integrateur web technologies-html-css-php-mysql-jquery-javascrip-silex-ajax-boostrap-wordpress " />
    <meta name="author" content="Miatti Sébastien" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- <title><?php $ligne_utilisateur['prenom'];?></title> -->
    <!-- BOOTSTRAP CORE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- ION ICONS STYLES -->
    <link href="assets/css/ionicons.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS STYLES -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- FANCYBOX POPUP STYLES -->
    <link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
    <!-- STYLES FOR VIEWPORT ANIMATION -->
    <link href="assets/css/animations.min.css" rel="stylesheet" />
    <!-- CUSTOM CSS -->
    <link href="assets/css/style-yellow.css" rel="stylesheet" />
    <link href="assets/css/style_admin.css" rel="stylesheet" />
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target="#menu-section">
    <!--MENU SECTION START-->
    <div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/<?= $ligne_titre_cv['logo']; ?>" alt="logo" height="80px" /></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#services">Expériences</a></li>
                    <li><a href="#formations">Formations</a></li>
                    <li><a href="#team">Compétences</a></li>
                    <li><a href="#work">Réalisations</a></li>
                    <!-- <li><a href="#loisirs">Loisirs</a></li> -->
                    <!-- <li><a href="#reseau">Réseaux</a></li> -->
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--MENU SECTION END-->

    <!--HOME SECTION START-->
    <div id="home" >
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
                    <div id="carousel-slider" data-ride="carousel" class="carousel slide  animate-in" data-anim-type="fade-in-up">
                        <div class="carousel-inner">
                            <div class="item active">
                                <h1><?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?></h1>
                                <h2><b><u><?= $ligne_titre_cv['titre_cv'] ;?></u></b></h2>
                                <p><?= $ligne_titre_cv['accroche']; ?></p>
                            </div>

                            <div class="item">
                                <h1><?= $ligne_utilisateur['prenom'];?> <?= $ligne_utilisateur['nom'];?></h1>
                                <h2><b><u><?= $ligne_titre_cv['titre_cv'] ;?></u></b></h2>
                                <p><?= $ligne_titre_cv['accroche']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row animate-in" data-anim-type="fade-in-up">
                <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2 scroll-me">

                    <p >
                        This line is fixed so you can write anything
                    </p>
                    <div class="social">
                        <a target="_blank" href="#" class="btn button-custom btn-custom-one" ><i class="fa fa-facebook "></i></a>
                        <a target="_blank" href="#" class="btn button-custom btn-custom-one" ><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="#" class="btn button-custom btn-custom-one" ><i class="fa fa-linkedin "></i></a>
                    </div>
                    <a href="#services" class=" btn button-custom btn-custom-two">Expériences</a>
                </div>
            </div>
        </div>
    </div>
    <!--HOME SECTION END-->


    <!--SERVICE SECTION START-->
    <section id="services" >
        <div class="container">
            <div class="row text-center header">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                    <h3>Expériences professionnelles</h3>
                    <hr>
                </div>
            </div>
            <div class="row animate-in" data-anim-type="fade-in-up">
                <?php foreach($ligne_experiences as $ligne_experience) : ?> <!--boucle pour afficher les expériences-->
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="services-wrapper text-center">
                        <h2><?= $ligne_experience['e_titre'];?></h2>
                        <i class="fa fa-briefcase"></i>
                        <h3><?= $ligne_experience['e_soustitre']; ?></h3>
                        <p><?= $ligne_experience['e_dates'];?></p>
                        <p><em><?= $ligne_experience['e_description'];?></em></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--SERVICE SECTION END-->


    <!--PRICING SECTION START-->
    <section id="formations" >
        <div class="container">
            <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>Diplômes et formations</h3>
                    <hr />
                </div>
            </div>
            <div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                    <div class="row db-padding-btm db-attached">

                        <?php foreach($ligne_formations as $ligne_formation) : ?> <!--boucle pour afficher les formations-->
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <?php $f_logo = (substr($ligne_formation['f_logo'], 0, 3) == "fa-")? "<i class= 'fa " . $ligne_formation['f_logo'] . "' m-b-3 aria-hidden='true'></i>" : "<img width='20' src='img/" . $ligne_formation['f_logo'] . "' alt=''>"; ?>
                            <div class="light-pricing popular">
                                <div class="price">
                                    <p><?= $f_logo ?></p>
                                </div>
                                <div class="type">
                                    <h3><u><?= $ligne_formation['f_titre']; ?></u></h3>
                                    <p class="petit"><?= $ligne_formation['f_description'];?></p>
                                </div>
                                <ul>
                                    <li><i class="glyphicon glyphicon-time"></i><?= $ligne_formation['f_dates']; ?></li>
                                    <!-- <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li> -->
                                </ul>
                                <div class="pricing-footer">
                                    <!-- <a href="#" class="btn button-custom btn-custom-one">BOOK ORDER</a> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--PRIICING SECTION END-->


    <!--TEAM SECTION START-->
    <section id="team" >
        <div class="container">
            <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>Compétences</h3>
                    <hr />
                </div>
            </div>
                <div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
                            <?php foreach($ligne_competences as $ligne_competence) : ?>
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <div class="team-wrapper">
                                <h2><?= $ligne_competence['competence']; ?></h2>
                                <p><?= $ligne_competence['c_niveau']; ?></p>
                            </div>
                    </div>
                <?php endforeach; ?>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!--TEAM SECTION END-->


    <!--WORK SECTION START-->
    <section id="work" >
        <div class="container">
            <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>Réalisations</h3>
                    <hr>
                </div>
            </div>
            <div class="row text-center animate-in" data-anim-type="fade-in-up" >
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-bottom">
                    <div class="caegories">
                        <a href="#" data-filter="*" class="active btn btn-custom btn-custom-two btn-sm">All</a>
                    </div>
                </div>
            </div>

            <div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
                <?php foreach($ligne_realisations as $ligne_realisation) : ?> <!-- boucle de récupération des images de réalisation ainsi que soit lien url ou lien photo -->
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html">
                    <div class="work-wrapper">
                        <?php $l_rea = (substr($ligne_realisation['r_img'], 0, 4) == "site")? "<a href= 'img/" . $ligne_realisation['r_img'] . "' target='_blank'>" : "<a href='Old_site/" . substr($ligne_realisation['r_img'], 0, strlen($ligne_realisation['r_img']) - 4) . "' target='_blank'>"; ?>
                            <?= $l_rea ?>
                        <a class="fancybox-media" title="Image Title Goes Here" href="assets/img/<?= $ligne_realisation['r_img']; ?>">

                            <img src="assets/img/<?= $ligne_realisation['r_img']; ?>" class="img-responsive img-rounded" alt="" />
                        </a>
                        <h5><?= $ligne_realisation['r_titre']; ?></h5>
                        <p><?= $ligne_realisation['r_soustitre']; ?></p>
                        <p><?= $ligne_realisation['r_description']; ?></p>
                        <p><?= $ligne_realisation['r_dates']; ?></p>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </section>
    <!--WORK SECTION END-->


    <!--CONTACT SECTION START-->
    <section id="contact" >
        <div class="container">
            <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <h3>Contact Details </h3>
                    <hr />

                </div>
            </div>

            <div class="row animate-in" data-anim-type="fade-in-up">

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="contact-wrapper">
                        <h3>Réseaux sociaux</h3>
                        <p>
                            Merci de bien vouloir me laisser un petit commentaire sur mon site via le formulaire de contact ou bien les liens de réseaux sociaux.
                        </p>
                        <div class="social-below">
                            <a target="_blank" href="#" class="btn button-custom btn-custom-two" > Facebook</a>
                            <a target="_blank" href="#" class="btn button-custom btn-custom-two" > Twitter</a>
                            <a target="_blank" href="#" class="btn button-custom btn-custom-two" > Linkedin</a>
                            <a target="_blank" href="http://www.miatti-sebastien.fr" class="btn button-custom btn-custom-two" > développeur web</a>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="contact-wrapper">
                        <form role="form" action="#" id="feedbackForm" class="text-center" method="POST">
                            <div class="form-group">
                                <label for="co_name">Nom</label>
                                <input type="text" class="form-control" id="co_nom" name="co_nom" placeholder="Nom">
                                <span class="help-block" style="display: none;">Merci d'inserer votre nom</span></div>
                                <div class="form-group">
                                    <label for="co_email">E-Mail</label>
                                    <input type="email" class="form-control" id="co_email" name="co_email" placeholder="Addresse email">
                                    <span class="help-block" style="display: none;">Merci de rentrer une adresse email valide</span>
                                </div>
                                <div class="form-group">
                                    <label for="co_sujet">Sujet</label>
                                    <input type="text" class="form-control" id="co_sujet" name="co_sujet" placeholder="Sujet">
                                    <span class="help-block" style="display: none;">Merci de rentrer un sujet correct:</span>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea rows="10" cols="100" class="form-control" id="co_message" name="co_message" placeholder="Message"></textarea>
                                    <span class="help-block" style="display: none;">Merci de rentrer un message</span>
                                </div>
                                <button type="submit" id="feedbackSubmit" class="btn btn-alert btn-lg" style=" margin-top: 10px; color:black;">Envoyer</button>

                            </form>
                            <!-- END CONTACT FORM -->
                        <div class="footer-div" >
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="contact-wrapper">
                        <h3>Contact</h3>
                        <h4><strong>Email : </strong><?php $ligne_utilisateur['email']; ?></h4>
                        <h4><strong>telephone : </strong><?php $ligne_utilisateur['telephone']; ?></h4>
                        <h4><strong>Ville: </strong> <?php $ligne_utilisateur['ville']; ?> </h4>
                        <!-- <h4><strong>Skype : </strong> <?php $ligne_utilisateur['site']; ?> </h4> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="main_coppyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6 col-xs-12">
                        <div class="copyright_text m-t-2 text-xs-center text-center">
                            <p class="wow zoomIn" data-wow-duration="1s"> Copyright &copy; <a target="_black" href="admin/index.php">&middot;</a> tous droits réservés &middot;
                                <?php
                                $date = date("d-m-Y");
                                $heure = date("H:i");
                                Print("le $date &middot; $heure");
                                ?>
                            </p>
                            <p>Créé par <i class="fa fa-code blue"></i> Miatti Sébastien <i class="fa fa-code blue"></i></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6 col-xs-12">
                        <div class="socail_coppyright text-sm-right m-t-2 text-xs-center text-center wow zoomIn">
                            <a href="https://www.linkedin.com/in/s%C3%A9bastien-miatti-7b6586145/"><i class="fa fa-linkedin"></i></a>
                            <a href="https://www.facebook.com/Miattisebastien/"><i class="fa fa-facebook"></i></a>
                            <a href="https://codepen.io/tchikito/" ><i class="fa fa-codepen"></i></a>
                            <a href="https://github.com/sebastienmiatti" ><i class="fa fa-github"></i></a>
                            <a href="https://twitter.com/SebMiatti" ><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CONTACT SECTION END-->

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
    <!-- CORE JQUERY -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- EASING SCROLL SCRIPTS PLUGIN -->
    <script src="assets/js/vegas/jquery.vegas.min.js"></script>
    <!-- VEGAS SLIDESHOW SCRIPTS -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- FANCYBOX PLUGIN -->
    <script src="assets/js/source/jquery.fancybox.js"></script>
    <!-- ISOTOPE SCRIPTS -->
    <script src="assets/js/jquery.isotope.js"></script>
    <!-- VIEWPORT ANIMATION SCRIPTS   -->
    <script src="assets/js/appear.min.js"></script>
    <script src="assets/js/animations.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>

</html>
