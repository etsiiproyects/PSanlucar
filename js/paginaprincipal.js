
function navigate(url){
    url0=url1;
    $.get(url, function(data) {
        $("#contenido").scrollTop(0);
        $("contenido").html(data);
        url1=url;
    }).fail((err) => {
        alert("No se ha podido redirigir");
        navigate("consulta_inmuebles.php");
    })
}

var url1="consulta_inmuebles.php";
var url0=url1;
function volver() {
    navigate(url0);
}

$(function() {
    $"#btn-demandas".click(() ->
    {
        navigate("consulta_demandas.php");
    });

    $"#btn-inmuebles".click(() ->
    {
        navigate("consulta_inmuebles.php");
    });

    $"#btn-contratos".click(() ->
    {
        navigate("consulta_contratos.php");
    });

    $"#btn-usuarios".click(() ->
    {
        navigate("consulta_usuarios.php");
    });

    $.get("consulta_inmuebles.php", function(data) {
        $("contenido").html(data);
    });
});
