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

<?php include  __DIR__ . "/../../components/presentationCard.php"; ?>
