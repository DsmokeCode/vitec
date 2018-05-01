<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border bg-blue">
        <h2 class="box-title">Crear Encuestas</h2>
      </div>
      <div class="box-body">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Nombre de la encuesta</label>
            <input type="text" class="form-control" name="txtnomenc" id="txtnomenc" placeholder="Ingresar Nombre de la Encuesta">
          </div>
          <div class="form-group">
            <label>Descripcion de la encuesta</label>
            <textarea class="form-control" id="txtdescenc" rows="5" name="txtdescenc" placeholder="Ingresar Descripcion de la Encuesta"></textarea>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Escojer Evento</label>
            <select class="form-control select2" name="cbevento" id="cbevento" style="width: 100%;">
                      <option selected="selected" value="">Escoje el Evento</option>
                    </select>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <label>Fecha Inicio de la Encuesta:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input maxlength="10" type="text" name="finicio" class="form-control pull-right" id="finicio">
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Fecha Fin de la Encuesta:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input maxlength="10" type="text" name="ffin" class="form-control pull-right" id="ffin">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
        <div class="btn-group">
          <button type="submit" class="btn btn-primary pull-left" id="btnguardarenc">Guardar Encuesta</button>  
          <button type="reset" class="btn btn-primary pull-right" id="btnlimpiarenc">Nueva Encuesta</button>
        </div>
        </div>
      </div>
      <div class="box-footer">
        <div id="MErrorencuesta" style="Color: red;"></div>
        <table id="tblEncuesta" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width:  2%;">N°</th>
              <th style="width: 12%;">Nombre de encuesta</th>
              <th style="width: 10%;">Descripcion de la encuesta</th>
              <th style="width: 10%;">fecha inicio</th>
              <th style="width: 10%;">fecha fin</th>
              <th style="width: 5%;">Accion</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalEditarEncuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm-10" role="document">
		<div class="modal-content">
			<!-- CABECERA MODAL-->
			<div class="modal-header bg-blue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar Encuesta</h4>
			</div>
			<!-- FIN CABECERA MODAL-->
			<div class="modal-body">
				<form class="form-horizontal">
					<!-- parametros ocultos -->
					<input type="hidden" id="mdlidencuesta">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-4 control-label">Nombre de la encuesta</label>
							<div class="col-sm-7">
								<input type="text" name="mdltxtnomenc" class="form-control" id="mdltxtnomenc" placeholder="Escriba el Nombre de la Encuesta">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Descripcion de la encuesta</label>
							<div class="col-sm-7">
								<textarea class="form-control" id="mdltxtdesenc" rows="5" name="mdltxtdesenc" placeholder="Descripcion de la Encuesta"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label date">Fecha Inicio de la Encuesta:</label>
							<div class="col-sm-7 input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input maxlength="10" type="text" name="mdlfinicioenc" class="form-control pull-right" id="mdlfinicioenc">
							</div>
						</div>
            <div class="form-group">
              <label class="col-sm-4 control-label date">Fecha Fin de la Encuesta:</label>
              <div class="col-sm-7 input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input maxlength="10" type="text" name="mdlffinenc" class="form-control pull-right" id="mdlffinenc">
              </div>
            </div>
					</div>
					<div id="MErrorEditenc" style="color:red;"></div>
				</form>
			</div>
			<!-- BOTONES -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="mbtnCerrarModalenc" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="mbtnUpdEncuesta">Actualizar</button>
			</div>
		</div>
	</div>
</div>
<!--FIN BOTONES -->

<!-- Modal para Eliminar el encuesta aqui abajo-->

<div class="modal fade" id="modalEliminarEncuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- CABECERA MODAL-->
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Encuesta</h4>
      </div>
      <!-- FIN CABECERA MODAL-->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="dmdlencuesta">

          <div class="box-body">
            <div class="col-sm-12">
            <div class="form-group">
              <div id="nuevo"></div>
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label>¿ Esta seguro de eliminar la encuesta: <p1 id="nombreencuesta"></p1> ?</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- BOTONES -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="dmbtncancelarencuesta" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="dmbtnEliminarencuesta">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var baseurl = "<?php echo base_url();?>";
</script>
