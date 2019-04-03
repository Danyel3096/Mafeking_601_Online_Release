<?php
include_once '../Conexion.php';
include_once '../Configuracion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-evento-participacion'])) {
	$id_evento_participacion = $_POST['Id-evento-participacion'];
} else {
	$id_evento_participacion = "";
}
if(isset($_POST['Url'])) {
	$url = $_POST['Url'];
} else {
	$url = "";
}
if(isset($_POST['Creditos-url'])) {
	$creditos_url = $_POST['Creditos-url'];
}
if(isset($_POST['Pie-url'])) {
	$pie_url = $_POST['Pie-url'];
}
if(isset($_POST['Fecha-inicio'])) {
	$fecha_inicio = $_POST['Fecha-inicio'];
}
if(isset($_POST['Fecha-fin'])) {
	$fecha_fin = $_POST['Fecha-fin'];
}
if(isset($_POST['Titulo-evento'])) {
	$titulo_evento = $_POST['Titulo-evento'];
}
if(isset($_POST['Resumen-evento'])) {
	$resumen_evento = $_POST['Resumen-evento'];
}
if(isset($_POST['Id-rama'])) {
	$id_rama = $_POST['Id-rama'];
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}

switch ($accion) {
	case 'tabla-participaciones':
		$sqlTP = "SELECT * FROM participaciones WHERE Id_rama = '$id_rama'";
		$sentenciaTP = $conexion -> prepare($sqlTP);
		$sentenciaTP -> execute();
		$participaciones = $sentenciaTP -> fetchAll(PDO::FETCH_ASSOC);

		for ($i=0; $i < count($participaciones); $i++) {
            $arreglo["data"][] = $participaciones[$i];
        }
		echo json_encode($arreglo);
		break;
	case 'insertar-actualizar-participacion':
		$sqlIAP = "INSERT INTO participaciones (Id, Url, Creditos_url, Pie_url, Fecha_inicio, Fecha_fin, Titulo_evento, Resumen_evento, Id_rama) VALUES ('$id_evento_participacion', '$url', '$creditos_url', '$pie_url', '$fecha_inicio', '$fecha_fin', '$titulo_evento', '$resumen_evento', '$id_rama') ON DUPLICATE KEY UPDATE Url = '$url', Creditos_url = '$creditos_url', Pie_url = '$pie_url', Fecha_inicio = '$fecha_inicio', Fecha_fin = '$fecha_fin', Titulo_evento = '$titulo_evento', Resumen_evento = '$resumen_evento'";
		$sentenciaIAP = $conexion -> prepare($sqlIAP);
		$resultadoIAP = $sentenciaIAP -> execute();
		echo $resultadoIAP;
		break;
	case 'linea-tiempo':
		$sqlP = "SELECT Id, Url, Creditos_url, Pie_url, Fecha_inicio, Fecha_fin, Titulo_evento, Resumen_evento FROM participaciones WHERE Id_rama = '$id_rama'";
		$sentenciaP = $conexion -> prepare($sqlP);
		$sentenciaP -> execute();
		$participaciones = $sentenciaP -> fetchAll(PDO::FETCH_ASSOC);

		for ($i=0; $i < count($participaciones); $i++) {
			$elemento_media['url'] = $participaciones[$i]['Url'];
			$elemento_media['caption'] = $participaciones[$i]['Pie_url'];
			$elemento_media['credit'] = $participaciones[$i]['Creditos_url'];
			$participaciones[$i]['media'] = $elemento_media;
			unset($participaciones[$i]['Url'], $participaciones[$i]['Pie_url'], $participaciones[$i]['Creditos_url']);
			$arreglo_fecha_inicio = explode("-", $participaciones[$i]['Fecha_inicio']);
			$elemento_inicio['year'] = $arreglo_fecha_inicio[0];
			$elemento_inicio['month'] = $arreglo_fecha_inicio[1];
			$elemento_inicio['day'] = $arreglo_fecha_inicio[2];
			$participaciones[$i]['start_date'] = $elemento_inicio;
			unset($participaciones[$i]['Fecha_inicio']);
			$arreglo_fecha_fin = explode("-", $participaciones[$i]['Fecha_fin']);
			$elemento_fin['year'] = $arreglo_fecha_fin[0];
			$elemento_fin['month'] = $arreglo_fecha_fin[1];
			$elemento_fin['day'] = $arreglo_fecha_fin[2];
			$participaciones[$i]['end_date'] = $elemento_fin;
			unset($participaciones[$i]['Fecha_fin']);
			$elemento_text['headline'] = $participaciones[$i]['Titulo_evento'];
			$elemento_text['text'] = $participaciones[$i]['Resumen_evento'];
			$participaciones[$i]['text'] = $elemento_text;
			unset($participaciones[$i]['Titulo_evento'], $participaciones[$i]['Resumen_evento']);
			$arreglo['events'][] = $participaciones[$i];
		}
		echo json_encode($arreglo);
		break;
}
?>