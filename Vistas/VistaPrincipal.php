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
		<h1>Grupo Scout 601 Mafeking</h1>
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
                            <iframe width="450" height="250" src="https://www.youtube.com/embed/videoseries?list=UUEFIobTH6R69Og1tDk4XwEQ" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-md-7 sin-espaciado-izquierda">
			<div class="row ajuste-diapositiva">
				<div id="carrusel" class="carousel slide" data-ride="carousel">
  					<ol class="carousel-indicators">
    					<li data-target="#carrusel" data-slide-to="0" class="active"></li>
    					<li data-target="#carrusel" data-slide-to="1"></li>
    					<li data-target="#carrusel" data-slide-to="2"></li>
                        <li data-target="#carrusel" data-slide-to="3"></li>
                        <li data-target="#carrusel" data-slide-to="4"></li>
  					</ol>
  					<div class="carousel-inner">
    					<div class="carousel-item active">
                            <a href="<?php echo RUTA_GRUPO ?>" target="_blank"><img id="imagen-rama-grupo" src="a" class="d-block w-100" alt="First slide"></a>
      						<div class="carousel-caption d-none d-md-block">
    							<h5>GRUPO 601 MAFEKING</h5>
    							<p>¡Conoce nuestra historia!</p>
  							</div>
					    </div>
    					<div class="carousel-item">
      						<a href="<?php echo RUTA_MANADA ?>" target="_blank"><img class="d-block w-100" id="imagen-rama-manada" src="a" alt="Second slide"></a>
      						<div class="carousel-caption d-none d-md-block">
    							<h5>MANADA</h5>
    							<p>¡Con alegría, has de ser cada día mejor!</p>
  							</div>
    					</div>
    					<div class="carousel-item">
      						<a href="<?php echo RUTA_TROPA ?>" target="_blank"><img class="d-block w-100" id="imagen-rama-tropa" src="a" alt="Third slide"></a>
      						<div class="carousel-caption d-none d-md-block">
    							<h5>TROPA</h5>
    							<p>¡Listos para la aventura!</p>
  							</div>
    					</div>
                        <div class="carousel-item">
                            <a href="<?php echo RUTA_COMUNIDAD ?>" target="_blank"><img id="imagen-rama-comunidad" class="d-block w-100" src="a" alt="Third slide"></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>COMUNIDAD</h5>
                                <p>¡Caminante no hay camino, se hace camino al andar, adelante!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="<?php echo RUTA_CLAN ?>" target="_blank"><img id="imagen-rama-clan" class="d-block w-100" src="a" alt="Third slide"></a>
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
<div class="modal fade" id="modal-informacion-evento-publica" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Información del evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id-evento" name="id-evento" />
                <input type="hidden" id="id-rama-evento" name="id-rama-evento" value="<?php echo $id_rama; ?>" />
                <form class="validar-formulario" id="formulario-evento" name="formulario-evento" method="post">
                    <?php
                    include_once 'Plantillas/Formularios/FormularioEvento.php';
                    ?>
                </form>
                <div class="form-row">
                    <div class="col-md-6">
                        <img id="ficha-evento" src="a" alt="a" />
                    </div>
                    <div class="col-md-6">
                        <img id="insignia-evento" src="a" alt="a" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
  var fecha = new Date();
  var anio = fecha.getFullYear();
    $('#calendario').fullCalendar({
        header:{
            left:'prev',
            center:'title',//'today'
            right:'next',
        },
        showNonCurrentDates:false,
        fixedWeekCount:false,
        eventSources: [
            {
                url: '<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php',
                type: 'POST',
                data: {
                    "Fecha-inicial-mes": anio+"-01-01",
                    "Fecha-final-mes": anio+"-12-31",
                    accion: "todos-los-eventos-anio"
                },
                error: function() {
                    alertify.error('No se ha obtenido la información de los eventos');
                }
            }
        ],
        eventClick:function(calEvent,jsEvent,view) {
            var id_evento_actual = calEvent.Id;
            comprobarAsistencia(id_evento_actual);
            camposSoloLectura();
            comprobarFichaMedicaHojaVida();
            $('#titulo').html(calEvent.title);
            $('#id-evento').val(calEvent.Id);
            $('#nombreevento').val(calEvent.title);
            FechaInicio = calEvent.start._i.split(" ");
            $('#fechainicioevento').val(FechaInicio[0]);
            $('#horainicio').val(FechaInicio[1]);
            FechaCierre = calEvent.end._i.split(" ");
            $('#fechafinevento').val(FechaCierre[0]);
            $('#horafin').val(FechaCierre[1]);
            $('#tipoevento').val(calEvent.Tipo);
            $('#sitioevento').val(calEvent.Sitio);
            if (calEvent.Fecha_encuentro != "0000-00-00") {
              $('#fechaencuentroevento').val(calEvent.Fecha_encuentro);
              $("#labelfechaencuentroevento").prop("hidden", false);
              $("#fechaencuentroevento").prop("hidden", false);
            } else {
              $("#labelfechaencuentroevento").prop("hidden", true);
              $("#fechaencuentroevento").prop("hidden", true);
            }
            $('#horaencuentro').val(calEvent.Hora_encuentro);
            if (calEvent.Punto_encuentro) {
              $('#puntoencuentro').val(calEvent.Punto_encuentro);
              $("#labelpuntoencuentro").prop("hidden", false);
              $("#puntoencuentro").prop("hidden", false);
            } else {
              $("#labelpuntoencuentro").prop("hidden", true);
              $("#puntoencuentro").prop("hidden", true);
            }
            if (calEvent.Costo != "0") {
              $('#costoevento').val(calEvent.Costo);
              $("#labelcostoevento").prop("hidden", false);
              $("#costoevento").prop("hidden", false);
            } else {
              $("#labelcostoevento").prop("hidden", true);
              $("#costoevento").prop("hidden", true);
            }
            $('#ficha-evento').val(calEvent.Ficha);
            $("#modal-informacion-evento-publica").modal();
        },
    });
});
</script>
<?php
include_once 'Plantillas/CierrePagina.php';
?>
