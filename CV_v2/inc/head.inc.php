<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" lang="fr" content="Pascal HUITOREL">
    <meta name="keywords" content="<?= $motsClesPage ?>">
    <meta name="description" content="<?= $descriptionPage ?>">
    <!-- reset CSS -->
    <link rel="icon" href="logo.png" >
    <!-- <link rel="icon" href="favicon.ico" /> -->
    <link rel="stylesheet" href="css/reset.css">

    <!-- CSS bootstrap -->
    <!-- <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css"> -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">


    <title><?= $page. $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom'] ; ?></title><!-- Latest compiled and minified CSS -->

</head>
<body>
    <header class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="portrait">
                <a href="index.php">
                    <p class="text-center"><strong><?= $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom'] ?></strong></p>
                </a>
            </div>

            <div class="col-md-8" id="titre">
                <p><strong><?= $_SESSION['titre']['titre_cv']?></strong></p>
                <!-- <p><span>!!! Site en construction !!!</span></p> -->
            </div>

            <div class="col-md-2">
                <div id="icones">
                    <!-- <div id="icones" class="col-md-10 col-md-offset-1"> -->
                    <?php foreach ($_SESSION['logos'] as $logo) : ?>
                        <img src="img/<?= $logo['src'] ?>"  alt="<?= $logo['alt'] ?>" title="<?= $logo['alt'] ?>">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </header>

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Brand</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="index.php">Link <span class="sr-only">(current)</span></a></li> -->
                    <li class="<?= ($page=='Développeur web - ')?'active':'' ?>"><a href="index.php">Accueil<span class="sr-only">(current)</span></a></li>
                    <li class="<?= ($page=='Parcours - ')?'active':'' ?>"><a href="parcours.php">Parcours professionnel</a></li>
                    <li class="<?= ($page=='Formations - ')?'active':'' ?>"><a href="formations.php">Formations</a></li>
                    <li class="<?= ($page=='Compétences - ')?'active':'' ?>"><a href="competences.php">Compétences</a></li>
                    <li class="<?= ($page=='Centres d\'intérêt - ')?'active':'' ?>"><a href="interets.php">Centres d'intérêt</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?= ($page=='Contact - ')?'active':'' ?>"><a href="contact.php">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
