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
<table class="table-striped table-hover table-bordered" id="tabla-progresion-persona">
  <thead>
    <tr>
      <th>Eje</th>
      <th>Especialidad</th>
      <th>Cumplidos</th>
      <th>Requisitos</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>
<table class="table table-bordered">
  <thead>
    <tr>
      <td>Persona</td>
      <td>Eje</td>
      <td>Especialidad</td>
      <td>Acción</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><select id="personas-equipo">
        <option label='Seleccione' selected></option>
      </select></td>
      <td><select id="ejes-progresion" name="ejes-progresion">
        <option></option>
      </select></td>
      <td><select id="especialidades-eje" name="especialidades-eje">
        <option></option>
      </select></td>
      <td>
        <button type="button" class="btn btn-primary btn-icono" id="btn-seleccionar-requisitos"><i class="fas fa-clipboard-check"></i></button>
        <button type="button" class="btn btn-success btn-icono" id="btn-guardar-progresion"><i class="fas fa-cloud-upload-alt"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<table class="table table-bordered">
  <tbody>
    <tr>
    <div id="requisitos-nivel"></div>
    </tr>
  </tbody>
</table>