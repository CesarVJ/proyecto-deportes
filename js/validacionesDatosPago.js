let formularioPago = document.getElementById("formDatosPago");

formularioPago.addEventListener("submit", function(e){
    validarDatosPago(e)
});

function sumarDias(fecha, dias){
    fecha.setDate(fecha.getDate() + dias);
    return fecha;
  }

function validarDatosPago(e) {
    let titular = document.getElementById("nom_titular");
    let numTarjeta = document.getElementById("num_tarjeta");
    let fechaExpiracion = document.getElementById("expiracion");
    let codSeguridad = document.getElementById("codigo_seguridad");

    console.log("pero que ha pasado");
    if (validarFecha(fechaExpiracion.value) && validarTarjeta(numTarjeta) && validarCodSeguridad(codSeguridad)) {
        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        var fecha = new Date();
        fecha = sumarDias(fecha, 3);
        let fechaLlegada = (diasSemana[fecha.getDay()] + ", " + fecha.getDate() + " de " + meses[fecha.getMonth()] + " de " + fecha.getFullYear());        
        alert("Su compra se ha sido realizada con exito,  fecha estimada de llegada: "+fechaLlegada + "Sera redirigido al catalogo de productos" );
        return true;
    } else { // Datos invalidos
        alert("Los datos de pago son incorrectos");
        return false;
    }
}

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
    if (numeroDeTarjeta != null) {
        let regex = /^\d{16}$/;
        let result= (numeroDeTarjeta.value+"").match(regex);
        console.log("tarjet:"+result);
        return result;
    }
    console.log("Mala tarjeta");
    return false;
}

function validarCodSeguridad(codigo) {
    if (codigo != null) {
        let regex = /^\d{3}$/;
        let res= (codigo.value+"").match(regex);
        console.log("codigo: "+ res);
        return res;
    }
    console.log("Mal codigo");
    return false;
}