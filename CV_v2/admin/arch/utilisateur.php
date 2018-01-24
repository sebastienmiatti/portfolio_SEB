<?php require_once('inc/init.inc.php'); ?>
<?php
$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id='1'");
$ligne_utilisateur = $sql->fetch(PDO::FETCH_ASSOC);

 ?>
<?php require_once('inc/head.inc.php'); ?>
<?php require_once('inc/nav.inc.php'); ?>
<main class="container-fluid">

    <div>

        <?php

        echo '<table class="table table-bordered">';

        echo '  <tr>';

        foreach($ligne_utilisateur as $indice => $valeur){
            if ($indice!='mdp'){
                if ($valeur != null) {
                    echo '<td>';
                    switch ($indice){
                        case 'telephone' :
                        case 'autre_tel' :
                        $affiche = wordwrap($valeur, 2, ' ', true);
                        break;

                        case 'date_naissance' :
                        $affiche = substr($valeur, 8);
                        $affiche .= substr($valeur, 5);
                        $affiche .= substr($valeur, 0, 4);
                        break;

                        default:
                        $affiche = $valeur;

                    }
                    echo $affiche;
                    echo '</td>';
                }
            }
        }
        echo '  </tr>';
        echo '</table>';


        ?>
    </div>
</main>

<?php include ('inc/footer.inc.php') ?>
