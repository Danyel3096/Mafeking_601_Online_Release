<?php
class RecuperaClaves {
	private $id;
	private $numero_documento;
	private $enlace_web_secreto;
	private $fecha;

	public function __construct($id, $numero_documento, $enlace_web_secreto, $fecha) {
		$this -> id = $id;
		$this -> numero_documento = $numero_documento;
		$this -> enlace_web_secreto = $enlace_web_secreto;
		$this -> fecha = $fecha;
	}
}
?>