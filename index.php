<?php

$paginaAtiva = "home";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- TITLE -->
    <title>Confraria Imóveis</title>

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
    <script src="script/main.js"></script>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="container-fluid mainContent">
        <div class="row parallax"></div>

        <div id="internalContent">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/homeSlide.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Os melhores imóveis</h5>
                                <p>Dispomos dos melhores imóveis com o melhor custo benefício.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/groupSlide.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Os melhores corretores</h5>
                                <p>Prezamos por um bom atendimento, por isso, temos os melhores corretores para te atender da forma que você merece!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/heartSlide.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Tudo feito com amor.</h5>
                                <p>Gostamos do que fazemos, e fazemos por que gostamos.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <?php include "footer.php"; ?>
</body>

</html>