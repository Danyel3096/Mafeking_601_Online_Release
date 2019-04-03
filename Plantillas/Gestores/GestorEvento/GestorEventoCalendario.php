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
            <div id="Calendario_Web"></div>
        </div>
        <div class="col"></div>
    </div>
</div>
<div class="modal fade" id="modal-gestor-evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Información del evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id-evento" name="id-evento" />
                <input type="hidden" id="color-evento" name="color-evento" value="<?php echo $color; ?>" />
                <input type="hidden" id="color-texto" name="color-texto" value="<?php echo $color_texto; ?>" />
                <input type="hidden" id="id-rama-evento" name="id-rama-evento" value="<?php echo $id_rama; ?>" />
                <form class="validar-formulario" id="formulario-evento" name="formulario-evento" role="form" method="post">
                    <?php
                    include_once 'Plantillas/Formularios/FormularioEvento.php';
                    ?>
                </form>
                <div id="fila-archivos-evento" class="form-row" hidden>
                    <div class="col-md-6 text-center">
                        <img id="img-insignia-evento" hidden />
                        <form class="text-center dropzone" action="<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOArchivos.php" method="POST" enctype="multipart/form-data" id="dropzoneFormEventoInsignia">
                            <input type="hidden" id="id-imagen-evento" name="id-imagen-evento" />
                            <input type="hidden" id="id-persona-imagen-evento" name="id-persona-imagen-evento" value="<?php echo $id_persona; ?>" />
                            <div class="fallback">
                                <input type="file" id="imagen-evento" multiple />
                            </div>
                        </form><br />
                        <button type="submit" id="btn-agregar-insignia-evento" name="btn-agregar-insignia-evento" class="btn btn-success btn-icono"><i class="fas fa-cloud-upload-alt"></i></button>
                    </div>
                    <div class="col-md-6 text-center">
                        <i id="ficha-no-permitida" class="fas fa-exclamation-circle" hidden></i>
                        <i id="ficha-pdf" class="far fa-file-pdf" hidden></i>
                        <i id="ficha-word-writer" class="far fa-file-word" hidden></i>
                        <form method="POST" enctype="multipart/form-data" id="formEventoFicha">
                            <input type="hidden" id="id-ficha-evento" name="id-ficha-evento" />
                            <input type="hidden" id="id-persona-ficha-evento" name="id-persona-ficha-evento" value="<?php echo $id_persona; ?>" />
                            <label for="ficha-evento" id="label-ficha-evento">Selecciona la ficha del evento</label>
                            <input type="file" id="ficha-evento" name="ficha-evento" class="btn-subir-ficha" multiple /><br />
                            <button type="submit" id="btn-agregar-ficha-evento" name="btn-agregar-ficha-evento" class="btn btn-success btn-icono"><i class="fas fa-cloud-upload-alt"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<?php
include_once 'Plantillas/CierreGestor.php';
include_once 'Plantillas/CierrePagina.php';
?>