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

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}
switch ($accion) {
	case 'insignias':
		$sql3 = "SELECT Id FROM ejes WHERE Id_progresion = '$id_progresion' ORDER BY Id ASC";
		$sentencia3 = $conexion -> prepare($sql3);
		$sentencia3 -> execute();
		$primer_eje = $sentencia3 -> fetch(PDO::FETCH_ASSOC);

		$sql4 = "SELECT Id FROM ejes WHERE Id_progresion = '$id_progresion' ORDER BY Id DESC";
		$sentencia4 = $conexion -> prepare($sql4);
		$sentencia4 -> execute();
		$ultimo_eje = $sentencia4 -> fetch(PDO::FETCH_ASSOC);

		$sqlIET = "SELECT Nombre, Insignia FROM especialidades WHERE Id_eje BETWEEN '$primer_eje[Id]' AND '$ultimo_eje[Id]' ORDER BY Id";
		$sentenciaIET = $conexion -> prepare($sqlIET);
		$sentenciaIET -> execute();
		$insignias = $sentenciaIET -> fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($insignias);
		break;
	case 'porcentaje-especialidades':
		$sqlEEP = "SELECT es.Id FROM progresiones pr LEFT JOIN ejes ej ON pr.Id = ej.Id_progresion LEFT JOIN especialidades es ON ej.Id = es.Id_eje WHERE pr.Id = '$id_progresion'";
		$sentenciaEEP = $conexion -> prepare($sqlEEP);
		$sentenciaEEP -> execute();
		$especialidades_ejes_progresion = $sentenciaEEP -> fetchAll(PDO::FETCH_ASSOC);

		$sqlTE = "SELECT COUNT(DISTINCT dc.Id_persona) AS Personas_rama FROM progresiones pr LEFT JOIN equipos eq ON eq.Id_rama = pr.Id_rama LEFT JOIN detalle_cargos dc ON eq.Id = dc.Id_equipo WHERE pr.Id = '$id_progresion' AND dc.Id_cargo != '$id_cargo'";
		$sentenciaTE = $conexion -> prepare($sqlTE);
		$sentenciaTE -> execute();
		$cantidad_personas_rama = $sentenciaTE -> fetch(PDO::FETCH_ASSOC);

		$sqlTEE = "SELECT dp.Id_especialidad, dp.Id_persona, COUNT(dp.Id_especialidad) AS Requisitos_cumplidos, (SELECT COUNT(*) FROM requisitos WHERE Id_especialidad = dp.Id_especialidad) AS Total FROM progresiones pr LEFT JOIN equipos eq ON eq.Id_rama = pr.Id_rama LEFT JOIN detalle_cargos dc ON eq.Id = dc.Id_equipo LEFT JOIN detalle_progresiones dp ON dc.Id_persona = dp.Id_persona WHERE pr.Id = '$id_progresion' AND dc.Id_cargo != '$id_cargo' GROUP BY Id_especialidad, Id_persona HAVING Requisitos_cumplidos = Total";
		$sentenciaTEE = $conexion -> prepare($sqlTEE);
		$sentenciaTEE -> execute();
		$personas_cumplieron_especialidades = $sentenciaTEE -> fetchAll(PDO::FETCH_ASSOC);
		$cantidad_personas_cumplieron_especialidades = count($personas_cumplieron_especialidades);

		for ($i=0; $i < count($especialidades_ejes_progresion); $i++) {
			$especialidades_ejes_progresion[$i]['Cantidad_cumplieron'] = 0;
			for ($j=0; $j < count($personas_cumplieron_especialidades); $j++) { 
				if ($especialidades_ejes_progresion[$i]['Id'] == $personas_cumplieron_especialidades[$j]['Id_especialidad']) {
					$especialidades_ejes_progresion[$i]['Cantidad_cumplieron'] += 1;
				}
			}
		}

		for ($i=0; $i < count($especialidades_ejes_progresion); $i++) {
			if ($especialidades_ejes_progresion[$i]['Cantidad_cumplieron'] > 0) {
				$especialidades_ejes_progresion[$i]['Porcentaje'] = $especialidades_ejes_progresion[$i]['Cantidad_cumplieron'] * 100 / $cantidad_personas_rama['Personas_rama'];
				$especialidades_ejes_progresion[$i]['Decimal'] = $especialidades_ejes_progresion[$i]['Porcentaje'] / 100;
			} else {
				$especialidades_ejes_progresion[$i]['Porcentaje'] = 0;
				$especialidades_ejes_progresion[$i]['Decimal'] = 0;
			}
		}

		echo json_encode($especialidades_ejes_progresion);
		break;
	case 'listar-ranking-especialidad':
		$sqlDP = "SELECT DISTINCT dp.Id_persona, p.Nombres, p.Apellidos, COUNT(dp.Id_requisito) AS Requisitos_cumplidos, (SELECT COUNT(*) FROM requisitos WHERE Id_especialidad = dp.Id_especialidad) AS Total_requisitos FROM detalle_progresiones dp LEFT JOIN personas p ON dp.Id_persona = p.Id WHERE dp.Id_especialidad = '$id_especialidad' GROUP BY Id_especialidad, Id_persona ORDER BY Requisitos_cumplidos DESC";
		$sentenciaDP = $conexion -> prepare($sqlDP);
		$sentenciaDP -> execute();
		$personas_especialidad = $sentenciaDP -> fetchAll(PDO::FETCH_ASSOC);

		if (count($personas_especialidad) == 0) {
			echo "<tr>";
			echo "<td colspan='5'>No hay personas de la rama en esta especialidad</td>";
			echo "</tr>";
		} else {
			for ($i=0, $pos=1; $i < count($personas_especialidad); $i++, $pos++) {
				unset($personas_especialidad[$i]['Id_persona']);
				echo "<tr>";
				echo "<td>".$pos."</td>";
				echo "<td>".$personas_especialidad[$i]['Nombres']."</td>";
				echo "<td>".$personas_especialidad[$i]['Apellidos']."</td>";
				echo "<td>".$personas_especialidad[$i]['Requisitos_cumplidos']."</td>";
				echo "<td>".$personas_especialidad[$i]['Total_requisitos']."</td>";
				echo "<tr>";
			}
		}
		break;
	case 'porcentaje-personas-sin-progresion':
		$sqlTE = "SELECT COUNT(DISTINCT dc.Id_persona) AS Personas_rama FROM progresiones pr LEFT JOIN equipos eq ON eq.Id_rama = pr.Id_rama LEFT JOIN detalle_cargos dc ON eq.Id = dc.Id_equipo WHERE pr.Id = '$id_progresion' AND dc.Id_cargo != '$id_cargo'";
		$sentenciaTE = $conexion -> prepare($sqlTE);
		$sentenciaTE -> execute();
		$cantidad_personas_rama = $sentenciaTE -> fetch(PDO::FETCH_ASSOC);

		$sqlPPSP = "SELECT DISTINCT dc.Id_persona AS Personas_rama FROM progresiones pr LEFT JOIN equipos eq ON eq.Id_rama = pr.Id_rama LEFT JOIN detalle_cargos dc ON eq.Id = dc.Id_equipo WHERE pr.Id = '$id_progresion' AND dc.Id_cargo != '$id_cargo' AND dc.Id_persona NOT IN (SELECT dp.Id_persona FROM detalle_progresiones dp)";
		$sentenciaPPSP = $conexion -> prepare($sqlPPSP);
		$sentenciaPPSP -> execute();
		$personas_rama_sin_progresion = $sentenciaTE -> rowCount();

		if ($personas_rama_sin_progresion > 0) {
			$arreglo['Porcentaje'] = $personas_rama_sin_progresion * 100 / $cantidad_personas_rama['Personas_rama'];
			$arreglo['Decimal'] = $arreglo['Porcentaje'] / 100;
		} else {
			$arreglo['Porcentaje'] = 0;
			$arreglo['Decimal'] = 0;
		}

		echo json_encode($arreglo);
		break;
	case 'listar-personas-sin-progresion':
		$sqlTE = "SELECT DISTINCT dc.Id_persona, p.Nombres, p.Apellidos FROM progresiones pr LEFT JOIN equipos eq ON eq.Id_rama = pr.Id_rama LEFT JOIN detalle_cargos dc ON eq.Id = dc.Id_equipo LEFT JOIN personas p ON dc.Id_persona = p.Id WHERE pr.Id = '$id_progresion' AND dc.Id_cargo != '$id_cargo' AND dc.Id_persona NOT IN (SELECT dp.Id_persona FROM detalle_progresiones dp)";
		$sentenciaTE = $conexion -> prepare($sqlTE);
		$sentenciaTE -> execute();
		$personas_rama_sin_progresion = $sentenciaTE -> fetchAll(PDO::FETCH_ASSOC);
		
		if ($personas_rama_sin_progresion == 0) {
			echo "<tr>";
			echo "<td colspan='3'>Todas las personas de la rama han empezado su progresión</td>";
			echo "</tr>";
		} else {
			for ($i=0, $pos=1; $i < count($personas_rama_sin_progresion); $i++, $pos++) {
				unset($personas_rama_sin_progresion[$i]['Id_persona']);
				echo "<tr>";
				echo "<td>".$pos."</td>";
				echo "<td>".$personas_rama_sin_progresion[$i]['Nombres']."</td>";
				echo "<td>".$personas_rama_sin_progresion[$i]['Apellidos']."</td>";
				echo "<tr>";
			}
		}
		break;
}
?>