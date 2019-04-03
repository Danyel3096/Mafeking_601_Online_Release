<?php
include_once '../Conexion.php';
include_once '../Configuracion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();

if(isset($_POST['accion'])) {
    $accion = $_POST['accion'];
} else {
    $accion = 'leer';
    $id_rama = $_POST['Id_rama'];
}

switch ($accion) {
	case 'ultimas-noticias':
		$sqlUN = "SELECT * FROM noticias WHERE Estado = 'Publicada' ORDER BY Fecha DESC LIMIT 3";
		$sentenciaUN = $conexion -> prepare($sqlUN);
		$sentenciaUN -> execute();
		$ultimas_noticias = $sentenciaUN -> fetchAll();
		foreach($ultimas_noticias as $ultima_noticia) {
		echo "<div class='row'>";
		echo "<div class='col-md-12'>";
		echo "<div class='card'>";
		echo "<div class='card-title text-center'><h6>".$ultima_noticia['Titulo']."</h6></div>";
		echo "<div class='card-body'>";
		echo "<p><strong>".$ultima_noticia['Fecha']." a las ".$ultima_noticia['Hora']."</strong></p>";
		echo "<div class='text-justify'>".nl2br(substr($ultima_noticia['Texto'].'...', 0, 403))."</div>";
		echo "<div class='text-center'><a class='btn btn-primary' href='".RUTA_NOTICIA."/".$ultima_noticia['Url']."' role='button'>Seguir leyendo</a></div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		}
		break;
	case 'imagenes-ramas-carrusel':
		$sqlIRC = "SELECT Imagen FROM ramas";
		$sentenciaIRC = $conexion -> prepare($sqlIRC);
		$sentenciaIRC -> execute();
		$imagenes_ramas = $sentenciaIRC -> fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($imagenes_ramas);
		break;
}
?>