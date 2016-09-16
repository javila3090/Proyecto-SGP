<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    require("../controlador/MainController.php");
    require("../modelo/Persona.php");
    $consultar = new MainController();
    $cedula=$_POST['cedula'];
    $resultado = $consultar ->consultaPersonas($cedula);
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.theme.min.css" />
    <script src="../js/jquery-3.0.0.min.js" type="text/javascript"></script>
    <script src="../js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../js/functions.js" type="text/javascript"></script>
    <script src="../js/jquery.validate.js" type="text/javascript"></script>
    <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
</head>
<div class="row">
    <?php
    if($resultado==0){
    ?>
    <div class="col-md-5">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Error</b></h3>
            </div>
            <div class="panel-body">
                <p class="error" style="text-align: center;">Cédula de identidad no registrada</p>
            </div>
        </div>
    </div>
    <?php
    }else{
        $persona = new Persona();
        foreach ($resultado as $valor) {
            $persona -> id = $valor['id'];
            $persona -> nombres = $valor['nombres'];
            $persona -> apellidos = $valor['apellidos'];
            $persona -> cedula = $valor['cedula'];
            $persona ->setFechaNacimiento($valor['fnacimiento']);
            $persona -> correo = $valor['correo'];
            $persona -> telefono = $valor['telefono'];
            $persona -> direccion = $valor['direccion'];
            $persona ->setTipoSangre($valor['grupo_sangre']);
            $persona ->setEstadoCivil($valor['estado_civil']);
            $persona ->setGenero($valor['genero']);
            $persona ->setEstatus($valor['id_estatus']);
            $persona ->setNivelAcademico($valor['nivel_academico']);
            $persona -> hijos = $valor['hijos'];
    ?>
    <div class="col-md-12">
        <div class="panel panel-info col-md-2" id="exportar">
            <div class="panel-body info">		
                <img onclick="ExportToPdf()" title="Descargar en PDF" id="pdf" src="../images/pdf.png" style="cursor: pointer;"></img>  |  <img  onclick="ExportToExcel()" title="Descargar en Excel" id="excel" src="../images/excel.png" style="cursor: pointer;"></img>		
            </div>
        </div>         
        <table id="table" style="width:100%" class="table table-responsive table-bordered" >
            <tr class="ui-widget-header">
                <td style="width:10%" align="center"><b>Nombres</b></td>
                <td style="width:auto" align="center"><b>Apellidos</b></td>
                <td style="width:auto" align="center"><b>C&eacute;dula</b></td>
                <td style="width:auto" align="center"><b>F. Nacimiento</b></td>
                <td style="width:auto" align="center"><b>Sexo</b></td>
                <td style="width:auto" align="center"><b>Correo</b></td>
                <td style="width:auto" align="center"><b>Tel&eacute;fono</b></td>
                <td style="width:auto" align="center"><b>Direcci&oacute;n</b></td>
                <td style="width:10%" align="center" colspan="2"><b>Opciones</b></td>
                
            <?php
            echo '
            <tr>
                <td align="center">'.$persona -> nombres.'</td>
                <td align="center">'.$persona -> apellidos.'</td>
                <td align="center">'.$persona -> cedula.'</td>
                <td align="center">'.$persona ->getFechaNacimiento().'</td>
                <td align="center">'.$persona ->getGenero().'</td>
                <td align="center">'.$persona -> correo.'</td>
                <td align="center">'.$persona -> telefono.'</td>
                <td align="center">'.$persona -> direccion.'</td>
                <td align="center"><img title="Ver detalles" id="detalles" src="../images/lupa.png" style="cursor: pointer;"></img></td>
                <td align="center"><img title="Editar" id="editarPersona" src="../images/editar.png" style="cursor: pointer;"></img></td>
            </tr>';
        }//end foreach
    }
?>       
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <br>
        <div id="resultado"></div>
        <div id="editar-persona" style="display: none">
            <?php include "formEditarPersona.php" ?>            
        </div>
        <div id="detalles-persona" style="display: none">
            <?php include "formDetallesPersona.php" ?>            
        </div>
    </div>
</div>
