$(document).ready(function(){
    $(".cambiarTitulo").click(function(){
        $("#titulo").removeAttr("disabled");
        $("#btnUpdateTitulo").removeAttr("disabled");
    });
});

$(document).ready(function(){
    $(".cambiarResumen").click(function(){
        $("#resumen").removeAttr("disabled");
        $("#btnUpdateResumen").removeAttr("disabled");
    });
});