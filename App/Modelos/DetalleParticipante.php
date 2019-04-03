<?php
class DetalleParticipante {
	private $id_evento;
	private $numero_documento;
	
	public function __construct($id_evento, $numero_documento) {
		$this -> id_evento = $id_evento;
		$this -> numero_documento = $numero_documento;
	}

	public function obtenerIdEvento() {
		return $this -> id_evento;
	}

	public function obtenerNumeroDocumento() {
		return $this -> numero_documento;
	}

	public function cambiarIdEvento($id_evento) {
		return $this -> $id_evento;
	}

	public function cambiarNumeroDocumento($numero_documento) {
		return $this -> $numero_documento;
	}
}
?>