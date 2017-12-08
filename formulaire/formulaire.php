<!DOCTYPE html>

<!--

To change this license header, choose License Headers in Project Properties.

To change this template file, choose Tools | Templates

and open the template in the editor.

-->

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <div>TODO write content</div>

        <ul>
            <li>
                <h4>Etape 1</h4>
                <p>créer le fichier index.php contenant un formulaire, on utilise Bootstrap 4 ici</p>
            </li>

            <li>
                <h4>Etape 2</h4>
                <p>créer un fichier style.css avec une margin-top sur le body de 10vh</p>
            </li>

            <li>
                <h4>Etape 3</h4>
                <p>créer le fichier connexion.php qui contiendra la connexion à la BDD, on utilise PDO</p>
                    /*
                     * init.inc.php dans le dossier inc
                     * connexion à la BDD
                     */
                    //on créé une nouvelle connexion dans un bloc TRY
            </li>

            <li>
                <h4>Etape 4</h4>
                <p>on créé une première CLASSE Contact.class.php (convention de nommage pour mieux s'y retrouver)</p>
                /* Etape 4 - Contact.class.php */
                /*
                 * Une classe c'est en fait un plan à partir duquel on va pouvoir créer plusieurs objets
                 * un peu comme un moule dont on en obtient comme objets des gâteaux
                 *
                 * Une classe peut contenir plusieurs méthodes (ou fonctions)
                 * par ex. une classe voiture peut avoir comme méthodes 'freiner' et 'accélerer'
                 * et quand je créé un objet de la classe voiture, par ex. un 308 ou une porsche qui auront les
                 * fonctionnalités de la classe voiture comme 'freiner' et 'accélerer'
                 */

            </li>

            <li>
                <h4>Etape 5</h4>
                <p>dans notre index.php on vient rajouter avant le DOCTYPE du PHP pour insérer les données du formulaire en BDD après validation</p>
            </li>

            <li>
                <h4>Etape 6</h4>
                <p>on teste dans le navigateur en envoyant d'abord un formulaire vide (messages d'erreur) puis en renseignant correctement pour vérifier l'insertion en BDD</p>
            </li>

            <li>
                <h4>Etape 7</h4>
                <p>on peut rajouter un email en complétant la classe Contact dans Contact.class.php avec public function sendEmail($sujet, $email, $message)</p>
                <p><em>Attention mail() ne fonctionne pas sur localhost, il faudra donc soit être en ligne, soit utiliser une solution type PHPMailer ou SwiftMailer par exemple pour envoyer des mails depuis un serveur qui n'a pas de serveur d'envoi d'email comme XAMPP, MAMP...</em></p>
            </li>

            <li>
                <h4>Etape 8</h4>
                <p>Pour envoyer notre email il faut utiliser la méthode sendMail que l'on vient de créer dans la classe dans le fichier index lors de la validation du formulaire, juste après l'insertion en BDD</p>
            </li>

            <li>
                <h4>Etape 9</h4>
                <p>Pour utiliser PHPMailer avec Gmail, télécharger avec le lien https://github.com/PHPMailer/PHPMailer et suivre les étapes ci-après :</p>
                <ol>
                    <li>se logger sur son compte Gmail</li>
                    <li>aller sur la page pour diminuer le niveau de sécurité : https://www.google.com/settings/security/lesssecureapps</li>
                    <li>depuis cette page sélectionner 'Turn on'</li>
                    <li>inclure le fichier PHPMailerAutoload.php dans notre PHP et créer sur cette page une nouvelle instance de la classe PHPMailer (voir étape9.php)</li>
                </ol>
            </li>

        </ul>

    </body>

</html>
