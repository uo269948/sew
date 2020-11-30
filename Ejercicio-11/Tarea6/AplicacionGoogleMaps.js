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
        this.map = new Map();
        $.ajax({
            dataType: "json",
            url: this.url,
            method: 'GET',
            success: (datos) => {
                let div = $("posada");
                div.prepend("<p>" + JSON.stringify(datos, null, 2) + "</p>");
                div.prepend("<h3>JSON recibido</h3>");
                this.map.set("Ciudad", datos.name);
                this.map.set("Pais", datos.sys.country);
                this.map.set("Latitud", datos.coord.lat);
                this.map.set("Temperatura", datos.main.temp + " ºC");
                this.map.set("Temperatura máxima", datos.main.temp_max + " ºC");
                this.map.set("Temperatura mínima", datos.main.temp_min + " ºC");
                this.map.set("Presión", datos.main.pressure + " milibares");
                this.map.set("Humedad", datos.main.humidity + " %");
                this.map.set("Amanece", new Date(datos.sys.sunrise * 1000).toLocaleTimeString());
                this.map.set("Oscurece", new Date(datos.sys.sunset * 1000).toLocaleTimeString());
                this.map.set("Direccion del viento", datos.wind.deg + "º");
                this.map.set("Velocidad del viento", datos.wind.speed + " m/s");
                this.map.set("Hora", new Date(datos.dt * 1000).toLocaleTimeString());
                this.map.set("Fecha", new Date(datos.dt * 1000).toLocaleDateString());
                this.map.set("Descripción", datos.weather[0].description);
                this.map.set("Visibilidad", datos.visibility + " m");
                this.map.set("Nubosidad", datos.clouds.all);

                div.append("<table>");
                this.addTable();
                div.append("</table>");
                div.append('<div id="icon"><img id="wicon" src="" alt="Weather icon"></div>');
                var iconcode = datos.weather[0].icon;
                var iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
                $('#wicon').attr('src', iconurl);
            },
            error: function () {
                alert("Error al obtener JSON de OpenWeatherMap");
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
        this.map = new Map();
        $.ajax({
            dataType: "json",
            url: this.url,
            method: 'GET',
            success: (datos) => {
                let div = $("cangas");
                div.prepend("<p>" + JSON.stringify(datos, null, 2) + "</p>");
                div.prepend("<h3>JSON recibido</h3>");
                this.map.set("Ciudad", datos.name);
                this.map.set("Pais", datos.sys.country);
                this.map.set("Latitud", datos.coord.lat);
                this.map.set("Temperatura", datos.main.temp + " ºC");
                this.map.set("Temperatura máxima", datos.main.temp_max + " ºC");
                this.map.set("Temperatura mínima", datos.main.temp_min + " ºC");
                this.map.set("Presión", datos.main.pressure + " milibares");
                this.map.set("Humedad", datos.main.humidity + " %");
                this.map.set("Amanece", new Date(datos.sys.sunrise * 1000).toLocaleTimeString());
                this.map.set("Oscurece", new Date(datos.sys.sunset * 1000).toLocaleTimeString());
                this.map.set("Direccion del viento", datos.wind.deg + "º");
                this.map.set("Velocidad del viento", datos.wind.speed + " m/s");
                this.map.set("Hora", new Date(datos.dt * 1000).toLocaleTimeString());
                this.map.set("Fecha", new Date(datos.dt * 1000).toLocaleDateString());
                this.map.set("Descripción", datos.weather[0].description);
                this.map.set("Visibilidad", datos.visibility + " m");
                this.map.set("Nubosidad", datos.clouds.all);
                div.append("<table>");
                this.addTable();
                div.append("</table>");
                div.append('<div id="icon"><img id="wicon" src="" alt="Weather icon"></div>');
                var iconcode = datos.weather[0].icon;
                var iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
                $('#wicon').attr('src', iconurl);
                
            },
            error: function () {
                alert("¡Tenemos problemas! No puedo obtener JSON de OpenWeatherMap");
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
        this.map = new Map();
        $.ajax({
            dataType: "json",
            url: this.url,
            method: 'GET',
            success: (datos) => {
                let div = $("oseja");
                div.prepend("<p>" + JSON.stringify(datos, null, 2) + "</p>");
                div.prepend("<h3>JSON recibido</h3>");
                this.map.set("Ciudad", datos.name);
                this.map.set("Pais", datos.sys.country);
                this.map.set("Latitud", datos.coord.lat);
                this.map.set("Temperatura", datos.main.temp + " ºC");
                this.map.set("Temperatura máxima", datos.main.temp_max + " ºC");
                this.map.set("Temperatura mínima", datos.main.temp_min + " ºC");
                this.map.set("Presión", datos.main.pressure + " milibares");
                this.map.set("Humedad", datos.main.humidity + " %");
                this.map.set("Amanece", new Date(datos.sys.sunrise * 1000).toLocaleTimeString());
                this.map.set("Oscurece", new Date(datos.sys.sunset * 1000).toLocaleTimeString());
                this.map.set("Direccion del viento", datos.wind.deg + "º");
                this.map.set("Velocidad del viento", datos.wind.speed + " m/s");
                this.map.set("Hora", new Date(datos.dt * 1000).toLocaleTimeString());
                this.map.set("Fecha", new Date(datos.dt * 1000).toLocaleDateString());
                this.map.set("Descripción", datos.weather[0].description);
                this.map.set("Visibilidad", datos.visibility + " m");
                this.map.set("Nubosidad", datos.clouds.all);
                
                div.append("<table>");
                this.addTable();
                div.append("</table>");
                div.append('<div id="icon"><img id="wicon" src="" alt="Weather icon"></div>');
                var iconcode = datos.weather[0].icon;
                var iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
                $('#wicon').attr('src', iconurl);
            },
            error: function () {
                alert("¡Tenemos problemas! No puedo obtener JSON de OpenWeatherMap");
            }
        });
    }

    showDataOsejaDeSajambre() {
        let div = $("oseja");
        div.empty();
        this.loadDataOsejaDeSajambre();
        
    }

    showDataPosadaDeValdeon() {
        let div = $("posada");
        div.empty();
        this.loadDataPosadaDeValdeon();
    }
    showDataCangasDeOnis() {
        let div = $("cangas");
        div.empty();
        this.loadDataCangasDeOnis();
    }

    addTable() {
        let keys = Array.from(this.map.keys());
        let table = $("table");
        table.append("<th scope=\"col\" id=\"parametro\">Parámetro</th>");
        table.append("<th scope=\"col\" id=\"valor\">Valor</th>");
        for (let param in keys) {
            table.append("<tr>");
            table.append("<td headers=\"col\">" + keys[param] + "</td>");
            table.append("<td headers=\"col\">" + this.map.get(keys[param]) + "</td>");
            table.append("</tr>");
        }

    }
}

let weather = new Weather();