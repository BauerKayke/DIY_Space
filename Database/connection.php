<?php
$hostname = "localhost";
$username = "diySpace";
$password = "12345";
$dbname = "diySpace";

// Conectar ao banco de dados
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Verificar a conexão
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
