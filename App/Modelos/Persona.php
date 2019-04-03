<?php
class Persona {
	private $id;
	private $tipo_documento;
	private $numero_documento;
	private $genero;
	private $nombres;
	private $apellidos;
	private $fecha_nacimiento;
	private $celular;
	private $telefono;
	private $direccion;
	private $barrio;
	private $estrato;
	private $investidura;
	private $totem;
	private $correo;
	private $clave;
	private $estado;
	private $fecha_actividad;
	private $fecha_registro;
	private $id_municipio;
	private $id_centro_educativo;
	
	public function __construct($id, $tipo_documento, $numero_documento, $genero, $nombres, $apellidos, $fecha_nacimiento, $celular, $telefono, $direccion, $barrio, $estrato, $investidura, $totem, $correo, $clave, $estado, $fecha_actividad, $fecha_registro, $id_municipio, $id_centro_educativo) {
		$this -> id = $id;
		$this -> tipo_documento = $tipo_documento;
		$this -> numero_documento = $numero_documento;
		$this -> genero = $genero;
		$this -> nombres = $nombres;
		$this -> apellidos = $apellidos;
		$this -> fecha_nacimiento = $fecha_nacimiento;
		$this -> celular = $celular;
		$this -> telefono = $telefono;
		$this -> direccion = $direccion;
		$this -> barrio = $barrio;
		$this -> estrato = $estrato;
		$this -> investidura = $investidura;
		$this -> totem = $totem;
		$this -> correo = $correo;
		$this -> clave = $clave;
		$this -> estado = $estado;
		$this -> fecha_actividad = $fecha_actividad;
		$this -> fecha_registro = $fecha_registro;
		$this -> id_municipio = $id_municipio;
		$this -> id_centro_educativo = $id_centro_educativo;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerTipoDocumento() {
		return $this -> tipo_documento;
	}

	public function obtenerNumeroDocumento() {
		return $this -> numero_documento;
	}

	public function obtenerGenero() {
		return $this -> genero;
	}

	public function obtenerNombres() {
		return $this -> nombres;
	}

	public function obtenerApellidos() {
		return $this -> apellidos;
	}

	public function obtenerFechaNacimiento() {
		return $this -> fecha_nacimiento;
	}

	public function obtenerCelular() {
		return $this -> celular;
	}

	public function obtenerTelefono() {
		return $this -> telefono;
	}

	public function obtenerDireccion() {
		return $this -> direccion;
	}

	public function obtenerBarrio() {
		return $this -> barrio;
	}

	public function obtenerEstrato() {
		return $this -> estrato;
	}

	public function obtenerInvestidura() {
		return $this -> investidura;
	}

	public function obtenerTotem() {
		return $this -> totem;
	}

	public function obtenerCorreo() {
		return $this -> correo;
	}

	public function obtenerClave() {
		return $this -> clave;
	}

	public function obtenerEstado() {
		return $this -> estado;
	}

	public function obtenerFechaActividad() {
		return $this -> fecha_actividad;
	}

	public function obtenerFechaRegistro() {
		return $this -> fecha_registro;
	}

	public function obtenerIdMunicipio() {
		return $this -> id_municipio;
	}

	public function obtenerIdCentroEducativo() {
		return $this -> id_centro_educativo;
	}
}
?>