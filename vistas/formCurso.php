<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
?>
<div class="container">
    <div class="page-header">
        <h3 class="title">Registrar curso</h3>
    </div>
    <div id="resultado"></div>
    <form class="col-md-12" id="formCrearCurso" method="" role="registro">
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
                        <input type="text" class="form-control" name="nombreCurso" id="nombreCurso" placeholder="" title="Introduzca el nombre del curso">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="control-label col-md-2">Duraci&oacute;n (Horas)<span class="mandatory">*</span></label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" size="3" maxlength="3" name="duracion" id="duracion" title="Introduzca la duraci&oacute;n del curso expresada en horas" placeholder="">
                    </div>
                </fieldset>                                          
            </div>
        </div>
        <fieldset class="form-group col-md-4 col-md-offset-4">
            <div class="">
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </div>
        </fieldset>
    </form>
</div>