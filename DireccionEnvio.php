
<?php

$inicio = "index.php";
include_once("cabecera.html");
include_once("menu.php");

?>

<main>
<h1 id="TituloP">Direcci&oacute;n de env&iacute;o</h1>
<br><br>

<form name="DirrecEnvio" method="POST" id="formEnvio">

<input type="checkbox" id="check"> Habilitar/Deshabilitar

    <table id="formularios">
        <tr>
            <td>Calle</td>
            <td><input type="text" class="inpForm" name="call" id="form"></td>
        </tr>
        <tr>
            <td>Colonia</td>
            <td><input type="text" class="inpForm" name="colonia" id="form"></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td><input type="text" class="inpForm" name="ciudad" id="form"> </td>
        </tr>
        <tr>
            <td>C&oacute;digo postal</td>
            <td><input type="text" class="inpForm" name="codpost" id="form"></td>
        </tr>
        <tr>
            <td>N&uacute;mero exterior</td>
            <td><input type="text" name="numext" class="inpForm" id="form"></td>
        </tr>
        <tr>
            <td>N&uacute;mero interior</td>
            <td><input type="text" name="numint" class="inpForm" id="form"></td>
        </tr>
        <tr>
            <td>Estado</td>
            <td><input type="text" class="inpForm" name="estado" id="form"> </td>
        </tr>
    </table>
    
    <br>
    <input id="boton" type="submit" name="enviar" value="Confirmar">

</form>
<script src="./js/validaciones.js?=<?php echo time();?>"> </script>

</main>


<?php
include_once("pie.html");
?>