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

// mise a jour d'une texte
if(isset($_POST['id_texte']))
{// si on a posté un nouveau texte
	if($_POST['t_head']!='' && $_POST['t_body']!='' && $_POST['t_foot']!='')
    {// par le nom du premier input
    $id_texte = $_POST['id_texte'];
    $t_head = addslashes($_POST['t_head']);
    $t_body = addslashes($_POST['t_body']);
    $t_foot = addslashes($_POST['t_foot']);

    $pdo->exec("UPDATE t_textes SET t_head='$t_head', t_body='$t_body', t_foot='$t_foot' WHERE id_texte ='$id_texte'");
    header('location: texte.php');
    exit();
    }
}

// je récupère les textes
$id_texte = $_GET['id_texte']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_textes WHERE id_texte = '$id_texte'"); // la requete est égal a l'id
$ligne_texte = $resultat->fetch();

?>
    <hr>
    <div class="panel panel-info">
        <div class="panel-heading">modification des textes</div>
        <div class="panel-body">

            <form action="modification_texte.php" method="POST">

                <div class="form-group">
                    <label for="t_head">Texte d'en-tête:</label>
                    <textarea type="text" name="t_head" class="form-control"><?= $ligne_texte['t_head']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="t_body">Texte de corps:</label>
                    <textarea type="text" name="t_body" class="form-control"><?= $ligne_texte['t_body']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="t_foot">Texte de bas de page:</label>
                    <textarea type="text" name="t_foot" class="form-control"><?= $ligne_texte['t_foot']; ?></textarea>
                </div>

                <input hidden value="<?= $ligne_texte['id_texte']; ?>" name="id_texte">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

                <div class="panel-footer">
                    <a href="texte.php">Retour à la page Texte</a>
                </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
