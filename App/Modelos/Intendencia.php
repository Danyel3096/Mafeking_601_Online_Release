<?php
class Intendencia {
	private $id;
	private $nombre;
	private $cantidad;
	private $fecha_recibido;
	private $estado;
	private $id_rama;
	
	public function __construct($id, $nombre, $cantidad, $fecha_recibido, $estado, $id_rama) {
		$this -> id = $id;
		$this -> nombre = $nombre;
		$this -> cantidad = $cantidad;
		$this -> fecha_recibido = $fecha_recibido;
		$this -> estado = $estado;
		$this -> id_rama = $id_rama;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerNombre() {
		return $this -> nombre;
	}

	public function obtenerCantidad() {
		return $this -> cantidad;
	}

	public function obtenerFechaRecibido() {
		return $this -> fecha_recibido;
	}

	public function obtenerEstado() {
		return $this -> estado;
	}

	public function obtenerIdRama() {
		return $this -> id_rama;
	}

	public function cambiarNombre($nombre) {
		return $this -> $nombre;
	}

	public function cambiarCantidad($cantidad) {
		return $this -> $cantidad;
	}

	public function cambiarFechaRecibido($fecha_recibido) {
		return $this -> $fecha_recibido;
	}

	public function cambiarEstado($estado) {
		return $this -> $estado;
	}

	public function cambiarIdRama($id_rama) {
		return $this -> $id_rama;
	}
}
?>