$(document).ready(function(){
    $("form#formTitulo").validetta()
    $(".cambiarTitulo").click(function(){
        $("#titulo").removeAttr("disabled");
        $("#btnUpdateTitulo").removeAttr("disabled");
    });
});

$(document).ready(function(){
    $("form#formResumen").validetta()
    $(".cambiarResumen").click(function(){
        $("#resumen").removeAttr("disabled");
        $("#btnUpdateResumen").removeAttr("disabled");
    });
});
