<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/DetalleIntendencia.php';

class DAODetalleIntendencia {
	public static function insertarDetalleIntendencia($conexion, $detalle_intendencia) {
			$detalle_intendencia_insertado = false;

			if (isset($conexion)) {
				try {
					$sql = "INSERT INTO detalle_intendencia(Codigo_evento, Codigo_intendencia) VALUES(:Codigo_evento, :Codigo_intendencia)";
					$codigoeventotemp = $detalle_intendencia -> obtenerCodigoEvento();
					$codigointendenciatemp = $detalle_intendencia -> obtenerCodigoIntendencia();
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Codigo_evento', $codigoeventotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Codigo_intendencia', $codigointendenciatemp, PDO::PARAM_STR);
					$detalle_intendencia_insertado = $sentencia -> execute();
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_intendencia_insertado;
		}

	public static function consultarTodos($conexion) {
		$detalle_intendencia = array();
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/DetalleIntendencia.php';
				$sql = "SELECT * FROM detalle_intendencia";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$detalle_intendencia[] = new DetalleIntendencia($fila['Codigo_evento'], $fila['Codigo_intendencia'], $fila['Sede'], $fila['Etapa_educativa'], $fila['Cuso'], $fila['Carrera']);
						}
					} else {
						print "No hay centros educativos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_intendencia;
		}

		public static function obtenerNumeroCentrosEducativos($conexion) {
			$total_acudientes = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM detalle_intendencia";
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

	public static function modificarDetalleIntendencia($conexion, $detalle_intendencia) {
		return ;
	}
}
?>