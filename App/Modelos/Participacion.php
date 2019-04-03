<?php
class Participacion {
	private $id;
	private $titulo_evento;
	private $resumen;
	private $id_rama;
	
	public function __construct($id, $titulo_evento, $resumen, $id_rama) {
		$this -> id = $id;
		$this -> titulo_evento = $titulo_evento;
		$this -> resumen = $resumen;
		$this -> id_rama = $id_rama;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerTituloEvento() {
		return $this -> titulo_evento;
	}

	public function obtenerResumen() {
		return $this -> resumen;
	}

	public function obtenerIdRama() {
		return $this -> id_rama;
	}
}
?>