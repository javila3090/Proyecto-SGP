<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
    require ("../seguridad/seguridad.php");
    require_once("../controlador/MainController.php");
    require_once("../modelo/Persona.php");
    require_once("../modelo/Cargo.php");
    $consultar = new MainController();
    $cedula=$_POST['cedula'];
    $resultado = $consultar -> consultaPersonas($cedula);
    $persona = new Persona();
    foreach ($resultado as $valor) {
        $persona -> id = $valor['id'];
        $persona -> nombres = $valor['nombres'];
        $persona -> apellidos = $valor['apellidos'];
        $persona -> cedula = $valor['cedula'];
        $persona -> setFechaNacimiento($valor['fnacimiento']);
        $persona -> correo = $valor['correo'];
        $persona -> telefono = $valor['telefono'];
        $persona -> direccion = $valor['direccion'];
        $persona -> setTipoSangre($valor['grupo_sangre']);
        $persona -> setEstadoCivil($valor['estado_civil']);
        $persona -> setGenero($valor['genero']);
        $persona -> setEstatus($valor['id_estatus']);
        $persona -> setNivelAcademico($valor['nivel_academico']);
        $persona -> hijos = $valor['hijos'];
        $persona -> cargo = $valor['cargo'];
        $persona -> id_cargo = $valor['id_cargo'];
        $persona ->setFechaIngreso($valor['fecha_ingreso']);
    }
?>
<html>
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
        <form id="formEditarPersona" role="registro">
            <div class="page-header">
                <h3 class="title">Editar registro</h3>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $persona -> id; ?>">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Datos personales</b></h3>
                </div>
                <div class="panel-body"> 
                    <fieldset class="form-group">
                        <div class="col-md-6">
                            <p class="info" style="text-align: left;"><b>Campos marcados con <span class="mandatory">*</span> son obligatorios</b></p>
                        </div>
                    </fieldset>                
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Nombres<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $persona -> nombres; ?>" placeholder="">
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Apellidos<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $persona -> apellidos; ?>" placeholder="" required>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">C&eacute;dula<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $persona -> cedula; ?>" placeholder="" required>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Fecha nacimiento<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="fnacimiento" id="fnacimiento" placeholder="dd-mm-aaaa" value="<?php echo $persona ->getFechaNacimiento(); ?>"  title="Introduzca fecha de nacimiento">
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Sexo<span class="mandatory">*</span></label>
                        <div class="col-md-3">
                            <select class="form-control" id="genero" name="genero" required>
                                <option value=''>Seleccione una opci&oacute;n</option>
                                <option <?php if ($persona ->getGenero() == 'Femenino' ) echo 'selected'; ?> value='F'>Femenino</option>
                                <option <?php if ($persona ->getGenero() == 'Masculino' ) echo 'selected'; ?> value='M'>Masculino</option>
                            </select>
                        </div>
                    </fieldset>   
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Tel&eacute;fono<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $persona -> telefono; ?>" placeholder="" required>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Correo<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="correo" id="correo" value="<?php echo $persona -> correo; ?>" placeholder="" required>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Direcci&oacute;n<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="direccion" name="direccion"  rows="2" required><?php echo trim($persona -> direccion); ?></textarea>
                        </div>
                    </fieldset> 
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Información relevante</b></h3>
                </div>
                <div class="panel-body">
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Hijos(as)</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="hijos" id="hijos" value="<?php echo $persona -> hijos; ?>" placeholder="" required>
                        </div>
                    </fieldset>                    
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Estado civil</label>
                        <div class="col-md-6">
                            <select class="form-control" id="estadoCivil" name="estadoCivil">
                                <option value=''>Seleccione una opci&oacute;n</option>
                                <option <?php if ($persona -> getEstadoCivil() == 'Soltero(a)' ) echo 'selected'; ?> value='1'>Soltero(a)</option>
                                <option <?php if ($persona -> getEstadoCivil() == 'Casado(a)' ) echo 'selected'; ?> value='2'>Casado(a)</option>
                                <option <?php if ($persona -> getEstadoCivil() == 'Viudo(a)' ) echo 'selected'; ?> value='3'>Viudo(a)</option>
                                <option <?php if ($persona -> getEstadoCivil() == 'Divorciado(a)' ) echo 'selected'; ?> value='4'>Divorciado(a)</option>                                 
                            </select>
                        </div>
                    </fieldset>                
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Grupo sangu&iacute;neo</label>
                        <div class="col-md-6">
                            <select class="form-control" id="grupoSangre" name="grupoSangre">
                                <option value=''>Seleccione una opci&oacute;n</option>
                                <option <?php if ($persona -> getTipoSangre() == 'O-' ) echo 'selected'; ?> value='1'>O-</option>
                                <option <?php if ($persona -> getTipoSangre() == 'O+' ) echo 'selected'; ?> value='2'>O+</option>
                                <option <?php if ($persona -> getTipoSangre() == 'A-' ) echo 'selected'; ?> value='3'>A-</option>
                                <option <?php if ($persona -> getTipoSangre() == 'A+' ) echo 'selected'; ?> value='4'>A+</option>
                                <option <?php if ($persona -> getTipoSangre() == 'B-' ) echo 'selected'; ?> value='5'>B-</option>
                                <option <?php if ($persona -> getTipoSangre() == 'B+' ) echo 'selected'; ?> value='6'>B+</option>
                                <option <?php if ($persona -> getTipoSangre() == 'AB-' ) echo 'selected'; ?> value='7'>AB-</option>
                                <option <?php if ($persona -> getTipoSangre() == 'AB+' ) echo 'selected'; ?> value='8'>AB+</option>                                    
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Nivel acad&eacute;mico<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" id="nivelAcademico" name="nivelAcademico">
                                <option value=''>Seleccione una opci&oacute;n</option>
                                <option <?php if ($persona -> getNivelAcademico() == 'Primaria' ) echo 'selected'; ?> value='1'>Primaria</option>
                                <option <?php if ($persona -> getNivelAcademico() == 'Bachillerato' ) echo 'selected'; ?> value='2'>Bachillerato</option>
                                <option <?php if ($persona -> getNivelAcademico() == 'Universitario' ) echo 'selected'; ?> value='3'>Universitario</option>
                                <option <?php if ($persona -> getNivelAcademico() == 'Postgrado' ) echo 'selected'; ?> value='4'>Postgrado</option>                                 
                            </select>
                        </div>
                    </fieldset>   
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Información laboral</b></h3>
                </div>
                <div class="panel-body">
                    <fieldset class="form-group">
                        <label class="control-label col-md-2">Estatus<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" id="estatus" name="estatus" required>
                                <option value=''>Seleccione una opci&oacute;n</option>
                                <option <?php if ($persona -> getEstatus() == 'Pre ingreso' ) echo 'selected'; ?> value='1'>Pre ingreso</option>
                                <option <?php if ($persona -> getEstatus() == 'Activo' ) echo 'selected'; ?> value='2'>Activo</option>
                                <option <?php if ($persona -> getEstatus() == 'Inactivo' ) echo 'selected'; ?> value='3'>Inactivo</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="form-group" id="fechaIngresoBox" style="display:none">
                        <label class="control-label col-md-2">Fecha ingreso<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="fecha_ingreso" id="fechaIngresoEditar" placeholder="dd-mm-aaaa"  title="Introduzca fecha de ingreso a la empresa" value="<?php echo $persona -> getFechaIngreso();?>">
                        </div>
                    </fieldset>                   
                    <fieldset class="form-group" id="cargoBox" style="display:none">
                        <label class="control-label col-md-2">Cargo<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" id="id_cargo" name="id_cargo" required>
                                <option value='<?php echo $persona -> id_cargo;?>' selected><?php echo $persona -> cargo;?></option>                                   
                            <?php
                                
                            $resultado = $consultar -> listarCargos();
                            $cargo = new Cargo();
                            foreach ($resultado as $valor) {
                                $cargo -> id=$valor['id'];
                                $cargo -> nombre=$valor['nombre'];                            
                                if($persona -> id_cargo != $cargo -> id)  {
                                echo "<option value=".$cargo -> id.">".$cargo -> nombre."</option>";    
                                }
                                    
                            }
                            ?>
                            </select>
                        </div>
                    </fieldset>             
                </div>
            </div>
            <fieldset class="form-group">
                <div class="col-md-12">
                    <hr>
                </div>
            </fieldset> 
            <fieldset class="form-group">
                <div class="col-md-2 col-md-offset-3 col-xs-6">
                    <button type="submit" id="actualizar" class="btn btn-primary btn-block">Actualizar</button>
                </div>
                <div class="col-md-2 col-md-offset-2 col-xs-6">
                    <button type="button" id="cancelar" class="btn btn-danger btn-block">Cancelar</button>
                </div>
            </fieldset>
        </form>
    </body>
</html>