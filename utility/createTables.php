<?php

require_once "conexaoMysql.php";

try
{
  // Função definida no arquivo conexaoMysql.php
  $conn = conectaAoMySQL();

  // TABLE Employees
  $createTableEmployees = "
    CREATE TABLE Employees (
      employeeName varchar(100) NOT NULL,
      cpf varchar(14),
      phone varchar(14),
      cellphone varchar(15) NOT NULL,
      email varchar(40) NOT NULL, 
      zipCode varchar(9) NOT NULL, 
      state varchar(2) NOT NULL, 
      city varchar(30) NOT NULL,
      district varchar(30) NOT NULL,
      address varchar(50) NOT NULL,
      addressNumber integer NOT NULL,
      complement varchar(30) NOT NULL,
      userName varchar(30) NOT NULL,
      userPassword varchar(30) NOT NULL,
      enterprisePhone varchar(14) NOT NULL,
      profession varchar(20) NOT NULL,
      salary float NOT NULL,
      dateOfEntry varchar(10) NOT NULL,
      PRIMARY KEY (cpf)
    );
  ";

  $dropTableEmployees = "
    DROP TABLE IF EXISTS Employees;  
  ";

  $insertEmployees1 = "
    INSERT INTO Employees (employeeName, cpf, phone, cellphone, email, zipCode, state, city, district, address, addressNumber, complement, userName, userPassword, enterprisePhone, profession, salary, dateOfEntry)
    VALUES ('Antonio Neto', '091.156.615-05', '(34) 3311-5844', '(34) 99112-5568', 'batata@hotmail.com', '38046-045', 'MG', 'Uberlândia', 'Santa Mônica', 'R. Cecílio Jorge', 275, 'AP 201', 'neto', 'admin123', '(34) 3311-58412', 'escravo', 0.5, '01/01/2011' );
  ";

  // TABLE PropCustomers
  $createTablePropCustomers = "
    CREATE TABLE PropCustomers (
      customerName varchar(100) NOT NULL,
      cpf varchar(14),
      phone varchar(14),
      cellphone varchar(15) NOT NULL,
      email varchar(40) NOT NULL, 
      zipCode varchar(9) NOT NULL, 
      state varchar(2) NOT NULL, 
      city varchar(30) NOT NULL,
      district varchar(30) NOT NULL,
      address varchar(50) NOT NULL,
      addressNumber integer NOT NULL,
      complement varchar(30) NOT NULL,
      gender varchar(1),
      maritalStatus varchar(25),
      profession varchar(30),
      PRIMARY KEY (cpf)
    );
  ";

  $dropTablePropCustomers = "
    DROP TABLE IF EXISTS PropCustomers;
  ";

  $insertPropCustomers1 = "
    INSERT INTO PropCustomers (customerName, cpf, phone, cellphone, email, zipCode, state, city, district, address, addressNumber, complement, gender, maritalStatus, profession)
    VALUES ('João Neto', '491.125.615-02', '(34) 3311-5445', '(34) 99142-2568', 'joao@hotmail.com', '31546-045', 'SP', 'Tiête', 'Etlândia', 'R. Óvini', 222, '???? XD', 'M', 'casado', 'Explorador' );
  ";

  // TABLE Interest
  $createTableInterest = "
    CREATE TABLE Interest (
      id integer NOT NULL AUTO_INCREMENT,
      customerName varchar(100) NOT NULL,
      email varchar(40) NOT NULL,
      cellphone varchar(15) NOT NULL,
      description varchar(500) NOT NULL,
      PRIMARY KEY (id)
    );  
  ";

  $dropTableInterest = "
    DROP TABLE IF EXISTS Interest;
  ";

  // TABLE Immobile
  $createTableImmobile = "
    CREATE TABLE Immobile (
      immobileCode varchar(50),
      codProp varchar(14) NOT NULL,
      constraint codProp FOREIGN KEY (codProp) REFERENCES PropCustomers (cpf),
      purpose varchar(35) NOT NULL,
      immobileValue float NOT NULL,
      zipCode varchar(9) NOT NULL,
      state varchar(2) NOT NULL,
      city varchar(30) NOT NULL,
      address varchar(50) NOT NULL,
      addressNumber integer NOT NULL,
      complement varchar(30) NOT NULL,
      district varchar(30) NOT NULL,
      rooms integer NOT NULL,
      suites integer NOT NULL,
      description varchar(500) NOT NULL,
      availability integer(1) NOT NULL,
      livingRooms integer NOT NULL,
      diningRooms integer NOT NULL,
      parkingSpaces integer NOT NULL,
      wardrobes integer(1) NOT NULL,
      PRIMARY KEY (immobileCode)
    );
  ";

  $dropTableImmobile = "
    DROP TABLE IF EXISTS Immobile;
  ";

  // TABLE ImmobHouse
  $createTableImmobHouse = "
    CREATE TABLE ImmobHouse (
      hasPool integer(1) NOT NULL,
      immobArea float NOT NULL,
      codImmob integer NOT NULL,
      constraint codImmob FOREIGN KEY (codImmob) REFERENCES Immobile (immobileCode),
      PRIMARY KEY (codImmob)
    );    
  ";

  $dropTableImmobHouse = "
    DROP TABLE IF EXISTS ImmobHouse;
  ";

  // TABLE ImmobApart
  $createTableImmobApart = "
    CREATE TABLE ImmobApart (
      hasConcierge integer(1) NOT NULL,
      apartmentNumber integer NOT NULL,
      apartmentFloor integer NOT NULL,
      condominiumValue float NOT NULL,
      codImmob integer NOT NULL,
      constraint codImmob FOREIGN KEY (codImmob) REFERENCES Immobile (immobileCode),
      PRIMARY KEY (codImmob)
    );
  ";

  $dropTableImmobApart = "
    DROP TABLE IF EXISTS ImmobApart;
  ";

  // DROP ALL TABLES
  if (!$conn->query($dropTableEmployees) ||
      !$conn->query($dropTablePropCustomers) ||
      !$conn->query($dropTableInterest) ||
      !$conn->query($dropTableImmobile) ||
      !$conn->query($dropTableImmobHouse) ||
      !$conn->query($dropTableImmobApart)) {

    throw new Exception("Falha na deleção das tabelas: " . $conn->error);
  }

  // CREATE ALL TABLES
  if (!$conn->query($createTableEmployees) ||
      !$conn->query($createTablePropCustomers) ||
      !$conn->query($createTableInterest) ||
      !$conn->query($createTableImmobile) ||
      !$conn->query($createTableImmobHouse) ||
      !$conn->query($createTableImmobApart)) {

    throw new Exception("Falha na criação das tabelas: " . $conn->error);
  }

  // INSERT VALUES IN ALL TABLES
  if (!$conn->query($insertEmployees1)) {

    throw new Exception("Falha no INSERT da tabela EMPLOYEES: " . $conn->error);
  }
  
  if (!$conn->query($insertPropCustomers1)) {

    throw new Exception("Falha no INSERT da tabela PROPCUSTOMERS: " . $conn->error);
  }

}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
  echo $msgErro;
}

?>