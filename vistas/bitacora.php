<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    require("../modelo/Bitacora.php");
    $consultar = new MainController();
    $resultado = $consultar -> listarBitacora();
?>

<div class="container">
    <div class="page-header">
        <h3 class="title">Bit&aacute;cora de modificaciones</h3>
    </div>
    <table id="listado" class="table table-striped table-bordered table-hover table-responsive" cellspacing="0" width="100%">
        <thead>
            <tr class="ui-widget-header">
                <th style="width:2%;" align="center"><b>Nº</b></th>
                <th style="width:15%;" align="center"><b>Fecha</b></th>
                <th style="width:10%;" align="center"><b>Usuario</b></th>
                <th style="width:auto" align="center"><b>Acci&oacute;n ejecutada</b></th>
            </tr>
        </thead>
            <?php
                if($resultado!=0){
                    $bitacora = new Bitacora();
                    $i = 0;
                    foreach ($resultado as $valor) {
                        $bitacora -> id=$valor['id'];
                        $bitacora -> setFecha($valor['fecha']);
                        $bitacora -> usuario=$valor['usuario'];
                        $bitacora -> accion=$valor['accion'];
                        $i++;
                        echo '
                            <tr>
                                <td align="center">'.$i.'</td>
                                <td align="center">'.$bitacora -> getFecha().'</td>
                                <td align="center">'.$bitacora -> usuario.'</td>
                                <td align="center">'.$bitacora -> accion.'</td>
                            </tr>';
                    }//end foreach
                }
            ?>       
    </table>
</div>
