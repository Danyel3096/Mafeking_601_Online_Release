<?php
class Noticia {
	private $id;
	private $titulo;
	private $imagen;
	private $texto;
	private $fecha;
	private $hora;
	private $url;
	private $estado;
	private $id_persona;

	public function __construct($id, $titulo, $imagen, $texto, $fecha, $hora, $url, $estado, $id_persona) {
		$this -> id = $id;
		$this -> titulo = $titulo;
		$this -> imagen = $imagen;
		$this -> texto = $texto;
		$this -> fecha = $fecha;
		$this -> hora = $hora;
		$this -> url = $url;
		$this -> estado = $estado;
		$this -> id_persona = $id_persona;
	}

	public function obtenerId() {
		return $this -> id;
	}

	public function obtenerTitulo() {
		return $this -> titulo;
	}

	public function obtenerImagen() {
		return $this -> imagen;
	}

	public function obtenerTexto() {
		return $this -> texto;
	}

	public function obtenerFecha() {
		return $this -> fecha;
	}

	public function obtenerHora() {
		return $this -> hora;
	}

	public function obtenerUrl() {
		return $this -> url;
	}

	public function obtenerEstado() {
		return $this -> estado;
	}

	public function obtenerIdPersona() {
		return $this -> id_persona;
	}
}
?>