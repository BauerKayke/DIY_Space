<form action="../Database/editarPerfil.php" class="form-container" method="POST">
  <div class="form-content">
    <div class="inputs-multi-group">
      <div class="inputs-column-group">
        <div class="input-group">
          <label for="nome">URL para imagem de perfil</label>
          <input class="input-dark" type="url" name="fotoPerfil" value="<?= $row["fotoPerfil"] ?>">
        </div>
        <div class="input-group">
          <label for="nome">Nome completo</label>
          <input class="input-dark" type="text" name="nome" value="<?= $row["nome"] ?>">
        </div>
        <div class="input-group">
          <label for="email">E-mail</label>
          <input class="input-dark" type="email" name="email" value="<?= $row["email"] ?>">
        </div>
      </div>
    </div>
    
    <div class="inputs-column-group">
      <div class="input-group">
        <label for="pais">País</label>
        <input class="input-dark" type="text" name="pais" value="<?= $row["pais"] ?>">
      </div>
      <div class="inputs-line-group">
        <div class="input-group">
          <label for="estado">Estado</label>
          <input class="input-dark" type="text" name="estado" value="<?= $row["estado"] ?>">
        </div>
        <div class="input-group">
          <label for="cidade">Cidade</label>
          <input class="input-dark" name="cidade"  value="<?= $row["cidade"] ?>">
        </div>
      </div>
      <div class="inputs-grid-group">
        <div class="input-group">
          <label for="endereco">Endereco</label>
          <input class="input-dark" type="text"name="endereco" value="<?= $row["endereco"] ?>">
        </div>
        <div class="input-group">
          <label for="numero">Número</label>
          <input class="input-dark" type="text" name="numero" value="<?= $row["numeroResidencia"] ?>">
        </div>
      </div>
      
    </div>
    <button class="primary-button" type="submit"> Salvar perfil</button>
  </div>
</form>