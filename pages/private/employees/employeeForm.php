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

                <?php include "components/stepPersonal.php"; ?>
                <?php include "components/stepLocation.php"; ?>
                <?php include "components/stepProfessional.php"; ?>


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
