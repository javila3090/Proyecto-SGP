<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    require("../modelo/Evaluacion.php");
    require("../modelo/Persona.php");
    $consultar = new MainController();
    $cedula=$_POST['cedula'];
    $resultado = $consultar ->consultaEvaluacion($cedula);
  ?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.theme.min.css" />
        <script src="../js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../js/functions.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
        <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="row">
<?php
    if($resultado==0){
    ?>
            <div class="col-md-5">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Notificaci&oacute;n</b></h3>
                    </div>
                    <div class="panel-body">
                        <p class="info">Esta persona no ha sido evaluada</p>
                    </div>
                </div>
            </div>
    <?php
    }else{
        $evaluacion = new Evaluacion();
        $persona = new Persona();
        foreach ($resultado as $valor) {
            $persona -> nombres=$valor['nombres'];
            $persona -> apellidos=$valor['apellidos'];
            $persona -> cedula=$valor['cedula'];
            $evaluacion -> id_persona=$valor['id_persona'];
            $evaluacion -> setPruebaPsico($valor['prueba_psico']);
            $evaluacion -> setPruebaTecnica($valor['prueba_tecnica']);
            $evaluacion -> observaciones_psico=$valor['observaciones_psico'];
            $evaluacion -> comentarios=$valor['comentarios']; 
            $evaluacion -> setDocumentos($valor['documentos']); 
    ?>     
            <div class="col-md-12">
                <div class="panel panel-info col-md-2" id="exportar">
                    <div class="panel-body info">		
                        <img onclick="ExportToPdf()" title="Descargar en PDF" id="pdf" src="../images/pdf.png" style="cursor: pointer;"></img>  |  <img  onclick="ExportToExcel()" title="Descargar en Excel" id="excel" src="../images/excel.png" style="cursor: pointer;"/>
                    </div>
                </div>        
                <div style="display:none" id="modal-confirmation" title="Alerta">El registro seleccionado se eleminar&aacute; de forma permanente. ¿Desea continuar?</div>
                <table id="table" style="width:100%" class="table table-responsive table-bordered" >
                    <tr class="ui-widget-header">
                        <td style="width:10%" align="center"><b>Nombres</b></td>
                        <td style="width:auto" align="center"><b>Apellidos</b></td>
                        <td style="width:auto" align="center"><b>C&eacute;dula</b></td>
                        <td style="width:auto" align="center"><b>Evaluaci&oacute;n t&eacute;cnica</b></td>
                        <td style="width:auto" align="center"><b>Evaluaci&oacute;n psicol&oacute;gica</b></td>
                        <td style="width:auto" align="center"><b>Observaciones psic&oacute;logo</b></td>
                        <td style="width:auto" align="center"><b>Documentaci&oacute;n</b></td>
                        <td style="width:auto" align="center"><b>Observaciones generales</b></td>
                        <td style="width:10%" align="center" colspan="2"><b>Opciones</b></td>
                    </tr>
                        
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $evaluacion -> id_persona; ?>">
                    <input type="hidden" class="form-control" name="id" id="cedula" value="<?php echo $persona -> cedula; ?>">
                    <?php
                            echo '
                            <tr>
                                <td align="center">'.$persona -> nombres.'</td>
                                <td align="center">'.$persona -> apellidos.'</td>
                                <td align="center">'.$persona -> cedula.'</td>
                                <td align="center">'.$evaluacion -> getPruebaTecnica().'</td>
                                <td align="center">'.$evaluacion -> getPruebaPsico().'</td>
                                <td align="center">'.$evaluacion -> observaciones_psico.'</td>
                                <td align="center">'.$evaluacion -> getDocumentos().'</td>
                                <td align="center">'.$evaluacion -> comentarios.'</td>
                                <td align="center"><img title="Editar" id="editarEval" src="../images/editar.png" style="cursor: pointer;"></img></td>
                                <td align="center"><img title="Eliminar" id="'.$evaluacion -> id_persona.'" class="btn-delete-evaluacion" src="../images/eliminar.png" style="cursor: pointer;"></img></td>
                            </tr>';
                        }//end foreach
                    }
                ?>       
                </table>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br>
                <div id="resultado"></div>
                <div id="editar-evaluacion" style="display: none">
                    <?php include "formEditarEvaluacion.php" ?>            
                </div>
            </div>
        </div>
    </body>
</html>