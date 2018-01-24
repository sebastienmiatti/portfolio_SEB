<?php
require_once('inc/init.inc.php');

$titre_page = 'Expériences - ';
$page = 'experiences';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

$req= $pdoCV->prepare("SELECT * FROM t_experiences");
$req->execute();
$nbr_experiences = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une competence
if(!empty($_POST) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['e_titre']) && !empty($_POST['e_soustitre']) && !empty($_POST['e_dates']) && !empty($_POST['e_description'])) {
        $titre = htmlspecialchars($_POST['e_titre']);
        $sous_titre = htmlspecialchars($_POST['e_soustitre']);
        $dates = htmlspecialchars($_POST['e_dates']);
        $description = htmlspecialchars($_POST['e_description']);
        $pdoCV->exec("INSERT INTO t_experiences VALUES (NULL,'$titre','$sous_titre','$dates','$description','1')");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: experiences.php");//pour revenir sur la page
        exit();
    }
}

//suppression d'une compétence

if(isset($_GET['id'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id'];// je mets cela dans une variable

    $req="DELETE FROM t_experiences WHERE id = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: experiences.php");
}//Ferme le if isset

?>
<main class="container-fluid">

    <section>

        <h2>il <?= ($nbr_experiences==0)?'n\'':''; ?>y a <?= ($nbr_experiences==0)?'aucune':$nbr_experiences; ?> expérience<?= ($nbr_experiences>1)?'s':'' ?></h2>

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
                    <?php while ($ligne_experience = $req->fetch()) : ?>
                        <tr>
                            <td><?= $ligne_experience['e_titre']; ?></td>
                            <td><?= $ligne_experience['e_soustitre']; ?></td>
                            <td><?= $ligne_experience['e_dates']; ?></td>
                            <td><?= $ligne_experience['e_description']; ?></td>
                            <td class="text-center">
                                <a href="modif_experience.php?id=<?= $ligne_experience['id'] ?>">
                                    <button type="button" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
                                </a>
                                <a href="experiences.php?id=<?= $ligne_experience['id'];?>">
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
        <h3>Insertion d'une expérience</h3>
        <form method="post" action="" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="e_titre" placeholder="Inserez un titre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="e_soustitre" placeholder="Inserez le sous-titre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="e_dates" placeholder="Inserez les dates">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="e_description" placeholder="Inserez une description">
            </div>
            <button type="submit" class="btn btn-primary">Insérer</button>
        </form>
    </section>
</main>

<?php include ('inc/footer.inc.php') ?>
