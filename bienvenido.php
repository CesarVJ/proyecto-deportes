<?php
session_start();
include_once("modelo/ErroresAplic.php");
$numeroError = -1;
$oFirmado = null;
$sTipo="";
$sNombre="";
$inicio = "index.php";
$dirLogin="bienvenido.php";
$claseCatalogo ="menu_opcion";
$claseSalir = "menu_opcion";
$claseLogin = "menu_inhab";
$claseRegistro = "menu_inhab";

if (isset($_SESSION["sNomFirmado"])){
    $nombre = $_SESSION["sNomFirmado"];
    $tipo = $_SESSION["sTipoFirmado"];
    if ($_SESSION["sTipoFirmado"]=="Administrador"){
        $clasePanelAdmin = "menu_opcion";
    }
}else{
    $numeroError = ErroresAplic::SIN_SESION;;
}
if ($numeroError != -1){
    header("Location: error.php?error=".$numeroError);
    exit();
}
include_once("cabecera.html");
include_once("menu.php");
?>

<main>
		<header>
			<h3>Bienvenido</h3>
		</header>
		<section>
			<h4>Hola <?php echo $nombre;?></h4>
			<h5>Ingresaste como <?php echo $tipo;?></h5>
		</section>
    </main>
    <?php
        include_once("pie.html");
    ?>