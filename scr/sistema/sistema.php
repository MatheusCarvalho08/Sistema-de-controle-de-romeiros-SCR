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
    <title>SCR - Sistema de controle de romeiros</title>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/sistema.css">
   
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
                    <li class="nav__item"><a href="/scr/sistema/sistema.php" class="nav__link active">Pontos de Apoio</a></li>
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
                        </li>
                </ul>
            </div>
            <div class="bx bx-moon" id="darkMode-icon"></div>
            <div class="nome">
                <?php 
                      echo "Bem-Vindo  ". $_SESSION['nome'];
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
<br>
<!-- ===== Apoios - ===== -->
<main>
<div class="container">
<h1 class="heading">Pontos de Apoio Aos Peregrinos - 2024</h1>
<center><hr></center>
<br>
    <div class="pontos">
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
<br><br>    
<div class="box-container">
    <div class="box sjc show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.0516758472977!2d-45.97998582373327!3d-23.27757195122943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc34ab762ff4a3%3A0xd9c6a3658008acb0!2sAv.%20Pres.%20Dutra%2C%20154%20-%20Santa%20Clara%2C%20Jacare%C3%AD%20-%20SP%2C%2012335-010!5e0!3m2!1spt-BR!2sbr!4v1710780196827!5m2!1spt-BR!2sbr"></iframe>
        <h3>Amigos de São josé</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 154 - Sjc</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box sjc show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.1588381290185!2d-45.8097115!3d-23.164402199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc4c15224008ff%3A0xa3cc36894a9d6d68!2sRod.%20Pres.%20Dutra%2C%20147%20-%20Jardim%20Sat%C3%A9lite%2C%20S%C3%A3o%20Jos%C3%A9%20dos%20Campos%20-%20SP%2C%2012230-002!5e0!3m2!1spt-BR!2sbr!4v1710780475665!5m2!1spt-BR!2sbr"></iframe>
        <h3>São Peregrino</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 147 - Sjc</li>
            <li><h4>Sentido:</h4> Rio x SP</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Sim</li>
            <li><h4>Atendimento 24h:</h4> Sim</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div>
    <div class="box sjc show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.1588381290185!2d-45.8097115!3d-23.164402199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc4c15224008ff%3A0xa3cc36894a9d6d68!2sRod.%20Pres.%20Dutra%2C%20147%20-%20Jardim%20Sat%C3%A9lite%2C%20S%C3%A3o%20Jos%C3%A9%20dos%20Campos%20-%20SP%2C%2012230-002!5e0!3m2!1spt-BR!2sbr!4v1710780475665!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Saúde e Fé Univ. Anhembi Morumbi</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 147 - Sjc</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Sim</li>
            <li><h4>Atendimento 24h:</h4> Sim</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div>
    <div class="box sjc show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.8475107635395!2d-45.935915323734!3d-23.2486354501795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc3522c4b09dcb%3A0x3c7eb4dddcfdc8a1!2sBR-116%20Rod.%20Pres.%20Dutra%2C%20km%20155%2C9%20sul!5e0!3m2!1spt-BR!2sbr!4v1710781109310!5m2!1spt-BR!2sbr"></iframe>
        <h3>PAP Paulo Carrara</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 142 - Sjc</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Sim</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box sjc show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.398707507363!2d-45.7927986!3d-23.155643899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc4c34aed69305%3A0x5ac228caa4e5b00a!2sRod.%20Pres.%20Dutra%2C%20136%20-%20Jardim%20Sat%C3%A9lite%2C%20S%C3%A3o%20Jos%C3%A9%20dos%20Campos%20-%20SP%2C%2012230-002!5e0!3m2!1spt-BR!2sbr!4v1710975206414!5m2!1spt-BR!2sbr" width="600"></iframe>
        <h3>Maria Passa na Frente</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 136 - Sjc</li>
            <li><h4>Sentido:</h4> Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Caçapava show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!3m2!1spt-BR!2sbr!4v1710975509172!5m2!1spt-BR!2sbr!6m8!1m7!1s2V5lxPvU5uoSbuB5QtUb1A!2m2!1d-23.1382338647347!2d-45.75691081335886!3f284.7764371824248!4f-15.147755755848607!5f0.7820865974627469"></iframe>
        <h3>Anjos do Asfalto 2</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 134 - Caçapava</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>    
    <div class="box Caçapava show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3669.757547387841!2d-45.69927112373795!3d-23.105969645021734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc5161d008418f%3A0x63d536e8f5f84bbb!2sRod.%20Pres.%20Dutra%2C%201529%2C%20Ca%C3%A7apava%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1710975981954!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Amigos da Fé- ( Ao Lado da PRF)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 126 - Caçapava</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Sim</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div>    
    <div class="box Taubaté show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117498.86351215339!2d-45.603471134267956!3d-23.029665142898406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccf8e7b56b299b%3A0xb1879d1190d77c3!2sRod.%20Pres.%20Dutra%2C%20117%20-%20Independ%C3%AAncia%2C%20Taubat%C3%A9%20-%20SP%2C%2012031-770!5e0!3m2!1spt-BR!2sbr!4v1710976228173!5m2!1spt-BR!2sbr" ></iframe>
        <h3>IBG (Igreja Batista) -(Viaduto Carv.Pinto)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 117 - Taubaté</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Taubaté show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d917.8672458160171!2d-45.57709272422672!3d-23.04326176124041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDAyJzM1LjgiUyA0NcKwMzQnMzMuMiJX!5e0!3m2!1spt-BR!2sbr!4v1710977102561!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Unidos Pela Fé (Posto RodOil / Telhanorte)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 113 - Taubaté</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Sim</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>     
    <div class="box Taubaté show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d917.8703258438247!2d-45.57727272426244!3d-23.04280976123628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDAyJzM0LjEiUyA0NcKwMzQnMzMuOCJX!5e0!3m2!1spt-BR!2sbr!4v1710977232013!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Unitau</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 113 - Taubaté</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div>
    <div class="box Taubaté show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d917.95140130983!2d-45.549094730356444!3d-23.030908764487265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDAxJzUxLjMiUyA0NcKwMzInNTQuNCJX!5e0!3m2!1spt-BR!2sbr!4v1710977485761!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Terço dos Homens</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 109 - Taubaté</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>  
    <div class="box Taubaté show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1836.1073710705648!2d-45.528243372340256!3d-23.015886251765032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDAwJzU3LjIiUyA0NcKwMzEnMzguNCJX!5e0!3m2!1spt-BR!2sbr!4v1711157832829!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Fé e Saúde - Laboratório Oswaldo Cruz</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 107 - Taubaté</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div>  
    <div class="box Pinda show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14691.597253674712!2d-45.479791299999995!3d-22.99072969999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccfa4d4d06692f%3A0x607b8f6392b9fb05!2sPosto%20Ol%C3%A1%20Amaral%20Shell!5e0!3m2!1spt-BR!2sbr!4v1711157975917!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Villar e Amigos ( Posto do Amaral)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 101 - Pinda</li>
            <li><h4>Sentido:</h4> SP X Rio</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div> 
    <div class="box Pinda show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14692.457637553403!2d-45.46586!3d-22.98282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccfadbe6940431%3A0x2436a689632fe2ba!2sBR-116%20Rod.%20Pres.%20Dutra%2C%20km%2099%2C3%20sul%20-%20Trevo%20de%20Pindamonhangaba!5e0!3m2!1spt-BR!2sbr!4v1711158237984!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Unidos em Gratidão</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 99,5 - Pinda</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Pinda show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14692.569710390506!2d-45.4629934!3d-22.9817895!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccfadbe6940431%3A0x4e87ce46b8ba7971!2sBR-116%20Rod.%20Pres.%20Dutra%2C%20km%2099%20norte%20-%20Trevo%20de%20Pindamonhangaba!5e0!3m2!1spt-BR!2sbr!4v1711158427600!5m2!1spt-BR!2sbr" ></iframe>
        <h3>Igreja da Cidade</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 99 - Pinda</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Pinda show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3673.452318611445!2d-45.4409444!3d-22.9703889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDU4JzEzLjQiUyA0NcKwMjYnMjcuNCJX!5e0!3m2!1spt-BR!2sbr!4v1711158660521!5m2!1spt-BR!2sbr"></iframe>
        <h3>Imaculado Coração De Maria</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 98 - Pinda</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Pinda show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3673.5914131970007!2d-45.43044999999999!3d-22.965270000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDU3JzU1LjAiUyA0NcKwMjUnNDkuNiJX!5e0!3m2!1spt-BR!2sbr!4v1711158869177!5m2!1spt-BR!2sbr"></iframe>
        <h3>Feira de Vida e Saúde</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 96 - Pinda</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Pinda show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3674.6793639342814!2d-45.350944399999996!3d-22.9251944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDU1JzMwLjciUyA0NcKwMjEnMDMuNCJX!5e0!3m2!1spt-BR!2sbr!4v1711158982945!5m2!1spt-BR!2sbr"></iframe>
        <h3>Amigos Unidos Pela Fé -Posto Comandante</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 87 - Pinda</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Roseira show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3675.144090028122!2d-45.31672220000001!3d-22.908055599999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDU0JzI5LjAiUyA0NcKwMTknMDAuMiJX!5e0!3m2!1spt-BR!2sbr!4v1711159226732!5m2!1spt-BR!2sbr"></iframe>
        <h3>ARCO-ÍRIS ROSEIRA (Dentro do Posto)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 82 - Roseira</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Sim</li>
            <li><h4>Atendimento 24h:</h4> Sim</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div>
    <div class="box Roseira show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2185.520405815941!2d-45.29156272124182!3d-22.891505195039752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDUzJzMwLjUiUyA0NcKwMTcnMjkuMCJX!5e0!3m2!1spt-BR!2sbr!4v1711159526009!5m2!1spt-BR!2sbr"></iframe>
        <h3>Tenda de Apoio Mãe Aparecida ( Ao lado do Posto da PRF)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 79 - Roseira</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Roseira show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2185.520405815941!2d-45.29156272124182!3d-22.891505195039752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDUzJzMwLjUiUyA0NcKwMTcnMjkuMCJX!5e0!3m2!1spt-BR!2sbr!4v1711159526009!5m2!1spt-BR!2sbr"></iframe>
        <h3>Roseira ( Ao lado do Posto da PRF)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 79 - Roseira</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Sim</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div>
    <div class="box Aparecida show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d17486.51409300856!2d-45.26658279583997!3d-22.87325343908301!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccc2d6a3b5ac5b%3A0x8a6f83ca40deb827!2sEletroposto%20Posto%20Arco%20Iris%20Aparecida!5e0!3m2!1spt-BR!2sbr!4v1711159735611!5m2!1spt-BR!2sbr"></iframe>
        <h3>Divina Providência (em frente ao Posto Arco-Íris)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 75 - Aparecida</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Aparecida show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d17486.51409300856!2d-45.26658279583997!3d-22.87325343908301!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccc2d6a3b5ac5b%3A0x8a6f83ca40deb827!2sEletroposto%20Posto%20Arco%20Iris%20Aparecida!5e0!3m2!1spt-BR!2sbr!4v1711159735611!5m2!1spt-BR!2sbr"></iframe>
        <h3>Bom Fran (Posto Arco-Íris)</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 75 - Aparecida</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Sim</li>
        </ul>
    </div>
    <div class="box Aparecida show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d17486.51409300856!2d-45.26658279583997!3d-22.87325343908301!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccc2d6a3b5ac5b%3A0x8a6f83ca40deb827!2sEletroposto%20Posto%20Arco%20Iris%20Aparecida!5e0!3m2!1spt-BR!2sbr!4v1711159735611!5m2!1spt-BR!2sbr"></iframe>
        <h3>Romaria Paulo Carrara</h3>
        <ul>
            <li><h4>KM - Cidade:</h4>Km 75 - Aparecida</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Sim</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Aparecida show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29414.374381302205!2d-45.22608143805277!3d-22.847006254648996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccc4f363df5f4b%3A0x178bece604308529!2sRod.%20Pres.%20Dutra%2C%20488%20-%20Figueira%2C%20Guaratinguet%C3%A1%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1711160015937!5m2!1spt-BR!2sbr"></iframe>
        <h3>Amigos na Fé - BR 488 - Saída Km 75</h3>
        <ul>
            <li><h4>BR - Cidade:</h4>BR 488 - Aparecida</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
    <div class="box Aparecida show">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29414.374381302205!2d-45.22608143805277!3d-22.847006254648996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ccc4f363df5f4b%3A0x178bece604308529!2sRod.%20Pres.%20Dutra%2C%20488%20-%20Figueira%2C%20Guaratinguet%C3%A1%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1711160015937!5m2!1spt-BR!2sbr"></iframe>
        <h3>Casa da Mãe- BR 488- Saída Km 75</h3>
        <ul>
            <li><h4>BR - Cidade:</h4>BR 488 - Aparecida</li>
            <li><h4>Sentido:</h4>Rio X Sp</li>
            <li><h4>Oferecem:</h4> Alimentação e Hidratação</li>
            <li><h4>Atendimento a ciclistas:</h4> Não</li>
            <li><h4>Atendimento 24h:</h4> Não</li>
            <li><h4>Atendimento por Enfermeiros:</h4> Não</li>
        </ul>
    </div>
</div>
</div>
</main>
<br><br><br>
<center><div class="cadastro">
        <h1>Faça o Cadastro do seu ponto de apoio para colocarmos ele no nosso site!</h1>
        <br><br>
        <a href="cadastro_ponto.php">Cadastre o seu ponto de Apoio aqui</a>
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
<script src="script/sistema.js"></script>
</body>
</html>