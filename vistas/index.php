<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    include ("../seguridad/seguridad.php");

?>

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sistema de gesti&oacute;n de personal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css" />
            <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
            <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.min.css" />
            <link rel="stylesheet" type="text/css" href="../css/jquery-ui/jquery-ui.theme.min.css" />
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
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-body">		
                            <p class="info">Bienvenido(a): <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></p>
                            <p class="info"><?php date_default_timezone_set('America/Caracas'); echo date ( "j - m - Y" ); ?>		
                        </div>
                    </div>
                </div>
            </div>    
            <!--<div class="row">
                <div class="container">
                    <div class="col-md-8 col-md-offset-2">
                        <img class="transparent img-responsive" src="../images/reclutamiento4.png " width="100%"></img>
                    </div>
                </div>
            </div>-->
        </div>
        <footer>
            <div class="panel-footer">
            <?php include "../utilidades/footer.php"; ?>
            </div>
        </footer>
    </body>
</html>



