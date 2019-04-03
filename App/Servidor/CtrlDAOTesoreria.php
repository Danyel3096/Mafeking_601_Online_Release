<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id']) && !empty($_POST['Id'])) {
	if (!is_nan($_POST['Id']) && $_POST['Id'] > 0) {
		$id = $_POST['Id'];
	}
} else {
	$id = '';
}
if(isset($_POST['Id-tesoreria']) && !empty($_POST['Id-tesoreria'])) {
	$id_tesoreria = $_POST['Id-tesoreria'];
} else {
	$id_tesoreria = '';
}
if(isset($_POST['Detalle']) && !empty($_POST['Detalle'])) {
	if (strlen($_POST['Detalle']) >= 1 && strlen($_POST['Detalle']) <= 100) {
		$detalle = $_POST['Detalle'];
	}
}
if(isset($_POST['Periodicidad']) && !empty($_POST['Periodicidad'])) {
	if (strlen($_POST['Periodicidad']) >= 1 && strlen($_POST['Periodicidad']) <= 50) {
		$periodicidad = $_POST['Periodicidad'];
	}
}
if(isset($_POST['Fecha_inicio']) && !empty($_POST['Fecha_inicio'])) {
	$fecha_inicio = $_POST['Fecha_inicio'];
}
if(isset($_POST['Fecha_fin']) && !empty($_POST['Fecha_fin'])) {
	$fecha_fin = $_POST['Fecha_fin'];
}
if(isset($_POST['Valor']) && !empty($_POST['Valor'])) {
	if (!is_nan($_POST['Valor']) && $_POST['Valor'] > 0) {
		$valor = $_POST['Valor'];
	}
}

if(isset($_POST['Id-inscripcion'])) {
	$id_inscripcion = $_POST['Id-inscripcion'];
}
if(isset($_POST['Id-persona-inscripcion'])) {
	$id_persona_inscripcion = $_POST['Id-persona-inscripcion'];
}
if(isset($_POST['Id-persona'])) {
	$id_persona = $_POST['Id-persona'];
}

if(isset($_POST['Id-rama'])) {
	$id_rama = $_POST['Id-rama'];
}
if(isset($_POST['Abono'])) {
	$abono = $_POST['Abono'];
}

if(isset($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}

switch ($accion) {
	case 'insertar-actualizar-detalle':
		$ids_tesoreria = explode(",", $id_tesoreria);
		$lista_abonos = explode(",", $abono);
		for ($i=0; $i < count($ids_tesoreria); $i++) {
			$sql = "INSERT INTO detalle_tesoreria (Id_persona, Id_tesoreria, Abono) VALUES ('$id_persona', '$ids_tesoreria[$i]', '$lista_abonos[$i]') ON DUPLICATE KEY UPDATE Abono = '$lista_abonos[$i]'";
			$sentencia = $conexion -> prepare($sql);
			$respuesta = $sentencia -> execute();
			if ($respuesta) {
				//$sqlT = "INSERT INTO Control_cambios(Numero_documento, Nombre_completo, Fecha_hora, Cambio, Nombre_tabla, Nombre_columna, Id_fila) VALUES('$documento','$nombre_completo', NOW(), 'Inserción', 'Tesoreria', 'Abono','$numero_documento') ON DUPLICATE KEY UPDATE Cambio = 'Actualización'";
				//$sentenciaT = $conexion -> prepare($sqlT);
				//$sentenciaT -> execute();
			}
		}
		echo $respuesta;
		break;
	case 'insertar-actualizar-tesoreria':
		$sql = "INSERT INTO tesoreria (Id, Detalle, Fecha_inicio, Fecha_fin, Valor, Periodicidad) VALUES ('$id', '$detalle', '$fecha_inicio', '$fecha_fin', '$valor', '$periodicidad') ON DUPLICATE KEY UPDATE Detalle = '$detalle', Fecha_inicio = '$fecha_inicio', Fecha_fin = '$fecha_fin', Valor = '$valor', Periodicidad = '$periodicidad'";
		$sentencia = $conexion -> prepare($sql);
		$resultado = $sentencia -> execute();
		echo $resultado;
		break;
	case 'borrar-tesoreria':
		$sql3 = "DELETE FROM tesoreria WHERE Id = '$id' AND Id_rama = '$id_rama'";
		$sentencia3 = $conexion -> prepare($sql3);
		$resultado = $sentencia3 -> execute();
		echo $resultado;
		break;
	case 'tabla-tesoreria':
		$id_ramas = explode(",", $id_rama);
		foreach ($id_ramas as &$id_rama_tesoreria) {
			$sql4 = "SELECT Id, Detalle, Periodicidad, Fecha_inicio, Fecha_fin, Valor FROM tesoreria";
			$sentencia4 = $conexion -> prepare($sql4);
			$sentencia4 -> execute();
			$resultado = $sentencia4 -> fetchAll(PDO::FETCH_ASSOC);
			if (!empty($resultado) && !is_null($resultado)) {
				for ($i=0; $i < count($resultado); $i++) {
			  		$arreglo["data"][] = $resultado[$i];
				}
			} else {
				$arreglo["data"][] = '';
			}
		}
			echo json_encode($arreglo);
		break;
	case 'insertar-actualizar-inscripcion':
		$sql = "INSERT INTO detalle_tesoreria (Id_persona, Id_tesoreria, Abono) VALUES ('$id_persona_inscripcion', '$id_inscripcion', '$abono') ON DUPLICATE KEY UPDATE Abono = '$abono'";
		$sentencia = $conexion -> prepare($sql);
		$respuesta = $sentencia -> execute();
		echo $respuesta;
		break;
	case 'tabla-inscripcion':
		$sqlTI = "SELECT p.Id, p.Nombres, p.Apellidos, dt.Abono, t.Valor AS Valor_inscripcion, t.Id AS Id_tesoreria FROM personas p LEFT JOIN ramas r ON r.Id = '$id_rama' LEFT JOIN equipos eq ON eq.Id_rama = r.Id LEFT JOIN detalle_cargos dc ON eq.Id = dc.Id_equipo LEFT JOIN detalle_tesoreria dt ON dt.Id_persona = p.Id AND dt.Id_tesoreria = 1 LEFT JOIN tesoreria t ON t.Id = 1 WHERE dc.Id_persona = p.Id";
		$sentenciaTI = $conexion -> prepare($sqlTI);
		$sentenciaTI -> execute();
		$personas_rama_inscripcion = $sentenciaTI -> fetchAll(PDO::FETCH_ASSOC);

		if (count($personas_rama_inscripcion) > 0) {
			for ($i=0; $i < count($personas_rama_inscripcion); $i++) {
				if (empty($personas_rama_inscripcion[$i]['Abono'])) {
					$personas_rama_inscripcion[$i]['Abono'] = '0';
					$arreglo["data"][] = $personas_rama_inscripcion[$i];
				} else {
					$arreglo["data"][] = $personas_rama_inscripcion[$i];
				}
			}
		} else {
			$arreglo["data"][] = '';
		}

		echo json_encode($arreglo);
		break;
	case 'tabla-detalle':
		$sql4 = "SELECT p.Id, p.Nombres, p.Apellidos, dt.Abono, t.Valor, t.Id AS Id_tesoreria FROM personas p LEFT JOIN ramas r ON r.Id = '$id_rama' LEFT JOIN equipos eq ON eq.Id_rama = r.Id LEFT JOIN detalle_cargos dc ON eq.Id = dc.Id_equipo LEFT JOIN detalle_tesoreria dt ON dt.Id_persona = p.Id AND dt.Id_tesoreria = 2 LEFT JOIN tesoreria t ON t.Id = 2 WHERE dc.Id_persona = p.Id";
		$sentencia4 = $conexion -> prepare($sql4);
		$sentencia4 -> execute();
		$personas_rama = $sentencia4 -> fetchAll(PDO::FETCH_ASSOC);

		for ($i=0; $i < count($personas_rama); $i++) {
			$arreglo["data"][] = $personas_rama[$i];
		}
		echo json_encode($arreglo);
		break;
	case 'tabla-detalle-persona':
		$sql4 = "SELECT t.Id AS Id_tesoreria, t.Detalle, dt.Abono, t.Valor FROM tesoreria t LEFT JOIN detalle_tesoreria dt ON dt.Id_persona = '$id_persona' AND dt.Id_tesoreria = t.Id WHERE t.Id != 1";
		$sentencia4 = $conexion -> prepare($sql4);
		$sentencia4 -> execute();
		$detalle_persona_rama = $sentencia4 -> fetchAll(PDO::FETCH_ASSOC);

		for ($i=0; $i < count($detalle_persona_rama); $i++) {
			if (empty($detalle_persona_rama[$i]['Abono'])) {
				$detalle_persona_rama[$i]['Abono'] = '0';
			}
			echo "<tr>";
			echo "<input type='hidden' name='id-tesoreria-detalle' value='".$detalle_persona_rama[$i]['Id_tesoreria']."' />";
			echo "<td>".$detalle_persona_rama[$i]['Detalle']."</td>";
			echo "<td><input type='number' name='abono-detalle-persona' value='".$detalle_persona_rama[$i]['Abono']."' /></td>";
			echo "<td>".$detalle_persona_rama[$i]['Valor']."</td>";
			echo "<tr>";
		}
		break;
}
?>