<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/Intendencia.php';
include_once 'App/DAO/DAOIntendencia.php';
include_once 'App/Redireccion.php';

if (isset($_POST['enviar-intendencia'])) {
	Conexion :: abrirConexion();
	$validador = new ControlIntendencia($_POST['numero-cedula'], $_POST['nombre1'], $_POST['nombre2'], $_POST['apellido1'], $_POST['apellido2'], $_POST['genero'], $_POST['parentesco'], $_POST['telefono'], $_POST['celular'], $_POST['eps'], $_POST['ocupacion'], $_POST['empresa'], $_POST['profesion'], $_POST['correo'], $_POST['id-residencia'], Conexion :: obtenerConexion());

	if ($validador -> registroValido()) {
		$intendencia = new Intendencia($validador -> obtenerNumeroCedula(), $validador -> obtenerPrimerNombre(), $validador -> obtenerSegundoNombre(), $validador -> obtenerPrimerApellido(), $validador -> obtenerSegundoApellido(), $validador -> obtenerGenero(), $validador -> obtenerParentesco(), $validador -> obtenerTelefono(), $validador -> obtenerCelular(), $validador -> obtenerEPS(), $validador -> obtenerOcupacion(), $validador -> obtenerEmpresa(), $validador -> obtenerProfesion(), $validador -> obtenerCorreo(), $validador -> obtenerIdResidencia());
		$intendecia_insertada = DAOIntendencia :: insertarIntendencia(Conexion :: obtenerConexion(), $intendencia);
		if ($intedencia_insertada) {
		Redireccion :: redirigir(RUTA_REGISTRO_CORRECTO.'/'.$intendencia -> obtenerPrimerNombre());
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
	<h3>Información de la intendencia</h3>
	<hr>
	<form role="form" method="post" action="<?php echo RUTA_GESTOR_INTENDENCIA ?>">
	<?php
	if (isset($_POST['enviar-intendencia'])) {
		include_once 'Plantillas/Formularios/IntendenciaValidada.php';
	} else {
		include_once 'Plantillas/Formularios/IntendenciaVacia.php';
	}
	?>
	</form>
	</div>
</div>