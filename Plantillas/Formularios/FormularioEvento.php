<div class="form-row text-center">
	<div class="col-md-6">
		<div class="form-group">
			<label><strong>Nombre</strong></label><span class="obligatorio">*</span>
            <input type="text" id="nombreevento" name="nombreevento" class="form-control" placeholder="Nombre del evento" required />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label><strong>Fecha de inicio</strong></label><span class="obligatorio">*</span>
			<input type="date" class="form-control" id="fechainicioevento" name="fechainicioevento" placeholder="Fecha de inicio" required />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label><strong>Hora inicio</strong></label><span class="obligatorio">*</span>
            <div class="input-group clockpicker" data-autoclose="true">
                <input type="time" id="horainicio" name="horainicio" class="form-control" required />
            </div>
		</div>
	</div>
</div>
<div class="form-row text-center">
	<div class="col-md-5">
		<div class="form-group">
			<label><strong>Sitio</strong></label><span class="obligatorio">*</span>
            <input type="text" id="sitioevento" name="sitioevento" class="form-control" placeholder="Sitio del evento" value="Colegio Seminario" required />
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label><strong>Fecha cierre</strong></label><span class="obligatorio">*</span>
            <input type="date" id="fechafinevento" name="fechafinevento" class="form-control" required />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label><strong>Hora cierre</strong></label><span class="obligatorio">*</span>
            <div class="input-group clockpicker" data-autoclose="true">
                <input type="time" id="horafin" name="horafin" class="form-control" value="06:00" required />
            </div>
		</div>
	</div>
</div>
<div class="form-row text-center">
	<div class="col-md-4">
		<div class="form-group">
			<label><strong>Tipo</strong></label><span class="obligatorio">*</span>
            <select id="tipoevento" name="tipoevento" class="form-control custom-select" required>
                <option label="Seleccione" selected></option> 
                <option value="Grupo">Grupo</option>
                <option value="Rama">Rama</option>
                <option value="Distrital">Distrital</option>
                <option value="Regional">Regional</option>
                <option value="Nacional">Nacional</option>
                <option value="Mundial">Mundial</option>
            </select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label id="labelfechaencuentroevento"><strong>Fecha encuentro</strong></label>
            <input type="date" id="fechaencuentroevento" name="fechaencuentroevento" class="form-control" />
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label id="labelhoraencuentro"><strong>Hora encuentro</strong></label><span class="obligatorio">*</span>
            <div class="input-group clockpicker" data-autoclose="true">
                <input type="time" id="horaencuentro" name="horaencuentro" class="form-control" required />
            </div>
		</div>
	</div>
</div>
<div class="form-row text-center">
	<div class="col-md-4">
		<div class="form-group">
			<label id="labelcostoevento"><strong>Costo</strong></label>
            <input type="number" id="costoevento" name="costoevento" class="form-control" placeholder="$" />
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="puntoencuentro" id="labelpuntoencuentro"><strong>Punto encuentro</strong></label>
            <input type="text" id="puntoencuentro" name="puntoencuentro" class="form-control" placeholder="Punto de encuentro" />
		</div>
	</div>
	<div class="col-md-4">
	</div>
</div><br />
<div class="row">
	<div class="col-md-12 text-center">
		<button type="button" id="btn-borrar-evento" class="btn btn-danger btn-icono" hidden><i class="far fa-trash-alt"></i></button>
		<button type="submit" id="btn-agregar-evento" name="btn-agregar-evento" class="btn btn-success btn-icono" hidden><i class="fas fa-cloud-upload-alt"></i></button>
	</div>
</div>
<hr>