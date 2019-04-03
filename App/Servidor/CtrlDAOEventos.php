<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-evento']) && !empty($_POST['Id-evento'])) {
	if (!is_nan($_POST['Id-evento']) && $_POST['Id-evento'] > 0) {
		$id_evento = $_POST['Id-evento'];
	}
} else {
	$id_evento = '';
}
if(isset($_POST['Nombre-evento']) && !empty($_POST['Nombre-evento'])) {
	if (strlen($_POST['Nombre-evento']) >= 3 && strlen($_POST['Nombre-evento']) <= 50) {
		$nombre_evento = $_POST['Nombre-evento'];
	}
}
if(isset($_POST['Fecha-inicio-evento']) && !empty($_POST['Fecha-inicio-evento'])) {
	if (strlen($_POST['Fecha-inicio-evento']) >= 3 && strlen($_POST['Fecha-inicio-evento']) <= 50) {
		$fecha_inicio_evento = $_POST['Fecha-inicio-evento'];
	}
}
if(isset($_POST['Fecha-fin-evento']) && !empty($_POST['Fecha-fin-evento'])) {
	if (strlen($_POST['Fecha-fin-evento']) >= 3 && strlen($_POST['Fecha-fin-evento']) <= 50) {
		$fecha_fin_evento = $_POST['Fecha-fin-evento'];
	}
}
if(isset($_POST['Tipo-evento']) && !empty($_POST['Tipo-evento'])) {
	if (strlen($_POST['Tipo-evento']) >= 3 && strlen($_POST['Tipo-evento']) <= 50) {
		$tipo_evento = $_POST['Tipo-evento'];
	}
}
if(isset($_POST['Sitio-evento']) && !empty($_POST['Sitio-evento'])) {
	if (strlen($_POST['Sitio-evento']) >= 3 && strlen($_POST['Sitio-evento']) <= 50) {
		$sitio_evento = $_POST['Sitio-evento'];
	}
}
if(isset($_POST['Fecha-encuentro']) && !empty($_POST['Fecha-encuentro'])) {
	if (strlen($_POST['Fecha-encuentro']) >= 3 && strlen($_POST['Fecha-encuentro']) <= 50) {
		$fecha_encuentro = $_POST['Fecha-encuentro'];
	}
} else {
	$fecha_encuentro = '';
}
if(isset($_POST['Hora-encuentro']) && !empty($_POST['Hora-encuentro'])) {
	if (strlen($_POST['Hora-encuentro']) >= 1 && strlen($_POST['Hora-encuentro']) <= 10) {
		$hora_encuentro = $_POST['Hora-encuentro'];
	}
} else {
	$hora_encuentro = '';
}
if(isset($_POST['Punto-encuentro']) && !empty($_POST['Punto-encuentro'])) {
	if (strlen($_POST['Punto-encuentro']) >= 3 && strlen($_POST['Punto-encuentro']) <= 50) {
		$punto_encuentro = $_POST['Punto-encuentro'];
	}
} else {
	$punto_encuentro = '';
}
if(isset($_POST['Costo-evento']) && !empty($_POST['Costo-evento'])) {
	if (!is_nan($_POST['Costo-evento']) && $_POST['Costo-evento'] > 0) {
		$costo_evento = $_POST['Costo-evento'];
	}
} else {
	$costo_evento = '';
}
if(isset($_POST['Color-texto-evento']) && !empty($_POST['Color-texto-evento'])) {
	if (strlen($_POST['Color-texto-evento']) >= 3 && strlen($_POST['Color-texto-evento']) <= 10) {
		$color_texto_evento = $_POST['Color-texto-evento'];
	}
}
if(isset($_POST['Color-evento']) && !empty($_POST['Color-evento'])) {
	if (strlen($_POST['Color-evento']) >= 3 && strlen($_POST['Color-evento']) <= 10) {
		$color_evento = $_POST['Color-evento'];
	}
}
if(isset($_POST['Id-rama-evento']) && !empty($_POST['Id-rama-evento'])) {
	if (!is_nan($_POST['Id-rama-evento']) && $_POST['Id-rama-evento'] > 0) {
		$id_rama_evento = $_POST['Id-rama-evento'];
	}
}


if(isset($_POST['Fecha-inicial-mes']) && !empty($_POST['Fecha-inicial-mes'])) {
	if (strlen($_POST['Fecha-inicial-mes']) >= 3 && strlen($_POST['Fecha-inicial-mes']) <= 50) {
		$fecha_inicial_mes = $_POST['Fecha-inicial-mes'];
	}
}
if(isset($_POST['Fecha-final-mes']) && !empty($_POST['Fecha-final-mes'])) {
	if (strlen($_POST['Fecha-final-mes']) >= 3 && strlen($_POST['Fecha-final-mes']) <= 50) {
		$fecha_final_mes = $_POST['Fecha-final-mes'];
	}
}

if(isset($_POST['Id-persona-evento']) && !empty($_POST['Id-persona-evento'])) {
	if (!is_nan($_POST['Id-persona-evento']) && $_POST['Id-persona-evento'] > 0) {
		$id_persona = $_POST['Id-persona-evento'];
	}
}
if(isset($_POST['Respuesta-asistencia']) && !empty($_POST['Respuesta-asistencia'])) {
	if (strlen($_POST['Respuesta-asistencia']) == 2 || strlen($_POST['Respuesta-asistencia']) == 3) {
		$respuesta_asistencia = $_POST['Respuesta-asistencia'];
	}
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}
switch ($accion) {
	case 'insertar-actualizar-evento':
		$sql = "INSERT INTO eventos (Id, Nombre, Insignia, Fecha_inicio, Fecha_fin, Tipo, Sitio, Fecha_encuentro, Hora_encuentro, Punto_encuentro, Costo, Ficha, Color, Color_texto, Id_rama) VALUES ('$id_evento', '$nombre_evento', '', '$fecha_inicio_evento', '$fecha_fin_evento', '$tipo_evento', '$sitio_evento', '$fecha_encuentro', '$hora_encuentro', '$punto_encuentro', '$costo_evento', '', '$color_evento', '$color_texto_evento', '$id_rama_evento') ON DUPLICATE KEY UPDATE Nombre='$nombre_evento', Fecha_inicio='$fecha_inicio_evento', Fecha_fin='$fecha_fin_evento', Tipo='$tipo_evento', Sitio='$sitio_evento', Fecha_encuentro='$fecha_encuentro', Hora_encuentro='$hora_encuentro', Punto_encuentro='$punto_encuentro', Costo='$costo_evento'";
		$sentencia = $conexion -> prepare($sql);
		$respuesta = $sentencia -> execute();
		echo $respuesta;
		break;
	case 'eliminar':
		$respuesta = false;
		if (isset($_POST['Id'])) {
			$sql = "DELETE FROM Eventos WHERE Id = :Id";
			$sentencia = $conexion -> prepare($sql);
			$respuesta = $sentencia -> execute(array('Id'=>$_POST['Id']));
		}
		echo json_encode($respuesta);
		break;
	case 'eventos-mes':
		$sql = "SELECT Id, Nombre AS title, Insignia, Fecha_inicio AS start, Fecha_fin AS end, Tipo, Sitio, Fecha_encuentro, Hora_encuentro, Punto_encuentro, Costo, Costo_incluye, Material_individual, Material_equipos, Ficha, Color AS color, Color_texto AS textColor FROM eventos WHERE (Fecha_inicio BETWEEN '$fecha_inicial_mes' AND '$fecha_final_mes') AND (Fecha_fin BETWEEN '$fecha_inicial_mes' AND '$fecha_final_mes') AND Id_rama = '$id_rama_evento'";
		$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$resultado = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($resultado);
		break;
	case 'insertar-actualizar-asistencia':
		$sqlIAA = "INSERT INTO detalle_participantes (Id_evento, Id_persona, Respuesta) VALUES ('$id_evento', '$id_persona', '$respuesta_asistencia') ON DUPLICATE KEY UPDATE Respuesta = '$respuesta_asistencia'";
		$sentenciaIAA = $conexion -> prepare($sqlIAA);
		$resultadoIAA = $sentenciaIAA -> execute();
		echo $resultadoIAA;
		break;
	case 'comprobar-asistencia':
		$sql = "SELECT Respuesta FROM detalle_participantes WHERE Id_evento = '$id_evento' AND Id_persona = '$id_persona'";
		$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$resultado = $sentencia -> fetch(PDO::FETCH_ASSOC);
		echo $resultado['Respuesta'];
		break;
	case 'listar-participantes-evento':
		$sqlDP = "SELECT dp.Id_persona, p.Nombres, p.Apellidos, dp.Respuesta FROM detalle_participantes dp LEFT JOIN personas p ON dp.Id_persona = p.Id WHERE Id_evento = '$id_evento'";
		$sentenciaDP = $conexion -> prepare($sqlDP);
		$sentenciaDP -> execute();
		$participantes_evento = $sentenciaDP -> fetchAll(PDO::FETCH_ASSOC);

		if (count($participantes_evento) == 0) {
			echo "<tr>";
			echo "<td colspan='5'>No hay personas para este evento</td>";
			echo "</tr>";
		} else {
			for ($i=0, $pos=1; $i < count($participantes_evento); $i++, $pos++) {
				echo "<tr>";
				echo "<td>".$pos."</td>";
				echo "<td>".$participantes_evento[$i]['Nombres']."</td>";
				echo "<td>".$participantes_evento[$i]['Apellidos']."</td>";
				echo "<td>".$participantes_evento[$i]['Respuesta']."</td>";
				echo "<td><button name='btn-borrar-participante' type='submit' id='".$participantes_evento[$i]['Id_persona']."' class='btn btn-danger btn-icono' value='$id_evento'><i class='far fa-trash-alt'></i></button></td>";
				echo "<tr>";
			}
		}
		break;
		case 'eliminar-participante-evento':
			$sql = "DELETE FROM detalle_participantes WHERE Id_persona = '$id_persona' AND Id_evento = '$id_evento'";
			$sentencia = $conexion -> prepare($sql);
			$respuestaEPE = $sentencia -> execute();

			echo $respuestaEPE;
			break;
	default:
		$sql = "SELECT Id, Nombre AS title, Insignia, Fecha_inicio AS start, Fecha_fin AS end, Tipo, Sitio, Fecha_encuentro, Hora_encuentro, Punto_encuentro, Costo, Costo_incluye, Material_individual, Material_equipos, Ficha, Color AS color, Color_texto AS textColor FROM eventos WHERE Id_rama = '$id_rama_evento'";
		$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$resultado = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($resultado);
		break;
	case 'comprobar-ficha-medica-hoja-vida':
		$sql1 = "SELECT * FROM hojas_vida WHERE Id = '$id_persona'";
		$sentencia1 = $conexion -> prepare($sql1);
		$sentencia1 -> execute();
		$hoja_vida = $sentencia1 -> fetch(PDO::FETCH_ASSOC);

		$sql2 = "SELECT * FROM Fichas_medicas WHERE Id = '$id_persona'";
		$sentencia2 = $conexion -> prepare($sql2);
		$sentencia2 -> execute();
		$ficha_medica = $sentencia2 -> fetch(PDO::FETCH_ASSOC);
		$tareas = array();
		if (!$hoja_vida) {
			$hoja_vida = new stdClass();
			$hoja_vida->Estado = 'Hoja de vida';
			array_push($tareas, $hoja_vida);
		} else if (empty($hoja_vida['Foto'])) {
			$foto_perfil = new stdClass();
			$foto_perfil->Estado = 'Foto perfil';
			array_push($tareas, $foto_perfil);
		}
		if (!$ficha_medica) {
			$ficha_medica = new stdClass();
			$ficha_medica->Estado = 'Ficha medica';
			array_push($tareas, $ficha_medica);
		}
		echo json_encode($tareas);
		break;
}
?>