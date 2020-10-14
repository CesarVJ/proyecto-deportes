<script>
    function verifClaves (){
        var clave1 = document.RegUsr.contra.value;
        var clave2 = document.RegUsr.confcon.value;

        if (clave1==clave2){
            document.RegUsr.submit();
            window.location.href="";//incluir redirección cuando se tenga la página que procese el envío
        }
        else
            alert("Las contraseñas no son iguales");
    }
</script>

<?php
session_start();
include_once("modelo/ErroresAplic.php");
$inicio = "index.php";
$registro = "RegistroUsuarios.php";
$login = "login.php";
$numeroError = -1;

$claseCatalogo ="menu_opcion";
$claseSalir = "menu_inhab";
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
    header("Location: bienvenido.php");
    exit();
}

if ($numeroError != -1){
    header("Location: error.php?error=".$numeroError);
    exit();
}

include_once("cabecera.html");
include_once("menu.php");

?>

<main>
<h1 id="tituloP">Registro de usuarios</h1>
<br><br>
<form name="RegUsr" method="POST">
    <table id="formularios">
        <tr>
            <td>Nombre:</td>
            <td><input class="inpForm" name="nom" type="text" required minlength="2"></td>
        </tr>
        <tr>
            <td>Apellido paterno:</td>
            <td><input class="inpForm" name="apepat" type="text" required minlength="2"></td>
        </tr>
        <tr>
            <td>Apellido materno:</td>
            <td><input class="inpForm" name="apemat" type="text" required minlength="2"></td>
        </tr>
        <tr>
            <td>N&uacute;mero de tel&eacute;fono:</td>
            <td><input class="inpForm" name="numtel" type="text" pattern="\d{10}"></td>
        </tr>
        <tr>
            <td>Direcci&oacute;n:</td>
            <td><input class="inpForm" name="direc" type="text" required></td>
        </tr>
        <tr>
            <td>Correo electr&oacute;nico:</td>
            <td><input class="inpForm" name="email" type="email" required></td>
        </tr>
        <tr>
           <td>Contraseña:</td>
           <td><input class="inpForm" name="contra" type="password" required></td>
        </tr>
        <tr>
            <td>Confirmar contraseña:</td>
            <td><input class="inpForm" name="confcon" type="password" required></td>
        </tr>
    </table>
    <br>
    <input id="boton" type="submit" name="enviar" value="Confirmar" onclick="verifClaves()">
</form>
</main>
<?php include_once("pie.html")?>


