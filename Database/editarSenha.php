<?php

session_start();
$user_id = $_SESSION['user_id'];

include './connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $senhaAtual = $_POST['senhaAtual'];
  $novaSenha = $_POST['novaSenha'];
  $confirmarSenha = $_POST['confirmarSenha'];


  $conn = getDbConnection();

  $sql = "SELECT senha FROM users WHERE id = $user_id";
  $Recordset1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  $senha = mysqli_fetch_assoc($Recordset1)['senha'];


  if ($senha !== $senhaAtual) {
    die("Senha atual incorreta.");
  }

  if ($novaSenha !== $confirmarSenha) {
    die("As senhas não coincidem.");
  }



  $sql = "UPDATE users SET senha = ? WHERE id = ?";

  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "si", $novaSenha, $user_id);

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
