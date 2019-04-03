<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Evento.php';

class DAOEvento {
	public static function insertarEvento($conexion, $evento) {
			$evento_insertado = false;

			if (isset($conexion)) {
				try {
					$sql = "INSERT INTO Eventos(title, start, end, Tipo, Lugar, Fecha_encuentro, Hora_encuentro, Punto_encuentro, Costo, Costo_incluye, Material_individual, Material_equipos, Ficha, color, textColor, Id_rama) VALUES(:title, :start, :end, :Tipo, :Lugar, :Fecha_encuentro, :Hora_encuentro, :Punto_encuentro, :Costo, :Costo_incluye, :Material_individual, :Material_equipos, :Ficha, :color, :textColor, :Id_rama)";
					$nombretemp = $evento -> obtenerNombre();
					$fechainiciotemp = $evento -> obtenerFechaInicio();
					$horainiciotemp = $evento -> obtenerHoraInicio();
					$inicio = $fechainiciotemp." ".$horainiciotemp;
					$fechacierretemp = $evento -> obtenerFechaCierre();
					$horacierretemp = $evento -> obtenerHoraCierre();
					$cierre = $fechacierretemp." ".$horacierretemp;
					$tipotemp = $evento -> obtenerTipo();
					$lugartemp = $evento -> obtenerLugar();
					$fechaencuentrotemp = $evento -> obtenerFechaEncuentro();
					$horaencuentrotemp = $evento -> obtenerHoraEncuentro();
					$puntoencuentrotemp = $evento -> obtenerPuntoEncuentro();
					$costotemp = $evento -> obtenerCosto();
					$costoincluyetemp = $evento -> obtenerCostoIncluye();
					$materialindividualtemp = $evento -> obtenerMaterialIndividual();
					$materialequipotemp = $evento -> obtenerMaterialEquipo();
					$fichatemp = $evento -> obtenerFicha();
					$colortemp = $evento -> obtenerColor();
					$colortextotemp = $evento -> obtenerColorTexto();
					$idramatemp = $evento -> obtenerIdRama();
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':title', $nombretemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':start', $iniciotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':end', $cierretemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Tipo', $tipotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Lugar', $lugartemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Fecha_encuentro', $fechaencuentrotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Hora_encuentro', $horaencuentrotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Punto_encuentro', $puntoencuentrotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Costo', $costotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Costo_incluye', $costoincluyetemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Material_individual', $materialindividualtemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Material_equipo', $materialequipotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Ficha', $fichatemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':color', $colortemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':textColor', $colortextotemp, PDO::PARAM_STR);
					$sentencia -> bindParam(':Id_rama', $idramatemp, PDO::PARAM_STR);
					$evento_insertado = $sentencia -> execute();
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $evento_insertado;
		}

	public static function consultarTodos($conexion) {
		$eventos = array();
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/Evento.php';
				$sql = "SELECT * FROM Eventos";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$eventos[] = new Evento($fila['Id'], $fila['title'], $fila['start'], $fila['end'], $fila['Tipo'], $fila['Lugar'], $fila['Fecha_encuentro'], $fila['Hora_encuentro'], $fila['Punto_encuentro'], $fila['Costo'], $fila['Costo_incluye'], $fila['Material_individual'], $fila['Material_equipos'], $fila['Ficha'], $fila['color'], $fila['textColor'], $fila['Id_rama']);
						}
					} else {
						print "No hay eventos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $eventos;
		}

		public static function consultarEventosPorIdRama($conexion, $id_rama) {
			$evento = null;

			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Evento.php';
					$sql = "SELECT * FROM Eventos WHERE Id_rama = :Id_rama";
					$sentencia = $conexion -> prepare($sql);	
					$sentencia -> bindParam(':Id_rama', $id_rama, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetchAll();
					if (count($resultado)) {
					foreach ($resultado as $fila) {
						$eventos[] = new Evento($fila['Id'], $fila['title'], $fila['start'], $fila['end'], $fila['Tipo'], $fila['Lugar'], $fila['Fecha_encuentro'], $fila['Hora_encuentro'], $fila['Punto_encuentro'], $fila['Costo'], $fila['Costo_incluye'], $fila['Material_individual'], $fila['Material_equipos'], $fila['Ficha'], $fila['color'], $fila['textColor'], $fila['Id_rama']);
						}
					} else {
						print "No hay eventos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $eventos;
		}

		public static function consultarNumeroEventos($conexion) {
			$total_eventos = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM Eventos";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					$total_eventos = $resultado['total'];
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $total_eventos;
		}

		public static function eventoExistente($conexion, $start) {
			$evento_existe = true;
			if (isset($conexion)) {
				try {
					$sql = "SELECT * FROM Eventos WHERE start = :start";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':start', $start, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetchAll();

					if (count($resultado)) {
						$evento_existe = true;
					} else {
						$evento_existe = false;
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $evento_existe;
		}

		public static function consultarFechaInicioEventos($conexion) {
		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/Evento.php';
				$sql = "SELECT start FROM Eventos";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':start', $start, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();
			} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
		}
		return $resultado;
	}

	public static function consultarEventoPorFecha($conexion, $start) {
			$evento = null;

			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Evento.php';
					$sql = "SELECT * FROM Eventos WHERE start = :start";
					$sentencia = $conexion -> prepare($sql);	
					$sentencia -> bindParam(':start', $start, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					if (!empty($resultado)) {
						$evento = new Evento($fila['Id'], $fila['title'], $fila['start'], $fila['end'], $fila['Tipo'], $fila['Lugar'], $fila['Fecha_encuentro'], $fila['Hora_encuentro'], $fila['Punto_encuentro'], $fila['Detalle'], $fila['Costo'], $fila['Ficha'], $fila['color'], $fila['textColor'], $fila['Id_rama']);
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $evento;
		}

		public static function consultarEventosPorRama($conexion, $id_rama) {
			$evento = null;

			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Evento.php';
					$sql = "SELECT Id, title, start, end, Tipo, Lugar, Fecha_encuentro, Hora_encuentro, Punto_encuentro, Costo, Costo_incluye, Material_individual, Material_equipos, Ficha, color, textColor, Id_Rama FROM Eventos WHERE Id_rama = :Id_rama";
					$sentencia = $conexion -> prepare($sql);	
					$sentencia -> bindParam(':Id_rama', $id_rama, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetchAll();
					if (count($resultado)) {
					foreach ($resultado as $fila) {
						$eventos[] = new Evento($fila['Id'], $fila['title'], $fila['start'], $fila['end'], $fila['Tipo'], $fila['Lugar'], $fila['Fecha_encuentro'], $fila['Hora_encuentro'], $fila['Punto_encuentro'], $fila['Costo'], $fila['Costo_incluye'], $fila['Material_individual'], $fila['Material_equipos'], $fila['Ficha'], $fila['color'], $fila['textColor'], $fila['Id_rama']);
						}
					} else {
						print "No hay eventos";
					}
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $eventos;
		}

		public static function consultarNumeroEventosPorRama($conexion, $id_rama) {
			$total_eventos = null;

			if (isset($conexion)) {
				try {
					$sql = "SELECT COUNT(*) as total FROM Eventos WHERE Id_rama = :Id_rama";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Id_rama', $id_rama, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					$total_eventos = $resultado['total'];
				} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
			}
			return $total_eventos;
		}

		public function modificarEvento($conexion, $evento) {
			return ;
		}

		public function eliminarEvento($conexion, $evento) {
			return ;
		}
	}
?>