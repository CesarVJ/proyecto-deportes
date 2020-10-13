<?php

include_once("Equipo.php");
abstract class Articulo{
    protected $claveProducto;
    protected $nombre;
    protected $precio;
    protected $oEquipo;

    public abstract function buscar();

    public abstract function buscarTodos();

	public abstract function insertar();

	public abstract function modificar();

    public abstract function eliminar();


    public function getClaveProducto(){
		return $this->claveProducto;
	}

	public function setClaveProducto($claveProducto){
		$this->claveProducto = $claveProducto;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getOEquipo(){
		return $this->oEquipo;
	}

	public function setOEquipo($oEquipo){
		$this->oEquipo = $oEquipo;
	}



}

?>