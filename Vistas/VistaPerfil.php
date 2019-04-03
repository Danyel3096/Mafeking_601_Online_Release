<?php
$Titulo = "Perfil de usuario | Grupo Scout Mafeking 601";
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';
include_once 'App/Modelos/Persona.php';
include_once 'App/DAO/DAOPersona.php';
include_once 'App/Controladores/ControlSesion.php';

if(!ControlSesion :: sesionIniciada()) {
  Redireccion :: redirigir(SERVIDOR);
} else {
  Conexion :: abrirConexion();
  $id_persona = $_SESSION['id'];
  $persona = DAOPersona :: consultarPersonaPorId(Conexion::obtenerConexion(), $id_persona);
}

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container perfil inicio-perfil">
  <div class="row fondo-perfil">
    <div class="col-1"></div>
    <div class="col-md-7 sin-espaciado-derecha">
      <img src="Archivos/Imagenes/Fondos/Fondo_Perfil_Rover.jpg" class="centrar img-thumbnail" id="fondo-perfil" name="fondo-perfil" />
    </div>
    <div class="col-md-3 sin-espaciado-izquierda text-center">
      <img class="img-thumbnail sin-espaciado-izquierda sin-espaciado-derecha" id="foto-perfil" name="foto-perfil" />
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row panel-perfil">
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-6">
          <div id="inscripcion"></div>
        </div>
        <div class="col-md-6">
          <div id="investidura"></div>
        </div>
      </div>
      <h2>Información</h2>
      <div class="row">
        <div class="col-md-6">
          <h4><i class="fas fa-birthday-cake"></i> <?php echo $persona -> obtenerFechaNacimiento(); ?></h4>
        </div>
        <div class="col-md-6">
          <h4>Última actividad</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4>TOTEM</h4>
        </div>
        <div class="col-md-6">
          <h4>FECHA DE TOTEMNIZACION</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4>CARGO</h4>
        </div>
        <div class="col-md-6">
          <h4>CENTRO EDUCATIVO</h4>
        </div>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <a href="<?php echo RUTA_PERFIL_EDITAR ?>"><button type="button" class="btn btn-info form-control btn-icono" id="btn-editar-perfil" name="btn-editar-perfil"><i class="fas fa-user-edit"></i></button></a>
      <h3>Tareas pendientes</h3>
      <ol>
        <div id="tareas-pendientes" name="tareas-pendientes"></div>
      </ol>
    </div>
  </div>
  <div class="row panel-perfil">
    <div class="col-md-9">
      <h2>Progresión personal</h2>
      <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
        </div>
      </div>
    </div>
  </div>
  <div class="row panel-perfil">
    <div class="col-md-9">
      <h2>Eventos actuales</h2>
      <div class="row">
        <div class="col-md-6">
          <span>FOTOS O PARCHE DEL EVENTO AL QUE ESTOY INSCRITO</span>
        </div>
        <div class="col-md-6"></div>
      </div>
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6"></div>
      </div>
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  fotoPersona();
  tareasPersona();
  var id = <?php echo $id_persona; ?>;
  var accion = "inscripcion-persona";
  cadena = "Id-persona="+id+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOPerfil.php",
    data:cadena,
    success:function(respuesta){
      var obj = JSON.parse(respuesta);
      $('#inscripcion').goalProgress({
        goalAmount: obj['Valor'],
        currentAmount: obj['Abono'],
        textBefore: '$',
        textAfter: '/ $'+obj['Valor']+' '+obj['Detalle']
      });
      $(".progressBar").attr("id", "barra");
      var texto = document.getElementById("barra").innerText;
      var abono = texto.substring(texto.indexOf('$')+1, texto.lastIndexOf('/'));
      var ra = texto.replace(obj['Abono'], formato(abono));
      var texto_nuevo = document.getElementById("barra").innerText = ra;
      var valor = texto_nuevo.substring(texto_nuevo.lastIndexOf('$')+1, texto_nuevo.lastIndexOf('I'));
      var rv = texto_nuevo.replace(obj['Valor'], formato(valor));
      document.getElementById("barra").innerText = rv;
    }
  });

});
$(document).ready(function(){
  var id = <?php echo $id_persona; ?>;
  var accion = "progresion-persona";
  cadena = "Id-persona="+id+"&accion="+accion;
  $.ajax({
    method:'POST',
    url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOPerfil.php",
    data:cadena,
    success:function(respuesta){
      var obj = JSON.parse(respuesta);
      $('#investidura').goalProgress({
        goalAmount: obj['Valor'],
        currentAmount: obj['Abono'],
        textBefore: '$',
        textAfter: '/ $'+obj['Valor']+' '+obj['Detalle']
      });
      $(".progressBar").attr("id", "barra");
      var texto = document.getElementById("barra").innerText;
      var abono = texto.substring(texto.indexOf('$')+1, texto.lastIndexOf('/'));
      var ra = texto.replace(obj['Abono'], formato(abono));
      var texto_nuevo = document.getElementById("barra").innerText = ra;
      var valor = texto_nuevo.substring(texto_nuevo.lastIndexOf('$')+1, texto_nuevo.lastIndexOf('I'));
      var rv = texto_nuevo.replace(obj['Valor'], formato(valor));
      document.getElementById("barra").innerText = rv;
    }
  });
});
var formato = function(valor) {
  var num = valor.replace(/\./g,'');
  if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    return num;
  }
}
var tareasPersona = function() {
  var id_persona = <?php echo $id_persona; ?>;
  var cadena = "Id-persona="+id_persona+"&accion="+"pendientes-persona";
  $.ajax({
    method:'POST',
      url:"App/Servidor/CtrlDAOPerfil.php",
      data:cadena,
      success:function(data){
        $("#tareas-pendientes").html(data);
      }
  });
}
</script>
<script type="text/javascript">
function fotoPersona() {
  var id_persona = <?php echo $id_persona; ?>;
  var cadena = "Id-persona="+id_persona+"&accion="+"foto-persona";
  $.ajax({
    method:'POST',
      url:"App/Servidor/CtrlDAOPerfil.php",
      data:cadena,
      success:function(datos){
        if (!datos) {
          var objeto = JSON.parse(datos);
          $("#foto-perfil").prop("src", "Archivos/Subidas/Perfiles/Fotos/"+objeto['Foto']);
        } else {
          $("#foto-perfil").prop("src", "Archivos/Imagenes/usuarios.jpg");
        }
      }
  });
}
</script>
<script type="text/javascript">
  var fondoPersona = function() {
  var id_persona = <?php echo $id_persona; ?>;
  var cadena = "Id-persona="+id_persona+"&accion="+"fondo-persona";
  $.ajax({
    method:'POST',
      url:"App/Servidor/CtrlDAOPerfil.php",
      data:cadena,
      success:function(data){
        $("#tareas-pendientes").html(data);
      }
  });
}
</script>
<?php
include_once 'Plantillas/CierrePagina.php';
?>