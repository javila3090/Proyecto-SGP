<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    require("../modelo/Persona.php");
    $consultar = new MainController();
    $template=$_GET['template'];
    $resultado = $consultar -> listarEmpleados();
?>
<div class="container">
    <div class="page-header">
        <h3 class="title">Empleados activos</h3>
    </div>
    <div id="tabla-persona">
        <table id="listado" class="table table-striped table-bordered table-hover table-responsive " cellspacing="0" width="">
            <thead>
                <tr class="ui-widget-header">
                    <th style="width:auto" align="center"><b>C&eacute;dula</b></th>
                    <th style="width:auto" align="center"><b>Nombre completo</b></th>
                    <th style="width:auto" align="center"><b>F. Nacimiento</b></th>
                    <th style="width:auto" align="center"><b>G&eacute;nero</b></th>
                    <th style="width:auto" align="center"><b>Tel&eacute;fono</b></th>                        
                    <th style="width:auto" align="center"><b>Correo</b></th>
                    <th style="width:auto" align="center"><b>Direcci&oacute;n</b></th>
                    <td style="width:auto" align="center"><b>Estado civil</b></td>                        
                   <!-- <th style="width:auto" align="center"><b>Hijos(as)</b></th>
                    <td style="width:auto" align="center"><b>Grupo sangu&iacute;neo</b></td>-->
                    <td style="width:auto" align="center"><b>Nivel acad&eacute;mico</b></td>
                    <td style="width:auto" align="center"><b>Estatus</b></td>
                    <td style="width:auto" align="center"><b>Cargo</b></td>
                    <td style="width:auto" align="center"><b>Fecha ingreso</b></td>
                    <td style="width:auto" align="center"><b>Editar</b></td>
                </tr>
            </thead>
                    <?php
                        if($resultado!=0){
                            $persona = new Persona();
                            
                            foreach ($resultado as $valor) {
                                $persona -> id=$valor['id'];
                                $persona -> nombres=$valor['nombres'];
                                $persona -> apellidos=$valor['apellidos'];
                                $persona -> cedula=$valor['cedula'];
                                $persona -> setFechaNacimiento($valor['fnacimiento']);
                                $persona -> setGenero($valor['genero']);
                                $persona -> correo=$valor['correo'];
                                $persona -> telefono=$valor['telefono'];
                                $persona -> direccion=$valor['direccion'];
                                $persona -> setEstadoCivil($valor['estado_civil']);
                                $persona -> hijos=$valor['hijos'];
                                $persona -> setTipoSangre($valor['grupo_sangre']);                               
                                $persona -> setNivelAcademico($valor['nivel_academico']);
                                $persona -> setEstatus($valor['id_estatus']);
                                $persona -> cargo=$valor['cargo'];
                                $persona -> setFechaIngreso($valor['fecha_ingreso']);
                                
                                echo '
                                <tr>
                                    <td align="center">'.$persona -> cedula.'</td>
                                    <td align="center">'.$persona -> nombres.' '.$persona -> apellidos.'</td>
                                    <td align="center">'.$persona -> getFechaNacimiento().'</td>
                                    <td align="center">'.$persona -> getGenero().'</td>
                                    <td align="center">'.$persona -> telefono.'</td>                                        
                                    <td align="center">'.$persona -> correo.'</td>
                                    <td align="center">'.$persona -> direccion.'</td>
                                    <td align="center">'.$persona -> getEstadoCivil().'</td>                                            
                                    <td align="center">'.$persona -> getNivelAcademico().'</td>
                                    <td align="center">'.$persona -> getEstatus().'</td>
                                    <td align="center">'.$persona -> cargo.'</td>
                                    <td align="center">'.$persona -> getFechaIngreso().'</td>';?>
                                    <td align="center"><img title="Editar" id="" onclick="enviarDatos('<?php echo $persona -> cedula; ?>','../vistas/formEditarPersona.php',8);return false;" src="../images/editar.png" style="cursor: pointer;"></img></td>
                                </tr>
                    <?php
                            }//end foreach
                        }
                    ?>       
        </table>
    </div>
</div>
<div class="row">
    <div class="container">
        <br>
        <div id="resultado"></div>
        <div id="editar-persona" style="display: none">
            <?php include "formEditarPersona.php" ?>            
        </div>
    </div>
</div>