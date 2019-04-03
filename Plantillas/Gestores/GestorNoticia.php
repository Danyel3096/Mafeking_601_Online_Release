<?php
include_once 'App/Conexion.php';
include_once 'App/Modelos/Noticia.php';
include_once 'App/DAO/DAONoticia.php';
include_once 'App/Redireccion.php';

Conexion :: abrirConexion();
$conexion = Conexion :: obtenerConexion();
$id_persona = $_SESSION['id'];
$persona_recuperada = DAOPersona :: consultarPersonaPorId($conexion, $id_persona);
$detalle_cargo = DAODetalleCargo :: consultarDetalleCargoPorIdPersona($conexion, $id_persona);
$equipo = DAOEquipo :: consultarEquipoPorId(Conexion :: obtenerConexion(), $detalle_cargo -> obtenerIdEquipo());
$rama = DAORama :: consultarRamaPorId(Conexion :: obtenerConexion(), $equipo -> obtenerIdRama());
$id_rama = $rama -> obtenerId();
$id_cargo = $detalle_cargo -> obtenerIdCargo();
$cargo = DAOCargo :: consultarCargoPorId($conexion, $id_cargo);
$nombre_cargo = $cargo -> obtenerNombre();
$nombre_equipo = $equipo -> obtenerNombre();

$estado = '';

include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<div class="container">
  <div class="row text-center">
    <div class="col-6">
      <input type="radio" name="estado-noticia" value="Sin publicar" <?php if($estado == "Sin publicar") echo "checked"?>> Borradores
    </div>
    <div class="col-6">
      <input type="radio" name="estado-noticia" value="Publicada" <?php if($estado == "Publicada") echo "checked" ?>> Publicadas
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <button class="btn btn-primary btn-icono btn-plus" id="btn-noticia-nueva" data-toggle="modal" data-target="#modal-noticia"><i class="fas fa-plus-square"></i></button>
      <table class="table-striped table-hover table-bordered" id="tabla-noticias">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Título</th>
            <th>Comentarios</th>
            <th></th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-noticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de la noticia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="contenido" class="container">
          <div class="form-row">
            <input type="hidden" id="id-persona-noticia" class="form-control" value="<?php echo $id_persona; ?>" />
            <input type="hidden" id="id-noticia" class="form-control" />
            <div class="form-group col-10">
              <label><strong>Titulo:</strong></label>
              <input type="text" id="titulo-noticia" class="form-control" placeholder="Título de la noticia" /><br/>
            </div>
            <div class="form-group col-2">
              <label><strong>Publicar:</strong></label><br/>
              <label class="switch">
                <input type="checkbox" id="estado-noticia" class="form-control" data-off="0" data-on="1" />
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <label><strong>Contenido:</strong></label>
              <textarea class="form-control" rows="10" cols="12" id="cuerpo-noticia" placeholder="Contenido de la noticia"></textarea>
            </div>
          </div><br>
          <div class="form-row">
            <div class="col-md-12 text-center">
              <img id="img-imagen-noticia" class="imagen-recuperada" hidden />
              <hr>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <form class="text-center dropzone" action="<?php echo SERVIDOR ?>/App/Servidor/CtrlDAOArchivos.php" method="POST" enctype="multipart/form-data" id="dropzoneFormNoticia">
                <input type="hidden" id="id-persona-imagen-noticia" name="id-persona-imagen-noticia" class="form-control" value="<?php echo $id_persona; ?>" />
                <div class="fallback">
                  <input type="file" id="imagen-noticia" multiple />
                </div>
              </form>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <button type="button" id="btn-guardar-noticia" class="btn btn-success btn-icono" data-dismiss="modal"><i class="fas fa-cloud-upload-alt"></i></button>
      </div>
    </div>
  </div>
</div>