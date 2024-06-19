<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/config.css">
    <link rel="stylesheet" href="../Style/sideBar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>DIY Space</title>
</head>
<body>
   <?php
   include "../Components/sideBar.php"
       ?>
    <main>
        <div class='container'>
            <div class='voltar'>
                <button><img src="../assets/fluent_ios-arrow-24-filled.png" alt="">Voltar</button>
            </div>
            <div class='config-1'>
                <h1>Configurações</h1>
                <div class='permission'>
                    <h3>Privacidade</h3>
                    <div class='toggle-div'>
                        <p>Permitir que outros usuários visualizem sua última data de acesso?</p>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <h3>Notificações</h3>
                    <div class='toggle-div'>
                        <p>Deseja receber notificações?</p>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <button>Salvar Configurações</button>
            </div>
            <div class='config-2'>
                <h1>Ações perigosas</h1>
                <div class='delete-account'>
                    <h3>Conta</h3>
                    <p>Deseja excluir sua conta permanentemente?</p>
                    <form method="post" action="../Database/excluirConta.php">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <button type="submit">Excluir conta</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>