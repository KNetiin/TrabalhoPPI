<?php

$paginaAtiva = "client";

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

        <div class="container pt-lg-3">
            <div class="card formEmployee">
                <!-- HEADER -->
                <div class="card-body text-white bg-dark formEmployeeHeader">
                    <h2 class="card-title text-center">Cadastro de Clientes Proprietários</h2>
                </div>

                <!-- NAVIGATION -->
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-4 stepHeader stepHeaderLeft" id="personal-header">
                            <div class="row p-1 align-items-center justify-content-center">
                                <i class="fas fa-user stepIcon"></i>
                                <div class="d-inline pt-2">
                                    <h6>Informações</h6>
                                    <h6>Pessoais</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 stepHeader stepHeaderMiddle" id="location-header">
                            <div class="row p-1 align-items-center justify-content-center">
                                <i class="fas fa-street-view stepIcon"></i>
                                <div class="d-inline pt-2">
                                    <h6>Informações de</h6>
                                    <h6>Localização</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 stepHeader stepHeaderRight" id="additional-header">
                            <div class="row p-1 align-items-center justify-content-center">
                                <i class="fas fa-user-tie stepIcon"></i>
                                <div class="d-inline pt-2">
                                    <h6>Informações</h6>
                                    <h6>Adicionais</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORM -->
                <div class="card-body">
                    <form action="employeePost.php" method="POST">


                        <?php include "components/stepPersonal.php"; ?>
                        <?php include "components/stepLocation.php"; ?>
                        <?php include "components/stepAdditional.php"; ?>

                        <div class="row">
                            <div class="col-6" id="back">
                                <button type="button" onclick="backStep()" class="btn btn-danger btn-block">Voltar</button>
                            </div>
                            <div class="col-6" id="next">
                                <button type="button" onclick="nextStep()" class="btn btn-success btn-block">Próximo</button>
                            </div>
                            <div class="col-6" id="save">
                                <button type="submit" onclick="nextStep()" class="btn btn-success btn-block">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>