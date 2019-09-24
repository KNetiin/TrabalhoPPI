<?php

$paginaAtiva = "clientList";

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Imobiliária F&F</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <!-- ICONS - FONTAWESOME -->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <!-- FONT - MONTSERRAT -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <!-- CSS FILES -->
        <link rel="stylesheet" href="css/main.css">

        <!-- JS FILES -->
        <script src="script/clientList.js"></script>
        <script src="script/main.js"></script>
    </head>
    <body>
        <?php include "header.php"; ?>

        <div class="container pt-lg-3">
            <div class="card-deck mb-2">
                <?php include "components/cardClient.php"; ?>
                <?php include "components/cardClient.php"; ?>
            </div>
            <div class="card-deck mb-2">
                <?php include "components/cardClient.php"; ?>
                <?php include "components/cardClient.php"; ?>
            </div>
            <div class="card-deck mb-2">
                <?php include "components/cardClient.php"; ?>
                <?php include "components/cardClient.php"; ?>
            </div>
            <div class="card-deck mb-2">
                <?php include "components/cardClient.php"; ?>
                <?php include "components/cardClient.php"; ?>
            </div>
            <div class="card-deck mb-2">
                <?php include "components/cardClient.php"; ?>
                <?php include "components/cardClient.php"; ?>
            </div>
            <div class="card-deck mb-2">
                <?php include "components/cardClient.php"; ?>
                <?php include "components/cardClient.php"; ?>
            </div>
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>