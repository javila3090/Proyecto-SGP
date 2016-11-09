<link rel="stylesheet" type="text/css" href="../css/menu/jquery.smartmenus.bootstrap.css" />
<script src="../js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/menu/jquery.smartmenus.min.js"></script>
<script type="text/javascript" src="../js/menu/jquery.smartmenus.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<!-- Navbar static top -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SGP</a>
        </div>
        <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
                <li><a href="../inicio/">Inicio</a></li>
                <li><a href="#">Captaci&oacute;n y Selecci&oacute;n <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Aspirantes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../aspirantes/registro">Registro</a></li>
                                <li><a href="../aspirantes/consulta">Consulta por c&eacute;dula</a></li>
                                <li><a href="../aspirantes/listado">Listado</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Evaluaciones<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../evaluaciones/registro">Registro</a></li>
                                <li><a href="../evaluaciones/consulta">Consulta</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Empleados <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../empleados/registro">Registro<span></span></a></li>                  
                        <li><a href="../empleados/consulta">Consulta<span></span></a></li>
                    </ul>
                </li>                
                <li><a href="#">Capacitaciones <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Cursos<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../cursos/registro">Registro</a></li>
                                <li><a href="../cursos/editar">Consulta</a></li>
                            </ul>
                        </li>                         
                        <li><a href="#">Planificaci&oacute;n<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../cursos/planificar">Planificar</a></li>
                                <li><a href="../cursos/consulta">Consulta por fecha</a></li>
                                <li><a href="../cursos/planificados">Gestionar</a></li> 
                            </ul>
                        </li>                      
                        <li><a href="#">Listado<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../cursos/planificados">Planificados</a></li>
                                <li><a href="../cursos/culminados">Culminados</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php if($_SESSION['perm']=='1'){  ?> 
                <li><a href="#">Usuarios <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../usuarios/registro">Registro</a></li>
                        <li><a href="../usuarios/listado">Listado</a></li>
                    </ul>
                </li>   
                <?php }?>
                <li><a href="#">Otras opciones <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../usuarios/resetPassword">Cambiar contrase&ntilde;a</a></li>
                        <?php 
                            if($_SESSION['perm']=='1'){
                                echo '<li><a href="../bitacora/">Bit&aacute;cora</a></li>';
                                echo '<li><a href="../cargar/archivo">Importar datos</a></li>';
                                echo '<li><a href="../gestion/cargos">Crear cargo</a></li>';
                            }
                        ?>
                    </ul>
                </li>  
                <li><a href="../vistas/cerrarSesion.php">Cerrar Sesi&oacute;n <?php  echo"<b style='font-size: 1.0em; color:000;'>(".$_SESSION['nombre'].")</b>";?></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div>