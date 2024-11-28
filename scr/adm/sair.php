<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['id']);
        unset($_SESSION['senha']);
        header('Location: /scr/adm/admin.php');
    }
    $logado = $_SESSION['id'];
?>

<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['senha']);
    header('Location: /scr/adm/admin.php');
?>

<!-- Aqui fizemos a programação de "Sair" da nossa página de compra(Sistema), ou seja,
essa página é uma sessão, então através desse comando "Sair" a sessão é finalizada e 
o cliente é redirecionado para página index, e não fica mais com seu email e senha logados. -->

<!-- unset() destrói a variável especificada. -->