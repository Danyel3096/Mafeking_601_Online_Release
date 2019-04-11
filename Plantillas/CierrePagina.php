<?php
Conexion :: cerrarConexion();
?>
<div class="cierre-pagina">
	<div class="row">
		<div class="col-md-3">
			<h4>Contáctanos</h4>
			<ul class="lista">
  				<li><i class="fas fa-home"></i> Carrera 19, kilometro 1 vía a tienda nueva</li>
  				<li><i class="fas fa-map-marked-alt"></i> Palmira, Valle del Cauca, Colombia</li>
  				<li><i class="fas fa-mobile-alt"></i> 310 111 11 00</li>
  				<!--<li><i class="fas fa-phone-square"></i> Telefono</li>-->
				<li><i class="fas fa-at"></i> mafeking601palmira@hotmail.com</li>
			</ul>
		</div>
		<div class="col-md-6">
			<h4>Redes sociales</h4>
			<table name="tabla-cierre-pagina" id="tabla-cierre-pagina">
				<tbody>
  					<tr>
  						<td><i class="fab fa-facebook fa-3x"></i></td>
						<td>
							<a id="icono-instagram" href="https://www.instagram.com/mafeking601colombia/"><i class="fab fa-instagram fa-3x"></i></a>
						</td>
						<td>
							<a id="icono-youtube" href="https://www.youtube.com/channel/UCEFIobTH6R69Og1tDk4XwEQ"><i class="fab fa-youtube-square fa-3x"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<h4>Legal</h4>
			<ul>
				<li><a href="">Términos y condiciones</a></li>
  				<li><a href="">Política de cookies</a></li>
  				<li><a href="">Política de privacidad</a></li>
				<li><a href="">Términos de uso</a></li>
				<li><a href="">Proteccion de niños</a></li>
				<li><a href="">¿LOS REGLAMENTOS DE GRUPO Y RAMAS?</a></li>
			</ul>
		</div>
	</div>
	<div class="row logos-scout">
		<div class="col-md-12">
			<table>
				<tbody>
					<tr>
						<td>
							<a href="http://www.vallescout.org.co/" target="_blank">
								<img src="<?php echo SERVIDOR.'/Archivos/Imagenes/Logos/Valle_del_Cauca_Scout.png' ?>" height="50" alt="">
							</a>
						</td>
  						<td>
  							<a href="https://www.scout.org.co/" target="_blank">
  								<img src="<?php echo SERVIDOR.'/Archivos/Imagenes/Logos/Colombia_Scout.png' ?>" height="65" alt="">
  							</a>
  						</td>
  						<td>
  							<a href="https://www.scout.org/" target="_blank">
  								<img src="<?php echo SERVIDOR.'/Archivos/Imagenes/Logos/Mundo_Scout.png' ?>" height="45" alt="">
  							</a>
  						</td>
  					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row autoria">
		<div class="col-md-12">
			<div id="derechos-reservados"><strong>© 2018-2019. Todos los derechos reservados.</strong></div>
		</div>
	</div>
</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/goalProgress/1.0/goalProgress.min.js"></script>
		<script src="<?php echo RUTA_JS ?>Miscelanea.js"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptCargos.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptConfiguracion.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptCronograma.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptEscritores.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptEstadisticas.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptEventos.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptIntendencia.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptNoticia.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptOrganigrama.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptParticipaciones.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptPerfil.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptPrincipal.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptProgresion.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptProgresiones.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptRama.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptRegistro.php"></script>
		<script src="<?php echo RUTA_SCRIPT ?>ScriptTesoreria.php"></script>
	</body>
</html>
