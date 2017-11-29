<?php
//inclusion du header comprenant l'init
include('inc/header.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

}else{
    header('location: connexion.php');
}

// gestion des contenus de la BDD utilisateur
$resultat = $pdo -> prepare("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$resultat->execute();
$nbr_utilisateur = $resultat->rowCount();
// $ligne_realisation = $resultat -> fetch();


// insertion d'un utilisateur
if (isset($_POST['utilisateur']))
    { // Si on a posté un nouveau utilisateur.
        if (!empty($_POST['utilisateur']))
            { // Si l'entrée d'un utilisateur n'est pas vide
                $utilisateur = addslashes($_POST['utilisateur']);
                $prenom = addslashes($_POST['prenom']);
                $nom = addslashes($_POST['nom']);
                $email = addslashes($_POST['email']);
                $telephone = addslashes($_POST['telephone']);
                $mdp = addslashes($_POST['mdp']);
                $pseudo = addslashes($_POST['pseudo']);
                $avatar = addslashes($_POST['avatar']);
                $age = addslashes($_POST['age']);
                $date_naissance = addslashes($_POST['date_de_naiss']);
                $sexe = addslashes($_POST['sexe']);
                $etat_civil = addslashes($_POST['etat_civil']);
                $adresse = addslashes($_POST['adresse']);
                $code_postal = addslashes($_POST['code_postal']);
                $ville = addslashes($_POST['ville']);
                $pays = addslashes($_POST['pays']);
                $site_web = addslashes($_POST['site_web']);
                $pdo -> exec("UPDATE INTO t_utilisateurs VALUES (NULL, '$utilisateur', '$prenom', '$nom', '$email', '$telephone', '$mdp', '$pseudo', '$avatar', '$age', '$date_naissance', '$sexe', '$etat_civil', '$adresse', '$code_postal', '$ville', '$pays', '$site_web', '1')");
                //mettre $id_utilisateur quand on l'aura dans la variable de session
                header("location: utilisateur.php");
                exit();
            } // ferme le if n'est pas vide
    } // ferme le if(isset) du form

// Suppression d'un utilisateur
if (isset($_GET['id_utilisateur'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_utilisateur'];
    $resultat = "DELETE FROM t_utilisateurs WHERE id_utilisateur = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: utilisateur.php"); // pour revenir sur la page
} // ferme le if(isset)

?>

<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des Utilisateurs</b></div>
</div>


<div class="col-sm-4 col-md-6 col-md-offset-3">
    <div class="thumbnail">

        <div class="caption">
            <div class="panel panel-info">
                <div class="panel-heading">J'ai <?= $nbr_utilisateur;?> utilisateur<?= ($nbr_utilisateur>1)?'s' : ''?></div>
            </div>
            <img src="..." alt="..."/>
                <?php while ($ligne_utilisateur = $resultat -> fetch()) : ?>
                    <h3><?= $ligne_utilisateur['nom'];?> <?= $ligne_utilisateur['prenom'];?></h3>
                    <p><?= $ligne_utilisateur['nom'];?></p>
                    <p><?= $ligne_utilisateur['prenom'];?></p>
                    <p class="hidden"><?= $ligne_utilisateur['id_utilisateur'];?></p>
                    <p><?= $ligne_utilisateur['email'];?></p>
                    <p><?= $ligne_utilisateur['telephone'];?></p>
                    <p><?= $ligne_utilisateur['mdp'];?></p>
                    <p><?= $ligne_utilisateur['pseudo'];?></p>
                    <p><?= $ligne_utilisateur['age'];?></p>
                    <p><?= $ligne_utilisateur['date_naissance'];?></p>
                    <p><?= $ligne_utilisateur['sexe'];?></p>
                    <p><?= $ligne_utilisateur['etat_civil'];?></p>
                    <p><?= $ligne_utilisateur['adresse'];?></p>
                    <p><?= $ligne_utilisateur['code_postal'];?></p>
                    <p><?= $ligne_utilisateur['ville'];?></p>
                    <p><?= $ligne_utilisateur['pays'];?></p>
                    <p><?= $ligne_utilisateur['site_web'];?></p>

                <td><a href="modification_utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur'];?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></td>
                <td><a href="utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>

                <?php endwhile ?>
        </div>
    </div>
</div>


</div>

        <div class="panel-footer text-center">
            <a href="inscription.php">Insertion d'un nouvel utilisateur</a>
        </div>

    <?php require('inc/footer.inc.php');?>
