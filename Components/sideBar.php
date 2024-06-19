<link rel="stylesheet" href="../Style/sideBar.css">

<aside>
  <div class="menuToggle">
    <img src="../assets/material-symbols_menu.png" alt="Menu Toggle">
  </div>
  <div class="menuItens">
    <div data-page="home">
      <img src="../assets/mingcute_home-4-line.png" alt="Home">
      <span class="menuLabel">Home</span>
    </div>
    <div data-page="add">
      <img src="../assets/ph_plus-circle.png" alt="Add">
      <span class="menuLabel">Add</span>
    </div>
    <div data-page="notifications">
      <img src="../assets/ph_bell-bold.png" alt="Notifications">
      <span class="menuLabel">Notifications</span>
    </div>
    <div data-page="chat">
      <img src="../assets/cil_chat-bubble.png" alt="Chat">
      <span class="menuLabel">Chat</span>
    </div>
    <div data-page="settings">
      <img src="../assets/fluent_settings-16-regularGray.png" alt="Settings">
      <span class="menuLabel">Settings</span>
    </div>
    <div data-page="logout">
      <img src="../assets/mingcute_exit-line.png" alt="Logout">
      <span class="menuLabel">Logout</span>
    </div>
  </div>
  <div>
    <img src="../assets/Rectangle 31.png" alt="Profile">
  </div>
</aside>

<script>
  document.addEventListener('DOMContentLoaded', () => {
  const menuToggle = document.querySelector('.menuToggle img');
  const aside = document.querySelector('aside');
  const menuItems = document.querySelectorAll('.menuItens div');

  // Toggle the menu open/close
  menuToggle.addEventListener('click', () => {
    aside.classList.toggle('open');
  });

  // Highlight the active menu item based on the URL
  const currentPage = window.location.pathname.split('/').pop(); // Pega a última parte da URL
  menuItems.forEach(item => {
    if (item.dataset.page === currentPage) {
      item.classList.add('active');
    }

    item.addEventListener('click', () => {
      menuItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');
    });
  });
});

</script>
