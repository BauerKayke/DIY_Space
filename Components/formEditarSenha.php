<form action="../Database/editarSenha.php" class="form-container" method="POST">
  <div class="form-content">
      <div class="inputs-column-group">
        <div class="input-group">
          <label for="nome">Senha atual</label>
          <input class="input-dark" type="password" name="senhaAtual" placeholder="Digite sua senha atual">
        </div>
        <div class="input-group">
          <label for="nome">Senha nova</label>
          <input class="input-dark" type="password" name="novaSenha" placeholder="Digite sua nova senha">
        </div>
        <div class="input-group">
          <label for="email">Confirmar senha nova</label>
          <input class="input-dark" type="password" name="confirmarSenha" placeholder="Digite sua nova senha novamento">
        </div>
      </div>
    <button class="primary-button" type="submit"> Salvar perfil</button>
  </div>
</form>