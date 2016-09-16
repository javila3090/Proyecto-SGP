<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
class Evaluacion {
    private $id;
    private $id_persona;
    private $prueba_tecnica;
    private $prueba_psico;
    private $observaciones_psico;
    private $documentos;
    private $comentarios;
    
    public function __construct(){

    }
    
    public function __set($var, $valor){
        // convierte a minúsculas toda una cadena la función strtolower
        $temporal = strtolower($var);
        // Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
        if (property_exists('Evaluacion',$temporal)){
            $this->$temporal = $valor;
        }else{
            echo $var . " No existe.";
        }
    }

    public function __get($var){
        
        $temporal = strtolower($var);
        // Verifica que exista
        if (property_exists('Evaluacion', $temporal)){
            return $this->$temporal;
        }
        // Retorna nulo si no existe
        return NULL;
    }
    
    public function setPruebaPsico($prueba_psico){
        switch ($prueba_psico){
            case 1:{
                $this->prueba_psico = "Aprobado(a)";
                break;
            }
            case 2:{
                $this->prueba_psico = "Reprobado(a)";
                break;
            }
            default:
                $this->prueba_psico = 'No ha sido evaluado';
        }        
    }
    
    public function getPruebaPsico(){
        return $this->prueba_psico;
    }
    
    public function setPruebaTecnica($prueba_tecnica){
        switch ($prueba_tecnica){
            case 1:{
                $this->prueba_tecnica = "Aprobado(a)";
                break;
            }
            case 2:{
                $this->prueba_tecnica = "Reprobado(a)";
                break;
            }
            default:
                $this->prueba_tecnica = 'No ha sido evaluado';
        }        
    }
    
    public function getPruebaTecnica(){
        return $this->prueba_tecnica;
    }

    public function setDocumentos($documentos){
        switch ($documentos){
            case 1:{
                $this->documentos = "Completa";
                break;
            }
            case 2:{
                $this->documentos = "Incompleta";
                break;
            }
            default:
                $this->documentos = $documentos;
        }        
    }
    
    public function getDocumentos(){
        return $this->documentos;
    }    

    public function setObservacionesPsico($observaciones_psico){
        if($observaciones_psico==''){
            $this->observaciones_psico = 'No ha sido evaluado';        
        }else{
            $this->observaciones_psico = $observaciones_psico; 
        }       
    }
    
    public function getObservacionesPsico(){
        return $this->observaciones_psico;
    }
    
    public function setComentarios($comentarios){
        if($comentarios==''){
            $this->comentarios = 'Sin observaciones';        
        }else{
            $this->comentarios = $comentarios; 
        }
    }
    
    public function getComentarios(){
        return $this->comentarios;
    } 
}
