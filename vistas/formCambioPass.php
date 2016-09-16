<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
    include ("../seguridad/seguridad.php");
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
                    <h3 class="title">Cambiar contrase&ntilde;a de usuario</h3>
                </div>
                <div id="resultado"></div>
                <form class="col-md-10 col-md-offset-1" id="formCambioPass" method="" role="registro">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <fieldset class="form-group">
                            <div class="col-md-6">
                                <p class="info" style="text-align: left;"><b>Campos marcados con <span class="mandatory">*</span> son obligatorios</b></p>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="control-label col-md-2">Contrase&ntilde;a actual<span class="mandatory">*</span></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="passwordActual" id="passwordActual">
                            </div>
                            <div id="validacion"></div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="control-label col-md-2">Nueva contrase&ntilde;a<span class="mandatory">*</span></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="passwordNuevo" id="passwordNuevo">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="control-label col-md-2">Repita nueva contrase&ntilde;a<span class="mandatory">*</span></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="passwordNuevo2" id="passwordNuevo2">
                            </div>
                        </fieldset>                                    
                    </div>
                </div>

                <fieldset class="form-group col-md-4 col-md-offset-4">
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block"><b>Cambiar</b></button>
                    </div>
                </fieldset>
            </form>
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