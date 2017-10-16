<?php
require 'connexion.php';
?>

<?php
// gestion des contenus de la BDD compétences

// insertion d'une réalisation
if (isset($_POST['competence'])) { // Si on a posté une nouvelle comp.
    if (!empty($_POST['competence']) && !empty($_POST['c_niveau'])) { // Si compétence n'est pas vide
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdo -> exec("INSERT INTO t_realisation VALUES (NULL, '$competence', '$c_niveau', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: realisation.php");
        exit();

        } // ferme le if n'est pas vide

} // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_realisation'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_realisation'];

    $resultat = "DELETE FROM t_realisation WHERE id_realisation = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: realisation.php"); // pour revenir sur la page

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
        <title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
    </head>
    <body>
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
        <p>texte</p>
        <hr>
        <?php
        $resultat = $pdo -> prepare("SELECT * FROM t_realisation WHERE utilisateur_id='1'");
        $resultat->execute();
        $nbr_competences = $resultat->rowCount();
        // $ligne_competence = $resultat -> fetch();
        ?>

        <h2>Les Réalisations</h2>
        <p><b>J'ai <?= $nbr_realisations;?> réalisation<?= ($nbr_realisations>1)?'s' : ''?></p>

        <table border="6">
          <tr>
              <th>Rérealisation</th>
              <th> Niveau </th>
              <th>Suppression</th>
              <th>Modification</th>
          </tr>

          <tr>
          <?php while ($ligne_competence = $resultat -> fetch()) { ?>
              <td><?= $ligne_realisation['id_realisation'];?></td>
              <td><?= $ligne_realisation['r_titre'];?></td>
              <td><a href="realisation.php?id_realisation=<?= $ligne_realisation['id_realisation'];?>">Supprimer</a></td>
              <td><a href="modification_realisation.php?id_realisation=<?= $ligne_realisation['id_realisation'];?>">Modifier</a></td>
          </tr>
          <?php } ?>

        </table>

        <hr>

        <h2>Insertion d'une réalisation</h2>

        <form action="realisation.php" method="post">

            <label for="realisation">Réalisation :</label><br><br>
            <input type="text" name="realisation" id="realisation" placeholder="Insérer une réalisation"><br><br>
            <input type="text" name="c_niveau" id="c_niveau" placeholder="Insérer le niveau"><br><br>
            <input type="submit" value="Insérez">


        </form>
    </body>
</html>
