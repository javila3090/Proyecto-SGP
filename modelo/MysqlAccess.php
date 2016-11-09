<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/Caracas');
require_once "Conexion.php"; 
require_once "../controlador/Logs.php";

class MysqlAccess extends Conexion{
    
        //var $link;   
        function __construct(){
            parent::__construct();
        }
	
	function Cerrar()
	{
            mysqli_close($this->mysqli);
	}
	
	function Insertar($campos,$tabla,$valores,$metodo)
	{
            $sql       = "INSERT INTO ".$tabla." (".$campos.")". " VALUES (".$valores.");";//echo("<br>".$sql."<br>");
            //echo $sql;
            $resultado = $this->mysqli->query($sql);
            if($resultado){
                $resultado="ok";
                $log = new myLog($metodo);
                $log->add($sql);
            }else{
                $resultado="no";
                $log = new myLog($metodo);
                $log->add($this->mysqli->error);
            }
            $this->mysqli->mysqli_free_result;
            return $resultado;
	}
	
        function Actualizar($tabla,$campos,$donde,$metodo)
	{
            
            $sql       = "UPDATE ".$tabla." SET ".$campos." WHERE ".$donde;//echo("<br>".$sql);
            //echo $sql;
            $resultado = $this->mysqli->query($sql);
            $rows=mysqli_affected_rows($this->mysqli);
            if($resultado){
                $resultado="ok";
            }else{
                $log = new myLog($metodo);
                $log->add($this->mysqli->error);
                $resultado="no";
            }
            $this->Cerrar();
            return $resultado;
	}
	
	function Eliminar($tabla,$donde,$metodo)
	{
            $sql       = "DELETE FROM ".$tabla." WHERE ".$donde;//die($sql);
            //echo $sql;
            $resultado = $this->mysqli->query($sql);
            if($resultado){
                $resultado="ok";
            }else{
                $log = new myLog($metodo);
                $log->add($this->mysqli->error);
                $resultado="no";
            }
            $this->Cerrar();
            return $resultado;
	}
	
	function Consultar($tabla,$campos,$donde,$metodo)
	{    
            $sql = "SELECT ".$campos." FROM ".$tabla." ".$donde." ";//die($sql);
            //echo $sql;
            $resultado = $this->mysqli->query($sql);
            if($resultado){
                while ($rows = $resultado->fetch_assoc())
                {
                   $result[] = $rows;
                }
                $resultado=$result;
                //print_r($resultado);
                $this->Cerrar();
                return $resultado;
            }else{
                $log = new myLog($metodo);
                $log->add($this->mysqli->error." sql ->".$sql);
                return 0;
            }
        }
        
        function ConsultaFuncion($funcion,$parametros)
	{
            $this->Conectar($this->servidor,$this->user,$this->password,$this->db);
            $sql = "SELECT ".$funcion."(".$parametros.") as resultado"; //echo("<br>".$sql);die;
            //echo("<br>".$sql);//die;
            $resultado = $mysqli->query($sql);
            if($resultado)
            {
            	while ($rows = $resultado->fetch_assoc())
		{
                    $resul[] = $rows;
		}
                //print_r($resul[0]['cedula']);
                //$resultado = $resul[0]['resultado'];
                $resultado=$resul;
		//	print_r($resultado);
		$this->Cerrar();
		return $resultado;
            }
            else
            {
		$this->Cerrar($this->link);
            	return ;
            } 
	}
        
        function insertarBitacora($tabla,$campos,$valores,$metodo){
            $sql       = "INSERT INTO ".$tabla." (".$campos.")". " VALUES (".$valores.");";//echo("<br>".$sql."<br>");
            //echo $sql;
            $resultado = $this->mysqli->query($sql);
            if($resultado){
                $resultado="ok";
            }else{
                if ( $this->mysqli->error ) {
                $log = new myLog($metodo);
                $log->add($this->mysqli->error);
                echo $this->mysqli->error;
                }
                $resultado="no";
            }
            //$resultado = ($resultado) ? "ok" : "no";//die("<br> error: ".pg_last_error($this->link));
            $this->Cerrar();
            return $resultado;
        }

        public function ConsultaPreparada($tabla,$campos,$donde,$types = null,$params = null,$metodo)
        {
            # creando setencias preparadas
            $sql = "SELECT ".$campos." FROM ".$tabla." ".$donde." ";//die($sql);
            //echo $sql;
            
            $stmt = $this->mysqli->prepare($sql);

            if($types&&$params)
            {
                $bind_names[] = $types;
                for ($i=0; $i<count($params);$i++) 
                {
                    $bind_name = 'bind' . $i;
                    $$bind_name = $params[$i];
                    $bind_names[] = &$$bind_name;
                }
                $return = call_user_func_array(array($stmt,'bind_param'),$bind_names);
            }

            # ejecutando query 
            $stmt->execute();
            
            $stmt->store_result();

            $rows=$stmt->num_rows;
            
            if($rows>0) {
                # guardando variables en un arreglo, similar a mysqli::fetch_assoc()
                $meta = $stmt->result_metadata(); 
                
                while ($field = $meta->fetch_field()) { 
                    $resultado[] = &$row[$field->name]; 
                } 

                call_user_func_array(array($stmt, 'bind_result'), $resultado); 

                while ($stmt->fetch()) { 
                    foreach($row as $key => $val) { 
                        $c[$key] = $val; 
                    } 
                    $hits[] = $c; 
                    $resultado = $hits;
                }
                
                return $resultado;
                
            } else {
                if ( $stmt->error ) {
                    $log = new myLog($metodo);
                    $log->add($stmt->error);
                }                
                return 0;
            }
            # close statement
            $this->Cerrar($stmt);
        }

}
?>
