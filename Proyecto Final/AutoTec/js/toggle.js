function Mode() {
    if (document.querySelector("#cuerpo.dark"))
    {
        $("#cuerpo").removeClass("dark");
        $("#switch").removeClass("active");
        $(".box").addClass("dark");
    }
    else{
        $("#cuerpo").addClass("dark");
        $("#switch").addClass("active");
        $(".box").removeClass("dark");
    }
}