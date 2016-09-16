<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
class Bitacora {
    
    private $id;
    private $usuario;
    private $fecha;
    private $accion;

    public function __construct(){

    }
    
    public function __set($var, $valor){
        // convierte a minúsculas toda una cadena la función strtolower
        $temporal = strtolower($var);
        // Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
        if (property_exists('Bitacora',$temporal)){
            $this->$temporal = $valor;
        }else{
            echo $var . " No existe.";
        }
    }

    public function __get($var){
        
        $temporal = strtolower($var);
        // Verifica que exista
        if (property_exists('Bitacora', $temporal)){
            return $this->$temporal;
        }       
        // Retorna nulo si no existe
        return NULL;
    }
    
    public function setFecha($fecha)
    {
        $fecha = date("d-m-Y h:m:s", strtotime($fecha));
        $this->fecha = $fecha;
    }
    
    public function getFecha()
    {
        return $this->fecha;
    }
}
