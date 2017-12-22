<?php
session_start();
// $pdo = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$hote='localhost';
$bdd ='site_colo';
$utilisateur='root';
$passe='';
$identifiant = (isset($_SESSION['connexion'])?$_SESSION['prenom'] . ' ' . $_SESSION['nom']:"");
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);
// $pdoCv est le nom de la variable de la connexion qui sert partout où l'on doit se servir de cette connexion
$pdo -> exec('SET NAMES utf8');

// gestion des contenus de la BDD table utilisateurs
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $resultat -> fetch();

 //à mettre dans toutes les pages de l'admin (même cette page)
    $msg_auth_err=''; // on initialise la variable en cas d'erreur
    // pour déconnecter de l'admin

if(isset($_POST['connexion'])){// on envoie le form avec le name du button(on a cliqué dessus et c'est ce qu'on obtient)
    $email = addslashes($_POST['email']);
    $mdp = addslashes($_POST['mdp']);
    $sql = $pdo->prepare(" SELECT * FROM t_utilisateurs WHERE email=:email AND mdp=:mdp ");
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $sql->execute();
    $nbr_utilisateur =$sql->rowCount(); // on compte les lignes correspondant à la requête de la table ; si le compte est égal à 1, un utilisateur-administrateur a été trouvé ; si le compte est égal à 0, l'utilisateur n'est pas reconnu comme administrateur.
        if($nbr_utilisateur==0){// pas d'utilisateur correspondant
        $msg_auth_err="<div class='alert alert-danger'>Erreur d'authentification !</div>";
    }else{//si on trouve l'utilisateur, il est inscrit
        $ligne_utilisateur = $sql->fetch(); // on cherche ses infos)
        $_SESSION['connexion']='connecté';
        $_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
        $_SESSION['prenom']=$ligne_utilisateur['prenom'];
        $_SESSION['nom']=$ligne_utilisateur['nom'];

        header('location: index.php');
    }//fermeture du else
}// ferme le isset

// inclusiondu header
require('inc/header.inc.php');

?>
 <div class="container">
         <div class="row conexion">
             <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-4">
 				<?= $msg_auth_err; ?>
                 <div class="panel panel-default ">
                     <div class="text-center panel-heading panel-title">Se connecter</div>
                     <div class="panel-body">
                     <form action="connexion.php"  method="post">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                     <div class="input-group-addon">
                                         <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                     </div>
                                     <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-12">
                                 <div class="form-group">
                                     <div class="input-group mb-2 mr-sm-2 mb-sm-0 " >
                                         <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                         </div>
                                         <input type="text" class="form-control input" id="mdp" name="mdp" placeholder="Mot de passe">
                                     </div>
                                 </div>
                              <div>
                                  <div class="form-group">
                                 <input class= "btn btn-primary btn-block" name="connexion" id="connexion" type="submit" value="connexion"/>
                             </div>
                              <!-- <div class="col-md-offset-0">
                                  <small id="mdplost" class="form-text text-muted">
                                      <a href="#">Mot de passe oublié ?</a>
                                  </small>
                             </div> -->
                         </div>
                  </form>
             </div>
         </div>
     </div>
 </div>


 <?php require('inc/footer.inc.php'); ?>
