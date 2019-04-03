<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-equipo-rama']) && !empty($_POST['Id-equipo-rama'])){
    $id_equipo = $_POST['Id-equipo-rama'];
}
if(isset($_POST['Id-persona-equipo']) && !empty($_POST['Id-persona-equipo'])){
    $id_persona_equipo = $_POST['Id-persona-equipo'];
} else {
	$id_persona_equipo = '';
}
if(isset($_POST['Id-cargo'])) {
    $id_cargo = $_POST['Id-cargo'];
}
if(isset($_POST['Id-progresion']) && !empty($_POST['Id-progresion'])){
    $id_progresion = $_POST['Id-progresion'];
}
if(isset($_POST['Id-eje']) && !empty($_POST['Id-eje'])){
    $id_eje = $_POST['Id-eje'];
}
if(isset($_POST['Nombre-eje']) && !empty($_POST['Nombre-eje'])){
    $nombre_eje = $_POST['Nombre-eje'];
}
if(isset($_POST['Id-especialidad']) && !empty($_POST['Id-especialidad'])){
    $id_especialidad = $_POST['Id-especialidad'];
}
if(isset($_POST['Nombre-especialidad']) && !empty($_POST['Nombre-especialidad'])){
    $nombre_especialidad = $_POST['Nombre-especialidad'];
}
if(isset($_POST['Id-requisito']) && !empty($_POST['Id-requisito'])){
    $id_requisito = $_POST['Id-requisito'];
}
if(isset($_POST['Texto-requisito']) && !empty($_POST['Texto-requisito'])){
    $texto_requisito = $_POST['Texto-requisito'];
}
if(isset($_POST['Requisitos-marcados'])) {
	$requisitos_marcados = $_POST['Requisitos-marcados'];
}
if(isset($_POST['Requisitos-desmarcados'])) {
	$requisitos_desmarcados = $_POST['Requisitos-desmarcados'];
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}
switch ($accion) {
	case 'select-personas-equipo':
		$sql = "SELECT Id_persona FROM detalle_cargos WHERE Id_equipo = '$id_equipo' AND Id_cargo != '$id_cargo'";
    	$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$personas_equipo = $sentencia -> fetchAll();

		$sql9 = "SELECT Id, Nombres, Apellidos FROM personas";
    	$sentencia9 = $conexion -> prepare($sql9);
		$sentencia9 -> execute();
		$personas = $sentencia9 -> fetchAll();

		echo $opcion1 = "<option label='Seleccione' selected></option>";
		for ($i=0; $i < count($personas); $i++) {
			for ($j=0; $j < count($personas_equipo); $j++) {
				if ($personas[$i]['Id'] == $personas_equipo[$j]['Id_persona']) {
					echo $opcion1 = "<option value='".$personas[$i]['Id']."'>".$personas[$i]['Nombres']." ".$personas[$i]['Apellidos']."</option>";
				}
			}
		}
		break;
	case 'select-ejes-progresion':
		$sql = "SELECT Id, Nombre FROM ejes WHERE Id_progresion = '$id_progresion'";
    	$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$ejes_progresion = $sentencia -> fetchAll();

		echo $opcion1 = "<option value='0'>Seleccione</option>";
		for ($i=0; $i < count($ejes_progresion); $i++) {
			echo $opcion1 = "<option value='".$ejes_progresion[$i]['Id']."'>".$ejes_progresion[$i]['Nombre']."</option>";
		}
		break;
	case 'select-especialidades-eje':
		$sql = "SELECT Id, Nombre FROM especialidades WHERE Id_eje = '$id_eje'";
    	$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$especialidades_eje = $sentencia -> fetchAll();

		echo $opcion1 = "<option value='0'>Seleccione</option>";
		for ($i=0; $i < count($especialidades_eje); $i++) {
			echo $opcion1 = "<option value='".$especialidades_eje[$i]['Id']."'>".$especialidades_eje[$i]['Nombre']."</option>";
		}
		break;
	case 'requisitos-especialidad':
		$sql3 = "SELECT Id, Texto FROM requisitos WHERE Id_especialidad = '$id_especialidad'";
		$sentencia3 = $conexion -> prepare($sql3);
		$sentencia3 -> execute();
		$requisitos = $sentencia3 -> fetchAll();

		$sqlX = "SELECT Id_requisito, Estado FROM detalle_progresiones WHERE Id_especialidad = '$id_especialidad' AND Id_persona = '$id_persona_equipo'";
		$sentenciaX = $conexion -> prepare($sqlX);
		$sentenciaX -> execute();
		$estados = $sentenciaX -> fetchAll();
		echo "<tr>";
		for ($i = 0, $contador=1; $i < count($requisitos); $i++, $contador++) { ?>
			<td>
				<div class="card" style="width: 20rem;">
  					<div class="card-body" id="cuerpo-requisito" name="cuerpo-requisito">
 						<p class="card-text"><?php
 					echo $requisitos[$i]['Texto'];
 					?></p>
    					<input type="checkbox" id="estado-requisito" name="estado-requisitos" class="form-control" 
    				<?php for ($j=0; $j < count($estados); $j++) { 
						if ($requisitos[$i]['Id'] === $estados[$j]['Id_requisito'] && $estados[$j]['Estado'] == 1) {
							?> checked <?php
						}
					} ?> value="<?php echo $requisitos[$i]['Id'] ?>" />
  					</div>
				</div>
			</td>
			<?php if(($contador%3) == 0) {
				echo "</tr><tr>";
			}
		}
		echo "</tr>";
		break;
	case 'insertar-actualizar-progresion':
		if (!empty($requisitos_marcados)) {
			$arreglo_marcados = explode(",", $requisitos_marcados);
			foreach ($arreglo_marcados as &$marcados) {
				$sql = "INSERT INTO detalle_progresiones (Id_especialidad, Id_requisito, Id_persona, Estado) VALUES ('$id_especialidad', '$marcados', '$id_persona_equipo', '1') ON DUPLICATE KEY UPDATE Estado = '1'";
				$sentencia = $conexion -> prepare($sql);
				$resultado = $sentencia -> execute();
				if($resultado) {
					//$sqlP = "INSERT INTO Control_cambios(Id_persona, Nombre_completo, Fecha_hora, Cambio, Nombre_tabla, Nombre_columna, Id_fila) VALUES('$numero_documento','$nombre_completo', NOW(), 'Inserción', 'Progresiones', 'Varias','$numero_documento') ON DUPLICATE KEY UPDATE Cambio = 'Actualización'";
					//$sentenciaP = $conexion -> prepare($sqlP);
					//$sentenciaP -> execute();
        			$respuesta = true;
        		} else {
	       			$respuesta = false;
    			}
	        }
		} else {
	       	$respuesta = false;
    	}
		if (!empty($requisitos_desmarcados)) {
			$arreglo_desmarcados = explode(",", $requisitos_desmarcados);
			foreach ($arreglo_desmarcados as &$desmarcados) {
				$sql2 = "DELETE FROM detalle_progresiones WHERE Id_especialidad = '$id_especialidad' AND Id_requisito = '$desmarcados' AND Id_persona = '$id_persona_equipo'";
				$sentencia2 = $conexion -> prepare($sql2);
				$resultado2 = $sentencia2 -> execute();
				if($resultado2) {
					//$sqlP = "INSERT INTO Control_cambios(Numero_documento, Nombre_completo, Fecha_hora, Cambio, Nombre_tabla, Nombre_columna, Id_fila) VALUES('$numero_documento','$nombre_completo', NOW(), 'Inserción', 'Progresiones', 'Varias','$numero_documento') ON DUPLICATE KEY UPDATE Cambio = 'Actualización'";
					//$sentenciaP = $conexion -> prepare($sqlP);
					//$sentenciaP -> execute();
          			$respuesta2 = true;
          		} else {
	       			$respuesta2 = false;
    			}
			}
		} else {
			$respuesta2 = false;
		}
		if (!empty($requisitos_marcados) && !empty($requisitos_desmarcados)) {
			if ($respuesta == true && $respuesta2 == true) {
				$salida = true;
			} else if ($respuesta == true || $respuesta2 == true) {
				$salida = true;
			}
		}  else if ($respuesta == true || $respuesta2 == true) {
				$salida = true;
		}	else {
			$salida = false;
		}
		echo $salida;
		break;
	case 'tabla-progresion-persona':
    	$sql = "SELECT ej.Nombre AS Eje, es.Nombre AS Especialidad, COUNT(DISTINCT dp.Id_requisito) AS Cumplidos, (SELECT COUNT(*) FROM requisitos WHERE Id_especialidad = es.Id) AS Total FROM ejes ej LEFT JOIN especialidades es ON ej.Id = es.Id_eje LEFT JOIN detalle_progresiones dp ON dp.Id_especialidad = es.Id WHERE dp.Id_persona = '$id_persona_equipo' GROUP BY dp.Id_especialidad";
    	$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$detalle_progresion = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
		if (count($detalle_progresion) > 0) {
			for ($i=0; $i < count($detalle_progresion); $i++) {
				$arreglo["data"][] = $detalle_progresion[$i];
			}
		} else {
			$arreglo["data"][] = '';
		}
		echo json_encode($arreglo);
		break;
	case 'tabla-ejes':
		$sqlTE = "SELECT ej.Id, ej.Nombre, COUNT(es.Id) AS 'Cantidad_especialidades' FROM ejes ej LEFT JOIN especialidades es ON ej.Id = es.Id_eje WHERE ej.Id_progresion = '$id_progresion' GROUP BY ej.Id";
		$sentenciaTE = $conexion -> prepare($sqlTE);
		$sentenciaTE -> execute();
		$ejes_progresion = $sentenciaTE -> fetchAll(PDO::FETCH_ASSOC);

		for ($i=0; $i < count($ejes_progresion); $i++) {
			$arreglo["data"][] = $ejes_progresion[$i];
		}
		echo json_encode($arreglo);
		break;
	case 'actualizar-eje':
		$sqlAE = "UPDATE ejes SET Nombre = '$nombre_eje' WHERE Id = '$id_eje'";
		$sentenciaAE = $conexion -> prepare($sqlAE);
		$respuestaAE = $sentenciaAE -> execute();
		echo $respuestaAE;
		break;
	case 'tabla-especialidades':
		$sqlTE = "SELECT es.Id, es.Nombre, COUNT(re.Id) AS 'Cantidad_requisitos' FROM especialidades es LEFT JOIN requisitos re ON es.Id = re.Id_especialidad LEFT JOIN ejes ej ON ej.Id_progresion = '$id_progresion' WHERE es.Id_eje = ej.Id GROUP BY es.Id";
		$sentenciaTE = $conexion -> prepare($sqlTE);
		$sentenciaTE -> execute();
		$especialidades_eje = $sentenciaTE -> fetchAll(PDO::FETCH_ASSOC);

		for ($i=0; $i < count($especialidades_eje); $i++) {
			$arreglo["data"][] = $especialidades_eje[$i];
		}
		echo json_encode($arreglo);
		break;
	case 'actualizar-especialidad':
		$sqlAE = "UPDATE especialidades SET Nombre = '$nombre_especialidad' WHERE Id = '$id_especialidad'";
		$sentenciaAE = $conexion -> prepare($sqlAE);
		$respuestaAE = $sentenciaAE -> execute();
		echo $respuestaAE;
		break;
	case 'tabla-requisitos':
		$sqlTR = "SELECT re.Id, re.Texto, COUNT(dp.Id_requisito) AS 'Cantidad_cumplidos' FROM requisitos re LEFT JOIN detalle_progresiones dp ON re.Id = dp.Id_requisito LEFT JOIN especialidades es ON es.Id = re.Id_especialidad LEFT JOIN ejes ej ON es.Id_eje = ej.Id AND ej.Id_progresion = '$id_progresion' WHERE re.Id_especialidad = es.Id GROUP BY re.Id";
		$sentenciaTR = $conexion -> prepare($sqlTR);
		$sentenciaTR -> execute();
		$requisitos_especialidad = $sentenciaTR -> fetchAll(PDO::FETCH_ASSOC);

		for ($i=0; $i < count($requisitos_especialidad); $i++) {
			$arreglo["data"][] = $requisitos_especialidad[$i];
		}
		echo json_encode($arreglo);
		break;
	case 'actualizar-requisito':
		$sqlAR = "UPDATE requisitos SET Texto = '$texto_requisito' WHERE Id = '$id_requisito'";
		$sentenciaAR = $conexion -> prepare($sqlAR);
		$respuestaAR = $sentenciaAR -> execute();
		echo $respuestaAR;
		break;
}
?>