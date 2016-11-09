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
        <h3 class="title">Registrar cargo</h3>
    </div>
    <div id="resultado"></div>
    <form class="col-md-8 col-md-offset-2" id="formCargo" method="" role="registro">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Datos del cargo</b></h3>
            </div>
            <div class="panel-body"> 
                <div class="">
                    <fieldset class="form-group">
                        <div class="">
                            <p style="text-align: left;"><b>Campos marcados con <span class="mandatory">*</span> son obligatorios</b></p>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label col-md-3">Nombre del cargo<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nombreCargo" id="nombreCurso" placeholder="" title="Introduzca el nombre del cargo">
                        </div>
                    </fieldset>                  
                    <fieldset class="form-group">
                        <label class="control-label col-md-3">Gerencia<span class="mandatory">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" id="cargo" name="gerencia" required>
                                <option value=''>Seleccione una opci&oacute;n</option>                                   
                            <?php
                            $consultar = new MainController();
                            $resultado = $consultar -> listarGerencias();
                            $gerencia = new Cargo();
                            foreach ($resultado as $valor) {
                                $gerencia -> id_gerencia=$valor['id'];
                                $gerencia -> nombre_gerencia=$valor['nombre'];                            
                                    
                                echo "<option value=".$gerencia -> id_gerencia.">".$gerencia -> nombre_gerencia."</option>";                                       
                            }
                            ?>
                            </select>
                        </div>
                    </fieldset>                                             
                </div>
            </div>
        </div>
        <fieldset class="form-group col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
            <div class="">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </div>
        </fieldset>
    </form>
</div>