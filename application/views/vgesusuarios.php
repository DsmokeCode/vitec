
<div class="row">
<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border bg-blue">
              <h3 class="box-title">Gestion de Usuario</h3>
            </div>
            <div class="box-body">

              <div class="btn-group">
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalNuevoUsuario"><i class="glyphicon glyphicon-plus"></i> Registar Nuevo Usuario</button>
              </div>
              <div class="box-footer">
                <table id="tblgetUsuarios" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width:  2%;">N°</th>
                      <th style="width: 8%;">DNI</th>
                      <th style="width: 10%;">Nombre</th>
                      <th style="width: 10%;">Paterno</th>
                      <th style="width: 10%;">Materno</th>
                      <th style="width: 10%;">Sexo</th>
                      <th style="width: 10%;">Perfil</th>
                      <th style="width: 10%;">Celular</th>
                      <th style="width: 10%;">Email</th>
                      <th style="width: 10%;">F. Nacimiento</th>
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


      <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      	<div class="modal-dialog modal-sm-7" role="document">
      		<div class="modal-content">
      			<!-- CABECERA MODAL-->
      			<div class="modal-header bg-primary">
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      				<h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
      			</div>
      			<!-- FIN CABECERA MODAL-->
      			<div class="modal-body">
      				<form class="form-horizontal">
      					<!-- parametros ocultos -->
      					<div class="box-body">
      						<div class="form-group">
      							<label class="col-sm-4 control-label">DNI: </label>
      							<div class="col-sm-7">
      								<input maxlength="8" type="text" name="mdltxtdni" class="form-control solonum" id="mdltxtdni" placeholder="Ingrese DNI">
      							</div>
      						</div>
                  <div class="form-group">
      							<label class="col-sm-4 control-label">Nombre: </label>
      							<div class="col-sm-7">
      								<input type="text" name="mdltxtNombre" class="form-control sololet" id="mdltxtNombre" placeholder="Ingrese Nombre">
      							</div>
      						</div>
                  <div class="form-group">
      							<label class="col-sm-4 control-label">Apellido Paterno: </label>
      							<div class="col-sm-7">
      								<input type="text" name="mdltxtApPaterno" class="form-control sololet" id="mdltxtApPaterno" placeholder="Ingrese Apellido Paterno">
      							</div>
      						</div>
                  <div class="form-group">
      							<label class="col-sm-4 control-label">Apellido Materno: </label>
      							<div class="col-sm-7">
      								<input type="text" name="mdltxtApMaterno" class="form-control sololet" id="mdltxtApMaterno" placeholder="Ingrese Apellido Materno">
      							</div>
      						</div>
              <div class="form-group">
               <label class="col-sm-4 control-label">Sexo: </label>
               <div class="col-sm-7">
                 <select class="form-control" id="mdlcbxSexo" name="mdlcbxSexo">
                   <option value="">Elija Su Sexo</option>
                   <option value="M">Masculino</option>
                   <option value="F">Femenino</option>
                 </select>
               </div>
           </div>
           <div class="form-group">
             <label class="col-sm-4 control-label">Perfil: </label>
             <div class="col-sm-7">
               <select class="form-control" id="mdlcbxPerfil" name="mdlcbxPerfil">
                  <option selected="selected" value="">Escoja Perfil</option>
                </select>
             </div>
           </div>
           <div class="form-group">
             <label class="col-sm-4 control-label date">F. Nacimiento: </label>
             <div class="col-sm-7 input-group date">
               <div class="input-group-addon">
                 <i class="fa fa-calendar"></i>
               </div>
               <input maxlength="10" type="text" name="mdlfechaNacimiento" class="form-control pull-right solofec" id="mdlfechaNacimiento">
             </div>
           </div>
           <div class="form-group">
             <label class="col-sm-4 control-label">Telefono: </label>
             <div class="col-sm-7">
               <input maxlength="9" type="text" name="mdlTelefono" class="form-control solonum" id="mdlTelefono" placeholder="Ingrese Numero Celular">
             </div>
           </div>
           <div class="form-group">
             <label class="col-sm-4 control-label">Email: </label>
             <div class="col-sm-7">
               <input type="text" name="mdlEmail" class="form-control" id="mdlEmail" placeholder="Ingrese Email">
             </div>
           </div>
      					</div>
                <div id="MerroIngresar" style="color: red;"></div>
      				</form>
      			</div>
      			<!-- BOTONES -->
      			<div class="modal-footer">
      				<button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
      				<button type="button" class="btn btn-primary" id="mbtnRegistrar">Registrar</button>
      			</div>
      		</div>
      	</div>
      </div>

<!--modal editar de aqui para abajo-->

<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm-7" role="document">
    <div class="modal-content">
      <!-- CABECERA MODAL-->
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
      </div>
      <!-- FIN CABECERA MODAL-->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="emdlCodPersona">

          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-4 control-label">DNI: </label>
              <div class="col-sm-7">
                <input maxlength="8" type="text" name="emdltxtdni" class="form-control solonum" id="emdltxtdni" placeholder="Ingrese DNI">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Nombre: </label>
              <div class="col-sm-7">
                <input type="text" name="emdltxtNombre" class="form-control sololet" id="emdltxtNombre" placeholder="Ingrese Nombre">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Apellido Paterno: </label>
              <div class="col-sm-7">
                <input type="text" name="emdltxtApPaterno" class="form-control sololet" id="emdltxtApPaterno" placeholder="Ingrese Apellido Paterno">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Apellido Materno: </label>
              <div class="col-sm-7">
                <input type="text" name="emdltxtApMaterno" class="form-control sololet" id="emdltxtApMaterno" placeholder="Ingrese Apellido Materno">
              </div>
            </div>
        <div class="form-group">
         <label class="col-sm-4 control-label">Sexo: </label>
         <div class="col-sm-7">
           <select class="form-control" id="emdlcbxSexo" name="emdlcbxSexo">
             <option value="">Elija Su Sexo</option>
             <option value="M">Masculino</option>
             <option value="F">Femenino</option>
           </select>
         </div>
     </div>
     <div class="form-group">
       <label class="col-sm-4 control-label">Perfil: </label>
       <div class="col-sm-7">
         <select class="form-control" id="emdlcbxPerfil" name="emdlcbxPerfil">
            <option selected="selected" value="">Escoja Perfil</option>
          </select>
       </div>
     </div>
     <div class="form-group">
       <label class="col-sm-4 control-label date">F. Nacimiento: </label>
       <div class="col-sm-7 input-group date">
         <div class="input-group-addon">
           <i class="fa fa-calendar"></i>
         </div>
         <input maxlength="10" type="text" name="emdlfechaNacimiento" class="form-control pull-right" id="emdlfechaNacimiento" style="width: 100%;">
       </div>
     </div>
     <div class="form-group">
       <label class="col-sm-4 control-label">Telefono: </label>
       <div class="col-sm-7">
         <input maxlength="9" type="text" name="emdlTelefono" class="form-control solonum" id="emdlTelefono" placeholder="Ingrese Numero Celular">
       </div>
     </div>
     <div class="form-group">
       <label class="col-sm-4 control-label">Email: </label>
       <div class="col-sm-7">
         <input type="text" name="emdlEmail" class="form-control" id="emdlEmail" placeholder="Ingrese Email">
       </div>
     </div>
          </div>
          <div id="MErrorEditar" style="color:red;"></div>
        </form>
      </div>
      <!-- BOTONES -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="embtnCerrarModal" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="embtnActualizar">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<!-- model de contraseñar y usuarios de aqui para abajo -->


<div class="modal fade" id="modalUsuarioClave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- CABECERA MODAL-->
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crea y/o modificar Usuario</h4>
      </div>
      <!-- FIN CABECERA MODAL-->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="umdlcodusu">
          <input type="hidden" id="umdlcodper">

          <div class="box-body">
            <div class="col-sm-12">
            <div class="form-group">
              <p id="nuevo"></p>
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label>Usuario: </label>
                <input type="text" name="umdltxtUsuario" class="form-control" id="umdltxtUsuario" placeholder="Ingrese Usuario" style="width: 100%;">
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label >Contraseña: </label>
                <input type="password" name="umdlpassword" class="form-control" id="umdlpassword" placeholder="Ingrese Una Contraseña" style="width: 100%;">
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label>Confirmar Contraseña: </label>
                <input type="password" name="umdlpasswordconfirm" class="form-control" id="umdlpasswordconfirm" placeholder="Confirma Tu contraseña" style="width: 100%;">
              </div>
            </div>
          </div>
          <div id="mensajeErrorCampos" style="color:red;"></div>
        </form>
      </div>
      <!-- BOTONES -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="umbtnCancelar" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn bg-blue" id="mbtnCrearUsuario">Crear Usuario</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Eliminar de qui para abajo-->

<div class="modal fade" id="modalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- CABECERA MODAL-->
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Usuario</h4>
      </div>
      <!-- FIN CABECERA MODAL-->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="dmdlPersona">

          <div class="box-body">
            <div class="col-sm-12">
            <div class="form-group">
              <div id="nuevo"></div>
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label> ¿ Esta seguro de eliminar al usuario: <p1 id="UsuarioNombre"></p1> ?</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- BOTONES -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="dmbtneliminar" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="dmbtnEliminarUsuario">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>
