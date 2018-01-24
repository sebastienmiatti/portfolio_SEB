<?php
require_once('inc/init.inc.php');

$titre_page = 'Reseaux - ';
$page = 'Reseaux';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

$req= $pdoCV->prepare("SELECT * FROM t_reseaux");
$req->execute();
$nbr_reseaux = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une loisir
if(isset($_POST['nom'])){// si on a posté un nouveau réseau
    if(!empty($_POST['nom'])){
        $nom = htmlspecialchars($_POST['nom']);
        $lien = htmlspecialchars($_POST['lien']);
        $logo = htmlspecialchars($_POST['logo']);
        $pdoCV->exec("INSERT INTO t_reseaux VALUES (NULL,'$nom', '$logo', '$lien','1')");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: reseaux.php");//pour revenir sur la page
        exit();
    }
}

//suppression d'une compétence
if(isset($_GET['id'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id'];// je mets cela dans une variable

    $req="DELETE FROM t_reseaux WHERE id = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: reseaux.php");

}//Ferme le if isset

?>
<main class="container-fluid">
    <section>

        <h2>il <?= ($nbr_reseaux==0)?'n\'':''; ?>y a <?= ($nbr_reseaux==0)?'aucun':$nbr_reseaux; ?> reseau<?= ($nbr_reseaux>1)?'x':'' ?></h2>

        <div class="row">
            <div class="col-md-3">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Lien</th>
                        <th class="text-center">Logo</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php while($ligne_reseau = $req->fetch()) : ?>

                        <tr>
                            <td><?= $ligne_reseau['nom']; ?></td>
                            <td><?= $ligne_reseau['lien']; ?></td>
                            <td><?= $ligne_reseau['logo']; ?></td>
                            <td class="text-center">
                                <a href="modif_reseau.php?id=<?= $ligne_reseau['id'] ?>">
                                    <button type="button" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="reseaux.php?id=<?= $ligne_reseau['id'];?>">
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

        <h3>Insertion d'un réseau</h3>

        <form method="post" action="" class="form-inline">
            <div class="form-group">
                <input type="text" name="nom" id="reseau" placeholder="Insérez le nom d'un réseau">
                <input type="text" name="lien" id="reseau" placeholder="Insérez le lien">
                <input type="text" name="logo" id="reseau" placeholder="Insérez son logo">
            </div>
            <button type="submit" class="btn btn-primary">Inserez</button>
        </form>
    </section>
</main>

<?php include ('inc/footer.inc.php') ?>
