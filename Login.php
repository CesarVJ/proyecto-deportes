<?php
session_start();
include_once("modelo/ErroresAplic.php");
$inicio = "index.php";
$login = "#";
$registro = "RegistroUsuarios.php";
$claseCatalogo ="menu_opcion";
$claseSalir = "menu_inhab";
$claseLogin = "menu_opcion";
$claseRegistro = "menu_opcion";
$clasePanelAdmin = "menu_inhab";

if (isset($_SESSION["sNomFirmado"])){
    $login="bienvenido.php";
    $claseSalir = "menu_opcion";
    $claseLogin = "menu_inhab";
    $claseRegistro = "menu_inhab";
    if ($_SESSION["sTipoFirmado"]=="Administrador"){
        $clasePanelAdmin = "menu_opcion";
    }    
    header("Location: bienvenido.php");
    exit();
}


include_once("cabecera.html");
include_once("menu.php");

?>

<main class="contenedor-login">
    <script src="js/login.js"></script>
    <form id="login-form" name="Log" method="POST" class="login" onsubmit="iniciarSesion();return false;">
    <h1 id="tituloP">Iniciar Sesi&oacute;n</h1>
    <br><br>
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

    <section id="bienvenida" style="display:none">
        <h3>Bienvenido a nuestra tienda de deportes <span id="paraNombre"> !</span></h3>
        <h4>Ingresaste como <span id="paraTipo"></span></h4>
    </section>
</main>
<?php
include_once("pie.html")?>