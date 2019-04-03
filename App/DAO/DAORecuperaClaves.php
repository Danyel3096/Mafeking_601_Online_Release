<?php
class DAORecuperaClaves {
	
	public static function generarPeticion($conexion, $numero_documento, $enlace_web_secreto) {
		$peticion_generada = false;
		if (isset($conexion)) {
			try {
				$sql = "INSERT INTO Recupera_claves(Numero_documento, Enlace_web_secreto, Fecha) VALUES (:Numero_documento, :Enlace_web_secreto, NOW())";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':Numero_documento', $numero_documento, PDO::PARAM_INT);
				$sentencia -> bindParam(':Enlace_web_secreto', $enlace_web_secreto, PDO::PARAM_STR);
				$peticion_generada = $sentencia -> execute();
			} catch (PDOException $ex) {
				print 'ERROR: '. $ex -> getMessage();
			}
		}
		return $peticion_generada;
	}

	public static function enlaceSecretoExiste($conexion, $enlace_web_secreto) {
		$enlace_web_existe = false;
			if (isset($conexion)) {
				try {
					$sql = "SELECT * FROM recupera_claves WHERE Enlace_web_secreto = :Enlace_web_secreto";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Enlace_web_secreto', $enlace_web_secreto, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetchAll();

					if (count($resultado)) {
						$enlace_web_existe = true;
					} else {
						$enlace_web_existe = false;
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $enlace_web_existe;
	}

	public static function obtenerNumeroDocumentoPorEnlaceWebSecreto($conexion, $enlace_web_secreto) {
		$numero_documento = null;
			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/RecuperacionClave.php';
					$sql = "SELECT * FROM recupera_claves WHERE Enlace_web_secreto = :Enlace_web_secreto";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Enlace_web_secreto', $enlace_web_secreto, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();

					if (!empty($resultado)) {
						$numero_documento = $resultado['Numero_documento'];
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $numero_documento;
	}
}
?>