<?php

//inclusion du header comprenant l'init
require('inc/init.inc.php');

// if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
//     $id_utilisateur = $_SESSION['id_utilisateur'];
//     $prenom = $_SESSION['prenom'];
//     $nom = $_SESSION['nom'];
//
// }else{
//     header('location: connexion.php');
// }

// gestion des contenus de la BDD réalisations
$resultat = $pdo -> prepare("SELECT * FROM t_commentaires ORDER BY id_commentaire DESC");
$resultat->execute();
$nbr_commentaires = $resultat->rowCount();
// $ligne_commentaire = $resultat -> fetch();

// insertion d'un commentaire
if (isset($_POST['co_nom']))
    { // Si on a posté une nouvelle comp.
    if (!empty($_POST['co_nom']) && !empty($_POST['co_sujet']) && !empty($_POST['co_email']) && !empty($_POST['co_message']))
        { // Si réalisation n'est pas vide
            $id_commentaire = $_POST['id_commentaire'];
            $co_nom = addslashes($_POST['co_nom']);
            $co_email = addslashes($_POST['co_email']);
            $co_sujet = addslashes($_POST['co_sujet']);
            $co_message = addslashes($_POST['co_message']);

            $pdo->exec("INSERT INTO t_commentaires VALUES (NULL, '$co_nom', '$co_email', '$co_sujet', '$co_message')");
            header("location: contact.php");
            exit();
        } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'un commentaire
if (isset($_GET['id_commentaire'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_commentaire'];
    $resultat = "DELETE FROM t_commentaires WHERE id_commentaire = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: contact.php"); // pour revenir sur la page
} // ferme le if(isset)

//inclusion du header
require('inc/header.inc.php');
?>
<hr>
<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des commentaires</b></div>
</div>
<hr>

<div class="row">
    <div class="col-md-9">
    <div class="panel panel-info">
        <div class="panel-heading"> J'ai <?= $nbr_commentaires;?> commentaire<?= ($nbr_commentaires>1)?'s' : ''?></div>
        <div class="panel-body">
            <table class="table table-bordered table-hover" border="2">

                <tr>
                  <th>Commentaire</th>
                  <th>Titre</th>
                  <th>Sous-titre</th>
                  <th>Sujet</th>
                  <th>Description</th>
                  <th>Suppression</th>
                </tr>

                <tr>
                  <?php while ($ligne_commentaire = $resultat -> fetch()) : ?>
                      <td><?= $ligne_commentaire['id_commentaire'];?></td>
                        <td><?= $ligne_commentaire['co_nom'];?></td>
                        <td><?= $ligne_commentaire['co_email'];?></td>
                        <td><?= $ligne_commentaire['co_sujet'];?></td>
                        <td><?= $ligne_commentaire['co_message'];?></td>
                        <td><a href="contact.php?id_commentaire=<?= $ligne_commentaire['id_commentaire'];?>"><button type="button" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                </tr>
                  <?php endwhile ?>

    </table>
        </div>
    </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-primary">
        <div class="panel-heading">Insertion d'un commentaire</div>
            <div class="panel-body">
                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <label for="co_nom">Titre du commentaire :</label>
                        <input type="text" name="co_nom" class="form-control" id="co_nom" placeholder="Insérer un titre">
                    </div>
                    <div class="form-group">
                        <label for="co_email">Sous-titre</label>
                        <input type="text" name="co_email" class="form-control" id="co_email" placeholder="Insérer un sous-titre">
                    </div>
                    <div class="form-group">
                        <label for="co_sujet">Date</label>
                        <input type="text" name="co_sujet" class="form-control" id="co_sujet" placeholder="Insérer une date">
                    </div>
                    <div class="form-group">
                        <label for="co_message">Description</label>
                        <textarea class="form-control" name="co_message"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success btn-block" value="Insérez">
                </form>
            </div>
        </div>
    </div>
</div>
<hr>

<?php require('inc/footer.inc.php');?>
