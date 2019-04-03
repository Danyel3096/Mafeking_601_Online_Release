<?php
class DetalleIntendencia {
	private $id_evento;
	private $id_intendencia;
	
	public function __construct($id_evento, $id_intendencia) {
		$this -> id_evento = $id_evento;
		$this -> id_intendencia = $id_intendencia;
	}

	public function obtenerIdEvento() {
		return $this -> id_evento;
	}

	public function obtenerIdIntendencia() {
		return $this -> id_intendencia;
	}

	public function cambiarIdEvento($id_evento) {
		return $this -> $id_evento;
	}

	public function cambiarIdIntendencia($id_intendencia) {
		return $this -> $id_intendencia;
	}
}
?>