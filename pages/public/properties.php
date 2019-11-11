<div class="container-fluid" id="filterOptions">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="row">
            <div class="col-md-2">
                <div class="row justify-content-center">
                    Intenção
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <select class="custom-select mr-sm-2" name="purpose" id="intentionSelect">
                            <option value="venda">Aquisição</option>
                            <option value="locacao">Locação</option>
                            <option value="all" selected>Todos </option>
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
                        <select class="custom-select mr-sm-2" name="district" id="inlineFormCustomSelect">
                            <option value="Morumbi" >Morumbi</option>
                            <option value="Martins" selected>Martins</option>
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
                        <input type="number" name="minorPrice" id="lowestPrice" class="form-control" placeholder="Min" />
                    </div>
                    <div class="col-5">
                        <input type="number" name="higherPrice" id="highestPrice" class="form-control" placeholder="Max" />
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row justify-content-center">
                    Outras Informações
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <input type="text" name="info" class="form-control" id="otherInformations" />
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

<script>

</script>

<?php
    require_once "utility/conexaoMysql.php";
    require_once "utility/filtraEntrada.php";

    require_once "apartment.php";
    require_once "house.php";

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $arrayHouses = null;
        $msgErro = "";
        // Aqui devemos listar todos os imóveis
        try
        {
            $queryHouseInformations = "
            SELECT * FROM Immobile, ImmobHouse WHERE Immobile.immobileCode = ImmobHouse.codImmob;
            ";
            $queryAptInformations = "
            SELECT * FROM Immobile, ImmobApart WHERE Immobile.immobileCode = ImmobApart.codImmob;
            ";
            $conn = conectaAoMySQL();
            $arrayHouses = getHouses($conn, $queryHouseInformations);
            $arrayApartments = getApartments($conn, $queryAptInformations);
            writeCardHouses($arrayHouses, $conn);
            writeCardApartments($arrayApartments, $conn);
        }
        catch (Exception $e)
        {
            $msgErro = $e->getMessage();
        }
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Aqui devemos listar os imóveis de acordo com os filtros
        $purpose = filtraEntrada($_POST['purpose']);
        $district = filtraEntrada($_POST['district']);
        $minorPrice = filtraEntrada($_POST['minorPrice']);
        $higherPrice = filtraEntrada($_POST['higherPrice']);
        $info = filtraEntrada($_POST['info']);

        $queryHouseInformations = "
        SELECT * FROM Immobile, ImmobHouse WHERE Immobile.immobileCode = ImmobHouse.codImmob
        ";
        $queryAptInformations = "
        SELECT * FROM Immobile, ImmobApart WHERE Immobile.immobileCode = ImmobApart.codImmob
        ";
        if ($purpose !== 'all') {
            $queryHouseInformations = $queryHouseInformations." AND purpose = '$purpose'"; 
            $queryAptInformations = $queryAptInformations." AND purpose = '$purpose'";
        }
        if ($district !== 'all') {
            $queryHouseInformations = $queryHouseInformations." AND district = '$district'"; 
            $queryAptInformations = $queryAptInformations." AND district = '$district'";
        }
        if ($minorPrice && !$higherPrice) {
            $queryHouseInformations = $queryHouseInformations." AND immobileValue >= $minorPrice"; 
            $queryAptInformations = $queryAptInformations." AND immobileValue >= $minorPrice";
        }
        if (!$minorPrice && $higherPrice) {
            $queryHouseInformations = $queryHouseInformations." AND immobileValue <= $higherPrice"; 
            $queryAptInformations = $queryAptInformations." AND immobileValue <= $higherPrice";
        }
        if ($minorPrice && $higherPrice) {
            $queryHouseInformations = $queryHouseInformations." AND immobileValue BETWEEN $minorPrice AND $higherPrice"; 
            $queryAptInformations = $queryAptInformations." AND immobileValue BETWEEN $minorPrice AND $higherPrice";
        }
        if ($info) {
            $queryHouseInformations = $queryHouseInformations." AND description LIKE '%{$info}%'"; 
            $queryAptInformations = $queryAptInformations." AND description LIKE '%{$info}%'";
        }
        try
        {
            $conn = conectaAoMySQL();
            $arrayHouses = getHouses($conn, $queryHouseInformations);
            $arrayApartments = getApartments($conn, $queryAptInformations);
            writeCardHouses($arrayHouses, $conn);
            writeCardApartments($arrayApartments, $conn);
        }
        catch (Exception $e)
        {
            $msgErro = $e->getMessage();
        }
    }
?>

