<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
         
    require ("../seguridad/seguridad.php");
    require ("../controlador/MainController.php");
    require ("../modelo/Usuario.php");
	$consultarUser = new MainController();
	$id=$_POST['id'];
	$resultado = $consultarUser ->consultaUsuario($id);
    if($resultado!=0){
        $usuario = new Usuario();
        foreach ($resultado as $valor) {
            $usuario -> id=$valor['id'];
            $usuario -> nombres=$valor['nombres'];
            $usuario -> apellidos=$valor['apellidos'];
            $usuario -> cedula=$valor['cedula'];
            $usuario -> correo=$valor['correo'];
            $usuario -> username=$valor['username'];
            $usuario -> setTipo($valor['id_grupo']);
            $usuario -> setEstatus($valor['estatus']);
	}
?>
<form class="col-md-10 col-md-offset-1" id="formEditarUsuario" method="POST">
    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $usuario -> id; ?>">
    <div class="panel panel-default">
        <div class="panel-body"> 
            <fieldset class="form-group">
                <div class="col-md-6">
                    <p class="info" style="text-align: left;"><b>Campos marcados con <span class="mandatory">*</span> son obligatorios</b></p>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label class="control-label col-md-2">Nombres<span class="mandatory">*</span></label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $usuario -> nombres; ?>" title="Introduzca el nombre completo">
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label class="control-label col-md-2">Apellidos<span class="mandatory">*</span></label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $usuario -> apellidos; ?>"  title="Introduzca los apellidos">
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label class="control-label col-md-2">C&eacute;dula<span class="mandatory">*</span></label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="cedulaUser" id="cedulaUser" value="<?php echo $usuario -> cedula; ?>" title="Introduzca el número de cédula">
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label class="control-label col-md-2">Correo<span class="mandatory">*</span></label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $usuario -> correo; ?>" title="Introduzca un correo válido">
                </div>
            </fieldset>                         
            <fieldset class="form-group">
                <label class="control-label col-md-2">Nombre usuario<span class="mandatory">*</span></label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $usuario -> username; ?>" title="Introduzca nombre de usuario">
                    <div id="validacion"></div>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label class="control-label col-md-2">Tipo de usuario<span class="mandatory">*</span></label>
                <div class="col-md-3">
                    <select class="form-control" id="id_grupo" name="id_grupo" required>
                        <option value=''>Seleccione una opci&oacute;n</option>
                        <option <?php if ($usuario -> getTipo() == 'Administrador' ) echo 'selected'; ?> value='1'>Administrador</option>
                        <option <?php if ($usuario -> getTipo() == 'Usuario' ) echo 'selected'; ?> value='2'>Usuario</option>
                    </select>
                </div>
            </fieldset>     
            <fieldset class="form-group">
                <label class="control-label col-md-2">Estatus<span class="mandatory">*</span></label>
                <div class="col-md-3">
                    <select class="form-control" id="estatus" name="estatus" required>
                        <option value=''>Seleccione una opci&oacute;n</option>
                        <option <?php if ($usuario -> getEstatus() == 'Activo' ) echo 'selected'; ?> value='1'>Activo</option>
                        <option <?php if ($usuario -> getEstatus() == 'Inactivo' ) echo 'selected'; ?> value='0'>Inactivo</option>
                    </select>
                </div>
            </fieldset>               
        </div>
    </div>
    <fieldset class="form-group col-md-4 col-md-offset-4">
        <div class="col-md-6">
            <button type="submit" onclick="editarUsuario('../vistas/actualizar.php');return false;" class="btn btn-primary btn-block">Actualizar</button>
        </div>
        <div class="col-md-6">
            <button type="button" id="cancelar_edit_user" onclick="cancelar('#editUser','#table-user');" class="btn btn-primary btn-block">Cancelar</button>
        </div>
    </fieldset>
</form>
<?php
	}
?>