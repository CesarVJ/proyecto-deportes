$(document).ready(function () {
    var frmEnvio = $("#formEnvio");
    var campos = $("#formularios :input");
    var bandera = false;
    $('#check').checkboxradio();
    $('#check').click(function () {
        if ($(this).prop('checked') == true) {
            campos.prop("disabled", true);
            campos.prop("required", false);
            bandera = true;
        } else {
            campos.prop("disabled", false);
            campos.prop("required", true);
            bandera = false;
        }
    });

    $("#mensaje").dialog({
        autoOpen: false,
        show: {
            effect: "scale",
            duration: 650
        },
        hide: {
            effect: "clip",
            duration: 650
        },
        modal: true
    });
    var f = function () {
        var oCalle = $("#calle");
        var oColonia = $("#colonia");
        var oCiudad = $("#ciudad");
        var oCp = $("#cp");
        var oExterior = $("#exterior");
        var oInterior = $("#interior");
        var oEstado = $("#estado");
        if (!bandera) {
            if (fueLLenado(oCalle.val()) && fueLLenado(oColonia.val()) && fueLLenado(oCiudad.val()) && fueLLenado(oCp.val()) &&
                fueLLenado(oExterior.val()) && fueLLenado(oInterior.val()) && fueLLenado(oEstado.val())) {
                mostrarMensaje("Perfecto, allí enviaremos tu pedido");
                setInterval(function () {
                    $(location).attr('href', 'pago.php');
                }, 2500);
            } else {
                mostrarMensaje("Faltan datos");
            }
        } else {
            mostrarMensaje("Perfecto, allí enviaremos tu pedido");
            setInterval(function () {
                $(location).attr('href', 'pago.php');
            }, 2500);

        }

    };
    $("#boton").click(f);

    var estados = ["Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Chiapas",
        "Chihuahua", "Ciudad de M\u00E9xico", "Coahuila", "Colima", "Durango", "Estado de M\u00E9xico",
        "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "Michoac\u00e1n", "Morelos", "Nayarit",
        "Nuevo Le\u00F3n", "Oaxaca", "Puebla", "Quer\u00E9taro", "Quintana Roo", "San Luis Potos\u00ED",
        "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucat\u00e1n", "Zacatecas"
    ]

    $("#estado").autocomplete({
        source: estados,
        minlength: 2
    });

});

function fueLLenado(elemento) {
    if (elemento.length == 0) {
        return false;
    }
    return true;
}

function mostrarMensaje(mensaje) {
    $("#texto_mensaje").text(mensaje);
    $("#mensaje").dialog("open");
}