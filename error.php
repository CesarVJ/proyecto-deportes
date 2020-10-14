<?php
include_once("modelo/ErroresAplic.php");
session_start(); 
$oErr = new ErroresAplic();
include_once("modelo/ErroresAplic.php");
$inicio = "index.php";
$registro = "RegistroUsuarios.php";
$login = "login.php";
$numeroError = -1;
$claseCatalogo ="menu_opcion";
$claseSalir = "menu_inhab";
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
}
include_once("cabecera.html");
include_once("menu.php");
?>
		<main>
			<header>
				<h3>Error</h3>
			</header>
			<section>
				<h4>
					<?php 
						if (isset($_REQUEST["error"])){
							$oErr->setError($_REQUEST["error"]);
							echo $oErr->getTextoError();
						}else{
							echo "Otro error";
						}
					?>
				</h4>
			</section>
		</main>
<?php
include_once("pie.html");
?>