<?php
    /**
    * Sistema de gestión de personal
    * Version 1.0
    * @author Ing. Julio Avila
    */

require_once "../modelo/MysqlAccess.php";

class IngresoSistema{
    var $invoco;
    function __construct(){
        $this->invoco= new MysqlAccess();
    }

    function ingresoSistema($array){
        $tabla="usuarios";
        $campos="*";
        $donde="where username=? and password=? and estatus=?";
        if(isset($array['password']) and isset($array['usuario'])){
            $password = $array['password'];
            $username = $array['usuario'];
            $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'ssi',array($username,MD5($password),1),"ingresoSistema");
            //echo"<pre>";print_r($resultado);echo"</pre>";die;
            if($resultado!=0){
                return $resultado;
            }  
        }else{
            return 0;
        }
    }
}//end class
?>