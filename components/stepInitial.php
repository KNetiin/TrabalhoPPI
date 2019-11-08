<!-- TAB - INITIAL INFORMATIONS -->
<fieldset>
    <div class="form-row">
        <!-- TYPE -->
        <div class="form-group col-md-4">
            <label for="type">Tipo do Imóvel:</label>
            <select class="custom-select form-control" name="type" onChange="changeType(this)">
                <option selected value="casa">Casa</option>
                <option value="apartamento">Apartamento</option>
            </select>
        </div>

        <!-- INTEREST -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="interest">Interesse:</label>
            <select class="custom-select form-control" name="interest">
                <option selected value="venda">Venda</option>
                <option value="locacao">Locação</option>
            </select>
        </div>
  
        <!-- AVAILABILITY -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="availability">Disponibilidade:</label>
            <select class="custom-select form-control" name="availability">
                <option selected value="1">Disponível</option>
                <option value="0">Indisponível</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <!-- DESCRIPTION -->
        <div class="form-group col-12">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" name="description" placeholder="...">
        </div>
    </div>
</fieldset>

<script>
function changeType (el) {
    if (el.value === 'casa') {
        $("#apartamento").hide("fast")
        $("#casa").show("fast")
    } else {
        $("#apartamento").show("fast")
        $("#casa").hide("fast")
    }
};
</script>