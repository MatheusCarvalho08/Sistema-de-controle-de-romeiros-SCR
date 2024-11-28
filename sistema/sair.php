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

<?php
    session_start();
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: /scr/home/index.php');
?>

<!-- Aqui fizemos a programação de "Sair" da nossa página de compra(Sistema), ou seja,
essa página é uma sessão, então através desse comando "Sair" a sessão é finalizada e 
o cliente é redirecionado para página index, e não fica mais com seu email e senha logados. -->

<!-- unset() destrói a variável especificada. -->