"use strict";

class Archivo {
    dibujarMapa()  {
        var caracteristicas = {
            zoom: 6,

            center: new google.maps.LatLng( 43.1516882, -4.9202 )
        };
        this.mapa = new google.maps.Map(document.getElementById('mapa'), caracteristicas);
    }
    leer(files) {
        var fr = new FileReader();
        fr.onload = function(event) {
            try {
                var geoJSON = JSON.parse(fr.result);
                this.mapa.data.addGeoJson(geoJSON);
            } catch(err) {
                alert("Archivo incorrecto")
            } 
        }.bind(this);

        fr.readAsText(files[0]);
    }
}
var archivo = new Archivo();
