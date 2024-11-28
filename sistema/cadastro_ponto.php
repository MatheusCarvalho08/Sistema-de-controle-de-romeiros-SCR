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

//Essa parte fazemos o cadastro dos pontos
if(isset($_POST['submit']))
{
    include_once('config.php');

    $nomeponto = $_POST['nomeponto'];
    $cidade = $_POST['cidade'];
    $km = $_POST['km'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $seunome = $_POST['seunome'];
  
    $result = mysqli_query($conexao, "INSERT INTO pontos(nomeponto,cidade,km,telefone,email,seunome) VALUES ('$nomeponto','$cidade','$km','$telefone','$email','$seunome')");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro_ponto.css">
    <title>Cadastro dos Pontos de Apoio</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
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

    <center><div class="container">
        <div class="form-image">
            <img src="imgs/undraw_team_up_re_84ok.svg" alt="">
        </div>
        <div class="form">
            <form action="#" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre o seu Ponto de Apoio</h1>
                    </div>
                </div>
<br><br>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nomeponto">Nome do Ponto de apoio</label>
                        <input id="nomeponto" type="text" name="nomeponto" placeholder="Nome" required>
                    </div>
            
                    <div class="input-box">
                        <label for="cidade">Cidade do ponto</label>
                        <input id="cidade" type="text" name="cidade" placeholder="Nome da cidade" required>
                    </div>
                    <div class="input-box">
                        <label for="km">Km</label>
                        <input id="km" type="namber" name="km" placeholder="Digite o Km que fica" required>
                    </div>

                    <div class="input-box">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="telefone" name="telefone" placeholder="(xx) xxxx-xxxx" required>
                    </div>

                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu email" required>
                    </div>


                    <div class="input-box">
                        <label for="seunome">Seu Nome</label>
                        <input id="seunome" type="text" name="seunome" placeholder="Digite seu Nome" required>
                    </div>
                </div>
<br><br>
<br><br><br>
                <div class="continue-button">
                    <input type="submit" name="submit" id="submit" value="Cadastrar" onclick="cadastro_ponto()">
                </div>
            </form>
        </div>
    </div></center>

<script>
    function cadastro_ponto(){
       alert('Seu Ponto de Apoio foi cadastrado com Sucesso!');
    }
</script>  
    
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


</body>
</html>