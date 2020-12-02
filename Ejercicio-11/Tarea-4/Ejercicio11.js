class Mapa{
	constructor(){
	}
	initMap(){
		var lf = {lat: 43.4019984, lng: -5.7892016};
		var mapaLf = new google.maps.Map(document.getElementById('mapa'),{zoom: 8,center:lf});
		var marcador = new google.maps.Marker({position:lf,map:mapaLf});
	}
}
var mapaDinamicoGoogle = new Mapa();
