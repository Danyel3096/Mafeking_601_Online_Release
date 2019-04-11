<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/Controladores/ControlSesion.php';

Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
$sesion_usuario = ControlSesion::sesionIniciada();

$sql = "SELECT Titulo, Url FROM Noticias";
$sentencia = $conexion -> prepare($sql);
$sentencia -> execute();
$resultado = $sentencia -> fetchAll();

if(isset($_POST['btn-sesion'])) {
    $validador = new ControlSesion($_POST['texto'], $_POST['acceso'], Conexion :: obtenerConexion());
    if ($validador -> obtenerError() === '' && !is_null($validador -> obtenerPersona())) {
        ControlSesion :: iniciarSesion($validador -> obtenerPersona() -> obtenerId(), $validador -> obtenerPersona() -> obtenerNombres());
        Redireccion :: redirigir(SERVIDOR);
    }
    Conexion :: cerrarConexion();
}
?>
<script>
$(document).ready(function(){
	var titulos = [
	<?php for ($i=0; $i < count($resultado); $i++) {  ?>
		{label:"<?php echo $resultado[$i]['Titulo'] ?>", value:"<?php echo RUTA_NOTICIA.'/'.$resultado[$i]['Url'] ?>"},
	<?php } ?>
	];

	$("#palabra-clave").autocomplete({
		source: titulos,
		select:function(event, ui) {
			window.location = ui.item.value;
		}
	});
});
</script>
<nav class="navbar navbar-expand-lg navbar-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<img src="<?php echo SERVIDOR ?>/favicon.ico" id="favicon-nav" alt="" /><a class="navbar-brand mb-0 h1" href="<?php echo SERVIDOR ?>">Mafeking 601</a>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<?php if(!$sesion_usuario) { ?>
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_ORGANIGRAMA ?>"><i class="fas fa-sitemap"></i> Organigrama</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_PROGRESIONES ?>"><i class="fas fa-tasks"></i> Progresiones</a>
			</li>
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_NOTICIAS ?>"><i class="fas fa-newspaper"></i> Noticias</a>
			</li>
		</ul>
		<?php } else { ?>
		<ul class="navbar-nav">	
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_CRONOGRAMA ?>"><i class="far fa-calendar-alt"></i> Cronograma</a>
			</li>
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_PROGRESIONES ?>"><i class="fas fa-tasks"></i> Progresiones</a>
			</li>
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="#"><i class="far fa-question-circle"></i> Ayuda</a>
			</li>
		</ul>
		<?php } ?>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
			<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="search" placeholder="¿Qué buscas?" aria-label="Search" name="palabra-clave" id="palabra-clave">
      			<div id="coincidencias"></div>
		    	<button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    			</form>
			</li>
			<?php if($sesion_usuario) { ?>
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_PERFIL ?>"><i class="far fa-user"></i> <?php echo ' ' . $_SESSION['nombre']; ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_GESTOR ?>"><i class="fas fa-user-cog"></i> Gestor</a>
			</li>
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_CIERRE_SESION ?>"><i class="fas fa-sign-out-alt"></i> Cerrar</a>
			</li>
			<?php
			} else {
			?>
			<li class="nav-item">
				<div class="dropdown m-1">
  					<button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    					<i class="far fa-address-card"></i> Inicia sesión
  					</button>
  				<div class="dropdown-menu dropdown-menu-right inicio-sesion">
  					<form class="px-2 py-1" method="post" action="<?php echo RUTA_INICIO_SESION ?>">
    					<div class="form-group">
      						<label for="texto">Correo electrónico</label>
      						<input type="text" class="form-control" id="texto" name="texto" placeholder="Correo electrónico" required>
    					</div>
    					<div class="form-group">
      						<label for="acceso">Contraseña</label>
      						<input type="password" class="form-control" id="acceso" name="acceso" placeholder="Contraseña" required>
    					</div>
    					<div class="form-group">
    						<div class="col-md-6 izquierda">
    							<div class="form-check">
        						<input type="checkbox" class="form-check-input" id="dropdownCheck">
        						<label class="form-check-label" for="dropdownCheck">
          						Recordarme
        						</label>
      						</div>
    						</div>
    						<div class="col-md-6 derecha">
    							<button type="submit" id="btn-sesion" name="btn-sesion" class="btn btn-primary">Ingresar</button>
    						</div>
    					</div>
  					</form>
  					<div class="dropdown-divider"></div>
  						<a class="dropdown-item" href="<?php echo RUTA_RECUPERAR_CLAVE ?>">¿Has olvidado tu contraseña?</a>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link enlaces-nav" href="<?php echo RUTA_REGISTRO ?>"><i class="far fa-address-book"></i> Registro</a>
			</li>
			<?php
			}
			?>
		</ul>
	</div>
</nav>
