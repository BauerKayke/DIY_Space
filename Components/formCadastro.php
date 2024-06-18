<script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('country');
            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    data.sort((a, b) => a.name.common.localeCompare(b.name.common));
                    data.forEach(country => {
                        const option = document.createElement('option');
                        option.value = country.name.common;
                        option.textContent = country.name.common;
                        selectElement.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching countries:', error));
        });
</script>

<form action="" method="post">

  <div>
    <label for="">Nome completo</label>
    <input type="text" placeholder="Digite seu nome completo">
  </div>
    <div>
    <label for="">Email</label>
    <input type="email" placeholder="Ex. email@email.com">
  </div>
  <div>
    <label for="country">País</label>
    <select id="country" name="country" required>
      <option value="">Escolha seu país</option>
    </select>
  </div>
  <div class="inputEstadoCidade">
    <div>
      <label for="">Estado</label>
      <input type="text" placeholder="Escolha seu estado">
    </div>
    <div>
      <label for="">Cidade</label>
      <input type="text" placeholder="Escolha sua cidade">
    </div>
  </div>
  <div class="inputEnderecoNum">
    <div class="endereco">
      <label for="">Endereço</label>
      <input type="text" placeholder="Digite seu endereço">
    </div>
    <div class="num">
      <label for="">Número</label>
      <input type="text" placeholder="Ex. 94">
    </div>
  </div>
  
  
  <div>
    <label for="">Senha</label>
    <input type="text" placeholder="Digite sua senha">
  </div>
  <div>
    <label for="">Confirmar senha</label>
    <input type="text" placeholder="Digite sua senha">
  </div>

  <a href="./ConfirmacaoEmail.php">Criar conta</a>
</form>
<div>

</div>
