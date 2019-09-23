<!DOCTYPE html>
<html>
<body>
<?php

  // PERSONAL INFORMATIONS
	$name = $_POST["name"];
	$cpf = $_POST["cpf"];
	$phone = $_POST["phone"];
  $cellphone = $_POST["cellphone"];

  // LOCATION INFORMATIONS
	$cep = $_POST["cep"];
	$state = $_POST["state"];
	$city = $_POST["city"];
	$district = $_POST["district"];
	$address = $_POST["address"];
	$number = $_POST["number"];
  $complement = $_POST["complement"];

  // PROFESSIONAL INFORMATIONS
	$user       = $_POST["user"];
	$password       = $_POST["password"];
	$enterprisePhone       = $_POST["enterprisePhone"];
	$profession       = $_POST["profession"];
	$salary       = $_POST["salary"];
	$dateOfEntry       = $_POST["dateOfEntry"];

	echo "name: $name <br/>";
	echo "cpf: $cpf <br/>";
	echo "phone: $phone <br/>";
	echo "cellphone: $cellphone <br/>";
	echo "cep: $cep <br/>";
	echo "state: $state <br/>";
	echo "city: $city <br/>";
	echo "district: $district <br/>";
	echo "address: $address <br/>";
	echo "number: $number <br/>";
	echo "complement: $complement <br/>";
	echo "user: $user <br/>";
	echo "password: $password <br/>";
	echo "enterprisePhone: $enterprisePhone <br/>";
	echo "profession: $profession <br/>";
	echo "salary: $salary <br/>";
	echo "dateOfEntry: $dateOfEntry <br/>";
?>
</body>
</html>