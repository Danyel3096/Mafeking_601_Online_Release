<?php
include_once '../Conexion.php';
include_once '../Configuracion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-persona'])) {
	if (!is_nan($_POST['Id-persona']) && $_POST['Id-persona'] >= 0) {
		$id_persona = $_POST['Id-persona'];
	}
}
if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}

switch ($accion) {
	case 'pendientes-persona':
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
			$hoja_vida->Enlace = RUTA_INFO_HV;
			$hoja_vida->Texto = 'Registra tu hoja de vida';
			array_push($tareas, $hoja_vida);
		} else if (empty($hoja_vida['Foto'])) {
			$foto_perfil = new stdClass();
			$foto_perfil->Enlace = RUTA_INFO_PERSONAL;
			$foto_perfil->Texto = 'Sube tu foto de perfil';
			array_push($tareas, $foto_perfil);
		}
		if (!$ficha_medica) {
			$ficha_medica = new stdClass();
			$ficha_medica->Enlace = RUTA_INFO_FM;
			$ficha_medica->Texto = 'Registra tu ficha medica';
			array_push($tareas, $ficha_medica);
		}
		if (!$hoja_vida && !$ficha_medica) {
			echo $opcion1 = "<li>Sin tareas ¡Bien hecho!</li>";
		} else if ($hoja_vida) {
			for ($i=0; $i < count($tareas); $i++) {
				echo $opcion1 = "<li><a href='".$tareas[$i] -> Enlace."'>".$tareas[$i] -> Texto."</a></li>";
			}
		}
		break;
	case 'inscripcion-persona':
		$sqlIP = "SELECT t.Valor as Valor, dt.Abono as Abono, t.Detalle as Detalle FROM tesoreria t, detalle_tesoreria dt WHERE t.Id = 1 AND dt.Id_tesoreria = 1 AND dt.Id_persona = '$id_persona'";
		$sentenciaIP = $conexion -> prepare($sqlIP);
		$sentenciaIP -> execute();
		$inscripcion = $sentenciaIP -> fetch(PDO::FETCH_ASSOC);
		if (!$inscripcion) {
			$claves = array('Valor', 'Abono', 'Detalle');
			$valores = array(0, 0, 'Inscripcion 2019');
			$resultado = array_combine($claves, $valores);
		} else {
			$resultado = $inscripcion;
		}
		echo json_encode($resultado);
		break;
	case 'progresion-persona':
		$sqlPP = "SELECT es.Nombre AS Especialidad, COUNT(DISTINCT dp.Id_requisito) AS Cumplidos, (SELECT COUNT(Id) AS Total FROM Requisitos WHERE Id_especialidad = (SELECT DISTINCT Id_especialidad AS Total FROM detalle_progresiones WHERE Id_persona = '$id_persona')) AS Total ";
    	$sqlPP .= "FROM Especialidades es, detalle_progresiones dp ";
    	$sqlPP .= "WHERE es.Id = dp.Id_especialidad AND dp.Id_persona = '$id_persona' ";
    	$sqlPP .= "ORDER BY es.Nombre DESC LIMIT 1";
		$sentenciaPP = $conexion -> prepare($sqlPP);
		$sentenciaPP -> execute();
		$progresion = $sentenciaPP -> fetch(PDO::FETCH_ASSOC);
		if (!$progresion) {
			$claves = array('Valor', 'Abono', 'Detalle');
			$valores = array(0, 0, 'Inscripcion 2019');
			$resultado = array_combine($claves, $valores);
		} else {
			$resultado = $progresion;
		}
		echo json_encode($resultado);
		break;
	case 'fondo-persona':
		$sqlFP = "SELECT Fondo FROM hojas_vida WHERE Id = '$id_persona'";
		$sentenciaFP = $conexion -> prepare($sqlFP);
		$sentenciaFP -> execute();
		$fondo = $sentenciaFP -> fetch(PDO::FETCH_ASSOC);
		echo json_encode($fondo);
		break;
	case 'foto-persona':
		$sqlFP = "SELECT Foto FROM hojas_vida WHERE Id = '$id_persona'";
		$sentenciaFP = $conexion -> prepare($sqlFP);
		$sentenciaFP -> execute();
		$foto = $sentenciaFP -> fetch(PDO::FETCH_ASSOC);
		echo json_encode($foto);
		break;
}
?>