<div class="form-row">
	<div class="col-md-1"></div>
	<div class="col-md-7">
		<div class="form-group">
			<label for="texto-comentario">Escribe tu comentario</label><br>
			<textarea id="texto-comentario" class="form-control" placeholder="Escribe tu comentario aquí"></textarea>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-row">
			<div class="col-md-12">
				<div class="form-group text-right">
					<label>Comentado por</label><br>
					<input type="text" id="nombre-comentarista" name="nombre-comentarista" value="<?php echo $persona_recuperada -> obtenerNombres()." ".$persona_recuperada -> obtenerApellidos(); ?>" />
					<input type="hidden" id="id-comentarista" name="id-comentarista" value="<?php echo $persona_recuperada -> obtenerId(); ?>" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-right">
				<button type="button" class="btn btn-success btn-icono" id="btn-enviar-comentario" name="btn-enviar-comentario"><i class="far fa-comment-alt"></i> Publicar</button>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>