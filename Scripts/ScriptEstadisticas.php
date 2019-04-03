<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
	var id_cargo_persona = $("#id-cargo-persona").val();
	if (id_cargo_persona == '3' || id_cargo_persona == '4') {
	    var id_progresion = '6';
  	} else if (id_cargo_persona == '5' || id_cargo_persona == '6') {
	    var id_progresion = '5';
  	} else if (id_cargo_persona == '7' || id_cargo_persona == '8') {
	    var id_progresion = '4';
  	} else if (id_cargo_persona == '9' || id_cargo_persona == '10') {
    	var id_progresion = '3';
    	$("#estadisticas-progresion-clan").prop("hidden", false);
  	}
  	PersonasSinProgresion(id_progresion, id_cargo_persona);
  	listaSinProgresion(id_progresion, id_cargo_persona);
	porcentajesEspecialidades(id_progresion, id_cargo_persona);
	$("button[name=btn-ver-listado-especialidad]").each(function(){
    	$(this).on('click', function() {
    		var id_especialidad = $(this).val();
    		listarRankingEspecialidad(id_cargo_persona, id_especialidad);
      		//$(".espacio-pagina").css("display", "none");
    	});
  	});
});
function PersonasSinProgresion(id_progresion, id_cargo_persona) {
  	var accion = "porcentaje-personas-sin-progresion";
  	var cadena = "Id-progresion="+id_progresion+"&Id-cargo="+id_cargo_persona+"&accion="+accion;
  	$.ajax({
    	method:'POST',
      	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEstadisticas.php",
      	data:cadena,
      	success:function(datos) {
        	if (datos) {
          		var objeto = JSON.parse(datos);
          		porcentajeSinProgresion(objeto['Porcentaje'], objeto['Decimal']);
        	}
      	}
  	});
}
function listaSinProgresion(id_progresion, id_cargo_persona) {
  	var accion = "listar-personas-sin-progresion";
  	var cadena = "Id-progresion="+id_progresion+"&Id-cargo="+id_cargo_persona+"&accion="+accion;
  	$.ajax({
    	method:'POST',
      	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEstadisticas.php",
      	data:cadena,
      	success:function(datos) {
        	if (datos) {
          		$("#listado-personas-sin-progresion").html(datos);
        	}
      	}
  	});
}
function porcentajesEspecialidades(id_progresion, id_cargo_persona) {
  	var accion = "porcentaje-especialidades";
  	var cadena = "Id-progresion="+id_progresion+"&Id-cargo="+id_cargo_persona+"&accion="+accion;
  	$.ajax({
    	method:'POST',
      	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEstadisticas.php",
      	data:cadena,
      	success:function(datos) {
        	if (datos) {
          		var objeto = JSON.parse(datos);
          		porcentajeInvestiduraRover(objeto[0]['Porcentaje'], objeto[0]['Decimal']);
          		porcentajePrecursorRover(objeto[1]['Porcentaje'], objeto[1]['Decimal']);
          		porcentajeAprendizHabilidadTecnicaConocimientoRover(objeto[2]['Porcentaje'], objeto[2]['Decimal']);
          		porcentajeExpertoHabilidadTecnicaConocimientoRover(objeto[3]['Porcentaje'], objeto[3]['Decimal']);
          		porcentajeMonitorHabilidadTecnicaConocimientoRover(objeto[4]['Porcentaje'], objeto[4]['Decimal']);
          		porcentajeAprendizFormacionCompetenciasRover(objeto[5]['Porcentaje'], objeto[5]['Decimal']);
          		porcentajeExpertoFormacionCompetenciasRover(objeto[6]['Porcentaje'], objeto[6]['Decimal']);
          		porcentajeMonitorFormacionCompetenciasRover(objeto[7]['Porcentaje'], objeto[7]['Decimal']);
        	}
      	}
  	});
}
function listarRankingEspecialidad(id_cargo_persona, id_especialidad) {
  	var accion = "listar-ranking-especialidad";
  	var cadena = "Id-especialidad="+id_especialidad+"&Id-cargo="+id_cargo_persona+"&accion="+accion;
  	$.ajax({
    	method:'POST',
      	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOEstadisticas.php",
      	data:cadena,
      	success:function(datos) {
        	if (datos) {
          		$("#listado-personas-especialidad").html(datos);
        	}
      	}
  	});
}
function porcentajeSinProgresion(porcentaje, decimal) {
  	var estadistica_investidura = $('#porcentaje-personas-sin-progresion').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['green', 'red']}
	});

	estadistica_investidura.resizable()
	  .on('resizestop', function() {
	      estadistica_investidura.circleProgress();
	  });

	estadistica_investidura.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}
function porcentajeInvestiduraRover(porcentaje, decimal) {
  	var estadistica_investidura = $('#estadistica-investidura-clan').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['red', 'green']}
	});

	estadistica_investidura.resizable()
	  .on('resizestop', function() {
	      estadistica_investidura.circleProgress();
	  });

	estadistica_investidura.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}
function porcentajePrecursorRover(porcentaje, decimal) {
  	var estadistica_investidura = $('#estadistica-precursor-clan').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['red', 'green']}
	});

	estadistica_investidura.resizable()
	  .on('resizestop', function() {
	      estadistica_investidura.circleProgress();
	  });

	estadistica_investidura.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}

function porcentajeAprendizHabilidadTecnicaConocimientoRover(porcentaje, decimal) {
  	var estadistica_aprendiz = $('#estadistica-aprendiz-habilidad-técnica-conocimiento-clan').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['red', 'green']}
	});

	estadistica_aprendiz.resizable()
	  .on('resizestop', function() {
	      estadistica_aprendiz.circleProgress();
	  });

	estadistica_aprendiz.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}

function porcentajeExpertoHabilidadTecnicaConocimientoRover(porcentaje, decimal) {
  	var estadistica_experto = $('#estadistica-experto-habilidad-técnica-conocimiento-clan').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['red', 'green']}
	});

	estadistica_experto.resizable()
	  .on('resizestop', function() {
	      estadistica_experto.circleProgress();
	  });

	estadistica_experto.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}

function porcentajeMonitorHabilidadTecnicaConocimientoRover(porcentaje, decimal) {
  	var estadistica_monitor = $('#estadistica-monitor-habilidad-técnica-conocimiento-clan').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['red', 'green']}
	});

	estadistica_monitor.resizable()
	  .on('resizestop', function() {
	      estadistica_monitor.circleProgress();
	  });

	estadistica_monitor.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}

function porcentajeAprendizFormacionCompetenciasRover(porcentaje, decimal) {
  	var estadistica_aprendiz = $('#estadistica-aprendiz-formacion-competencias-clan').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['red', 'green']}
	});

	estadistica_aprendiz.resizable()
	  .on('resizestop', function() {
	      estadistica_aprendiz.circleProgress();
	  });

	estadistica_aprendiz.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}

function porcentajeExpertoFormacionCompetenciasRover(porcentaje, decimal) {
  	var estadistica_experto = $('#estadistica-experto-formacion-competencias-clan').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['red', 'green']}
	});

	estadistica_experto.resizable()
	  .on('resizestop', function() {
	      estadistica_experto.circleProgress();
	  });

	estadistica_experto.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}

function porcentajeMonitorFormacionCompetenciasRover(porcentaje, decimal) {
  	var estadistica_monitor = $('#estadistica-monitor-formacion-competencias-clan').circleProgress({
	  arcCoef: 0.5,
	  value: decimal,
	  size: 100,
	  fill: { gradient: ['red', 'green']}
	});

	estadistica_monitor.resizable()
	  .on('resizestop', function() {
	      estadistica_monitor.circleProgress();
	  });

	estadistica_monitor.on('circle-animation-progress', function(e, v) {
	  var obj = $(this).data('circle-progress'),
	      ctx = obj.ctx,
	      s = obj.size,
	      sv = (porcentaje * v).toFixed()+"%",
	      fill = obj.arcFill;

	  ctx.save();
	  ctx.font = "bold " + s / 2.5 + "px sans-serif";
	  ctx.textAlign = 'center';
	  ctx.textBaseline = 'middle';
	  ctx.fillStyle = fill;
	  ctx.fillText(sv, s / 2, s / 2, 80);
	  ctx.restore();
	});
}