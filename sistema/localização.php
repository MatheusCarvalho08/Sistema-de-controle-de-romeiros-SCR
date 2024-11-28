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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
      <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <title>Sua localização</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sistema.css">
    <link rel="stylesheet" href="css/localizacao.css"/>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
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
                        <li class="nav__item"><a href="localização.php" class="nav__link active">Sua localização</a></li>
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

<!--===== LOCALIZAÇÃO =====-->
<div class="titulo-mapa">
<center><h1 class="titulo-location">Veja a sua localização atual</h1></center>
<h2></h2>
</div>
<div class="mapa">
    <center><div id="map"></div></center>
</div> 

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

        <!--===== JS =====-->
        <script src="script/sistema.js"></script>
        <script src="script/localizacao.js"></script>

</body>
</html>