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
    <form class="formulario-pago" id="formDatosPago" action="index.php" method="POST">
        <div class="contenedor-pago">
            <h1 id="titulo-pago">Tarjeta de D&eacute;bito</h1>

            <div class="nombre-titular">
                <p class="pago">Nombre del titular:</p>
                <input id="nom_titular"  type="text" name="nombreTitular" required>
            </div>

            <div class="numero-tarjeta">
                <p class="pago">Número de la tarjeta:</p>
                <input id="num_tarjeta" type="text" name="numeroTarjeta" pattern="^\d{16}$" required>
            </div>

            <div class="fecha-expiracion">
                <p class="pago">Fecha de expiración:</p>
                <input id="expiracion" type="month" name="fechaExpiracion" required>
            </div>

            <div class="codigo-seguridad">
                <p class="pago">Código de seguridad:</p>
                <input id="codigo_seguridad" type="number" max="999" name="codigoSeguridad" required>
            </div>
            <div class="pagar">
                <input type="submit" value="Realizar pago">
            </div>
        </div>

        <div class="mostrar-pago">

        </div>
    </form>
    <script src="./js/validacionesDatosPago.js"></script>
</main>
<?php include_once("pie.html")?>