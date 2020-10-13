window.onload = e => {
    console.log("Consultados");
    consultarEquipos();
};

function buscarProductos() {
    console.log("Hola");
}

function consultarLinea() {
    var selectElement = document.getElementById("tipoLinea");
    var request = new XMLHttpRequest();
    var lineaSeleccionada = selectElement.value;
    var sQueryString = "linea=" + lineaSeleccionada;
    var url = "ctrlPhp/ctrlBuscarTodoslinea.php" + "?" + sQueryString;

    request.onreadystatechange = function () {
        if (request.readyState === 4 &&
            request.status === 200) {
            llenarTablaLinea(request.responseText);
        } else {
            if (request.status != 200 && request.status != 0)
                alert("Hubo error, status " + request.status);
        }
    };

    request.open("GET", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(sQueryString);
}

function llenarTablaLinea(respuesta) {
    var oNodoTbl = document.getElementById("articulos");
    var oTblBody = document.getElementById("bodyTablaArt"); 
    var datos;
    var mensajeError = "";
    var nuevoBody = document.createElement("tbody");
    var celda1, celda2, celda3, celda4, celda5, celda6;
    var oLinea;

    try{
        datos = JSON.parse(respuesta);
        console.log(datos);
        if(datos != null){
            if(oTblBody === null || oNodoTbl ===null){
                mensajeError = "Error en html";
            }else{
                if(datos.success){
                    for(var i=0; i< datos.data.length; i++){
						oLinea = nuevoBody.insertRow(-1);
						celda1 = oLinea.insertCell(0);
						celda2 = oLinea.insertCell(1);
                        celda3 = oLinea.insertCell(2);
                        celda4 = oLinea.insertCell(3);
						celda5 = oLinea.insertCell(4);
                        //celda6 = oLinea.insertCell(5);

                        let claveArt = datos.data[i].claveArticulo;
                        let nombImagen = datos.data[i].imagen;
                        let nombArt = datos.data[i].nombreArticulo;
                        let equipo = datos.data[i].equipo
                        let precio = datos.data[i].precio;
                        celda1.innerHTML = '<p>'+nombArt+'</p><img src="./media/'+nombImagen+'" class="imagen-articulo">' ;
                        celda2.innerHTML = equipo;
                        celda3.innerHTML = "Jeje";
                        celda4.innerHTML = precio;
						celda5.innerHTML = '<input type="number" class="cantidadArt" value="0">';
                    }
                    nuevoBody.id="bodyTablaArt";
                    oNodoTbl.replaceChild(nuevoBody, oTblBody);
                }else{
                    mensajeError = datos.status;
                }
            }
        }

    }catch(error){
        console.log(error.message);
        mensajeError = "Error de conversion";
    }
    if(mensajeError != ""){
        alert(mensajeError);
    }


}


function consultarEquipos() {
    var request = new XMLHttpRequest();
    var url = "ctrlPhp/ctrlConsultarEquipos.php";

    request.onreadystatechange = function () {
        console.log(request.status);
        console.log(request.readyState);

        if (request.readyState == 4 && request.status === 200) {
            mostrarEquipos(request.response);
        } else {
            if (request.status != 200 && request.status != 0) {
                alert("Ocurrio un error, status " + request.status);
            }
        }
    };

    request.open("GET", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send();
}

function mostrarEquipos(Equipos) {
    let elementoSelect = document.getElementById("tipoEquipo");
    var datos;
    var mensajeError = "";
    try {
        console.log(Equipos)
        datos = JSON.parse(Equipos);
        if (datos != null) {
            if (datos.success) {
                elementoSelect.innerHTML = "";
                for (let i = 0; i < datos.data.length; i++) {
                    let elementoOption = document.createElement("option");
                    elementoOption.value = datos.data[i].claveEquipo;
                    elementoOption.id = datos.data[i].claveEquipo;
                    elementoOption.innerHTML = datos.data[i].nombreEquipo;
                    elementoSelect.appendChild(elementoOption);
                }
            } else {
                mensajeError = datos.status;
            }
        } else {
            mensajeError = "EL JSON no fue convertido";
        }

    } catch (error) {
        console.log(error.message);
        mensajeError = "Error";
    }
    if (mensajeError != "") {
        alert(mensajeError);
    }
}

function enviarDatosPago(numeroTarjeta, fechaExpiracion, codigoSeguridad) {
    if (validarFecha(fechaExpiracion) != null && validarTarjeta(numeroTarjeta) && validarCodSeguridad(codigoSeguridad)) {
        // Enviar los datos de comprar y generar Compra
    } else { // Datos invalidos
        alert("Los datos de pago son incorrectos");
    }
}

function validarFecha(fecha) {
    let fechaConvertida = null;
    var anio = 0,
        mes = 0;
    if (fecha.match(/^\d{4}\-\d{2}$/)) {
        anio = parseInt(fecha.substring(0, 4), 10);
        mes = parseInt(fecha.substring(5, 7), 10);

        if (mes < 1 || mes > 12) { // Mes invalido
            return false;
        }
    } else { // fecha de expiracion invalida
        return false;
    }
    return true;
}

function validarTarjeta(numeroDeTarjeta) {
    if (numeroDeTarjeta != null) {
        let regex = /^d{16}$/;
        return regex.match(numeroDeTarjeta);
    }
    return false;
}

function validarCodSeguridad(codigo) {
    if (codigo != null) {
        let regex = /^d{3}$/;
        return regex.match(codigo);
    }
    return false;

}