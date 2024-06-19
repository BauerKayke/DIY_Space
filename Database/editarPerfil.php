<?php
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

  $conn = getDbConnection();

  // Inserir os dados na tabela users
  $sql = "UPDATE users SET nome = ?, email = ?, senha = ?, pais = ?, estado = ?, cidade = ?, endereco = ?, numeroResidencia = ?, restricaoAcesso = ? WHERE id = ?";
  
  $stmt = mysqli_prepare($conn, $sql);
    
  // Verifica se a preparação da consulta foi bem-sucedida
  if ($stmt) {
      // Associa os parâmetros
      mysqli_stmt_bind_param($stmt, "sssssssssi", $nome, $email, $senha, $pais, $estado, $cidade, $endereco, $numeroResidencia, $restricaoAcesso, $_SESSION['user_id']);
      
      // Executa a consulta
      if (mysqli_stmt_execute($stmt)) {
          echo "Registro atualizado com sucesso!";
      } else {
          echo "Erro ao atualizar registro: " . mysqli_stmt_error($stmt);
      }

      // Fecha a declaração
      mysqli_stmt_close($stmt);
  } else {
      echo "Erro na preparação da consulta: " . mysqli_error($conn);
  }

  // Fecha a conexão
  mysqli_close($conn);
}
session_start();
$user_id = $_SESSION['user_id'];
echo $user_id;

include '../Database/connection.php';

$conn = getDbConnection();

$sql = "SELECT nome, email, senha, pais, estado, cidade, endereco, numeroResidencia, restricaoAcesso FROM users WHERE id = $user_id";
$Recordset1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($Recordset1);

?>