$(document).ready(function() {
    $("#boton").button();
    $("#boton").click(function(event){
        event.preventDefault();
        iniciarSesion();
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
});

function iniciarSesion (){
    $.getJSON({
		url:"ctrlPhp/ctrlLogin.php",
		data:{
                claveUsr: $("#claveUsr").val(),
				txtPwd: $("#contra").val()
            },
        success: function(oDatos) {
            procesarLogin(oDatos);
            },
        error: function(objRequest, status){
            mostrarMensaje("Ocurrio un error, status " + request.status);
            }
    });
}

function procesarLogin(oDatos){
    var nodoForm = $("#login-form");
    var nodoBienvenida = $("#bienvenida");
    var oNodoNombre = $("#paraNombre");
    var oNodoTipo = $("#paraTipo");
    
    var ligaCatalogo = $("#mnuCatalogo")
    var ligaLogin = $("#mnuLogin");
    var ligaRegistro = $("#mnuSalir");
    var ligaSalir = $("#mnuSalir");
    var ligaPanelAdmin = $("#mnuPanelAdmin");
    var mensajeError = "";

    try{
        console.log(oDatos);
        if(oDatos != null){                
            if(nodoForm === null || nodoBienvenida === null ||
                oNodoNombre === null || oNodoTipo === null ||
                ligaRegistro === null || ligaLogin === null ||
                ligaCatalogo === null || ligaSalir === null){
                mensajeError = "Error en el html";
            }else{
                if(oDatos.success){
                    oNodoNombre.html(oDatos.data.nombre);
                    oNodoTipo.html(oDatos.data.tipo);
                    
                    ligaLogin.addClass("menu_inhab");
                    ligaRegistro.addClass("menu_inhab");
                    ligaSalir.removeClass("menu_inhab");
                    ligaSalir.addClass("menu_opcion");
            
                    if(oDatos.data.tipo == "Administrador"){
                        ligaPanelAdmin.addClass("menu_opcion");
                        ligaPanelAdmin.removeClass("menu_inhab");
                    }

                    nodoForm.css("display", "none");
                    nodoBienvenida.css("display", "block");
                    nodoBienvenida.css("fontSize", "2rem");
                    
                    }else{
                        mensajeError=oDatos.status;
                    }
                }
            }
        }catch(error){
            console.log(error.message);
            mensajeError = "Error de conversiones";
        }
        if(mensajeError != ""){
            mostrarMensaje(mensajeError);
        }
}

function mostrarMensaje(mensaje){
    $("#texto_mensaje").text(mensaje);
    $("#mensaje").dialog("open");
}

