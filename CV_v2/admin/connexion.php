<?php
session_start();
require_once('inc/parametres.inc.php');

// Connexion à la base de donnée
$pdoCV = new PDO("mysql:host=".HOST.";dbname=".BDD, USER , PASSWORD, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // initialisation de variables
    $titre_page = '';
    $title = 'connexion - Admin';
    $msg = ''; // message pour l'utilisateur


    // chemins
    define('RACINE_SITE', '/cv_V2/admin/');

    require_once('inc/fonctions.inc.php');

    $page = 'connexion';

    if (isset($_GET['action']) && $_GET['action']=='deconnexion'){
        session_destroy();
        unset($_SESSION['utilisateur_bo']);
        header('location:../');
    }

    // if (userAdmin()){
    //     header('location:utilisateur.php');
    // }
    //
    if (!empty($_POST)){


        // verification pseudo
        if (!empty($_POST['email']) && !empty($_POST['mdp'])){
            $resultat = $pdoCV->prepare("SELECT * FROM t_utilisateurs WHERE email = :email");
            $resultat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $resultat->execute();
            if ($resultat->rowCount() > 0){
                // nous aurions pu proposer 2 à 3 variantes de  son pseudo, en ayant vérifié qu'ils sont dispo
                $ligne_utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);

                if (password_verify($_POST['mdp'], $ligne_utilisateur['mdp'])) { // tout est OK
                    foreach($ligne_utilisateur as $key => $val){
                        if ($key != 'mdp'){
                            $_SESSION['utilisateur_bo'][$key] = $val;
                        }
                    }
                    $resultat = $pdoCV->query("SELECT titre_cv FROM t_titre_cv WHERE id_utilisateur=".$_SESSION['utilisateur_bo']['id']);
                    $_SESSION['titre_cv'] = $resultat->fetch(PDO::FETCH_ASSOC);

                    // debug($_SESSION);
                    header("location:index.php");
                }
                else{
                    $msg .= '<div class="erreur">mot de passe erroné.</div>';
                }
            }
            else{
                $msg .= '<div class="erreur">L\'email '.$_POST['email'].' n\'existe pas, Veuillez en choisir un autre.</div>';
            }
        }
        else{
            $msg .=  '<div class="erreur">Veuillez renseigner un email et un mot de passe</div>';
        }
        // -----------------------------------------------------------
    }

    require_once ('inc/head.inc.php');
    // require_once ('inc/nav.inc.php');
    ?>

    <!--  contenu HTML  -->
    <div class="container">
        <div class="row">
            <div id="connexion" class="col-md-4 col-md-offset-4">
                <h1>Connexion</h1>

                <form method="post" action="">
                    <?= $msg; ?>

                    <div class="form-group">

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" id="email" name="email" value="<?= (isset($_POST['email']))?$_POST['email']:'' ?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input class="form-control" type="password" id="mdp" name="mdp"  value="<?= (isset($mdp))?$mdp:'' ?>">
                    </div>

                    <input type="submit" class="btn btn-primary center-block" value="Se connecter">
                </form>
            </div><!-- fin <div class="col-md-4 col-mad-offset-4"> -->
        </div><!-- fin <div class="row">         -->
    </div><!-- fin     <div class="container"> -->


                <?php require_once ('inc/footer.inc.php'); ?>
