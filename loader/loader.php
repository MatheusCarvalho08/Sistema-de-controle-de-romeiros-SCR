<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loader</title>
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../sistema/css/loader.css">
    <script src="ld.js"></script>
    
</head>
<body>
    <div class="loader">
        <div></div>
    </div>

    <script>
    // Quando a janela (pagina) terminar de carregar (evento 'load')    
    $(window).on('load',function(){
        // Ação para esconder o elemento com a classe '.loader' com um efeito de fade-out (desaparecendo suavemente)
        // O parâmetro 20000 define o tempo em milissegundos para o fade (20 segundos)
        $('.loader').fadeOut(20000);

        // Ação para mostrar o elemento com a classe '.content' com um efeito de fade-in (aparecendo suavemente)
        // O parâmetro 20000 define o tempo em milissegundos para o fade (20 segundos)
        $('.content').fadeIn(20000);
    });
    </script>

</body>
</html>