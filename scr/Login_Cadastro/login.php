<?php
// Verifica se o formulário foi submetido (se o botão com o nome 'submit' foi pressionado)
	if(isset($_POST['submit'])){

		include_once('config.php');

    // Recupera os dados do formulário enviados via POST e armazena nas variáveis correspondentes
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$telefone = $_POST['telefone'];

    // Executa uma consulta SQL para inserir os dados do usuário na tabela 'usuarios' do banco de dados
		$result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha,telefone) VALUES ('$nome','$email','$senha','$telefone')");
    // A consulta SQL acima insere os valores coletados do formulário na tabela 'usuarios'
    // A variável $conexao é a conexão com o banco de dados configurada no arquivo 'config.php'
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- =====BOX ICONS===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Login - Cadastro</title>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
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
                    <li class="nav__item"><a href="/scr/home/index.html" class="nav__link active">Home</a></li>         
                </ul>
            </div>

            <div class="bx bx-moon" id="darkMode-icon"></div>
            <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
            </div>
        </nav>
</header>

<!-- ===== Login/Registrar-se ===== -->
<div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="testLogin.php" method="POST" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="signup-nome" type="name" name="nome" placeholder="Nome" required />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="login-email" type="email" name="email" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="login-password" type="password" name="senha" placeholder="Senha" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="login-password" type="password" name="senha" name="senha" placeholder="Confirmar Senha" required />
            </div>
            <input type="submit" name="submit" id="submit" value="Login" class="btn solid" />
          </form>
          
          <form action="login.php" method="POST" class="sign-up-form">
            <h2 class="title">Cadastre-se</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="signup-nome" type="text" name="nome" placeholder="Nome" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="signup-email" type="text" name="email" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="signup-password" type="password" name="senha" placeholder="Senha" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="tel" name="telefone" id="signup-telefone" class="inputuser" placeholder="Telefone" required/>
            </div>
            <input type="submit" name="submit" id="submit" class="btn" value="Cadastrar" onclick="cadastro_usuario()"/>
          </form>
        </div>
      </div>

<script>
    function cadastro_usuario(){
       alert('Você foi cadastrado(a) com Sucesso!');
    }
</script>  

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <br><br>
            <h3>Novo Aqui ?</h3>
            <p>
              Se caso for novo aqui, faça o seu Cadastro e tenha uma peregrinação mais segura!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Cadastre-se
            </button>
          </div>
          <img src="imgs/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <br><br><br>
            <h3>Já tem login ?</h3>
            <p>
            Se caso já tem login aqui, entre no nosso site com o seu login e tenha uma peregrinação mais segura!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="imgs/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <!--===== FOOTER - 6 Parte =====-->
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

    <!--===== MAIN JS =====-->
    <script src="script/login.js"></script>
</body>
</html>