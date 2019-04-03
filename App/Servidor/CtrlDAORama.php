<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-rama'])){
    $id_rama = $_POST['Id-rama'];
}
if(isset($_POST['nombre_completo'])) {
	$nombre_completo = $_POST['nombre_completo'];
}
if(isset($_POST['numero_documento'])) {
	$documento = $_POST['numero_documento'];
}

if(isset($_POST['Historia-rama'])) {
	$historia = $_POST['Historia-rama'];
}
if(isset($_POST['Ley-rama'])) {
	$ley = $_POST['Ley-rama'];
}
if(isset($_POST['Promesa-rama'])) {
	$promesa = $_POST['Promesa-rama'];
}
if(isset($_POST['Lema-rama'])) {
	$lema = $_POST['Lema-rama'];
}
if(isset($_POST['Oracion-rama'])) {
	$oracion = $_POST['Oracion-rama'];
}

if(isset($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}
switch ($accion) {
	case 'insertar-actualizar-historia':
		$sql = "UPDATE ramas SET Historia = '$historia' WHERE Id = '$id_rama'";
		$sentencia = $conexion -> prepare($sql);
		$respuesta = $sentencia -> execute();
		echo $respuesta;
		break;
	case 'insertar-actualizar-fundamentos':
		$sql = "UPDATE ramas SET Ley = '$ley', Promesa = '$promesa', Lema = '$lema', Oracion = '$oracion' WHERE Id = '$id_rama'";
		$sentencia = $conexion -> prepare($sql);
		$respuesta = $sentencia -> execute();
		echo $respuesta;
		break;
	case 'guardar-promesa':
		$sql = "UPDATE ramas SET Promesa='".$promesa."' WHERE Id=".$id_rama;
		$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		if ($sentencia -> execute()) {
			$sqlP = "INSERT INTO Control_cambios(Numero_documento, Nombre_completo, Fecha_hora, Cambio, Nombre_tabla, Nombre_columna, Id_fila) VALUES('$documento','$nombre_completo', NOW(), 'Inserción', 'Ramas', 'Promesa','$id_rama') ON DUPLICATE KEY UPDATE Cambio = 'Actualización'";
			$sentenciaP = $conexion -> prepare($sqlP);
			$sentenciaP -> execute();
			$respuesta = true;
		} else {
			$respuesta = false;
		}
		echo $respuesta;
		break;
	case 'guardar-lema':
		$sql = "UPDATE ramas SET Lema='".$historia."' WHERE Id=".$id_rama;
		$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		if ($sentencia -> execute()) {
			$sqlH = "INSERT INTO Control_cambios(Numero_documento, Nombre_completo, Fecha_hora, Cambio, Nombre_tabla, Nombre_columna, Id_fila) VALUES('$documento','$nombre_completo', NOW(), 'Inserción', 'Ramas', 'Lema','$id_rama') ON DUPLICATE KEY UPDATE Cambio = 'Actualización'";
			$sentenciaH = $conexion -> prepare($sqlH);
			$sentenciaH -> execute();
			$respuesta = true;
		} else {
			$respuesta = false;
		}
		echo $respuesta;
		break;
	case 'informacion-rama':
		$sqlIR = "SELECT * FROM ramas WHERE Id = '$id_rama'";
		$sentenciaIR = $conexion -> prepare($sqlIR);
		$sentenciaIR -> execute();
		$rama = $sentenciaIR -> fetch(PDO::FETCH_ASSOC);

        echo json_encode($rama);
		break;
	case 'informacion-ramas':
		$sql1 = "SELECT * FROM ramas";
		$sentencia1 = $conexion -> prepare($sql1);
		$sentencia1 -> execute();
		$ramas = $sentencia1 -> fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($ramas);
		break;
}
?>