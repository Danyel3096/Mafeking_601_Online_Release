<?php
$Titulo = 'Recupera tu clave | Grupo Scout Mafeking 601';

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-title text-center">
					<h4>Recuperación de contraseña</h4>
				</div>
				<div class="card-body">
					<form role="form" method="post" action="<?php echo RUTA_GENERAR_RECUPERADOR ?>">
						<p>Escribe la dirección de correo electrónico con la que te registraste y te enviaremos un correo con el que podras reestablecer tu contraseña.</p>
						<br>
						<label for="text" class="sr-only">Correo electrónico</label>
						<input type="text" name="correo" id="correo" class="form-control" placeholder="Correo electrónico" required autofocus>
						<br>
						<button type="submit" name="btn-correo" class="btn btn-lg btn-primary btn-block">Enviar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once 'Plantillas/CierrePagina.php';
?>