<!-- TAB - INITIAL INFORMATIONS -->
<fieldset id="initial">
    <div class="form-row">
        <!-- TYPE -->
        <div class="form-group col-md-4">
            <label for="type">Tipo do Imóvel:</label>
            <select class="custom-select form-control" name="type" id="type">
                <option selected value="casa">Casa</option>
                <option value="apartamento">Apartamento</option>
            </select>
        </div>

        <!-- INTEREST -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="interest">Interesse:</label>
            <select class="custom-select form-control" name="interest" id="interest">
                <option selected value="venda">Venda</option>
                <option value="locacao">Locação</option>
            </select>
        </div>
  
        <!-- AVAILABILITY -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="availability">Disponibilidade:</label>
            <select class="custom-select form-control" name="availability" id="availability">
                <option selected value="disponivel">Disponível</option>
                <option value="indisponivel">Indisponível</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <!-- DESCRIPTION -->
        <div class="form-group col-12">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="...">
        </div>
    </div>
</fieldset>