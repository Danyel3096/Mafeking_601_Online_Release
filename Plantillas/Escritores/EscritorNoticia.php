<?php
$Titulo = $noticia -> obtenerTitulo();
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/Modelos/Cargo.php';
include_once 'App/Modelos/Noticia.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/DAO/DAOCargo.php';
include_once 'App/DAO/DAONoticia.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
if(ControlSesion :: sesionIniciada()) {
  Conexion :: abrirConexion();
  $conexion = Conexion :: obtenerConexion();
  $id_persona = $_SESSION['id'];
  $persona_recuperada = DAOPersona :: consultarPersonaPorId($conexion, $id_persona);
  $detalle_cargo = DAODetalleCargo :: consultarDetalleCargoPorIdPersona($conexion, $id_persona);
  $equipo = DAOEquipo :: consultarEquipoPorId($conexion, $detalle_cargo -> obtenerIdEquipo());
  $rama = DAORama :: consultarRamaPorId($conexion, $equipo -> obtenerIdRama());
  $id_rama = $rama -> obtenerId();
  $id_cargo = $detalle_cargo -> obtenerIdCargo();
  $cargo = DAOCargo :: consultarCargoPorId($conexion, $id_cargo);
  if ($id_cargo == '1' || $id_cargo == '2' || $id_cargo == '3' || $id_cargo == '4' || $id_cargo == '5' || $id_cargo == '6' || $id_cargo == '7' || $id_cargo == '8' || $id_cargo == '9' || $id_cargo == '10') {
    $nombre_cargo_equipo = $nombre_cargo = $cargo -> obtenerNombre();
  } else {
    $nombre_cargo_equipo = $cargo -> obtenerNombre()." de\n".$equipo -> obtenerNombre();
  }
}
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
	<?php if($sesion_usuario) {
    include_once 'Plantillas/Formularios/FormularioComentario.php';
	} else {?>
		<div class="row">
			<div class="col-md-12 text-center">
				<span><strong>Inicia sesión</strong> en tu cuenta para poder comentar en las noticias</span>
			</div>
		</div>
	<?php
	}
	?>
	<br>
	<div id="seccion-comentarios" name="seccion-comentarios"></div>
</div>
<?php
include_once 'Plantillas/CierrePagina.php';
?>