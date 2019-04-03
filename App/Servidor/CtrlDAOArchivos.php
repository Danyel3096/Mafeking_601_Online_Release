<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['id-persona-foto']) && !empty($_POST['id-persona-foto'])){
    if (!is_nan($_POST['id-persona-foto']) && $_POST['id-persona-foto'] > 0) {
        $id_persona_foto = $_POST['id-persona-foto'];
    }
}
if(isset($_POST['id-persona-imagen-noticia']) && !empty($_POST['id-persona-imagen-noticia'])){
    if (!is_nan($_POST['id-persona-imagen-noticia']) && $_POST['id-persona-imagen-noticia'] > 0) {
        $id_persona_imagen_noticia = $_POST['id-persona-imagen-noticia'];
    }
}
if(isset($_POST['id-persona-imagen-evento']) && !empty($_POST['id-persona-imagen-evento'])){
    if (!is_nan($_POST['id-persona-imagen-evento']) && $_POST['id-persona-imagen-evento'] > 0) {
        $id_persona_imagen_evento = $_POST['id-persona-imagen-evento'];
    }
}
if(isset($_POST['id-imagen-evento']) && !empty($_POST['id-imagen-evento'])){
    if (!is_nan($_POST['id-imagen-evento']) && $_POST['id-imagen-evento'] > 0) {
        $id_imagen_evento = $_POST['id-imagen-evento'];
    }
}
if(isset($_POST['id-persona-ficha-evento']) && !empty($_POST['id-persona-ficha-evento'])){
    if (!is_nan($_POST['id-persona-ficha-evento']) && $_POST['id-persona-ficha-evento'] > 0) {
        $id_persona_ficha_evento = $_POST['id-persona-ficha-evento'];
    }
}
if(isset($_POST['id-ficha-evento']) && !empty($_POST['id-ficha-evento'])){
    if (!is_nan($_POST['id-ficha-evento']) && $_POST['id-ficha-evento'] > 0) {
        $id_ficha_evento = $_POST['id-ficha-evento'];
    }
}

$directorio_foto = "../../Archivos/Subidas/Perfiles/Fotos/";
if (!empty($_FILES['foto-previa']['tmp_name'])) {
    $archivo = $directorio_foto.basename($_FILES['foto-previa']['name']);
    $resultado_subida = true;
    $tipo_archivo = pathinfo($archivo, PATHINFO_EXTENSION);
    $nombre_extension_archivo = "Foto_".$id_persona_foto.".".$tipo_archivo;
    $comprobacion = getimagesize($_FILES['foto-previa']['tmp_name']);

    if ($comprobacion !== false) {
        $resultado_subida = true;
    } else {
        $resultado_subida = false;
    }

    if ($_FILES['foto-previa']['size'] > 500000) {
        echo 2;
        $resultado_subida = false;
    }

    if ($tipo_archivo != "jpg" && $tipo_archivo != "jpeg" && $tipo_archivo != "gif" && $tipo_archivo != "bmp" && $tipo_archivo != "png" && $tipo_archivo != "svg") {
        echo 3;
        $resultado_subida = false;
    }

    if ($resultado_subida == false) {
        echo 4;
    } else if (move_uploaded_file($_FILES['foto-previa']['tmp_name'], "../../Archivos/Subidas/Perfiles/Fotos/".$nombre_extension_archivo)) {
            $sql = "UPDATE hojas_vida SET Foto = '$nombre_extension_archivo' WHERE Id = '$id_persona_foto'";
            $sentencia = $conexion -> prepare($sql);
            $respuesta = $sentencia -> execute();
            echo $respuesta;
    } else {
        echo 5;
    }
}
$directorio_fondo = "../../Archivos/Subidas/Perfiles/Fondos/";
if (!empty($_FILES['fondo']['tmp_name'])) {
    $archivo = $directorio_fondo.basename($_FILES['fondo']['name']);
    $resultado_subida = true;
    $tipo_archivo = pathinfo($archivo, PATHINFO_EXTENSION);
    $nombre_extension_archivo = "Fondo_".$id_persona.".".$tipo_archivo;
    $comprobacion = getimagesize($_FILES['fondo']['tmp_name']);

    if ($comprobacion !== false) {
        $resultado_subida = true;
    } else {
        $resultado_subida = false;
    }

    if ($_FILES['fondo']['size'] > 500000) {
        echo 2;
        $resultado_subida = false;
    }

    if ($tipo_archivo != "jpg" && $tipo_archivo != "jpeg" && $tipo_archivo != "gif" && $tipo_archivo != "bmp" && $tipo_archivo != "png" && $tipo_archivo != "svg") {
        echo 3;
        $resultado_subida = false;
    }

    if ($resultado_subida == false) {
        echo 4;
    } else if (move_uploaded_file($_FILES['fondo']['tmp_name'], "../../Archivos/Subidas/Perfiles/Fondos/".$nombre_extension_archivo)) {
            $sql = "UPDATE personas SET Fondo= '$nombre_extension_archivo' WHERE Id=".$id_persona;
            $sentencia = $conexion -> prepare($sql);
            $respuesta = $sentencia -> execute();
            echo $respuesta;
    } else {
        echo 5;
    }
}

$directorio_noticias = "../../Archivos/Subidas/Noticias/";
if (!empty($_FILES['imagen-noticia']['tmp_name'])) {
    $sqlIN = "SELECT Id FROM noticias WHERE Id_persona = '$id_persona_imagen_noticia' ORDER BY Fecha DESC LIMIT 1";
    $sentenciaIN = $conexion -> prepare($sqlIN);
    $sentenciaIN -> execute();
    $id_archivo_noticia = $sentenciaIN -> fetch();

    $archivo = $directorio_noticias.basename($_FILES['imagen-noticia']['name']);
    $resultado_subida = true;
    $tipo_archivo = pathinfo($archivo, PATHINFO_EXTENSION);
    $nombre_extension_archivo = "Noticia_".$id_archivo_noticia['Id'].".".$tipo_archivo;
    $comprobacion = getimagesize($_FILES['imagen-noticia']['tmp_name']);

    if ($comprobacion !== false) {
        $resultado_subida = true;
    } else {
        $resultado_subida = false;
    }

    if ($_FILES['imagen-noticia']['size'] > 500000) {
        echo 2;
        $resultado_subida = false;
    }

    if ($tipo_archivo != "jpg" && $tipo_archivo != "jpeg" && $tipo_archivo != "gif" && $tipo_archivo != "bmp" && $tipo_archivo != "png" && $tipo_archivo != "svg") {
        echo 3;
        $resultado_subida = false;
    }

    if ($resultado_subida == false) {
        echo 4;
    } else if (move_uploaded_file($_FILES['imagen-noticia']['tmp_name'], "../../Archivos/Subidas/Noticias/".$nombre_extension_archivo)) {
        $sql = "UPDATE noticias SET Imagen = '$nombre_extension_archivo' WHERE Id=".$id_archivo_noticia['Id'];
        $sentencia = $conexion -> prepare($sql);
        $respuesta = $sentencia -> execute();
        echo $respuesta;
    } else {
        echo 5;
    }
}

$directorio_imagenes_eventos = "../../Archivos/Subidas/Eventos/Insignias_eventos/";
if (!empty($_FILES['imagen-evento']['tmp_name'])) {
    $archivo = $directorio_imagenes_eventos.basename($_FILES['imagen-evento']['name']);
    $resultado_subida = true;
    $tipo_archivo = pathinfo($archivo, PATHINFO_EXTENSION);
    $nombre_extension_archivo = "Insignia_".$id_imagen_evento.".".$tipo_archivo;
    $comprobacion = getimagesize($_FILES['imagen-evento']['tmp_name']);

    if ($comprobacion !== false) {
        $resultado_subida = true;
    } else {
        $resultado_subida = false;
    }

    if ($_FILES['imagen-evento']['size'] > 500000) {
        echo 2;
        $resultado_subida = false;
    }

    if ($tipo_archivo != "jpg" && $tipo_archivo != "jpeg" && $tipo_archivo != "gif" && $tipo_archivo != "bmp" && $tipo_archivo != "png" && $tipo_archivo != "svg") {
        echo 3;
        $resultado_subida = false;
    }

    if ($resultado_subida == false) {
        echo 4;
    } else if (move_uploaded_file($_FILES['imagen-evento']['tmp_name'], "../../Archivos/Subidas/Eventos/Insignias_eventos/".$nombre_extension_archivo)) {
        $sql = "UPDATE eventos SET Insignia = '$nombre_extension_archivo' WHERE Id = '$id_imagen_evento'";
        $sentencia = $conexion -> prepare($sql);
        $respuesta = $sentencia -> execute();
        echo $respuesta;
    } else {
        echo 5;
    }
}

$directorio_fichas_eventos = "../../Archivos/Subidas/Eventos/Fichas_eventos/";
if (!empty($_FILES['ficha-evento']['tmp_name'])) {
    $archivo = $directorio_fichas_eventos.basename($_FILES['ficha-evento']['name']);
    $resultado_subida = true;
    $tipo_archivo = pathinfo($archivo, PATHINFO_EXTENSION);
    $nombre_extension_archivo = "Ficha_".$id_ficha_evento.".".$tipo_archivo;
    $comprobacion = filesize($_FILES['ficha-evento']['tmp_name']);

    if ($comprobacion !== false) {
        $resultado_subida = true;
    } else {
        $resultado_subida = false;
    }

    if ($_FILES['ficha-evento']['size'] > 500000) {
        echo 2;
        $resultado_subida = false;
    }

    if ($tipo_archivo != "doc" && $tipo_archivo != "docx" && $tipo_archivo != "pdf" && $tipo_archivo != "odt" && $tipo_archivo != "rtf" && $tipo_archivo != "gdoc") {
        echo 3;
        $resultado_subida = false;
    }

    if ($resultado_subida == false) {
        echo 4;
    } else if (move_uploaded_file($_FILES['ficha-evento']['tmp_name'], "../../Archivos/Subidas/Eventos/Fichas_eventos/".$nombre_extension_archivo)) {
        $sql = "UPDATE eventos SET Ficha = '$nombre_extension_archivo' WHERE Id = '$id_ficha_evento'";
        $sentencia = $conexion -> prepare($sql);
        $respuesta = $sentencia -> execute();
        echo $respuesta;
    } else {
        echo 5;
    }
}
?>