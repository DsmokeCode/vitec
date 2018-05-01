<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border bg-blue">
				<h3 class="box-title">Asistencia a eventos</h3>
			</div>
			<div class="box-body">
				<div class="col-sm-2">
					<div class="form-group">
						<div class="box-tools">
							<label class="control-label">Buscar DNI:</label>
							<div class="input-group input-group-sm" style="width: 100%;">
								<input maxlength="8" type="text" name="txtBuscarDNI" id="txtBuscarDNI" class="form-control pull-right solonum" placeholder="Buscar DNI">
								<div class="input-group-btn">
									<button type="submit" id="btndni" class="btn btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-group">
						<label class="control-label">Evento: </label>
						<select class="form-control select2" id="cboevento" name="cboevento" class="form-control" style="width: 100%;">
              <option selected="selected" value="">Eliga Evento</option>
            </select>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-group">
						<label class="control-label">Sub Evento: </label>
						<select class="form-control select2" id="cbosubevento" name="cbosubevento" class="form-control" style="width: 100%;">
              <option selected="selected" value="">Eliga Sub Evento</option>
            </select>
					</div>
				</div>
				<input type="text" id="txtdni">
				<div class="col-sm-4">
					<div class="form-group">
						<label>NOMBRES</label>
						<input type="text" class="form-control sololet" placeholder="Nombres" name="txtnombres" id="txtnombres">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label>APELLIDO PATERNO</label>
						<input type="text" class="form-control sololet" placeholder="Apellido Paterno" name="txtapp" id="txtapp">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label>APELLIDO MATERNO</label>
						<input type="text" class="form-control sololet" placeholder="Apellido Materno" name="txtapm" id="txtapm">
					</div>
				</div>
				<div class="col-sm-2">
					<br>
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary" id="btnIngresar">Ingresar Alumno</button>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<div id="MErrorAsistencia" style="color: red;"></div>
				<table id="tblAsistencia" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width: 3%;">N°</th>
							<th style="width: 6%;">Dni</th>
							<th style="width: 8%;">Nombre</th>
							<th style="width: 6%;">Paterno</th>
							<th style="width: 6%;">Materno</th>
							<th style="width: 20%;">Sub Evento</th>
							<th style="width: 4%;">Hora de Ingreso</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var baseurl = "<?php echo base_url(); ?>";
</script>
