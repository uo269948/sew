class Archivo {
    constructor() { 

    }
  
    cargarArchivos(files) {
      if (window.File && window.FileReader && window.FileList && window.Blob) {
        var archivos = files;
        this.leer(archivos[0]);
      }
      else {
        document.write("<p>Este archivo no soporta el API File");
      }
    }
  
    leer(archivo) {
      var fr = new FileReader();
      var parser = new DOMParser();
      fr.onload = function (evento) {
        var map = new google.maps.Map(document.getElementById('mapa'), {
          center: new google.maps.LatLng(43.1516882, -4.9202),
          mapTypeId: 'terrain',
          zoom: 6
        });

        
       
        var xml = parser.parseFromString(fr.result, "text/xml");
        
        var kml = xml.getElementsByTagName("kml")[0].getElementsByTagName("Document")[0];
        
        var placemark = kml.getElementsByTagName("Placemark");
        
        for (var j = 0; j < placemark.length; j++) {
          var linestyles = kml.getElementsByTagName("LineStyle")[0];
          var colors = linestyles.getElementsByTagName("color")[0].textContent;
          var widths = linestyles.getElementsByTagName("width")[0].textContent;
          var coordinates = xml.getElementsByTagName("coordinates")[j].textContent;
          var cor = coordinates.split("  "); 
          var coordinatess = []
      
          cor.forEach(function (mirarCoordenadas) {
       
            var values = mirarCoordenadas.split(",");
            var marker = new google.maps.Marker({
              position: {
                lat: parseFloat(values[1]),
                lng: parseFloat(values[0])
              },

              map: map,

              label: "P"
            });
            coordinatess.push({ lat: parseFloat(values[1]), lng: parseFloat(values[0]) });
          });
          var kml2 = new google.maps.Polyline({
            path: coordinatess,
            
            stroke: colors,

            strokeOpacity:0.75,

            geodsic: true,

            strokeWeight: parseFloat(widths)
          });

          kml2.setMap(map);
          }
      
  
      }
      fr.readAsText(archivo);
    }
  
  
  }
  var archivo = new Archivo();