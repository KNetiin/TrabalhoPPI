<?php
require_once "conexaoMysql.php";
require_once "filtraEntrada.php";

class Endereco {
    public $zipCode;
    public $state;
    public $city;
    public $district;
    public $address;
}

try {
    $zipCode = $state = $city = $district = $address = "";
    
    $conn = conectaAoMySQL();

    if (isset($_GET["zipCode"])) {
        $zipCode = filtraEntrada($_GET["zipCode"]);

        $query = "
            SELECT *
            FROM Address
            WHERE zipCode = '$zipCode';
        ";

        $result = $conn->query($query);

        // NAO DA CERTO
        // WHERE zipCode = ?;
        // if (!$prepare = $conn->prepare($query))
        //     throw new Exception("Falha na operacao prepare: " . $conn->error);

        // if (!$prepare->bind_param('s', $zipCode))
        //     throw new Exception("Falha na operacao bind_param: " . $prepare->error);

        // $result = $prepare->execute();
        // if (!$result)
        //     throw new Exception("Falha na operacao execute: " . $prepare->error);

        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();

            $endereco = new Endereco();

            $endereco->zipCode = $row["zipCode"];
            $endereco->state = $row["state"];
            $endereco->city = $row["city"];
            $endereco->district = $row["district"];
            $endereco->address = $row["address"];


            if (! $jsonStr = json_encode($endereco))
                throw new Exception("Falha na funcao json_encode do PHP");
    
            echo $jsonStr;
        }

        $conn->close();

    }
}
catch (Exception $e)
{
    // altera o código de retorno de status para '500 Internal Server Error'.
    // A função http_response_code deve ser chamada antes do script enviar qualquer
    // texto para a saída padrão
    http_response_code(500);

    $msgErro = $e->getMessage();
    echo $msgErro;
}
?>