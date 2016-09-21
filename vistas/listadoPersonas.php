<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    require("../modelo/Persona.php");
    $consultar = new MainController();
    $resultado = $consultar -> listarPersonas();
?>
<div class="container-fluid">
    <div class="page-header">
        <h3 class="title">Listado de personas registradas</h3>
    </div>
    <div id="resultado"></div>
    <div id="table-user ">
        <table id="listado" class="table table-striped table-bordered table-hover table-responsive " cellspacing="0" width="100%">
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
                    <th style="width:auto" align="center"><b>Hijos(as)</b></th>
                    <td style="width:auto" align="center"><b>Grupo sangu&iacute;neo</b></td>
                    <td style="width:auto" align="center"><b>Nivel acad&eacute;mico</b></td>
                    <td style="width:auto" align="center"><b>Estatus</b></td>
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
                                    <td align="center">'.$persona -> hijos.'</td>
                                    <td align="center">'.$persona -> getTipoSangre().'</td>
                                    <td align="center">'.$persona -> getNivelAcademico().'</td>
                                    <td align="center">'.$persona -> getEstatus().'</td>
                                </tr>';
                            }//end foreach
                        }
                    ?>       
        </table>
    </div>
</div>
