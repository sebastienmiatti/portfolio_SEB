<!-- Navbar bootstrap -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?= $ligne_utilisateur['pseudo']; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a class="active" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" href="utilisateur.php">Mon profil<span class="sr-only">(current)</span></a></li>

                <li class="dropdown">
                    <a class="active" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="experiences.php">Expériences</a></li>
                        <li><a href="realisations.php">Réalisations</a></li>
                        <li><a href="formations.php">Formations</a></li>
                        <li><a href="competence.php">Compétences</a></li>
                        <li><a href="loisirs.php">Loisirs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Liens</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-off" aria-hidden="true"></span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="authentification.php?deconnexion=oui">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
