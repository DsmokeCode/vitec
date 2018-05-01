<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/dist/img/n.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('s_usuario'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVEGACION</li>
        <li class="active treeview">
          <a href="#">
            <i class="glyphicon glyphicon-th"></i>
            <span>Gestion Eventos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>ceventos"><i class="fa fa-circle-o"></i> Eventos</a></li>
            <li><a href="<?php echo base_url();?>csubeventos"><i class="fa fa-circle-o"></i> Ponencias</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url();?>cgesusuarios"><i class="glyphicon glyphicon-user"></i><span>Gestion Usuarios</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-hand-up"></i> <span>Gestion Asistencia</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url();?>cregpersonas"><i class="fa fa-circle-o"></i> Asistencia</a></li>
            <li><a href="<?php echo base_url();?>chistorial"><i class="fa fa-circle-o"></i> Historial</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url();?>creportes"><i class="fa fa-book"></i><span>Reportes</span></a></li>
        <li><a href="<?php echo base_url();?>cencuestas"><i class="glyphicon glyphicon-tasks"></i><span>Encuestas</span></a></li>
        <li class="header">Herramientas</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Perfil</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Cambiar Contraseña</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Cerrar Sesion</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content">
