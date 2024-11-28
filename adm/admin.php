<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página de Administração</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Login de Administrador</h1>
            <img src="imgs/foto2.svg" class="left-login-image" alt="">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Login</h1>
                <div class="textfield">
                    <form action="login.php" class="formviado" method="post">
                        <label for="admin_id">ID de Admin:</label>
                        <input type="password" id="id" name="id" placeholder="ID" required>
                        <br><br>
                        <label for="admin_id">Senha:</label>
                        <input type="password" id="senha" name="senha" placeholder="Senha" required>
                        <button class="btn-login" type="submit" name="submit" id="submit">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
