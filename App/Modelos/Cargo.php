<?php
class Cargo {
	private $id;
	private $nombre;
	private $descripcion;

	public function __construct($id, $nombre, $descripcion) {
		$this -> id = $id;
		$this -> nombre = $nombre;
		$this -> descripcion = $descripcion;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerNombre() {
		return $this -> nombre;
	}

	public function obtenerDescripcion() {
		return $this -> descripcion;
	}
}
?>