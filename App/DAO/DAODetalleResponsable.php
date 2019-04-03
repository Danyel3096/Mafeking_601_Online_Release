<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/DetalleResponsable.php';

class DAODetalleResponsable {
	public static function insertarDetalleResponsable($conexion, $detalle_responsable) {
			$detalle_responsable_insertado = false;

			if (isset($conexion)) {
				try {
					$sql = "INSERT INTO detalle_responsable(Numero_cedula, Numero_documento) VALUES(:Numero_cedula, :Numero_documento)";
					$numerocedulatemp = $detalle_responsable -> obtenerNumeroCedula();
					$numerodocumentotemp = $detalle_responsable -> obtenerNumeroDocumento();
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Numero_cedula', $numerocedulatemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Numero_documento', $numerodocumentotemp, PDO::PARAM_STR);
					$detalle_responsable_insertado = $sentencia -> execute();
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_responsable_insertado;
		}

	public static function consultarTodos($conexion) {
		$detalle_responsable = array();
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/DetalleResponsable.php';
				$sql = "SELECT * FROM detalle_responsable";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$detalle_responsable[] = new DetalleResponsable($fila['Numero_cedula'], $fila['Numero_documento'], $fila['Sede'], $fila['Etapa_educativa'], $fila['Cuso'], $fila['Carrera']);
						}
					} else {
						print "No hay centros educativos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_responsable;
		}

		public static function obtenerNumeroCentrosEducativos($conexion) {
			$total_acudientes = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM detalle_responsable";
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

	public static function modificarDetalleResponsable($conexion, $detalle_responsable) {
		return ;
	}
}
?>