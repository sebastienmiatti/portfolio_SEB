<?php require_once('inc/init.inc.php');
// if (!isset($_SESSION['formations'])){
$req = $pdoCV -> query("SELECT * FROM t_realisations WHERE id_utilisateur='1' ORDER BY r_dates DESC");
$_SESSION['realisations'] = $req -> fetchAll(PDO::FETCH_ASSOC);
// }

$page = "réalisations - ";
include('inc/head.inc.php');
?>
<main id="realisations" class="container">
    <h1>Mes réalisations</h1>
    <section class="row">
        <?php foreach ($_SESSION['realisations'] as $formation) : ?>
            <div class="col-md-3">
                <article>
                <!-- <article class="panel panel-info"> -->
                    <?php
                    if (!empty($formation['r_lien'])){
                        $photo = $formation['r_photos'];
                    } else {
                        $photos  = explode (', ', $formation['r_photos']);
                        $photo = $photos[0];
                    }
                    ?>
                    <!-- <div class="panel-heading"> -->
                        <h2><?= $formation['r_titre'] ?></h2>
                        <p><?= $formation['r_soustitre'] . ' - ' . $formation['r_dates'] ?></p>
                    <!-- </div>
                    <div class="panel-body"> -->


                    <a href="<?= $lien = (!empty($formation['r_lien'])?$formation['r_lien']:'') ?>" target="_blank">
                        <img src="photos/<?= $photo ?>" alt="">
                    </a>
                    <p><?= $formation['r_description'] ?></p>
                <!-- </div> -->

                </article>
            </div>
        <?php endforeach; ?>

    </section>
</main>
<?php include('inc/footer.inc.php'); ?>
