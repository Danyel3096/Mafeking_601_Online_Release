<?php
if(!ControlSesion :: sesionIniciada()) {
  Redireccion :: redirigir(SERVIDOR);
} else {
  Conexion :: abrirConexion();
  $conexion = Conexion :: obtenerConexion();
  $id_persona = $_SESSION['id'];
  $persona_recuperada = DAOPersona :: consultarPersonaPorId($conexion, $id_persona);
  $detalle_cargo = DAODetalleCargo :: consultarDetalleCargoPorIdPersona($conexion, $id_persona);
  $equipo = DAOEquipo :: consultarEquipoPorId(Conexion :: obtenerConexion(), $detalle_cargo -> obtenerIdEquipo());
  $rama = DAORama :: consultarRamaPorId(Conexion :: obtenerConexion(), $equipo -> obtenerIdRama());
  $id_rama = $rama -> obtenerId();
  $id_cargo = $detalle_cargo -> obtenerIdCargo();
  $cargo = DAOCargo :: consultarCargoPorId($conexion, $id_cargo);
  $nombre_cargo = $cargo -> obtenerNombre();
  $nombre_equipo = $equipo -> obtenerNombre();
  $nombre_rama = $rama -> obtenerNombre();
}
?>
<table>
  <thead>
    <tr>
      <th>
        <h3>Personas que no han iniciado su progresión</h3>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div id="porcentaje-personas-sin-progresion" name="porcentaje-personas-sin-progresion"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-sin-progresion" data-toggle="modal" data-target="#modal-listado-sin-progresion"><i class="far fa-eye"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<div class="espacio-pagina"></div>
<div id="estadisticas-progresion-clan" name="estadisticas-progresion-clan" hidden>
<table>
  <thead>
    <tr>
      <th>
        <h4>Investidura</h4>
      </th>
      <th>
        <h4>Precursor</h4>
      </th>
    </tr>
    <tr>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <img id="investidura-rover" class="insignias" />
            </div>
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <img id="eje-precursor" class="insignias" />
            </div>
          </div>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div id="estadistica-investidura-clan" name="estadistica-investidura-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="1"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-precursor-clan" name="estadistica-precursor-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="2"><i class="far fa-eye"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<div class="espacio-pagina"></div>

<h3>Eje Transversal</h3>
<hr>
<table>
  <thead>
    <tr>
      <th colspan="3">
        Habilidad, técnica y conocimiento scout
      </th>
    </tr>
    <tr>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h6>Aprendiz</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img id="aprendiz-eje-transversal" class="insignias" />
            </div>
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h6>Experto</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img id="experto-eje-transversal" class="insignias" />
            </div>
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h6>Monitor</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img id="monitor-eje-transversal" class="insignias" />
            </div>
          </div>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div id="estadistica-aprendiz-habilidad-técnica-conocimiento-clan" name="estadistica-habilidad-técnica-conocimiento-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="3"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-experto-habilidad-técnica-conocimiento-clan" name="estadistica-habilidad-técnica-conocimiento-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="4"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-monitor-habilidad-técnica-conocimiento-clan" name="estadistica-monitor-habilidad-técnica-conocimiento-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="5"><i class="far fa-eye"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<div class="espacio-pagina"></div>

<table>
  <thead>
    <tr>
      <th colspan="3">
        Formación por competencias
      </th>
    </tr>
    <tr>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h6>Aprendiz</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img id="aprendiz-eje-transversal-2" class="insignias" />
            </div>
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h6>Experto</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img id="experto-eje-transversal-2" class="insignias" />
            </div>
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h6>Monitor</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img id="monitor-eje-transversal-2" class="insignias" />
            </div>
          </div>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div id="estadistica-aprendiz-formacion-competencias-clan" name="estadistica-formacion-competencias-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="6"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-experto-formacion-competencias-clan" name="estadistica-formacion-competencias-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="7"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-monitor-formacion-competencias-clan" name="estadistica-monitor-formacion-competencias-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="8"><i class="far fa-eye"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<div class="espacio-pagina"></div>

<h3>Eje Estructural</h3>
<hr>
<table>
  <thead>
    <tr>
      <th colspan="3">
        <h6>Viaje y enlace internacional</h6>
      </th>
    </tr>
    <tr>
      <th>
        <div class="container">
          <div class="row">
            <h6>Aprendiz</h6>
          </div>
          <div class="row">
            <img id="eje-estructural-aprendiz-viaje-enlace-internacional" class="insignias" />
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <h6>Experto</h6>
              </div>
              <div class="row">
                <img id="eje-estructural-experto-viaje-enlace-internacional" class="insignias" />
              </div>
            </div>
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <h6>Monitor</h6>
              </div>
              <div class="row">
                <img id="eje-estructural-monitor-viaje-enlace-internacional" class="insignias" />
              </div>
            </div>
          </div>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div id="estadistica-aprendiz-viaje-enlace-internacional-clan" name="estadistica-viaje-enlace-internacional-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="9"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-experto-viaje-enlace-internacional-clan" name="estadistica-viaje-enlace-internacional-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="10"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-monitor-viaje-enlace-internacional-clan" name="estadistica-monitor-viaje-enlace-internacional-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="11"><i class="far fa-eye"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<div class="espacio-pagina"></div>

<table>
  <thead>
    <tr>
      <th colspan="3">
        <h6>Emprendimiento</h6>
      </th>
    </tr>
    <tr>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <h6>Aprendiz</h6>
              </div>
              <div class="row">
                <img id="eje-estructural-aprendiz-emprendimiento" class="insignias" />
              </div>
            </div>
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <h6>Experto</h6>
              </div>
              <div class="row">
                <img id="eje-estructural-experto-emprendimiento" class="insignias" />
              </div>
            </div>
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <h6>Monitor</h6>
              </div>
              <div class="row">
                <img id="eje-estructural-monitor-emprendimiento" class="insignias" />
              </div>
            </div>
          </div>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div id="estadistica-aprendiz-emprendimiento-clan" name="estadistica-emprendimiento-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="15"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-experto-emprendimiento-clan" name="estadistica-emprendimiento-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="16"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-monitor-emprendimiento-clan" name="estadistica-monitor-emprendimiento-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="17"><i class="far fa-eye"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<div class="espacio-pagina"></div>

<table>
  <thead>
    <tr>
      <th colspan="3">
        <h6>Servicio</h6>
      </th>
    </tr>
    <tr>
      <th>
        <div class="container">
          <div class="row">
            <h6>Aprendiz</h6>
          </div>
          <div class="row">
            <img id="eje-estructural-aprendiz-servicio" class="insignias" />
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <h6>Experto</h6>
          </div>
          <div class="row">
            <img id="eje-estructural-experto-servicio" class="insignias" />
          </div>
        </div>
      </th>
      <th>
        <div class="container">
          <div class="row">
            <h6>Monitor</h6>
          </div>
          <div class="row">
            <img id="eje-estructural-monitor-servicio" class="insignias" />
          </div>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div id="estadistica-aprendiz-servicio-clan" name="estadistica-servicio-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="12"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-experto-servicio-clan" name="estadistica-servicio-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="13"><i class="far fa-eye"></i></button>
      </td>
      <td>
        <div id="estadistica-monitor-servicio-clan" name="estadistica-monitor-servicio-clan"></div>
        <button type="button" class="btn btn-info btn-icono" name="btn-ver-listado-especialidad" data-toggle="modal" data-target="#modal-listado-especialidad" value="14"><i class="far fa-eye"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<div class="espacio-pagina"></div>
<table>
  <thead>
    <tr>
      <th>
        <h3>BP</h3>
      </th>
    </tr>
    <tr>
      <th>
        <img id="eje-bp" class="insignias" />
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><div id="porcentaje-ultima-insignia"></div></td>
    </tr>
    <tr>
      <td><div id="umbral-investidura">7/10</div></td>
    </tr>
  </tbody>
</table>
<div class="espacio-pagina"></div>
</div>
<div class="modal fade" id="modal-listado-especialidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listado de personas de la especialidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
          <thead>
            <tr>
              <th>
                Pos.
              </th>
              <th>
                Nombres
              </th>
              <th>
                Apellidos
              </th>
              <th>
                Cumplidos
              </th>
              <th>
                Total
              </th>
            </tr>
          </thead>
          <tbody id="listado-personas-especialidad" name="listado-personas-especialidad"></tbody>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-listado-sin-progresion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listado de personas sin progresión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
          <thead>
            <tr>
              <th>
                Pos.
              </th>
              <th>
                Nombres
              </th>
              <th>
                Apellidos
              </th>
            </tr>
          </thead>
          <tbody id="listado-personas-sin-progresion" name="listado-personas-sin-progresion"></tbody>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>