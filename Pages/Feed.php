<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao Dashboard, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
    <p>Você está logado com sucesso.</p>
</body>
</html>
