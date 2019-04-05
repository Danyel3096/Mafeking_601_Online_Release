<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-intendencia']) && !empty($_POST['Id-intendencia'])) {
	if (!is_nan($_POST['Id-intendencia']) && $_POST['Id-intendencia'] > 0) {
    	$id_intendencia = $_POST['Id-intendencia'];
    }
} else {
	$id_intendencia = '';
}
if(isset($_POST['Nombre-intendencia']) && !empty($_POST['Nombre-intendencia'])) {
	if (strlen($_POST['Nombre-intendencia']) >= 3 && strlen($_POST['Nombre-intendencia']) <= 60) {
		$nombre_intendencia = $_POST['Nombre-intendencia'];
	}
}
if(isset($_POST['Cantidad-intendencia']) && !empty($_POST['Cantidad-intendencia'])) {
	if (!is_nan($_POST['Cantidad-intendencia']) && $_POST['Cantidad-intendencia'] > 0) {
    	$cantidad_intendencia = $_POST['Cantidad-intendencia'];
    }
}
if(isset($_POST['Fecha-recibido']) && !empty($_POST['Fecha-recibido'])) {
	if (strlen($_POST['Fecha-recibido']) >= 3) {
		$fecha_recibido = $_POST['Fecha-recibido'];
	}
}
if(isset($_POST['Estado-intendencia']) && !empty($_POST['Estado-intendencia'])) {
	if (strlen($_POST['Estado-intendencia']) >= 3 && strlen($_POST['Estado-intendencia']) <= 60) {
		$estado_intendencia = $_POST['Estado-intendencia'];
	}
}
if(isset($_POST['Id-equipo']) && !empty($_POST['Id-equipo'])) {
	if (!is_nan($_POST['Id-equipo']) && $_POST['Id-equipo'] > 0) {
    	$id_equipo = $_POST['Id-equipo'];
    }
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}
switch ($accion) {
	case 'insertar-actualizar-intendencia':
		$sqlIAI = "INSERT INTO intendencia (Id, Nombre, Cantidad, Fecha_recibido, Estado, Id_equipo) VALUES ('$id_intendencia', '$nombre_intendencia', '$cantidad_intendencia', '$fecha_recibido', '$estado_intendencia', '$id_equipo') ON DUPLICATE KEY UPDATE Nombre='$nombre_intendencia', Cantidad='$cantidad_intendencia', Fecha_recibido='$fecha_recibido', Estado='$estado_intendencia', Id_equipo='$id_equipo'";
		$sentenciaIAI = $conexion -> prepare($sqlIAI);
		$respuestaIAI = $sentenciaIAI -> execute();
		echo $respuestaIAI;
		break;
	case 'tabla-intendencia':
		$sqlTI = "SELECT * FROM intendencia WHERE Id_equipo = '$id_equipo'";
		$sentenciaTI = $conexion -> prepare($sqlTI);
		$sentenciaTI -> execute();
		$intendencia = $sentenciaTI -> fetchAll(PDO::FETCH_ASSOC);
		if (!empty($intendencia)) {
			for ($i=0; $i < count($intendencia); $i++) {
				$arreglo["data"][] = $intendencia[$i];
			}
		} else {
			array_push($arreglo["data"][], '', '', '');
		}
		echo json_encode($arreglo);
		break;
}
?>