function Comprueba (){
    var prec = document.AgrProd.precio.value;

    if (prec>0){
        document.RegUsr.submit();
        window.location.href="";//incluir redirección cuando se tenga la página que procese el envío
    }
    else
        alert("El precio debe ser mayor a 0");
}