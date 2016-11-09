<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
class Persona {
    private $id;
    private $nombres;
    private $apellidos;
    private $cedula;
    private $fnacimiento;
    private $genero;
    private $telefono;
    private $correo;
    private $direccion;
    private $estado_civil;
    private $hijos;
    private $grupo_sangre;
    private $nivel_academico;
    private $estatus;
    private $evaluado;
    private $cargo;
    private $id_cargo;
    private $fecha_ingreso;
    
    public function __construct(){

    }
    
    public function __set($var, $valor){
        // convierte a minúsculas toda una cadena la función strtolower
        $temporal = strtolower($var);
        // Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
        if (property_exists('Persona',$temporal)){
            $this->$temporal = $valor;
        }else{
            echo $var . " No existe.";
        }
    }

    public function __get($var){
        
        $temporal = strtolower($var);
        // Verifica que exista
        if (property_exists('Persona', $temporal)){
            return $this->$temporal;
        }
        
        // Retorna nulo si no existe
        return NULL;
    }
    
    public function setFechaNacimiento($fnacimiento)
    {
        $fnacimiento = date("d-m-Y", strtotime($fnacimiento));
        $this->fnacimiento = $fnacimiento;
    }
    
    public function getFechaNacimiento()
    {
        return $this->fnacimiento;
    }
    
    public function setFechaIngreso($fecha_ingreso)
    {
        $fecha_ingreso = date("d-m-Y", strtotime($fecha_ingreso));
        $this->fecha_ingreso = $fecha_ingreso;
    }
    
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
    }
    
    public function setGenero($genero)
    {
        switch ($genero){
            case F:{
                $this->genero = "Femenino";
                break;
            }
            case M:{
                $this->genero = "Masculino";
                break;
            }
            default:
                $this->genero = "";
        }
    }
    
    public function getGenero()
    {
        return $this->genero;
    }
    
    public function setEstadoCivil($estado_civil)
    {
        switch ($estado_civil){
            case 1:{
                $this->estado_civil = "Soltero(a)";
                break;
            }
            case 2:{
                $this->estado_civil = "Casado(a)";
                break;
            }
            case 3:{
                $this->estado_civil = "Viudo(a)";
                break;
            }
            case 4:{
                $this->estado_civil = "Divorciado(a)";
                break;
            }
            default:
                $this->estado_civil = "";            
        }
    }
    
    public function getEstadoCivil()
    {
        return $this->estado_civil;
    } 
    
    public function setNivelAcademico($nivel_academico)
    {
        switch ($nivel_academico){
            case 1:{
                $this->nivel_academico = "Primaria";
                break;
            }
            case 2:{
                $this->nivel_academico = "Bachillerato";
                break;
            }
            case 3:{
                $this->nivel_academico = "Universitario";
                break;
            }
            case 4:{
                $this->nivel_academico = "Postgrado";
                break;
            }
            default:
                $this->nivel_academico = "";            
        }
    }
        
    public function getNivelAcademico()
    {
        return $this->nivel_academico;
    }
    
    public function setEstatus($estatus)
    {
        switch ($estatus){
            case 1:{
                $this->estatus = "Pre ingreso";
                break;
            }
            case 2:{
                $this->estatus = "Activo";
                break;
            }
            case 3:{
                $this->estatus = "Inactivo";
                break;
            }
            default:
                $this->nivel_academico = "";            
        }
    }
        
    public function getEstatus()
    {
        return $this->estatus;
    }    
    
    public function setTipoSangre($grupo_sangre)
    {
        switch ($grupo_sangre){
            case 1:{
                $this->grupo_sangre = "O-";
                break;
            }
            case 2:{
                $this->grupo_sangre = "O+";
                break;
            }
            case 3:{
                $this->grupo_sangre = "A-";
                break;
           }
           case 4:{
               $this->grupo_sangre = "A+";
               break;
           }
           case 5:{
               $this->grupo_sangre = "B-";
               break;
           }
           case 6:{
               $this->grupo_sangre = "B+";
               break;
           }
           case 7:{
               $this->grupo_sangre = "AB-";
               break;
           }
           case 8:{
               $this->grupo_sangre = "AB+";
               break;
           }
           default:
               $this->grupo_sangre = "";              
        }
    }
        
    public function getTipoSangre()
    {
        return $this->grupo_sangre;
    }     
        
}
