<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
 
    require("../controlador/MainController.php");
    $eliminar = new MainController();
    $id=$_POST['id'];
    $metodo = $_POST['metodo'];
    $resultado = $eliminar -> $metodo($id);

    if($resultado=='ok'){
        echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro eliminado con éxito\", \"success\");});</script>";
    }else{
        echo "<script>jQuery(function(){swal(\"¡Error!\", \"El registro no fue eliminado\", \"error\");});</script>";
    }
?>