<?php
class DetalleTesoreria {
	private $id_tesoreria;
	private $numero_documento;
	
	public function __construct($id_tesoreria, $numero_documento) {
		$this -> id_tesoreria = $id_tesoreria;
		$this -> numero_documento = $numero_documento;
	}

	public function obtenerIdTesoreria() {
		return $this -> id_tesoreria;
	}

	public function obtenerNumeroDocumento() {
		return $this -> numero_documento;
	}

	public function cambiarIdTesoreria($id_tesoreria) {
		return $this -> $id_tesoreria;
	}

	public function cambiarNumeroDocumento($numero_documento) {
		return $this -> $numero_documento;
	}
}
?>