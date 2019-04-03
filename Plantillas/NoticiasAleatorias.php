<div class="row">
	<div class="col-md-12">
		<hr>
		<h3>Otras noticias interesantes</h3>
	</div>
	
	<?php
	for ($i = 0; $i < count($noticias_aleatorias); $i++) {
		$noticia_actual = $noticias_aleatorias[$i];
	?>
		<div class="col-md-4">
			<div class="card">
				<div class="card-title text-center"><h6>
					<?php echo $noticia_actual -> obtenerTitulo(); ?>
				</h6></div>
				<div class="card-body">
					<p>
						<?php echo nl2br(substr($noticia_actual -> obtenerTexto().'...', 0, 403)); ?>
					</p>
				</div>
			</div>
		</div>
		<?php
		}
	?>
</div>