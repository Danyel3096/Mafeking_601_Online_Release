<?php
class DetalleProgresion {
	private $id_nivel;
	private $id_requisito;
	private $numero_documento;
	private $estado;
	
	public function __construct($id_nivel, $id_requisito, $numero_documento, $estado) {
		$this -> id_nivel = $id_nivel;
		$this -> id_requisito = $id_requisito;
		$this -> numero_documento = $numero_documento;
		$this -> estado = $estado;
	}

	public function obtenerIdNivel() {
		return $this -> id_nivel;
	}

	public function obtenerIdRequisito() {
		return $this -> id_requisito;
	}

	public function obtenerNumeroDocumento() {
		return $this -> numero_documento;
	}

	public function obtenerEstado() {
		return $this -> estado;
	}

	public function cambiarIdNivel($id_nivel) {
		return $this -> $id_nivel;
	}

	public function cambiarIdRequisito($id_requisito) {
		return $this -> $id_requisito;
	}

	public function cambiarNumeroDocumento($numero_documento) {
		return $this -> $numero_documento;
	}

	public function cambiarEstado($estado) {
		return $this -> $estado;
	}
}
?>