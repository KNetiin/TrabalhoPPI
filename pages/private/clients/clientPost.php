<?php

require_once "../../../utility/conexaoMysql.php";
require_once "../../../utility/filtraEntrada.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Define e inicializa as variáveis
	$customerName = $cpf = $phone = $cellphone = $email = $zipCode = $state = $city = $district = $address = $addressNumber = $complement = $gender = $maritalStatus = $profession = "";

  // PERSONAL INFORMATIONS
	$customerName = filtraEntrada($_POST["name"]);
	$cpf = filtraEntrada($_POST["cpf"]);
	$phone = filtraEntrada($_POST["phone"]);
	$cellphone = filtraEntrada($_POST["cellphone"]);
	$email = filtraEntrada($_POST["email"]);

  // LOCATION INFORMATIONS
	$zipCode = filtraEntrada($_POST["cep"]);
	$state = filtraEntrada($_POST["state"]);
	$city = filtraEntrada($_POST["city"]);
	$district = filtraEntrada($_POST["district"]);
	$address = filtraEntrada($_POST["address"]);
	$addressNumber = filtraEntrada($_POST["number"]);
	$complement = filtraEntrada($_POST["complement"]);

  // ADDITIONAL INFORMATIONS
	$gender = filtraEntrada($_POST["gender"]);
	$maritalStatus = filtraEntrada($_POST["status"]);
	$profession = filtraEntrada($_POST["profession"]);

  try {
    // Função definida no arquivo conexaoMysql.php
    $conn = conectaAoMySQL();

    $insert = "
      INSERT INTO PropCustomers (customerName, cpf, phone, cellphone, email, zipCode, state, city, district, address, addressNumber, complement, gender, maritalStatus, profession)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    ";

    // prepara a declaração SQL (stmt é uma abreviação de statement)
    if (!$stmt = $conn->prepare($insert))
        throw new Exception("Falha na operacao prepare: " . $conn->error);

    // Faz a ligação dos parâmetros em aberto com os valores.
    if (!$stmt->bind_param("ssssssssssissss", $customerName, $cpf, $phone, $cellphone, $email, $zipCode, $state, $city, $district, $address, $addressNumber, $complement, $gender, $maritalStatus, $profession))
        throw new Exception("Falha na operacao bind_param: " . $stmt->error);

    if (!$stmt->execute())
        throw new Exception("Falha na operacao execute: " . $stmt->error);

    $conn->close();
  }
  catch (Exception $e) {
    $msgErro = $e->getMessage();
    echo $msgErro;
    $conn->close();
  }
}

?>
