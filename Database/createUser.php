<?php
session_start();
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'] ?? '';
  $email = $_POST['email'] ?? '';
  $pais = $_POST['pais'] ?? '';
  $estado = $_POST['estado'] ?? '';
  $cidade = $_POST['cidade'] ?? '';
  $endereco = $_POST['endereco'] ?? '';
  $numeroResidencia = $_POST['numero'] ?? '';
  $senha = $_POST['senha'] ?? '';
  $confirm_password = $_POST['confirm_password'] ?? '';
  $restricaoAcesso = 0;

  if ($senha !== $confirm_password) {
    die("As senhas não coincidem.");
  }

  $conn = getDbConnection();

  $sql = "INSERT INTO users (nome, email, senha, pais, estado, cidade, endereco, numeroResidencia, restricaoAcesso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssssii", $nome, $email, $senha, $pais, $estado, $cidade, $endereco, $numeroResidencia, $restricaoAcesso);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {

      $user_id = mysqli_insert_id($conn);
      
      $_SESSION['user_id'] = $user_id;
      $_SESSION['email'] = $email;

      mysqli_stmt_close($stmt);
      mysqli_close($conn);

      header("Location: ../Pages/ConfirmacaoEmail.php");
      exit();
    } else {
      echo "Erro: Não foi possível criar o usuário.";
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "Erro: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
