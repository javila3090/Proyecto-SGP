<?php
    /**
    * Sistema de gestión de personal
    * Version 1.0
    * @author Ing. Julio Avila
    */
//error_reporting(E_ALL);
class Sesion {
    
    function __construct(){
       if(!isset($_SESSION)){
           session_start();
       }
    }

    public function crearSesion($nombre, $valor) {
        $_SESSION[$nombre] = $valor;
    }//end

    public function validarSesion($nombre,$valor) {
        if ($_SESSION[$nombre] == $valor) {
            return true;
        } else {
            return false;
        }//end if
    }//end
    
   public function validarPermiso($perm) {
        if ($_SESSION['perm'] == 1) {
            return true;
        } else {
            return false;
        }//end if
    }//end

    public function borrarVarSesion($nombre) {
        unset ($_SESSION[$nombre]);
    }

    public function borrarSesion() {
        $_SESSION = array();
        session_destroy ();
    }
    public function timeOutSesion(){
        if (isset($_SESSION["LAST_ACTIVITY"])) {
            if (time() - $_SESSION["LAST_ACTIVITY"] > 100) {
                // last request was more than 30 minutes ago
                session_unset();     // unset $_SESSION variable for the run-time 
                session_destroy();   // destroy session data in storage
            } else if (time() - $_SESSION["LAST_ACTIVITY"] > 60) {
                $_SESSION["LAST_ACTIVITY"] = time(); // update last activity time stamp
            }
        }
    }
}//end class
?>