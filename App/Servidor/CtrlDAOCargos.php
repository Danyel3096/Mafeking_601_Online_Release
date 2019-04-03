<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-inicial'])) {
    $id_inicial = $_POST['Id-inicial'];
}
if(isset($_POST['Id-final'])) {
    $id_final = $_POST['Id-final'];
}
if(isset($_POST['Id-basico'])) {
    $id_basico = $_POST['Id-basico'];
}
if(isset($_POST['Id-equipo'])) {
	$id_equipo = $_POST['Id-equipo'];
}

if(isset($_POST['Id-persona'])) {
    $id_persona = $_POST['Id-persona'];
}

if(isset($_POST['Id-cargo'])) {
    $id_cargo = $_POST['Id-cargo'];
}

if(isset($_POST['accion'])) {
    $accion = $_POST['accion'];
} else {
    $accion = 'leer';
    $id_rama = $_POST['Id_rama'];
}

switch ($accion) {
    case 'select-cargos-equipo':
        $sqlCE = "SELECT Id, Nombre FROM cargos WHERE Id BETWEEN '$id_inicial' AND '$id_final' OR Id = '$id_basico'";
        $sentenciaCE = $conexion -> prepare($sqlCE);
        $sentenciaCE -> execute();
        $cargos_equipo = $sentenciaCE -> fetchAll(PDO::FETCH_ASSOC);

        echo $opcion1 = "<option label='Seleccione' selected></option>";

        foreach ($cargos_equipo as $cargo_equipo) {
            echo $opcion1 = "<option value='".$cargo_equipo['Id']."'>".$cargo_equipo['Nombre']."</option>";
        }
        break;
    case 'select-equipos-rama':
        $sqlER = "SELECT Id, Nombre FROM equipos WHERE Id BETWEEN '$id_inicial' AND '$id_final' OR Id = '$id_basico'";
        $sentenciaER = $conexion -> prepare($sqlER);
        $sentenciaER -> execute();
        $equipos_rama = $sentenciaER -> fetchAll(PDO::FETCH_ASSOC);

        echo $opcion1 = "<option label='Seleccione' selected></option>";

        foreach ($equipos_rama as $equipo_rama) {
            echo $opcion1 = "<option value='".$equipo_rama['Id']."'>".$equipo_rama['Nombre']."</option>";
        }
        break;
    case 'actualizar-cargo-equipo':
        $sql = "UPDATE detalle_cargos SET Id_cargo = '$id_cargo', Id_equipo = '$id_equipo' WHERE Id_persona = '$id_persona'";
        $sentencia = $conexion -> prepare($sql);
        $respuesta = $sentencia -> execute();
        //if($respuesta) {
            //$sqlC = "INSERT INTO Control_cambios(Numero_documento, Nombre_completo, Fecha_hora, Cambio, Nombre_tabla, Nombre_columna, Id_fila) VALUES('$documento','$nombre_completo', NOW(), 'Inserción', 'Cargos', 'Varias','$numero_documento') ON DUPLICATE KEY UPDATE Cambio = 'Actualización'";
            //    $sentenciaC = $conexion -> prepare($sqlC);
            //    $sentenciaC -> execute();
        //}
        echo $respuesta;
        break;
    case 'actualizar-equipo':
        $sql = "UPDATE personas SET Id_cargo = '$id_cargo' WHERE Numero_documento = '$numero_documento'";
        $sentencia = $conexion -> prepare($sql);
        $respuesta = $sentencia -> execute();
        echo $respuesta;
        break;
    case 'tabla-cargos':
        $sqlDC = "SELECT * FROM detalle_cargos WHERE Id_equipo = '$id_equipo' AND Id_cargo != '$id_cargo'";
        $sentenciaDC = $conexion -> prepare($sqlDC);
        $sentenciaDC -> execute();
        $detalle_cargos = $sentenciaDC -> fetchAll(PDO::FETCH_ASSOC);

        $sqlC = "SELECT Id, Nombre FROM cargos";
        $sentenciaC = $conexion -> prepare($sqlC);
        $sentenciaC -> execute();
        $cargos = $sentenciaC -> fetchAll(PDO::FETCH_ASSOC);

        $sqlE = "SELECT Id, Nombre FROM equipos";
        $sentenciaE = $conexion -> prepare($sqlE);
        $sentenciaE -> execute();
        $equipos = $sentenciaE -> fetchAll(PDO::FETCH_ASSOC);

        $sqlP = "SELECT Id, Nombres, Apellidos FROM personas";
        $sentenciaP = $conexion -> prepare($sqlP);
        $sentenciaP -> execute();
        $personas = $sentenciaP -> fetchAll(PDO::FETCH_ASSOC);

        for ($i=0; $i < count($personas); $i++) {
            for ($j=0; $j < count($detalle_cargos); $j++) {
                if ($personas[$i]['Id'] == $detalle_cargos[$j]['Id_persona']) {
                    $detalle_cargos[$j]['Nombres'] = $personas[$i]['Nombres'];
                    $detalle_cargos[$j]['Apellidos'] = $personas[$i]['Apellidos'];
                }
            }
        }

        for ($i=0; $i < count($cargos); $i++) {
            for ($j=0; $j < count($detalle_cargos); $j++) {
                if ($cargos[$i]['Id'] == $detalle_cargos[$j]['Id_cargo']) {
                    $detalle_cargos[$j]['Nombre_cargo'] = $cargos[$i]['Nombre'];
                }
            }
        }

        for ($i=0; $i < count($equipos); $i++) {
            for ($j=0; $j < count($detalle_cargos); $j++) {
                if ($equipos[$i]['Id'] == $detalle_cargos[$j]['Id_equipo']) {
                    $detalle_cargos[$j]['Nombre_equipo'] = $equipos[$i]['Nombre'];
                    $arreglo["data"][] = $detalle_cargos[$j];
                }
            }
        }
        echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
        //mysqli_result::free_result(); SE SUPONE QUE LIBERA MEMORIA DE LA VARIABLE
        Conexion :: cerrarConexion();
        break;
}
?>