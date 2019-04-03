<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/Residencia.php';
include_once 'App/DAO/DAOResidencia.php';
include_once 'App/Controladores/ControlResidencia.php';
include_once 'App/Redireccion.php';

if (isset($_POST['enviar-residencia'])) {
	Conexion :: abrirConexion();
	$validador = new ControlResidencia($_POST['nombre'], $_POST['etapa-educativa'], $_POST['area'], $_POST['carrera'], Conexion :: obtenerConexion());

	if ($validador -> registroValido()) {
		$residencia = new Residencia('', $validador -> obtenerNombre(), $validador -> obtenerEtapaEducativa(), $validador -> obtenerArea(), $validador -> obtenerCarrera());
		$residencia_insertada = DAOCentroEducativo :: insertarCentroEducativo(Conexion :: obtenerConexion(), $residencia);
		if ($residencia_insertada) {
		Redireccion :: redirigir(RUTA_REGISTRO_CORRECTO.'/'.$residencia -> obtenerNombre());
		}
	}
	Conexion :: cerrarConexion();
}

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="row">
	<div class="col-md-12 formularios-usuario">
	<h2><i class="fa fa-comments" aria-hidden="true"></i></h2>
	<h3>Información de la residencia</h3>
	<hr>
	<form role="form" method="post" action="<?php echo RUTA_INFO_RESIDENCIA ?>">
	<?php
	if (isset($_POST['enviar-residencia'])) {
		include_once 'Plantillas/Formularios/ResidenciaValidada.php';
	} else {
		include_once 'Plantillas/Formularios/ResidenciaVacia.php';
	}
	?>
	</form>
	</div>
</div>