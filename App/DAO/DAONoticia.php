<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'App/Modelos/Noticia.php';
class DAONoticia {
	public static function consultarNoticiaPorUrl($conexion, $url) {
		$noticia = null;
		if(isset($conexion)) {
			try {
				$sql = 'SELECT * FROM Noticias WHERE Url LIKE :Url';
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':Url', $url, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();
				if(!empty($resultado)) {
					$noticia = new Noticia($resultado['Id'], $resultado['Titulo'], $resultado['Imagen'], $resultado['Texto'], $resultado['Fecha'], $resultado['Hora'], $resultado['Url'], $resultado['Estado'], $resultado['Id_persona']);
				}
			} catch (PDOException $ex) {
				print 'ERROR: '. $ex -> getMessage();
			}
		}
		return $noticia;
	}

	public static function consultarNoticiasAleatorias($conexion, $limite) {
		$noticias = [];
		if(isset($conexion)) {
			try {
				$sql = "SELECT * FROM Noticias ORDER BY RAND() LIMIT $limite";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if(count($resultado)) {
					foreach ($resultado as $fila) {
						$noticias[] = new Noticia($fila['Id'], $fila['Titulo'], $fila['Imagen'], $fila['Texto'], $fila['Fecha'], $fila['Hora'], $fila['Url'], $fila['Estado'], $fila['Id_persona']);
					}
				}
			} catch (PDOException $ex) {
				print 'ERROR: ' . $ex -> getMessage();
			}
		}
		return $noticias;
	}

	public static function contarnoticiasActivasUsuario($conexion, $id_usuario) {
    	$total_noticias = '0';

    	if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total_noticias FROM noticias WHERE Id_persona = :Id_persona";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':Id_persona', $id_usuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if(!empty($resultado)) {
                    $total_noticias = $resultado['total_noticias'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'.$ex -> getMessage();
            }
        }
        return $total_noticias;
    }
}
?>