<?php
$Titulo = $noticia -> obtenerTitulo();
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/Modelos/Noticia.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/DAO/DAONoticia.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container inicio-pagina">
	<div class="row">
		<div class="col-md-12">
			<h1>
				<?php echo $noticia -> obtenerTitulo(); ?>
			</h1>
			<hr>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<p>
				Publicado por: <i class="fas fa-user-clock"></i>
				<strong><?php echo $autor -> obtenerNombres() ?></strong>
				el <?php echo date_format(date_create($noticia -> obtenerFecha()), 'd/m/Y'); ?>
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 text-center">
			<img id="imagen-noticia" src="<?php echo SERVIDOR ?>/Archivos/Subidas/Noticias/<?php echo $noticia -> obtenerImagen(); ?>" />
		</div>
		<div class="col-md-3"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<article class="text-justify">
				<?php echo nl2br($noticia -> obtenerTexto()); ?>
			</article>
		</div>
	</div>
	<?php
	include_once 'Plantillas/NoticiasAleatorias.php';
	?>
	<br>
	<input type="hidden" id="id-noticia-actual" name="id-noticia-actual" value="<?php echo $noticia -> obtenerId(); ?>" />
	<h3>Comentarios</h3>
	<hr>
	<br>
	<?php
    include_once 'Plantillas/Formularios/FormularioComentario.php';
	?>
	<br>
	<div id="seccion-comentarios" name="seccion-comentarios"></div>
</div>
<?php
include_once 'Plantillas/CierrePagina.php';
?>