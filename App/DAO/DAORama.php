<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Rama.php';

class DAORama {
	public static function consultarTodas($conexion) {
		$ramas = array();
		
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/Rama.php';
				$sql = "SELECT * FROM Ramas";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$ramas[] = new Rama($fila['Id'], $fila['Nombre'], $fila['Lineamiento'], $fila['Historia']);
						}
					} else {
						print "No hay ramas";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
		return $ramas;
	}

	public static function consultarNumeroRamas($conexion) {
			$total_ramas = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM Ramas";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					$total_ramas = $resultado['total'];
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $total_ramas;
		}

	public static function consultarRamaPorId($conexion, $id_rama) {
		$rama = null;

		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/Rama.php';
				$sql = "SELECT * FROM Ramas WHERE Id = :Id";
				$sentencia = $conexion -> prepare($sql);	
				$sentencia -> bindParam(':Id', $id_rama, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();
				if (!empty($resultado)) {
					$rama = new Rama($resultado['Id'], $resultado['Nombre'], $resultado['Imagen'], $resultado['Lineamiento'], $resultado['Foto_historica'], $resultado['Historia'], $resultado['Ley'], $resultado['Promesa'], $resultado['Lema']);
				}
			} catch (PDOException $ex) {
				print 'ERROR: '. $ex -> getMessage();
			}
		}
		return $rama;
	}

	public static function consultarNombreRamas($conexion) {
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/Rama.php';
				$sql = "SELECT Nombre FROM Ramas";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();
			} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
		}
		return $resultado;
	}

	public static function modificarRama($conexion, $rama) {//Agregar cachorros por ejemplo
		return ;
	}
}
?>