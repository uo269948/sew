"use strict";

class Calculadora {
    constructor() {
        this.memoria = 0;
        this.r =0;
    }

    mostrar(digito) {
        var pantalla = document.getElementById("pantalla");
        
        if (pantalla.value === '0') {
            pantalla.value = digito;
        }
        else if(this.r == 1){
            pantalla.value += digito;
           this.r=0;
        }
        
        else {
            pantalla.value += digito;
        }
    }

    sumarAMemoria() {
        try {
            var pantalla = document.getElementById("pantalla");
            this.memoria += eval(pantalla.value);
            this.borrarPantalla();
        } catch (e) {
            alert('Operacion no correcta')
        }
    }

    restarAMemoria() {
        try {
            var pantalla = document.getElementById("pantalla");
            this.memoria -= eval(pantalla.value);
            this.borrarPantalla();
        } catch (e) {
            alert('Operacion no correcta')
        }
    }

    mostrarMemoria() {
        var pantalla = document.getElementById("pantalla");
        pantalla.value += this.memoria;
        this.memoria = 0;
        this.r =1;
    }

    borrarPantalla() {
        var pantalla = document.getElementById("pantalla");
        pantalla.value = "0";
    }

    resultado() {
        try {
            
            var pantalla = document.getElementById("pantalla");
            pantalla.value = eval(pantalla.value);
           
            
        } catch (e) {
            alert('Operacion no correcta');
        }
        
    }

    
}

var calculadora = new Calculadora();