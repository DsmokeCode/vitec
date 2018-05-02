<?php
/**
 * 
 */
class Clogin extends CI_Controller
{
 	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mlogin');
	}

public function index(){
	$data['mensaje'] ="";
	$this->load->view('vlogin',$data);
}
public function ingresar(){
	$usuario = $this->input->post('usuario');
	$pass = sha1($this->input->post('pass'));

	$res = $this->mlogin->ingresar($usuario,$pass);

	if ($res == 1) {
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('vprincipal');
		$this->load->view('layout/footer');
	} else {
		$data['mensaje'] ="Usuario o Contraseña Erronea";
		$this->load->view('vlogin',$data);
	}
	
}
}?>