<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require "../controlador/MainController.php";
    require "../modelo/Persona.php";
    require "../modelo/Curso.php";

    //Exportar datos de php a Excel
    header('Content-Encoding: UTF-8');
    header("Content-type: application/vnd.ms-excel; charset=UTF-8");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=Reporte_".$_GET['id'].".xls");

    $consultar = new MainController();
    $id=$_GET['id'];
    $resultado = $consultar ->consultaDetallesPlanCurso($id);

?>

<table id="table" style="width:100%" border="1" class="table table-responsive table-bordered" >
    <tr class="ui-widget-header">
        <td style="width:10%" align="center" colspan="3"><b>DATOS CURSO</b></td>
    </tr>
    <tr class="ui-widget-header">
        <td style="width:10%" align="center"><b>Nombre</b></td>
        <td style="width:auto" align="center"><b><?php echo utf8_decode('Duración');?></b></td>
	<td style="width:auto" align="center"><b>Fecha</b></td>
    </tr>
    <?php
        if($resultado!=0){
            $persona = new Persona();
            $curso = new Curso();
            foreach ($resultado as $valor) {
                $curso -> id=$valor['id'];
                $curso -> nombre=$valor['nombre'];
		$curso -> duracion=$valor['duracion'];
                $curso -> setFecha($valor['fecha']);
            }
				
        echo '
        <tr>
            <td align="center">'.$curso -> nombre.'</td>
            <td align="center">'.$curso -> duracion.'</td>
            <td align="center">'.$curso -> getFecha().'</td>
        </tr>';
        ?>
        <tr bgcolor="white"><td colspan="3"></td></tr>
        <tr class="ui-widget-header">
            <td style="width:10%" align="center" colspan="3"><b>ASISTENTES</b></td>
	</tr>
        <?php 
            foreach ($resultado as $valor2) {
                $persona -> id = $valor2['id_persona'];
                $persona -> nombres = $valor2['nombres'];
                $persona -> apellidos = $valor2['apellidos'];
                $nombrePersona = $persona -> nombres." ".$persona -> apellidos;
                echo '
                <tr>
                    <td align="center" colspan="3">'.$nombrePersona.'</td>								
                </tr>';
                            }//end foreach
        }else{
            echo 
                '<tr>
                    <td align="center" colspan="12"><b>No hay resultados para mostrar</b></td>
                </tr>
                <tr bgcolor="white"><td colspan="12"></td></tr>';
        }
    ?>       
</table>