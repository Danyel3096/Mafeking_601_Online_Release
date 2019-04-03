<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/Modelos/Cargo.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/DAO/DAOCargo.php';
include_once 'App/Redireccion.php';

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
?>
<table>
  <thead>
    <tr>
      <th colspan="2">Estadísticas generales</th>
    </tr>
    <tr>
      <th>Investidura</th>
      <th>Inscripción</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><div id="investidura"></div></td>
      <td><div id="inscripcion"></div></td>
    </tr>
    <tr>
      <td><div id="umbral-investidura">7/10</div></td>
      <td><div id="umbral-inscripcion">7/10</div></td>
    </tr>
  </tbody>
</table>
<table>
  <thead>
    <tr>
      <th colspan="2">Estadísticas progresión</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><div id="investidura"></div></td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
var circulo1 = $('#investidura').circleProgress({
  arcCoef: 0.5,
  value: 0.7,
  size: 100
});

circulo1.resizable()
  .on('resizestop', function() {
      circulo1.circleProgress();
  });

circulo1.on('circle-animation-progress', function(e, v) {
  var obj = $(this).data('circle-progress'),
      ctx = obj.ctx,
      s = obj.size,
      sv = (70 * v).toFixed()+"%",
      fill = obj.arcFill;

  ctx.save();
  ctx.font = "bold " + s / 2.5 + "px sans-serif";
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillStyle = fill;
  ctx.fillText(sv, s / 2, s / 2);
  ctx.restore();
});

var circulo2 = $('#inscripcion').circleProgress({
  arcCoef: 0.5,
  value: 0.7,
  size: 100,
  fill: { gradient: ['#f55', 'orange']}
});

circulo2.resizable()
  .on('resizestop', function() {
      circulo2.circleProgress();
  });

circulo2.on('circle-animation-progress', function(e, v) {
  var obj = $(this).data('circle-progress'),
      ctx = obj.ctx,
      s = obj.size,
      sv = (70 * v).toFixed()+"%",
      fill = obj.arcFill;

  ctx.save();
  ctx.font = "bold " + s / 2.5 + "px sans-serif";
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillStyle = fill;
  ctx.fillText(sv, s / 2, s / 2);
  ctx.restore();
});
</script>