<div class="row">
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border bg-blue">
              <h3 class="box-title">Eventos</h3>
            </div>
            <div class="box-body">
              <div class= "col-sm-6">
              <div class="form-group">
                <label class="col-sm-5 control-label date">Fecha Inicio del Evento: </label>
                <div class="col-sm-7 input-group date">
                  <div class="input-group-addon ">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input maxlength="10" type="text" name="fechainibusqueda" class="form-control pull-right solofec" id="fechainibusqueda" style="width: 100%;">
                </div>
                </div>
                </div>
                <div class= "col-sm-6">
                <div class="form-group">

                <label class="col-sm-4 control-label date">Fecha Fin del Evento: </label>
                <div class="col-sm-8 input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input maxlength="10" type="text" name="fechafinbusqueda" class="form-control pull-right solofec" id="fechafinbusqueda" style="width: 100%;">
                </div>
                <br>
              </div>
              </div>
              <div class="btn-group col-sm-12">
             <button type="button" id="btnbuscar" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-search"></i> Buscar</button>
              </div>
              <div class="box-footer">
                <table id="tblhistorialeventos" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width:  2%;">N°</th>
                      <th style="width: 8%;">Nombre del Evento</th>
                      <th style="width: 10%;">Encargado del Evento</th>
                      <th style="width: 10%;">Fecha Inicio</th>
                      <th style="width: 10%;">Fecha Fin</th>
                      <th style="width: 10%;">Accion</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
              <!-- /.box-footer -->
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border bg-blue">
              <h3 class="box-title">Ponencias</h3>
            </div>
            <div class="box-body">
              <input type="hidden" id="codeventos">
              <div class="box-footer">
                <table id="tblhistorialponencia" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width:  2%;">N°</th>
                      <th style="width: 8%;">Nombre de Ponencia</th>
                      <th style="width: 10%;">Expocitor</th>
                      <th style="width: 10%;">Fecha de Ponencia</th>
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

<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>
