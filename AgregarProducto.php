<script  type="text/javascript" src="Compruebaprecio.js"></script>

<?php
session_start();
include_once("modelo/ErroresAplic.php");
$inicio = "index.php";
$registro = "RegistroUsuarios.php";
$login = "login.php";
$numeroError = -1;
$claseCatalogo ="menu_opcion";
$claseSalir = "menu_opcion";
$claseLogin = "menu_inhab";
$claseRegistro = "menu_inhab";
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

<main>
    <h1 id="tituloP">Agregar producto</h1>
    <br><br>
<form name="AgrProd" method="POST"> 
    <table id="formularios">
        <tr>
            <td>Nombre del producto:</td>
            <td><input class="inpForm" name="nomprod" type="text" minlength="2" required></td>
        </tr>
        <tr>
            <td>Equipo:</td>
            <td><input class="inpForm" name="equipo" type="text" minlength="2" required></td>
        </tr>
        <tr>
            <td>Línea:</td>
            <td><input class="inpForm" name="linea" type="text" minlength="2" required></td>
        </tr>
        <tr>
            <td>Precio:</td>
            <td><input class="inpForm" name="precio" type="number" minlength="2" required></td>
        </tr>
        <tr>
            <td>Características:</td>
            <td><input class="inpForm" name="carac" type="text" minlength="10" size="50" style="WIDTH: 250px; HEIGHT: 120px" required></td>
        </tr>
        <tr>
            <td>Seleccionar imagen:</td>
            <td><input id="archivo" class="inpForm" name="carac" type="file" required></td>
        </tr>
    </table>
    <br>
    <input id="boton" type="submit" name="enviar" value="Confirmar" onclick="Comprueba()">
</form>
</main>

<?php include_once("pie.html")?>