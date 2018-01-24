<?php
require_once('inc/init.inc.php');

$titre_page = 'Titrailles - ';
$page = 'titrailles';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

$req= $pdoCV->prepare("SELECT * FROM t_titre_CV");
$req->execute();
$nbr_titre_cv = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une titre_CV
if(isset($_POST['titre_cv']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['titre_cv']) && !empty($_POST['accroche']) && !empty($_POST['logo'])){
        $titre_cv = htmlspecialchars($_POST['titre_cv']);
        $accroche = htmlspecialchars($_POST['accroche']);
        $logo = htmlspecialchars($_POST['logo']);
        $pdoCV->exec("INSERT INTO t_titre_cv VALUES (NULL,'$titre_cv','$accroche','$logo','1')");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: titre_cv.php");//pour revenir sur la page
        exit();

    }
}

//suppression d'une compétence

if(isset($_GET['id'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id'];// je mets cela dans une variable

    $req="DELETE FROM t_titre_cv WHERE id = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: titre_cv.php");

}//Ferme le if isset

?>
<main class="container-fluid">

    <h2>Il <?= ($nbr_titre_cv==0)?'n\'':'' ?>y a <?= ($nbr_titre_cv==0)?'aucun':$nbr_titre_cv; ?> titre<?= ($nbr_titre_cv>1)?'s':'' ?> cv</h2>
    <section class="row">
        <div class="col-md-3">
            <table class="table table-bordered">

                <tr>

                    <th class="text-center">titre</th>
                    <th class="text-center">accroche</th>
                    <th class="text-center">logo</th>
                    <th class="text-center">Actions</th>
                </tr>
                <?php while($ligne_titre_cv = $req->fetch()) : ?>

                    <tr>
                        <td><?= $ligne_titre_cv['titre_cv']; ?></td>
                        <td><?= $ligne_titre_cv['accroche']; ?></td>
                        <td><?= $ligne_titre_cv['logo']; ?></td>
                        <td class="text-center">
                            <a href="modif_titre_cv.php?id=<?= $ligne_titre_cv['id'] ?>">
                                <button type="button" class="btn btn-info">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                            </a>
                            <a href="titre_cv.php?id=<?= $ligne_titre_cv['id'];?>">
                                <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </section>
    <section>

        <h3>Insertion d'un titre cv</h3>
        <form method="post" action="" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="titre_cv" id="titre_cv" placeholder="Inserez un titre cv">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="accroche" placeholder="Inserez une accroche">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="logo" placeholder="Inserez un logo">
            </div>
            <button type="submit" class="btn btn-primary">Insérer</button>
        </form>
    </section>
</main>

<?php include ('inc/footer.inc.php') ?>
