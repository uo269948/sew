class Mapa{

constructor(){
	this.mapaGeoposicionado;
	this.infoWindow;
	
}
initMap(){  
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(this.f.bind(this.position), 
            this.handleLocationError.bind(true)
          );
	}
	else{
		 this.handleLocationError(false);
	}
}
f(position){

    var centro = {lat: 43.3672702, lng: -5.8502461};
    var mapaGeoposicionado = new google.maps.Map(document.getElementById('mapa'),{
        zoom: 8,
        center:centro,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var infoWindow = new google.maps.InfoWindow;
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Esta aqui');
            infoWindow.open(mapaGeoposicionado);
            mapaGeoposicionado.setCenter(pos);
          
      }

      handleLocationError(browserHasGeolocation) {
		var centro = {lat: 43.3672702, lng: -5.8502461};
		var mapaGeoposicionado = new google.maps.Map(document.getElementById('mapa'),{
        zoom: 8,
        center:centro,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
		var infoWindow = new google.maps.InfoWindow;
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: Ha fallado la geolocalizacion' :
                              'Error: Su navegador no soporta geolocalizacion');
        infoWindow.open(mapaGeoposicionado);
      }
}
var miMapa=new Mapa();
