<?php
//inclusion du header comprenant l'init
include('inc/header.inc.php');

$resultat = $pdo -> prepare("SELECT * FROM t_realisations WHERE utilisateur_id='1'");
$resultat->execute();
$nbr_realisations = $resultat->rowCount();
// $ligne_competence = $resultat -> fetch();


// gestion des contenus de la BDD compétences

// insertion d'une réalisation
if (isset($_POST['id_realisation'])) { // Si on a posté une nouvelle comp.
    if (!empty($_POST['id_realisation']) && !empty($_POST[''])) { // Si compétence n'est pas vide
        $competence = addslashes($_POST['id_realisation']);
        $r_titre = addslashes($_POST['r_titre']);
        $r_soustitre = addslashes($_POST['r_soustitre']);
        $r_dates = addslashes($_POST['r_dates']);
        $r_description = addslashes($_POST['r_description']);
        $pdo -> exec("INSERT INTO t_realisation VALUES (NULL, '$competence', '$c_niveau', '$r_titre', '$r_soustitre', '$r_dates', '$r_description')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: realisation.php");
        exit();

        } // ferme le if n'est pas vide

} // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_realisation'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_realisation'];

    $resultat = "DELETE FROM t_realisations WHERE id_realisation = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: realisation.php"); // pour revenir sur la page

} // ferme le if(isset)

?>

        <h2>Liste des Réalisations</h2>
        <p><b>J'ai <?= $nbr_realisations;?> réalisation<?= ($nbr_realisations>1)?'s' : ''?></p>

        <table border="6">
          <tr>
              <th>Réalisation</th>
              <th>Titre</th>
              <th>Sous-titre</th>
              <th>Dates</th>
              <th>Description</th>
              <th>Suppression</th>
              <th>Modification</th>
          </tr>

          <tr>
          <?php while ($ligne_competence = $resultat -> fetch()) { ?>
              <td><?= $ligne_realisation['id_realisation'];?></td>
              <td><?= $ligne_realisation['r_titre'];?></td>
              <td><?= $ligne_realisation['r_soustitre'];?></td>
              <td><?= $ligne_realisation['r_dates'];?></td>
              <td><?= $ligne_realisation['r_description'];?></td>
              <td><a href="realisation.php?id_realisation=<?= $ligne_realisation['id_realisation'];?>">Supprimer</a></td>
              <td><a href="modification_realisation.php?id_realisation=<?= $ligne_realisation['id_realisation'];?>">Modifier</a></td>
          </tr>
          <?php } ?>

        </table>

        <hr>

        <h2>Insertion d'une réalisation</h2>

        <form action="realisation.php" method="post">

            <label for="realisation">Réalisation :</label><br><br>
            <input type="text" name="id_realisation" id="id_realisation" placeholder="Insérer une réalisation"><br><br>
            <input type="text" name="r_titre" id="r_titre" placeholder="Insérer un titres"><br><br>
            <input type="text" name="r_soustitre" id="r_soustitre" placeholder="Insérer un sous-titre"><br><br>
            <input type="text" name="r_dates" id="r_dates" placeholder="Insérer une date"><br><br>
            <input type="text" name="r_description" id="r_description" placeholder="Insérer une description"><br><br>
            <input type="submit" value="Insérez">


        </form>
    </body>
</html>
