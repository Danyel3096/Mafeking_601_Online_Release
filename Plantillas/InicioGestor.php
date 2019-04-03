<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/Modelos/Cargo.php';
include_once 'App/Modelos/DetalleCargo.php';
include_once 'App/Modelos/Equipo.php';
include_once 'App/Modelos/Rama.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/DAO/DAOCargo.php';
include_once 'App/DAO/DAODetalleCargo.php';
include_once 'App/DAO/DAOEquipo.php';
include_once 'App/DAO/DAORama.php';
include_once 'App/Redireccion.php';

if(!ControlSesion :: sesionIniciada()) {
  Redireccion :: redirigir(SERVIDOR);
} else {
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
		<div class="col-md-2">
			<div class="row">
      <input type="hidden" id="id-cargo-persona" name="id-cargo-persona" value="<?php echo $id_cargo; ?>" />
      <input type="hidden" id="id-rama-persona" name="id-rama-persona" value="<?php echo $id_rama; ?>" />
        <div class="sidenav">
  			<?php
        if($id_cargo == '29' || $id_cargo == '30') {?>
          <button class="dropdown-btn"><i class="fas fa-dollar-sign"></i> Tesorería<i class="fa fa-caret-down"></i></button>
          <div class="dropdown-container">
            <a href="<?php echo RUTA_GESTOR_TESORERIA ?>"><i class="fas fa-chart-line"></i> Estadística</a>
            <a href="<?php echo RUTA_TESORERIA_INSCRIPCION ?>"><i class="far fa-money-bill-alt"></i> Inscripción</a>
            <a href="<?php echo RUTA_TESORERIA_REGISTRO ?>"><i class="fas fa-folder-plus"></i> Registro</a>
            <a href="<?php echo RUTA_TESORERIA_DETALLE ?>"><i class="fas fa-folder-open"></i> Detalle</a>
          </div>
        <?php
        } else if ($id_cargo == '28') {?>
          <button class="dropdown-btn"><i class="fas fa-boxes"></i> Intendencia<i class="fa fa-caret-down"></i></button>
          <div class="dropdown-container">
            <a href="<?php echo RUTA_GESTOR_INTENDENCIA ?>" class="opcion" id="Intendencia"><i class="fas fa-dumpster-fire"></i> Estado</a>
            <a href="<?php echo RUTA_INTENDENCIA_REGISTRO ?>"><i class="fas fa-folder-plus"></i> Registro</a>
            <a href="<?php echo RUTA_INTENDENCIA_DETALLE ?>"><i class="fas fa-folder-open"></i> Detalle</a>
          </div>
        <?php
        } else if ($id_cargo == '1' || $id_cargo == '2' || $id_cargo == '3' || $id_cargo == '4' || $id_cargo == '5' || $id_cargo == '6' || $id_cargo == '7' || $id_cargo == '8' || $id_cargo == '9' || $id_cargo == '10') {?>
          <a href="<?php echo RUTA_GESTOR_CARGOS ?>"><i class="fas fa-id-card opcion"></i> Cargos <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Cargos" hidden></i></a>
          <button class="dropdown-btn"><i class="fas fa-shoe-prints"></i> Progresiones<i class="fa fa-caret-down"></i></button>
          <div class="dropdown-container">
            <a href="<?php echo RUTA_GESTOR_PROGRESIONES ?>"><i class="fas fa-chart-line"></i> Estadística <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Progresiones" hidden></i></a>
            <a href="<?php echo RUTA_PROGRESIONES_SEGUIMIENTO ?>"><i class="fas fa-street-view"></i> Seguimiento <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Seguimiento" hidden></i></a>
            <a href="<?php echo RUTA_PROGRESIONES_EJES ?>"><i class="fas fa-shapes"></i> Ejes <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Ejes" hidden></i></a>
            <a href="<?php echo RUTA_PROGRESIONES_ESPECIALIDADES ?>"><i class="fas fa-asterisk"></i> Especialidades <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Especialidades" hidden></i></a>
            <a href="<?php echo RUTA_PROGRESIONES_REQUISITOS ?>"><i class="fas fa-check-square"></i> Requisitos <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Requisitos" hidden></i></a>
          </div>
          <button class="dropdown-btn"><i class="fas fa-code-branch"></i> Rama<i class="fa fa-caret-down"></i></button>
          <div class="dropdown-container">
            <a href="<?php echo RUTA_GESTOR_RAMA ?>"><i class="fas fa-code-branch"></i> Rama <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Rama" hidden></i></a>
            <a href="<?php echo RUTA_RAMA_HISTORIA ?>"><i class="fas fa-history"></i> Historia <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Historia" hidden></i></a>
            <a href="<?php echo RUTA_RAMA_FUNDAMENTOS ?>"><i class="fas fa-file-signature"></i> Fundamentos <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Fundamentos" hidden></i></a>
            <a href="<?php echo RUTA_RAMA_PARTICIPACIONES ?>"><i class="fas fa-calendar-week"></i> Participaciones <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Participaciones" hidden></i></a>
          </div>
        <?php
        }
        ?>
          <button class="dropdown-btn"><i class="fas fa-calendar-alt"></i> Eventos<i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="<?php echo RUTA_GESTOR_EVENTOS ?>"><i class="fas fa-user-friends"></i> Participantes <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Eventos" hidden></i></a>
            <a href="<?php echo RUTA_GESTOR_CALENDARIO ?>"><i class="far fa-calendar-plus"></i> Calendario <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Calendario" hidden></i></a>
          </div>
          <a href="<?php echo RUTA_GESTOR_NOTICIA ?>"><i class="fas fa-newspaper"></i> Noticias <i class="fas fa-arrow-alt-circle-right fa-lg opcion" id="Noticias" hidden></i></a>
        <?php if($id_cargo == '1' || $id_cargo == '2' || $id_cargo == '15' || $id_cargo == '16') {?>
          <a href="<?php echo RUTA_GESTOR_ORGANIGRAMA ?>"><i class="fas fa-sitemap"></i> Organigrama</a>
        <?php } ?>
			</div>
			</div>
      <hr>
			<div class="row">
				<div class="form-group">
          <textarea class="form-control" rows="2" id="cargo-equipo" name="cargo-equipo" placeholder="Aquí aparecerá tu cargo y el equipo o rama al que perteneces." disabled><?php echo $nombre_cargo_equipo; ?></textarea>
				</div>
			</div>
		</div>
<script type="text/javascript">
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("activo");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
		<div class="col-md-10 main inicio-gestor">