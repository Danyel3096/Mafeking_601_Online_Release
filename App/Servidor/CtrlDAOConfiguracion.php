<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-persona']) && !empty($_POST['Id-persona'])) {
	if (!is_nan($_POST['Id-persona']) && $_POST['Id-persona'] >= 0) {
		$id_persona = $_POST['Id-persona'];
	}
}

if(isset($_POST['Foto-persona']) && !empty($_POST['Foto-persona'])) {
	if (strlen($_POST['Foto-persona']) >= 6 && strlen($_POST['Foto-persona']) <= 11) {
		$foto_persona = $_POST['Foto-persona'];
	}
} else {
	$foto_persona = '';
}
if(isset($_POST['Fondo-persona']) && !empty($_POST['Fondo-persona'])) {
	if (!is_nan($_POST['Fondo-persona']) && $_POST['Fondo-persona'] >= 0) {
		$fondo_persona = $_POST['Fondo-persona'];
	}
} else {
	$fondo_persona = '';
}
if(isset($_POST['Fecha-ingreso-persona']) && !empty($_POST['Fecha-ingreso-persona'])) {
	if (strlen($_POST['Fecha-ingreso-persona']) == 10) {
		$fecha_ingreso_persona = $_POST['Fecha-ingreso-persona'];
	}
}
if(isset($_POST['Estado-civil-persona']) && !empty($_POST['Estado-civil-persona'])) {
	if (strlen($_POST['Estado-civil-persona']) >= 6 && strlen($_POST['Estado-civil-persona']) <= 15) {
		$estado_civil_persona = $_POST['Estado-civil-persona'];
	}
}
if(isset($_POST['Religion-persona']) && !empty($_POST['Religion-persona'])) {
	if (strlen($_POST['Religion-persona']) >= 3 && strlen($_POST['Religion-persona']) <= 50) {
		$religion_persona = $_POST['Religion-persona'];
	}
} else {
	$religion_persona = '';
}
if(isset($_POST['Nivel-educativo-persona']) && !empty($_POST['Nivel-educativo-persona'])) {
	if (strlen($_POST['Nivel-educativo-persona']) >= 3 && strlen($_POST['Nivel-educativo-persona']) <= 50) {
		$nivel_educativo_persona = $_POST['Nivel-educativo-persona'];
	}
}
if(isset($_POST['Curso-persona']) && !empty($_POST['Curso-persona'])) {
	if (strlen($_POST['Curso-persona']) >= 3 && strlen($_POST['Curso-persona']) <= 50) {
		$curso_persona = $_POST['Curso-persona'];
	}
} else {
	$curso_persona = '';
}
if(isset($_POST['Carrera-persona']) && !empty($_POST['Carrera-persona'])) {
	if (strlen($_POST['Carrera-persona']) >= 3 && strlen($_POST['Carrera-persona']) <= 50) {
		$carrera_persona = $_POST['Carrera-persona'];
	} else {
		$carrera_persona = '';
	}
}
if(isset($_POST['Actividad-cultural-persona']) && !empty($_POST['Actividad-cultural-persona'])) {
	if (strlen($_POST['Actividad-cultural-persona']) >= 3 && strlen($_POST['Actividad-cultural-persona']) <= 50) {
		$actividad_cultural_persona = $_POST['Actividad-cultural-persona'];
	}
} else {
	$actividad_cultural_persona = '';
}
if(isset($_POST['Actividad_deportiva_persona']) && !empty($_POST['Actividad_deportiva_persona'])) {
	if (strlen($_POST['Actividad_deportiva_persona']) >= 3 && strlen($_POST['Actividad_deportiva_persona']) <= 50) {
		$actividad_deportiva_persona = $_POST['Actividad_deportiva_persona'];
	}
} else {
	$actividad_deportiva_persona = '';
}
if(isset($_POST['Asignatura-favorita-persona']) && !empty($_POST['Asignatura-favorita-persona'])) {
	if (!is_nan($_POST['Asignatura-favorita-persona']) && $_POST['Asignatura-favorita-persona'] >= 0) {
		$asignatura_favorita_persona = $_POST['Asignatura-favorita-persona'];
	}
} else {
	$asignatura_favorita_persona = '';
}
if(isset($_POST['Comida-favorita-persona']) && !empty($_POST['Comida-favorita-persona'])) {
	if (!is_nan($_POST['Comida-favorita-persona']) && $_POST['Comida-favorita-persona'] >= 0) {
		$comida_favorita_persona = $_POST['Comida-favorita-persona'];
	}
} else {
	$comida_favorita_persona = '';
}
if(isset($_POST['Musica-favorita-persona']) && !empty($_POST['Musica-favorita-persona'])) {
	if (!is_nan($_POST['Musica-favorita-persona']) && $_POST['Musica-favorita-persona'] >= 0) {
		$musica_favorita_persona = $_POST['Musica-favorita-persona'];
	}
} else {
	$musica_favorita_persona = '';
}
if(isset($_POST['Grupo-anterior-persona']) && !empty($_POST['Grupo-anterior-persona'])) {
	if (!is_nan($_POST['Grupo-anterior-persona']) && $_POST['Grupo-anterior-persona'] >= 0) {
		$grupo_anterior_persona = $_POST['Grupo-anterior-persona'];
	}
} else {
	$grupo_anterior_persona = '';
}
if(isset($_POST['Proyecto-vida-persona']) && !empty($_POST['Proyecto-vida-persona'])) {
	if (!is_nan($_POST['Proyecto-vida-persona']) && $_POST['Proyecto-vida-persona'] >= 0) {
		$proyecto_vida_persona = $_POST['Proyecto-vida-persona'];
	}
} else {
	$proyecto_vida_persona = '';
}
if(isset($_POST['Permiso-salidas-persona']) && !empty($_POST['Permiso-salidas-persona'])) {
	if (!is_nan($_POST['Permiso-salidas-persona']) && $_POST['Permiso-salidas-persona'] >= 0) {
		$permiso_salidas_persona = $_POST['Permiso-salidas-persona'];
	}
} else {
	$permiso_salidas_persona = '';
}
if(isset($_POST['Licencia-persona']) && !empty($_POST['Licencia-persona'])) {
	if (!is_nan($_POST['Licencia-persona']) && $_POST['Licencia-persona'] >= 0) {
		$licencia_persona = $_POST['Licencia-persona'];
	}
} else {
	$licencia_persona = '';
}
if(isset($_POST['Fecha-salida-persona']) && !empty($_POST['Fecha-salida-persona'])) {
	if (!is_nan($_POST['Fecha-salida-persona']) && $_POST['Fecha-salida-persona'] >= 0) {
		$fecha_salida_persona = $_POST['Fecha-salida-persona'];
	}
} else {
	$fecha_salida_persona = '';
}
if(isset($_POST['Fecha-reingreso-persona']) && !empty($_POST['Fecha-reingreso-persona'])) {
	if (!is_nan($_POST['Fecha-reingreso-persona']) && $_POST['Fecha-reingreso-persona'] >= 0) {
		$fecha_reingreso_persona = $_POST['Fecha-reingreso-persona'];
	}
} else {
	$fecha_reingreso_persona = '';
}


if(isset($_POST['EPS-persona']) && !empty($_POST['EPS-persona'])) {
	if (strlen($_POST['EPS-persona']) >= 3 && strlen($_POST['EPS-persona']) <= 20) {
		$eps_persona = $_POST['EPS-persona'];
	}
}
if(isset($_POST['Grupo-sanguineo-persona']) && !empty($_POST['Grupo-sanguineo-persona'])) {
	if (strlen($_POST['Grupo-sanguineo-persona']) == 1 || strlen($_POST['Grupo-sanguineo-persona']) == 2) {
		$grupo_sanguineo_persona = $_POST['Grupo-sanguineo-persona'];
	}
}
if(isset($_POST['Factor-Rh-persona']) && !empty($_POST['Factor-Rh-persona'])) {
	if (strlen($_POST['Factor-Rh-persona']) == 8) {
		$factor_rh_persona = $_POST['Factor-Rh-persona'];
	}
}
if(isset($_POST['Medicamentos-persona']) && !empty($_POST['Medicamentos-persona'])) {
	if (!is_nan($_POST['Medicamentos-persona']) && $_POST['Medicamentos-persona'] >= 0) {
		$medicamentos_persona = $_POST['Medicamentos-persona'];
	}
} else {
	$medicamentos_persona = '';
}
if(isset($_POST['Prescripciones-persona']) && !empty($_POST['Prescripciones-persona'])) {
	if (!is_nan($_POST['Prescripciones-persona']) && $_POST['Prescripciones-persona'] >= 0) {
		$prescripciones_persona = $_POST['Prescripciones-persona'];
	}
} else {
	$prescripciones_persona = '';
}
if(isset($_POST['Alergias-persona']) && !empty($_POST['Alergias-persona'])) {
	if (!is_nan($_POST['Alergias-persona']) && $_POST['Alergias-persona'] >= 0) {
		$alergias_persona = $_POST['Alergias-persona'];
	}
} else {
	$alergias_persona = '';
}
if(isset($_POST['Enfermedades-persona']) && !empty($_POST['Enfermedades-persona'])) {
	if (!is_nan($_POST['Enfermedades-persona']) && $_POST['Enfermedades-persona'] >= 0) {
		$enfermedades_persona = $_POST['Enfermedades-persona'];
	}
} else {
	$enfermedades_persona = '';
}
if(isset($_POST['Tetanos-persona']) && !empty($_POST['Tetanos-persona'])) {
	if (!is_nan($_POST['Tetanos-persona']) && $_POST['Tetanos-persona'] >= 0) {
		$tetanos_persona = $_POST['Tetanos-persona'];
	}
}
if(isset($_POST['Triple-viral-persona']) && !empty($_POST['Triple-viral-persona'])) {
	if (!is_nan($_POST['Triple-viral-persona']) && $_POST['Triple-viral-persona'] >= 0) {
		$triple_viral_persona = $_POST['Triple-viral-persona'];
	}
}
if(isset($_POST['Varicela-persona']) && !empty($_POST['Varicela-persona'])) {
	if (!is_nan($_POST['Varicela-persona']) && $_POST['Varicela-persona'] >= 0) {
		$varicela_persona = $_POST['Varicela-persona'];
	}
}
if(isset($_POST['Influenza-persona']) && !empty($_POST['Influenza-persona'])) {
	if (!is_nan($_POST['Influenza-persona']) && $_POST['Influenza-persona'] >= 0) {
		$influenza_persona = $_POST['Influenza-persona'];
	}
}
if(isset($_POST['Rubeola-Sarampion-persona']) && !empty($_POST['Rubeola-Sarampion-persona'])) {
	if (!is_nan($_POST['Rubeola-Sarampion-persona']) && $_POST['Rubeola-Sarampion-persona'] >= 0) {
		$rubeola_sarampion_persona = $_POST['Rubeola-Sarampion-persona'];
	}
}
if(isset($_POST['Fiebre-amarilla-persona']) && !empty($_POST['Fiebre-amarilla-persona'])) {
	if (!is_nan($_POST['Fiebre-amarilla-persona']) && $_POST['Fiebre-amarilla-persona'] >= 0) {
		$fiebre_amarilla_persona = $_POST['Fiebre-amarilla-persona'];
	}
}
if(isset($_POST['Hepatitis-B-persona']) && !empty($_POST['Hepatitis-B-persona'])) {
	if (!is_nan($_POST['Hepatitis-B-persona']) && $_POST['Hepatitis-B-persona'] >= 0) {
		$hepatitis_b_persona = $_POST['Hepatitis-B-persona'];
	}
}
if(isset($_POST['Papiloma-humano-persona']) && !empty($_POST['Papiloma-humano-persona'])) {
	if (!is_nan($_POST['Papiloma-humano-persona']) && $_POST['Papiloma-humano-persona'] >= 0) {
		$papiloma_humano_persona = $_POST['Papiloma-humano-persona'];
	}
}
if(isset($_POST['Meningitis-A-persona']) && !empty($_POST['Meningitis-A-persona'])) {
	if (!is_nan($_POST['Meningitis-A-persona']) && $_POST['Meningitis-A-persona'] >= 0) {
		$meningitis_a_persona = $_POST['Meningitis-A-persona'];
	}
}
if(isset($_POST['Parotiditis-persona']) && !empty($_POST['Parotiditis-persona'])) {
	if (!is_nan($_POST['Parotiditis-persona']) && $_POST['Parotiditis-persona'] >= 0) {
		$parotiditis_persona = $_POST['Parotiditis-persona'];
	}
}
if(isset($_POST['Neumococos-persona']) && !empty($_POST['Neumococos-persona'])) {
	if (!is_nan($_POST['Neumococos-persona']) && $_POST['Neumococos-persona'] >= 0) {
		$neumococos_persona = $_POST['Neumococos-persona'];
	}
}
if(isset($_POST['Poliomielitis-persona']) && !empty($_POST['Poliomielitis-persona'])) {
	if (!is_nan($_POST['Poliomielitis-persona']) && $_POST['Poliomielitis-persona'] >= 0) {
		$poliomielitis_persona = $_POST['Poliomielitis-persona'];
	}
}
if(isset($_POST['Dieta-persona']) && !empty($_POST['Dieta-persona'])) {
	if (strlen($_POST['Dieta-persona']) >= 3 && strlen($_POST['Dieta-persona']) <= 255) {
		$dieta_persona = $_POST['Dieta-persona'];
	}
} else {
	$dieta_persona = '';
}
if(isset($_POST['Discapacidades-persona']) && !empty($_POST['Discapacidades-persona'])) {
	if (!is_nan($_POST['Discapacidades-persona']) && $_POST['Discapacidades-persona'] >= 0) {
		$discapacidades_persona = $_POST['Discapacidades-persona'];
	}
} else {
	$discapacidades_persona = '';
}
if(isset($_POST['Cirugias-persona']) && !empty($_POST['Cirugias-persona'])) {
	if (!is_nan($_POST['Cirugias-persona']) && $_POST['Cirugias-persona'] >= 0) {
		$cirugias_persona = $_POST['Cirugias-persona'];
	}
} else {
	$cirugias_persona = '';
}
if(isset($_POST['Tratamientos-persona']) && !empty($_POST['Tratamientos-persona'])) {
	if (!is_nan($_POST['Tratamientos-persona']) && $_POST['Tratamientos-persona'] >= 0) {
		$tratamientos_persona = $_POST['Tratamientos-persona'];
	}
} else {
	$tratamientos_persona = '';
}
if(isset($_POST['Informacion-adicional-persona']) && !empty($_POST['Informacion-adicional-persona'])) {
	if (strlen($_POST['Informacion-adicional-persona']) >= 6 && strlen($_POST['Informacion-adicional-persona']) <= 11) {
		$informacion_adicional_persona = $_POST['Informacion-adicional-persona'];
	}
} else {
	$informacion_adicional_persona = '';
}


if(isset($_POST['Numero-cedula']) && !empty($_POST['Numero-cedula'])) {
	$numero_cedula = $_POST['Numero-cedula'];
}
if(isset($_POST['Nombres-acudiente']) && !empty($_POST['Nombres-acudiente'])) {
	$nombres_acudiente = $_POST['Nombres-acudiente'];
}
if(isset($_POST['Apellidos-acudiente']) && !empty($_POST['Apellidos-acudiente'])) {
	$apellidos_acudiente = $_POST['Apellidos-acudiente'];
}
if(isset($_POST['Genero-acudiente']) && !empty($_POST['Genero-acudiente'])) {
	$genero_acudiente = $_POST['Genero-acudiente'];
}
if(isset($_POST['Parentesco']) && !empty($_POST['Parentesco'])) {
	$parentesco_acudiente = $_POST['Parentesco'];
}
if(isset($_POST['Direccion-acudiente']) && !empty($_POST['Direccion-acudiente'])) {
	$direccion_acudiente = $_POST['Direccion-acudiente'];
}
if(isset($_POST['Celular-acudiente']) && !empty($_POST['Celular-acudiente'])) {
	$celular_acudiente = $_POST['Celular-acudiente'];
}
if(isset($_POST['Telefono-acudiente']) && !empty($_POST['Telefono-acudiente'])) {
	$telefono_acudiente = $_POST['Telefono-acudiente'];
} else {
	$telefono_acudiente = '';
}
if(isset($_POST['Barrio-acudiente']) && !empty($_POST['Barrio-acudiente'])) {
	$barrio_acudiente = $_POST['Barrio-acudiente'];
}
if(isset($_POST['Estrato-acudiente']) && !empty($_POST['Estrato-acudiente'])) {
	$estrato_acudiente = $_POST['Estrato-acudiente'];
}
if(isset($_POST['EPS-acudiente']) && !empty($_POST['EPS-acudiente'])) {
	$eps_acudiente = $_POST['EPS-acudiente'];
}
if(isset($_POST['Ocupacion']) && !empty($_POST['Ocupacion'])) {
	$ocupacion_acudiente = $_POST['Ocupacion'];
}
if(isset($_POST['Empresa']) && !empty($_POST['Empresa'])) {
	$empresa_acudiente = $_POST['Empresa'];
}
if(isset($_POST['Profesion']) && !empty($_POST['Profesion'])) {
	$profesion_acudiente = $_POST['Profesion'];
}
if(isset($_POST['Correo-acudiente']) && !empty($_POST['Correo-acudiente'])) {
	$correo_acudiente = $_POST['Correo-acudiente'];
}
if(isset($_POST['Id-municipio-acudiente']) && !empty($_POST['Id-municipio-acudiente'])) {
	$id_municipio_acudiente = $_POST['Id-municipio-acudiente'];
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}

switch ($accion) {
	case 'insertar-actualizar-hoja-vida':
		$sqlHV = "INSERT INTO hojas_vida (Id, Foto, Fondo, Fecha_ingreso, Estado_civil, Religion, Nivel_educativo, Curso, Carrera, Actividad_cultural, Actividad_deportiva, Asignatura_favorita, Comida_favorita, Musica_favorita, Grupo_anterior, Proyecto_vida, Permiso_salidas, Licencia, Fecha_salida, Fecha_reingreso) VALUES ('$id_persona', '$foto_persona', '$fondo_persona','$fecha_ingreso_persona', '$estado_civil_persona', '$religion_persona', '$nivel_educativo_persona', '$curso_persona', '$carrera_persona', '$actividad_cultural_persona', '$actividad_deportiva_persona', 'asignatura_favorita_persona', '$comida_favorita_persona', '$musica_favorita_persona', '$grupo_anterior_persona', '$proyecto_vida_persona', '$permiso_salidas_persona', '$licencia_persona', '$fecha_salida_persona', '$fecha_reingreso_persona')";
		$sentenciaHV = $conexion -> prepare($sqlHV);
		$resultadoHV = $sentenciaHV -> execute();
		echo $resultadoHV;
		break;
	case 'insertar-actualizar-ficha-medica':
		$sqlFM = "INSERT INTO fichas_medicas (Id, EPS, Grupo_sanguineo, Factor_Rh, Medicamentos, Prescripciones, Alergias, Enfermedades, Tetanos, Triple_viral, Varicela, Influenza, Rubeola_Sarampion, Fiebre_amarilla, Hepatitis_B, Papiloma_humano, Meningitis_A, Parotiditis, Neumococos, Poliomielitis, Dieta, Discapacidades, Cirugias, Tratamientos, Informacion_adicional) VALUES ('$id_persona', '$eps_persona', '$grupo_sanguineo_persona', '$factor_rh_persona', '$medicamentos_persona', '$prescripciones_persona', '$alergias_persona', '$enfermedades_persona', '$tetanos_persona', '$triple_viral_persona', '$varicela_persona', '$influenza_persona', '$rubeola_sarampion_persona', '$fiebre_amarilla_persona', '$hepatitis_b_persona', '$papiloma_humano_persona', '$meningitis_a_persona', '$parotiditis_persona', '$neumococos_persona', '$poliomielitis_persona', '$dieta_persona', '$discapacidades_persona', '$cirugias_persona', '$tratamientos_persona', '$informacion_adicional_persona')";
		$sentenciaFM = $conexion -> prepare($sqlFM);
		$resultadoFM = $sentenciaFM -> execute();
		echo $resultadoFM;
		break;
	case 'insertar-actualizar-acudiente':
		$sqlA = "INSERT INTO acudientes (Numero_cedula, Nombres, Apellidos, Genero, Parentesco, Direccion, Celular, Telefono, Barrio, Estrato, EPS, Ocupacion, Empresa, Profesion, Correo, Id_municipio) VALUES ('$numero_cedula', '$nombres_acudiente','$apellidos_acudiente', '$genero_acudiente', '$parentesco_acudiente', '$direccion_acudiente', '$celular_acudiente', '$telefono_acudiente', '$barrio_acudiente', '$estrato_acudiente', '$eps_acudiente', '$ocupacion_acudiente', '$empresa_acudiente', '$profesion_acudiente', '$correo_acudiente', '$id_municipio_acudiente')";
		$sentenciaA = $conexion -> prepare($sqlA);
		$resultadoA = $sentenciaA -> execute();
		if ($resultadoA) {
			$sqlDA = "SELECT Id FROM acudientes WHERE Numero_cedula = '$numero_cedula'";
			$sentenciaDA = $conexion -> prepare($sqlDA);
			$sentenciaDA -> execute();
			$acudiente = $sentenciaDA -> fetch();
			$sqlDA = "INSERT INTO detalle_responsables (Id_persona, Id_acudiente) VALUES ('$id_persona', '$acudiente[Id]')";
			$sentenciaDA = $conexion -> prepare($sqlDA);
			$resultadoDA = $sentenciaDA -> execute();
		}
		echo $resultadoDA;
		break;
	case 'tabla-acudiente':
		$sqlDA = "SELECT Id_persona, Id_acudiente FROM detalle_responsables WHERE Id_persona = '$id_persona'";
		$sentenciaDA = $conexion -> prepare($sqlDA);
		$sentenciaDA -> execute();
		$cantidad_acudientes = $sentenciaDA -> rowCount();
		$detalle_acudientes = $sentenciaDA -> fetchAll(PDO::FETCH_ASSOC);

		if (!empty($detalle_acudientes)) {
			foreach ($detalle_acudientes as $detalle_acudiente) {
				$sqlTA = "SELECT Id, Numero_cedula, Nombres, Apellidos, Genero, Parentesco, Direccion, Celular, Telefono, Barrio, Estrato, EPS, Ocupacion, Empresa, Profesion, Correo, Id_municipio FROM acudientes WHERE Id = '$detalle_acudiente[Id_acudiente]'";
				$sentenciaTA = $conexion -> prepare($sqlTA);
				$sentenciaTA -> execute();
				$acudiente = $sentenciaTA -> fetchAll(PDO::FETCH_ASSOC);
				$arreglo["data"] = $acudiente;
				
				if (count($detalle_acudientes) == 1) {
					$claves = array('Nombres', 'Apellidos', 'Parentesco');
					$arreglo["data"][] = array_fill_keys($claves, '');
				}
			}
		} else {
			$claves = array('Nombres', 'Apellidos', 'Parentesco');
			$arreglo["data"][] = array_fill_keys($claves, '');
			$arreglo["data"][] = array_fill_keys($claves, '');
		}
		echo json_encode($arreglo);
		break;
}
?>