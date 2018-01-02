<?php
require "core.php";
$Category = Model::load('category');

if(!empty($_POST)){ // vérifie que les valeurs sont postés
    $Category->save($_POST); // sauvegarde les valeurs posté
    $_GET["id"] = $Category->id;
}

if(isset($_GET["suppr"])){ // vérifie si on récupère un $_GET = suppr
    $Category->del($_GET["suppr"]); // suppr les valeurs
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div id="conteneur">
            <h1>La programation orienté objet</h1>
                <ul>
                    <?php
                    $cat = $Category->find(array(
                        "fields"=> "id,name",
                        "limit"=> 10
                    ));
                    foreach($cat as $c){
                    ?>
                    <li>
                        <a href="index.php?id=<?= $c["id"];?>"><?= $c["name"]; ?></a>
                        <a href="index.php?suppr=<?= $c["id"];?>">[x]</a>
                    </li>
                    <?php
                    }
                     ?>
                     <li><a href="index.php">Ajouter une catégorie</a></li>
                 </ul>
            <form action="index.php" method="post">

                <?php
                if(isset($_GET["id"])){
                $id = $_GET['id'];
                $Category->id=$id;
                $Category-read();
                $name = $Category->name;
                $position = $Category->position;
            }else{
                $id= $name= $position ="";
            }
                ?>

                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="text" name="name" value="<?= $name; ?>">
                <input type="text" name="position" value="<?= $position; ?>">
                <input type="submit" value="Envoyer">


            </form>

        </div>
    </body>
</html>
