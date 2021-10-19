function calcularCurp(){
    var nombre=document.getElementById("Nombres").value.substring(0,1).toUpperCase();
    var apellido_paterno=document.getElementById("ApPaterno").value.substring(0,2).toUpperCase();
    var apellido_materno=document.getElementById("ApMaterno").value.substring(0,1).toUpperCase();
    var sexo=document.getElementById("Sexo").value;
    var estado=document.getElementById("Estados").value;
    var anio = document.getElementById("fchNacimiento").value.substring(2,4);
    var mes = document.getElementById("fchNacimiento").value.substring(5,7);
    var dia = document.getElementById("fchNacimiento").value.substring(8,10);
    var fecha = anio+mes+dia;
    var Al1 = Math.round(Math.random()*(0-9)+parseInt(9));
    var Al2 = Math.round(Math.random()*(0-9)+parseInt(9));
    
    var curp = apellido_paterno+apellido_materno+nombre+fecha+sexo+estado+"XXX"+Al1+Al2;
    //document.write("<h1>"+curp+"</h1>");
    alert(curp);
    //document.getElementById('resultado').value=nombre;
  }
  