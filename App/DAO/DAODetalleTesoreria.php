<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/DetalleTesoreria.php';

class DAODetalleTesoreria {
	public static function insertarDetalleTesoreria($conexion, $detalle_tesoreria) {
			$detalle_tesoreria_insertado = false;

			if (isset($conexion)) {
				try {
					$sql = "INSERT INTO detalle_tesoreria(Codigo_tesoreria, Numero_documento) VALUES(:Codigo_tesoreria, :Numero_documento)";
					$codigotesoreriatemp = $detalle_tesoreria -> obtenerCodigoTesoreria();
					$numerodocumentotemp = $detalle_tesoreria -> obtenerNumeroDocumento();
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Codigo_tesoreria', $codigotesoreriatemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Numero_documento', $numerodocumentotemp, PDO::PARAM_STR);
					$detalle_tesoreria_insertado = $sentencia -> execute();
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_tesoreria_insertado;
		}

	public static function consultarTodos($conexion) {
		$detalle_tesoreria = array();
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/DetalleTesoreria.php';
				$sql = "SELECT * FROM detalle_tesoreria";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$detalle_tesoreria[] = new DetalleTesoreria($fila['Codigo_tesoreria'], $fila['Numero_documento'], $fila['Sede'], $fila['Etapa_educativa'], $fila['Cuso'], $fila['Carrera']);
						}
					} else {
						print "No hay centros educativos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_tesoreria;
		}

		public static function obtenerNumeroCentrosEducativos($conexion) {
			$total_acudientes = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM detalle_tesoreria";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					$total_acudientes = $resultado['total'];
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $total_acudientes;
		}

	public static function modificarDetalleTesoreria($conexion, $detalle_tesoreria) {
		return ;
	}
}
?>