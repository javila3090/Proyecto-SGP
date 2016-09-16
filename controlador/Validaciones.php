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
           $mensaje="<div style='color:red;'><img height='16' src='../images/error.png'> Este nombre de usuario no está disponible</div>";
           //echo $mensaje;
        }else{
           $mensaje="<div style='color:green;'><img height='16' src='../images/accept.png'> Este nombre de usuario está disponible</div>"; 
           //echo $mensaje;
        }
        return $mensaje;
    }
    
    function validarPassword($password,$cedula){
        $resultado = $this->consulta->consultaPassword($password,$cedula);
        if($resultado!=0){
           $mensaje="<div style='color:green;'><img height='16' src='../images/accept.png'> El password ingresado coincide con el registrado</div>";
           //echo $mensaje;
        }else{
           $mensaje="<div style='color:red;'><img height='16' src='../images/error.png'> El password ingresado no coincide con el registrado</div>"; 
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
    function validarRespuesta($respuesta){
        $resultado = $this->consulta->consultaRespuesta($respuesta);
        if($resultado!=0){
           $mensaje="<div style='color:red;'><img height='16' src='../images/error.png'> La respuesta es incorrecta</div>";
           //echo $mensaje;
        }
        return $mensaje;
    }     
}//end class
?>