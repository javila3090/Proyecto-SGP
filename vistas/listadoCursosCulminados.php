<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */         
    require_once("../controlador/MainController.php");
    require_once("../modelo/Curso.php");
    $consultar = new MainController();
    $resultado = $consultar -> ListarCursosCulminados();
?>
<div class="container">
    <div class="page-header">
        <h3 class="title">Cursos realizados</h3>
    </div>
    
    <div id="table-cursos">
        <table id="listado" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr class="ui-widget-header">
                    <th style="width:5%;" align="center"><b>Nº</b></th>
                    <th style="width:10%;" align="center"><b>Fecha</b></th>
                    <th style="width:15%;" align="center"><b>Duraci&oacute;n</b></th>                    
                    <th style="width:auto;" align="center"><b>Curso</b></th>
                    <th style="width:10%; text-align: center" align="center"><b>Detalles</b></th>
                    <!--<th style="width:5%;" align="center"><b>Editar</b></th>
                    <th style="width:10%; text-align: center" align="center"><b>Editar</b></th>
                    <th style="width:10%; text-align: center" align="center"><b>Eliminar</b></th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                if($resultado!=0){
                $curso = new Curso();
                $i = 0;
                    foreach ($resultado as $valor) {
                        $curso -> id = $valor['id'];
                        $curso -> nombre = $valor['nombre'];
                        $curso -> duracion = $valor['duracion'];
                        $curso -> setFecha($valor['fecha']);
                        $i++;
                        echo '
                <tr>
                    <td align="center">'.$i.'</td>
                    <td align="center">'.$curso -> getFecha().'</td>                        
                    <td align="center">'.$curso -> duracion.' horas</td>
                    <td align="center">'.$curso -> nombre.'</td>';?>
                    <td align="center"><img title="Ver detalles" id="" onclick="enviarDatos(<?php echo $curso -> id; ?>,'../vistas/formDetallesCurso.php',6);return false;" src="../images/detalles.png" style="cursor: pointer;"></img></td>
                    <!--<td align="center"><img title="Editar" onclick="enviarDatos(<?php echo $curso -> id; ?>,'../vistas/formEditarPlanCursos.php',6);return false;" id="editar" src="../images/editar.png" style="cursor: pointer;"></img></td>                    
                    <td align="center"><img title="Ver detalles" id="" onclick="enviarDatos(<?php echo $curso -> id; ?>,'../vistas/formDetallesCurso.php',6);return false;" src="../images/detalles.png" style="cursor: pointer;"></img></td>
                    <td align="center"><img title="Editar" onclick="enviarDatos(<?php echo $curso -> id; ?>,'../vistas/formEditarPlanCursos.php',6);return false;" id="editar" src="../images/editar.png" style="cursor: pointer;"></img></td>
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $curso -> id; ?>">
                    <td align="center"><img title="Eliminar" id="<?php echo $curso -> id; ?>" class="btn-delete-plan-curso" src="../images/eliminar.png" style="cursor: pointer;"></img></td>
                    <td align="center"><img onclick="ExportCursoToPdf(<?php echo $curso -> id; ?>)" title="Descargar en PDF" id="pdf" src="../images/pdf.png" style="cursor: pointer;"/></td>
                    <td align="center"><img onclick="ExportCursoToExcel(<?php echo $curso -> id; ?>)" title="Descargar en Excel" id="pdf" src="../images/excel.png" style="cursor: pointer;"/></td>-->
                </tr>
                  <?php       
                        }//end foreach
                    }
                  ?>   
            </tbody>
        </table>
    </div>
    <div id="editCurso"></div>
</div>