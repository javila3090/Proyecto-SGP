<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
    require_once("../controlador/MainController.php");
    require_once("../modelo/Cargo.php");
    
?>
<div class="container">
    <div class="page-header">
        <h3 class="title">Registrar persona</h3>
    </div>
    <div id="resultado"></div>
    <form class="" id="formPersona" method="" role="registro">
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
                        <input type="text" class="form-control" name="nombres" id="nombres" placeholder="" title="Introduzca el nombre completo">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Apellidos<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder=""  title="Introduzca los apellidos">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">C&eacute;dula<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" size="10" maxlength="10" name="cedula" id="cedula" placeholder=""  title="Introduzca el número de cédula">
                        <div id="validacion"></div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Fecha nacimiento<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="fnacimiento" id="fnacimiento" placeholder="dd-mm-aaaa"  title="Introduzca fecha de nacimiento">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Tel&eacute;fono<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="telefono" id="telefono" title="Introduzca un número de teléfono" placeholder="0000-0000000">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Correo<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="correo" id="correo" placeholder=""  title="Introduzca un correo válido">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Direcci&oacute;n<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <textarea class="form-control" id="direccion" name="direccion" rows="3"  title="Introduzca una dirección"></textarea>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Sexo<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <select class="form-control" id="genero" name="genero" required>
                            <option value=''>Seleccione una opci&oacute;n</option>
                            <option value='F'>Femenino</option>
                            <option value='M'>Masculino</option>
                        </select>
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
                    <label class="control-label col-md-2">Estado civil</label>
                    <div class="col-md-6">
                        <select class="form-control" id="estadoCivil" name="estadoCivil">
                            <option value=''>Seleccione una opci&oacute;n</option>
                            <option value='1'>Soltero(a)</option>
                            <option value='2'>Casado(a)</option>
                            <option value='3'>Viudo(a)</option>
                            <option value='4'>Divorciado(a)</option>                                 
                        </select>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Hijos (as)</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" size="2" maxlength="2" name="hijos" id="hijos" placeholder=""  title="Introduzca el número de hijos">
                    </div>
                </fieldset>                                                
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Grupo sangu&iacute;neo</label>
                    <div class="col-md-6">
                        <select class="form-control" id="grupoSangre" name="grupoSangre">
                            <option value=''>Seleccione una opci&oacute;n</option>
                            <option value='1'>O-</option>
                            <option value='2'>O+</option>
                            <option value='3'>A-</option>
                            <option value='4'>A+</option>
                            <option value='5'>B-</option>
                            <option value='6'>B+</option>
                            <option value='7'>AB-</option>
                            <option value='8'>AB+</option>                                    
                        </select>
                    </div>
                </fieldset>    
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Nivel acad&eacute;mico<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <select class="form-control" id="nivelAcademico" name="nivelAcademico">
                            <option value=''>Seleccione una opci&oacute;n</option>
                            <option value='1'>Primaria</option>
                            <option value='2'>Bachillerato</option>
                            <option value='3'>Universtario</option>
                            <option value='4'>Postgrado</option>                                  
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
                            <option value='1'>Pre ingreso</option>
                            <option value='2'>Activo</option>
                            <option value='3'>Inactivo</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="form-group" id="fechaIngresoBox" style="display:none">
                    <label class="control-label col-md-2">Fecha ingreso<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="fecha_ingreso" id="fecha_ingreso" placeholder="dd-mm-aaaa"  title="Introduzca fecha de ingreso a la empresa" disabled="disabled">
                    </div>
                </fieldset>                   
                <fieldset class="form-group" id="cargoBox" style="display:none">
                    <label class="control-label col-md-2">Cargo<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <select class="form-control" id="cargo" name="cargo" disabled="disabled" required>
                            <option value=''>Seleccione una opci&oacute;n</option>                                   
                            <?php
                            $consultar = new MainController();
                            $resultado = $consultar -> listarCargos();
                            $cargo = new Cargo();
                            foreach ($resultado as $valor) {
                                $cargo -> id=$valor['id'];
                                $cargo -> nombre=$valor['nombre'];                            
                            
                                echo "<option value=".$cargo -> id.">".$cargo -> nombre."</option>";                                       
                            }
                            ?>
                        </select>
                    </div>
                </fieldset>             
            </div>
        </div>        
        <fieldset class="form-group col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
            <div class="">
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </div>
        </fieldset>
    </form>
</div>