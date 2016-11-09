<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cargo
 *
 * @author Julio
 */
class Cargo {
    private $id;
    private $nombre;
    private $id_gerencia;
    private $nombre_gerencia;
    

    public function __construct(){

    }
    
    public function __set($var, $valor){
        // convierte a minúsculas toda una cadena la función strtolower
        $temporal = strtolower($var);
        // Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
        if (property_exists('Cargo',$temporal)){
            $this->$temporal = $valor;
        }else{
            echo $var . " No existe.";
        }
    }
    
    public function __get($var){
        
        $temporal = strtolower($var);
        // Verifica que exista
        if (property_exists('Cargo', $temporal)){
            return $this->$temporal;
        }
        
        // Retorna nulo si no existe
        return NULL;
    }
}
