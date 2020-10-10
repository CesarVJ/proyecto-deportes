
function enviarDatosPago(numeroTarjeta, fechaExpiracion, codigoSeguridad){
    if( validarFecha(fechaExpiracion) != null && validarTarjeta(numeroTarjeta) && validarCodSeguridad(codigoSeguridad)){
        // Enviar los datos de comprar y generar Compra
    }else{ // Datos invalidos
        alert("Los datos de pago son incorrectos");
    }
}

function validarFecha(fecha){
    let fechaConvertida = null;
    var anio = 0, mes = 0;
    if(fecha.match(/^\d{4}\-\d{2}$/)){
        anio = parseInt(fecha.substring(0,4), 10);
        mes = parseInt(fecha.substring(5,7), 10);

        if(mes < 1 || mes > 12){ // Mes invalido
            return false;
        }
    }else{ // fecha de expiracion invalida
        return false;
    }
    return true;
}

function validarTarjeta(numeroDeTarjeta){
    if(numeroDeTarjeta != null){
        let regex = /^d{16}$/;
        return  regex.match(numeroDeTarjeta);
    }
    return false;
}
function validarCodSeguridad(codigo){
    if(codigo != null){
        let regex = /^d{3}$/;
        return  regex.match(codigo);
    }
    return false;

}