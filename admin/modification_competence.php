<?php
require 'connexion.php';

// mise a jour d'une compétences
if(isset($_POST['competence'])){// par le nom du premier input
    $competence = addslashes($_POST['competence']);
    $c_niveau = addslashes($_POST['c_niveau']);
    $id_competence = $_POST['id_competence'];

    $pdo->exec("UPDATE t_competences SET competence='$competence', c_niveau='$c_niveau' WHERE id_competence ='$id_competence'");
    header('location: competence.php');
    exit();
}

// je récupère la compétence
$id_competence = $_GET['id_competence']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'"); // la requete est égal a l'id
$ligne_competence = $resultat->fetch();
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
        <h2>modification d'une competence</h2>
        <p><?php echo ($ligne_competence['competence']); ?></p>
        <form action="modification_competence.php" method="POST">
            <label for="competence">Compétence</label>
            <input type="text" name="competence" value="<?php echo $ligne_competence['competence']; ?>">
            <input type="number" name="c_niveau" value="<?php echo $ligne_competence['c_niveau']; ?>">
            <input hidden value="<?php echo $ligne_competence['id_competence']; ?>" name="id_competence">
            <input type="submit" value="mettre a jour">



        </form>
    </body>
</html>
