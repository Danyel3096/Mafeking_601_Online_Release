<?php
class DetalleAlmacen {
	private $id_almacen;
	private $numero_documento;
	
	public function __construct($id_almacen, $numero_documento) {
		$this -> id_almacen = $id_almacen;
		$this -> numero_documento = $numero_documento;
	}

	public function obtenerIdAlmacen() {
		return $this -> id_almacen;
	}

	public function obtenerNumeroDocumento() {
		return $this -> numero_documento;
	}

	public function cambiarIdAlmacen($id_almacen) {
		return $this -> $id_almacen;
	}

	public function cambiarNumeroDocumento($numero_documento) {
		return $this -> $numero_documento;
	}
}
?>