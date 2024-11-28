<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="/scr/home/vejamais/imgs/logo.ico" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Veja Mais</title>
  </head>
  <body>
     <!--===== HEADER =====-->
     <header class="l-header">
        <nav class="nav bd-grid">
            <div class="menu-img">
                <a href="/scr/home/index.php" class="nav__logo"><img src="imgs/logo.png.png" alt="logo"></a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="/scr/home/vejamais/vejamais.php" class="nav__link active">Veja Mais</a></li>
                    <li class="nav__item"><a href="#romaria" class="nav__link">Romaria</a></li>
                    <li class="nav__item"><a href="#peregrinacao" class="nav__link">Peregrinação</a></li>
                    <li class="nav__item"><a href="#escolhas" class="nav__link">Escolhas</a></li>
                    <li class="nav__item"><a href="/scr/home/index.php" class="nav__link">Voltar</a></li>
                </ul>
            </div>

            <div class="bx bx-moon" id="darkMode-icon"></div>
            <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <div class="container" id="romaria">
      <div class="container__left">
        <center><img src="imgs/caminhada2.jpeg" alt="caminhada"></center>
      </div>
      <div class="container__right">
        <div class="right__content" id="texto1">
          <h1>O que é</h1>
          <h4>Peregrinação?</h4>
          <p style="text-align: left;">
          Viagem que alguém faz para um santuário ou para um lugar de devoção; romaria. 
          Viagem a terras distantes: saiu em peregrinação pela terra santa. 
          Penosa movimentação por vários lugares, imposta por trabalhos e obrigações.
          O tenno peregrinar vem do latim peregrinare e significa ir a lugares santos ou de devoção com o objetivo de venerar 
          o lugar visitado, pedir por ajuda ou cumprir obrigações religiosas.
          </p>
          <div class="voltar">
            <a href="/scr/home/index.php">Voltar</a>
          </div>
          <div class="socials">
            <span><a href="https://www.instagram.com/scr_tcc24?igsh=MXEycnJpdjk2cjd4bA=="><i class="ri-instagram-line"></i></a></span>
            <span><a href="https://twitter.com/SCR_TCC2024"><i class="ri-twitter-fill"></i></a></span>
            <span><a href="https://www.facebook.com/profile.php?id=61558434549260"><i class="ri-facebook-fill"></i></a></span>
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="peregrinacao">
      <div class="container__right">
        <div class="right__content">
          <h1>O que é</h1>
          <h4>Romaria?</h4>
          <p>
          viagem ou peregrinação religiosa a um santuário, espiritual a que se faz por devoção.
          visita a local digno de veneração, de recordação sentimental etc.
          A romaria é uma viagem a lugares santos e de devoção, empreendida por aqueles que 
          desejam pagar promessas, rogar por graças ou revelar sua gratidão pelos desejos realizados. 
          As pessoas normalmente se agrupam para realizar esta jornada e seguem a pé ou em veículos diferentes.
          </p>
        </div>
      </div>
      <div class="container__left">
        <center><img src="imgs/caminhada3.jpeg" alt="caminhada"></center>
      </div>
      </div>
    <div class="container" id="escolhas">
      <div class="container__left">
        <center><img src="imgs/caminhada4.jpeg" alt="caminhada"></center>
      </div>
      <div class="container__right">
        <div class="right__content">
          <h1>Por que fazer uma</h1>
          <h4>Romaria/Peregrinação?</h4>
          <p style="text-align: left;">
          Escolher fazer uma romaria ou peregrinação pode ser motivado pela busca espiritual, 
          procura de cura, cumprimento de promessas, conexão com tradições culturais, reflexão 
          pessoal, experiência comunitária, desafio e superação, exploração cultural e histórica, 
          e busca de significado na vida.
          </p>
        </div>
      </div>
    </div>
    <br><br><br>
    <!--===== FOOTER - 6 Parte =====-->
    <footer class="footer">
        <center><p class="footer__title"><img src="imgs/logoscr.png" alt="logo" width="95px"></p></center>
        <div class="footer__social">
            <a href="https://www.facebook.com/profile.php?id=61558434549260" class="footer__icon"><i class='bx bxl-facebook' ></i></a>
            <a href="https://www.instagram.com/scr_tcc24?igsh=MXEycnJpdjk2cjd4bA==" class="footer__icon"><i class='bx bxl-instagram' ></i></a>
            <a href="https://twitter.com/SCR_TCC2024" class="footer__icon"><i class='bx bxl-twitter' ></i></a>
        </div>
        <p class="footer__copy"><a class="a-adm" href="../adm/admin.php">©</a> 2024 SCR - Sistema de controle de romeiros - Todos os direitos reservados | Desenvolvido por <a href="#">MSCGY Squad</a></p>
    </footer>

        <!--===== MAIN JS =====-->
        <script src="scripts/script.js"></script>
  </body>
</html>
