<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
var accion = "accion="+"ultimas-noticias";
$.ajax({
	method:'POST',
   	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOPrincipal.php",
   	data:accion,
   	success:function(datos){
    	$("#ultimas-noticias").html(datos);
    }
});
var accion = "accion="+"imagenes-ramas-carrusel";
$.ajax({
	method:'POST',
   	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOPrincipal.php",
   	data:accion,
   	success:function(datos){
   		if (datos) {
   			var objeto = JSON.parse(datos);
   			$("#imagen-rama-grupo").prop("src", "Archivos/Imagenes/Ramas/Jefatura/"+objeto[0]['Imagen']);
   			$("#imagen-rama-manada").prop("src", "Archivos/Imagenes/Ramas/Manada/"+objeto[5]['Imagen']);
   			$("#imagen-rama-tropa").prop("src", "Archivos/Imagenes/Ramas/Tropa/"+objeto[4]['Imagen']);
   			$("#imagen-rama-comunidad").prop("src", "Archivos/Imagenes/Ramas/Comunidad/"+objeto[3]['Imagen']);
   			$("#imagen-rama-clan").prop("src", "Archivos/Imagenes/Ramas/Clan/"+objeto[2]['Imagen']);
   		}
    }
});
});