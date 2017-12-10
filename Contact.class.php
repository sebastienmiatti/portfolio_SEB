<?php
class Contact
{
   // déclaration des variables = champs de la table t_commentaires.sql
   private $co_nom;
   private $co_email;
   private $co_sujet;
   private $co_message;

   // fonction d'insertion en BDD
   public function insertContact($co_nom, $co_email, $co_sujet, $co_message)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->co_nom = strip_tags($co_nom);
		$this->co_email = strip_tags($co_email);
        $this->co_sujet = strip_tags($co_sujet);
        $this->co_message = strip_tags($co_message);

        // appelle la connexion à la BDD
          require('inc/init.inc.php');

          // on crée une requête puis on l'exécute
          $req = $bdd->prepare('INSERT INTO t_commentaires (co_nom, co_email, co_sujet, co_message) VALUES (:co_nom, :co_email, :co_sujet, :co_message)');
          $req->execute([
        	':co_nom'	=> $this->co_nom,//n attribue à la variable co_nom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'^tre posté
            ':co_email'	=> $this->co_email,
            ':co_sujet'	=> $this->co_sujet,
            ':co_message'	=> $this->co_message]);

            // on ferme la requête pour protéger des injections
            $req->closeCursor();

      }

    // Bonus - envoi d'un email
    public function sendEmail($sujet, $email, $message) {
        $this->to = 'miatti.sebastien@live.fr';
        $this->email = strip_tags($email);
        $this->sujet = strip_tags($sujet);
        $this->message = strip_tags($message);
        $this->headers = 'From: ' . $this->email . "\r\n"; //retours à la ligne
        $this->headers .= 'MIME-version: 1.0' . "\r\n";
        $this->headers .= 'Content-type : text/html; charset=utf-8' . "\r\n";

        // on utilise la fonction mail() de PHP
        mail($this->to, $this->sujet, $this->message, $this->headers);
    }
}
