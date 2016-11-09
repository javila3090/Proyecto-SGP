<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */

    include ("../seguridad/seguridad_admin.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">

<head>
    <title>Sistema de gesti&oacute;n de personal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" />  
    <script src="../js/jquery-3.0.0.min.js" type="text/javascript"></script>
    <script src="../js/functions.js" type="text/javascript"></script>
    <script src="../js/jquery.validate.js" type="text/javascript"></script>
    <script src="../js/sweetalert.min.js" type="text/javascript"></script>     
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
            <div class="container">
                <div class="page-header">
                    <h3 class="title">Carga masiva de datos</h3>
                </div>                
                <form id="cargarData" method='post' enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <div class="col-md-3">
                            <input type="file" class="" name="archivo" id="archivo" required>
                        </div>
                    </fieldset> 
                    <br/>
                    <fieldset>
                        <div class="col-md-2 col-xs-6">
                            <input type="submit" class="btn btn-primary btn-block" href="javascript:;" onclick="enviarDatos($('#archivo').val(),'importarCsv.php',4);return false;" value="Cargar"/>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div id="resultado"></div>
            </div>
        </div>
    </div>
    <footer>
        <div class="panel-footer">
            <?php include "../utilidades/footer.php"; ?>
        </div>
    </footer>
</body>
</html>
