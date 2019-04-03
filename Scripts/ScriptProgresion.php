<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
  $("#btn-seleccionar-requisitos").css("display", "none");
  $("#btn-guardar-progresion").css("display", "none");
  var id_cargo_persona = $("#id-cargo-persona").val();
  if (id_cargo_persona == '3' || id_cargo_persona == '4') {
    $("#equipos-manada").prop("hidden", false);
  } else if (id_cargo_persona == '5' || id_cargo_persona == '6') {
    $("#equipos-tropa").prop("hidden", false);
  } else if (id_cargo_persona == '7' || id_cargo_persona == '8') {
    $("#equipos-comunidad").prop("hidden", false);
  } else if (id_cargo_persona == '9' || id_cargo_persona == '10') {
    var id_progresion = '3';
    var id_equipo_rama = '3';
    ajaxSelectPersonasEquipoProgresion(id_equipo_rama, id_cargo_persona);
    ajaxSelectEjesProgresion(id_progresion);
  }
  $("input[name=equipo-rama]").each(function(){
    $(this).on('click', function() {
      var id_equipo_rama = $(this).val();
      ajaxSelectPersonasEquipoProgresion(id_equipo_rama, id_cargo_persona);
    });
  });
  $("#personas-equipo").change(function() {
    $('#ejes-progresion').prop('selectedIndex',0);
    $('#especialidades-eje').prop('selectedIndex',0);
    $("#requisitos-nivel").empty();
    $("#personas-equipo option:selected").each(function() {
      var id_persona_equipo = $(this).val();
      tablaSeguimientoProgresion(id_persona_equipo);
    });
  });
  $("#ejes-progresion").change(function() {
    $("#ejes-progresion option:selected").each(function() {
      var id_eje = $(this).val();
      var accion = "select-especialidades-eje";
      var cadena = "Id-eje="+id_eje+"&accion="+accion;
      $.ajax({
        method:'POST',
        url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresion.php",
        data:cadena,
        success:function(data){
          $("#especialidades-eje").html(data);
        }
      });
    });
  });
  $("#especialidades-eje").change(function() {
    $("#btn-guardar-progresion").prop("disabled", true);
    $("#btn-seleccionar-requisitos").css("display", "inline");
    $("#btn-guardar-progresion").css("display", "inline");
    $("#especialidades-eje option:selected").each(function() {
      marcados = [];
      desmarcados = [];
      var id_especialidad = $(this).val();
      var id_persona_equipo = $("#personas-equipo option:selected").val();
      var accion = "requisitos-especialidad";
      var cadena = "Id-especialidad="+id_especialidad+"&Id-persona-equipo="+id_persona_equipo+"&accion="+accion;
      $.ajax({
        method:'POST',
        url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresion.php",
        data:cadena,
        success:function(data) {
          $("#requisitos-nivel").html(data);
          $("input:checkbox[name=estado-requisitos]:checked").each(function(){
            marcados.push($(this).val());
          });
          $('input[type=checkbox]').each(function(){
            $(this).on('click', function(){
              $("#btn-guardar-progresion").prop("disabled", false);
              if($(this).is(':checked') == true){
                marcados.push($(this).val());
                var desindice = desmarcados.indexOf($(this).val());
                desmarcados.splice(desindice, 1);
              }
              if($(this).is(':checked') == false) {
                desmarcado = $(this).val();
                encontrado = marcados.filter(elemento => elemento == desmarcado);
                var eliminado = encontrado.shift();
                desmarcados.push(eliminado);
                var indice = marcados.indexOf(desmarcado);
                marcados.splice(indice, 1);
              }
            });
          });
          $("#btn-seleccionar-requisitos").click(function() {
            $("#btn-seleccionar-requisitos").css("display", "none");
            var checkboxes = $('input:checkbox[name=estado-requisitos]');
            $("input:checkbox").prop('checked', $(this).prop("checked"));
            $("input:checkbox").prop('checked', function(i, val) {
              $(this).prop("checked", true);
              marcados.push($(this).val());
            });
            $("#btn-guardar-progresion").css("display", "inline");
          });
          $("#btn-guardar-progresion").click(function() {
            guardarProgresion(marcados, desmarcados);
          });
        }
      });
    });
  });
});
function guardarProgresion(marcados, desmarcados) {
  var id_persona_equipo = $("#personas-equipo option:selected").val();
  var id_especialidad = $("#especialidades-eje option:selected").val();
  var accion = "insertar-actualizar-progresion";
  var cadena="Id-persona-equipo="+id_persona_equipo+"&Id-especialidad="+id_especialidad+"&Requisitos-marcados="+marcados+"&Requisitos-desmarcados="+desmarcados+"&accion="+accion;
  alert(cadena);
  $.ajax({
    type:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresion.php",
    data:cadena,
    success:function(respuesta){
      if(respuesta == true) {
        $('#ejes-progresion').prop('selectedIndex',0);
        $('#especialidades-eje').prop('selectedIndex',0);
        $("#btn-guardar-progresion").css("display", "none");
        $("#requisitos-nivel").empty();
        $('#tabla-progresion-persona').DataTable().ajax.reload();
        alertify.success("Progresión actualizada con exito");
      } else {
        alertify.error("Hay un error");
      }
    }
  });
}
var tablaSeguimientoProgresion = function(id_persona_equipo) {
  var accion = "tabla-progresion-persona";
  var tabla = $("#tabla-progresion-persona").DataTable({
    "destroy":true,
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresion.php",
      "data": {"Id-persona-equipo":id_persona_equipo,"accion":accion}
    },
    "columns":[
      {"data":"Eje"},
      {"data":"Especialidad"},
      {"data":"Cumplidos"},
      {"data":"Total"}
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
}
function ajaxSelectPersonasEquipoProgresion(id_equipo_rama, id_cargo_persona) {
  var accion1 = "select-personas-equipo";
  var cadena1 = "Id-equipo-rama="+id_equipo_rama+"&Id-cargo="+id_cargo_persona+"&accion="+accion1;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresion.php",
    data:cadena1,
    success:function(data){
      $("#personas-equipo").html(data);
    }
  });
}
function ajaxSelectEjesProgresion(id_progresion) {
  var accion2 = "select-ejes-progresion";
  var cadena2 = "Id-progresion="+id_progresion+"&accion="+accion2;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresion.php",
    data:cadena2,
    success:function(data){
      $("#ejes-progresion").html(data);
    }
  });
}