<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
	$("#btn-registro").click(function() {
		$("#formulario-registro").validate({
			invalidHandler: function(event, validator) {
				alertify.error("Por favor, verifica las instrucciones y los campos requeridos *");
			},
			submitHandler: function(form) {
				registrarFormulario();
			},
			rules:{
				tipo:{required: true},
				documento:{required: true, digits: true, minlength: 8, maxlength: 15,
					remote: {
						url:'<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php',
						type:'POST',
						data:{documento: function() {
							return $('#documento').val();
						}, accion: 'persona-validar-documento'}
					}
				},
				genero:{required: true},
				nombres:{required: true, latinos: true, minlength: 3, maxlength: 50},
				apellidos:{required: true, latinos: true, minlength: 3, maxlength: 50},
				fecha:{required: true, dateISO: true},
				departamento:{required: true},
				municipio:{required: true},
				celular:{required: true, digits: true, minlength: 8, maxlength: 14,
					remote: {
						url:'<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php',
						type:'POST',
						data:{celular: function() {
							return $('#celular').val();
						}, accion: 'persona-validar-celular'}
					}
				},
				telefono:{digits: true, minlength: 8, maxlength: 11},
				direccion:{required: true, minlength: 5, maxlength: 60},
				barrio:{required: true, latinos: true, minlength: 3, maxlength: 50},
				estrato:{required: true},
				sector:{required: true},
				escuela:{required: true},
				totem:{minlength: 3, maxlength: 100},
				correo:{required: true, correo: true, minlength: 10, maxlength: 100,
					remote: {
						url: "<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php",
						type: "POST",
						data:{correo: function() {
							return $("#correo").val();
						}, accion: "persona-validar-correo"}
					}
				},
				confirmacion:{required: true, equalTo: "#correo"},
				clave:{required: true, contrasena: true, minlength: 6, maxlength: 255},
				clave2:{required: true, equalTo: "#clave"}
			},
			messages:{
				tipo:{required: 'El campo es requerido'},
				documento:{required: 'El campo es requerido', digits: 'Solo se aceptan dígitos', minlength: 'El mínimo permitido son 8 caracteres', maxlength: 'El máximo permitido son 15 caracteres', remote:'El documento ya existe'},
				genero:{required: 'El campo es requerido'},
				nombres:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras', minlength: 'El minimo permitido son 3 caracteres', maxlength: 'El maximo permitido son 50 caracteres'},
				apellidos:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras', minlength: 'El minimo permitido son 3 caracteres', maxlength: 'El maximo permitido son 50 caracteres'},
				fecha:{required: 'El campo es requerido', dateISO: 'El formato es incorrecto'},
				departamento:{required: 'El campo es requerido'},
				municipio:{required: 'El campo es requerido'},
				celular:{required: 'El campo es requerido', digits: 'Solo se aceptan dígitos', minlength: 'El mínimo permitido son 8 caracteres', maxlength: 'El máximo permitido son 14 caracteres', remote: 'El número celular ya existe'},
				telefono:{digits: 'Solo se aceptan dígitos', minlength: 'El mínimo permitido son 8 caracteres', maxlength: 'El máximo permitido son 11 caracteres'},
				direccion:{required: 'El campo es requerido', minlength: 'El minimo permitido son 5 caracteres', maxlength: 'El maximo permitido son 60 caracteres'},
				barrio:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras', minlength: 'El minimo permitido son 3 caracteres', maxlength: 'El maximo permitido son 50 caracteres'},
				estrato:{required: 'El campo es requerido'},
				sector:{required: 'El campo es requerido'},
				escuela:{required: 'El campo es requerido'},
				totem:{minlength: 'El minimo permitido son 3 caracteres', maxlength: 'El maximo permitido son 100 caracteres'},
				correo:{required: 'El campo es requerido', correo: 'El formato de correo es incorrecto', minlength: 'El mínimo permitido son 10 caracteres', maxlength: 'El máximo permitido son 100 caracteres', remote: 'El correo ya existe'},
				confirmacion:{required: 'El campo es requerido', equalTo:'Los campos de correo no coinciden'},
				clave:{required: 'El campo es requerido', contrasena: 'Al menos: una letra mayúscula, una letra minúscula, un dígito y sin espacios', minlength: 'El mínimo permitido es de 6 caracteres', maxlength: 'El máximo permitido es de 255 caracteres'},
				clave2:{required: 'El campo es requerido', equalTo:'Los campos de contraseña no coinciden'}
			}
		});
	});
//ESTE CODIGO MUESTRA UN TOOLTIP PARA UNA NOTA O ALGO
//$('#documento').tooltip({'trigger':'focus', 'title': 'Password tooltip'});
var accion = "accion="+"departamentos";
	$.ajax({
		method:'POST',
    	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php",
    	data:accion,
    	success:function(data){
alert(data);
	    	$("#departamento").html(data);
	    }
	});
	$("#departamento").change(function() {
		$("#departamento option:selected").each(function() {
    		id_departamento = $(this).val();
    		var cadena = "id_departamento="+id_departamento+"&accion="+"municipios";
    		$.ajax({
				method:'POST',
    			url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php",
    			data:cadena,
    			success:function(data){
	    			$("#municipio").html(data);
    			}
			});
    	});
	});
	$("#sector").change(function() {
		$("#sector option:selected").each(function() {
    		sector = $(this).val();
    		var cadena = "sector="+sector+"&accion="+"centros-educativos";
    		$.ajax({
				method:'POST',
    			url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php",
    			data:cadena,
    			success:function(data){
	    			$("#escuela").html(data);
    			}
			});
    	});
	});
	$("#fecha").blur(function(){
    	var umbral = calcularEdad($(this).val());
		if (umbral >= 23) {
			$('#fila-opcional').css("display", "none");
			var sector = $("#sector option:selected").val('1');
    		var escuela = $("#escuela option:selected").val('1');
    		$('#btn-registro').prop("disabled", false);
		} else if (umbral < 6) {
			$('#btn-registro').prop("disabled", true);
			alertify.warning('No puede registrarse si es menor de 6 años');
		} else {
			$('#fila-opcional').css("display", "flex");
			$('#btn-registro').prop("disabled", false);
		}
		equipoPersona(umbral);
	});
});
var registrarFormulario = function() {
	var tipo = $("#tipo option:selected").val();
	var documento = $("#documento").val();
   	var genero = $("#genero option:selected").val();
	var nombres = $("#nombres").val();
	var apellidos = $("#apellidos").val();
	var fecha = $("#fecha").val();
	var id_municipio = $("#municipio").val();
	var celular = $("#celular").val();
	var telefono = $("#telefono").val();
	var direccion = $("#direccion").val();
	var barrio = $("#barrio").val();
	var estrato = $("#estrato").val();
    var sector = $("#sector option:selected").val();
    var escuela = $("#escuela option:selected").val();
    var id_equipo = $("#equipos-rama option:selected").val();
	var investidura = $("#investidura").val();
	var totem = $("#totem").val();
	var correo = $("#correo").val();
	var clave = $("#clave").val();
	var id_cargo = determinarCargo(calcularEdad($("#fecha").val()), $("#genero").val());
	accion = 'registro-persona';
	var cadena="tipo="+tipo+"&documento="+documento+"&genero="+genero+"&nombres="+nombres+"&apellidos="+apellidos+"&fecha="+fecha+"&id_municipio="+id_municipio+"&celular="+celular+"&telefono="+telefono+"&direccion="+direccion+"&barrio="+barrio+"&estrato="+estrato+"&sector="+sector+"&escuela="+escuela+"&investidura="+investidura+"&totem="+totem+"&correo="+correo+"&clave="+clave+"&Id-cargo="+id_cargo+"&Id-equipo="+id_equipo+"&accion="+accion;
   	$.ajax({
	   	method:'POST',
       	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php",
       	data:cadena,
       	success:function(r){
       		if(r==true) {
       			limpiarFormulario();
	   			alertify.success("Registro exitoso<br>Va a ser redirigido a la página principal");
				setTimeout("redireccionarPagina()", 4000);
    		} else {
       			alertify.error("No pudo registrarse.<br>Recargue la página e intentelo nuevamente.");
       		}
       	}
    });
}
var calcularEdad = function(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    return edad;
}
var determinarCargo = function(edad, genero) {
	if (edad <= 6) {
		return null;
	} else if (edad <= 10 && genero == 'Masculino') {
		return 25;
	} else if (edad <= 10 && genero == 'Femenino') {
		return 26;
	} else if (edad <= 14 && genero == 'Masculino') {
		return 23;
	} else if (edad <= 14 && genero == 'Femenino') {
		return 24;
	} else if (edad <= 17 && genero == 'Masculino') {
		return 20;
	} else if (edad <= 17 && genero == 'Femenino') {
		return 20;
	} else if (edad <= 23 && genero == 'Masculino') {
		return 17;
	} else if (edad <= 23 && genero == 'Femenino') {
		return 17;
	} else if (genero == 'Masculino') {
		return 13;
	} else if (genero == 'Femenino') {
		return 14;
	}
}
var equipoPersona = function(umbral) {
	var id_rama = null;
	if (umbral <= 10) {
		id_rama = 6;
	} else if (umbral <= 14) {
		id_rama = 5;
	} else if (umbral <= 17) {
		id_rama = 4;
	} else if (umbral <= 23) {
		id_rama = 3;
	} else {
		$("#equipos-rama").html("<option value='2'>Consejo</option><option value='1'>Jefatura</option>");
	}
	if (id_rama !== null) {
		var accion = "equipos-persona";
		var cadena = "Id-rama="+id_rama+"&accion="+accion;
		$.ajax({
			method:'POST',
    		url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php",
    		data:cadena,
    		success:function(data){
		    	$("#equipos-rama").html(data);
	   		}
		});
	}
}
var limpiarFormulario = function() {
	$('#tipo').prop('disabled', true);
	$("#documento").prop('disabled', true);
   	$('#genero').prop('disabled', true);
	$("#nombres").prop('disabled', true);
	$("#apellidos").prop('disabled', true);
	$("#fecha").prop('disabled', true);
	$("#departamento").prop('disabled', true);
	$("#municipio").prop('disabled', true);
	$("#celular").prop('disabled', true);
	$("#telefono").prop('disabled', true);
	$("#direccion").prop('disabled', true);
	$("#barrio").prop('disabled', true);
	$("#estrato").prop('disabled', true);
    $('#sector').prop('disabled', true);
    $('#escuela').prop('disabled', true);
    $('#equipos-rama').prop('disabled', true);
	$("#investidura").prop('disabled', true);
	$("#totem").prop('disabled', true);
	$("#correo").prop('disabled', true);
	$("#confirmacion").prop('disabled', true);
	$("#clave").prop('disabled', true);
	$("#clave2").prop('disabled', true);
}
var redireccionarPagina = function() {
	window.location = '<?php echo SERVIDOR ?>';
}
