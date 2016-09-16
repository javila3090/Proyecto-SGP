<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <link rel="stylesheet" type="text/css" href="../css/estilo_menu.css" media="all" />
        <script src="../js/jquery-3.0.0.min.js" type="text/javascript"></script>
        <script>  
                    <!--  // building select nav for mobile width only -->
            $(function(){
                // building select menu
                $('<select />').appendTo('nav');
            
                // building an option for select menu
                $('<option />', {
                    'selected': 'selected',
                    'value' : '',
                    'text': 'Menú'
                }).appendTo('nav select');
            
                $('nav ul li a').each(function(){
                    var target = $(this);
                
                    $('<option />', {
                        'value' : target.attr('href'),
                        'text': target.text()
                    }).appendTo('nav select');
                
                });
            
                // on clicking on link
                $('nav select').on('change',function(){
                    window.location = $(this).find('option:selected').val();
                });
            });
        
            // show and hide sub menu
            $(function(){
                $('nav ul li').hover(
                        function () {
                            //show its submenu
                    $('ul', this).slideDown(150);
                }, 
                function () {
                    //hide its submenu
                    $('ul', this).slideUp(150);			
                }
                        );
            });
            //end
        </script>
        <!-- end -->
    </head>
    <header>
        <div id="fdw">
            <!--nav-->
            <nav>
                <ul>
                    <li class="current"><a href="../inicio/">Inicio<span class="arrow"></span></a></li>
                    <li><a href="#">Personas</a>
                        <ul style="display: none;" class="sub_menu">
                            <li class="arrow_top"></li>
                            <li><a href="../personas/registro">Registrar</a></li>
                            <li><a href="../personas/consulta">Consultar</a></li>
                            <li><a href="../personas/listado">Listado</a></li>                        
                        </ul>
                    </li>
                    <li><a href="#">Evaluaciones</a>
                        <ul style="display: none;" class="sub_menu">
                            <li class="arrow_top"></li>
                            <li><a href="../evaluaciones/registro">Registrar</a></li>
                            <li><a href="../evaluaciones/consulta">Consultar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Capacitaciones</a>
                        <ul style="display: none;" class="sub_menu">
                            <li class="arrow_top"></li>
                            <li><a href="../capacitaciones/registro">Registrar</a></li>
                            <li><a href="../capacitaciones/planificar">Planificar</a></li>
                            <li><a href="../capacitaciones/consulta">Consultar</a></li>
                            <li><a href="../capacitaciones/listado">Listado</a></li>
                        </ul>
                    </li>
                <?php 
                 if($_SESSION['perm']=='1'){  ?>               
                    <li><a href="#">Usuarios</a>
                        <ul style="display: none;" class="sub_menu">
                            <li><a href="../usuarios/registro">Registrar</a></li>
                            <li><a href="../usuarios/listado">Listado</a></li>
                        </ul>
                    </li> 
                 <?php }?>
                    <li><a href="#">Administrar</a>
                        <ul style="display: none;" class="sub_menu">
                            <li><a href="../usuarios/resetPassword">Cambiar contrase&ntilde;a</a></li>
                        <?php 
                            if($_SESSION['perm']=='1'){
                                echo '<li><a href="../bitacora/">Bit&aacute;cora</a></li>';
                                echo '<li><a href="../cargar/csv">Importar datos</a></li>';
                            }
                        ?>
                        </ul>
                    </li>                 
                    <li><a href="../vistas/cerrarSesion.php">Cerrar Sesi&oacute;n <?php  echo"<b style='font-size: 1.0em; color:000;'>(".$_SESSION['nombre'].")</b>";?></a></li>
                </ul>
            </nav>
        </div><!-- end fdw -->
    </header><!-- end header -->
</html>