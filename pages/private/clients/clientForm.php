<div class="container pt-lg-3">
    <div class="card myForm">
        <!-- HEADER -->
        <div class="card-body text-white bg-dark formHeader">
            <h2 class="card-title text-center">Cadastro de Clientes Proprietários</h2>
        </div>

        <!-- NAVIGATION -->
        <div class="card-body text-center">
            <div class="row">
                <div class="col-4 stepHeader stepHeaderLeft" id="personal-client-header">
                    <div class="row p-1 align-items-center justify-content-center">
                        <i class="fas fa-user stepIcon"></i>
                        <div class="d-inline pt-2">
                            <h6>Informações</h6>
                            <h6>Pessoais</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4 stepHeader stepHeaderMiddle" id="location-client-header">
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

                <div id="personal-client-form">
                    <?php include "components/stepPersonal.php"; ?>
                </div>
                <div id="location-client-form" class="myDisplayNone">
                    <?php include "components/stepLocation.php"; ?>
                </div>
                <div id="additional-client-form" class="myDisplayNone">
                    <?php include "components/stepAdditional.php"; ?>
                </div>

                <div class="row">
                    <div class="col-6 myDisplayNone" id="back-client-form">
                        <button type="button" id="button-client-back" class="btn btn-danger btn-block">Voltar</button>
                    </div>
                    <div class="col-6" id="next-client-form">
                        <button type="button" id="button-client-next" class="btn btn-success btn-block">Próximo</button>
                    </div>
                    <div class="col-6 myDisplayNone" id="save-client-form">
                        <button type="submit" id="button-client-save" class="btn btn-success btn-block">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
