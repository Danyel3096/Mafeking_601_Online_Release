<?php
class DetalleResponsable {
	private $numero_cedula;
	private $numero_documento;
	
	public function __construct($numero_cedula, $numero_documento) {
		$this -> numero_cedula = $numero_cedula;
		$this -> numero_documento = $numero_documento;
	}

	public function obtenerNumeroCedula() {
		return $this -> numero_cedula;
	}

	public function obtenerNumeroDocumento() {
		return $this -> numero_documento;
	}

	public function cambiarNumeroCedula($numero_cedula) {
		return $this -> $numero_cedula;
	}

	public function cambiarNumeroDocumento($numero_documento) {
		return $this -> $numero_documento;
	}
}
?>