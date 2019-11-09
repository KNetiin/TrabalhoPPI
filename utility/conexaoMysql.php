<?php

// Base de dados do Fuguete

define("HOST", "fdb22.awardspace.net");
define("USER", "3159096_mysql");
define("PASSWORD", "ppi12345678");
define("DATABASE", "3159096_mysql");

// Base de dados do Farofa

// define("HOST", "fdb22.awardspace.net");
// define("USER", "3162481_teste");
// define("PASSWORD", "ppi12345678");
// define("DATABASE", "3162481_teste");

function conectaAoMySQL()
{
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error)
        throw new Exception('Falha na conexão com o MySQL: ' . $conn->connect_error);

    return $conn;
}
