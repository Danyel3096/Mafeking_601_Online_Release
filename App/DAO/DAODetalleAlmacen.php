<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/DetalleAlmacen.php';

class DAODetalleAlmacen {
	public static function insertarDetalleAlmacen($conexion, $detalle_almacen) {
			$detalle_almacen_insertado = false;

			if (isset($conexion)) {
				try {
					$sql = "INSERT INTO detalle_almacen(Codigo_almacen, Numero_documento) VALUES(:Codigo_almacen, :Numero_documento)";
					$codigoalmacentemp = $detalle_almacen -> obtenerCodigoAlmacen();
					$numerodocumentotemp = $detalle_almacen -> obtenerNumeroDocumento();
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Codigo_almacen', $codigoalmacentemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Numero_documento', $numerodocumentotemp, PDO::PARAM_STR);
					$detalle_almacen_insertado = $sentencia -> execute();
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_almacen_insertado;
		}

	public static function consultarTodos($conexion) {
		$detalle_almacen = array();
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/DetalleAlmacen.php';
				$sql = "SELECT * FROM detalle_almacen";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$detalle_almacen[] = new DetalleAlmacen($fila['Codigo_almacen'], $fila['Numero_documento'], $fila['Sede'], $fila['Etapa_educativa'], $fila['Cuso'], $fila['Carrera']);
						}
					} else {
						print "No hay centros educativos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_almacen;
		}

		public static function obtenerNumeroCentrosEducativos($conexion) {
			$total_acudientes = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM detalle_almacen";
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

	public static function modificarDetalleAlmacen($conexion, $detalle_almacen) {
		return ;
	}
}
?>