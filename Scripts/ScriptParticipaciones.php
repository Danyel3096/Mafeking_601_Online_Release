<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
  listarParticipaciones();
  $("#formulario-participacion").validate({
    rules:{
      nombreeventoparticipacion:{required: true, latinos: true},
      creditospublicidadevento:{required: true, latinos: true},
      fechainicioeventoparticipacion:{required: true, dateISO: true},
      fechafineventoparticipacion:{required: true, dateISO: true},
      piepublicidadeventoparticipacion:{required:true, latinos: true},
      resumeneventoparticipacion:{required: true, latinos: true}
    },
    messages:{
      nombreeventoparticipacion:{required: 'El campo es requerido', latinos: 'El formato es incorrecto'},
      creditospublicidadevento:{required: 'El campo es requerido', latinos: ''},
      fechainicioeventoparticipacion:{required: 'El campo es requerido', dateISO: ''},
      fechafineventoparticipacion:{required: 'El campo es requerido', dateISO: ''},
      piepublicidadeventoparticipacion:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras latinas'},
      resumeneventoparticipacion:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras latinas'}
    }
  });
  $("#btn-guardar-participacion").click(function() {
    if($("#formulario-participacion").valid()){
      registroParticipacion();
    } else {
      alertify.error("Por favor, verifica los campos requeridos *");
    }
  });
  $("#btn-participacion-nueva").click(function() {
    limpiarCampos();
  });
});
function listarParticipaciones() {
  //var id_rama = $("#id-rama-persona").val();
  var id_rama = "1";
  var accion = "tabla-participaciones";
  var tabla = $("#tabla-participaciones").DataTable({
    "destroy":true,
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOParticipaciones.php",
      "data": {"Id-rama": id_rama, "accion":accion}
    },
    "columns":[
      {"data":"Fecha_inicio"},
      {"data":"Fecha_fin"},
      {"data":"Titulo_evento"},
      {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' data-toggle='modal' data-target='#modal-participaciones' id='btn-editar-participacion' name='btn-editar-participacion'><i class='fas fa-edit'></i></button>", "orderable": false}
    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    "dom":"<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",//"lBfrtip"
    "buttons":[
      {
        "extend": 'csv',
        "text": '<img src="https://img.icons8.com/ultraviolet/30/000000/csv.png">',
        "titleAttr": 'CSV',
        "className": 'btn btn-info'
      },
      {
        "extend":'excel',
        "text": '<img src="https://img.icons8.com/office/30/000000/ms-excel.png">',
        "titleAttr": 'Excel',
        "className": 'btn btn-success'
      },
      {
        "extend":'pdf',
        "text": '<img src="https://img.icons8.com/office/30/000000/pdf.png">',
        "titleAttr": 'PDF',
        "download": 'open',
        "className": 'btn btn-danger'
      },
      {
        "extend":'colvis',
        "text": '<img src="https://img.icons8.com/ios/40/000000/select-column.png">',
        "titleAttr": 'Ver/Ocultar columnas'
      }
    ]
  });
  obtenerParticipaciones("#tabla-participaciones tbody", tabla);
}
var obtenerParticipaciones = function(tbody, tabla) {
    $(tbody).on("click", "#btn-editar-participacion", function() {
      var datos = tabla.row($(this).parents("tr")).data();
      var id_evento_participa = $("#id-evento-participacion").val(datos.Id);
      var nombre_evento_participa = $("#nombreeventoparticipacion").val(datos.Titulo_evento);
      var url_video_evento = $("#url-video-evento").val(datos.Url);
      var creditos_publicidad_evento = $("#creditospublicidadevento").val(datos.Creditos_url);
      var fecha_inicio_evento_participacion = $("#fechainicioeventoparticipacion").val(datos.Fecha_inicio);
      var fecha_fin_evento_participacion = $("#fechafineventoparticipacion").val(datos.Fecha_fin);
      var pie_publicidad_evento_participacion = $("#piepublicidadeventoparticipacion").val(datos.Pie_url);
      //var  = $("#imagen-evento-participacion").val(datos);
      var resumen_evento_participacion = $("#resumeneventoparticipacion").val(datos.Resumen_evento);
    });
}
function limpiarCampos() {
  $("#id-evento-participacion").val("");
  $("#nombreeventoparticipacion").val("");
  $("#url-video-evento").val("");
  $("#creditospublicidadevento").val("");
  $("#fechainicioeventoparticipacion").val("");
  $("#fechafineventoparticipacion").val("");
  $("#piepublicidadeventoparticipacion").val("");
  //var  = $("#imagen-evento-participacion").val(datos);
  $("#resumeneventoparticipacion").val("");
}
function registroParticipacion() {
  var id_evento_participacion = $("#id-evento-participacion").val();
  var nombre_evento_participacion = $("#nombreeventoparticipacion").val();
  var url_video_evento = $("#url-video-evento").val();
  var creditos_publicidad_evento = $("#creditospublicidadevento").val();
  var fecha_inicio_evento_participacion = $("#fechainicioeventoparticipacion").val();
  var fecha_fin_evento_participacion = $("#fechafineventoparticipacion").val();
  var pie_publicidad_evento_participacion = $("#piepublicidadeventoparticipacion").val();
  //var  = $("#imagen-evento-participacion").val(datos);
  var resumen_evento_participacion = $("#resumeneventoparticipacion").val();
  var id_rama = $("#id-rama-persona").val();
  var accion = "insertar-actualizar-participacion";
  var cadena = "Id-evento-participacion="+id_evento_participacion
  +"&Titulo-evento="+nombre_evento_participacion+"&Url="+url_video_evento
  +"&Creditos-url="+creditos_publicidad_evento+"&Fecha-inicio="+fecha_inicio_evento_participacion
  +"&Fecha-fin="+fecha_fin_evento_participacion+"&Pie-url="+pie_publicidad_evento_participacion
  +"&Resumen-evento="+resumen_evento_participacion+"&Id-rama="+id_rama+"&accion="+accion;
  alert(cadena);
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOParticipaciones.php",
    data:cadena,
    success:function(respuesta){
      if(respuesta == true) {
        $('#tabla-participaciones').DataTable().ajax.reload();
        alertify.success("Participación agregada con exito");
        $('#modal-participaciones').modal('hide');
      } else {
        alertify.error("Verifica los campos requeridos *");
      }
    }
  });
}
Dropzone.options.dropzoneFormImagenEventoParticipacion = {
  withCredentials: true,
  parallelUploads: 1,
  maxFilesize: 2,//EN MB
  paramName: 'foto-previa',
  maxFiles: 1,
  clickable: true,
  ignoreHiddenFiles: true,
  acceptedFiles:".jpg,.jpeg,.gif,.bmp,.png,.svg",
  autoProcessQueue: false,
  autoQueue: true,
  dictDefaultMessage: "Arrastra el archivo aqui para subirlo como imagen del evento en el que la rama participó",
  dictFallbackMessage: "Su navegador no soporta arrastrar y soltar para subir archivos.",
  dictFallbackText: "Por favor utilize el formuario de reserva de abajo como en los viejos tiempos.",
  dictFileTooBig: "La imagen revasa el tamaño permitido ({{filesize}}MiB). Tam. Max : {{maxFilesize}}MiB.",
  dictInvalidFileType: "No se puede subir este tipo de archivos.",
  dictResponseError: "Server responded with {{statusCode}} code.",
  dictCancelUpload: "Cancelar subida",
  dictUploadCanceled: "Has cancelado la subida",
  dictCancelUploadConfirmation: "¿Seguro que desea cancelar esta subida?",
  dictRemoveFile: "Eliminar archivo",
  dictRemoveFileConfirmation: "¿Desea eliminar el archivo?",
  dictMaxFilesExceeded: "Se ha excedido el numero de archivos permitidos.",
  init: function(){
    var btn_subir_foto = document.querySelector('#btn-subir-foto');
    myDropzone = this;
    btn_subir_foto.addEventListener("click", function(){
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
      }
    });
  },
};