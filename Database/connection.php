<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "diySpace";

function getDbConnection()
{
    global $hostname, $username, $password, $dbname;
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    // Verificar a conexão
    if (!$conn) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    return $conn;
}
?>