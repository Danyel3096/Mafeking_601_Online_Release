<?php
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';
?>
<div class="container">
  <div class="row">
    <div class="col-3">
      <input type="radio" name="detalle-rama" value="6"> Manada
    </div>
    <div class="col-3">
      <input type="radio" name="detalle-rama" value="5"> Tropa
    </div>
    <div class="col-3">
      <input type="radio" name="detalle-rama" value="4"> Comunidad
    </div>
    <div class="col-3">
      <input type="radio" name="detalle-rama" value="3"> Clan
    </div>
  </div>
</div>
<table class="table-striped table-hover table-bordered" id="tabla-detalle" name="tabla-detalle">
  <thead>
    <tr>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Acción</th>
    </tr>
  </thead>
</table>
<div class="modal fade" id="modal-detalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle del scout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id-persona-detalle" name="id-persona-detalle" />
        <table>
          <thead>
            <tr>
              <th>Detalle</th>
              <th>Abono</th>
              <th>Valor</th>
            </tr>
          </thead>
          <tbody id="detalle-persona" name="detalle-persona"></tbody>
        </table>
      </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-success btn-icono" id="btn-guardar-detalle" name="btn-guardar-detalle"><i class="fas fa-cloud-upload-alt"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>