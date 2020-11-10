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
<div class="opciones">
   <div class="opcion">
   <img src="./media/logoAgregar.png" alt="" class="imagen-opcion">
    <br>
     <button id="ir" onclick="location.href='AgregarProducto.php'" class="ui-button ui-corner-all">Añadir Productos</button>
   </div>
   <div class="opcion">
       <img src="./media/logoModificar.png" alt="" class="imagen-opcion">
       <br>
       <button id="ir" onclick="location.href='ModificarProducto.php'" class="ui-button ui-corner-all">Modificar Productos</button>
   </div>
   <div class="opcion">
       <img src="./media/logoEliminar.png" alt="" class="imagen-opcion">
       <br>
       <button id="ir" onclick="location.href='EliminarProducto.php'" class="ui-button ui-corner-all">Eliminar Productos</button>
   </div>
</main>
<?php
include_once("pie.html")
?>
