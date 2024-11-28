<?php
  session_start();
  //print_r($_SESSION);
  if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
  {
      unset($_SESSION['nome']);
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location: /scr/Login_Cadastro/login.php');
  }
$logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos para levar</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="shortcut icon" href="../imgs/logo.ico" type="image/x-icon">
</head>
<body>

<!-- ===== Header - Menu ===== -->
<header class="l-header">
    <nav class="nav bd-grid">
        <div class="menu-img">
            <a href="/scr/home/index.php" class="nav__logo"><img src="img/logo.png.png" alt="logo"></a>
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
        <style>
            .nome{
                font-family: 'Poppins', sans-serif;
            }
        </style>
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

<!-- ===== MAIN - LOJA ===== -->
    <div class="container">

    <h2>Produtos:</h2>
    <br>
    <center><div class="descricao">
        <br>
            <p>Lista de possíveis produtos que você pode levar na sua peregrinação, com os preços médios, para você saber quanto mais ou menos vai pagar comprando certos produtos.</p>
    </div></center>
    <div id="produtos"></div>
    <h2>Preço médio que você vai Gastar:</h2>
    <div id="carrinho">
        <table id="tabela-carrinho">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="corpo-tabela"></tbody>
        </table>
    </div>
<br><br>    
    <script src="script/script.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </div>

<!--===== SCROLL REVEAL =====-->
<script src="https://unpkg.com/scrollreveal"></script>

<!--===== FOOTER =====-->
<footer class="footer">
    <center><p class="footer__title"><img src="img/logoscr.png" alt="logo" width="95px"></p></center>
    <div class="footer__social">
        <a href="https://www.facebook.com/profile.php?id=61558434549260" class="footer__icon"><i class='bx bxl-facebook' ></i></a>
        <a href="https://www.instagram.com/scr_tcc24?igsh=MXEycnJpdjk2cjd4bA==" class="footer__icon"><i class='bx bxl-instagram' ></i></a>
        <a href="https://twitter.com/SCR_TCC2024" class="footer__icon"><i class='bx bxl-twitter' ></i></a>
    </div>
    <p class="footer__copy">© 2024 SCR - Sistema de controle de romeiros - Todos os direitos reservados | Desenvolvido por <a href="#">MSCGY Squad</a></p>
</footer>
</body>
</html>