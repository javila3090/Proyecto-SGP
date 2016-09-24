<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
?>
<form id="formEditarEvaluacion"> 
    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $evaluacion -> id_persona; ?>">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Evaluaci&oacute;n Psicol&oacute;gica</b></h3>
        </div>
        <div class="panel-body">
            <fieldset class="form-group">
                <label class="control-label col-md-2">Aprobado:</label>
                <div class="col-md-5">
                    <select class="form-control" id="prueba_psico" name="prueba_psico" required>
                        <option value=''>Seleccione una opci&oacute;n</option>
                        <option value='1' <?php if ($evaluacion -> getPruebaPsico() == 'Aprobado(a)' ) echo 'selected'; ?>>Si</option>
                        <option value='2' <?php if ($evaluacion -> getPruebaPsico() == 'Reprobado(a)' ) echo 'selected'; ?>>No</option>
                    </select>
                </div>
             </fieldset>
             <fieldset class="form-group">
                <label class="control-label col-md-2">Observaciones psicólogo:</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="observaciones_psico" name="observaciones_psico" rows="4"  title="Comentarios/Observaciones"><?php echo trim($evaluacion -> observaciones_psico); ?></textarea>
                </div>
              </fieldset>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Evaluaci&oacute;n T&eacute;nica</b></h3>
        </div>
        <div class="panel-body">
            <fieldset class="form-group">
                <label class="control-label col-md-2">Aprobado:</label>
                <div class="col-md-5">
                    <select class="form-control" id="prueba_tecnica" name="prueba_tecnica" required>
                        <option value=''>Seleccione una opci&oacute;n</option>
                        <option <?php if ($evaluacion -> getPruebaTecnica() == 'Aprobado(a)' ) echo 'selected'; ?> value='1'>Si</option>
                        <option <?php if ($evaluacion -> getPruebaTecnica() == 'Reprobado(a)' ) echo 'selected'; ?> value='2'>No</option>
                    </select>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Informaci&oacute;n adicional</b></h3>
        </div>
        <div class="panel-body">
            <fieldset class="form-group">
                <label class="control-label col-md-2">Observaciones generales:</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="comentarios" name="comentarios" rows="4"  title="Comentarios/Observaciones"><?php echo trim($evaluacion -> comentarios); ?></textarea>
                    </div>
            </fieldset>
            <fieldset class="form-group">
                <label class="control-label col-md-2">Documentaci&oacute;n requerida:</label>
                    <div class="col-md-5">
                        <select class="form-control" id="documentos" name="documentos" required>
                            <option value=''>Seleccione una opci&oacute;n</option>
                            <option <?php if ($evaluacion -> getDocumentos() == 'Completa' ) echo 'selected'; ?> value='1'>Completa</option>
                            <option <?php if ($evaluacion -> getDocumentos() == 'Incompleta' ) echo 'selected'; ?> value='2'>Incompleta</option>
                        </select>
                    </div>
            </fieldset>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <fieldset class="form-group">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block"><b>Actualizar</b></button>
                </div>
                <div class="col-md-6">
                    <button type="button" id="cancelar" class="btn btn-primary btn-block"><b>Cancelar</b></button>
                </div>
            </fieldset>
        </div>
    </div>
</form>
