<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
    session_start();
    require_once "../controlador/Sesion.php";
    require_once "../controlador/IngresoSistema.php";
    require_once "../controlador/Logs.php";

    $ingreso = new IngresoSistema();
    $sesion = new Sesion();
    $resultado = $ingreso ->ingresoSistema($_POST);//die;
    if($resultado!=0){     
        foreach ($resultado as $valor) {
            $sesion->crearSesion('nombre', $valor['nombres']);
            $sesion->crearSesion('apellido', $valor['apellidos']);
            $sesion->crearSesion('cedula', $valor['cedula']);
            $sesion->crearSesion('perm', $valor['id_grupo']);
            $sesion->crearSesion('usuario', $valor['username']);
            $sesion->crearSesion('31c9ZdX', '1aF3#$f6e7');
        }//end foreach
        $url = "Location: ../inicio/";
        header($url);
    }else{
        $sesion->crearSesion('error','Usuario y/o contraseña inválidos');  
        $url = "Location: ../";
        header($url);
    }

?>