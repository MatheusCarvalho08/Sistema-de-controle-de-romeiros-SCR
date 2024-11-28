<?php

session_start();// Inicia ou retoma uma sessão existente
// Se o usuário não estiver logado, desconfigura (unset-quebra o login) as variáveis de sessão 'id' e 'senha'  
  if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['senha']) == true))
  {
      unset($_SESSION['id']);
      unset($_SESSION['senha']);
      header('Location: /scr/adm/admin.php'); // Redireciona o usuário para a página de login ou página de administração
  }
  $logado = $_SESSION['id']; // Se a variável 'id' de sessão estiver definida, significa que o usuário está logado
  // Atribui o valor de $_SESSION['id'] à variável $logado

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Página de ADM</title>

    <!-- Open Sans Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <a href="/scr/home/index.php"><img src="imgs/logoscr.png" alt="logo"></a>
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">dashboard</span> Página de Adm
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="graficos.php">
              <span class="material-icons-outlined">leaderboard</span> Gráficos
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="feedbacks.php">
              <span class="material-icons-outlined">forum</span> Feedbacks
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="suporte.php">
              <span class="material-icons-outlined">phone</span> Suporte
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="pontos.php">
              <span class="material-icons-outlined">email</span> Cadastro de pontos
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="hotel.php">
              <span class="material-icons-outlined">poll</span> Cadastro de Hotéis
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="contas.php">
              <span class="material-icons-outlined">account_circle</span> Usuários
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="sair.php">
              <span class="material-icons-outlined">settings</span> Sair
            </a>
          </li>
        </ul>
      </aside>

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>PÁGINA DE ADMINISTRAÇÃO</h2>
        </div>

        <div class="main-cards">

        <div class="card">
            <div class="card-inner">
              <h2>SEGUIDORES (INSTA)</h2>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>50</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h2>LIKES</h2>
              <span class="material-icons-outlined">thumb_up</span>
            </div>
            <h1>100</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h2>INSCRITOS NO YOUTUBE</h2>
              <span class="material-icons-outlined">subscriptions</span>
            </div>
            <h1>50</h1>
          </div>

        </div>

        <div class="products">

          <div class="product-card">
            <h2 class="product-description">O que fazemos nesta página:</h2>
            <p class="text-secondary">
             Essa é a Página onde vamos receber os feedbacks dos nossos clientes, aqui também vamos poder ver os cadastros dos pontos de apoio e de Hotéis/Pousadas. Além disso, vamos ter os gráficos, e os pedidos de ajudas no nosso suporte.
            </p>
          </div>

          <div class="social-media">
            <div class="product">

              <div>
                <div class="product-icon background-red">
                  <i class="bi bi-twitter"></i>
                </div>
                <h1 class="text-red">+30</h1>
                <p class="text-secondary">Vemos acima os seguidores nossos no twitter.</p>
              </div>
  
              <div>
                <div class="product-icon background-green">
                  <i class="bi bi-instagram"></i>
                </div>
                <h1 class="text-green">+50</h1>
                <p class="text-secondary">Vemos acima os seguidores nossos no instagram.</p>
              </div>
  
              <div>
                <div class="product-icon background-orange">
                  <i class="bi bi-facebook"></i>
                </div>
                <h1 class="text-orange">+10</h1>
                <p class="text-secondary">Vemos acima os seguidores nossos no facebook.</p>
              </div>
  
              <div>       
            </div>
          </div>

        </div>
      </main>

    </div>

    <!-- Scripts -->
    <script src="js/scripts.js"></script>
  </body>
</html>