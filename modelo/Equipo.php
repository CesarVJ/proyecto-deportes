<?php
class Equipo {
    private $claveEquipo;
    private $nombreEquipo;
    private $arrArticulos;	


    public function buscarTodos(){

    }

    public function getClaveEquipo(){
		return $this->claveEquipo;
	}

	public function setClaveEquipo($claveEquipo){
		$this->claveEquipo = $claveEquipo;
	}

	public function getNombreEquipo(){
		return $this->nombreEquipo;
	}

	public function setNombreEquipo($nombreEquipo){
		$this->nombreEquipo = $nombreEquipo;
	}
}


?>