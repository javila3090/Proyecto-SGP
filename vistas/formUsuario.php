<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    include ("../seguridad/seguridad.php");
?>
<div class="container">
    <div class="page-header">
        <h3 class="title">Registrar usuario del sistema</h3>
    </div>
    <div id="resultado"></div>
    <form class="col-md-10 col-md-offset-1" id="formUsuario" method="" role="registro">
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
                        <input type="text" class="form-control" name="cedulaUser" id="cedulaUser" placeholder=""  title="Introduzca el número de cédula">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Correo<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="correo" id="correo" placeholder=""  title="Introduzca un correo válido">
                    </div>
                </fieldset>                         
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Nombre usuario<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="username" id="username" title="Introduzca nombre de usuario">
                        <div id="validacion"></div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Constrase&ntilde;a<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password" id="password" title="Introduzca contraseña">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Repita contrase&ntilde;a<span class="mandatory">*</span></label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password2" id="password2" title="Vuelva a escribir la contraseña">
                    </div>
                </fieldset>               
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Tipo<span class="mandatory">*</span></label>
                    <div class="col-md-4">
                        <select class="form-control" id="id_grupo" name="id_grupo" required>
                            <option value=''>Seleccione una opci&oacute;n</option>
                            <option value='1'>Administrador</option>
                            <option value='2'>Usuario</option>
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