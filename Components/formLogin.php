    <form action="../Database/loginUser.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Ex. email@email.com" required>
        </div>
        <div>
            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
        </div>
        <button type="submit">Entrar</button>
    </form>
    <div class="accountExist">
        <p>
            Novo por aqui? <a href="../Pages/CriarConta.php">Crie uma conta</a>
        </p>
    </div>