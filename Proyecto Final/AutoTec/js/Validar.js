const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll("#formulario input");

const campos = {
    nombre: false,
    apellido: false,
    password: false,
    password2: false,
    correo: false,
    telefono: false,
    codigoPostal: false
}

const expresiones = {
    nombre: /^[a-zA-ZÁ-ÿ\s]{1,30}$/,
    apellido: /^[a-zA-ZÁ-ÿ\s]{1,30}$/,
    password: /^.{3,20}$/,
    correo: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,20})+$/,
    telefono: /^\d{6,14}$/,
    codigoPostal: /^(?:0[1-9]\d{3}|[1-4]\d{4}|9[0-2]\d{3})$/
}

const validarFormulario = (e) =>{
    switch(e.target.name){
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
        break;
        case "apellidos":
            validarCampo(expresiones.apellido, e.target, 'apellido');
        break;
        case "email":
            validarCampo(expresiones.correo, e.target, 'correo');
        break;
        case "password":
            validarCampo(expresiones.password, e.target, 'contraseña');
            validarPassword2();
        break;
        case "password2":
            validarCampo(expresiones.password, e.target, 'password');
            validarPassword2();
        break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
        break;
        case "cp":
            validarCampo(expresiones.codigoPostal, e.target, 'codigo');
        break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo_${campo}`).classList.remove("incorrecto");
        document.getElementById(`grupo_${campo}`).classList.add("correcto");
        document.querySelector(`#grupo_${campo} .formulario_validacion-estado`).classList.remove("fa-exclamation-circle");
        document.querySelector(`#grupo_${campo} .formulario_validacion-estado`).classList.add("fa-check-circle");
        campos[campo] = true;
    }
    else{
        document.getElementById(`grupo_${campo}`).classList.add("incorrecto");
        document.getElementById(`grupo_${campo}`).classList.remove("correcto");
        document.querySelector(`#grupo_${campo} .formulario_validacion-estado`).classList.add("fa-exclamation-circle");
        document.querySelector(`#grupo_${campo} .formulario_validacion-estado`).classList.remove("fa-check-circle");
        campos[campo] = false;
    }
}

const validarPassword2 = () => {
    const inputPassword1 = document.getElementById("password");
    const inputPassword2 = document.getElementById("password2");

    if(inputPassword1.value !== inputPassword2.value && inputPassword2.value != "")
    {
        document.getElementById(`grupo_password`).classList.add("incorrecto");
        document.getElementById(`grupo_password`).classList.remove("correcto");
        document.querySelector(`#grupo_password .formulario_validacion-estado`).classList.add("fa-exclamation-circle");
        document.querySelector(`#grupo_password .formulario_validacion-estado`).classList.remove("fa-check-circle");
        campos['password'] = false;
    } else if(inputPassword1.value === inputPassword2.value && inputPassword2.value != ""){
        document.getElementById(`grupo_password`).classList.remove("incorrecto");
        document.getElementById(`grupo_password`).classList.add("correcto");
        document.querySelector(`#grupo_password .formulario_validacion-estado`).classList.remove("fa-exclamation-circle");
        document.querySelector(`#grupo_password .formulario_validacion-estado`).classList.add("fa-check-circle");
        campos['password'] = true;
    }
}

inputs.forEach((input) => { 
    input.addEventListener("keyup", validarFormulario);
    input.addEventListener("blur", validarFormulario);
});