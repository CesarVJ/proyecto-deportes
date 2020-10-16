function iniciarSesion(){
    var claveUsuario = document.getElementById("claveUsr");
    var contrasenia = document.getElementById("contra");
    var request = new XMLHttpRequest();
    var sQueryString = "";

    var url = "ctrlPhp/ctrlLogin.php";
	if (claveUsuario===null || contrasenia===null ||
		claveUsuario.value.trim()==="" || contrasenia.value.trim()===""){
		alert("Faltan datos");
    }else{
        sQueryString="claveUsr="+claveUsuario.value+"&txtPwd="+contrasenia.value;
        request.onreadystatechange = function(){
            if (request.readyState === 4 && 
				request.status === 200) {
				procesarLogin(request.responseText);
			}else{
				if (request.status != 200 &&request.status != 0)
					alert("Ocurrio un error, status "+ request.status);
			}
        };
		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(sQueryString);        
    }
}

function procesarLogin(respuesta){
    let nodoForm = document.getElementById("login-form");
    let nodoBienvenida = document.getElementById("bienvenida");
    var oNodoNombre = document.getElementById("paraNombre"); 
    var oNodoTipo = document.getElementById("paraTipo"); 

    var ligaCatalogo = document.getElementById("mnuCatalogo"); 
    var ligaLogin = document.getElementById("mnuLogin");
    var ligaRegistro = document.getElementById("mnuRegistro");
    var ligaSalir = document.getElementById("mnuSalir"); 
    var ligaPanelAdmin = document.getElementById("mnuPanelAdmin"); 


    var oDatos;
    var mensajeError ="";

        try{
            oDatos = JSON.parse(respuesta);
            console.log(oDatos);
            if(oDatos != null){                
                if(nodoForm === null || nodoBienvenida === null ||
                    oNodoNombre === null || oNodoTipo === null ||
                    ligaRegistro === null || ligaLogin === null ||
                    ligaCatalogo === null || ligaSalir === null){
                        mensajeError = "Error en el html";
                }else{
                    if(oDatos.success){
                        oNodoNombre.innerHTML = oDatos.data.nombre;
                        oNodoTipo.innerHTML = oDatos.data.tipo;
                                                
                        ligaLogin.classList.add("menu_inhab");
                        ligaRegistro.classList.add("menu_inhab");                        
                        ligaSalir.classList.remove("menu_inhab");
                        ligaSalir.classList.add("menu_opcion");


                        if(oDatos.data.tipo == "Administrador"){
                            ligaPanelAdmin.classList.add("menu_opcion");
                            ligaPanelAdmin.classList.remove("menu_inhab");
                        }
                        nodoForm.style.display = "none";
                        nodoBienvenida.style.display = "block";
                        nodoBienvenida.style.fontSize = "2rem";
                    }else{
                        mensajeError = oDatos.status;
                    }
                }
            }
        }catch(error){
            console.log(error.message);
            mensajeError = "Error de conversiones";
        }
        if(mensajeError != ""){
            alert(mensajeError);
        }

}