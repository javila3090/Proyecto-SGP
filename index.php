<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
         
    session_start ();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
    <head>
        <title>Sistema de gesti&oacute;n de personal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <script src="js/jquery-3.0.0.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="login-form">
                <form method="post" action="vistas/validarInicioSesion.php" role="login">
                    <img src="images/personal.png" class="img-responsive"/>
                    <input type="text" name="usuario" placeholder="Usuario" class="form-control input-lg" />
                    <input type="password" name="password" placeholder="Contraseña" class="form-control input-lg" />
                    <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Entrar</button>
                    <!--<div><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top"><b>¿Olvid&oacute; su contrase&ntilde;a?</b></a></div>-->
                    <?php 
                    if (isset($_SESSION['error'])){
                    ?>
                    <div class="ui-state-error ui-corner-all error">
                        <span class="ui-icon ui-icon-alert" style="margin-left: 0.3em"></span>
                            <?php
                            echo '<p>'.$_SESSION['error'].'</p>';
                            unset($_SESSION['error']);
                            ?>
                    </div>
                     <?php
                     }
                     ?>
                </form>
            </div>
        </div>
    <footer>
        <div class="panel-footer">
        <?php include "utilidades/footer.php"; ?>
        </div>
    </footer>
</body>
</html>