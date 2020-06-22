window.onload = function(position) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(visializarPosicion, error);
    }
}

var mapa;
var informacion;
var ruta = [];

var labels = "AB";
var locations = [
    { lat: 6.2657856, lng: -75.5711125 },
    { lat: 6.210770, lng: -75.571113 },

];

function visializarPosicion(position) {
    console.log(position.coords);
    var pos = document.getElementById("ubicacion");


    //var coord = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    var coord = new google.maps.LatLng(6.25, -75.57);
    console.log(coord);

    var opMapa = {
        center: coord,
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoomControl: false,
        fullscreenControl: false,
        streetViewControl: false,
        scaleControl: true
    };
    mapa = new google.maps.Map(document.getElementById("mapa"), opMapa);
    ruta.push({ location: coord });

    var opMarcaUser = {
        position: coord,
        title: "user",
        label: "UD",
        icon: "user.png",
        animation: google.maps.Animation.BOUNCE,
        map: mapa
    };
    var marca = new google.maps.Marker(opMarcaUser);


    marcas = locations.map(function(location, i) {
        var m = new google.maps.Marker({
            position: location,
            label: labels[i],
            map: mapa
        });
        m.addListener('click', zoomIn);
        m.addListener('mouseout', zoomOut);
        return m;
    });

    var locationUdeA = [
        { lat: 6.2657856, lng: -75.5711125 },
        { lat: 6.2651993, lng: -75.5676377 },
        { lat: 6.2694928, lng: -75.5664327 },
        { lat: 6.2706416, lng: -75.5701260 }
    ];

    var locationPoblado = [
        { lat: 6.210770, lng: -75.571113 },
        { lat: 6.210119, lng: -75.571339 },
        { lat: 6.209948, lng: -75.570888 },
        { lat: 6.210556, lng: -75.570641 }
    ];

    var poligonos = [
        locationUdeA, locationPoblado
    ];
    var c = length.poligonos
    console.log(c)
    for (let i = 0; i < poligonos.length; i++) {
        var opPoligono = {
            paths: poligonos[i],
            strokeColor: '#FF0000',
            strokeWeight: 3,
            fillColor: '#FF0000',
            fillOpacity: 0.2,
            map: mapa
        };
        if (i == 0) {
            var UdeA = new google.maps.Polygon(opPoligono);

            UdeA.addListener('click', mostrarInfo);

        } else {
            var Pob = new google.maps.Polygon(opPoligono);

            Pob.addListener('click', mostrarInfoP);

        }

    }
}

function nuevaMarca(event) {
    var op = {
        position: event.latLng,
        title: "nueva",
        animation: google.maps.Animation.DROP,
        map: mapa
    };
    var nueva = new google.maps.Marker(op);
    ruta.push({ location: event.latLng });

    crearRuta();
}

function crearRuta() {
    var dirS = new google.maps.DirectionsService;
    var dirR = new google.maps.DirectionsRenderer;

    dirR.setMap(mapa);
    var opRuta = {
        origin: ruta[0],
        destination: ruta[ruta.length - 1],
        waypoints: ruta,
        travelMode: google.maps.TravelMode.WALKING
    };

    dirS.route(opRuta, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            dirR.setDirections(response)
        }
    });
}


function mostrarInfo(event, sede) {
    var contenido = "<h3>BANDSTORE SEDE UdeA</h3>" +
        "<p>Sede Principal" + "</p>" +

        "<br>"
    var opInfo = {
        content: contenido,
        position: event.latLng
    };

    informacion = new google.maps.InfoWindow(opInfo);
    informacion.open(mapa);
}

function mostrarInfoP(event, sede) {
    var contenido = "<h3>BANDSTORE SEDE Poblado</h3>" +
        "<p>Sede Bodega" + "</p>" +

        "<br>"
    var opInfo = {
        content: contenido,
        position: event.latLng
    };

    informacion = new google.maps.InfoWindow(opInfo);
    informacion.open(mapa);
}

function zoomIn() {
    var opciones = {
        scaledSize: new google.maps.Size(100, 100)
    }
    this.setIcon(opciones);
}

function zoomOut() {
    var opciones = {
        scaledSize: new google.maps.Size(40, 40)
    }
    this.setIcon(opciones);
}

function error() {
    alert("No se pudo obtener la posición.")
}