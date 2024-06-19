<?php
session_start();
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Capturar valores do formulário
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

  // Verificar se a senha e a confirmação de senha coincidem
  if ($senha !== $confirm_password) {
    die("As senhas não coincidem.");
  }

  // Obter a conexão com o banco de dados
  $conn = getDbConnection();

  // Inserir os dados na tabela users
  $sql = "INSERT INTO users (nome, email, senha, pais, estado, cidade, endereco, numeroResidencia, restricaoAcesso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssssii", $nome, $email, $senha, $pais, $estado, $cidade, $endereco, $numeroResidencia, $restricaoAcesso);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {

      $_SESSION['email'] = $email;

      // Fechar a declaração
      mysqli_stmt_close($stmt);
      // Fechar a conexão
      mysqli_close($conn);

      // Redirecionar para a página de confirmação de e-mail
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
?>