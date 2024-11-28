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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Você caminhando</title>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/sistema.css">
    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 80%;
            height: 80vh;
            margin-top: 80px;
            z-index: -1;
        }

        header{
            z-index: 1;
        }
    </style>
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
                    <li class="nav__item"><a href="loc.php" class="nav__link active">Você caminhando</a></li>         
                    <li class="nav__item"><a href="" class="nav__link">Mais &#x25BE;</a>
                        <ul class="dropdown">
                            <li><a href="rotas.php">Rotas</a></li>
                            <li><a href="form.php">Registre sua Peregrinação</a></li>
                            <li><a href="historicos_caminhada.php">Suas Peregrinações</a></li>
                            <li><a href="loja/loja.php">Produtos para levar</a></li>
                            <li><a href="hotel.php">Hotéis/Pousadas</a></li>
                            <li><a href="clima.php">Clima</a></li>
                        </ul>
                        </li>
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
        <center><h1>Está página mostra Você caminhando</h1></center>

    <center><div id="map"></div></center>


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

<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    //Inicialização do mapa
    var map = L.map('map').setView([-22.848, -45.2274], 13);

    //osm layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

    if(!navigator.geolocation) {
        console.log("Seu navegador não suporta o recurso de geolocalização!")
    } else {
        setInterval(() => {
            navigator.geolocation.getCurrentPosition(getPosition)
        //Velocidade da atualização das coords
        },{enableHighAccuracy: true});
    }

    // Personalizar Ponto na mapa com imagem do táxi.
	const pessoaicon = L.icon({
			className: "pessoaicon",
			iconUrl: 'imgs/pessoa.png',
			iconSize: [35, 35]
		})
    var marker;

    function getPosition(position){
        // console.log(position)
        var lat = position.coords.latitude
        var long = position.coords.longitude
        var accuracy = position.coords.accuracy

        if(marker) {
            map.removeLayer(marker)
        }

        marker = L.marker([lat, long],{ icon: pessoaicon })

        var featureGroup = L.featureGroup([marker]).addTo(map)

        map.fitBounds(featureGroup.getBounds())

        console.log("Sua coordenada é:: Lat: "+ lat +" Long: "+ long+ " Precisão: "+ accuracy)
    }

</script>