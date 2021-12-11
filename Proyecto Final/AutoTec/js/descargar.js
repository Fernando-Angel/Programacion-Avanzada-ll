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
        nombre: document.getElementById("nombre").value,
        apellido: document.getElementById("apellido").value,
        correo: document.getElementById("email").value,
        contraseña: document.getElementById("password").value,
        password: document.getElementById("password2").value,
        telefono: document.getElementById("telefono").value,
        codigo: document.getElementById("codigo").value,
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
    texto.push('\t<Apellido>');
    texto.push(escaparXML(datos.apellido));
    texto.push('</Apellido>\n');
    texto.push('\t<correo>');
    texto.push(escaparXML(datos.correo));
    texto.push('</correo>\n');
    texto.push('\t<contraseña>');
    texto.push(escaparXML(datos.contraseña));
    texto.push('</contraseña>\n');
    texto.push('\t<password>');
    texto.push(escaparXML(datos.password));
    texto.push('</password>\n');
     texto.push('\t<telefono>');
    texto.push(escaparXML(datos.telefono));
    texto.push('</telefono>\n');
     texto.push('\t<codigo>');
    texto.push(escaparXML(datos.codigo));
    texto.push('</codigo>\n');
    //No olvidemos especificar el tipo MIME correcto :)
    return new Blob(texto, {
        type: 'application/xml'
    });
};

function DescargarXML() {
    var datos = obtenerDatos();
    descargarArchivo(generarXml(datos), 'archivo.xml');
}