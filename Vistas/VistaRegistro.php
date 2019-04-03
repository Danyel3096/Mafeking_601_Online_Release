<?php
$Titulo = 'Registro | Grupo Scout Mafeking 601';
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container inicio-pagina">
	<div class="jumbotron">
		<h1 class="text-center">Formulario de registro</h1>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-4 text-center sin-espaciado-derecha">
			<div class="card">
				<div class="card-title">
					<h3 class="panel-title">Instrucciones</h3>
				</div>
				<div class="card-body">
					<p class="text-justify">
						Para unirte al sitio web de la familia Mafeking 601 sigue los siguientes pasos:<br><br>
						1. La edad mínima para vincularse al grupo scout 601 Mafeking de Palmira es 6 años.<br><br>
						2. Introduce tu nombre de usuario, tu correo electrónico y tu contraseña, son necesarios para iniciar tu sesión.<br><br>
						3. El correo electrónico que escribas debe ser real, ya que lo necesitarás para gestionar tu cuenta.<br><br>
						4. Tu contraseña debe contener letras minúsculas, mayúsculas y números sin espacios en blanco.<br><br>
						5. Los campos obligatorios para realizar el registro se marcan con <span class="obligatorio">*</span>.
					</p>
					<br>
					<a href="<?php echo SERVIDOR ?>" class="card-link">¿Ya tienes tú cuenta? Inicia sesión</a>
					<br><br>
					<a href="#" class="card-link">¿Olvidaste tú contraseña?</a>
				</div>
			</div>
		</div>
		<div class="col-md-8 text-center sin-espaciado-izquierda">
			<div class="card">
				<div class="card-title">
					<h3 class="panel-title">Introduce tus datos</h3>
				</div>
				<div class="card-body">
					<form class="validar-formulario" id="formulario-registro" role="form" method="post">
						<?php
							include_once 'Plantillas/Formularios/FormularioRegistro.php';
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once 'Plantillas/CierrePagina.php';
?>