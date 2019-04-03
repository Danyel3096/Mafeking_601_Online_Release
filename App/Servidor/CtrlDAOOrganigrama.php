<?php
include_once '../Conexion.php';
include_once '../Configuracion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();

if(isset($_POST['Nombres-apellido'])) {
	$nombres_apellido = $_POST['Nombres-apellido'];
}
if(isset($_POST['Totem'])) {
	$totem = $_POST['Totem'];
}
if(isset($_POST['Cargo'])) {
	$cargo = $_POST['Cargo'];
}
if(isset($_POST['Celular'])) {
	$celular = $_POST['Celular'];
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}

switch ($accion) {
	case 'tabla-organigrama':
		$sql1 = "SELECT * FROM organigrama ORDER BY Id";
		$sentencia1 = $conexion -> prepare($sql1);
		$sentencia1 -> execute();
		$organigrama1 = $sentencia1 -> fetchAll();

		$sql2 = "SELECT Id, Nombre FROM cargos WHERE Id_rama = '5'";//'$id_rama'
		$sentencia2 = $conexion -> prepare($sql2);
		$sentencia2 -> execute();
		$cargos = $sentencia2 -> fetchAll();

		for ($i=0; $i < count($organigrama1); $i++) {
			for ($j=0; $j < count($cargos); $j++) {
				if ($organigrama1[$i]['Id_cargo'] == $cargos[$j]['Id']) {
					$organigrama1[$i]['Cargo'] = $cargos[$j]['Nombre'];
					$arreglo["data"][] = array_unique($organigrama1[$i]);
				}
			}
		}
		echo json_encode($arreglo);
		break;
	case 'insertar-organigrama':
		$sqlT = "INSERT INTO organigrama (Id, Nombres_apellido, Totem, Celular, Id_cargo) VALUES('$id', '$nombres_apellido', '$totem', '$celular', '$id_cargo')";
		$sentenciaT = $conexion -> prepare($sqlT);
		$resultado = $sentenciaT -> execute();
		echo $resultado;
		break;
	default:
		$sql = "SELECT Id, Nombres_apellidos as name, Totem, Celular, Id_cargo FROM organigrama ORDER BY Id";
		$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$organigrama = $sentencia -> fetchAll();

		$sql4 = "SELECT Id, Nombre as title FROM cargos";
		$sentencia4 = $conexion -> prepare($sql4);
		$sentencia4 -> execute();
		$cargos = $sentencia4 -> fetchAll();

		for ($i=0; $i < count($organigrama); $i++) {
			for ($j=0; $j < count($cargos); $j++) { 
				if ($organigrama[$i]['Id_cargo'] == $cargos[$j]['Id']) {
					$organigrama[$i]['title'] = $cargos[$j]['title'];
				}
			}
		}

for ($i=0; $i < count($organigrama); $i++) {
	if ($organigrama[$i]['Id'] == '1' && !empty($organigrama[$i]['name'])) {
		$organigrama[$i]['className'] = 'grupo';
		$jefe_grupo = array_unique($organigrama[$i]);
	}
	if ($organigrama[$i]['Id'] == '2' && !empty($organigrama[$i]['name'])) {
		$organigrama[$i]['className'] = 'grupo';
		$subjefe_grupo = array_unique($organigrama[$i]);
		$jefe_grupo['children'][] = $subjefe_grupo;
	}
	if ($organigrama[$i]['Id'] == '10') {
		$organigrama[$i]['className'] = 'manada';
		$jefe_manada = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][] = $jefe_manada;
	}
	if ($organigrama[$i]['Id'] == '11') {
		$organigrama[$i]['className'] = 'manada';
		$subjefe_manada = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][0]['children'][] = $subjefe_manada;
	}
	if ($organigrama[$i]['Id'] >= '12' && $organigrama[$i]['Id'] <= '19') {
		$organigrama[$i]['className'] = 'manada';
		$apoyos_manada = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][0]['children'][0]['children'][] = $apoyos_manada;
	}
	if ($organigrama[$i]['Id'] == '20') {
		$organigrama[$i]['className'] = 'tropa';
		$jefe_tropa = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][] = $jefe_tropa;
	}
	if ($organigrama[$i]['Id'] == '21') {
		$organigrama[$i]['className'] = 'tropa';
		$subjefe_tropa = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][1]['children'][] = $subjefe_tropa;
	}
	if ($organigrama[$i]['Id'] >= '22' && $organigrama[$i]['Id'] <= '29') {
		$organigrama[$i]['className'] = 'tropa';
		$apoyos_tropa = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][1]['children'][0]['children'][] = $apoyos_tropa;
	}
	if ($organigrama[$i]['Id'] == '30') {
		$organigrama[$i]['className'] = 'comunidad';
		$jefe_comunidad = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][] = $jefe_comunidad;
	}
	if ($organigrama[$i]['Id'] == '31') {
		$organigrama[$i]['className'] = 'comunidad';
		$subjefe_comunidad = array_unique($organigrama[$i]);
		$jefe_comunidad['children'][] = $subjefe_comunidad;
		$jefe_grupo['children'][0]['children'][2]['children'][] = $subjefe_comunidad;
	}
	if ($organigrama[$i]['Id'] >= '32' && $organigrama[$i]['Id'] <= '39') {
		$organigrama[$i]['className'] = 'comunidad';
		$apoyos_comunidad = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][2]['children'][0]['children'][] = $apoyos_comunidad;
	}
	if ($organigrama[$i]['Id'] == '40') {
		$organigrama[$i]['className'] = 'clan';
		$jefe_clan = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][] = $jefe_clan;
	}
	if ($organigrama[$i]['Id'] == '41') {
		$organigrama[$i]['className'] = 'clan';
		$subjefe_clan = array_unique($organigrama[$i]);
		$jefe_grupo['children'][0]['children'][3]['children'][] = $subjefe_clan;
	}
	if ($organigrama[$i]['Id'] >= '42' && $organigrama[$i]['Id'] <= '49') {
		$organigrama[$i]['className'] = 'clan';
		$apoyos_clan = array_unique($organigrama[$i]);
		$jefe_clan['children'][0]['children'][] = $apoyos_clan;
	}
}
echo json_encode($jefe_grupo);
		break;
}
?>