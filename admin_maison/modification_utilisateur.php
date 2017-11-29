<?php
//inclusion du header comprenant l'init
include('inc/header.inc.php');

// mise a jour d'un utilisateur
if(isset($_POST['prenom'])){// par le nom du premier input
    $id_utilisateur = $_POST['id_utilisateur'];
    $prenom = addslashes($_POST['prenom']);
    $nom = addslashes($_POST['nom']);
    $email = addslashes($_POST['email']);
    $telephone = addslashes($_POST['telephone']);
    $pseudo = addslashes($_POST['pseudo']);
    $age = addslashes($_POST['age']);
    $date_naissance = addslashes($_POST['date_naissance']);
    $adresse = addslashes($_POST['adresse']);
    $code_postal = addslashes($_POST['code_postal']);
    $ville = addslashes($_POST['ville']);
    $pays = addslashes($_POST['pays']);

    $pdo->exec("UPDATE t_utilisateurs SET prenom = '$prenom', nom ='$nom', email ='$email', telephone ='$telephone', pseudo='$pseudo', age='$age', date_naissance='$date_naissance', adresse='$adresse', code_postal='$code_postal', ville='$ville', pays='$pays' WHERE id_utilisateur = '$id_utilisateur'");
    header('location: utilisateur.php');
    exit();
}

// je récupère le loisir
$id_utilisateur = $_GET['id_utilisateur']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'"); // la requete est égal a l'id
$ligne_utilisateur = $resultat->fetch();
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
        <div class="panel-heading">Modification de : <?= ($ligne_utilisateur['prenom']); ?> <br> Email : <?=($ligne_utilisateur['email']); ?></div>

        <div class="panel-body">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">

                    <div class="panel-heading"><b>Modification d'un utilisateur</b></div>
                    <div class="panel-body">

                    <form action="modification_utilisateur.php" method="POST">
                    <div class="form-group">

                        <label for="prenom">Prenom :</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" value="<?= $ligne_utilisateur['prenom']; ?>">

                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" class="form-control" id="nom" value="<?= $ligne_utilisateur['nom']; ?>">

                        <label for="email">email :</label>
                        <input type="text" name="email" class="form-control" id="email" value="<?= $ligne_utilisateur['email']; ?>">

                        <label for="telephone">telephone :</label>
                        <input type="text" name="telephone" class="form-control" id="telephone" value="<?= $ligne_utilisateur['telephone']; ?>">

                        <label for="mdp">Mot de passe :</label>
                        <input type="text" name="mdp" class="form-control" id="mdp" value="<?= $ligne_utilisateur['mdp']; ?>">

                        <label for="pseudo">Pseudo :</label>
                        <input type="text" name="pseudo" class="form-control" id="pseudo" value="<?= $ligne_utilisateur['pseudo']; ?>">

                        <label for="avatar">Avatar :</label>
                        <input type="text" name="avatar" class="form-control" id="avatar" value="<?= $ligne_utilisateur['avatar']; ?>">

                        <label for="age">Age :</label>
                        <input type="text" name="age" class="form-control" id="age" value="<?= $ligne_utilisateur['age']; ?>">

                        <label for="date_naissance">Date de naissance :</label>
                        <input type="text" name="date_naissance" class="form-control" id="date_naissance" value="<?= $ligne_utilisateur['date_naissance']; ?>">

                        <label for="sexe">Sexe :</label>
                        <input type="text" name="sexe" class="form-control" id="sexe" value="<?= $ligne_utilisateur['sexe']; ?>">

                        <label for="etat_civil">Etat civil :</label>
                        <input type="text" name="etat_civil" class="form-control" id="etat_civil" value="<?= $ligne_utilisateur['etat_civil']; ?>">

                        <label for="adresse">Adresse :</label>
                        <input type="text" name="adresse" class="form-control" id="adresse" value="<?= $ligne_utilisateur['adresse']; ?>">

                        <label for="code_postal">Code postal :</label>
                        <input type="text" name="code_postal" class="form-control" id="code_postal" value="<?= $ligne_utilisateur['code_postal']; ?>">

                        <label for="ville">Ville :</label>
                        <input type="text" name="ville" class="form-control" id="ville" value="<?= $ligne_utilisateur['ville']; ?>">

                        <label for="pays">Pays :</label>
                        <input type="text" name="pays" class="form-control" id="pays" value="<?= $ligne_utilisateur['pays']; ?>">

                        <label for="site_web">Site web :</label>
                        <input type="text" name="site_web" class="form-control" id="site_web" value="<?= $ligne_utilisateur['site_web']; ?>">

                        <input hidden value="<?= $ligne_utilisateur['id_utilisateur']; ?>" name="id_utilisateur">

                    </div>

                        <input type="submit" class="btn btn-success btn-block" value="Mettre à jour">

                    </form>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>

<?php require('inc/footer.inc.php');?>
