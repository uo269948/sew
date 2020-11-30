"use strict";

class Money {
    constructor(){
        var YOUR_ACCESS_KEY = '98f12dfc06a55ea20a6accd0cea8e1d5'
    }
loadDataCAD() {
  $.ajax({
    url: "http://data.fixer.io/api/latest?access_key=fa286b574a77b0e1425959f3b002c865",   
    dataType: 'jsonp',
    success: function(json) { 
      if(document.getElementById("cantidad").value==""){
        alert("introduce cantidad valida");
      }
      else{ 
      var cantidad = parseFloat(document.getElementById("cantidad").value);
      var result = parseFloat(json.rates.CAD)*cantidad
      $("#resultado").html(cantidad +" EUR = "+result + " CAD");
     
    }
  }
});
   
   

}

loadDataUSD() {
   
  $.ajax({
    url: "http://data.fixer.io/api/latest?access_key=fa286b574a77b0e1425959f3b002c865",   
    dataType: 'jsonp',
    success: function(json) {
      if(document.getElementById("cantidad").value==""){
        alert("introduce cantidad valida");
      }
      else{
      var cantidad = parseFloat(document.getElementById("cantidad").value);
     
      
      
      var result = parseFloat(json.rates.USD)*cantidad
      $("#resultado").html(cantidad +" EUR = "+result + " USD");
      }
        
        
    }

  });
}

loadDataPHP() {
   
  $.ajax({
    url: "http://data.fixer.io/api/latest?access_key=fa286b574a77b0e1425959f3b002c865",   
    dataType: 'jsonp',
    success: function(json) {
      if(document.getElementById("cantidad").value==""){
        alert("introduce cantidad valida");
      }
      else{
      var cantidad = parseFloat(document.getElementById("cantidad").value);
      var result = parseFloat(json.rates.PHP)*cantidad
      $("#resultado").html(cantidad +" EUR = "+result + " PHP");
        
      }
        
        
    }

  });
}
loadDataSGD() {
   
  $.ajax({
    url: "http://data.fixer.io/api/latest?access_key=fa286b574a77b0e1425959f3b002c865",   
    dataType: 'jsonp',
    success: function(json) {
      if(document.getElementById("cantidad").value==""){
        alert("introduce cantidad valida");
      }
      else{
      var cantidad = parseFloat(document.getElementById("cantidad").value);
      var result = parseFloat(json.rates.SGD)*cantidad
      $("#resultado").html(cantidad +" EUR = "+result + " SGD");
        
        
    }
  }

  });
}
loadDataZAR() {
   
  $.ajax({
    url: "http://data.fixer.io/api/latest?access_key=fa286b574a77b0e1425959f3b002c865",   
    dataType: 'jsonp',
    success: function(json) {
      if(document.getElementById("cantidad").value==""){
        alert("introduce cantidad valida");
      }
      else{
      var cantidad = parseFloat(document.getElementById("cantidad").value);
      var result = parseFloat(json.rates.ZAR)*cantidad
      $("#resultado").html(cantidad +" EUR = "+result + " ZAR");
      
      }
        
    }

  });
  
}
}
let money = new Money();