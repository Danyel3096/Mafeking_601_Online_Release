<?php
$Titulo = 'Gestor | Grupo Scout Mafeking 601';
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
include_once 'Plantillas/InicioGestor.php';

if(ControlSesion :: sesionIniciada()) {
	Conexion :: abrirConexion();
	$id = $_SESSION['id'];
	$persona = DAOPersona :: consultarPersonaPorId(Conexion::obtenerConexion(), $id);
}

switch($gestor_actual) {
	case '':
		include_once 'Plantillas/Gestores/GestorGenerico.php';
		break;
	case 'Acudientes':
		include_once 'Plantillas/Gestores/GestorAcudiente.php';
		break;
	case 'Centro_educativo':
		include_once 'Plantillas/Gestores/GestorCentroEducativo.php';
		break;
	case 'Ficha_medica':
		include_once 'Plantillas/Gestores/GestorFichaMedica.php';
		break;
	case 'Hoja_de_vida':
		include_once 'Plantillas/Gestores/GestorHojaVida.php';
		break;
	case 'Personal':
		include_once 'Plantillas/Gestores/GestorPersona.php';
		break;
	case 'Residencia':
		include_once 'Plantillas/Gestores/GestorResidencia.php';
		break;

	case'Almacen':
		include_once 'Plantillas/Gestores/GestorAlmacen.php';
		break;
		case'Cargos':
		include_once 'Plantillas/Gestores/GestorCargo.php';
		break;
	case'Comentarios':
		include_once 'Plantillas/Gestores/GestorComentario.php';
		break;
	case'Eventos':
		switch ($subgestor_actual) {
			case 'Calendario':
				include_once 'Plantillas/Gestores/GestorEvento/GestorEventoCalendario.php';
				break;
			default:
				include_once 'Plantillas/Gestores/GestorEvento/GestorEvento.php';
				break;
		}
		break;
	case 'Intendencia':
		include_once 'Plantillas/Gestores/GestorIntendencia.php';
		break;
	case 'Noticias':
		include_once 'Plantillas/Gestores/GestorNoticia.php';
		break;
	case 'Organigrama':
		include_once 'Plantillas/Gestores/GestorOrganigrama.php';
		break;
	case 'Progresiones':
		switch ($subgestor_actual) {
			case 'Ejes':
				include_once 'Plantillas/Gestores/GestorProgresion/GestorEjesProgresion.php';
				break;
			case 'Especialidades':
				include_once 'Plantillas/Gestores/GestorProgresion/GestorEspecialidadesProgresion.php';
				break;
			case 'Requisitos':
				include_once 'Plantillas/Gestores/GestorProgresion/GestorRequisitosProgresion.php';
				break;
			case 'Seguimiento':
				include_once 'Plantillas/Gestores/GestorProgresion/GestorSeguimientoProgresion.php';
				break;
			default:
				include_once 'Plantillas/Gestores/GestorProgresion/GestorProgresion.php';
				break;
		}
		break;
	case 'Rama':
		switch ($subgestor_actual) {
			case 'Historia':
				include_once 'Plantillas/Gestores/GestorRama/GestorHistoriaRama.php';
				break;
			case 'Fundamentos':
				include_once 'Plantillas/Gestores/GestorRama/GestorFundamentosRama.php';
				break;
			case 'Participaciones':
				include_once 'Plantillas/Gestores/GestorRama/GestorParticipacionesRama.php';
				break;
			default:
				include_once 'Plantillas/Gestores/GestorRama/GestorRama.php';
				break;
		}
		break;
	case 'Tesoreria':
		switch ($subgestor_actual) {
			case 'Inscripcion':
				include_once 'Plantillas/Gestores/GestorTesoreria/GestorInscripcionTesoreria.php';
				break;
			case 'Registro':
				include_once 'Plantillas/Gestores/GestorTesoreria/GestorRegistroTesoreria.php';
				break;
			case 'Detalle':
				include_once 'Plantillas/Gestores/GestorTesoreria/GestorDetalleTesoreria.php';
				break;
			default:
				include_once 'Plantillas/Gestores/GestorTesoreria/GestorTesoreria.php';
				break;
		}
		break;
	case 'Votaciones':
		include_once 'Plantillas/Gestores/GestorVotacion.php';
		break;
}

include_once 'Plantillas/CierreGestor.php';
include_once 'Plantillas/CierrePagina.php';
?>