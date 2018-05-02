<?php 
/**
 * 
 */
 class Cpersona extends CI_Controller
 {
 	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mpersona');
		$this->load->library('encrypt');

	}

public function index(){
	$this->load->view('vpersona');
}
public function guardar(){
	$param['dni'] = $this->input->post('dni');
	$param['nombre'] = $this->input->post('nombre');
	$param['apellido_p'] = $this->input->post('apellido_p');
	$param['apellido_m'] = $this->input->post('apellido_m');
	$param['direccion'] = $this->input->post('direccion');
	$param['fecha_ingreso'] = $this->input->post('fecha_ingreso');
	$param['celular'] = $this->input->post('celular');
	$param['telefono'] = $this->input->post('telefono');
	$param['correo'] = $this->input->post('correo');
	$param['cod_perfil'] = $this->input->post('cod_perfil');
	$param['usuario'] = $this->input->post('usuario');
	$param['pass'] = sha1($this->input->post('pass'));
	$param['estado_persona'] = $this->input->post('estado_persona');
	$this->mpersona->guardar($param);	
}
public function actualizar(){
	$param['nombre'] = $this->input->post('nombre');
	$param['apellido_p'] = $this->input->post('apellido_p');
	$param['apellido_m'] = $this->input->post('apellido_m');
	$this->mpersona->actualizar($param);
	$this->load->view('vprincipal');

}
}?>