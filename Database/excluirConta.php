<?php
session_start();
include '../Database/connection.php'; // Inclua seu arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_POST['user_id'];

  // Verifica se o usuário está logado e se o ID do usuário corresponde ao ID na sessão
  if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user_id) {
    // Obter a conexão com o banco de dados
    $conn = getDbConnection();

    // Prepare uma declaração para excluir o usuário do banco de dados
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
      // Sucesso na exclusão, destrua a sessão e redirecione para a página de login
      session_destroy();
      header("Location: ../Pages/login.php");
      exit();
    } else {
      // Falha na exclusão, redirecione de volta com uma mensagem de erro
      $_SESSION['error_message'] = "Falha ao excluir a conta. Tente novamente.";
      header("Location: ../Pages/Config.php");
      exit();
    }
  } else {
    // IDs não correspondem ou o usuário não está logado
    $_SESSION['error_message'] = "Ação não autorizada.";
    header("Location: ../Pages/Config.php");
    exit();
  }
} else {
  // Se não foi uma solicitação POST, redirecione de volta
  header("Location: ../Pages/Config.php");
  exit();
}
?>
