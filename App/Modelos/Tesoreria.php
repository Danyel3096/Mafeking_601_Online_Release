<?php
class Tesoreria {
	private $id;
	private $detalle;
	private $tipo;
	private $fecha;
	private $valor;
	private $id_rama;
		
	public function __construct($id, $detalle, $tipo, $fecha, $valor, $id_rama) {
		$this -> id = $id;
		$this -> detalle = $detalle;
		$this -> tipo = $tipo;
		$this -> fecha = $fecha;
		$this -> valor = $valor;
		$this -> id_rama = $id_rama;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerDetalle() {
		return $this -> detalle;
	}

	public function obtenerTipo() {
		return $this -> tipo;
	}

	public function obtenerFecha() {
		return $this -> fecha;
	}

	public function obtenerValor() {
		return $this -> valor;
	}

	public function obtenerIdRama() {
		return $this -> id_rama;
	}

	public function cambiarDetalle($detalle) {
		return $this -> $detalle;
	}

	public function cambiarTipo($tipo) {
		return $this -> $tipo;
	}

	public function cambiarFecha($fecha) {
		return $this -> $fecha;
	}

	public function cambiarValor($valor) {
		return $this -> $valor;
	}
}
?>