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
    }else{
        $numeroError = ErroresAplic::SIN_PERMISOS;
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
<h1 id="tituloP">Eliminar producto</h1>
<br><br>
<form name="busq" method="POST">
    <table id="formularios">
        <tr>
            <td>B&uacute;squeda:&nbsp;</td>
            <td><input class="inpForm" name="busqueda" type="text" required></td>
        </tr>
    </table>  
    <br><br>
    <input id="boton" type="submit" name="enviar" value="Confirmar" onclick="Comprueba()">
</form>
</main>
<?php
include_once("pie.html")
?>
