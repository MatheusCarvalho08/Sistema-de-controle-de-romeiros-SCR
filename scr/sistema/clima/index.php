<?php
// Inicia ou retoma uma sessão existente
  session_start();  
// Se o usuário não estiver logado, desconfigura (unset) as variáveis de sessão 'nome' e 'senha' e 'email' 
  if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
  {
      unset($_SESSION['nome']);
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location: /scr/Login_Cadastro/login.php');  // Redireciona o usuário para a página de login 
  }
$logado = $_SESSION['email']; // Se a variável 'email' de sessão estiver definida, significa que o usuário está logado
// Atribui o valor de $_SESSION['email'] à variável $logado
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <title>Clima</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/sistema.css">
</head>
<body>
<!-- ===== Header - Menu ===== -->
<header class="l-header">
    <nav class="nav bd-grid">
        <div class="menu-img">
            <a href="/scr/home/index.php" class="nav__logo"><img src="imgs/logo.png.png" alt="logo"></a>
        </div>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="/scr/sistema/sistema.php" class="nav__link">Pontos de Apoio</a></li>
                <li class="nav__item"><a href="/scr/sistema/localização.php" class="nav__link">Sua localização</a></li>
                <li class="nav__item"><a href="/scr/sistema/loc.php" class="nav__link">Você caminhando</a></li>         
                <li class="nav__item"><a href="" class="nav__link">Mais &#x25BE;</a>
                    <ul class="dropdown">
                        <li><a href="/scr/sistema/rotas.php">Rotas</a></li>
                        <li><a href="/scr/sistema/form.php">Registre sua Peregrinação</a></li>
                        <li><a href="/scr/sistema/historicos_caminhada.php">Suas Peregrinações</a></li>
                        <li><a href="/scr/sistema/loja/loja.php">Produtos para levar</a></li>
                        <li><a href="/scr/sistema/hotel.php">Hotéis/Pousadas</a></li>
                        <li><a href="/scr/sistema/clima.php">Clima</a></li>
                    </ul>
            </ul>
        </div>
        <div class="bx bx-moon" id="darkMode-icon"></div>
        <div class="nome">
                <?php 
                      echo $_SESSION['nome'];
                ?>
        </div>
        <div class="btn-menu">
            <a href="sair.php" class="button">Sair</a>
        </div>
        <div class="nav__toggle" id="nav-toggle">
        <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>
    <div class="wrapper">
        <div class="sidebar">
          <div>
            <form class="search" id="search">
              <input type="text" id="query" placeholder="Pesquise sua cidade" />
              <button><i class='bx bx-search'></i></button>
            </form>
            <div class="weather-icon">
              <img id="icon" src="icons/sun/4.png" alt="" />
            </div>
            <div class="temperature">
              <h1 id="temp">0</h1>
              <span class="temp-unit">°C</span>
            </div>
            <div class="date-time">
              <p id="date-time">Segunda-feira, 12:00</p>
            </div>
            <div class="divider"></div>
            <div class="condition-rain">
              <div class="condition">
                <i class="fas fa-cloud"></i>
                <p id="condition">Condição</p>
              </div>
              <div class="rain">
                <i class="fas fa-tint"></i>
                <p id="rain">perc - 0%</p>
              </div>
            </div>
          </div>
          <div class="location">
            <div class="location-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="location-text">
              <p id="location">Localização</p>
            </div>
          </div>
        </div>
        <div class="main">
          <nav>
            <ul class="options">
              <button class="hourly">Horários</button>
              <button class="week active">Dias</button>
            </ul>
            <ul class="options units">
              <button class="celcius active">°C</button>
              <button class="fahrenheit">°F</button>
            </ul>
          </nav>
          <div class="cards" id="weather-cards"></div>
          <div class="highlights">
            <h2 class="heading">Destaques de Hoje</h2>
            <div class="cards">
              <div class="card2">
                <h4 class="card-heading">Índice UV</h4>
                <div class="content">
                  <p class="uv-index">0</p>
                  <p class="uv-text">Baixo</p>
                </div>
              </div>
              <div class="card2">
                <h4 class="card-heading">Estado do vento</h4>
                <div class="content">
                  <p class="wind-speed">0</p>
                  <p>km/h</p>
                </div>
              </div>
              <div class="card2">
                <h4 class="card-heading">Nascer e pôr do sol</h4>
                <div class="content">
                  <p class="sun-rise">0</p>
                  <p class="sun-set">0</p>
                </div>
              </div>
              <div class="card2">
                <h4 class="card-heading">Umidade</h4>
                <div class="content">
                  <p class="humidity">0</p>
                  <p class="humidity-status">Normal</p>
                </div>
              </div>
              <div class="card2">
                <h4 class="card-heading">Visibilidade</h4>
                <div class="content">
                  <p class="visibilty">0</p>
                  <p class="visibilty-status">Normal</p>
                </div>
              </div>
              <div class="card2">
                <h4 class="card-heading">Qualidade do Ar</h4>
                <div class="content">
                  <p class="air-quality">0</p>
                  <p class="air-quality-status">Normal</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<!--===== SCROLL REVEAL =====-->
<script src="https://unpkg.com/scrollreveal"></script>

<!--===== JS =====-->
<script src="script/sistema.js"></script>
<script src="script.js"></script>
</body>
</html>