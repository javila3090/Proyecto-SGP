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
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" />    
        <script src="../js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../js/functions.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
        <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>    
    </head>
    <body>
        <?php
            include("../utilidades/menu.php");
        ?>
        <div class="container-fluid">   
            <div class="row">
            <?php 
            switch ($template){
                case 'personas':
                   include 'formPersona.php';
                break;
                case 'evaluaciones':
                   include 'registrarEvaluacion.php';
                break;
                case 'cursos':
                   include 'formCurso.php';
                break; 
                case 'usuarios':
                   include 'formUsuario.php';
                break; 
                case 'cargos':
                   include 'formCargo.php';
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