<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/Controladores/ControlSesion.php';
include_once 'App/Redireccion.php';

if(isset($_POST['btn-sesion'])) {
	Conexion :: abrirConexion();
	$validador = new ControlSesion($_POST['texto'], $_POST['acceso'], Conexion :: obtenerConexion());
	if ($validador -> obtenerError() === '' && !is_null($validador -> obtenerPersona())) {
		ControlSesion :: iniciarSesion($validador -> obtenerPersona() -> obtenerId(), $validador -> obtenerPersona() -> obtenerNombres());
		Redireccion :: redirigir(SERVIDOR);
	}
	Conexion :: cerrarConexion();
} else {
	Redireccion :: redirigir(SERVIDOR);
}
?>