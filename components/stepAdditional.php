<!-- TAB - ADDITIONAL INFORMATIONS -->
<fieldset id="additional">
    <div class="form-row">
        <!-- GENDER -->
        <div class="form-group col-sm-6">
            <label for="gender">Sexo:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender1" value="M">
                <label class="form-check-label" for="gender1">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="F">
                <label class="form-check-label" for="gender2">Feminino</label>
            </div>
        </div>

        <!-- STATUS -->
        <div class="form-group col-sm-6">
            <label for="status">Estado Civil:</label>
            <select class="custom-select" name="status" id="status">
                <option selected value="solteiro">Solteiro(a)</option>
                <option value="casado">Casado(a)</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <!-- PROFESSION -->
        <div class="form-group col-12">
            <label for="profession">Cargo</label>
            <input type="text" class="form-control" name="profession" id="profession">
        </div>
    </div>
</fieldset>