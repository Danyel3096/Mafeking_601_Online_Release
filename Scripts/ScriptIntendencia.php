<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
  var id_equipo_intendente = $("#id-equipo-intendente").val();
  if (id_equipo_intendente == '1') {
    var id_intendencia = '1';
    listarIntendencia(id_intendencia);
  } else if (id_equipo_intendente == '2') {
    var id_intendencia = '2';
    listarIntendencia(id_intendencia);
  } else if (id_equipo_intendente == '3') {
    var id_intendencia = '3';
    listarIntendencia(id_intendencia);
  } else if (id_equipo_intendente == '4' || id_equipo_intendente == '5' || id_equipo_intendente == '6' || id_equipo_intendente == '7') {
    var id_intendencia = '4';
    listarIntendencia(id_intendencia);
  } else if(id_equipo_intendente == '8') {
    var id_intendencia = '8';
    listarIntendencia(id_intendencia);
  } else if(id_equipo_intendente == '9') {
    var id_intendencia = '9';
    listarIntendencia(id_intendencia);
  } else if(id_equipo_intendente == '10') {
    var id_intendencia = '10';
    listarIntendencia(id_intendencia);
  } else if(id_equipo_intendente == '11') {
    var id_intendencia = '11';
    listarIntendencia(id_intendencia);
  } else if(id_equipo_intendente == '12') {
    var id_intendencia = '12';
    listarIntendencia(id_intendencia);
  } else if(id_equipo_intendente == '13') {
    var id_intendencia = '13';
    listarIntendencia(id_intendencia);
  } else if(id_equipo_intendente == '14') {
    var id_intendencia = '14';
    listarIntendencia(id_intendencia);
  } else if(id_equipo_intendente == '15' || id_equipo_intendente == '16' || id_equipo_intendente == '17'
     || id_equipo_intendente == '18' || id_equipo_intendente == '19' || id_equipo_intendente == '20') {
    var id_intendencia = '15';
    listarIntendencia(id_intendencia);
  }
  $("#btn-intendencia-nueva").click(function() {
    limpiarIntendencia();
  });
  $("#btn-guardar-intendencia").click(function() {
      $("#formulario-intendencia").validate({
        invalidHandler: function(event, validator) {
          alertify.error("Por favor, verifica los campos requeridos *");
        },
        submitHandler: function(form) {
          enviarIntendencia();
        },
        rules:{
            nombreintendencia:{required: true},
            fecharecibidointendencia:{required: true, dateISO: true},
            estadointendencia:{required: true},
            cantidadintendencia:{required: true}
        },
        messages:{
            nombreintendencia:{required: 'El campo es requerido'},
            fecharecibidointendencia:{required: 'El campo es requerido', dateISO: 'El formato de fecha es incorrecto'},
            estadointendencia:{required: 'El campo es requerido'},
            cantidadintendencia:{required: 'El campo es requerido'}
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
});
function listarIntendencia(id_intendencia) {
  var accion = "tabla-intendencia";
  var tabla = $("#tabla-intendencia").DataTable({
    "destroy":true,
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOIntendencia.php",
      "data":{"Id-equipo": id_intendencia, "accion":accion}
    },
    "columns":[
      {"data":"Nombre"},
      {"data":"Estado"},
      {"data":"Fecha_recibido"},
      {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' data-toggle='modal' data-target='#modal-intendencia' id='btn-editar-intendencia'><i class='fas fa-edit'></button>", "orderable": false}
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
  obtenerDatosIntendencia("#tabla-intendencia tbody", tabla);
}

var obtenerDatosIntendencia = function(tbody, tabla) {
  $(tbody).on("click", "#btn-editar-intendencia", function() {
    var datos = tabla.row($(this).parents("tr")).data();
    var id_intendencia = $("#id-intendencia").val(datos.Id);
    var nombre_intendencia = $("#nombreintendencia").val(datos.Nombre);
    var cantidad_intendencia = $("#cantidadintendencia").val(datos.Cantidad);
    var fecha_recibido = $("#fecharecibidointendencia").val(datos.Fecha_recibido);
    var estado = $("#estadointendencia").val(datos.Estado);
    var id_equipo = $("#id-equipo-intendente").val(datos.Id_equipo);
  });
}
function enviarIntendencia() {
  var id_intendencia = $("#id-intendencia").val();
  var nombre_intendencia = $("#nombreintendencia").val();
  var cantidad_intendencia = $("#cantidadintendencia").val();
  var fecha_recibido = $("#fecharecibidointendencia").val();
  var estado = $("#estadointendencia").val();
  var id_equipo = $("#id-equipo-intendente").val();
  var accion = "insertar-actualizar-intendencia";
  var cadena = "Id-intendencia="+id_intendencia+"&Nombre-intendencia="+nombre_intendencia
  +"&Cantidad-intendencia="+cantidad_intendencia+"&Fecha-recibido="+fecha_recibido
  +"&Estado-intendencia="+estado+"&Id-equipo="+id_equipo+"&accion="+accion;
  $.ajax({
    type:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOIntendencia.php",
    data:cadena,
    success:function(respuesta){
      if(respuesta == true) {
        $('#tabla-intendencia').DataTable().ajax.reload();
        alertify.success("Intendencia enviada exitosamente");
        $('#modal-intendencia').modal('hide');
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
function limpiarIntendencia() {
  var id_intendencia = $("#id-intendencia").val('');
  var nombre_intendencia = $("#nombreintendencia").val('');
  var cantidad_intendencia = $("#cantidadintendencia").val('');
  var fecha_recibido = $("#fecharecibidointendencia").val('');
  var estado = $("#estadointendencia").val('');
}