<?php
require 'connexion.php';
?>

<?php
// gestion des contenus de la BDD compétences
$msg = '';

// insertion d'une compétence
if (isset($_POST['competence'])) { // Si on a posté une nouvelle comp.
    if (!empty($_POST['competence']) && !empty($_POST['c_niveau'])) { // Si compétence n'est pas vide
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdo -> exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: competence.php");
        exit();

    } // ferme le if n'est pas vide
    else {
        $msg .= '<p style="padding:5px; background:#6A0000; color:white; width:12%">Veuillez renseigner les champs !</p>';
    }

} // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_competence'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_competence'];

    $resultat = "DELETE FROM t_competences WHERE id_competence = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: competence.php"); // pour revenir sur la page

} // ferme le if(isset)

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $pdo -> query('SELECT * FROM t_utilisateurs');
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
    </head>
    <body>
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
        <p>texte</p>
        <hr>
        <?php
        $resultat = $pdo -> prepare('SELECT * FROM t_competences');
        $resultat->execute();
        $nbr_competences = $resultat->rowCount();

        // $ligne_competence = $resultat -> fetch();
        ?>

        <h2>Les compétences</h2>
        <p><b>J'ai <?= $nbr_competences;?> compétences</p>

        <table border="8">
          <tr>
              <th>Compétences</th>
              <th>Niveau en %</th>
              <th>Suppression</th>
              <th>Modification</th>
          </tr>

          <tr>
          <?php while ($ligne_competence = $resultat -> fetch()) { ?>
              <td><?= $ligne_competence['competence'];?></td>
              <td><?= $ligne_competence['c_niveau'];?></td>
              <td><a href="competence.php?id_competence=<?= $ligne_competence['id_competence'];?>">Supprimer</a></td>
              <td><a href="#">Modifier</a></td>
          </tr>
          <?php } ?>

        </table>

        <hr>

        <h2>Insertion d'une compétence</h2>

        <form action="competence.php" method="post">

            <?= $msg; ?>
            <label for="competence">Compétence :</label><br><br>
            <input type="text" name="competence" id="competence" placeholder="Insérer une compétence"><br><br>

            <input type="text" name="c_niveau" id="c_niveau" placeholder="Insérer le niveau"><br><br>

            <input type="submit" value="Insérez">

        </form>
    </body>
</html>
