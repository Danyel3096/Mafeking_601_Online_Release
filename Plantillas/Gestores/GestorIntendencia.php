<?php
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';

Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
$id_persona = $_SESSION['id'];
$persona_recuperada = DAOPersona :: consultarPersonaPorId($conexion, $id_persona);
$detalle_cargo = DAODetalleCargo :: consultarDetalleCargoPorIdPersona($conexion, $id_persona);
$equipo = DAOEquipo :: consultarEquipoPorId(Conexion :: obtenerConexion(), $detalle_cargo -> obtenerIdEquipo());
$rama = DAORama :: consultarRamaPorId(Conexion :: obtenerConexion(), $equipo -> obtenerIdRama());
$id_rama = $rama -> obtenerId();
$id_equipo = $equipo -> obtenerId();
$id_cargo = $detalle_cargo -> obtenerIdCargo();
$cargo = DAOCargo :: consultarCargoPorId($conexion, $id_cargo);
$nombre_cargo = $cargo -> obtenerNombre();
$nombre_equipo = $equipo -> obtenerNombre();
?>
<div class="container">
	<input type="hidden" id="id-equipo-intendente" name="id-equipo-intendente" value="<?php echo $id_equipo ?>" />
  <div class="row">
    <div class="col-md-12">
      <table class="table-striped table-hover table-bordered" id="tabla-intendencia" name="tabla-intendencia">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Fecha recibido</th>
            <th><button class="btn btn-primary btn-icono" id="btn-intendencia-nueva" data-toggle="modal" data-target="#modal-intendencia"><i class="fas fa-plus-square"></i></button></th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-intendencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de la intendencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="contenido" class="container text-center">
            <input type="hidden" id="id-persona-intendencia" class="form-control" value="<?php echo $id_persona; ?>" />
            <input type="hidden" id="id-intendencia" name="id-intendencia" class="form-control" />
            <form class="validar-formulario" id="formulario-intendencia" name="formulario-intendencia" role="form" method="post">
            <?php
            include_once 'Plantillas/Formularios/FormularioIntendencia.php';
            ?>
            </form>
        </div>
      </div>
      <div class="modal-footer text-center">
        <button type="button" id="btn-guardar-intendencia" name="btn-guardar-intendencia" class="btn btn-success btn-icono"><i class="fas fa-cloud-upload-alt"></i></button>
      </div>
    </div>
  </div>
</div>