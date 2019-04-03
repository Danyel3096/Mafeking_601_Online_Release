<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/DetalleParticipante.php';

class DAODetalleParticipante {
	public static function insertarDetalleParticipante($conexion, $detalle_participante) {
			$detalle_participante_insertado = false;

			if (isset($conexion)) {
				try {
					$sql = "INSERT INTO detalle_participante(Codigo_evento, Numero_documento) VALUES(:Codigo_evento, :Numero_documento)";
					$codigoeventotemp = $detalle_participante -> obtenerCodigoEvento();
					$numerodocumentotemp = $detalle_participante -> obtenerNumeroDocumento();
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Codigo_evento', $codigoeventotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Numero_documento', $numerodocumentotemp, PDO::PARAM_STR);
					$detalle_participante_insertado = $sentencia -> execute();
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_participante_insertado;
		}

	public static function consultarTodos($conexion) {
		$detalle_participante = array();
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/DetalleParticipante.php';
				$sql = "SELECT * FROM detalle_participante";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$detalle_participante[] = new DetalleParticipante($fila['Codigo_evento'], $fila['Numero_documento'], $fila['Sede'], $fila['Etapa_educativa'], $fila['Cuso'], $fila['Carrera']);
						}
					} else {
						print "No hay centros educativos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $detalle_participante;
		}

		public static function obtenerNumeroCentrosEducativos($conexion) {
			$total_acudientes = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM detalle_participante";
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

	public static function modificarDetalleParticipante($conexion, $detalle_participante) {
		return ;
	}
}
?>