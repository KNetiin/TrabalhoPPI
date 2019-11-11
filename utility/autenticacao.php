<?php
require_once "conexaoMysql.php";
require_once "filtraEntrada.php";

function loginUsuario($usuario, $senha) {
    session_start();
    $mysqli = conectaAoMySQL();
    $SQL = "
        SELECT userName, userPassword
        FROM Employees
        WHERE userName = ? AND userPassword = ?
        LIMIT 1
    ";
  
    $stmt = $mysqli->prepare($SQL);
    $stmt->bind_param('ss', $usuario, $senha);
    $stmt->execute();
    $stmt->store_result();
  
    // Resgata o resultado nas variáveis
    $stmt->bind_result($usuario, $senha);
    $stmt->fetch();
  
    if ($stmt->num_rows == 1) {
        // Armazena dados úteis para confirmação de login
        // em outros scripts PHP
        $_SESSION['userName'] = $usuario;
        $_SESSION['userPassword'] = $senha;
      
        // Sucesso no login
        return true;
    }
    else {
      return false;
    }
}

function checkUsuarioLogado() {
    // Check if all session variables are set
    return (isset($_SESSION['userName'], $_SESSION['userPassword']));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $senha = '';

    $usuario = filtraEntrada($_POST["username"]);
    $senha = filtraEntrada($_POST["password"]);

    if(loginUsuario($usuario, $senha)) {
        echo "Login Efetuado com Sucesso!";
    } else {
        echo "Falha no Login!";
    }
    echo '<script>window.location.href = "http://fuguete-e-farofa.atwebpages.com";</script>';
    exit();
}

?>
