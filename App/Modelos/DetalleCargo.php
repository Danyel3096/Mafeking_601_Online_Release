<?php
class DetalleCargo {
	private $id_persona;
	private $id_cargo;
	private $id_equipo;

	public function __construct($id_persona, $id_cargo, $id_equipo) {
		$this -> id_persona = $id_persona;
		$this -> id_cargo = $id_cargo;
		$this -> id_equipo = $id_equipo;
	}

	public function obtenerIdPersona() {
		return $this -> id_persona;
	}

	public function obtenerIdCargo() {
		return $this -> id_cargo;
	}

	public function obtenerIdEquipo() {
		return $this -> id_equipo;
	}
}
?>