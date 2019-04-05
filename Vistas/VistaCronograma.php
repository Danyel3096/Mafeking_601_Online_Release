<?php
$Titulo = 'Cronograma de actividades | Grupo Scout Mafeking 601';
include_once 'App/Conexion.php';
include_once 'App/Configuracion.php';
include_once 'App/Modelos/Cargo.php';
include_once 'App/Modelos/Evento.php';
include_once 'App/DAO/DAOCargo.php';
include_once 'App/DAO/DAOEvento.php';
include_once 'App/Redireccion.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';

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
<div class="container inicio-pagina">
	<input type="hidden" id="id-persona-evento" name="id-persona-evento" value="<?php echo $id_persona; ?>" />
	<input type="hidden" id="id-rama-persona" name="id-rama-persona" value="<?php echo $id_rama; ?>" />
	<input type="hidden" id="id-cargo-persona" name="id-cargo-persona" value="<?php echo $id_cargo; ?>" />
	<div class="row">
		<div class="col">
			<div id="mes-enero"></div>
		</div>
		<div class="col">
			<div id="mes-febrero"></div>
		</div>
		<div class="col">
			<div id="mes-marzo"></div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div id="mes-abril"></div>
		</div>
		<div class="col">
			<div id="mes-mayo"></div>
		</div>
		<div class="col">
			<div id="mes-junio"></div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div id="mes-julio"></div>
		</div>
		<div class="col">
			<div id="mes-agosto"></div>
		</div>
		<div class="col">
			<div id="mes-septiembre"></div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div id="mes-octubre"></div>
		</div>
		<div class="col">
			<div id="mes-noviembre"></div>
		</div>
		<div class="col">
			<div id="mes-diciembre"></div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-informacion-evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="hidden" id="id-rama-evento" name="id-rama-evento" value="<?php echo $id_rama; ?>" />
                <form class="validar-formulario" id="formulario-evento" name="formulario-evento" role="form" method="post">
                    <?php
                    include_once 'Plantillas/Formularios/FormularioEvento.php';
                    ?>
                </form>
                <div class="form-row">
                    <div class="col-md-6 text-center">
                        <img id="insignia-evento" />
                    </div>
                    <div class="col-md-6 text-center">
                    	<i id="ficha-pdf" class="far fa-file-pdf" hidden></i>
                        <i id="ficha-word-writer" class="far fa-file-word" hidden></i>
                        <a id="ficha-evento" hidden>Descargar ficha</a>
                    </div>
                </div>
                <hr>
                <div class="row fila-confirmacion-asistencia-evento">
                	<div class="col-md-12 text-center">
                		<button type="submit" id="btn-asistencia-positiva" name="btn-asistencia" class="btn btn-success btn-icono" value="Sí"><i class="fas fa-check-circle"></i> Asistire</button>
	                	<button type="submit" id="btn-asistencia-negativa" name="btn-asistencia" name="btn-agregar-evento" class="btn btn-danger btn-icono" value="No"><i class="fas fa-times-circle"></i> No asistire</button>
                	</div>
	            </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'Plantillas/CierrePagina.php';
?>