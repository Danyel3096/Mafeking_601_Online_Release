<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/Almacen.php';
include_once 'App/DAO/DAOAlmacen.php';
include_once 'App/Controladores/ControlAlmacen/ControlAlmacen.php';
include_once 'App/Redireccion.php';

if (isset($_POST['enviar-almacen'])) {
	Conexion :: abrirConexion();
	$validador = new ControlAlmacen($_POST['nombre'], $_POST['valor-unidad'], $_POST['cantidad-disponible'], $_POST['cantidad-vendida'], Conexion :: obtenerConexion());

	if ($validador -> registroValido()) {
		$almacen = new Almacen($validador -> obtenerNumeroCedula(), $validador -> obtenerPrimerNombre(), $validador -> obtenerSegundoNombre(), $validador -> obtenerPrimerApellido(), $validador -> obtenerSegundoApellido(), $validador -> obtenerGenero(), $validador -> obtenerParentesco(), $validador -> obtenerTelefono(), $validador -> obtenerCelular(), $validador -> obtenerEPS(), $validador -> obtenerOcupacion(), $validador -> obtenerEmpresa(), $validador -> obtenerProfesion(), $validador -> obtenerCorreo(), $validador -> obtenerIdResidencia());
		$almacen_insertado = DAOAcudiente :: insertarAcudiente(Conexion :: obtenerConexion(), $acudiente);
		if ($almacen_insertado) {
		Redireccion :: redirigir(RUTA_REGISTRO_CORRECTO.'/'.$almacen -> obtenerPrimerNombre());
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
	<h3>Información del almacen</h3>
	<hr>
	<form role="form" method="post" action="<?php echo RUTA_GESTOR_ALMACEN ?>">
	<?php
	if (isset($_POST['enviar-almacen'])) {
		include_once 'Plantillas/Formularios/AlmacenValidado.php';
	} else {
		include_once 'Plantillas/Formularios/AlmacenVacio.php';
	}
	?>
	</form>
	</div>
</div>