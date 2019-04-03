<?php
include_once '../App/Configuracion.php';
?>
$(document).ready(function() {
	var id_persona = $("#id-persona").val();
	listarAcudientes(id_persona);
	$("#btn-hoja-vida").click(function() {
		$("#formulario-hoja-vida").validate({
			invalidHandler: function(event, validator) {
				alertify.error("Por favor, verifica los campos requeridos *");
			},
			submitHandler: function(form) {
				registroHojaVida();
			},
			rules:{
				fechaingreso:{required: true, dateISO: true},
				estadocivil:{required: true},
				niveleducativo:{required: true},
				carrera:{latinos: true},
				actividadeportiva:{latinos: true},
				actividadcultural:{latinos: true},
				comidafavorita:{latinos: true},
				musicafavorita:{latinos: true},
				grupoanterior:{latinos: true},
				asignaturafavorita:{latinos: true}
			},
			messages:{
				fechaingreso:{required: 'El campo es requerido', dateISO: 'El formato es incorrecto'},
				estadocivil:{required: 'El campo es requerido'},
				niveleducativo:{required: 'El campo es requerido'},
				carrera:{latinos: 'Solo se aceptan letras latinas'},
				actividadeportiva:{latinos: 'Solo se aceptan letras latinas'},
				actividadcultural:{latinos: 'Solo se aceptan letras latinas'},
				comidafavorita:{latinos: 'Solo se aceptan letras latinas'},
				musicafavorita:{latinos: 'Solo se aceptan letras latinas'},
				grupoanterior:{latinos: 'Solo se aceptan letras latinas'},
				asignaturafavorita:{latinos: 'Solo se aceptan letras latinas'}
			}
		});
	});
	$("#btn-ficha-medica").click(function() {
		$("#formulario-ficha-medica").validate({
			invalidHandler: function(event, validator) {
				alertify.error("Por favor, verifica los campos requeridos *");
			},
			submitHandler: function(form) {
				registroFichaMedica();
			},
			rules:{
				epspersona:{required: true, latinos: true},
				gruposanguineo:{required: true},
				factorrh:{required: true},
				medicamento:{latinos: true},
				prescripcion:{latinos: true},
				alergia:{latinos: true},
				enfermedad:{latinos: true},
				dieta:{latinos: true},
				tetano:{required: true},
				tripleviral:{required: true},
				varicela:{required: true},
				influenza:{required: true},
				rubeolasarampion:{required: true},
				fiebreamarilla:{required: true},
				hepatitisb:{required: true},
				papilomahumano:{required: true},
				meningitisa:{required: true},
				parotiditis:{required: true},
				neumococo:{required: true},
				poliomielitis:{required: true},
				discapacidad:{latinos: true},
				cirugia:{latinos: true},
				tratamiento:{latinos: true},
				informacionadicional:{latinos: true}
			},
			messages:{
				epspersona:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras latinas'},
				gruposanguineo:{required: 'El campo es requerido'},
				factorrh:{required: 'El campo es requerido'},
				medicamento:{latinos: 'Solo se aceptan letras latinas'},
				prescripcion:{latinos: 'Solo se aceptan letras latinas'},
				alergia:{latinos: 'Solo se aceptan letras latinas'},
				enfermedad:{latinos: 'Solo se aceptan letras latinas'},
				dieta:{latinos: 'Solo se aceptan letras latinas'},
				tetano:{required: 'El campo es requerido'},
				tripleviral:{required: 'El campo es requerido'},
				varicela:{required: 'El campo es requerido'},
				influenza:{required: 'El campo es requerido'},
				rubeolasarampion:{required: 'El campo es requerido'},
				fiebreamarilla:{required: 'El campo es requerido'},
				hepatitisb:{required: 'El campo es requerido'},
				papilomahumano:{required: 'El campo es requerido'},
				meningitisa:{required: 'El campo es requerido'},
				parotiditis:{required: 'El campo es requerido'},
				neumococo:{required: 'El campo es requerido'},
				poliomielitis:{required: 'El campo es requerido'},
				discapacidad:{latinos: 'Solo se aceptan letras latinas'},
				cirugia:{latinos: 'Solo se aceptan letras latinas'},
				tratamiento:{latinos: 'Solo se aceptan letras latinas'},
				informacionadicional:{latinos: 'Solo se aceptan letras latinas'}
			},
			errorPlacement: function(error, element) {
				if (element.is(":radio")) {
					error.appendTo(element.closest('.row'));
				} else {
      				error.insertAfter(element);
    			}
			}
		});
	});
	$("#btn-acudiente").click(function() {
		$("#formulario-acudiente").validate({
			invalidHandler: function(event, validator) {
				alertify.error("Por favor, verifica los campos requeridos *");
			},
			submitHandler: function(form) {
				registroAcudiente();
			},
			rules:{
				cedula:{required: true, digits: true},
				generoacudiente:{required: true},
				correoacudiente:{required: true},
				nombresacudiente:{required: true, latinos: true},
				apellidosacudiente:{required: true, latinos: true},
				parentesco:{required: true},
				direccionacudiente:{required: true},
				barrioacudiente:{required: true},
				epsacudiente:{required: true, latinos: true},
				celularacudiente:{required: true, digits: true},
				telefonoacudiente:{digits: true},
				departamentoacudiente:{required: true},
				municipioacudiente:{required: true},
				profesion:{required: true, latinos: true},
				empresa:{required: true, latinos: true},
				ocupacion:{required: true, latinos: true}
			},
			messages:{
				cedula:{required: 'El campo es requerido', digits: 'Solo se aceptan digitos'},
				generoacudiente:{required: 'El campo es requerido'},
				correoacudiente:{required: 'El campo es requerido'},
				nombresacudiente:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras'},
				apellidosacudiente:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras'},
				parentesco:{required: 'El campo es requerido'},
				direccionacudiente:{required: 'El campo es requerido'},
				barrioacudiente:{required: 'El campo es requerido'},
				epsacudiente:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras'},
				celularacudiente:{required: 'El campo es requerido', digits: 'Solo se aceptan digitos'},
				telefonoacudiente:{digits: 'Solo se aceptan digitos'},
				profesion:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras'},
				departamentoacudiente:{required: 'El campo es requerido'},
				municipioacudiente:{required: 'El campo es requerido'},
				empresa:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras'},
				ocupacion:{required: 'El campo es requerido', latinos: 'Solo se aceptan letras'}
			}
		});
	});
	var accion = "accion="+"departamentos";
	$.ajax({
		method:'POST',
    	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php",
    	data:accion,
    	success:function(data){
	    	$("#departamentoacudiente").html(data);
	    }
	});
	$("#departamentoacudiente").change(function() {
		$("#departamentoacudiente option:selected").each(function() {
    		id_departamento = $(this).val();
    		var cadena = "id_departamento="+id_departamento+"&accion="+"municipios";
    		$.ajax({
				method:'POST',
    			url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAORegistro.php",
    			data:cadena,
    			success:function(data){
	    			$("#municipioacudiente").html(data);
    			}
			});
    	});
	});
});
function registroHojaVida() {
	var id_persona = $("#id-persona").val();
	var fecha_ingreso = $("#fechaingreso").val();
	var estado_civil = $("#estadocivil option:selected").val();
   	var religion = $("#religion option:selected").val();
	var nivel_educativo = $("#niveleducativo option:selected").val();
	var carrera = $("#tipocarrera option:selected").val()+" "+$("#carrera").val();
	var curso = $("#curso option:selected").val();
	var actividad_deportiva = $("#actividadeportiva").val();
	var actividad_cultural = $("#actividadcultural").val();
	var comida_favorita = $("#comidafavorita").val();
	var musica_favorita = $("#musicafavorita").val();
	var grupo_anterior = $("#grupoanterior").val();
	var asignatura_favorita = $("#asignaturafavorita").val();
	var accion = 'insertar-actualizar-hoja-vida';
	var cadena = "Id-persona="+id_persona+"&Fecha-ingreso-persona="+fecha_ingreso+"&Estado-civil-persona="+estado_civil+"&Religion-persona="+religion
	+"&Nivel-educativo-persona="+nivel_educativo+"&Carrera-persona="+carrera+"&Curso-persona="+curso+
	"&Actividad-deportiva-persona="+actividad_deportiva+"&Actividad-cultural-persona="+actividad_cultural
	+"&Comida-favorita-persona="+comida_favorita+"&Musica-favorita-persona="+musica_favorita+
	"&Grupo-anterior-persona="+grupo_anterior+"&Asignatura-favorita-persona="+asignatura_favorita
	+"&accion="+accion;
   	$.ajax({
	   	method:'POST',
       	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOConfiguracion.php",
       	data:cadena,
       	success:function(respuesta){
       		if(respuesta == true) {
	   			alertify.success("Registro exitoso de tu hoja de vida");
    		} else {
       			alertify.error("No pudo registrarse tu hoja de vida.<br>Recargue la página e intentelo nuevamente.");
       		}
       	}
    });
}
function registroFichaMedica() {
	var id_persona = $("#id-persona").val();
	var eps_persona = $("#epspersona").val();
	var grupo_sanguineo = $("#gruposanguineo option:selected").val();
	var factor_rh = $("#factorrh option:selected").val();
	var medicamento = $("#medicamento").val();
	var prescripcion = $("#prescripcion").val();
	var alergia = $("#alergia").val();
	var enfermedad = $("#enf").val();
	var tetano = $("input[name='tetano']:checked").val();
	var triple_viral = $("input[name='tripleviral']:checked").val();
	var varicela = $("input[name='varicela']:checked").val();
	var influenza = $("input[name='influenza']:checked").val();
	var rubeola_sarampion = $("input[name='rubeolasarampion']:checked").val();
	var fiebre_amarilla = $("input[name='fiebreamarilla']:checked").val();
	var hepatitis_b = $("input[name='hepatitisb']:checked").val();
	var papiloma_humano = $("input[name='papilomahumano']:checked").val();
	var meningitis_a = $("input[name='meningitisa']:checked").val();
	var parotiditis =  $("input[name='parotiditis']:checked").val();
	var neumococos = $("input[name='neumococo']:checked").val();
	var poliomielitis = $("input[name='poliomielitis']:checked").val();
	var dieta = $("#dieta").val();
	var discapacidad = $("#discapacidad").val();
	var cirugia = $("#cirugia").val();
	var tratamiento = $("#tratamiento").val();
	var informacion_adicional = $("#informacionadicional").val();
	var accion = 'insertar-actualizar-ficha-medica';
	var cadena = "Id-persona="+id_persona+"&EPS-persona="+eps_persona+"&Grupo-sanguineo-persona="+grupo_sanguineo+"&Factor-Rh-persona="+factor_rh
	+"&Medicamento-persona="+medicamento+"&Prescripcion-persona="+prescripcion+"&Alergia-persona="+alergia+
	"&Enfermedad-persona="+enfermedad+"&Tetanos-persona="+tetano
	+"&Triple-viral-persona="+triple_viral+"&Varicela-persona="+varicela+
	"&Influenza-persona="+influenza+"&Rubeola-Sarampion-persona="+rubeola_sarampion
	+"&Fiebre-amarilla-persona="+fiebre_amarilla+"&Hepatitis-B-persona="+hepatitis_b
	+"&Papiloma-humano-persona="+papiloma_humano+"&Meningitis-A-persona="+meningitis_a
	+"&Parotiditis-persona="+parotiditis+"&Neumococos-persona="+neumococos+"&Poliomielitis-persona="+poliomielitis
	+"&Dieta-persona="+dieta+"&Discapacidad-persona="+discapacidad
	+"&Cirugia-persona="+cirugia+"&Tratamiento-persona="+tratamiento+"&Informacion-adicional-persona="+informacion_adicional
	+"&accion="+accion;
   	$.ajax({
	   	method:'POST',
       	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOConfiguracion.php",
       	data:cadena,
       	success:function(respuesta){
       		if(respuesta == true) {
	   			alertify.success("Registro exitoso de tu ficha medica");
    		} else {
       			alertify.error("No pudo registrarse tu ficha medica.<br>Recargue la página e intentelo nuevamente.");
       		}
       	}
    });
}
function listarAcudientes(id_persona) {
	var accion = "tabla-acudiente";
  	var tabla = $("#tabla-acudientes").DataTable({
    "destroy":true,
    "ajax":{
      "method":"POST",
      "url":"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOConfiguracion.php",
      "data":{"Id-persona": id_persona, "accion":accion}
    },
    "columns":[
      {"data":"Nombres"},
      {"data":"Apellidos"},
      {"data":"Parentesco"},
      {"defaultContent":"<button type='button' class='btn btn-warning btn-icono' data-toggle='modal' data-target='#modal-acudiente' id='btn-editar-acudiente'><i class='fas fa-edit'></button>", "orderable": false}
    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    "dom":"<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",//"lBfrtip"
    "buttons":[
      {
        "extend": 'csv',
        "text": '<img src="https://img.icons8.com/ultraviolet/30/000000/csv.png">',
        "titleAttr": 'CSV',
        "className": 'btn btn-info'
      },
      {
        "extend":'excel',
        "text": '<img src="https://img.icons8.com/office/30/000000/ms-excel.png">',
        "titleAttr": 'Excel',
        "className": 'btn btn-success'
      },
      {
        "extend":'pdf',
        "text": '<img src="https://img.icons8.com/office/30/000000/pdf.png">',
        "titleAttr": 'PDF',
        "download": 'open',
        "className": 'btn btn-danger'
      },
      {
        "extend":'colvis',
        "text": '<img src="https://img.icons8.com/ios/40/000000/select-column.png">',
        "titleAttr": 'Ver/Ocultar columnas'
      }
    ]
  });
  obtenerDatosAcudiente("#tabla-acudientes tbody", tabla);
}

var obtenerDatosAcudiente = function(tbody, tabla) {
  $(tbody).on("click", "#btn-editar-acudiente", function() {
    var datos = tabla.row($(this).parents("tr")).data();
    var id_noticia = $("#id-noticia").val(datos.Id);
    var titulo = $("#titulo-noticia").val(datos.Titulo);
    if (datos.Estado == 'Publicada') {
      $("#estado-noticia").prop("checked", true);
    } else {
      $("#estado-noticia").prop("checked", false);
    }
    var texto = $("#cuerpo-noticia").val(datos.Texto);
  });
}
function registroAcudiente() {
	var id_persona = $("#id-persona").val();
	var cedula = $("#cedula").val();
	var genero_acudiente = $("#generoacudiente option:selected").val();
	var correo_acudiente = $("#correoacudiente").val();
	var nombres_acudiente = $("#nombresacudiente").val();
	var apellidos_acudiente = $("#apellidosacudiente").val();
	var parentesco = $("#parentesco option:selected").val();
	var direccion_acudiente = $("#direccionacudiente").val();
	var barrio_acudiente = $("#barrioacudiente").val();
	var estrato_acudiente = $("#estratoacudiente option:selected").val();
	var eps_acudiente = $("#epsacudiente").val();
	var celular_acudiente = $("#celularacudiente").val();
	var telefono_acudiente = $("#telefonoacudiente").val();
	var profesion = $("#profesion").val();
	var empresa = $("#empresa").val();
	var ocupacion = $("#ocupacion").val();
	var id_municipio = $("#municipioacudiente option:selected").val();
	var accion = 'insertar-actualizar-acudiente';
	var cadena = "Id-persona="+id_persona+"&Numero-cedula="+cedula+"&Genero-acudiente="+genero_acudiente+"&Correo-acudiente="+correo_acudiente
	+"&Direccion-acudiente="+direccion_acudiente+"&Barrio-acudiente="+barrio_acudiente+"&Estrato-acudiente="+estrato_acudiente+"&Nombres-acudiente="+nombres_acudiente+"&Apellidos-acudiente="+apellidos_acudiente+"&Parentesco="+parentesco+
	"&EPS-acudiente="+eps_acudiente+"&Celular-acudiente="+celular_acudiente
	+"&Telefono-acudiente="+telefono_acudiente+"&Profesion="+profesion+
	"&Empresa="+empresa+"&Ocupacion="+ocupacion+"&Id-municipio-acudiente="+id_municipio+"&accion="+accion;
   	$.ajax({
	   	method:'POST',
       	url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOConfiguracion.php",
       	data:cadena,
       	success:function(respuesta){
       		if(respuesta == true) {
       			$('#tabla-acudientes').DataTable().ajax.reload();
	   			alertify.success("Registro exitoso de tu acudiente");
	   			$('#modal-acudiente').modal('hide');
    		} else {
       			alertify.error("No pudo registrarse tu acudiente.<br>Recargue la página e intentelo nuevamente.");
       		}
       	}
    });
}