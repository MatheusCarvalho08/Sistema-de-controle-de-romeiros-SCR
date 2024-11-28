/*==================== JS PARA PEGAR A LONGITUDE E LATITUDE E COLOCAR NO MAPA ====================*/
// Seleciona o elemento <h2> na página para exibir as coordenadas
let h2 = document.querySelector('h2');

// Declara uma variável global para armazenar o mapa
var map;

// Função chamada quando a localização é obtida com sucesso
function success(pos){
    // Exibe no console as coordenadas de latitude e longitude
    console.log(pos.coords.latitude, pos.coords.longitude);
    // Atualiza o conteúdo do <h2> com as coordenadas de latitude e longitude
    h2.textContent = `Latitude:${pos.coords.latitude},  Longitude:${pos.coords.longitude}`;

    // Se o mapa ainda não foi criado, cria um novo mapa centrado nas coordenadas atuais
    if (map === undefined) {
        map = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 16);
    } else {
        // Se o mapa já existe, remove o mapa atual e cria um novo com as novas coordenadas
        map.remove();
        map = L.map('map').setView([pos.coords.latitude, pos.coords.longitude], 16);
    }

    // Adiciona a camada de tiles do OpenStreetMap ao mapa
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

     // Adiciona um marcador no mapa com as coordenadas atuais e exibe uma mensagem de popup
    L.marker([pos.coords.latitude, pos.coords.longitude]).addTo(map)
        .bindPopup('Você está aqui!') // Exibe a mensagem ao clicar no marcador
        .openPopup();  // Abre o popup automaticamente
}

// Função chamada em caso de erro ao tentar obter a localização
function error(err){
    // Exibe o erro no console
    console.log(err);
}

// Obtém a localização atual do usuário com alta precisão e chama a função success ou error conforme o caso
var watchID = navigator.geolocation.getCurrentPosition(success, error, {
    enableHighAccuracy: true    // Ativa a alta precisão para o geolocalização
});




