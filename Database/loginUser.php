<?php
session_start();
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';

  $conn = getDbConnection();

  $sql = "SELECT id, nome FROM users WHERE email = ? AND senha = ?";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['nome'];

      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      header("Location: ../Pages/Perfil.php");
      exit();
    } else {
      echo "Erro: Email ou senha incorretos.";
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "Erro: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>
