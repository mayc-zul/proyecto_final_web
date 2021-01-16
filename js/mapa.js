window.onload = function(){
    navigator.geolocation.getCurrentPosition(visulizarPosicion,errorPosicion);
}

var mapa;
var opcionesMapa;
var Locations;
var info;
function visulizarPosicion(position){
    //Geolocalización ->html5
    console.log(position);
    var ubicación = document.getElementById("ubicacion");
    //ubicación.innerHTML = position.coords.latitude + ", " + position.coords.longitude;

    //Crear mapa
    var divMapa = document.getElementById("mapa");
    var posUser = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
    //opciones
    opcionesMapa = {
        zoom: 10,
        center: posUser,
        zoomControl: false

    }
    mapa = new google.maps.Map(divMapa,opcionesMapa); // donde y como lo configuro.
    google.maps.event.addListener(mapa, 'mousemove', function() {
      info.close();
    });
    // Crear marcador del usuario
    var opcionesMarca = {
        position: posUser,
        map: mapa,
        animation: google.maps.Animation.BOUNCE,
        icon: "usuario.png"
    }
    var marcaUser = new google.maps.Marker(opcionesMarca);

    // Marcadores de Hospitales
    Locations = [
        ["Tienda 1", 6.343636, -75.5417697], // Clinica ces
        ["Tienda 2", 6.2726533, -75.5874955],//Pablo Tobón Uribe
        ["Tienda 3",6.2637094, -75.59813],// Hospital General de Medellín
        ["Tienda 4", 6.2390635, -75.515027], //Clinica Medellín
        ["Tienda 5",6.1680269,-75.623805] //Hospital san vicente de paul
    ];

    var Marcas = []
    for (var i = 0; i < Locations.length; i++) {
        var pos = new google.maps.LatLng(Locations[i][1],Locations[i][2]);
        
        var opcMarca = {
            position: pos,
            map: mapa,
            animation: google.maps.Animation.DROP,
            
        }
        Marcas[i] = new google.maps.Marker(opcMarca);
        Marcas[i].addListener('click', centrar)


        switch (Locations[i][0]) {
            case "Tienda 1":
                Marcas[0].addListener('mouseover',function(){mostrarInfo(0,Locations[0][1],Locations[0][2])});
                break;
            case "Tienda 2":
                Marcas[1].addListener('mouseover',function(){mostrarInfo(1,Locations[1][1],Locations[1][2])});
                break;
            
            case "Tienda 3":
                Marcas[2].addListener('mouseover',function(){mostrarInfo(2,Locations[2][1],Locations[2][2])});
                break;

            case "Tienda 4":
                Marcas[3].addListener('mouseover',function(){mostrarInfo(3,Locations[3][1],Locations[3][2])});
                break;
            
            case "Tienda 5":
                Marcas[4].addListener('mouseover',function(){mostrarInfo(4,Locations[4][1],Locations[4][2])});
                break;
            
        }

    }

}

function mostrarInfo(i,Lt,Lg) {
    var p = new google.maps.LatLng(Lt,Lg);
    var contenido
    switch (i) {
        case 0:
            contenido = '<div class="card" style="width: 18rem;">' +
            '<div class="card-body">' +
              '<h5 class="card-title">Tecnocompra</h5>' +
              '<p class="card-text">Direccion: Dg. 59 #32-111, Bello, Antioquia</p>' +
              '<p class="card-text">Horario: Abierto las 24 horas</p>' +
            '</div>' +
          '</div>'

            break;
        case 1:
            contenido = '<div class="card" style="width: 18rem;">' +
            '<div class="card-body">' +
              '<h5 class="card-title">Tecnocompra</h5>' +
              '<p class="card-text">Direccion: Cl. 65c, Medellín, Antioquia"</p>' +
              '<p class="card-text">Horario: lunes a sabados 08:00a17:30</p>' +
            '</div>' +
          '</div>'
            break;
        
        case 2:
            contenido = '<div class="card" style="width: 18rem;">' +
            '<div class="card-body">' +
              '<h5 class="card-title">Tecnocompra</h5>' +
              '<p class="card-text">Direccion: Cl. 50 # 81 a 47 segundo piso, Medellín, Antioquia</p>' +
              '<p class="card-text">Horario: Abierto las 24 horas</p>' +
            '</div>' +
          '</div>'
            break;

        case 3:
            contenido = '<div class="card" style="width: 18rem;">' +
            '<div class="card-body">' +
              '<h5 class="card-title">Tecnocompra</h5>' +
              '<p class="card-text">Direccion: Via Medellín-Via Sta. Elena, Medellín, Antioquia</p>' +
              '<p class="card-text">Horario: lunes a sabados 08:00a17:00</p>' +
            '</div>' +
          '</div>'
            break;
        
        case 4:
            contenido = '<div class="card" style="width: 18rem;">' +
            '<div class="card-body">' +
              '<h5 class="card-title">Tecnocompra</h5>' +
              '<p class="card-text">Direccion: Calle 34 A # 54 - 40 Itagüí, Itagüí, Antioquia</p>' +
              '<p class="card-text">Horario: Abierto las 24 horas</p>' +
            '</div>' +
          '</div>'
            break;
    }
	
	opInfo = {
		content: contenido,
		position: p
	};

	info = new google.maps.InfoWindow(opInfo);
	info.open(mapa);

}

function seleccionado(num) {
    var pos = new google.maps.LatLng(Locations[num][1],Locations[num][2]);
    mapa.setCenter(pos);
}

function centrar(event){
    mapa.setCenter(event.latLng);
}
function errorPosicion(){
    alert("Esta página requiere de su ubicación");
}