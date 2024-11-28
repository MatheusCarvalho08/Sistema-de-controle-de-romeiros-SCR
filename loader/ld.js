var tc = 5;

// A função 'setTimeout' define um temporizador que executa uma função após um determinado período de tempo.
// Nesse caso, a função dentro de 'setTimeout' será executada após 3000 milissegundos (ou seja, 3 segundos)
setTimeout (function(){
    // Após o tempo definido (3 segundos), a página será redirecionada para o arquivo 'sistema.php'
    // 'window.location.href' é uma maneira de alterar a URL e redirecionar o usuário para outra página
    window.location.href  = "../sistema/sistema.php";
}, 3000);