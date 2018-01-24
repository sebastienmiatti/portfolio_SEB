<?php
require 'header.php';

// gestion des contenus de la BDD
// suppression d'une compétence

if(isset($_GET['id_competence'])) {// on récupère la comp. par son id ds l'url
    $efface = $_GET['id_competence'];//je mets cela ds une variable

    $sql = " DELETE FROM t_competences WHERE id_competence = '$efface' ";
    $pdoCV->query($sql);// on peut avec exec aussi si on veut

}//ferme le if isset
    $sql = $pdoCV->prepare(" SELECT * FROM t_competences ");
    $sql->execute();
    $nbr_competences = $sql->rowCount();
    //$ligne_competence = $sql->fetch();
    ?>
    <h2>Il y a <?= $nbr_competences; ?> compétence<?= ($nbr_competences>1)?'s':'' ?> </h2>

    <table border="2">
        <tr>
            <th>Compétences</th>
            <th>Niveau en %</th>
            <th>Suppression</th>
            <th>Modification</th>
        </tr>
        <tr>
            <?php while ($ligne_competence = $sql->fetch()) { ?>
                <td><?php echo $ligne_competence['competence']; ?></td>
                <td><?php echo $ligne_competence['c_niveau']; ?></td>
                <td><a href="competences.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">supprimer</a></td>
                <td><a href="#">modifier</a></td>
            </tr>
        <?php }    ?>
    </table>
</body>
</html>
