<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="tipo">Tipo de documento</label><span class="obligatorio">*</span><br>
			<select id="tipo" name="tipo" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
				<option value="Tarjeta de identidad">Tarjeta de identidad</option>
				<option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="documento">Número de documento</label><span class="obligatorio">*</span>
			<input type="number" class="form-control" id="documento" name="documento" placeholder="Número de documento" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="genero">Genero</label><span class="obligatorio">*</span><br>
			<select id="genero" name="genero" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option> 
				<option value="Femenino">Femenino</option>
				<option value="Masculino">Masculino</option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="nombres">Nombres</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="apellidos">Apellidos</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="fecha">Fecha de nacimiento</label><span class="obligatorio">*</span>
			<input type="date" class="form-control" id="fecha" name="fecha" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="departamento">Departamento</label><span class="obligatorio">*</span><br>
			<select id="departamento" name="departamento" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="municipio">Municipio</label><span class="obligatorio">*</span><br>
			<select id="municipio" name="municipio" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="celular">Celular</label><span class="obligatorio">*</span>
			<input type="number" class="form-control" id="celular" name="celular" placeholder="Celular" required>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="telefono">Telefono</label>
			<input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-5">
		<div class="form-group">
			<label for="direccion">Dirección</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label for="barrio">Barrio</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio" required>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<label for="estrato">Estrato</label><span class="obligatorio">*</span>
			<select id="estrato" name="estrato" class="form-control custom-select" required>
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
<div class="form-row" id="fila-opcional">
	<div class="col-md-4">
		<div class="form-group">
			<label for="sector">Sector</label><span class="obligatorio">*</span>
			<select id="sector" name="sector" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
   				<option value="Privado">Privado</option>
   				<option value="Público">Público</option>
			</select>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label for="escuela">Centro educativo</label><span class="obligatorio">*</span><br>
			<select id="escuela" name="escuela" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="totem">Totem</label>
			<input type="text" class="form-control" id="totem" placeholder="Totem">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="investidura">Investidura</label><span class="obligatorio">*</span>
			<select id="investidura" name="investidura" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
   				<option value="No">No</option>
   				<option value="Sí">Sí</option>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="equipos-rama">Rama</label><span class="obligatorio">*</span>
			<select id="equipos-rama" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option>
			</select>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="correo">Correo electrónico</label><span class="obligatorio">*</span>
			<input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo" required>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="confirmacion">Confirma tu correo</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="confirmacion" name="confirmacion" placeholder="Confirma tu correo">
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="clave">Contraseña</label><span class="obligatorio">*</span>
			<input type="password" class="form-control" id="clave" name="clave" placeholder="Ingresa tu contraseña" required autocomplete="new-password">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="clave2">Confirma tu contraseña</label><span class="obligatorio">*</span>
			<input type="password" class="form-control" id="clave2" name="clave2" placeholder="Confirma tu contraseña" required autocomplete="new-password">
		</div>
	</div>
</div>
<br>
<button type="submit" class="btn btn-default btn-primary" id="btn-registro" name="btn-registro">Registrarme</button>