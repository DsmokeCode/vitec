<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header with-border bg-green">
				<h3 class="box-title">Gestion Eventos</h3>
			</div>
			<div class="box-body">

				<div class="btn-group">
					<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalNuevoEvento"><i class="glyphicon glyphicon-plus"></i> Registar Nuevo Evento</button>
				</div>


				<div class="box-footer">
					<table id="tblGesEvento" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width:  2%;">N°</th>
								<th style="width: 10%;">Nombre Evento</th>
								<th style="width: 12%;">Descripcion</th>
								<th style="width: 10%;">Fecha Evento: Inicio - Fin</th>
								<th style="width: 10%;">Encargado</th>
								<th style="width: 5%;">Accion</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<!-- /.box-footer -->
			</div>
		</div>
	</div>
</div>
<!-- Modal NUEVO EVENTO de aqui abajo-->
<div class="modal fade" id="modalNuevoEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm-7" role="document">
		<div class="modal-content">
			<!-- CABECERA MODAL-->
			<div class="modal-header btn-success">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Nuevo Evento</h4>
			</div>
			<!-- FIN CABECERA MODAL-->
			<div class="modal-body">
				<form class="form-horizontal">
					<!-- parametros ocultos -->
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-4 control-label">Nombre del Evento: </label>
							<div class="col-sm-7">
								<input type="text" name="mdltxtnomeve" class="form-control" id="mdltxtnomeve" placeholder="Ingrese Nombre del Evento">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Descripcion del Evento: </label>
							<div class="col-sm-7">
							<textarea class="form-control" id="mtxtdesceve" rows="5" name="mtxtdesceve" placeholder="Ingresar Descripcion del Evento"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label date">Fecha Inicio del Evento: </label>
							<div class="col-sm-7 input-group date">
								<div class="input-group-addon ">
									<i class="fa fa-calendar"></i>
								</div>
								<input maxlength="10" type="text" name="mdlfechainieve" class="form-control pull-right solofec" id="mdlfechainieve" style="width: 100%;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label date">Fecha Fin del Evento: </label>
							<div class="col-sm-7 input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input maxlength="10" type="text" name="mdlfechafineve" class="form-control pull-right solofec" id="mdlfechafineve" style="width: 100%;">
							</div>
						</div>
						<div class="form-group">
								<label class="col-sm-4 control-label">Encargado del Evento:</label>
									<div class="col-sm-7">
								<select class="form-control select2" name="cbencargado" id="cbencargado" style="width: 100%;">
													<option selected="selected" value="">Escoge un Encargado</option>
								</select>
							</div>
							</div>
					</div>
					<div id="Merrorevento" style="color: red;"></div>
				</form>
			</div>
			<!-- BOTONES -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="mbtnCerrarModaleve" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-success" id="mbtnRegistrareve">Registrar</button>
			</div>
		</div>
	</div>
</div>

<!--modal editar de aqui para abajo-->

<div class="modal fade" id="modalEditarevento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm-7" role="document">
    <div class="modal-content">
      <!-- CABECERA MODAL-->
      <div class="modal-header bg-green">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Evento</h4>
      </div>
      <!-- FIN CABECERA MODAL-->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="emdlevento">

					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-4 control-label">Nombre del Evento: </label>
							<div class="col-sm-7">
								<input type="text" name="emdltxtnomeve" class="form-control" id="emdltxtnomeve" placeholder="Ingrese Nombre del Evento">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Descripcion del Evento: </label>
							<div class="col-sm-7">
							<textarea class="form-control" id="emtxtdesceve" rows="5" name="emtxtdesceve" placeholder="Ingresar Descripcion del Evento"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label date">Fecha Inicio del Evento: </label>
							<div class="col-sm-6 input-group date">
								<div class="input-group-addon ">
									<i class="fa fa-calendar"></i>
								</div>
								<input maxlength="10" type="text" name="emdlfechainieve" class="form-control pull-right solofec" id="emdlfechainieve">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label date">Fecha Fin del Evento: </label>
							<div class="col-sm-6 input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input maxlength="10" type="text" name="emdlfechafineve" class="form-control pull-right solofec" id="emdlfechafineve">
							</div>
						</div>
						<div class="form-group">
								<label class="col-sm-4 control-label">Encargado del Evento:</label>
									<div class="col-sm-7">
								<select class="form-control select2" name="mcbencargado" id="mcbencargado" style="width: 100%;">
													<option selected="selected" value="">Escoge un Encargado</option>
								</select>
							</div>
							</div>
					</div>
          <div id="MErrorEditareve" style="color:red;"></div>
        </form>
      </div>
      <!-- BOTONES -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="embtnCerrarModaleve" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="embtnActualizareve">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Eliminar de qui para abajo-->

<div class="modal fade" id="modalEliminarevento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- CABECERA MODAL-->
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Evento</h4>
      </div>
      <!-- FIN CABECERA MODAL-->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="dmdlevento">

          <div class="box-body">
            <div class="col-sm-12">
            <div class="form-group">
              <div id="nuevo"></div>
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label> ¿ Esta seguro de eliminar el Evento: <p1 id="nombevento"></p1> ?</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- BOTONES -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="dmbtncancelareve" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="dmbtnEliminarevento">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var baseurl = "<?php echo base_url(); ?>";
</script>
