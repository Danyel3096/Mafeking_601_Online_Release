<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Equipo.php';
class DAOEquipo {
		public static function consultarEquipoPorId($conexion, $id_equipo) {
			$equipo = null;
			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Equipo.php';
					$sql = "SELECT * FROM equipos WHERE Id = :Id";
					$sentencia = $conexion -> prepare($sql);	
					$sentencia -> bindParam(':Id', $id_equipo, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					if (!empty($resultado)) {
						$equipo = new Equipo($resultado['Id'], $resultado['Nombre'], $resultado['Id_rama']);
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $equipo;
		}

		public static function consultarCargosPorIdRama($conexion, $id_rama) {
			$cargos = array();

		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/Cargo.php';
				$sql = "SELECT * FROM Cargos WHERE Id_rama = :Id_rama";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':Id_rama', $id_rama, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$cargos[] = new Cargo($fila['Id'], $fila['Nombre'], $fila['Descripcion'], $fila['Id_rama']);
					}
				} else {
						print 'No hay cargos';
					}
			} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
		}
		return $cargos;
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