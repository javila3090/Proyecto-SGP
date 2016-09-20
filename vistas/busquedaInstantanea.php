<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    $actualizar = new MainController();
    $nombre = $_POST['b'];
    $resultado = $actualizar -> buscarPersonas($nombre);

    if($resultado!=0){
        foreach ($resultado as $valor) {
            $id=$valor['id'];
            $nombres=$valor['nombres'];
            $apellidos=$valor['apellidos'];
			echo "<input type=hidden name='".$id."' value='".$id."'/>";
            echo "<br><div class='col-md-4'>".$nombres." ".$apellidos."</div> <button type='button' value='".$id."' id='".$nombres." ".$apellidos."' class='btn-xs btn-primary'>Añadir</button><br><br>";
        }       
    }
?>