<?php 
// Inicia a sessão, permitindo o uso de variáveis de sessão em todo o script
    session_start();

    // Verifica se o formulário foi enviado (botão 'submit' pressionado) e se os campos 'nome', 'email' e 'senha' não estão vazios
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
         // Armazena os valores enviados pelo formulário nas variáveis locais
        include_once('config.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Executa uma consulta SQL para verificar se há um usuário com o nome, e-mail e senha fornecidos
        $sql = "SELECT * FROM usuarios WHERE nome = '$nome' and email = '$email' and senha = '$senha'";
        $result = $conexao->query($sql);

        // A consulta SQL acima irá verificar se existe algum usuário no banco de dados com esses dados
        // Verifica se não foram encontrados resultados (usuário não existe)

        if(mysqli_num_rows($result) < 1)
        {
            // Se não houver resultados, desconfigura as variáveis de sessão (se existirem)
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            // Redireciona o usuário de volta para a página de login
            header('Location: login.php');
        }
        else
        {
            // Se o usuário for encontrado, armazena os dados de sessão
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            // Executa um loop para pegar os dados do usuário e armazenar o ID do usuário na sessão
            while($user_data = mysqli_fetch_assoc($result))
            {
                $_SESSION['usuario_id'] = $user_data['id'];
            }
                
            // Redireciona o usuário para uma página interna após login bem-sucedido
            header('Location: ../../../loader/loader.php');
        }

        // O código abaixo repete a mesma verificação, inserindo os mesmos blocos de código múltiplas vezes
        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ../../../loader/loader.php');
        }

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: /scr/sistema/localização.php');
        }

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: /scr/loader/loader.php');
        }
    }
    else
    {
        // Caso o formulário não tenha sido enviado corretamente ou algum campo esteja vazio, redireciona para a página de login
        header('Location: login.php');
    }
?>