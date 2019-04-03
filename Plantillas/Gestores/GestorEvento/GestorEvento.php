<?php
include_once 'App/Conexion.php';
include_once 'App/Configuracion.php';
include_once 'App/Modelos/Cargo.php';
include_once 'App/Modelos/Evento.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/DAO/DAOCargo.php';
include_once 'App/DAO/DAOEvento.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/Redireccion.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
include_once 'Plantillas/InicioGestor.php';

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

$color = '';
$color_texto = '';

Conexion :: abrirConexion();
if ($id_cargo == '3' || $id_cargo == '4') {
    $color = 'yellow';
    $color_texto = 'black';
} else if ($id_cargo == '5' || $id_cargo == '6') {
    $color = 'green';
    $color_texto = 'white';
} else if ($id_cargo == '7' || $id_cargo == '8') {
    $color = 'blue';
    $color_texto = 'black';
} else if ($id_cargo == '9' || $id_cargo == '10' || $id_cargo == '17') {
    $color = 'red';
    $color_texto = 'black';
}

Conexion :: cerrarConexion();
Conexion :: abrirConexion();
?>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-7">
            <div id="Calendario_Asistencia_Eventos"></div>
        </div>
        <div class="col"></div>
    </div>
</div>
<div class="modal fade" id="modal-gestor-evento-asistencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de personas del evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id-rama-evento" name="id-rama-evento" value="<?php echo $id_rama; ?>" />
                <input type="hidden" id="idevento" name="idevento" />
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
                                Respuesta
                            </th>
                            <th>
                                Acción
                            </th>
                        </tr>
                    </thead>
                  <tbody id="listado-personas-asisten-evento" name="listado-personas-asisten-evento"></tbody>
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<?php
include_once 'Plantillas/CierreGestor.php';
include_once 'Plantillas/CierrePagina.php';
?>