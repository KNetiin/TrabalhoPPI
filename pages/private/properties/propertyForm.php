<div class="container pt-lg-3">
    <div class="card myForm">
        <!-- HEADER -->
        <div class="card-body text-white bg-dark formHeader">
            <h2 class="card-title text-center">Cadastro de Imóveis</h2>
        </div>

        <!-- NAVIGATION -->
        <div class="card-body text-center">
            <div class="row">
                <div class="col-3 stepHeader stepHeaderLeft" id="initial-property-header">
                    <div class="row p-1 align-items-center justify-content-center">
                        <i class="fas fa-user stepIcon"></i>
                        <div class="d-inline pt-2">
                            <h6>Informações</h6>
                            <h6>Iniciais</h6>
                        </div>
                    </div>
                </div>
                <div class="col-3 stepHeader stepHeaderMiddle" id="property-property-header">
                    <div class="row p-1 align-items-center justify-content-center">
                        <i class="fas fa-street-view stepIcon"></i>
                        <div class="d-inline pt-2">
                            <h6>Informações do</h6>
                            <h6>Imóvel</h6>
                        </div>
                    </div>
                </div>
                <div class="col-3 stepHeader stepHeaderMiddle2" id="location-property-header">
                    <div class="row p-1 align-items-center justify-content-center">
                        <i class="fas fa-user-plus stepIcon"></i>
                        <div class="d-inline pt-2">
                            <h6>Informações de</h6>
                            <h6>Localização</h6>
                        </div>
                    </div>
                </div>
                <div class="col-3 stepHeader stepHeaderRight" id="images-property-header">
                    <div class="row p-1 align-items-center justify-content-center">
                        <i class="fas fa-images stepIcon"></i>
                        <div class="d-inline pt-2">
                            <h6>Fotos do</h6>
                            <h6>Imóvel</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST">

                <div id="initial-property-form">
                    <?php include "components/stepInitial.php"; ?>
                </div>
                <div id="property-property-form" class="myDisplayNone">
                    <?php include "components/stepProperty.php"; ?>
                </div>
                <div id="location-property-form" class="myDisplayNone">
                    <?php include "components/stepLocation.php"; ?>
                </div>
                <div id="images-property-form" class="myDisplayNone">
                    <?php include "components/stepImages.php"; ?>
                </div>

                <div class="row">
                    <div class="col-6 myDisplayNone" id="back-property-form">
                        <button type="button" id="button-property-back" class="btn btn-danger btn-block">Voltar</button>
                    </div>
                    <div class="col-6" id="next-property-form">
                        <button type="button" id="button-property-next" class="btn btn-success btn-block">Próximo</button>
                    </div>
                    <div class="col-6 myDisplayNone" id="save-property-form">
                        <button type="submit" id="button-property-save" class="btn btn-success btn-block">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
