<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
         
    include ("../seguridad/seguridad.php");
    require("../controlador/MainController.php");
    require("../modelo/Curso.php");
    $consultar = new MainController();
    $resultado = $consultar -> listarCursos();
?>
    
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
    
    <head>
        <title>Sistema de gesti&oacute;n de personal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.theme.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" />      
        <script src="../js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../js/functions.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
        <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>  
    </head>
    <body>
        <?php
            include("../utilidades/menu.php");
        ?>       
        <div class="container-fluid"> 
            <div class="row">
                <div class="container">
                    <div class="page-header">
                        <h3 class="title">Planificar curso</h3>
                    </div>
                    <div id="resultado"></div>
                    <form class="col-md-12" id="formProgramarCurso" method="" role="registro">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Datos del curso</b></h3>
                            </div>
                            <div class="panel-body"> 
                                <fieldset class="form-group">
                                    <div class="">
                                        <p class="info" style="text-align: left;"><b>Campos marcados con <span class="mandatory">*</span> son obligatorios</b></p>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label class="control-label col-md-2">Nombre del curso<span class="mandatory">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="id_curso" name="id_curso">
                                            <option value=''>Seleccione una opci&oacute;n</option>                                   
                                            <?php
                                            $curso = new Curso();
                                            foreach ($resultado as $valor) {
                                                 $curso -> id=$valor['id'];
                                                 $curso -> nombre=$valor['nombre'];
                                                 ?>
                                                     <option value='<?php echo $curso -> id; ?>'><?php echo $curso -> nombre; ?></option>                                        
                                             <?php
                                             }
                                            ?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label class="control-label col-md-2">Fecha<span class="mandatory">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="fecha" id="fecha" placeholder="dd-mm-aaaa"  title="Introduzca fecha a programar">
                                    </div>
                                </fieldset>                                         
                            </div>
                        </div>
                        <!--<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Datos de participantes</b></h3>
                            </div>
                            <div class="panel-body"> 
                                <fieldset class="form-group">
                                    <div class="">
                                        <p class="info" style="text-align: left;"><b><span class="mandatory">*</span> Debe seleccionar al menos un participante</b></p>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label class="control-label col-md-2">Buscar personas<span class="mandatory">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder=""  title="Introduzca el nombre">
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
                        </div>   -->                 
                        <fieldset class="form-group">
                            <div class="form-group col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">Planificar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    <footer>
        <div class="panel-footer">
        <?php include "../utilidades/footer.php"; ?>
        </div>
    </footer>
</body>
</html>