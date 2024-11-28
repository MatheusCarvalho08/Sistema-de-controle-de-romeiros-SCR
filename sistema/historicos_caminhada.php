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
	$logado = $_SESSION['email'];
  $usuario_id = $_SESSION["usuario_id"]; // Se a variável 'email' e 'usuario_id' de sessão estiver definida, significa que o usuário está logado
  // Atribui o valor de $_SESSION['email'] e $_SESSION["usuario_id"] à variável $logado
    
  include_once('config.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		//Só vai executar esse IF se estiver fazendo um POST para esta página

		$ponto = $_POST['ponto'];
		$rota = $_POST['rota'];
		$inicio = $_POST['inicio'];
		$termino = $_POST['termino'];
		$horarioinicio = $_POST['horarioinicio'];
		$horariotermino = $_POST['horariotermino'];
		
		//INSERINDO UM HISTÓRICO PARA O USUÁRIO LOGADO
		$result = mysqli_query($conexao, "INSERT INTO historico(ponto,rota,inicio,termino,horarioinicio,horariotermino,usuario_id) VALUES ('$ponto','$rota','$inicio','$termino','$horarioinicio','$horariotermino',$usuario_id)");
	}
  
	//RECUPERANDO TODOS OS HISTÓRICOS DO USUÁRIO LOGADO
	$sql = "SELECT * FROM historico WHERE usuario_id = $usuario_id";
	$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Suas peregrinações</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/sistema.css">
    <link rel="stylesheet" href="css/historicos.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<header class="l-header">
        <nav class="nav bd-grid">
            <div class="menu-img">
                <a href="/scr/home/index.php" class="nav__logo"><img src="imgs/logo.png.png" alt="logo"></a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="form.php" class="nav__link ">Registre sua peregrinação</a></li>
                    <li class="nav__item"><a href="historicos_caminhada.php" class="nav__link active">Suas peregrinações</a></li>
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
<center><h1>Suas peregrinações</h1></center>
<br>
<div class="m-5">
    <table class="table text-white table-bg">
        <thead>
            <tr>
                <th scope="col">Você passou por quantos pontos:</th>
                <th scope="col">Rota utilizada:</th>
                <th scope="col">Dia que iniciou a caminhada:</th>
                <th scope="col">Dia que terminou a caminhada:</th>
                <th scope="col">horário que iniciou a caminhada:</th>
                <th scope="col">Horário que terminou a caminhada:</th>
            </tr>
        </thead>
        <tbody>
            <?php 

            if(mysqli_num_rows($resultado) > 0)
              {
                foreach($resultado as $registo)
                {
                  echo "<tr>";
                  echo "<td>".$registo['ponto']."</td>";
                  echo "<td>".$registo['rota']."</td>";
                  echo "<td>".$registo['inicio']."</td>";
                  echo "<td>".$registo['termino']."</td>";
                  echo "<td>".$registo['horarioinicio']."</td>";
                  echo "<td>".$registo['horariotermino']."</td>";
                  echo "</tr>";
                }
                
              }
            else
              {
                print("Você ainda não tem peregrinações feitas!");
              }   
                  ?>
        </tbody>
    </table>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>