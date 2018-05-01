
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border bg-blue">
					<h2 class="box-title">Crear Ponencia</h2>
				</div>
				<div class="box-body">
					<div class="col-sm-4">
						<div class="form-group">

							<label>Escoge Evento</label>
							<select class="form-control select2" name="cbevento" id="cbevento" style="width: 100%;">
												<option selected="selected" value="">Escoge el Evento</option>
											</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Expositor</label>
							<select class="form-control select2" name="cbexpositor" id="cbexpositor" style="width: 100%;">
												<option selected="selected" value="">Escoge el Expositor</option>
											</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Lugar</label>
							<select class="form-control select2" name="cblugar" id="cblugar" style="width: 100%;">
												<option selected="selected" value="">Escoge el Lugar</option>
											</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Nombre de Ponencia</label>
							<input type="text" class="form-control" name="txtnomsub" id="txtnomsub" placeholder="Ingresar Nombre de Ponencia">
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<textarea class="form-control" id="txtdescsub" rows="5" name="txtdescsub" placeholder="Ingresar Descripcion de Ponencia"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Fecha de Ponencia:</label>
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input maxlength="10" type="text" name="finicio" class="form-control pull-right" id="datepicker">
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label>Hora Inicio:</label>
								<div class="input-group">
									<input maxlength="5" type="text" name="hinicio" id="hinicio" class="form-control timepicker">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label>Hora Fin:</label>
								<div class="input-group">
									<input maxlength="5" type="text" name="hfin" id="hfin" class="form-control timepicker">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
					<div class="btn-group">
						<button type="submit" class="btn btn-primary " id="btnguardar">Guardar</button>  
						<button type="reset" class="btn btn-primary pull-right" id="btnlimpiar">Nuevo</button>
					</div>
					</div>
				</div>
				<div class="box-footer">
					<div id="MErrorsubeve" style="Color: red;"></div>
					<table id="tblSubEvento" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th style="width:  2%;">N°</th>
								<th style="width: 12%;">Nombre de Ponencia</th>
								<th style="width: 10%;">Descripcion</th>
								<th style="width: 10%;">Expositor</th>
								<th style="width: 10%;">Lugar</th>
								<th style="width: 11%;">Fecha de Ponencia</th>
								<th style="width: 10%;">Hora: Inicio - Fin</th>
								<th style="width: 5%;">Accion</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<div class="modal fade" id="modalEditarSubevento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm-10" role="document">
		<div class="modal-content">
			<!-- CABECERA MODAL-->
			<div class="modal-header bg-blue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar Sub-Evento</h4>
			</div>
			<!-- FIN CABECERA MODAL-->
			<div class="modal-body">
				<form class="form-horizontal">
					<!-- parametros ocultos -->
					<input type="hidden" id="mdlidsubevento">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-4 control-label">Nombre de Ponencia</label>
							<div class="col-sm-7">
								<input type="text" name="mdltxtnomsub" class="form-control" id="mdltxtnomsub" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Descripcion</label>
							<div class="col-sm-7">
								<textarea class="form-control" id="mdltxtdescsub" rows="5" name="mdltxtdescsub" placeholder="Descripcion de Ponencia"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Expositor</label>
							<div class="col-sm-7">
								<select class="form-control" id="mdlcbexpositor" name="mdlcbexpositor">
                   <option selected="selected" value="">Escoge el Expositor</option>
                 </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Lugar</label>
							<div class="col-sm-7">
								<select class="form-control" id="mdlcblugar" name="mdlcblugar">
                  <option selected="selected" value="">Escoge Lugar</option>
                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label date">Fecha Ponencia:</label>
							<div class="col-sm-7 input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input maxlength="10" type="text" name="mdlfinicio" class="form-control pull-right" id="datepicker1">
							</div>
						</div>
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label class="col-sm-4 control-label">Hora Inicio:</label>
								<div class="col-sm-7 input-group">
									<input maxlength="5" type="text" name="hinicio" id="timepicker" class="form-control timepicker">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label class="col-sm-4 control-label">Hora Fin:</label>
								<div class="col-sm-7 input-group">
									<input maxlength="5" type="text" name="hfin" id="timepicker1" class="form-control timepicker">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="MErrorEditSubeve" style="color:red;"></div>
				</form>
			</div>
			<!-- BOTONES -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="mbtnUpdSubEventos">Actualizar</button>
			</div>
		</div>
	</div>
</div>
<!--FIN BOTONES -->
<!-- Modal para Eliminar el sub evento aqui abajo-->

<div class="modal fade" id="modalEliminarSubEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- CABECERA MODAL-->
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Ponencia</h4>
      </div>
      <!-- FIN CABECERA MODAL-->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="dmdlsubevento">

          <div class="box-body">
            <div class="col-sm-12">
            <div class="form-group">
              <div id="nuevo"></div>
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label>¿ Esta seguro de eliminar el sub-evento: <p1 id="nombresubeve"></p1> ?</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- BOTONES -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="dmbtncancelarsubevento" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="dmbtnEliminarsubevento">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	var baseurl = "<?php echo base_url();?>";
</script>
