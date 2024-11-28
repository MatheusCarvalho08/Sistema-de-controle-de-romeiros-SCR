/*===== JS CLIMA =====*/
const api = {
    key: "64ed82577ced7f69cb1687f0ce536131",
    base: "https://api.openweathermap.org/data/2.5/",
    lang: "pt_br",
    units: "metric"
}

// Seleção de elementos do DOM para exibição dos dados
const city = document.querySelector('.city')
const date = document.querySelector('.date');
const container_img = document.querySelector('.container-img');
const container_temp = document.querySelector('.container-temp');
const temp_number = document.querySelector('.container-temp div');
const temp_unit = document.querySelector('.container-temp span');
const weather_t = document.querySelector('.weather');
const search_input = document.querySelector('.form-control');
const search_button = document.querySelector('.btn');

// Evento disparado quando a janela é carregada
window.addEventListener('load', () => {
    // Verifica se o navegador suporta geolocalização
    if (navigator.geolocation) {
        // Se sim, obtém a posição atual do usuário
        navigator.geolocation.getCurrentPosition(setPosition, showError);
    }
    else {
        alert('navegador não suporta geolozalicação');  // Caso o navegador não suporte, exibe uma mensagem de erro
    }

    // Função chamada quando a posição é obtida com sucesso
    function setPosition(position) {
        console.log(position)   // Exibe a posição no console (para depuração)
        let lat = position.coords.latitude; // Obtém a latitude
        let long = position.coords.longitude;   // Obtém a longitude
        coordResults(lat, long);    // Chama a função para obter os dados do clima para as coordenadas
    }

     // Função chamada em caso de erro ao obter a posição
    function showError(error) {
        alert(`erro: ${error.message}`);    // Exibe o erro
    }
})

// Função para obter os dados climáticos com base nas coordenadas geográficas
function coordResults(lat, long) {
    // Faz uma requisição à API para obter dados climáticos
    fetch(`${api.base}weather?lat=${lat}&lon=${long}&lang=${api.lang}&units=${api.units}&APPID=${api.key}`)
        .then(response => {
            // Verifica se a resposta da API foi bem-sucedida
            if (!response.ok) {
                throw new Error(`http error: status ${response.status}`) // Lança um erro caso a resposta não seja OK
            }
            return response.json(); // Converte a resposta para formato JSON
        })
        .catch(error => {
            alert(error.message) // Exibe erro caso a requisição falhe
        })
        .then(response => {
            displayResults(response) // Chama a função para exibir os resultados do clima
        });
}
// Adiciona um evento de clique no botão de pesquisa para buscar o clima de uma cidade
search_button.addEventListener('click', function() {
    searchResults(search_input.value)
})
// Adiciona um evento de tecla pressionada para permitir a busca ao pressionar Enter
search_input.addEventListener('keypress', enter)
function enter(event) {
    key = event.keyCode
    if (key === 13) {
        searchResults(search_input.value) // Chama a função de busca se a tecla pressionada for Enter
    }
}

// Função para buscar os dados climáticos de uma cidade
function searchResults(city) {
    // Faz uma requisição à API para obter dados climáticos de uma cidade
    fetch(`${api.base}weather?q=${city}&lang=${api.lang}&units=${api.units}&APPID=${api.key}`)
        .then(response => {
            // Verifica se a resposta da API foi bem-sucedida
            if (!response.ok) {
                throw new Error(`http error: status ${response.status}`) // Lança erro caso a resposta seja ruim
            }
            return response.json(); // Converte a resposta para JSON
        })
        .catch(error => {
            alert(error.message) // Exibe erro caso a requisição falhe
        })
        .then(response => {
            displayResults(response) // Chama a função para exibir os resultados do clima
        });
}

// Função que exibe os dados climáticos na página
function displayResults(weather) {
    console.log(weather) // Exibe os dados climáticos no console para depuração

    // Exibe o nome da cidade e o código do país
    city.innerText = `${weather.name}, ${weather.sys.country}`;

    // Cria uma nova data para exibir o dia atual
    let now = new Date();
    date.innerText = dateBuilder(now); // Chama a função para construir a data no formato desejado

    // Obtém o nome do ícone de clima da API
    let iconName = weather.weather[0].icon;
    container_img.innerHTML = `<img src="./icons/${iconName}.png">`; // Exibe o ícone correspondente ao clima

    // Exibe a temperatura arredondada
    let temperature = `${Math.round(weather.main.temp)}`
    temp_number.innerHTML = temperature;
    // Exibe a unidade de temperatura (°C)
    temp_unit.innerHTML = `°c`;

    // Obtém a descrição do clima (ex: "Nublado", "Chuvoso")
    weather_tempo = weather.weather[0].description;
    weather_t.innerText = capitalizeFirstLetter(weather_tempo) // Exibe a descrição com a primeira letra maiúscula

    // Exibe a temperatura mínima e máxima
    low_high.innerText = `${Math.round(weather.main.temp_min)}°c / ${Math.round(weather.main.temp_max)}°c`;
}
// Função para formatar a data atual no formato desejado
function dateBuilder(d) {
    let days = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"];
    let months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julio", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

    let day = days[d.getDay()]; // Obtém o nome do dia da semana
    let date = d.getDate(); // Obtém o dia do mês
    let month = months[d.getMonth()]; // Obtém o nome do mês
    let year = d.getFullYear(); // Obtém o ano

    return `${day}, ${date} ${month} ${year}`; // Retorna a data no formato desejado
}

// Adiciona um evento de clique para alternar entre Celsius e Fahrenheit
container_temp.addEventListener('click', changeTemp)
function changeTemp() {
    // Obtém o valor atual da temperatura exibida
    temp_number_now = temp_number.innerHTML

    // Se a unidade de temperatura for Celsius, converte para Fahrenheit
    if (temp_unit.innerHTML === "°c") {
        let f = (temp_number_now * 1.8) + 32 // Converte para Fahrenheit
        temp_unit.innerHTML = "°f"  // Atualiza a unidade para Fahrenheit
        temp_number.innerHTML = Math.round(f) // Exibe a temperatura em Fahrenheit
    }
    // Se a unidade de temperatura for Fahrenheit, converte para Celsius
    else {
        let c = (temp_number_now - 32) / 1.8 // Converte para Celsius
        temp_unit.innerHTML = "°c" // Atualiza a unidade para Celsius
        temp_number.innerHTML = Math.round(c) // Exibe a temperatura em Celsius
    }
}

// Função para capitalizar a primeira letra de uma string
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1); // Converte a primeira letra para maiúscula
}



