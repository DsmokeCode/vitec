<?php
class Cencuestas extends ci_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('mregpersonas');
		$this->load->model('mencuestas');
	}

	public function index (){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('vencuestas');
		$this->load->view('layout/footer');
	}

	public function getevento()
	{
			$s = $this->input->post('esteve');
			$resultado = $this->mregpersonas->getEventos($s);

			echo json_encode($resultado);
	}

	public function getencuesta()
	{
		$b =  $this->input->post('cbe');
		$resultado = $this->mencuestas->getencuesta($b);
		echo json_encode($resultado);
	}

	public function guardarencuesta()
	{
		$param['codeve']   = $this->input->post('cbevento');
		$param['nomenc']   = $this->input->post('txtnomenc');
		$param['desenc']   = $this->input->post('txtdescenc');
		$param['finienc']   = $this->input->post('finicio');
		$param['ffinenc']   = $this->input->post('ffin');

		$this->mencuestas->guardarencuesta($param);
	}

	public function EditarEncuesta()
	{
		$param['codenc']   = $this->input->post('mdlidencuesta');
		$param['nomenc']   = $this->input->post('mdltxtnomenc');
		$param['desenc']   = $this->input->post('mdltxtdesenc');
		$param['finienc']   = $this->input->post('mdlfinicioenc');
		$param['ffinenc']   = $this->input->post('mdlffinenc');

		echo $this->mencuestas->EditarEncuesta($param);

	}
	public function deleteencuesta()
	{
		$codenc = $this->input->post('dmdlencuesta');
		echo $this->mencuestas->deleteencuesta($codenc);
	}

}
