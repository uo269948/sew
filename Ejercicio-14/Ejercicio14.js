"use strict";
class Editor {
     
	constructor() {
		var soporta = document.getElementById("soporta");
		if (!(window.File && window.FileReader && window.FileList && window.Blob)) { 
			soporta.innerText = "Este navegador no soporta el API File";
		}
	}
	
	fullscreen() {
		var imagen = document.getElementById("img");
		if (imagen.requestFullscreen) {
			imagen.requestFullscreen();
		} 
    }
    mostrar(){
        var archivo = document.getElementById("file").files[0];
        var reader = new FileReader();
        if (file) {
          reader.readAsDataURL(archivo );
          reader.onloadend = function () {
            document.getElementById("img").src = reader.result;
            
          }
        }
      }

      blancoYNegro(){
        
        var canvas = document.getElementById("canvas");
	    if (canvas && canvas.getContext) {
	    var ctx = canvas.getContext("2d");
	    if (ctx) {
		var srcImg = document.getElementById("img");
		ctx.drawImage(srcImg, 0, 0, ctx.canvas.width, ctx.canvas.height);
		var imgData = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height);
		var pixels = imgData.data;
		for (var i = 0; i < pixels.length; i += 4) {
		  var luminosidad = parseInt((pixels[i] + pixels[i + 1] + pixels[i + 2])/3);
		  pixels[i] = luminosidad;
		  pixels[i + 1] = luminosidad;
		  pixels[i + 2] = luminosidad;
		}
		ctx.putImageData(imgData, 0, 0);
	  }
	}
    }

}

var editor = new Editor();


