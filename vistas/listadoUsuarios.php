<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    require("../modelo/Usuario.php");
    $consultar = new MainController();
    $resultado = $consultar -> listarUsuarios();
?>
<div class="container">
    <div class="page-header">
        <h3 class="title">Listado de usuarios con acceso al sistema</h3>
    </div>
    <div id="resultado"></div>  
    <div id="table-user">
        <table id="listado" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr class="ui-widget-header">
                    <th style="width:2%;" align="center"><b>Nº</b></th>                    
                    <th style="width:10%;" align="center"><b>Nombres</b></th>
                    <th style="width:10%;" align="center"><b>Apellidos</b></th>
                    <th style="width:auto" align="center"><b>C&eacute;dula</b></th>
                    <th style="width:auto" align="center"><b>Email</b></th>
                    <th style="width:auto" align="center"><b>Nombre usuario</b></th>
                    <th style="width:auto" align="center"><b>Tipo</b></th>
                    <th style="width:auto" align="center"><b>Estatus</b></th>
                    <th style="width:10%; text-align: center" align="center"><b>Editar</b></th>
                    <th style="width:10%; text-align: center" align="center"><b>Resetear password</b></th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    if($resultado!=0){
                        $usuario = new Usuario();
                        $i = 0;
                        foreach ($resultado as $valor) {
                            $usuario -> id =$valor['id'];
                            $usuario -> nombres=$valor['nombres'];
                            $usuario -> apellidos=$valor['apellidos'];
                            $usuario -> cedula=$valor['cedula'];
                            $usuario -> correo=$valor['correo'];
                            $usuario -> username=$valor['username'];
                            $usuario -> setTipo($valor['id_grupo']);
                            $usuario -> setEstatus($valor['estatus']);
                            $i++;
                            echo '
                            <tr>
                                <td align="center">'.$i.'</td>
                                <td align="center">'.$usuario -> nombres.'</td>
                                <td align="center">'.$usuario -> apellidos.'</td>
                                <td align="center">'.$usuario -> cedula.'</td>
                                <td align="center">'.$usuario -> correo.'</td>
                                <td align="center">'.$usuario -> username.'</td>
                                <td align="center">'.$usuario -> getTipo().'</td>
                                <td align="center">'.$usuario -> getEstatus().'</td>';?>
                                <td align="center"><img title="Editar" id="editarUser" onclick="enviarDatos('<?php echo $usuario -> id; ?>','../vistas/formEditarUsuarios.php',7);return false;" src="../images/editar.png" style="cursor: pointer;"></img></td>
                                <td align="center"><img title="Desactivar" class="btn-reset-password" id="<?php echo $usuario -> id; ?>" src="../images/reset.png" style="cursor: pointer;"></img></td>
            </tr>
                <?php       
                        }//end foreach
                    }
                ?>  
            </tbody>
        </table>
    </div>
    <div id="editUser"></div>
</div>