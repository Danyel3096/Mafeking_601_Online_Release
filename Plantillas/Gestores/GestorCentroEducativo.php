<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/CentroEducativo.php';
include_once 'App/DAO/DAOCentroEducativo.php';
include_once 'App/Controladores/ControlCentroEducativo/ControlCentroEducativo.php';
include_once 'App/Redireccion.php';

if (isset($_POST['enviar-centro-educativo'])) {
	Conexion :: abrirConexion();
	$validador = new ControlCentroEducativo($_POST['nombre'], $_POST['etapa-educativa'], $_POST['area'], $_POST['carrera'], Conexion :: obtenerConexion());

	if ($validador -> registroValido()) {
		$centro_educativo = new CentroEducativo('', $validador -> obtenerNombre(), $validador -> obtenerEtapaEducativa(), $validador -> obtenerArea(), $validador -> obtenerCarrera());
		$centro_educativo_insertado = DAOCentroEducativo :: insertarCentroEducativo(Conexion :: obtenerConexion(), $centro_educativo);
		if ($centro_educativo_insertado) {
		Redireccion :: redirigir(RUTA_REGISTRO_CORRECTO.'/'.$centro_educativo -> obtenerNombre());
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
	<h3>Información del centro educativo</h3>
	<hr>
	<form role="form" method="post" action="<?php echo RUTA_INFO_EDUCACION ?>">
	<?php
	if (isset($_POST['enviar-centro-educativo'])) {
		include_once 'Plantillas/Formularios/CentroEducativoValidado.php';
	} else {
		include_once 'Plantillas/Formularios/CentroEducativoVacio.php';
	}
	?>
	</form>
	</div>
</div>