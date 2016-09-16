<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
         
    include ("../seguridad/seguridad.php");
    $template = $_GET['template'];
?>
    
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
    <head>
        <title>Sistema de gesti&oacute;n de personal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.theme.min.css" />
        <link rel="stylesheet" type="text/css" href="../lib/DataTables/media/css/dataTables.bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../lib/DataTables/extensions/Buttons/css/buttons.bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../lib/DataTables/extensions/Buttons/css/buttons.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" />    
        <script src="../js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="../js/functions.js" type="text/javascript"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>    
        <script src="../lib/DataTables/media/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../lib/DataTables/media/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="../lib/DataTables/extensions/Buttons/js/dataTables.buttons.js" type="text/javascript"></script>
        <script src="../lib/DataTables/extensions/Buttons/js/buttons.flash.min.js" type="text/javascript"></script>
        <script src="../lib/DataTables/extensions/Buttons/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="../lib/DataTables/extensions/Buttons/js/buttons.html5.min.js" type="text/javascript"></script> 
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">   
                <div class="col-md-12">
                <?php
                    include("../utilidades/menu.php");
                ?>
                </div>
            </div>
            <div class="row">
            <?php 
            switch ($template){
                case 'personas':
                   include 'listadoPersonas.php';
                break;
                case 'cursos':
                   include 'listadoCursos.php';
                break;              
                case 'usuarios':
                   include 'listadoUsuarios.php';
                break;
                case 'bitacora':
                   include 'bitacora.php';
                break;              
            }
            ?>
            </div>
        </div>
        <footer>
            <div class="panel-footer">
            <?php include "../utilidades/footer.php"; ?>
            </div>
        </footer>
    </body>
</html>