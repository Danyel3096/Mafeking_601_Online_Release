<?php
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';
?>
<div class="container">
  <div class="row">
    <div class="col-3">
      <input type="radio" name="inscripcion-rama" value="6"> Manada
    </div>
    <div class="col-3">
      <input type="radio" name="inscripcion-rama" value="5"> Tropa
    </div>
    <div class="col-3">
      <input type="radio" name="inscripcion-rama" value="4"> Comunidad
    </div>
    <div class="col-3">
      <input type="radio" name="inscripcion-rama" value="3"> Clan
    </div>
  </div>
</div>
<table class="table-striped table-hover table-bordered" id="tabla-inscripcion" name="tabla-inscripcion">
  <thead>
    <tr>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Inscripción</th>
      <th>Acción</th>
    </tr>
  </thead>
</table>
<div class="modal fade" id="modal-inscripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de inscripción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <input type="hidden" class="form-control" id="id-inscripcion" name="id-inscripcion" />
          <input type="hidden" class="form-control" id="id-persona-inscripcion" name="id-persona-inscripcion" />
          <div class="col-md-6">
            <div class="form-group">
              <label for="abonoinscripcion"><strong>Abono</strong></label>
              <input type="text" class="form-control" id="abonoinscripcion" name="abonoinscripcion" placeholder="Abono" required />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="valor-inscripcion"><strong>Valor</strong></label>
              <input type="text" class="form-control" id="valor-inscripcion" name="valor-inscripcion" placeholder="Precio" disabled />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12 text-center">
            <button type="button" class="btn btn-success btn-icono" id="btn-guardar-inscripcion" name="btn-guardar-inscripcion"><i class="fas fa-cloud-upload-alt"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>