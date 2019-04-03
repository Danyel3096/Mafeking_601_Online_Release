<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['tipo']) && !empty($_POST['tipo'])) {
	$tipo = $_POST['tipo'];
}
if(isset($_POST['documento']) && !empty($_POST['documento'])) {
	if (!is_nan($_POST['documento']) && $_POST['documento'] > 0) {
		$documento = $_POST['documento'];
	}
}
if(isset($_POST['genero']) && !empty($_POST['genero'])) {
	if (strlen($_POST['genero']) >= 6 && strlen($_POST['genero']) <= 11) {
		$genero = $_POST['genero'];
	}
}
if(isset($_POST['nombres']) && !empty($_POST['nombres'])) {
	if (strlen($_POST['nombres']) >= 3 && strlen($_POST['nombres']) <= 50) {
		$nombres = $_POST['nombres'];
	}
}
if(isset($_POST['apellidos']) && !empty($_POST['apellidos'])) {
	if (strlen($_POST['apellidos']) >= 3 && strlen($_POST['apellidos']) <= 50) {
		$apellidos = $_POST['apellidos'];
	}
}
if(isset($_POST['fecha']) && !empty($_POST['fecha'])) {
	$fecha = $_POST['fecha'];
}
if(isset($_POST['id_municipio']) && !empty($_POST['id_municipio'])) {
	if (!is_nan($_POST['id_municipio']) && $_POST['id_municipio'] > 0) {
		$id_municipio = $_POST['id_municipio'];
	}
}
if(isset($_POST['celular']) && !empty($_POST['celular'])) {
	if (!is_nan($_POST['celular']) && $_POST['celular'] > 0) {
		$celular = $_POST['celular'];
	}
}
if(isset($_POST['telefono']) && !empty($_POST['telefono'])) {
	if (!is_nan($_POST['telefono']) && $_POST['telefono'] > 0) {
		$telefono = $_POST['telefono'];
	}
} else {
	$telefono = '';
}
if(isset($_POST['direccion']) && !empty($_POST['direccion'])) {
	if (strlen($_POST['direccion']) >= 3 && strlen($_POST['direccion']) <= 60) {
		$direccion = $_POST['direccion'];
	}
}
if(isset($_POST['barrio']) && !empty($_POST['barrio'])) {
	if (strlen($_POST['barrio']) >= 3 && strlen($_POST['barrio']) <= 60) {
		$barrio = $_POST['barrio'];
	}
}
if(isset($_POST['estrato']) && !empty($_POST['estrato']) && !is_nan($_POST['estrato'])) {
	$estrato = $_POST['estrato'];
}
if(isset($_POST['escuela']) && !empty($_POST['escuela'])) {
	if (!is_nan($_POST['escuela']) && $_POST['escuela'] > 0) {
		$id_centro_educativo = $_POST['escuela'];
	}
}
if(isset($_POST['investidura']) && !empty($_POST['investidura'])) {
	if (strlen($_POST['investidura']) >= 1 && strlen($_POST['investidura']) <= 3) {
		$investidura = $_POST['investidura'];
	}
}
if(isset($_POST['totem']) && !empty($_POST['totem'])) {
	if (strlen($_POST['totem']) >= 3 && strlen($_POST['totem']) <= 100) {
		$totem = $_POST['totem'];
	}
} else {
	$totem = '';
}
if(isset($_POST['correo']) && !empty($_POST['correo'])) {
	if (strlen($_POST['correo']) >= 10 && strlen($_POST['correo']) <= 100) {
		$correo = $_POST['correo'];
	}
}
if(isset($_POST['clave']) && !empty($_POST['clave'])) {
	if (strlen($_POST['clave']) >= 6 && strlen($_POST['clave']) <= 15) {
		$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
	}
}

if(isset($_POST['Id-cargo']) && !empty($_POST['Id-cargo'])) {
	if (!is_nan($_POST['Id-cargo']) && $_POST['Id-cargo'] > 0) {
		$id_cargo = $_POST['Id-cargo'];
	}
}
if(isset($_POST['Id-equipo']) && !empty($_POST['Id-equipo'])) {
	if (!is_nan($_POST['Id-equipo']) && $_POST['Id-equipo'] > 0) {
		$id_equipo = $_POST['Id-equipo'];
	}
}

if(isset($_POST['id_departamento']) && !empty($_POST['id_departamento'])) {
	if (!is_nan($_POST['id_departamento']) && $_POST['id_departamento'] > 0) {
		$id_departamento = $_POST['id_departamento'];
	}
}
if(isset($_POST['sector']) && !empty($_POST['sector'])) {
	if (strlen($_POST['sector']) >= 6 && strlen($_POST['sector']) <= 8) {
		$sector = $_POST['sector'];
	}
}
if(isset($_POST['Id-rama']) && !empty($_POST['Id-rama'])) {
	if (!is_nan($_POST['Id-rama']) && $_POST['Id-rama'] > 0) {
		$id_rama = $_POST['Id-rama'];
	}
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}

switch ($accion) {
	case 'persona-validar-documento':
		$sql1 = "SELECT * FROM personas WHERE Numero_documento = '$documento'";
		$sentencia1 = $conexion -> prepare($sql1);
		$sentencia1 -> execute();
		$persona = $sentencia1 -> rowCount();
		if ($persona == 0) {
			$resultado = 'true';
		} else {
			$resultado = 'false';
		}
		echo $resultado;
		break;
	case 'persona-validar-correo':
		$sql2 = "SELECT * FROM personas WHERE Correo = '$correo'";
		$sentencia2 = $conexion -> prepare($sql2);
		$sentencia2 -> execute();
		$persona = $sentencia2 -> rowCount();
		if ($persona == 0) {
			$resultado = 'true';
		} else {
			$resultado = 'false';
		}
		echo $resultado;
		break;
	case 'persona-validar-celular':
		$sql3 = "SELECT * FROM personas WHERE Celular = '$celular'";
		$sentencia3 = $conexion -> prepare($sql3);
		$sentencia3 -> execute();
		$persona = count($sentencia3 -> fetchAll());
		if ($persona == 0) {
			$resultado = 'true';
		} else {
			$resultado = 'false';
		}
		echo $resultado;
		break;
	case 'registro-persona':
		$sqlP = "INSERT INTO personas (Tipo_documento, Numero_documento, Genero, Nombres, Apellidos, Fecha_nacimiento, Celular, Telefono, Direccion, Barrio, Estrato, Investidura, Totem, Correo, Clave, Estado, Fecha_actividad, Fecha_registro, Id_municipio, Id_centro_educativo) VALUES ('$tipo', '$documento', '$genero', '$nombres', '$apellidos', '$fecha', '$celular', '$telefono', '$direccion', '$barrio', '$estrato', '$investidura', '$totem', '$correo', '$clave', 'Activo', NOW(), NOW(), '$id_municipio', '$id_centro_educativo')";
		$sentenciaP = $conexion -> prepare($sqlP);
		$resultadoP = $sentenciaP -> execute();
		if ($resultadoP) {
			$sqlIDP = "SELECT Id FROM personas WHERE Numero_documento = '$documento'";
			$sentenciaIDP = $conexion -> prepare($sqlIDP);
			$sentenciaIDP -> execute();
			$id_persona = $sentenciaIDP -> fetch();

			$sqlDC = "INSERT INTO detalle_cargos (Id_persona, Id_cargo, Id_equipo) VALUES ('$id_persona[Id]', '$id_cargo', '$id_equipo')";
			$sentenciaDC = $conexion -> prepare($sqlDC);
			$resultadoDC = $sentenciaDC -> execute();
		}
		echo $resultadoDC;
		break;
	case 'departamentos':
		$sql1 = "SELECT Id, Nombre FROM Departamentos ORDER BY Nombre";
		$sentencia1 = $conexion -> prepare($sql1);
		$sentencia1 -> execute();
		$departamentos = $sentencia1 -> fetchAll();

		echo $opcion1 = '<option label="Seleccione" selected></option>';

		foreach ($departamentos as $departamento) {
			echo $opcion1 = "<option value='".$departamento['Id']."'>".$departamento['Nombre']."</option>";
		}
		break;
	case 'municipios':
		$sql1 = "SELECT Id, Nombre FROM Municipios WHERE Id_departamento = '$id_departamento' ORDER BY Nombre";
		$sentencia1 = $conexion -> prepare($sql1);
		$sentencia1 -> execute();
		$municipios = $sentencia1 -> fetchAll();

		echo $opcion1 = '<option label="Seleccione" selected></option>';

		foreach ($municipios as $municipio) {
			echo $opcion1 = "<option value='".$municipio['Id']."'>".$municipio['Nombre']."</option>";
		}
		break;
	case 'centros-educativos':
		$sql1 = "SELECT Id, Nombre, Sede FROM Centros_educativos WHERE Sector = '$sector' ORDER BY Nombre";
		$sentencia1 = $conexion -> prepare($sql1);
		$sentencia1 -> execute();
		$centros_educativos = $sentencia1 -> fetchAll();

		echo $opcion1 = "<option value='0'>Seleccione</option>";

		foreach ($centros_educativos as $centro_educativo) {
			echo $opcion1 = "<option value='".$centro_educativo['Id']."'>".$centro_educativo['Nombre']."-".$centro_educativo['Sede']."</option>";
		}
		break;
	case 'equipos-persona':
		$sql1 = "SELECT Id, Nombre FROM equipos WHERE Id_rama = '$id_rama'";
		$sentencia1 = $conexion -> prepare($sql1);
		$sentencia1 -> execute();
		$equipos_rama = $sentencia1 -> fetchAll();

		echo $opcion1 = "<option value='0'>Seleccione</option>";
		foreach ($equipos_rama as $equipo) {
			echo $opcion1 = "<option value='".$equipo['Id']."'>".$equipo['Nombre']."</option>";
		}
		break;
}
?>