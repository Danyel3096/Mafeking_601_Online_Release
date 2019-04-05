<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
  insigniasRover();
  $("input[name=especialidad-requisitos]").each(function(){
    $(this).on('click', function() {
      var id_especialidad = $(this).val();
      tablaProgresionesClan(id_especialidad);
      $(".espacio-pagina").css("display", "none");
    });
  });
});
function insigniasRover() {
  var accion = "insignias";
  var cadena = "accion="+accion;
  $.ajax({
    method:'POST',
      url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresiones.php",
      data:cadena,
      success:function(datos){
        if (datos) {
          var objeto = JSON.parse(datos);
          $("#investidura-rover").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[0]['Insignia']);
          $("#eje-precursor").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[1]['Insignia']);
          $("#aprendiz-eje-transversal").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[2]['Insignia']);
          $("#aprendiz-eje-transversal-2").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[2]['Insignia']);
          $("#experto-eje-transversal").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[3]['Insignia']);
          $("#experto-eje-transversal-2").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[3]['Insignia']);
          $("#monitor-eje-transversal").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[4]['Insignia']);
          $("#monitor-eje-transversal-2").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[4]['Insignia']);
          $("#eje-estructural-aprendiz-viaje-enlace-internacional").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[8]['Insignia']);
          $("#eje-estructural-experto-viaje-enlace-internacional").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[9]['Insignia']);
          $("#eje-estructural-monitor-viaje-enlace-internacional").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[10]['Insignia']);
          $("#eje-estructural-aprendiz-emprendimiento").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[11]['Insignia']);
          $("#eje-estructural-experto-emprendimiento").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[12]['Insignia']);
          $("#eje-estructural-monitor-emprendimiento").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[13]['Insignia']);
          $("#eje-estructural-aprendiz-servicio").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[14]['Insignia']);
          $("#eje-estructural-experto-servicio").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[15]['Insignia']);
          $("#eje-estructural-monitor-servicio").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[16]['Insignia']);
          $("#eje-bp").prop("src", "../Archivos/Imagenes/Progresiones/Clan/"+objeto[17]['Insignia']);
        }
      }
  });
}
function tablaProgresionesClan(id_especialidad) {
  var id_persona = $("#id-persona").val();
  var accion = "requisitos-especialidad-clan";
  var cadena = "Id-persona="+id_persona+"&Id-especialidad="+id_especialidad+"&accion="+accion;
  $.ajax({
    type:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOProgresiones.php",
    data:cadena,
    success:function(datos){
      $('#cuerpo-requisitos-clan').html(datos);
    }
  });
}