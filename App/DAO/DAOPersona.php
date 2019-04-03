<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';

class DAOPersona {
	public static function consultarTodas($conexion) {
		$personas = array();

		if (isset($conexion)) {
			try {
				include_once 'App/Modelos/Persona.php';
				$sql = "SELECT * FROM Personas";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$personas[] = new Persona($fila['Id'], $fila['Tipo_documento'], $fila['Numero_documento'], $fila['Genero'], $fila['Nombres'], $fila['Apellidos'], $fila['Fecha_nacimiento'], $fila['Celular'], $fila['Telefono'], $fila['Direccion'], $fila['Barrio'], $fila['Estrato'], $fila['Investidura'], $fila['Totem'], $fila['Correo'], $fila['Clave'], $fila['Estado'], $fila['Fecha_actividad'], $fila['Fecha_registro'], $fila['Id_municipio'], $fila['Id_centro_educativo']);
					}
				} else {
						print 'No hay personas';
					}
			} catch (PDOException $ex) {
					print "ERROR: " . $ex -> getMessage();
				}
		}
		return $personas;
	}
		public static function consultarPersonaPorId($conexion, $id) {
			$persona = null;
			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Persona.php';
					$sql = "SELECT * FROM Personas WHERE Id = :Id";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Id', $id, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					if (!empty($resultado)) {
						$persona = new Persona($resultado['Id'], $resultado['Tipo_documento'], $resultado['Numero_documento'], $resultado['Genero'], $resultado['Nombres'], $resultado['Apellidos'], $resultado['Fecha_nacimiento'], $resultado['Celular'], $resultado['Telefono'], $resultado['Direccion'], $resultado['Barrio'], $resultado['Estrato'], $resultado['Investidura'], $resultado['Totem'], $resultado['Correo'], $resultado['Clave'], $resultado['Estado'], $resultado['Fecha_actividad'], $resultado['Fecha_registro'], $resultado['Id_municipio'], $resultado['Id_centro_educativo']);
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $persona;
		}

		public static function consultarPersonaPorTotem($conexion, $totem) {
			$persona = null;

			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Persona.php';
					$sql = "SELECT * FROM Personas WHERE Totem = :Totem";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Totem', $totem, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					if (!empty($resultado)) {
						$persona = new Persona($resultado['Tipo_documento'], $resultado['Numero_documento'], $resultado['Genero'], $resultado['Nombres'], $resultado['Apellidos'], $resultado['Fecha_nacimiento'], $resultado['Celular'], $resultado['Telefono'], $resultado['Direccion'], $resultado['Barrio'], $resultado['Estrato'], $resultado['Investidura'], $resultado['Totem'], $resultado['Correo'], $resultado['Clave'], $resultado['Estado'], $resultado['Fecha_actividad'], $resultado['Fecha_registro'], $resultado['Id_municipio'], $resultado['Id_centro_educativo']);
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $persona;
		}

		public static function consultarPersonaPorCorreo($conexion, $correo) {
			$persona = null;

			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Persona.php';
					$sql = "SELECT * FROM personas WHERE Correo = :Correo";
					$sentencia = $conexion -> prepare($sql);	
					$sentencia -> bindParam(':Correo', $correo, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					if (!empty($resultado)) {
						$persona = new Persona($resultado['Id'], $resultado['Tipo_documento'], $resultado['Numero_documento'], $resultado['Genero'], $resultado['Nombres'], $resultado['Apellidos'], $resultado['Fecha_nacimiento'], $resultado['Celular'], $resultado['Telefono'], $resultado['Direccion'], $resultado['Barrio'], $resultado['Estrato'], $resultado['Investidura'], $resultado['Totem'], $resultado['Correo'], $resultado['Clave'], $resultado['Estado'], $resultado['Fecha_actividad'], $resultado['Fecha_registro'], $resultado['Id_municipio'], $resultado['Id_centro_educativo']);
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $persona;
		}

		public static function consultarPersonaPorNumeroDocumento($conexion, $numero_documento) {
			$persona = null;

			if (isset($conexion)) {
				try {
					include_once 'App/Modelos/Persona.php';
					$sql = "SELECT * FROM Personas WHERE Numero_documento = :Numero_documento";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Numero_documento', $numero_documento, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> fetch();
					if (!empty($resultado)) {
						$persona = new Persona($resultado['Id'], $resultado['Tipo_documento'], $resultado['Numero_documento'], $resultado['Genero'], $resultado['Nombres'], $resultado['Apellidos'], $resultado['Fecha_nacimiento'], $resultado['Celular'], $resultado['Telefono'], $resultado['Direccion'], $resultado['Barrio'], $resultado['Estrato'], $resultado['Investidura'], $resultado['Totem'], $resultado['Correo'], $resultado['Clave'], $resultado['Estado'], $resultado['Fecha_actividad'], $resultado['Fecha_registro'], $resultado['Id_municipio'], $resultado['Id_centro_educativo']);
					}
				} catch (PDOException $ex) {
					print 'ERROR: '. $ex -> getMessage();
				}
			}
			return $persona;
		}

		public static function actualizarClave($conexion, $numero_documento, $nueva_clave) {
			$actualizacion_correcta = false;
			if (isset($conexion)) {
				try {
					$sql = "UPDATE personas SET Clave = :Clave WHERE Numero_documento = :Numero_documento";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> bindParam(':Clave', $nueva_clave, PDO::PARAM_STR);
					$sentencia -> bindParam(':Numero_documento', $numero_documento, PDO::PARAM_STR);
					$sentencia -> execute();
					$resultado = $sentencia -> rowCount();
					if (count($resultado)) {
						$actualizacion_correcta = true;
					} else {
						$actualizacion_correcta = false;
					}
				} catch (PDOException $ex) {
					print 'ERROR: '.$ex -> getMessage();
				}
			}
			return $actualizacion_correcta;
		}
	}
?>