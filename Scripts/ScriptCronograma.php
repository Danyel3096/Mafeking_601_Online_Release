<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
	$("button[name='btn-asistencia']").click(function() {
		var id_evento = $('#id-evento').val();
		var id_persona = $("#id-persona-evento").val();
		var respuesta_asistencia = $(this).val();
		var accion = "insertar-actualizar-asistencia";
		var cadena = "Id-evento="+id_evento+"&Id-persona-evento="+id_persona
		+"&Respuesta-asistencia="+respuesta_asistencia+"&accion="+accion;
		$.ajax({
	        method:'POST',
	        url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php",
	        data:cadena,
	        success:function(respuesta){
	            if(respuesta == true) {
	                alertify.success("Registro exitoso de tu respuesta");
	                $('#modal-informacion-evento').modal('hide');
	            } else {
	                alertify.error("No pudo guardarse tu respuesta.<br>Recargue la página e intentelo nuevamente.");
	            }
	        }
	    });
	});
});
var fecha = new Date();
var anio = fecha.getFullYear();
var id_rama_persona = $("#id-rama-persona").val();
	$(document).ready(function(){
		$('#mes-enero').fullCalendar({
			defaultDate: moment(anio+'-01-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-febrero').fullCalendar({
			defaultDate: moment(anio+'-02-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-marzo').fullCalendar({
			defaultDate: moment(anio+'-03-01'),
			header:{
				left:'',
				center:'title',
				right:''
			},
			eventSources: [
            	{
	                url: '<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php',
	                type: 'POST',
	                data: {
	                    "Fecha-inicial-mes": anio+"-03-01",
	                    "Fecha-final-mes": anio+"-03-29",
	                    "Id-rama-evento": id_rama_persona,
	                    accion: "eventos-mes"
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
		        $("#modal-informacion-evento").modal();
        	},
		});
		$('#mes-abril').fullCalendar({
			defaultDate: moment(anio+'-04-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-mayo').fullCalendar({
			defaultDate: moment(anio+'-05-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-junio').fullCalendar({
			defaultDate: moment(anio+'-06-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-julio').fullCalendar({
			defaultDate: moment(anio+'-07-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-agosto').fullCalendar({
			defaultDate: moment(anio+'-08-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-septiembre').fullCalendar({
			defaultDate: moment(anio+'-09-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-octubre').fullCalendar({
			defaultDate: moment(anio+'-10-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-noviembre').fullCalendar({
			defaultDate: moment(anio+'-11-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
		$('#mes-diciembre').fullCalendar({
			defaultDate: moment(anio+'-12-01'),
			header:{
				left:'',
				center:'title',
				right:''
			}
		});
	});
function camposSoloLectura() {
    $('#idevento').prop("readonly", true);
    $('#nombreevento').prop("readonly", true);
    $('#fechainicioevento').prop("readonly", true);
    $('#horainicio').prop("readonly", true);
    $('#tipoevento').prop("disabled", true);
    $('#sitioevento').prop("readonly", true);
    $('#fechafinevento').prop("readonly", true);
    $('#horafin').prop("readonly", true);
    $('#fechaencuentroevento').prop("readonly", true);
    $('#horaencuentro').prop("readonly", true);
    $('#puntoencuentro').prop("readonly", true);
    $('#costoevento').prop("readonly", true);
    //$('#ficha').val('');
}
function comprobarAsistencia(id_evento_actual) {
	var id_persona = $("#id-persona-evento").val();
	var accion = "comprobar-asistencia";
	var cadena = "Id-evento="+id_evento_actual+"&Id-persona-evento="+id_persona+"&accion="+accion;
	$.ajax({
        method:'POST',
        url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php",
        data:cadena,
        success:function(respuesta){
            if(respuesta == 'Sí') {
                $("#btn-asistencia-positiva").prop("disabled", true);
                $("#btn-asistencia-negativa").prop("disabled", false);
            } else if (respuesta == 'No') {
                $("#btn-asistencia-positiva").prop("disabled", false);
                $("#btn-asistencia-negativa").prop("disabled", true);
            }
        }
    });
}
function comprobarFichaMedicaHojaVida() {
	var id_persona = $("#id-persona-evento").val();
	var accion = "comprobar-ficha-medica-hoja-vida";
	var cadena = "Id-persona-evento="+id_persona+"&accion="+accion;
	alert(cadena);
	$.ajax({
        method:'POST',
        url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEventos.php",
        data:cadena,
        success:function(datos){
        	//var objeto = JSON.parse(datos);
        	//for (var i = 0; i < objeto.length; i++) {
        		//objeto[i] == ;
        	//}
        }
    });
}