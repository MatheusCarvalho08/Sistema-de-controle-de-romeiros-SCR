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
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Hotéis/Pousadas</title>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/hotel.css">
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
                     <li class="nav__item"><a href="loc.php" class="nav__link">Você caminhando</a></li>         
                     <li class="nav__item"><a href="" class="nav__link">Mais &#x25BE;</a>
                           <ul class="dropdown">
                              <li><a href="rotas.php">Rotas</a></li>
                              <li><a href="form.php">Registre sua Peregrinação</a></li>
                              <li><a href="historicos_caminhada.php">Suas Peregrinações</a></li>
                              <li><a href="loja/loja.php">Produtos para levar</a></li>
                              <li><a href="hotel.php">Hotéis/Pousadas</a></li>
                              <li><a href="clima.php">Clima</a></li>
                           </ul>
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

<br><br><br><br><br>
<center><h1 class="titulo-hotel">Hotéis/Pousadas</h1></center>

<br>
<div class="hoteis">
        <div class = "filter-btns">
            <button type = "button" class = "filter-btn active-btn" onclick="filterElements('Todos')">Todos</button>
            <button type = "button" class = "filter-btn" onclick="filterElements('sjc')">Sjc</button>
            <button type = "button" class = "filter-btn" onclick="filterElements('Caçapava')">Caçapava</button>
            <button type = "button" class = "filter-btn" onclick="filterElements('Taubaté')">Taubaté</button>
            <button type = "button" class = "filter-btn" onclick="filterElements('Pinda')">Pinda</button>
            <button type = "button" class = "filter-btn" onclick="filterElements('Roseira')">Roseira</button>
            <button type = "button" class = "filter-btn" onclick="filterElements('Aparecida')">Aparecida</button>
        </div>
    </div>

<div class="gallery">
   <div class="content sjc show">
      <br>
      <img src="imgs/sanmarino.jpeg" alt="hotel1">
      <h3>Hotel San Marino</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Sjc - 153</span></h6></center>
      <center><p>O San Marino Hotel está localizado em São José dos Campos, a 2,5 km do Shopping Center Colinas, e oferece acomodações climatizadas, buffet de café-da-manhã diariamente e Wi-Fi gratuito nas áreas comuns.</p></center>
      <h6>R$189,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star"></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-1"><a href="https://www.hoteis.com/ho1057518272/san-marino-hotel-sao-jose-dos-campos-brasil/">Ver Mais</a></button>
   </div>

   <div class="content sjc show">
      <br>
      <img src="imgs/hotelibis.jpeg" alt="hotelibis">
      <h3>Hotel Ibis Colinas</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Sjc - 149</span></h6></center>
      <center><p>O Ibis São José dos Campos Colinas está de portas abertas para recebê-lo. Com um ambiente moderno, os quartos são confortáveis e acessíveis, acomodam casais, solteiros e famílias, são climatizados e possuem wi-fi grátis.</p></center>
      <h6>R$227,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-2"><a href="https://all.accor.com/hotel/6035/index.pt-br.shtml?utm_campaign=seo+maps&utm_medium=seo+maps&utm_source=google+Maps">Ver Mais</a></button>
   </div>

   <div class="content sjc show">
      <br>
      <img src="imgs/digiulio.jpeg" alt="hoteldigiulio">
      <h3>Di Giulio Hotel</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Sjc - 145</span></h6></center>
      <center><p>Situado a apenas 3 km do shopping Center Vale, em São José dos Campos, o Di Giulio Hotel oferece Wi-Fi gratuito, academia e restaurante. O Aeroporto Professor Urbano Ernesto Stumpf fica a 8 km de distância.</p></center>
      <h6>R$170,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-3"><a href="https://www.booking.com/hotel/br/di-giulio.pt-br.html?aid=1726433&label=di-giulio-mTC4rqPTWAXftDDERJVfSAS438056252854%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atikwd-20235198341%3Alp9100227%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YbC4OlOULAnvcrFmvh1xnqM&sid=87ded74a47d56eb8838210e46532894e&dest_id=-671408;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;hpos=1;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1712712168;srpvid=ca8409b3c18d0149;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>

   <div class="content Caçapava show">
      <br>
      <img src="imgs/plazahotel.jpeg" alt="plazahotel">
      <h3>Plaza Dutra Hotel</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Caçapava - 128</span></h6></center>
      <center><p>O Plaza Dutra Hotel está situado em Caçapava e dispõe de um bar. Este hotel 3 estrelas dispõe de jardim e quartos com ar-condicionado, Wi-Fi gratuito e banheiro privativo. A acomodação dispõe de serviço de quarto e recepção 24 horas.</p></center>
      <h6>R$199,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star "></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-4"><a href="https://www.booking.com/hotel/br/plaza-dutra.pt-br.html?aid=2127529&label=metagha-link-LUBR-hotel-1670872_dev-desktop_los-1_bw-61_dow-Sunday_defdate-1_room-0_gstadt-2_rateid-public_aud-0_gacid-_mcid-10_ppa-0_clrid-0_ad-0_gstkid-0_checkin-20240609_ppt-&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=167087201_341905956_2_1_0&checkin=2024-06-09&checkout=2024-06-10&dest_id=-632244&dest_type=city&dist=0&group_adults=2&group_children=0&hapos=1&highlighted_blocks=167087201_341905956_2_1_0&hpos=1&matching_block_id=167087201_341905956_2_1_0&no_rooms=1&req_adults=2&req_children=0&room1=A%2CA&sb_price_type=total&sr_order=popularity&sr_pri_blocks=167087201_341905956_2_1_0__19980&srepoch=1712712445&srpvid=bdef0a3b09cf024c&type=total&ucfs=1&activeTab=main">Ver Mais</a></button>
   </div>

   <div class="content Caçapava show">
      <br>
      <img src="imgs/arcadahotel.jpeg" alt="arcadahotel">
      <h3>Hotel Arcadas</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Caçapava - 127</span></h6></center>
      <center><p>O Arcadas Hotel, em Caçapava, oferece lounge compartilhado e restaurante. Este hotel 3 estrelas dispõe de jardim e quartos com ar-condicionado, Wi-Fi gratuito e banheiro privativo. O estacionamento privativo gratuito está disponível.</p></center>
      <h6>R$258,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star "></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-4"><a href="https://www.booking.com/hotel/br/arcadas.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-1751889_dev-desktop_los-1_bw-3_dow-Friday_defdate-1_room-0_gstadt-2_rateid-public_aud-7177173165_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240412_ppt-_lp-2076_r-2174608275825094256&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=175188910_98861895_2_1_0;checkin=2024-04-12;checkout=2024-04-13;dest_id=-632244;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=175188910_98861895_2_1_0;hpos=1;matching_block_id=175188910_98861895_2_1_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=175188910_98861895_2_1_0__25800;srepoch=1712712779;srpvid=af400ae1c008004d;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>

   <div class="content Caçapava show">
      <br>
      <img src="imgs/summit.jpeg" alt="summit">
      <h3>Summit Granvale Hotel</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Caçapava - 125</span></h6></center>
      <center><p>Situado em Caçapava, São Paulo, o Summit Suítes Hotel Caçapava dispõe de piscina ao ar livre e banheira de hidromassagem. Para sua comodidade, o WiFi em todas as áreas e o estacionamento privativo no local estão disponíveis gratuitamente.</p></center>
      <h6>R$395,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-3"><a href="https://www.booking.com/hotel/br/granvale.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-2644229_dev-desktop_los-1_bw-51_dow-Thursday_defdate-1_room-0_gstadt-2_rateid-public_aud-7177173165_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240530_ppt-_lp-2076_r-7221671488128991347&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=264422903_388026755_2_1_0;checkin=2024-05-30;checkout=2024-05-31;dest_id=-632244;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=264422903_388026755_2_1_0;hpos=1;matching_block_id=264422903_388026755_2_1_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=264422903_388026755_2_1_0__39546;srepoch=1712713078;srpvid=6ab60b7a62b7009e;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>

   <div class="content Taubaté show">
      <br>
      <img src="imgs/prisma.jpeg" alt="Prisma hotel">
      <h3>Hotel Prisma </h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Taubaté - 114</span></h6></center>
      <center><p>Situado a 8 km do Sítio do Pica-Pau Amarelo em Taubaté, o Prisma Plaza Hotel dispõe de WiFi gratuito e estacionamento privativo gratuito. Todos os quartos dispõem de TV de tela plana. Incluem um banheiro privativo com chuveiro. Recepção 24 horas.</p></center>
      <h6>R$280,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-2"><a href="https://www.booking.com/hotel/br/prisma-plaza.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-1439663_dev-desktop_los-1_bw-6_dow-Monday_defdate-1_room-0_gstadt-2_rateid-public_aud-7177173165_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240415_ppt-_lp-2076_r-18299847175758118011&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=143966305_191487092_2_1_0;checkin=2024-04-15;checkout=2024-04-16;dest_id=-675636;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=143966305_191487092_2_1_0;hpos=1;matching_block_id=143966305_191487092_2_1_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=143966305_191487092_2_1_0__28000;srepoch=1712713336;srpvid=b2570bfb485100ba;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>

   <div class="content Taubaté show">
      <br>
      <img src="imgs/ibistaubate.jpeg" alt="Ibis hotel">
      <h3>Ibis Hotel</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Taubaté - 111</span></h6></center>
      <center><p>Situado em Taubaté, a 43 km do Santuário Nacional, o ibis Taubate oferece acomodações com jardim, estacionamento privativo, lounge compartilhado e restaurante. Este hotel dispõe de bar e quartos com ar-condicionado, Wi-Fi gratuito e banheiro privativo.</p></center>
      <h6>R$207,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star"></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-1"><a href="https://www.booking.com/hotel/br/ibis-taubate.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-1789060_dev-desktop_los-1_bw-45_dow-Friday_defdate-1_room-0_gstadt-2_rateid-public_aud-7177173165_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240524_ppt-_lp-2076_r-3286448873326235350&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=178906001_94623353_2_42_0;checkin=2024-05-24;checkout=2024-05-25;dest_id=-675636;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=178906001_94623353_2_42_0;hpos=1;matching_block_id=178906001_94623353_2_42_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=178906001_94623353_2_42_0__20250;srepoch=1712713690;srpvid=c7fb0ca930f4017f;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>

   <div class="content Taubaté show">
      <br>
      <img src="imgs/poupahotel.jpeg" alt="poupahotel">
      <h3>Poupahotel Hospedagens</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Taubaté - 107</span></h6></center>
      <center><p>O Poupahotel acordo com as normas de prevenção da Organização Mundial da Saúde OMS, está localizado em Taubaté, a 300 m da Estação Rodoviária de Taubaté e da rodovia Dutra.</p></center>
      <h6>R$157,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star"></i></li>
      </ul>
      <br>
      <button class="buy-1"><a href="https://www.booking.com/hotel/br/poupahotel.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-1120029_dev-desktop_los-1_bw-4_dow-Saturday_defdate-1_room-0_gstadt-2_rateid-public_aud-7177173165_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240413_ppt-_lp-2076_r-3220008293422911203&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=112002909_204908644_2_2_0;checkin=2024-04-13;checkout=2024-04-14;dest_id=-675636;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=112002909_204908644_2_2_0;hpos=1;matching_block_id=112002909_204908644_2_2_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=112002909_204908644_2_2_0__15400;srepoch=1712713944;srpvid=76a40d2b9b3b00a6;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>

   <div class="content Pinda show">
      <br>
      <img src="imgs/intercity.jpeg" alt="intercity">
      <h3>Hotel Intercity Pátio</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Pinda - 100</span></h6></center>
      <center><p>Situado em Pindamonhangaba, o Intercity Patio Pindamonhangaba oferece WiFi gratuito em toda a propriedade. Este hotel 5 estrelas oferece um restaurante no local, onde você pode desfrutar da culinária nacional. Todos os quartos têm TV a cabo.</p></center>
      <h6>R$292,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
      </ul>
      <br>
      <button class="buy-2"><a href="https://www.booking.com/hotel/br/intercity-pindamonhangaba.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-2150608_dev-desktop_los-1_bw-18_dow-Saturday_defdate-1_room-0_gstadt-2_rateid-public_aud-7177173165_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240427_ppt-_lp-2076_r-14402232139733654871&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=215060801_96931468_2_1_0;checkin=2024-04-27;checkout=2024-04-28;dest_id=-661811;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=215060801_96931468_2_1_0;hpos=1;matching_block_id=215060801_96931468_2_1_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=215060801_96931468_2_1_0__29159;srepoch=1712714162;srpvid=a2060d96812e0006;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>
   
   <div class="content Pinda show">
      <br>
      <img src="imgs/palace.jpeg" alt="Pinda Palace Hotel">
      <h3>Pinda Palace Hotel</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Pinda - 95</span></h6></center>
      <center><p>o Pinda Palace Hotel está localizado em Pindamonhangaba, São Paulo, a 27 km do Santuário Nacional e a 29 km do Observatório de Nossa Senhora da Aparecida. A propriedade oferece clube infantil, lounge compartilhado e Wi-Fi gratuito em todas as áreas.</p></center>
      <h6>R$304,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
      </ul>
      <br>
      <button class="buy-3"><a href="https://www.booking.com/hotel/br/pinda-palace.pt-br.html?aid=2127529&label=metagha-link-LUBR-hotel-7632238_dev-desktop_los-1_bw-1_dow-Wednesday_defdate-1_room-0_gstadt-2_rateid-public_aud-0_gacid-_mcid-10_ppa-0_clrid-0_ad-0_gstkid-0_checkin-20240410_ppt-&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=763223803_382277699_2_1_0;checkin=2024-04-10;checkout=2024-04-11;dest_id=-661811;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=763223803_382277699_2_1_0;hpos=1;matching_block_id=763223803_382277699_2_1_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=763223803_382277699_2_1_0__30420;srepoch=1712714422;srpvid=12010e1ae4ab00d4;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>

   <div class="content Pinda show">
      <br>
      <img src="imgs/home.jpeg" alt="Home Hotel">
      <h3>Home Hotel</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Pinda - 90</span></h6></center>
      <center><p>Estamos aqui para disponibilizar os nossos serviços e instalações a todos os que pretendam receber um atendimento privilegiado num ambiente de qualidade. Queremos ser o seu ponto de referência em matéria de atendimento e conforto. Atuamos há mais de 10 anos.</p></center>
      <h6>R$97,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star "></i></li>
         <li><i class="fa fa-star "></i></li>
         <li><i class="fa fa-star "></i></li>
      </ul>
      <br>
      <button class="buy-4"><a href="https://homehotel-com-br.webnode.pt/">Ver Mais</a></button>
   </div>

   <div class="content Roseira show">
      <br>
      <img src="imgs/hroseira.jpeg" alt="Hotel Roseira">
      <h3>Hotel Roseira</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Roseira - 81</span></h6></center>
      <center><p>Oferecemos TV a cabo, internet wi-fi gratuito, café da manhã incluso na diária, almoço e jantar a parte. O Hotel MV Roseira, está localizado na cidade de Roseira/SP a 5 KM de Aparecida. (7 minutos), é muito procurado por quem quer conhecer o museu, presépio, aquário, e fazer a peregrinação à Aparecida.</p></center>
      <h6>R$150,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star "></i></li>
         <li><i class="fa fa-star "></i></li>
      </ul>
      <br>
      <button class="buy-4"><a href="https://www.hotelroseira.com.br/">Ver Mais</a></button>
   </div>

   <div class="content Roseira show">
      <br>
      <img src="imgs/santana.jpeg" alt="Pousada Santana">
      <h3>Pousada Santana</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Roseira - 80</span></h6></center>
      <center><p>A Pousada Santana dispõe de várias acomodações com suites simples e aconchegantes, todos com TV e Internet via Wi-fi, Geladeira e Ventilador de Teto. Situada na cidade de Roseira, à 9km do centro turistico de Aparecida-SP, em ótima localização para empresas, Peregrinos e Turistas.</p></center>
      <h6>R$157,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star "></i></li>
         <li><i class="fa fa-star "></i></li>
      </ul>
      <br>
      <button class="buy-3"><a href="https://www.pousadasantanna.com/">Ver Mais</a></button>
   </div>

   <div class="content Roseira show">
      <br>
      <img src="imgs/chacara.jpeg" alt="Pousada Chácara das Rosas">
      <h3>Pousada Chácara das Rosas</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Roseira - 79</span></h6></center>
      <center><p>A Pousada Chácara das Rosas dispõe de várias acomodações com suites simples e aconchegantes, todos com TV e Internet via Wi-fi, Geladeira e Ventilador de Teto. Situada na cidade de Roseira, à 10km do centro turistico de Aparecida-SP.</p></center>
      <h6>R$180,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star "></i></li>
      </ul>
      <br>
      <button class="buy-2"><a href="https://www.google.com/travel/search?q=Pousada%20Ch%C3%A1cara%20das%20Rosas%20roseira&g2lb=2503771%2C2503781%2C4284970%2C4291517%2C4814050%2C4874190%2C4893075%2C4899571%2C4899573%2C4965990%2C72277293%2C72302247%2C72317059%2C72406588%2C72414906%2C72421566%2C72458066%2C72462234%2C72470440%2C72470899%2C72471280%2C72472051%2C72473841%2C72481458%2C72485656%2C72485658%2C72486593%2C72494250%2C72513422%2C72513513%2C72523972%2C72534000%2C72536387%2C72538597%2C72543515%2C72549171%2C72549174%2C72556202%2C72561422&hl=pt-BR&gl=br&cs=1&ssta=1&qs=CAEyJ0Noa0lyclBVdnV1MzFQazVHZzB2Wnk4eE1XUmZlakEyT1dSakVBRTgCQgkJrhnVt75R8zlCCQmuGdW3vlHzOUgA&ap=MAA&ictx=111&ts=CAESCAoCCAMKAggDGkkKKRInMiUweDk0Y2NlN2ZiODcwM2M2ZDk6MHgzOWYzNTFiZWI3ZDUxOWFlEhwSFAoHCOgPEAQYDxIHCOgPEAQYEBgBMgQIABAA&ved=0CAYQh-kJahcKEwjYjOfpqbuFAxUAAAAAHQAAAAAQHQ">Ver Mais</a></button>
   </div>

   <div class="content Aparecida show">
      <br>
      <img src="imgs/porto.jpeg" alt="Hotel Porto dos Milagres">
      <h3>Hotel Porto dos Milagres</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Aparecida - 75</span></h6></center>
      <center><p>Oferecendo piscina ao ar livre, academia e jardim, o Porto dos Milagres fica de frente para o Porto de Itaguassu, a apenas 2 km do centro de Aparecida. Oferece Wi-Fi gratuito. Os quartos do Hotel Porto dos Milagres incluem ar-condicionado.</p></center>
      <h6>R$262,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
      </ul>
      <br>
      <button class="buy-1"><a href="https://www.booking.com/hotel/br/porto-dos-milagres.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-463733_dev-desktop_los-1_bw-0_dow-Thursday_defdate-1_room-0_gstadt-2_rateid-public_aud-6855887960_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240411_ppt-Bd_lp-2076_r-6011032219950656751&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=46373306_90811228_2_1_0;checkin=2024-04-11;checkout=2024-04-12;dest_id=-625353;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=46373306_90811228_2_1_0;hpos=1;matching_block_id=46373306_90811228_2_1_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=46373306_90811228_2_1_0__26175;srepoch=1712879004;srpvid=a06da6caf98a0179;type=total;ucfs=1&#hotelTmpl">Ver Mais</a></button>
   </div>

   <div class="content Aparecida show">
      <br>
      <img src="imgs/rosario.jpeg" alt="Hotel Caminho do Rosário">
      <h3>Hotel Caminho do Rosário</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Aparecida - 72</span></h6></center>
      <center><p>Situado em Aparecida, a 1,4 km do Santuário Nacional, o Hotel Caminho do Rosário oferece acomodações com Wi-Fi gratuito e estacionamento privativo de cortesia.</p></center>
      <h6>R$170,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star "></i></li>
         <li><i class="fa fa-star "></i></li>
      </ul>
      <br>
      <button class="buy-4"><a href="https://www.booking.com/hotel/br/caminho-do-rosario.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-2287756_dev-desktop_los-1_bw-81_dow-Monday_defdate-1_room-0_gstadt-2_rateid-public_aud-6855887960_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240701_ppt-Ed_lp-2076_r-9604537504726397115&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=228775607_372212273_2_1_0&checkin=2024-07-01&checkout=2024-07-02&dest_id=-625353&dest_type=city&dist=0&group_adults=2&group_children=0&hapos=1&highlighted_blocks=228775607_372212273_2_1_0&hpos=1&matching_block_id=228775607_372212273_2_1_0&no_rooms=1&req_adults=2&req_children=0&room1=A%2CA&sb_price_type=total&sr_order=popularity&sr_pri_blocks=228775607_372212273_2_1_0__15297&srepoch=1712879183&srpvid=0a03a71ce33f01e2&type=total&ucfs=1&activeTab=main">Ver Mais</a></button>
   </div>

   <div class="content Aparecida show">
      <br>
      <img src="imgs/rainha.jpeg" alt="Hotel Rainha do Brasil">
      <h3>Hotel Rainha do Brasil</h3>
      <center><h6 class="ckm">Cidade/Km:  <span>Aparecida - 70</span></h6></center>
      <center><p>O Hotel Rainha do Brasil é uma propriedade do Santuário Nacional de Aparecida, localizado a 700 m da Basílica Santuário Nacional e oferece piscina ao ar livre, academia e WiFi gratuito. O hotel se encontra a 1,2 km da Basílica Velha e a 1,8 km da Estação Rodoviária de Aparecida.</p></center>
      <h6>R$500,00</h6>
      <ul>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
         <li><i class="fa fa-star checked"></i></li>
      </ul>
      <br>
      <button class="buy-3"><a href="https://www.booking.com/hotel/br/rainha-do-brasil.pt-br.html?aid=356937&label=metagha-link-LUBR-hotel-2287756_dev-desktop_los-1_bw-81_dow-Monday_defdate-1_room-0_gstadt-2_rateid-public_aud-6855887960_gacid-6623578791_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20240701_ppt-Ed_lp-2076_r-9604537504726397115&sid=87ded74a47d56eb8838210e46532894e&all_sr_blocks=43148403_158877692_2_41_0&checkin=2024-07-01&checkout=2024-07-02&dest_id=-625353&dest_type=city&dist=0&group_adults=2&group_children=0&hapos=20&highlighted_blocks=43148403_158877692_2_41_0&hpos=20&matching_block_id=43148403_158877692_2_41_0&no_rooms=1&req_adults=2&req_children=0&room1=A%2CA&sb_price_type=total&sr_order=popularity&sr_pri_blocks=43148403_158877692_2_41_0__54180&srepoch=1712879332&srpvid=0a03a71ce33f01e2&type=total&ucfs=1&activeTab=main">Ver Mais</a></button>
   </div>

</div>

<br><br><br>
<center><div class="cadastro">
        <h1>Faça o Cadastro do Hotel/Pousada para colocarmos eles no nosso site!</h1>
        <br><br>
        <a href="cadastro_hotel.php">Cadastre o seu Hotel/Pousada aqui</a>
    </div></center>

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
<script src="script/hotel.js"></script>
</body>
</html>