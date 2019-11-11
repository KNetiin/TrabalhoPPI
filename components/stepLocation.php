<!-- TAB - LOCATION INFORMATIONS -->
<fieldset>
    <div class="form-row">
        <!-- CEP -->
        <div class="form-group col-md-6">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" placeholder="XXXXX-XXX" required onkeyup="buscaEndereco(this.value)">
        </div>
    </div>

    <div class="form-row">
        <!-- STATE -->
        <div class="form-group col-sm-6 col-md-2">
            <label for="state">Estado</label>
            <input type="text" class="form-control" name="state">
        </div>

        <!-- CITY -->
        <div class="form-group col-sm-6 col-md-4">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" name="city">
        </div>

        <!-- DISTRICT -->
        <div class="form-group col-md-6">
            <label for="district">Bairro</label>
            <input type="text" class="form-control" name="district">
        </div>
    </div>

    <div class="form-row">
        <!-- ADDRESS -->
        <div class="form-group col-8 col-md-4">
            <label for="address">Logradouro</label>
            <input type="text" class="form-control" name="address">
        </div>

        <!-- NUMBER -->
        <div class="form-group col-4 col-md-2">
            <label for="number">Número</label>
            <input type="text" class="form-control" name="number" required>
        </div>

        <!-- COMPLEMENT -->
        <div class="form-group col-12 col-sm-6">
            <label for="complement">Complemento</label>
            <input type="text" class="form-control" name="complement">
        </div>
    </div>
</fieldset>

<script>

function buscaEndereco(zipCode) {
    if (zipCode.length != 9)
        return;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function (e)
    {
        if (xmlhttp.status == 200)
        {
            if (xmlhttp.responseText != "")
            {
                try
                {
                    address = JSON.parse(xmlhttp.responseText);
                    document.forms[6]["state"].value = address.state;
                    document.forms[6]["city"].value = address.city;
                    document.forms[6]["district"].value = address.district;
                    document.forms[6]["address"].value = address.address;
                    document.forms[7]["state"].value = address.state;
                    document.forms[7]["city"].value = address.city;
                    document.forms[7]["district"].value = address.district;
                    document.forms[7]["address"].value = address.address;
                    document.forms[8]["state"].value = address.state;
                    document.forms[8]["city"].value = address.city;
                    document.forms[8]["district"].value = address.district;
                    document.forms[8]["address"].value = address.address;
                }
                catch (e)
                {
                    alert("A string retornada pelo servidor não é um JSON válido: " + xmlhttp.responseText);
                }
            }
            else
                alert("CEP não encontrado");
        }
    }

    xmlhttp.open("GET", "http://fuguete-e-farofa.atwebpages.com/utility/buscaEndereco.php?zipCode=" + zipCode, true);
    xmlhttp.send();
    }
</script>
