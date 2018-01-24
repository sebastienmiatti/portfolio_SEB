<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'une compétence - ';
$page = 'modifcompetence';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(isset($_POST['competence']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){
        $competence = htmlspecialchars($_POST['competence']);
        $c_niveau = htmlspecialchars($_POST['c_niveau']);
        $id = htmlspecialchars($_POST['id']);
        $pdoCV->exec("UPDATE t_competences SET  competence = '$competence', c_niveau = $c_niveau WHERE id=$id");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: competences.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_competences WHERE id = :id");
    $resultat->execute(array(':id' => $id));
    $ligne_competence = $resultat->fetch();
    $competence = $ligne_competence['competence'];
}

?>
<main class="container-fluid">

    <h3>Modification de la compétence <?= $competence ?></h3>

    <form method="post" action="" class="form-inline">

        <input class="form-control" type="hidden" name="id" value="<?= $ligne_competence['id'] ?>">

        <div class="form-group">
            <input class="form-control"  type="text" name="competence"  value="<?= $ligne_competence['competence'] ?>">
        </div>
        <div class="form-group">
            <input class="form-control"  type="number" name="c_niveau" value="<?= $ligne_competence['c_niveau'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</main>

<?php include ('inc/footer.inc.php') ?>
