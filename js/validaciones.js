let checkBox1 = document.getElementById("check");
checkBox1.addEventListener("change", e =>{
    let campos = document.getElementById("formEnvio").elements;
    let botonSubmit = document.getElementById("boton");

    for(let i = 0; i < campos.length; i++){
        if(e.target.checked){
            campos[i].disabled = true;
        }else{
            campos[i].disabled = false;
        }
        e.target.disabled = false;
        botonSubmit.disabled = false;
    }
});