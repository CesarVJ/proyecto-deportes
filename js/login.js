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
    console.log(respuesta);
}