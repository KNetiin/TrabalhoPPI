<!-- TAB - PROPERTY INFORMATIONS -->
<fieldset>
    <div class="form-row">
        <!-- QT BEDROOMS -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="bedrooms">Qtd(s) de Quartos:</label>
            <input type="text" class="form-control" name="bedrooms">
        </div>

        <!-- SUITES -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="suites">Qtd(s) de Suítes:</label>
            <input type="text" class="form-control" name="suites">
        </div>
  
        <!-- LIVING ROOM -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="livingRoom">Qtd(s) de Salas de Estar:</label>
            <input type="text" class="form-control" name="livingRoom">
        </div>

        <!-- DINING ROOM -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="diningRoom">Qtd(s) de Salas de Jantar:</label>
            <input type="text" class="form-control" name="diningRoom">
        </div>

        <!-- GARAGE VACANCIES -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="garageVacancies">Qtd(s) de Vagas na Garagem:</label>
            <input type="text" class="form-control" name="garageVacancies">
        </div>

        <!-- TOTAL AREA -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="totalArea">Área Total:</label>
            <input type="text" class="form-control" name="totalArea" placeholder="m²">
        </div>
    </div>

    <div class="form-row">
        <!-- INBUILT CABINET -->
        <div class="form-group col-sm-6">
            <label for="inbuiltCabinet">Armário Embutido:</label>
            <select class="custom-select form-control" name="inbuiltCabinet">
                <option selected value="1">Possui</option>
                <option value="0">Não Possui</option>
            </select>
        </div>

        <!-- PRICE -->
        <div class="form-group col-sm-6">
            <label for="price">Preço de Venda/Locação:</label>
            <input type="text" class="form-control" name="price" placeholder="m²">
        </div>
    </div>

    <div class="form-row">
        <!-- 24H CONCIERGE -->
        <div class="form-group col-sm-6">
            <label for="24hConcierge">Portaria 24h:</label>
            <select class="custom-select form-control" name="24hConcierge">
                <option selected value="disponivel">Possui</option>
                <option value="indisponivel">Não Possui</option>
            </select>
        </div>

        <!-- CONDOMINIUM -->
        <div class="form-group col-sm-6">
            <label for="condominium">Valor do Condomínio:</label>
            <input type="text" class="form-control" name="condominium" placeholder="m²">
        </div>
    </div>
</fieldset>