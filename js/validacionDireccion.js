let checkBox1 = document.getElementById("check");
let formEnvio = document.getElementById("formEnvio");

checkBox1.addEventListener("change", e => {
    let campos = document.getElementById("formEnvio").elements;
    let botonSubmit = document.getElementById("boton");

    for (let i = 0; i < campos.length; i++) {
        if (e.target.checked) {
            campos[i].disabled = true;
            campos[i].required = false;
        } else {
            campos[i].disabled = false;
            campos[i].required = true;
        }
        e.target.disabled = false;
        e.target.required = false;
        botonSubmit.disabled = false;
    }
});

function fueLLenado(elemento) {
    if (elemento != null && elemento.value != "") {
        return true;
    }
    return false;
}
formEnvio.addEventListener("submit", function (e) {
    let calle = document.getElementById("calle");
    let colonia = document.getElementById("colonia");
    let ciudad = document.getElementById("ciudad");
    let cp = document.getElementById("cp");
    let exterior = document.getElementById("exterior");
    let interior = document.getElementById("interior");
    let estado = document.getElementById("estado");

    if (fueLLenado(calle) && fueLLenado(colonia) && fueLLenado(ciudad) && fueLLenado(cp) &&
        fueLLenado(exterior) && fueLLenado(interior) && fueLLenado(estado)) {
        alert("Perfecto, allí enviaremos tu pedido");
    } else {
        if (!checkBox1.checked) {
            e.preventDefault();
            alert("Faltan datos");
        } else {
            alert("Perfecto, allí enviaremos tu pedido");
        }
    }
});