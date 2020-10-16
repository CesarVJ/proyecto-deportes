
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

<main>
<h1 id="TituloP">Direcci&oacute;n de env&iacute;o</h1>
<br><br>

<form name="DirrecEnvio" method="POST" id="formEnvio" action="pago.php">
    
<input type="checkbox" id="check"> Utilizar mi Direcci&oacute;n de usuario

    <table id="formularios">
        <tr>
            <td>Calle:&nbsp;</td>
            <td><input id="calle" type="text" class="inpForm" name="calle" required></td>
        </tr>
        <tr>
            <td>Colonia:&nbsp;</td>
            <td><input id="colonia" type="text" class="inpForm" name="colonia" required></td>
        </tr>
        <tr>
            <td>Ciudad:&nbsp;</td>
            <td><input id="ciudad" type="text" class="inpForm" name="ciudad" required> </td>
        </tr>
        <tr>
            <td>C&oacute;digo postal:&nbsp;</td>
            <td><input id="cp" type="number" min="1" class="inpForm" name="codpost" required></td>
        </tr>
        <tr>
            <td>N&uacute;mero exterior:&nbsp;</td>
            <td><input id="exterior" type="number" min="1" name="numext" class="inpForm" required></td>
        </tr>
        <tr>
            <td>N&uacute;mero interior:&nbsp;</td>
            <td><input id="interior" type="number" min="1" name="numint" class="inpForm" required></td>
        </tr>
        <tr>
            <td>Estado:&nbsp;</td>
            <td><input id="estado" type="text" class="inpForm" name="estado" required> </td>
        </tr>
    </table>
    
    <br>
    <input id="boton" type="submit" name="enviar" value="Confirmar">

</form>
<script src="./js/validacionDireccion.js?=<?php echo time();?>"> </script>
</main>


<?php
include_once("pie.html");
?>