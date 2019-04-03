<?php
include_once 'App/DAO/DAORecuperaClaves.php';
include_once 'App/Redireccion.php';

Conexion :: abrirConexion();
if (DAORecuperaClaves::enlaceSecretoExiste(Conexion :: obtenerConexion(), $enlace_web_personal)) {
	$numero_documento = DAORecuperaClaves::obtenerNumeroDocumentoPorEnlaceWebSecreto(Conexion :: obtenerConexion(), $enlace_web_personal);
	echo 'numero documento solicitante' . $numero_documento;
} else {
	echo '404';
}

if (isset($_POST['btn-nueva-clave'])) {
	# code...
	$clave_cifrada = password_hash();
	$clave_actualizada = DAOPersona :: actualizarClave(Conexion :: obtenerConexion(), $numero_documento, $clave_cifrada);

	if ($clave_actualizada) {
		Redireccion :: redirigir(RUTA_INICIO_SESION);
	} else {
		echo 'ERROR';
	}
}

Conexion :: cerrarConexion();

$titulo = 'Recuperación de contraseña';

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-title text-center">
					<h4>Crea una nueva contraseña</h4>
				</div>
				<div class="card-body">
					<form role="form" method="post" action="<?php echo RUTA_RECUPERACION_CLAVE."/".$enlace_web_personal; ?>">
						<h2>Escribe tu nueva contraseña</h2>
						<br>
						<div class="form-group">
							<label for="clave">Nueva contraseña</label>
							<input type="password" name="clave" id="clave" class="form-control" placeholder="Mínimo 6 caracteres" required />
						</div>
						<div class="form-group">
							<label for="clave2">Confirma tu nueva contraseña</label>
							<input type="password" name="clave2" id="clave2" class="form-control" placeholder="Ambas contraseñas deben coincidir" required />
						</div>
						<button type="submit" name="btn-nueva-clave" class="btn btn-lg btn-primary btn-block">Guardar nueva contraseña</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>