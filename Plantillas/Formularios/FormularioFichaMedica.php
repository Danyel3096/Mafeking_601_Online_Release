<div class="form-row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="epspersona">EPS</label><span class="obligatorio">*</span>
			<input type="text" class="form-control" id="epspersona" name="epspersona" placeholder="Nombre de EPS" required>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<label for="gruposanguineo">Grupo sanguineo</label><span class="obligatorio">*</span><br>
			<select id="gruposanguineo" name="gruposanguineo" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option> 
				<option value="O">O</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="AB">AB</option>
			</select>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<label for="factorrh">Factor Rh</label><span class="obligatorio">*</span>
			<select id="factorrh" name="factorrh" class="form-control custom-select" required>
   				<option label="Seleccione" selected></option> 
				<option value="Negativo">-</option>
				<option value="Positivo">+</option>
			</select>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label for="medicamento">Medicamentos</label>
			<textarea class="form-control" id="medicamento" rows="3" placeholder="Medicamentos"></textarea>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-3">
		<div class="form-group">
			<label>Prescripción</label>
			<textarea class="form-control" id="prescripcion" rows="3" placeholder="Prescripciones"></textarea>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Alergias</label>
			<textarea class="form-control" id="alergia" rows="3" placeholder="Alergias"></textarea>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Enfermedades</label>
			<textarea class="form-control" id="enfermedad" rows="3" placeholder="Enfermedades"></textarea>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Dieta</label>
			<textarea class="form-control" id="dieta" rows="3" placeholder="Dieta"></textarea>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-12 text-center">
		<label>Inmunizaciones</label>
	</div>
</div>
<div class="form-row">
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Tetanos</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="tetano" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="tetano" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Triple viral</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="tripleviral" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="tripleviral" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Varicela</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="varicela" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="varicela" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Influenza</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="influenza" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="influenza" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Rubeola/Sarampion</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="rubeolasarampion" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="rubeolasarampion" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Fiebre amarilla</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="fiebreamarilla" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="fiebreamarilla" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Hepatitis B</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="hepatitisb" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="hepatitisb" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Papiloma humano</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="papilomahumano" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="papilomahumano" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Meningitis A</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="meningitisa" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="meningitisa" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Parotiditis</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="parotiditis" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="parotiditis" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Neumococos</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="neumococo" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="neumococo" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-2 bordes">
		<div class="form-group">
			<div class="row text-center">
				<div class="col-md-12">
					<label>Poliomielitis</label><span class="obligatorio">*</span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-6">
      				<input type="radio" name="poliomielitis" value="1"> Sí
      			</div>
    			<div class="col-6">
      				<input type="radio" name="poliomielitis" value="0"> No
    			</div>
  			</div>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="col-md-3">
		<div class="form-group">
			<label>Discapacidades</label>
			<textarea class="form-control" id="discapacidad" rows="3" placeholder="Discapacidades"></textarea>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Cirugias</label>
			<textarea class="form-control" id="cirugia" rows="3" placeholder="Cirugias"></textarea>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Tratamientos</label>
			<textarea class="form-control" id="tratamiento" rows="3" placeholder="Tratamientos"></textarea>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Información adicional</label>
			<textarea class="form-control" id="informacionadicional" rows="3" placeholder="Información adicional"></textarea>
		</div>
	</div>
</div>
	<br>
	<button type="submit" class="btn btn-default btn-primary btn-icono" id="btn-ficha-medica"><i class="fas fa-cloud-upload-alt"></i></button>