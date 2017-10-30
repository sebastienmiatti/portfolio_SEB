<?php
//inclusion du header comprenant l'init
require('inc/header.inc.php');

// gestion des contenus de la BDD loisir
$resultat = $pdo -> prepare("SELECT * FROM t_loisirs WHERE utilisateur_id='1'");
$resultat->execute();
$nbr_loisir = $resultat->rowCount();
// $ligne_competence = $resultat -> fetch();


// insertion d'une compétence
if (isset($_POST['loisir']))
    { // Si on a posté une nouvelle comp.
    if (!empty($_POST['loisir']))
        { // Si compétence n'est pas vide
            $loisir = addslashes($_POST['loisir']);
            $pdo -> exec("INSERT INTO t_loisirs VALUES (NULL, '$loisir', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
            header("location: loisirs.php");
            exit();
        } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_loisir']))
    { // on récupère la comp. par son id dans l'url
        $efface =  $_GET['id_loisir'];
        $resultat = "DELETE FROM t_loisirs WHERE id_loisir = '$efface'";
        $pdo -> query($resultat); // on peut avec exec aussi si on veut
        header("location: loisirs.php"); // pour revenir sur la page
    } // ferme le if(isset)

?>

    <h1>Admin : <?= ($ligne_utilisateur['pseudo']); ?></h1>
        <p>texte</p>
        <hr>

    <h2>Les loisirs</h2>
        <p><b>J'ai <?= $nbr_loisir;?> loisir<?= ($nbr_loisir>1)?'s' : ''?></p>
            <table border="6">
                <tr>
                    <th>Loisirs</th>
                    <th>Suppression</th>
                    <th>Modification</th>
                </tr>

                <tr>
                    <?php while ($ligne_loisir = $resultat -> fetch())
                        { ?>
                            <td><?= $ligne_loisir['loisir'];?></td>
                            <td><a href="loisirs.php?id_loisir=<?=  $ligne_loisir['id_loisir'];?>">Supprimer</a></td>
                            <td><a href="modification_loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir'];?>">Modifier</a></td>
                </tr>
                    <?php } ?>
            </table>
    <hr>

    <h2>Insertion d'un loisirs</h2>
        <form action="loisirs.php" method="post">
            <label for="loisirs">Loisir :</label><br><br>
            <input type="text" name="loisir" id="loisir" placeholder="Insérer un loisir"><br><br>
            <input type="submit" value="Insérez">
        </form>
    </body>
</html>
