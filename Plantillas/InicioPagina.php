<?php
include_once 'App/DAO/DAODetalleCargo.php';
include_once 'App/DAO/DAOEquipo.php';
include_once 'App/DAO/DAORama.php';
include_once 'App/Controladores/ControlSesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	if (!isset($Titulo) || empty($Titulo)) {
		$Titulo = 'Grupo Scout Mafeking 601 | Palmira, Valle del Cauca, Colombia';
	}
	echo "<title>$Titulo</title>";

	if(ControlSesion :: sesionIniciada()) {
		Conexion :: abrirConexion();
		$conexion = Conexion :: obtenerConexion();
		$id_persona = $_SESSION['id'];
		$persona_recuperada = DAOPersona :: consultarPersonaPorId($conexion, $id_persona);
		$detalle_cargo = DAODetalleCargo :: consultarDetalleCargoPorIdPersona($conexion, $id_persona);
		$equipo = DAOEquipo :: consultarEquipoPorId($conexion, $detalle_cargo -> obtenerIdEquipo());
		$rama = DAORama :: consultarRamaPorId($conexion, $equipo -> obtenerIdRama());

		$id_cargo = $detalle_cargo -> obtenerIdCargo();
		$id_rama = $rama -> obtenerId();

		if ($id_rama == '6' || $id_cargo == '3' || $id_cargo == '4') : ?>
			<link rel="stylesheet" href="<?php echo RUTA_CSS ?>EstiloManada.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/yellow/pace-theme-minimal.min.css">
		<?php elseif ($id_rama == '5' || $id_cargo == '5' || $id_cargo == '6') : ?>
			<link rel="stylesheet" href="<?php echo RUTA_CSS ?>EstiloTropa.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/green/pace-theme-minimal.min.css">
		<?php elseif ($id_rama == '4' || $id_cargo == '7' || $id_cargo == '8') : ?>
			<link rel="stylesheet" href="<?php echo RUTA_CSS ?>EstiloComunidad.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css">
		<?php elseif ($id_rama == '3' || $id_cargo == '9' || $id_cargo == '10') : ?>
			<link rel="stylesheet" href="<?php echo RUTA_CSS ?>EstiloClan.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/red/pace-theme-minimal.min.css">
		<?php elseif ($id_rama == '1' || $id_rama == '2') : ?>
			<link rel="stylesheet" href="<?php echo RUTA_CSS ?>EstiloGeneral.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/silver/pace-theme-minimal.min.css">
		<?php endif;
	} else {?>
		<link rel="stylesheet" href="<?php echo RUTA_CSS ?>EstiloGeneral.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/purple/pace-theme-minimal.min.css"><?php
	}
	?>
	<link rel="stylesheet" href="<?php echo RUTA_CSS ?>Estilos.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" integrity="sha256-9VgA72/TnFndEp685+regIGSD6voLveO2iDuWhqTY3g=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" integrity="sha256-lBtf6tZ+SwE/sNMR7JFtCyD44snM3H2FrkB/W400cJA=" crossorigin="anonymous" />
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.bootstrap4.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.bootstrap4.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/css/jquery.orgchart.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/goalProgress/1.0/goalProgress.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.knightlab.com/libs/timeline3/3.6.3/css/timeline.css" />

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js" integrity="sha256-4+rW6N5lf9nslJC6ut/ob7fCY2Y+VZj2Pw/2KdmQjR0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/es.js" integrity="sha256-Br0ECcsNXTbXwuoqboUmi9/m4kr04HeiM1EFVK7a2dE=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js" integrity="sha256-LPgEyZbedErJpp8m+3uasZXzUlSl9yEY4MMCEN9ialU=" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.39/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.39/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.colVis.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js" integrity="sha256-VupM2GVVXK2c3Smq5LxXjUHBZveWTs35hu1al6ss6kk=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.knightlab.com/libs/timeline3/3.6.3/js/timeline-min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js" integrity="sha256-2XpjfLL5tRYLa3AAM0gz6aAY0zxvHogDzTWemxkTPDg=" crossorigin="anonymous"></script>
</head>
<body>