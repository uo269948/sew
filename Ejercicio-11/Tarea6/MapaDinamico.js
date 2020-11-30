

var mapaDinamicoGoogle = new Object();
function initMap1(){
    var ciudad = {lat: 43.1518, lng: -4.91961};
    var mapaCiudad = new google.maps.Map(document.getElementById('mapa'),{zoom: 8,center:ciudad});
    var marcador = new google.maps.Marker({position:ciudad,map:mapaCiudad});
}
function initMap2(){
    var oviedo = {lat: 43.3672702, lng: -5.8502461};
    var mapaOviedo = new google.maps.Map(document.getElementById('mapa'),{zoom: 8,center:oviedo});
    var marcador = new google.maps.Marker({position:oviedo,map:mapaOviedo});
}
function initMap3(){
    var oviedo = {lat: 43.3672702, lng: -5.8502461};
    var mapaOviedo = new google.maps.Map(document.getElementById('mapa'),{zoom: 8,center:oviedo});
    var marcador = new google.maps.Marker({position:oviedo,map:mapaOviedo});
}
mapaDinamicoGoogle.initMap1 = initMap1;
