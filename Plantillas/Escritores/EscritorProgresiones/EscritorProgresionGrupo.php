<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';

Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
?>
<div class="row">
	<div class="col-md-6 text-center">
		<h3 id="titulo-manada" class="color-manada"></h3>
		<hr>
		<a href="<?php echo RUTA_PROGRESION_MANADA ?>">
			<img id="foto-historica-manada" class="img-vistas" />
		</a>
	</div>
	<div class="col-md-6 text-center">
		<h3 id="titulo-tropa" class="color-tropa"></h3>
		<hr>
		<a href="<?php echo RUTA_PROGRESION_TROPA ?>">
			<img id="foto-historica-tropa" class="img-vistas" />
		</a>
	</div>
</div><br />
<div class="row">
	<div class="col-md-6 text-center">
		<h3 id="titulo-comunidad" class="color-comunidad"></h3>
		<hr>
		<a href="<?php echo RUTA_PROGRESION_COMUNIDAD ?>">
			<img id="foto-historica-comunidad" class="img-vistas" />
		</a>
	</div>
	<div class="col-md-6 text-center">
		<h3 id="titulo-clan" class="color-clan"></h3>
		<hr>
		<a href="<?php echo RUTA_PROGRESION_CLAN ?>">
			<img id="foto-historica-clan" class="img-vistas" />
		</a>
	</div>
</div>