const emailregistro = document.getElementsByName("emailRegistro");

form.addEventListener("submit", e=>{
    e.preventDefault();
    let warning = "";
    let valEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/;
    
    if(valEmail.test(emailregistro.value))
    {
            
    }
})