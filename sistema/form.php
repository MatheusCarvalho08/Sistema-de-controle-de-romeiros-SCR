<?php 
session_start(); // Inicia ou retoma uma sessão existente
// Se o usuário não estiver logado, desconfigura (unset-quebra o login) as variáveis de sessão 'nome' e 'email' e 'senha' 
if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: /scr/Login_Cadastro/login.php'); 
}
$logado = $_SESSION['email']; // Se a variável 'email' de sessão estiver definida, significa que o usuário está logado
// Atribui o valor de $_SESSION['email'] à variável $logado
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Registre suas peregrinações</title>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="css/sistema.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<header class="l-header">
        <nav class="nav bd-grid">
            <div class="menu-img">
                <a href="/scr/home/index.php" class="nav__logo"><img src="imgs/logo.png.png" alt="logo"></a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="form.php" class="nav__link active">Registre sua peregrinação</a></li>
                    <li class="nav__item"><a href="historicos_caminhada.php" class="nav__link">Suas peregrinações</a></li>
                    <li class="nav__item"><a href="sistema.php" class="nav__link">Voltar</a></li>
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
<br><br><br><br><br><br>
<form action="historicos_caminhada.php" method="POST">
    <center><h1>Formulário sobre sua Peregrinação</h1></center>
    <br><br>
<div class="formulario">
    <div class="container-pontos">
        <h3>Por quantos pontos de apoio você passou?</h3>
        <br><br>
        <input type="radio" id="ponto" name="ponto" value="Passei por todos os pontos" required>
        <label for="opção 1">Passei por todos os pontos</label>
        <br>
        <input type="radio" id="ponto" name="ponto" value="Passei por quase todos os pontos" required>
        <label for="opção 2">Passei por quase todos os pontos</label>
        <br>
        <input type="radio" id="ponto" name="ponto" value="Não passei por nenhum ponto" required>
        <label for="opção 3">Não passei por nenhum ponto</label>
        <br>
    </div>
    <div class="conteiener-rotas">
            <h3>Por qual rota você foi?</h3>
        <br><br>
        <div class="radio">
            <input type="radio" name="rota" id="Rota 1 - Dutra" value="Rota 1 - Dutra" required>
            <label for="radio1">Rota 1 - Dutra</label>
        </div>
        <div class="radio">
            <input type="radio" name="rota" id="Rota 2 - Caminho da fé" value="Rota 2 - Caminho da fé" required> 
            <label for="radio2">Rota 2 - Caminho da fé</label>
        </div>
    </div>
    <div class="conteiner-datas">
        <h3>Dia em que iniciou e terminou a peregrinação?</h3>
            <br><br>
        <label for="dia">Data de início</label>
        <input type="date" name="inicio" id="inicio" required>
            <br><br>
        <label for="dia">Data de término</label>
        <input type="date" name="termino" id="termino" required>
    </div>
    <div class="conteiner-horario">
        <h3>Horário em que iniciou e terminou a peregrinação?</h3>
            <br><br>
        <label for="horario">Horário de início</label>
        <input type="time" name="horarioinicio" id="horarioinicio" required>
            <br><br>
        <label for="horario">Horário de término</label>
        <input type="time" name="horariotermino" id="horariotermino" required>
    </div>
</div>    
<br><br>
<center>
    <div class="button-salvar">
        <input type="submit" name="submit" id="submit" value="Salvar">
    </div>
</center>
</form>
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
<script src="script/form.js"></script>
</body>
</html>