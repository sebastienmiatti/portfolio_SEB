<?php require_once('inc/init.inc.php'); ?>
<?php require_once('inc/head.inc.php'); ?>
<?php require_once('inc/nav.inc.php'); ?>
<?php

// données de l'utilisateur
extract ($_SESSION['utilisateur_bo']);

// réseaux
$req = $pdoCV -> query("SELECT * FROM t_reseaux WHERE id_utilisateur=$statut LIMIT 0, 10");
$req -> execute();
$reseaux = $req->fetchAll(PDO::FETCH_ASSOC);

// experiences
$req = $pdoCV -> query("SELECT e_titre FROM t_experiences WHERE id_utilisateur=$statut LIMIT 0, 3");
$req -> execute();
$experiences = $req->fetchAll(PDO::FETCH_ASSOC);

// formations
$req = $pdoCV -> query("SELECT f_titre FROM t_formations WHERE id_utilisateur=$statut LIMIT 0, 3");
$req -> execute();
$formations = $req->fetchAll(PDO::FETCH_ASSOC);

// realisations
$req = $pdoCV -> query("SELECT r_titre FROM t_realisations WHERE id_utilisateur=$statut LIMIT 0, 3");
$req -> execute();
$realisations = $req->fetchAll(PDO::FETCH_ASSOC);

// debug($experiences);

?>
<main id="affichage" class="container-fluid">
    <h1><?= $_SESSION['titre_cv']['titre_cv'] ?></h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-1 col-sm-6">
            <div id="adresse" class="fond-cadre">
                <img src="../photos/portrait.png" alt="portrait" width="100"><br>
                <b><?= $prenom ?> <?= $nom ?></b><br>
                <span class="text-leger">
                    <?= $adresse ?><br>
                    <?= $code_postal ?> <?= $ville ?><br>
                </span>
                <?= wordwrap($telephone, 2, ' ', true)  ?><br>
                <?= wordwrap($autre_tel, 2, ' ', true) ?><br>
                <?= $email ?><br>
                <?php foreach ($reseaux as $reseau) : ?>
                    <?php
                    // $img = ($reseau['logo'] == '')?'':"img/" . $reseau['logo'];
                    $logo = (substr($reseau['logo'], 0, 3) == "fa-")?
                    "<i class='fa " . $reseau['logo'] . "' aria-hidden='true'></i>":
                    "<img width='20' src='img/" . $reseau['logo'] . "' alt=''>";
                    ?>
                    <a href="<?= $reseau['lien'] ?>" target="_blank"><?= $logo ?></a>

                <?php endforeach; ?>

            </div>
        </div>
        <div class="col-md-4 col-md-offset-1 col-sm-6" >
            <img class="img-responsive centre" src="photos/99326.jpg" alt="ciel étoilé">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="fond-cadre">

                <h2>Expériences</h2>
                <ul>
                    <?php foreach ($experiences as $experience) {
                        echo '<li>' . $experience['e_titre'] . '</li>';
                    } ?>

                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="fond-cadre">
                <h2>Formations</h2>
                <ul>
                    <?php foreach ($formations as $formation) {
                        echo '<li>' . $formation['f_titre'] . '</li>';
                    } ?>

                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="fond-cadre">

                <h2>Réalisations</h2>
                <ul>
                    <?php foreach ($realisations as $realisation) {
                        echo '<li>' . $realisation['r_titre'] . '</li>';
                    } ?>

                </ul>
            </div>
        </div>
    </div>
</main>

<?php include ('inc/footer.inc.php') ?>
