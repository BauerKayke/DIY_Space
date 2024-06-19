<?php 

session_start();
$user_id = $_SESSION['user_id'];

include '../Database/connection.php';

$conn = getDbConnection();

$sql = "SELECT nome, email, fotoPerfil, senha, pais, estado, cidade, endereco, numeroResidencia, restricaoAcesso FROM users WHERE id = $user_id";
$Recordset1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($Recordset1);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../Style/global.css">
  <link rel="stylesheet" href="../Style/perfil.css">
  <link rel="stylesheet" href="../Style/EditarPerfil.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <title>DIY SPACE</title>
</head>

<body>
  <?php include "../Components/sideBar.php" ?>
  <main>

    <section class="box-container edit-profile-info-container">
      
      <div class="edit-profile-form-container">
        <header class="edit-profile-header-container">
          <a class="back-link" href="Perfil.php">
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.54551 3.59844C9.61317 3.52684 9.66607 3.44261 9.70118 3.35057C9.73629 3.25852 9.75293 3.16046 9.75014 3.06198C9.74736 2.9635 9.7252 2.86654 9.68494 2.77663C9.64468 2.68671 9.58711 2.60561 9.51551 2.53794C9.4439 2.47028 9.35967 2.41738 9.26763 2.38227C9.17558 2.34716 9.07752 2.33052 8.97904 2.33331C8.88057 2.33609 8.7836 2.35825 8.69369 2.39851C8.60377 2.43877 8.52267 2.49634 8.45501 2.56794L2.08001 9.31794C1.94835 9.4572 1.875 9.64156 1.875 9.83319C1.875 10.0248 1.94835 10.2092 2.08001 10.3484L8.45501 17.0992C8.52222 17.1724 8.60331 17.2315 8.69355 17.273C8.7838 17.3146 8.88141 17.3378 8.9807 17.3413C9.08 17.3449 9.179 17.3286 9.27197 17.2936C9.36494 17.2585 9.45001 17.2053 9.52225 17.1371C9.5945 17.0689 9.65246 16.987 9.69279 16.8962C9.73311 16.8054 9.75499 16.7075 9.75715 16.6081C9.75932 16.5088 9.74172 16.41 9.70539 16.3176C9.66905 16.2251 9.61471 16.1407 9.54551 16.0694L3.65651 9.83319L9.54551 3.59844Z" fill="#9C6EFF"/>
            </svg>
            <p>Voltar</p>
          </a>

          <div class="edit-profile-header-content">
            <h1 class="title-h1">Editar perfil</h1>

            <a class="secondary-button" href="">Editar temas favoritos</a>
          </div>
        </header>

        <?php include("../Components/formEditarPerfil.php") ?>
      </div>

      <div class="edit-profile-form-container">
        <header class="edit-profile-header-container">
          <div class="edit-profile-header-content">
            <h2 class="title-h2">Nome de usuário</h2>

          </div>
        </header>

        <?php include("../Components/formEditarSenha.php") ?>

      </div>

    </section>
</body>

</html>