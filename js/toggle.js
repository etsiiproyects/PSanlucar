$(document).ready(function() {
    var estado = false;

    $('#btn-toggle').on('click', function() {
        $('.toggle').slideToggle();

        if (estado == true) {
            // $(this).text("Abrir");
            $('contrato').css({
                "overflow": "auto"
            });
            estado = false;
        } else {
            // $(this).text("Cerrar");
            $('contrato').css({
                "overflow": "hidden"
            });
            estado = true;
        }
    });
});