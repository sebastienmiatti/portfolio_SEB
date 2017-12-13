<?php require 'inc/init.inc.php';

include 'inc/header.inc.php';

 ?>

 <div class="row">
     <div class="col-md-8 col-md-offset-2">
         <div class="panel panel-info">
         <div class="panel-heading">Inscription :</div>

         <div class="panel-body">

             <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-primary">

                     <div class="panel-heading"><b>Insertion d'un utilisateur</b></div>
                     <div class="panel-body">

                     <form action="" method="POST">
                     <div class="form-group">
                         <label for="prenom">Prenom :</label>
                         <input type="text" name="prenom" class="form-control" id="prenom" value="">

                         <label for="nom">Nom :</label>
                         <input type="text" name="nom" class="form-control" id="nom" value="">

                         <label for="email">email :</label>
                         <input type="text" name="email" class="form-control" id="email" value="">

                         <label for="telephone">telephone :</label>
                         <input type="text" name="telephone" class="form-control" id="telephone" value="">

                         <label for="mdp">Mot de passe :</label>
                         <input type="text" name="mdp" class="form-control" id="mdp" value="">

                         <label for="pseudo">Pseudo :</label>
                         <input type="text" name="pseudo" class="form-control" id="pseudo" value="">

                         <label for="avatar">Avatar :</label>
                         <input type="text" name="avatar" class="form-control" id="avatar" value="">

                         <label for="age">Age :</label>
                         <input type="text" name="age" class="form-control" id="age" value="">

                         <label for="date_de_naiss">Date de naissance :</label>
                         <input type="text" name="date_de_naiss" class="form-control" id="date_de_naiss" value="">

                         <label for="sexe">Sexe :</label>
                         <input type="text" name="sexe" class="form-control" id="sexe" value="">

                         <label for="etat_civil">Etat civil :</label>
                         <input type="text" name="etat_civil" class="form-control" id="etat_civil" value="">

                         <label for="adresse">Adresse :</label>
                         <input type="text" name="adresse" class="form-control" id="adresse" value="">

                         <label for="code_postal">Code postal :</label>
                         <input type="text" name="code_postal" class="form-control" id="code_postal" value="">

                         <label for="ville">Ville :</label>
                         <input type="text" name="ville" class="form-control" id="ville" value="">

                         <label for="pays">Pays :</label>
                         <input type="text" name="pays" class="form-control" id="pays" value="">

                         <label for="site_web">Site web :</label>
                         <input type="text" name="site_web" class="form-control" id="site_web" value="">

                         <input hidden value="<?= $ligne_utilisateur['id_utilisateur']; ?>" name="id_utilisateur">

                     </div>

                         <input type="submit" class="btn btn-success btn-block" value="Inscription">

                     </form>

                     </div>
                 </div>
             </div>
         </div>
         </div>

     </div>
 </div>

<?php include 'inc/footer.inc.php';?>
