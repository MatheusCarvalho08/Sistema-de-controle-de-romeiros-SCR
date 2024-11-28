<?php 
//Essa parte fazemos o cadastro dos feedbacks

if(isset($_POST['submit'])){

    include_once('config.php');

    $rate = $_POST['rate'];
    $avalie = $_POST['avalie'];

    $result = mysqli_query($conexao, "INSERT INTO feedbacks(rate,avalie) VALUES ('$rate','$avalie')");
}

?>
<?php 
//Essa parte fazemos o cadastro dos suportes


if(isset($_POST['submit-suporte'])){

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $ajuda = $_POST['ajuda'];

    $result = mysqli_query($conexao, "INSERT INTO suporte(nome,email,ajuda) VALUES ('$nome','$email','$ajuda')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/parceria.css">
    <!-- =====BOX ICONS===== -->
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>SCR - Sistema de controle de romeiros</title>
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
                    <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
                    <li class="nav__item"><a href="#objetivo" class="nav__link">Objetivo do site</a></li>
                    <li class="nav__item"><a href="#oq" class="nav__link">O que é?</a></li>
                    <li class="nav__item"><a href="#feedbacks" class="nav__link">Feedbacks</a></li>
                    <li class="nav__item"><a href="#sobre" class="nav__link">Sobre</a></li>
                    <li class="nav__item"><a href="#suporte" class="nav__link">Suporte</a></li>
                </ul>
            </div>

            <div class="bx bx-moon" id="darkMode-icon"></div>
            <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--===== HOME - 1 Parte do menu =====-->
        <section class="home bd-grid" id="home">
            <div class="home__data">
                <h1 class="home__title"><span class="home__title-color">SCR </span><br>o site que trará <br>mais segurança na <br>sua peregrinação.</h1>

                <a href="/scr/Login_Cadastro/login.php" class="button">Login</a>
            </div>

            <div class="home__social">
                <a href="https://www.facebook.com/profile.php?id=61558434549260" class="home__social-icon"><i class='bx bxl-facebook' ></i></a>
                <a href="https://www.instagram.com/scr_tcc24?igsh=MXEycnJpdjk2cjd4bA==" class="home__social-icon"><i class='bx bxl-instagram' ></i></a>
                <a href="https://twitter.com/SCR_TCC2024" class="home__social-icon"><i class='bx bxl-twitter' ></i></a>
            </div>

            <div class="home__img">
                <svg class="home__blob" viewBox="0 0 479 467" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <mask id="mask0" mask-type="alpha">
                        <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                    </mask>
                    <g mask="url(#mask0)">
                        <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                        <image class="home__blob-img" x="50" y="30" href="imgs/caminhada-peregrino.png"/>
                    </g>
                </svg>
            </div>
        </section>

        <!--===== Objetivo do site - 2 Parte =====-->
        <section class="about section " id="objetivo">
            <br>
            <h2 class="section-title">Objetivo do site</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="imgs/foto09.jpeg"  alt="Pessoa caminhando">
                </div>
                    
                <div>
                    <h2 class="about__subtitle">Proposta</h2>
                    <p class="about__text">O objetivo geral do SCR (Sistema de Controle de Romeiros) é desenvolver uma plataforma no qual busca auxiliar os indivíduos em sua locomoção para Aparecida, ajudando-os a encontrar os pontos de apoio, farmácias, hotéis, e postos de gasolina mais próximos, além de fornecer a climatização em tempo real, buscando a segurança das pessoas para a peregrinação. O projeto também oferece equipamentos que os peregrinos possam obter como recursos que contribuem em direção a caminhada. </p>           
                </div>                                   
            </div>
        </section>

<!--===== Perguntas - 3 Parte =====-->
<section class="pq section" id="oq">
    <h2 class="section-title">O que é?</h2>
    <div class="card-vejamais">
        <div class="container-veja">
        <!-- Primeiro Card -->
        <div class="card-veja">
            <div class="img-veja">
                <img src="imgs/peregrinos1.webp">
            </div>
            <h1>Romaria</h1>
            <div class="content-veja">
                <p>
                viagem ou peregrinação religiosa a um santuário, 
                espiritual a que se faz por devoção. visita a local 
                digno de veneração, de recordação sentimental etc...
                </p>
                <a href="/scr/home/vejamais/vejamais.php">Veja Mais</a>
            </div>
        </div>
        <!-- Segundo Card -->
        <div class="card-veja">
            <div class="img-veja">
                <img src="imgs/peregrinos2.webp">
            </div>
            <h1>Peregrinação</h1>
            <div class="content-veja">
                <p>
                Viagem que alguém faz para um santuário 
                ou para um lugar de devoção; romaria. Viagem 
                a terras distantes: saiu em peregrinação pela terra santa...
                </p>
                <a href="/scr/home/vejamais/vejamais.php">Veja Mais</a>
            </div>
        </div>
        <!-- Terceiro Card -->
        <div class="card-veja">
            <div class="img-veja">
                <img src="imgs/peregrinos3.webp">
            </div>
            <h1>Escolhas</h1>
            <div class="content-veja">
                <p>
                Escolher fazer uma romaria ou peregrinação 
                pode ser motivado pela busca espiritual, 
                procura de cura, cumprimento de promessas, 
                conexão com tradições...
                </p>
                <a href="/scr/home/vejamais/vejamais.php">Veja Mais</a>
            </div>
        </div>
    </div>
</div>
    </div>
    </section>

    <!--===== Feedbacks - 4 Parte =====-->
    <section class="feedbacks section" id="feedbacks">
        <h2 class="section-title">Feedbacks</h2>
    <main class="main-feedbacks">
    <div class="container">
        <div class="container__left">
          <h1>Estes são alguns Feedbacks do nosso site:</h1>
          <p>
            Todos Feedbacks foram coletados através de pesquisas. Conversamos com diversas pessoas que fazem a peregrinação à Aparecida e assim pegamos esses feedbacks das pessoas após apresenta-lás o nosso site.
          </p>
        </div>
        <div class="container__right">
          <div class="card">
            <img src="imgs/romeiro-feed1.jpeg" alt="Cleiton" />
            <div class="card__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <div class="card__details">
                <p>
                  O site é muito bom e funcional! Graças a ele
                  eu consegui localizar os Pontos de Apoio.  <span><i class="ri-double-quotes-r"></i></span>
                </p>
                <h4>- Cleiton Silva</h4>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="imgs/romeiro-feed2.jpeg" alt="Sergio" />
            <div class="card__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <div class="card__details">
                <p>
                  O site é muito bem informado, e com várias 
                  dicas para auxiliar na peregrinação. <span><i class="ri-double-quotes-r"></i></span>
                </p>
                <h4>- Sergio Ricardo</h4>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="imgs/romeiro-feed3.jpeg" alt="Carlos Alberto" />
            <div class="card__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <div class="card__details">
                <p>
                  O site auxilia muito na peregrinação,
                  ajudando muito na segurança dos peregrinos! <span><i class="ri-double-quotes-r"></i></span>
                </p>
                <h4>- Carlos Alberto</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
</section>

    <!--===== Feedbacks  =====-->
    <section class="feedbacks section">
    <h2 class="section-title">De o seu Feedback</h2>
    <div class="feedbacks__container bd-grid">
        <form action="/scr/home/index.php" method="POST" class="feedbacks__form">
            <center><h4 class="feedbacks-title">Avalie de 1 à 5 estrelas o site:</h4></center>
            <div class="rating">
                <input type='radio' class="feedbacks-estrelas" hidden name='rate' id='rating_1' data-idx='4' value="5">    
                <label for='rating_1'></label>
                
                <input type='radio' class="feedbacks-estrelas" hidden name='rate' id='rating_2' data-idx='3' value="4">
                <label for='rating_2'></label>
                
                <input type='radio' class="feedbacks-estrelas" hidden name='rate' id='rating_3' data-idx='2' value="3">
                <label for='rating_3'></label>
                
                <input type='radio' class="feedbacks-estrelas" hidden name='rate' id='rating_4' data-idx='1' value="2">
                <label for='rating_4'></label>
                
                <input type='radio' class="feedbacks-estrelas" hidden name='rate' id='rating_5' data-idx='0' value="1">
                <label for='rating_5'></label>
            </div>
            <textarea name="avalie" id="avalie" cols="0" placeholder="Avalie o site Aqui:" rows="10" class="feedbacks__input"></textarea>
            <input type="submit" name="submit" id="submit" value="Enviar" class="feedbacks__button button" onclick="cadastro_feedbacks()">
        </form>
    </div>
</section>

<script>
    function cadastro_feedbacks(){
       alert('Seu Feedback foi cadastrado com Sucesso!');
    }
</script>

     <!--===== Sobre - 5 Parte =====-->
     <section class="about section " id="sobre">
        <br>
        <h2 class="section-title">Sobre</h2>

        <div class="about__container bd-grid">
            <div class="about__img">
                <img src="imgs/peregrinos1.jpeg"  alt="Pessoa caminhando">
            </div>
                
            <div>
                <h2 class="about__subtitle">Sobre a Peregrinação até Aparecida</h2>
                <p class="about__text">A peregrinação até Aparecida do Norte é uma prática religiosa em que os fiéis viajam para visitar o Santuário Nacional de Nossa Senhora Aparecida, no Brasil, em busca de curas, graças espirituais ou como expressão de devoção. Muitos fazem essa jornada a pé, enfrentando desafios físicos, como uma forma de renovação da fé e reflexão espiritual. É uma das maiores manifestações de religiosidade popular no Brasil.</p>           
            </div>                                   
        </div>
        <br><br><br><br><br>
        <div class="about__container bd-grid">  
            <div>
                <h2 class="about__subtitle">Sobre o SCR</h2>
                <p class="about__text">O Scr surgiu com o intuito de tornar a experiência do peregrino ainda mais incrível.<br>O Scr estará com você ao longo de todo o caminho mágico de fé, superação e autoconhecimento.</p>           
            </div>    
            
            <div class="about__img" id="logoscrsobre">
                <img src="imgs/logo.png.png"  alt="Pessoa caminhando">
            </div>
        </div>
    </section>
<br><br>
     <!--===== Suporte - 6 Parte =====-->
    <section class="suporte section" id="suporte"> 
    <h2 class="section-title">Suporte</h2>
    <center><div class="container-suporte">
    <div class="content-suporte">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Localização</div>
          <div class="text-one">Sjc, Zona Sul</div>
          <div class="text-two">São Paulo</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Telefone</div>
          <div class="text-one">+55 12 988181717</div>
          <div class="text-two">+55 12 991608262</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">tccinfojoseense@gmail.com</div>
          <div class="text-two">scrsuporte@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Suporte - SCR</div>
        <p>Caso tenha alguma dúvida ou algum problema, mande sua mensagem aqui no nosso suporte, em breve será respondido no email que você colocou nas informações.</p>
      <form action="/scr/home/index.php" method="POST">
        <div class="input-box">
          <input type="nome" name='nome' placeholder="Digite seu nome" required>
        </div>
        <div class="input-box">
          <input type="email" name='email' placeholder="Digite seu email" required>
        </div>
        <div class="input-box message-box">
          <input type="text" name='ajuda' placeholder="O que podemos te ajudar?" required>
        </div>
        <div class="button-suporte">
          <input type="submit" name="submit-suporte" id="submit-suporte" class="button" value="Enviar" onclick="cadastro_suporte()">
        </div>
      </form>
    </div>
    </div>
  </div></center>

<script>
    function cadastro_suporte(){
       alert('Sua solicitação de Suporte foi cadastrado com Sucesso! Você será respondido(a) pelo E-mail cadastrado.');
    }
</script>  
<br>
        <!--===== linguagens - 7 Parte =====-->
        <section class="linguagens section" id="linguagens">
            <h2 class="section-title">Parcerias do projeto</h2>
                <div class="main">
                    <div class="slider" reverse="true" style="
                        --width: 200px;
                        --height: 200px;
                        --quantity: 9;
                    ">
                    <div class="list">
                        <div class="item" style="--position: 1"><a href="http://www.superdacidade.com.br/"><img src="imgs/supermercado.png" alt="supermercado"></a></div>
                        <div class="item" style="--position: 2"><a href="https://www.instagram.com/lucianaednilson?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="imgs/caneca.png" alt="canecaspersonalizadas"></a></div>
                        <div class="item" style="--position: 3"><a href="https://www.instagram.com/portaldoperegrino2020?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="imgs/Sergio.png" alt="Portal ao peregrino"></a></div>
                        <div class="item" style="--position: 4"><a href="https://colegiojoseense.com.br/"><img src="imgs/colegio.png" alt="Joseense"></a></div>
                        <div class="item" style="--position: 5"><a href="http://www.superdacidade.com.br/"><img src="imgs/supermercado.png" alt="supermercado"></a></div>
                        <div class="item" style="--position: 6"><a href="https://www.instagram.com/lucianaednilson?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="imgs/caneca.png" alt="canecaspersonalizadas"></a></div>
                        <div class="item" style="--position: 7"><a href="https://www.instagram.com/portaldoperegrino2020?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="imgs/Sergio.png" alt="Portal ao peregrino"></a></div>
                        <div class="item" style="--position: 8"><a href="https://colegiojoseense.com.br/"><img src="imgs/colegio.png" alt="Joseense"></a></div>
                        <div class="item" style="--position: 10"><a href="http://www.superdacidade.com.br/"><img src="imgs/supermercado.png" alt="supermercado"></a></div>
                        <div class="item" style="--position: 9"><a href="https://www.instagram.com/lucianaednilson?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="imgs/caneca.png" alt="canecaspersonalizadas"></a></div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!--===== FOOTER - 6 Parte =====-->
    <footer class="footer">
        <center><p class="footer__title"><img src="imgs/logoscr.png" alt="logo" width="95px"></p></center>
        <div class="footer__social">
            <a href="https://www.facebook.com/profile.php?id=61558434549260" class="footer__icon"><i class='bx bxl-facebook' ></i></a>
            <a href="https://www.instagram.com/scr_tcc24?igsh=MXEycnJpdjk2cjd4bA==" class="footer__icon"><i class='bx bxl-instagram' ></i></a>
            <a href="https://twitter.com/SCR_TCC2024" class="footer__icon"><i class='bx bxl-twitter' ></i></a>
        </div>
        <p class="footer__copy"><a class="a-adm" href="../adm/admin.php">©</a> 2024 SCR - Sistema de controle de romeiros - Todos os direitos reservados | Desenvolvido por <a href="/scr/equipe/index.php">MSCGY Squad</a></p>
    </footer>


    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--===== MAIN JS =====-->
    <script src="scripts/script.js"></script>

    <!--=====  VOLTAR AO TOPO E LOGIN =====-->
    <button onclick="topFunction()" class="btn-voltar-topo" id="btnVoltarTopo">Voltar ao Topo</button>

    <script>
    // Função para rolar de volta para o topo da página
    function topFunction() {
    document.body.scrollTop = 0; // Para navegadores que não suportam scroll suave
    document.documentElement.scrollTop = 0; // Para navegadores que suportam scroll suave
    }
    </script>

    <button onclick="window.location.href='../Login_Cadastro/login.php'" class="btn-login" id="btnLogin">Login</button>

</body>
</html>
