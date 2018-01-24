<?php require_once('inc/init.inc.php');
require('inc/Contact.class.php');

// on vérifie que le formulaire a été posté

if (!empty($_POST)) {
    // on éclate le $_POST en tableau qui permet d'accéder directement aux champs par des variables
    extract($_POST);
    $contact = new Contact($co_nom, $co_email, $co_sujet, $co_message);
    if ($contact->valid()){
        $contact->insertContact($pdoCV);
        $contact->sendEmail();
        header('location: index.php');

    } else {
        $erreurnom = (empty($co_nom)) ? 'Indiquez votre nom' : null;
        $erreuremail = (empty($co_email) || !filter_var($co_email, FILTER_VALIDATE_EMAIL)) ? 'Entrez un email valide' : null;
        $erreursujet = (empty($co_sujet)) ? 'Indiquez un sujet' : null;
        $erreurmessage = (empty($co_message)) ? 'Quel est votre message ?' : null;
    }

}

$descriptionPage = "Formulaire à remplir pour me laisser un message. Vous trouverz aussi mes cordonnées";
$motsClesPage = "contact, adresse";
$page = "Contact - ";
include('inc/head.inc.php');
?>
<main class="container" id="contact">
    <div class="row">
        <h1>Formulaire de contact</h1>
        <div class="col-md-6 col-md-offset-3">
            <div class="thumbnail">

                <form method="POST">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <span class="error"><?= (isset($erreurnom))?$erreurnom:''; ?></span>
                        <input id="nom" class="form-control" type="text" name="co_nom" value="<?php if(isset($co_nom)) echo $co_nom; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <span class="error"><?= (isset($erreuremail))?$erreuremail:''; ?></span>
                        <input id="email" class="form-control" type="text" name="co_email" value="<?php if (isset($co_email)) echo $co_email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="sujet">Sujet :</label>
                        <span class="error"><?= (isset($erreursujet))?$erreursujet:''; ?></span>
                        <input id="sujet" class="form-control" type="text" name="co_sujet" value="<?php if (isset($co_sujet)) echo $co_sujet; ?>">
                    </div>
                    <div class="form-group">
                        <label for="message">Message :</label>
                        <span class="error"><?= (isset($erreurmessage))?$erreurmessage:''; ?></span>
                        <textarea id="message" class="form-control" name="co_message" cols="30" rows="10"><?php if (isset($co_message)) echo $co_message; ?></textarea>
                    </div>

                    <input type="submit" class="btn btn-outline-info btn-block btn-submit" value="Envoyer" />

                </form><!-- /form -->
            </div>
        </div><!-- /.col-md-6 col-md-offset-2 -->
        <div class="col-md-3">
            <h2>Mes coordonnées :</h2>
            <p>
                <?= $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom'] ?><br>
                <?= $_SESSION['utilisateur']['adresse'] ?><br>
                <?= $_SESSION['utilisateur']['code_postal'] ?> <?= $_SESSION['utilisateur']['ville'] ?><br>
                <a href="tel:<?= $_SESSION['utilisateur']['telephone'] ?>">
                    <?= wordwrap($_SESSION['utilisateur']['telephone'], 2, ' ', true)  ?></a><br>

                    <a href="tel:<?= $_SESSION['utilisateur']['autre_tel'] ?>">
                        <?= wordwrap($_SESSION['utilisateur']['autre_tel'], 2, ' ', true)  ?></a><br>

                        <a href="mailto:<?= $_SESSION['utilisateur']['email'] ?>">
                            <?= $_SESSION['utilisateur']['email'] ?></a><br>

                        </p>
        </div>
    </div><!-- /.row -->

</main>
<?php include('inc/footer.inc.php'); ?>
