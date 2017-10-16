<?php
require 'connexion.php';

// mise a jour d'un loisir
if(isset($_POST['utilisateurs'])){// par le nom du premier input
    $utilisateur = addslashes($_POST['utilisateur']);

    $id_utilisateur = $_POST['id_loisir'];

    $pdo->exec("UPDATE t_utilisateurs SET loisir='$utilisateurs', id_loisir='$id_utilisateur' WHERE id_utilisateur ='$id_utilisateur'");
    header('location: utilisateurs.php');
    exit();
}

// je récupère le loisir
$id_utilisateur = $_GET['id_utilisateur']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'"); // la requete est égal a l'id
$ligne_utilisateur = $resultat->fetch();
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
        <h2>modification d'un utilisateur</h2>
        <p><?php echo ($ligne_utilisateurs['utilisateur']); ?></p>
        <form action="modification_utilisateur.php" method="POST">
            <label for="utilisateur">Utilisateur</label>
            <input type="text" name="utilisateur" value="<?php echo $ligne_utilisateur['utilisateur']; ?>">
            <input hidden value="<?php echo $ligne_utilisateur['id_utilisateur']; ?>" name="id_utilisateur">
            <input type="submit" value="Mettre à jour">

        </form>
    </body>
</html>
