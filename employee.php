<?php

$paginaAtiva = "employee";

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
                    <h2 class="card-title text-center">Cadastro de Funcionário</h2>
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
                        <div class="col-4 stepHeader stepHeaderRight" id="professional-header">
                            <div class="row p-1 align-items-center justify-content-center">
                                <i class="fas fa-user-tie stepIcon"></i>
                                <div class="d-inline pt-2">
                                    <h6>Informações</h6>
                                    <h6>Profissionais</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORM -->
                <div class="card-body">
                    <form action="employeePost.php" method="POST">
                        <!-- TAB - PERSONAL INFORMATIONS -->
                        <fieldset id="personal">
                            <div class="form-row">
                                <!-- NAME -->
                                <div class="form-group col-sm-6">
                                    <label for="name">Nome:</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
        
                                <!-- CPF -->
                                <div class="form-group col-sm-6">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- PHONE -->
                                <div class="form-group col-sm-6">
                                    <label for="phone">Telefone:</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="(XX) XXXX-XXXX">
                                </div>
        
                                <!-- CELLPHONE -->
                                <div class="form-group col-sm-6">
                                    <label for="cellphone">Celular:</label>
                                    <input type="text" class="form-control" name="cellphone" id="cellphone" placeholder="(XX) X XXXX-XXXX" required>
                                </div>
                            </div>
                        </fieldset>

                        <!-- TAB - LOCATION INFORMATIONS -->
                        <fieldset id="location">
                            <div class="form-row">
                                <!-- CEP -->
                                <div class="form-group col-md-6">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="cep" placeholder="XXXXX-XXX" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- STATE -->
                                <div class="form-group col-sm-6 col-md-2">
                                    <label for="state">Estado</label>
                                    <input type="text" class="form-control" name="state" id="state">
                                </div>

                                <!-- CITY -->
                                <div class="form-group col-sm-6 col-md-4">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" name="city" id="city">
                                </div>

                                <!-- DISTRICT -->
                                <div class="form-group col-md-6">
                                    <label for="district">Bairro</label>
                                    <input type="text" class="form-control" name="district" id="district">
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- ADDRESS -->
                                <div class="form-group col-8 col-md-4">
                                    <label for="address">Logradouro</label>
                                    <input type="text" class="form-control" name="address" id="address">
                                </div>

                                <!-- NUMBER -->
                                <div class="form-group col-4 col-md-2">
                                    <label for="number">Número</label>
                                    <input type="text" class="form-control" name="number" id="number" required>
                                </div>

                                <!-- COMPLEMENT -->
                                <div class="form-group col-12 col-sm-6">
                                    <label for="complement">Complemento</label>
                                    <input type="text" class="form-control" name="complement" id="complement">
                                </div>
                            </div>
                        </fieldset>

                        <!-- TAB - PROFESSIONAL INFORMATIONS -->
                        <fieldset id="professional">
                            <div class="form-row">
                                <!-- USER -->
                                <div class="form-group col-sm-6">
                                    <label for="user">Usuário</label>
                                    <input type="text" class="form-control" name="user" id="user" required>
                                </div>

                                <!-- PASSWORD -->
                                <div class="form-group col-sm-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- ENTERPRISE PHONE -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label for="enterprisePhone">Ramal</label>
                                    <input type="text" class="form-control" name="enterprisePhone" id="enterprisePhone" placeholder="(XX) XXXX-XXXX">
                                </div>

                                <!-- PROFESSION -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label for="profession">Cargo</label>
                                    <input type="text" class="form-control" name="profession" id="profession">
                                </div>

                                <!-- SALARY -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label for="salary">Salário</label>
                                    <input type="text" class="form-control" name="salary" id="salary" placeholder="R$">
                                </div>

                                <!-- DATE OF ENTRY -->
                                <div class="form-group col-sm-6 col-md-3">
                                    <label for="dateOfEntry">Data de Ingresso</label>
                                    <input type="date" class="form-control" name="dateOfEntry" id="dateOfEntry">
                                </div>
                            </div>
                        </fieldset>

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