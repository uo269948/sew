"use strict";

class ApiFile {
    constructor() {
        const cabecera = $('#cabecera');
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            cabecera.append("<p>Este navegador soporta el API File </p>");
        } else {
            const texto = $('#texto');
            texto.empty();
            cabecera.append("<p>Este navegador soporta el API File </p>");
        }
        this.files = [];
    }

    processFiles() {
        this.files = $('#files')[0].files;
        $('#result').empty();
        this.mostrarNumeroArchivos();
        this.calcularTamañoArchivos();
        this.mostrarLista();
    }

    mostrarNumeroArchivos() {
        $("#result").append("<p>Ficheros introducidos: " + this.files.length + "</p>");
    }

    calcularTamañoArchivos() {
        let numeroBytes = 0;
        for (let i = 0; i < this.files.length; i++) {
            numeroBytes += this.files[i].size;
        }
        $("#result").append("<p>Tamaño total: " + numeroBytes + " bytes </p>");
    }

    mostrarLista() {
        let contentido = '';
        contentido += "<h2>Ficheros seleccionados</h2>";
        contentido +="<section id='listFile'>";
        for (let i = 0; i < this.files.length; i++) {
            this.mostrarContenido(this.files[i]);
        }
        contentido += "</section>";
        $("#result").append(contentido)
    }

    mostrarContenido(file) {
        const reader = new FileReader();
        reader.onload = () => {
            this.mostrarDetalles(file, reader.result);
        };
        reader.readAsText(file, "UTF-8");
    }

    mostrarDetalles(file, contentido) {
        contentido = this.convertirXML(contentido);
        let details = "<h3>"+file.name+"</h3>";
        details += "<table id='table'>";
        details += "<tr><td>Ejemplo</td><td>" + file.name+"</td></tr>";
        details += "<tr><td>Tamaño: </td><td>" + file.size + " bytes</td></tr>";
        details += "<tr><td>Tipo: </td><td>" + file.type + "</td></tr>";
        details += "<tr><td>Ultima modificacion: </td><td>" + file.lastModifiedDate + "</td></tr>";
        details += "</table>";
        details += "<article><p>Contenido " + file.name+":<pre>" + contentido + "</pre></p></article>";
        details += "<p> </p>";
        $("#listFile").append(details);
    }

    convertirXML(contentido) {
        contentido = String(contentido).replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
        return contentido;
    }
}

const apiFile = new ApiFile();