
class Geolocalizacion {
    constructor (){
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this), this.verErrores.bind(this));
    }
    getPosicion(posicion){
        this.longitud         = posicion.coords.longitude; 
        this.latitud          = posicion.coords.latitude;  
        this.precision        = posicion.coords.accuracy;
        this.altitud          = posicion.coords.altitude;
        this.precisionAltitud = posicion.coords.altitudeAccuracy;
        this.rumbo            = posicion.coords.heading;
        this.velocidad        = posicion.coords.speed;  
        if(this.altitud==null){
            this.altitud="No disponible";
        }     
        if(this.precisionAltitud==null){
            this.precisionAltitud="No disponible";
        }  
        if(this.rumbo==null){
            this.rumbo="No disponible";
        }  
        if(this.velocidad==null){
            this.velocidad="No disponible";
        }  
    }
    verErrores(error){
        switch(error.code) {
        case error.PERMISSION_DENIED:
            this.mensaje = "El usuario no permite la peticion de geolocalizacion"
            break;
        case error.POSITION_UNAVAILABLE:
            this.mensaje = "Informacion de geolocalizacion no disponible"
            break;
        case error.TIMEOUT:
            this.mensaje = "La peticion de geolocalizacion ha caducado"
            break;
        case error.UNKNOWN_ERROR:
            this.mensaje = "Se ha producido un error desconocido"
            break;
        }
    }
    
    getLongitud(){
        return this.longitud;
    }
    getLatitud(){
        return this.latitud;
    }
    getAltitud(){
        return this.altitud;
    }
    verTodo(dondeVerlo){
        var ubicacion=document.getElementById(dondeVerlo);
        var datos=''; 
        datos+="<h2>Obtener mis coordenadas, altitud, rumbo y velocidad</h2>";
        datos+="<table><thead><tr><th>Datos</th><th>Valores</th></tr></thead>";
		datos+="<tbody>";
        datos+='<tr><td>Longitud: </td><td>'+this.longitud +' grados </td></tr>'; 
        datos+='<tr><td>Latitud: </td><td>'+this.latitud +' grados </td></tr>';
        datos+='<tr><td>Precision de la latitud y longitud: </td><td>'+ this.precision +' metros </td></tr>';
        datos+='<tr><td>Altitud: </td><td>'+ this.altitud +' metros </td></tr>';
        datos+='<tr><td>Precision de la altitud: </td><td>'+ this.precisionAltitud +' metros </td></tr>'; 
        datos+='<tr><td>Rumbo: </td><td>'+ this.rumbo +' grados </td></tr>'; 
        datos+='<tr><td>Velocidad: </td><td>'+ this.velocidad +' metros/segundo </td></tr></table>';
        ubicacion.innerHTML = datos;
    }
}
var miPosicion = new Geolocalizacion();
