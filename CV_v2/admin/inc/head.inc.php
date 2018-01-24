<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- ckeditor -->
    <!-- <script src="https://cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script> -->
	<!-- <link href="http://sdk.ckeditor.com/theme/css/sdk-inline.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="css/style.css">

    <?php
    $title = (isset($_SESSION['utilisateur_bo']))?'Admin : '.$_SESSION['utilisateur_bo']['pseudo']:$title;
    ?>

    <title id="title"><?= $title ?></title>
</head>
<body>
