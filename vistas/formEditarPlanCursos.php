<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
         
    include ("../seguridad/seguridad.php");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<?php
    require("../controlador/MainController.php");
    require("../modelo/Persona.php");
    require("../modelo/Curso.php");
    $consultar = new MainController();
    $id=$_POST['id_curso'];
    $resultado = $consultar -> consultaDetallesPlanCurso($id);
    $curso = new Curso();
    foreach ($resultado as $valor) {
        $curso -> id_curso = $valor['id_curso'];
        $curso -> nombre = $valor['nombre'];
        $curso -> setFecha($valor['fecha']);
        $curso -> duracion = $valor['duracion'];
    }
?>
    
<div class="row">
    <div class="container">
        <div id="resultado" style="display: none"></div>
        <hr>
        <form class="" id="formEditarPlanCurso" method="" role="registro" >
            <div class="panel panel-default panel-collapse">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Actualizar datos del curso</b></h3>
                </div>
                <div class="panel-body"> 
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Nombre del curso<span class="mandatory">*</span></label>
                        <div class="col-md-8">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">
                            <input type="text" class="form-control" name="nombreCurso" id="nombreCurso" value="<?php echo $curso -> nombre;?>">
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Duraci&oacute;n<span class="mandatory">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="duracion" id="duracion" value="<?php echo $curso -> duracion;?>">
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Fecha<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="fechaCursoPlan" placeholder="dd-mm-aaaa" id="fechaCursoPlan" value="<?php echo $curso -> getFecha();?>">
                        </div>
                    </fieldset>                                         
                </div>
            </div>
            <fieldset class="form-group col-md-8 col-md-offset-2">
                <div class="col-md-6 col-xs-6">
                    <button type="submit" id="actualizar" class="btn btn-primary btn-block"><b>Actualizar</b></button>
                </div>
                <div class="col-md-6 col-xs-6">
                    <button type="button" id="cancelar" class="btn btn-danger btn-block">Cancelar</button>
                </div>
            </fieldset>         
        </form>
    </div>   
</div>