<?php

require_once "conexaoMysql.php";

try
{
  // Funçao definida no arquivo conexaoMysql.php
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
    VALUES ('Antonio Neto', '091.156.615-05', '(34) 3311-5844', '(34) 99112-5568', 'batata@hotmail.com', '38046-045', 'MG', 'Uberlandia', 'Santa Monica', 'R. Cecilio Jorge', 275, 'AP 201', 'neto', 'admin123', '(34) 3311-58412', 'escravo', 0.5, '01/01/2011' );
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
    VALUES ('Joao Neto', '491.125.615-02', '(34) 3311-5445', '(34) 99142-2568', 'joao@hotmail.com', '31546-045', 'SP', 'Tiete', 'Etlandia', 'R. Ovini', 222, '???? XD', 'M', 'casado', 'Explorador' );
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
      immobileCode varchar(13),
      codProp varchar(14) NOT NULL,
      purpose varchar(35) NOT NULL,
      availability integer(1) NOT NULL,
      description varchar(500) NOT NULL,
      rooms integer NOT NULL,
      suites integer NOT NULL,
      livingRooms integer NOT NULL,
      diningRooms integer NOT NULL,
      parkingSpaces integer NOT NULL,
      immobileValue float NOT NULL,
      zipCode varchar(9) NOT NULL,
      state varchar(2) NOT NULL,
      city varchar(30) NOT NULL,
      district varchar(30) NOT NULL,
      address varchar(50) NOT NULL,
      addressNumber integer NOT NULL,
      complement varchar(30) NOT NULL,
      PRIMARY KEY (immobileCode),
      constraint codProp FOREIGN KEY (codProp) REFERENCES PropCustomers (cpf)
    );
  ";

  $dropTableImmobile = "
    DROP TABLE IF EXISTS Immobile;
  ";

  $insertImmobile1 = "
    INSERT INTO Immobile (immobileCode, codProp, purpose, availability, description, rooms, suites, livingRooms, diningRooms, parkingSpaces, immobileValue, zipCode, state, city, district, address, addressNumber, complement)
    VALUES ('56sdsad65gff', '491.125.615-02', 'venda', 1, 'mega imovel', 4, 3, 2, 1, 3, 4555.55, '38408-196', 'MG', 'Uberlandia', 'Santa Monica', 'Rua Cecilio Jorge', 122, 'azul' );
  ";

  $insertImmobile2 = "
    INSERT INTO Immobile (immobileCode, codProp, purpose, availability, description, rooms, suites, livingRooms, diningRooms, parkingSpaces, immobileValue, zipCode, state, city, district, address, addressNumber, complement)
    VALUES ('sdf45gdf6', '491.125.615-02', 'aluguel', 0, 'mini imovel', 2, 1, 4, 1, 4, 455.55, '14057-050', 'SP', 'Ribeirao Preto', 'Parque das Andorinhas', 'Rua Antonio Pinho', 122, 'azul' );
  ";
  

  // TABLE ImmobHouse
  $createTableImmobHouse = "
    CREATE TABLE ImmobHouse (
      hasPool integer(1) NOT NULL,
      immobArea float NOT NULL,
      codImmob varchar(13) NOT NULL,
      constraint codImmob FOREIGN KEY (codImmob) REFERENCES Immobile (immobileCode),
      PRIMARY KEY (codImmob)
    );    
  ";

  $dropTableImmobHouse = "
    DROP TABLE IF EXISTS ImmobHouse;
  ";

  $insertImmobHouse1 = "
    INSERT INTO ImmobHouse (hasPool, immobArea, codImmob)
    VALUES (1, 255.5, '56sdsad65gff');
  ";

  // TABLE ImmobApart
  $createTableImmobApart = "
    CREATE TABLE ImmobApart (
      apartmentNumber integer NOT NULL,
      apartmentFloor integer NOT NULL,
      condominiumValue float NOT NULL,
      codImmob varchar(13) NOT NULL,
      constraint codImmob FOREIGN KEY (codImmob) REFERENCES Immobile (immobileCode),
      PRIMARY KEY (codImmob)
    );
  ";

  $dropTableImmobApart = "
    DROP TABLE IF EXISTS ImmobApart;
  ";

  $insertImmobApart1 = "
    INSERT INTO ImmobApart (apartmentNumber, apartmentFloor, condominiumValue, codImmob)
    VALUES (301, 20, 150.52, 'sdf45gdf6');
  ";

  $createTableImagesProperties = "
    CREATE TABLE ImagesProperties (
      codImmob varchar(13) NOT NULL,
        constraint codImmob FOREIGN KEY (codImmob) REFERENCES Immobile (immobileCode),
        imageName varchar(20) NOT NULL,
        rowId integer NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (rowId)
    );
  ";

  $dropTableImagesProperties = "
    DROP TABLE IF EXISTS ImagesProperties;
  ";

  // TABLE ADDRESS
  $createTableAddress = "
    CREATE TABLE Address (
      zipCode varchar(9) NOT NULL,
      state varchar(2) NOT NULL,
      city varchar(30) NOT NULL,
      district varchar(30) NOT NULL,
      address varchar(50) NOT NULL,
      PRIMARY KEY (zipCode)
    );
  ";

  $dropTableTableAddress = "
    DROP TABLE IF EXISTS Address;
  ";

  $insertAddress1 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('38408-196', 'MG', 'Uberlandia', 'Santa Monica', 'Rua Cecilio Jorge');
  ";
  $insertAddress2 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('38408-092', 'MG', 'Uberlandia', 'Santa Monica', 'Avenida Lazara Alves Ferreira');
  ";
  $insertAddress3 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('38408-126', 'MG', 'Uberlandia', 'Santa Monica', 'Rua Antonio Dias');
  ";
  $insertAddress4 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('14057-050', 'SP', 'Ribeirao Preto', 'Parque das Andorinhas', 'Rua Antonio Pinho');
  ";
  $insertAddress5 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('14057-160', 'SP', 'Ribeirao Preto', 'Parque das Andorinhas', 'Rua Luiz Fonzar');
  ";
  $insertAddress6 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('14060-750', 'SP', 'Ribeirao Preto', 'Presidente Dutra', 'Rua Doutor Romano Morandi');
  ";
  $insertAddress7 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('38401-706', 'MG', 'Uberlandia', 'Jardim America I ','Avenida Arcirio Cardoso da Silva');
  ";
  $insertAddress8 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('38401-704', 'MG', 'Uberlandia', 'Jardim America I ','Rua Luiz Siquieroli');
  ";
  $insertAddress9 = "
    INSERT INTO Address (zipCode, state, city, district, address)
    VALUES ('38401-715', 'MG', 'Uberlandia', 'Jardim America I ','Rua Mateus');
  ";

  // DROP ALL TABLES
  if (!$conn->query($dropTableEmployees) ||
      !$conn->query($dropTablePropCustomers) ||
      !$conn->query($dropTableInterest) ||
      !$conn->query($dropTableImmobile) ||
      !$conn->query($dropTableImagesProperties) ||
      !$conn->query($dropTableImmobHouse) ||
      !$conn->query($dropTableImmobApart) ||
      !$conn->query($dropTableTableAddress)) {

    throw new Exception("Falha na deleçao das tabelas: " . $conn->error);
  }

  // CREATE ALL TABLES
  if (!$conn->query($createTableEmployees) ||
      !$conn->query($createTablePropCustomers) ||
      !$conn->query($createTableInterest) ||
      !$conn->query($createTableImmobile) ||
      !$conn->query($createTableImagesProperties) ||
      !$conn->query($createTableImmobHouse) ||
      !$conn->query($createTableImmobApart) ||
      !$conn->query($createTableAddress)) {

    throw new Exception("Falha na criaçao das tabelas: " . $conn->error);
  }

  // INSERT VALUES IN ALL TABLES
  if (!$conn->query($insertEmployees1)) {

    throw new Exception("Falha no INSERT da tabela EMPLOYEES: " . $conn->error);
  }
  
  if (!$conn->query($insertPropCustomers1)) {

    throw new Exception("Falha no INSERT da tabela PROPCUSTOMERS: " . $conn->error);
  }

  if (!$conn->query($insertImmobile1) ||
      !$conn->query($insertImmobile2)) {

    throw new Exception("Falha no INSERT da tabela IMMOBILE: " . $conn->error);
  }

  if (!$conn->query($insertImmobHouse1)) {

    throw new Exception("Falha no INSERT da tabela IMMOBHOUSE: " . $conn->error);
  }

  if (!$conn->query($insertImmobApart1)) {

    throw new Exception("Falha no INSERT da tabela IMMOBapart: " . $conn->error);
  }

  if (!$conn->query($insertAddress1) ||
      !$conn->query($insertAddress2) ||
      !$conn->query($insertAddress3) ||
      !$conn->query($insertAddress4) ||
      !$conn->query($insertAddress5) ||
      !$conn->query($insertAddress6) ||
      !$conn->query($insertAddress7) ||
      !$conn->query($insertAddress8) ||
      !$conn->query($insertAddress9)) {

    throw new Exception("Falha no INSERT da tabela ADRESS: " . $conn->error);
  }

  $conn->close();
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
  echo $msgErro;
  $conn->close();
}

?>