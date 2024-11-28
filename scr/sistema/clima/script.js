/* O código seleciona elementos HTML relacionados à exibição de informações climáticas, 
como temperatura, condição, vento, umidade, e outros dados, além de botões para alternar entre 
unidades de temperatura e previsões horárias ou semanais. As referências a esses elementos são 
armazenadas em variáveis para facilitar a manipulação e atualização das informações na interface de usuário. */

const temp = document.getElementById("temp"),
  date = document.getElementById("date-time"),
  condition = document.getElementById("condition"),
  rain = document.getElementById("rain"),
  mainIcon = document.getElementById("icon"),
  currentLocation = document.getElementById("location"),
  uvIndex = document.querySelector(".uv-index"),
  uvText = document.querySelector(".uv-text"),
  windSpeed = document.querySelector(".wind-speed"),
  sunRise = document.querySelector(".sun-rise"),
  sunSet = document.querySelector(".sun-set"),
  humidity = document.querySelector(".humidity"),
  visibilty = document.querySelector(".visibilty"),
  humidityStatus = document.querySelector(".humidity-status"),
  airQuality = document.querySelector(".air-quality"),
  airQualityStatus = document.querySelector(".air-quality-status"),
  visibilityStatus = document.querySelector(".visibilty-status"),
  searchForm = document.querySelector("#search"),
  search = document.querySelector("#query"),
  celciusBtn = document.querySelector(".celcius"),
  fahrenheitBtn = document.querySelector(".fahrenheit"),
  tempUnit = document.querySelectorAll(".temp-unit"),
  hourlyBtn = document.querySelector(".hourly"),
  weekBtn = document.querySelector(".week"),
  weatherCards = document.querySelector("#weather-cards");

let currentCity = ""; //Armazena o nome da cidade atual, inicialmente definida como uma string vazia.
let currentUnit = "c"; //Define a unidade de temperatura como Celsius ("c") por padrão.
let hourlyorWeek = "week"; //Define o tipo de previsão, inicialmente configurado para exibir a previsão semanal ("week").

// função para obter data e hora
function getDateTime() {
  let now = new Date(),
    hour = now.getHours(),
    minute = now.getMinutes();

//Coloca todos os dias da semana
  let days = [
    "Domingo",
    "Segunda-feira",
    "Terça-feira",
    "Quarta-feira",
    "Quinta-feira",
    "Sexta-feira",
    "Sábado",
  ];

  // Formato de 12 horas
  hour = hour % 12; // Ajusta a hora para o formato de 12 horas (removendo a parte do AM/PM)

  // Se a hora for menor que 10, adiciona um "0" à frente para garantir dois dígitos
  if (hour < 10) {
    hour = "0" + hour;
  }

  // Se o minuto for menor que 10, adiciona um "0" à frente para garantir dois dígitos
  if (minute < 10) {
    minute = "0" + minute;
  }

  // Obtém o nome do dia da semana usando o índice retornado por `now.getDay()`
  let dayString = days[now.getDay()];

  // Retorna uma string formatada no formato "Dia da semana, Hora:Minuto"
  return `${dayString}, ${hour}:${minute}`;
}

//Atualizando data e hora
date.innerText = getDateTime();
setInterval(() => {
  date.innerText = getDateTime();
}, 1000);

//função para obter endereço IP público
function getPublicIp() {
  fetch("https://geolocation-db.com/json/", {
    method: "GET",
    headers: {},
  })
    .then((response) => response.json())
    .then((data) => {
      currentCity = data.city;
      getWeatherData(data.city, currentUnit, hourlyorWeek);
    })
    .catch((err) => {
      console.error(err);
    });
}

getPublicIp();

// função para obter dados meteorológicos
function getWeatherData(city, unit, hourlyorWeek) {
  // Faz uma requisição HTTP GET para a API de previsão do tempo com os parâmetros da cidade, unidade de medida e chave de API
  fetch(
    `https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/${city}?unitGroup=metric&key=EJ6UBL2JEQGYB3AA4ENASN62J&contentType=json`,
    {
      method: "GET",
      headers: {},
    }
  )
    // Converte a resposta da requisição para formato JSON
    .then((response) => response.json())
    .then((data) => {
      // Obtém as condições climáticas atuais do JSON retornado
      let today = data.currentConditions;

      // Verifica a unidade de temperatura (Celsius ou Fahrenheit)
      if (unit === "c") {
        temp.innerText = today.temp; // Exibe a temperatura em Celsius
      } else {
        temp.innerText = celciusToFahrenheit(today.temp);  // Converte para Fahrenheit se a unidade for Fahrenheit
      }

      // Exibe cidade, condições entre outras coisas.
      currentLocation.innerText = data.resolvedAddress;
      condition.innerText = today.conditions;
      rain.innerText = "Perc - " + today.precip + "%";
      uvIndex.innerText = today.uvindex;
      windSpeed.innerText = today.windspeed;
      measureUvIndex(today.uvindex);
      mainIcon.src = getIcon(today.icon);
      changeBackground(today.icon);
      humidity.innerText = today.humidity + "%";
      updateHumidityStatus(today.humidity);
      visibilty.innerText = today.visibility;
      updateVisibiltyStatus(today.visibility);
      airQuality.innerText = today.winddir;
      updateAirQualityStatus(today.winddir);
      if (hourlyorWeek === "hourly") {
        updateForecast(data.days[0].hours, unit, "day");
      } else {
        updateForecast(data.days, unit, "week");
      }
      // Exibe o horário do nascer do sol, convertido para formato de 12 horas
      sunRise.innerText = covertTimeTo12HourFormat(today.sunrise);
      // Exibe o horário do pôr do sol, convertido para formato de 12 horas
      sunSet.innerText = covertTimeTo12HourFormat(today.sunset);
    })
     // Caso haja erro na requisição (ex: cidade não encontrada), exibe uma mensagem de erro
    .catch((err) => {
      alert("Cidade não encontrada em nosso banco de dados");
    });
}

//função para atualizar a previsão
function updateForecast(data, unit, type) {
  weatherCards.innerHTML = "";
  let day = 0;
  let numCards = 0;
  if (type === "day") {
    numCards = 24;
  } else {
    numCards = 7;
  }
  for (let i = 0; i < numCards; i++) {
    let card = document.createElement("div");
    card.classList.add("card");
    let dayName = getHour(data[day].datetime);
    if (type === "week") {
      dayName = getDayName(data[day].datetime);
    }
    let dayTemp = data[day].temp;
    if (unit === "f") {
      dayTemp = celciusToFahrenheit(data[day].temp);
    }
    let iconCondition = data[day].icon;
    let iconSrc = getIcon(iconCondition);
    let tempUnit = "°C";
    if (unit === "f") {
      tempUnit = "°F";
    }
    card.innerHTML = `
                <h2 class="day-name">${dayName}</h2>
            <div class="card-icon">
              <img src="${iconSrc}" class="day-icon" alt="" />
            </div>
            <div class="day-temp">
              <h2 class="temp">${dayTemp}</h2>
              <span class="temp-unit">${tempUnit}</span>
            </div>
  `;
    weatherCards.appendChild(card);
    day++;
  }
}

// função para alterar ícones meteorológicos
function getIcon(condition) {
  if (condition === "partly-cloudy-day") {
    return "https://cdn-icons-png.flaticon.com/512/7084/7084505.png";
  } else if (condition === "partly-cloudy-night") {
    return "https://cdn-icons-png.flaticon.com/512/15/15785.png";
  } else if (condition === "rain") {
    return "https://cdn-icons-png.flaticon.com/512/1247/1247771.png";
  } else if (condition === "clear-day") {
    return "https://images.vexels.com/media/users/3/307001/isolated/preview/d25fe65d4d1b1da5ebc3eff8562ebb6f-summer-day-with-clear-blue-skies.png";
  } else if (condition === "clear-night") {
    return "https://cdn-icons-png.flaticon.com/512/17/17279.png";
  } else {
    return "https://cdn-icons-png.flaticon.com/512/17/17279.png";
  }
}

// função para alterar o fundo dependendo das condições climáticas
function changeBackground(condition) {
  const body = document.querySelector("body");
  let bg = "";
  if (condition === "partly-cloudy-day") {
    bg = "https://i.ibb.co/qNv7NxZ/pc.webp";
  } else if (condition === "partly-cloudy-night") {
    bg = "https://i.ibb.co/RDfPqXz/pcn.jpg";
  } else if (condition === "rain") {
    bg = "https://i.ibb.co/h2p6Yhd/rain.webp";
  } else if (condition === "clear-day") {
    bg = "https://i.ibb.co/WGry01m/cd.jpg";
  } else if (condition === "clear-night") {
    bg = "https://i.ibb.co/kqtZ1Gx/cn.jpg";
  } else {
    bg = "https://i.ibb.co/qNv7NxZ/pc.webp";
  }
  body.style.backgroundImage = `linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url(${bg})`;
}

//obter horas
function getHour(time) {
  let hour = time.split(":")[0];
  let min = time.split(":")[1];
  if (hour > 12) {
    hour = hour - 12;
    return `${hour}:${min} PM`;
  } else {
    return `${hour}:${min} AM`;
  }
}

// converter a hora para o formato de 12 horas
function covertTimeTo12HourFormat(time) {
  let hour = time.split(":")[0];
  let minute = time.split(":")[1];
  let ampm = hour >= 12 ? "pm" : "am";
  hour = hour % 12;
  hour = hour ? hour : 12; // a hora '0' deve ser '12'
  hour = hour < 10 ? "0" + hour : hour;
  minute = minute < 10 ? "0" + minute : minute;
  let strTime = hour + ":" + minute + " " + ampm;
  return strTime;
}

// função para obter o nome do dia a partir da data
function getDayName(date) {
  let day = new Date(date);
  let days = [
    "Domingo",
    "Segunda-feira",
    "Terça-feira",
    "Quarta-feira",
    "Quinta-feira",
    "Sexta-feira",
    "Sábado",
  ];
  return days[day.getDay()];
}

// função para obter o status do índice UV
function measureUvIndex(uvIndex) {
  if (uvIndex <= 2) {
    uvText.innerText = "Baixo";
  } else if (uvIndex <= 5) {
    uvText.innerText = "Moderado";
  } else if (uvIndex <= 7) {
    uvText.innerText = "Alto";
  } else if (uvIndex <= 10) {
    uvText.innerText = "Muito alto";
  } else {
    uvText.innerText = "Extremo";
  }
}

// função para obter o status de umidade
function updateHumidityStatus(humidity) {
  if (humidity <= 30) {
    humidityStatus.innerText = "Baixo";
  } else if (humidity <= 60) {
    humidityStatus.innerText = "Moderado";
  } else {
    humidityStatus.innerText = "Alto";
  }
}

// função para obter status de visibilidade
function updateVisibiltyStatus(visibility) {
  if (visibility <= 0.03) {
    visibilityStatus.innerText = "Nevoeiro denso";
  } else if (visibility <= 0.16) {
    visibilityStatus.innerText = "Nevoeiro moderado";
  } else if (visibility <= 0.35) {
    visibilityStatus.innerText = "Nevoeiro leve";
  } else if (visibility <= 1.13) {
    visibilityStatus.innerText = "Nevoeiro muito leve";
  } else if (visibility <= 2.16) {
    visibilityStatus.innerText = "Névoa Leve";
  } else if (visibility <= 5.4) {
    visibilityStatus.innerText = "Névoa Muito Leve";
  } else if (visibility <= 10.8) {
    visibilityStatus.innerText = "Ar limpo";
  } else {
    visibilityStatus.innerText = "Ar muito claro";
  }
}

// função para obter o status da qualidade do ar
function updateAirQualityStatus(airquality) {
  if (airquality <= 50) {
    airQualityStatus.innerText = "Bom👌👌";
  } else if (airquality <= 100) {
    airQualityStatus.innerText = "Moderado😐";
  } else if (airquality <= 150) {
    airQualityStatus.innerText = "Não saudável para grupos sensíveis😷";
  } else if (airquality <= 200) {
    airQualityStatus.innerText = "Insalubre😷";
  } else if (airquality <= 250) {
    airQualityStatus.innerText = "Muito insalubre 😨";
  } else {
    airQualityStatus.innerText = "Perigoso😱";
  }
}

// função para lidar com o formulário de pesquisa
searchForm.addEventListener("submit", (e) => {
  e.preventDefault();
  let location = search.value;
  if (location) {
    currentCity = location;
    getWeatherData(location, currentUnit, hourlyorWeek);
  }
});

// função para converter Celsius para Fahrenheit
function celciusToFahrenheit(temp) {
  return ((temp * 9) / 5 + 32).toFixed(1);
}


var currentFocus;
search.addEventListener("input", function (e) {
  removeSuggestions();
  var a,
    b,
    i,
    val = this.value;
  if (!val) {
    return false;
  }
  currentFocus = -1;

  a = document.createElement("ul");
  a.setAttribute("id", "suggestions");

  this.parentNode.appendChild(a);

  for (i = 0; i < cities.length; i++) {
    /*verifique se o item começa com as mesmas letras do valor do campo de texto:*/
    if (
      cities[i].name.substr(0, val.length).toUpperCase() == val.toUpperCase()
    ) {
      /*crie um elemento li para cada elemento correspondente:*/
      b = document.createElement("li");
      /*deixe as letras correspondentes em negrito:*/
      b.innerHTML =
        "<strong>" + cities[i].name.substr(0, val.length) + "</strong>";
      b.innerHTML += cities[i].name.substr(val.length);
      /*insira um campo de entrada que conterá o valor do item da matriz atual:*/
      b.innerHTML += "<input type='hidden' value='" + cities[i].name + "'>";
      /*executa uma função quando alguém clica no valor do item (elemento DIV):*/
      b.addEventListener("click", function (e) {
        /*insira o valor para o campo de texto de preenchimento automático:*/
        search.value = this.getElementsByTagName("input")[0].value;
        removeSuggestions();
      });

      a.appendChild(b);
    }
  }
});
/*executar uma função pressiona uma tecla no teclado:*/
search.addEventListener("keydown", function (e) {
  var x = document.getElementById("suggestions");
  if (x) x = x.getElementsByTagName("li");
  if (e.keyCode == 40) {
    /*Se a tecla de seta PARA BAIXO
      é pressionado,
      aumente a variável currentFocus:*/
    currentFocus++;
    /*ee tornar o item atual mais visível:*/
    addActive(x);
  } else if (e.keyCode == 38) {
    /*Se a tecla de seta PARA CIMA
      é pressionado,
      diminua a variável currentFocus:*/
    currentFocus--;
    /*ee tornar o item atual mais visível:*/
    addActive(x);
  }
  if (e.keyCode == 13) {
    /*Se a tecla ENTER for pressionada, evita que o formulário seja enviado,*/
    e.preventDefault();
    if (currentFocus > -1) {
      /*e simule um clique no item "ativo":*/
      if (x) x[currentFocus].click();
    }
  }
});
function addActive(x) {
  /*uma função para classificar um item como "ativo":*/
  if (!x) return false;
  /*comece removendo a classe "ativa" em todos os itens:*/
  removeActive(x);
  if (currentFocus >= x.length) currentFocus = 0;
  if (currentFocus < 0) currentFocus = x.length - 1;
  /**adicionar classe "autocomplete-active":*/
  x[currentFocus].classList.add("active");
}
function removeActive(x) {
  /*uma função para remover a classe "ativa" de todos os itens de preenchimento automático:*/
  for (var i = 0; i < x.length; i++) {
    x[i].classList.remove("active");
  }
}

function removeSuggestions() {
  var x = document.getElementById("suggestions");
  if (x) x.parentNode.removeChild(x);
}

fahrenheitBtn.addEventListener("click", () => {
  changeUnit("f");
});
celciusBtn.addEventListener("click", () => {
  changeUnit("c");
});

// função para mudar de unidade
function changeUnit(unit) {
  if (currentUnit !== unit) {
    currentUnit = unit;
    tempUnit.forEach((elem) => {
      elem.innerText = `°${unit.toUpperCase()}`;
    });
    if (unit === "c") {
      celciusBtn.classList.add("active");
      fahrenheitBtn.classList.remove("active");
    } else {
      celciusBtn.classList.remove("active");
      fahrenheitBtn.classList.add("active");
    }
    getWeatherData(currentCity, currentUnit, hourlyorWeek);
  }
}

hourlyBtn.addEventListener("click", () => {
  changeTimeSpan("hourly");
});
weekBtn.addEventListener("click", () => {
  changeTimeSpan("week");
});

// função para mudar de hora em hora para semanal ou vice-versa
function changeTimeSpan(unit) {
  if (hourlyorWeek !== unit) {
    hourlyorWeek = unit;
    if (unit === "hourly") {
      hourlyBtn.classList.add("active");
      weekBtn.classList.remove("active");
    } else {
      hourlyBtn.classList.remove("active");
      weekBtn.classList.add("active");
    }
    getWeatherData(currentCity, currentUnit, hourlyorWeek);
  }
}
