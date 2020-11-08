$(document).ready(function() {
    $("#botonRegistro").button();
	$("#botonRegistro").click(function(event){
       
        event.preventDefault();
        if(validarRegistro()){
            registrarUsuario();
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
});

function registrarUsuario(){
    var bValido = false;
        bValido = $("#formRegistro")[0].checkValidity();        
        if (bValido){
            $.getJSON({
                url: "ctrlPhp/ctrlGestionUsuarios.php",
                data: {
                    claveUsr: -1,
                    nombreCompleto: $("#nombreCliente").val()+" "+$("#apPaterno").val()+" "+$("#apMaterno").val(),
                    numTelefono: $("#numTelefono").val(),
                    direccion: $("#direc").val(),
                    correo: $("#correoElec").val(),
                    clave1: $("#clave1").val(),
                    clave2: $("#clave2").val()
                },
                success: function(oDatos) { 
                            procesaRespGestionClte(oDatos);
                        },
                error: function(objRequest, status){
                    mostrarMensaje("Error al invocar al servidor, intente posteriormente");
                            console.log(status);
                        }
            }); 
        }else{
            mostrarMensaje("Errores de captura");
        }
    }

    function procesaRespGestionClte(oDatos){
        var sError = "";
            try{
                if (oDatos != null){
                    if (oDatos.success){
                        mostrarMensaje("Se ha registrado con exito, sera redireccionado a la pagina de inicio");
                        setTimeout(()=>{
                            window.location.href="index.php";
                        }, 2200);
                    }
                    else
                        sError = oDatos.status;
                }else{
                    sError = "JSON no convertido"
                }
            }catch(error){
                console.log(error.message);
                sError = "Error de conversiones";
            }
            if (sError != "")
            mostrarMensaje(sError);
    }

    function validarRegistro(){
        var nombre = $("#nombreCliente").val();
        var apPaterno = $("#apPaterno").val();
        var apMaterno = $("#apMaterno").val();
        var numTelefono = $("#numTelefono").val();
        var direccion = $("#direc").val();
        var correo = $("#correoElec").val();
        var clave1 = $("#clave1").val();
        var clave2 = $("#clave2").val();

        if (nombre === "" || apPaterno == "" || apMaterno === "" || correo === "" || clave1 === "" || direccion === "" || numTelefono === "" || clave2  === "") {
            mostrarMensaje("Faltan datos");
            return false;
        } else if (!validarCorreo(correo)) {
            mostrarMensaje("Correo invalido");
            return false;
        } else if(!verifClaves(clave1, clave2)){
            return false;
        }
        return true; 
    }
    
    function verifClaves (clave1, clave2){
        if (clave1===clave2){
            return true;
        }
        else{
            mostrarMensaje("Las contraseñas no coinciden");
            return false;
        }
    }

    function validarCorreo(correo) {
        var re = /\S+@\S+\.\S+/;
        return re.test(correo);
    }
    function mostrarMensaje(mensaje){
        $("#texto_mensaje").text(mensaje);
        $("#mensaje").dialog("open");
    }

