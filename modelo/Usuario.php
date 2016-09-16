<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
class Usuario {
    
    private $id;
    private $nombres;
    private $apellidos;
    private $cedula;
    private $username;
    private $password;
    private $correo;
    private $tipo;
    private $estatus;
    
    public function __construct(){

    }
    
    public function __set($var, $valor){
        // convierte a minúsculas toda una cadena la función strtolower
        $temporal = strtolower($var);
        // Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
        if (property_exists('Usuario',$temporal)){
            $this->$temporal = $valor;
        }else{
            echo $var . " No existe.";
        }
    }

    public function __get($var){
        
        $temporal = strtolower($var);
        // Verifica que exista
        if (property_exists('Usuario', $temporal)){
            return $this->$temporal;
        }  
        // Retorna nulo si no existe
        return NULL;
    }
    
    public function setTipo($tipo){
        switch ($tipo){
            case 1:{
                $this->tipo = "Administrador";
                break;
            }
            case 2:{
                $this->tipo = "Usuario";
                break;
            }
        }
    }
    
   public function getTipo(){
       return $this->tipo;
   }
   
   public function setEstatus($estatus){
        switch ($estatus){
            case 1:{
                $this->estatus = "Activo";
                break;
            }
            case 0:{
                $this->estatus = "Inactivo";
                break;
            }
        }
    }
    
   public function getEstatus(){
       return $this->estatus;
   }
}
