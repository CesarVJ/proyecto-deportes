<?php 
session_start();
include_once("modelo/ErroresAplic.php");
$inicio = "index.php";
$registro = "RegistroUsuarios.php";
$login = "login.php";
$numeroError = -1;
$claseCatalogo ="menu_opcion";
$claseSalir = "menu_opcion";
$claseLogin = "menu_opcion";
$claseRegistro = "menu_opcion";
$clasePanelAdmin = "menu_inhab";


if (isset($_SESSION["sTipoFirmado"])){
    $login="bienvenido.php";
    $claseSalir = "menu_opcion";
    $claseLogin = "menu_inhab";
    $claseRegistro = "menu_inhab";
    if ($_SESSION["sTipoFirmado"]=="Administrador"){
        $clasePanelAdmin = "menu_opcion";
    }
}else{
    $numeroError = ErroresAplic::SIN_SESION;
}

if ($numeroError != -1){
    header("Location: error.php?error=".$numeroError);
    exit();
}

include_once("cabecera.html");
include_once("menu.php");
?>
<main class="pago">
    <form class="formulario-pago" onsubmit="enviarDatosPago(numeroTarjeta.value, fechaExpiracion.value, codigoSeguridad.value); return false;" method="POST">
        <div class="contenedor-pago">
            <h1 id="titulo-pago">Tarjeta de Debito</h1>

            <div class="nombre-titular">
                <p>Nombre del titular:</p>
                <input type="text" name="nombreTitular" required>
            </div>

            <div class="numero-tarjeta">
                <p>Número de la tarjeta:</p>
                <input type="text" name="numeroTarjeta" pattern="^\d{16}$" required>
            </div>

            <div class="fecha-expiracion">
                <p>Fecha de expiración:</p>
                <input type="month" name="fechaExpiracion" required>
            </div>

            <div class="codigo-seguridad">
                <p>Código de seguridad:</p>
                <input id="codigo-seguridad" type="number" max="999" name="codigoSeguridad" required>
            </div>
            <div class="pagar">
                <input type="submit" value="Realizar pago">
            </div>
        </div>

        <div class="mostrar-pago">

        </div>
    </form>
</main>
<?php include_once("pie.html")?>