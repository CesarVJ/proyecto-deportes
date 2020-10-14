<?php
include_once("../modelo/Administrador.php");
include_once("../modelo/Cliente.php");
session_start();
$nErr="";
$oUsuario=new Cliente();
$sCadJson = "";
$nombre="";

if (isset($_REQUEST["claveUsr"]) && !empty($_REQUEST["claveUsr"]) &&
		isset($_REQUEST["txtPwd"]) && !empty($_REQUEST["txtPwd"])){
		try{
            $oUsuario->setClaveUsuario($_REQUEST["claveUsr"]);
            $oUsuario->setContrasenia($_REQUEST["txtPwd"]);
            if($oUsuario->buscarPorClave()){
                $_SESSION["sNomFirmado"] = $oUsuario->getNombreCompleto();
				$_SESSION["sTipoFirmado"] = "Cliente";
            }else{
                $oUsuario = new Administrador();
				$oUsuario->setClaveUsuario($_REQUEST["claveUsr"]);
				$oUsuario->setContrasenia($_REQUEST["txtPwd"]);
				if ($oUsuario->buscarPorClave()){
					$_SESSION["sNomFirmado"] = $oUsuario->getNombreAdmin();
					$_SESSION["sTipoFirmado"] = "Administrador";
				}else 
					$nErr = "Usuario Desconocido";
            }
        }catch(Exception $error){
            error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
        }
}else{
    $nErr = "faltan datos";
}

if ($nErr==""){
    $sCadJson = '{
        "success": true,
        "status": "ok",
        "data":{
            "nombre":"'.$_SESSION["sNomFirmado"].'",
            "tipo":"'.$_SESSION["sTipoFirmado"].'"
        }
    }';
}else{
    $sCadJson = '{
        "success": false,
        "status": "",
        "data":{}
    }';
}
header('Content-type: application/json');
echo $sCadJson;



?>