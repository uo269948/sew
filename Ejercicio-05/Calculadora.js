"use strict";

class CalculatorPolish {
    constructor() {
        this.stack = [];
        this.operationDone = false;
        this.lastButtonPressed=null;
        this.r=0;
        this.punto=0;
        this.conc="";
        this.tri="";
       this.e=0;
       this.numeroEnPila=0;
       this.d=0;
    }

    display(digit) {
       
        let display = document.getElementById("pantalla");
        if(this.d==0){
            this.conc="";
            this.e=0;
            display.value+=digit;
            this.conc+= digit;
            this.numeroEnPila=0;
            this.d=1;
        }
        else{
            this.conc+=digit;
            display.value+=digit;
            this.e=0;
            this.numeroEnPila=0;
            this.d=1;
        }

    }
    operationAddNumber(number) {
        if (Number.isNaN(number)) {
            alert('no es un digito');
        } else {
            this.stack.push(number);
            let display = document.getElementById("pantalla");
            display.value="";
            var stringDisplay="";
            for(this.i=0;this.i<this.stack.length;this.i++){
                stringDisplay+= this.stack[this.i]+ "\n";
                
            }
            display.value =(stringDisplay);
            
        }
    }

    enter() {
        this.d=0;
        this.e=1;
        this.operationAddNumber(this.conc);
        this.numeroEnPila=1;
    }

    operationAdd() {
        if(this.stack.length<1){
            alert("error");
        }
        else if(this.stack.length==1 && this.conc==""){
            alert(error);
        }
        else if(this.numeroEnPila==0){
            let display = document.getElementById("pantalla");
            const arriba = this.stack.pop();
            const abajo = this.conc;
            const result = parseFloat(abajo) + parseFloat(arriba);
            this.conc=result;
            this.stack.push(result);
            display.value="";
            var stringDisplay="";
            for(this.i=0;this.i<this.stack.length;this.i++){
               stringDisplay+= this.stack[this.i]+ "\n";
               
            }
            display.value =(stringDisplay);
            this.e=1;
            this.numeroEnPila=1;
            this.d=0;
        }
        else if(this.numeroEnPila==1){
           let display = document.getElementById("pantalla");
           
           const abajo = this.stack.pop();
           const arriba = this.stack.pop();
           const result = parseFloat(arriba) + parseFloat(abajo);
           this.conc=result;
           this.stack.push(result);
           
           
           display.value="";
           var stringDisplay="";
           for(this.i=0;this.i<this.stack.length;this.i++){
               stringDisplay+= this.stack[this.i]+ "\n";   
           }
           display.value =(stringDisplay);
           this.e=0;
           this.d=0;
        }
        else{
            alert(error);
        }
            
            
    }

    operationMinus() {
        
        if(this.stack.length<1){
            alert("error");
        }
        else if(this.stack.length==1 && this.conc==""){
            alert(error);
        }
        else if(this.numeroEnPila==0){
            let display = document.getElementById("pantalla");
            const arriba = this.stack.pop();
            const abajo = this.conc;
            const result = parseFloat(arriba) - parseFloat(abajo);
            this.conc=result;
            this.stack.push(result);
            display.value="";
            var stringDisplay="";
            for(this.i=0;this.i<this.stack.length;this.i++){
               stringDisplay+= this.stack[this.i]+ "\n";
               
            }
            display.value =(stringDisplay);
            this.e=1;
            this.numeroEnPila=1;
        }
        else if(this.numeroEnPila==1){
           let display = document.getElementById("pantalla");
           
           const abajo = this.stack.pop();
           const arriba = this.stack.pop();
           const result = parseFloat(arriba) - parseFloat(abajo);
           this.conc=result;
           this.stack.push(result);
           
           
           display.value="";
           var stringDisplay="";
           for(this.i=0;this.i<this.stack.length;this.i++){
               stringDisplay+= this.stack[this.i]+ "\n";   
           }
           display.value =(stringDisplay);
           this.e=0;
        }
        else{
            alert(error);
        }
    }
    operationMul() {
        
        if(this.stack.length<1){
            alert("error");
        }
        else if(this.stack.length==1 && this.conc==""){
            alert(error);
        }
        else if(this.numeroEnPila==0){
            let display = document.getElementById("pantalla");
            const arriba = this.stack.pop();
            const abajo = this.conc;
            const result = parseFloat(arriba) * parseFloat(abajo);
            this.conc=result;
            this.stack.push(result);
            display.value="";
            var stringDisplay="";
            for(this.i=0;this.i<this.stack.length;this.i++){
               stringDisplay+= this.stack[this.i]+ "\n";
               
            }
            display.value =(stringDisplay);
            this.e=1;
            this.numeroEnPila=1;
        }
        else if(this.numeroEnPila==1){
           let display = document.getElementById("pantalla");
           
           const abajo = this.stack.pop();
           const arriba = this.stack.pop();
           const result = parseFloat(arriba) * parseFloat(abajo);
           this.conc=result;
           this.stack.push(result);
           
           
           display.value="";
           var stringDisplay="";
           for(this.i=0;this.i<this.stack.length;this.i++){
               stringDisplay+= this.stack[this.i]+ "\n";   
           }
           display.value =(stringDisplay);
           this.e=0;
        }
        else{
            alert(error);
        }
    }
    operationDiv() {
        
        if(this.stack.length<1){
            alert("error");
        }
        else if(this.stack.length==1 && this.conc==""){
            alert(error);
        }
        else if(this.numeroEnPila==0){
            let display = document.getElementById("pantalla");
            const arriba = this.stack.pop();
            const abajo = this.conc;
            const result = parseFloat(arriba) / parseFloat(abajo);
            this.conc=result;
            this.stack.push(result);
            display.value="";
            var stringDisplay="";
            for(this.i=0;this.i<this.stack.length;this.i++){
               stringDisplay+= this.stack[this.i]+ "\n";
               
            }
            display.value =(stringDisplay);
            this.e=1;
            this.numeroEnPila=1;
        }
        else if(this.numeroEnPila==1){
           let display = document.getElementById("pantalla");
           
           const abajo = this.stack.pop();
           const arriba = this.stack.pop();
           const result = parseFloat(arriba) / parseFloat(abajo);
           this.conc=result;
           this.stack.push(result);
           
           
           display.value="";
           var stringDisplay="";
           for(this.i=0;this.i<this.stack.length;this.i++){
               stringDisplay+= this.stack[this.i]+ "\n";   
           }
           display.value =(stringDisplay);
           this.e=0;
        }
        else{
            alert(error);
        }
    }

    seno(){
        if(this.numeroEnPila==1){
            let display = document.getElementById("pantalla");
            
                const ultima = this.stack.pop();
                const result = Math.sin(ultima);
                this.conc=result;
                
                this.stack.push(result);
                display.value="";
                    var stringDisplay="";
                    for(this.i=0;this.i<this.stack.length;this.i++){
                        stringDisplay+= this.stack[this.i]+ "\n";
                        
                    }
                    display.value =(stringDisplay);
                this.e=1;
                this.numeroEnPila=1;
        }
        else{
            let display = document.getElementById("pantalla");
                
                const ultima = this.conc;
                const result = Math.sin(ultima);
                this.conc=result;
                
                this.stack.push(result);
                
                
            display.value="";
                var stringDisplay="";
                for(this.i=0;this.i<this.stack.length;this.i++){
                    stringDisplay+= this.stack[this.i]+ "\n";
                    
                }
                display.value =(stringDisplay);
            this.e=1;
            this.numeroEnPila=1;
        }
            
    }
   

   
   
coseno(){
            
    if(this.numeroEnPila==1){
        let display = document.getElementById("pantalla");
        
            const ultima = this.stack.pop();
            const result = Math.cos(ultima);
            this.conc=result;
            
            this.stack.push(result);
            display.value="";
                var stringDisplay="";
                for(this.i=0;this.i<this.stack.length;this.i++){
                    stringDisplay+= this.stack[this.i]+ "\n";
                    
                }
                display.value =(stringDisplay);
            this.e=1;
            this.numeroEnPila=1;
    }
    else{
        let display = document.getElementById("pantalla");
            
            const ultima = this.conc;
            const result = Math.cos(ultima);
            this.conc=result;
            
            this.stack.push(result);
            
            
        display.value="";
            var stringDisplay="";
            for(this.i=0;this.i<this.stack.length;this.i++){
                stringDisplay+= this.stack[this.i]+ "\n";
                
            }
            display.value =(stringDisplay);
        this.e=1;
        this.numeroEnPila=1;
    }
}
tan(){
            
    if(this.numeroEnPila==1){
        let display = document.getElementById("pantalla");
        
            const ultima = this.stack.pop();
            const result = Math.tan(ultima);
            this.conc=result;
            
            this.stack.push(result);
            display.value="";
                var stringDisplay="";
                for(this.i=0;this.i<this.stack.length;this.i++){
                    stringDisplay+= this.stack[this.i]+ "\n";
                    
                }
                display.value =(stringDisplay);
            this.e=1;
            this.numeroEnPila=1;
    }
    else{
        let display = document.getElementById("pantalla");
            
            const ultima = this.conc;
            const result = Math.tan(ultima);
            this.conc=result;
            
            this.stack.push(result);
            
            
        display.value="";
            var stringDisplay="";
            for(this.i=0;this.i<this.stack.length;this.i++){
                stringDisplay+= this.stack[this.i]+ "\n";
                
            }
            display.value =(stringDisplay);
        this.e=1;
        this.numeroEnPila=1;
    }


}

    clean() {
        this.stack = [];
        document.getElementById("pantalla").value = "";
       
    }
}

let calculator = new CalculatorPolish();