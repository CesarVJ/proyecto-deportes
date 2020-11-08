$(document).ready(function () {
    consultarEquipos();
    $("#filtrarEquipos").button();
    $("#filtrarLineas").button();

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

    $( "#tipoEquipo" ).selectmenu();
    $( "#tipoLinea" ).selectmenu();



    $("#filtrarEquipos").click(function(event){
        event.preventDefault();
        buscarProductos();
    });
    $("#filtrarLineas").click(function(event){
        event.preventDefault();
        consultarLinea();
    });

    $("#formComprar").submit(function(event){
        event.preventDefault();
        if(validarPago()){
            window.location.href="DireccionEnvio.php";        
        }
    });

    $("#mostTotal").click(function(event){
        event.preventDefault();
        mostrarTotal();
    });
});

function consultarEquipos() {
    $.getJSON({
        url:"ctrlPhp/ctrlConsultarEquipos.php",
        data:{
            // No se requiere enviar datos
        },
        success: function(oDatos) {
            mostrarEquipos(oDatos);
        },
        error: 	function(objRequest, status){
            mostrarMensaje("Error al invocar al servidor, intente posteriormente");
            console.log(status);
        }
    });
}

function mostrarEquipos(datos) {
    let elementoSelect = $("#tipoEquipo");
    var mensajeError = "";
    try {
        console.log(datos)
        if (datos != null) {
            if (datos.success) {
                elementoSelect.html("");
                for (let i = 0; i < datos.data.length; i++) {
                    let elementoOption = $("<option>");
                    elementoOption.val(datos.data[i].claveEquipo);
                    elementoOption.prop("id",datos.data[i].claveEquipo);
                    elementoOption.html(datos.data[i].nombreEquipo);
                    elementoSelect.append(elementoOption);
                }
                elementoSelect.val('1')
                elementoSelect.selectmenu("refresh");
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
        mostrarMensaje(mensajeError);
    }
}

function buscarProductos() {
    console.log("Buscando ..");
    var selectElement = $("#tipoEquipo");
    var equipoSeleccionado = selectElement.val();

    $.getJSON({
        url:"ctrlPhp/ctrlBuscarPorEquipo.php",
        data:{
            equipo: equipoSeleccionado
        },
        success: function(oDatos) {
            llenarTablaLinea(oDatos);
                },
        error: 	function(objRequest, status){
            $("#texto_mensaje").text("Error al invocar al servidor, intente posteriormente");
            $("#mensaje").dialog("open");
            console.log(status);
        }
    });
}

function llenarTablaLinea(datos) {
    var oNodoTbl = $("#articulos");
    var oTblBody = $("#bodyTablaArt"); 
    var cabeceraPrecio = $("#precio_col"); 
    var cabeceraCantidad = $("#cantidad_col"); 
    var formComprar = $("#formComprar"); 
    
    var mensajeError = "";
    var celda1, celda2, celda3, celda4, celda5;
    var oLinea;

    try{
        console.log(datos);
        if(datos != null){
            if(oTblBody === null || oNodoTbl ===null){
                mensajeError = "Error en html";
            }else{
                if(datos.success){
                    oTblBody.empty();
                    for(var i=0; i< datos.data.length; i++){
						oLinea = $("<tr>");
						celda1 = $("<td>");
						celda2 = $("<td>");
                        celda3 = $("<td>");
                        celda4 = $("<td>");
						celda5 = $("<td>");

                        let claveArt = datos.data[i].claveArticulo;
                        let nombImagen = datos.data[i].imagen;
                        let nombArt = datos.data[i].nombreArticulo;
                        let equipo = datos.data[i].equipo
                        let precio = datos.data[i].precio;
                        let caracteristicas = datos.data[i].caracteristicas;
                        console.log(caracteristicas);

                        celda1.html('<p>'+nombArt+'</p><img src="./media/'+nombImagen+'" class="imagen-articulo">' );
                        celda2.html(equipo);
                        celda3.html('<p style="text-align:justify;">'+caracteristicas+'</p>');
                        celda4.html("$"+precio);
                        celda5.html('<input type="number" id="P'+claveArt+'" min="0" max="30" class="cantidadArt" value="0"> <br> Subtotal: $<span class ="subtotal" id="sub'+claveArt+'">0</span>');
                        
                        if(datos.sesion == 0){
                            // Ocultando columa que muestra el precio de los articulos
                            cabeceraPrecio.addClass("oculto");
                            celda4.addClass("oculto");
                            //Ocultando la columna que permite elegir cantidad de articulos
                            cabeceraCantidad.addClass("oculto");
                            celda5.addClass("oculto");
                        }else{
                            formComprar.removeClass("oculto");
                            let inputCant = celda5.find("#P"+claveArt);
                            let subtotal = celda5.find("#sub"+claveArt);

                            inputCant.change(e =>{    
                                console.log(e.target.value);  
                                subtotal.text(parseFloat(e.target.value) * precio);                    
                            });
                        }
                        oLinea.append(celda1,celda2,celda3,celda4,celda5);
                        oTblBody.append(oLinea);
                    }
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

function consultarLinea() {
    var selectElement = $("#tipoLinea");
    var lineaSeleccionada = selectElement.val();

    $.getJSON({
        url:"ctrlPhp/ctrlBuscarTodoslinea.php",
        data:{
            linea: lineaSeleccionada
        },
        success: function(oDatos) {
            llenarTablaLinea(oDatos);
        },
        error: 	function(objRequest, status){
            $("#texto_mensaje").text("Error al invocar al servidor, intente posteriormente");
            $("#mensaje").dialog("open");
            console.log(status);
        }
    });
}

function mostrarTotal(){
    let subtotales = $(".subtotal");
    let total = $("#totalPagar");
    let cajaPago = $("#cajaPago");
    let btnComprar = $("#btnComprar");

    var totalPagar = 0;
    console.log(subtotales);
    
    subtotales.each((id, elemento)=>{
        totalPagar += parseFloat(elemento.innerText);
        console.log(elemento.innerText);
    })

    if(totalPagar > 1000){
        btnComprar.prop("disabled", false);
        btnComprar.css("backgroundColor","#009879");
        btnComprar.css("cursor","pointer");
    }else{
        btnComprar.prop("disabled", true);
        btnComprar.css("backgroundColor","#cdc9c3");
        btnComprar.css("cursor","no-drop");
    }
    total.text(totalPagar);
    cajaPago.removeClass("oculto");
}

function validarPago() {
    let totalElement = $("#totalPagar");
    let total = parseFloat(totalElement.text());
    if (total <= 1000) {
        mostrarMensaje("Aun no cumples con el minimo de compra ($1000)");
        return false;
    } else {
        return true;
    }
}

function mostrarMensaje(mensaje){
    $("#texto_mensaje").text(mensaje);
    $("#mensaje").dialog("open");
}