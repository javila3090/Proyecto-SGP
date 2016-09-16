<?php
include ("../seguridad/seguridad.php");
require_once("../controlador/Validaciones.php");

$variable=$_POST['variable'];
$tipoVal=$_POST['tipoVal'];

function validaciones($variable,$tipoVal){
    $validar = new Validaciones();
    switch ($tipoVal){
        case 1:{
            $resultado = $validar -> validarUsuario($variable);
            echo $resultado;
            break;
        }
        case 2:{
            $cedula=$_SESSION['cedula'];
            $resultado = $validar -> validarPassword($variable,$cedula);
            echo $resultado;
            break;
        }
        case 3:{
            $resultado = $validar -> validarCedula($variable);
            echo $resultado;
            break;
        }    
        case 4:{
            $resultado = $validar -> validarCedula($variable,$cedula);
            echo $resultado;
            break;
        }         
    } 
    return $resultado;
}

validaciones($variable,$tipoVal);

?>