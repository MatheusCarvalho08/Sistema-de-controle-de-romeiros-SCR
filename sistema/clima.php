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
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <title>Clima</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/clima.css"/>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
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
                            </li>
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

        <!-- ===== Main - Clima ===== -->
         <br><br><br><br><br><br>
         <div class="titulo-clima">
            <center><h1>Veja o Clima da sua cidade</h1></center>
         </div>
        <main>
            <div class="container-fluid p-0 container-sm d-flex justify-content-center">
            <div class="card text-center shadow-lg" style="width: 26rem;">
            <div class="card-header bg-white text-dark font-weight-bold">
                TEMPO E TEMPERATURA
            </div>

            <div class="card-body">
                <div class="city">Cidade Exemplo, BR</div>
                <div class="date">Quinta, 1 Agosto 2024</div>
                <div class="container-img">
                <img src="./icons/unknown.png">
                </div>
                <div class="container-temp mx-4 my-3">
                <div>22</div>
                <span>°c</span>
                </div>
                <div class="weather py-2">Nublado</div>
            </div>

            <div class="card-footer bg-white">
                <div class="input-group ">
                <input type="text" class="form-control bg-light" placeholder="digite o nome da cidade" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-warning text-dark" type="button" id="button-addon2">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </div>

            </div>
            </div>

            <div class="seta">
                <img src="imgs/seta.webp" width="300px" alt="Seta">
            </div>

            <div class="vermais">
                <h1>Veja mais informações sobre o clima aqui:</h1>
                <a href="clima/index.php" class="button">Veja mais informações</a>
            </div>
        </main>

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
        <script src="script/script.js"></script>
        <script src="https://kit.fontawesome.com/f0e17cbf2f.js" crossorigin="anonymous"></script>

</body>
</html>