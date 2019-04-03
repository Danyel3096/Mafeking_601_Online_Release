<?php
class Rama {
	private $id;
	private $nombre;
	private $imagen;
	private $lineamiento;
	private $foto_historica;
	private $historia;
	private $ley;
	private $promesa;
	private $lema;
		
	public function __construct($id, $nombre, $imagen, $lineamiento, $foto_historica, $historia, $ley, $promesa, $lema) {
		$this -> id = $id;
		$this -> nombre = $nombre;
		$this -> imagen = $imagen;
		$this -> lineamiento = $lineamiento;
		$this -> foto_historica = $foto_historica;
		$this -> historia = $historia;
		$this -> ley = $ley;
		$this -> promesa = $promesa;
		$this -> lema = $lema;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerNombre() {
		return $this -> nombre;
	}

	public function obtenerImagen() {
		return $this -> imagen;
	}

	public function obtenerLineamiento() {
		return $this -> lineamiento;
	}

	public function obtenerFotoHistorica() {
		return $this -> foto_historica;
	}

	public function obtenerHistoria() {
		return $this -> historia;
	}

	public function obtenerLey() {
		return $this -> ley;
	}

	public function obtenerPromesa() {
		return $this -> promesa;
	}

	public function obtenerLema() {
		return $this -> lema;
	}
}
?>