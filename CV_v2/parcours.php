<?php require_once('inc/init.inc.php');
if (!isset($_SESSION['parcours_entreprise'])){
    $req = $pdoCV -> query("SELECT * FROM t_experiences WHERE id_utilisateur='1' AND e_type = 'entreprise' ORDER BY e_dates DESC");
    $_SESSION['parcours_entreprise'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

if (!isset($_SESSION['parcours_independant'])){
    $req = $pdoCV -> query("SELECT * FROM t_experiences WHERE id_utilisateur='1' AND e_type = 'indépendant'");
    $_SESSION['parcours_independant'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

$descriptionPage = "Je suis développeur web. Opérateur réseaux et télécoms";
$motsClesPage = "développeur web, développeur PHP, administrateur système, informaticient polyvalent";
$page = "Parcours - ";
include('inc/head.inc.php');
?>
<main id="parcours" class="container">
    <h1>Parcours professionnel</h1>
    <section class="row">
        <h2>En entreprise</h2>
        <?php foreach ($_SESSION['parcours_entreprise'] as $parcours) : ?>
            <div class="col-md-4">

                <article class="panel panel-info">
                    <div class="panel-heading">
                        <p><?= $parcours['e_dates'] ?></p>
                        <h3><strong><?= $parcours['e_titre'] ?></strong></h3>
                        <p><?= $parcours['e_soustitre'] ?></p>
                    </div>
                    <div class="panel-body">
                        <?php $posEnvironnement = stripos($parcours['e_description'], 'environnement'); ?>
                        <?php $description = str_replace (', -', ',</li><li> -', substr($parcours['e_description'], 0, $posEnvironnement)); ?>

                            <?= ($posEnvironnement)?"<ul><li>".$description . "</li></ul><br>":$description; ?>

                            <?php $environnement = substr($parcours['e_description'], $posEnvironnement); ?>
                            <p class="<?= ($posEnvironnement)?'italic':''  ?>"><?= $environnement ?></p>

                        </div>
                    </article>
                </div>

            <?php endforeach; ?>

        </section>

        <section class="row">
            <h2>En indépendant</h2>

            <?php foreach ($_SESSION['parcours_independant'] as $parcours) : ?>
                <div class="col-md-4">

                    <article class="panel panel-info">
                        <div class="panel-heading">
                            <p><?= $parcours['e_dates'] ?></p>
                            <h3><strong><?= $parcours['e_titre'] ?></strong></h3>
                            <p><?= $parcours['e_soustitre'] ?></p>
                        </div>
                        <div class="panel-body">
                            <?php $posEnvironnement = stripos($parcours['e_description'], 'environnement'); ?>
                            <?php $description = str_replace (', -', ',</li><li> -', substr($parcours['e_description'], 0, $posEnvironnement)); ?>

                                <?= ($posEnvironnement)?"<ul><li>".$description . "</li></ul><br>":$description; ?>

                                <?php $environnement = substr($parcours['e_description'], $posEnvironnement); ?>
                                <p class="<?= ($posEnvironnement)?'italic':''  ?>"><?= $environnement ?></p>


                        </div>
                    </article>

                </div>
            <?php endforeach; ?>

        </section>

    </main>
    <?php include('inc/footer.inc.php'); ?>
