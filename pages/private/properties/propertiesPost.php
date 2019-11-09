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

  // IMAGES INFORMATIONS
  $uploadDiretory = '../images/properties';

  $immobileCode = uniqid();

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

    $conn->close();
  }
  catch (Exception $e) {
    $msgErro = $e->getMessage();
    echo $msgErro;
    $conn->close();
  }
}
?>