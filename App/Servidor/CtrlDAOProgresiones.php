<?php
include_once '../Conexion.php';
Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
if(isset($_POST['Id-persona']) && !empty($_POST['Id-persona'])){
    $id_persona = $_POST['Id-persona'];
}
if(isset($_POST['Id-especialidad']) && !empty($_POST['Id-especialidad'])){
    $id_especialidad = $_POST['Id-especialidad'];
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
} else {
	$accion = 'leer';
}
switch ($accion) {
	case 'insignias':
		$sqlIET = "SELECT Insignia FROM especialidades WHERE Id BETWEEN '1' AND '18'";
		$sentenciaIET = $conexion -> prepare($sqlIET);
		$sentenciaIET -> execute();
		$insignias = $sentenciaIET -> fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($insignias);
		break;
	case 'requisitos-especialidad-clan':
		$sqlREC = "SELECT Id, Texto FROM requisitos WHERE Id_especialidad = '$id_especialidad'";
		$sentenciaREC = $conexion -> prepare($sqlREC);
		$sentenciaREC -> execute();
		$requisitos = $sentenciaREC -> fetchAll(PDO::FETCH_ASSOC);

		$sqlX = "SELECT Id_requisito, Estado FROM detalle_progresiones WHERE Id_especialidad = '$id_especialidad' AND Id_persona = '$id_persona'";
		$sentenciaX = $conexion -> prepare($sqlX);
		$sentenciaX -> execute();
		$estados = $sentenciaX -> fetchAll();
		echo "<tr>";
		for ($i = 0, $contador=1; $i < count($requisitos); $i++, $contador++) {?>
			<td>
				<div class="card">
  					<div class="card-body" id="cuerpo-requisito" name="cuerpo-requisito">
 						<p class="card-text"><?php
 					echo $requisitos[$i]['Texto'];
 					?></p>
    				<?php for ($j=0; $j < count($estados); $j++) { 
						if ($requisitos[$i]['Id'] === $estados[$j]['Id_requisito'] && $estados[$j]['Estado'] == 1) {
							?> <i class="fas fa-certificate fa-lg"></i> <?php
						}
					} ?>
  					</div>
				</div>
			</td>
			<?php if(($contador%3) == 0) {
				echo "</tr><tr>";
			}
		}
		echo "</tr>";
		break;
	case 'requisitos-culmen-clan':
		$sqlREC = "SELECT Id, Texto FROM requisitos WHERE Id_especialidad = '17'";
		$sentenciaREC = $conexion -> prepare($sqlREC);
		$sentenciaREC -> execute();
		$requisitos = $sentenciaREC -> fetchAll();

		$sqlX = "SELECT Id_requisito, Estado FROM detalle_progresiones WHERE Id_especialidad = '$id_especialidad' AND Id_persona = '$id_persona'";
		$sentenciaX = $conexion -> prepare($sqlX);
		$sentenciaX -> execute();
		$estados = $sentenciaX -> fetchAll();
		echo "<tr>";
		for ($i = 0, $contador=1; $i < count($requisitos); $i++, $contador++) {?>
			<td>
				<div class="card" style="width: 20rem;">
  					<div class="card-body" id="cuerpo-requisito" name="cuerpo-requisito">
 						<p class="card-text"><?php
 					echo $requisitos[$i]['Texto'];
 					?></p>
    				<?php for ($j=0; $j < count($estados); $j++) { 
						if ($requisitos[$i]['Id'] === $estados[$j]['Id_requisito'] && $estados[$j]['Estado'] == 1) {
							?> <i class="fas fa-certificate"></i> <?php
						}
					} ?>
  					</div>
				</div>
			</td>
			<?php if(($contador%3) == 0) {
				echo "</tr><tr>";
			}
		}
		echo "</tr>";
		break;
}
?>