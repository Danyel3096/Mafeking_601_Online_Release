<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
  var id_cargo_persona = $("#id-cargo-persona").val();
  if (id_cargo_persona == '1' || id_cargo_persona == '2') {
    var id_unico_equipo = '1';
    tablaCargos(id_unico_equipo, id_cargo_persona);
    var id_inicial_cargo = '3';
    var id_final_cargo = '14';
    var id_unico_cargo = '';
    ajaxSelectCargos(id_inicial_cargo, id_final_cargo, id_unico_cargo);
    var id_inicial_equipo = '';
    var id_final_equipo = '';
    ajaxSelectEquipos(id_inicial_equipo, id_final_equipo, id_unico_equipo);
  } else if (id_cargo_persona == '3' || id_cargo_persona == '4') {
    $("#equipos-manada").prop("hidden", false);
    var id_inicial_cargo = '25';
    var id_final_cargo = '26';
    var id_unico_cargo = '';
    ajaxSelectCargos(id_inicial_cargo, id_final_cargo, id_unico_cargo);
    var id_inicial_equipo = '15';
    var id_final_equipo = '20';
    var id_unico_equipo = '';
    ajaxSelectEquipos(id_inicial_equipo, id_final_equipo, id_unico_equipo);
  } else if (id_cargo_persona == '5' || id_cargo_persona == '6') {
    $("#equipos-tropa").prop("hidden", false);
    var id_inicial_cargo = '21';
    var id_final_cargo = '23';
    var id_unico_cargo = '24';
    ajaxSelectCargos(id_inicial_cargo, id_final_cargo, id_unico_cargo);
    var id_inicial_equipo = '8';
    var id_final_equipo = '14';
    var id_unico_equipo = '';
    ajaxSelectEquipos(id_inicial_equipo, id_final_equipo, id_unico_equipo);
  } else if (id_cargo_persona == '7' || id_cargo_persona == '8') {
    $("#equipos-comunidad").prop("hidden", false);
    var id_inicial_cargo = '18';
    var id_final_cargo = '19';
    var id_unico_cargo = '20';
    ajaxSelectCargos(id_inicial_cargo, id_final_cargo, id_unico_cargo);
    var id_inicial_equipo = '4';
    var id_final_equipo = '7';
    var id_unico_equipo = '';
    ajaxSelectEquipos(id_inicial_equipo, id_final_equipo, id_unico_equipo);
  } else if (id_cargo_persona == '9' || id_cargo_persona == '10') {
    var id_unico_equipo = '3';
    tablaCargos(id_unico_equipo, id_cargo_persona);
    var id_inicial_cargo = '15';
    var id_final_cargo = '16';
    var id_unico_cargo = '17';
    ajaxSelectCargos(id_inicial_cargo, id_final_cargo, id_unico_cargo);
    var id_inicial_equipo = '';
    var id_final_equipo = '';
    ajaxSelectEquipos(id_inicial_equipo, id_final_equipo, id_unico_equipo);
  }
  $("input[name=equipo-rama]").each(function(){
    $(this).on('click', function() {
      var id_unico_equipo = $(this).val();
      if ($.fn.DataTable.isDataTable('#tabla-cargos')) {
        $("#tabla-cargos").dataTable().fnDestroy();
        $('#tabla-cargos').empty();
      }
      tablaCargos(id_unico_equipo, id_cargo_persona);
    });
  });
  $("#cargos-equipo").change(function() {
    $("#btn-guardar-cargo-equipo").prop("disabled", false);
  });
  $("#btn-guardar-cargo-equipo").click(function() {
    guardarCargoEquipo();
  });
});
function guardarCargoEquipo() {
  var id_cargo = $("#cargos-equipo option:selected").val();
  var id_equipo = $("#equipos-rama option:selected").val();
  var id_persona = $("#id-cargo-persona").val();
  var accion = 'actualizar-cargo-equipo';
  var cadena = "Id-cargo="+id_cargo+"&Id-equipo="+id_equipo+"&Id-persona="+id_persona+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOCargos.php",
    data:cadena,
    success:function(respuesta){
      if(respuesta == true) {
        limpiarCampos();
        $('#tabla-cargos').DataTable().ajax.reload();
        alertify.success("Cargo y/o equipo actualizados con exito");
      } else {
        alertify.error("Hay un error");
      }
    }
  });
}
function limpiarCampos() {
  $("#numero-documento").val("");
  $("#nombre-cargo").val("");
  $("#nombre-equipo").val("");
  select_cargos = $("#cargos-rama");
  select_cargos.val($('option:first', select_cargos).val());
  select_equipos = $("#equipos-rama");
  select_equipos.val($('option:first', select_equipos).val());
}
function tablaCargos(id_equipo, id_cargo_persona) {
    var accion = "tabla-cargos";
    var tabla = $("#tabla-cargos").DataTable({
      "destroy":true,
      "headerCallback": function( thead, data, start, end, display ) {
      $(thead).find('th').eq(0).html( 'Nombres' );
      $(thead).find('th').eq(1).html( 'Apellidos' );
      $(thead).find('th').eq(2).html( 'Cargo' );
      $(thead).find('th').eq(3).html( 'Acción' );
    },
      "ajax":{
        "method":"POST",
        "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOCargos.php",
        "data": {"Id-equipo":id_equipo, "Id-cargo":id_cargo_persona, "accion":accion}
      },
      "columns":[
        {"data":"Nombres"},
        {"data":"Apellidos"},
        {"data":"Nombre_cargo"},
        {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' id='btn-editar-cargo' data-toggle='modal' data-target='#modal-cargos'><i class='fas fa-edit'></i></button>", "orderable": false}
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
    obtenerCargos("#tabla-cargos tbody", tabla);
  }
function obtenerCargos(tbody, tabla) {
  $(tbody).on("click", "#btn-editar-cargo", function() {
    $("#btn-guardar-cargo-equipo").prop("disabled", true);
    var datos = tabla.row($(this).parents("tr")).data();
    $("#id-cargo-persona").val(datos.Id_persona);
    $("#nombre-cargo").val(datos.Nombre_cargo);
    $("#cargos-equipo").val(datos.Id_cargo);
    $("#nombre-equipo").val(datos.Nombre_equipo);
    $("#equipos-rama").val(datos.Id_equipo);
  });
}
function ajaxSelectCargos(id_inicial_cargo, id_final_cargo, id_unico_cargo) {
  var accion = "select-cargos-equipo";
  var cadena = "&Id-inicial="+id_inicial_cargo+"&Id-final="+id_final_cargo+"&Id-basico="+id_unico_cargo+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOCargos.php",
    data:cadena,
    success:function(datos){
      $('#cargos-equipo').html(datos);
    }
  });
}
function ajaxSelectEquipos(id_inicial_equipo, id_final_equipo, id_unico_equipo) {
  var accion = "select-equipos-rama";
  var cadena = "&Id-inicial="+id_inicial_equipo+"&Id-final="+id_final_equipo+"&Id-basico="+id_unico_equipo+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOCargos.php",
    data:cadena,
    success:function(datos){
      $('#equipos-rama').html(datos);
    }
  });
}