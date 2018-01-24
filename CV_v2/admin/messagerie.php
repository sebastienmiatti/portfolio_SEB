<?php require_once('inc/init.inc.php'); ?>
<?php require_once('inc/head.inc.php'); ?>
<?php require_once('inc/nav.inc.php'); ?>
<?php

// données de l'utilisateur
extract ($_SESSION['utilisateur_bo']);

// messages
$req = $pdoCV -> query("SELECT * FROM t_messages ORDER BY id DESC LIMIT 0, 10");
$req -> execute();
$messages = $req->fetchAll(PDO::FETCH_ASSOC);


?>
<main id="messagerie" class="container">
    <h1>Messagerie</h1>
    <div class="row">
        <table class="table table-condensed">
            <?php foreach ($messages as $message) : ?>
            <tr>
                <td><?= $message['co_nom'] ?></td>
                <td>
                    <?= $message['co_sujet'] ?> - <?= substr($message['co_message'], 0, 150) ?>
                </td>
                <td><?= $message['date'] ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
</main>

<?php include ('inc/footer.inc.php') ?>
