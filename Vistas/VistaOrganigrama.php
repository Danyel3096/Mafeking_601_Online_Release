<?php
$Titulo = "Organigrama | Grupo Scout Mafeking 601";
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 ocultar">
			<ul id="organigrama-consejo">
				<li>
				Miguel La Rotta
					<ul>
						<li>
							Vice presidente
							<ul>
								<li>Andrea Escobar</li>
								<li>Angela Renteria</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-md-12 inicio-perfil">
			<div id="vista-jefatura" name="vista-jefatura"></div>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-md-12">
			<div id="vista-consejo" name="vista-consejo"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function() {
    var datasource = {
      'name': 'Lao Lao',
      'title': 'Jefe de grupo',
      'className': 'grupo',
      'children': [{
      	'name': 'Lao Lao',
      	'title': 'Subjefe de grupo',
      	'className': 'grupo',
      	'children':[
        { 'name': 'Bo Miao', 'title': 'jefe de manada', 'className': 'manada',
          'children': [
            { 'name': 'Li Jing', 'title': 'subjefe de manada', 'className': 'manada', 'children':[{ 'name': 'Li Xin', 'title': 'jefe de apoyo', 'className': 'manada'
            }, { 'name': 'Li Xin', 'title': 'padre/madre de apoyo', 'className': 'manada'
            }] }
          ]
        },
        { 'name': 'Su Miao', 'title': 'jefe de tropa', 'className': 'tropa',
          'children': [
            { 'name': 'Pang Pang', 'title': 'subjefe de tropa', 'className': 'tropa'}
          ]
        },
        { 'name': 'Su Miao', 'title': 'jefe de comunidad', 'className': 'comunidad'
        },
        { 'name': 'Su Miao', 'title': 'jefe de clan', 'className': 'clan'
        }
      ]
      }]
    };

    $('#vista-jefatura').orgchart({
      'data' : '<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOOrganigrama.php',//datasource,
      'nodeContent': 'title'
    });

  });
</script>
<script type="text/javascript">
$(document).ready(function(){
//var oj = $('#vista-jefatura').orgchart({
//	'data': $('#organigrama-jefatura')
//	});
var oc = $('#vista-consejo').orgchart({
	'data': $('#organigrama-consejo')
	});
});
</script>
<?php
include_once 'Plantillas/CierrePagina.php';
?>