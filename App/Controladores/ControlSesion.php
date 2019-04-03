<?php
include_once 'App/DAO/DAOPersona.php';

class ControlSesion {
	private $persona;
	private $error;

	public function __construct($texto, $clave, $conexion) {
		$this -> error = "";

		if (!$this -> variableIniciada($texto) || !$this -> variableIniciada($clave)) {
			$this -> persona = null;
			$this -> error = "Debes introducir tu correo electrónico o numero de documento y tu contraseña";
		} else {
			if ($this -> persona = DAOPersona :: consultarPersonaPorTotem($conexion, $texto)) {
			} else if ($this -> persona = DAOPersona :: consultarPersonaPorCorreo($conexion, $texto)) {
			} else {
			$this -> persona = DAOPersona :: consultarPersonaPorNumeroDocumento($conexion, $texto);
			}
		}

		if (is_null($this -> persona) || !password_verify($clave, $this -> persona -> obtenerClave())) { 
			$this -> error = "Datos incorrectos";
		}
	}

	private function variableIniciada($variable) {
		if (isset($variable) && !empty($variable)) {
			return true;
		} else {
			return false;
		}
	}

	public function obtenerPersona() {
		return $this -> persona;
	}

	public function obtenerError() {
		return $this -> error;
	}

	public function mostrarError() {
		if ($this -> error !== '') {
			echo "<br><div class='alert alert-danger' role='alert'>";
			echo $this -> error;
			echo "</div><br>";
		}
	}

	public static function iniciarSesion($id, $nombre) {
		if(session_id() == '') {
			session_start();	
		}
		$_SESSION['id'] = $id;
		$_SESSION['nombre'] = $nombre;
	}

	public static function cerrarSesion() {
		if(session_id() == '') {
			session_start();
		}
		if(isset($_SESSION['id'])) {
			unset($_SESSION['id']);
		}
		if(isset($_SESSION['nombre'])) {
			unset($_SESSION['nombre']);
		}
		session_destroy();
	}

	public static function sesionIniciada() {
		if(session_id() == '') {
			session_start();
		}
		if(isset($_SESSION['id']) && isset($_SESSION['nombre'])) {
			return true;
		} else {
			return false;
		}
	}
}
?>
