<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
	var id_jefe = $("#id-jefe-rama").val();
  	if (id_jefe == '1' || id_jefe == '2') {
      var id_rama = "1";
    } else if (id_jefe == '3' || id_jefe == '4') {
    	var id_rama = "6";
  	} else if (id_jefe == '5' || id_jefe == '6') {
    	var id_rama = "5";
	} else if (id_jefe == '7' || id_jefe == '8') {
    	var id_rama = "4";
  	} else if (id_jefe == '9' || id_jefe == '17') {
		var id_rama = "3";
	}
	var accion = "informacion-rama";
	var cadena = "Id-rama="+id_rama+"&accion="+accion;
	$.ajax({
    	type:'POST',
    	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORama.php",
    	data:cadena,
    	success:function(datos) {
      		var objeto = JSON.parse(datos);
      		$("#nombre-rama-jefe").val(objeto['Nombre']);
      		$("#texto-descripcion-rama").val(objeto['Descripcion']);
      		$("#texto-historia-rama").val(objeto['Historia']);
      		$("#texto-ley-rama").val(objeto['Ley']);
      		$("#texto-promesa-rama").val(objeto['Promesa']);
      		$("#texto-lema-rama").val(objeto['Lema']);
          $("#texto-oracion-rama").val(objeto['Oracion']);
      	}
  	});
    $("#btn-guardar-historia").click(function() {
      historia = $("#texto-historia-rama").val();
      accion = 'insertar-actualizar-historia';
      var cadena = "&Historia-rama="+historia+"&Id-rama="+id_rama+"&accion="+accion;
      ajaxPost(cadena);
    });
    $("#btn-agregar-fundamentos").click(function() {
      ley = $("#texto-ley-rama").val();
      promesa = $("#texto-promesa-rama").val();
      lema = $("#texto-lema-rama").val();
      oracion = $("#texto-oracion-rama").val();
      accion = 'insertar-actualizar-fundamentos';
      var cadena = "&Ley-rama="+ley+"&Promesa-rama="+promesa+"&Lema-rama="+lema+"&Oracion-rama="+oracion+"&Id-rama="+id_rama+"&accion="+accion;
      ajaxPost(cadena);
    });
});
var ajaxPost = function(cadena) {
  	$.ajax({
    	method:'POST',
    	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORama.php",
    	data:cadena,
    	success:function(respuesta){
      		if(respuesta == true) {
	        	alertify.success("Cambio realizado con exito");
    	  	} else {
		        alertify.error("Hay un error Rama");
      		}
    	}
  	});
}
Dropzone.options.dropzoneFormImagenRama = {
  withCredentials: true,
  parallelUploads: 1,
  maxFilesize: 2,//EN MB
  paramName: 'fondo-previo',
  maxFiles: 1,
  clickable: true,
  ignoreHiddenFiles: true,
  acceptedFiles:".jpg,.jpeg,.gif,.bmp,.png,.svg",
  autoProcessQueue: false,
  autoQueue: true,
  dictDefaultMessage: "Arrastra el archivo aqui para subirlo como la imagen de la rama",
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
   var btn_subir_fondo = document.querySelector('#btn-guardar-historia');
   myDropzone = this;
   btn_subir_fondo.addEventListener("click", function(){
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
 Dropzone.options.dropzoneFormLineamiento = {
  withCredentials: true,
  parallelUploads: 1,
  maxFilesize: 2,//EN MB
  paramName: 'fondo-previo',
  maxFiles: 1,
  clickable: true,
  ignoreHiddenFiles: true,
  acceptedFiles:".jpg,.jpeg,.gif,.bmp,.png,.svg",
  autoProcessQueue: false,
  autoQueue: true,
  dictDefaultMessage: "Arrastra el archivo aqui para subirlo como lineamiento de la rama",
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
   var btn_subir_fondo = document.querySelector('#btn-guardar-historia');
   myDropzone = this;
   btn_subir_fondo.addEventListener("click", function(){
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
Dropzone.options.dropzoneFormFotoHistoricaRama = {
  withCredentials: true,
  parallelUploads: 1,
  maxFilesize: 2,//EN MB
  paramName: 'fondo-previo',
  maxFiles: 1,
  clickable: true,
  ignoreHiddenFiles: true,
  acceptedFiles:".jpg,.jpeg,.gif,.bmp,.png,.svg",
  autoProcessQueue: false,
  autoQueue: true,
  dictDefaultMessage: "Arrastra el archivo aqui para subirlo como la foto histórica de la rama",
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
   var btn_subir_fondo = document.querySelector('#btn-guardar-historia');
   myDropzone = this;
   btn_subir_fondo.addEventListener("click", function(){
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