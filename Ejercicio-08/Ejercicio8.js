"use strict";

class Weather {
    constructor() {
        
    }

    loadDataPosadaDeValdeon() {
        this.apikey = "40b4bfe4d6bc08937b655d29dcd813e7";
        this.ciudad = "Posada de Valdeón";
        this.codigoPais = "ES";
        this.unidades = "&units=metric";
        this.idioma = "&lang=es";
        this.url = "http://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais
            + this.unidades + this.idioma + "&APPID=" + this.apikey;
            $.ajax({
                dataType: "json",
                url: this.url,
                method: 'GET',
                success: function(datos){
                    $("pre").text(JSON.stringify(datos, null, 2));
                   
                    
                    var stringDatos = "<h2>" +datos.name + "<img src='https://openweathermap.org/img/w/" + datos.weather[0].icon + ".png' alt='Weather icon'>" +"</h2>";
                            stringDatos += "<table><thead><tr><th>Datos</th><th>Valores</th></tr></thead>"
                            stringDatos += "<tbody>"
                            stringDatos += "<tr><td>Pai­s: </td><td>" + datos.sys.country + "</td></tr>";
                            stringDatos += "<tr><td>Latitud: </td><td>" + datos.coord.lat + " grados</td></tr>";
                            stringDatos += "<tr><td>Longitud: </td><td>" + datos.coord.lon + " grados</td></tr>";
                            stringDatos += "<tr><td>Temperatura: </td><td>" + datos.main.temp + " grados Celsius</td></tr>";
                            stringDatos += "<tr><td>Temperatura maxima: </td><td>" + datos.main.temp_max + " grados Celsius</td></tr>";
                            stringDatos += "<tr><td>Temperatura mi­nima: </td><td>" + datos.main.temp_min + " grados Celsius</td></tr>";
                            stringDatos += "<tr><td>Presion: </td><td>" + datos.main.pressure + " milibares</td></tr>";
                            stringDatos += "<tr><td>Humedad: </td><td>" + datos.main.humidity + " %</td></tr>";
                            stringDatos += "<tr><td>Amanece a las: </td><td>" + new Date(datos.sys.sunrise *1000).toLocaleTimeString() + "</td></tr>";
                            stringDatos += "<tr><td>Oscurece a las: </td><td>" + new Date(datos.sys.sunset *1000).toLocaleTimeString() + "</td></tr>";
                            stringDatos += "<tr><td>Direccion del viento: </td><td>" + datos.wind.deg + " grados</td></tr>";
                            stringDatos += "<tr><td>Velocidad del viento: </td><td>" + datos.wind.speed + " metros/segundo</td></tr>";
                            stringDatos += "<tr><td>Hora de la medida: </td><td>" + new Date(datos.dt *1000).toLocaleTimeString() + "</td></tr>";
                            stringDatos += "<tr><td>Fecha de la medida: </td><td>" + new Date(datos.dt *1000).toLocaleDateString() + "</td></tr>";
                            stringDatos += "<tr><td>Descripcion: </td><td>" + datos.weather[0].description + "</td></tr>";
                            stringDatos += "<tr><td>Visibilidad: </td><td>" + datos.visibility + " metros</td></tr>";
                            stringDatos += "<tr><td>Nubosidad: </td><td>" + datos.clouds.all + " %</td></tr></table>";
                    
                    $("div").html(stringDatos);
                   
                },
            error:function(){
                $("h3").html("Â¡Tenemos problemas! No puedo obtener JSON de <a href='http://openweathermap.org'>OpenWeatherMap</a>"); 
                $("h2").remove();
                $("pre").remove();
                
                }
        });
    }

    loadDataCangasDeOnis() {
        this.apikey = "40b4bfe4d6bc08937b655d29dcd813e7";
        this.ciudad = "Cangas de Onís";
        this.codigoPais = "ES";
        this.unidades = "&units=metric";
        this.idioma = "&lang=es";
        this.url = "http://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais
            + this.unidades + this.idioma + "&APPID=" + this.apikey;
            $.ajax({
                dataType: "json",
                url: this.url,
                method: 'GET',
                success: function(datos){
                    $("pre").text(JSON.stringify(datos, null, 2));
                   
                    
                    var stringDatos = "<h2>" +datos.name + "<img src='https://openweathermap.org/img/w/" + datos.weather[0].icon + ".png' alt='Weather icon'>" +"</h2>";
                            stringDatos += "<table><thead><tr><th>Datos</th><th>Valores</th></tr></thead>"
                            stringDatos += "<tbody>"
                            stringDatos += "<tr><td>Pai­s: </td><td>" + datos.sys.country + "</td></tr>";
                            stringDatos += "<tr><td>Latitud: </td><td>" + datos.coord.lat + " grados</td></tr>";
                            stringDatos += "<tr><td>Longitud: </td><td>" + datos.coord.lon + " grados</td></tr>";
                            stringDatos += "<tr><td>Temperatura: </td><td>" + datos.main.temp + " grados Celsius</td></tr>";
                            stringDatos += "<tr><td>Temperatura maxima: </td><td>" + datos.main.temp_max + " grados Celsius</td></tr>";
                            stringDatos += "<tr><td>Temperatura mi­nima: </td><td>" + datos.main.temp_min + " grados Celsius</td></tr>";
                            stringDatos += "<tr><td>Presion: </td><td>" + datos.main.pressure + " milibares</td></tr>";
                            stringDatos += "<tr><td>Humedad: </td><td>" + datos.main.humidity + " %</td></tr>";
                            stringDatos += "<tr><td>Amanece a las: </td><td>" + new Date(datos.sys.sunrise *1000).toLocaleTimeString() + "</td></tr>";
                            stringDatos += "<tr><td>Oscurece a las: </td><td>" + new Date(datos.sys.sunset *1000).toLocaleTimeString() + "</td></tr>";
                            stringDatos += "<tr><td>Direccion del viento: </td><td>" + datos.wind.deg + " grados</td></tr>";
                            stringDatos += "<tr><td>Velocidad del viento: </td><td>" + datos.wind.speed + " metros/segundo</td></tr>";
                            stringDatos += "<tr><td>Hora de la medida: </td><td>" + new Date(datos.dt *1000).toLocaleTimeString() + "</td></tr>";
                            stringDatos += "<tr><td>Fecha de la medida: </td><td>" + new Date(datos.dt *1000).toLocaleDateString() + "</td></tr>";
                            stringDatos += "<tr><td>Descripcion: </td><td>" + datos.weather[0].description + "</td></tr>";
                            stringDatos += "<tr><td>Visibilidad: </td><td>" + datos.visibility + " metros</td></tr>";
                            stringDatos += "<tr><td>Nubosidad: </td><td>" + datos.clouds.all + " %</td></tr></table>";
                    
                    $("div").html(stringDatos);
                   
                },
            error:function(){
                $("h3").html("Â¡Tenemos problemas! No puedo obtener JSON de <a href='http://openweathermap.org'>OpenWeatherMap</a>"); 
                $("h2").remove();
                $("pre").remove();
                
                }
        });
    }
    loadDataOsejaDeSajambre() {
        this.apikey = "40b4bfe4d6bc08937b655d29dcd813e7";
        this.ciudad = "Oseja de Sajambre";
        this.codigoPais = "ES";
        this.unidades = "&units=metric";
        this.idioma = "&lang=es";
        this.url = "http://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais
            + this.unidades + this.idioma + "&APPID=" + this.apikey;
        $.ajax({
            dataType: "json",
            url: this.url,
            method: 'GET',
            success: function(datos){
                $("pre").text(JSON.stringify(datos, null, 2));
               
                
                var stringDatos = "<h2>" +datos.name + "<img src='https://openweathermap.org/img/w/" + datos.weather[0].icon + ".png' alt='Weather icon'>" +"</h2>";
						stringDatos += "<table><thead><tr><th>Datos</th><th>Valores</th></tr></thead>"
						stringDatos += "<tbody>"
                        stringDatos += "<tr><td>Pai­s: </td><td>" + datos.sys.country + "</td></tr>";
                        stringDatos += "<tr><td>Latitud: </td><td>" + datos.coord.lat + " grados</td></tr>";
                        stringDatos += "<tr><td>Longitud: </td><td>" + datos.coord.lon + " grados</td></tr>";
                        stringDatos += "<tr><td>Temperatura: </td><td>" + datos.main.temp + " grados Celsius</td></tr>";
                        stringDatos += "<tr><td>Temperatura maxima: </td><td>" + datos.main.temp_max + " grados Celsius</td></tr>";
                        stringDatos += "<tr><td>Temperatura mi­nima: </td><td>" + datos.main.temp_min + " grados Celsius</td></tr>";
                        stringDatos += "<tr><td>Presion: </td><td>" + datos.main.pressure + " milibares</td></tr>";
                        stringDatos += "<tr><td>Humedad: </td><td>" + datos.main.humidity + " %</td></tr>";
                        stringDatos += "<tr><td>Amanece a las: </td><td>" + new Date(datos.sys.sunrise *1000).toLocaleTimeString() + "</td></tr>";
                        stringDatos += "<tr><td>Oscurece a las: </td><td>" + new Date(datos.sys.sunset *1000).toLocaleTimeString() + "</td></tr>";
                        stringDatos += "<tr><td>Direccion del viento: </td><td>" + datos.wind.deg + " grados</td></tr>";
                        stringDatos += "<tr><td>Velocidad del viento: </td><td>" + datos.wind.speed + " metros/segundo</td></tr>";
                        stringDatos += "<tr><td>Hora de la medida: </td><td>" + new Date(datos.dt *1000).toLocaleTimeString() + "</td></tr>";
                        stringDatos += "<tr><td>Fecha de la medida: </td><td>" + new Date(datos.dt *1000).toLocaleDateString() + "</td></tr>";
                        stringDatos += "<tr><td>Descripcion: </td><td>" + datos.weather[0].description + "</td></tr>";
                        stringDatos += "<tr><td>Visibilidad: </td><td>" + datos.visibility + " metros</td></tr>";
                        stringDatos += "<tr><td>Nubosidad: </td><td>" + datos.clouds.all + " %</td></tr></table>";
                
                $("div").html(stringDatos);
               
            },
        error:function(){
            $("h3").html("Â¡Tenemos problemas! No puedo obtener JSON de <a href='http://openweathermap.org'>OpenWeatherMap</a>"); 
            $("h2").remove();
            $("pre").remove();
            
            }
    });

    }

    showDataOsejaDeSajambre() {
        let div = $("div");
        div.empty();
        this.loadDataOsejaDeSajambre();
        
    }

    showDataPosadaDeValdeon() {
        let div = $("div");
        div.empty();
        this.loadDataPosadaDeValdeon();
    }
    showDataCangasDeOnis() {
        let div = $("div");
        div.empty();
        this.loadDataCangasDeOnis();
    }

    
}

let weather = new Weather();





