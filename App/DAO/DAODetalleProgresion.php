<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/DetalleProgresion.php';

class DAODetalleProgresion {
	public static function insertarDetalleProgresion($conexion, $detalle_progresion) {
			$detalle_progresion_insertado = false;

			if (isset($conexion)) {
				try {
					$sql = "INSERT INTO detalle_progresion(Id_requisito, Numero_documento, Estado) VALUES(:Id_requisito, :Numero_documento, :Estado)";
					$idrequisitotemp = $detalle_progresion -> obtenerIdRequisito();
					$numerodocumentotemp = $detalle_progresion -> obtenerNumeroDocumento();
					$estadotemp = $detalle_progresion -> obtenerEstado();
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Id_requisito', $idrequisitotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Numero_documento', $numerodocumentotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Estado', $estadotemp, PDO::PARAM_STR);
					$detalle_progresion_insertado = $sentencia -> execute();
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_progresion_insertado;
		}

	public static function consultarTodos($conexion) {
		$detalle_progresion = array();
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/DetalleProgresion.php';
				$sql = "SELECT * FROM detalle_progresion";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$detalle_progresion[] = new DetalleProgresion($fila['Id_requisito'], $fila['Numero_documento'], $fila['Sede'], $fila['Etapa_educativa'], $fila['Cuso'], $fila['Carrera']);
						}
					} else {
						print "No hay centros educativos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_progresion;
		}

		public static function consultarDetalleProgresionPorNumeroDocumento_Nivel($conexion, $id_nivel, $numero_documento) {
		$detalle_progresion = array();
		
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/DetalleProgresion.php';
				$sql = "SELECT * FROM detalle_progresiones WHERE Numero_documento = :Numero_documento AND Id_nivel = :Id_nivel";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':Numero_documento', $numero_documento, PDO::PARAM_STR);
				$sentencia -> bindParam(':Id_nivel', $id_nivel, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$detalle_progresion[] = new DetalleProgresion($fila['Id_nivel'], $fila['Id_requisito'], $fila['Numero_documento'], $fila['Estado']);
						}
					} else {
						print "No hay requisitos de la persona";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
		return $detalle_progresion;
	}

	public static function consultarDetalleProgresionPorNumeroDocumento($conexion, $numero_documento) {
		$progresion_activa = false;
			if (isset($conexion)) {
				try {
					$sql = "SELECT * FROM detalle_progresiones WHERE Numero_documento = :Numero_documento";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Numero_documento', $numero_documento, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetchAll();

					if (count($resultado)) {
						$progresion_activa = true;
					} else {
						$progresion_activa = false;
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $progresion_activa;
	}

	public static function modificarDetalleProgresion($conexion, $detalle_progresion) {
		return ;
	}
}
?>