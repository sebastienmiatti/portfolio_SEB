<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'un titre du CV- ';
$page = 'modiftitrecv';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

//
if(!empty($_POST) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['titre_cv']) && !empty($_POST['accroche']) && !empty($_POST['logo'])){
        $id = htmlspecialchars($_POST['id']);
        $titre_cv = htmlspecialchars($_POST['titre_cv']);
        $accroche = htmlspecialchars($_POST['accroche']);
        $logo = htmlspecialchars($_POST['logo']);
        $pdoCV->exec("UPDATE t_titre_cv SET titre_cv = '$titre_cv', accroche = '$accroche', logo = '$logo' WHERE id=$id");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: titre_cv.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_titre_cv WHERE id = :id");
    $resultat->execute(array(':id' => $id));
    $ligne_titre_cv = $resultat->fetch();
    $titre_cv = $ligne_titre_cv['titre_cv'];
}

?>
<main class="container-fluid">
    <h3>Modification du titre <?= $titre_cv ?></h3>

    <form method="post" action="" class="form-inline">

        <input class="form-control" type="hidden" name="id" value="<?= $ligne_titre_cv['id'] ?>">

        <div class="form-group">
            <input class="form-control" type="text" name="titre_cv" value="<?= $ligne_titre_cv['titre_cv'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="accroche" value="<?= $ligne_titre_cv['accroche'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="logo" value="<?= $ligne_titre_cv['logo'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</main>
<?php include ('inc/footer.inc.php') ?>
