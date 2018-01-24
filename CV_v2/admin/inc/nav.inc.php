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
            <a class="navbar-brand" href="index.php">Logo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li> -->
                <li><a href="index.php">Accueil</a></li>
                <!-- <li><a href="utilisateur.php">Profil</a></li> -->
                <li><a class="menu-ajax" href="?table=t_utilisateurs">Profil</a></li>
                <li class="<?= ($page=='titrailles')?'active':'' ?>"><a class="menu-ajax" href="?table=t_titre_cv">Titrailles</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="menu-ajax" href="?table=t_experiences">Experiences</a></li>
                        <li><a class="menu-ajax" href="?table=t_realisations">Réalisations</a></li>
                        <li><a class="menu-ajax" href="?table=t_formations">Formations</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compétences<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="menu-ajax" href="?table=t_points_forts">Points forts</a></li>
                        <li><a class="menu-ajax" href="?table=t_interets">Centres d'interets</a></li>
                        <li><a class="menu-ajax" href="?table=t_competences">Compétences</a></li>
                        <li><a class="menu-ajax" href="?table=t_activites">Activités</a></li>
                        <li><a class="menu-ajax" href="?table=t_loisirs">Loisirs</a></li>
                        <li><a class="menu-ajax" href="?table=t_reseaux">Réseaux</a></li>
                        <li><a class="menu-ajax" href="?table=t_logos">Logos</a></li>
                    </ul>
                </li>
            </ul>
            <!-- <form class="navbar-form navbar-left">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Chercher</button>
    </form> -->
    <?php if (userConnecte()) : ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="messagerie.php"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            <li><a href="connexion.php?action=deconnexion">Déconnexion</a></li>
        </ul>
    <?php endif; ?>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
