<?php

session_start();
$user_id = $_SESSION['user_id'];
echo $user_id;
include './connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nome = $_POST['nome'];
  $fotoPerfil = $_POST['fotoPerfil'];
  $email = $_POST['email'];

  $pais = $_POST['pais'];
  $estado = $_POST['estado'] ?? '';
  $cidade = $_POST['cidade'] ?? '';
  $endereco = $_POST['endereco'] ?? '';
  $numeroResidencia = $_POST['numero'] ?? '';

  $conn = getDbConnection();

  $sql = "UPDATE users SET nome = ?, email = ?, fotoPerfil= ?,senha = ?, pais = ?, estado = ?, cidade = ?, endereco = ?, numeroResidencia = ? WHERE id = ?";

  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssssssii", $nome, $email, $fotoPerfil, $senha, $pais, $estado, $cidade, $endereco, $numeroResidencia, $user_id);

    if (mysqli_stmt_execute($stmt)) {
      echo "Registro atualizado com sucesso!";
      header("Location: ../Pages/EditarPerfil.php");

    } else {
      echo "Erro ao atualizar registro: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "Erro na preparação da consulta: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
