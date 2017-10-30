<?php
//inclusion du header comprenant l'init
require('inc/header.inc.php');

// mise a jour d'un loisir
if(isset($_POST['loisir'])){// par le nom du premier input
    $loisir = addslashes($_POST['loisir']);

    $id_loisir = $_POST['id_loisir'];

    $pdo->exec("UPDATE t_loisirs SET loisir='$loisir', id_loisir='$id_loisir' WHERE id_loisir ='$id_loisir'");
    header('location: loisirs.php');
    exit();
}

// je récupère le loisir
$id_loisir = $_GET['id_loisir']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir'"); // la requete est égal a l'id
$ligne_loisir = $resultat->fetch();

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
        <h2>modification d'un loisir</h2>
        <p><?php echo ($ligne_loisir['loisir']); ?></p>
        <form action="modification_loisirs.php" method="POST">
            <label for="loisir">Loisirs</label>
            <input type="text" name="loisir" value="<?php echo $ligne_loisir['loisir']; ?>">
            <input hidden value="<?php echo $ligne_loisir['id_loisir']; ?>" name="id_loisir">
            <input type="submit" value="Mettre à jour">

        </form>
    </body>
</html>
