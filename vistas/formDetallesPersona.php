<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
?>
<div class="panel panel-default" id="">   
    <div class="panel-heading">
        <h3 class="panel-title"><b>Detalles del registro</b></h3>
    </div>
    <div class="panel-body" id=""> 
        <fieldset class="form-group">
            <label class="control-label col-md-2">Nombres</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $persona -> nombres; ?>" placeholder="" disabled>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">Apellidos</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $persona -> apellidos; ?>" placeholder="" disabled>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">C&eacute;dula</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $persona -> cedula; ?>" placeholder="" disabled>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">Fecha Nacimiento</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="fnacimiento" id="fnacimiento" value="<?php echo $persona -> getFechaNacimiento(); ?>"  disabled>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">Sexo</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="sexo" id="sexo" value="<?php echo $persona -> getGenero(); ?>"   disabled>
            </div>
        </fieldset>   
        <fieldset class="form-group">
            <label class="control-label col-md-2">Tel&eacute;fono</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $persona -> telefono; ?>" placeholder="" disabled>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">Correo</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="correo" id="correo" value="<?php echo $persona -> correo; ?>" placeholder="" disabled>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">Direcci&oacute;n</label>
            <div class="col-md-6">
                <textarea class="form-control" id="direccion" name="direccion"  rows="2" disabled><?php echo trim($persona -> direccion); ?></textarea>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">Nivel Acad&eacute;mico</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="nivelAcademico" id="nivelAcademico" value="<?php echo $persona -> getNivelAcademico(); ?>" disabled>
            </div>
        </fieldset>            
        <fieldset class="form-group">
            <label class="control-label col-md-2">Grupo sangu&iacute;neo</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="tipoSangre" id="tipoSangre" value="<?php echo $persona -> getTipoSangre(); ?>" disabled>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">Estado civil</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="estadoCivil" id="estadoCivil" value="<?php echo $persona -> getEstadoCivil(); ?>" disabled>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label col-md-2">Estatus</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="estatus" id="estatus" value="<?php echo $persona -> getEstatus(); ?>"   disabled>
            </div>
        </fieldset>              
    </div>
</div>
