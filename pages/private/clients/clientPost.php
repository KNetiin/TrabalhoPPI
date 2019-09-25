<!DOCTYPE html>
<html>
<body>
<?php

  // PERSONAL INFORMATIONS
	$name = $_POST["name"];
	$cpf = $_POST["cpf"];
	$phone = $_POST["phone"];
  $cellphone = $_POST["cellphone"];
  $email = $_POST["email"];

  // LOCATION INFORMATIONS
	$cep = $_POST["cep"];
	$state = $_POST["state"];
	$city = $_POST["city"];
	$district = $_POST["district"];
	$address = $_POST["address"];
	$number = $_POST["number"];
  $complement = $_POST["complement"];

  // ADDITIONAL INFORMATIONS
	$gender = $_POST["gender"];
	$status = $_POST["status"];
	$profession = $_POST["profession"];

	echo "name: $name <br/>";
	echo "cpf: $cpf <br/>";
	echo "phone: $phone <br/>";
	echo "cellphone: $cellphone <br/>";
	echo "email: $email <br/>";
	echo "cep: $cep <br/>";
	echo "state: $state <br/>";
	echo "city: $city <br/>";
	echo "district: $district <br/>";
	echo "address: $address <br/>";
	echo "number: $number <br/>";
	echo "complement: $complement <br/>";
	echo "gender: $gender <br/>";
	echo "status: $status <br/>";
	echo "profession: $profession <br/>";
?>
</body>
</html>