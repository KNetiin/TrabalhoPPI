<?php

// require_once "../../../utility/conexaoMysql.php";
// require_once "../../../utility/filtraEntrada.php";

define("HOST", "fdb22.awardspace.net");
define("USER", "3159096_mysql");
define("PASSWORD", "ppi12345678");
define("DATABASE", "3159096_mysql");

function conectaAoMySQL()
{
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error)
        throw new Exception('Falha na conexão com o MySQL: ' . $conn->connect_error);

    return $conn;
}

// Valida uma string removendo alguns caracteres
// especiais que poderiam ser provenientes
// de ataques do tipo HTML/CSS/JavaScript Injection
function filtraEntrada($dado) 
{
  $dado = trim($dado);               // remove espaços no inicio e no final da string
  $dado = stripslashes($dado);       // remove contra barras: "cobra d\'agua" vira "cobra d'agua"
  $dado = htmlspecialchars($dado);   // caracteres especiais do HTML (como < e >) são codificados

  return $dado;
}

echo 'entrou aki';

function cadastraFuncionario($conn, $employeeName, $cpf, $phone, $cellphone, $email, $zipCode, $state, $city, $district, $address, $addressNumber, $complement, $userName, $userPassword, $enterprisePhone, $profession, $salary, $dateOfEntry)
{
  $insert = "
    INSERT INTO Employees (employeeName, cpf, phone, cellphone, email, zipCode, state, city, district, address, addressNumber, complement, userName, userPassword, enterprisePhone, profession, salary, dateOfEntry)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
  ";

  // prepara a declaração SQL (stmt é uma abreviação de statement)
  if (!$stmt = $conn->prepare($insert))
      throw new Exception("Falha na operacao prepare: " . $conn->error);

  // Faz a ligação dos parâmetros em aberto com os valores.
  if (!$stmt->bind_param($employeeName, $cpf, $phone, $cellphone, $email, $zipCode, $state, $city, $district, $address, $addressNumber, $complement, $userName, $userPassword, $enterprisePhone, $profession, $salary, $dateOfEntry))
      throw new Exception("Falha na operacao bind_param: " . $stmt->error);

  if (!$stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Define e inicializa as variáveis
  $employeeName = $cpf = $phone = $cellphone = $email = $zipCode = $state = $city = $district = $address = $addressNumber = $complement = $userName = $userPassword = $enterprisePhone = $profession = $salary = $dateOfEntry = "";

  // PERSONAL INFORMATIONS
  $employeeName = filtraEntrada($_POST["name"]);
  $cpf  = filtraEntrada($_POST["cpf"]);
  $phone  = filtraEntrada($_POST["phone"]);
  $cellphone  = filtraEntrada($_POST["cellphone"]);
  $email  = filtraEntrada($_POST["email"]);

  // LOCATION INFORMATIONS
  $zipCode  = filtraEntrada($_POST["cep"]);
  $state  = filtraEntrada($_POST["state"]);
  $city  = filtraEntrada($_POST["city"]);
  $district  = filtraEntrada($_POST["district"]);
  $address  = filtraEntrada($_POST["address"]);
  $addressNumber  = filtraEntrada($_POST["number"]);
  $complement  = filtraEntrada($_POST["complement"]);

  // PROFESSIONAL INFORMATIONS
  $userName  = filtraEntrada($_POST["user"]);
  $userPassword  = filtraEntrada($_POST["password"]);
  $enterprisePhone  = filtraEntrada($_POST["enterprisePhone"]);
  $profession  = filtraEntrada($_POST["profession"]);
  $salary  = filtraEntrada($_POST["salary"]);
  $dateOfEntry  = filtraEntrada($_POST["dateOfEntry"]);

  try {
    // Função definida no arquivo conexaoMysql.php
    $conn = conectaAoMySQL();
  
    cadastraFuncionario($conn, $employeeName, $cpf, $phone, $cellphone, $email, $zipCode, $state, $city, $district, $address, $addressNumber, $complement, $userName, $userPassword, $enterprisePhone, $profession, $salary, $dateOfEntry);
  }
  catch (Exception $e) {
    $msgErro = $e->getMessage();
    echo $msgErro;
  }
}

?>
