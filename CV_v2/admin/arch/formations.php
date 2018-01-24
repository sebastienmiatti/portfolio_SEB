<?php
print_r($_POST);
require_once('inc/init.inc.php');

$titre_page = 'Formations - ';
$page = 'Formations';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

$req= $pdoCV->prepare("SELECT * FROM t_formations");
$req->execute();
$nbr_formations = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une competence
if(!empty($_POST) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['f_titre']) && !empty($_POST['f_soustitre']) && !empty($_POST['f_dates']) && !empty($_POST['f_description'])) {
        $titre = htmlspecialchars($_POST['f_titre']);
        $sous_titre = htmlspecialchars($_POST['f_soustitre']);
        $dates = htmlspecialchars($_POST['f_dates']);
        $description = htmlspecialchars($_POST['f_description']);
        $res = $pdoCV->prepare("INSERT INTO t_formations VALUES (NULL, :titre ,:sous_titre ,:dates ,:description ,'1')");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        $res -> bindParam(':titre', $_POST['f_titre'], PDO::PARAM_STR);
        $res -> bindParam(':sous_titre', $_POST['f_soustitre'], PDO::PARAM_STR);
        $res -> bindParam(':dates', $_POST['f_dates'], PDO::PARAM_STR);
        $res -> bindParam(':description', $_POST['f_description'], PDO::PARAM_STR);
        $res -> execute();

        header("location: formations.php");//pour revenir sur la page
        exit();
    }
}

//suppression d'une compétence
if(isset($_GET['id'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id'];// je mets cela dans une variable

    $req="DELETE FROM t_formations WHERE id = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: formations.php");
}//Ferme le if isset

?>
<main class="container-fluid">

    <section>

        <h2>il <?= ($nbr_formations==0)?'n\'':''; ?>y a <?= ($nbr_formations==0)?'aucune':$nbr_formations; ?> formation<?= ($nbr_formations>1)?'s':'' ?></h2>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Titre</th>
                        <th class="text-center">Sous-titre</th>
                        <th class="text-center">Dates</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php while ($ligne_formation = $req->fetch()) : ?>
                        <tr>
                            <td><?= $ligne_formation['f_titre']; ?></td>
                            <td><?= $ligne_formation['f_soustitre']; ?></td>
                            <td><?= $ligne_formation['f_dates']; ?></td>
                            <td><?= $ligne_formation['f_description']; ?></td>
                            <td class="text-center">
                                <a href="modif_formation.php?id=<?= $ligne_formation['id'] ?>">
                                    <button type="button" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="formations.php?id=<?= $ligne_formation['id'];?>">
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
        <h3>Insertion d'une formation</h3>
        <form method="post" action="" class="form-inline">

            <input type="hidden"  name="id">

            <div class="form-group">
                <input type="text" class="form-control" name="f_titre" placeholder="Inserez un titre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="f_soustitre" placeholder="Inserez le sous-titre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="f_dates" placeholder="Inserez les dates">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="f_description" placeholder="Inserez une description">
            </div>
            <button type="submit" class="btn btn-primary">Insérer</button>
        </form>
    </section>

</main>

<?php include ('inc/footer.inc.php') ?>
