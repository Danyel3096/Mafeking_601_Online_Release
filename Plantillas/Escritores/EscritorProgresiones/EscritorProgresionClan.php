<?php
include_once 'App/Configuracion.php';
include_once 'App/Conexion.php';
include_once 'Plantillas/InicioPagina.php';
include_once 'Plantillas/BarraNavegacion.php';
?>
<ul class="nav nav-pills mb-3 justify-content-center nav-fill" id="pills-tab" role="tablist">
	<li class="nav-item col-md-3">
		<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pestaña-rover-1" role="tab" aria-controls="pills-home" aria-selected="true">Investidura/Precursor</a>
	</li>
	<li class="nav-item col-md-3">
    	<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pestaña-rover-2" role="tab" aria-controls="pills-profile" aria-selected="false">Ejes transversal y estructural</a>
  	</li>
  	<li class="nav-item col-md-3">
    	<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pestaña-rover-3" role="tab" aria-controls="pills-contact" aria-selected="false">BP</a>
  	</li>
</ul>
<div class="container">
	<div class="tab-content" id="pills-tabContent">
  		<div class="tab-pane fade show active" id="pestaña-rover-1" role="tabpanel" aria-labelledby="pills-home-tab">
  			<table name="tabla-progresion-clan">
				<thead>
					<tr>
						<th>
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h6>Investidura</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<img id="investidura-rover" class="insignias" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="radio" name="especialidad-requisitos" value="1">
									</div>
								</div>
							</div>
						</th>
						<th>
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h6>Precursor</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<img id="eje-precursor" class="insignias" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="radio" name="especialidad-requisitos" value="2">
									</div>
								</div>
							</div>
						</th>
					</tr>
				</thead>
			</table>
			<div class="espacio-pagina"></div>
  		</div>
  		<div class="tab-pane fade" id="pestaña-rover-2" role="tabpanel" aria-labelledby="pills-profile-tab">
  			<table name="tabla-progresion-clan-clan">
				<thead>
					<tr>
						<th colspan="6">Eje Transversal</th>
						<th colspan="3">Eje Estructural</th>
					</tr>
					<tr>
						<th colspan="2">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h6>Aprendiz</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<img id="aprendiz-eje-transversal" class="insignias" />
									</div>
								</div>
							</div>
						</th>
						<th colspan="2">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h6>Experto</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<img id="experto-eje-transversal" class="insignias" />
									</div>
								</div>
							</div>
						</th>
						<th colspan="2">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h6>Monitor</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<img id="monitor-eje-transversal" class="insignias" />
									</div>
								</div>
							</div>
						</th>
						<th>
							<h6>Viaje y enlace<br>internacional</h6>
						</th>
						<th>
							<h6>Emprendimiento</h6>
						</th>
						<th>
							<h6>Servicio</h6>
						</th>
					</tr>
					<tr>
						<th colspan="3">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<h6>Habilidad, técnica y<br>conocimiento scout</h6>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="radio" name="especialidad-requisitos" value="5">
											</div>
										</div>
									</div>
								</div>
							</div>
						</th>
						<th colspan="3">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<h6>Formación por<br>competencias</h6>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="radio" name="especialidad-requisitos" value="8">
											</div>
										</div>
									</div>
								</div>
							</div>
						</th>
						<th>
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4">
												<div class="row">
													<h6>Aprendiz</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-aprendiz-viaje-enlace-internacional" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="9" />
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">
													<h6>Experto</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-experto-viaje-enlace-internacional" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="10" />
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">
													<h6>Monitor</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-monitor-viaje-enlace-internacional" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="11" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</th>
						<th>
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4">
												<div class="row">
													<h6>Aprendiz</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-aprendiz-emprendimiento" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="12" />
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">
													<h6>Experto</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-experto-emprendimiento" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="13" />
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">
													<h6>Monitor</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-monitor-emprendimiento" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="14" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</th>
						<th>
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4">
												<div class="row">
													<h6>Aprendiz</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-aprendiz-servicio" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="15" />
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">
													<h6>Experto</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-experto-servicio" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="16" />
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="row">
													<h6>Monitor</h6>
												</div>
												<div class="row">
													<img id="eje-estructural-monitor-servicio" class="insignias" />
												</div>
												<div class="row">
													<div class="col-md-12">
														<input type="radio" name="especialidad-requisitos" value="17" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</th>
					</tr>
				</thead>
			</table>
			<div class="espacio-pagina"></div>
  		</div>
  		<div class="tab-pane fade" id="pestaña-rover-3" role="tabpanel" aria-labelledby="pills-contact-tab">
  			<table name="tabla-progresion-clan">
				<thead>
					<tr>
						<th colspan="3">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h6>BP</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<img id="eje-bp" class="insignias" />
									</div>
								</div>
							</div>
						</th>
					</tr>
				</thead>
				<tbody id="cuerpo-culmen-clan" name="cuerpo-culmen-clan"></tbody>
			</table>
			<div class="espacio-pagina"></div>
  		</div>
	</div>
</div>
<div class="container">
	<table>
		<tbody id="cuerpo-requisitos-clan" name="cuerpo-requisitos-clan"></tbody>
	</table>
</div>