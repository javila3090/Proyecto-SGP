<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
         
    include ("../seguridad/seguridad.php");
    require("../controlador/MainController.php");
    require("../modelo/Curso.php");
    require("../modelo/Persona.php");
    $consultar = new MainController();
    $id=$_POST['id_curso'];
    $resultado = $consultar ->consultaDetallesPlanCurso($id);
    $curso = new Curso();
    foreach ($resultado as $valor) {
        $curso -> nombre=$valor['nombre'];
        $curso -> duracion =$valor['duracion'];
        $curso ->setFecha($valor['fecha']);
    }
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
            <div class="container">
                <div class="page-header">
                    <h4 class="" ><b>Detalles del curso</b></h4>
                </div>
                <div id="resultado"></div>
                <form class="col-md-12" id="formProgramarCurso" method="" role="registro">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Datos del curso</b></h3>
                        </div>
                        <div class="panel-body"> 
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Nombre del curso</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="curso" id="curso" value="<?php echo $curso -> nombre; ?>" readonly="readonly">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Duraci&oacute;n</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="duracion" id="duracion" value="<?php echo $curso -> duracion; ?>" readonly="readonly">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="control-label col-md-2">Fecha</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="fecha" id="fecha" value="<?php echo $curso -> getFecha(); ?>" readonly="readonly">
                                </div>
                            </fieldset>                                         
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Participantes</b></h3>
                        </div>
                        <div class="panel-body"> 
                        <?php
                            $i=0;
                            $persona = new Persona();
                            foreach ($resultado as $valor2) {
                                $persona->nombres=$valor2['nombres']." ".$valor2['apellidos'];
                            $i++;
                        ?>
                            <fieldset class="form-group">
                                <div class="col-md-5">
                                    <span><b><?php echo $i.". ".$persona->nombres;?></b></span>
                                    
                                </div>
                            </fieldset>
                        <?php
                            }               
                        ?> 
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </body>
</html>