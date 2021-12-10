function Mode() {
    if (document.querySelector("#cuerpo.dark"))
    {
        $("#cuerpo").removeClass("dark");
        $("#switch").removeClass("active");
        $('body').removeClass("dark");
        $('table').removeClass("dark");
    }
    else{
        $("#cuerpo").addClass("dark");
        $('table').addClass("dark");
        $("#switch").addClass("active");
        $('body').addClass("dark");
    }
}