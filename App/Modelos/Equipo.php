<?php
class Equipo {
	private $id;
	private $nombre;
	private $id_rama;

	public function __construct($id, $nombre, $id_rama) {
		$this -> id = $id;
		$this -> nombre = $nombre;
		$this -> id_rama = $id_rama;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerNombre() {
		return $this -> nombre;
	}

	public function obtenerIdRama() {
		return $this -> id_rama;
	}
}
?>