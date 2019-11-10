<?php

require_once "../../../utility/conexaoMysql.php";
require_once "../../../utility/filtraEntrada.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Define e inicializa as variáveis
    $immobileCode = $codProp = $purpose = $availability = $description = $rooms = $suites = $livingRooms = $diningRooms = $parkingSpaces = $immobileValue = $zipCode = $state = $city = $district = $address = $addressNumber = $complement = "";
    $hasPool = $immobArea = "";
    $apartmentNumber = $apartmentFloor = $condominiumValue = "";

    // INITIAL INFORMATIONS
    $codProp = filtraEntrada($_POST["codProp"]);
    $purpose = filtraEntrada($_POST["interest"]); // Pode receber os valores 'casa' ou 'apartamento'
    $availability = filtraEntrada($_POST["availability"]);
    $description = filtraEntrada($_POST["description"]);
    $propertieType = $_POST['type']; // Pode receber os valores 'casa' ou 'apartamento'

    // PROPERTY INFORMATIONS
    $rooms = filtraEntrada($_POST["bedrooms"]);
    $suites = filtraEntrada($_POST["suites"]);
    $livingRooms = filtraEntrada($_POST["livingRoom"]);
    $diningRooms = filtraEntrada($_POST["diningRoom"]);
    $parkingSpaces = filtraEntrada($_POST["garageVacancies"]);
    $immobileValue = filtraEntrada($_POST["price"]);

    if ($propertieType === "casa") {
        $hasPool = filtraEntrada($_POST["pool"]);
        $immobArea = filtraEntrada($_POST["totalArea"]);
    } else {
        $apartmentNumber = filtraEntrada($_POST["floor"]);
        $apartmentFloor = filtraEntrada($_POST["apartment"]);
        $condominiumValue = filtraEntrada($_POST["condominium"]);
    }

    // LOCATION INFORMATIONS
    $zipCode  = filtraEntrada($_POST["cep"]);
    $state  = filtraEntrada($_POST["state"]);
    $city  = filtraEntrada($_POST["city"]);
    $district  = filtraEntrada($_POST["district"]);
    $address  = filtraEntrada($_POST["address"]);
    $addressNumber  = filtraEntrada($_POST["number"]);
    $complement  = filtraEntrada($_POST["complement"]);

    $immobileCode = uniqid(); // Gerando o id da imagem
    // IMAGES INFORMATIONS
    $uploadDiretory = 'images/';

    $sizeImg1 = $_FILES['images1']['size'];
    $sizeImg2 = $_FILES['images2']['size'];
    $sizeImg3 = $_FILES['images3']['size'];
    $sizeImg4 = $_FILES['images4']['size'];
    $sizeImg5 = $_FILES['images5']['size'];
    $sizeImg6 = $_FILES['images6']['size'];

    $imagem1;
    $imagem2;
    $imagem3;
    $imagem4;
    $imagem5;
    $imagem6;

    function trataImagem($imagem, $idImmob, $numImage)
    {
        $arrName = explode(".", $imagem);
        $extension = $arrName[count($arrName) - 1];
        $newName = $idImmob . $numImage .".".$extension;
        return $newName;
    };

    try {
        // Função definida no arquivo conexaoMysql.php
        $conn = conectaAoMySQL();

        // INSERIR O GENERICO
        $insert = "
      INSERT INTO Immobile (immobileCode, codProp, purpose, availability, description, rooms, suites, livingRooms, diningRooms, parkingSpaces, immobileValue, zipCode, state, city, district, address, addressNumber, complement)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    ";

        // prepara a declaração SQL (stmt é uma abreviação de statement)
        if (!$stmt = $conn->prepare($insert))
            throw new Exception("Falha na operacao prepare: " . $conn->error);

        // Faz a ligação dos parâmetros em aberto com os valores.
        if (!$stmt->bind_param("sssisiiiiidsssssis", $immobileCode, $codProp, $purpose, $availability, $description, $rooms, $suites, $livingRooms, $diningRooms, $parkingSpaces, $immobileValue, $zipCode, $state, $city, $district, $address, $addressNumber, $complement))
            throw new Exception("Falha na operacao bind_param: " . $stmt->error);

        if (!$stmt->execute())
            throw new Exception("Falha na operacao execute: " . $stmt->error);

        // INSERIR O ESPECIFICO
        if ($propertieType === "casa") {
            $insert = "
        INSERT INTO ImmobHouse (hasPool, immobArea, codImmob)
        VALUES (?, ?, ?);
      ";

            // prepara a declaração SQL (stmt é uma abreviação de statement)
            if (!$stmt = $conn->prepare($insert))
                throw new Exception("Falha na operacao prepare: " . $conn->error);

            // Faz a ligação dos parâmetros em aberto com os valores.
            if (!$stmt->bind_param("ids", $hasPool, $immobArea, $immobileCode))
                throw new Exception("Falha na operacao bind_param: " . $stmt->error);

            if (!$stmt->execute())
                throw new Exception("Falha na operacao execute: " . $stmt->error);
        } else {
            $insert = "
        INSERT INTO ImmobApart (apartmentNumber, apartmentFloor, condominiumValue, codImmob)
        VALUES (?, ?, ?, ?);
      ";

            // prepara a declaração SQL (stmt é uma abreviação de statement)
            if (!$stmt = $conn->prepare($insert))
                throw new Exception("Falha na operacao prepare: " . $conn->error);

            // Faz a ligação dos parâmetros em aberto com os valores.
            if (!$stmt->bind_param("iids", $apartmentNumber, $apartmentFloor, $condominiumValue, $immobileCode))
                throw new Exception("Falha na operacao bind_param: " . $stmt->error);

            if (!$stmt->execute())
                throw new Exception("Falha na operacao execute: " . $stmt->error);
        }

        // Criar o statement das imagens
            $insertInTableImagesProperties = "
            INSERT INTO ImagesProperties (codImmob, imageName) VALUES (?, ?)
            ";

        // Testar agora quais imagens foram enviadas, tratar os nomes e obter a extensão das imagens, alterar os nomes com o id e o número da imagem, concatenar com a extensão, salvar no banco.

        if ($sizeImg1 !== 0) {
            $imagem1 = $_FILES['images1']['name'];
            $imagem1 = trataImagem($imagem1, $immobileCode, '1');
            // Abaixo, vamos tentar inserir os dados das imagens na tabela, se der certo, a salvamos no servidor
            if (!$stmt = $conn->prepare($insertInTableImagesProperties))
                throw new Exception("Falha na operacao prepare: ". $conn->error);
            if (!$stmt->bind_param("ss", $immobileCode, $imagem1))
                throw new Exception("Falha na operacao bind_param: ".$stmt->error);
            if ($stmt->execute()) {
                // Se entrou aqui, então temos certeza de que a informação fora inserida na tabela, e agora temos que salvar a foto no servidor com o nome que escolhemos
                $uploadArq = $uploadDiretory.$imagem1;
                move_uploaded_file($_FILES['images1']['tmp_name'], $uploadArq);
            } else {
                throw new Exception("Falha na operacao execute: ".$stmt->error);
            }
        };
        if ($sizeImg2 !== 0) {
            $imagem2 = $_FILES['images2']['name'];
            $imagem2 = trataImagem($imagem2, $immobileCode, '2');
            // Abaixo, vamos tentar inserir os dados das imagens na tabela, se der certo, a salvamos no servidor
            if (!$stmt = $conn->prepare($insertInTableImagesProperties))
                throw new Exception("Falha na operacao prepare: ". $conn->error);
            if (!$stmt->bind_param("ss", $immobileCode, $imagem2))
                throw new Exception("Falha na operacao bind_param: ".$stmt->error);
            if ($stmt->execute()) {
                // Se entrou aqui, então temos certeza de que a informação fora inserida na tabela, e agora temos que salvar a foto no servidor com o nome que escolhemos
                $uploadArq = $uploadDiretory.$imagem2;
                move_uploaded_file($_FILES['images2']['tmp_name'], $uploadArq);
            } else {
                throw new Exception("Falha na operacao execute: ".$stmt->error);
            }
        };
        if ($sizeImg3 !== 0) {
            $imagem3 = $_FILES['images3']['name'];
            $imagem3 = trataImagem($imagem3, $immobileCode, '3');
            // Abaixo, vamos tentar inserir os dados das imagens na tabela, se der certo, a salvamos no servidor
            if (!$stmt = $conn->prepare($insertInTableImagesProperties))
                throw new Exception("Falha na operacao prepare: ". $conn->error);
            if (!$stmt->bind_param("ss", $immobileCode, $imagem3))
                throw new Exception("Falha na operacao bind_param: ".$stmt->error);
            if ($stmt->execute()) {
                // Se entrou aqui, então temos certeza de que a informação fora inserida na tabela, e agora temos que salvar a foto no servidor com o nome que escolhemos
                $uploadArq = $uploadDiretory.$imagem3;
                move_uploaded_file($_FILES['images3']['tmp_name'], $uploadArq);
            } else {
                throw new Exception("Falha na operacao execute: ".$stmt->error);
            }
        };
        if ($sizeImg4 !== 0) {
            $imagem4 = $_FILES['images4']['name'];
            $imagem4 = trataImagem($imagem4, $immobileCode, '4');
            // Abaixo, vamos tentar inserir os dados das imagens na tabela, se der certo, a salvamos no servidor
            if (!$stmt = $conn->prepare($insertInTableImagesProperties))
                throw new Exception("Falha na operacao prepare: ". $conn->error);
            if (!$stmt->bind_param("ss", $immobileCode, $imagem4))
                throw new Exception("Falha na operacao bind_param: ".$stmt->error);
            if ($stmt->execute()) {
                // Se entrou aqui, então temos certeza de que a informação fora inserida na tabela, e agora temos que salvar a foto no servidor com o nome que escolhemos
                $uploadArq = $uploadDiretory.$imagem4;
                move_uploaded_file($_FILES['images4']['tmp_name'], $uploadArq);
            } else {
                throw new Exception("Falha na operacao execute: ".$stmt->error);
            }
        };
        if ($sizeImg5 !== 0) {
            $imagem5 = $_FILES['images5']['name'];
            $imagem5 = trataImagem($imagem5, $immobileCode, '5');
            // Abaixo, vamos tentar inserir os dados das imagens na tabela, se der certo, a salvamos no servidor
            if (!$stmt = $conn->prepare($insertInTableImagesProperties))
                throw new Exception("Falha na operacao prepare: ". $conn->error);
            if (!$stmt->bind_param("ss", $immobileCode, $imagem5))
                throw new Exception("Falha na operacao bind_param: ".$stmt->error);
            if ($stmt->execute()) {
                // Se entrou aqui, então temos certeza de que a informação fora inserida na tabela, e agora temos que salvar a foto no servidor com o nome que escolhemos
                $uploadArq = $uploadDiretory.$imagem5;
                move_uploaded_file($_FILES['images5']['tmp_name'], $uploadArq);
            } else {
                throw new Exception("Falha na operacao execute: ".$stmt->error);
            }
        };
        if ($sizeImg6 !== 0) {
            $imagem6 = $_FILES['images6']['name'];
            $imagem6 = trataImagem($imagem6, $immobileCode, '6');
            // Abaixo, vamos tentar inserir os dados das imagens na tabela, se der certo, a salvamos no servidor
            if (!$stmt = $conn->prepare($insertInTableImagesProperties))
                throw new Exception("Falha na operacao prepare: ". $conn->error);
            if (!$stmt->bind_param("ss", $immobileCode, $imagem6))
                throw new Exception("Falha na operacao bind_param: ".$stmt->error);
            if ($stmt->execute()) {
                // Se entrou aqui, então temos certeza de que a informação fora inserida na tabela, e agora temos que salvar a foto no servidor com o nome que escolhemos
                $uploadArq = $uploadDiretory.$imagem6;
                move_uploaded_file($_FILES['images6']['tmp_name'], $uploadArq);
            } else {
                throw new Exception("Falha na operacao execute: ".$stmt->error);
            }
        };


        $conn->close();
    } catch (Exception $e) {
        $msgErro = $e->getMessage();
        echo $msgErro;
        $conn->close();
    }
}
