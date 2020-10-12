<?php 
class AccesoDatos{
    private $conexion = null;

    function conectar(){
        $bandera = false;
        try{
            $this->oConexion = new PDO("mysql:host=localhost:3307;dbname=deportes1","productos","productos1",  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")); 

        }catch(Exception $error){
            throw $error;
        }
        return $bandera;
    }
}
?>