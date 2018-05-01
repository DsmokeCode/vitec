<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Creportes extends ci_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('mreportes');
	}

	public function index (){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('vreportes');
		$this->load->view('layout/footer');
	}

	public function getEvexAsi()
	{
		$result = $this->mreportes->getEvexAsi();
		echo json_encode($result);
	}

	public function getPonxAsi()
	{
		$result = $this->mreportes->getPonxAsi();
		echo json_encode($result);
	}

	public function getPonxAsixEve()
	{
		$ideve = $this->post->idcbevento();
		$result = $this->mreportes->getPonxAsixEve($ideve);
		echo json_encode($result);
	}

}
