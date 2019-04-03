<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
  listarOrganigrama();
  $("#btn-organigrama-nuevo").click(function() {
    limpiarCampos();
    $("#btn-guardar-organigrama").click(function() {
      var nombres_apellido = $("#nombre-organigrama").val();
      var totem = $("#totem-organigrama").val();
      var cargo = $("#cargo-organigrama").val();
      var celular = $("#celular-organigrama").val();
      var accion = "insertar-organigrama";
      var cadena = "Nombres-apellido="+nombres_apellido+"&Totem="+totem+"&Cargo="+cargo+"&Celular="+celular+"&accion="+accion;
      $.ajax({
        method:'POST',
        url:"<?php echo SERVIDOR ?>App/Servidor/CtrlDAOOrganigrama.php",
        data:cadena,
        success:function(respuesta){
          if(respuesta == true) {
            $('#tabla-organigrama').DataTable().ajax.reload();
            alertify.success("Organigrama agregado con exito");
          } else {
            alertify.error("Hay un error Teso");
          }
        }
      });
    });
  });
});
  var listarOrganigrama = function() {
    var accion = "tabla-organigrama";
    var tabla = $("#tabla-organigrama").DataTable({
      //"destroy":true,
      "ajax":{
        "method":"POST",
        "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOOrganigrama.php",
        "data": {"accion":accion}
      },
      "columns":[
        {"data":"Nombres_apellido"},
        {"data":"Totem"},
        {"data":"Celular"},
        {"data":"Cargo"},
        {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' data-toggle='modal' data-target='#modal-organigrama' id='btn-editar-organigrama' name='btn-editar-organigrama'><i class='fas fa-edit'></i></button>"}
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
    obtenerDatos("#tabla-organigrama tbody", tabla);
  }
  var obtenerDatos = function(tbody, tabla) {
      $(tbody).on("click", "#btn-editar-organigrama", function() {
        var datos = tabla.row($(this).parents("tr")).data();
        var nombres_apellido = $("#nombre-organigrama").val(datos.Nombres_apellido);
        var totem = $("#totem-organigrama").val(datos.Totem);
        var celular = $("#celular-organigrama").val(datos.Celular);
        var celular = $("#cargo-organigrama").val(datos.Cargo);
      });
  }
var limpiarCampos = function() {
    $("#nombre-organigrama").val("");
    $("#totem-organigrama").val("");
    $("#celular-organigrama").val("");
    $("#cargo-organigrama").val("");
  }