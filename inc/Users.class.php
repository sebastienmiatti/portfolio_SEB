<?php
class Users
{
   // déclaration des variables = champs de la table t_commentaires.sql
   private $prenom;
   private $nom;
   private $email;
   private $telephone;
   private $mdp;
   private $pseudo;
   private $avatar;
   private $age;
   private $date_naissance;
   private $sexe;
   private $etat_civil;
   private $adresse;
   private $code_postal;
   private $ville;
   private $pays;
   private $site_web;
   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertUsers($prenom, $nom, $email, $telephone, $mdp, $pseudo, $avatar, $age, $date_naissance, $sexe, $etat_civil, $adresse, $code_postal, $ville, $site_web)
   {
    	// on récupère les données rentrées par l'utilisateur
		    $this->prenom = addslashes(strip_tags($prenom));
        $this->nom = addslashes(strip_tags($nom));
        $this->email = addslashes(strip_tags($email));
        $this->telephone = addslashes(strip_tags($telephone));
        $this->mdp = addslashes(strip_tags($mdp));
        $this->pseudo = addslashes(strip_tags($pseudo));
        $this->avatar = addslashes(strip_tags($avatar));
        $this->age = addslashes(strip_tags($age));
        $this->date_naissance = addslashes(strip_tags($date_naissance));
        $this->sexe = addslashes(strip_tags($sexe));
        $this->etat_civil = addslashes(strip_tags($etat_civil));
        $this->adresse = addslashes(strip_tags($adresse));
        $this->code_postal = addslashes(strip_tags($code_postal));
        $this->ville = addslashes(strip_tags($ville));
        $this->pays = addslashes(strip_tags($pays));
        $this->site_web = addslashes(strip_tags($site_web));



          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_utilisateurs (prenom, nom, email, telephone, mdp, pseudo, avatar, age, date_naissance, sexe, etat_civil, adresse, code_postal, ville, pays, site_web) VALUES (:prenom, :nom, :email, :telephone, :mdp, :pseudo, :avatar, :age, :date_naissance, :sexe, :etat_civil, :adresse, :code_postal, :ville, :pays, :site_web)');
          $req->execute([
        	  //on attribue à la variable co_nom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'^tre posté
            ':prenom'	=> $this->prenom,
            ':nom'	=> $this->nom,
            ':email'	=> $this->email,
            ':telephone'	=> $this->telephone,
            ':mdp' => $this->mdp,
            ':pseudo'	=> $this->pseudo,
            ':avatar' => $this->avatar,
            ':age'	=> $this->age,
            ':date_naissance'	=> $this->date_naissance,
            ':sexe' => $this->sexe,
            ':etat_civil' => $this->etat_civil,
            ':adresse'	=> $this->adresse,
            ':code_postal'	=> $this->code_postal,
            ':ville'	=> $this->ville,
            ':pays'	=> $this->pays,
            ':site_web' => $this->site_web]);

            // on ferme la requête pour protéger des injections
            $req->closeCursor();
    }

    public function updateUsers($prenom, $nom, $email, $telepohone, $pseudo, $age, $date_naissance, $adresse, $code_postal, $ville, $pays, $site_web)
    {
      // on récupère les données rentrées par l'utilisateur
      $this->prenom = addslashes(strip_tags($prenom));
      $this->nom = addslashes(strip_tags($nom));
      $this->email = addslashes(strip_tags($email));
      $this->telephone = addslashes(strip_tags($telephone));
      $this->mdp = addslashes(strip_tags($mdp));
      $this->pseudo = addslashes(strip_tags($pseudo));
      $this->avatar = addslashes(strip_tags($avatar));
      $this->age = addslashes(strip_tags($age));
      $this->date_naissance = addslashes(strip_tags($date_naissance));
      $this->sexe = addslashes(strip_tags($sexe));
      $this->etat_civil = addslashes(strip_tags($etat_civil));
      $this->adresse = addslashes(strip_tags($adresse));
      $this->code_postal = addslashes(strip_tags($code_postal));
      $this->ville = addslashes(strip_tags($ville));
      $this->pays = addslashes(strip_tags($pays));
      $this->site_web = addslashes(strip_tags($site_web));

      // on crée une requete puis on l'exécute
      $req = $this->pdo->prepare('UPDATE t_utilisateurs(prenom, nom, email, telephone, mdp, pseudo, avatar, age, date_naissance, sexe, etat_civil, adresse, code_postal, ville, pays, site_web) VALUES (:prenom, :nom, :email, :telephone, :mdp, :pseudo, :avatar, :age, :date_naissance, :sexe, :etat_civil, :adresse, :code_postal, :ville, :pays, :site_web)');
      $req->execute([
         //on attribue à la variable, la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
        ':prenom'	=> $this->prenom,
        ':nom'	=> $this->nom,
        ':email'	=> $this->email,
        ':telephone'	=> $this->telephone,
        ':mdp' => $this->mdp,
        ':pseudo'	=> $this->pseudo,
        ':avatar' => $this->avatar,
        ':age'	=> $this->age,
        ':date_naissance'	=> $this->date_naissance,
        ':sexe' => $this->sexe,
        ':etat_civil' => $this->etat_civil,
        ':adresse'	=> $this->adresse,
        ':code_postal'	=> $this->code_postal,
        ':ville'	=> $this->ville,
        ':pays'	=> $this->pays,
        ':site_web' => $this->site_web]);
        $req->closeCursor();
      }

      public function deleteUsers($id_utilisateur, $prenom, $nom, $email, $telepohone, $pseudo, $age, $date_naissance, $adresse, $code_postal, $ville, $pays, $site_web)
      {
        // on crée une requete puis on l'exécute
        $req = $this->pdo->prepare('DELETE * FROM t_utilisateurs WHERE id_utilisateur= $id_utilisateur');
        $req->closeCursor();
      }

      public function getUsers(){
        return $this->id_utilisateur;
        return $this->prenom;
        return $this->nom;
        return $this->email;
        return $this->telephone;
        return $this->mdp;
        return $this->pseudo;
        return $this->avatar;
        return $this->age;
        return $this->date_naissance;
        return $this->sexe;
        return $this->etat_civil;
        return $this->adresse;
        return $this->code_postal;
        return $this->ville;
        return $this->pays;
        return $this->site_web;
      }


    // // Bonus - envoi d'un email
    // public function sendEmail($sujet, $email, $message) {
    //     $this->to = 'miatti.sebastien@live.fr';
    //     $this->email = strip_tags($email);
    //     $this->sujet = strip_tags($sujet);
    //     $this->message = strip_tags($message);
    //     $this->headers = 'From: ' . $this->email . "\r\n"; //retours à la ligne
    //     $this->headers .= 'MIME-version: 1.0' . "\r\n";
    //     $this->headers .= 'Content-type : text/html; charset=utf-8' . "\r\n";
    //
    //     // on utilise la fonction mail() de PHP
    //     mail($this->to, $this->sujet, $this->message, $this->headers);
    // }

}
