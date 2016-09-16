<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
?>
<div class="row">
    <div class="container">
        <div class="page-header">
            <h3 class="title">Consultar Cursos</h3>
        </div>
        <form id="consultar">
            <fieldset class="form-group">
                <div class="col-md-3">
                    <input type="text" class="datepicker form-control" name="fechaCurso" id="fechaCurso" placeholder="Introduzca la fecha a consultar" required>
                </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary btn-block" href="javascript:;" onclick="enviarDatos($('#fechaCurso').val(),'../vistas/mostrarCursos.php',3);return false;" value="Buscar"/>
            </div>
            </fieldset>
        </form>
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="col-md-12" id="resultado"></div>
    </div>
</div>