<div class="form-row text-center">
  <input type="hidden" class="form-control" id="id-tesoreria" name="id-tesoreria">
  <input type="hidden" class="form-control" id="id-rama" name="id-rama">
  <div class="col-md-6">
    <div class="form-group">
      <label for="detalletesoreria"><strong>Detalle</strong></label><span class="obligatorio">*</span>
      <input type="text" class="form-control" id="detalletesoreria" name="detalletesoreria" placeholder="Detalle" required>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="periodicidadtesoreria"><strong>Periodicidad</strong></label><span class="obligatorio">*</span><br>
      <select id="periodicidadtesoreria" name="periodicidadtesoreria" class="form-control custom-select" required>
        <option label="Seleccione" selected></option> 
        <option value="Anual">Anual</option>
        <option value="Mensual">Mensual</option>
        <option value="Única">Única</option>
      </select>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="valortesoreria"><strong>Valor</strong></label><span class="obligatorio">*</span>
      <input type="number" class="form-control" id="valortesoreria" name="valortesoreria" placeholder="$" required>
    </div>
  </div>
</div>
<div class="form-row text-center">
  <div class="col-md-6">
    <div class="form-group">
      <label for="fechainiciotesoreria"><strong>Fecha inicio</strong></label><span class="obligatorio">*</span>
      <input type="date" class="form-control" id="fechainiciotesoreria" name="fechainiciotesoreria" required>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="fechafintesoreria"><strong>Fecha fin</strong></label><span class="obligatorio">*</span>
      <input type="date" class="form-control" id="fechafintesoreria" name="fechafintesoreria" required>
    </div>
  </div>
</div>
<div class="form-row">
	<div class="col-md-12 text-center">
		<button type="button" class="btn btn-success btn-icono" id="btn-agregar-tesoreria" name="btn-agregar-tesoreria"><i class="fas fa-cloud-upload-alt"></i></button>
	</div>
</div>