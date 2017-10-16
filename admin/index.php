<?php
include('inc/init.inc.php');
?>

        <h1>Hello, world!</h1>
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
        <p>texte</p>
        <hr>
        <h2>Accueil <?= ($ligne_utilisateur['prenom']); ?></h2>
        <?php
        $resultat = $pdo -> query('SELECT * FROM t_competences');
        $ligne_competence = $resultat -> fetch();
        ?>

<?php
include('inc/footer.inc.php');
?>
