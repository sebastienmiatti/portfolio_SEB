<footer class="container-fluid">
    <div class="row">

        <div class="col-xs-6 text-center">
            <a href="doc/HUITORELPascalDeveloppeurWebCV.pdf" target="_blank">Mon CV en document</a>
        </div>
        <div class="col-xs-6 text-center" id="logos_reseaux">
            <ul>

                <?php foreach ($_SESSION['logos_reseaux'] as $reseau) : ?>
                    <?php

                    $logo = (substr($reseau['logo'], 0, 3) == "fa-")?
                    "<i class='fa " . $reseau['logo'] . " fa-2x' aria-hidden='true'></i>":
                    "<img width='20' src='img/" . $reseau['logo'] . "' alt=''>";
                    ?>

                    <li><a href="<?= $reseau['lien'] ?>" target="_blank"><?= $logo ?></a></li>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script> -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src = "https://use.fontawesome.com/0c1a81064b.js"></script>

</footer>
</body>
</html>
