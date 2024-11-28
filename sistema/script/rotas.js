var myLatLng = { lat: -23.5505, lng: -46.6333 };
var mapOptions = {
    center: myLatLng,
    zoom: 12,
    mapTypeId: google.maps.MapTypeId.ROADMAP

};

//AQUI CRIAMOS O MAPA
var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

//criamos um objeto DirectionsService para usar o método route e obter um resultado para nossa solicitação
var directionsService = new google.maps.DirectionsService();

//criamos um objeto DirectionsRenderer que usaremos para exibir a rota
var directionsDisplay = new google.maps.DirectionsRenderer();

//vincula o DirectionsRenderer ao mapa
directionsDisplay.setMap(map);


//define a função calcRoute = Calcula a rota
function calcRoute() {
      //cria solicitação
    var request = {
        origin: document.getElementById("from").value, //Origem
        destination: document.getElementById("to").value, //Destino
        travelMode: google.maps.TravelMode.WALKING, //CARRO, BICICLETA E APÊ  //Como você vai e a duração
        unitSystem: google.maps.UnitSystem.kilometer  //Distância em KM
    }

    //passa a requisição para o método route
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //Get distance and time
            const output = document.querySelector('#output');
            output.innerHTML = "<div class='alert-info'>Origem: " + document.getElementById("from").value + ".<br />Destino: " + document.getElementById("to").value + ".<br />Distância a pé <i class='fas fa-road'></i> : " + result.routes[0].legs[0].distance.text + ".<br />Duração da caminhada <i class='fas fa-hourglass-start'></i> : " + result.routes[0].legs[0].duration.text + ".</div>";

            
            //exibe rota
            directionsDisplay.setDirections(result);
        } else {
            //deleta rota do mapa
            directionsDisplay.setDirections({ routes: [] });
            //centro do mapa em São Paulo
            map.setCenter(myLatLng);

            //mostra mensagem de erro
            output.innerHTML = "<div class='alert-danger'><i class='fas fa-exclamation-triangle'></i> Não foi possível recuperar a distância percorrida.</div>";
        }
    });

}

//cria objetos de preenchimento automático para todas as entradas
var options = {
    types: ['(cities)']
}

var input1 = document.getElementById("from");
var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

var input2 = document.getElementById("to");
var autocomplete2 = new google.maps.places.Autocomplete(input2, options);