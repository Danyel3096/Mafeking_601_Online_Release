<?php
$Titulo = "Editar perfil | Grupo Scout Mafeking 601";
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
<div class="container perfil inicio-perfil formularios-usuario">
  <div class="row" id="aviso-fila" name="aviso-fila">
    <div class="col-md-2"></div>
    <div class="col-md-8">PARA CAMBIAR TUS FOTOS DE PORTADA, POR FAVOR, PRIMERO COMPLETA TU HOJA DE VIDA</div>
    <div class="col-md-2"></div>
  </div>
  <div class="row" id="perfil-fila" name="perfil-fila">
    <div class="col-1"></div>
    <div class="col-md-7 sin-espaciado-derecha">
      <div class="row">
        <div class="col-md-12" id="columna-fondo" name="columna-fondo">
          <form class="text-center dropzone" action="../App/Servidor/CtrlDAOArchivos.php" method="POST" enctype="multipart/form-data" id="dropzoneFormFondo">
            <input type="hidden" id="id-persona" name="id-persona" value="<?php echo $id_persona; ?>" />
            <div class="fallback">
              <input type="file" src="Archivos/Imagenes/usuarios.jpg" id="fondo" name="fondo" multiple />
            </div>
          </form>
          <div align="center">
            <button type="submit" class="btn btn-info form-control btn-icono" id="btn-subir-fondo" name="btn-subir-fondo"><i class="fas fa-upload"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 sin-espaciado-izquierda">
      <form class="text-center dropzone" action="../App/Servidor/CtrlDAOArchivos.php" method="POST" enctype="multipart/form-data" id="dropzoneFormFoto">
        <input type="hidden" id="id-persona-foto" name="id-persona-foto" value="<?php echo $id_persona; ?>" />
        <div class="fallback">
          <input type="file" id="foto-previa" name="foto-previa" multiple />
        </div>
      </form>
      <div align="center">
        <button type="submit" class="btn btn-info form-control btn-icono" id="btn-subir-foto" name="btn-subir-foto"><i class="fas fa-upload"></i></button>
      </div>
    </div>
    <div class="col-1"></div>
  </div>
  <hr>
<ul class="nav nav-tabs nav-fill" id="pestanas" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pestana-perfil" data-toggle="tab" href="#perfil" role="tab" aria-controls="perfil" aria-selected="true">Perfil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pestana-acudiente" data-toggle="tab" href="#acudiente" role="tab" aria-controls="acudiente" aria-selected="false">Acudientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pestana-hoja-vida" data-toggle="tab" href="#hoja-vida" role="tab" aria-controls="hoja-vida" aria-selected="false">Hoja de vida</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pestana-ficha-medica" data-toggle="tab" href="#ficha-medica" role="tab" aria-controls="ficha-medica" aria-selected="false">Ficha medica</a>
  </li>
</ul>
<div class="tab-content" id="contenido-pestana">
  <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="home-tab">
    <form class="validar-formulario" id="formulario-persona" role="form" method="post">
    <?php
    include_once 'Plantillas/Formularios/FormularioPersona.php';
    ?>
    </form>
  </div>
  <div class="tab-pane fade show" id="acudiente" role="tabpanel" aria-labelledby="home-tab">
    <table class="table-striped table-hover table-bordered" id="tabla-acudientes">
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Parentesco</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
    <div class="modal fade" id="modal-acudiente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Información del acudiente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="validar-formulario" id="formulario-acudiente" role="form" method="post">
            <?php
            include_once 'Plantillas/Formularios/FormularioAcudiente.php';
            ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade show" id="hoja-vida" role="tabpanel" aria-labelledby="home-tab">
    <form class="validar-formulario" id="formulario-hoja-vida" role="form" method="post">
    <?php
    include_once 'Plantillas/Formularios/FormularioHojaVida.php';
    ?>
    </form>
  </div>
  <div class="tab-pane fade show" id="ficha-medica" role="tabpanel" aria-labelledby="home-tab">
    <form class="validar-formulario" id="formulario-ficha-medica" role="form" method="post">
    <?php
    include_once 'Plantillas/Formularios/FormularioFichaMedica.php';
    ?>
    </form>
  </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  comprobarHojaVida();
});
</script>
<script>
 Dropzone.options.dropzoneFormFoto = {
  withCredentials: true,
  parallelUploads: 1,
  maxFilesize: 2,//EN MB
  paramName: 'foto-previa',
  maxFiles: 1,
  clickable: true,
  ignoreHiddenFiles: true,
  acceptedFiles:".jpg,.jpeg,.gif,.bmp,.png,.svg",
  autoProcessQueue: false,
  autoQueue: true,
  dictDefaultMessage: "Arrastra el archivo aqui para subirlo como foto de perfil",
  dictFallbackMessage: "Su navegador no soporta arrastrar y soltar para subir archivos.",
  dictFallbackText: "Por favor utilize el formuario de reserva de abajo como en los viejos tiempos.",
  dictFileTooBig: "La imagen revasa el tamaño permitido ({{filesize}}MiB). Tam. Max : {{maxFilesize}}MiB.",
  dictInvalidFileType: "No se puede subir este tipo de archivos.",
  dictResponseError: "Server responded with {{statusCode}} code.",
  dictCancelUpload: "Cancelar subida",
  dictUploadCanceled: "Has cancelado la subida",
  dictCancelUploadConfirmation: "¿Seguro que desea cancelar esta subida?",
  dictRemoveFile: "Eliminar archivo",
  dictRemoveFileConfirmation: "¿Desea eliminar el archivo?",
  dictMaxFilesExceeded: "Se ha excedido el numero de archivos permitidos.",
  init: function(){
   var btn_subir_foto = document.querySelector('#btn-subir-foto');
   myDropzone = this;
   btn_subir_foto.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("success", function(file, respuesta){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    if (respuesta == 2) {
        alertify.error('El archivo excede el peso permitido');
      } else if(respuesta == 3) {
        alertify.error('El tipo de archivo no esta permitido');
      } else if(respuesta == 4) {
        alertify.error('El archivo no pudo ser subido');
      } else if (respuesta == 5) {
        alertify.error('El archivo no fue subido');
      } else if(respuesta == true) {
        alertify.success('El archivo fue subido correctamente');
      }
   });
  },
 };
</script>
<script type="text/javascript">
var comprobarHojaVida = function() {
  var id_persona = <?php echo $id_persona; ?>;
  var cadena = "Id-persona="+id_persona+"&accion="+"hoja-vida-persona";
  $.ajax({
    method:'POST',
      url:"<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOPerfil.php",
      data:cadena,
      success:function(data){
        if (data == true) {
          $('#aviso-fila').css("display", "flex");
          $('#perfil-fila').css("display", "none");
        } else {
          $('#aviso-fila').css("display", "none");
          $('#perfil-fila').css("display", "flex");
        }
      }
  });
}
</script>
<script type="text/javascript">//PARA FORMULARIOS
$(document).ready(function() {
  //
});
</script>
<?php
include_once 'Plantillas/CierrePagina.php';
?>