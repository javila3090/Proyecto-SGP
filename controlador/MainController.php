<?php
    /**
    * Sistema de gestión de personal
    * Version 1.0
    * @author Ing. Julio Avila
    */
require_once "../seguridad/seguridad.php";
require_once "../modelo/MysqlAccess.php";

class MainController {
    var $invoco;
    var $invoco_alterno;
    
   function __construct(){
       $this->invoco= new MysqlAccess();
       $this->invoco_alterno= new MysqlAccess();
   }
    
   function cargarPersonas($array){
        $tabla="personas";
        $campos="nombres,apellidos,cedula,fnacimiento,telefono,correo,direccion,genero,estado_civil,hijos,grupo_sangre,nivel_academico,id_estatus";
        $originalDate = $array['fnacimiento'];
        $fnacimiento = date("Y-m-d", strtotime($originalDate));
        $valores ="'".$array['nombres']."','".$array['apellidos']."',".$array['cedula'].",'".$fnacimiento."','".$array['telefono']."','".$array['correo']."','".$array['direccion']."','".$array['genero']."','".$array['estadoCivil']."','".$array['hijos']."','".$array['grupoSangre']."','".$array['nivelAcademico']."','".$array['estatus']."'";
        $resultado = $this->invoco->Insertar($campos,$tabla,$valores,"cargarPersonas");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Insertó registro en la tabla ".$tabla." correspondiente a la cédula: ".$array['cedula'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");               
            return $resultado;
        }
        
   }
   
   function cargarUsuarios($array){
        $tabla="usuarios";
        $campos="nombres,apellidos,cedula,correo,username,password,id_grupo";
        $valores ="'".$array['nombres']."','".$array['apellidos']."',".$array['cedula'].",'".$array['correo']."','".$array['username']."','".MD5($array['password'])."','".$array['id_grupo']."'";
        $resultado = $this->invoco->Insertar($campos,$tabla,$valores,"cargarUsuarios");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Insertó registro en la tabla ".$tabla." correspondiente a la cédula: ".$array['cedula'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");     
            return $resultado;
        }
        
   }
   function cargarEvaluacion($array){
        $tabla="evaluaciones";
        $campos="id_persona,prueba_tecnica,prueba_psico,observaciones_psico,documentos,comentarios";
        $valores =$array['id'].",'".$array['prueba_psico']."','".$array['prueba_tecnica']."','".$array['observaciones_psico']."','".$array['documentos']."','".$array['comentarios'];
        $resultado = $this->invoco->Insertar($campos,$tabla,$valores,"cargarEvaluacion");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Insertó registro en la tabla ".$tabla." correspondiente al id_persona: ".$array['id'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");                 
            return $resultado;
        }
        
    }   
    
    function cargarCurso($array){
        $tabla="cursos";
        $campos="nombre,duracion,estatus";
        $valores ="'".$array['nombre']."',".$array['duracion'].",1";
        $resultado = $this->invoco->Insertar($campos,$tabla,$valores,"cargarCurso");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Insertó registro en la tabla ".$tabla." correspondiente al curso: ".$array['nombreCurso'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");                 
            return $resultado;
        }
        
    }   
    
    function cargarPlanificacionCurso($array){
        $tabla="programacion_cursos";
        $campos="fecha,id_curso";
        $fecha = date("Y-m-d", strtotime($array['fecha']));
        $valores ="'".$fecha."',".$array['id_curso'];
        $resultado = $this->invoco->Insertar($campos,$tabla,$valores,"cargarPlanificacionCurso");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Insertó registro en la tabla ".$tabla." correspondiente a la planificacion del curso: ".$array['id_curso'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");                 
            return $resultado;
        }
        
    } 
    
    function cargarParticipantesCurso($array){
        $tabla="participantes_cursos    ";
        $campos="id_prog_curso,id_persona";
        $valores ="'".$array['id_prog_curso']."',".$array['id_persona'];
        $resultado = $this->invoco->Insertar($campos,$tabla,$valores,"cargarParticipantesCurso");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Insertó registro en la tabla ".$tabla." correspondiente a la planificacion del curso: ".$array['id_curso'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");                 
            return $resultado;
        }
        
    }    
    
    //Actualizar registro
    function actualizarPersona($array){
        $tabla="personas";
        $originalDate = $array['fnacimiento'];
        $fnacimiento = date("Y-m-d", strtotime($originalDate));
        $campos="nombres='".$array['nombres']."',apellidos='".$array['apellidos']."',cedula='".$array['cedula']."',fnacimiento='".$fnacimiento."',telefono='".$array['telefono']."',correo='".$array['correo']."',direccion='".$array['direccion']."',genero='".$array['genero']."',grupo_sangre='".$array['grupoSangre']."',estado_civil='".$array['estadoCivil']."',nivel_academico='".$array['nivelAcademico']."',id_estatus='".$array['estatus']."',hijos='".$array['hijos']."'";
        $donde ="id='".$array['id']."'";
        $resultado = $this->invoco->Actualizar($tabla,$campos,$donde,"actualizarPersona");//echo"Resultado=";print_r($resultado);die;        
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Actualiz&oacute; registro en tabla ".$tabla." correspondiente al id: ".$array['id'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");
            return $resultado;
        }
        
    }
    
    function actualizarEvaluacion($array){
        $tabla="evaluaciones";
        $campos="prueba_psico='".$array['prueba_psico']."',prueba_tecnica='".$array['prueba_tecnica']."',observaciones_psico='".$array['observaciones_psico']."',comentarios='".$array['comentarios']."',documentos='".$array['documentos']."'";
        $donde ="id_persona='".$array['id']."'";
        $resultado = $this->invoco->Actualizar($tabla,$campos,$donde,"actualizarEvaluacion");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Actualizó registro en tabla ".$tabla." correspondiente al id: ".$array['id'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");            
            return $resultado;
        }
        
    }
    
    function actualizarPassword($password,$cedula){
        $tabla="usuarios";
        $campos="password='".MD5($password)."'";
        $donde ="cedula='".$cedula."'";
        $resultado = $this->invoco->Actualizar($tabla,$campos,$donde,"actualizarPassword");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Actualizó registro en tabla ".$tabla." correspondiente al password del registro atado a la cédula: ".$cedula;
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");   
            return $resultado;
        }
        
    }
    
    function resetearPassword($id){
        $tabla="usuarios";
        $campos="password='25d55ad283aa400af464c76d713c07ad'";
        $donde ="id='".$id."'";
        $resultado = $this->invoco->Actualizar($tabla,$campos,$donde,"resetearPassword");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Actualizó registro en tabla ".$tabla." correspondiente al password del registro con id: ".$id;
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");               
            return $resultado;
        }
        
    }    
	
    function actualizarUsuario($array){
        $tabla="usuarios";
        $campos="nombres='".$array['nombres']."',apellidos='".$array['apellidos']."',cedula='".$array['cedula']."',correo='".$array['correo']."',username='".$array['username']."',id_grupo=".$array['id_grupo'].",estatus=".$array['estatus'];
        $donde ="id='".$array['id']."'";
        $resultado = $this->invoco->Actualizar($tabla,$campos,$donde,"actualizarUsuario");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Actualizó registro en tabla ".$tabla." correspondiente al estatus del registro con id: ".$id;
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");               
            return $resultado;
        }
        
    }
    
    //Actualizar registro
    function actualizarCurso($array){
        $tabla="cursos";
        $campos="nombre='".$array['nombreCurso']."',duracion='".$array['duracion']."'";
        $donde ="id='".$array['id']."'";
        $resultado = $this->invoco->Actualizar($tabla,$campos,$donde,"actualizarCurso");//echo"Resultado=";print_r($resultado);die;        
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Actualiz&oacute; registro en tabla ".$tabla." correspondiente al id: ".$array['id'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");
            return $resultado;
        }
        
    }
    
    //Actualizar registro
    function actualizarPlanCurso($array){
        $tabla="cursos t1, programacion_cursos t2";
        $originalDate = $array['fecha'];
        $fechaCurso = date("Y-m-d", strtotime($originalDate));
        $campos="t1.nombre='".$array['nombreCurso']."',t1.duracion='".$array['duracion']."',t2.fecha='".$fechaCurso."'";
        $donde ="t1.id=t2.id_curso and t2.id='".$array['id']."'";
        $resultado = $this->invoco->Actualizar($tabla,$campos,$donde,"actualizarPlanCurso");//echo"Resultado=";print_r($resultado);die;        
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Actualiz&oacute; registro en tablas ".$tabla." correspondiente al id: ".$array['id'];
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");
            return $resultado;
        }
        
    }
    
    //muestra los datos consultados
    function consultaPersonas($cedula){
        $campos="*";
        $tabla="personas";
        $donde = "WHERE cedula=?";
        $resultado = $this->invoco->ConsultaPreparada($tabla,$campos,$donde,'i',array($cedula),"consultaPersonas");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
	
    //muestra los datos consultados
    function consultaReportePersona($cedula){
        $campos ="T1.id,T1.nombres, T1.apellidos, T1.cedula, T1.correo, T1.fnacimiento, T1.genero, T1.telefono, T1.direccion, T1.grupo_sangre,T1.estado_civil,T1.nivel_academico,T1.hijos,T2.documentos, T1.evaluado, T2.prueba_tecnica,T2.prueba_psico,T2.observaciones_psico,T2.comentarios";
        $tabla ="personas T1 LEFT JOIN evaluaciones T2 ON T1.id=T2.id_persona";
        $donde = "WHERE T1.cedula=?";
        $resultado = $this->invoco->ConsultaPreparada($tabla,$campos,$donde,'i',array($cedula),"consultaReportePersona");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
    
        //muestra los datos consultados
    function consultaEvaluacion($cedula){
        $campos="a.nombres,a.apellidos,a.cedula,b.id_persona,b.prueba_psico,b.prueba_tecnica,b.observaciones_psico,b.documentos,b.comentarios";
        $tabla="personas a INNER JOIN evaluaciones b";
        $donde = " ON a.id=b.id_persona WHERE a.cedula=?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'i',array($cedula),"consultaEvaluacion");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
    
    //muestra los datos consultados
    function consultaCursos($id){
        $campos="*";
        $tabla="cursos";
        $donde = "WHERE id=?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'i',array($id),"consultaCursos");
        if(count($resultado)>0){
            return $resultado;
        }     
    }
    
    //muestra los datos consultados
    function consultaPlanCursos($fecha){
        $fechaCurso = date("Y-m-d", strtotime($fecha));
        $campos="t1.nombre, t1.duracion, t2.id, t2.id_curso, t2.fecha";
        $tabla="cursos t1 INNER JOIN programacion_cursos t2 ON t1.id=t2.id_curso";
        $donde = " WHERE t2.fecha = ? and t1.estatus = ?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'si',array($fechaCurso,1),"consultaPlanCursos");                
        if(count($resultado)>0){
            return $resultado;
        }    
    }
    
    //muestra los datos consultados
    function consultaDetallesPlanCurso($id){
        $fechaCurso = date("Y-m-d", strtotime($fecha));
        $campos="t1.nombre, t1.duracion, t2.id, t2.id_curso, t2.fecha, t3.id_persona, t4.cedula, t4.nombres,t4.apellidos";
        $tabla="cursos t1 INNER JOIN programacion_cursos t2 ON t1.id=t2.id_curso LEFT JOIN participantes_cursos t3 ON t2.id=t3.id_prog_curso LEFT JOIN personas t4 ON t4.id=t3.id_persona";
        $donde = " WHERE t2.id = ?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'i',array($id),"consultaPlanCursos");                
        if(count($resultado)>0){
            return $resultado;
        }     
    }
    
    //muestra los datos consultados
    function consultaUsername($username){
        $campos="username";
        $tabla="usuarios";
        $donde = " WHERE username=?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'s',array($username),"consultaUsername");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
    
        //muestra los datos consultados
    function consultaPassword($password,$cedula){
        $campos="password";
        $tabla="usuarios";
        $donde = " WHERE password=? and cedula=?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'si',array(MD5($password),$cedula),"consultaPassword");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
	
    //muestra los datos consultados
    function consultaUsuario($id){
        $campos="*";
        $tabla="usuarios";
        $donde = " WHERE id=?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'i',array($id),"consultaUsuario");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
    
    //muestra los datos consultados
    function consultaUsuarioPorCedula($cedula){
        $campos="t2.pregunta";
        $tabla="usuarios t1 inner join preguntas_seguridad t2 ON t1.id_preg_seg=t2.id";
        $donde = " WHERE t1.cedula = ?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'i',array($cedula),"consultaUsuarioPorCedula");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }  

    //muestra los datos consultados
    function consultaRespuesta($respuesta,$cedula){
        $campos="*";
        $tabla="usuarios";
        $donde = " WHERE cedula = ? and respuesta_preg_seg = ?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'is',array($cedula,$respuesta),"consultaRespuesta");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }      
    
   //muestra los datos consultados
   function buscarPersonas($nombre){
        $campos="*";
        $tabla="personas";        
        if($nombre == ""){
            $nombre = "";
        }else{
            $nombre = "%".$nombre."%";
        }
        $donde = " WHERE (nombres LIKE '".$nombre."' or apellidos LIKE '".$nombre."') AND id_estatus=2";
        $resultado = $this->invoco->Consultar($tabla,$campos,$donde,"buscarPersonas");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
    
    //muestra los datos consultados
    function eliminarEvaluacion($id){
        $tabla="evaluaciones";
        $donde = "id_persona='".$id."'";
        $resultado = $this->invoco->Eliminar($tabla,$donde,"eliminarEvaluacion");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Eliminó registro en la tabla ".$tabla." correspondiente al id: ".$id;
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");                      
            return $resultado;
        }
        
    }
    
    function eliminarCurso($id){
        $tabla="cursos";
        $campos="estatus = 0";
        $donde ="id='".$id."'";
        $resultado = $this->invoco->Actualizar($tabla,$campos,$donde,"eliminarCurso");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Actualizó registro en tabla ".$tabla." correspondiente al estatus del curso atado al id: ".$id;
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");   
            return $resultado;
        }
        
    }
        
    //muestra los datos consultados
    function eliminarParticipante($id){
        $tabla="participantes_cursos";
        $donde = "id_persona='".$id."'";
        $resultado = $this->invoco->Eliminar($tabla,$donde,"eliminarParticipante");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Eliminó registro en la tabla ".$tabla." correspondiente al id_persona: ".$id;
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");                      
            return $resultado;
        }
        
    }
    
    //muestra los datos consultados
    function eliminarPlanCurso($id){
        $tabla="programacion_cursos";
        $donde = "id='".$id."'";
        $resultado = $this->invoco->Eliminar($tabla,$donde,"eliminarPlanCurso");//echo"Resultado=";print_r($resultado);die;
        if(count($resultado)>0){
            $fecha=date("Y-m-d H:i:s");  
            $usuario=$_SESSION['usuario'];
            $accion = "Eliminó registro en la tabla ".$tabla." correspondiente al id_curso: ".$id;
            $campos="fecha,usuario,accion";
            $valores="'".$fecha."','".$usuario."','".$accion."'";
            $tabla="bitacora";
            $this->invoco_alterno->insertarBitacora($tabla,$campos,$valores,"insertarBitacora");                      
            return $resultado;
        }
        
    }    
    
    function listarPersonas(){
        $campos="*";
        $tabla="personas";
        $donde = "";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'','',"listarPersonas");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
    
    function listarUsuarios(){
        $campos="id,nombres,apellidos,cedula,correo,username,id_grupo,estatus";
        $tabla="usuarios";
        $donde = "";        
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'','',"listarUsuarios");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }
    
    //muestra los datos consultados
    function ListarCursos(){
        $campos="*";
        $tabla="cursos";
        $donde = "where estatus = ?";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'i','1',"ListarCursos");
        if(count($resultado)>0){
            return $resultado;
        }
        
    } 
    
    //muestra los datos consultados
    function ListarCursosPlanificados(){
        $campos="t1.id, t1.fecha, t2.nombre, t2.duracion ";
        $tabla="programacion_cursos t1 INNER JOIN cursos t2 ON t1.id_curso = t2.id ";
        $donde = " WHERE t1.fecha > NOW() GROUP BY t1.fecha";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'','',"ListarCursosPlanificados");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }      
    
    //muestra los datos consultados
    function ListarCursosCulminados(){
        $campos="t1.id, t1.fecha, t2.nombre, t2.duracion ";
        $tabla="programacion_cursos t1 INNER JOIN cursos t2 ON t1.id_curso = t2.id ";
        $donde = " WHERE t1.fecha < NOW() GROUP BY t1.fecha";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'','',"ListarCursosPlanificados");
        if(count($resultado)>0){
            return $resultado;
        }
    } 
    
    //muestra los datos consultados
    function ListarPreguntas(){
        $campos="*";
        $tabla="preguntas_seguridad";
        $donde = " ";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'','',"ListarPreguntas");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }  
    
    function listarBitacora(){
        $campos="*";
        $tabla="bitacora ORDER BY fecha DESC";
        $donde = "";
        $resultado=$this->invoco->ConsultaPreparada($tabla,$campos,$donde,'','',"listarBitacora");
        if(count($resultado)>0){
            return $resultado;
        }
        
    }    
    
    function importarCsv($fname,$filename,$tipo,$tamanio){
        $tabla="personas";
        $campos="nombres,apellidos,cedula,fnacimiento,genero,telefono,correo,direccion,estado_civil,hijos,grupo_sangre,nivel_academico,id_estatus";
        
        //cargamos el archivo
        $lineas = file($filename);

        //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
        $i=0;
        //echo $tipo;
        //Recorremos el bucle para leer línea por línea
        foreach ($lineas as $linea_num => $linea)
        { 
           //abrimos bucle
           /*si es diferente a 0 significa que no se encuentra en la primera línea 
           (con los títulos de las columnas) y por lo tanto puede leerla*/
           if($i != 0) 
           { 
               //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
               /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
               leyendo hasta que encuentre un ; */
               $datos = explode(";",$linea);

               //Almacenamos los datos que vamos leyendo en una variable
               $nombre = trim($datos[0]);
               $apellidos = trim($datos[1]);
               $cedula = trim($datos[2]);
               $fnacimiento = trim($datos[3]);
               $sexo = trim($datos[4]);
               $telefono = trim($datos[5]);
               $correo = trim($datos[6]);
               $direccion = trim($datos[7]);
               $estadoCivil = trim($datos[8]);
               $hijos = trim($datos[9]);
               $tipoSangre = trim($datos[10]);
               $nivelAcademico = trim($datos[11]);
               $estatus = trim($datos[12]);
               //guardamos en base de datos la línea leida

               $resultado = $this->invoco->Insertar($campos,$tabla,"'".$nombre."','".$apellidos."','".$cedula."','".$fnacimiento."','".$sexo."','".$telefono."','".$correo."','".$direccion."','".$estadoCivil."','".$hijos."','".$tipoSangre."','".$nivelAcademico."',".$estatus,"importarCsv");

               //cerramos condición
           }

           /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
           entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
           $i++;
           //cerramos bucle
        }
        
        //if(count($resultado)>0){
            return $resultado;
        //}          
    }
}//end class
