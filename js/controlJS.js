window.onload = e => {
    //console.log("Consultadoando equipos ...");
    consultarEquipos();
};

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
    var cabeceraPrecio = document.getElementById("precio_col"); 
    var cabeceraCantidad = document.getElementById("cantidad_col"); 
    var formComprar = document.getElementById("formComprar"); 
    
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

                        let claveArt = datos.data[i].claveArticulo;
                        let nombImagen = datos.data[i].imagen;
                        let nombArt = datos.data[i].nombreArticulo;
                        let equipo = datos.data[i].equipo
                        let precio = datos.data[i].precio;
                        let caracteristicas = datos.data[i].caracteristicas;
                        console.log(caracteristicas);

                        celda1.innerHTML = '<p>'+nombArt+'</p><img src="./media/'+nombImagen+'" class="imagen-articulo">' ;
                        celda2.innerHTML = equipo;
                        celda3.innerHTML = '<p style="text-align:justify;">'+caracteristicas+'</p>';
                        celda4.innerHTML = "$"+precio;
                        celda5.innerHTML = '<input type="number" id="P'+claveArt+'" min="0" max="30" class="cantidadArt" value="0"> <br> Subtotal: $<span class ="subtotal" id="sub'+claveArt+'">0</span>';
                        
                        if(datos.sesion == 0){
                            // Ocultando columa que muestra el precio de los articulos
                            cabeceraPrecio.style.display = "none";
                            celda4.style.display = "none";
                            //Ocultando la columna que permite elegir cantidad de articulos
                            cabeceraCantidad.style.display = "none";
                            celda5.style.display = "none";
                        }else{
                            formComprar.style.display = "block";
                            let inputCant = celda5.querySelector("#P"+claveArt);
                            let subtotal = celda5.querySelector("#sub"+claveArt);

                            inputCant.addEventListener('change', e =>{      
                                subtotal.innerText = parseFloat(e.target.value) * precio;                    
                            });
                        }
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
function mostrarTotal(){
    let subtotales = document.getElementsByClassName("subtotal");
    let total = document.getElementById("totalPagar");
    let cajaPago = document.getElementById("cajaPago");
    let btnComprar = document.getElementById("btnComprar");

    var totalPagar = 0;
    console.log(subtotales);

    for(let i = 0; i < subtotales.length; i++){
        console.log(subtotales[i]);
        totalPagar += parseFloat(subtotales[i].innerText);
    }
    if(totalPagar > 1000){
        btnComprar.disabled = false;
        btnComprar.style.backgroundColor = "#009879";
        btnComprar.style.cursor = "pointer";
        //console.log("Puede comprar: "+totalPagar);

    }else{
        btnComprar.disabled = true;
        btnComprar.style.backgroundColor = "#cdc9c3";
        btnComprar.style.cursor = "no-drop";
        //console.log("NO puede comprar: "+totalPagar);
    }
    total.innerText = totalPagar;
    cajaPago.style.display = "block";
}

function buscarProductos() {
    console.log("Buscando ..");
    var selectElement = document.getElementById("tipoEquipo");
    var request = new XMLHttpRequest();
    var equipoSeleccionado = selectElement.value;
    var sQueryString = "equipo=" + equipoSeleccionado;
    var url = "ctrlPhp/ctrlBuscarPorEquipo.php" + "?" + sQueryString;

    request.onreadystatechange = function () {
        if (request.readyState === 4 &&
            request.status === 200) {
            llenarTablaLinea(request.responseText);
            //console.log(request.responseText);
        } else {
            if (request.status != 200 && request.status != 0)
                alert("Hubo error, status " + request.status);
        }
    };

    request.open("GET", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(sQueryString);
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
