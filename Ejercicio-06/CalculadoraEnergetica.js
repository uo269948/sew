"use strict";

class Calculadora {
   
    constructor() {
        this.pot="";
        this.lecActu="";
        this.ultLec="";
        this.t="";
        this.con="";
        this.terPot="";
        this.terEne="";
        this.numDias="";
        this.impoPot ="";
        this.impoEne="";
        this.otrosI = "";
        this.iva="";
        this.totalFac="";
    }

    consumo() {

        var potencia = document.getElementById("potencia");
        this.pot=potencia.value;

        var lecturaActual = document.getElementById("lecturaActual");
        this.lecActu=lecturaActual.value;

        var tiempo = document.getElementById("tiempo");
        this.t = tiempo.value;

        var ultimaLectura=document.getElementById("ultimaLectura");
        this.ultLec = ultimaLectura.value;

        var consumoText = document.getElementById("consumoText");
        
        if(this.pot!="" && this.t!=""){
            this.con=this.pot*this.t;
            consumoText.value=this.con;
        }
        else if(this.lecActu!="" && this.ultLec!=""){
            this.con=this.lecActu-this.ultLec;
            consumoText.value=this.con;
        }
        else if(this.pot=="" || this.t==""){
            alert("El consumo se puede calcular con la potencia y el tiempo o con la lectura actual y la última. Porfavor, introduzca alguna de las dos opciones.");
        }
        else if(this.lecActu=="" || this.ultLec==""){
            alert("El consumo se puede calcular con la potencia y el tiempo o con la lectura actual y la última. Porfavor, introduzca alguna de las dos opciones.");
        }
        else{
            alert("Error a la hora de calcular  el consumo");
        }
        
    }

    importePotencia(){
        var potencia = document.getElementById("potencia");
        this.pot=potencia.value;

        var consumoText = document.getElementById("consumoText");
        this.con=consumoText.value;

        var terminoPotencia = document.getElementById("terminoPotencia"); 
        this.terPot = terminoPotencia.value;
        
        var terminoEnergia = document.getElementById("terminoEnergia"); 
        this.terEne = terminoEnergia.value;

        var numeroDias = document.getElementById("numeroDias"); 
        this.numDias = numeroDias.value;

        var importePotenciaText =  document.getElementById("importePotenciaText");
        

        if(this.pot!="" && this.terPot!=""&& this.numDias!=""){
            this.impoPot = this.pot*this.terPot*this.numDias;
            importePotenciaText.value=this.impoPot;
        }
        else if(this.pot==""){
            alert("Introduzca la potencia por favor");
        }
        else if(this.terPot==""){
            alert("Introduzca el termino de potencia por favor");
        }
        else if(this.numDias==""){
            alert("Introduzca el numero de días por favor");
        }
        else{
            alert("error");
        }

        
    }

    importeEnergia(){
        var consumoText = document.getElementById("consumoText");
        this.con=consumoText.value;

        var terminoEnergia = document.getElementById("terminoEnergia"); 
        this.terEne = terminoEnergia.value;

        var importeEnergiaText = document.getElementById("ImporteEnergiaText");

        if(this.con!="" && this.terEne!=""){
            this.impoEne=this.con*this.terEne;
            importeEnergiaText.value=this.impoEne;
        }
        else if(this.con==""){
            alert("Calcule el consumo primero por favor");
        }
        else if(this.terEne==""){
            alert("Introduzca el término de energía por favor");
        }
        else{
            alert("error");
        }
    }

    calcularIva(){
        var importePotenciaText =  document.getElementById("importePotenciaText");
        this.impoPot = importePotenciaText.value;
   
        var importeEnergiaText = document.getElementById("ImporteEnergiaText");
        this.impoEne = importeEnergiaText.value;

        var otrosText = document.getElementById("otrosText");
        this.otrosI= otrosText.value;

        var ivaText = document.getElementById("ivaText");
        

        if(this.impoPot!="" && this.impoEne!="" && this.otrosI!=""){
            this.iva = ((this.impoPot+this.impoEne+this.otrosI)*0.21);
            ivaText.value = this.iva;
        }
        else if (this.impoPot==""){
            alert("Calcule el importe de potencia primero por favor");
        }
        else if(this.impoEne==""){
            alert("Calcule el importe de energía primero por favor");
        }
        else if(this.otrosI==""){
            alert("Introduzca otros importes por favor");
        }
        else{
            alert("error");
        }
    }

    totalFactura(){
        var importePotenciaText =  document.getElementById("importePotenciaText");
        this.impoPot = importePotenciaText.value;
   
        var importeEnergiaText = document.getElementById("ImporteEnergiaText");
        this.impoEne = importeEnergiaText.value;

        var ivaText = document.getElementById("ivaText");
        this.iva = ivaText.value;

        var totalFactura = document.getElementById("totalFactura");
        if(this.impoPot!="" && this.impoEne!="" && this.iva!=""){
            this.totalFac = this.impoPot + this.impoEne + this.iva;
            totalFactura.value = this.totalFac;
        }
        else if (this.impoPot==""){
            alert("Calcule el importe de potencia primero por favor");
        }
        else if(this.impoEne==""){
            alert("Calcule el importe de energía primero por favor");
        }
        else if(this.iva==""){
            alert("Calcule el iva primero por favor");
        }
        else{
            alert("error");
        }

    }






 
}

var calculadora = new Calculadora();