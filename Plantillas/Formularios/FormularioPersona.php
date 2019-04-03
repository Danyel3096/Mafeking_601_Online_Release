<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="tipodocumento">Tipo documento</label><br>
			<select id="tipodocumento" name="tipodocumento" class="form-control custom-select" disabled>
   				<option label="Seleccione" selected></option> 
				<option value="Tarjeta de identidad">Tarjeta de identidad</option>
				<option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="numerodocumento">Número documento</label>
			<input type="number" class="form-control" id="numerodocumento" name="numerodocumento" placeholder="Numero documento" value="<?php echo $persona -> obtenerNumeroDocumento() ?>" disabled>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="generopersona">Género</label>
			<select id="generopersona" name="generopersona" class="form-control custom-select" disabled>
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
			<label for="nombrespersona">Nombres</label>
			<input type="text" class="form-control" id="nombrespersona" name="nombrespersona" placeholder="Nombres" value="<?php echo $persona -> obtenerNombres(); ?>" disabled>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="apellidospersona">Apellidos</label>
			<input type="text" class="form-control" id="apellidospersona" name="apellidospersona" placeholder="Apellidos" value="<?php echo $persona -> obtenerApellidos(); ?>" disabled>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="fechapersona">Fecha de nacimiento</label>
			<input type="date" class="form-control" id="fechapersona" name="fechapersona" value="<?php echo $persona -> obtenerFechaNacimiento() ?>" disabled>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="celularpersona">Celular</label>
			<input type="number" class="form-control" id="celularpersona" name="celularpersona" placeholder="Celular" value="<?php echo $persona -> obtenerCelular() ?>">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telefonopersona">Telefono</label>
			<input type="number" class="form-control" id="telefonopersona" name="telefonopersona" placeholder="Telefono">
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="direccionpersona">Dirección</label>
			<input type="text" class="form-control" id="direccionpersona" name="direccionpersona" placeholder="Dirección"value="<?php echo $persona -> obtenerDireccion() ?>">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="barriopersona">Barrio</label>
			<input type="text" class="form-control" id="barriopersona" name="barriopersona" placeholder="Barrio">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="estratopersona">Estrato</label>
			<select id="estratopersona" name="estratopersona" class="form-control custom-select">
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
	<div class="col-md-4">
		<div class="form-group">
			<label for="investidurapersona">Investidura</label>
			<select id="investidurapersona" name="investidurapersona" class="form-control custom-select">
   				<option label="Seleccione" selected></option> 
				<option value="No">No</option>
   				<option value="Sí">Sí</option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="totempersona">Totem</label>
			<input type="number" class="form-control" id="totempersona" name="totempersona" placeholder="Totem">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="correopersona">Correo</label>
			<input type="email" class="form-control" id="correopersona" name="correopersona" placeholder="Correo electrónico" value="<?php echo $persona -> obtenerCorreo() ?>">
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-12">
		<hr>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="clavepersona">Contraseña actual</label>
			<input type="password" class="form-control" id="clavepersona" name="clavepersona" placeholder="Contraseña actual">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="clavenueva">Contraseña nueva</label>
			<input type="password" class="form-control" id="clavenueva" name="clavenueva" placeholder="Contraseña nueva">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="confirmacionclavenueva">Confirma contraseña nueva</label>
			<input type="password" class="form-control" id="confirmacionclavenueva" name="confirmacionclavenueva" placeholder="Confirma contraseña nueva">
		</div>
	</div>
</div>
<button type="submit" class="btn btn-default btn-primary btn-icono" id="btn-perfil"><i class="fas fa-cloud-upload-alt"></i></button>