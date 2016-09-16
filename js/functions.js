//ARCHIVO QUE CONTIENE LAS FUNCIONES JS Y JQUERY APLICADAS EN EL PORTAL

$.noConflict();

jQuery(document).ready(function ($){    
    
    $('#listado').dataTable({
        dom: 'Bfrtip',
        "order": [[ 0, "asc" ]],
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            }
        },
        buttons: ['excel', 'pdf', 'print']
    });
    
    
    //Boton para eliminar cursos
    $('.btn-eliminar-curso').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        var id = $(this).attr('id');
        swal({
            title: "¡Atención! Está a punto de eliminar este curso ¿Desea continuar?",
            text: "",
            type: "warning",
            confirmButtonColor: "#337ab7",
            confirmButtonText: "Si",
            showCancelButton: true,
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function(isConfirm){
            if (isConfirm)   {              
                $.ajax({
                    data:  "id="+id+"&metodo=eliminarCurso",
                    url:   "../vistas/eliminar.php",
                    type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                    },
                    success:  function (response) {
                        $("#resultado").html(response);
                        setTimeout(function() {window.location.reload();}, 5000);
                    }
                });
            }
        });
    });
    
    $('.btn-reset-password').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        var id = $(this).attr('id');
        swal({
            title: "¿Está seguro que desea restablecer la contraseña de este usuario?",
            text: "",
            type: "warning",
            confirmButtonColor: "#337ab7",
            confirmButtonText: "Si",
            showCancelButton: true,
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function(isConfirm){
            if (isConfirm)   {              
                $.ajax({
                    data:  "id="+id+"&tipo=2&metodo=resetearPassword",
                    url:   "../vistas/actualizar.php",
                    type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                    },
                    success:  function (response) {
                        $("#resultado").html(response);
                        setTimeout(function() {window.location.reload();}, 5000);
                    }
                });
            }
        });
    });
    
    
    //Validando el form Editar Usuario	
    $("#formEditarUsuario1").validate({		
        rules: {
            nombres: { required: true, minlength: 2},
            apellidos: { required: true, minlength: 2},
            correo: { required:true, email: true},
            cedulaUser: { required: true},
            username: { required: true, minlength: 5},
            id_grupo: { required:true}
        },
        messages: {
            nombres: "<b>Este campo es requerido</b>",
            apellidos: "<b>Este campo es requerido</b>",
            correo : {required: "<b>Este campo es requerido</b>", email:"<b>Introduzca una direcci&oacute;n de correo electr&oacute;nico v&aacute;lida</b>"},
            cedulaUser : "<b>Este campo es requerido</b>",
            username : { required: "<b>Este campo es requerido</b>", minlength:"<b>El nombre de usuario debe tener al menos 5 car&aacute;cteres</b>"},
            id_grupo :"<b>Este campo es requerido</b>"
        },
        submitHandler: function(form){
            var dataString = 'id='+$('#id').val()+'nombres='+$('#nombres').val()+'&apellidos='+$('#apellidos').val()+'&cedula='+$('#cedulaUser').val()+'&correo='+$('#correo').val()+'&username='+$('#username').val()+'&id_grupo='+$('#id_grupo').val();
            $.ajax({
                type: "POST",
                url: "../vistas/actualizarUsuario.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#resultado").show();
                    $("#formEditarUsuario").hide();
                    $("#table-user").show();
                }
            });
        }
    });	    
    
});

jQuery(document).ready(function ($){ 
    
    $("#cedulaConsulta").focus();
    $("#nombres").focus();
    
    //validando formulario registro personas	
    $("#formPersona").validate({
        rules: {
            nombres: { required: true, minlength: 2},
            apellidos: { required: true, minlength: 2},
            correo: { required:true, email: true},
            telefono: { required:true},
            cedula: { required: true, number: true, maxlength: 10},
            fnacimiento: { required: true},
            direccion: { required:true, minlength: 2, maxlength: 180},
            genero: { required:true},
            documentos: { required:true},
            estatus: { required:true},
            nivelAcademico: { required:true},
            hijos: { number: true}
        },
        messages: {
            nombres: {required: "<b>Este campo es requerido</b>", minlength: "<b>Introduzca al menos dos car&aacute;cteres</b>"},
            apellidos: {required: "<b>Este campo es requerido</b>", minlength: "<b>Introduzca al menos dos car&aacute;cteres</b>"},
            correo : {required: "<b>Este campo es requerido</b>", email:"<b>Introduzca una direcci&oacute;n de correo electr&oacute;nico v&aacute;lida</b>"},
            telefono : "<b>Este campo es requerido</b>",
            cedula : { required: "<b>Este campo es requerido</b>", number: "<b>Solo n&uacute;meros</b>",  maxlength: "<b>Máximo 10 car&aacute;cteres</b>"},
            fnacimiento : "<b>Este campo es requerido</b>",
            direccion : {required: "<b>Este campo es requerido</b>", maxlength: "<b>Máximo 180 car&aacute;cteres</b>"},
            genero :"<b>Este campo es requerido</b>",
            estatus : "<b>Este campo es requerido</b>",
            nivelAcademico : "<b>Este campo es requerido</b>",
            hijos: { number: "<b>Solo n&uacute;meros</b>"}
        },
        submitHandler: function(form){
            var dataString = 'nombres='+$('#nombres').val()+'&apellidos='+$('#apellidos').val()+'&cedula='+$('#cedula').val()+'&fnacimiento='+$('#fnacimiento').val()+'&correo='+$('#correo').val()+'&telefono='+$('#telefono').val()+'&direccion='+$('#direccion').val()+'&genero='+$('#genero').val()+'&estadoCivil='+$('#estadoCivil').val()+'&grupoSangre='+$('#grupoSangre').val()+'&nivelAcademico='+$('#nivelAcademico').val()+'&estatus='+$('#estatus').val()+'&hijos='+$('#hijos').val()+'&metodo=cargarPersonas&tipo=2';
            $.ajax({
                type: "POST",
                url: "../vistas/guardar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#formPersona")[0].reset();
                    $("#validacion").empty();
                }
            });
        }
    });
    
    //validando formulario editar personas
    
    $("#formEditarPersona").validate({
        rules: {
            nombres: { required: true},
            apellidos: { required: true},
            correo: { required:true, email: true},
            telefono: { required:true},
            cedula: { required: true},
            fnacimiento: { required: true},
            direccion: { required:true, minlength: 10, maxlength: 180},
            genero: { required:true },
            nivelAcademico: { required:true}            
        },
        messages: {
            nombres: "<b>Este campo es requerido</b>",
            apellidos: "<b>Este campo es requerido</b>",
            correo : { required: "<b>Este campo es requerido</b>", email: "<b>Introduzca una direcci&oacute;n de correo electr&oacute;nico v&aacute;lida</b>" },
            telefono : { required: "<b>Este campo es requerido</b>"},
            cedula : "<b>Este campo es requerido</b>",
            genero :"<b>Este campo es requerido</b>",            
            direccion : { required: "<b>Este campo es requerido</b>", minlength: "<b>Introduzca al menos 10 car&aacute;cteres</b>", maxlength: "<b>Máximo 180 car&aacute;cteres</b>"},
            nivelAcademico : "<b>Este campo es requerido</b>"
        },
        submitHandler: function(form){
            var dataString = 'id='+$('#id').val()+'&nombres='+$('#nombres').val()+'&apellidos='+$('#apellidos').val()+'&cedula='+$('#cedula').val()+'&fnacimiento='+$('#fnacimiento').val()+'&correo='+$('#correo').val()+'&telefono='+$('#telefono').val()+'&direccion='+$('#direccion').val()+'&genero='+$('#genero').val()+'&documentos='+$('#documentos').val()+'&grupoSangre='+$('#grupoSangre').val()+'&estadoCivil='+$('#estadoCivil').val()+'&nivelAcademico='+$('#nivelAcademico').val()+'&estatus='+$('#estatus').val()+'&hijos='+$('#hijos').val()+'&metodo=actualizarPersona&tipo=1';
            $.ajax({
                type: "POST",
                url: "../vistas/actualizar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#formEditarPersona").hide();
                    $("#validacion").empty();
                }
            });
        }
    });
    
    //Validando el form Usuario
    $("#formUsuario").validate({
        rules: {
            nombres: { required: true, minlength: 2},
            apellidos: { required: true, minlength: 2},
            correo: { required:true, email: true},
            cedulaUser: { required: true},
            username: { required: true, minlength: 5},
            password: { required:true, minlength: 8},
            password2: { required:true, equalTo: "#password"},
            id_grupo: { required:true}
        },
        messages: {
            nombres: "<b>Este campo es requerido</b>",
            apellidos: "<b>Este campo es requerido</b>",
            correo : { required: "<b>Este campo es requerido</b>", email:"<b>Ingrese un correo electr&oacute;nico v&aacute;lido</b>"},
            cedulaUser : "<b>Este campo es requerido</b>",
            username : { required: "<b>Este campo es requerido</b>", minlength:"<b>El nombre de usuario debe tener al menos 5 car&aacute;cteres</b>"},
            password : { required: "<b>Este campo es requerido</b>", minlength:"<b>La contraseña debe tener al menos 8 car&aacute;cteres</b>"},
            password2 : { required: "<b>Este campo es requerido</b>", equalTo:"<b>Las contraseñas deben coincidir</b>"},
            id_grupo :"<b>Este campo es requerido</b>"
        },
        submitHandler: function(form){
            var dataString = 'nombres='+$('#nombres').val()+'&apellidos='+$('#apellidos').val()+'&cedula='+$('#cedulaUser').val()+'&correo='+$('#correo').val()+'&username='+$('#username').val()+'&password='+$('#password').val()+'&id_preg_seg='+$('#id_preg_seg').val()+'&respuesta_preg_seg='+$('#respuesta_preg_seg').val()+'&id_grupo='+$('#id_grupo').val()+'&metodo=cargarUsuarios&tipo=1';
            $.ajax({
                type: "POST",
                url: "../vistas/guardar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#formUsuario")[0].reset();
                    $("#validacion").empty();
                }
            });
        }
    });    
    
    //Validando el form para el cambio de password
    $("#formCambioPass").validate({
        rules: {
            passwordActual: { required: true },
            passwordNuevo: { required: true, minlength: 8},
            passwordNuevo2: { required:true, equalTo: "#passwordNuevo"}
        },
        messages: {
            passwordActual: { required: "<b>Este campo es requerido</b>"},
            passwordNuevo: { required: "<b>Este campo es requerido</b>", minlength:"<b>La contraseña debe tener al menos 8 car&aacute;cteres</b>"},
            passwordNuevo2 : { required: "<b>Este campo es requerido</b>", equalTo: "<b>Las contraseñas deben coincidir</b>"}
        },
        submitHandler: function(form){
            var dataString = 'passwordActual='+$('#passwordActual').val()+'&passwordNuevo='+$('#passwordNuevo').val()+'&metodo=actualizarPassword&tipo=3';
            $.ajax({
                type: "POST",
                url: "../vistas/actualizar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#formCambioPass")[0].reset();
                    $("#validacion").empty();
                }
            });
        }
    }); 
    
    //validando formulario registro evaluaciones	
    $("#formEvaluacion").validate({
        rules: {
            prueba_psico: { required: true},
            prueba_tecnica: { required: true},
            observaciones_psico: { required: true,  maxlength: 250 },
            comentarios: { required: true, maxlength: 250 },
            documentos : { required: true }
        },
        messages: {
            prueba_psico: "<b>Este campo es requerido</b>",
            prueba_tecnica: "<b>Este campo es requerido</b>",
            observaciones_psico: { required: "<b>Este campo es requerido</b>", maxlength: "<b>Máximo 250 car&aacute;cteres</b>"},
            comentarios: { required: "<b>Este campo es requerido</b>", maxlength: "<b>Máximo 250 car&aacute;cteres</b>"},
            documentos : "<b>Este campo es requerido</b>"
        },
        submitHandler: function(form){
            var dataString = 'id='+$('#id').val()+'&prueba_psico='+$('#prueba_psico').val()+'&prueba_tecnica='+$('#prueba_tecnica').val()+'&observaciones_psico='+$('#observaciones_psico').val()+'&documentos='+$('#documentos').val()+'&comentarios='+$('#comentarios').val()+"'"+'&metodo=cargarEvaluacion&tipo=1';
            $.ajax({
                type: "POST",
                url: "../vistas/guardar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#formEditarEvaluacion").hide();  
                }
            });
        }
    });
    
    //validando formulario editar evaluaciones	
    $("#formEditarEvaluacion").validate({
        rules: {
            prueba_psico: { required: true },
            prueba_tecnica: { required: true },
            observaciones_psico: { required: true,  maxlength: 250 },
            comentarios: { required: true, maxlength: 250 },
            documentos : { required: true }
        },
        messages: {
            prueba_psico: {required:"<b>Este campo es requerido</b>"},
            prueba_tecnica: {required:"<b>Este campo es requerido</b>"},
            observaciones_psico: {required:"<b>Este campo es requerido</b>", maxlength: "<b>Máximo 250 car&aacute;cteres</b>"},
            comentarios: {required:"<b>Este campo es requerido</b>", maxlength: "<b>Máximo 250 car&aacute;cteres</b>"},
            documentos : {required:"<b>Este campo es requerido</b>"},
        },
        submitHandler: function(form){
            var dataString = 'id='+$('#id').val()+'&prueba_psico='+$('#prueba_psico').val()+'&prueba_tecnica='+$('#prueba_tecnica').val()+'&observaciones_psico='+$('#observaciones_psico').val()+'&comentarios='+$('#comentarios').val()+'&documentos='+$('#documentos').val()+'&metodo=actualizarEvaluacion&tipo=1';
            $.ajax({
                type: "POST",
                url: "../vistas/actualizar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                }
            });
        }
    });
    
    //Validando formulario para crear nuevos cursos
    $("#formCrearCurso").validate({
        rules: {
            nombreCurso: { required: true, maxlength:150},
            duracion: { required: true, number: true}
        },
        messages: {
            nombreCurso: { required: "<b>Este campo es requerido</b>", maxlength:"<b>El nombre no debe exceder los 150 car&aacute;cteres</b>"},
            duracion: { required: "<b>Este campo es requerido</b>", number:"<b>S&oacute;lo n&uacute;meros</b>"}
        },
        submitHandler: function(form){
            var dataString = 'nombre='+$('#nombreCurso').val()+'&duracion='+$('#duracion').val()+'&metodo=cargarCurso&tipo=1';
            $.ajax({
                type: "POST",
                url: "../vistas/guardar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#formCrearCurso")[0].reset();  
                }
            });
        }
    });
    //Validando formulario para crear nuevos cursos
    $("#formEditarCurso").validate({
        rules: {
            nombreCurso: { required: true, maxlength:150},
            duracion: { required: true}
        },
        messages: {
            nombreCurso: { required: "<b>Este campo es requerido</b>", maxlength:"<b>El nombre no debe exceder los 150 car&aacute;cteres</b>"},
            duracion: { required: "<b>Este campo es requerido</b>"}
        },
        submitHandler: function(form){
            var dataString = 'nombreCurso='+$('#nombreCurso').val()+'&duracion='+$('#duracion').val()+'&id='+$('#id').val()+'&metodo=actualizarCurso&tipo=1';
            $.ajax({
                type: "POST",
                url: "../vistas/actualizar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#resultado").show();
                    $("#formEditarCurso").hide();
                    $("#table-cursos").show();
                    setTimeout(function() {window.location.reload();}, 4000);
                }
            });
        }
    });
    
    //Validando formulario para crear nuevos cursos
    $("#formEditarPlanCurso").validate({
        rules: {
            nombreCurso: { required: true, maxlength:150},
            duracion: { required: true},
            fechaCursoPlan: { required: true}
        },
        messages: {
            nombreCurso: { required: "<b>Este campo es requerido</b>", maxlength:"<b>El nombre no debe exceder los 150 car&aacute;cteres</b>"},
            duracion: { required: "<b>Este campo es requerido</b>"},
            fechaCursoPlan: { required: "<b>Este campo es requerido</b>"}
        },
        submitHandler: function(form){
            var dataString = 'nombreCurso='+$('#nombreCurso').val()+'&duracion='+$('#duracion').val()+'&fecha='+$('#fechaCursoPlan').val()+'&id='+$('#id').val()+'&metodo=actualizarPlanCurso&tipo=1';
            $.ajax({
                type: "POST",
                url: "../vistas/actualizar.php",
                data: dataString,
                success: function(responseText){
                    $("#resultado").html(responseText);
                    $("#resultado").show();
                    $("#editCurso").hide();      
                    $("#table-cursos").show();
                    setTimeout(function() {window.location.reload();}, 5000);
                }
            });
        }
    });
    
    //Validando formulario para planificar cursos
    $("#formProgramarCurso").validate({
        rules: {
            id_curso: { required: true},
            fecha: { required: true},
            id_persona:{ required: true}
        },
        messages: {
            id_curso: { required: "<b>Este campo es requerido</b>"},
            fecha: { required: "<b>Este campo es requerido</b>"},
            id_persona: { required: "<b>Este campo es requerido</b>"}
        },
        submitHandler: function(form){
            $(".participante").each(function() {
                var id_persona = $(this).val();
                var dataString = 'fecha='+$('#fecha').val()+'&id_curso='+$('#id_curso').val()+'&id_persona='+id_persona+'&metodo=cargarPlanificacionCurso&tipo=1';  		
                $.ajax({
                    type: "POST",
                    url: "../vistas/guardar.php",
                    data: dataString,
                    success: function(responseText){
                        $("#resultado").html(responseText);
                        $("#instaResultado").empty();
                        $("#listaPersonas").empty();
                        $("#formProgramarCurso")[0].reset();                           
                    }
                });
            });
        }
    });
    
    //Validando formulario añadir participantes a un curso
    $("#formAddParticipantes").validate({
        rules: {
            id_curso: { required: true},
            fecha: { required: true},
            id_persona:{ required: true}
        },
        messages: {
            id_curso: { required: "<b>Este campo es requerido</b>"},
            fecha: { required: "<b>Este campo es requerido</b>"},
            id_persona: { required: "<b>Este campo es requerido</b>"}
        },
        submitHandler: function(form){
            $(".participante").each(function() {
                var id_persona = $(this).val();
                var dataString = 'fecha='+$('#fecha').val()+'&id_curso='+$('#id_curso').val()+'&id_persona='+id_persona+'&metodo=cargarPlanificacionCurso&tipo=1';;         		
                $.ajax({
                    type: "POST",
                    url: "../vistas/guardar.php",
                    data: dataString,
                    success: function(responseText){
                        $("#resultado").html(responseText);
                        $("#instaResultado").empty();
                        $("#listaPersonas").empty();
                    }
                });
            });
        }
    });
    
    //Función para ventana de confirmación antes de eliminar registros
    
    var confirmation = $('#modal-confirmation').dialog({
        dialogClass:'delete_confirmation_dialog',
        autoOpen: false,
        width:400,
        minHeight:200,
        modal: true,
        resizable: false,
        buttons: {
            'Si': function() {
                var dataString = 'id='+$('#id').val()+'&metodo=eliminarEvaluacion';
                $.ajax({
                    type: "POST",
                    url: "../vistas/eliminar.php",
                    data: dataString,
                    success: function(responseText){
                        $("#resultado").html(responseText);
                        $("#resultado").show();
                        $("#table").hide();
                    }
                });  
                $(this).dialog("close");
            },
            'No': function() {
                $(this).dialog("close");
            },
        },
        create:function () {
            $(this).closest(".ui-dialog")
                    .find(".ui-button:eq(1)") // the second button
                    .addClass("continue");
        }
    }); 
    
    $('.btn-delete-plan-curso').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        var id = $(this).attr('id');
        swal({
            title: "¡Atención! La planificación del curso seleccionado será eliminada ¿Desea continuar?",
            text: "No se podra deshacer esta acción",
            type: "warning",
            confirmButtonColor: "#337ab7",
            confirmButtonText: "Si",
            showCancelButton: true,
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function(isConfirm){
            if (isConfirm)   {              
                $.ajax({
                    data:  'id='+id+'&metodo=eliminarPlanCurso',
                    url:   "../vistas/eliminar.php",
                    type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                    },
                    success:  function (response) {
                        $("#resultado").html(response);
                        /*setTimeout(function() {
                        $("#resultado").html(response);}, 500);*/
                    }
                });
            }
        });
    });
    
    $('.btn-delete-evaluacion').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        var id = $(this).attr('id');
        swal({
            title: "¡Atención! La evaluación seleccionada será eliminada ¿Desea continuar?",
            text: "No se podra deshacer esta acción",
            type: "warning",
            confirmButtonColor: "#337ab7",
            confirmButtonText: "Si",
            showCancelButton: true,
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function(isConfirm){
            if (isConfirm)   {              
                $.ajax({
                    data:  "id="+id+"&metodo=eliminarEvaluacion",
                    url:   "../vistas/eliminar.php",
                    type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                    },
                    success:  function (response) {
                        $("#resultado").html(response);
                        /*setTimeout(function() {
                        $("#resultado").html(response);}, 500);*/
                    }
                });
            }
        });
    });
    
    //***BOTONES
    
    //-- PERSONAS
    
    //Función para editar registros de Personas
    $("#editarPersona").click(function(){
        $("#table").hide();
        $("#exportar").hide();
        $("#editar-persona").show();
    });
    
    //boton para ver formulario #detalles personas
    $("#detalles").click(function(){
        $("#table").hide();
        $("#detalles-persona").show();
    });
    //boton cancelar formulario formEdit
    $("#cancelar").click(function(){
        $("#formEditarPersona")[0].reset();
        $("#exportar").hide();
        $("#formEditarPersona").hide();
    });
    
    //-- EVALUACIONES
    
    //boton/enlace para desplegar formulario edicion de evaluaciones #formEditarEvaluacion   
    $("#editarEval").click(function(){
        $("#mensaje").hide();
        $("#table").hide();
        $("#exportar").hide();
        $("#editar-evaluacion").show();
    });
    
    //boton cancelar formulario #formEvaluacion
    $("#cancelar_form_evaluacion").click(function(){
        $("#formEvaluacion").hide();
    });   
    
    //Boton eliminar evaluacion
    $('#eliminar').click(function(){
        confirmation.dialog('open');
        return false;
    });
    
    // DATEPICKET JQUERY UI
    $(function (){
        $( "#fnacimiento" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy"
        }); 
        $( "#fechaCurso" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy"
        });
        $( "#fechaCursoPlan" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy"
        });
        $( "#fecha" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy"
        }); 
    });
    
    // ESTABLECER PLACEHOLDER/MASK INPUTS FECHA - TELEFONO
    $('#fnacimiento').mask("99-99-9999", {placeholder: 'dd-mm-aaaa' });
    
    $('#telefono').mask("9999-9999999", {placeholder: '0000-0000000' });
    
    $('#fechaCurso').mask("99-99-9999", {placeholder: 'dd-mm-aaaa' });
    
    $('#fechaCursoPlan').mask("99-99-9999", {placeholder: 'dd-mm-aaaa' });
    
    // VALIDACIONES EN VIVO 
    $('#cedula').focusout(function(){
        if($('#cedula').val()!= ""){
            $.ajax({
                type: "POST",
                url: "../utilidades/validaciones.php",
                data: "variable="+$('#cedula').val()+"&tipoVal=3",
                beforeSend: function(){
                    $('div#validacion').html('Verificando...');
                },
                success: function( respuesta ){
                    $('div#validacion').html(respuesta);            
                }
            });
        }
    });
    
    $('#username').focusout(function(){
        if($('#username').val()!== ""){
            $.ajax({
                type: "POST",
                url: "../utilidades/validaciones.php",
                data: "variable="+$('#username').val()+"&tipoVal=1",
                beforeSend: function(){
                    $('div#validacion').html('Verificando...');
                },
                success: function( respuesta ){
                    $('div#validacion').html(respuesta);            
                }
            });
        }
    });
    
    
    $('#passwordActual').focusout(function(){
        if($('#passwordActual').val()!== ""){
            $.ajax({
                type: "POST",
                url: "../utilidades/validaciones.php",
                data: "variable="+$('#passwordActual').val()+"&tipoVal=2",
                beforeSend: function(){
                    $('div#validacion').html('Verificando...');
                },
                success: function( respuesta ){
                    $('div#validacion').html(respuesta);            
                }
            });
        }
    });
    
    // FIN VALIDACIONES EN VIVO
    
    //BUSQUEDA INSTANTANEA
    
    var consulta;
    var iCnt = 0;
    
    //hacemos focus al campo de búsqueda
    //$("#busqueda").focus();
    
    //comprobamos si se pulsa una tecla
    $("#busqueda").keyup(function(e){
        
        //obtenemos el texto introducido en el campo de búsqueda
        consulta = $("#busqueda").val();
        
        //hace la búsqueda                                                                          
        $.ajax({
            type: "POST",
            url: "../vistas/busquedaInstantanea.php",
            data: "b="+consulta,
            dataType: "html",
            /*beforeSend: function(){
                //imagen de carga
                $("#resultado2").html("<p align='center'><img src='../images/ajax-loader.gif' /></p>");
            },*/
            error: function(){
                alert("error petición ajax");
            },
            success: function(data){    
                $("#instaResultado").empty();
                $("#instaResultado").append(data);
                $(".btn-xs").each(function(){
                    $(this).click(function(){
                        var bid = $(this).attr('id');
                        var id = $(this).attr('value');
                        if (iCnt <= 20) {                         
                            iCnt = iCnt + 1;
                            $("#listaPersonas").append('<div id="'+id+'"><hr><div class="col-md-3"><span><b>'+bid+'</b></span><input type=hidden name="id_persona" class="participante" id=' + id + ' ' +
                                    'value="'+ id +'" /> </div> <button type="button" id="'+id+'" class="remove">Quitar</button><br><br></div>');                           
                            $(".remove").click(function() {
                                $(this).parent().remove();                    
                            });
                            
                        }
                    });
                });
            }
        });
    });
    
    //ACCORDION JQUERY UI   
    $( function() {
        $( "#accordion" ).accordion({
            collapsible: true,
            heightStyle: "content",
        });
    } );
    
    //VENTANA MODAL JQUERY UI	
    $( "#modal-msg" ).dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
        buttons: {
            Cancel: function() {
                x.dialog( "close" );
            }
        },
        close: function() {
            form[ 0 ].reset();
            allFields.removeClass( "ui-state-error" );
        }
    });
    $( "#editarUser" ).button().on( "click", function() {
        x.dialog( "open" );
    });
    
    //CAPA RESIZABLE JQUERY UI
    $( function() {
        $( "#resizable" ).draggable({
            
        });
    });  
    
}); //FIN JQUERY DOM

//Funciones para botones cancelar
function cancelar(id_1,id_2){
    $(id_1).hide();
    $("#resultado").empty();
    $(id_2).show();
}

function cancelar_2(id_1,id_2){
    $(id_1).hide();
    $(id_2).show();
}

//Función para enviar dados vía AJAX
function enviarDatos(variable,metodo,tipo){
    switch(tipo) {
        case 1: //Consultar personas
            if(variable===""){
                $("#resultado").empty();
                $("#cedulaConsulta").focus();
                $("#cedulaConsulta").addClass("form-control-error");
                $("#resultado").append('<p class="error">Introduzca el número de cédula a consultar</p>');
            }else{
                $("#cedulaConsulta").removeClass("form-control-error");
                var parametros = {
                    "cedula" : variable
                };
                $.ajax({
                    data:  parametros,
                    url:   metodo,
                    type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                    },
                    success:  function (response) {
                        //$("#resultado").html(response);
                        setTimeout(function() {
                            $("#resultado").html(response);}, 500);
                    }
                });
            }
            break;
        case 2: //Editar cursos
            var parametros = {
                "id_curso" : variable
            };
            $.ajax({
                data:  parametros,
                url:   metodo,
                type:  'POST',
                beforeSend: function () {
                    $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                },
                success:  function (response) {
                    //$("#resultado").html(response);
                    setTimeout(function() {
                        $("#resultado").html(response);
                    }, 500);
                }
            });
            break;
        case 3: //Consultar cursos
            if(variable==""){
                $("#resultado").empty();
                $("#fechaCurso").focus();
                $("#fechaCurso").addClass("form-control-error");
                $("#resultado").append('<p class="error">Introduzca la fecha a consultar</p>');
            }else{
                $("#fechaCurso").removeClass("form-control-error");
                var parametros = {
                    "fecha" : variable
                };
                $.ajax({
                    data:  parametros,
                    url:   metodo,
                    type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                    },
                    success:  function (response) {
                        //$("#resultado").html(response);
                        setTimeout(function() {
                            $("#resultado").html(response);}, 500);
                    }
                });
            }
            break;
        case 4: //Importar archivos .csv
            if(variable==""){
                $("#resultado").empty();
                $("#archivo").focus();
                $("#archivo").addClass("form-control-error");
                $("#resultado").append('<p class="error">Debe seleccionar un archivo</p>');
            }else{
                var form = $('form')[0];
                var formData = new FormData(form);
                $.ajax({
                    data:  formData,
                    url:   "../vistas/guardar.php",
                    type:  'POST',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                    },
                    success:  function (response) {
                        //$("#resultado").html(response);
                        setTimeout(function() {
                            $("#resultado").html(response);}, 500);
                    }
                });
            }
            break;
        case 5: //Eliminar participante
            var parametros = {
                "id" : variable,
                "metodo":'eliminarParticipante',
            };
            if (confirm('La persona seleccionada será retirada del curso. ¿Desea continuar?')) {
                $.ajax({
                    data:  parametros,
                    url:   metodo,
                    type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                    },
                    success:  function (response) {
                        setTimeout(function() {$("#resultado").html(response);}, 500);
                    }
                });
            }
            break;
        case 6: //Editar datos curso
            $("#resultado").hide();            
            $("#table-cursos").hide();
            $("#editCurso").show();
            var parametros = {
                "id_curso" : variable
            };
            $.ajax({
                data:  parametros,
                url:   metodo,
                type:  'POST',
                beforeSend: function () {
                    $("#editCurso").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                },
                success:  function (response) {
                    setTimeout(function() {
                        $("#editCurso").html(response);}, 500);
                }                
            });            
            break;
        case 7: //Desactivar usuarios
            $("#resultado").hide();
            $("#table-user").hide();
            $("#editUser").show();
            var parametros = {
                "id" : variable
            };
            $.ajax({
                data:  parametros,
                url:   metodo,
                type:  'POST',
                beforeSend: function () {
                    $("#editUser").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
                },
                success:  function (response) {
                    setTimeout(function() {
                        $("#editUser").html(response);}, 500);
                }
            });            
            break;
    }
}

function editarUsuario(metodo){
    var id =  $('#id').val();
    var nombres = $('#nombres').val();
    var apellidos = $('#apellidos').val();
    var cedula = $('#cedulaUser').val();
    var correo = $('#correo').val();
    var username = $('#username').val();
    var id_grupo = $('#id_grupo').val();
    var estatus = $('#estatus').val();
    if ((nombres !== "") && (apellidos !== "") && (cedula !== "") && (correo !== "") && (username !== "") && (id_grupo !== "") && (estatus !== "")){
        var dataString = 'id='+id+'&nombres='+nombres+'&apellidos='+apellidos+'&cedula='+cedula+'&correo='+correo+'&username='+username+'&id_grupo='+id_grupo+'&estatus='+estatus+'&metodo=actualizarUsuario&tipo=1';
        $.ajax({
            data:  dataString,
            url:   metodo,
            type:  'POST',
            beforeSend: function () {
                $("#resultado").show();
                //$("#resultado").removeClass("error");
                $("#resultado").html('<img src="../images/ajax-loader.gif"></img> Procesando, por favor espere un momento...');
            },
            success:  function (response) {
                $("#resultado").html(response);
                $("#editUser").hide();
                $("#table-user").show();
                setTimeout(function() {window.location.reload();}, 5000);                
            }
        });
    }else{
        $("#resultado").html("¡Error! Debe completar todos los campos del formulario");
        $("#resultado").addClass("error");
        $("#resultado").show();
    }    
}

function enviar(nombres,apellidos,cedula,telefono,correo,direccion){
    // Comprobamos que está disponible AJAX
    if(window.XMLHttpRequest) {
        ajax = new XMLHttpRequest()
    }
    ajax.open("POST","mostrarPersona.php",true)
    // La respuesta aparecerá en una alerta
    ajax.onreadystatechange=function(){
        if(ajax.readyState == 4) {
            alert(ajax.responseText)
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
    ajax.send("&nombres=" + nombres + "&apellidos=" + apellidos + "&cedula=" + cedula + "&telefono=" + telefono + "&correo=" +correo+"&direccion="+direccion)
}

//Función para combos dependientes
var peticion = false;
var  testPasado = false;
try {
    peticion = new XMLHttpRequest();
} catch (trymicrosoft) {
    try {
        peticion = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (othermicrosoft) {
        try {
            peticion = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (failed) {
            peticion = false;
        } 
    }
}
if (!peticion)
    alert("ERROR AL INICIALIZAR!");

function cargarCombo (url, comboAnterior, element_id) { 
    //Obtenemos el contenido del div
    //donde se cargaran los resultados
    var element =  document.getElementById(element_id);
    //Obtenemos el valor seleccionado del combo anterior
    var valordepende = document.getElementById(comboAnterior)
    var x = valordepende.value
    //construimos la url definitiva
    //pasando como parametro el valor seleccionado
    var fragment_url = url+'?id='+x;
    element.innerHTML = '<style ><img src="../Images/ajax.gif" />'; 	
    
    //abrimos la url
    peticion.open("GET", fragment_url); 
    peticion.onreadystatechange = function() { 
        if (peticion.readyState == 4) {
            //escribimos la respuesta
            element.innerHTML = peticion.responseText;
        } 
    } 
    peticion.send(null); 
} 

//FUNCIONES PARA EXPORTAR REGISTROS

function ExportToPdf(){
    var cedula= document.getElementById('cedula').value;
    window.location.href = '../vistas/reportePdf.php?cedula='+cedula; 
}
function ExportCursoToPdf(id){
    window.location.href = '../vistas/reporteCursoPdf.php?id='+id; 
}
function ExportToExcel(){
    var cedula= document.getElementById('cedula').value;
    window.location.href = '../vistas/reporteExcel.php?cedula='+cedula; 
}
function ExportCursoToExcel(){
    var id = document.getElementById('id').value;
    window.location.href = '../vistas/reporteCursoExcel.php?id='+id; 
}
function Imprimir(){
    window.print();
}
