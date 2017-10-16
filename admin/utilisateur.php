<?php
require 'connexion.php';
?>

<?php
// gestion des contenus de la BDD compétences

// insertion d'une compétence
if (isset($_POST['utilisateur'])) { // Si on a posté une nouvelle comp.
    if (!empty($_POST['utilisateur'])) { // Si compétence n'est pas vide
        $utilisateur = addslashes($_POST['utilisateur']);
        $pdo -> exec("INSERT INTO t_utilisateurs VALUES (NULL, '$utilisateur', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: utilisateur.php");
        exit();

        } // ferme le if n'est pas vide

} // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_utilisateur'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_utilisateur'];

    $resultat = "DELETE FROM t_utilisateurs WHERE id_utilisateur = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: utilisateur.php"); // pour revenir sur la page

} // ferme le if(isset)

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= ($ligne_utilisateur['prenom']); ?></title>
    </head>
    <body>
        <h1>Admin : <?= ($ligne_utilisateur['pseudo']); ?></h1>
        <p>texte</p>
        <hr>
        <?php
        $resultat = $pdo -> prepare("SELECT * FROM t_utilisateurs WHERE utilisateur_id='1'");
        $resultat->execute();
        $nbr_utilisateur = $resultat->rowCount();
        // $ligne_competence = $resultat -> fetch();
        ?>

        <h2>Les loisirs</h2>
        <p><b>J'ai <?= $nbr_utilisateur;?> utilisateur<?= ($nbr_utilisateur>1)?'s' : ''?></p>

        <table border="6">
          <tr>
              <th>Utilisateur</th>
              <th>Prenom</th>
              <th>Nom</th>
              <th>Email</th>
              <th>Telephone</th>
              <th>Mdp</th>
              <th>Pseudo</th>
              <th>Avatar</th>
              <th>Age</th>
              <th>Date de naissance</th>
              <th>Sexe</th>
              <th>Etat civil</th>
              <th>Adresse</th>
              <th>Code postal</th>
              <th>Ville</th>
              <th>Pays</th>
              <th>Site web</th>
              <th>Suppression</th>
              <th>Modification</th>
          </tr>

          <tr>
          <?php while ($ligne_utilisateur = $resultat -> fetch()) { ?>
              <td><?= $ligne_utilisateur['utilisateur'];?></td>
              <td><a href="utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur'];?>">Supprimer</a></td>
              <td><a href="modification_utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur'];?>">Modifier</a></td>
          </tr>
          <?php } ?>

        </table>

        <hr>

        <h2>Insertion d'un utilisateur</h2>

        <form action="utilisateur.php" method="post">

            <label for="utilisateur">Utilisateurs :</label><br><br>
            <input type="text" name="utilisateur" id="utilisateur" placeholder="Insérer un utilisateur"><br><br>
            <input type="submit" value="Insérez">


        </form>
    </body>
</html>
