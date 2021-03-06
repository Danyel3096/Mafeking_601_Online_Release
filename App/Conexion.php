<?php
class Conexion {
	private static $conexion;
	public static function abrirConexion() {
		if (!isset(self::$conexion)) {
			try {
				include_once 'Configuracion.php';
				self::$conexion = new PDO('pgsql:host='.Nombre_servidor.'; port='.Puerto_base_datos.'; dbname='.Nombre_base_datos.'; user='.Nombre_usuario.'; password='.Clave);
				self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $ex) {
				print "ERROR: " . $ex -> getMessage() . "<br>";
				die();
			}
		}
	}

	public static function cerrarConexion() {
		if (isset(self::$conexion)) {
			self::$conexion = null;
		}
	}

	public static function obtenerConexion() {
		return self::$conexion;
	}
}
?>