</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
<div class="pull-right hidden-xs">
  <b>Version</b> 0.1
</div>
<strong>Copyright &copy; 2017 <a href="https://adminlte.io">Sistema EveCap</a>.</strong> Todo los Derechos
reservados.
</footer>
<div class="control-sidebar-bg"></div>
</div>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- LIBREDIRA DE MONENT JS -->
<script src="http://momentjs.com/downloads/moment.js"></script>
<script src="http://momentjs.com/downloads/moment.min.js"></script>
<!-- FIN DE LIBREDIRA DE MONENT JS -->
<!-- LIBRERIAS DE REGPERSONAS -->
<?php if($this->uri->segment(1)=='cregpersonas') {?>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

<script src="<?= base_url(); ?>js/regpersonas.js"></script>
<!-- Scrip para usar datapicker -->
<?php } ?>
<!--FIN LIBRERIAS DE REPORTES -->

<!-- LIBRERIAS DE REGPERSONAS -->
<?php if($this->uri->segment(1)=='chistorial') {?>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

  <script src="<?= base_url(); ?>js/historial.js"></script>

  <script src="<?= base_url(); ?>js/historial.js"></script>

<!-- Scrip para usar datapicker -->
<?php } ?>
<!--FIN LIBRERIAS DE REPORTES -->

<!-- LIBRERIAS DE EVENTOS -->
<?php if($this->uri->segment(1)=='ceventos') {?>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

<script src="<?= base_url(); ?>js/eventos.js"></script>
<!-- Scrip para usar datapicker -->
<?php } ?>
<!--FIN LIBRERIAS DE EVENTOS -->

<!-- LIBRERIAS DE REPORTES -->
<?php if($this->uri->segment(1)=='creportes') {?>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Scrip para usar datapicker -->
<script src="<?= base_url(); ?>js/reportes.js"></script>
<!-- Scrip para usar datapicker -->
<?php } ?>
<!--FIN LIBRERIAS DE REPORTES -->

<!-- INICIO SUB EVENTO -->
<?php if($this->uri->segment(1)=='csubeventos') {?>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

  <script src="<?= base_url(); ?>js/subeventos.js"></script>

<?php } ?>
<!-- FIN DE SUB EVENTO -->
<!-- INICIO Reg Personas -->
<?php if($this->uri->segment(1)=='cgesusuarios') {?>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

  <script src="<?= base_url(); ?>js/gesusuarios.js"></script>

<?php } ?>
<!-- FIN DE Reg Personas -->
<!-- INICIO Reg Personas -->
<?php if($this->uri->segment(1)=='cencuestas') {?>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

  <script src="<?= base_url(); ?>js/encuestas.js"></script>

<?php } ?>
<!-- FIN DE Reg Personas -->

</body>
</html>
