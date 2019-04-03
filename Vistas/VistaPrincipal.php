<?php
$Titulo = 'Grupo Scout Mafeking 601 | Palmira, Valle del Cauca, Colombia';
include_once 'App/Conexion.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';

Conexion :: abrirConexion();
?>
<div class="container inicio-pagina">
	<div class="jumbotron">
		<h1>Página web oficial Mafeking 601</h1>
		<p>
			Sitio dedicado a compartir las experiencias del mejor grupo del mundo
		</p>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-5 sin-espaciado-derecha">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-title">
							<h4>Eventos</h4>
						</div>
						<div class="card-body menos-espaciado">
							<div id="calendario"></div>
						</div>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Youtube</h4>
                        </div>
                        <div class="card-body menos-espaciado">
                            <iframe width="450" height="250" src="https://www.youtube.com/embed/videoseries?list=UUEFIobTH6R69Og1tDk4XwEQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-md-7 sin-espaciado-izquierda">
			<div class="row ajuste-diapositiva">
				<div id="carrusel" name="carrusel" class="carousel slide" data-ride="carousel">
  					<ol class="carousel-indicators">
    					<li data-target="#carrusel" data-slide-to="0" class="active"></li>
    					<li data-target="#carrusel" data-slide-to="1"></li>
    					<li data-target="#carrusel" data-slide-to="2"></li>
                        <li data-target="#carrusel" data-slide-to="3"></li>
                        <li data-target="#carrusel" data-slide-to="4"></li>
  					</ol>
  					<div class="carousel-inner">
    					<div class="carousel-item active">
                            <a href="<?php echo RUTA_GRUPO ?>" target="_blank"><img id="imagen-rama-grupo" class="d-block w-100" alt="First slide"></a>
      						<div class="carousel-caption d-none d-md-block">
    							<h5>GRUPO 601 MAFEKING</h5>
    							<p>¡Conoce nuestra historia!</p>
  							</div>
					    </div>
    					<div class="carousel-item">
      						<a href="<?php echo RUTA_MANADA ?>" target="_blank"><img class="d-block w-100" id="imagen-rama-manada" alt="Second slide"></a>
      						<div class="carousel-caption d-none d-md-block">
    							<h5>MANADA</h5>
    							<p>¡Con alegría, has de ser cada día mejor!</p>
  							</div>
    					</div>
    					<div class="carousel-item">
      						<a href="<?php echo RUTA_TROPA ?>" target="_blank"><img class="d-block w-100" id="imagen-rama-tropa" alt="Third slide"></a>
      						<div class="carousel-caption d-none d-md-block">
    							<h5>TROPA</h5>
    							<p>¡Listos para la aventura!</p>
  							</div>
    					</div>
                        <div class="carousel-item">
                            <a href="<?php echo RUTA_COMUNIDAD ?>" target="_blank"><img id="imagen-rama-comunidad" class="d-block w-100" alt="Third slide"></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>COMUNIDAD</h5>
                                <p>¡Caminante no hay camino, se hace camino al andar, adelante!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="<?php echo RUTA_CLAN ?>" target="_blank"><img id="imagen-rama-clan" class="d-block w-100" alt="Third slide"></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>CLAN</h5>
                                <p>¡Al servir, dejamos el mundo en mejores condiciones de como lo encontramos!</p>
                            </div>
                        </div>
  					</div>
  					<a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
    					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    					<span class="sr-only">Previous</span>
  					</a>
  					<a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
    					<span class="carousel-control-next-icon" aria-hidden="true"></span>
    					<span class="sr-only">Next</span>
  					</a>
  				</div>
			</div>
			<div class="row">
				<div class="col-md-12" id="ultimas-noticias"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#calendario').fullCalendar({
		header:{
			left:'prev',
			center:'title',//'today'
			right:'next',
		},
        showNonCurrentDates:false,
        fixedWeekCount:false,
		dayClick:function(date,jsEvent,view){
			$('#btn-agregar').css("display", "initial");
			$('#btn-actualizar').css("display", "none");
			$('#btn-borrar').css("display", "none");
            limpiarFormulario();
            $('#fecha-inicio').val(date.format());
            $('#fecha-cierre').val(date.format());
            $("#modal").modal();
        },
        eventClick:function(calEvent,jsEvent,view){
            $('#btn-actualizar').css("display", "initial");
            $('#btn-borrar').css("display", "initial");
            $('#btn-agregar').css("display", "none");
            $('#titulo').html(calEvent.title);
            $('#id').val(calEvent.Id);
            $('#nombre').val(calEvent.title);
            FechaInicio = calEvent.start._i.split(" ");
            $('#fecha-inicio').val(FechaInicio[0]);
            $('#hora-inicio').val(FechaInicio[1]);
            FechaCierre = calEvent.end._i.split(" ");
            $('#fecha-cierre').val(FechaCierre[0]);
            $('#hora-cierre').val(FechaCierre[1]);
            $('#tipo').val(calEvent.Tipo);
            $('#lugar').val(calEvent.Lugar);
            $('#fecha-encuentro').val(calEvent.Fecha_encuentro);
            $('#hora-encuentro').val(calEvent.Hora_encuentro);
            $('#punto-encuentro').val(calEvent.Punto_encuentro);
            $('#costo').val(calEvent.Costo);
            $('#costo-incluye').val(calEvent.Costo_incluye);
            $('#material-individual').val(calEvent.Material_individual);
            $('#material-equipo').val(calEvent.Material_equipos);
            //$('#ficha').val(calEvent.Ficha);
            $("#modal").modal();
        },
        editable:true,
        eventDrop:function(calEvent) {
            $('#id').val(calEvent.Id);
            $('#nombre').val(calEvent.title);
            FechaInicio = calEvent.start.format().split("T");
            $('#fecha-inicio').val(FechaInicio[0]);
            $('#hora-inicio').val(FechaInicio[1]);
            FechaCierre = calEvent.end.format().split("T");
            $('#fecha-cierre').val(FechaCierre[0]);
            $('#hora-cierre').val(FechaCierre[1]);
            $('#tipo').val(calEvent.Tipo);
            $('#lugar').val(calEvent.Lugar);
            $('#fecha-encuentro').val(calEvent.Fecha_encuentro);
            $('#hora-encuentro').val(calEvent.Hora_encuentro);
            $('#punto-encuentro').val(calEvent.Punto_encuentro);
            $('#costo').val(calEvent.Costo);
            $('#costo-incluye').val(calEvent.Costo_incluye);
            $('#material-individual').val(calEvent.Material_individual);
            $('#material-equipo').val(calEvent.Material_equipos);
            //$('#ficha').val(calEvent.Ficha);
            recolectarDatosGUI();
            registrarInformacion('modificar', NuevoEvento, true);
        }
    });
});
</script>
<?php
include_once 'Plantillas/CierrePagina.php';
?>