<?php
include_once 'App/Conexion.php';
include_once 'App/Redireccion.php';
?>
<div class="container">
  <div class="row">
    <div class="col-3">
      <input type="radio" name="tesoreria-rama" value="6"> Manada
    </div>
    <div class="col-3">
      <input type="radio" name="tesoreria-rama" value="5"> Tropa
    </div>
    <div class="col-3">
      <input type="radio" name="tesoreria-rama" value="4"> Comunidad
    </div>
    <div class="col-3">
      <input type="radio" name="tesoreria-rama" value="3"> Clan
    </div>
  </div>
</div>
<table class="table-striped table-hover table-bordered" id="tabla-tesoreria" name="tabla-tesoreria">
  <thead>
    <tr>
      <th>Detalle</th>
      <th>Periodicidad</th>
      <th>Fecha inicio</th>
      <th>Fecha fin</th>
      <th>Valor</th>
      <th>
        <button class="btn btn-primary btn-icono" data-toggle="modal" data-target="#modal-tesoreria" id='btn-nueva-tesoreria' name='btn-nueva-tesoreria'><i class="fas fa-plus"></i></button>
      </th>
    </tr>
  </thead>
</table>
<div class="modal fade" id="modal-tesoreria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de tesorería</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="validar-formulario" id="formulario-tesoreria" name="formulario-tesoreria" role="form" method="post">
        <?php
        include_once 'Plantillas/Formularios/FormularioTesoreria.php';
        ?>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>