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