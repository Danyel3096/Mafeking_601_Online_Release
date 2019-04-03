<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/Redireccion.php';

Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
$id = $_SESSION['id'];
$persona_recuperada = DAOPersona :: consultarPersonaPorId($conexion, $id);
$cargo = DAOCargo :: consultarCargoPorId($conexion, $persona_recuperada -> obtenerIdCargo());
$detalle_cargo = DAODetalleCargo :: consultarDetalleCargoPorId($conexion, $cargo -> obtenerId());
$equipo = DAOEquipo :: consultarEquipoPorId($conexion, $detalle_cargo -> obtenerIdEquipo());
$rama = DAORama :: consultarRamaPorId($conexion, $equipo -> obtenerIdRama());
$id_cargo = $cargo -> obtenerId();
$nombre_cargo = $cargo -> obtenerNombre();
$nombre_equipo = $equipo -> obtenerNombre();

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<table class="table-striped table-hover table-bordered" id="tabla-organigrama" name="tabla-organigrama">
  <thead>
    <tr>
      <th>Nombres apellido</th>
      <th>Totem</th>
      <th>Celular</th>
      <th>Cargo</th>
      <th>
        <button class="btn btn-primary btn-icono" id="btn-organigrama-nuevo" name="btn-organigrama-nuevo" data-toggle="modal" data-target="#modal-organigrama"><i class="fas fa-plus-square"></i></button>
      </th>
    </tr>
  </thead>
  <tbody></tbody>
</table>
<div class="modal fade" id="modal-organigrama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Integrante de la jefatura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nombre-organigrama">Nombres apellido</label><br>
              <input type="text" id="nombre-organigrama" name="nombre-organigrama" class="form-control" placeholder="Nombres apellido" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="totem-organigrama">Totem</label><br>
              <input type="text" id="totem-organigrama" name="totem-organigrama" class="form-control" placeholder="Totem" />
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="cargo-organigrama">Cargo</label><br>
              <input type="text" id="cargo-organigrama" name="cargo-organigrama" class="form-control" placeholder="Cargo" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="celular-organigrama">Celular</label><br>
              <input type="text" id="celular-organigrama" name="celular-organigrama" class="form-control" placeholder="Celular" />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-icono centrar" data-dismiss="modal" aria-label="Close" id="btn-guardar-organigrama" name="btn-guardar-organigrama"><i class="fas fa-cloud-upload-alt"></i></button>
      </div>
    </div>
  </div>
</div>