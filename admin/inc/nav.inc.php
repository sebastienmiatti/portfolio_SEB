<!---        NAVBAR         -->
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
    <a class="navbar-brand" href="index.php"><?= ($ligne_utilisateur['pseudo']); ?></a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
    <li class="active"><a href="utilisateurs.php">Profil<span class="sr-only">(current)</span></a></li>
    <li><a href="modification_utilisateur.php">gestion utilisateur</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">parcours<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="experience.php">Expériences</a></li>
            <li><a href="realisation.php">Réalisations</a></li>
            <li><a href="formation.php">Formations</a></li>
        </ul>
    </li>
</ul>

<form class="navbar-form navbar-left">
<div class="form-group">
    <input type="text" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
<ul class="nav navbar-nav navbar-right">
    <li><a href="#">Link</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<!---        FIN NAVBAR          -->
