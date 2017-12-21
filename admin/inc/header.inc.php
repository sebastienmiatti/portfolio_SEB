<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.min.css" rel="stylesheet"><!-- importation bootstrap CSS -->
        <link rel="stylesheet" href="css/style_admin.css">

        <title>Site cv - Admin :<?= $identifiant ?></title>

    </head>

    <body>

<!---        NAVBAR         -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid geometrique">
        <!--container-fluid pour un container full width-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?= $identifiant ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="utilisateur.php">Mon profil<span class="sr-only">(current)</span></a></li>

                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">parcours<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="competence.php">Compétences</a></li>
                        <li><a href="experience.php">Expériences</a></li>
                        <li><a href="realisation.php">Réalisations</a></li>
                        <li><a href="formation.php">Formations</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="loisirs.php">Loisirs</a></li>
                        <li><a href="reseaux.php">Reseaux</a></li>
                    </ul>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Options<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="../index.php">Site public</a></li>
                <li><a href="contact.php">Messages</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="titre_cv.php">Modification de titre</a></li>
                <li><a href="texte.php">Modification de texte</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="deconnexion.php">Se déconnecter</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!---        FIN NAVBAR          -->
<div class="container">
    <h1 class="well text-center">Admin - Port-folio : <?= $identifiant ?></h1>
