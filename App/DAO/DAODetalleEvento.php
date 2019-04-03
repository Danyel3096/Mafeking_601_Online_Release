<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/DetalleEvento.php';

class DAODetalleEvento {
	public static function insertarDetalleEvento($conexion, $detalle_evento) {
			$detalle_evento_insertado = false;

			if (isset($conexion)) {
				try {
					$sql = "INSERT INTO detalle_evento(Codigo_evento, Codigo_rama) VALUES(:Codigo_evento, :Codigo_rama)";
					$codigoeventotemp = $detalle_evento -> obtenerCodigoEvento();
					$codigoramatemp = $detalle_evento -> obtenerCodigoRama();
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Codigo_evento', $codigoeventotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Codigo_rama', $codigoramatemp, PDO::PARAM_STR);
					$detalle_evento_insertado = $sentencia -> execute();
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_evento_insertado;
		}

	public static function consultarTodos($conexion) {
		$detalle_evento = array();
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/DetalleEvento.php';
				$sql = "SELECT * FROM detalle_evento";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$detalle_evento[] = new DetalleEvento($fila['Codigo_evento'], $fila['Codigo_rama'], $fila['Sede'], $fila['Etapa_educativa'], $fila['Cuso'], $fila['Carrera']);
						}
					} else {
						print "No hay centros educativos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_evento;
		}

		public static function obtenerNumeroCentrosEducativos($conexion) {
			$total_acudientes = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM detalle_evento";
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

	public static function modificarDetalleEvento($conexion, $detalle_evento) {
		return ;
	}
}
?>