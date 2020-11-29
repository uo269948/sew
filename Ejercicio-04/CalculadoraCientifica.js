"use strict";

class Calculadora {
   
    constructor() {
        this.r =0;
        this.op=" ";
        this.numero="";
        this.conc="";
        this.operacion=0;
        this.igual=0;
        this.n=0.0;
        this.resultado=0;
        this.pot=0;
        this.numero1=0.0;
        this.numero2=0.0;
    }

    mostrar(digito) {
        if(this.pot==0){
        var pantalla = document.getElementById("pantalla");
        pantalla.value+=digito;
        this.numero+=digito;
        }
        else{
            var pantalla = document.getElementById("pantalla");
            if(pantalla.value==this.numero){
                this.numero1=this.numero;
                this.numero2=digito;
                this.numero = Math.pow(this.numero1,this.numero2);
                pantalla.value=this.numero;
                this.conc=pantalla.value;
                this.pot=0;
            }
            else{
            this.numero1=this.numero;
            this.numero2=digito;
            var pantalla = document.getElementById("pantalla");
            this.numero = Math.pow(this.numero1,this.numero2);
            pantalla.value=this.conc+this.numero;
            this.conc=pantalla.value;
            this.numero="";
            this.pot=0;
            }
            
        }
    }
    potencia(){
        this.pot=1;
    }

    suma(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.operacion==0){
            this.conc+=this.numero+"+";
            this.numero="";
            var pantalla = document.getElementById("pantalla");
            pantalla.value+="+";
            this.conc=pantalla.value;
            this.operacion=1;
        }
        else{
            this.conc+=this.numero;
            this.numero="";
            var pantalla = document.getElementById("pantalla");
            pantalla.value = eval(this.conc) + "+";
            this.operacion=1;
            this.conc=pantalla.value;
        }
        this.igual=0;
        
       
    }
    resta(){
        if(this.operacion==0){
            this.conc+=this.numero+"-";
            this.numero="";
            var pantalla = document.getElementById("pantalla");
            pantalla.value+="-";
            this.operacion=1;
        }
        else{
            this.conc+=this.numero;
            this.numero="";
            var pantalla = document.getElementById("pantalla");
            pantalla.value = eval(this.conc) + "-";
            this.operacion=1;
            this.conc=pantalla.value;
        }
        
        this.igual=0;
    }
    multi(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.operacion==0){
            this.conc+=this.numero+"*";
            this.numero="";
            var pantalla = document.getElementById("pantalla");
            pantalla.value+="*";
            this.operacion=1;
        }
        else{
            this.conc+=this.numero;
            this.numero="";
            var pantalla = document.getElementById("pantalla");
            pantalla.value = eval(this.conc) + "*";
            this.operacion=1;
            this.conc=pantalla.value;
        }
        
        this.igual=0;
    }
    div(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.operacion==0){
            this.conc+=this.numero+"/";
            this.numero="";
            var pantalla = document.getElementById("pantalla");
            pantalla.value+="/";
            this.operacion=1;
        }
        else{
            this.conc+=this.numero;
            this.numero="";
            var pantalla = document.getElementById("pantalla");
            pantalla.value = eval(this.conc) + "/";
            this.operacion=1;
            this.conc=pantalla.value;
        }
        
        this.igual=0;
    }
    potencia2(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.numero = Math.pow(this.numero, Number(2));
        this.conc+=this.numero;
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        
        }
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.pow(this.numero, Number(2));
            pantalla.value=this.conc;
            this.numero="";
            
        }
       
        
    }
    potencia10(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.pow(10, this.numero);
        this.numero=Math.pow(10, this.numero);
        pantalla.value=this.conc;
       
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        }
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.pow(10, this.numero);
            pantalla.value=this.conc;
            this.numero="";
            
        }
       
        
    }

    raiz(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.sqrt(this.numero);
        this.numero=Math.sqrt(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        }
       
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.sqrt(this.numero);
            pantalla.value=this.conc;
            this.numero="";
            
        }
    }
    log(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.log10(this.numero);
        this.numero=Math.log10(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        }
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.log10(this.numero);
            pantalla.value=this.conc;
            this.numero="";
            
        }
    }
    ln(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.log(this.numero);
        this.numero=Math.log(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        }
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.log(this.numero);
            pantalla.value=this.conc;
            this.numero="";
            
        }
    }
    sen(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.sin(this.numero);
        this.numero=Math.sin(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        }
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.sin(this.numero);
            pantalla.value=this.conc;
            this.numero="";
            
        }
    }
    cos(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.cos(this.numero);
        this.numero=Math.cos(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        }
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.cos(this.numero);
            pantalla.value=this.conc;
            this.numero="";
            
        }
    }
   tan(){
    var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.tan(this.numero);
        this.numero=Math.tan(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
    }
    else{
        this.numero=this.conc;
        var pantalla = document.getElementById("pantalla");
        this.conc=Math.tan(this.numero);
        pantalla.value=this.conc;
        this.numero="";
        
    }
    }
    asen(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.asin(this.numero);
        this.numero=Math.asin(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        }
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.asin(this.numero);
            pantalla.value=this.conc;
            this.numero="";
            
        }
    }
    acos(){
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.acos(this.numero);
        this.numero=Math.acos(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
        }
        else{
            this.numero=this.conc;
            var pantalla = document.getElementById("pantalla");
            this.conc=Math.acos(this.numero);
            pantalla.value=this.conc;
            this.numero="";
            
        }
    }
   atan(){
    var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=Math.atan(this.numero);
        this.numero=Math.atan(this.numero);
        pantalla.value=this.conc;
        if(this.numero==pantalla.value){
            this.igual=1;
            this.numero=pantalla.value;
        }
        else{
            this.numero="";
        }
    }
    else{
        this.numero=this.conc;
        var pantalla = document.getElementById("pantalla");
        this.conc=Math.atan(this.numero);
        pantalla.value=this.conc;
        this.numero="";
        
    }
    }
/*     cambiarSigno() {
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        var pantalla = document.getElementById("pantalla");
        this.conc+=this.numero*-1;
        pantalla.value=this.conc;
        this.numero="";
    }
    else{
        this.numero=this.conc;
        var pantalla = document.getElementById("pantalla");
        this.conc=this.numero*-1;
        pantalla.value=this.conc;
        this.numero="";
        
    }
        this.guardarPantalla();
        this.resultado *= -1;
        this.actualizar();
    } */
/*     
    factorial() {
        var pantalla = document.getElementById("pantalla");
        if(pantalla.value==""){
            alert("error");
        }
        else if(this.igual==0){
        this.n = this.numero;
        this.resultado=this.factorialRecursivo(this.n);
        pantalla.value=this.resultado;
        this.numero="";
        }
    else{
        this.numero=this.conc;
        var pantalla = document.getElementById("pantalla");
        this.n = this.numero;
        this.resultado=this.factorialRecursivo(this.n);
        pantalla.value=this.resultado;
        this.numero="";
        
    }
        */
        
  /*   }

    factorialRecursivo(nu) {
        try {
            if (nu === 0) {
                return 1;
            }
            return nu * this.factorialRecursivo(nu - 1);
        } catch (e) {
            return Infinity;
        }
    } */

    borrarPantalla() {
        var pantalla = document.getElementById("pantalla");
        pantalla.value = "";
        this.r =0;
        this.op=" ";
        this.numero="";
        this.conc="";
        this.operacion=0;
        this.igual=0;
        this.n=0.0;
        this.resultado=0;
        this.pot=0;
        this.numero1=0.0;
        this.numero2=0.0;

        
    }

    calcularResultado() {
        try {
            var pantalla = document.getElementById("pantalla");
            pantalla.value = eval(pantalla.value);
            this.conc=pantalla.value;
            this.numero="";
            this.igual=1;
        } catch (e) {
            alert('Operacion no correcta');
        }
    }

    




    limpiarPantalla() {
        var pantalla = document.getElementById("pantalla");
        pantalla.value = "";
        this.conc="";
        this.operacion=0;
        this.numero="";
    }


    cleanDisplayPartial() {
        var pantalla = document.getElementById("pantalla");
        pantalla.value = pantalla.value.substring(0, pantalla.value.length - 1);
        this.conc=pantalla.value;
        this.operacion=0;
        this.numero="";
    }



 
}

var calculadora = new Calculadora();