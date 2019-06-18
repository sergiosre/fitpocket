$(document).ready(function() {


    $("div.card.actividad").click(function(e) {
        e.preventDefault();

        var nombre = $(this).find("h4").html();
        var info = $(this).find("#info").val();
        swal(nombre, info);

    });
});