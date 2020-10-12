<?php
$inicio = "index.php";
$login = "#";
include_once("cabecera.html");
include_once("menu.php");

?>

<main class="contenedor-login">
<h1 id="tituloP">Iniciar Sesi&oacute;n</h1>
<br><br>
<form name="Log" method="POST" class="login">
<table>
        <tr> 
            <td>Clave de Usuario:</td>
            <td><input type="number" name="claveUsr" class="inForm"></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><input type="password" name="contra" class="inForm"></td>
        </tr>
</table>
<br>
<input type="submit" name="enviar" id="boton" value="Ingresar">
</form>

</main>
<?php
include_once("pie.html")?>