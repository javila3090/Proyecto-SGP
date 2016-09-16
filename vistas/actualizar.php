<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    $actualizar = new MainController();
    $tipo = $_POST['tipo'];
    if($tipo == 1)
    {
        $metodo = $_POST['metodo'];
        $resultado = $actualizar -> $metodo($_POST);
        if($resultado=='ok')
        {
            echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro actualizado con éxito\", \"success\");});</script>";
        }else{
            echo "<script>jQuery(function(){swal(\"¡Error!\", \"El registro no fue actualizado\", \"error\");});</script>";
        }
    }else if($tipo==2){
        $id=$_POST['id'];
        $metodo = $_POST['metodo'];
        $resultado = $actualizar -> $metodo($id);
        if($resultado=='ok'){
            echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Contraseña restablecida con éxito\", \"success\");});</script>";
        }else{
            echo "<script>jQuery(function(){swal(\"¡Error!\", \"La operación solicitada no pudo ser realizada\", \"error\");});</script>";
        }
    }else{
        $passwordActual=$_POST['passwordActual'];
        $passwordNuevo=$_POST['passwordNuevo'];    
        $cedula=$_SESSION['cedula'];
        $validar = new MainController();
        $validando = $validar -> consultaPassword($passwordActual,$cedula);
        if($validando != 0){
            $actualizar = new MainController();
            $metodo = $_POST['metodo'];
            $resultado = $actualizar -> $metodo($passwordNuevo,$cedula);            
            if($resultado=='ok'){
                echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Cambio de contraseña realizado con éxito\", \"success\");});</script>";
            }else{
                echo "<script>jQuery(function(){swal(\"¡Error!\", \"El registro no fue actualizado\", \"error\");});</script>";
            }
        }else{
            echo "<script>jQuery(function(){swal(\"¡Error!\", \"¡Un momento! La contraseña actual no coincide con la registrada en la base de datos, por favor verifique y vuelva a intentarlo\", \"error\");});</script>";
        }  
    }
?>