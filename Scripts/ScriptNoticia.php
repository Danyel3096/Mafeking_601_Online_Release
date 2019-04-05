<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
  $("#btn-noticia-nueva").css("display", "none");
  $("input[name='estado-noticia']" ).on('change', function() {
    estado = $(this).val();
    if ($.fn.DataTable.isDataTable('#tabla-noticias')) {
      $("#tabla-noticias").dataTable().fnDestroy();
      $('#tabla-noticias').empty();
    }
    $("#btn-noticia-nueva").css("display", "initial");
    listarNoticias(estado);
  });
  $("#btn-noticia-nueva").click(function() {
    limpiarNoticia();
  });
  $("#btn-guardar-noticia").click(function() {
    enviarNoticia();
  });
  $("#btn-enviar-comentario").click(function() {
    publicarComentario();
  });
});
var listarNoticias = function(estado) {
  var accion = "tabla-noticia";
  var tabla = $("#tabla-noticias").DataTable({
    "destroy":true,
    "headerCallback": function( thead, data, start, end, display ) {
      $(thead).find('th').eq(0).html( 'FECHA' );
      $(thead).find('th').eq(1).html( 'TITULO' );
      $(thead).find('th').eq(2).html( 'COMENTARIOS' );
    },
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAONoticias.php",
      "data":{"Estado-noticia": estado, "accion":accion}
    },
    "columns":[
      {"data":"Fecha"},
      {"data":"Titulo"},
      {"data":"cantidad_comentarios"},
      {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' data-toggle='modal' data-target='#modal-noticia' id='btn-editar-noticia'><i class='fas fa-edit'></button>", "orderable": false}
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
  obtenerDatosNoticia("#tabla-noticias tbody", tabla);
}

var obtenerDatosNoticia = function(tbody, tabla) {
  $(tbody).on("click", "#btn-editar-noticia", function() {
    var datos = tabla.row($(this).parents("tr")).data();
    var id_noticia = $("#id-noticia").val(datos.Id);
    var titulo = $("#titulo-noticia").val(datos.Titulo);
    if (datos.Estado == 'Publicada') {
      $("#estado-noticia").prop("checked", true);
    } else {
      $("#estado-noticia").prop("checked", false);
    }
    var texto = $("#cuerpo-noticia").val(datos.Texto);
    if (datos.Imagen !== null) {
      $("#img-imagen-noticia").attr("src", "../Archivos/Subidas/Noticias/"+datos.Imagen);
      $("#img-imagen-noticia").prop("hidden", false);
    }
  });
}
function enviarNoticia() {
  var id_noticia = $("#id-noticia").val();
  var id_persona_noticia = $("#id-persona-noticia").val();
  var titulo_noticia = $("#titulo-noticia").val();
  if ($('#estado-noticia').is(":checked")) {
    var estado_noticia ='Publicada';
  } else {
    var estado_noticia ='Sin publicar';
  }
  var cuerpo_noticia = $("#cuerpo-noticia").val();
  var accion = "insertar-actualizar-noticia";
  var cadena = "Id-noticia="+id_noticia+"&Id-persona-noticia="+id_persona_noticia+"&Titulo-noticia="+titulo_noticia+"&Estado-noticia="+estado_noticia+"&Cuerpo-noticia="+cuerpo_noticia+"&accion="+accion;
  $.ajax({
    type:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAONoticias.php",
    data:cadena,
    success:function(r){
      if(r==1) {
        $('#tabla-noticias').DataTable().ajax.reload();
        alertify.success("Noticia enviada exitosamente");
      } else {
        alertify.error("Hay un error");
      }
    }
  });
}
function preguntarBorrado(id) {
  alertify.confirm('Eliminar datos', '¿Está seguro de eliminar este registro?', function(){ eliminarDatos(id) }
    , function(){ alertify.error('Borrado cancelado')});
}
function eliminarDatos(id) {
    accion='eliminar';
    var cadena = "id="+id+"&accion="+accion;
    $.ajax({
      type:'POST',
      url:'<?php echo SERVIDOR ?>/App/Servidor/CtrlDAONoticias.php',
      data:cadena,
      success:function(respuesta) {
        if (respuesta == true) {
          $('#tabla-noticias').DataTable().ajax.reload();
          alertify.success("Eliminado con exito");
        } else {
          alertify.error("Hay un error 3");
        }
      }
    });
  }
var limpiarNoticia = function () {
  $("#id-noticia").val('');
  $("#titulo-noticia").val('');
  $("#estado-noticia").prop("checked", false);
  $("#cuerpo-noticia").val('');
  $("#img-imagen-noticia").prop("src", '');
}
function publicarComentario() {
  var id_noticia = $("#id-noticia-actual").val();
  var id_persona_comentario = $("#id-comentarista").val();
  var cuerpo_comentario = $("#texto-comentario").val();
  var accion = "insertar-comentario";
  var cadena = "Id-noticia="+id_noticia+"&Cuerpo-comentario="
  +cuerpo_comentario+"&Id-persona-noticia="+id_persona_comentario
  +"&accion="+accion;
  $.ajax({
    type:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAONoticias.php",
    data:cadena,
    success:function(respuesta){
      if(respuesta == true) {
        comentariosNoticia();
        alertify.success("Comentario publicado exitosamente");
      } else {
        alertify.error("No se ha publicado tu comentario.<br />Intentalo de nuevo mas tarde");
      }
    }
  });
}
function comentariosNoticia() {
  var id_noticia = $("#id-noticia-actual").val();
  var accion = "comentarios-noticia";
  var cadena = "Id-noticia="+id_noticia+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAONoticias.php",
    data:cadena,
    success:function(datos){
      $("#seccion-comentarios").html(datos);
    }
  });
}
Dropzone.options.dropzoneFormNoticia = {
  withCredentials: true,
  parallelUploads: 1,
  maxFilesize: 2,//EN MB
  paramName: 'imagen-noticia',
  addRemoveLinks: true,
  maxFiles: 1,
  clickable: true,
  ignoreHiddenFiles: true,
  acceptedFiles:".jpg,.jpeg,.gif,.bmp,.png,.svg",
  autoProcessQueue: false,
  autoQueue: true,
  dictDefaultMessage: "Arrastra el archivo aqui para subirlo como imagen de la noticia",
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
   var btn_subir_fondo = document.querySelector('#btn-guardar-noticia');
   myDropzone = this;
   btn_subir_fondo.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("success", function(file, respuesta){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    } else {
      $("#modal-noticia").on('hidden.bs.modal', function () {
        var _this = this;
      _this.removeAllFiles();
    });
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