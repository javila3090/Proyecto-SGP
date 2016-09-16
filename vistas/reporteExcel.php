<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
    require "../controlador/MainController.php";
    require "../modelo/Persona.php";
    require "../modelo/Evaluacion.php";
    //Exportar datos de php a Excel
    header('Content-Encoding: UTF-8');
    header("Content-type: application/vnd.ms-excel; charset=UTF-8");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=Reporte_".$_GET['cedula'].".xls");


    $consultar = new MainController();
    $cedula=$_GET['cedula'];
    $resultado = $consultar ->consultaReportePersona($cedula);

?>
        <table id="table" style="width:100%" border="1" class="table table-responsive table-bordered" >
            <tr class="ui-widget-header">
                <td style="width:10%" align="center" colspan="12"><b>DATOS PERSONALES</b></td>
            </tr>
            <tr class="ui-widget-header">
                <td style="width:10%" align="center"><b>Nombres</b></td>
                <td style="width:auto" align="center"><b>Apellidos</b></td>
                <td style="width:auto" align="center"><b><?php echo utf8_decode('Cédula');?></b></td>
		<td style="width:auto" align="center"><b>F. Nacimiento</b></td>
		<td style="width:auto" align="center"><b>Sexo</b></td>
		<td style="width:auto" align="center"><b>Estado Civil</b></td>
                <td style="width:auto" align="center"><b>Hijos(as)</b></td>
		<td style="width:auto" align="center"><b>Tipo Sangre</b></td>
                <td style="width:auto" align="center"><b>Correo</b></td>
                <td style="width:auto" align="center"><b>Nivel <?php echo utf8_decode('académico');?></b></td>
                <td style="width:auto" align="center"><b><?php echo utf8_decode('Teléfono');?></b></td>
                <td style="width:auto" align="center"><b><?php echo utf8_decode('Dirección');?></b></td>
            </tr>
 
            <?php
                if($resultado!=0){
                    $persona = new Persona();
                    $evaluacion = new Evaluacion();
                    foreach ($resultado as $valor) {
                        $persona -> id=$valor['id'];
                        $persona -> nombres=$valor['nombres'];
			$persona -> apellidos=$valor['apellidos'];
			$persona -> cedula=$valor['cedula'];
			$persona -> setFechaNacimiento($valor['fnacimiento']);
			$persona -> correo=$valor['correo'];
			$persona -> telefono=$valor['telefono'];
			$persona -> direccion=$valor['direccion'];
			$persona -> setTipoSangre($valor['grupo_sangre']);
			$persona -> setEstadoCivil($valor['estado_civil']);
			$persona -> setGenero($valor['genero']);
                        $persona -> setNivelAcademico($valor['nivel_academico']);
                        $persona -> hijos=$valor['hijos'];                        
			$evaluacion -> setDocumentos($valor['documentos']);
			$evaluacion -> setPruebaTecnica($valor['prueba_tecnica']);
			$evaluacion -> setPruebaPsico($valor['prueba_psico']);
                        $evaluacion -> setObservacionesPsico($valor['observaciones_psico']);
			$evaluacion -> setComentarios($valor['comentarios']);
				
                            echo '
                            <tr>
                                <td align="center">'.utf8_decode($persona -> nombres).'</td>
                                <td align="center">'.utf8_decode($persona -> apellidos).'</td>
                                <td align="center">'.$persona -> cedula.'</td>
				<td align="center">'.$persona -> getFechaNacimiento().'</td>
				<td align="center">'.$persona -> getGenero().'</td>
				<td align="center">'.$persona -> getEstadoCivil().'</td>
                                <td align="center">'.$persona -> hijos.'</td>
				<td align="center">'.utf8_decode($persona -> getTipoSangre()).'</td>
                                <td align="center">'.utf8_decode($persona -> correo).'</td>
                                <td align="center">'.$persona -> getNivelAcademico().'</td>
                                <td align="center">'.$persona -> telefono.'</td>
                                <td align="center">'.utf8_decode($persona -> direccion).'</td>
                            </tr>';
                            ?>
                                <tr bgcolor="white"><td colspan="12"></td></tr>
                                <tr class="ui-widget-header">
                                    <td style="width:10%" align="center" colspan="12"><b>RESULTADOS</b></td>
				</tr>
				<tr class="ui-widget-header">
                                    <?php
                                    echo '
                                    <td style="width:auto" align="center" colspan="2"><b>'.utf8_decode("Evaluación técnica").'</b></td>
                                    <td style="width:auto" align="center" colspan="2"><b>'.utf8_decode("Evaluación piscológica").'</b></td>
                                    <td style="width:auto" align="center" colspan="2"><b>'.utf8_decode("Documentación").'</b></td>
                                    <td style="width:auto" align="center" colspan="3"><b>'.utf8_decode("Observaciones psicólogo").'</b></td>
                                    <td style="width:auto" align="center" colspan="3"><b>Observaciones generales</b></td>';
                                    ?>
				</tr>
                            <?php 
                            echo '
                            <tr>
                                <td align="center" colspan="2">'.$evaluacion -> getPruebaTecnica().'</td>
                                <td align="center" colspan="2">'.$evaluacion -> getPruebaPsico().'</td>
                                <td align="center" colspan="2">'.$evaluacion -> getDocumentos().'</td>                                
                                <td align="center" colspan="3">'.utf8_decode($evaluacion -> getObservacionesPsico()).'</td>
                                <td align="center" colspan="3">'.utf8_decode($evaluacion -> getComentarios()).'</td>								
                            </tr>
                            <tr bgcolor="white"><td colspan="12"></td></tr>';
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