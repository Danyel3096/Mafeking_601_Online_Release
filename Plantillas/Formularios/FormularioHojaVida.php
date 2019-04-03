<div class="form-row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="fechaingreso">Fecha de ingreso</label><span class="obligatorio">*</span>
			<input type="date" class="form-control" id="fechaingreso" name="fechaingreso" placeholder="Fecha de ingreso al grupo" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="estadocivil">Estado civil</label><span class="obligatorio">*</span><br>
			<select id="estadocivil" name="estadocivil" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option> 
				<option value="Soltero(a)">Soltero(a)</option>
				<option value="Prometido(a)">Prometido(a)</option>
				<option value="Casado(a)">Casado(a)</option>
				<option value="Divorciado(a)">Divorciado(a)</option>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="religion">Religión</label><br>
			<select id="religion" class="form-control custom-select">
   				<option label="Seleccione" selected></option> 
				<option value="Ninguna">Ninguna</option>
				<option value="Católica">Catolica</option>
				<option value="Evangélica">Evangelica</option>
				<option value="Testigos de Jehová">Testigos de Jehová</option>
				<option value="Otra">Otra</option>
			</select>
		</div>
	</div>
	<div class="col-md-3" id="fila-opcional-hoja-vida">
		<div class="form-group">
			<label for="niveleducativo">Nivel educativo</label><span class="obligatorio">*</span><br>
			<select id="niveleducativo" name="niveleducativo" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option> 
				<option value="Ninguno">Ninguno</option>
				<option value="Primaria">Primaria</option>
				<option value="Bachillerato">Bachillerato</option>
				<option value="Tecnica">Tecnica</option>
				<option value="Tecnologia">Tecnologia</option>
				<option value="Pregrado">Pregrado</option>
				<option value="Posgrado">Posgrado</option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="tipocarrera">Tipo carrera</label><br>
			<select id="tipocarrera" class="form-control custom-select">
   				<option label="Seleccione" selected></option> 
				<option value="Tecnica">Tecnica</option>
				<option value="Tecnologia">Tecnologia</option>
				<option value="Pregrado">Pregrado</option>
				<option value="Posgrado">Posgrado</option>
				<option value="Maestria">Maestria</option>
				<option value="Doctorado">Doctorado</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="carrera">Carrera</label>
			<input type="text" class="form-control" id="carrera" placeholder="Carrera">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="curso">Curso</label><br>
			<select id="curso" class="form-control custom-select">
   				<option label="Seleccione" selected></option> 
				<option value="1ro">1ro</option>
				<option value="2do">2do</option>
				<option value="3ro">3ro</option>
				<option value="4to">4to</option>
				<option value="5to">5to</option>
				<option value="6to">6to</option>
				<option value="7mo">7mo</option>
				<option value="8vo">8vo</option>
				<option value="9no">9no</option>
				<option value="10mo">10mo</option>
				<option value="11ro">11ro</option>
				<option value="12do">12do</option>
				<option value="13er">13ro</option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="actividaddeportiva">Actividad deportiva</label>
			<input type="text" class="form-control" id="actividaddeportiva" placeholder="Actividad deportiva">
			<label for="comidafavorita">Comida favorita</label>
			<input type="text" class="form-control" id="comidafavorita" placeholder="Comida favorita">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="actividadcultural">Actividad cultural</label>
			<input type="text" class="form-control" id="actividadcultural" placeholder="Actividad cultural">
			<label for="musicafavorita">Música favorita</label>
			<input type="text" class="form-control" id="musicafavorita" placeholder="Música favorita">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="grupoanterior">Grupo scout anterior</label>
			<input type="text" class="form-control" id="grupoanterior" placeholder="Grupo scout anterior">
			<label for="asignaturafavorita">Asignatura favorita</label>
			<input type="text" class="form-control" id="asignaturafavorita" placeholder="Asignatura favorita">
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="proyectovida">Proyecto de vida</label>
			<input type="file" class="form-control" id="proyectovida" placeholder="Proyecto de vida">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="permisosalidas">Permiso salidas</label>
			<input type="file" class="form-control" id="permisosalidas"placeholder="Permiso salidas">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="licencia">Licencia</label>
			<input type="file" class="form-control" id="licencia"placeholder="Licencia">
		</div>
	</div>
</div>
	<br>
	<button type="submit" class="btn btn-default btn-primary btn-icono" id="btn-hoja-vida"><i class="fas fa-cloud-upload-alt"></i></button>