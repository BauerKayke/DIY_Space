<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    echo $user_id;

    include '../Database/connection.php';

    $conn = getDbConnection();

    $stmt = $conn->prepare("SELECT nome, fotoPerfil FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No user found with the given ID.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "User ID is not set in session.";
}
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../Style/global.css">
  <link rel="stylesheet" href="../Style/perfil.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <title>DIY SPACE</title>
</head>

<body class="body-perfil-container">
  <?php include "../Components/sideBar.php" ?>

  <main class="profile-container">
    <section class="box-container profile-info-container">
      <img class="profile-image-container" alt="" src="<?= $row['fotoPerfil'] ?? '../assets/defaultImageUser.png' ?>">
      <div class="profile-info-content">
        <header class="profile-header">
          <h2 class="title-h2"><?=$row["nome"]?></h2>

          <div class="profile-actions-buttons">
            <a class="primary-button" href="EditarPerfil.php">Editar perfil</a>
            <a href="Config.php" class="icon-button">
              <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.2502 22.3333L8.8502 19.1333C8.63353 19.0499 8.42953 18.9499 8.2382 18.8333C8.04686 18.7166 7.8592 18.5916 7.6752 18.4583L4.7002 19.7083L1.9502 14.9583L4.5252 13.0083C4.50853 12.8916 4.5002 12.7793 4.5002 12.6713V11.9963C4.5002 11.8876 4.50853 11.7749 4.5252 11.6583L1.9502 9.70825L4.7002 4.95825L7.6752 6.20825C7.85853 6.07492 8.0502 5.94992 8.2502 5.83325C8.4502 5.71659 8.6502 5.61659 8.8502 5.53325L9.2502 2.33325H14.7502L15.1502 5.53325C15.3669 5.61659 15.5712 5.71659 15.7632 5.83325C15.9552 5.94992 16.1425 6.07492 16.3252 6.20825L19.3002 4.95825L22.0502 9.70825L19.4752 11.6583C19.4919 11.7749 19.5002 11.8876 19.5002 11.9963V12.6703C19.5002 12.7789 19.4835 12.8916 19.4502 13.0083L22.0252 14.9583L19.2752 19.7083L16.3252 18.4583C16.1419 18.5916 15.9502 18.7166 15.7502 18.8333C15.5502 18.9499 15.3502 19.0499 15.1502 19.1333L14.7502 22.3333H9.2502ZM12.0502 15.8333C13.0169 15.8333 13.8419 15.4916 14.5252 14.8083C15.2085 14.1249 15.5502 13.2999 15.5502 12.3333C15.5502 11.3666 15.2085 10.5416 14.5252 9.85825C13.8419 9.17492 13.0169 8.83325 12.0502 8.83325C11.0669 8.83325 10.2375 9.17492 9.5622 9.85825C8.88686 10.5416 8.54953 11.3666 8.5502 12.3333C8.55086 13.2999 8.88853 14.1249 9.5632 14.8083C10.2379 15.4916 11.0669 15.8333 12.0502 15.8333Z" fill="white" />
              </svg>
            </a>
          </div>
        </header>

        <div>
          <span class="label" >Data de acesso</span>
          <p>28/05/2024</p>
        </div>
      </div>

    </section>

    <section class="profile-post-list-container">
      <div class="profile-post-item-container">
        <img class="profile-post-image" alt="" src="../assets/exDiy.jpeg">
        <span class="profile-post-title">Titulo da publicação...</span>
      </div>
      <div class="profile-post-item-container">
        <img class="profile-post-image" alt="" src="../assets/exDiy.jpeg">
        <span class="profile-post-title">Titulo da publicação...</span>
      </div>
      <div class="profile-post-item-container">
        <img class="profile-post-image" alt="" src="../assets/exDiy.jpeg">
        <span class="profile-post-title">Titulo da publicação...</span>
      </div>
    </section>
</body>

</html>