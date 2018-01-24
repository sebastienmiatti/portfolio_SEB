<?php require_once('inc/init.inc.php');
// variables pour la balise <head>
$descriptionPage = "Voici mes activités associatives et mes principaux loisirs";
$motsClesPage = "président deu conseil syndical, trésorier d'une association, billad, tennis de table, broderie, marche";
$page = "Centres d'intérêt - ";

if (!isset($_SESSION['activites'])){
    $req = $pdoCV -> query("SELECT * FROM t_activites WHERE id_utilisateur='1'");
    $_SESSION['activites'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

if (!isset($_SESSION['loisirs'])){
    $req = $pdoCV -> query("SELECT * FROM t_loisirs WHERE id_utilisateur='1'");
    $_SESSION['loisirs'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

include('inc/head.inc.php');
?>

<main id="interets" class="container">
    <h1>activités associatives et loisirs</h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-info shadow">
                <div class="panel-heading"><h2>activités associatives</h2></div>
                <div class="panel-body">

                    <?php $nbEltA = count($_SESSION['activites']) ?>
                    <ul>
                        <li>
                            <?php foreach ($_SESSION['activites'] as $key => $interet) : ?>

                                <?= $interet['activite'].(($nbEltA != $key+1)?",</li><li>":".") ?>

                                <?php endforeach; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="panel panel-info shadow">
                    <div class="panel-heading"><h2>loisirs</h2></div>
                    <div class="panel-body">

                        <?php $nbEltI = count($_SESSION['loisirs']) ?>
                        <ul>
                            <li>
                                <?php foreach ($_SESSION['loisirs'] as $key => $interet) : ?>

                                    <?= $interet['loisir'].(($nbEltI != $key+1)?",</li><li>":".") ?>

                                    <?php endforeach; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <?php include('inc/footer.inc.php'); ?>
