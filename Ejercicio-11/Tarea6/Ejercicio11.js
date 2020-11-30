
class Documento{
	constructor(){
		
	}

	
	getMapaEstaticoOseja(dondeVerlo){
        var ubicacion=document.getElementById(dondeVerlo);
        
        var apiKey = "&key=AIzaSyC6j4mF6blrc4kZ54S6vYZ2_FpMY9VzyRU";
		var url = "https://maps.googleapis.com/maps/api/staticmap?";
        var centro = "center=" + 43.1376667 + "," + -5.0429275;
        var zoom ="&zoom=10";
        var tamaño= "&size=900x900";
        var marcador = "&markers=color:red%7Clabel:O%7C" + 43.1376667 + "," + -5.0429275;
        var sensor = "&sensor=false"; 
        
        this.imagenMapa = url + centro + zoom + tamaño + marcador + sensor + apiKey;
        ubicacion.innerHTML = "<img src='"+this.imagenMapa+"' id='mapa'/>";
	}
	getMapaEstaticoPosada(lugar){
        var ubicacion=document.getElementById(lugar);
        
        var apiKey = "&key=AIzaSyC6j4mF6blrc4kZ54S6vYZ2_FpMY9VzyRU";
		var url = "https://maps.googleapis.com/maps/api/staticmap?";
        var centro = "center=" + 43.1516882 + "," + -4.920017;
        var zoom ="&zoom=11";
        var tamaño= "&size=900x900";
        var marcador = "&markers=color:blue%7Clabel:P%7C" + 43.1516882 + "," + -4.920017;
        var sensor = "&sensor=false"; 
        
        this.imagenMapa = url + centro + zoom + tamaño + marcador + sensor + apiKey;
        ubicacion.innerHTML = "<img src='"+this.imagenMapa+"' id='mapa'/>";
	}
	getMapaEstaticoCangas(lugar){
        var ubicacion=document.getElementById(lugar);
        
        var apiKey = "&key=AIzaSyC6j4mF6blrc4kZ54S6vYZ2_FpMY9VzyRU";
        var url = "https://maps.googleapis.com/maps/api/staticmap?";
        var centro = "center=" + 43.3502555 + "," + -5.1352637;
        var zoom ="&zoom=10";
        var tamaño= "&size=900x900";
        var marcador = "&markers=color:green%7Clabel:C%7C" + 43.3502555 + "," + -5.1352637;
        var sensor = "&sensor=false"; 
        
        this.imagenMapa = url + centro + zoom + tamaño + marcador + sensor + apiKey;
        ubicacion.innerHTML = "<img src='"+this.imagenMapa+"' id='mapa'/>";
    }
    getMapaEstaticoTodas(lugar){
        var ubicacion=document.getElementById(lugar);
        
        var apiKey = "&key=AIzaSyC6j4mF6blrc4kZ54S6vYZ2_FpMY9VzyRU";
        var url = "https://maps.googleapis.com/maps/api/staticmap?";
        var centro = "center=" + 43.3502555 + "," + -5.1352637;
        var zoom ="&zoom=9";
        var tamaño= "&size=900x900";
        var marcador1 = "&markers=color:red%7Clabel:O%7C" + 43.1376667 + "," + -5.0429275;
        var marcador2 = "&markers=color:blue%7Clabel:P%7C" + 43.1516882 + "," + -4.920017;
        var marcador3 = "&markers=color:green%7Clabel:C%7C" + 43.3502555 + "," + -5.1352637;
        var sensor = "&sensor=false"; 
        
        this.imagenMapa = url + centro + zoom + tamaño + marcador1 + marcador2 + marcador3 + sensor + apiKey;
        ubicacion.innerHTML = "<img src='"+this.imagenMapa+"' id='mapa'/>";
    }
}
var documento= new Documento();