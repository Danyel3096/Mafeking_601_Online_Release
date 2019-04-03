<?php
class Evento {
	private $id;
	private $nombre;
	private $inicio;
	private $cierre;
	private $tipo;
	private $lugar;
	private $fecha_encuentro;
	private $hora_encuentro;
	private $punto_encuentro;
	private $costo;
	private $costo_incluye;
	private $material_individual;
	private $material_equipos;
	private $ficha;
	private $color;
	private $color_texto;
	
	public function __construct($id, $nombre, $inicio, $cierre, $tipo, $lugar, $fecha_encuentro, $hora_encuentro, $punto_encuentro, $costo, $costo_incluye, $material_individual, $material_equipo, $ficha, $color, $color_texto) {
		$this -> id = $id;
		$this -> nombre = $nombre;
		$this -> inicio = $inicio;
		$this -> cierre = $cierre;
		$this -> tipo = $tipo;
		$this -> lugar = $lugar;
		$this -> fecha_encuentro = $fecha_encuentro;
		$this -> hora_encuentro = $hora_encuentro;
		$this -> punto_encuentro = $punto_encuentro;
		$this -> costo = $costo;
		$this -> costo_incluye = $costo_incluye;
		$this -> material_individual = $material_individual;
		$this -> material_equipo = $material_equipo;
		$this -> ficha = $ficha;
		$this -> color = $color;
		$this -> color_texto = $color_texto;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerNombre() {
		return $this -> nombre;
	}

	public function obtenerInicio() {
		return $this -> inicio;
	}

	public function obtenerCierre() {
		return $this -> cierre;
	}

	public function obtenerTipo() {
		return $this -> tipo;
	}

	public function obtenerLugar() {
		return $this -> lugar;
	}

	public function obtenerFechaEncuentro() {
		return $this -> fecha_encuentro;
	}

	public function obtenerHoraEncuentro() {
		return $this -> hora_encuentro;
	}

	public function obtenerPuntoEncuentro() {
		return $this -> punto_encuentro;
	}

	public function obtenerCosto() {
		return $this -> costo;
	}

	public function obtenerCostoIncluye() {
		return $this -> costo_incluye;
	}

	public function obtenerMaterialIndividual() {
		return $this -> material_individual;
	}

	public function obtenerMaterialEquipo() {
		return $this -> material_equipo;
	}
	
	public function obtenerFicha() {
		return $this -> ficha;
	}

	public function obtenerColor() {
		return $this -> color;
	}

	public function obtenerColorTexto() {
		return $this -> color_texto;
	}

	public function cambiarNombre($nombre) {
		return $this -> $nombre;
	}

	public function cambiarFechaInicio($fecha_inicio) {
		return $this -> $fecha_inicio;
	}

	public function cambiarHoraInicio($hora_inicio) {
		return $this -> $hora_inicio;
	}

	public function cambiarFechaCierre($fecha_cierre) {
		return $this -> $fecha_cierre;
	}

	public function cambiarHoraCierre($hora_cierre) {
		return $this -> $hora_cierre;
	}

	public function cambiarLugar($lugar) {
		return $this -> $lugar;
	}

	public function cambiarFechaEncuentro($fecha_encuentro) {
		return $this -> $fecha_encuentro;
	}

	public function cambiarHoraEncuentro($hora_encuentro) {
		return $this -> $hora_encuentro;
	}

	public function cambiarPuntoEncuentro($punto_encuentro) {
		return $this -> $punto_encuentro;
	}

	public function cambiarCosto($costo) {
		return $this -> $costo;
	}

	public function cambiarCostoIncluye($costo_incluye) {
		return $this -> $costo_incluye;
	}

	public function cambiarMaterialIndividual($material_individual) {
		return $this -> $material_individual;
	}

	public function cambiarMaterialEquipo($material_equipo) {
		return $this -> $material_equipo;
	}

	public function cambiarFicha($ficha) {
		return $this -> $ficha;
	}
}
?>