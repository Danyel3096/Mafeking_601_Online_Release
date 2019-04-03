<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/Modelos/RecuperaClaves.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/DAO/DAORecuperaClaves.php';
include_once 'App/Redireccion.php';
function TextoAleatorio($longitud) {
	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$numero_caracteres = strlen($caracteres);
	$texto_aletorio = '';

	for ($i = 0; $i < $longitud; $i++) {
	$texto_aletorio .= $caracteres[rand(0, $numero_caracteres - 1)];
	}
	return $texto_aletorio;
}

if (isset($_POST['btn-correo'])) {
	$correo = $_POST['correo'];
	Conexion :: abrirConexion();
	$conexion = Conexion :: obtenerConexion();
	if (!DAOPersona::correoExiste($conexion, $correo)) {
		return;
	}
	$usuario = DAOPersona :: obtenerPersonaPorCorreo($conexion, $correo);
	$documento_usuario = $usuario -> obtenerNumeroDocumento();
	$texto_aletorio = TextoAleatorio(10);
	$enlace_web_secreto = hash('sha256', $texto_aletorio . $documento_usuario);//64 caracteres
	$peticion_generada = DAORecuperaClaves::generarPeticion($conexion, $documento_usuario, $enlace_web_secreto);
	Conexion :: cerrarConexion();
	if ($peticion_generada) {
		Redireccion :: redirigir(SERVIDOR);
	}
}
?>