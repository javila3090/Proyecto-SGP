<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
    require_once("../seguridad/seguridad.php");
    require("../controlador/MainController.php");
    require("../modelo/Persona.php");
    require("../modelo/Evaluacion.php");
    $consultar = new MainController();
    $ced=$_POST['cedula'];
    $resultado = $consultar ->consultaReportePersona($ced);
  ?>
<html>
    <head>
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
<?php
if($resultado==0){
?>
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Notificaci&oacute;n</b></h3>
                    </div>
                    <div class="panel-body">
                        <p class="info">N&uacute;mero de c&eacute;dula no registrado</p>
                    </div>
                </div>
            </div>
        </div>
<?php
}else{
    $persona = new Persona();
    $evaluacion = new Evaluacion();
        
    foreach ($resultado as $valor) {
            $persona -> id=$valor['id'];
            $persona -> nombres=$valor['nombres'];
            $persona -> apellidos=$valor['apellidos'];
            $persona -> cedula=$valor['cedula'];
            $persona -> setFechaNacimiento($valor['fnacimiento']);
            $persona -> correo=$valor['correo'];
	    $persona -> evaluado=$valor['evaluado'];
            $persona -> telefono=$valor['telefono'];
            $persona -> direccion=$valor['direccion'];
	    $persona -> setTipoSangre($valor['grupo_sangre']);
	    $persona -> setEstadoCivil($valor['estado_civil']);
            $persona -> setGenero($valor['genero']);            
            $evaluacion ->setDocumentos($valor['documentos']);
	    $evaluacion ->setPruebaTecnica($valor['prueba_tecnica']);
	    $evaluacion ->setPruebaPsico($valor['prueba_psico']);
	    $evaluacion ->setObservacionesPsico($valor['observaciones_psico']);
	    $evaluacion ->setComentarios($valor['comentarios']);
    }
?>       
        <div class="row">
            <div class="col-md-12">
                <br>
                <div id="resultado"></div>
                <form id="formEvaluacion" action="">        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Datos personales</b></h3>
                        </div>
                        <div class="panel-body">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $persona -> id; ?>">
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Nombres:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $persona -> nombres;  ?>" disabled>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Apellidos:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $persona -> apellidos; ?>" disabled>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">C&eacute;dula:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $persona -> cedula; ?>" disabled>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <?php
                        if($persona -> evaluado!=1){
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Evaluaci&oacute;n Psicol&oacute;gica</b></h3>
                        </div>
                        <div class="panel-body">
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Aprobado:</label>
                                <div class="col-md-5">
                                    <select class="form-control" id="prueba_psico" name="prueba_psico" required>
                                        <option value=''>Seleccione una opci&oacute;n</option>
                                        <option value='1'>Si</option>
                                        <option value='2'>No</option>
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Observaciones psicólogo:</label>
                                <div class="col-md-10">
                                    <div class="">
                                        <textarea class="form-control" id="observaciones_psico" name="observaciones_psico" rows="4"  title="Comentarios/Observaciones"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Evaluaci&oacute;n T&eacute;nica</b></h3>
                        </div>
                        <div class="panel-body">
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Aprobado:</label>
                                <div class="col-md-5">
                                    <select class="form-control" id="prueba_tecnica" name="prueba_tecnica" required>
                                        <option value=''>Seleccione una opci&oacute;n</option>
                                        <option value='1'>Si</option>
                                        <option value='2'>No</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Informaci&oacute;n adicional</b></h3>
                        </div>
                        <div class="panel-body">
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Observaciones generales:</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="comentarios" name="comentarios" maxlength="150" rows="4"  title="Máximo 150 caracteres"></textarea>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Documentaci&oacute;n requerida:</label>
                                <div class="col-md-5">
                                    <select class="form-control" id="documentos" name="documentos" required>
                                        <option value=''>Seleccione una opci&oacute;n</option>
                                        <option value='1'>Completa</option>
                                        <option value='2'>Incompleta</option>
                                    </select>
                                </div>
                            </fieldset>                    
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <fieldset class="form-group">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block"><b>Registrar</b></button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="cancelar_form_evaluacion" class="btn btn-primary btn-block"><b>Cancelar</b></button>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
    }else{
?>  
    </form>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-warning" id="mensaje">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Evaluaci&oacute;n cargada</b></h3>
            </div>
            <div class="panel-body">
                <fieldset class="form-group ">
                    <div class="col-md-12">
                        <p><h5>Ya fueron cargados al sistema los resultados de esta persona, si desea actualizar algún registro por favor haga clic sobre el botón editar.</h5></p></br>         
                        <button type="button" id="editarEval" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-edit"></span> <b>Editar</b>
                        </button>
                    </div>
                </fieldset>
            </div>
        </div>
        <?php
            }
        ?>
        <div id="editar-evaluacion" style="display: none">
            <?php include "formEditarEvaluacion.php" ?>            
        </div>
    </div>
</div>
<?php
} 
?>
</body>
</html>