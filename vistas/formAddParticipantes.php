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
        $curso -> id = $valor['id'];
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
        <form id="formEditarPlanCurso" method="" role="registro" >
            <div class="panel panel-default panel-collapse">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Datos del curso</b></h3>
                </div>
                <div class="panel-body"> 
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Nombre del curso<span class="mandatory">*</span></label>
                        <div class="col-md-8">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">
                            <input type="text" class="form-control" name="nombreCurso" id="nombreCurso" value="<?php echo $curso -> nombre;?>" readonly>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Duraci&oacute;n<span class="mandatory">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="duracion" id="duracion" value="<?php echo $curso -> duracion;?>" readonly>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Fecha<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="fechaCursoPlan" placeholder="dd-mm-aaaa" id="fechaCursoPlan" value="<?php echo $curso -> getFecha();?>" readonly>
                        </div>
                    </fieldset>                                         
                </div>
            </div>          
        </form>
        <form id="formAddParticipantes" method="" role="registro">
            <input type="hidden" class="form-control" name="id_prog_curso" id="id_prog_curso" value="<?php echo $curso -> id;?>">
            <input type="hidden" class="form-control" name="fecha" id="fecha" value="<?php echo $curso -> getFecha();?>">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Buscar personas</b></h3>
                </div>
                <div class="panel-body"> 
                    <fieldset class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder=""  title="Introduzca el número de cédula">
                            <br>
                            <div id="instaResultado" class="panel panel-default " style="background-color: #ececec;"></div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="col-md-12">
                            <div id="listaPersonas"></div>
                        </div>
                    </fieldset> 
                </div>
            </div>
            <fieldset class="form-group col-md-4 col-md-offset-4">
                <div class="">
                    <button type="submit" class="btn btn-primary btn-block">A&ntilde;adir</button>
                </div>
            </fieldset>   
        </form>
    </div>
</div>
