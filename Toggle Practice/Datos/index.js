function descargarArchivo(contenidoEnBlob, nombreArchivo) {
    var reader = new FileReader();
    reader.onload = function (event) {
        var save = document.createElement('a');
        save.href = event.target.result;
        save.target = '_blank';
        save.download = nombreArchivo || 'archivo.dat';
        var clicEvent = new MouseEvent('click', {
            'view': window,
                'bubbles': true,
                'cancelable': true
        });
        save.dispatchEvent(clicEvent);
        (window.URL || window.webkitURL).revokeObjectURL(save.href);
    };
    reader.readAsDataURL(contenidoEnBlob);
}

//Función de ayuda: reúne los datos a exportar en un solo objeto
function obtenerDatos() {
    return {
        nombre: document.getElementById("Nombre").value,
        apellidoP: document.getElementById("ApPaterno").value,
        apellidoM: document.getElementById("ApMaterno").value,
        address: document.getElementById("Address").value,
        genero: document.getElementById("Sexo").value
    };
}

//Función de ayuda: "escapa" las entidades XML necesarias
//para los valores (y atributos) del archivo XML
function escaparXML(cadena) {
    if (typeof cadena !== 'string') {
        return '';
    };
    cadena = cadena.replace('&', '&amp;')
        .replace('<', '&lt;')
        .replace('>', '&gt;')
        .replace('"', '&quot;');
    return cadena;
};

//Genera un objeto Blob con los datos en un archivo XML
function generarXml(datos) {
    var texto = [];
    texto.push('<?xml version="1.0" encoding="UTF-8" ?>\n');
    texto.push('<datos>\n');
    texto.push('\t<nombre>');
    texto.push(escaparXML(datos.nombre));
    texto.push('</nombre>\n');    
    texto.push('\t<ApellidoPaterno>');
    texto.push(escaparXML(datos.apellidoP));
    texto.push('</ApellidoPaterno>\n');
    texto.push('\t<ApellidoMaterno>');
    texto.push(escaparXML(datos.apellidoM));
    texto.push('</ApellidoMaterno>\n');
    texto.push('\t<Address>');
    texto.push(escaparXML(datos.address));
    texto.push('</Address>\n');
    texto.push('\t<Genero>');
    texto.push(escaparXML(datos.genero));
    texto.push('</Genero>\n');
    //No olvidemos especificar el tipo MIME correcto :)
    return new Blob(texto, {
        type: 'application/xml'
    });
};

function DescargarXML() {
    var datos = obtenerDatos();
    descargarArchivo(generarXml(datos), 'archivo.xml');
}


function Mode() {
    if (document.querySelector("#body.body.dark"))
    {
        $("#body").removeClass("dark");
        $("#switch").removeClass("active");
        $("#boton-xml").addClass("btn-success");
        $("#boton-xml").removeClass("btn-warning");
        $(".box").addClass("dark");
    }
    else{
        $("#body").addClass("dark");
        $("#switch").addClass("active");
        $("#boton-xml").removeClass("btn-success");
        $("#boton-xml").addClass("btn-warning");
        $(".box").removeClass("dark");
    }
}

/*function Mode() {
    if (document.querySelector("#cuerpo.dark"))
    {
        $("#cuerpo").removeClass("dark");
        $("#switch").removeClass("active");
        $("#boton-xml").addClass("btn-success");
        $("#boton-xml").removeClass("btn-warning");
        $(".box").addClass("dark");
    }
    else{
        $("#cuerpo").addClass("dark");
        $("#switch").addClass("active");
        $("#boton-xml").removeClass("btn-success");
        $("#boton-xml").addClass("btn-warning");
        $(".box").removeClass("dark");
    }
}*/