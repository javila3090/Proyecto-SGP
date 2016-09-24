<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    $tipo = $_POST['tipo'];
    if($tipo==1)        
    {
        $registrar = new MainController();
        $metodo = $_POST['metodo'];
        $resultado = $registrar -> $metodo($_POST);
        if($resultado=='ok'){
            echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro guardado con éxito\", \"success\");});</script>";
        }else{
            echo "<script>jQuery(function(){swal(\"¡Error!\", \"El registro no pudo ser guardado, por favor verifique los datos ingresados y vuelva a intentarlo\", \"error\");});</script>";
        }
    }else if ($tipo==2){
        $validar = new MainController();
        $cedula=$_POST['cedula'];
        $validando = $validar -> consultaPersonas($cedula);
        if($validando == 0){
            $insertar = new MainController();
            $metodo = $_POST['metodo'];
            $resultado = $insertar -> $metodo($_POST);
            if($resultado=='ok'){
                echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro guardado con éxito\", \"success\");});</script>";
            }else{  
                echo "<script>jQuery(function(){swal(\"¡Error!\", \"El registro no pudo ser guardado, por favor verifique los datos ingresados y vuelva a intentarlo\", \"error\");});</script>";
            }
        }else{
            echo "<script>jQuery(function(){swal(\"¡Error!\", \"¡Un momento! El número de cédula ingresado ya se encuentra registrado en el sistema, por favor verifique y vuelva a intentarlo\", \"error\");});</script>";
        }
    }else if ($tipo==3){        
        $registrar = new MainController();
        $metodo = $_POST['metodo'];
        $originalDate = $_POST['fecha'];
        $fecha = date("Y-m-d", strtotime($originalDate));
        $hoy = date("Y-m-d");
        if($fecha>=$hoy){
            $resultado = $registrar -> $metodo($_POST);
            if($resultado=='ok'){
                echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro guardado con éxito\", \"success\");});</script>";
            }else{
                echo "<script>jQuery(function(){swal(\"¡Error!\", \"El registro no pudo ser guardado, por favor verifique los datos ingresados y vuelva a intentarlo\", \"error\");});</script>";
            }            
        }else{
            echo "<script>jQuery(function(){swal(\"¡Error!\", \"Está tratando de planificar un curso con una fecha pasada. Verifique y vuelva a intentarlo\", \"error\");});</script>";
        }
    }else if(!isset($tipo)){
        $fname = $_FILES['archivo']['name'];
        $filename = $_FILES['archivo']['tmp_name'];       
        $tipo = $_FILES['archivo']['type'];
        $tamanio = $_FILES['archivo']['size'];
        if ($tipo=='application/vnd.ms-excel'){
            $importar = new MainController();
            $resultado = $importar ->importarCsv($fname,$filename,$tipo,$tamanio);
            if($resultado=='ok'){
                echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro(s) cargado(s) con éxito\", \"success\");});</script>";
            }else{
                echo "<script>jQuery(function(){swal(\"¡Error!\", \"Los datos no fueron cargados. Por favor verifique la estructura del archivo o contacte al administrador del sistema\", \"error\");});</script>";   
            }
        }else{
            echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Solo se permiten archivos con extensión .csv\", \"error\");});</script>"; 
        }        
    }
?>