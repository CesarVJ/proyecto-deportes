function Comprueba (){
    var prec = document.AgrProd.precio.value;

    if (prec>0){
        alert("Se ha agregado el producto con exito!");
        document.RegUsr.submit();
        //window.location.href="";
        return true;
    }
    else{
        alert("El precio debe ser mayor a 0");
        return false;
    }
}