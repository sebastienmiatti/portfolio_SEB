<?php
require_once('inc/init.inc.php');

// gestion des contenus de la bdd compétences
// Insertion d'une competence
if(!empty($_POST) ){// si on a posté une nouvelle compétence

    $id = array_shift($_POST);
    if (empty($id)){
        echo 'if<br>';

            $query = 'INSERT INTO '
            . $_SESSION['table']['table']
            . '('
            . implode(', ', array_keys($_POST))

            .', id_utilisateur) VALUES (:'

            . implode(', :', array_keys($_POST))

            . ' , "1"'

            .')';

        $resultat = $pdoCV->prepare($query);
    }
    else{
        echo 'else<br>';
        $query = 'UPDATE '
        . $_SESSION['table']['table']
        . ' SET ';
        $set = '';
        foreach ($_POST as $key => $value) {
            $set .= ', '. $key . '=:' . $key;
        }
        $query .= substr($set, 2);
        $query .= ' WHERE id = :id';

        $resultat = $pdoCV->prepare($query);
        $resultat->bindParam('id', $id, PDO::PARAM_INT);
    }

    foreach ($_POST as $key => &$param) {
        if (is_null($param)){
            $type = PDO::PARAM_NULL;
        }elseif(is_bool($param)){
            $type = PDO::PARAM_BOOL;
        }elseif(is_int($param)){
            $type = PDO::PARAM_INT;
        }else{
            $type = PDO::PARAM_STR;
            $resultat->bindParam($key, $param, $type);
        }
    }
    echo $query.'<br>';
    echo $id.'<br>';
    $resultat->execute();
}

?>
