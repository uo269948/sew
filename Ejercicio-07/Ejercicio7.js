"use strict";

class Elemento {
    constructor(etiqueta, id, valor) {
        this.etiqueta = etiqueta;
        this.id = id;
        this.valor = valor;
        this.visible = true;
    }
}

class Cambios {
    constructor() {
        this.lista = [];
    }
    
    mostrar(){
       
           
        $("#imagen4").show();
           
          
    }
    ocultar(){
        
        $("#imagen4").hide();
            
      
    }

    añadir(elemento) {
        this.lista.push(elemento);
        let cadena = "<" + elemento.etiqueta + " id='"
            + elemento.id + "'>" + elemento.valor + "</"
            + elemento.etiqueta + ">" +"<p>"+"</p>";
        $("#cambios").append(cadena);
       
    }

  


    modificar() {
        this.lista.valor = $("#contenido").val();
        $("#modificar").html(this.lista.valor);
        
    }

    agregar() {
        if (this.comprobacion()) {
            this.añadir(
                new Elemento($("#etiquetaAñadir").val(),
                    $("#IdAñadir").val(),
                    $("#ContenidoAñadir").val())
            );
        } else
            alert("Id repetido");
    }

    comprobacion() {
        let id = $("#IdAñadir").val();
        for (let i = 0; i < this.lista.length; i++) {
            if (this.lista[i].id === id)
                return false;
        }
        return true;
    }

    

    mostrarRecorrido() {
        let aMostrar = "";
        $("*", document.body).each(function () {
            let padreEtiqueta = $(this).parent().get(0).tagName;
            aMostrar += "Padre : " + padreEtiqueta + " elemento : "
                + $(this).get(0).tagName + " valor: " + $(this).text() + "<br>";
        });
        cambios.añadir(new Elemento("p", "dom", aMostrar));
    }
    ocultarRecorrido(){
        
        $("#dom").hide();
            
      
    }

    ocultarSuma(){
        
        $("#suma").hide();
            
      
    }
    sumar() {
        let result = 0;
        const filas = $("td");
        for (let i = 0; i < filas.length; i++) {
            result += parseFloat(filas[i].innerHTML);
        }
        let cad = "El resultado es " + result;
        cambios.añadir(new Elemento("p", "suma", cad));
    }
}

let cambios = new Cambios();