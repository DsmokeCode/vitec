
<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border bg-blue">
					<h2 class="box-title">Registrar Persona</h2>
				</div>
				<div class="box-body">
					<div class="col-sm-4">
						<div class="col-sm-6">
							<div class="form-group">
							<label>DNI</label>
							<input type="text" class="form-control" name="dni" id="txtnomsub" placeholder="Ingresar DNI">
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" name="nombre" id="txtnomsub" placeholder="Ingresar Nombre de la Persona">
						</div>
						<div class="form-group">
							<label>Apellido Paterno</label>
							<input type="text" class="form-control" name="apellido_p" id="txtnomsub" placeholder="Ingresar Apellido Paterno">
						</div>
						<div class="form-group">
							<label>Apellido Materno</label>
							<input type="text" class="form-control" name="apellido_m" id="txtnomsub" placeholder="Ingresar Apellido Materno">
						</div>
						<div class="form-group">
							<label>Direccion</label>
							<input type="text" class="form-control" name="direccion" id="txtnomsub" placeholder="Ingresar Direccion">
						</div>
						<div class="form-group">
							<label>Fecha de Ingreso:</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input maxlength="10" type="text" name="fecha_ingreso" class="form-control pull-right" id="datepicker">
							</div>
						</div>
						<div class="form-group">
							<label>Celular:</label>
							<input type="text" class="form-control" name="celular" id="txtnomsub" placeholder="Ingresar Celular">
						</div>
						<div class="form-group">
							<label>Telefono:</label>
							<input type="text" class="form-control" name="telefono" id="txtnomsub" placeholder="Ingresar Telefono">
						</div>
						<div class="form-group">
							<label>Correo:</label>
							<input type="text" class="form-control" name="correo" id="txtnomsub" placeholder="Ingresar Correo Electronico">
						</div>
						<div class="form-group">

							<label>Escoger Perfil</label>
							<select class="form-control select2" name="cbevento" id="cbevento" style="width: 100%;">
												<option selected="selected" value="">Escoge el Perfil del Usuario</option>
											</select>
						</div>
						<div class="form-group">
							<label>Usuario:</label>
							<input type="text" class="form-control" name="usuario" id="txtnomsub" placeholder="Ingresar Usuario">
						</div>
						<div class="form-group">
							<label>Contraseña:</label>
							<input type="text" class="form-control" name="pass" id="txtnomsub" placeholder="Ingresar Contraseña">
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
</div>

	<form action="<?php echo base_url();?>cpersona/guardar" method="POST">
		
		<input type="submit" value="guardar">
	</form>
	<a href="<?php echo base_url();?>clogin">Logear</a>
</body>
</html>
