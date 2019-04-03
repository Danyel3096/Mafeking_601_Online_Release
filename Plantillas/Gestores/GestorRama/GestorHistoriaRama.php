<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/Modelos/Cargo.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/DAO/DAOCargo.php';
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
<div class="container">
  <input type="hidden" id="id-jefe-rama" name="id-jefe-rama" value="<?php echo $id_cargo; ?>" />
  <div class="form-row">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center">
      <div class="form-group">
        <label><strong>Nombre de la rama</strong></label><br>
        <input type="hidden" id="id-jefe-rama" name="id-jefe-rama" value="<?php echo $id_cargo; ?>" />
        <input type="text" id="nombre-rama-jefe" name="nombre-rama-jefe" />
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
  <div class="form-row">
    <div class="col-md-6">
      <form class="text-center dropzone" action="../App/Servidor/CtrlDAOArchivos.php" method="POST" enctype="multipart/form-data" id="dropzoneFormImagenRama">
        <input type="hidden" id="id-persona-foto" name="id-persona-foto" value="<?php echo $id_persona; ?>" />
        <div class="fallback">
          <input type="file" id="foto-previa" name="foto-previa" multiple />
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <input type="hidden" id="id-jefe-rama" name="id-jefe-rama" value="<?php echo $id_cargo; ?>">
      <form class="text-center dropzone" action="../App/Servidor/CtrlDAOArchivos.php" method="POST" enctype="multipart/form-data" id="dropzoneFormFotoHistoricaRama">
        <input type="hidden" id="id-persona-foto" name="id-persona-foto" value="<?php echo $id_persona; ?>" />
        <div class="fallback">
          <input type="file" id="foto-previa" name="foto-previa" multiple />
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <textarea class="form-control" rows="10" cols="12" id="texto-historia-rama" name="texto-historia-rama" placeholder="Escribe aquí la historia de la rama..."></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <button type="button" class="btn btn-success btn-icono" id="btn-guardar-historia" name="btn-guardar-historia"><i class="fas fa-cloud-upload-alt"></i></button>
    </div>
  </div>
</div>