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
                        <i class="fas fa-user-plus stepIcon"></i>
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
            <form action="clientPost.php" method="POST">

                <?php include  __DIR__ . "/../../../components/stepPersonal.php"; ?>
                <?php include  __DIR__ . "/../../..//components/stepLocation.php"; ?>
                <?php include  __DIR__ . "/../../..//components/stepAdditional.php"; ?>

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

<script src="../../../script/clientForm.js"></script>
