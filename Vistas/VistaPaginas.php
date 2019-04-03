<?php
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';

Conexion :: abrirConexion();
if(ControlSesion :: sesionIniciada()) {
  $id_persona = $_SESSION['id'];
  $persona = DAOPersona :: consultarPersonaPorId(Conexion::obtenerConexion(), $id_persona);
}
?>
<div class="container inicio-pagina">
<input type="hidden" id="id-persona" name="id-persona" value="<?php echo $id_persona; ?>" />
<?php
switch($vista_actual) {
	case 'Grupo':
		switch ($subvista_actual) {
			case 'Manada':
				include_once 'Plantillas/Escritores/EscritorRamas/EscritorRamaManada.php';
				break;
			case 'Tropa':
				include_once 'Plantillas/Escritores/EscritorRamas/EscritorRamaTropa.php';
				break;
			case 'Comunidad':
				include_once 'Plantillas/Escritores/EscritorRamas/EscritorRamaComunidad.php';
				break;
			case 'Clan':
				include_once 'Plantillas/Escritores/EscritorRamas/EscritorRamaClan.php';
				break;
			default:
				include_once 'Plantillas/Escritores/EscritorRamas/EscritorRamaGrupo.php';
				break;
		}
		break;
	case 'Progresiones':
		switch ($subvista_actual) {
			case 'Manada':
				include_once 'Plantillas/Escritores/EscritorProgresiones/EscritorProgresionManada.php';
				break;
			case 'Tropa':
				include_once 'Plantillas/Escritores/EscritorProgresiones/EscritorProgresionTropa.php';
				break;
			case 'Comunidad':
				include_once 'Plantillas/Escritores/EscritorProgresiones/EscritorProgresionComunidad.php';
				break;
			case 'Clan':
				include_once 'Plantillas/Escritores/EscritorProgresiones/EscritorProgresionClan.php';
				break;
			default:
				include_once 'Plantillas/Escritores/EscritorProgresiones/EscritorProgresionGrupo.php';
				break;
		}
		break;
}?>
</div>
<?php
include_once 'Plantillas/CierrePagina.php';
?>