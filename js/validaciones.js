
function validarPago() {
    let formCompra = document.getElementById("formComprar");
    let totalElement = document.getElementById("totalPagar");
    let total = parseFloat(totalElement.innerText);
    if (total <= 1000) {
        alert("No cumples con el minimo de compra ($1000)");
        return false;
    } else {
        return true;
    }
}

function validarRegistro(){
    return verifClaves();
}

function verifClaves (){
    var clave1 = document.getElementById("clave1");
    var clave2 = document.getElementById("clave2");

    if (clave1.value===clave2.value){
        alert("Se ha registrado con exito, inicie sesión para continuar");
        //document.RegUsr.submit();
        window.location.href="index.php";
        return true;
    }
    else{
        alert("Las contraseñas no son iguales");
        return false;
    }
}