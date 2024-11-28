<?php

// Inicia ou retoma a sessão atual. Necessário para usar variáveis de sessão.
session_start();

// O trecho abaixo pode ser usado para depuração, descomente para imprimir os dados recebidos via POST
// print_r($_REQUEST);

// Verifica se o formulário foi enviado (através do botão 'submit') e se os campos 'id' e 'senha' não estão vazios.
if(isset($_POST['submit']) && !empty($_POST['id']) && !empty($_POST['senha']))
{
    // Armazena os valores dos campos 'id' e 'senha' recebidos no formulário em variáveis
    include_once('config.php');
    $id = $_POST['id'];
    $senha = $_POST['senha'];

    // Cria a consulta SQL para verificar se o 'id' e a 'senha' correspondem a algum registro no banco de dados
    // O SQL busca na tabela 'admlogin' onde o 'id' e a 'senha' coincidem com os dados fornecidos.
    $sql = "SELECT * FROM admlogin WHERE id = '$id' and senha = '$senha'";
    $result = $conexao->query($sql);

    // Verifica se não houve nenhum resultado (nenhum registro encontrado)
    if(mysqli_num_rows($result) < 1)
    {
        // Se não houver correspondência, desconfigura (unset) as variáveis de sessão 'id' e 'senha'
        // Isso é importante para garantir que, caso o login falhe, o usuário não permaneça com sessão ativa
        unset($_SESSION['id']);
        unset($_SESSION['senha']);
        header('Location: admin.php');   // Redireciona o usuário de volta para a página de login ('admin.php')
    }
    else
    {
         // Se a consulta retornar um registro (login bem-sucedido), armazena o 'id' e a 'senha' na sessão
        $_SESSION['id'] = $id;
        $_SESSION['senha'] = $senha;         
        header('Location: /scr/adm/index.php'); // Redireciona o usuário para a página principal do admin após o login bem-sucedido
    }
}
?>
