<?php 
    /**
    * Sistema de gestión de personal
    * Version 1.0
    * @author Ing. Julio Avila
    */
require_once "../controlador/Logs.php";

class Conexion 
{ 
    protected $mysqli; 

    public function __construct() 
    { 
        $this->mysqli = new mysqli('127.0.0.1', 'root', 'kaiser3090', 'reclutamiento_y_gestion'); 

        if ( $this->mysqli->connect_error ) 
        { 
            $error = "Fallo al conectar a MySQL: ". $this->mysqli->connect_error; 
            $log = new myLog("Conexion");
            $log->add($error);
            return $error;     
        } 

        $this->mysqli->set_charset('utf-8'); 
        
    } 
} 
?> 