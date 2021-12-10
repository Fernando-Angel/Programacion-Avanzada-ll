$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop() > 30){
            $('#head').addClass('p-0');
            $('#head').removeClass('p-2');
        }
        else{
            $('#head').addClass('p-2');
            $('#head').removeClass('p-0');
        }
    });
});

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