<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Cargo.php';
class DAOCargo {
		public static function consultarCargoPorId($conexion, $id_cargo) {
			$cargo = null;

			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Cargo.php';
					$sql = "SELECT * FROM Cargos WHERE Id = :Id";
					$sentencia = $conexion -> prepare($sql);	
					$sentencia -> bindParam(':Id', $id_cargo, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					if (!empty($resultado)) {
						$cargo = new Cargo($resultado['Id'], $resultado['Nombre'], $resultado['Descripcion']);
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $cargo;
		}

		public static function consultarNumeroCargosPorIdRama($conexion, $id_rama) {
			$total_cargos = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM Cargos WHERE Id_rama = :Id_rama";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> execute();
					$resultado = $sentencia -> fetchAll();
					$total_cargos = $resultado['total'];
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $total_cargos;
		}
	}
?>