<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'une expérience - ';
$page = 'modifexperience';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(!empty($_POST) ){// si on a posté une nouvelle formation
    debug($_POST);
    if(!empty($_POST['e_dates']) && !empty($_POST['e_description']) && !empty($_POST['e_soustitre']) && !empty($_POST['e_titre'])){
        debug($_POST);
        $e_dates = htmlspecialchars($_POST['e_dates']);
        $e_description = htmlspecialchars($_POST['e_description']);
        $e_soustitre = htmlspecialchars($_POST['e_soustitre']);
        $e_titre = htmlspecialchars($_POST['e_titre']);
        $id = $_POST['id'];
        $res = $pdoCV->prepare("UPDATE t_experiences SET e_titre = :e_titre, e_soustitre = :e_soustitre , e_dates = :e_dates , e_description =:e_description WHERE id=:id");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        $res -> bindParam(':e_titre', $e_titre, PDO::PARAM_STR);
        $res -> bindParam(':e_soustitre', $e_soustitre, PDO::PARAM_STR);
        $res -> bindParam(':e_dates', $e_dates, PDO::PARAM_STR);
        $res -> bindParam(':e_description', $e_description, PDO::PARAM_STR);
        $res -> bindParam(':id', $id, PDO::PARAM_INT);
        $res -> execute();
        header("location: experiences.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_experiences WHERE id = :id");
    $resultat->execute(array(':id' => $id));
    $ligne_experience = $resultat->fetch();
    $e_titre = $ligne_experience['e_titre'];
    $e_soustitre = $ligne_experience['e_soustitre'];
    $e_dates = $ligne_experience['e_dates'];
    $e_description = $ligne_experience['e_description'];
}

?>
<main class="container-fluid">

    <h3>Modification de l'expérience <?= $e_titre ?></h3>

    <form method="post" action="" class="form-inline">

        <input class="form-control"  type="hidden" name="id" value="<?= $ligne_experience['id'] ?>">

        <div class="form-group">
            <input class="form-control" type="text" name="e_titre" value="<?= $ligne_experience['e_titre'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="e_soustitre" value="<?= $ligne_experience['e_soustitre'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="e_dates" value="<?= $ligne_experience['e_dates'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="e_description" value="<?= $ligne_experience['e_description'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</main>

<?php include ('inc/footer.inc.php') ?>
