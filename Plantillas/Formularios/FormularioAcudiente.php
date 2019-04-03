<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="cedula">Número de cedula</label><span class="obligatorio">*</span>
			<input type="number" class="form-control" id="cedula" name="cedula" placeholder="Número de cedula" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="generoacudiente">Género</label><span class="obligatorio">*</span><br>
			<select id="generoacudiente" name="generoacudiente" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option> 
				<option value="Femenino">Femenino</option> 
				<option value="Masculino">Masculino</option>
			</select>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label for="correoacudiente">Correo electrónico</label><span class="obligatorio">*</span>
			<input type="email" class="form-control" id="correoacudiente" name="correoacudiente" placeholder="Correo electrónico" required>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-5">
		<div class="form-group">
			<label for="nombresacudiente">Nombres</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="nombresacudiente" name="nombresacudiente" placeholder="Nombres" required>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label for="apellidosacudiente">Apellidos</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="apellidosacudiente" name="apellidosacudiente" placeholder="Apellidos" required>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<label for="parentesco">Parentesco</label><span class="obligatorio">*</span>
			<select id="parentesco" name="parentesco" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option> 
				<option value="Madre">Papá</option> 
				<option value="Padre">Mamá</option>
				<option value="Tio">Tio</option>
				<option value="Tia">Tia</option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-3">
		<label for="epsacudiente">E.P.S.</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="epsacudiente" name="epsacudiente" placeholder="E.P.S." required>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="celularacudiente">Celular</label><span class="obligatorio">*</span>
			<input type="number" class="form-control" id="celularacudiente" name="celularacudiente" placeholder="Celular" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="telefonoacudiente">Teléfono</label>
			<input type="number" class="form-control" id="telefonoacudiente" name="telefonoacudiente" placeholder="Teléfono">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="estratoacudiente">Estrato</label><span class="obligatorio">*</span>
			<select id="estratoacudiente" name="estratoacudiente" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
   				<option value="1">1</option>
   				<option value="2">2</option>
   				<option value="3">3</option>
   				<option value="4">4</option>
   				<option value="5">5</option>
   				<option value="6">6</option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="direccionacudiente">Dirección</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="direccionacudiente" name="direccionacudiente" placeholder="Dirección">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="barrioacudiente">Barrio</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="barrioacudiente" name="barrioacudiente" placeholder="Barrio">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="departamentoacudiente">Departamento</label><span class="obligatorio">*</span><br>
			<select id="departamentoacudiente" name="departamentoacudiente" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="municipioacudiente">Municipio</label><span class="obligatorio">*</span><br>
			<select id="municipioacudiente" name="municipioacudiente" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="profesion">Profesión</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesión" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="empresa">Empresa</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="ocupacion">Ocupación</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="Ocupación" required>
		</div>
	</div>
</div>
<hr>
<button type="submit" class="btn btn-default btn-primary btn-icono" id="btn-acudiente"><i class="fas fa-cloud-upload-alt"></i></button>