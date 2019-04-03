<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/DetalleProgresion.php';
include_once 'App/DAO/DAODetalleProgresion.php';
include_once 'App/Redireccion.php';

if(!ControlSesion :: sesionIniciada()) {
  Redireccion :: redirigir(SERVIDOR);
} else {
  Conexion :: abrirConexion();
  $conexion = Conexion :: obtenerConexion();
  $id_persona = $_SESSION['id'];
  $persona_recuperada = DAOPersona :: consultarPersonaPorId($conexion, $id_persona);
  $detalle_cargo = DAODetalleCargo :: consultarDetalleCargoPorIdPersona($conexion, $id_persona);
  $equipo = DAOEquipo :: consultarEquipoPorId($conexion, $detalle_cargo -> obtenerIdEquipo());
  $rama = DAORama :: consultarRamaPorId($conexion, $equipo -> obtenerIdRama());
  $id_rama = $rama -> obtenerId();
  $id_cargo = $detalle_cargo -> obtenerIdCargo();
  $cargo = DAOCargo :: consultarCargoPorId($conexion, $id_cargo);
  $nombre_cargo = $cargo -> obtenerNombre();
  $nombre_equipo = $equipo -> obtenerNombre();
}
?>
<div class="row">
  <div class="col-md-12">
    <table class="table-striped table-hover table-bordered" id="tabla-ejes" name="tabla-ejes">
      <thead>
        <tr>
          <th>Eje</th>
          <th>Especialidades</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="modal-ejes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información del eje de la rama</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row text-center">
          <input type="hidden" id="id-eje" name="id-eje" />
          <div class="col-md-6">
            <div class="form-group">
              <label for="nombre-eje">Nombre del eje</label><br>
              <input type="text" id="nombre-eje" class="form-control" disabled />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-row">
              <div class="form-group">
                <label for="nombre-eje-nuevo">Nuevo nombre del eje</label><br>
                <input type="text" id="nombre-eje-nuevo" class="form-control" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-success btn-icono" data-dismiss="modal" aria-label="Close" id="btn-guardar-eje-progresion" name="btn-guardar-eje-progresion" disabled><i class="fas fa-cloud-upload-alt"></i></button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  var id_cargo_persona = $("#id-cargo-persona").val();
  if (id_cargo_persona == '3' || id_cargo_persona == '4') {
    var id_progresion = '6';
    listarEjes(id_progresion);
  } else if (id_cargo_persona == '5' || id_cargo_persona == '6') {
    var id_progresion = '5';
    listarEjes(id_progresion);
  } else if (id_cargo_persona == '7' || id_cargo_persona == '8') {
    var id_progresion = '4';
    listarEjes(id_progresion);
  } else if (id_cargo_persona == '9' || id_cargo_persona == '10') {
    var id_progresion = '3';
    listarEjes(id_progresion);
  }
  $("#nombre-eje-nuevo").blur(function(){
    $("#btn-guardar-eje-progresion").prop("disabled", false);
  });
  $("#btn-guardar-eje-progresion").click(function() {
    guardarEjeProgresion();
  });
});
function listarEjes(id_progresion) {
  var accion = "tabla-ejes";
  var tabla = $("#tabla-ejes").DataTable({
    "destroy":true,
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresion.php",
      "data": {"Id-progresion": id_progresion, "accion":accion}
    },
    "columns":[
      {"data":"Nombre"},
      {"data":"Cantidad_especialidades"},
      {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' id='btn-editar-eje' data-toggle='modal' data-target='#modal-ejes'><i class='fas fa-edit'></i></button>", "orderable": false}
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
  obtenerEjes("#tabla-ejes tbody", tabla);
}
function obtenerEjes(tbody, tabla) {
  $(tbody).on("click", "#btn-editar-eje", function() {
    $("#btn-guardar-eje-progresion").prop("disabled", true);
    var datos = tabla.row($(this).parents("tr")).data();
    $("#id-eje").val(datos.Id);
    $("#nombre-eje").val(datos.Nombre);
  });
}
function guardarEjeProgresion() {
  var id_eje = $("#id-eje").val();
  var nombre_eje = $("#nombre-eje-nuevo").val();
  var accion = 'actualizar-eje';
  var cadena = "Id-eje="+id_eje+"&Nombre-eje="+nombre_eje+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresion.php",
    data:cadena,
    success:function(respuesta){
      if(respuesta == true) {
        $('#tabla-ejes').DataTable().ajax.reload();
        alertify.success("Eje actualizado con exito");
      } else {
        alertify.error("Hay un error");
      }
    }
  });
}
</script>