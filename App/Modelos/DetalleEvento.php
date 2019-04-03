<?php
class DetalleEvento {
	private $id_evento;
	private $id_rama;
	
	public function __construct($id_evento, $id_rama) {
		$this -> id_evento = $id_evento;
		$this -> id_rama = $id_rama;
	}

	public function obtenerIdEvento() {
		return $this -> id_evento;
	}

	public function obtenerIdRama() {
		return $this -> id_rama;
	}

	public function cambiarIdEvento($id_evento) {
		return $this -> $id_evento;
	}

	public function cambiarIdRama($id_rama) {
		return $this -> $id_rama;
	}
}
?>