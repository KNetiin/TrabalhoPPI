<?php

$paginaAtiva = "properties";

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
    <script src="script/employee.js"></script>
    <script src="script/main.js"></script>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="container-fluid" id="filterOptions">
        <form action="">
            <div class="row">
                <div class="col-md-2">
                    <div class="row justify-content-center">
                        Intenção
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <select class="custom-select mr-sm-2" id="intentionSelect">
                                <option value="1">Aquisição</option>
                                <option value="2">Locação</option>
                                <option value="3" selected>Todos </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row justify-content-center">
                        Bairro
                    </div>
                    <div class="row">
                        <div class="col">
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Bairro</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row justify-content-center">
                        Preço
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <input type="number" id="lowestPrice" class="form-control" placeholder="Min" />
                        </div>
                        <div class="col-5">
                            <input type="number" id="highestPrice" class="form-control" placeholder="Max" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row justify-content-center">
                        Outras Informações
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <input type="text" class="form-control" id="otherInformations" />
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">&nbsp</div>
                    <div class="row justify-content-center">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Consultar</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <?php include "presentationCard.php"; ?>

    <?php include "footer.php"; ?>

</body>

</html>