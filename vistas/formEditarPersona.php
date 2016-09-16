<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
?>
<form id="formEditarPersona">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Editar registro</b></h3>
        </div>
        <div class="panel-body"> 
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $persona -> id; ?>">
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
                <label class="control-label col-md-2">Fecha Nacimiento<span class="mandatory">*</span></label>
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
            <fieldset class="form-group">
                <label class="control-label col-md-2">Hijos(as)</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="hijos" id="hijos" value="<?php echo $persona -> hijos; ?>" placeholder="" required>
                </div>
            </fieldset>                    
            <fieldset class="form-group">
                <label class="control-label col-md-2">Estado civil</label>
                <div class="col-md-3">
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
                <div class="col-md-3">
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
                <label class="control-label col-md-2">Nivel Acad&eacute;mico<span class="mandatory">*</span></label>
                <div class="col-md-3">
                    <select class="form-control" id="nivelAcademico" name="nivelAcademico">
                        <option value=''>Seleccione una opci&oacute;n</option>
                        <option <?php if ($persona -> getNivelAcademico() == 'Primaria' ) echo 'selected'; ?> value='1'>Primaria</option>
                        <option <?php if ($persona -> getNivelAcademico() == 'Bachillerato' ) echo 'selected'; ?> value='2'>Bachillerato</option>
                        <option <?php if ($persona -> getNivelAcademico() == 'Universitario' ) echo 'selected'; ?> value='3'>Universitario</option>
                        <option <?php if ($persona -> getNivelAcademico() == 'Postgrado' ) echo 'selected'; ?> value='4'>Postgrado</option>                                 
                    </select>
                </div>
            </fieldset>                 
            <fieldset class="form-group">
                <label class="control-label col-md-2">Estatus<span class="mandatory">*</span></label>
                <div class="col-md-3">
                    <select class="form-control" id="estatus" name="estatus" required>
                        <option value=''>Seleccione una opci&oacute;n</option>
                        <option <?php if ($persona -> getEstatus() == 'Pre ingreso' ) echo 'selected'; ?> value='1'>Pre ingreso</option>
                        <option <?php if ($persona -> getEstatus() == 'Activo' ) echo 'selected'; ?> value='2'>Activo</option>
                        <option <?php if ($persona -> getEstatus() == 'Inactivo' ) echo 'selected'; ?> value='3'>Inactivo</option>
                    </select>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <div class="col-md-12">
                    <hr>
                </div>
            </fieldset>                
            <fieldset class="form-group">
                <div class="col-md-2 col-md-offset-2">
                    <button type="submit" id="actualizar" class="btn btn-primary btn-block"><b>Actualizar</b></button>
                </div>
                <div class="col-md-2 col-md-offset-2">
                    <button type="button" id="cancelar" class="btn btn-primary btn-block"><b>Cancelar</b></button>
                </div>
            </fieldset>
        </div>
    </div>
</form>