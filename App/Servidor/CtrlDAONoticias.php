<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-persona-noticia']) && !empty($_POST['Id-persona-noticia'])) {
	if (!is_nan($_POST['Id-persona-noticia']) && $_POST['Id-persona-noticia'] > 0) {
    	$id_persona = $_POST['Id-persona-noticia'];
	}
}
if(isset($_POST['Id-noticia']) && !empty($_POST['Id-noticia'])) {
	if (!is_nan($_POST['Id-noticia']) && $_POST['Id-noticia'] > 0) {
    	$id_noticia = $_POST['Id-noticia'];
    }
} else {
	$id_noticia = '';
}
if(isset($_POST['Titulo-noticia']) && !empty($_POST['Titulo-noticia'])) {
	if (strlen($_POST['Titulo-noticia']) >= 3 && strlen($_POST['Titulo-noticia']) <= 60) {
		$titulo_noticia = $_POST['Titulo-noticia'];
		$url_noticia = str_replace(" ", "-", strtolower($titulo_noticia));
	}
}
if(isset($_POST['Cuerpo-noticia']) && !empty($_POST['Cuerpo-noticia'])) {
	if (strlen($_POST['Cuerpo-noticia']) >= 3) {
		$cuerpo_noticia = $_POST['Cuerpo-noticia'];
	}
}
if(isset($_POST['Cuerpo-comentario']) && !empty($_POST['Cuerpo-comentario'])) {
	if (strlen($_POST['Cuerpo-comentario']) >= 3) {
		$texto_comentario = $_POST['Cuerpo-comentario'];
	}
}
if(isset($_POST['Estado-noticia']) && !empty($_POST['Estado-noticia'])) {
	if (strlen($_POST['Estado-noticia']) >= 3 && strlen($_POST['Estado-noticia']) <= 12) {
		$estado_noticia = $_POST['Estado-noticia'];
	}
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}
switch ($accion) {
	case 'insertar-actualizar-noticia':
		$sql = "INSERT INTO noticias (Titulo, Imagen, Texto, Fecha, Hora, Url, Estado, Id_persona) VALUES ('$titulo_noticia', '', '$cuerpo_noticia', NOW(), NOW(), '$url_noticia', '$estado_noticia', '$id_persona') ON DUPLICATE KEY UPDATE Titulo='$titulo_noticia', Texto='$cuerpo_noticia', Fecha=NOW(), Hora=NOW(), Url='$url_noticia', Estado='$estado_noticia', Id_persona='$id_persona'";
		$sentencia = $conexion -> prepare($sql);
		$respuesta = $sentencia -> execute();
		echo $respuesta;
		break;
	case 'eliminar':
		$sql = "DELETE FROM Noticias WHERE Id = '$id'";
		$sentencia = $conexion -> prepare($sql);
		$respuesta = $sentencia -> execute();
		if ($respuesta) {
			$sqlN = "INSERT INTO Control_cambios(Id_persona, Nombre_completo, Fecha_hora, Cambio, Nombre_tabla, Nombre_columna, Id_fila) VALUES('$id_persona','$nombre_completo', NOW(), 'Inserción', 'Noticias', 'Contenido o estado','$id') ON DUPLICATE KEY UPDATE Cambio = 'Actualización'";
			$sentenciaN = $conexion -> prepare($sqlN);
			$sentenciaN -> execute();
		}
		echo $respuesta;
		break;
	case 'tabla-noticia':
		$sql = "SELECT n.Id, n.Titulo, n.Imagen, n.Texto, n.Fecha, n.Hora, n.Url, n.Estado, n.Id_persona, COUNT(c.Id) AS 'cantidad_comentarios' ";
    			$sql .= "FROM Noticias n ";
    			$sql .= "LEFT JOIN comentarios c ON n.Id = c.Id_noticia ";
    			$sql .= "WHERE n.Estado = '$estado_noticia' ";
    			$sql .= "GROUP BY n.Id ";
    			$sql .= "ORDER BY n.Fecha DESC";
		$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$noticias = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
		if (!empty($noticias)) {
			for ($i=0; $i < count($noticias); $i++) {
				$arreglo["data"][] = $noticias[$i];
			}
		} else {
			array_push($arreglo["data"][], '', '', '');
		}
		echo json_encode($arreglo);
		break;
	case 'insertar-comentario':
		$sql = "INSERT INTO comentarios (Texto, Fecha, Hora, Id_noticia, Id_persona) VALUES ('$texto_comentario', NOW(), NOW(), '$id_noticia', '$id_persona')";
		$sentencia = $conexion -> prepare($sql);
		$respuesta = $sentencia -> execute();
		echo $respuesta;
		break;
	case 'comentarios-noticia':
		$sql = "SELECT c.Texto, c.Fecha, c.Hora, hv.Foto, p.Nombres, p.Apellidos FROM comentarios c LEFT JOIN personas p ON c.Id_persona = p.Id LEFT JOIN hojas_vida hv ON p.Id = hv.Id WHERE Id_noticia = '$id_noticia'";
		$sentencia = $conexion -> prepare($sql);
		$sentencia -> execute();
		$comentarios_noticia = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
		if (!empty($comentarios_noticia)) {
			for ($i=0; $i < count($comentarios_noticia); $i++) { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
									<img id="img-persona-comentario" src="<?php if(!empty($comentarios_noticia[$i]['Foto'])) {
										echo SERVIDOR.'/Archivos/Subidas/Perfiles/Fotos/'.$comentarios_noticia[$i]['Foto'];
									} else {
										echo SERVIDOR.'/Archivos/Imagenes/usuario.jpg';
									} ?>" />
									<?php echo $comentarios_noticia[$i]['Nombres']." ".$comentarios_noticia[$i]['Apellidos']; ?>
									</div>
									<div class="col-md-9">
										<p>
										<?php echo $comentarios_noticia[$i]['Fecha']." a las ".$comentarios_noticia[$i]['Hora']; ?>
										</p>
										<p>
										<?php echo nl2br($comentarios_noticia[$i]['Texto']); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }
		} else { ?>
			<!--<div class="row">
				<div class="col-md-12 text-center">
				TODAVIA NO HAY COMENTARIOS
				</div>
			</div>-->
		<?php }
		break;
}
?>