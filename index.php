<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/Modelos/Noticia.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/DAO/DAONoticia.php';
include_once 'App/Controladores/ControlSesion.php';
include_once 'App/Redireccion.php';

Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
$sesion_usuario = ControlSesion::sesionIniciada();

$componentes_url = parse_url($_SERVER['REQUEST_URI']);
$ruta = $componentes_url['path'];
$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);
$ruta_elegida = 'Vistas/404.php';

if($partes_ruta[0] == 'mafeking-601-online.herokuapp.com') {
	echo $partes_ruta[0];
	if(count($partes_ruta) == 1) {
		$ruta_elegida = 'Vistas/VistaPrincipal.php';
	} else if(count($partes_ruta) == 2) {
		switch ($partes_ruta[1]) {
			case 'Inicio_sesion':$ruta_elegida = 'Vistas/InicioSesion.php';
				break;
			case 'Cierre_sesion':$ruta_elegida = 'Vistas/CierreSesion.php';
				break;
			case 'Registro':$ruta_elegida = 'Vistas/VistaRegistro.php';
				break;
			case 'Gestor':
				if(!$sesion_usuario) {
					Redireccion :: redirigir(SERVIDOR);
				} else {
					$gestor_actual = '';
					$ruta_elegida = 'Vistas/VistaGestor.php';
				}
				break;
			case 'Perfil':$ruta_elegida = 'Vistas/VistaPerfil.php';
				break;
			case 'Grupo':$vista_actual = 'Grupo';
				$subvista_actual = '';
				$ruta_elegida = 'Vistas/VistaPaginas.php';
				break;
			case 'Noticias':$ruta_elegida = 'Vistas/Noticias.php';
				break;
			case 'Cronograma':
				if(!$sesion_usuario) {
					Redireccion :: redirigir(SERVIDOR);
				} else {
					$ruta_elegida = 'Vistas/VistaCronograma.php';
				}
				break;
			case 'Organigrama':$ruta_elegida = 'Vistas/VistaOrganigrama.php';
				break;
			case 'Progresiones':$vista_actual = 'Progresiones';
				$subvista_actual = '';
				$ruta_elegida = 'Vistas/VistaPaginas.php';
				break;
			case 'Relleno':$ruta_elegida = 'Vistas/Boot_relleno.php';
				break;
			case 'Recuperar_clave':$ruta_elegida = 'Vistas/RecuperaClave.php';
				break;
			case 'Recuperacion_clave':$ruta_elegida = 'Vistas/RecuperacionClave.php';
				break;
			case 'Generar_recuperador':$ruta_elegida='Scripts/GenerarRecuperador.php';
				break;
			case 'Buscar':$ruta_elegida='Vistas/Busqueda.php';
				break;
			default:
				$ruta_elegida = 'index.php';
				break;
		}
	} else if(count($partes_ruta) == 3) {
		if($partes_ruta[1] == 'Noticia') {
			$url = $partes_ruta[2];
			Conexion :: abrirConexion();
			$conexion = Conexion :: obtenerConexion();
			$noticia = DAONoticia :: consultarNoticiaPorUrl($conexion, $url);
			if($noticia != null) {
				$autor = DAOPersona :: consultarPersonaPorId($conexion, $noticia -> obtenerIdPersona());
				$noticias_aleatorias = DAONoticia :: consultarNoticiasAleatorias($conexion, 3);
				$ruta_elegida = 'Plantillas/Escritores/EscritorNoticia.php';
			}
		}
		if ($partes_ruta[1] == 'Gestor') {
			switch ($partes_ruta[2]) {
				case 'Almacen':$gestor_actual = 'Almacen';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Cargos':
					if(!$sesion_usuario) {
						Redireccion :: redirigir(SERVIDOR);
					} else {
						$gestor_actual = 'Cargos';
						$ruta_elegida = 'Vistas/VistaGestor.php';
					}
					break;
				case 'Comentarios':$gestor_actual = 'Comentarios';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Eventos':
					if(!$sesion_usuario) {
						Redireccion :: redirigir(SERVIDOR);
					} else {
						$gestor_actual = 'Eventos';
						$subgestor_actual = '';
						$ruta_elegida = 'Vistas/VistaGestor.php';
					}
					break;
				case 'Intendencia':$gestor_actual = 'Intendencia';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Noticias':
					if(!$sesion_usuario) {
						Redireccion :: redirigir(SERVIDOR);
					} else {
						$gestor_actual = 'Noticias';
						$subgestor_actual = '';
						$ruta_elegida = 'Vistas/VistaGestor.php';
					}
					break;
				case 'Organigrama':
					if(!$sesion_usuario) {
						Redireccion :: redirigir(SERVIDOR);
					} else {
						$gestor_actual = 'Organigrama';
						$ruta_elegida = 'Vistas/VistaGestor.php';
					}
					break;
				case 'Progresiones':
					if(!$sesion_usuario) {
						Redireccion :: redirigir(SERVIDOR);
					} else {
						$gestor_actual = 'Progresiones';
						$subgestor_actual = '';
						$ruta_elegida = 'Vistas/VistaGestor.php';
					}
					break;
				case 'Rama':
					if(!$sesion_usuario) {
						Redireccion :: redirigir(SERVIDOR);
					} else {
						$gestor_actual = 'Rama';
						$subgestor_actual = '';
						$ruta_elegida = 'Vistas/VistaGestor.php';
					}
					break;
				case 'Tesoreria':
					if(!$sesion_usuario) {
						Redireccion :: redirigir(SERVIDOR);
					} else {
						$gestor_actual = 'Tesoreria';
						$subgestor_actual = '';
						$ruta_elegida = 'Vistas/VistaGestor.php';
					}
					break;
				case 'Votaciones':$gestor_actual = 'Votaciones';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
			}
		}
		if ($partes_ruta[1] == 'Perfil') {
			if ($partes_ruta[2] == 'Editar') {
				if(!$sesion_usuario) {
					Redireccion :: redirigir(SERVIDOR);
				} else {
					$ruta_elegida = 'Vistas/VistaConfiguracion.php';
				}
			}
		}
		if ($partes_ruta[1] == 'Grupo') {
		 	switch ($partes_ruta[2]) {
				case 'Manada':$vista_actual = 'Grupo';
					$subvista_actual = 'Manada';
					$Titulo = 'Manada Brownsea | Grupo Scout Mafeking 601';
					$ruta_elegida = 'Vistas/VistaPaginas.php';
					break;
				case 'Tropa':$vista_actual = 'Grupo';
					$subvista_actual = 'Tropa';
					$Titulo = 'Tropa Mafeking | Grupo Scout Mafeking 601';
					$ruta_elegida = 'Vistas/VistaPaginas.php';
					break;
				case 'Comunidad':$vista_actual = 'Grupo';
					$subvista_actual = 'Comunidad';
					$Titulo = 'Comunidad Zulú | Grupo Scout Mafeking 601';
					$ruta_elegida = 'Vistas/VistaPaginas.php';
					break;
				case 'Clan':$vista_actual = 'Grupo';
					$subvista_actual = 'Clan';
					$Titulo = 'Clan 1 San Pablo | Grupo Scout Mafeking 601';
					$ruta_elegida = 'Vistas/VistaPaginas.php';
					break;
				default:
					$ruta_elegida = 'Vistas/VistaPaginas.php';
			}
		 }
		 if ($partes_ruta[1] == 'Progresiones') {
		 	switch ($partes_ruta[2]) {
				case 'Manada':$vista_actual = 'Progresiones';
					$subvista_actual = 'Manada';
					$ruta_elegida = 'Vistas/VistaPaginas.php';
					break;
				case 'Tropa':$vista_actual = 'Progresiones';
					$subvista_actual = 'Tropa';
					$ruta_elegida = 'Vistas/VistaPaginas.php';
					break;
				case 'Comunidad':$vista_actual = 'Progresiones';
					$subvista_actual = 'Comunidad';
					$ruta_elegida = 'Vistas/VistaPaginas.php';
					break;
				case 'Clan':$vista_actual = 'Progresiones';
					$subvista_actual = 'Clan';
					$ruta_elegida = 'Vistas/VistaPaginas.php';
					break;
				default:
					$ruta_elegida = 'Vistas/VistaPaginas.php';
			}
		}
		if ($partes_ruta[1] == 'Recuperacion_clave') {
			$enlace_web_personal = $partes_ruta[2];
			$ruta_elegida = 'Vistas/RecuperacionClave.php';
		}
	} else if (count($partes_ruta) == 4) {
		if ($partes_ruta[2] == 'Tesoreria') {
			switch ($partes_ruta[3]) {
				case 'Inscripcion':$gestor_actual = 'Tesoreria';
					$subgestor_actual = 'Inscripcion';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Registro':$gestor_actual = 'Tesoreria';
					$subgestor_actual = 'Registro';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Detalle':$gestor_actual = 'Tesoreria';
					$subgestor_actual = 'Detalle';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
			}
		} else if ($partes_ruta[2] == 'Progresiones') {
			switch ($partes_ruta[3]) {
				case 'Ejes':$gestor_actual = 'Progresiones';
					$subgestor_actual = 'Ejes';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Especialidades':$gestor_actual = 'Progresiones';
					$subgestor_actual = 'Especialidades';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Requisitos':$gestor_actual = 'Progresiones';
					$subgestor_actual = 'Requisitos';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Seguimiento':$gestor_actual = 'Progresiones';
					$subgestor_actual = 'Seguimiento';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
			}
		} else if ($partes_ruta[2] == 'Eventos') {
			switch ($partes_ruta[3]) {
				case 'Calendario':$gestor_actual = 'Eventos';
					$subgestor_actual = 'Calendario';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
			}
		} else if ($partes_ruta[2] == 'Rama') {
			switch ($partes_ruta[3]) {
				case 'Historia':$gestor_actual = 'Rama';
					$subgestor_actual = 'Historia';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Fundamentos':$gestor_actual = 'Rama';
					$subgestor_actual = 'Fundamentos';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
				case 'Participaciones':$gestor_actual = 'Rama';
					$subgestor_actual = 'Participaciones';
					$ruta_elegida = 'Vistas/VistaGestor.php';
					break;
			}
		}
	}
}
include_once $ruta_elegida;
?>
