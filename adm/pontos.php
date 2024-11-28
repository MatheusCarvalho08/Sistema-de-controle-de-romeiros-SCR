<?php 
  include_once('config.php');

  $sql = "SELECT * FROM pontos ORDER BY id DESC"; //Seleciona a tabela pontos dentro do nosso banco
  $result = $conexao->query($sql);

  session_start();  // Inicia ou retoma uma sessão existente
  // Se o usuário não estiver logado, desconfigura (unset-quebra o login) as variáveis de sessão 'id' e 'senha'  
  if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['senha']) == true))
  {
      unset($_SESSION['id']);
      unset($_SESSION['senha']);
      header('Location: /scr/adm/admin.php'); // Redireciona o usuário para a página de login ou página de administração
  }
  $logado = $_SESSION['id'];  // Se a variável 'id' de sessão estiver definida, significa que o usuário está logado
  // Atribui o valor de $_SESSION['id'] à variável $logado
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Página de Cadastro dos Pontos de Apoio</title>

    <!-- Open Sans Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/feedbacks.css">
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

      <!-- Header -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>PÁGINA DE CADASTRO DOS PONTOS DE APOIO</h2>
        </div>
        <div class="m-5">
        <table class="table text-white table-bg">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome do Ponto de Apoio</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">Km</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nome do dono</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                    while($user_data = mysqli_fetch_assoc($result)) // Inicia um loop enquanto houver dados para buscar do banco de dados
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nomeponto']."</td>";
                        echo "<td>".$user_data['cidade']."</td>";
                        echo "<td>".$user_data['km']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['seunome']."</td>";
                        echo "</tr>";
                    }
                  //Mostra todos esses dados presentes em nosso banco.  
                  ?>
              </tbody>
            </table>
        </div>
      </main>

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
            <a href="index.php">
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


    </div>

    <!-- Scripts -->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>