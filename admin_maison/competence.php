<?php
//inclusion du header comprenant l'init
require('inc/header.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

}else{
    header('location: connexion.php');
}

// gestion des contenus de la BDD compétences
$resultat = $pdo -> prepare("SELECT * FROM t_competences WHERE utilisateur_id='1'");
$resultat->execute();
$nbr_competences = $resultat->rowCount();
//$ligne_competence = $resultat -> fetch();


// insertion d'une compétence
if (isset($_POST['competence']))
    { // Si on a posté une nouvelle comp.
        if (!empty($_POST['competence']) && !empty($_POST['c_niveau']))
            { // Si compétence n'est pas vide
                $competence = addslashes($_POST['competence']);
                $c_niveau = addslashes($_POST['c_niveau']);

                $pdo->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
                header("location: competence.php"); // pour revenir sur la page
                exit();
            } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_competence']))
    { // on récupère la comp. par son id dans l'url
        $efface =  $_GET['id_competence'];
        $resultat = "DELETE FROM t_competences WHERE id_competence = '$efface'";
        $pdo -> query($resultat); // on peut avec exec aussi si on veut
        header("location: competence.php"); // pour revenir sur la page
    } // ferme le if(isset)

?>
<hr>
<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des compétences</b></div>
</div>
<hr>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
            <div class="panel-heading">J'ai <?= $nbr_competences;?> compétence<?= ($nbr_competences>1)?'s' : ''?></div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover" border="2">
                        <tr>
                            <th>Compétences</th>
                            <th> Niveau </th>
                            <th>Modification</th>
                            <th>Suppression</th>
                        </tr>

                        <tr>
                            <?php while ($ligne_competence = $resultat -> fetch()) : ?>
                                <td><?= $ligne_competence['competence'];?></td>
                                <td><?= $ligne_competence['c_niveau'];?></td>
                                <td><a href="modification_competence.php?id_competence=<?= $ligne_competence['id_competence'];?>"><button type="button" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></tdModifier</a></td>
                                <td><a href="competence.php?id_competence=<?= $ligne_competence['id_competence'];?>"><button type="button" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                        </tr>
                            <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>

    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Insertion d'une compétence</div>
                <div class="panel-body">
                    <form action="competence.php" method="post">

                        <div class="form-group">
                            <label for="competence">Compétence :</label>
                            <input type="text" name="competence" class="form-control" id="competence" placeholder="Insérer une compétence">
                        </div>

                        <div class="form-group">
                            <label for="c_niveau">Niveau :</label>
                            <input type="text" name="c_niveau" class="form-control" id="c_niveau" placeholder="Insérer le niveau">
                        </div>

                        <input type="submit" class="btn btn-success btn-block" value="Insérez">

                    </form>
                </div>
            </div>
        </div>
    </div>
<hr>
<?php require('inc/footer.inc.php');?>
