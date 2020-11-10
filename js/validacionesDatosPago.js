$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: 'Anterior',
    nextText: 'Siguiente',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekHeader: 'Sem',
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

function sumarDias(fecha, dias){
    fecha.setDate(fecha.getDate() + dias);
    return fecha;
  }

$(document).ready(function(){

    $("#expiracion").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst){
            var anio = inst.selectedYear, mes = inst.selectedMonth+1;
            $(this).datepicker('setDate', new Date(anio, mes, 0));
        },
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


    var f = function (){
        var frmCaptura = $("#formDatosPago");
        var oTitular = $("#nom_titular");
        var oNumTarj = $("#num_tarjeta");
        var oFechaExp = $("#expiracion");
        var oCodSeg = $("#codigo_seguridad");
        console.log("pero que ha pasado");
        if ((oFechaExp.val() != "") && validarTarjeta(oNumTarj.val()) && validarCodSeguridad(oCodSeg.val())){
            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            var fecha = new Date();
            fecha = sumarDias(fecha, 3);
            let fechaLlegada = (diasSemana[fecha.getDay()] + ", " + fecha.getDate() + " de " + meses[fecha.getMonth()] + " de " + fecha.getFullYear());        
            mostrarMensaje("Su compra se ha sido realizada con exito,  fecha estimada de llegada: "+fechaLlegada + "Sera redirigido al catalogo de productos" );
            setInterval(function(){
                $(location).attr('href','index.php');
            },3000);
            return true;
        } else { // Datos invalidos
            mostrarMensaje("Los datos de pago son incorrectos");
            //$(location).attr('href','index.php');
            return false;
        }
    };
    $("#btnEnviar").click(f);
});
  
function validarFecha(fecha) {
    var anio = 0,
        mes = 0;
    if (fecha.match(/^\d{4}\-\d{2}$/)) {
        anio = parseInt(fecha.substring(0, 4), 10);
        mes = parseInt(fecha.substring(5, 7), 10);

        if (mes < 1 || mes > 12) { // Mes invalido
            console.log("Mala fecha 0");
            return false;
        }
    } else { // fecha de expiracion invalida
        console.log("Mala fecha");
        return false;
    }
    return true;
}

function validarTarjeta(numeroDeTarjeta) {
    if (numeroDeTarjeta != "") {
        let regex = /^\d{16}$/;
        let result= (numeroDeTarjeta).match(regex);
        console.log("tarjet:"+result);
        return result;
    }
    console.log("Mala tarjeta");
    return false;
}

function validarCodSeguridad(codigo) {
    if (codigo != "") {
        let regex = /^\d{3}$/;
        let res= (codigo).match(regex);
        console.log("codigo: "+ res);
        return res;
    }
    console.log("Mal codigo");
    return false;
}

function mostrarMensaje(mensaje){
    $("#texto_mensaje").text(mensaje);
    $("#mensaje").dialog("open");
}