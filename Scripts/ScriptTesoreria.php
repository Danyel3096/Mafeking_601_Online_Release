<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
  var id_cargo_persona = $("#id-cargo-persona").val();
  var id_rama_persona = $("#id-rama-persona").val();
  if (id_cargo_persona == '29' || id_cargo_persona == '30'
    && id_rama_persona == '2') {
    //var id_rama = ['3', '4', '5', '6'];
    //listarTesoreria("id_rama");
    var id_rama = '';
    listarTesoreria(id_rama);
  } else if (id_rama_persona == '3') {
    var id_rama = '3';
    listarTesoreria(id_rama);
  } else if (id_rama_persona == '4') {
    var id_rama = '4';
    listarTesoreria(id_rama);
  } else if (id_rama_persona == '5') {
    var id_rama = '5';
    listarTesoreria(id_rama);
  }
  $("input[name=tesoreria-rama]").each(function() {
    $(this).on('click', function() {
      id_rama = $(this).val();
      listarTesoreria(id_rama);
    });
  });
  $("#btn-nueva-tesoreria").click(function() {
    limpiarTesoreria();
  });
  $("#formulario-tesoreria").validate({
    rules:{
        detalletesoreria:{required: true},
        periodicidadtesoreria:{required: true},
        valortesoreria:{required: true, digits: true},
        fechainiciotesoreria:{required: true, dateISO: true},
        fechafintesoreria:{required: true, dateISO: true}
    },
    messages:{
        detalletesoreria:{required: 'El campo es requerido'},
        periodicidadtesoreria:{required: 'El campo es requerido'},
        valortesoreria:{required: 'El campo es requerido', digits: 'Solo se permite digitos'},
        fechainiciotesoreria:{required: 'El campo es requerido', dateISO: 'El formato de fecha es incorrecto'},
        fechafintesoreria:{required: 'El campo es requerido', dateISO: 'El formato de fecha es incorrecto'}
    }
  });
  $("#btn-agregar-tesoreria").click(function() {
    if($("#formulario-tesoreria").valid()){
      agregarTesoreria();
    } else {
      alertify.error("Por favor, verifica los campos requeridos *");
    }
  });
});
var listarTesoreria = function(id_rama) {
  var tabla = $("#tabla-tesoreria").DataTable({
    "destroy":true,
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOTesoreria.php",
      "data": {"Id-rama":id_rama, "accion":"tabla-tesoreria"}
    },
    "columns":[
      {"data":"Detalle"},
      {"data":"Periodicidad"},
      {"data":"Fecha_inicio"},
      {"data":"Fecha_fin"},
      {"data":"Valor"},
      {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' data-toggle='modal' data-target='#modal-tesoreria' id='btn-editar-tesoreria' name='btn-editar-tesoreria'><i class='fas fa-edit'></i></button> <button type='button' class='btn btn-danger' id='btn-borrar-tesoreria' name='btn-borrar-tesoreria'>Eliminar</button>"}
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
  obtenerTesoreria("#tabla-tesoreria tbody", tabla);
}
var obtenerTesoreria = function(tbody, tabla) {
  $(tbody).on("click", "#btn-editar-tesoreria", function() {
    var datos = tabla.row($(this).parents("tr")).data();
    var id = $('#id-tesoreria').val(datos.Id);
    var detalle = $('#detalletesoreria').val(datos.Detalle);
    var periodicidad = $('#periodicidadtesoreria').val(datos.Periodicidad);
    var fecha_inicio = $('#fechainiciotesoreria').val(datos.Fecha_inicio);
    var fecha_fin = $('#fechafintesoreria').val(datos.Fecha_fin);
    var valor = $('#valortesoreria').val(datos.Valor);
    //var id_rama = datos.Id_rama;
  });
  $(tbody).on("click", "#btn-borrar-tesoreria", function() {
    var datos = tabla.row($(this).parents("tr")).data();
    var id = datos.Id;
    id_rama;
    borrarTesoreria(id, id_rama);
  });
}
function agregarTesoreria(id_rama) {
  var id = $('#id-tesoreria').val();
  var detalle = $('#detalletesoreria').val();
  var periodicidad = $('#periodicidadtesoreria').val();
  var fecha_inicio = $('#fechainiciotesoreria').val();
  var fecha_fin = $('#fechafintesoreria').val();
  var valor = $('#valortesoreria').val();
  //var id_rama = $('#id-rama').val();
  var accion = 'insertar-actualizar-tesoreria';
  var cadena = "Id="+id+"&Detalle="+detalle+"&Periodicidad="+periodicidad
  +"&Fecha_inicio="+fecha_inicio+"&Fecha_fin="+fecha_fin+"&Valor="+valor
  +"&accion="+accion;
    $.ajax({
      method:'POST',
      url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOTesoreria.php",
      data:cadena,
      success:function(respuesta){
        if(respuesta == true) {
          $('#tabla-tesoreria').DataTable().ajax.reload();
          alertify.success("Tesoreria agregada/actualizada con exito");
          $('#modal-tesoreria').modal('hide');
        } else {
            alertify.error("Hay un error Teso");
        }
      }
    });
}
var borrarTesoreria = function(id, id_rama) {//NO BORRA PORQUE TIENE UN DETALLE_TEROSERIA CON ESE ID
  var id;
  var id_rama;
  var accion = 'borrar-tesoreria';
  var cadena="Id="+id+"&Id_rama="+id_rama+"&accion="+accion;
    $.ajax({
      method:'POST',
      url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOTesoreria.php",
      data:cadena,
      success:function(r){
        if(r==1) {
          $('#tabla-tesoreria').DataTable().ajax.reload();
          alertify.success("Tesoreria actualizada con exito");
        } else {
          alertify.error("Hay un error Teso");
        }
      }
    });
}
var limpiarTesoreria = function() {
  var id = $('#id-tesoreria').val('');
  var detalle = $('#detalletesoreria').val('');
  periodicidad = $("#periodicidadtesoreria");
  periodicidad.val($('option:first', periodicidad).val());
  var fecha_inicio = $('#fechainiciotesoreria').val('');
  var fecha_fin = $('#fechafintesoreria').val('');
  var valor = $('#valortesoreria').val('');
  var id_rama = $('#id-rama').val('');
}
$(document).ready(function() {
  $("#btn-guardar-inscripcion").prop("disabled", true);
  $("input[name=inscripcion-rama]").each(function(){
    $(this).on('click', function() {
      if ($.fn.DataTable.isDataTable('#tabla-inscripcion')) {
        $("#tabla-inscripcion").dataTable().fnDestroy();
        $('#tabla-inscripcion').empty();
      }
      id_rama = $(this).val();
      listarInscripcion(id_rama);
    });
  });
  $("#abonoinscripcion").blur(function(){
    var abono = $(this).val();
    var valor = $("#valor-inscripcion").val();
    if (abono > valor) {
      alertify.error('El abono no puede ser mayor que el valor');
      $("#btn-guardar-inscripcion").prop("disabled", true);
    } if (abono < 0) {
      alertify.error('El abono no puede ser menor a cero');
      $("#btn-guardar-inscripcion").prop("disabled", true);
    } else {
      $("#btn-guardar-inscripcion").prop("disabled", false);
    }
  });
  $("#btn-guardar-inscripcion").click(function() {
    guardarInscripcion();
  });
});
var listarInscripcion = function(id_rama) {
  var tabla = $("#tabla-inscripcion").DataTable({
    "destroy":true,
    "headerCallback": function( thead, data, start, end, display ) {
      $(thead).find('th').eq(0).html( 'Nombres' );
      $(thead).find('th').eq(1).html( 'Apellidos' );
      $(thead).find('th').eq(2).html( 'Inscripción' );
      $(thead).find('th').eq(3).html( 'Acción' );
    },
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOTesoreria.php",
      "data": {"Id-rama":id_rama, "accion":"tabla-inscripcion"}
    },
    "columns":[
      {"data":"Nombres"},
      {"data":"Apellidos"},
      {"data":"Abono"},
      {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' data-toggle='modal' data-target='#modal-inscripcion' id='btn-editar-inscripcion' name='btn-editar-inscripcion'><i class='fas fa-edit'></i></button>"}
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
  obtenerInscripcion("#tabla-inscripcion tbody", tabla);
}
var obtenerInscripcion = function(tbody, tabla) {
  $(tbody).on("click", "#btn-editar-inscripcion", function() {
    var datos = tabla.row($(this).parents("tr")).data();
    id_rama;
    var id_inscripcion = $('#id-inscripcion').val(datos.Id_tesoreria);
    var id_persona = $('#id-persona-inscripcion').val(datos.Id);
    var abono = $('#abonoinscripcion').val(datos.Abono);
    var valor_inscripcion = $('#valor-inscripcion').val(datos.Valor_inscripcion);
  });
}
function guardarInscripcion() {
  var id_inscripcion = $('#id-inscripcion').val();
  var id_persona = $('#id-persona-inscripcion').val();
  var abono = $('#abonoinscripcion').val();
  var accion = 'insertar-actualizar-inscripcion';
  var cadena = "Id-inscripcion="+id_inscripcion+"&Id-persona-inscripcion="+id_persona+"&Abono="+abono+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOTesoreria.php",
    data:cadena,
    success:function(respuesta){
      if(respuesta == true) {
        $('#tabla-inscripcion').DataTable().ajax.reload();
        alertify.success("Inscripción actualizada con exito");
        $('#modal-inscripcion').modal('hide');
      } else {
        alertify.error("Hay un error Teso");
      }
    }
  });
}
var limpiarInscripcion = function() {
  $("#id-tesoreria").val("");
  $("#id-cargo").val("");
  select = $("#periodicidad");
  select.val($('option:first', select).val());
}
$(document).ready(function() {
  $("input[name='detalle-rama']" ).on('change', function() {
    id_rama = $(this).val();
    listarDetalle(id_rama);
  });
});
var listarDetalle = function(id_rama) {
  var tabla = $("#tabla-detalle").DataTable({
    "destroy":true,
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOTesoreria.php",
      "data": {"Id-rama":id_rama, "accion":"tabla-detalle"}
    },
    "columns":[
      {"data":"Nombres"},
      {"data":"Apellidos"},
      {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' data-toggle='modal' data-target='#modal-detalle' id='btn-editar-detalle' name='btn-editar-detalle'><i class='fas fa-edit'></i></button>"}
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
  obtenerDetalle("#tabla-detalle tbody", tabla);
}
function obtenerDetalle(tbody, tabla) {
  $(tbody).on("click", "#btn-editar-detalle", function() {
    var datos = tabla.row($(this).parents("tr")).data();
    $("#id-persona-detalle").val(datos.Id);
    var id_persona_detalle = datos.Id;
    var id_rama_persona_detalle = $("input[name=detalle-rama]:checked").val();
    var accion = "tabla-detalle-persona";
    var cadena = "Id-persona="+id_persona_detalle+"&Id-rama="+id_rama_persona_detalle+"&accion="+accion;
    $.ajax({
      method:'POST',
      url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOTesoreria.php",
      data:cadena,
      success:function(datos){
        $('#detalle-persona').html(datos);
      }
    });
  });
}
$("#btn-guardar-detalle").click(function() {
  guardarDetalle();
});
function guardarDetalle() {
  var id_persona_detalle = $("#id-persona-detalle").val();
  var id_tesoreria_detalle = [];
  $("input[name=id-tesoreria-detalle]").each(function() {
    id_tesoreria_detalle.push($(this).val());
  });
  var abono_detalle = [];
  $("input[name=abono-detalle-persona]").each(function() {
    abono_detalle.push($(this).val());
  });
  var abono = $('#abono').val();
  var accion = 'insertar-actualizar-detalle';
  var cadena = "Id-tesoreria="+id_tesoreria_detalle+"&Id-persona="+id_persona_detalle+"&Abono="+abono_detalle+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOTesoreria.php",
    data:cadena,
    success:function(respuesta){
      if(respuesta == true) {
        $('#tabla-detalle').DataTable().ajax.reload();
        alertify.success("Detalle de la persona actualizado con exito");
        $('#modal-detalle').modal('hide');
      } else {
        alertify.error("Hay un error Teso");
      }
    }
  });
}
var limpiarDetalle = function() {
  $("#id-tesoreria").val("");
  $("#id-cargo").val("");
  select = $("#periodicidad");
  select.val($('option:first', select).val());
}