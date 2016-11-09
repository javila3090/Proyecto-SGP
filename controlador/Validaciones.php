<?php
class Validaciones{
    var $consulta;
    function __construct(){
        require_once("../controlador/MainController.php");
        $this->consulta = new MainController();
    }

    function validarUsuario($username){
        $resultado = $this->consulta->consultaUsername($username);
        if($resultado!=0){
           $mensaje="<div style='color:red;'><img height='16' src='../images/error.png'> Nombre de usuario no disponible</div>";
           //echo $mensaje;
        }else{
           $mensaje="<div style='color:green;'><img height='16' src='../images/accept.png'> Nombre de usuario disponible</div>"; 
           //echo $mensaje;
        }
        return $mensaje;
    }
    
    function validarPassword($password,$cedula){
        $resultado = $this->consulta->consultaPassword($password,$cedula);
        if($resultado!=0){
           $mensaje="<div style='color:green;'><img height='16' src='../images/accept.png'> La contrase&ntilde;a ingresada coincide con la registrada</div>";
           //echo $mensaje;
        }else{
           $mensaje="<div style='color:red;'><img height='16' src='../images/error.png'> La contrase&ntilde;a ingresada no coincide con la registrada</div>"; 
           //echo $mensaje;
        }
        return $mensaje;
    }

    function validarCedula($cedula){
        $resultado = $this->consulta->consultaPersonas($cedula);
        if($resultado!=0){
           $mensaje="<div style='color:red;'><img height='16' src='../images/error.png'> Esta cédula de identidad ya se encuentra registrada en el sistema</div>";
           //echo $mensaje;
        }/*else{
           $mensaje="<div style='color:red;'><img height='16' src='../images/error.png'> Esta cédula de identidad no se encuentra registrada en el sistema</div>";
        }*/
        return $mensaje;
    }     
}//end class
?>