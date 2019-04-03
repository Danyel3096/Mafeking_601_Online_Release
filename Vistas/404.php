<?php
header($_SERVER['SERVER_PROTOCOL'] . "404 Not Found", true, 404);

$Titulo = "Página no encontrada | Grupo Scout Mafeking 601";

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container inicio-perfil error-404">
	<div class="row">
		<div class="col-md-12">
			<h1><strong>{ Error 404 }</strong></h1><br />
			<h2>La página que estas buscando no existe o no se ha podido encontrar en el sitio</h2><br />
			<h2><i class="fas fa-compass fa-2x"></i></h2><br />
			<h2>Realiza tu búsqueda a través de la casilla de búsqueda en la parte superior de la página</h2><br />
			<h2>También puedes volver a la página principal con el siguiente boton</h2><br />
		</div>
	</div>
	<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-2">
			<a href="<?php echo SERVIDOR ?>" type="button" class="btn btn-info form-control" id="btn-servidor" name="btn-servidor"><i class="fas fa-home"></i></a>
		</div>
		<div class="col-md-5"></div>
	</div>
</div>
<?php
include_once 'Plantillas/CierrePagina.php';
?>