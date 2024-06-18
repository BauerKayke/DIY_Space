<?php
// Fetch country data from REST Countries API
$curl = curl_init();

curl_setopt_array(
  $curl,
  array(
    CURLOPT_URL => "https://restcountries.com/v3.1/all",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false
  )
);

$response = curl_exec($curl);
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$countries = json_decode($response, true);
curl_close($curl);

if ($response === false || $http_status !== 200) {
  echo "<p>Failed to fetch country data. Please try again later.</p>";
  $countries = [];
} else {
  $countries = json_decode($response, true);
  if (json_last_error() !== JSON_ERROR_NONE) {
    echo "<p>Failed to decode country data. Please try again later.</p>";
    $countries = [];
  } else {
    // Sort countries by common name
    usort($countries, function ($a, $b) {
      return strcmp($a['name']['common'], $b['name']['common']);
    });
  }
}
?>
<form action="../Database/createUser.php" method="post">
  <div>
    <label for="nome">Nome completo</label>
    <input type="text" name="nome" placeholder="Digite seu nome completo" required>
  </div>
  <div>
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Ex. email@email.com" required>
  </div>
  <div>
    <label for="pais">País</label>
    <select id="country" name="pais" >
      <option value="">Escolha seu país</option>
      <?php foreach ($countries as $country): ?>
                      <option value="<?= htmlspecialchars($country['name']['common']) ?>">
                        <?= htmlspecialchars($country['name']['common']) ?>
                      </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="inputEstadoCidade">
    <div>
      <label for="estado">Estado</label>
      <input type="text" name="estado" placeholder="Escolha seu estado">
    </div>
    <div>
      <label for="cidade">Cidade</label>
      <input type="text" name="cidade" placeholder="Escolha sua cidade">
    </div>
  </div>
  <div class="inputEnderecoNum">
    <div class="endereco">
      <label for="endereco">Endereço</label>
      <input type="text" name="endereco" placeholder="Digite seu endereço">
    </div>
    <div class="num">
      <label for="numeroResidencia">Número</label>
      <input type="text" name="numeroResidencia" placeholder="Ex. 94">
    </div>
  </div>
  <div>
    <label for="senha">Senha</label>
    <input type="password" name="senha" placeholder="Digite sua senha" required>
  </div>
  <div>
    <label for="confirm_password">Confirmar senha</label>
    <input type="password" name="confirm_password" placeholder="Digite sua senha" required>
  </div>
  <button type="submit">Criar conta</button>
</form>
<div class="accountExist">
  <p>
    Já tem uma conta?<a href="../Pages/Login.php">Faça login</a>
  </p>
</div>