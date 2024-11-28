<?php
    session_start(); // Inicia ou retoma uma sessão existente
    // Se o usuário não estiver logado, desconfigura (unset-quebra o login) as variáveis de sessão 'nome' e 'email' e 'senha'
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: /scr/Login_Cadastro/login.php'); // Redireciona o usuário para a página de login
    }
    $logado = $_SESSION['email']; // Se a variável 'email' de sessão estiver definida, significa que o usuário está logado
    // Atribui o valor de $_SESSION['email'] à variável $logado
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Traçe rotas entre Ponto A e Ponto B</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, intial-scale=1.0" />
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ab2155e76b.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/sistema.css">
    <link rel="stylesheet" href="css/rotas.css">
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
                    <ul class="nav__list">
                        <li class="nav__item"><a href="/scr/sistema/sistema.php" class="nav__link">Pontos de Apoio</a></li>
                        <li class="nav__item"><a href="localização.php" class="nav__link">Sua localização</a></li>
                        <li class="nav__item"><a href="loc.php" class="nav__link">Você caminhando</a></li>         
                        <li class="nav__item"><a href="" class="nav__link">Mais &#x25BE;</a>
                            <ul class="dropdown">
                                <li><a href="rotas.php">Rotas</a></li>
                                <li><a href="form.php">Registre sua Peregrinação</a></li>
                                <li><a href="historicos_caminhada.php">Suas Peregrinações</a></li>
                                <li><a href="loja/loja.php">Produtos para levar</a></li>
                                <li><a href="hotel.php">Hotéis/Pousadas</a></li>
                                <li><a href="clima.php">Clima</a></li>
                            </ul>
                        </li>
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

<!-- ===== HTML - ROTAS ===== -->
    <center>
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Traçe Rotas</h1>
            <p>Aqui você vai conseguir ver a distância e o tempo entre rotas!</p>
            <br>
            <hr>
            <br>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="from" class="label-mapa">De onde você vai sair:</i></label>
                    <div class="input-mapa">
                        <input type="text" id="from" placeholder="Origem" class="form">
                    </div>
               </div>
               <div class="form-group">
                    <label for="to" class="label-mapa destino">Onde quer chegar:</i></label>
                    <div class="input-mapa">
                        <input type="text" id="to" placeholder="Destino" class="form">
                    </div>
                 </div>
            </form>

            <div class="btn-calcular">
                <button class="btn btn-info btn-lg " onclick="calcRoute();">Calcular</button>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div id="googleMap">

            </div>
            <div id="output">

            </div>
        </div>

    </div>
  </center>

<!--===== FOOTER =====-->
<footer class="footer">
                <center><p class="footer__title"><img src="imgs/logoscr.png" alt="logo" width="95px"></p></center>
                <div class="footer__social">
                    <a href="https://www.facebook.com/profile.php?id=61558434549260" class="footer__icon"><i class='bx bxl-facebook' ></i></a>
                    <a href="https://www.instagram.com/scr_tcc24?igsh=MXEycnJpdjk2cjd4bA==" class="footer__icon"><i class='bx bxl-instagram' ></i></a>
                    <a href="https://twitter.com/SCR_TCC2024" class="footer__icon"><i class='bx bxl-twitter' ></i></a>
                </div>
                <p class="footer__copy">© 2024 SCR - Sistema de controle de romeiros - Todos os direitos reservados | Desenvolvido por <a href="#">MSCGY Squad</a></p>
            </footer>


        <!--===== SCROLL REVEAL =====-->
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="Scripts/jquery-3.1.1.min.js"></script>


        <!--===== JS =====-->
        <script src="script/sistema.js"></script> 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3AxJkckd4BVsPwfuJQGKPA4RZc7b-l98"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="script/rotas.js"></script>
  </body>
</html>