<?php
require_once('inc/init.inc.php');

$titre_page = 'Loisirs - ';
$page = 'loisirs';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

$req= $pdoCV->prepare("SELECT * FROM t_loisirs");
$req->execute();
$nbr_loisirs = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une loisir
if(isset($_POST['loisir']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['loisir'])){
        $loisir = htmlspecialchars($_POST['loisir']);
        $pdoCV->exec("INSERT INTO t_loisirs VALUES (NULL,'$loisir','1')");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: loisirs.php");//pour revenir sur la page
        exit();
    }
}

//suppression d'une compétence
if(isset($_GET['id'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id'];// je mets cela dans une variable

    $req="DELETE FROM t_loisirs WHERE id = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: loisirs.php");

}//Ferme le if isset

?>
<main class="container-fluid">
    <section>

        <h2>il y a <?= ($nbr_loisirs==0)?'aucun':$nbr_loisirs; ?> loisir<?= ($nbr_loisirs>1)?'s':'' ?></h2>

        <div class="row">
            <div class="col-md-3">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Loisirs</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php while($ligne_loisir = $req->fetch()) : ?>

                        <tr>
                            <td><?= $ligne_loisir['loisir']; ?></td>
                            <td class="text-center">
                                <a href="modif_loisir.php?id=<?= $ligne_loisir['id'] ?>">
                                    <button type="button" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="loisirs.php?id=<?= $ligne_loisir['id'];?>">
                                    <button type="button" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>

                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </section>
    <section>

        <h3>Insertion d'un loisir</h3>

        <form method="post" action="" class="form-inline">
            <div class="form-group">
                <input type="text" name="loisir" id="loisir" placeholder="Inserez une loisir">
            </div>
            <button type="submit" class="btn btn-primary">Inserez</button>
        </form>
    </section>
</main>

<?php include ('inc/footer.inc.php') ?>
