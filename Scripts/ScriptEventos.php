<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
    var id_rama_evento_calendario = $("#id-rama-evento-calendario").val();
    var id_rama_evento = $("#id-rama-evento").val();
    var accion = "eventos-calendario";
    $('#Calendario_Web').fullCalendar({
        header:{
            left:'today,prev,next',
            center:'title',
            right:'month,basicWeek',
        },
        dayClick:function(date,jsEvent,view){
            $('#btn-agregar-evento').prop("hidden", false);
            $('#fila-archivos-evento').prop("hidden", true);
            $('#btn-borrar').prop("hidden", true);
            limpiarFormularioEvento();
            $('#fechainicioevento').val(date.format());
            $('#fechacierreevento').val(date.format());
            $("#modal-gestor-evento").modal();
        },
        eventSources: [
            {
                url: '<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php',
                type: 'POST',
                data: {
                    "Id-rama-evento": id_rama_evento_calendario,
                    accion: accion
                },
                error: function() {
                    alert('there was an error while fetching events!');
                }
            }
        ],
        eventClick:function(calEvent,jsEvent,view){
            $('#btn-borrar').prop("hidden", false);
            $('#fila-archivos-evento').prop("hidden", false);
            $('#btn-agregar-evento').prop("hidden", false);
            $('#titulo').html(calEvent.title);
            $('#id-evento').val(calEvent.Id);
            $('#id-imagen-evento').val(calEvent.Id);
            $('#id-ficha-evento').val(calEvent.Id);
            $('#nombreevento').val(calEvent.title);
            FechaInicio = calEvent.start._i.split(" ");
            $('#fechainicioevento').val(FechaInicio[0]);
            $('#horainicio').val(FechaInicio[1]);
            FechaCierre = calEvent.end._i.split(" ");
            $('#fechafinevento').val(FechaCierre[0]);
            $('#horafin').val(FechaCierre[1]);
            $('#tipoevento').val(calEvent.Tipo);
            $('#sitioevento').val(calEvent.Sitio);
            $('#fechaencuentro').val(calEvent.Fecha_encuentro);
            $('#horaencuentro').val(calEvent.Hora_encuentro);
            $('#puntoencuentro').val(calEvent.Punto_encuentro);
            $('#costoevento').val(calEvent.Costo);
            if (calEvent.Insignia) {
              $("#img-insignia-evento").attr("src", "../../Archivos/Subidas/Eventos/Insignias_eventos/"+calEvent.Insignia);
              $("#img-insignia-evento").prop("hidden", false);
            } else {
              $("#img-insignia-evento").attr("src", "");
              $("#img-insignia-evento").prop("hidden", true);
            }
            if (calEvent.Ficha) {
              $("#enlace-ficha-evento").attr("href", "../../Archivos/Subidas/Eventos/Fichas_eventos/"+calEvent.Ficha+"?forcedownload=1");
              $("#enlace-ficha-evento").prop("hidden", false);
            } else {
              $("#enlace-ficha-evento").attr("href", "");
              $("#enlace-ficha-evento").prop("hidden", true);
            }
            $("#modal-gestor-evento").modal();
        },
        editable:true,
        eventDrop:function(calEvent) {
            $('#id').val(calEvent.Id);
            $('#nombre').val(calEvent.title);
            FechaInicio = calEvent.start.format().split("T");
            $('#fechainicioevento').val(FechaInicio[0]);
            $('#horainicio').val(FechaInicio[1]);
            FechaCierre = calEvent.end.format().split("T");
            $('#fechafinevento').val(FechaCierre[0]);
            $('#horafin').val(FechaCierre[1]);
            $('#tipo').val(calEvent.Tipo);
            $('#sitio').val(calEvent.Sitio);
            $('#fecha-encuentro').val(calEvent.Fecha_encuentro);
            $('#hora-encuentro').val(calEvent.Hora_encuentro);
            $('#punto-encuentro').val(calEvent.Punto_encuentro);
            $('#costo').val(calEvent.Costo);
            $('#costo-incluye').val(calEvent.Costo_incluye);
            $('#material-individual').val(calEvent.Material_individual);
            $('#material-equipo').val(calEvent.Material_equipos);
        }
    });
    $('#Calendario_Asistencia_Eventos').fullCalendar({
        header:{
            left:'today,prev,next',
            center:'title',
            right:'month,basicWeek',
        },
        eventSources: [
            {
                url: '<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php',
                type: 'POST',
                data: {
                    "Id-rama-evento": id_rama_evento_calendario,
                    accion: accion
                },
                error: function() {
                    alert('there was an error while fetching events!');
                }
            }
        ],
        eventClick:function(calEvent,jsEvent,view){
            $('#btn-borrar').css("display", "none");
            $('#btn-agregar-evento').css("display", "none");
            $('#titulo').html(calEvent.title);
            $('#idevento').val(calEvent.Id);
            listarParticipantesEvento();
            $('#nombreevento').val(calEvent.title);
            FechaInicio = calEvent.start._i.split(" ");
            $('#fechainicioevento').val(FechaInicio[0]);
            $('#horainicio').val(FechaInicio[1]);
            FechaCierre = calEvent.end._i.split(" ");
            $('#fechafinevento').val(FechaCierre[0]);
            $('#horafin').val(FechaCierre[1]);
            $('#tipoevento').val(calEvent.Tipo);
            $('#sitioevento').val(calEvent.Sitio);
            $('#fechaencuentroevento').val(calEvent.Fecha_encuentro);
            $('#horaencuentro').val(calEvent.Hora_encuentro);
            $('#puntoencuentro').val(calEvent.Punto_encuentro);
            $('#costoevento').val(calEvent.Costo);
            $("#modal-gestor-evento-asistencia").modal();
        }
    });
    $("#btn-agregar-evento").click(function() {
      $("#formulario-evento").validate({
        invalidHandler: function(event, validator) {
          alertify.error("Por favor, verifica los campos requeridos *");
        },
        submitHandler: function(form) {
          registroEvento();
        },
        rules:{
            nombreevento:{required: true, latinos: true},
            fechainicioevento:{required: true, dateISO: true},
            horainicio:{required: true},
            fechafinevento:{required: true, dateISO: true},
            horafin:{required: true},
            tipoevento:{required: true},
            sitioevento:{required: true, latinos: true},
            fechaencuentro:{dateISO: true},
            horaencuentro:{required: true},
            puntoencuentro:{latinos: true},
            costoevento:{digits: true}
        },
        messages:{
            nombreevento:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras'},
            fechainicioevento:{required: 'El campo es requerido', dateISO: 'El formato de fecha es incorrecto'},
            horainicio:{required: 'El campo es requerido'},
            fechafinevento:{required: 'El campo es requerido', dateISO: 'El formato de fecha es incorrecto'},
            horafin:{required: 'El campo es requerido'},
            tipoevento:{required: 'El campo es requerido'},
            sitioevento:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras'},
            fechaencuentro:{dateISO: 'El formato de fecha es incorrecto'},
            horaencuentro:{required: 'El campo es requerido'},
            puntoencuentro:{latinos: 'Solo se aceptan letras'},
            costoevento:{digits: 'Solo se aceptan números'}
        },
        errorPlacement: function(error, element) {
            if (element.is("input[type='time']")) {
                error.appendTo(element.closest('.form-group'));
            } else {
                error.insertAfter(element);
            }
        }
      });
    });
    $('.clockpicker').clockpicker();
    $("#btn-agregar-ficha-evento").click(function() {
      agregarFichaEvento();
    });
    $("#ficha-evento").on('change', function(){
      var archivo = $(this).val().split('\\').pop().split('.').pop();
      if (archivo == "doc" || archivo == "docx" || archivo == "odt"
         || archivo == "rtf" || archivo == "gdoc") {
        $("#ficha-word-writer").prop("hidden", false);
        $("#ficha-pdf").prop("hidden", true);
        $("#ficha-no-permitida").prop("hidden", true);
        $("#btn-agregar-ficha-evento").prop("disabled", false);
      } else if (archivo == "pdf") {
        $("#ficha-word-writer").prop("hidden", true);
        $("#ficha-pdf").prop("hidden", false);
        $("#ficha-no-permitida").prop("hidden", true);
        $("#btn-agregar-ficha-evento").prop("disabled", false);
      } else {
        $("#ficha-word-writer").prop("hidden", true);
        $("#ficha-pdf").prop("hidden", true);
        $("#ficha-no-permitida").prop("hidden", false);
        alertify.error('El tipo de archivo seleccionado no es valido');
        $("#btn-agregar-ficha-evento").prop("disabled", true);
      }
    });
});
$(function() {
    $(document).on('click', 'button[name=btn-borrar-participante]', function(event) {
        var id_persona = $(this).attr("id");
        var id_evento = $(this).val();
        eliminarParticipanteEvento(id_evento, id_persona);
    });
});
function registroEvento() {
    var id_evento = $("#id-evento").val();
    var nombre_evento = $("#nombreevento").val();
    var fecha_inicio_evento = $("#fechainicioevento").val()+" "+$("#horainicio").val();
    var fecha_fin_evento = $("#fechafinevento").val()+" "+$("#horafin").val();
    var tipo_evento = $("#tipoevento").val();
    var sitio_evento = $("#sitioevento").val();
    var fecha_encuentro = $("#fechaencuentro").val()+" "+$("#horaencuentro").val();
    var punto_encuentro = $("#puntoencuentro").val();
    var costo_evento = $("#costoevento").val();
    var color_texto_evento = $("#color-texto").val();
    var color_evento = $("#color-evento").val();
    var id_rama_evento = $("#id-rama-evento").val();
    var accion = 'insertar-actualizar-evento';
    var cadena = "Id-evento="+id_evento+"&Nombre-evento="+nombre_evento+
    "&Fecha-inicio-evento="+fecha_inicio_evento+"&Fecha-fin-evento="+fecha_fin_evento
    +"&Tipo-evento="+tipo_evento+"&Sitio-evento="+sitio_evento+"&fecha-encuentro="+fecha_encuentro
    +"&Punto-encuentro="+punto_encuentro+"&Costo-evento="+costo_evento+
    "&Color-texto-evento="+color_texto_evento+"&Color-evento="+color_evento
    +"&Id-rama-evento="+id_rama_evento+"&accion="+accion;
    $.ajax({
        method:'POST',
        url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php",
        data:cadena,
        success:function(respuesta){
            if(respuesta == true) {
                $('#Calendario_Web').fullCalendar('refetchEvents');
                alertify.success("Registro exitoso del evento");
                $('#modal-gestor-evento').modal('hide');
            } else {
                alertify.error("No pudo registrarse el evento.<br>Recargue la página e intentelo nuevamente.");
            }
        }
    });
}
function limpiarFormularioEvento() {
    $('#id-evento').val('');
    $('#nombreevento').val('');
    $('#fechainicioevento').val('');
    $('#horainicio').val('');
    $('#tipoevento').val('');
    $('#fechafinevento').val('');
    $('#horafin').val('');
    $('#fechaencuentro').val('');
    $('#horaencuentro').val('');
    $('#puntoencuentro').val('');
    $('#costoevento').val('');
}
function listarParticipantesEvento() {
    var id_evento = $('#idevento').val();
    var accion = "listar-participantes-evento";
    var cadena = "Id-evento="+id_evento+"&accion="+accion;
    $.ajax({
        method:'POST',
        url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php",
        data:cadena,
        success:function(datos){
            if(datos) {
                $('#listado-personas-asisten-evento').html(datos);
            }
        }
    });
}
function eliminarParticipanteEvento(id_evento, id_persona) {
    var accion = "eliminar-participante-evento";
    var cadena = "Id-evento="+id_evento+"&Id-persona-evento="+id_persona+"&accion="+accion;
    $.ajax({
        method:'POST',
        url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php",
        data:cadena,
        success:function(respuesta){
            if(respuesta == true) {
                $('#Calendario_Asistencia_Eventos').fullCalendar('refetchEvents');
                $('#modal-gestor-evento-asistencia').modal('hide');
                alertify.success('La persona fue removida correctamente');
            } else {
                alertify.error('Hay un error Evento Participante');
            }
        }
    });
}
function agregarFichaEvento() {
  var parametros = new FormData($("#formEventoFicha")[0]);
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOArchivos.php",
    data:parametros,
    contentType: false,
    processData: false,
    beforeSend: function() {
    },
    success:function(respuesta){
      if(respuesta == true) {
        $('#Calendario_Web').fullCalendar('refetchEvents');
        alertify.success("Subida exitosa de la ficha del evento");
        $('#modal-gestor-evento').modal('hide');
      } else {
        alertify.error('No se ha podido subir el archivo');
      }
    }
  });
}
 Dropzone.options.dropzoneFormEventoInsignia = {
  withCredentials: true,
  parallelUploads: 1,
  maxFilesize: 2,//EN MB
  paramName: 'imagen-evento',
  addRemoveLinks: true,
  maxFiles: 1,
  clickable: true,
  ignoreHiddenFiles: true,
  acceptedFiles:".jpg,.jpeg,.gif,.bmp,.png,.svg",
  autoProcessQueue: false,
  autoQueue: true,
  dictDefaultMessage: "Arrastra el archivo aqui para subirlo como imagen del evento",
  dictFallbackMessage: "Su navegador no soporta arrastrar y soltar para subir archivos.",
  dictFallbackText: "Por favor utilize el formuario de reserva de abajo como en los viejos tiempos.",
  dictFileTooBig: "La imagen revasa el tamaño permitido ({{filesize}}MiB). Tam. Max : {{maxFilesize}}MiB.",
  dictInvalidFileType: "No se puede subir este tipo de archivos.",
  dictResponseError: "Server responded with {{statusCode}} code.",
  dictCancelUpload: "Cancelar subida",
  dictUploadCanceled: "Has cancelado la subida",
  dictCancelUploadConfirmation: "¿Seguro que desea cancelar esta subida?",
  dictRemoveFile: "<button class='btn btn-danger'>Eliminar archivo</button>",
  dictRemoveFileConfirmation: "¿Desea eliminar el archivo?",
  dictMaxFilesExceeded: "Se ha excedido el numero de archivos permitidos.",
  init: function(){
   var btn_subir_imagen_evento = document.querySelector('#btn-agregar-insignia-evento');
   myDropzone = this;
   btn_subir_imagen_evento.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("success", function(file, respuesta){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    if (respuesta == 2) {
        alertify.error('El archivo excede el peso permitido');
      } else if(respuesta == 3) {
        alertify.error('El tipo de archivo no esta permitido');
      } else if(respuesta == 4) {
        alertify.error('El archivo no pudo ser subido');
      } else if (respuesta == 5) {
        alertify.error('El archivo no fue subido');
      } else if(respuesta == true) {
        alertify.success('El archivo fue subido correctamente');
        $('#modal-gestor-evento').modal('hide');
      }
   });
  },
};