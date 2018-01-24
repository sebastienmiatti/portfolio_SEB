<?php require_once('inc/init.inc.php');
// variables pour la balise <head>
$descriptionPage = strip_tags($_SESSION['titre']['description']);
$motsClesPage = "Développeur web, 92390, Villeneuve-la-Garenne, Hauts-de-Seine, PHP, MySQL, Laravel, silex, symphony, javascript, jQuery";
$page = "Développeur web (PHP, Symfony, Silex, Laravel, MySQL, Javascript, jQuery) - ";

if (!isset($_SESSION['points_forts'])){
    $req = $pdoCV -> query("SELECT * FROM t_points_forts WHERE id_utilisateur='1'");
    $_SESSION['points_forts'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

include('inc/head.inc.php');
?>

<main id="presentation" class="container">
    <!-- <h1>présentation</h1> -->
    <div class="row">
        <div class="col-md-8">
            <h1>Développeur web</h1>
            <div class="thumbnail presentation shadow">
                <?= $_SESSION['titre']['accroche']  ?>
            </div>
        </div>
        <div class="col-md-4">

            <div id="forts" class="panel panel-info shadow">
                <div class="panel-heading"><h2>Points forts</h2></div>
                <div class="panel-body">
                    <ul>
                        <?php $nbEltPF = count($_SESSION['points_forts']) ?>
                        <li>
                            <?php foreach ($_SESSION['points_forts'] as $key => $pointFort) : ?>
                                <?= $pointFort['point_fort'].(($nbEltPF != $key+1)?",</li><li>":".") ?>
                            <?php endforeach; ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <?php include('inc/footer.inc.php'); ?>
