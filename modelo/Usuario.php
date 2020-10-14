<?php
error_reporting(E_ALL);
include_once("AccesoDatos.php");

abstract class Usuario {
protected $claveUsuario;
protected $contrasenia;

	abstract public function buscarPorClave();

	abstract public function buscar();

	abstract public function buscarTodos();

	abstract public function insertar();

	abstract public function modificar();

	abstract public function eliminar();
	
    public function getClaveUsuario(){
       return $this->claveUsuario;
    }
	public function setClaveUsuario($valor){
       $this->claveUsuario = $valor;
    }
    
    public function getContrasenia(){
       return $this->contrasenia;
    }
	public function setContrasenia($valor){
       $this->contrasenia = $valor;
    }
}
?>