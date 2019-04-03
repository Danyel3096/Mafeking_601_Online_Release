<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/Cargo.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/DAO/DAOCargo.php';
include_once 'App/DAO/DAOPersona.php';
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

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container opciones-gestor" id="equipos-manada" hidden>
  <div class="row text-center">
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="15"> Seisena 1
    </div>
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="16"> Seisena 2
    </div>
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="17"> Seisena 3
    </div>
  </div>
  <div class="row text-center">
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="18"> Seisena 4
    </div>
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="19"> Seisena 5
    </div>
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="20"> Seisena 6
    </div>
  </div>
</div>
<div class="container opciones-gestor" id="equipos-tropa" hidden>
  <div class="row text-center">
    <div class="col-3">
      <input type="radio" name="equipo-rama" value="8"> Patrulla Aguilas
    </div>
    <div class="col-3">
      <input type="radio" name="equipo-rama" value="9"> Patrulla Alcones
    </div>
    <div class="col-3">
      <input type="radio" name="equipo-rama" value="10"> Patrulla Cobras
    </div>
    <div class="col-3">
      <input type="radio" name="equipo-rama" value="11"> Patrulla Leones
    </div>
  </div>
  <div class="row text-center">
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="12"> Patrulla Linces
    </div>
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="13"> Patrulla Lobos
    </div>
    <div class="col-4">
      <input type="radio" name="equipo-rama" value="14"> Patrulla Panteras
    </div>
  </div>
</div>
<div class="container opciones-gestor" id="equipos-comunidad" hidden>
  <div class="row text-center">
    <div class="col-3">
      <input type="radio" name="equipo-rama" value="4"> Equipo 1
    </div>
    <div class="col-3">
      <input type="radio" name="equipo-rama" value="5"> Equipo 2
    </div>
    <div class="col-3">
      <input type="radio" name="equipo-rama" value="6"> Equipo 3
    </div>
    <div class="col-3">
      <input type="radio" name="equipo-rama" value="7"> Equipo 4
    </div>
  </div>
</div>
<table class="table-striped table-hover table-bordered" id="tabla-participaciones" name="tabla-participaciones">
  <thead>
    <tr>
      <th>Fecha inicio</th>
      <th>Fecha fin</th>
      <th>Nombre evento</th>
      <th><button class="btn btn-primary btn-icono" id="btn-participacion-nueva" name="btn-participacion-nueva" data-toggle="modal" data-target="#modal-participaciones"><i class="fas fa-plus-square"></i></button></th>
    </tr>
  </thead>
  <tbody></tbody>
</table>
<div class="modal fade" id="modal-participaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de la participación de la rama en el evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="validar-formulario" id="formulario-participacion" role="form" method="post">
        <?php
        include_once 'Plantillas/Formularios/FormularioParticipacion.php';
        ?>
        </form>
      </div>
      <div class="modal-footer text-center">
        <button type="submit" class="btn btn-success btn-icono" id="btn-guardar-participacion" name="btn-guardar-participacion"><i class="fas fa-cloud-upload-alt"></i></button>
      </div>
    </div>
  </div>
</div>