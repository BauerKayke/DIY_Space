<?php 

session_start();
$user_id = $_SESSION['user_id'];
echo $user_id;

include '../Database/connection.php';

$conn = getDbConnection();

$sql = "SELECT nome, descricao FROM users WHERE id = $user_id";
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <title>DIY SPACE</title>
</head>

<body class="body-perfil-container">
  <!-- <nav class="sidebar-menu">
    <div>
    <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6.25 37.8333V33.6666H43.75V37.8333H6.25ZM6.25 27.4166V23.2499H43.75V27.4166H6.25ZM6.25 16.9999V12.8333H43.75V16.9999H6.25Z" fill="#944DFF"/>
    </svg>

    </div>
    
    <div>
    <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_239_215)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5 5.54159C23.2212 5.00066 24.0985 4.70825 25 4.70825C25.9015 4.70825 26.7788 5.00066 27.5 5.54159L42.0833 16.4791C42.6008 16.8672 43.0208 17.3705 43.3101 17.949C43.5994 18.5276 43.75 19.1656 43.75 19.8124V39.6041C43.75 40.7092 43.311 41.769 42.5296 42.5504C41.7482 43.3318 40.6884 43.7708 39.5833 43.7708H29.375C28.7672 43.7708 28.1843 43.5293 27.7545 43.0995C27.3248 42.6698 27.0833 42.0869 27.0833 41.4791V29.1874C27.0833 28.6349 26.8638 28.105 26.4731 27.7143C26.0824 27.3236 25.5525 27.1041 25 27.1041C24.4475 27.1041 23.9176 27.3236 23.5269 27.7143C23.1362 28.105 22.9167 28.6349 22.9167 29.1874V41.4791C22.9167 41.78 22.8574 42.078 22.7422 42.3561C22.6271 42.6341 22.4583 42.8867 22.2455 43.0995C22.0327 43.3123 21.78 43.4811 21.502 43.5963C21.2239 43.7115 20.9259 43.7708 20.625 43.7708H10.4167C9.3116 43.7708 8.25179 43.3318 7.47039 42.5504C6.68899 41.769 6.25 40.7092 6.25 39.6041V19.8124C6.25 19.1656 6.4006 18.5276 6.68989 17.949C6.97917 17.3705 7.39918 16.8672 7.91667 16.4791L22.5 5.54159ZM25 8.87492L10.4167 19.8124V39.6041H18.75V29.1874C18.75 27.5298 19.4085 25.9401 20.5806 24.768C21.7527 23.5959 23.3424 22.9374 25 22.9374C26.6576 22.9374 28.2473 23.5959 29.4194 24.768C30.5915 25.9401 31.25 27.5298 31.25 29.1874V39.6041H39.5833V19.8124L25 8.87492Z" fill="#535357"/>
    </g>
    <defs>
    <clipPath id="clip0_239_215">
    <rect y="0.020752" width="50" height="50" rx="25" fill="white"/>
    </clipPath>
    </defs>
    </svg>



    </div>
    <svg width="42" height="41" viewBox="0 0 42 41" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M21 0.020752C16.9826 0.020752 13.0554 1.21206 9.71499 3.44403C6.37462 5.67599 3.77111 8.84837 2.23371 12.56C0.696301 16.2716 0.294046 20.3558 1.07781 24.296C1.86157 28.2363 3.79615 31.8556 6.6369 34.6964C9.47766 37.5371 13.097 39.4717 17.0372 40.2555C20.9775 41.0392 25.0616 40.637 28.7733 39.0996C32.4849 37.5621 35.6573 34.9586 37.8892 31.6183C40.1212 28.2779 41.3125 24.3507 41.3125 20.3333C41.3068 14.9478 39.1649 9.78453 35.3568 5.97643C31.5487 2.16833 26.3855 0.0264391 21 0.020752ZM21 37.5208C17.6006 37.5208 14.2776 36.5127 11.4511 34.6241C8.62468 32.7355 6.42171 30.0512 5.12083 26.9106C3.81995 23.77 3.47958 20.3142 4.14276 16.9801C4.80595 13.6461 6.4429 10.5836 8.84661 8.17985C11.2503 5.77614 14.3128 4.13919 17.6469 3.476C20.9809 2.81282 24.4368 3.15319 27.5774 4.45407C30.718 5.75495 33.4023 7.95792 35.2909 10.7844C37.1795 13.6109 38.1875 16.9339 38.1875 20.3333C38.1823 24.8901 36.3699 29.2588 33.1477 32.4809C29.9255 35.7031 25.5568 37.5156 21 37.5208ZM30.375 20.3333C30.375 20.7477 30.2104 21.1451 29.9174 21.4381C29.6243 21.7311 29.2269 21.8958 28.8125 21.8958H22.5625V28.1458C22.5625 28.5602 22.3979 28.9576 22.1049 29.2506C21.8118 29.5436 21.4144 29.7083 21 29.7083C20.5856 29.7083 20.1882 29.5436 19.8952 29.2506C19.6021 28.9576 19.4375 28.5602 19.4375 28.1458V21.8958H13.1875C12.7731 21.8958 12.3757 21.7311 12.0827 21.4381C11.7896 21.1451 11.625 20.7477 11.625 20.3333C11.625 19.9189 11.7896 19.5214 12.0827 19.2284C12.3757 18.9354 12.7731 18.7708 13.1875 18.7708H19.4375V12.5208C19.4375 12.1064 19.6021 11.7089 19.8952 11.4159C20.1882 11.1229 20.5856 10.9583 21 10.9583C21.4144 10.9583 21.8118 11.1229 22.1049 11.4159C22.3979 11.7089 22.5625 12.1064 22.5625 12.5208V18.7708H28.8125C29.2269 18.7708 29.6243 18.9354 29.9174 19.2284C30.2104 19.5214 30.375 19.9189 30.375 20.3333Z" fill="#535357"/>
    </svg>

  </nav> -->
  <main class="profile-container main">
    <section class="box-container profile-info-container">
      <img class="profile-image-container" alt="" src="../assets/exDiy.jpeg">
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

        <!-- <p class="profile-bio">
          <?=$row["descricao"] ?>
          text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
          It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        </p> -->

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