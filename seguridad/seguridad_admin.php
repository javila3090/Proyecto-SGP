<?php

require_once "../controlador/Sesion.php";
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
$sesion = new Sesion();
$sesion -> timeOutSesion();
if ($sesion->validarSesion('31c9ZdX','1aF3#$f6e7')!=true) 
{ 
    //si no existe, va a la pagina de autenticacion
    header("Location: index.php");
    //salimos de este script
    exit();
    
}

if($sesion->validarPermiso($_SESSION['perm'])!=true){
        echo "<script language='javascript'>alert('No tiene permisos para entrar a este m\u00f3dulo');</script>";
        //si no existe, va a la pagina de autenticacion
        header("Location: index.php");
        //salimos de este script
        exit();
    
}

?>