<?php
$inicio = "index.php";
$login = "#";
$registro = "RegistroUsuarios.php";
include_once("cabecera.html");
include_once("menu.php");

?>

<main class="contenedor-login">
<script src="js/login.js"></script>
<h1 id="tituloP">Iniciar Sesi&oacute;n</h1>
<br><br>
<form name="Log" method="POST" class="login" onsubmit="iniciarSesion();return false;">
<table>
        <tr> 
            <td>Clave de Usuario:</td>
            <td><input type="number" name="claveUsr" id="claveUsr" class="inForm"></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><input type="password" name="contra" id="contra" class="inForm"></td>
        </tr>
</table>
<br>
<input type="submit" name="enviar" id="boton" value="Ingresar">
</form>

</main>
<?php
include_once("pie.html")?>