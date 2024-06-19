<body>
    <header>
    <nav>
      <div>
        <p>DIY <span>SPACE </span></p>
      </div>
      <ul>
        <li><button class="btn-Create" onclick='criarConta()'>Criar</button></li>
        <li><button class="btn-Enter" onclick="login()">Entrar</button></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="mainSide-1">
      <h1>DIY <span>SPACE</span></h1>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
      </p>
    </div>
    <div class="mainSide-2">
      <div>
        <img src="../assets/exDiy.jpeg" alt="Exemplo de DIY">
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
          when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
          It has survived not only five centuries, 
        </p>
      </div>
    </div>
        <div class="mainSide-3">
      <div>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
          when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
          It has survived not only five centuries, 
        </p>
        <img src="../assets/exDiy.jpeg" alt="Exemplo de DIY">
      </div>
    </div>
    
  </main>
  <footer>
    <div>
      <div class="footerLink">
        <img src="../assets/Facebook.svg" alt="">
        <img src="../assets/TwitterX.svg" alt="">
        <img src="../assets/Instagram.svg" alt="">
      </div>
      <div class="footerText">
        <div>
          <p>Product</p>
          <ul>
            <li>text</li>
            <li>text</li>
          </ul>
        </div>
        <div>
          <p>Company</p>
          <ul>
            <li>text</li>
            <li>text</li>
          </ul>
        </div>
        <div>
          <p>Resources</p>
          <ul>
            <li>text</li>
            <li>text</li>
          </ul>
        </div>
        <div>
          <p>Police</p>
          <ul>
            <li>text</li>
            <li>text</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>

<script>
  function criarConta(){
    window.location.href = '../Pages/CriarConta.php'
  }
  function login(){
    window.location.href = '../Pages/Login.php'
  }
</script>