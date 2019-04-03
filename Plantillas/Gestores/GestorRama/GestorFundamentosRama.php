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
  <div class="form-row">
    <input type="hidden" id="id-jefe-rama" name="id-jefe-rama" value="<?php echo $id_cargo; ?>" />
    <div class="col-md-6 text-center">
      <label><strong>Ley</strong></label>
      <textarea class="form-control" rows="10" cols="12" id="texto-ley-rama" name="texto-ley-rama" placeholder="Escribe aquí la ley de la rama..."></textarea>
    </div>
    <div class="col-md-6 text-center">
      <label><strong>Promesa</strong></label>
      <textarea class="form-control" rows="10" cols="12" id="texto-promesa-rama" name="texto-promesa-rama" placeholder="Escribe aquí la promesa de la rama..."></textarea>
    </div>
  </div>
  <div class="form-row">
    <input type="hidden" id="id-jefe-rama" name="id-jefe-rama" value="<?php echo $id_cargo; ?>" />
    <div class="col-md-6 text-center">
      <label><strong>Lema</strong></label>
      <textarea class="form-control" rows="10" cols="12" id="texto-lema-rama" name="texto-lema-rama" placeholder="Escribe aquí la lema de la rama..."></textarea>
    </div>
    <div class="col-md-6 text-center">
      <label><strong>Oracion</strong></label>
      <textarea class="form-control" rows="10" cols="12" id="texto-oracion-rama" name="texto-oracion-rama" placeholder="Escribe aquí la ley de la rama..."></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form class="text-center dropzone" action="../App/Servidor/CtrlDAOArchivos.php" method="POST" enctype="multipart/form-data" id="dropzoneFormLineamiento">
        <input type="hidden" id="id-persona-foto" name="id-persona-foto" value="<?php echo $id_persona; ?>" />
        <div class="fallback">
          <input type="file" id="foto-previa" name="foto-previa" multiple />
        </div>
      </form>
    </div>
    <div class="col-md-4"></div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <button type="button" class="btn btn-success btn-icono" id="btn-agregar-fundamentos" name="btn-agregar-fundamentos"><i class="fas fa-cloud-upload-alt"></i></button>
    </div>
  </div>
</div>