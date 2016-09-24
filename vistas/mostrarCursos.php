<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    require("../modelo/Curso.php");
    $consultar = new MainController();
    $fecha=$_POST['fecha'];
    $resultado = $consultar -> consultaPlanCursos($fecha);
  ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">     
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.theme.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" /> 
    <script src="../js/jquery-3.0.0.min.js" type="text/javascript"></script>
    <script src="../js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../js/functions.js" type="text/javascript"></script>
    <script src="../js/jquery.validate.js" type="text/javascript"></script>
    <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
    <script src="../js/sweetalert.min.js" type="text/javascript"></script> 
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
                <p class="info">No hay registros coincidentes para la fecha seleccionada</p>
            </div>
        </div>
    </div>
    <?php
    }else{

    ?>     
    <div class="col-md-12">      
        <div id="resultado"></div>       
        <table id="table" style="width:100%" class="table table-responsive table-bordered" >
            <tr class="ui-widget-header">
                <td style="width:10%" align="center"><b>Fecha</b></td>
                <td style="width:auto" align="center"><b>Nombre del curso</b></td>
                <td style="width:auto" align="center"><b>Duraci&oacute;n</b></td>
                <!--<td style="width:auto" align="center"><b>N&uacute;mero de participantes</b></td>-->
                <td style="width:10%" align="center" colspan="5"><b>Opciones</b></td>
                <td style="width:10%" align="center" colspan="2"><b>Exportar</b></td>
            </tr>
            <?php
            $curso = new Curso();       
            foreach ($resultado as $valor) {
                $curso -> id =$valor['id'];
                $curso -> id_curso =$valor['id_curso'];
                $curso -> nombre =$valor['nombre'];
                $curso -> duracion =$valor['duracion'];
                $curso -> setFecha($valor['fecha']);
            ?>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $curso -> id; ?>">            
            <tr>
            <?php 
            echo
                '<td align="center">'.$curso ->getFecha().'</td>
                <td align="center">'.$curso -> nombre.'</td>
                <td align="center">'.$curso -> duracion.' Horas</td>';?>              
                <td align="center"><img title="Ver detalles" id="" onclick="enviarDatos(<?php echo $curso -> id; ?>,'../vistas/formDetallesCurso.php',2);return false;" src="../images/detalles.png" style="cursor: pointer;"></img></td>
                <td align="center"><img title="Editar" onclick="enviarDatos(<?php echo $curso -> id; ?>,'../vistas/formEditarPlanCursos.php',2);return false;" id="editar" src="../images/editar.png" style="cursor: pointer;"></img></td>
                <td align="center"><img title="Eliminar" id="<?php echo $curso -> id; ?>" class="btn-delete-plan-curso" src="../images/eliminar.png" style="cursor: pointer;"></img></td>
                <td align="center"><img title="Agregar participantes" id="<?php echo $curso -> id; ?>" onclick="enviarDatos(<?php echo $curso -> id; ?>,'../vistas/formAddParticipantes.php',2);return false;" src="../images/agregar.png" style="cursor: pointer;"></img></td>
                <td align="center"><img title="Borrar participantes" id="<?php echo $curso -> id; ?>" onclick="enviarDatos(<?php echo $curso -> id; ?>,'../vistas/formDropParticipantes.php',2);return false;" src="../images/borrar.png" style="cursor: pointer;"></img></td>
                <td align="center"><img onclick="ExportCursoToPdf(<?php echo $curso -> id; ?>)" title="Descargar en PDF" id="pdf" src="../images/pdf.png" style="cursor: pointer;"/></td>
                <td align="center"><img onclick="ExportCursoToExcel(<?php echo $curso -> id; ?>)" title="Descargar en Excel" id="pdf" src="../images/excel.png" style="cursor: pointer;"/></td>
            </tr>
       <?php }//end foreach
    }
?>       
        </table>
    </div>
</div>
</body>
</html>